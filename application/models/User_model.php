<?php
class User_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function get_users($user_id = null)
	{
		$data = array();
		if($user_id != null) {
			$this->db->select('users.*,admins.firstname,admins.lastname,admins.phone');
			$this->db->join('admins','admins.user_id=users.id');
			$this->db->where('users.id', $user_id);
			$this->db->where('user_type', 'admin');
		    $query = $this->db->get('users');
			$data = $query->row();	
		} else {
			$this->db->select('users.*,admins.firstname,admins.lastname,admins.phone');
			$this->db->join('admins','admins.user_id=users.id');
			$this->db->where('user_type', 'admin');
			$query = $this->db->get('users');
			$data = $query->result();	
			//~ echo '<pre>'; print_r($data); die();
		}
		return $data;
	}
	
	function validate_user()
	{
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$this->db->where('email' , $email);
		$this->db->where('password' , $password);
		$query = $this->db->get('users');
		if($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
	}
	
	function insert_user()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'user_type' => 'admin',
			'status' => 1,
			'created_date' => date('Y-m-d H:i:s', time())
		);
		$this->db->trans_start();
		$this->db->insert('users', $data);
			$user_id = $this->db->insert_id();
			//~ return $user_id;
			
		$res = array(
		    'user_id' => $user_id,
		    'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
		);
		$this->db->insert('admins', $res);
			//~ return $this->db->insert_id();
		$this->db->trans_complete();
		if($this->db->trans_status() == true) {
			return true;
		} else {
			return false;
		}
	}
	
	function update_user($user_id)
	{
		$data = array(
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone')
		);
		$this->db->where('user_id', $user_id);		
		if($this->db->update('admins', $data)) {
			return true;
		} else {
			return false;
		}
	}
	
	function delete_user($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->trans_start();
		$this->db->delete('admins');
		
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
	
	//~ 5th of dec 
	
	public function changeStatus($id, $status)
        {
          $status = $status==1 ? 0 : 1;

           $data = array(
		   'status' => $status,
		   );
		 
			$this->db->update('users', $data, array('id' => $id));
			return true;
		}
}
