<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Loads all Footer items
class Footer extends MY_Controller 
{
	public function index()
	{
		$data['css'] = 'resources/footer.css';
		$this->loadpage('about',$data);
	}
	
	public function about()
	{
		$data['css'] = 'resources/footer.css';
		$this->loadpage('about',$data);
	}
	
	public function contact()
	{
		$data['css'] = 'resources/footer.css';
		$this->loadpage('contact',$data);
	}
	
	public function faq()
	{
		$data['css'] = 'resources/footer.css';
		$this->loadpage('faq',$data);
	}
	
	public function privacy()
	{
		$data['css'] = 'resources/footer.css';
		$this->loadpage('privacy',$data);
	}
}