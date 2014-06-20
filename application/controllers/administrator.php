<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_Model');
		$this->load->model('Restaurant_Model');
		$this->load->model('HQ_Model');
		$this->load->model('Customer_Model');
		$this->load->model('Bloggers_Model');
		$this->sessionSecurityInterceptor("ADMIN");
		$data['validationErrors'] = " ";
	}
	
	//loadpage for Admin
	public function loadpageAdmin($pageToBeLoaded,$data)
    {
        $this->load->view('templates/header', $data);
		$this->load->view('administrator/admin_header', $data);
		$this->load->view($pageToBeLoaded, $data);
		$this->load->view('administrator/admin_footer', $data);
		$this->load->view('templates/footer', $data);
    }
	
	//Deletes an Administrator
	public function attemptDeleteAdmin()
	{
		$id = $this->input->post('selectedAdminToBeDeleted');
		$this->Admin_Model->deleteAdmin($id);
		redirect("administrator/admin","refresh");
	}
	
	//Adds an Administrator
	public function attemptAddAdmin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->Admin_Model->addAdmin($username, $password);
		redirect("administrator/admin","refresh");
	}
	
	//Loads the Admin Home Page
	public function index()
	{
		$data['css'] = 'resources/account.css';
		$this->loadpageAdmin("administrator/admin_home",$data);	
	}
	
	//Loads the Admin Home Page
	public function admin()
	{
		$data['adminResults'] = $this->Admin_Model->getAll();
		$data['css'] = 'resources/account.css';
		$this->loadpageAdmin("administrator/admin_administrators",$data);	
	}
	
	//Loads Restaurant Management System
	public function resto()
	{
		$raw = $this->Restaurant_Model->getAll();
		$data['restaurantResults'] = $this->Restaurant_Model->getAll();
		$data['css'] = 'resources/account.css';
		$this->loadpageAdmin("administrator/admin_resto",$data);	
	}
	
	//Loads Restaurant Management System
	public function blog()
	{
		$data['blogResults'] = $this->Bloggers_Model->getAll();
		$data['css'] = 'resources/account.css';
		$this->loadpageAdmin("administrator/admin_blog",$data);	
	}
	
	//Loads Restaurant Management System
	public function customer()
	{
		$data['customerResults'] = $this->Customer_Model->getAll();
		$data['css'] = 'resources/account.css';
		$this->loadpageAdmin("administrator/admin_customer",$data);	
	}
	
	//Loads Restaurant Management System
	public function hq()
	{
		$data['HQResults'] = $this->HQ_Model->getAll();
		$data['css'] = 'resources/account.css';
		$this->loadpageAdmin("administrator/admin_HQ",$data);	
	}
	
	//Loads Blogger System
	
	//
}
