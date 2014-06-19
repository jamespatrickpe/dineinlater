<?php
class rate_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}
	
	public function add_rating($restoid = false , $custid = false , $rating = false)
	{
		$this->load->library('encrypt');
		$data = array(
			'resto_id' => $restoid,
			'customer_id' => $custid,
			'rating' => $rating
		);
		return $this->db->insert('rating', $data);
	}
	
	public function edit_rating($restoid = false , $custid = false , $rating = false)
	{
		$this->load->library('encrypt');
		$data = array('rating' => $rating);
		$where = "resto_id = $restoid AND customer_id = $custid"; 
		return $this->db->update_string('rating', $data, $where);
	}

	public function delete_rating($restoid = false , $custid = false)
	{
		$this->db->trans_start();
		$query = $this->db->where('resto_id', $restoid);
		$query = $this->db->where('customer_id', $custid);
		$query = $this->db->limit(1,0);
		$query = $this->db->delete('rating');
		$this->db->trans_complete();
		return $query;
	}
	
	public function delete_ratingResto($restoid = false)
	{
		$this->db->trans_start();
		$query = $this->db->where('resto_id', $restoid);
		$query = $this->db->limit(1,0);
		$query = $this->db->delete('rating');
		$this->db->trans_complete();
		return $query;
	}
	
	public function getRatingResto($restoid = false)
	{
		$this->db->trans_start();
		$this->db->select_avg('rating');
		$this->db->group_by('resto_id');
		$query = $this->db->get('rating');
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
	
	public function getRatingRestoCust($custid = false , $restoid = false)
	{
		$this->db->trans_start();
		$this->db->where('resto_id',$restoid);
		$this->db->where('customer_id',$custid);
		$query = $this->db->get('rating');
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
}