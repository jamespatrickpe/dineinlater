<?php
class rsvr_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}
	
	public function add_reservation($restoid = false , $custid = false , $rsvdate = false, $rsvtime = false, $numpeople = false )
	{
		$this->load->library('encrypt');
		$data = array(
			'resto_id' => $restoid,
			'customer_id' => $custid,
			'reservation_date' => $rsvdate,
			'reservation_time' => $rsvtime,
			'no_of_people' => $numpeople,
		);
		return $this->db->insert('reservation', $data);
	}
	
	public function edit_reservation($rsvid = false , $rsvdate = false, $rsvtime = false, $numpeople = false, $confirm = false )
	{
		$this->load->library('encrypt');
		$data = array(
			'reservation_date' => $rsvdate,
			'reservation_time' => $rsvtime,
			'no_of_people' => $numpeople,
			'confirmed' => $confirm
		);
		$where = "reservation_id = $rsvid"; 
		return $this->db->update_string('reservation', $data, $where);
	}

	public function delete_reservation($rsvid = false, $restoid = false , $custid = false)
	{
		$this->db->trans_start();
		$query = $this->db->where('reservation_id', $rsvid);
		$query = $this->db->where('resto_id', $restoid);
		$query = $this->db->where('customer_id', $custid);
		$query = $this->db->limit(1,0);
		$query = $this->db->delete('reservation');
		$this->db->trans_complete();
	}
	
	public function delete_reservationResto($restoid = false)
	{
		$this->db->trans_start();
		$query = $this->db->where('resto_id', $restoid);
		$query = $this->db->limit(1,0);
		$query = $this->db->delete('reservation');
		$this->db->trans_complete();
	}
	
	public function getRsvCustomer($custid = false)
	{
		$this->db->trans_start();
		$this->db->where('customer_id',$custid);
		$query = $this->db->get('reservation');
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
	
	public function getRsvResto($restoid = false)
	{
		$this->db->trans_start();
		$this->db->where('resto_id',$restoid);
		$query = $this->db->get('reservation');
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
	
	public function getRsvRestoCust($custid = false , $restoid = false)
	{
		$this->db->trans_start();
		$this->db->where('resto_id',$restoid);
		$this->db->where('customer_id',$custid);
		$query = $this->db->get('reservation');
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