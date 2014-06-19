<?php
class resto_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}
	
	public function add_restaurant()
	{
		$this->load->library('encrypt');
		$data = array(
			'resto_name' => $this->input->post('restoname'),
			'resto_owner' => $this->input->post('restoowner'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'address' => $this->input->post('address'),
			'city' => $this->input->post('city'),
			'phone_mobile' => $this->input->post('mobile'),
			'phone_landline' => $this->input->post('landline'),
			'google_lat' => $this->input->post('lat'),
			'google_long' => $this->input->post('long'),
			'website' => $this->input->post('website'),
			'menu_photo' => $this->input->post('logo'),
			'auto_accept_reserve_flag' => $this->input->post('autoaccept'),
			'description' => $this->input->post('desc'),
			'resto_status' => 'O'
		);
		return $this->db->insert('restaurant', $data);
	}
	
	public function edit_restaurant($restoid, $record)
	{	
		$this->load->library('encrypt');
		$data = $record;
		$where = "resto_id = $restoid";
		return $this->db->update_string('restaurant', $data, $where);
	}

	public function edit_resto_login($restoid, $username, $password)
	{	
		$this->load->library('encrypt');
		$data = array(
			'username' => $username,
			'password' => $password
		);
		$where = "resto_id = $restoid";
		return $this->db->update_string('restaurant', $data, $where);
	}
	
	public function edit_resto_status($restoid, $status)
	{	
		$this->load->library('encrypt');
		$data = array(
			'resto_status' => $status
		);
		$where = "resto_id = $restoid";
		return $this->db->update_string('restaurant', $data, $where);
	}
	
	public function edit_resto_photo($restoid, $menu_photo)
	{	
		$this->load->library('encrypt');
		$data = array(
			'menu_photo' => $menu_photo
		);
		$where = "resto_id = $restoid";
		return $this->db->update_string('restaurant', $data, $where);
	}
	
	public function get_resto_list()
	{
		$this->db->trans_start();
		$query = $this->db->get('restaurant');
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

	public function get_resto($restoid = false)
	{
		$this->db->trans_start();
		$query = $this->db->where('resto_id', $restoid);
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
	
	public function delete_restaurant($restoid = false)
	{
		$this->db->trans_start();
		$query = $this->db->where('resto_id', $restoid);
		$query = $this->db->limit(1,0);
		$query = $this->db->delete('restaurant');
		$this->db->trans_complete();
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
}