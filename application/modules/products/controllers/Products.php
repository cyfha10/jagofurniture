<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends MX_Controller
{
    private $tableProducts   = 'tb_product';
    private $tableCategories = 'tb_product_category';
    private $pk              = 'product_id'; // primary key produk

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
        $this->load->model('general_model');
        $this->load->helper(['url', 'form']);
    }

    private function _load_common_data()
    {
        // List produk
        $data['products'] = $this->general_model->get($this->tableProducts);

        // List kategori (urut nama ASC). Ganti 'category_name' jika kolom nama kategori kamu berbeda.
        $data['categories'] = $this->general_model->get_sort($this->tableCategories, 'category_name');

        return $data;
    }

    public function index()
    {
        $data = $this->_load_common_data();
        $data['title'] = 'Product Management';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('products', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $data = $this->_load_common_data();

        // Ambil 1 produk by PK
        $data['product'] = $this->general_model->get_where_one($this->tableProducts, $this->pk, $id);
        $data['title']   = 'Product Management';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('products', $data);
        $this->load->view('templates/footer');
    }

    private function upload_image(string $field = 'image'): array
    {
        // 0) Validasi awal: ada file yang dikirim?
        if (!isset($_FILES[$field]) || !is_array($_FILES[$field]) || $_FILES[$field]['error'] === UPLOAD_ERR_NO_FILE) {
            return ['ok' => false, 'filename' => '', 'error' => 'no_file_selected'];
        }

        // 1) Pastikan folder ada & writable
        // Gunakan path FILESYSTEM, bukan URL. FCPATH menunjuk ke folder public (tempat index.php)
        $uploadPath = rtrim(FCPATH, '/\\') . '/assets/images/product';
        if (!is_dir($uploadPath)) {
            if (!@mkdir($uploadPath, 0775, true)) {
                return ['ok' => false, 'filename' => '', 'error' => 'cannot_create_upload_dir'];
            }
        }
        if (!is_writable($uploadPath)) {
            @chmod($uploadPath, 0775); // coba perbaiki permission
            if (!is_writable($uploadPath)) {
                return ['ok' => false, 'filename' => '', 'error' => 'upload_dir_not_writable'];
            }
        }

        // 2) Konfigurasi upload
        $config = [
            'upload_path'      => $uploadPath,
            'allowed_types'    => 'gif|jpg|jpeg|png|webp',
            'max_size'         => 4096,        // 4MB; seringnya file HP > 1MB
            'file_ext_tolower' => true,
            'detect_mime'      => true,
            'mod_mime_fix'     => true,
            'remove_spaces'    => true,
            'encrypt_name'     => true,        // nama acak
            'overwrite'        => false,
        ];

        // 3) Inisialisasi library setiap kali dipakai
        $this->load->library('upload');
        $this->upload->initialize($config, true);

        // 4) Eksekusi upload
        if (!$this->upload->do_upload($field)) {
            $err = $this->upload->display_errors('', '');
            log_message('error', '[UPLOAD] gagal: ' . $err);
            return ['ok' => false, 'filename' => '', 'error' => $err ?: 'upload_failed'];
        }

        $data = $this->upload->data();
        // Kembalikan hanya nama file (untuk disimpan di DB)
        return ['ok' => true, 'filename' => $data['file_name'], 'error' => ''];
    }

    public function add()
    {
        $categoryId   = $this->input->post('category', true);
        $categoryName = $this->getCategoryNameById($categoryId);

        $upload = $this->upload_image('image');

        // Jika user pilih file tapi gagal upload (bukan “no file selected”), tampilkan error dan jangan insert
        if (!$upload['ok'] && $upload['error'] !== 'no_file_selected') {
            $this->session->set_flashdata('error', 'Upload gambar gagal: ' . $upload['error']);
            return redirect('products');
        }

        $data = [
            'product_category_id'   => $categoryId,
            'product_category_name' => $categoryName,
            'product_images'        => $upload['ok'] ? $upload['filename'] : '', // boleh kosong jika tidak wajib gambar
            'product_favorite'      => $this->input->post('featured_status') ? 'yes' : 'no'
        ];

        // Validasi minimal
        if (!$data['product_category_id']) {
            $this->session->set_flashdata('error', 'Kategori wajib dipilih.');
            return redirect('products');
        }

        $this->general_model->insert($this->tableProducts, $data);
        $this->session->set_flashdata('success', 'Produk berhasil ditambahkan.');
        redirect('products');
    }

    public function update_product($id)
    {
        $categoryId   = $this->input->post('category', true);
        $categoryName = $this->getCategoryNameById($categoryId);

        $upload   = $this->upload_image('image');
        $existing = $this->input->post('existing_image', true) ?: '';
        $imageToUse = $upload['ok'] ? $upload['filename'] : $existing;

        // Jika user memilih file baru tetapi gagal upload → tampilkan error, jangan lanjut update
        if (!$upload['ok'] && $upload['error'] !== 'no_file_selected') {
            $this->session->set_flashdata('error', 'Upload gambar gagal: ' . $upload['error']);
            return redirect('products/update/' . $id);
        }

        $data = [
            'product_category_id'   => $categoryId,
            'product_category_name' => $categoryName,
            'product_images'        => $imageToUse,
            'product_favorite'      => $this->input->post('featured_status') ? 'yes' : 'no'
        ];

        if (!$data['product_category_id']) {
            $this->session->set_flashdata('error', 'Kategori wajib dipilih.');
            return redirect('products/update/' . $id);
        }

        $this->general_model->update($this->tableProducts, $data, $this->pk, $id);
        $this->session->set_flashdata('success', 'Produk berhasil diperbarui.');
        redirect('products');
    }


    private function getCategoryNameById($id)
    {
        $row = $this->general_model->get_where_one($this->tableCategories, 'category_id', $id);
        return $row ? $row->category_name : '';
    }


    public function delete($id)
    {
        $this->general_model->delete($this->tableProducts, $this->pk, $id);
        redirect('products');
    }
}
