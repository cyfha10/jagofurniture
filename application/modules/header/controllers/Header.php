<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Header extends CI_Controller
{
    private $table = 'tb_header';
    private $pk    = 'header_id';
    private $upload_path = 'assets/images/header/'; // ganti sesuai struktur proyekmu

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('General_model', 'gm');
        $this->load->helper(['url', 'form', 'security']);
        $this->load->library(['session', 'upload']);

        if (!is_dir(FCPATH . $this->upload_path)) {
            @mkdir(FCPATH . $this->upload_path, 0755, true);
        }
    }

    // LIST
    public function index()
    {
        $data['title'] = 'Header Management';
        // Ambil semua header (DESC by id)
        $data['headers'] = $this->gm->get_one_sort($this->table, [], $this->pk, 'DESC');
        // Jika kamu pakai template layout, panggil di sini:
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('header/header', $data);
        $this->load->view('templates/footer');
    }

    // LIST + buka modal edit untuk id tertentu
    public function update($id)
    {
        $data['title'] = 'Header Management';
        $data['headers'] = $this->gm->get_one_sort($this->table, [], $this->pk, 'DESC');
        $data['header_row'] = $this->gm->get_where_one($this->table, $this->pk, (int)$id);
        if (!$data['header_row']) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
            redirect('header');
            return;
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('header/header', $data);
        $this->load->view('templates/footer');
    }

    // PROSES UPDATE
    public function update_header($id)
    {
        if ($this->input->method() !== 'post') {
            redirect('header');
            return;
        }

        $row = $this->gm->get_where_one($this->table, $this->pk, (int)$id);
        if (!$row) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
            redirect('header');
            return;
        }

        // Ambil input
        $slug   = $this->security->xss_clean($this->input->post('slug', true));
        $page   = $this->security->xss_clean($this->input->post('header_page', true));
        $title  = $this->security->xss_clean($this->input->post('header_tittle', true));
        $desc   = $this->security->xss_clean($this->input->post('header_description', true));
        $keys   = $this->security->xss_clean($this->input->post('header_keywords', true));
        $existing_logo = $this->security->xss_clean($this->input->post('existing_logo', true));

        // Handle upload logo (opsional)
        $logo_name = $existing_logo ?: 'logo.png';
        if (!empty($_FILES['logo']['name'])) {
            $up = $this->_do_upload('logo');
            if ($up['status']) {
                $logo_name = $up['file'];
                // hapus file lama jika bukan default dan ada file-nya
                if (
                    !empty($existing_logo) && $existing_logo !== 'logo.png' &&
                    file_exists(FCPATH . $this->upload_path . $existing_logo)
                ) {
                    @unlink(FCPATH . $this->upload_path . $existing_logo);
                }
            } else {
                $this->session->set_flashdata('error', $up['error']);
                redirect('header/update/' . $id);
                return;
            }
        }

        $update = [
            'slug'               => $slug,
            'header_page'        => $page,
            'header_logo'        => $logo_name,
            'header_tittle'      => $title,
            'header_description' => $desc,
            'header_keywords'    => $keys,
        ];

        if ($this->gm->update_where($this->table, $update, [$this->pk => (int)$id])) {
            $this->session->set_flashdata('success', 'Header berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data.');
        }
        redirect('header');
    }

    // Helper upload
    private function _do_upload($field)
    {
        $config = [
            'upload_path'   => FCPATH . $this->upload_path,
            'allowed_types' => 'gif|jpg|jpeg|png|webp',
            'max_size'      => 2048, // KB
            'encrypt_name'  => true,
        ];
        $this->upload->initialize($config);
        if ($this->upload->do_upload($field)) {
            return ['status' => true, 'file' => $this->upload->data('file_name')];
        }
        return ['status' => false, 'error' => $this->upload->display_errors('', '')];
    }
}
