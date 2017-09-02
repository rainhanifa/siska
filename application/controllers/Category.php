<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Category extends CI_Controller {
		function __construct() {
	        parent::__construct();
		     // if (!$this->session->userdata('admin_logged_in')){
		     //    redirect('auth/login');
		     // }
	    }

		public function index(){
			$page['title']		  = "Category";
			$data['categories'] = $this->db->get('category')->result_array();

			$this->load->view('template/header');
			$this->load->view('template/navbar', $page);
			$this->load->view('category/list',$data);
			$this->load->view('template/footer');
			
		}

		public function process_add(){
			$name 			=	$this->input->post('name');

			$category_data	=	array("name"	=> $name);
			
			$this->db->insert('category', $category_data);

			redirect("category");
		}
}