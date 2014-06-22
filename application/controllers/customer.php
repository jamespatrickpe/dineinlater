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
		$this->load->model('Reservation_Model');
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
		$customer_id = $this->session->userdata('id');
		$restaurant_id = $this->input->post("restaurant_id");
		
		$this->Rating_Model->addRating($rating, $title, $review, $customer_id, $restaurant_id);
		redirect("dashboard/restaurant?id=".$restaurant_id,'refresh');
	}
	
	public function attemptCreateReservation()
	{
		$slots = $this->input->post("slots");
		$reservedate = $this->input->post("reservedate");
		$reservetime = $this->input->post("reservetime");
		$note = $this->input->post("note");		
		$customer_id = $this->session->userdata('id');
		$restaurant_id = $this->input->post("restaurant_id");
		$this->Reservation_Model->addReservation($restaurant_id, $customer_id, $reservetime , $slots, $note);
		redirect("dashboard/restaurant?stat=done&id=".$restaurant_id,'refresh');
	}
}
