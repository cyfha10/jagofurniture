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

    private function _load_common_data()
    {
        // Ambil data kategori untuk ditampilkan
        $data['testimonis'] = $this->general_model->get_all_testimoni(); // Ambil semua kategori
        return $data;
    }

    // Display all testimonials
    public function index()
    {
        $data = $this->_load_common_data();
        $data['title'] = 'Manage Testimonials';
        // Get all testimonis from the model

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
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

    // Update testimoni
    public function update_testimoni()
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


    public function update($id)
    {
        // Mengambil data kategori untuk ditampilkan
        $data['testimoni'] = $this->general_model->get_testimoni_by_id($id); // Ambil kategori berdasarkan ID

        if (!$data['testimoni']) {
            show_404(); // Jika tidak ada data kategori, tampilkan error 404
        }

        // Memuat view dan menampilkan data kategori yang sudah ada
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('testimoni/testimoni', $data);  // Mengirim data kategori ke view
        $this->load->view('templates/footer');
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
