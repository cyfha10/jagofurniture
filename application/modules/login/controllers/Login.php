<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('general_model'); // Load General_model
		$this->load->library('session');
	}

	public function index()
	{
		$data['title'] = 'Login Administrator';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('login', $data);
		$this->load->view('templates/auth_footer');
	}

	public function do_login()
	{
		// Mengambil input values dari form login
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// Mengambil data user berdasarkan username
		// Menambahkan parameter ketiga ($id), misalnya menggunakan username untuk pencarian
		$user = $this->general_model->get_where_one('users', ['username' => $username], 'username');

		// Jika user ditemukan dan password cocok
		if ($user && password_verify($password, $user->password)) {
			// Menyimpan data user di session
			$this->session->set_userdata('user_id', $user->id);
			$this->session->set_userdata('username', $user->username);

			// Redirect ke dashboard
			redirect('dashboard');
		} else {
			// Jika login gagal, tampilkan pesan error
			$this->session->set_flashdata('error', 'Invalid username or password');
			redirect('login');
		}
	}


	// Logout function
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
