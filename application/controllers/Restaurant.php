<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restaurant extends MY_Controller 
{
	
	// loads local variables
	public function __construct()
	{
		parent::__construct();
	}
	
	//loads the customer home page
	public function index()
	{
		$data['css'] = "resources/restaurant.css";
		$this->loadpage('restaurant/',$data);
	}
	
	//loads the edit restaurant page
	public function editRestaurant()
	{
		
	} 
	
	//loads the edit restaurant page
	public function attemptEditRestaurant()
	{
		
	}
	
	//loads the reservationDashboard
	public function reservationDashboard()
	{
		
	}
	
	//responds to reservation through SHOWUP, STATUS
	public function respondToReservation()
	{
		
	} 

	// NOT SURE IF THIS SHOULD BE AT RESTAURANT MODEL. MAYBE IN CUSTOMER. 
	/*
	public function index()
	{
		$this->load->model('restaurant_model');
		$this->load->model("restotag_model");
	}
	
	public function search()
	{
		$data['result'] = $this->searchAttempt();
		$data['css'] = "resources/restaurant.css";
		$this->loadpage('search_result',$data);
	}
	
	public function searchAttempt() 
	{
		$this->load->model("Restaurant_Model");
		$this->load->model("Restotag_Model");
		$keyword = $this->input->post('keyword');
		
		$output['name'] = array();
		$output['city'] = array();
		$output['cuisine'] = array();
		$output['tag'] = array();
		
		if($this->Restaurant_Model->getByName($keyword))
		{
			$output['name'] = $this->Restaurant_Model->getByName($keyword);
		}elseif($this->Restaurant_Model->getByCity($keyword))
		{
			$output['city'] = $this->Restaurant_Model->getByCity($keyword);
		}elseif($this->Restaurant_Model->getByCuisine($keyword))
		{
			$output['cuisine'] = $this->Restaurant_Model->getByCuisine($keyword);
		}elseif($this->Restotag_Model->searchTag($keyword))
		{
			$output['tag'] = $this->Restotag_Model->searchTag($keyword);
		}

		$ids = array_merge($output['name'],$output['city'],$output['cuisine'],$output['tag']);
		$result = $this->Restaurant_Model->searchResult($ids);
		return $result;
	}
	 */
}