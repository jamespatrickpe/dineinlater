<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HQ extends MY_Controller 
{
	// loads local variables
	public function __construct()
	{
		parent::__construct();
		$this->load->model('HQ_Model');
		$this->load->model('Restaurant_Model');
		$this->load->model('Reservation_Model');
		$this->load->model('Restotimeout_Model');
		$this->load->model('Restotag_Model');
		$this->sessionSecurityInterceptor("HQ");
	}
	
	// Loads main HQ Page
	public function loadPageHQ($pageToBeLoaded, $data)
	{
        $this->load->view('templates/header', $data);
		$this->load->view('hq/hq_header', $data);
		$this->load->view($pageToBeLoaded, $data);
		$this->load->view('hq/hq_footer', $data);
		$this->load->view('templates/footer', $data);
	}
	
	// Loads index dashboard
	public function index()
	{
		$id = $this->session->userdata('id');
		$data['reservationsByHQ'] = $this->Reservation_Model->reservationByHQ($id);
		$data['css'] = 'resources/account.css';
		$this->loadPageHQ("hq/hq_home", $data);
	}

	public function printableVersion()
	{
		$id = $this->session->userdata('id');
		$data['reservationsByHQ'] = $this->Reservation_Model->reservationByHQ($id);
		$this->load->view("hq/hq_home",$data);
	}

	public function hq_restaurantdashboard()
	{
		$data['css'] = 'resources/account.css';
		$id = $this->session->userdata('id');
		$data['allRestaurantsByHQ'] = $this->Restaurant_Model->getByHQ($id);
		$this->loadPageHQ("hq/hq_restaurantdashboard", $data);
	}
	
	public function accessRestaurant()
	{
		$restaurant_id = $this->input->post('restaurant_id');
		$username = $this->input->post('username');
		
		$newdata = array(
			'id'  => $dataObjectArray[0]->restaurant_id,
			'username'  => $dataObjectArray[0]->username,
			'usertype' => "RESTAURANT"
               );

		$this->session->set_userdata($newdata);
		redirect("restaurant","refresh");	
	}
}
