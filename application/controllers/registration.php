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
		//$this->form_validation->set_rules('password', 'Password', 'required|matches["password_check"]');
		$this->form_validation->set_rules('password_check', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[Customer.emailadd]|valid_email');
		$this->form_validation->set_rules('cellphone', 'Cellphone', 'required');
		
		$username = $this->input->post('username');
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$password = $this->input->post('password');
		$password_check = $this->input->post('password_check');
		$emailadd = $this->input->post('email');
		$cellphone = $this->input->post('cellphone'); 
		
		if (($this->form_validation->run() === FALSE))
		{
			$data['css'] = 'resources/register.css';
			$data['validationErrors'] = validation_errors()."/".$password."/".$password_check."/";
			$this->loadpage('register',$data);
		}
		else
		{
			$this->Customer_Model->addCustomer($firstname,$lastname,$emailadd,$username,$password,$cellphone);
			$data['css'] = 'resources/splash.css';
			$data['formDestination'] = "login/attemptLoginCustomer";
			$data['validationErrors'] = "Regisration Successful! Try Logging In!";
			$this->loadpage('login',$data);
		}
	}
	
	public function termsandconditions()
	{
		$this->load->view('termsandconditions');
	}
}
