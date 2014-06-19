<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller 
{		
	public function index()
	{
		//CANT SHARE THESE VARIABLES FOR SOME REASONS!!!!
		$this->session->sess_destroy();
		$data['css'] = "resources/splash.css";
		$data['validationErrors'] = " ";
		$data['formDestination'] = "login/attemptLoginCustomer";
		$this->loadpage('login',$data);
	}
	
	public function login_admin()
	{
		$this->session->sess_destroy();
		$data['css'] = "resources/splash.css";
		$data['validationErrors'] = " ";
		$data['formDestination'] = "login/attemptLoginAdmin";
		$this->loadpage('login',$data);
		//sample
		//ceraa cerraaaa
	}
	
	public function login_restaurant()
	{
		$this->session->sess_destroy();
		$data['css'] = "resources/splash.css";
		$data['validationErrors'] = " ";
		$data['formDestination'] = "login/attemptLoginRestaurant";
		$this->loadpage('login',$data);
	}
	
	public function attemptLoginCustomer()
	{
		//INITIALIZE
		$data['validationErrors'] = " ";
		$data['css'] = "resources/splash.css";
		$this->load->model("Customer_Model");
		
		//INITIALIZE AND CHECK VALUES
		if($this->initializeValues() != false)
		{
			$formData = $this->initializeValues();
			
			//GET USERNAME AND PASSWORD FROM DATABASE
			$dbResultsFromUsername = $this->Customer_Model->getByUsername($formData['username']);
			$dbResultsFromEmail = $this->Customer_Model->getByEmail($formData['username']);
			$checked = $this->input->post('stayloggedin');
			
			if($checked == "CHECKED")
			{
				$checked = TRUE;
			}
			else
			{
				$checked = FALSE;
			}
			
			//CHECK IF EXISTS USERNAME/PASSWORD
			if($dbResultsFromUsername != FALSE || $dbResultsFromEmail != FALSE)
			{
				if($dbResultsFromUsername != FALSE && ( $formData['password'] == $this->encrypt->decode($dbResultsFromUsername[0]->password) ) )
				{
					$this->setSessionCustomer($dbResultsFromEmail, $checked, "CUSTOMER");
					$data['formDestination'] = "/";
					$this->loadpage('login',$data);
					
				}//FROM EMAIL
				else if ($dbResultsFromEmail != FALSE && ( $formData['password'] == $this->encrypt->decode($dbResultsFromEmail[0]->password) ) )
				{
					$this->setSessionCustomer($dbResultsFromEmail, $checked, "CUSTOMER");
					$data['formDestination'] = "login/attemptLoginCustomer";
					$this->loadpage('login',$data);
				}
				else
				{
					$data['validationErrors'] = "Invalid Username or Password; Please try again!";
					$data['formDestination'] = "login/attemptLoginCustomer";
					$this->loadpage('login',$data);
				}
			}
			else 
			{
				$data['validationErrors'] = "Invalid Username or Password; Please try again!";
				$data['formDestination'] = "login/attemptLoginCustomer";
				$this->loadpage('login',$data);
			}
			
		}
		else
		{
			$data['validationErrors'] = "Invalid Username or Password; Please try again!";
			$data['formDestination'] = "login/attemptLoginCustomer";
			$this->loadpage('login',$data);
		}
	}
	
	public function attemptLoginAdmin()
	{
		//INITIALIZE
		$data['validationErrors'] = " ";
		$data['css'] = "resources/splash.css";
		$data['formDestination'] = "login/attemptLoginAdmin";
		$this->load->model("Admin_Model");
		
		//INITIALIZE AND CHECK VALUES
		if($this->initializeValues() != false)
		{
			$formData = $this->initializeValues();
			
			//GET USERNAME AND PASSWORD FROM DATABASE
			$dbResultsFromUsername = $this->Admin_Model->getByUsername($formData['username']);
			$checked = $this->input->post('stayloggedin');
			
			if($checked == "CHECKED")
			{
				$checked = TRUE;
			}
			else
			{
				$checked = FALSE;
			}
			
			//CHECK IF EXISTS USERNAME/PASSWORD
			if($dbResultsFromUsername != FALSE)
			{
				//FROM USERNAME
				if($dbResultsFromUsername != FALSE && ( $formData['password'] == $this->encrypt->decode($dbResultsFromUsername[0]->password) ) )
				{
					$this->setSessionGeneric($dbResultsFromUsername, $checked, "ADMIN");
					$data['formDestination'] = "administrator/";
					$this->loadpage('login',$data);
				}
				else
				{
					$data['validationErrors'] = "Invalid Username or Password; Please try again!";
					$data['formDestination'] = "login/attemptLoginAdmin";
					$this->loadpage('login',$data);
				}
			}
			else 
			{
				$data['validationErrors'] = "Invalid Username or Password; Please try again!";
				$data['formDestination'] = "login/attemptLoginAdmin";
				$this->loadpage('login',$data);
			}
			
		}
		else
		{
			$data['validationErrors'] = "Invalid Username or Password; Please try again!";
			$data['formDestination'] = "login/attemptLoginAdmin";
			$this->loadpage('login',$data);
		}
		
	}
	
	public function attemptLoginRestaurant()
	{
		//INITIALIZE
		$data['validationErrors'] = " ";
		$data['css'] = "resources/splash.css";
		$this->load->model("Restaurant_Model");
		
		//INITIALIZE AND CHECK VALUES
		if($this->initializeValues() != false)
		{
			$formData = $this->initializeValues();
			$this->session->set_flashdata('item', 'value');
			
			//GET USERNAME AND PASSWORD FROM DATABASE
			$dbResultsFromUsername = $this->Restaurant_Model->getByUsername($formData['username']);
			$checked = $this->input->post('stayloggedin');
			
			if($checked == "CHECKED")
			{
				$checked = TRUE;
			}
			else
			{
				$checked = FALSE;
			}
			
			//CHECK IF EXISTS USERNAME/PASSWORD
			if($dbResultsFromUsername != FALSE)
			{
				//FROM USERNAME
				if($dbResultsFromUsername != FALSE && ( $formData['password'] ==$this->encrypt->decode($dbResultsFromUsername[0]->password)) )
				{
					$this->setSessionGeneric($dbResultsFromUsername, $checked, "RESTAURANT");
					$data['formDestination'] = "restaurant/";
					$this->loadpage('login',$data);
				}
				else
				{
					$data['validationErrors'] = "Invalid Username or Password; Please try again!";
					$data['formDestination'] = "login/attemptLoginRestaurant";
					$this->loadpage('login',$data);
				}
			}
			else 
			{
				$data['validationErrors'] = "Invalid Username or Password; Please try again!";
				$data['formDestination'] = "login/attemptLoginRestaurant";
				$this->loadpage('login',$data);
			}
			
		}
		else
		{
			$data['validationErrors'] = "Invalid Username or Password; Please try again!";
			$data['formDestination'] = "login/attemptLoginRestaurant";
			$this->loadpage('login',$data);
		}
	}
	
	private function setSessionCustomer($dataObjectArray, $rememberMe, $type)
	{
		$newdata = array(
					'id'  => $dataObjectArray[0]->id,
					'username'  => $dataObjectArray[0]->username,
					'firstname'     => $dataObjectArray[0]->firstname,
					'lastname' => $dataObjectArray[0]->lastname,
					'type' => $type
               );
		if($rememberMe == TRUE)
		{
			$data['new_expiration'] = 60*60*24*30;//30 days
        	$this->session->sess_expiration = $data['new_expiration'];
		}
		$this->session->set_userdata($newdata);
	}
	
	private function setSessionGeneric($dataObjectArray)
	{
		$newdata = array(
			'id'  => $dataObjectArray[0]->id,
			'username'  => $dataObjectArray[0]->username
               );

		$this->session->set_userdata($newdata);
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		$data['css'] = 'resources/splash.css';
		redirect('/', 'refresh');
	}
	
	private function initializeValues()
	{
		//Validate Rules
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			return false;
		}
		else
		{
			//Extract input data into array
			$inputData = array();
			$inputData['username'] = $this->input->post('username');
			$inputData['password'] = $this->input->post('password');
			$inputData['checkbox'] = $this->input->post('stayloggedin');
			return $inputData;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */