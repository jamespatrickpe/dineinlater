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
	
	public function editPhone()
	{
		$data['session'] = $this->session->userdata('id');
		$data['css'] = "resources/account.css";
		$this->loadpageCustomer('customer/customer_updatephone',$data);
	}
	
	public function editPhoneNow()
	{	
		if(strcmp ( $this->input->post('fbuser') , 'Y' ))
		{$this->Customer_Model->updatePhoneFB($this->session->userdata('emailadd'),$this->input->post('mobile'));}
		if(strcmp ( $this->input->post('fbuser') , 'N' ))
		{$this->Customer_Model->updatePhone($this->session->userdata('id'),$this->input->post('mobile'));}
		
		$this->session->userdata('confirmation', 'Update Successful');
		redirect("customer/editPhone","refresh");
	}
}
