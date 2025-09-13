<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
{
    private $table = 'tb_banner';
    private $pk    = 'banner_id';

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
        $this->load->model('General_model', 'gm');
        $this->load->library(['upload', 'session']);
        $this->load->helper(['url', 'form', 'security']);
    }

    // LIST
    public function index()
    {
        $data['title'] = 'Banner Management';
        $data['rows']  = $this->gm->get_one_sort($this->table, [], $this->pk, 'DESC');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('banner/banner', $data);
        $this->load->view('templates/footer');
    }

    // LIST + buka modal edit
    public function update($id)
    {
        $data['title'] = 'Banner Management';
        $data['rows']  = $this->gm->get_one_sort($this->table, [], $this->pk, 'DESC');
        $data['row']   = $this->gm->get_where_one($this->table, $this->pk, (int)$id);
        if (!$data['row']) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
            redirect('banner');
            return;
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('banner/banner', $data);
        $this->load->view('templates/footer');
    }

    // CREATE (dari modal Add)
    public function add()
    {
        if ($this->input->method() !== 'post') {
            redirect('banner');
            return;
        }

        $title   = $this->security->xss_clean($this->input->post('banner_tittle', true));
        $sub     = $this->security->xss_clean($this->input->post('banner_sub', true));
        $btn     = $this->security->xss_clean($this->input->post('banner_button', true));
        $btnlink = $this->security->xss_clean($this->input->post('banner_buttonlink', true));
        $cat     = $this->security->xss_clean($this->input->post('banner_category', true));

        // Upload config
        $config = [
            'upload_path'      => './assets/images/',
            'allowed_types'    => 'jpg|jpeg|png|gif',
            'max_size'         => 4096,
            'encrypt_name'     => false,        // <-- ubah
            'file_ext_tolower' => true,         // ekstensi ke huruf kecil
            'overwrite'        => false         // jangan timpa file lama
        ];
        $this->upload->initialize($config);


        $imgPath = '';
        if (!is_dir($config['upload_path'])) {
            @mkdir($config['upload_path'], 0755, true);
        }

        if (!empty($_FILES['banner_images']['name'])) {
            if ($this->upload->do_upload('banner_images')) {
                $dataUpload = $this->upload->data();
                $imgPath = 'assets/images/' . $dataUpload['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
                redirect('banner');
                return;
            }
        } else {
            $this->session->set_flashdata('error', 'Gambar banner wajib diunggah.');
            redirect('banner');
            return;
        }

        $insert = [
            'banner_tittle'      => $title,
            'banner_sub'         => $sub,
            'banner_images'      => $imgPath,
            'banner_button'      => $btn,
            'banner_buttonlink'  => $btnlink,
            'banner_category'    => $cat ?: 'banner 1'
        ];

        if ($this->gm->insert($this->table, $insert)) {
            $this->session->set_flashdata('success', 'Banner berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambah banner.');
        }
        redirect('banner');
    }

    // UPDATE (dari modal Edit)
    public function update_banner($id)
    {
        if ($this->input->method() !== 'post') {
            redirect('banner');
            return;
        }

        $row = $this->gm->get_where_one($this->table, $this->pk, (int)$id);
        if (!$row) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
            redirect('banner');
            return;
        }

        $title   = $this->security->xss_clean($this->input->post('banner_tittle', true));
        $sub     = $this->security->xss_clean($this->input->post('banner_sub', true));
        $btn     = $this->security->xss_clean($this->input->post('banner_button', true));
        $btnlink = $this->security->xss_clean($this->input->post('banner_buttonlink', true));
        $cat     = $this->security->xss_clean($this->input->post('banner_category', true));
        $oldImg  = $this->input->post('old_banner_images');

        // Upload config
        $config = [
            'upload_path'      => './assets/images/',
            'allowed_types'    => 'jpg|jpeg|png|gif',
            'max_size'         => 4096,
            'encrypt_name'     => false,        // <-- ubah
            'file_ext_tolower' => true,         // ekstensi ke huruf kecil
            'overwrite'        => false         // jangan timpa file lama
        ];
        $this->upload->initialize($config);


        $imgPath = $oldImg;
        if (!is_dir($config['upload_path'])) {
            @mkdir($config['upload_path'], 0755, true);
        }

        if (!empty($_FILES['banner_images']['name'])) {
            if ($this->upload->do_upload('banner_images')) {
                $dataUpload = $this->upload->data();
                $imgPath = 'assets/images/' . $dataUpload['file_name'];
                // (opsional) hapus file lama jika ingin
                if ($oldImg && file_exists(FCPATH . $oldImg)) @unlink(FCPATH . $oldImg);
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
                redirect('banner/update/' . $id);
                return;
            }
        }

        $update = [
            'banner_tittle'      => $title,
            'banner_sub'         => $sub,
            'banner_images'      => $imgPath,
            'banner_button'      => $btn,
            'banner_buttonlink'  => $btnlink,
            'banner_category'    => $cat ?: 'banner 1'
        ];

        if ($this->gm->update_where($this->table, $update, [$this->pk => (int)$id])) {
            $this->session->set_flashdata('success', 'Banner berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui banner.');
        }
        redirect('banner');
    }

    // DELETE
    public function delete($id)
    {
        $row = $this->gm->get_where_one($this->table, $this->pk, (int)$id);
        if ($row) {
            // (opsional) hapus file
            // if (!empty($row->banner_images) && file_exists(FCPATH.$row->banner_images)) @unlink(FCPATH.$row->banner_images);
            $this->gm->delete($this->table, $this->pk, (int)$id);
            $this->session->set_flashdata('success', 'Banner terhapus.');
        } else {
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
        }
        redirect('banner');
    }
}
