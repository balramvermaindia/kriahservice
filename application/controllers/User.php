<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model'); // load user model
	}
	
	public function all_users() 
	{
		$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
		$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
		$data['header']= $this->load->view('sections/header', '', true);
		$users_data['users'] = $this->User_model->get_users(); // get all users
		$data['body']= $this->load->view('users/all_users', $users_data, true);
		$this->load->view('template', $data);
	}
	public function new_user() 
	{
		if($this->input->method() == 'post') {
			/* form validation rules */
			$this->form_validation->set_rules('firstname', 'first name', 'trim|required');
			$this->form_validation->set_rules('lastname', 'last name', 'trim|required');				
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]', array('is_unique', 'The email has already been taken'));
			$this->form_validation->set_rules('phone', 'phone', 'trim|required|numeric');			
			$this->form_validation->set_rules('username', 'username', 'trim|required');	
			$this->form_validation->set_rules('password', 'password', 'trim|required');	
			
			if ($this->form_validation->run() == TRUE) { 
				if($this->User_model->insert_user()) {	// insert record			
					$this->session->set_flashdata('success', 'User added successfuly');
					redirect(base_url('users'));
				} else {
					$this->session->set_flashdata('error', 'User not added successfuly, try again');
					redirect(base_url('users'));	
				}
			} else {	
				// returnn with form validation errors
				$errors['form_errors'] = $this->form_validation->error_array();
				$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
				$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
				$data['header']= $this->load->view('sections/header', '', true);
				$data['body']= $this->load->view('users/new_user', $errors, true);
				$this->load->view('template', $data);
			}
		} else {
			$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
			$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
			$data['header']= $this->load->view('sections/header', '', true);
			$data['body']= $this->load->view('users/new_user', '', true);
			$this->load->view('template', $data);
		}
	}
	public function edit_user() 
	{
		$user_id = '';
		$user_data['user'] = '';
		if($this->uri->segment(2)) {
			$user_id = $this->uri->segment(2);		
			$user_data['user'] = $this->User_model->get_users($user_id);	
		} 
		
		if($this->input->method() == 'post') {
			/* form validation rules */
			$this->form_validation->set_rules('firstname', 'first name', 'trim|required');
			$this->form_validation->set_rules('lastname', 'last name', 'trim|required');            
			$this->form_validation->set_rules('phone', 'phone', 'trim|required|numeric');	
			if ($this->form_validation->run() == TRUE) { 
				if($this->User_model->update_user($user_id)) {	// update record			
					$this->session->set_flashdata('success', 'User updated successfuly');
					redirect(base_url('users'));
				} else {
					$this->session->set_flashdata('error', 'User not updated successfuly, try again');
					redirect(base_url('users'));	
				}
			} else {	
				// returnn with form validation errors
				$user_data['form_errors'] = $this->form_validation->error_array();
				$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
				$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
				$data['header']= $this->load->view('sections/header', '', true);
				$data['body']= $this->load->view('users/edit_user', $user_data, true);
				$this->load->view('template', $data);
			}
		} else {
			$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
			$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
			$data['header']= $this->load->view('sections/header', '', true);
			$data['body']= $this->load->view('users/edit_user', $user_data, true);
			$this->load->view('template', $data);	
		}
	}
	
	public function delete_user()
	{
		if($this->input->method() == 'get') {
			$user_id =  $this->input->get('id');
			if($this->User_model->delete_user($user_id)) {
				$this->session->set_flashdata('success', 'User deleted successfuly');
				echo json_encode(['status' => 'success']);
			} else {
				$this->session->set_flashdata('error', 'User not deleted successfuly, try again');
				echo json_encode(['status' => 'error']);
			}
		}
	}
	
	public function check_email()
	{
		if($this->input->method() == 'get') {  // check for request method
			$email =  $this->input->get('email') ;
			if($this->User_model->check_email($email)) {  // check for email exists or not
				echo 'false';
			} else {
				echo 'true';
			}
		}
	}
	
	public function login()
	{
		if($this->input->method() == 'post') {
			/* form validation rules */
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			if ($this->form_validation->run() == TRUE) { 
				// validate user
				if($this->User_model->validate_user()) {
					$data = $this->User_model->validate_user();
					$userdata = array(
						'first_name' => $data->firstname, 
						'last_name' => $data->lastname, 
						'email' => $data->email, 
						'user_type' => $data->user_type, 
						'logged_in' => TRUE
					);

					$this->session->set_userdata($userdata);
					redirect(base_url('/'));
				} else {
					// returnn with login errors
					$errors['form_errors'] = array('login_error' => 'Email or Password is invalid');
					$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
					$data['left_sidebar']= '';
					$data['header']= '';
					$data['body']= $this->load->view('login', $errors, true);
					$this->load->view('template', $data);
				}
			} else {
				// returnn with form validation errors
				$errors['form_errors'] = $this->form_validation->error_array();
				$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
				$data['left_sidebar']= '';
				$data['header']= '';
				$data['body']= $this->load->view('login', $errors, true);
				$this->load->view('template', $data);
			}
		} else {
			$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
			$data['left_sidebar']= '';
			$data['header']= '';
			$data['body']= $this->load->view('login', '', true);
			$this->load->view('template', $data);
		}
				
	}
	public function forgot_password()
	{
		$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
		$data['left_sidebar']= '';
		$data['header']= '';
		$data['body']= $this->load->view('forgot_password', '', true);
		$this->load->view('template', $data);
	}
	public function reset_password()
	{
		$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
		$data['left_sidebar']= '';
		$data['header']= '';
		$data['body']= $this->load->view('reset_password', '', true);
		$this->load->view('template', $data);
	}
	public function logout()
	{
		session_destroy();
		redirect(base_url('login'));
	}
	
	//~ 5th of Dec
	
	public function change_status($status=null)
	{
		if($this->uri->segment(3)) {
			$user_id = $this->uri->segment(3);			
		} 
		
		if($this->uri->segment(4)) {
			$status = $this->uri->segment(4);			
		}
		
		if($this->User_model->changeStatus($user_id, $status)==true)
		{
			redirect('User/all_users');
			//echo $this->output_response->prepare_response('' , 'Success' , 'Status updated successfully.');
			//exit;
		}
		else
		{
			//echo $this->output_response->prepare_response('' , 'Error' , 'Error - Request not completed.');
			redirect('User/all_users');
			//exit;
			
		} 
	}
}
