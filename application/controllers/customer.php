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
	
	//Form Validation
	public function validateForm($returnPage)
	{
		if($this->form_validation->run() == FALSE)
		{
			$data['css'] = 'resources/account.css';
			$this->session->set_flashdata('validationErrors', validation_errors());
			redirect($returnPage,'refresh');
		}
	}
	
	public function customerReviews()
	{
		$data['reviews'] = $this->Rating_Model->getByCustomerID($this->session->userdata('id'));
		$data['css'] = "resources/account.css";
		$this->loadpageCustomer('customer/customer_reviews',$data);
	}
	
	public function customerReservations()
	{
		$data['reservations'] = $this->Reservation_Model->allReservationsByCustomerID( $this->session->userdata('id') );
		$data['css'] = "resources/account.css";
		$this->loadpageCustomer('customer/customer_reservations',$data);
	}
	
	public function editPhone()
	{
		$data['session'] = $this->session->userdata('id');
		$data['myCustomer'] = $this->Customer_Model->getById( $this->session->userdata('id') );
		
		$data['css'] = "resources/account.css";
		$this->loadpageCustomer('customer/customer_updatephone',$data);
	}
	
	public function editPhoneNow()
	{
		$restoID = $this->input->post('restoID');	
		$this->form_validation->set_rules('cellphone', 'cellphone', 'required');
		$this->validateForm("customer/editPhone?resto_id=".$restoID);
		
		$this->Customer_Model->updatePhone($this->session->userdata('id'),$this->input->post('cellphone'));
		$this->session->userdata('confirmation', 'Update Successful');
		redirect("dashboard/restaurant?id=".$restoID,"refresh");
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
	
	public function cancelReservation()
	{
		$cancelID = $this->input->get("reservationID");
		$this->Reservation_Model->cancelReservationById($cancelID);
		redirect("customer/customerReservations",'refresh');
	}
	
	public function checkCreateReservation()
	{
		$restaurant_id = $this->input->post("restaurant_id");
			
		$this->form_validation->set_rules('reservetime', 'Reserve Time', 'required');
		$this->form_validation->set_rules('reservedate', 'Reserve Date', 'required');
		$this->form_validation->set_rules('slots', 'slots', 'required|numeric');
		$this->form_validation->set_rules('note', 'note', 'max_length[128]');
		
		$reservetime = $this->input->post("reservetime");
		$reservedate = $this->input->post("reservedate");
		$slots = $this->input->post("slots");
		$note = $this->input->post("note");	
		
		$customer_id = $this->session->userdata('id');
		$restaurant_id = $this->input->post("restaurant_id");
		
		$this->validateForm("dashboard/restaurant?stat=done&id=".$restaurant_id);
		
		
		$customer_id = $this->session->userdata('id');
		
		//Cellphone validation
		$cellphoneValidation = $this->Customer_Model->getCellphoneById( $customer_id );
		if(!($cellphoneValidation[0]->cellphone))
		{
			redirect("customer/editPhone?resto_id=".$restaurant_id,'refresh');
		}
		
		//add reservation
		$result = $this->Restaurant_Model->checkBlockTime($restaurant_id,$reservetime);
		if(is_array($result))
		{
			$this->Reservation_Model->addReservation($restaurant_id, $customer_id, $slots, $note, $reservedate, $reservetime);
			$this->session->set_flashdata('validationErrors', 'Reservation Successful!!');
		}
		else
		{
			$this->session->set_flashdata('validationErrors', 'Reservation Time is unavailable; <br> Please choose another!');
		}
		redirect("dashboard/restaurant?stat=done&id=".$restaurant_id,'refresh');

	}
}
