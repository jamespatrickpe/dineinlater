<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_Model');
		$this->sessionSecurityInterceptor("ADMIN");
		$data['validationErrors'] = " ";
	}
	
	//Loads the Admin Home Page
	public function index()
	{
		$data['css'] = 'resources/account.css';
		$this->loadpage("administrator/admin_home",$data);	
	}
	
	//Loads Restaurant Management System
	
	//Loads Blogger System
	
	//
}
