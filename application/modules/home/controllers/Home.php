<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* HODController
*/
class Home extends MX_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('General_model');
	}

	public function index()
	{
		$slug 									= $link = $this->uri->segment(1);
		$get_header 						= $this->General_model->get_ones("tb_header", "slug = '$slug'");

		$data['slug'] 					= $slug;
		$data['tittle'] 				= $get_header->header_tittle;
		$data['description'] 		= $get_header->header_description;
		$data['keywords'] 			= $get_header->header_keywords;
		$data['banner1'] 				= $this->General_model->get_one("tb_banner", "banner_category = 'banner 1'");
		$data['banner2'] 				= $this->General_model->get_ones("tb_banner", "banner_category = 'banner 2'");
		$data['banner3'] 				= $this->General_model->get_ones("tb_banner", "banner_category = 'banner 3'");
		$data['product'] 				= $this->General_model->get_limit("tb_product","product_id", "DESC", "3");
		$data['product_fav'] 		= $this->General_model->get_limit_where("tb_product","product_favorite = 'yes'", "product_id", "DESC", "3");

    $this->load->view('header', $data);
    $this->load->view('beranda', $data);
    $this->load->view('footer', $data);
	}

}

/* End of file HODController.php */
/* Location: ./application/modules/hod/controller/HODController.php */