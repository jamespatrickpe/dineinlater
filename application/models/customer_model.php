<?php
class Customer_Model extends MY_Model 
{
	 // loads local variables
	public function __construct()
	{	
	}
	
	// fetches all row data
	public function getAll()
	{
		$query = $this->db->get('customer');
        return $this->multipleResults($query);
	}
	
	// gets customer by Id
	public function getById($id)
	{
		$this->db->where('customer_id', $id);
		$query = $this->db->get('customer');
        return $this->singularResults($query);
	}
	
	public function getUsernameByID($id)
	{
		$this->db->select('username');
		$this->db->where('customer_id', $id);
		$query = $this->db->get('customer');
        return $this->singularResults($query);
	}
	
	// get customer by username
	public function getByUsername($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('customer');
        return $this->singularResults($query);
	}
	
	// get customer by email
	public function getByEmail($email)
	{
		$this->db->where('emailadd', $email);
		$query = $this->db->get('customer');
        return $this->singularResults($query);
	}
	
	// add customer
	public function addCustomer($firstname,$lastname,$emailadd,$username,$password,$cellphone)
	{
		$data = array(
			   'firstname' => $firstname,
			   'lastname' => $lastname,
			   'emailadd' => $emailadd,
			   'username' => $username,
			   'password' => $this->encrypt->encode($password),
			   'cellphone' => $cellphone
			);
		$this->db->insert('customer', $data); 
	}
	
	public function addFBCustomer($firstname,$lastname,$emailadd,$username)
	{
		$data = array(
			   'firstname' => $firstname,
			   'lastname' => $lastname,
			   'emailadd' => $emailadd,
			   'username' => $username,
			   'password' => $this->encrypt->encode(rand(1000000,999999999)),
			   'cellphone' => 0000000000
			);
		$this->db->insert('customer', $data); 
	}
	
	// delete customer
	public function deleteCustomer($id)
	{
		$this->db->delete('customer', array('customer_id' => $id)); 
	}
	
	// update customer email
	public function updateEmail($id)
	{
		$this->db->where('customer_id', $id);
		$this->db->update('emailadd', $emailadd); 
	}
	
	// update customer username
	public function updateUsername($id,$username)
	{
		$this->db->where('customer_id', $id);
		$this->db->update('customer', $username); 
	}
	
	// update customer password
	public function updatePassword($id,$password)
	{
		$this->db->where('customer_id', $id);
		$this->db->update('customer', $this->encrypt->encode($password)); 
	}
	
	public function updatePhone($id,$phone)
	{
		$data = array(
				'cellphone' => $phone
			);
		$this->db->where('customer_id', $id);
		$this->db->update('customer', $data); 
	}
}