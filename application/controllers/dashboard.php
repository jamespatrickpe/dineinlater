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
		$city = $this->input->get('city');
		$cuisine = $this->input->get('cuisine');
		
		$data['cityResults'] = $this->Restaurant_Model->getCity();
		$data['cuisineResults'] = $this->Restaurant_Model->getCuisine();
		$data['restaurantResults'] = $this->Restaurant_Model->getAll();
		$data['css'] = "resources/allrestaurants.css";
		$this->loadPage("allrestaurants",$data);
	}
	
	public function restaurant()
	{
		$restaurant_id = $this->input->get('id');
		$data['restaurant'] = $this->Restaurant_Model->getById($restaurant_id);
		$data['$restoImage'] = $this->Restaurant_Model->getGalleryByResto($restaurant_id);
		$data['css'] = "resources/restaurant.css";
		$this->loadPage("restoprofile",$data);
	}
}
