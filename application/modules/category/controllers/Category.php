<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Dashboard Controller
 */
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

    // Display all categories
    public function index()
    {
        $data['title'] = 'Manage Categories';
        $data['category'] = $this->general_model->get_all_category(); // Get all category from the model

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('category/category', $data);  // Load the category management view
        $this->load->view('templates/footer');
    }

    // Add new category
    public function add()
    {
        $data = [
            'category_name' => $this->input->post('category_name')
        ];

        $this->general_model->insert_category($data); // Insert category into the database
        redirect('category');
    }

    // Edit category
    public function edit($id)
    {
        $category = $this->general_model->get_category_by_id($id); // Get category by ID
        echo json_encode($category); // Send category data as JSON
    }

    // Update category
    public function update()
    {
        $id = $this->input->post('category_id');
        $data = [
            'category_name' => $this->input->post('category_name')
        ];

        $this->general_model->update_category($id, $data); // Update category in the database
        redirect('category');
    }

    // Delete category
    public function delete($id)
    {
        $this->general_model->delete_category($id); // Delete the category from the database
        redirect('category');
    }
}



/* End of file Dashboard.php */
/* Location: ./application/modules/hod/controllers/Dashboard.php */
