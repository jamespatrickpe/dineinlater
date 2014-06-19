<?php
class user_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}
	
	public function set_user()
	{
		$this->load->library('encrypt');
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->encrypt->encode($this->input->post('password')),
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'email' => $this->input->post('email')
		);
		return $this->db->insert('customer', $data);
	}
	
	public function add_reservation($restoid = false , $custid = false , $rsvdate = false, $rsvtime = false, $numpeople = false )
	{
		$this->load->library('encrypt');
		$data = array(
			'resto_id' => $restoid,
			'customer_id' => $custid,
			'reservation_date' => $rsvdate,
			'reservation_time' => $rsvtime,
			'no_of_people' => $numpeople,
		);
		return $this->db->insert('reservation', $data);
	}
	
	public function edit_reservation($rsvid = false , $rsvdate = false, $rsvtime = false, $numpeople = false, $confirm = false )
	{
		$this->load->library('encrypt');
		$data = array(
			'reservation_date' => $rsvdate,
			'reservation_time' => $rsvtime,
			'no_of_people' => $numpeople,
			'confirmed' => $confirm
		);
		$where = "reservation_id = $rsvid"; 
		return $this->db->update_string('reservation', $data, $where);
	}

	public function delete_reservation($rsvid = false, $restoid = false , $custid = false)
	{
		$this->db->trans_start();
		$query = $this->db->where('reservation_id', $rsvid);
		$query = $this->db->where('resto_id', $restoid);
		$query = $this->db->where('customer_id', $custid);
		$query = $this->db->limit(1,0);
		$query = $this->db->delete('reservation');
		$this->db->trans_complete();
	}
	
	public function delete_reservationResto($restoid = false)
	{
		$this->db->trans_start();
		$query = $this->db->where('resto_id', $restoid);
		$query = $this->db->limit(1,0);
		$query = $this->db->delete('reservation');
		$this->db->trans_complete();
	}
	
	public function getRsvCustomer($custid = false)
	{
		$this->db->trans_start();
		$this->db->where('customer_id',$custid);
		$query = $this->db->get('reservation');
		$this->db->trans_complete();
		if($this->db->trans_status() === false || $this->checkZeroResults($query) == false)
		{
			return false;
		}
		else 
		{
			$row = $query; 
			return $row;
		}
	}
	
	public function getRsvResto($restoid = false)
	{
		$this->db->trans_start();
		$this->db->where('resto_id',$restoid);
		$query = $this->db->get('reservation');
		$this->db->trans_complete();
		if($this->db->trans_status() === false || $this->checkZeroResults($query) == false)
		{
			return false;
		}
		else 
		{
			$row = $query; 
			return $row;
		}
	}
	
	public function getRsvRestoCust($custid = false , $restoid = false)
	{
		$this->db->trans_start();
		$this->db->where('resto_id',$restoid);
		$this->db->where('customer_id',$custid);
		$query = $this->db->get('reservation');
		$this->db->trans_complete();
		if($this->db->trans_status() === false || $this->checkZeroResults($query) == false)
		{
			return false;
		}
		else 
		{
			$row = $query; 
			return $row;
		}
	}
	
	public function getUser($username = false)
	{
		$this->db->trans_start();
		$this->db->where('username',$username);
		$query = $this->db->get('customer');
		$this->db->trans_complete();
		if($this->db->trans_status() === false || $this->checkZeroResults($query) == false)
		{
			return false;
		}
		else 
		{
			$row = $query->row(); 
			return $row;
		}
	}
	
	public function verifyLogin($username = false,$password = false)
	{
		$this->db->trans_start();
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('customer');
		$this->db->trans_complete();
		if($this->db->trans_status() === false || $this->checkZeroResults($query) == false)
		{
			return false;
		}
		else 
		{
			$row = $query->row(); 
			return $row;
		}
	}
	
	public function verifyAdminLogin($username = false,$password = false)
	{
		$this->db->trans_start();
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('admin_user');
		$this->db->trans_complete();
		if($this->db->trans_status() === false || $this->checkZeroResults($query) == false)
		{
			return false;
		}
		else 
		{
			$row = $query->row(); 
			return $row;
		}
	}
	
	public function verifyRestoLogin($username = false,$password = false)
	{
		$this->db->trans_start();
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('restaurant');
		$this->db->trans_complete();
		if($this->db->trans_status() === false || $this->checkZeroResults($query) == false)
		{
			return false;
		}
		else 
		{
			$row = $query->row(); 
			return $row;
		}
	}
	
	public function checkZeroResults($query)
	{
		if ($query->num_rows() > 0)
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	
	/*
	public function check_user($username = false)
	{
		$this->db->trans_start();
		$query = $this->db->get_where('manual_client_registration', array('username' => $username));
		$this->db->trans_complete();
		if($this->db->trans_status() === false)
		{
			return false;
		}
		else 
		{
			$query->row_array();
		}
	}*/
}