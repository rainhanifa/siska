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

		public function closing(){


	 		//var_dump($source);exit;
	        $pdfFilePath = "Illiyin-Monthly-Report-".date("M-Y").".pdf";
	        //lokasi file css yang akan di load
	        $stylesheet = file_get_contents(FCPATH.'assets/css/bootstrap.min.css');
	 

	        $pdf = $this->m_pdf->load();



			$data['transactions'] = $this->db->select('transaction_income.*, member.name as member_name,
										category.name as category_name')
									->from('transaction_income')
									->join('category', "category.id = transaction_income.category_id")
									->join('member', "member.id = transaction_income.member_id")
									->order_by('transaction_income.date')
									->get()->result_array();
			$data['grand_total']	= $this->db->select('sum(total) as total')->from('transaction_income')->get()->row()->total;
			$income 				= $data['grand_total'];

			$this->load->view('income/report',$data);
	 		
	 		//set source
	 		$html 	 = $this->load->view('income/report',$data, TRUE);


	        $pdf->AddPage('P'); //L to landscape
	        $pdf->WriteHTML($stylesheet, 1);
	        $pdf->WriteHTML($html);

			$data['transactions'] = $this->db->select('transaction_outcome.*, member.name as member_name,
										category.name as category_name')
									->from('transaction_outcome')
									->join('category', "category.id = transaction_outcome.category_id")
									->join('member', "member.id = transaction_outcome.member_id")
									->where("transaction_outcome.category_id = 1 OR transaction_outcome.category_id = 3 ")
									->order_by('transaction_outcome.date')
									->get()->result_array();
			$data['grand_total']	= $this->db->select('sum(total) as total')->from('transaction_outcome')
										->where("transaction_outcome.category_id = 1 OR transaction_outcome.category_id = 3 ")
										->get()->row()->total;
			$outcome 				= $data['grand_total'];

			$data['transactions2'] = $this->db->select('transaction_outcome.*, member.name as member_name,
										category.name as category_name')
									->from('transaction_outcome')
									->join('category', "category.id = transaction_outcome.category_id")
									->join('member', "member.id = transaction_outcome.member_id")
									->where("transaction_outcome.category_id = 2 ")
									->order_by('transaction_outcome.date')
									->get()->result_array();
			$data['grand_total_2']	= $this->db->select('sum(total) as total')->from('transaction_outcome')
										->where("transaction_outcome.category_id = 2 ")
										->get()->row()->total;

			$this->load->view('outcome/report',$data);
	 		
	 		//set source
	 		$html 	 = $this->load->view('outcome/report',$data, TRUE);

	 		
	        $pdf->AddPage('P'); //L to landscape
	        $pdf->WriteHTML($stylesheet, 1);
	        $pdf->WriteHTML($html);
	        

			// GAJI
			$data['gaji']				= 2000000;
			$data['total_gaji']			= 2000000*8;
			$data['member']				= $this->db->get('member')->result_array();

			$data['sedekah']			= 0.025 * $data['total_gaji'];


			$this->load->view('dashboard/report_gaji',$data);
	 		$html 	 = $this->load->view('dashboard/report_gaji',$data, TRUE);

	        $pdf->AddPage('P'); //L to landscape
	        $pdf->WriteHTML($stylesheet, 1);
	        $pdf->WriteHTML($html);


			// BAGI HASIL
			$data['bagi_hasil']		    = $income - $data['total_gaji'] - $data['sedekah'] - $outcome;


			// MODAL
			$data['previous_modal']		= 3735945 ;
			$data['income_modal']		= 4 / 9 * $data['bagi_hasil'] ;
			$data['saldo_modal']		= $data['income_modal'] - $data['grand_total_2'];


			$data['transactions'] = $this->db->select('transaction_capital.*, member.name as member_name')
									->from('transaction_capital')
									->join('member', "member.id = transaction_capital.member_id")
									->order_by('transaction_capital.date')
									->get()->result_array();


			// DEVIDEN
			$data['income_deviden']		= 5 / 9 * $data['bagi_hasil'] ;
			$data['pendapatan_publik']  = $income - $data['income_deviden'];
			$data['deviden']			= $this->db->select('*')->from('deviden')->join('member', 'deviden.member_id = member.id')->get()->result_array();


			$this->load->view('dashboard/report_modal',$data);
	 		$html 	 = $this->load->view('dashboard/report_modal',$data, TRUE);



	        $pdf->AddPage('P'); //L to landscape
	        $pdf->WriteHTML($stylesheet, 1);
	        $pdf->WriteHTML($html);

	        $pdf->Output($pdfFilePath, "I"); //F to save as file, D to download, I view in browser
	        exit();
		}
	}