<?php 
	/**
	* 
	*/
	class Notification extends CI_Controller
	{
		function notification_details()
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
			$noti['flash']['active'] = $this->session->flashdata('active');
        	$noti['flash']['title'] = $this->session->flashdata('title');
        	$noti['flash']['text'] = $this->session->flashdata('text');
        	$noti['flash']['type'] = $this->session->flashdata('type');
        	
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
			$noti['class_details'] =  $this->Notification_model->fetch_class($employee_school_profile_id);
			$noti['division_details'] =  $this->Notification_model->fetch_division($employee_school_profile_id);
			$noti['parent'] =  $this->Notification_model->fetch_parent_meet($employee_school_profile_id);
			$noti['emergency'] =  $this->Notification_model->fetch_emergency($employee_school_profile_id);
			$noti['student_techer'] =  $this->Notification_model->fetch_student_teacher($employee_school_profile_id);
			$noti['event'] =  $this->Notification_model->fetch_event($employee_school_profile_id);
			$noti['other'] =  $this->Notification_model->fetch_other_notifi($employee_school_profile_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['notification'] = 'notification';

			$this->load->view('School/school_header', $admin);
			$this->load->view('Notification/notification_details',$noti);
			$this->load->view('Notification/notification_footer',$nav);
		}

		function fetch_student_acor_class()
		{
			$school_admin = $this->session->userdata('school');
			$student['class_id'] = $_POST['class_id'];
			$student['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$data = $this->Notification_model->fetch_student_acor_class($student);
			echo json_encode($data);
		}

		function fetch_student_acor_division()
		{
			$school_admin = $this->session->userdata('school');
			$student['division_id'] = $_POST['division_id'];
			$student['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$data = $this->Notification_model->fetch_student_acor_division($student);
			echo json_encode($data);
		}

		function fetch_student_acor_class_division()
		{
			$school_admin = $this->session->userdata('school');
			$student['class_id'] = $_POST['class_id'];
			$student['division_id'] = $_POST['division_id'];
			$student['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$data = $this->Notification_model->fetch_student_acor_class_division($student);
			echo json_encode($data);
		}

		function fetch_student_acor_school()
		{
			$school_admin = $this->session->userdata('school');
			$student['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$data = $this->Notification_model->fetch_student_acor_school($student);
			echo json_encode($data);
		}

		function add_parent_meeting()
		{
			$school_admin = $this->session->userdata('school');
			$student['notifi_student_profile_id'] = $this->input->post('notifi_student_profile_id');
			$cnt = count($student['notifi_student_profile_id']);
			if ($cnt == 0) {
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Please Select the student.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Notification/notification_details');
			}else{
				for ($i=0; $i < $cnt; $i++) { 
					$Notification['notifi_student_profile_id'] = $student['notifi_student_profile_id'][$i];
					$Notification['notifi_msg'] = $this->input->post('notifi_msg');
					$Notification['notifi_title'] = $this->input->post('notifi_title');
					$Notification['notifi_date'] = $this->input->post('notifi_date');
					$Notification['notifi_time'] = $this->input->post('notifi_time');
					$Notification['notifi_datetime'] = date('Y-m-d');
					$Notification['notifi_AY_id'] = $school_admin[0]['school_AY_id'];
					$Notification['notifi_type'] = '3';
					$Notification['notifi_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
					$this->Notification_model->parent_notification($Notification);
				}
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Parent Meeting Successfully Submited");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Notification/notification_details');
			}
		}

		function add_event_notification()
		{
			$school_admin = $this->session->userdata('school');
			$student['notifi_student_profile_id'] = $this->input->post('notifi_student_profile_id');
			$cnt = count($student['notifi_student_profile_id']);
			if ($cnt == 0) {
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Please Select the student.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Notification/notification_details');
			}else{
				for ($i=0; $i < $cnt; $i++) { 
					$Notification['notifi_student_profile_id'] = $student['notifi_student_profile_id'][$i];
					$Notification['notifi_msg'] = $this->input->post('notifi_msg');
					$Notification['notifi_title'] = $this->input->post('notifi_title');
					$Notification['notifi_date'] = $this->input->post('notifi_date');
					$Notification['notifi_time'] = $this->input->post('notifi_time');
					$Notification['notifi_datetime'] = date('Y-m-d');
					$Notification['notifi_AY_id'] = $school_admin[0]['school_AY_id'];
					$Notification['notifi_type'] = '4';
					$Notification['notifi_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
					$this->Notification_model->parent_notification($Notification);
				}
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Event NotificationSuccessfully Submited");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Notification/notification_details');
			}
		}

		function add_circular_notification()
		{
			$school_admin = $this->session->userdata('school');
			$student['notifi_student_profile_id'] = $this->input->post('notifi_student_profile_id');
			$cnt = count($student['notifi_student_profile_id']);
			if ($cnt == 0) {
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Please Select the student.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Notification/notification_details');
			}else{
				for ($i=0; $i < $cnt; $i++) { 
					$Notification['notifi_student_profile_id'] = $student['notifi_student_profile_id'][$i];
					$Notification['notifi_msg'] = $this->input->post('notifi_msg');
					$Notification['notifi_title'] = $this->input->post('notifi_title');
					$Notification['notifi_date'] = $this->input->post('notifi_date');
					$Notification['notifi_time'] = $this->input->post('notifi_time');
					$Notification['notifi_datetime'] = date('Y-m-d');
					$Notification['notifi_AY_id'] = $school_admin[0]['school_AY_id'];
					$Notification['notifi_img'] = $this->upload('notifi_img','notifi_img');
					$Notification['notifi_type'] = '5';
					$Notification['notifi_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
					$this->Notification_model->parent_notification($Notification);
				}
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title'," Circular Notification Send.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Notification/notification_details');
			}
		}

		function add_news_notification()
		{
			$school_admin = $this->session->userdata('school');
			$student['notifi_student_profile_id'] = $this->input->post('notifi_student_profile_id');
			$Notification['notifi_img'] = $this->upload('notifi_img','notifi_img');
			$cnt = count($student['notifi_student_profile_id']);
			if ($cnt == 0) {
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Please Select the student.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Notification/notification_details');
			}else{
				for ($i=0; $i < $cnt; $i++) { 
					$Notification['notifi_student_profile_id'] = $student['notifi_student_profile_id'][$i];
					$Notification['notifi_msg'] = $this->input->post('notifi_msg');
					$Notification['notifi_title'] = $this->input->post('notifi_title');
					$Notification['notifi_date'] = $this->input->post('notifi_date');
					$Notification['notifi_time'] = $this->input->post('notifi_time');
					$Notification['notifi_datetime'] = date('Y-m-d');
					$Notification['notifi_AY_id'] = $school_admin[0]['school_AY_id'];
					$Notification['notifi_type'] = '6';
					$Notification['notifi_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
					$this->Notification_model->parent_notification($Notification);
				}
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"News Notification Successfully Send.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Notification/notification_details');
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
				$user_photo = '';
				return $user_photo;
			}
			else{
				$upload_files = array('upload_data' => $this->upload->data());

				$user_photo = base_url().'profile_photo/'.$upload_files['upload_data']['file_name'];
				$this->upload->data();

				return $user_photo;
			}
		}
	}
 ?>