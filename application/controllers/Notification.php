<?php
	class Notification extends CI_Controller
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

		function notification_details()
		{
			$noti['flash']['active'] = $this->session->flashdata('active');
        	$noti['flash']['title'] = $this->session->flashdata('title');
        	$noti['flash']['text'] = $this->session->flashdata('text');
        	$noti['flash']['type'] = $this->session->flashdata('type');

			$client_admin = $this->session->userdata('client');
			$employee_details = $this->Client_model->employee_details($client_admin);
			$admin['username'] = $client_admin[0]['credential_username'];
			$nav['client_name'] = $employee_details[0]['client_name'];
			$nav['client_logo'] = $employee_details[0]['client_logo'];
			$employee['institute_admin'] = 0;
			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			$school['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$noti['bus'] =  $this->Notification_model->fetch_bus($employee_client_profile_id);
			$noti['notification'] =  $this->Notification_model->fetch_notification($employee_client_profile_id);
			$nav['client_name'] = $employee_details[0]['client_name'];
			$nav['client_logo'] = $employee_details[0]['client_logo'];
			$nav['notification'] = 'notification';

			$this->load->view('Client/client_header', $admin);
			$this->load->view('Notification/notification_details',$noti);
			$this->load->view('Notification/notification_footer',$nav);
		}

		function fetch_user_acor_bus()
		{
			$school_admin = $this->session->userdata('client');
			$user['bus_id'] = $_POST['bus_id'];
			$user['employee_client_profile_id'] = $school_admin[0]['employee_client_profile_id'];
			$data = $this->Notification_model->fetch_user_acor_bus($user);
			echo json_encode($data);
		}

		function fetch_user_acor_client()
		{
			$school_admin = $this->session->userdata('client');
			$user['employee_client_profile_id'] = $school_admin[0]['employee_client_profile_id'];
			$data = $this->Notification_model->fetch_user_acor_client($user);
			echo json_encode($data);
		}

		function add_notification()
		{
			$school_admin = $this->session->userdata('client');
			$student['notifi_user_profile_id'] = $this->input->post('notifi_user_profile_id');
			$notifi_sms = $this->input->post('notifi_sms');
			$cnt = count($student['notifi_user_profile_id']);
			if ($cnt == 0) {
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Please Select the User.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Notification/notification_details');
			}else{
				for ($i=0; $i < $cnt; $i++) { 
					$Notification['notifi_user_profile_id'] = $student['notifi_user_profile_id'][$i];
					$Notification['notifi_msg'] = $this->input->post('notifi_msg');
					$Notification['notifi_title'] = $this->input->post('notifi_title');
					$Notification['notifi_datetime'] = date('Y-m-d');
					$Notification['notifi_type'] = '2';
					$Notification['notifi_client_profile_id'] = $school_admin[0]['employee_client_profile_id'];
					$this->Notification_model->add_notification($Notification);
				}
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Notification Successfully Submited");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Notification/notification_details');
			}
		}

		function add_event_notification()
		{
			$school_admin = $this->session->userdata('school');
			$signature = $this->db->query('select institute_sender_id,institute_signature from institute where institute_profile_id=(select school_institute_profile_id from school where school_profile_id='.$school_admin[0]['employee_school_profile_id'].')')->result_array();
			$student['notifi_student_profile_id'] = $this->input->post('notifi_student_profile_id');
			$notifi_sms = $this->input->post('notifi_sms');
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
					$Notification['notifi_time'] = date("H:i", strtotime($this->input->post('notifi_time')));
					$Notification['notifi_datetime'] = date('Y-m-d');
					$Notification['notifi_AY_id'] = $school_admin[0]['school_AY_id'];
					$Notification['notifi_type'] = '4';
					$Notification['notifi_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
					$this->Notification_model->parent_notification($Notification);
					if($notifi_sms == 'on'){
						$mobile_number = $this->db->query("SELECT * FROM parent join student on parent_student_profile_id = student_profile_id and parent_profile_id = student_parent_id where student_profile_id = ".$student['notifi_student_profile_id'][$i]."")->result_array();
						$number = $mobile_number[0]['parent_mobile_number'];
						$msg = "Dear Parent, \nA warm welcome to our annual sports day of this year which will be held at our school premises on ".$Notification['notifi_date']." ".$this->input->post('notifi_time')." \nRegards, \n".$signature[0]['institute_signature'].".";
						$check = $this->Enquiry_model->check_sms_active($school_admin[0]['employee_school_profile_id']);
						if($school_admin[0]['school_event_sms'] == 1 && $check[0]['institute_sms_credit'] > 0){
							$sms_status = $this->Student_model->sms($number,$msg,$signature[0]['institute_sender_id']);
							$res_explode = explode(':', $sms_status);
			
							$this->Enquiry_model->set_count($check[0]['school_institute_profile_id']);
							$sent['sent_sms_type'] = 2;
							$sent['sent_sms_sub_type'] = 16;
							$sent['sent_sms_mobile_number'] = $number;
							$sent['sent_sms_language'] = 1;
							$sent['sent_sms_MsgID'] = $res_explode[1];
							$sent['sent_sms_status'] =  $res_explode[4];
							$sent['sent_sms_count'] = 1;
							$sent['sent_sms_MSG'] = $msg ;
							$sent['sent_sms_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
							$this->Enquiry_model->add_sent_sms($sent);
						}
					}
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
			$signature = $this->db->query('select institute_sender_id,institute_signature from institute where institute_profile_id=(select school_institute_profile_id from school where school_profile_id='.$school_admin[0]['employee_school_profile_id'].')')->result_array();
			$student['notifi_student_profile_id'] = $this->input->post('notifi_student_profile_id');
			$notifi_sms = $this->input->post('notifi_sms');
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
					$Notification['notifi_time'] = date("H:i", strtotime($this->input->post('notifi_time')));
					$Notification['notifi_datetime'] = date('Y-m-d');
					$Notification['notifi_AY_id'] = $school_admin[0]['school_AY_id'];
					$Notification['notifi_img'] = $this->upload('notifi_img','notifi_img');
					$Notification['notifi_type'] = '5';
					$Notification['notifi_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
					$this->Notification_model->parent_notification($Notification);
					if($notifi_sms == 'on'){
						$mobile_number = $this->db->query("SELECT * FROM parent join student on parent_student_profile_id = student_profile_id and parent_profile_id = student_parent_id where student_profile_id = ".$student['notifi_student_profile_id'][$i]."")->result_array();
						$number = $mobile_number[0]['parent_mobile_number'];
						$msg = "Dear Parent, \nYou are requested to attend our parent meeting on ".$Notification['notifi_date']." ".$this->input->post('notifi_time')." \nRegards, \n".$signature[0]['institute_signature'].".";
						$check = $this->Enquiry_model->check_sms_active($school_admin[0]['employee_school_profile_id']);
						if($school_admin[0]['school_circular_sms'] == 1 && $check[0]['institute_sms_credit'] > 0){
							$sms_status = $this->Student_model->sms($number,$msg,$signature[0]['institute_sender_id']);
							$res_explode = explode(':', $sms_status);
			
							$this->Enquiry_model->set_count($check[0]['school_institute_profile_id']);
							$sent['sent_sms_type'] = 2;
							$sent['sent_sms_sub_type'] = 16;
							$sent['sent_sms_mobile_number'] = $number;
							$sent['sent_sms_language'] = 1;
							$sent['sent_sms_MsgID'] = $res_explode[1];
							$sent['sent_sms_status'] =  $res_explode[4];
							$sent['sent_sms_count'] = 1;
							$sent['sent_sms_MSG'] = $msg ;
							$sent['sent_sms_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
							$this->Enquiry_model->add_sent_sms($sent);
						}
					}
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
			$signature = $this->db->query('select institute_sender_id,institute_signature from institute where institute_profile_id=(select school_institute_profile_id from school where school_profile_id='.$school_admin[0]['employee_school_profile_id'].')')->result_array();
			$student['notifi_student_profile_id'] = $this->input->post('notifi_student_profile_id');
			$notifi_sms = $this->input->post('notifi_sms');
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
					$Notification['notifi_time'] = date("H:i", strtotime($this->input->post('notifi_time')));
					$Notification['notifi_datetime'] = date('Y-m-d');
					$Notification['notifi_AY_id'] = $school_admin[0]['school_AY_id'];
					$Notification['notifi_type'] = '6';
					$Notification['notifi_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
					$this->Notification_model->parent_notification($Notification);
					if($notifi_sms == 'on'){
						$mobile_number = $this->db->query("SELECT * FROM parent join student on parent_student_profile_id = student_profile_id and parent_profile_id = student_parent_id where student_profile_id = ".$student['notifi_student_profile_id'][$i]."")->result_array();
						$number = $mobile_number[0]['parent_mobile_number'];
						$msg = "Dear Parent, \nYou are requested to attend our parent meeting on ".$Notification['notifi_date']." ".$this->input->post('notifi_time')." \nRegards, \n".$signature[0]['institute_signature'].".";
						$check = $this->Enquiry_model->check_sms_active($school_admin[0]['employee_school_profile_id']);
						if($school_admin[0]['school_newsfeed_sms'] == 1 && $check[0]['institute_sms_credit'] > 0){
							$sms_status = $this->Student_model->sms($number,$msg,$signature[0]['institute_sender_id']);
							$res_explode = explode(':', $sms_status);
			
							$this->Enquiry_model->set_count($check[0]['school_institute_profile_id']);
							$sent['sent_sms_type'] = 2;
							$sent['sent_sms_sub_type'] = 16;
							$sent['sent_sms_mobile_number'] = $number;
							$sent['sent_sms_language'] = 1;
							$sent['sent_sms_MsgID'] = $res_explode[1];
							$sent['sent_sms_status'] =  $res_explode[4];
							$sent['sent_sms_count'] = 1;
							$sent['sent_sms_MSG'] = $msg ;
							$sent['sent_sms_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
							$this->Enquiry_model->add_sent_sms($sent);
						}
					}
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