<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends MY_Controller 
{
	//loads constructor
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_Model');
		$this->load->model('Restaurant_Model');
		$this->load->model('HQ_Model');
		$this->load->model('Customer_Model');
		$this->load->model('Bloggers_Model');
		$this->sessionSecurityInterceptor("ADMIN");
		
		//Configuration for File Upload
		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/dineinlater/resources/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['encrypt_name']  = TRUE;
		$this->upload->initialize($config);  
		
		$data['validationErrors'] = " ";
		$data['hqOptions'] = $this->HQ_Model->getAll();
	}
	
	//Loads the Admin Home Page
	public function index()
	{
		$data['css'] = 'resources/account.css';
		$this->loadpageAdmin("administrator/admin_home",$data);	
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
	
	//Form Validation
	public function validateForm($returnPage)
	{
		if($this->form_validation->run() == FALSE)
		{
			$data['css'] = 'resources/account.css';
			$this->session->set_flashdata('validationErrors', validation_errors());
			redirect($returnPage,'refresh');
		}
	}
	
	//Adds a Restaurant
	public function attemptAddRestaurant()
	{
		$data['hqOptions'] =  $this->HQ_Model->getAll();
		
		// Form Validation Ruling
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[50]');
		$this->form_validation->set_rules('owner', 'Owner', 'required|min_length[5]|max_length[50]');
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[5]|max_length[50]|numeric');
		$this->form_validation->set_rules('landline', 'Landline', 'required|min_length[5]|max_length[50]|numeric');
		$this->form_validation->set_rules('google_lat', 'Latitude', 'required|numeric');
		$this->form_validation->set_rules('google_long', 'Longitude', 'required|numeric');
		$this->form_validation->set_rules('logo_photo', 'Logo Photo or Main Photo');
		$this->form_validation->set_rules('menu_photo', 'Menu Photo');
		$this->form_validation->set_rules('slots', 'Number of Available Slots', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('url', ' Restaurants Website ');
		$this->form_validation->set_rules('description', ' Description ', 'required');
		$this->form_validation->set_rules('address', ' Address ', 'required');
		$this->form_validation->set_rules('cuisine', ' Type of Cuisine ', 'required');
		$this->form_validation->set_rules('city', ' City ', 'required');
		$this->form_validation->set_rules('username', ' Username ', 'required|unique[restaurants.username]');
		$this->form_validation->set_rules('password', ' Password ', 'required');
		$this->form_validation->set_rules('autoaccept', ' Auto Accept ', 'required');
		$this->form_validation->set_rules('status', ' Status ', 'required');
		$this->form_validation->set_rules('hq', ' Headquarters ', 'required');
		$this->form_validation->set_rules('open_time', ' Open Time ', 'required');
		$this->form_validation->set_rules('close_time', ' Close Time ', 'required');
		$this->form_validation->set_rules('rest_start', ' Rest Start ');
		$this->form_validation->set_rules('rest_end', ' Rest End ');
		
		//Form Validation
		$this->validateForm("administrator/admin_addrestos");
	
		//upload menu photo and checker
		if(($_FILES['menu_photo']['name']))
		{
			if($this->upload->do_upload("menu_photo"))
			{
				$data_menuPhoto = $this->upload->data();
				$fileName_menuPhoto = $data_menuPhoto['file_name'];
				$menu_photo = "resources/uploads/".$fileName_menuPhoto;
			}
			else
			{
				$this->session->set_flashdata('validationErrors', validation_errors());
				redirect('administrator/admin_addrestos','refresh');
			}
		}
		else
		{
			$menu_photo = "resources/uploads/something.jpg";
		}
		
		//upload logo photo and checker
		if(($_FILES['logo_photo']['name']))
		{
			if($this->upload->do_upload("logo_photo"))
			{
				$data_logoPhoto = $this->upload->data();
				$fileName_logoPhoto = $data_logoPhoto['logo_name'];
				$logo_photo = "resources/uploads/".$fileName_logoPhoto;
			}
			else
			{
				$this->session->set_flashdata('validationErrors', validation_errors());
				redirect('administrator/admin_addrestos','refresh');
			}
		}
		else
		{
			$logo_photo = "resources/uploads/something.jpg";
		}
		
		
		//Insert Form Values
		$name = $this->input->post('name');
		$owner = $this->input->post('owner');
		$mobile = $this->input->post('mobile');
		$landline = $this->input->post('landline');
		$google_lat = $this->input->post('google_lat');
		$google_long = $this->input->post('google_long');
		$slots = $this->input->post('slots');
		$url = $this->input->post('url');
		$description =$this->input->post('description');
		$cuisine =$this->input->post('cuisine');
		$address =$this->input->post('address');
		$city =$this->input->post('city');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$autoaccept = $this->input->post('autoaccept');
		$status = $this->input->post('status');
		$hq = $this->input->post('hq');
		$open_time = $this->input->post('open_time');
		$close_time = $this->input->post('close_time');
		$rest_start = $this->input->post('rest_start');
		$rest_end = $this->input->post('rest_end');
		
		$myDataArray = array(
			   'name' => $name,
			   'owner' => $owner,
			   'mobile' => $mobile,
			   'landline' => $landline,
			   'google_lat' => $google_lat,
			   'google_long' => $google_long,
			   'reservation_slots' => $slots,
			   'logo_photo' => $logo_photo,
			   'menu_photo' => $menu_photo,
			   'websiteurl' => $url,
			   'description' => $description,
			   'autoaccept' => $autoaccept,
			   'username' => $username,
			   'password' => $password,
			   'address' => $address,
			   'city' => $city,
			   'cuisine' => $cuisine,
			   'hq_id' => $hq,
			   'restostatus' => $status,
			   'open_time' => $open_time,
			   'close_time' => $close_time,
			   'rest_start' => $rest_start,
			   'rest_end' => $rest_end,
			   'websiteurl' => $url
			);
		
		$data['css'] = 'resources/account.css';
		$this->Restaurant_Model->addRestaurant($myDataArray);
		redirect("administrator/admin_addrestos",'refresh');
	}
	
	//Edit a Restaurant
	public function editResto()
	{
		
		$data['hqOptions'] = $this->HQ_Model->getAll();
		$data['restaurantResults'] = $this->Restaurant_Model->getAll();
		$data['css'] = 'resources/account.css';
		$id = $this->input->get('id');
		$data['myUpdateID'] = $id;
		$data['myresto'] = $this->Restaurant_Model->getById($id);
		$data['id'] = $id;
		$this->loadpageAdmin("administrator/admin_editresto",$data);	
	}
	
	//Attempt Edit a Restaurant
	public function attemptEditResto()
	{
		$id = $this->input->get('id');
		
		//Configuration for File Upload
		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/dineinlater/resources/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['encrypt_name']  = TRUE;
		$this->upload->initialize($config);
		$data['hqOptions'] =  $this->HQ_Model->getAll();  
		
		// Form Validation Ruling
		$this->form_validation->set_rules('name', 'Name', 'min_length[5]|max_length[50]');
		$this->form_validation->set_rules('owner', 'Owner', 'min_length[5]|max_length[50]');
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'min_length[5]|max_length[50]|numeric');
		$this->form_validation->set_rules('landline', 'Landline', 'min_length[5]|max_length[50]|numeric');
		$this->form_validation->set_rules('google_lat', 'Latitude', 'numeric');
		$this->form_validation->set_rules('google_long', 'Longitude', 'numeric');
		$this->form_validation->set_rules('slots', 'Number of Available Slots', 'is_natural_no_zero|numeric');
		
		//Form Validation
		if($this->form_validation->run() == FALSE)
		{
			$data['css'] = 'resources/account.css';
			$this->session->set_flashdata('validationErrors', validation_errors());
			redirect('administrator/admin_','refresh');
		}

		//upload menu photo and checker
		if(($_FILES['menu_photo']['name']))
		{
			if($this->upload->do_upload("menu_photo"))
			{
				$data_menuPhoto = $this->upload->data();
				$fileName_menuPhoto = $data_menuPhoto['file_name'];
				$menu_photo = "resources/uploads/".$fileName_menuPhoto;
			}
			else
			{
				$this->session->set_flashdata('validationErrors', validation_errors());
				redirect('administrator/admin_addrestos','refresh');
			}
		}
		else
		{
			$menu_photo = "resources/uploads/something.jpg";
		}
		
		//upload logo photo and checker
		if(($_FILES['logo_photo']['name']))
		{
			if($this->upload->do_upload("logo_photo"))
			{
				$data_logoPhoto = $this->upload->data();
				$fileName_logoPhoto = $data_logoPhoto['logo_name'];
				$logo_photo = "resources/uploads/".$fileName_logoPhoto;
			}
			else
			{
				$this->session->set_flashdata('validationErrors', validation_errors());
				redirect('administrator/admin_addrestos','refresh');
			}
		}
		else
		{
			$logo_photo = "resources/uploads/something.jpg";
		}
		
		//Insert Form Values
		$name = $this->input->post('name');
		$owner = $this->input->post('owner');
		$mobile = $this->input->post('mobile');
		$landline = $this->input->post('landline');
		$google_lat = $this->input->post('google_lat');
		$google_long = $this->input->post('google_long');
		$slots = $this->input->post('slots');
		$url = $this->input->post('url');
		$description =$this->input->post('description');
		$cuisine =$this->input->post('cuisine');
		$address =$this->input->post('address');
		$city =$this->input->post('city');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$autoaccept = $this->input->post('autoaccept');
		$status = $this->input->post('status');
		$hq = $this->input->post('hq');
		$open_time = $this->input->post('open_time');
		$close_time = $this->input->post('close_time');
		$rest_start = $this->input->post('rest_start');
		$rest_end = $this->input->post('rest_end');
		
		$myDataArray = array(
			   'name' => $name,
			   'owner' => $owner,
			   'mobile' => $mobile,
			   'landline' => $landline,
			   'google_lat' => $google_lat,
			   'google_long' => $google_long,
			   'reservation_slots' => $slots,
			   'logo_photo' => $logo_photo,
			   'menu_photo' => $menu_photo,
			   'websiteurl' => $url,
			   'description' => $description,
			   'autoaccept' => $autoaccept,
			   'username' => $username,
			   'password' => $password,
			   'address' => $address,
			   'city' => $city,
			   'cuisine' => $cuisine,
			   'hq_id' => $hq,
			   'restostatus' => $status,
			   'open_time' => $open_time,
			   'close_time' => $close_time,
			   'rest_start' => $rest_start,
			   'rest_end' => $rest_end,
			   'websiteurl' => $url
			);
		
		$data['css'] = 'resources/account.css';
		$this->Restaurant_Model->updateResto($myDataArray, $id);
		redirect("administrator/admin_restos","refresh");
	}
	
	//Deletes a Restaurant
	public function attemptDeleteRestaurant()
	{
		$id = $this->input->get('id');
		$this->Restaurant_Model->deleteRestaurant($id);
		redirect("administrator/admin_restos","refresh");
	}

	//Loads Restaurant Management System
	public function admin_blog()
	{
		$data['blogResults'] = $this->Bloggers_Model->getAll();
		$data['css'] = 'resources/account.css';
		$this->loadpageAdmin("administrator/admin_blog",$data);	
	}

	//attempt to add blog
	public function attemptAddblog()
	{
		$title = $this->input->post("title");
		$url = $this->input->post("url");
		$urlpic = $this->input->post("urlpic");
		$blogdate = $this->input->post("blogdate");
		$author = $this->input->post("author");
		$snippet = $this->input->post("snippet");
		
		$this->form_validation->set_rules('title', ' Blog Title ', 'required');
		$this->form_validation->set_rules('url', ' URL ', 'required');
		$this->form_validation->set_rules('urlpic', ' External URL pic ');
		$this->form_validation->set_rules('blogdate', ' Blog Date ');
		$this->form_validation->set_rules('author', ' Author ', 'required');
		$this->form_validation->set_rules('snippet', ' Snippet ', 'required');
		
		$this->validateForm("administrator/admin_blog");
		
		$data['css'] = 'resources/account.css';
		$this->Bloggers_Model->addBlog($title,$url,$urlpic,$blogdate,$author,$snippet);
		redirect("administrator/admin_blog","refresh");
	}
	

	public function editblog()
	{
		$data['css'] = 'resources/account.css';
		$id = $this->input->get('id');
		$data['myUpdateID'] = $id;
		$data['myBlog'] = $this->Bloggers_Model->getById($id);
		$data['id'] = $id;
		$this->loadpageAdmin("administrator/editBlog",$data);	
	}
	
	//Deletes an Administrator
	public function attemptEditBlog()
	{
		$this->form_validation->set_rules('title', ' Blog Title ', 'required');
		$this->form_validation->set_rules('url', ' URL ', 'required');
		$this->form_validation->set_rules('urlpic', ' External URL pic ');
		$this->form_validation->set_rules('blogdate', ' Blog Date ');
		$this->form_validation->set_rules('author', ' Author ', 'required');
		$this->form_validation->set_rules('snippet', ' Snippet ', 'required');
		
		$myUpdateID = $this->input->post('myUpdateID');
		$title = $this->input->post('title');
		$url = $this->input->post('url');
		$urlpic= $this->input->post('urlpic');
		$blogdate = $this->input->post('blogdate');
		$author = $this->input->post('author');
		$snippet = $this->input->post('snippet');
		
		$this->validateForm("administrator/admin_blog");
		
		$data = array(
			title => $title,
			url => $url,
			urlpic => $urlpic,
			blogdate => $blogdate,
			author => $author,
			snippet => $snippet
		);
	
		$this->Bloggers_Model->editBlog($data,$id);
		redirect("administrator/admin_blog","refresh");
	}
	
	//deletes a blog
	public function attemptDeleteblog()
	{
		$id = $this->input->get('id');
		$this->Bloggers_Model->deleteBlog($id);
		redirect("administrator/admin_blog","refresh");
	}
	
	//Deletes an Administrator
	public function attemptDeleteAdmin()
	{
		$id = $this->input->post('selectedAdminToBeDeleted');
		$this->Admin_Model->deleteAdmin($id);
		redirect("administrator/admin_administrators","refresh");
	}
	
	//Adds an Administrator
	public function attemptAddAdmin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->Admin_Model->addAdmin($username, $password);
		redirect("administrator/admin_administrators","refresh");
	}
	
	//Loads the Admin Home Page
	public function admin_administrators()
	{
		$data['adminResults'] = $this->Admin_Model->getAll();
		$data['css'] = 'resources/account.css';
		$this->loadpageAdmin("administrator/admin_administrators",$data);	
	}
	
	//Loads Restaurant Management System
	public function admin_restos()
	{
		$raw = $this->Restaurant_Model->getAll();
		$data['restaurantResults'] = $this->Restaurant_Model->getAll();
		$data['css'] = 'resources/account.css';
		$this->loadpageAdmin("administrator/admin_resto",$data);	
	}
	
	//Adds Restos Admin
	public function admin_addrestos()
	{
		$data['hqOptions'] =  $this->HQ_Model->getAll();
		$data['restaurantResults'] = $this->Restaurant_Model->getAll();
		$data['css'] = 'resources/account.css';
		$this->loadpageAdmin("administrator/admin_addrestos",$data);	
	}
	//Loads Restaurant Management System
	public function customer()
	{
		$data['customerResults'] = $this->Customer_Model->getAll();
		$data['css'] = 'resources/account.css';
		$this->loadpageAdmin("administrator/admin_customer",$data);	
	}
	
	//Loads HQ Management System
	public function admin_hq()
	{
		$data['hqResults'] = $this->HQ_Model->getAll();
		$data['css'] = 'resources/account.css';
		$this->loadpageAdmin("administrator/admin_HQ",$data);	
	}
	
	//Adds an Administrator
	public function attemptAddHQ()
	{
		
		$this->form_validation->set_rules('username', ' Username ', 'required');
		$this->form_validation->set_rules('password', ' Password ', 'required');
		$this->form_validation->set_rules('hqname', ' HQ Name ', 'required');
		$this->validateForm("administrator/admin_hq");
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$hqname = $this->input->post('hqname');
		$this->HQ_Model->addHQ($username, $password, $hqname);
		redirect("administrator/admin_hq","refresh");
	}
	
	//Deletes an Administrator
	public function attemptDeleteHQ()
	{
		$id = $this->input->post('selectedHQToBeDeleted');
		$this->HQ_Model->deleteHQ($id);
		redirect("administrator/admin_hq","refresh");
	}
}
