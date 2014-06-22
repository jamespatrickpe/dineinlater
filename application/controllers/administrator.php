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
	
	//Adds a Restaurant
	public function attemptAddRestaurant()
	{
		//Configuration for File Upload
		$config['upload_path'] =$_SERVER['DOCUMENT_ROOT'].'/dineinlater/application/imageuploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['encrypt_name']  = TRUE;
		$this->upload->initialize($config);  
		
		// Form Validation Ruling
		$this->form_validation->set_rules('name', '', 'required');
		$this->form_validation->set_rules('owner', '', 'required');
		$this->form_validation->set_rules('mobile', '', 'required');
		$this->form_validation->set_rules('landline', '', 'required');
		$this->form_validation->set_rules('google_lat', '', 'required');
		$this->form_validation->set_rules('google_long', '', 'required');
		$this->form_validation->set_rules('slots', '', 'required');
		$this->form_validation->set_rules('url', '', 'required');
		$this->form_validation->set_rules('description', '', 'required');
		$this->form_validation->set_rules('address', '', 'required');
		$this->form_validation->set_rules('cuisine', '', 'required');
		$this->form_validation->set_rules('city', '', 'required');
		$this->form_validation->set_rules('username', '', 'required');
		$this->form_validation->set_rules('password', '', 'required');
		$this->form_validation->set_rules('autoaccept', '', 'required');
		$this->form_validation->set_rules('status', '', 'required');
		$this->form_validation->set_rules('hq', '', 'required');
		$this->form_validation->set_rules('open_time', '', 'required');
		$this->form_validation->set_rules('close_time', '', 'required');
		$this->form_validation->set_rules('rest_start', '', 'required');
		$this->form_validation->set_rules('rest_end', '', 'required');
		
		//Form Validation
		if ($this->form_validation->run() == FALSE)
		{
			$data['css'] = 'resources/account.css';
			$data['validationErrors'] = validation_errors();
			$this->loadpageAdmin("administrator/admin_addrestos",$data);
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
		
		//UPLOAD MENU_PHOTO
		if(!$this->upload->do_upload("menu_photo"))
		{
			$data['validationErrors'] = array('menu_photo' => $this->upload->display_errors());
			$this->loadpageAdmin("administrator/admin_addrestos",$data);
		}
		else
		{
			$dataMenuPhoto = $this->upload->data();
			$fileNameMenuPhoto = $dataMenuPhoto['file_name'];
			$fullPathMenuPhoto = $dataMenuPhoto['full_path'];
			$menu_photo = $fullPathMenuPhoto;
		}
		
		//UPLOAD LOGO_PHOTO
		if(!$this->upload->do_upload("logo_photo"))
		{
			$data['validationErrors'] = array('logo_photo' => $this->upload->display_errors());
			$this->loadpageAdmin("administrator/admin_addrestos",$data);
		}
		else
		{
			$dataLogoPhoto = $this->upload->data();
			$fileNameLogoPhoto = $dataLogoPhoto['file_name'];
			$fullPathLogoPhoto = $dataLogoPhoto['full_path'];
			$logo_photo = $fullPathLogoPhoto;
		}	
		
		$myDataArray = array(
			   'name' => $name,
			   'owner' => $owner,
			   'mobile' => $mobile,
			   'landline' => $landline,
			   'google_lat' => $google_lat,
			   'google_long' => $google_long,
			   'slots' => $slots,
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
			   'hq' => $hq,
			   'status' => $status,
			   'open_time' => $open_time,
			   'close_time' => $close_time,
			   'rest_start' => $rest_start,
			   'rest_end' => $rest_end,
			   'url' => $url
			);
		
		$data['css'] = 'resources/account.css';
		$this->Restaurant_Model->addRestaurant($myDataArray);
		$this->loadpageAdmin("administrator/admin_addrestos",$data);
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
		//Configuration for File Upload
		$config['upload_path'] =$_SERVER['DOCUMENT_ROOT'].'/dineinlater/application/imageuploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['encrypt_name']  = TRUE;
		$this->upload->initialize($config);  
		
		// Form Validation Ruling
		$this->form_validation->set_rules('name', '', 'required');
		$this->form_validation->set_rules('owner', '', 'required');
		$this->form_validation->set_rules('mobile', '', 'required');
		$this->form_validation->set_rules('landline', '', 'required');
		$this->form_validation->set_rules('google_lat', '', 'required');
		$this->form_validation->set_rules('google_long', '', 'required');
		$this->form_validation->set_rules('slots', '', 'required');
		$this->form_validation->set_rules('url', '', 'required');
		$this->form_validation->set_rules('description', '', 'required');
		$this->form_validation->set_rules('address', '', 'required');
		$this->form_validation->set_rules('cuisine', '', 'required');
		$this->form_validation->set_rules('city', '', 'required');
		$this->form_validation->set_rules('username', '', 'required');
		$this->form_validation->set_rules('password', '', 'required');
		$this->form_validation->set_rules('autoaccept', '', 'required');
		$this->form_validation->set_rules('status', '', 'required');
		$this->form_validation->set_rules('hq', '', 'required');
		$this->form_validation->set_rules('open_time', '', 'required');
		$this->form_validation->set_rules('close_time', '', 'required');
		$this->form_validation->set_rules('rest_start', '', 'required');
		$this->form_validation->set_rules('rest_end', '', 'required');
		
		//Form Validation
		if ($this->form_validation->run() == FALSE)
		{
			$data['css'] = 'resources/account.css';
			$data['validationErrors'] = validation_errors();
			$this->loadpageAdmin("administrator/admin_addrestos",$data);
		}
		
		//Insert Form Values
		$myUpdateID = $this->input->post('myUpdateID');
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
		
		//UPLOAD MENU_PHOTO
		if(!$this->upload->do_upload("menu_photo"))
		{
			$data['validationErrors'] = array('menu_photo' => $this->upload->display_errors());
			$this->loadpageAdmin("administrator/admin_addrestos",$data);
		}
		else
		{
			$dataMenuPhoto = $this->upload->data();
			$fileNameMenuPhoto = $dataMenuPhoto['file_name'];
			$fullPathMenuPhoto = $dataMenuPhoto['full_path'];
			$menu_photo = $fullPathMenuPhoto;
		}
		
		//UPLOAD LOGO_PHOTO
		if(!$this->upload->do_upload("logo_photo"))
		{
			$data['validationErrors'] = array('logo_photo' => $this->upload->display_errors());
			$this->loadpageAdmin("administrator/admin_addrestos",$data);
		}
		else
		{
			$dataLogoPhoto = $this->upload->data();
			$fileNameLogoPhoto = $dataLogoPhoto['file_name'];
			$fullPathLogoPhoto = $dataLogoPhoto['full_path'];
			$logo_photo = $fullPathLogoPhoto;
		}	
		
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
		$this->Restaurant_Model->updateResto($myDataArray, $myUpdateID);
		redirect("administrator/admin_restos","refresh");
	}
	
	//Deletes a Restaurant
	public function attemptDeleteRestaurant()
	{
		$id = $this->input->get('id');
		$this->Restaurant_Model->deleteRestaurant($id);
		redirect("administrator/admin_restos","refresh");
	}

	public function attemptDeleteblog()
	{
		$id = $this->input->get('id');
		$this->Bloggers_Model->deleteBlog($id);
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
		$myUpdateID = $this->input->post('myUpdateID');
		$title = $this->input->post('title');
		$url = $this->input->post('url');
		$urlpic= $this->input->post('urlpic');
		$blogdate = $this->input->post('blogdate');
		$author = $this->input->post('author');
		$snippet = $this->input->post('snippet');
		
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
	public function admin_blog()
	{
		$data['blogResults'] = $this->Bloggers_Model->getAll();
		$data['css'] = 'resources/account.css';
		$this->loadpageAdmin("administrator/admin_blog",$data);	
	}

	public function attemptAddblog()
	{
		$title = $this->input->post("title");
		$url = $this->input->post("url");
		$urlpic = $this->input->post("urlpic");
		$blogdate = $this->input->post("blogdate");
		$author = $this->input->post("author");
		$snippet = $this->input->post("snippet");
		
		$data['css'] = 'resources/account.css';
		$this->Bloggers_Model->addBlog($title,$url,$urlpic,$blogdate,$author,$snippet);
		redirect("administrator/admin_blog","refresh");
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
