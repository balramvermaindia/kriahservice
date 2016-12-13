<?php
class Coach_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function get_coaches($coach_id = null)
	{
		$data = array();
		if($coach_id != null) {
			$this->db->select('coaches.*,users.status');
			$this->db->join('users','coaches.user_id=users.id');
			$this->db->where('coaches.id', $coach_id);
			$query = $this->db->get('coaches');
			$data = $query->row();	
		} else {
			$this->db->select('coaches.*,users.status');
			$this->db->join('users','coaches.user_id=users.id');
			$query = $this->db->get('coaches');
			$data =  $query->result();	
			//echo '<pre>'; print_r($data); die();
		}
		return $data;
	}
	
	function create_coach()
	{
		$res = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'user_type' => 'coach',
			'status' => 1,
			'created_date' => date('Y-m-d H:i:s', time())
			);
			$this->db->trans_start();
			$this->db->insert('users', $res);
			$user_id = $this->db->insert_id();
		// get form data
		$data = array(
		    'user_id' => $user_id,
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'address' => $this->input->post('address'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'zip' => $this->input->post('zip'),
			'home_phone' => $this->input->post('home_phone'),
			'cell_phone' => $this->input->post('cell_phone'),
			'email' => $this->input->post('email'),
			'company_name' => $this->input->post('company_name'),
			'company_address' => $this->input->post('company_address'),
			'company_city' => $this->input->post('company_city'),
			'company_state' => $this->input->post('company_state'),
			'company_zip' => $this->input->post('company_zip'),
			'company_email' => $this->input->post('company_email'),
			'billing_plan_code' => $this->input->post('billing_plan_code'),
		);
		$this->db->insert('coaches', $data);
		$this->db->trans_complete();
		if($this->db->trans_status() == true) {
			return true;
		} else {
			return false;
		}
	}
	
	function update_coach($coach_id)
	{
		// get form data
		$data = array(
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'address' => $this->input->post('address'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'zip' => $this->input->post('zip'),
			'home_phone' => $this->input->post('home_phone'),
			'cell_phone' => $this->input->post('cell_phone'),
			'email' => $this->input->post('email'),
			'company_name' => $this->input->post('company_name'),
			'company_address' => $this->input->post('company_address'),
			'company_city' => $this->input->post('company_city'),
			'company_state' => $this->input->post('company_state'),
			'company_zip' => $this->input->post('company_zip'),
			'company_email' => $this->input->post('company_email'),
			'billing_plan_code' => $this->input->post('billing_plan_code'),
		);
		$this->db->where('id', $coach_id);		
		if($this->db->update('coaches', $data)) {
			return true;
		} else {
			return false;
		}
	}
	
	function delete_coach($coach_id)
	{	
		$this->db->where('user_id', $coach_id);
		$this->db->trans_start();
		$this->db->delete('coaches');
		
		$this->db->where('id', $coach_id);
		$this->db->delete('coaches');
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
		$query = $this->db->get('coaches'); 
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
		 
			$this->db->update('users', $data, array('id' => $id));
			//echo $this->db->last_query(); die;
			return true;
		}
}
