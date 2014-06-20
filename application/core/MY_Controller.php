<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class MY_Controller Extends CI_Controller{
	
    public function __construct(){
        parent::__construct();
		$data = array();
    }

    public function loadpage($pageToBeLoaded,$data)
    {
        $this->load->view('templates/header', $data);
		$this->load->view($pageToBeLoaded, $data);
		$this->load->view('templates/footer', $data);
    }
	
	public function sessionSecurityInterceptor($typeOfAccount)
	{
		$currentSessionType = $this->session->userdata('usertype');
		$currentSessionID = $this->session->userdata('id');
		if(($currentSessionType == $typeOfAccount) && (isset($currentSessionID) == TRUE))
		{
			// Carry On..
		}
		else 
		{
			$this->session->sess_destroy();
			redirect('/','refresh');
		}
	}
	
    public function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
}