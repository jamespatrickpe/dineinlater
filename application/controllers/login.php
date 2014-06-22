<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller 
{
	
	public function __construct() 
	{        
    	parent::__construct();
	}
			
	public function index()
	{
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
	}
	
	public function login_hq()
	{
		$this->session->sess_destroy();
		$data['css'] = "resources/splash.css";
		$data['validationErrors'] = " ";
		$data['formDestination'] = "login/attemptLoginHQ";
		$this->loadpage('login',$data);
	}
	
	public function login_restaurant()
	{
		$this->session->sess_destroy();
		$data['css'] = "resources/splash.css";
		$data['validationErrors'] = " ";
		$data['formDestination'] = "login/attemptLoginRestaurant";
		$this->loadpage('login',$data);
	}
	
	public function attemptLoginFB()
	{
		$this->load->model('Customer_Model');
		$fb_id = $this->input->post('fb_id');
		$fb_username = $this->input->post('fb_username');
		$fb_firstname = $this->input->post('fb_firstname');
		$fb_lastname = $this->input->post('fb_lastname');
		$fb_email = $this->input->post('fb_email');
		$type = "CUSTOMER";
		
		//check if Email Exists
		if(($this->Customer_Model->getByEmail($fb_email)) == FALSE)
		{
			//If not registered; register then login
			try
			{
				$this->Customer_Model->addFBCustomer($fb_firstname,$fb_lastname,$fb_email,$fb_username);
			}
			catch(Exception $e)
			{
				redirect('/','refresh');
			}
		}
		
		$this->setSessionFB($fb_id, $fb_username,$fb_firstname,$fb_lastname, $type, $fb_email);
		redirect('/','refresh');
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
					$this->setSessionCustomer($dbResultsFromUsername, $checked, "CUSTOMER");
					redirect('/','refresh');
					
				}//FROM EMAIL
				else if ($dbResultsFromEmail != FALSE && ( $formData['password'] == $this->encrypt->decode($dbResultsFromEmail[0]->password) ) )
				{
					$this->setSessionCustomer($dbResultsFromUsername, $checked, "CUSTOMER");
					redirect('/','refresh');
				}
				else
				{
					$data['validationErrors'] = "Invalid Username or Password; Please try again! 1";
					$data['formDestination'] = "login/attemptLoginCustomer";
					$this->loadpage('login',$data);
				}
			}
			else 
			{
				$data['validationErrors'] = "Invalid Username or Password; Please try again! 2";
				$data['formDestination'] = "login/attemptLoginCustomer";
				$this->loadpage('login',$data);
			}
			
		}
		else
		{
			$data['validationErrors'] = "Invalid Username or Password; Please try again! 3";
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
					$this->setSessionAdmin($dbResultsFromUsername, $checked, "ADMIN");
					redirect('administrator/','refresh');
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
					$this->setSessionRestaurant($dbResultsFromUsername, $checked, "RESTAURANT");
					redirect("restaurant/",'refresh');
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

	public function attemptLoginHQ()
	{
		//INITIALIZE
		$data['validationErrors'] = " ";
		$data['css'] = "resources/splash.css";
		$this->load->model("HQ_Model");
		
		//INITIALIZE AND CHECK VALUES
		if($this->initializeValues() != false)
		{
			$formData = $this->initializeValues();
			$this->session->set_flashdata('item', 'value');
			
			//GET USERNAME AND PASSWORD FROM DATABASE
			$dbResultsFromUsername = $this->HQ_Model->getByUsername($formData['username']);
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
					$this->setSessionHQ($dbResultsFromUsername, $checked, "HQ");
					redirect("hq/",'refresh');
				}
				else
				{
					$data['validationErrors'] = "Invalid Username or Password; Please try again! 1";
					$data['formDestination'] = "login/attemptLoginRestaurant";
					$this->loadpage('login',$data);
				}
			}
			else 
			{
				$data['validationErrors'] = "Invalid Username or Password; Please try again! 2";
				$data['formDestination'] = "login/attemptLoginRestaurant";
				$this->loadpage('login',$data);
			}
			
		}
		else
		{
			$data['validationErrors'] = "Invalid Username or Password; Please try again! 3";
			$data['formDestination'] = "login/attemptLoginRestaurant";
			$this->loadpage('login',$data);
		}
	}
	
	private function setSessionCustomer($dataObjectArray, $rememberMe, $type)
	{
		$newdata = array(
					'id'  => $dataObjectArray[0]->customer_id,
					'username'  => $dataObjectArray[0]->username,
					'firstname'     => $dataObjectArray[0]->firstname,
					'lastname' => $dataObjectArray[0]->lastname,
					'usertype' => $type,
					'fbuser' => 'N'
               );
		if($rememberMe == TRUE)
		{
			$data['new_expiration'] = 60*60*24*30;//30 days
        	$this->session->sess_expiration = $data['new_expiration'];
		}
		$this->session->set_userdata($newdata);
	}
	
	private function setSessionFB($fb_id, $username,$firstname,$lastname, $type, $email)
	{
		$newdata = array(
					'id'  => $fb_id,
					'username'  => $username,
					'firstname'     => $firstname,
					'lastname' => $lastname,
					'usertype' => $type,
					'fbuser' => 'Y',
					'emailadd' => $email
               );
		$this->session->set_userdata($newdata);
	}
	
	private function setSessionAdmin($dataObjectArray, $rememberMe, $type)
	{
		$newdata = array(
			'id'  => $dataObjectArray[0]->admin_id,
			'username'  => $dataObjectArray[0]->username,
			'usertype' => $type
               );
			   
		if($rememberMe == TRUE)
		{
			$data['new_expiration'] = 60*60*24*30;//30 days
        	$this->session->sess_expiration = $data['new_expiration'];
		}
		
		$this->session->set_userdata($newdata);
	}
	
	private function setSessionRestaurant($dataObjectArray, $rememberMe, $type)
	{
		$newdata = array(
			'id'  => $dataObjectArray[0]->restaurant_id,
			'username'  => $dataObjectArray[0]->username,
			'usertype' => $type
               );
		if($rememberMe == TRUE)
		{
			$data['new_expiration'] = 60*60*24*30;//30 days
        	$this->session->sess_expiration = $data['new_expiration'];
		}

		$this->session->set_userdata($newdata);
	}
	
	private function setSessionHQ($dataObjectArray, $rememberMe, $type)
	{
		$newdata = array(
			'id'  => $dataObjectArray[0]->hq_id,
			'username'  => $dataObjectArray[0]->username,
			'usertype' => $type
               );
			   
		if($rememberMe == TRUE)
		{
			$data['new_expiration'] = 60*60*24*30;//30 days
        	$this->session->sess_expiration = $data['new_expiration'];
		}

		$this->session->set_userdata($newdata);
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}
	
	// Set Rules for Username and Password
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
			$inputData['checkbox'] = $this->input->post('fblogin');
			$inputData['checkbox'] = $this->input->post('stayloggedin');
			$inputData['checkbox'] = $this->input->post('stayloggedin');
			$inputData['checkbox'] = $this->input->post('stayloggedin');
			$inputData['checkbox'] = $this->input->post('stayloggedin');
			return $inputData;
		}
	}
	
	private function initializeValuesFB()
	{
		//Extract input data into array
		$inputData = array();
		$inputData['fbid'] = $this->input->post('fbid');
		$inputData['firstname'] = $this->input->post('firstname');
		$inputData['lastname'] = $this->input->post('lastname');
		$inputData['email'] = $this->input->post('email');
		$inputData['username'] = $this->input->post('username');
		$inputData['fblogin'] = $this->input->post('fblogin');
			
		return $inputData;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */