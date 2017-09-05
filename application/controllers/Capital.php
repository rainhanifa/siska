<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Capital extends CI_Controller {
		function __construct() {
	        parent::__construct();
		     // if (!$this->session->userdata('admin_logged_in')){
		     //    redirect('auth/login');
		     // }
	    }

		public function index(){
			$page['title']		  = "Capital";
			$data['transactions'] = $this->db->select('transaction_capital.*, member.name as member_name')
									->from('transaction_capital')
									->join('member', "member.id = transaction_capital.member_id")
									->order_by('transaction_capital.date')
									->get()->result_array();
			$data['grand_total']	= $this->db->select('balance')->from('capital')->order_by('id_capital', 'DESC')->limit(1)->get()->row()->balance;

			$this->load->view('template/header');
			$this->load->view('template/navbar', $page);
			$this->load->view('capital/list',$data);
			$this->load->view('template/footer');
			
		}

		public function add(){
			$page['title']		  = "New Capital";
			$data['transactions'] = $this->db->get('transaction_capital')->result_array();
			$data['members'] = $this->db->get('member')->result_array();

			//detail
			$this->load->view('template/header');
			$this->load->view('template/navbar', $page);
			$this->load->view('capital/add',$data);
			$this->load->view('template/footer');
			
		}

		public function process_add(){
			$date		=	date("Y-m-d H:i:s", strtotime($this->input->post('date')));
			$category 	=	$this->input->post('category');
			$member 	=	$this->input->post('member');
			$total	 	=	$this->input->post('total');
			$description=	$this->input->post('description');

			//jika outcome operasional proyek
			if($category == 0){
				$total = 0 - $total;
			}
			$transaction_data	=	array("date"	=> $date,
											"category_id" => $category,
											"member_id" => $member,
											"total"	=>	$total,
											"description" => $description
									);
			$this->db->insert('transaction_capital', $transaction_data);

			redirect("capital");
		}
}