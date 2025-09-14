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

    // Tampilkan halaman index + modal edit terbuka untuk ID tertentu
    public function update($id)
    {
        $data = $this->_load_common_data();

        $data['admin'] = $this->general_model->get_where_one($this->tableAdmin, $this->pk, $id);
        if (!$data['admin']) {
            show_404();
        }

        $data['title'] = 'Category Management';

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

    // Update (proses submit)
    public function update_admin($id)
    {
        $name = $this->input->post('admin_name', true);
        $slug = $this->input->post('admin_slug', true);

        if (!$name) {
            $this->session->set_flashdata('error', 'Nama kategori wajib diisi.');
            return redirect('admin/update/' . $id);
        }

        if (!$slug) {
            $slug = url_title($name, '-', true);
        }

        $data = [
            'admin_name' => $name,
            'admin_slug' => $slug,
        ];

        // General_model->update($table, $data, $whereField, $id)
        $this->general_model->update($this->tableAdmin, $data, $this->pk, $id);
        $this->session->set_flashdata('success', 'Kategori berhasil diperbarui.');
        redirect('admin');
    }

    // Delete
    public function delete($id)
    {
        $this->general_model->delete($this->tableAdmin, $this->pk, $id);
        $this->session->set_flashdata('success', 'Kategori berhasil dihapus.');
        redirect('admin');
    }
}
