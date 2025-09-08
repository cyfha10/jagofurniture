<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
			$data['testimoni'] 				= $this->General_model->get_limit("tb_testimoni","testimoni_id", "DESC", "20");

	    $this->load->view('template/header', $data);
	    $this->load->view('page/beranda', $data);
	    $this->load->view('template/footer', $data);
	}

	public function product()
	{
			$slug 									= $link = $this->uri->segment(1);
			$get_header 						= $this->General_model->get_ones("tb_header", "slug = '$slug'");

			$data['slug'] 					= $slug;
			$data['tittle'] 				= $get_header->header_tittle;
			$data['description'] 		= $get_header->header_description;
			$data['keywords'] 			= $get_header->header_keywords;
			$data['product'] 				= $this->General_model->get("tb_product");
			$data['category'] 			= $this->General_model->get("tb_product_category");



	    $this->load->view('template/header', $data);
	    $this->load->view('page/product', $data);
	    $this->load->view('template/footer', $data);
	}

	public function categories($slugs = null)
	{
			$slug 									= $link = $this->uri->segment(1);
			$get_header 						= $this->General_model->get_ones("tb_header", "slug = '$slug'");

			if ($slugs != '') {
					$data['slug'] 					= $slug;
					$data['tittle'] 				= $get_header->header_tittle;
					$data['description'] 		= $get_header->header_description;
					$data['keywords'] 			= $get_header->header_keywords;
					$data['category'] 			= $this->General_model->get("tb_product_category");
					
					$get_categories 				= $this->General_model->get_ones("tb_product_category", "category_slug = '$slugs'");
					$category_name 					= $get_categories->category_name;
					$data['product'] 				= $this->General_model->get_one("tb_product", "product_category_name = '$category_name'");


					$this->load->view('template/header', $data);
			    $this->load->view('page/category_product', $data);
			    $this->load->view('template/footer', $data);
			    
			}

			
	}


	public function about()
	{
			$slug 									= $link = $this->uri->segment(1);
			$get_header 						= $this->General_model->get_ones("tb_header", "slug = '$slug'");

			$data['slug'] 					= $slug;
			$data['tittle'] 				= $get_header->header_tittle;
			$data['description'] 		= $get_header->header_description;
			$data['keywords'] 			= $get_header->header_keywords;
			$data['about'] 					= $this->General_model->get_ones("tb_about", "about_id = 1");

			

	    $this->load->view('template/header', $data);
	    $this->load->view('page/about', $data);
	    $this->load->view('template/footer', $data);
	}

	public function blog()
	{
			$slug 									= $link = $this->uri->segment(1);
			$get_header 						= $this->General_model->get_ones("tb_header", "slug = '$slug'");

			$data['slug'] 					= $slug;
			$data['tittle'] 				= $get_header->header_tittle;
			$data['description'] 		= $get_header->header_description;
			$data['keywords'] 			= $get_header->header_keywords;
			$data['blog'] 					= $this->General_model->get_limit("tb_blog","blog_id", "DESC", "6");

			

	    $this->load->view('template/header', $data);
	    $this->load->view('page/blog', $data);
	    $this->load->view('template/footer', $data);
	}

	

}
