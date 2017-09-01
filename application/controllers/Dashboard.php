<?php
	defined('BASEPATH') OR exit ('No direct script access allowed');
	class Dashboard extends CI_COntroller{

		function __construct() {
	        parent::__construct();
		   //   if (!$this->session->userdata('admin_logged_in')){
		   //      redirect('auth/login');
		   //   }
	     }
 
		public function index()
		{
			$page['title'] 				= "Dashboard";

			$data['total_revenue']		= $this->db->select('sum(total) as total')->from('transaction_income')
											->get()->row()->total;
			$data['total_operasional']  = $this->db->select('sum(total) as total')->from('transaction_outcome')->where(array('category_id' => 1))
											->get()->row()->total;
			$data['total_modal']  		= $this->db->select('sum(total) as total')->from('transaction_outcome')->where(array('category_id' => 2))
											->get()->row()->total;
			$data['total_entertainment']  = $this->db->select('sum(total) as total')->from('transaction_outcome')->where(array('category_id' => 8))
											->get()->row()->total;
			$data['total_outcome']		= $data['total_operasional'] + $data['total_entertainment'];


			$data['gaji']				= 1800000;
			$data['total_gaji']			= 1800000*8;
			$data['member']				= $this->db->get('member')->result_array();

			$data['sedekah']			= 0.025 * $data['total_gaji'];

			$data['bagi_hasil']		    = $data['total_revenue'] - $data['total_gaji'] - $data['sedekah'] - $data['total_outcome'];


			$data['previous_modal']		= 0 ;
			$data['income_modal']		= 4 / 9 * $data['bagi_hasil'] ;
			$data['saldo_modal']		= $data['income_modal'] - $data['total_modal'];

			$data['income_deviden']		= 5 / 9 * $data['bagi_hasil'] ;

			$this->load->view('template/header');
			$this->load->view('template/navbar', $page);
			$this->load->view('dashboard/index', $data);
			$this->load->view('template/footer');
		}
	}