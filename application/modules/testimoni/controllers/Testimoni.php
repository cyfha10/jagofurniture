<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Testimoni extends MX_Controller
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

    // Display all testimonials
    public function index()
    {
        $data['title'] = 'Manage Testimonials';
        $data['testimonis'] = $this->general_model->get_all_testimoni(); // Get all testimonis from the model

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('testimoni/testimoni', $data);  // Load the testimonial management view
        $this->load->view('templates/footer');
    }

    // Add new testimoni
    public function add()
    {
        $data = [
            'testimoni_images' => $this->upload_image(),
            'testimoni_rate' => $this->input->post('rate'),
            'testimoni_desc' => $this->input->post('desc'),
            'testimoni_name' => $this->input->post('name'),
            'testimoni_place' => $this->input->post('place')
        ];

        $this->general_model->insert_testimoni($data); // Insert testimoni into the database
        redirect('testimoni');
    }

    // Edit testimoni
    public function edit($id)
    {
        $data['testimoni'] = $this->general_model->get_testimoni_by_id($id); // Get testimoni by ID
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('testimoni/edit', $data);  // Load the edit testimoni view
        $this->load->view('templates/footer');
    }

    // Update testimoni
    public function update()
    {
        $id = $this->input->post('testimoni_id');
        $data = [
            'testimoni_images' => $this->upload_image(),
            'testimoni_rate' => $this->input->post('rate'),
            'testimoni_desc' => $this->input->post('desc'),
            'testimoni_name' => $this->input->post('name'),
            'testimoni_place' => $this->input->post('place')
        ];

        $this->general_model->update_testimoni($id, $data); // Update testimoni in the database
        redirect('testimoni');
    }

    // Delete testimoni
    public function delete($id)
    {
        $this->general_model->delete_testimoni($id); // Delete the testimoni from the database
        redirect('testimoni');
    }

    // Handle image upload
    private function upload_image()
    {
        $config['upload_path'] = './assets/images/testimoni/';
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
