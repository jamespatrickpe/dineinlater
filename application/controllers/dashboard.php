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
		$data['restaurantResults'] = $this->Restaurant_Model->getAll();
		$data['css'] = "resources/allrestaurants.css";
		$this->loadPage("allrestaurants",$data);
	}
	
	public function restaurant()
	{
		
	}
}
