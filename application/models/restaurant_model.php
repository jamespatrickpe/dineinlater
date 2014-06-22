<?php
class Restaurant_Model extends MY_Model 
{
	public function __construct()
	{	
	}
	
	public function getAll()
	{
		$query = $this->db->get('restaurant');
        return $this->multipleResults($query);
	}
	
	public function getByHQ($id)
	{
		$this->db->where('hq_id', $id);
		$query = $this->db->get('restaurant');
        return $this->multipleResults($query);
	}
	
	public function deleteRestaurant($id)
	{
		$this->db->delete('restaurant', array('restaurant_id' => $id)); 
	}
	
	public function getById($id)
	{
		$this->db->where('restaurant_id', $id);
		$query = $this->db->get('restaurant');
        return $this->singularResults($query);
	}
	
	public function updateResto($data, $id)
	{
		$data = array_filter($data);
		$this->db->where('restaurant_id', $id);
		$this->db->update('restaurant', $data); 
	}
	
	public function getByUsername($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('restaurant');
        return $this->singularResults($query);
	}
	
	public function getByCuisine($cuisine)
	{
		$this->db->select('restaurant_id');		
		$this->db->like('cuisine', $cuisine);
		$query = $this->db->get('restaurant');
        return $this->multipleResults($query);
	}
	
	public function getByCity($city)
	{
		$this->db->select('restaurant_id');	
		$this->db->like('city', $city);
		$query = $this->db->get('restaurant');
        return $this->multipleResults($query);
	}
	
	public function getByName($name)
	{
		$this->db->select('restaurant_id');	
		$this->db->like('name', $name);
		$query = $this->db->get('restaurant');
        return $this->multipleResults($query);
	}
	
	public function searchById($id)
	{
		$this->db->select('restaurant_id');	
		$this->db->where('restaurant_id', $id);
		$query = $this->db->get('restaurant');
        return $this->singularResults($query);
	}
	
	public function searchResult($id)
	{
		
		return $this->multipleResults($query);
	}
	
	public function getCity()
	{
		$sql = "SELECT city
				FROM dineinlater.restaurant
				GROUP BY city;";
		$query = $this->db->query($sql);
        return $this->multipleResults($query);
	}
	
	public function getCuisine()
	{
		$sql = "SELECT cuisine
				FROM dineinlater.restaurant
				GROUP BY cuisine;";
		$query = $this->db->query($sql);
        return $this->multipleResults($query);
	}
	
	public function addRestaurant($myReservationArray = array())
	{
		$data = array(
			   'name' => $myReservationArray['name'],
			   'owner' => $myReservationArray['owner'],
			   'mobile' => $myReservationArray['mobile'],
			   'landline' => $myReservationArray['landline'],
			   'google_lat' => $myReservationArray['google_lat'],
			   'google_long' => $myReservationArray['google_long'],
			   'reservation_slots' => $myReservationArray['slots'],
			   'logo_photo' => $myReservationArray['logo_photo'],
			   'menu_photo' => $myReservationArray['menu_photo'],
			   'websiteurl' => $myReservationArray['url'],
			   'description' => $myReservationArray['description'],
			   'autoaccept' => $myReservationArray['autoaccept'],
			   'username' => $myReservationArray['username'],
			   'password' => $this->encrypt->encode($myReservationArray['password']),
			   'address' => $myReservationArray['address'],
			   'city' => $myReservationArray['city'],
			   'cuisine' => $myReservationArray['cuisine'],
			   'hq_id' => $myReservationArray['hq'],
			   'restostatus' => $myReservationArray['status'],
			   'open_time' => $myReservationArray['open_time'],
			   'close_time' => $myReservationArray['close_time'],
			   'rest_start' => $myReservationArray['rest_start'],
			   'rest_end' => $myReservationArray['rest_end']
			);
		$this->db->insert('restaurant', $data); 
	}
	
	public function deleteReservation($id)
	{
		$this->db->delete('restaurant', array('restaurant_id' => $id)); 
	}

	public function updateReservation($id,$myReservationArray)
	{
		$this->deleteReservation($id);
		$this->addReservation($myReservationArray);
	}
	
	public function getRatingByID()
	{
		//DO THIS RAYMS!
	}
}