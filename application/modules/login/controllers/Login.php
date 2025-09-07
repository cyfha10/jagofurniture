<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* HODController
*/
class Login extends MX_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->view('login');
	}
}

/* End of file HODController.php */
/* Location: ./application/modules/hod/controller/HODController.php */