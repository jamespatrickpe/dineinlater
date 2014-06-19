<?php
class Rating_Model extends MY_Model 
{
	public function __construct()
	{	
	}
	
	public function getAll()
	{
		$query = $this->db->get('rating');
        return $this->multipleResults($query);
	}
	
	public function getById($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('rating');
        return $this->singularResults($query);
	}
	
	public function addRating($rating, $title, $review, $customer_ID, $resto_ID, $datetime)
	{
		$data = array(
			   'rating' => $rating,
			   'title' => $title,
			   'review' => $review,
			   'customer_ID' => $customer_ID,
			   'resto_ID' => $resto_ID
			);
		$this->db->insert('customer', $data); 
	}
	
	public function deleteRating($id)
	{
		$this->db->delete('customer', array('id' => $id)); 
	}
	
	public function getByRestoID($id)
	{
		$this->db->where('resto_ID', $id);
		$query = $this->db->get('rating');
        return $this->multipleResults($query);
	}
	
	public function getByCustomerID($id)
	{
		$this->db->where('customer_ID', $id);
		$query = $this->db->get('rating');
        return $this->multipleResults($query);
	}
}