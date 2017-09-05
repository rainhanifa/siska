<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Income extends CI_Controller {
		function __construct() {
	        parent::__construct();
		     // if (!$this->session->userdata('admin_logged_in')){
		     //    redirect('auth/login');
		     // }
	    }

		public function index(){
			$page['title']		  = "Income";
			$data['transactions'] = $this->db->select('transaction_income.*, member.name as member_name')
									->from('transaction_income')
									->join('member', "member.id = transaction_income.member_id")
									->order_by('transaction_income.date')
									->get()->result_array();
			$data['grand_total']	= $this->db->select('sum(total) as total')->from('transaction_income')->get()->row()->total;

			$this->load->view('template/header');
			$this->load->view('template/navbar', $page);
			$this->load->view('income/list',$data);
			$this->load->view('template/footer');
			
		}

		public function add(){
			$page['title']		  = "New Income";
			$data['transactions'] = $this->db->get('transaction_income')->result_array();
			$data['members'] = $this->db->get('member')->result_array();

			//detail
			$this->load->view('template/header');
			$this->load->view('template/navbar', $page);
			$this->load->view('income/add',$data);
			$this->load->view('template/footer');
			
		}

		public function process_add(){
			$date		=	date("Y-m-d H:i:s", strtotime($this->input->post('date')));
			$category 	=	$this->input->post('category');
			$member 	=	$this->input->post('member');
			$total	 	=	$this->input->post('total');
			$description=	$this->input->post('description');

			//jika income operasional proyek
			if($category == 0){
				$total = 0 - $total;
			}
			$transaction_data	=	array("date"	=> $date,
											"category_id" => $category,
											"member_id" => $member,
											"total"	=>	$total,
											"description" => $description
									);
			$this->db->insert('transaction_income', $transaction_data);

			redirect("income");
		}
		
		public function export_pdf(){

			$data['transactions'] = $this->db->select('transaction_income.*, member.name as member_name,
										category.name as category_name')
									->from('transaction_income')
									->join('category', "category.id = transaction_income.category_id")
									->join('member', "member.id = transaction_income.member_id")
									->order_by('transaction_income.date')
									->get()->result_array();
			$data['grand_total']	= $this->db->select('sum(total) as total')->from('transaction_income')->get()->row()->total;

			$this->load->view('income/report',$data);
	 		
	 		//set source
	 		$html 	 = $this->load->view('income/report',$data, TRUE);

	 		//var_dump($source);exit;
	        $pdfFilePath = "Illiyin-Income-Report-".date("M-Y").".pdf";
	        //lokasi file css yang akan di load
	        $stylesheet = file_get_contents(FCPATH.'assets/css/bootstrap.min.css');
	 

	        $pdf = $this->m_pdf->load();
	 		
	        $pdf->AddPage('P'); //L to landscape
	        $pdf->WriteHTML($stylesheet, 1);
	        $pdf->WriteHTML($html);
	        
	        $pdf->Output($pdfFilePath, "I"); //F to save as file, D to download, I view in browser
	        exit();
	      }
}