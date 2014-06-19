<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logout extends MY_Controller {

	public function index()
	{
		$this->load->library('session');
		$this->session->sess_destroy();	
			
		$data['css'] = 'resources/splash.css';
		$this->loadpage('start_index',$data);
	}
}