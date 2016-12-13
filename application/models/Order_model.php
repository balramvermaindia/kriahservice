<?php
class Order_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function get_orders($order_id = null)
	{
		$data = array();
		if($order_id != null) {
			$this->db->where('id', $order_id);
			$query = $this->db->get('service_orders');
			$data = $query->row();	
		} else {
			$query = $this->db->get('service_orders');
			$data = $query->result();	
		}
		return $data;
	}
	
	function insert_order()
	{
		$data = array(
			'order_id' => $this->input->post('service_order_id'),
			'po_number' => $this->input->post('po_number'),
			'funding_titile' => $this->input->post('funding_title'),
			'service_type' => $this->input->post('service_type'),
			'order_date' => date('Y-m-d', strtotime($this->input->post('order_date'))),
			'coach' => $this->input->post('coach_id'),
			'school' => $this->input->post('school_id'),
			'eligible_grades' => $this->input->post('eligble_grades'),
		);
		if($this->db->insert('service_orders', $data)) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}
	function update_order($order_id)
	{
		$data = array(
			'order_id' => $this->input->post('service_order_id'),
			'po_number' => $this->input->post('po_number'),
			'funding_titile' => $this->input->post('funding_title'),
			'service_type' => $this->input->post('service_type'),
			'order_date' => date('Y-m-d', strtotime($this->input->post('order_date'))),
			'coach' => $this->input->post('coach_id'),
			'school' => $this->input->post('school_id'),
			'eligible_grades' => $this->input->post('eligble_grades'),
		);
		$this->db->where('id', $order_id);		
		if($this->db->update('service_orders', $data)) {
			return true;
		} else {
			return false;
		}
	}
	function delete_order($order_id)
	{
		
		$this->db->where('id', $order_id);		
		if($this->db->delete('service_orders')) {
			return true;
		} else {
			return false;
		}
	}
}
