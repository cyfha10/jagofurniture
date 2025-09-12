<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends MX_Controller
{
    private $tableCategories = 'tb_product_category';
    private $pk              = 'category_id';

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
        // urut berdasar nama kategori ASC; ganti 'category_name' jika kolomnya beda
        $data['categories'] = $this->general_model->get_sort($this->tableCategories, 'category_name');
        return $data;
    }

    public function index()
    {
        $data = $this->_load_common_data();
        $data['title'] = 'Category Management';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('category/category', $data);
        $this->load->view('templates/footer');
    }

    // Tampilkan halaman index + modal edit terbuka untuk ID tertentu
    public function update($id)
    {
        $data = $this->_load_common_data();

        $data['category'] = $this->general_model->get_where_one($this->tableCategories, $this->pk, $id);
        if (!$data['category']) {
            show_404();
        }

        $data['title'] = 'Category Management';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('category/category', $data);
        $this->load->view('templates/footer');
    }

    // Create
    public function add()
    {
        $name = $this->input->post('category_name', true);
        $slug = $this->input->post('category_slug', true);

        if (!$name) {
            $this->session->set_flashdata('error', 'Nama kategori wajib diisi.');
            return redirect('category');
        }

        // Auto-generate slug jika kosong
        if (!$slug) {
            $slug = url_title($name, '-', true);
        }

        $data = [
            'category_name' => $name,
            'category_slug' => $slug,
        ];

        $this->general_model->insert($this->tableCategories, $data);
        $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan.');
        redirect('category');
    }

    // Update (proses submit)
    public function update_category($id)
    {
        $name = $this->input->post('category_name', true);
        $slug = $this->input->post('category_slug', true);

        if (!$name) {
            $this->session->set_flashdata('error', 'Nama kategori wajib diisi.');
            return redirect('category/update/' . $id);
        }

        if (!$slug) {
            $slug = url_title($name, '-', true);
        }

        $data = [
            'category_name' => $name,
            'category_slug' => $slug,
        ];

        // General_model->update($table, $data, $whereField, $id)
        $this->general_model->update($this->tableCategories, $data, $this->pk, $id);
        $this->session->set_flashdata('success', 'Kategori berhasil diperbarui.');
        redirect('category');
    }

    // Delete
    public function delete($id)
    {
        $this->general_model->delete($this->tableCategories, $this->pk, $id);
        $this->session->set_flashdata('success', 'Kategori berhasil dihapus.');
        redirect('category');
    }
}
