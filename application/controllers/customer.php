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
		$this->load->model('Rating_Model');
		$this->load->model('Customer_Model');
		$this->load->model('Bloggers_Model');
		$this->load->model('Reservation_Model');
		$this->sessionSecurityInterceptor("CUSTOMER");
		$data['validationErrors'] = " ";
	}
	
	
	public function loadpageCustomer($pageToBeLoaded,$data)
    {
        $this->load->view('templates/header', $data);
		$this->load->view('customer/customer_header', $data);
		$this->load->view($pageToBeLoaded, $data);
		$this->load->view('customer/customer_footer', $data);
		$this->load->view('templates/footer', $data);
    }
	
	//loads the customer home page
	public function index()
	{
		$data['css'] = "resources/account.css";
		$this->loadpageCustomer('customer/customer_home',$data);
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
	
	public function customerReviews()
	{
		$data['reviews'] = $this->Rating_Model->getByCustomerID($this->session->userdata('id'));
		$data['css'] = "resources/account.css";
		$this->loadpageCustomer('customer/customer_reviews',$data);
	}
	
	public function customerReservations()
	{
		$data['reservations'] = $this->Reservation_Model->reservationByCustomerID($this->session->userdata('id'));
		$data['css'] = "resources/account.css";
		$this->loadpageCustomer('customer/customer_reservations',$data);
	}
	
	public function editPhone()
	{
		$data['session'] = $this->session->userdata('id');
		$data['css'] = "resources/account.css";
		$this->loadpageCustomer('customer/customer_updatephone',$data);
	}
	
	public function editPhoneNow()
	{	
		$this->Customer_Model->updatePhone($this->session->userdata('id'),$this->input->post('mobile'));
		$this->session->userdata('confirmation', 'Update Successful');
		redirect("customer/editPhone","refresh");
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
