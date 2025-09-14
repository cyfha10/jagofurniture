<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MX_Controller
{
    private $tableAdmin 			= 'users';
    private $pk              	= 'id';

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
        $this->load->model('general_model');
        $this->load->helper(['url', 'form']); // url_title() untuk slug
        $this->load->library('session');
    }

    // Ambil semua kategori (untuk index & ketika buka modal edit)
    private function _load_common_data()
    {
        // urut berdasar nama kategori ASC; ganti 'admin_name' jika kolomnya beda
        $data['categories'] = $this->general_model->get_sort($this->tableAdmin, 'id');
        return $data;
    }

    public function index()
    {
        $data = $this->_load_common_data();
        $data['title'] = 'Administrator';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/admin', $data);
        $this->load->view('templates/footer');
    }

    // Create
    public function add()
    {
        $email_admin = $this->input->post('email_admin', true);
        $username = $this->input->post('username', true);
        $password_standard = '#@Admin4321';
        $password = password_hash($password_standard, PASSWORD_DEFAULT);

        if (!$username) {
            $this->session->set_flashdata('error', 'Username wajib diisi.');
            return redirect('admin');
        }


        $data = [
            'email' => $email_admin,
            'username' => $username,
            'password' => $password,
        ];

        $this->general_model->insert($this->tableAdmin, $data);
        $this->session->set_flashdata('success', 'User Admin berhasil ditambahkan.');
        redirect('admin');
    }

    // Delete
    public function delete($id)
    {
        $this->general_model->delete($this->tableAdmin, $this->pk, $id);
        $this->session->set_flashdata('success', 'Data Admin berhasil dihapus.');
        redirect('admin');
    }
}
