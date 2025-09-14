<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Dashboard Controller
 */
class Dashboard extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('General_model', 'gm');

        // Check if user is logged in
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to the login page
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['count_product'] = $this->gm->count('tb_product');
        $data['count_fav'] = $this->gm->count_where("tb_product", "product_favorite = 'yes'");
        $data['count_blogs'] = $this->gm->count('tb_blog');
        // Load the header, dashboard, and footer views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/navbar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
}

/* End of file Dashboard.php */
/* Location: ./application/modules/hod/controllers/Dashboard.php */
