<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Customer_Model');
		$data['validationErrors'] = " ";
	}
	
	public function index()
	{
		$data['validationErrors'] = " ";
		$this->session->sess_destroy();
		$data['css'] = 'resources/register.css';
		$this->load->library('form_validation');
		$this->loadpage("register",$data);
	}
	
	public function createNewCustomer()
	{
		$data['validationErrors'] = " ";
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[Customer.username]');
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|matches["password_check"]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[Customer.emailadd]|valid_email');
		
		$termsandconditions = $this->input->post('termsandconditions');
		$username = $this->input->post('username');
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$password = $this->input->post('password');
		$emailadd = $this->input->post('email');
		
		if (($this->form_validation->run() === FALSE) && ($termsandconditions != TRUE))
		{
			$data['css'] = 'resources/register.css';
			$data['validationErrors'] = $termsandconditions;
			$this->loadpage("register",$data);
		}
		else
		{
			$this->Customer_Model->addCustomer($firstname,$lastname,$emailadd,$username,$password);
			redirect('/','refresh');
		}
	}
	
	public function termsandconditions()
	{
		$this->load->view('termsandconditions');
	}
}
