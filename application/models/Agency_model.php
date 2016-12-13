<?php
class Agency_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function get_user_data()
	{
		$this->db->select('*');
		$this->db->where('user_type !=', 'agency');
		$result = $this->db->get('users');
		if($result->num_rows() > 0){
			//echo "<pre>"; print_r($result->result_array()); die();
				return $result->result_array();
			}else{
				return array();
			}
	}
	public function get_agencyData($agency_id = null)
	{
		$result = array();
		if($agency_id != null) {
			$this->db->select('*');
			$this->db->where('id', $agency_id);
			//$this->db->where('user_type !=', 'agency');
			$query = $this->db->get('agencies');
			$result = $query->row();	
		} else {
			$this->db->select('*');
			$query = $this->db->get('agencies');
			$result = $query->result();
		}
		return $result;
	}
	
	public function insert_agency()
	{
			
		$res = array(
		    'name' => $this->input->post('agency'),
			'service_type' => $this->input->post('service'),
			'department' => $this->input->post('department'),
			'assigned_User' => $this->input->post('assign_User'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'status' => 1,
			'created_date' => date('Y-m-d H:i:s', time())
		);
		$res = $this->db->insert('agencies', $res);
			$agency_id = $this->db->insert_id();
			//$this->db->last_query(); die;
		if($res) {
			return true;
		} else {
			return false;
		}
	}
	
	function update_agency($agency_id)
	{
		$data = array(
			'name' => $this->input->post('agency'),
			'service_type' => $this->input->post('service'),
			'department' => $this->input->post('department'),
			'assigned_user' => $this->input->post('assign_User'),
			'phone' => $this->input->post('phone')
		);
		$this->db->where('id', $agency_id);		
		if($this->db->update('agencies', $data)) {
			return true;
		} else {
			return false;
		}
	}
	
	function delete_agency($id)
	{
		$this->db->where('id', $id);
		$res = $this->db->delete('agencies');
		//echo $this->db->last_query(); die;
		
		if($res) {
			return true;
		} else {
			return false;
		}
	}
	
	function check_email($email)
	{	
		$this->db->where('email', $email);		
		$query = $this->db->get('users'); 
		$query->row();
		if($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	public function changeStatus($id, $status)
    {
         $status = $status==1 ? 0 : 1;

         $data = array(
	    'status' => $status,
		   );
		 
		$this->db->update('agencies', $data, array('id' => $id));
			return true;
	}
	
	public function changeAgencyUserStatus($user_id, $status)
    {
         $status = $status==1 ? 0 : 1;

         $data = array(
	    'status' => $status,
		   );
		 
		$this->db->update('users', $data, array('id' => $user_id));
			return true;
	}
		
	public function get_agency_users($agency_id)
	{
		//echo $agency_id; die;
		$this->db->select('agency_users.*, users.status');
		$this->db->join('users','users.id=agency_users.user_id');
		$this->db->where('agency_id', $agency_id);
		$result = $this->db->get('agency_users'); 
		if($result->num_rows() > 0) {
			return $result->result_array();
		} else {
			return false;
		}                                                                                                                                                                                           
		
	}
	
	public function get_agencyuserData($user_id)
	{
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('agency_users');
		if($query->num_rows() > 0) {
			//echo "<pre>"; print_r($query); die();	
			 return $query->row();
		} else {
		     return false;   
	    }
	}
	
	public function insert_agency_user($agency_id)
	{  
		//echo "hiiii"; die;
		$data = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'user_type' => 'agency',
			'status' => 1,
			'created_date' => date('Y-m-d H:i:s', time())
		);
		$this->db->trans_start();
		$this->db->insert('users', $data);
			$user_id = $this->db->insert_id();
			//~ return $user_id;
			
		$res = array(
		    'user_id' => $user_id,
		    'agency_id' => $this->input->post('agency_id'),
		    'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
		);
		$this->db->insert('agency_users', $res);
		//echo $this->db->last_query(); die;
			//~ return $this->db->insert_id();
		$this->db->trans_complete();
		if($this->db->trans_status() == true) {
			return true;
		} else {
			return false;
		}
	}
	
	public function update_agency_user()
	{
	    $agency_user_id = $this->input->post('agency_user_id');
	    	//echo $agency_user_id; die;
		$data = array(
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'phone' => $this->input->post('phone')
		);
		$this->db->where('id', $agency_user_id);		
		if($this->db->update('agency_users', $data)) {
			//echo $this->db->last_query(); die();
			return true;
		} else {
			return false;
		}
	}
	
	public function delete_agency_user($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->trans_start();
		$this->db->delete('agency_users');
		//echo $this->db->last_query(); die;
		$this->db->where('id', $user_id);
		//~ $this->db->where('user_id', $user_id);		
		$this->db->delete('users');
		$this->db->trans_complete();
		if($this->db->trans_status() == true) {
			return true;
		} else {
			return false;
		}
	}
}	
