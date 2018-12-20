<?php 
	/**
	* 
	*/
	class Division extends CI_Controller
	{
		function division_details()
		{
			if(!isset($this->session->userdata['school'])){
				redirect('/');
			}
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			} 

			$division_details['flash']['active'] = $this->session->flashdata('active');
        	$division_details['flash']['title'] = $this->session->flashdata('title');
        	$division_details['flash']['text'] = $this->session->flashdata('text');
        	$division_details['flash']['type'] = $this->session->flashdata('type');
        	
			$school_admin = $this->session->userdata('school');
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
			$division_details['school_division'] =  $this->Division_model->fetch_school_division($employee_school_profile_id);
			$division_details['school_class'] =  $this->Division_model->fetch_school_class($employee_school_profile_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['education'] = 'education';

			$this->load->view('School/school_header', $admin);
			$this->load->view('Division/division_details',$division_details);
			$this->load->view('Division/division_footer',$nav);
		}

		function division_registration()
		{
			$school_admin = $this->session->userdata('school');
			$division_regi['division_name'] = $this->input->post('division_name');
			$division_regi['division_class_id'] = $this->input->post('division_class_id');
			$division_regi['division_effective_date'] = date('Y-m-d');
			$division_regi['division_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$verify = $this->db->where('division_name',$division_regi['division_name'])->where('division_class_id',$division_regi['division_class_id'])->where('division_expiry_date','9999-12-31')->where('division_school_profile_id',$division_regi['division_school_profile_id'])->get('division')->num_rows();
			// print_r($verify);die();
			if ($verify != 0) {
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Division Alredy Register with Class...");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Division/division_details');
			}
			$con = $this->Division_model->division_registration($division_regi);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Division Not Submitted...");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Division/division_details');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Division Added Successfully.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Division/division_details');
			}
		}
	}
 ?>