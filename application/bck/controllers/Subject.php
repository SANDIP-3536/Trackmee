<?php 
	/**
	* 
	*/
	class Subject extends CI_Controller
	{
		function subject_details()
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
			$subject_details['flash']['active'] = $this->session->flashdata('active');
        	$subject_details['flash']['title'] = $this->session->flashdata('title');
        	$subject_details['flash']['text'] = $this->session->flashdata('text');
        	$subject_details['flash']['type'] = $this->session->flashdata('type');
        	
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
			$subject_details['school_subject'] =  $this->Subject_model->fetch_school_subject($employee_school_profile_id);
			$subject_details['school_class'] =  $this->Division_model->fetch_school_class($employee_school_profile_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['education'] = 'education';

			$this->load->view('School/school_header', $admin);
			$this->load->view('Subject/subject_details',$subject_details);
			$this->load->view('Subject/subject_footer',$nav);
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
					redirect('School_class/class_details');
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