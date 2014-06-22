<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MY_Controller 
{
	// loads local variables
	public function __construct()
	{
		parent::__construct();
	}
	
	//loads the customer home page
	public function index()
	{
		$data['restaurantResults'] = 
		$data['css'] = "resources/allrestaurants.css";
		$this->loadPage("allrestaurants",$data);
	}
}
