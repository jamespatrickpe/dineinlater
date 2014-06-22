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

	public function addReservation($resto_ID, $customer_ID , $slots, $note, $date, $time)
	{
		$data = array(
			   'restaurant_id' => $resto_ID,
			   'customer_ID' => $customer_ID,
			   'slots' => $slots,
			   'confirmed' => '0',
			   'note' => $note,
			   'showup' => 'NOTYET',
			   'status' => 'O',
			   'date' => $date,
			   'time' => $time
			);
		$this->db->insert('reservation', $data); 
	}
	
	// deletes reservation
	public function deleteReservation($id)
	{
		$this->db->delete('reservation', array('reservation_id' => $id)); 
	}
	
	// updates reservation
	public function updateReservation($resto_ID, $customer_ID, $slots, $confirmed, $note, $showup, $status,  $date, $time)
	{
		$data = array(
			   'resto_ID' => $resto_ID,
			   'customer_ID' => $customer_ID,
			   'slots' => $slots,
			   'confirmed' => $confirmed,
			   'note' => $note,
			   'showup' => $showup,
			   'status' => $status,
			   'date' => $date,
			   'time' => $time
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
		$sql = "SELECT r.reservation_id, CONCAT(c.firstname,' ',c.lastname) as fullname, r.time, r.date, r.slots, r.reservationmade, r.note
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
		$sql = "SELECT r.reservation_id, CONCAT(c.firstname,' ',c.lastname) as fullname,  r.time, r.date, r.slots, r.reservationmade, r.note
				FROM reservation r JOIN customer c
				ON r.customer_id = c.customer_id
				WHERE r.confirmed = 1
				AND r.restaurant_id = ?
				AND r.date = CURDATE()";
		$query = $this->db->query($sql,array($resto_ID));
        return $this->multipleResults($query);
	}
	
	public function reservationByHQ($hqid, $limit = 250)
	{
		$sql = "SELECT restaurant.name, restaurant.reservation_slots, restaurant.restostatus, restaurant.autoaccept, customer.firstname, customer.lastname, customer.cellphone, reservation.slots, reservation.confirmed, reservation.note, reservation.reservetime, reservation.reservationmade, reservation.status, reservation.showup
				FROM  `restaurant` 
				INNER JOIN  `reservation` ON restaurant.restaurant_id = reservation.restaurant_id
				INNER JOIN  `hq` ON restaurant.hq_id = hq.hq_id
				INNER JOIN  `customer` ON reservation.customer_id = customer.customer_id
				WHERE hq.hq_id = ".$hqid."
				LIMIT 0 , ".$limit."";
				
		$query = $this->db->query($sql);
        return $this->multipleResults($query);
	}
}