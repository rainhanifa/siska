<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Outcome extends CI_Controller {

		function __construct() {
	        parent::__construct();
		     // if (!$this->session->userdata('admin_logged_in')){
		     //    redirect('auth/login');
		     // }
	    }

		public function index(){
			$page['title']		  = "Outcome";
			$data['transactions'] = $this->db->select('transaction_outcome.*, member.name as member_name,
										category.name as category_name')
									->from('transaction_outcome')
									->join('category', "category.id = transaction_outcome.category_id")
									->join('member', "member.id = transaction_outcome.member_id")
									->order_by('transaction_outcome.date')
									->get()->result_array();
			$data['grand_total']	= $this->db->select('sum(total) as total')->from('transaction_outcome')->get()->row()->total;

			$this->load->view('template/header');
			$this->load->view('template/navbar', $page);
			$this->load->view('outcome/list',$data);
			$this->load->view('template/footer');
			
		}

		public function add(){
			$page['title']		  = "New Outcome";
			$data['transactions'] = $this->db->get('transaction_outcome')->result_array();
			$data['categories'] = $this->db->get('category')->result_array();
			$data['members'] = $this->db->get('member')->result_array();

			//detail
			$this->load->view('template/header');
			$this->load->view('template/navbar', $page);
			$this->load->view('outcome/add',$data);
			$this->load->view('template/footer');
			
		}

		public function process_add(){
			$date		=	date("Y-m-d H:i:s", strtotime($this->input->post('date')));
			$category 	=	$this->input->post('category');
			$member 	=	$this->input->post('member');
			$total	 	=	$this->input->post('total');
			$description=	$this->input->post('description');

			$transaction_data	=	array("date"	=> $date,
											"category_id" => $category,
											"member_id" => $member,
											"total"	=>	$total,
											"description" => $description
									);
			$this->db->insert('transaction_outcome', $transaction_data);

			//MODAL
			if($category == 2){
				$transaction_data	=	array("date"	=> $date,
											"category_id" => 0,
											"member_id" => $member,
											"total"	=>	$total,
											"description" => $description
									);
				$this->db->insert('transaction_capital', $transaction_data);

				//UPDATE MODAL
				$capital_balance	=	$this->db->select('balance')->from('capital')->get()->row()->balance;
				$new_balance 		=	$capital_balance - $total;
				$transaction_data   =	array("date" => date("Y-m-d"),
											"balance" => $new_balance );
				$this->db->update($capital, $transaction_data);
			}

			redirect("outcome");
		}

		public function export_pdf(){

			$data['transactions'] = $this->db->select('transaction_outcome.*, member.name as member_name,
										category.name as category_name')
									->from('transaction_outcome')
									->join('category', "category.id = transaction_outcome.category_id")
									->join('member', "member.id = transaction_outcome.member_id")
									->order_by('transaction_outcome.date')
									->get()->result_array();
			$data['grand_total']	= $this->db->select('sum(total) as total')->from('transaction_outcome')->get()->row()->total;

			$this->load->view('outcome/report',$data);
	 		
	 		//set source
	 		$html 	 = $this->load->view('outcome/report',$data, TRUE);

	 		//var_dump($source);exit;
	        $pdfFilePath = "Illiyin-Outcome-Report-".date("M-Y").".pdf";
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