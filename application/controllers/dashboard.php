<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MY_Controller 
{
	// loads local variables
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_Model');
		$this->load->model('Restaurant_Model');
		$this->load->model('HQ_Model');
		$this->load->model('Customer_Model');
		$this->load->model('Bloggers_Model');
		$this->load->model('Reservation_Model');
		$this->load->model('Rating_Model');
	}
	
	//loads the customer home page
	public function index()
	{
		//get unique values
		$data['cityResults'] = $this->Restaurant_Model->getCity();
		$data['cuisineResults'] = $this->Restaurant_Model->getCuisine();
		
		//get from _GET
		$filterTag = $this->input->get('filterTag');
		$aggregate = $this->input->get('aggregate');
		
		
		//search
		$myArray = array();
		$data['restaurantResults'] = array();
		
		if(is_array($filterTag) || $filterTag != NULL)
		{
			foreach($filterTag as $tag)
			{
				$myArray = $this->Restaurant_Model->searchResult($tag);
				if(is_array( $data['restaurantResults'] ) && is_array( $myArray ))
				{
					$data['restaurantResults'] = array_merge($data['restaurantResults'] ,$myArray);
				}
			}
		}
		else
		{
			$data['restaurantResults'] = $this->Restaurant_Model->searchResult($aggregate);
		}
		
		$data['css'] = "resources/allrestaurants.css";
		$this->loadPage("allrestaurants",$data);
	}
	
	public function restaurant()
	{
		
		$restaurant_id = $this->input->get('id');
		$data['restaurant'] = $this->Restaurant_Model->getById($restaurant_id);
		$data['restoImage'] = $this->Restaurant_Model->getGalleryByResto($restaurant_id);
		$data['restoReview'] = $this->Rating_Model->getByRestoID($restaurant_id);
		$data['restoRating'] = $this->Rating_Model->getRatingByRestaurant($restaurant_id);
		
		
		
		$data['css'] = "resources/restaurant.css";
		$this->loadPage("restoprofile",$data);
		
	}
}
