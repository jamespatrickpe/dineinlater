<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends MY_Controller 
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
		$this->load->model('Rating_Model');
		$this->sessionSecurityInterceptor("CUSTOMER");
	}
	
	//loads the customer home page
	public function index()
	{
		$data['css'] = "resources/account.css";
		$this->loadpage('customer',$data);
	}
	
	//loads customer profile page
	public function customerProfile()
	{
		
	}
	
	//loads edit customer profile page
	public function editCustomerProfile()
	{
		
	}
	
	//attempts changes to customer profile
	public function attemptChangesCustomerProfile()
	{
		
	}
	
	//attempts Customer Search
	public function attemptSearch()
	{
		
	}
	
	public function attemptCreateReview()
	{
		$title = $this->input->post("title");
		$rating = $this->input->post("rating");
		$review = $this->input->post("review");
		$customer_id = $this->input->post("title");
		$restaurant_id = $this->input->post("title");
		
		$this->Rating_Model->addRating($rating, $title, $review, $customer_id, $restaurant_id);
		
		redirect("dashboard/restaurant?id=".$id,'refresh');
	}
	
	public function attemptCreateReservation()
	{
		redirect("dashboard/restaurant?id=".$id,'refresh');
	}
}
