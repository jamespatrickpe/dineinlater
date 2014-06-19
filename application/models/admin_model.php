<?php
class Admin_Model extends MY_Model 
{
	// loads Local variables
	public function __construct()
	{	
	}
	
	//Gets all available administrators
	public function getAll()
	{
		$query = $this->db->get('admin');
        return $this->multipleResults($query);
	}
	
	//Get ALL from a singular ID Result
	public function getById($id)
	{
		$this->db->where('admin_id', $id);
		$query = $this->db->get('admin');
        return $this->singularResults($query);
	}
	
	//Get ALL from a singular Username Result
	public function getByUsername($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('admin');
        return $this->singularResults($query);
	}
	
	//Adds an administrator
	public function addAdmin($username, $password)
	{
		$data = array(
			   'username' => $username,
			   'password' => $this->encrypt->encode($password)
			);
		$this->db->insert('admin', $data); 
	}
	
	// Deletes an Admin based on ID
	public function deleteAdmin($id)
	{
		$this->db->delete('admin', array('admin_id' => $id)); 
	}
}