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

        // Check if user is logged in
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to the login page
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        // Load the header, dashboard, and footer views
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
}

/* End of file Dashboard.php */
/* Location: ./application/modules/hod/controllers/Dashboard.php */
