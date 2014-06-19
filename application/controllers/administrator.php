<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_Model');
		//$this->sessionSecurityInterceptor("ADMIN");
		$data['validationErrors'] = " ";
	}
	
	//loads the admin home page
	public function index()
	{
		$data['css'] = 'resources/account.css';
		$this->loadpage("admin_home",$data);	
	}
}
