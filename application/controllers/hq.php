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
	
}
