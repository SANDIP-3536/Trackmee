<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	// function __construct() {
 //        parent::__construct();
 //        $data = $this->session->userdata('super_admin');
 //    }

	public function index()
	{

		if(!isset($this->session->userdata['super_admin']))
		{
			redirect('/');
		}

		$super_admin = $this->session->userdata('super_admin');

		$admin['user'] = $super_admin[0]['employee_pri_mobile_number'];
		$admin['first_name'] = $super_admin[0]['employee_first_name'];
		$admin['last_name'] = $super_admin[0]['employee_last_name'];
		$admin['email_id'] = $super_admin[0]['employee_email_id'];
		$admin['username'] = $super_admin[0]['credential_username'];
		$popup['flash']['active'] = $this->session->flashdata('active');
    	$popup['flash']['title'] = $this->session->flashdata('title');
    	$popup['flash']['text'] = $this->session->flashdata('text');
    	$popup['flash']['type'] = $this->session->flashdata('type');
		
		$nav['super_admin'] = "dashboard";

		$this->load->view('Dashboard/header', $admin);
		$this->load->view('Dashboard/dashboard',$popup);
		$this->load->view('Dashboard/footer',$nav);
	}
	
	public function admin_registration()
	{
			if(!isset($this->session->userdata['super_admin']))
			{ 
				redirect('/'); 
			} 

			$super_admin = $this->session->userdata('super_admin');

			$admin['user'] = $super_admin[0]['employee_pri_mobile_number'];

			$this->load->view('Dashboard/header', $admin);
			$this->load->view('Admin/admin_registration', $admin);
			$this->load->view('Dashboard/footer');		
	}

	
	public function Admin_details(){

		$data['user_type'] = $this->input->post('user_type');
		$data['user_created_by'] = $this->input->post('user_created_by');
		$data['user_effective_date'] = $this->input->post('date');
		$data['user_first_name'] = $this->input->post('user_first_name');
		$data['user_middle_name'] = $this->input->post('user_middle_name');
		$data['user_last_name'] = $this->input->post('user_last_name');
		$data['user_email_id'] = $this->input->post('user_email_id');
		$data['user_mobile_number'] = $this->input->post('user_mobile_number');
		$data['user_photo'] = $this->upload('user_photo', 'profile_photo');

		$user_profile_id = $this->Admin_model->admin_registration($data);

		$data1['profile_id'] = $user_profile_id[0]['user_profile_id'];
		$data1['credential_user_type'] = $this->input->post('user_type');
		$data1['credential_username'] = $this->input->post('credential_username');
		$data1['credential_password'] = md5($this->input->post('credential_password'));
		$data1['credential_update_date'] = $this->input->post('date');
		
		$this->Admin_model->admin_registration_credential($data1);
		redirect('Admin');
		// print_r($data);
	}

	public function upload($file, $folder)
	{	
		$config = array(
			'upload_path' => 'profile_photo/',
			'upload_url' => base_url() .'profile_photo/',
			'allowed_types' => 'jpg|jpeg|png|gif',
			 );
		$this->upload->initialize($config);

		if(!$this->upload->do_upload($file)){
			$upload_files = array('upload_data' => '');
			echo $this->upload->display_errors('<p style="color:#FF0000;">','</p>');die();
		}
		else{
		$upload_files = array('upload_data' => $this->upload->data());
			
		}

		$user_photo = base_url().'profile_photo/'.$upload_files['upload_data']['file_name'];
		$this->upload->data();

		return $user_photo;


	}

	function forgot_password()
	{
		if(!isset($this->session->userdata['super_admin']))
		{ 
			redirect('/'); 
		} 
		$super_admin = $this->session->userdata('super_admin');

		$admin['user'] = $super_admin[0]['employee_pri_mobile_number'];
		$admin['user_profile_id'] = $super_admin[0]['employee_profile_id'];
		$admin['user'] = $super_admin[0]['employee_pri_mobile_number'];
		$admin['first_name'] = $super_admin[0]['employee_first_name'];
		$admin['last_name'] = $super_admin[0]['employee_last_name'];
		$admin['email_id'] = $super_admin[0]['employee_email_id'];
		$admin['username'] = $super_admin[0]['credential_username'];

		$this->load->view('Dashboard/header',$admin);
		$this->load->view('Dashboard/forgot_password',$admin);
		$this->load->view('School/school_footer');
	}

	function admin_change_password()
	{
		$admin_password['credential_profile_id'] = $this->input->post('user_profile_id');
		$admin_password['credential_password'] = md5($this->input->post('password'));
		$admin_password['credential_update_date'] = date('Y-m-d');
		$con = $this->Admin_model->forgot_password($admin_password);
		if($cnt == 0){
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Password Updated");
	        $this->session->set_flashdata('text',""); 
	        $this->session->set_flashdata('type',"success");
			redirect('Admin');
		}
		else{
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Error...");
	        $this->session->set_flashdata('text',"Not Added...");
	        $this->session->set_flashdata('type',"warning");
			redirect('Admin');
		}
	}
}
