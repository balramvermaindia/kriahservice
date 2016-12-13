<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriah extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model('Agency_model');
		if(!$this->session->logged_in) {
			redirect(base_url('login'));
		}	
	}
	/**
	 * Index Page for this controller.	 
	 */
	 
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
		$data['header']= $this->load->view('sections/header', '', true);
		$data['body']= $this->load->view('dashboard', '', true);
		$this->load->view('template', $data);
	}
	
	/* agencies related function  */
	public function all_agencies()
	{
		$this->load->helper('datetime');
		$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
		$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
		$data['header']= $this->load->view('sections/header', '', true);
		$agency_data['agencyDetails'] = $this->Agency_model->get_agencyData(); // get all agency data
		//echo "<pre>"; print_r($agency_data['agencyDetails']); die();
		$data['body']= $this->load->view('agencies/all_agencies', $agency_data, true);
		$this->load->view('template', $data);
		
	}
	public function new_agency()
	{
		if($this->input->method() == 'post') {
			/* form validation rules */
			$this->form_validation->set_rules('agency', 'Agency', 'trim|required');
			$this->form_validation->set_rules('service', 'Service', 'trim|required');	
			$this->form_validation->set_rules('department', 'Department', 'trim|required');
			$this->form_validation->set_rules('assign_User', 'Assigned User', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');			
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]', array('is_unique', 'The email has already been taken'));
			if ($this->form_validation->run() == TRUE) { 
				//echo 'hiii'; die;
				if($this->Agency_model->insert_agency()) {	// insert record			
					$this->session->set_flashdata('success', 'agency added successfuly');
					redirect(base_url('Kriah/all_agencies'));
				} else {
					$this->session->set_flashdata('error', 'agency not added successfuly, try again');
					redirect(base_url('Kriah/all_agencies'));	
				}
			} else {	
				// returnn with form validation errors
				$errors['form_errors'] = $this->form_validation->error_array();
				$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
				$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
				$data['header']= $this->load->view('sections/header', '', true);
				$data['body']= $this->load->view('agencies/all_agencies', $errors, true);
				$this->load->view('template', $data);
			}
		} else {
			$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
			$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
			$data['header']= $this->load->view('sections/header', '', true);
			$data['userData']= $this->Agency_model->get_user_data();
			//echo "<pre>"; print_r($data['userData']); die();
			$data['body']= $this->load->view('agencies/new_agency', $data, true);
			$this->load->view('template', $data);
		}
	}
		
	public function check_email()
	{
		if($this->input->method() == 'get') {  // check for request method
			$email =  $this->input->get('email') ;
			//echo $email; die;
			if($this->Agency_model->check_email($email)) {  // check for email exists or not
				echo 'false';
			} else {
				echo 'true';
			}
		}
	}
	
	
	public function edit_agency() 
	{
		$agency_id = '';
		$agency_data['agencyData'] = '';
		if($this->uri->segment(2)) {
			$agency_id = $this->uri->segment(2);		
			$agency_data['agencyData'] = $this->Agency_model->get_agencyData($agency_id);	
			$agency_data['userData'] = $this->Agency_model->get_user_data();	
		} 
		
		if($this->input->method() == 'post') {
			/* form validation rules */
			$this->form_validation->set_rules('agency', 'agency Name', 'trim|required');
			$this->form_validation->set_rules('service', 'service type', 'trim|required');
			$this->form_validation->set_rules('department', 'department', 'trim|required');
			$this->form_validation->set_rules('assign_User', 'assigned User', 'trim|required');           
			$this->form_validation->set_rules('phone', 'phone', 'trim|required|numeric');	
			if ($this->form_validation->run() == TRUE) { 
				if($this->Agency_model->update_agency($agency_id)) {	// update record			
					$this->session->set_flashdata('success', 'User updated successfuly');
					redirect(base_url('kriah/all_agencies'));
				} else {
					$this->session->set_flashdata('error', 'User not updated successfuly, try again');
					redirect(base_url('kriah/all_agencies'));	
				}
			} else {	
				// returnn with form validation errors
				$user_data['form_errors'] = $this->form_validation->error_array();
				$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
				$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
				$data['header']= $this->load->view('sections/header', '', true);
				$data['body']= $this->load->view('agencies/edit_agency', $agency_data, true);
				$this->load->view('template', $data);
			}
		} else {
			$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
			$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
			$data['header']= $this->load->view('sections/header', '', true);
			$data['body']= $this->load->view('agencies/edit_agency', $agency_data, true);
			$this->load->view('template', $data);	
		}
	}
	
	public function delete_agency()
	{
		if($this->input->method() == 'get') {
			$agency_id =  $this->input->get('id');
			if($this->Agency_model->delete_agency($agency_id)) {
				$this->session->set_flashdata('success', 'User deleted successfuly');
				echo json_encode(['status' => 'success']);
			} else {
				$this->session->set_flashdata('error', 'User not deleted successfuly, try again');
				echo json_encode(['status' => 'error']);
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
		
		if($this->Agency_model->changeStatus($user_id, $status)==true)
		{
			redirect('kriah/all_agencies');
			//echo $this->output_response->prepare_response('' , 'Success' , 'Status updated successfully.');
			//exit;
		}
		else
		{
			//echo $this->output_response->prepare_response('' , 'Error' , 'Error - Request not completed.');
			redirect('kriah/all_agencies');
			//exit;
			
		} 
	}
	
	public function change_agency_user_status($status=null)
	{
		if($this->uri->segment(3)) {
			$user_id = $this->uri->segment(3);			
		} 
		
		if($this->uri->segment(4)) {
			$status = $this->uri->segment(4);			
		}
		
		if($this->uri->segment(5)) {
			$agency_id = $this->uri->segment(5);			
		}
		
		if($this->Agency_model->changeStatus($user_id, $status)==true)
		{
			redirect('manage-agency-users/'.$agency_id);
			//echo $this->output_response->prepare_response('' , 'Success' , 'Status updated successfully.');
			//exit;
		}
		else
		{
			//echo $this->output_response->prepare_response('' , 'Error' , 'Error - Request not completed.');
			redirect('manage-agency-users/'.$agency_id);
			//exit;
			
		} 
	}
	
	public function all_agency_users()
	{
		//echo $this->uri->segment(2);
		//echo "hihihi"; die;
		$agency_id = "";
		if($this->uri->segment(2)) {
			$agency_id = $this->uri->segment(2);	
		} 
		$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
		$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
		$data['header']= $this->load->view('sections/header', '', true);
		$agency_users_data['agency_users'] = $this->Agency_model->get_agency_users($agency_id); // get all users
		//echo $agency_id."hihfdaisd"; die;
		$agency_users_data['agency_id'] = $agency_id;
		$data['body']= $this->load->view('agencies/all_agency_users', $agency_users_data, true);
		$this->load->view('template', $data);
	}
	
	public function new_agency_user()
	{
		if($this->uri->segment(2)) {
			$agency_id = $this->uri->segment(2);	
		} 
		//echo $agency_id; die;
		if($this->input->method() == 'post') {
			/* form validation rules */
			$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]', array('is_unique', 'The email has already been taken'));
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');			
			if ($this->form_validation->run() == TRUE) { 
				//echo 'hiii'; die;
				if($this->Agency_model->insert_agency_user($agency_id)) {	// insert record			
					$this->session->set_flashdata('success', 'agency added successfuly');
					redirect('manage-agency-users/'.$agency_id);
					//$this->all_agency_users();
				} else {
					$this->session->set_flashdata('error', 'agency not added successfuly, try again');
					redirect('manage-agency-users/'.$agency_id);	
				}
			} else {	
				// returnn with form validation errors
				$errors['form_errors'] = $this->form_validation->error_array();
				$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
				$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
				$data['header']= $this->load->view('sections/header', '', true);
				$data['body']= $this->load->view('agencies/all_agency_users', $errors, true);
				$this->load->view('template', $data);
			}
		} else {
			$agen_id = array();
			$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
			$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
			$data['header']= $this->load->view('sections/header', '', true);
			$agen_id['ag_id'] = $agency_id;
			
			//echo "<pre>"; print_r($data['userData']); die();
			$data['body']= $this->load->view('agencies/new_agency_user', $agen_id, true);
			$this->load->view('template', $data);
		}
	}
	
	public function edit_agency_user() 
	{
		$user_id = '';
		$agency_data['agencyData'] = '';
		if($this->uri->segment(2)) {
			$agency_id = $this->uri->segment(2);		
			$agency_data['agencyuserData'] = $this->Agency_model->get_agencyuserData($user_id);	
			echo "<pre>"; print_r($agency_data['agencyuserData']); die;	
			$agency_data['agen_id'] = $agency_id;
		} 
		
		if($this->uri->segment(2)) {
			$agency_id = $this->uri->segment(3);			
		} 
		
		if($this->input->method() == 'post') {
			/* form validation rules */
			$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('email', 'email', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');	
			if ($this->form_validation->run() == TRUE) { 
				if($this->Agency_model->update_agency_user($agency_id)) {	// update record			
					$this->session->set_flashdata('success', 'Agency User updated successfuly');
					redirect('manage-agency-users/'.$agency_id);
				} else {
					$this->session->set_flashdata('error', 'Agency User not updated successfuly, try again');
					redirect('manage-agency-users/'.$agency_id);	
				}
			} else {	
				// returnn with form validation errors
				$user_data['form_errors'] = $this->form_validation->error_array();
				$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
				$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
				$data['header']= $this->load->view('sections/header', '', true);
				$data['body']= $this->load->view('agencies/edit_agency_user', $agency_data, true);
				$this->load->view('template', $data);
			}
		} else {
			$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
			$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
			$data['header']= $this->load->view('sections/header', '', true);
			$data['body']= $this->load->view('agencies/edit_agency_user', $agency_data, true);
			$this->load->view('template', $data);	
		}
	}
	
	public function delete_agency_user()
	{
		if($this->input->method() == 'get') {
			$user_id =  $this->input->get('id');
			if($this->Agency_model->delete_agency_user($user_id)) {
				$this->session->set_flashdata('success', 'User deleted successfuly');
				echo json_encode(['status' => 'success']);
			} else {
				$this->session->set_flashdata('error', 'User not deleted successfuly, try again');
				echo json_encode(['status' => 'error']);
			}
		}
	}
		
	
}
