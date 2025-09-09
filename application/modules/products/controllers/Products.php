<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends MX_Controller
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

    // Display all products (used in index and update)
    private function _load_common_data()
    {
        // Ambil data produk dan kategori untuk ditampilkan
        $data['products'] = $this->general_model->get_all_products(); // Ambil semua produk
        $data['categories'] = $this->general_model->get_all_category(); // Ambil kategori produk untuk dropdown
        return $data;
    }

    // Display all products (Index)
    public function index()
    {
        $data = $this->_load_common_data(); // Mengambil data produk dan kategori menggunakan helper function

        $data['title'] = 'Product Management';

        // Load views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('products', $data);  // Load the product management view
        $this->load->view('templates/footer');
    }

    // Edit product (Update)
    public function update($id)
    {
        $data = $this->_load_common_data(); // Mengambil data produk dan kategori menggunakan helper function

        // Ambil produk berdasarkan ID
        $data['product'] = $this->general_model->get_product_by_id($id); // Ambil produk berdasarkan ID

        // Tampilkan modal edit dengan data yang sudah ada
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('products', $data);  // Load the product management view with edit data
        $this->load->view('templates/footer');
    }

    // Add new product
    public function add()
    {
        // Handle the form submission for adding a new product
        $data = [
            'product_category_id' => $this->input->post('category'),  // Link to the product category
            'product_category_name' => $this->input->post('category_name'), // category name
            'product_images' => $this->upload_image(), // Handle image upload
            'product_favorite' => $this->input->post('featured_status') ? 'yes' : 'no' // Convert to 'yes' or 'no'
        ];

        $this->general_model->insert_product($data); // Insert product into the database
        redirect('products');
    }

    // Handle image upload
    private function upload_image()
    {
        // Upload configuration
        $config['upload_path'] = './assets/images/product/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024; // 1 MB max
        $config['file_name'] = uniqid();

        // Load upload library
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        }

        return ''; // Return empty string if upload fails
    }

    // Update existing product
    public function update_product($id)
    {
        // Ambil data dari form
        $data = [
            'product_category_id' => $this->input->post('category'),  // ID kategori yang dipilih
            'product_category_name' => $this->input->post('category_name'), // Nama kategori yang dipilih
            'product_images' => $this->upload_image() ?: $this->input->post('existing_image'), // Gunakan gambar baru jika ada, jika tidak tetap gambar lama
            'product_favorite' => $this->input->post('featured_status') ? 'yes' : 'no' // Jika dicentang, set jadi 'yes'
        ];

        // Update produk di database
        $this->general_model->update_product($id, $data);

        // Redirect ke halaman produk setelah update
        redirect('products');
    }


    // Delete product
    public function delete($id)
    {
        $this->general_model->delete_product($id); // Delete the product from the database
        redirect('products');
    }
}
