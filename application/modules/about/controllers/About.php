<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to the login page
            redirect('login');
        }
        // Load the General_model
        $this->load->model('General_model');
    }

    // View About data
    public function index()
    {
        // Get the first (or only) record of the 'tb_about' table
        $data['about'] = $this->General_model->get('tb_about');
        $data['title'] = 'About Management';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('about/about', $data);
        $this->load->view('templates/footer');
    }

    // Update About Data
    public function update()
    {
        // Check if form is submitted
        if ($this->input->post()) {
            $data = array(
                'about_tittle' => $this->input->post('about_tittle'),
                'about_sub' => $this->input->post('about_sub'),
                'about_img_header' => $this->input->post('about_img_header'),
                'about_desc_1' => $this->input->post('about_desc_1'),
                'about_desc_2' => $this->input->post('about_desc_2'),
                'about_img_1' => $this->input->post('about_img_1'),
                'about_desc_3' => $this->input->post('about_desc_3'),
                'about_alamat' => $this->input->post('about_alamat'),
                'about_whatsapp' => $this->input->post('about_whatsapp'),
                'about_img_2' => $this->input->post('about_img_2'),
                'about_desc_footer' => $this->input->post('about_desc_footer')
            );

            $about_id = $this->input->post('about_id');
            $where = array('about_id' => $about_id);
            $updated = $this->General_model->update('tb_about', $data, 'about_id', $about_id);

            if ($updated) {
                // Redirect to the About page or show a success message
                redirect('about');
            }
        }
    }
}
