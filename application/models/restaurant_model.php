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
	
	public function getById($id)
	{
		$this->db->where('restaurant_id', $id);
		$query = $this->db->get('restaurant');
        return $this->singularResults($query);
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
		$in = '';
		foreach($id as $rows)
		{
			foreach($rows as $cells)
			{
				$in = $in.$cells;
			}
			break;
			$in = $in.',';
		}
		$query = $this->db->where_in("r.id",$in);
		$query = $this->db->query("select r.id,r.name,r.address,r.description,r.logo_photo,rt.rating 
									from restaurant r join (select restaurant_id,avg(rating) as 'rating' from rating group by restaurant_id) rt 
									on r.id = rt.restaurant_id
									where r.id in ($in)");
		
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
			   'slots' => $myReservationArray['slots'],
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
			   'hq' => $myReservationArray['hq'],
			   'status' => $myReservationArray['status'],
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
}