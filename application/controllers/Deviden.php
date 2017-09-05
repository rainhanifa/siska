<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Deviden extends CI_Controller {
		function __construct() {
	        parent::__construct();
		     // if (!$this->session->userdata('admin_logged_in')){
		     //    redirect('auth/login');
		     // }
	    }

		public function index(){
			$page['title']		  = "Deviden";
			$data['member']		  = $this->db->get('member')->result_array();
			$data['deviden'] = $this->db->select('deviden.*, member.name as name')
									->from('deviden')
									->join('member', "member.id = deviden.member_id")
									->order_by('deviden.deviden_since')
									->get()->result_array();
			$data['grand_total']	= $this->db->select('sum(balance) as balance')->from('deviden')
										->get()->row()->balance;

			$this->load->view('template/header');
			$this->load->view('template/navbar', $page);
			$this->load->view('deviden/list',$data);
			$this->load->view('template/footer');
			
		}

		public function detail($id){
			$page['title']		  = "Transaksi Deviden";

			$where   		 = array("member_id" => $id);
			$data['deviden'] = $this->db->select('transaction_deviden.*, member.name as member_name')
									->from('transaction_deviden')
									->join('member', "member.id = transaction_deviden.member_id")
									->order_by('transaction_deviden.date')
									->where($where)
									->get()->result_array();
			$data['grand_total']	= $this->db->select('balance')->from('deviden')
										->where($where)
										->get()->row()->balance;

			$this->load->view('template/header');
			$this->load->view('template/navbar', $page);
			$this->load->view('deviden/list',$data);
			$this->load->view('template/footer');
			
		}

		public function process_add(){
			$date		=	date("Y-m-d H:i:s", strtotime($this->input->post('date')));
			$member 	=	$this->input->post('member');

			$deviden_data	=	array("member_id"	=> $member,
										"deviden_since" => $date);

			$this->db->insert('deviden', $deviden_data);

			redirect("deviden");
		}
}