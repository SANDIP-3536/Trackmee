<?php 

	/**
	* 
	*/
	class Exam extends CI_Controller
	{
		function exam_details()
		{
			// if(!isset($this->session->userdata['teacher'])){
			if(!isset($this->session->userdata['school'])){
				redirect('/');
			}
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			} 

			$exam['flash']['active'] = $this->session->flashdata('active');
	    	$exam['flash']['title'] = $this->session->flashdata('title');
	    	$exam['flash']['text'] = $this->session->flashdata('text');
	    	$exam['flash']['type'] = $this->session->flashdata('type');
	    	
			$school_admin = $this->session->userdata('school');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['user_type'] = $school_admin[0]['employee_type'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$employee_profile_id = $school_admin[0]['employee_profile_id'];
			$school_AY_id = $school_admin[0]['school_AY_id'];
			$exam['term_details'] = $this->Exam_model->fetch_term($employee_school_profile_id,$school_AY_id);
			$exam['exam_details'] = $this->Exam_model->fetch_exam($employee_school_profile_id,$school_AY_id);
			$exam['exam_sched_details'] = $this->Exam_model->fetch_exam_schedule($employee_school_profile_id,$school_AY_id);
			$exam['grade_details'] = $this->Exam_model->fetch_grade($employee_school_profile_id,$school_AY_id);
			$exam['IE_details'] = $this->Exam_model->fetch_IE($employee_school_profile_id,$school_AY_id);
			$exam['school_class'] =  $this->Exam_model->fetch_school_class($employee_school_profile_id);
			$exam['fetch_teacher_exam_marks'] =  $this->Exam_model->fetch_teacher_exam_marks($employee_school_profile_id,$school_AY_id,$employee_profile_id);
			$exam['fetch_teacher_IE_exam'] =  $this->Exam_model->fetch_teacher_IE_exam($employee_school_profile_id,$school_AY_id,$employee_profile_id);
			$exam['fetch_exam_marks'] =  $this->Exam_model->fetch_exam_marks($employee_school_profile_id,$school_AY_id);
			$exam['fetch_IE_marks'] =  $this->Exam_model->fetch_IE_marks($employee_school_profile_id,$school_AY_id);
			// $exam['school_subject'] =  $this->Exam_model->fetch_school_subject($employee_school_profile_id,$employee_profile_id,$school_AY_id);
			// $exam['school_subject'] =  $this->Exam_model->fetch_school_subject($employee_school_profile_id,$employee_profile_id,$school_AY_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['exam'] = 'exam';

			$this->load->view('School/school_header', $admin);
			// $this->load->view('Teacher/teacher_header', $admin);
			$this->load->view('Exam/exam_details',$exam);
			$this->load->view('Exam/exam_footer',$nav);
		}

		function exam_schedule_details()
		{
			// if(!isset($this->session->userdata['teacher'])){
			if(!isset($this->session->userdata['school'])){
				redirect('/');
			}
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			} 

			$exam['flash']['active'] = $this->session->flashdata('active');
	    	$exam['flash']['title'] = $this->session->flashdata('title');
	    	$exam['flash']['text'] = $this->session->flashdata('text');
	    	$exam['flash']['type'] = $this->session->flashdata('type');
	    	
			$school_admin = $this->session->userdata('school');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['user_type'] = $school_admin[0]['employee_type'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$employee_profile_id = $school_admin[0]['employee_profile_id'];
			$school_AY_id = $school_admin[0]['school_AY_id'];
			$exam['exam_details'] = $this->Exam_model->fetch_exam($employee_school_profile_id,$school_AY_id);
			$exam['exam_sched_details'] = $this->Exam_model->fetch_exam_schedule($employee_school_profile_id,$school_AY_id);
			$exam['school_class'] =  $this->Exam_model->fetch_school_class($employee_school_profile_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['exam'] = 'exam';

			$this->load->view('School/school_header', $admin);
			$this->load->view('Exam/exam_schedule_details',$exam);
			$this->load->view('Exam/exam_footer',$nav);
		}

		function teacher_exam_details()
		{
			if(!isset($this->session->userdata['teacher'])){
			// if(!isset($this->session->userdata['school'])){
				redirect('/');
			}
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			} 

			$exam['flash']['active'] = $this->session->flashdata('active');
	    	$exam['flash']['title'] = $this->session->flashdata('title');
	    	$exam['flash']['text'] = $this->session->flashdata('text');
	    	$exam['flash']['type'] = $this->session->flashdata('type');
	    	
			$school_admin = $this->session->userdata('teacher');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['user_type'] = $school_admin[0]['employee_type'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$employee_profile_id = $school_admin[0]['employee_profile_id'];
			$school_AY_id = $school_admin[0]['school_AY_id'];
			$exam['term_details'] = $this->Exam_model->fetch_term($employee_school_profile_id,$school_AY_id);
			$exam['exam_details'] = $this->Exam_model->fetch_exam($employee_school_profile_id,$school_AY_id);
			$exam['exam_sched_details'] = $this->Exam_model->fetch_exam_schedule($employee_school_profile_id,$school_AY_id);
			$exam['grade_details'] = $this->Exam_model->fetch_grade($employee_school_profile_id,$school_AY_id);
			$exam['IE_details'] = $this->Exam_model->fetch_IE($employee_school_profile_id,$school_AY_id);
			$exam['school_class'] =  $this->Exam_model->fetch_school_class($employee_school_profile_id);
			$exam['school_TCDS'] =  $this->Exam_model->fetch_teacher_class_subject($employee_school_profile_id,$school_AY_id,$employee_profile_id);
			$exam['school_student'] =  $this->Exam_model->fetch_teacher_student($employee_school_profile_id,$school_AY_id,$employee_profile_id);
			$exam['fetch_teacher_exam_marks'] =  $this->Exam_model->fetch_teacher_exam_marks($employee_school_profile_id,$school_AY_id,$employee_profile_id);
			$exam['fetch_teacher_IE_exam'] =  $this->Exam_model->fetch_teacher_IE_exam($employee_school_profile_id,$school_AY_id,$employee_profile_id);
			$exam['fetch_exam_marks'] =  $this->Exam_model->fetch_exam_marks($employee_school_profile_id,$school_AY_id);
			$exam['fetch_IE_marks'] =  $this->Exam_model->fetch_IE_marks($employee_school_profile_id,$school_AY_id);
			// $exam['school_subject'] =  $this->Exam_model->fetch_school_subject($employee_school_profile_id,$employee_profile_id,$school_AY_id);
			// $exam['school_subject'] =  $this->Exam_model->fetch_school_subject($employee_school_profile_id,$employee_profile_id,$school_AY_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['exam'] = 'exam';

			// $this->load->view('School/school_header', $admin);
			$this->load->view('Teacher/teacher_header', $admin);
			$this->load->view('Exam/exam_details',$exam);
			$this->load->view('Exam/exam_footer',$nav);
		}

		function subject_details_class()
		{
			$school_admin = $this->session->userdata('school');
			$subject['subject_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$subject['class_id'] = $_POST['class_id'];
			$data = $this->Exam_model->fetch_school_subject($subject);
			echo json_encode($data);
		}

		function term_registration()
		{
			$school_admin = $this->session->userdata('school');
			$term['term_name'] = $this->input->post('term_name');
			$term['term_start_date'] = $this->input->post('term_start_date');
			$term['term_end_date'] = $this->input->post('term_end_date');
			$term['term_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$term['term_AY_id'] = $school_admin[0]['school_AY_id'];
			$term_start_date = $this->input->post('term_start_date');
			$term_end_date = $this->input->post('term_end_date');
			$start_year = explode("-",$term_start_date);
			$end_year = explode("-",$term_end_date);
	        $verify_year = intval($start_year[0]) + 1;
	        // print_r($start_year);
	        // print_r($end_year);
	        // print_r($verify_year);die();
	        if($verify_year != $end_year[0]){
	        	$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Please choose right acadmic year.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Exam/exam_details');
	        }else{
				$con = $this->Exam_model->term_registration($term);
				if($con == 1){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Term submitted.");
		            $this->session->set_flashdata('text',"");
		            $this->session->set_flashdata('type',"success");
		            redirect('Exam/exam_details');
				}else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Term Not Submitted.");
		            $this->session->set_flashdata('text',"");
		            $this->session->set_flashdata('type',"warning");
		            redirect('Exam/exam_details');
				}
			}
		}

		function exam_registration()
		{
			$school_admin = $this->session->userdata('school');
			$exam['exam_name'] = $this->input->post('exam_name');
			$exam['exam_total_weightage'] = $this->input->post('exam_total_weightage');
			$exam['exam_term_id'] = $this->input->post('exam_term_id');
			$exam['exam_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$exam['exam_AY_id'] = $school_admin[0]['school_AY_id'];
			$con = $this->Exam_model->exam_registration($exam);
			if($con == 1){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Exam submitted.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
	            redirect('Exam/exam_details');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Exam Not Submitted.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Exam/exam_details');
			}
		}

		function exam_schedule_registration()
		{
			$school_admin = $this->session->userdata('school');
			$exam['exam_sched_exam_id'] = $this->input->post('exam_sched_exam_id');
			$exam['exam_sched_name'] = $this->input->post('exam_sched_name');
			$exam['exam_sched_class_id'] = $this->input->post('exam_sched_class_id');
			$exam['exam_sched_subject_id'] = $this->input->post('exam_sched_subject_id');
			$exam['exam_sched_date'] = $this->input->post('exam_sched_date');
			$exam['exam_sched_start_time'] = $this->input->post('exam_sched_start_time');
			$exam['exam_sched_end_time'] = $this->input->post('exam_sched_end_time');
			$exam['exam_sched_end_time'] = $this->input->post('exam_sched_end_time');
			$exam['exam_sched_total_marks'] = $this->input->post('exam_sched_total_marks');
			$exam['exam_sched_result_datetime'] = $this->input->post('exam_sched_result_datetime');
			$exam['exam_sched_effective_date'] = date('Y-m-d');
			$exam['exam_sched_AY_id'] = $school_admin[0]['school_AY_id'];
			$exam['exam_sched_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$con = $this->Exam_model->exam_schedule_registration($exam);
			if($con == 1){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Exam submitted.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
	            redirect('Exam/exam_schedule_details');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Exam Not Submitted.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Exam/exam_schedule_details');
			}
		}

		function grade_registration()
		{
			$school_admin = $this->session->userdata('school');
			$GC_grade['GC_grade'] = $this->input->post('GC_grade');
			$GC_grade['GC_higher_mark_range'] = $this->input->post('GC_higher_mark_range');
			$GC_grade['GC_lower_mark_range'] = $this->input->post('GC_lower_mark_range');
			$GC_grade['GC_AY_id'] = $school_admin[0]['school_AY_id'];
			$GC_grade['GC_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$con = $this->Exam_model->grade_registration($GC_grade);
			if($con == 1){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Grade submitted.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
	            redirect('Exam/exam_details');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Grade Not Submitted.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Exam/exam_details');
			}
		}

		function internal_exam_registration()
		{
			$school_admin = $this->session->userdata('teacher');
			$IE['IE_title'] = $this->input->post('IE_title');
			$IE['IE_submission_date'] = $this->input->post('IE_submission_date');
			$IE['IE_description'] = $this->input->post('IE_description');
			$IE['IE_exam_sched_id'] = $this->input->post('IE_exam_sched_id');
			$IE['IE_TCDS_id'] = $this->input->post('IE_TCDS_id');
			$IE['IE_photo'] = $this->upload('IE_photo','IE_image');
			$IE['IE_AY_id'] = $school_admin[0]['school_AY_id'];
			$IE['IE_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$con = $this->Exam_model->internal_exam_registration($IE);
			if($con == 1){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Internal Exam submitted.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
	            redirect('Exam/teacher_exam_details');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Internal Exam Not Submitted.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Exam/teacher_exam_details');
			}
		}

		function exam_mark_registration()
		{
			$school_admin = $this->session->userdata('teacher');
			$exam_marks['exam_marks_exam_id'] = $this->input->post('exam_marks_exam_id');
			$exam_marks['exam_marks_exam_sched_id'] = $this->input->post('exam_marks_exam_sched_id');
			$exam_marks['exam_marks_student_id'] = $this->input->post('exam_marks_student_id');
			$exam_marks['exam_marks'] = $this->input->post('exam_marks');
			$exam_marks['exam_weightage'] = $this->input->post('exam_weightage');
			$exam_marks['exam_marks_effective_date'] = date('Y-m-d');
			$exam_marks['exam_marks_AY_id'] = $school_admin[0]['school_AY_id'];
			$exam_marks['exam_marks_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$con = $this->Exam_model->exam_mark_registration($exam_marks);
			if($con == 1){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Exam Marks submitted.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
	            redirect('Exam/teacher_exam_details');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Exam Marks Not Submitted.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Exam/teacher_exam_details');
			}
		}

		function IE_mark_registration()
		{
			$school_admin = $this->session->userdata('teacher');
			$IE_marks['IEM_IE_id'] = $this->input->post('IEM_IE_id');
			$IE_marks['IEM_student_id'] = $this->input->post('IEM_student_id');
			$IE_marks['IEM_marks'] = $this->input->post('IEM_marks');
			$IE_marks['IEM_AY_id'] = $school_admin[0]['school_AY_id'];
			$IE_marks['IEM_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$con = $this->Exam_model->IE_mark_registration($IE_marks);
			if($con == 1){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Internal Exam Marks submitted.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
	            redirect('Exam/teacher_exam_details');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Internal Exam Marks Not Submitted.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Exam/teacher_exam_details');
			}
		}

		function upload($file,$folder)						
		{
			$config = array(
				'upload_path' => 'IE_image/',
				'upload_url' => base_url().'IE_image/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload($file)){
				$user_photo = 'Null';
				return $user_photo;
			}
			else{
				$upload_files = array('upload_data' => $this->upload->data());

				$user_photo = base_url().'IE_image/'.$upload_files['upload_data']['file_name'];
				$this->upload->data();

				return $user_photo;
			}
		}

		function fetch_exam_schedule_wise_exam()
		{
			$school_admin = $this->session->userdata('teacher');
			$exam['exam_id'] = $_POST['exam_id'];
			$exam['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$exam['school_AY_id'] = $school_admin[0]['school_AY_id'];
			$data = $this->Exam_model->fetch_exam_schedule_wise_exam($exam);
			echo json_encode($data);
		}

		function edit_exam($exam_id)
		{
			$this->session->set_userdata('exam',$exam_id);
			redirect('Exam/update_exam');
		}

		function update_exam()
		{
			$exam_id = $this->session->userdata('exam');
			if(!isset($this->session->userdata['teacher'])){
				redirect('/');
			}
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			} 

			$exam['flash']['active'] = $this->session->flashdata('active');
	    	$exam['flash']['title'] = $this->session->flashdata('title');
	    	$exam['flash']['text'] = $this->session->flashdata('text');
	    	$exam['flash']['type'] = $this->session->flashdata('type');
	    	
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
			$employee_profile_id = $school_admin[0]['employee_profile_id'];
			$school_AY_id = $school_admin[0]['school_AY_id'];
			$exam['teacher_class'] =  $this->Exam_model->fetch_teacher_class($employee_school_profile_id,$employee_profile_id,$school_AY_id);
			$exam['teacher_subject'] =  $this->Exam_model->fetch_teacher_subject($employee_school_profile_id,$employee_profile_id,$school_AY_id);
			$exam['exam_details'] = $this->Exam_model->fetch_exam($exam_id,$school_AY_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['exam'] = 'exam';

			$this->load->view('Teacher/teacher_header', $admin);
			$this->load->view('Exam/update_exam',$exam);
			$this->load->view('Exam/exam_footer',$nav);
		}

		function update_exam_details()
		{
			$school_admin = $this->session->userdata('teacher');
			$exam['exam_id'] = $this->input->post('exam_id');
			$exam['exam_name'] = $this->input->post('exam_name');
			$exam['exam_subject_id'] = $this->input->post('exam_subject_id');
			$exam['exam_class_id'] = $this->input->post('exam_class_id');
			$exam['exam_date'] = $this->input->post('exam_date');
			$exam['exam_start_time'] = $this->input->post('exam_start_time');
			$exam['exam_end_time'] = $this->input->post('exam_end_time');
			$exam['exam_max_marks'] = $this->input->post('exam_max_marks');
			$exam['exam_result_datetime'] = $this->input->post('exam_result_datetime');
			$con = $this->Exam_model->exam_update($exam);
			if($con == 1){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Exam Updated.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
	            redirect('Exam/exam_details');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Exam Not Updated.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Exam/exam_details');
			}
		}
	}
 ?>