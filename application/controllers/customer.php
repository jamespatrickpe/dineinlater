<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends MY_Controller 
{
	// loads local variables
	public function __construct()
	{
		parent::__construct();
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
}
