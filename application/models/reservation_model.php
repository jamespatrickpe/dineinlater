<?php
class Reservation_Model extends MY_Model 
{
	public function __construct()
	{	
	}
	
	public function getAll()
	{
		$query = $this->db->get('reservation');
        return $this->multipleResults($query);
	}
	
	public function getById($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('reservation');
        return $this->singularResults($query);
	}
	
	public function addReservation($resto_ID, $customer_ID, $date, $time, $slots, $confirmed, $note, $showup="NOTYET", $status="OTW")
	{
		$data = array(
			   'resto_ID' => $resto_ID,
			   'customer_ID' => $customer_ID,
			   'date' => $date,
			   'time' => $time,
			   'slots' => $slots,
			   'confirmed' => $confirmed,
			   'note' => $note,
			   'showup' => $showup,
			   'status' => $status
			);
		$this->db->insert('reservation', $data); 
	}
	
	public function deleteReservation($id)
	{
		$this->db->delete('reservation', array('id' => $id)); 
	}
	
	public function updateReservation($id,$resto_ID, $customer_ID, $date, $time, $slots, $confirmed, $note, $showup, $status)
	{
		$data = array(
				'id' => $id,
			   'resto_ID' => $resto_ID,
			   'customer_ID' => $customer_ID,
			   'date' => $date,
			   'time' => $time,
			   'slots' => $slots,
			   'confirmed' => $confirmed,
			   'note' => $note,
			   'showup' => $showup,
			   'status' => $status
			);
		$this->db->where('id', $id);
		$this->db->update('reservation', $data); 
	}
	
	public function reservationByRestoID($resto_ID)
	{
		$this->db->where('resto_ID', $resto_ID);
		$query = $this->db->get('reservation');
        return $this->multipleResults($query);
	}

	public function reservationByUserID($customer_ID)
	{
		$this->db->where('customer_ID', $customer_ID);
		$query = $this->db->get('reservation');
        return $this->multipleResults($query);
	}
	
	public function reservationByRestoIDandUserID($resto_ID,$customer_ID)
	{
		$this->db->where('resto_ID', $resto_ID);
		$this->db->where('customer_ID', $customer_ID);
		$query = $this->db->get('reservation');
        return $this->multipleResults($query);
	}
}