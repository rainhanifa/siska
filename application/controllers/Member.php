<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Member extends CI_Controller {
		function __construct() {
	        parent::__construct();
		     // if (!$this->session->userdata('admin_logged_in')){
		     //    redirect('auth/login');
		     // }
	    }

		public function index(){
			$page['title']		  = "Member";
			$data['members']	  = $this->db->get('member')->result_array();

			$this->load->view('template/header');
			$this->load->view('template/navbar', $page);
			$this->load->view('member/list',$data);
			$this->load->view('template/footer');
			
		}

		public function add(){
			$page['title']		  = "New Member";

			//detail
			$this->load->view('template/header');
			$this->load->view('template/navbar', $page);
			$this->load->view('member/add');
			$this->load->view('template/footer');
			
		}

		public function edit($id){
			$where 				= array('id' => $id);
			$data['member']		= $this->db->get_where('member', $where)->result_array();
			$page['title']		= "Edit Member";
			//detail
			$this->load->view('template/header');
			$this->load->view('template/navbar', $page);
			$this->load->view('member/edit', $data);
			$this->load->view('template/footer');
			
		}

		public function detail($id){
			$where 				= array('id' => $id);
			$data['member']	= $this->db->get_where('member', $where)->result_array();
			$page['title']		= "Detail Member";
			//detail
			$this->load->view('template/header');
			$this->load->view('template/navbar', $page);
			$this->load->view('member/detail', $data);
			$this->load->view('template/footer');
			
		}

		public function process_add(){
			$name				=	$this->input->post('name');
			$job_desc			=	$this->input->post('job_desc');
			$email				=	$this->input->post('email');
			$phone				=	$this->input->post('phone');
			$address			=	$this->input->post('address');
			$gender				=	$this->input->post('gender');
			$pob				=	$this->input->post('pob');
			$member_since		=	date("Y-m-d H:i:s", strtotime($this->input->post('member_since')));
			$dob				=	date("Y-m-d H:i:s", strtotime($this->input->post('dob')));

			$member_data	=	array("name"	=> $name,
										"job_desc" => $job_desc,
										"email" => $email,
										"phone" => $phone,
										"address" => $address,
										"gender" => $gender,
										"place_of_birth" => $pob,
										"date_of_birth" => $dob
									);
			$this->db->insert('member', $member_data);

			redirect("member");
		}
		public function process_edit(){
			$id 				=	$this->input->post('id');
			$name				=	$this->input->post('name');
			$job_desc			=	$this->input->post('job_desc');
			$email				=	$this->input->post('email');
			$phone				=	$this->input->post('phone');
			$address			=	$this->input->post('address');
			$gender				=	$this->input->post('gender');
			$pob				=	$this->input->post('pob');
			$member_since		=	date("Y-m-d H:i:s", strtotime($this->input->post('member_since')));
			$dob				=	date("Y-m-d H:i:s", strtotime($this->input->post('dob')));

			$member_data	=	array("name"	=> $name,
										"job_desc" => $job_desc,
										"email" => $email,
										"phone" => $phone,
										"address" => $address,
										"gender" => $gender,
										"place_of_birth" => $pob,
										"date_of_birth" => $dob
									);
			$this->db->where('id',$id);
			if($this->db->update('member', $member_data)){
				redirect("member");	
			}

			redirect("member");
		}
}