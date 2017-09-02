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

			// OPERASIONAL
			$data['previous_operasional'] = 928900;
			$data['total_operasional']  = $this->db->select('sum(total) as total')->from('transaction_outcome')->where(array('category_id' => 1))
											->get()->row()->total;
			$data['total_entertainment']  = $this->db->select('sum(total) as total')->from('transaction_outcome')->where(array('category_id' => 3))
											->get()->row()->total;
			$data['outcome']			= $data['total_operasional'] + $data['total_entertainment'];
			$data['total_outcome']		= $data['outcome'] - $data['previous_operasional'];

			// GAJI
			$data['gaji']				= 2000000;
			$data['total_gaji']			= 2000000*8;
			$data['member']				= $this->db->get('member')->result_array();

			$data['sedekah']			= 0.025 * $data['total_gaji'];


			// BAGI HASIL
			$data['bagi_hasil']		    = $data['total_revenue'] - $data['total_gaji'] - $data['sedekah'] - $data['total_outcome'];


			// MODAL
			$data['previous_modal']		= 3735945 ;
			$data['income_modal']		= 4 / 9 * $data['bagi_hasil'] ;
			$data['outcome_modal']  	= $this->db->select('sum(total) as total')->from('transaction_outcome')->where(array('category_id' => 2))
											->get()->row()->total;
			$data['saldo_modal']		= $data['income_modal'] - $data['outcome_modal'];

			// DEVIDEN
			$data['income_deviden']		= 5 / 9 * $data['bagi_hasil'] ;

			$data['pendapatan_publik']  = $data['total_revenue'] - $data['income_deviden'];

			$this->load->view('template/header');
			//$this->load->view('template/navbar', $page);
			$this->load->view('dashboard/index', $data);
			$this->load->view('template/footer');
		}
	}