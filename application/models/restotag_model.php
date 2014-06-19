<?php
class Restotag_Model extends MY_Model 
{
	public function __construct()
	{	
	}
	
	public function getAll()
	{
		$query = $this->db->get('restotag');
        return $this->multipleResults($query);
	}
	
	public function getById($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('restotag');
        return $this->singularResults($query);
	}
	
	public function addTagName($tag, $restoID)
	{
		$data = array(
			   'tagname' => $tag,
			   'resto_ID' => $restoID
			);
		$this->db->insert('restotag', $data); 
	}
	
	public function deleteTag($id)
	{
		$this->db->delete('restotag', array('id' => $id)); 
	}
}