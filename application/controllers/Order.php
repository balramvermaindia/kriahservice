<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if($this->session->user_type == 'normal') {
			redirect(base_url('/'));
		}	
		$this->load->model('Order_model');
		//$this->load->helper('datetime');
	}
	
	public function all_orders()
	{	
		$orders_data['orders'] = $this->Order_model->get_orders();
		$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
		$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
		$data['header']= $this->load->view('sections/header', '', true);
		$data['body']= $this->load->view('orders/all_orders', $orders_data, true);
		$this->load->view('template', $data);
	}
	public function new_order()
	{
		if($this->input->method() == 'post') {
			/* form validation rules */
			$this->form_validation->set_rules('service_order_id', 'Service Order ID', 'trim|required');
			$this->form_validation->set_rules('po_number', 'PO Number', 'trim|required');				
			$this->form_validation->set_rules('funding_title', 'Funding Title', 'trim|required');
			$this->form_validation->set_rules('order_date', 'Order Date', 'trim|required');				
			$this->form_validation->set_rules('service_type', 'Service Type', 'trim|required', array('required' => 'Please select service'));		
			$this->form_validation->set_rules('coach_id', 'Coach', 'trim|required', array('required' => 'Please select a coach'));		
			$this->form_validation->set_rules('school_id', 'School', 'trim|required', array('required' => 'Please select a school'));		
			$this->form_validation->set_rules('eligble_grades', 'Eligible Grades', 'trim|required', array('required' => 'Please select grade'));
			
			if ($this->form_validation->run() == TRUE) { 
				if($this->Order_model->insert_order()) {	// insert record			
					$this->session->set_flashdata('success', 'Order added successfuly');
					redirect(base_url('orders'));
				} else {
					$this->session->set_flashdata('error', 'Order not added successfuly, try again');
					redirect(base_url('orders'));	
				}
			} else {
				// returnn with form validation errors
				$errors['form_errors'] = $this->form_validation->error_array();
				$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
				$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
				$data['header']= $this->load->view('sections/header', '', true);
				$data['body']= $this->load->view('orders/new_order', $errors, true);
				$this->load->view('template', $data);
			}
		} else {
			$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
			$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
			$data['header']= $this->load->view('sections/header', '', true);
			$data['body']= $this->load->view('orders/new_order', '', true);
			$this->load->view('template', $data);
		}
	}
	
	public function edit_order()
	{
		$order_id = '';
		$order_data['order'] = '';
		if($this->uri->segment(2)) {
			$order_id = $this->uri->segment(2);		
			$order_data['order'] = $this->Order_model->get_orders($order_id);	
		} 
		
		if($this->input->method() == 'post') {
			/* form validation rules */
			$this->form_validation->set_rules('service_order_id', 'Service Order ID', 'trim|required');
			$this->form_validation->set_rules('po_number', 'PO Number', 'trim|required');				
			$this->form_validation->set_rules('funding_title', 'Funding Title', 'trim|required');
			$this->form_validation->set_rules('order_date', 'Order Date', 'trim|required');				
			$this->form_validation->set_rules('service_type', 'Service Type', 'trim|required', array('required' => 'Please select service'));		
			$this->form_validation->set_rules('coach_id', 'Coach', 'trim|required', array('required' => 'Please select a coach'));		
			$this->form_validation->set_rules('school_id', 'School', 'trim|required', array('required' => 'Please select a school'));		
			$this->form_validation->set_rules('eligble_grades', 'Eligible Grades', 'trim|required', array('required' => 'Please select grade'));
			
			if ($this->form_validation->run() == TRUE) {
				if($this->Order_model->update_order($order_id)) {		// update record			
					$this->session->set_flashdata('success', 'Order Updated successfuly');
					redirect(base_url('orders'));
				} else {
					$this->session->set_flashdata('error', 'Order not Updated successfuly, try again');
					redirect(base_url('orders'));	
				}
			} else {
				// returnn with form validation errors
				$order_data['form_errors'] = $this->form_validation->error_array();				
				$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
				$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
				$data['header']= $this->load->view('sections/header', '', true);
				$data['body']= $this->load->view('orders/edit_order', $order_data, true);
				$this->load->view('template', $data);
			}
		} else {	
			$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
			$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
			$data['header']= $this->load->view('sections/header', '', true);
			$data['body']= $this->load->view('orders/edit_order', $order_data, true);
			$this->load->view('template', $data);
		}		
	}
	public function view_order()
	{
		$order_id = '';
		$order_data['order'] = '';
		if($this->uri->segment(2)) {
			$order_id = $this->uri->segment(2);		
			$order_data['order'] = $this->Order_model->get_orders($order_id);	
		} 
		$data['title'] = ucwords(str_replace('-', ' ',$this->uri->segment('1','0'))); 
		$data['left_sidebar']= $this->load->view('sections/left_sidebar', '', true);
		$data['header']= $this->load->view('sections/header', '', true);
		$data['body']= $this->load->view('orders/view_order', $order_data, true);
		$this->load->view('template', $data);
	}
	public function delete_order()
	{
		if($this->input->method() == 'get') {
			$order_id =  $this->input->get('id');
			if($this->Order_model->delete_order($order_id)) {
				$this->session->set_flashdata('success', 'Order deleted successfuly');
				echo json_encode(['status' => 'success']);
			} else {
				$this->session->set_flashdata('error', 'Order not deleted successfuly, try again');
				echo json_encode(['status' => 'error']);
			}
		}
	}
	/* custom validation callback function for from validation */
	function check_selectbox($value)
	{
	  if($value == '' || $value == 'select' || $value == 'default' || $value == '0') { // do your validations
		 return FALSE;
	   } else {
		 return TRUE;
	   }
	}

}
