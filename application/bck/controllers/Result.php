<?php 

	/**
	* 
	*/
	class Result extends CI_Controller
	{
		function result_details()
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

			$result['flash']['active'] = $this->session->flashdata('active');
	    	$result['flash']['title'] = $this->session->flashdata('title');
	    	$result['flash']['text'] = $this->session->flashdata('text');
	    	$result['flash']['type'] = $this->session->flashdata('type');
	    	
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
			$school_AY_id = $school_admin[0]['school_AY_id'];
			$employee_profile_id = $school_admin[0]['employee_profile_id'];
			$result['exam'] =  $this->Result_model->fetch_school_exam($employee_school_profile_id,$school_AY_id);
			$result['student'] =  $this->Result_model->fetch_school_student($employee_school_profile_id,$school_AY_id,$employee_profile_id);
			$result['result'] = $this->Result_model->fetch_school_result($employee_school_profile_id,$school_AY_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['result'] = 'result';

			$this->load->view('Teacher/teacher_header', $admin);
			$this->load->view('Result/result_details',$result);
			$this->load->view('Result/result_footer',$nav);
		}

		function result_registration()
		{
			$school_admin = $this->session->userdata('teacher');
			$result['result_exam_id'] = $this->input->post('result_exam_id');
			$result['result_student_id'] = $this->input->post('result_student_id');
			$result['result_marks'] = $this->input->post('result_marks');
			$result['result_effective_date'] = date('Y-m-d');
			$result['result_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$result['result_AY_id'] = $school_admin[0]['school_AY_id'];
			$verify = $this->db->query("SELECT * FROM `result` where result_exam_id =".$result['result_exam_id']." and result_student_id =".$result['result_student_id']." and result_AY_id =".$result['result_AY_id']." and result_expiry_date ='9999-12-31' and result_school_profile_id =".$result['result_school_profile_id']."")->num_rows();
			if ($verify != 0) {
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Result Already Submitted.");
	            $this->session->set_flashdata('text',"Please check and edit.");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Result/result_details');
			} else {
				$con = $this->Result_model->result_registration($result);
				if($con == 1){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Result submitted to student.");
		            $this->session->set_flashdata('text',"");
		            $this->session->set_flashdata('type',"success");
		            redirect('Result/result_details');
				}else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Result Not Submitted.");
		            $this->session->set_flashdata('text',"");
		            $this->session->set_flashdata('type',"warning");
		            redirect('Result/result_details');
				}
			}
		}

		function Edit_result($result_id)
		{
			$this->session->set_userdata('result',$result_id);
			redirect('Result/Edit_result_details');
		}

		function Edit_result_details()
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

			$result['flash']['active'] = $this->session->flashdata('active');
	    	$result['flash']['title'] = $this->session->flashdata('title');
	    	$result['flash']['text'] = $this->session->flashdata('text');
	    	$result['flash']['type'] = $this->session->flashdata('type');
	    	
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
			$school_AY_id = $school_admin[0]['school_AY_id'];
			$employee_profile_id = $school_admin[0]['employee_profile_id'];
			$result_id = $this->session->userdata('result');
			$result['result_data'] = $this->db->query("SELECT * FROM result join student on student_profile_id = result_student_id join exam_schedule on exam_sched_id = result_exam_id where result_school_profile_id=".$employee_school_profile_id." and result_AY_id =".$school_AY_id." and result_expiry_date = '9999-12-31' and result_id=".$result_id."")->result_array();
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['result'] = 'result';

			$this->load->view('Teacher/teacher_header', $admin);
			$this->load->view('Result/update_result',$result);
			$this->load->view('Result/result_footer',$nav);
		}

		function result_update_marks()
		{
			$result_marks = $this->input->post('result_marks');
			$result_id = $this->input->post('result_id');
			$result_update = $this->db->query("UPDATE result SET result_marks = '".$result_marks."' WHERE result_id =".$result_id."");
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Result Marks Updated.");
            $this->session->set_flashdata('text',"");
            $this->session->set_flashdata('type',"success");
            redirect('Result/result_details');
		}

		function delete_result($result_id)
		{
			$this->session->set_userdata('delete_result',$result_id);
			redirect('Result/delete_result_entery');
		}

		function delete_result_entery()
		{
			$result_id = $this->session->userdata('delete_result');
			$result_expiry = date('Y-m-d');
			// print_r($result_expiry);die();
			$result_update = $this->db->query("UPDATE result SET result_expiry_date ='".$result_expiry."' WHERE result_id =".$result_id."");
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Result Marks Deleted.");
            $this->session->set_flashdata('text',"");
            $this->session->set_flashdata('type',"success");
            redirect('Result/result_details');
		}
	}
 ?>