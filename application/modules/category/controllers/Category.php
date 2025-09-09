<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to the login page
            redirect('login');
        }
        $this->load->model('general_model'); // Load General_model
    }

    // Display all categories (used in index and update)
    private function _load_common_data()
    {
        // Ambil data kategori untuk ditampilkan
        $data['category'] = $this->general_model->get_all_category(); // Ambil semua kategori
        return $data;
    }

    // Display all categories (Index)
    public function index()
    {
        $data = $this->_load_common_data(); // Mengambil data kategori menggunakan helper function

        $data['title'] = 'Category Management';

        // Load views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('category/category', $data);  // Load the category management view
        $this->load->view('templates/footer');
    }

    // Add new category
    public function add()
    {
        // Handle the form submission for adding a new category
        $data = [
            'category_name' => $this->input->post('category_name'),
            'category_slug' => $this->input->post('category_slug')  // Ambil input slug
        ];

        $this->general_model->insert_category($data); // Insert category into the database
        redirect('category');
    }


    public function update($id)
    {
        // Mengambil data kategori untuk ditampilkan
        $data['category'] = $this->general_model->get_category_by_id($id); // Ambil kategori berdasarkan ID

        if (!$data['category']) {
            show_404(); // Jika tidak ada data kategori, tampilkan error 404
        }

        // Memuat view dan menampilkan data kategori yang sudah ada
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('category/category', $data);  // Mengirim data kategori ke view
        $this->load->view('templates/footer');
    }



    // Update existing category
    public function update_category($id)
    {
        $data = [
            'category_name' => $this->input->post('category_name'),
            'category_slug' => $this->input->post('category_slug') // Ambil data category_slug
        ];

        // Update category di database
        $this->general_model->update_category($id, $data);

        // Redirect ke halaman kategori setelah update
        redirect('category');
    }


    // Delete category
    public function delete($id)
    {
        $this->general_model->delete_category($id); // Delete the category from the database
        redirect('category');
    }
}
