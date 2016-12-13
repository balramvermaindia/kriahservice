<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coach extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if($this->session->user_type == 'normal') {
			redirect(base_url('/'));
		}
		$this->load->model('Coach_model'); // load coach model
		//$this->load->helper('datetime');
	}
	
	public function all_coaches()
	{
		$this->load->helper('datetime');
		$coaches_data['coaches'] = $this->Coach_model->get_coaches(); // get all coaches
		$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
		$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
		$data['header']= $this->load->view('sections/header', '', true);
		$data['body']= $this->load->view('coaches/all_coaches', $coaches_data, true);
		$this->load->view('template', $data);
	}
	public function new_coach()
	{
		if($this->input->method() == 'post') { // check for request method
			/* form validation rules */
			$this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
			$this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
			$this->form_validation->set_rules('username', 'username', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');				
			$this->form_validation->set_rules('city', 'City', 'trim|required');
			$this->form_validation->set_rules('state', 'State', 'trim|required');				
			$this->form_validation->set_rules('zip', 'zip', 'trim|required');		
			$this->form_validation->set_rules('home_phone', 'Landline Number', 'trim|required');		
			$this->form_validation->set_rules('cell_phone', 'Cell Number', 'trim|required');		
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[coaches.email]', array('is_unique', 'The email has already been taken'));
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
			$this->form_validation->set_rules('company_address', 'Company Address', 'trim|required');				
			$this->form_validation->set_rules('company_city', 'Company City', 'trim|required');
			$this->form_validation->set_rules('company_state', 'Company State', 'trim|required');				
			$this->form_validation->set_rules('company_zip', 'Company zip', 'trim|required');		
			$this->form_validation->set_rules('company_email', 'Company Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('billing_plan_code', 'Billing Plan Code', 'trim|required');
			
			if ($this->form_validation->run() == TRUE) { 
				if($this->Coach_model->create_coach()) {	// insert record			
					$this->session->set_flashdata('success', 'Coach added successfuly');
					redirect(base_url('coaches'));
				} else {
					$this->session->set_flashdata('error', 'Coach not added successfuly, try again');
					redirect(base_url('coaches'));	
				}
			} else {
				// returnn with form validation errors
				$errors['form_errors'] = $this->form_validation->error_array();
				$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0')));  
				$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
				$data['header']= $this->load->view('sections/header', '', true);
				$data['body']= $this->load->view('coaches/new_coach', $errors, true);
				$this->load->view('template', $data);
			}
		} else {
			$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
			$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
			$data['header']= $this->load->view('sections/header', '', true);
			$data['body']= $this->load->view('coaches/new_coach', '', true);
			$this->load->view('template', $data);
		}
	}
	public function edit_coach()
	{
		$coach_id = '';
		$coach_data['coach'] = '';
		if($this->uri->segment(2)) {
			$coach_id = $this->uri->segment(2);		
			$coach_data['coach'] = $this->Coach_model->get_coaches($coach_id);	// get single coach record
		} 
		
		if($this->input->method() == 'post') {
			/* form validation rules */
			$this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
			$this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');				
			$this->form_validation->set_rules('city', 'City', 'trim|required');
			$this->form_validation->set_rules('state', 'State', 'trim|required');				
			$this->form_validation->set_rules('zip', 'zip', 'trim|required');		
			$this->form_validation->set_rules('home_phone', 'Landline Number', 'trim|required');		
			$this->form_validation->set_rules('cell_phone', 'Cell Number', 'trim|required');
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
			$this->form_validation->set_rules('company_address', 'Company Address', 'trim|required');				
			$this->form_validation->set_rules('company_city', 'Company City', 'trim|required');
			$this->form_validation->set_rules('company_state', 'Company State', 'trim|required');				
			$this->form_validation->set_rules('company_zip', 'Company zip', 'trim|required');		
			$this->form_validation->set_rules('company_email', 'Company Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('billing_plan_code', 'Billing Plan Code', 'trim|required');
			
			if ($this->form_validation->run() == TRUE) { 
				if($this->Coach_model->update_coach($coach_id)) {		// update record			
					$this->session->set_flashdata('success', 'Coach Updated successfuly');
					redirect(base_url('coaches'));
				} else {
					$this->session->set_flashdata('error', 'Coach not Updated successfuly, try again');
					redirect(base_url('coaches'));	
				}
			} else {
				// returnn with form validation errors
				$coach_data['form_errors'] = $this->form_validation->error_array();
				$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
				$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
				$data['header']= $this->load->view('sections/header', '', true);
				$data['body']= $this->load->view('coaches/edit_coach', $coach_data, true);
				$this->load->view('template', $data);	
			}
		} else {
			$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
			$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
			$data['header']= $this->load->view('sections/header', '', true);
			$data['body']= $this->load->view('coaches/edit_coach', $coach_data, true);
			$this->load->view('template', $data);	
		}
	}
	public function delete_coach()
	{
		if($this->input->method() == 'get') {  // check for request method
			$coach_id =  $this->input->get('id');
			if($this->Coach_model->delete_coach($coach_id)) {  // delete the matched record
				$this->session->set_flashdata('success', 'Coach deleted successfuly');
				echo json_encode(['status' => 'success']);
			} else {
				$this->session->set_flashdata('error', 'Coach not deleted successfuly, try again');
				echo json_encode(['status' => 'error']);
			}
		}
	}
	public function check_email()
	{
		if($this->input->method() == 'get') {  // check for request method
			$email =  $this->input->get('email');
			if($this->Coach_model->check_email($email)) {  // check for email exists or not
				echo 'false';
			} else {
				echo 'true';
			}
		}
	}
	public function change_status($status=null)
	{
		if($this->uri->segment(3)) {
			$user_id = $this->uri->segment(3);			
		} 
		
		if($this->uri->segment(4)) {
			$status = $this->uri->segment(4);			
		}
		
		if($this->Coach_model->changeStatus($user_id, $status)==true)
		{
			redirect('coach/all_coaches');
			//echo $this->output_response->prepare_response('' , 'Success' , 'Status updated successfully.');
			//exit;
		}
		else
		{
			//echo $this->output_response->prepare_response('' , 'Error' , 'Error - Request not completed.');
			redirect('coach/all_coaches');
			//exit;
			
		} 
	}
}
