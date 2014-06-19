<?php
class Admin_Model extends MY_Model 
{
	public function __construct()
	{	
	}
	
	public function getAll()
	{
		$query = $this->db->get('admin');
        return $this->multipleResults($query);
	}
	
	public function getById($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('admin');
        return $this->singularResults($query);
	}
	
	public function getByUsername($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('admin');
        return $this->singularResults($query);
	}
	
	public function addAdmin($username, $password)
	{
		$data = array(
			   'username' => $username,
			   'password' => $password
			);
		$this->db->insert('admin', $data); 
	}
	
	public function deleteAdmin($id)
	{
		$this->db->delete('admin', array('id' => $id)); 
	}
}