<?php
class Customer_Model extends MY_Model 
{
	public function __construct()
	{	
	}
	
	public function getAll()
	{
		$query = $this->db->get('customer');
        return $this->multipleResults($query);
	}
	
	public function getById($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('customer');
        return $this->singularResults($query);
	}
	
	public function getByUsername($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('customer');
        return $this->singularResults($query);
	}
	
	public function getByEmail($email)
	{
		$this->db->where('emailadd', $email);
		$query = $this->db->get('customer');
        return $this->singularResults($query);
	}
	
	public function addCustomer($firstname,$lastname,$emailadd,$username,$password)
	{
		$data = array(
			   'firstname' => $firstname,
			   'lastname' => $lastname,
			   'emailadd' => $emailadd,
			   'username' => $username,
			   'password' => $password
			);
		$this->db->insert('customer', $data); 
	}
	
	public function deleteCustomer($id)
	{
		$this->db->delete('customer', array('id' => $id)); 
	}
	
	public function updateEmail($id)
	{
		$this->db->where('id', $id);
		$this->db->update('emailadd', $emailadd); 
	}
	
	public function updateUsername($id)
	{
		$this->db->where('id', $id);
		$this->db->update('username', $username); 
	}
	
	public function updatePassword($id)
	{
		$this->db->where('id', $id);
		$this->db->update('password', $password); 
	}
}