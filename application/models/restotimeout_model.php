<?php
class Restotimeout_Model extends MY_Model 
{
	public function __construct()
	{	
	}
	
	// fetches all row data
	public function getAll()
	{
		$query = $this->db->get('restotimeout');
        return $this->multipleResults($query);
	}
	
	// fetches row data by ID
	public function getByID($id)
	{
		$this->db->where('restotimeout_id', $id);
		$query = $this->db->get('restotimeout');
        return $this->singularResults($query);
	}
	
	// adds row
	public function addHoliday($restaurant_id, $start_date, $end_date)
	{
		$data = array(
			   'restotimeout_id' => $restaurant_id,
			   'start_date' => $start_date,
			   'end_date' => $end_date,
			   'end_date' => $remark
			);
		$this->db->insert('restotimeout', $data); 
	}
	
	// deletes rating by customer id
	public function deleteHoliday($id)
	{
		$this->db->delete('restotimeout', array('restotimeout_id' => $id)); 
	}
	
	// fetches row by resto ID
	public function getByResto($id)
	{
		$this->db->where('restaurant_id', $id);
		$query = $this->db->get('restotimeout');
        return $this->multipleResults($query);
	}
}