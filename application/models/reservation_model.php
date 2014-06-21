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
		$this->db->where('reservation_id', $id);
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
		$this->db->delete('reservation', array('reservation_id' => $id)); 
	}
	
	// updates reservation
	public function updateReservation($id,$resto_ID, $customer_ID, $date, $time, $slots, $confirmed, $note, $showup, $status)
	{
		$data = array(
				'reservation_id' => $id,
			   'restaurant_id' => $resto_ID,
			   'customer_id' => $customer_ID,
			   'date' => $date,
			   'time' => $time,
			   'slots' => $slots,
			   'confirmed' => $confirmed,
			   'note' => $note,
			   'showup' => $showup,
			   'status' => $status
			);
		$this->db->where('reservation_id', $id);
		$this->db->update('reservation', $data); 
	}
	
	public function confirmReservation()
	{
		$data = array(
				'reservation_id' => $id,
			    'status' => $status
			);
		$this->db->where('reservation_id', $id);
		$this->db->update('reservation', $data); 
	}
	
	// fetches row data by restaurant ID 
	public function reservationByRestaurantID($resto_ID)
	{
		$this->db->where('restaurant_id', $resto_ID);
		$query = $this->db->get('reservation');
        return $this->multipleResults($query);
	}
	
	// fetches row data by restaurant ID and Status O
	public function reservationByRestaurantIDOpen($resto_ID)
	{
		$sql = "SELECT r.reservation_id, CONCAT(c.firstname,' ',c.lastname) as fullname, r.date, r.time, r.slots, r.reservationmade, r.note
				FROM reservation r JOIN customer c
				ON r.customer_id = c.customer_id
				WHERE r.confirmed = 0
				AND r.restaurant_id = ?
				AND r.status NOT IN ('C','R')";
		$query = $this->db->query($sql,array($resto_ID));
        return $this->multipleResults($query);
	}

	// fetches row data by Customer ID
	public function reservationByCustomerID($customer_ID)
	{
		$this->db->where('customer_id', $customer_ID);
		$query = $this->db->get('reservation');
        return $this->multipleResults($query);
	}
	
	// fetches row data by Customer and Restaurant ID
	public function reservationByRestoIDandUserID($resto_ID,$customer_ID)
	{
		$this->db->where('restaurant_id', $resto_ID);
		$this->db->where('customer_id', $customer_ID);
		$query = $this->db->get('reservation');
        return $this->multipleResults($query);
	}
	
	public function approveReservation($reservation_id)
	{
		$data = array('confirmed' => '1');
        
		$this->db->update('reservation', $data, array('reservation_id' => $reservation_id));
	}
	
	public function rejectReservation($reservation_id)
	{
		$data = array('confirmed' => '1' ,
				      'status' => 'R');
        
		$this->db->update('reservation', $data, array('reservation_id' => $reservation_id));
	}
	
	public function reservationRestoToday($resto_ID)
	{
		$sql = "SELECT r.reservation_id, CONCAT(c.firstname,' ',c.lastname) as fullname, r.date, r.time, r.slots, r.reservationmade, r.note
				FROM reservation r JOIN customer c
				ON r.customer_id = c.customer_id
				WHERE r.confirmed = 1
				AND r.restaurant_id = ?
				AND r.date = CURDATE()";
		$query = $this->db->query($sql,array($resto_ID));
        return $this->multipleResults($query);
	}
}