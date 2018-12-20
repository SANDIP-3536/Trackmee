<?php 
	/**
	* 
	*/
	class School_class extends CI_Controller
	{
		function class_details()
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
			$class_details['flash']['active'] = $this->session->flashdata('active');
        	$class_details['flash']['title'] = $this->session->flashdata('title');
        	$class_details['flash']['text'] = $this->session->flashdata('text');
        	$class_details['flash']['type'] = $this->session->flashdata('type');
        	
			$school_admin = $this->session->userdata('school');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$class_details['school_class'] =  $this->Class_model->fetch_school_class($employee_school_profile_id);
			$class_details['school_subject'] =  $this->Subject_model->fetch_school_subject($employee_school_profile_id);
			$class_details['school_division'] =  $this->Division_model->fetch_school_division($employee_school_profile_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['education'] = 'education';

			$this->load->view('School/school_header', $admin);
			$this->load->view('Class/class_division_subject',$class_details);
			$this->load->view('Class/class_footer',$nav);
		}

		function class_registration()
		{
			$school_admin = $this->session->userdata('school');
			$class_regi['class_name'] = $this->input->post('class_name');
			$class_regi['class_minimum_attendance'] = $this->input->post('class_minimum_attendance');
			$class_regi['class_attendance_type'] = $this->input->post('class_attendance_type');
			$class_regi['class_effective_date'] = date('Y-m-d');
			$class_regi['class_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$verify = $this->db->where('class_name',$class_regi['class_name'])->where('class_expiry_date','9999-12-31')->where('class_school_profile_id',$class_regi['class_school_profile_id'])->get('class')->num_rows();
			if ($verify != 0) {
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Class Already Register..");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('School_class/class_details');
			}
			$con = $this->Class_model->class_registration($class_regi);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Class Not Submitted...");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('School_class/class_details');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Class Added Successfully.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('School_class/class_details');
			}
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
	            redirect('School_class/class_details');
			}
			$con = $this->Division_model->division_registration($division_regi);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Division Not Submitted...");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('School_class/class_details');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Division Added Successfully.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('School_class/class_details');
			}
		}

		function subject_registration()
		{
			$school_admin = $this->session->userdata('school');
			$subject['subject_type'] = $this->input->post('subject_type');
			$cnt = count($subject['subject_type']);
			for ($i=0; $i < $cnt; $i++) { 
				$subject_regi['subject_name'] = $this->input->post('subject_name');
				$subject_regi['subject_class_id'] = $this->input->post('subject_class_id');
				$subject_regi['subject_type'] = $subject['subject_type'][$i];
				$subject_regi['subject_effective_date'] = date('Y-m-d');
				$subject_regi['subject_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
				$verify = $this->db->query("SELECT * FROM subject where subject_expiry_date ='9999-12-31' and subject_school_profile_id =".$subject_regi['subject_school_profile_id']." and subject_name ='".$subject_regi['subject_name']."' and subject_type =".$subject_regi['subject_type']." and subject_class_id = ".$subject_regi['subject_class_id']."")->num_rows();
				if($verify != 0){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Subject Already register...");
		            $this->session->set_flashdata('text',"");
		            $this->session->set_flashdata('type',"warning");
					redirect('Subject/class_details');
				}
				else{
					$con = $this->Subject_model->Subject_registration($subject_regi);
				}
			}
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Subject Added Successfully.");
            $this->session->set_flashdata('text',"");
            $this->session->set_flashdata('type',"success");
			redirect('School_class/class_details');
		}
	}
 ?>