<?php 
	
	/**
	* 
	*/
	date_default_timezone_set('Asia/Kolkata');
	class Homework extends CI_Controller
	{
		function homework_details()
		{
			if(!isset($this->session->userdata['teacher'])){
				redirect('/');
			}
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			}
			$homework['flash']['active'] = $this->session->flashdata('active');
        	$homework['flash']['title'] = $this->session->flashdata('title');
        	$homework['flash']['text'] = $this->session->flashdata('text');
        	$homework['flash']['type'] = $this->session->flashdata('type');
        	
			$school_admin = $this->session->userdata('teacher');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$school_AY_id = $school_admin[0]['school_AY_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$employee_profile_id = $school_admin[0]['employee_profile_id'];
			$homework['TCDS'] =  $this->Homework_model->fetch_TCDS($employee_school_profile_id,$school_AY_id,$employee_profile_id);
			$homework['homework'] =  $this->Homework_model->fetch_homework($employee_school_profile_id,$school_AY_id);

			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['homework'] = 'homework';

			$this->load->view('Teacher/teacher_header', $admin);
			$this->load->view('Homework/homework_details',$homework);
			$this->load->view('Homework/homework_footer',$nav);
		}

		function homework_registration()
		{
			$school_admin = $this->session->userdata('teacher');
			$HW['hw_datetime'] = $this->input->post('hw_datetime').' '.date('H:i:s');
			$HW['hw_TCDS_id'] = $this->input->post('hw_TCDS_id');
			$HW['hw_msg'] = $this->input->post('hw_msg');
			$HW['hw_end_date'] = $this->input->post('hw_end_date');
			$HW['hw_effective_date'] = date('Y-m-d');
			$HW['hw_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$HW['hw_AY_id'] = $school_admin[0]['school_AY_id'];
			$con = $this->Homework_model->homework_registration($HW);
			if($con == 1){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Homework submitted to student.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Homework/homework_details');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Homework Not Submitted.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Homework/homework_details');
			}
		}

		function edit_homework($hw_id)
		{
			$this->session->set_userdata('hw',$hw_id);
			redirect('Homework/update_hw');
		}

		function update_hw()
		{
			if(!isset($this->session->userdata['teacher'])){
				redirect('/');
			}
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			}
			$homework['flash']['active'] = $this->session->flashdata('active');
        	$homework['flash']['title'] = $this->session->flashdata('title');
        	$homework['flash']['text'] = $this->session->flashdata('text');
        	$homework['flash']['type'] = $this->session->flashdata('type');
        	
			$hw_id = $this->session->userdata('hw');
			$school_admin = $this->session->userdata('teacher');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$homework['TCDS'] =  $this->Homework_model->fetch_TCDS($employee_school_profile_id);
			$homework['homework'] =  $this->Homework_model->homework_details($hw_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['education'] = 'education';

			$this->load->view('Teacher/teacher_header', $admin);
			$this->load->view('Homework/update_homework',$homework);
			$this->load->view('Homework/homework_footer',$nav);
		}

		function update_homework_details()
		{
			$school_admin = $this->session->userdata('teacher');
			$HW['hw_datetime'] = $this->input->post('hw_datetime').' '.date('H:i:s');
			$HW['hw_TCDS_id'] = $this->input->post('hw_TCDS_id');
			$HW['hw_id'] = $this->input->post('hw_id');
			$HW['hw_msg'] = $this->input->post('hw_msg');
			$HW['hw_end_date'] = $this->input->post('hw_end_date');
			$con = $this->Homework_model->update_homework($HW);
			if($con == 1){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Homework Updated.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Homework/homework_details');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Homework Not Updated.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Homework/homework_details');
			}
		}
	}
 ?>