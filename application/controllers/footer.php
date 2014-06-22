<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// loads all possible footer items
class Footer extends MY_Controller 
{

	// loads the "about" section
	public function index()
	{
		$data['css'] = 'resources/footer.css';
		$this->loadpage('about',$data);
	}
	
	// loads the "about" section
	public function about()
	{
		$data['css'] = 'resources/footer.css';
		$this->loadpage('about',$data);
	}
	
	// loads the "contact" section
	public function contact()
	{
		$data['css'] = 'resources/footer.css';
		$this->loadpage('contact',$data);
	}
	
	// loads the "faq" section
	public function faq()
	{
		$data['css'] = 'resources/footer.css';
		$this->loadpage('faq',$data);
	}
	
	// loads the "privacy" section
	public function privacy()
	{
		$data['css'] = 'resources/footer.css';
		$this->loadpage('privacy',$data);
	}
	
	public function getBloggers()
	{
		
	}
	
	//bloggers
	public function bloggers()
	{
		$data['css'] = 'resources/blogger-reviews.css';
		$this->load->model('Bloggers_Model');
		$data['bloggers'] = $this->Bloggers_Model->getAll();
		$this->loadpage('bloggerscorner',$data);
	}
}