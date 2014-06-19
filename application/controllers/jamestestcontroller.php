<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JamesTestController extends MY_Controller {

	public function index()
	{
		$data['password'] = $this->encrypt->encode("flabbergasted");
		$this->loadpage("viewtest",$data);
	}
}