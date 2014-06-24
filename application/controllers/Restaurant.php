<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restaurant extends MY_Controller 
{
	
	// loads local variables
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_Model');
		$this->load->model('Restaurant_Model');
		$this->load->model('HQ_Model');
		$this->load->model('Customer_Model');
		$this->load->model('Rating_Model');
		$this->load->model('Bloggers_Model');
		$this->load->model('Reservation_Model');
		$this->load->model('Reservation_Model');
		$this->load->model('Restogallery_Model');
//		$this->sessionSecurityInterceptor("RESTAURANT");
		$data['validationErrors'] = " ";
	}
	
	public function validateForm($returnPage)
	{
		if($this->form_validation->run() == FALSE)
		{
			$data['css'] = 'resources/account.css';
			$this->session->set_flashdata('validationErrors', validation_errors());
			redirect($returnPage,'refresh');
		}
	}
	
	public function loadpageResto($pageToBeLoaded,$data)
    {
        $this->load->view('templates/header', $data);
		$this->load->view('restaurant/resto_header', $data);
		$this->load->view($pageToBeLoaded, $data);
		$this->load->view('restaurant/resto_footer', $data);
		$this->load->view('templates/footer', $data);
    }
	
	//loads the customer home page
	public function index()
	{
		$data['css'] = "resources/restaurant.css";
		$this->loadpageResto('restaurant/resto_home',$data);
		
	}
	
	//loads the edit restaurant page
	public function editRestaurant()
	{
		$data['restoProfile'] = $this->Restaurant_Model->getById($this->session->userdata('id'));
		$data['css'] = "resources/restaurant.css";
		$this->loadpageResto('restaurant/resto_editprofile',$data);
	}
	
	public function allReservations()
	{
		$myRestoID = $this->session->userdata('id');
		$data['reservationData'] = $this->Reservation_Model->reservationByRestaurantID( $myRestoID );
		$this->load->view('restaurant/allreservations',$data);
	}
	
	//responds to reservation through SHOWUP, STATUS
	public function respondToReservation()
	{
		$data['reservations'] = $this->Reservation_Model->reservationByRestaurantIDOpen($this->session->userdata('id'));
		$data['session'] = $this->session->userdata('id');
		$data['css'] = "resources/restaurant.css";
		$this->session->userdata('confirmation', '');
		$this->loadpageResto('restaurant/resto_reservations',$data);
	}
	
	public function approveReservation()
	{
		$this->Reservation_Model->approveReservation($this->input->post('reservation_id'));
		$this->session->userdata('confirmation', 'Approval Completed');
		redirect("restaurant/respondToReservation","refresh");
	}
	
	public function rejectReservation()
	{
		$this->Reservation_Model->rejectReservation($this->input->post('reservation_id'));
		$this->session->userdata('confirmation', 'Rejection Completed');
		redirect("restaurant/respondToReservation","refresh");
	}
	
	public function reservationToday()
	{
		$data['reservations'] = $this->Reservation_Model->reservationRestoToday($this->session->userdata('id'));
		$data['css'] = "resources/restaurant.css";
		$this->loadpageResto('restaurant/resto_reservationToday',$data);
	} 

	public function viewReviews()
	{
		$data['reviews'] = $this->Rating_Model->getByRestoID($this->session->userdata('id'));
		$data['css'] = "resources/restaurant.css";
		$this->loadpageResto('restaurant/resto_reviews',$data);
	} 

	// NOT SURE IF THIS SHOULD BE AT RESTAURANT MODEL. MAYBE IN CUSTOMER. 
	/*
	public function index()
	{
		$this->load->model('restaurant_model');
		$this->load->model("restotag_model");
	}
	*/
	public function search()
	{
		$data['result'] = $this->searchAttempt();
		$data['css'] = "resources/restaurant.css";
		$this->loadpage('search_result',$data);
	}
	
	public function searchAttempt() 
	{
		$this->load->model("Restaurant_Model");
		$this->load->model("Restotag_Model");
		$keyword = $this->input->get('keyword');
		
		$result = $this->Restaurant_Model->searchResult($keyword);
		return $result;
	}
	
	public function imageGallery()
	{
		$data['session'] = $this->session->userdata('id');
		$restaurantID = $this->session->userdata('id');
		$data['css'] = "resources/restaurant.css";
		$data['imageGalleryData'] = $this->Restogallery_Model->getAllByRestaurantID($restaurantID);
		
		$this->loadpageResto('restaurant/imagegallery',$data);
	}
	
	public function attemptUploadFile()
	{
		//Configuration for File Upload
		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/dineinlater/resources/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['encrypt_name']  = TRUE;
		$this->upload->initialize($config);  
		
		$this->form_validation->set_rules('imagegallery', ' imagegallery ');
		
		//upload checker
		if(($_FILES['imagegallery']['name']))
		{
			if($this->upload->do_upload("imagegallery"))
			{
				$dataImage = $this->upload->data();
				$fileName = $dataImage['file_name'];
				$filepath = "resources/uploads/".$fileName;
			}
			else
			{
				$this->session->set_flashdata('validationErrors', validation_errors());
				redirect('restaurant/imageGallery','refresh');
			}
		}
		else
		{
			$filepath = "resources/uploads/something.jpg";
		}
		$restoID = $this->session->userdata('id');
		$this->validateForm("restaurant/imageGallery");
		$this->Restogallery_Model->addPicture($filepath, $restoID);
		redirect('restaurant/imagegallery','refresh');
	}

	//delete file upload
	public function deleteUploadedFile()
	{
		$this->load->helper("file");
		$id = $this->input->get('id');
		$data = $this->Restogallery_Model->getById($id);
		delete_files( $data[0]->picURL );
		$this->Restogallery_Model->deletePicture($id);
		redirect('restaurant/imagegallery','refresh');
	}
	 
}