<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TestController extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, its's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['test'] = 'TEST';
		$this->load->model('admin_model');
		
		$data['test'] = $this->admin_model->getById(1);
		
		$data['css'] = 'resources/about.css';
		$this->loadpage('viewtest',$data);
		
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */