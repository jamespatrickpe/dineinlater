<?php
class Reservation_Model extends MY_Model 
{
	// loads local variables
	public function __construct()
	{	
	}
	
	// fetches all row data
	public function getAll()
	{
		$query = $this->db->get('reservation');
        return $this->multipleResults($query);
	}
	
	// fetches row data by ID
	public function getById($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('reservation');
        return $this->singularResults($query);
	}
	
	// adds row
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
	
	// deletes reservation
	public function deleteReservation($id)
	{
		$this->db->delete('reservation', array('id' => $id)); 
	}
	
	// updates reservation
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
	
	// fetches row data by restaurant ID
	public function reservationByRestaurantID($resto_ID)
	{
		$this->db->where('resto_ID', $resto_ID);
		$query = $this->db->get('reservation');
        return $this->multipleResults($query);
	}

	// fetches row data by Customer ID
	public function reservationByCustomerID($customer_ID)
	{
		$this->db->where('customer_ID', $customer_ID);
		$query = $this->db->get('reservation');
        return $this->multipleResults($query);
	}
	
	// fetches row data by Customer and Restaurant ID
	public function reservationByRestoIDandUserID($resto_ID,$customer_ID)
	{
		$this->db->where('resto_ID', $resto_ID);
		$this->db->where('customer_ID', $customer_ID);
		$query = $this->db->get('reservation');
        return $this->multipleResults($query);
	}
}