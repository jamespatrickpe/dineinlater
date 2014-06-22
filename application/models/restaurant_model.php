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
	
	public function searchByCuisine($cuisine)
	{
		$sql = "select r.restaurant_id,r.name,r.address,r.city,r.description,r.logo_photo,rt.rating 
									from restaurant r join (select restaurant_id,avg(rating) as 'rating' from rating group by restaurant_id) rt 
									on r.restaurant_id = rt.restaurant_id
									where r.cuisine like (?)";
		$query = $this->db->query($sql,array($cuisine));
		return $this->multipleResults($query);
	}
	
	public function searchByCity($city)
	{
		$sql = "select r.restaurant_id,r.name,r.address,r.city,r.description,r.logo_photo,rt.rating 
									from restaurant r join (select restaurant_id,avg(rating) as 'rating' from rating group by restaurant_id) rt 
									on r.restaurant_id = rt.restaurant_id
									where r.city like (?)";
		$query = $this->db->query($sql,array($city));
		return $this->multipleResults($query);
	}
	
	public function searchByName($name)
	{
		$sql = "select r.restaurant_id,r.name,r.address,r.city,r.description,r.logo_photo,rt.rating 
									from restaurant r join (select restaurant_id,avg(rating) as 'rating' from rating group by restaurant_id) rt 
									on r.restaurant_id = rt.restaurant_id
									where r.name like (?)";
		$query = $this->db->query($sql,array($name));
		return $this->multipleResults($query);
	}
	
	public function searchById($id)
	{
		$this->db->select('restaurant_id');	
		$this->db->where('restaurant_id', $id);
		$query = $this->db->get('restaurant');
        return $this->singularResults($query);
	}
	
	public function searchResult($keyword)
	{
		$keyword = '%'.$keyword.'%';
		$sql = "select r.restaurant_id,r.name,r.address,r.city,r.description,r.logo_photo,rt.rating 
									from restaurant r join (select restaurant_id,avg(rating) as 'rating' from rating group by restaurant_id) rt 
									on r.restaurant_id = rt.restaurant_id
									where r.name like ?
									or r.city like ?
									or r.cuisine like ?";
		$query = $this->db->query($sql,array($keyword,$keyword,$keyword));
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
	
	public function getRestoByCity($city)
	{
		$sql = "SELECT *
				FROM dineinlater.restaurant
				WHERE city IN (?)
				GROUP BY city;";
		$query = $this->db->query($sql,array($city));
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
	
	public function getRestoByCuisine($cuisine)
	{
		$sql = "SELECT *
				FROM dineinlater.restaurant
				WHERE cuisine IN (?)
				GROUP BY cuisine;";
		$query = $this->db->query($sql,array($cuisine));
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
	
	public function getGalleryByResto($restaurant_id)
	{
		$this->db->where('restoID', $restaurant_id);
		$query = $this->db->get('restogallery');
        return $this->multipleResults($query);
	}
}