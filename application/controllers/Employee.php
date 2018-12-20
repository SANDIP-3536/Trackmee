<?php
	date_default_timezone_set('Asia/Kolkata');
	class Employee extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if(isset($this->session->userdata['client'])){

			}elseif(isset($this->session->userdata['Institute'])) {

			}else{
				redirect('/');
			}
		}
		
		function view_employee()
		{	
			$employee['flash']['active'] = $this->session->flashdata('active');
        	$employee['flash']['title'] = $this->session->flashdata('title');
        	$employee['flash']['text'] = $this->session->flashdata('text');
        	$employee['flash']['type'] = $this->session->flashdata('type');

        	if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$admin['username'] = $client_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['client_name'];
				$nav['client_logo'] = $employee_details[0]['client_logo'];
				$employee['institute_admin'] = 0;
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$admin['username'] = $institute_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['institute_name'];
				$nav['client_logo'] = $employee_details[0]['institute_logo'];
				$employee['institute_admin'] = 1;
        	}
			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			$school['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$nav['employee'] = 'employee';
			$employee['employee'] = $this->Employee_model->fetch_employee_by_session($employee_client_profile_id);
			if (isset($this->session->userdata['client'])) {
				$this->load->view('Client/client_header', $admin);
        	}elseif (isset($this->session->userdata['Institute'])) {
				$this->load->view('Institute/institute_header', $admin);
        	}
			$this->load->view('Employee/view_employee',$employee);
			$this->load->view('Employee/employee_footer',$nav);	
		}

		function employee_registration()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$admin['username'] = $client_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['client_name'];
				$nav['client_logo'] = $employee_details[0]['client_logo'];
				$admin['institute_admin'] = 0;
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$admin['username'] = $institute_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['institute_name'];
				$nav['client_logo'] = $employee_details[0]['institute_logo'];
				$admin['institute_admin'] = 1;
        	}
			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			$school['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$nav['employee'] = 'employee';

			$employee['flash']['active'] = $this->session->flashdata('active');
        	$employee['flash']['title'] = $this->session->flashdata('title');
        	$employee['flash']['text'] = $this->session->flashdata('text');
        	$employee['flash']['type'] = $this->session->flashdata('type');
        	$employee['client'] = $this->Client_model->fetch_client($employee_client_profile_id);

			if (isset($this->session->userdata['client'])) {
				$this->load->view('Client/client_header', $admin);
        	}elseif (isset($this->session->userdata['Institute'])) {
				$this->load->view('Institute/institute_header', $admin);
        	}
			$this->load->view('Employee/employee_registration',$employee);
			$this->load->view('Employee/employee_footer', $nav);
		}

		function add_employee_registration()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$employee_employee['employee_client_profile_id'] = $employee_details[0]['employee_client_profile_id'];
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$employee_employee['employee_client_profile_id'] = $this->input->post('employee_client_profile_id');
        	}
			$employee_employee['employee_type'] = '5';
			$employee_employee['employee_first_name'] = ucfirst($this->input->post('employee_first_name'));
			$employee_employee['employee_middle_name'] = ucfirst($this->input->post('employee_middle_name'));
			$employee_employee['employee_last_name'] = ucfirst($this->input->post('employee_last_name'));
			$employee_employee['employee_gender'] = $this->input->post('employee_gender');
			$employee_employee['employee_DOB'] = $this->input->post('employee_DOB');
			$employee_employee['employee_address'] = ucfirst($this->input->post('employee_address'));
			$employee_employee['employee_pri_mobile_number'] = $this->input->post('employee_pri_mobile_number');
			$employee_employee['employee_email_id'] = $this->input->post('employee_email_id');
			$employee_employee['employee_experiance'] = $this->input->post('employee_experiance');
			$employee_employee['employee_effective_date'] = date('Y-m-d');
			$verify = $this->db->query("select * from employee WHERE employee_pri_mobile_number =".$employee_employee['employee_pri_mobile_number']." and employee_first_name = '".$employee_employee['employee_first_name']."'  and employee_last_name = '".$employee_employee['employee_last_name']."' and employee_expiry_date = '9999-12-31' and employee_client_profile_id =".$employee_employee['employee_client_profile_id']." and employee_type NOT IN(2,3,1)")->num_rows();
			if($verify != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Employee Already Registered.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"warning");
				redirect('Employee/employee_registration');
			}else{
				$employee_employee['employee_photo'] = $this->upload('employee_photo', 'profile_photo');
						
				$this->Employee_model->employee_add($employee_employee);
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Employee Added Successfully.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Employee/view_employee');
			}
		}

		function upload($file,$folder)						
		{
			$config = array(
				'upload_path' => 'profile_photo/',
				'upload_url' => base_url().'profile_photo/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'encrypt_name' => TRUE,
				);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload($file)){
				$user_photo = base_url().'profile_photo/default_employee_image.png';
				return $user_photo;
			}
			else{
				$upload_files = array('upload_data' => $this->upload->data());
				$user_photo = base_url().'profile_photo/'.$upload_files['upload_data']['file_name'];
				$this->upload->data();
				return $user_photo;
			}
		}

		function view_employee_details($employee_profile_id)
		{
			$this->session->set_userdata('user_data', $employee_profile_id);
			redirect('Employee/employee_deatails_view');  
		}

		function employee_deatails_view()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$admin['username'] = $client_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['client_name'];
				$nav['client_logo'] = $employee_details[0]['client_logo'];
				$admin['institute_admin'] = 0;
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$admin['username'] = $institute_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['institute_name'];
				$nav['client_logo'] = $employee_details[0]['institute_logo'];
				$admin['institute_admin'] = 1;
        	}
			$update_employee['flash']['active'] = $this->session->flashdata('active');
        	$update_employee['flash']['title'] = $this->session->flashdata('title');
        	$update_employee['flash']['text'] = $this->session->flashdata('text');
        	$update_employee['flash']['type'] = $this->session->flashdata('type');
        	
			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$nav['employee'] = 'employee';
			$employee_profile_id = $this->session->userdata('user_data');
			$update_employee['update_employee'] = $this->Employee_model->update_employee($employee_profile_id);

			if (isset($this->session->userdata['client'])) {
				$this->load->view('Client/client_header', $admin);
        	}elseif (isset($this->session->userdata['Institute'])) {
				$this->load->view('Institute/institute_header', $admin);
        	}
			$this->load->view('Employee/employee_details',$update_employee);
			$this->load->view('Employee/employee_footer',$nav);
		}

		function add_document($employee_profile_id)
		{
			$this->session->set_userdata('user_data', $employee_profile_id);
			redirect('Employee/employee_document');  
		}

		function employee_document()
		{
			if(!isset($this->session->userdata['school']))
			{
				redirect('/');
			}
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			} 
			$employee['student_profile_id'] = $this->session->userdata('user_data');
			$employee['document'] = $this->Employee_model->document_details($employee);

			$school_admin = $this->session->userdata('school');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['education'] = 'education';
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			
			$this->load->view('School/school_header',$admin);
			$this->load->view('Employee/add_document',$employee);
			$this->load->view('Employee/employee_footer',$nav);
		}

		function add_employee_document()
		{
			$school_admin = $this->session->userdata('school');
			$document['doc_name'] = $this->input->post('doc_name');
			$document['doc_number'] = $this->input->post('doc_number');
			$document['doc_file'] = $this->upload1('doc_file','document');
			$document['doc_effective_date'] = date('Y-m-d');
			$document['doc_user'] = $this->input->post('employee_profile_id');
			$document['doc_user_type'] = '5';
			$document['doc_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$con = $this->Student_model->student_document($document);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Document not Sumbited...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Employee/view_employee');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Document Submited.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Employee/view_employee');
			}
		}

		function update_employee($employee_profile_id)
		{
			$this->session->set_userdata('user_data', $employee_profile_id);
			redirect('Employee/employee_update');  
		}

		function employee_update()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$admin['username'] = $client_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['client_name'];
				$nav['client_logo'] = $employee_details[0]['client_logo'];
				$admin['institute_admin'] = 0;
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$admin['username'] = $institute_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['institute_name'];
				$nav['client_logo'] = $employee_details[0]['institute_logo'];
				$admin['institute_admin'] = 1;
        	}

			$update_employee['flash']['active'] = $this->session->flashdata('active');
        	$update_employee['flash']['title'] = $this->session->flashdata('title');
        	$update_employee['flash']['text'] = $this->session->flashdata('text');
        	$update_employee['flash']['type'] = $this->session->flashdata('type');
        	
			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$nav['employee'] = 'employee';
			$employee_profile_id = $this->session->userdata('user_data');
			$update_employee['update_employee'] = $this->Employee_model->update_employee($employee_profile_id);

			if (isset($this->session->userdata['client'])) {
				$this->load->view('Client/client_header', $admin);
        	}elseif (isset($this->session->userdata['Institute'])) {
				$this->load->view('Institute/institute_header', $admin);
        	}
			$this->load->view('Employee/update_employee',$update_employee);
			$this->load->view('Employee/employee_footer',$nav);
		}

		function update_employee_details()
		{
			$update_employee = $this->input->post();
			$employee_profile_id = $this->input->post('employee_profile_id');
			$update_employee['employee_update_date'] = date('Y-m-d');
			$con = $this->Employee_model->update_employee_details($update_employee);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Employee not Updated...");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
				$this->session->set_userdata('user_data', $employee_profile_id);
				redirect('Employee/employee_deatails_view');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"employee Information Updated Successfully.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Employee/employee_deatails_view');
			}
		}

		function upload1($file,$folder)
		{
			$config = array(
				'upload_path' => 'document/',
				'upload_url' => base_url().'document/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'encrypt_name' => TRUE,
				);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload($file)){
				$user_photo = base_url().'document/default_document_image.png';
				return $user_photo;
			}
			else{
				$upload_files = array('upload_data' => $this->upload->data());
				$user_photo = base_url().'document/'.$upload_files['upload_data']['file_name'];
				$this->upload->data();
				return $user_photo;
			}

		}

		function employee_deactive($employee_profile_id)			
		{
			$this->session->set_userdata('employee_deactive',$employee_profile_id);
			redirect('Employee/deactive');
		}

		function deactive()
		{
			$employee_profile_id = $this->session->userdata('employee_deactive');
			$con = $this->Employee_model->deactive($employee_profile_id);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"employee not Deactivated...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Employee/view_employee');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"employee Deactivated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Employee/view_employee');
			}
		}

		function edit_profile(){
			$profile['employee_profile_id'] = $this->input->post('employee_profile_id');
			$employee_profile_id = $this->input->post('employee_profile_id');
			$profile['employee_photo'] = $this->upload('employee_photo', 'profile_photo');
			$cnt = $this->Employee_model->edit_profile($profile);
			if($cnt == 1){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Profile Successfully Updated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				$this->session->set_userdata('user_data', $employee_profile_id);
				redirect('Employee/employee_deatails_view');
			}
		}

		function employee_active($employee_profile_id)			
		{
			$this->session->set_userdata('employee_deactive',$employee_profile_id);
			redirect('Employee/active');
		}

		function active()
		{
			$employee_profile_id = $this->session->userdata('employee_deactive');

			$con = $this->Employee_model->active($employee_profile_id);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"employee not Activated...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Employee/view_employee');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"employee Activated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Employee/view_employee');
			}
		}
	}
?>