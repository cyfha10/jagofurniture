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

    // Display all products
    public function index()
    {
        $data['title'] = 'Product Management';
        $data['products'] = $this->general_model->get_all_products(); // Get all products from the model
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('products', $data);  // Load the product management view
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

    // Update existing product
    public function update($id)
    {
        $data = [
            'product_category_id' => $this->input->post('category'),  // Link to the product category
            'product_category_name' => $this->input->post('category_name'), // category name
            'product_images' => $this->upload_image(), // Handle image upload
            'product_favorite' => $this->input->post('featured_status') ? 'yes' : 'no' // Convert to 'yes' or 'no'
        ];

        $this->general_model->update_product($id, $data); // Update product in the database
        redirect('products');
    }

    // Delete product
    public function delete($id)
    {
        $this->general_model->delete_product($id); // Delete the product from the database
        redirect('products');
    }

    // Handle image upload
    private function upload_image()
    {
        $config['upload_path'] = './assets/admin/images/product/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024; // 1 MB max
        $config['file_name'] = uniqid();

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        }

        return ''; // Return empty string if upload fails
    }
}
