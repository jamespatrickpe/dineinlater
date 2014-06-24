<?php
class Restogallery_Model extends MY_Model 
{
	public function __construct()
	{	
	}
	
	public function getAll()
	{
		$query = $this->db->get('restogallery');
        return $this->multipleResults($query);
	}
	
	public function getById($id)
	{
		$this->db->where('restogallery_id', $id);
		$query = $this->db->get('restogallery');
        return $this->singularResults($query);
	}
	
	public function addPicture($picURL  = "resources/uploads/something.jpg", $restoID)
	{
		$data = array(
			   'picURL' => $picURL,
			   'restoID' => $restoID
			);
		$this->db->insert('restogallery', $data); 
	}
	
	public function deletePicture($id)
	{
		$this->db->delete('restogallery', array('restogallery_id' => $id)); 
	}
	
	// Gets all restaurants by ID
	public function getAllByRestaurantID($id)
	{
		$this->db->where('restoID', $id);
		$query = $this->db->get('restogallery');
        return $this->multipleResults($query);
	}
}