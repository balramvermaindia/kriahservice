<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();	
		if(!$this->session->logged_in) {
			redirect(base_url('login'));
		}	
	}
	/**
	 * Index Page for this controller.	 
	 */
	 
	public function index()
	{
		$data['title'] = 'Reports';
		$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
		$data['header']= $this->load->view('sections/header', '', true);
		/* fetch data for agenda_details */
		$report['agenda_details'] = $this->load->view('reports/agenda_details', '', true);
		/* fetch data for agenda_details */
		$report['activity_log'] = $this->load->view('reports/activity_log', '', true);
		/* fetch data for agenda_details */
		$report['doi_sign_in'] = $this->load->view('reports/doi_sign_in', '', true);
		/* fetch data for agenda_details */
		$report['principal_signature'] = $this->load->view('reports/principal_signature', '', true);
		/* fetch data for agenda_details */
		$report['session_invoice_coach'] = $this->load->view('reports/session_invoice_coach', '', true);
		/* fetch data for agenda_details */
		$report['session_invoice_scholastic'] = $this->load->view('reports/session_invoice_scholastic', '', true);
		$data['body']= $this->load->view('reports/report', $report, true);
		$data['another'] = 'another data';
		$this->load->view('template', $data);		
	}
	
	public function agenda_details()
	{		
		$variable =	$this->load->view('reports/agenda_details','',true);	
		//Load the library
		$this->load->library('html2pdf');
		//Set folder to save PDF to
		$this->html2pdf->folder('./assets/');
		//Set the filename to save/download as
		$this->html2pdf->filename('agenda_details.pdf');
		//Set the paper defaults
		$this->html2pdf->paper('a4', 'portrait');
		//Load html view
		$this->html2pdf->html($variable);
		$this->html2pdf->create('download');		
	}
	public function activity_log()
	{		
		$variable =	$this->load->view('reports/activity_log','',true);	
		//Load the library
		$this->load->library('html2pdf');
		//Set folder to save PDF to
		$this->html2pdf->folder('./assets/');
		//Set the filename to save/download as
		$this->html2pdf->filename('activity_log.pdf');
		//Set the paper defaults
		$this->html2pdf->paper('a4', 'portrait');
		//Load html view
		$this->html2pdf->html($variable);
		$this->html2pdf->create('download');		
	}
	public function doi_sign_in()
	{		
		$variable =	$this->load->view('reports/doi_sign_in','',true);	
		//Load the library
		$this->load->library('html2pdf');
		//Set folder to save PDF to
		$this->html2pdf->folder('./assets/');
		//Set the filename to save/download as
		$this->html2pdf->filename('doi_sign_in.pdf');
		//Set the paper defaults
		$this->html2pdf->paper('a4', 'portrait');
		//Load html view
		$this->html2pdf->html($variable);
		$this->html2pdf->create('download');		
	}
	public function principal_signature()
	{		
		$variable =	$this->load->view('reports/principal_signature','',true);	
		//Load the library
		$this->load->library('html2pdf');
		//Set folder to save PDF to
		$this->html2pdf->folder('./assets/');
		//Set the filename to save/download as
		$this->html2pdf->filename('principal_signature.pdf');
		//Set the paper defaults
		$this->html2pdf->paper('a4', 'portrait');
		//Load html view
		$this->html2pdf->html($variable);
		$this->html2pdf->create('download');		
	}
	public function session_invoice_coach()
	{		
		$variable =	$this->load->view('reports/session_invoice_coach','',true);	
		//Load the library
		$this->load->library('html2pdf');
		//Set folder to save PDF to
		$this->html2pdf->folder('./assets/');
		//Set the filename to save/download as
		$this->html2pdf->filename('session_invoice_coach.pdf');
		//Set the paper defaults
		$this->html2pdf->paper('a4', 'portrait');
		//Load html view
		$this->html2pdf->html($variable);
		$this->html2pdf->create('download');		
	}
	public function session_invoice_scholastic()
	{		
		$variable =	$this->load->view('reports/session_invoice_scholastic','',true);	
		//Load the library
		$this->load->library('html2pdf');
		//Set folder to save PDF to
		$this->html2pdf->folder('./assets/');
		//Set the filename to save/download as
		$this->html2pdf->filename('session_invoice_scholastic.pdf');
		//Set the paper defaults
		$this->html2pdf->paper('a4', 'portrait');
		//Load html view
		$this->html2pdf->html($variable);
		$this->html2pdf->create('download');		
	}
	
}
