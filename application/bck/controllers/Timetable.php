<?php 

	/**
	* 
	*/
	class Timetable extends CI_Controller
	{
		function index()
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

			$attend_details['flash']['active'] = $this->session->flashdata('active');
        	$attend_details['flash']['title'] = $this->session->flashdata('title');
        	$attend_details['flash']['text'] = $this->session->flashdata('text');
        	$attend_details['flash']['type'] = $this->session->flashdata('type');
        	
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
			$school_AY_id = $school_admin[0]['school_AY_id'];
			$TT['class_details'] =  $this->Timetable_model->fetch_class($employee_school_profile_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['education'] = 'education';

			$this->load->view('School/school_header', $admin);
			$this->load->view('Timetable/timetable',$TT);
			$this->load->view('Timetable/timetable_footer',$nav);
		}

		function fetch_class_division()
		{
			$school_admin = $this->session->userdata('school');
			$class['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$class['class_id'] = $_POST['class_id'];
			$data = $this->Timetable_model->fetch_class_division($class);
			echo json_encode($data);
		}

		function fetch_class_division_subject()
		{
			$school_admin = $this->session->userdata('school');
			$subject['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$subject['class_id'] = $_POST['class_id'];
			$subject['division'] = $_POST['division'];
			$data = $this->Timetable_model->fetch_class_division_subject($subject);
			echo json_encode($data);
		}

		function fetch_teacher()
		{
			$school_admin = $this->session->userdata('school');
			$subject['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$subject['school_AY_id'] = $school_admin[0]['school_AY_id'];
			$subject['subject_id'] = $_POST['subject_id'];
			$subject['class_name'] = $_POST['class_name'];
			$subject['division'] = $_POST['division'];
			$data = $this->Timetable_model->fetch_teacher($subject);
			echo json_encode($data);
		}

		function add_timetable()
		{
			$school_admin = $this->session->userdata('school');
			$data2['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$data2['school_AY_id'] = $school_admin[0]['school_AY_id'];
			$data['tt_school_profile_id'] = $data2['employee_school_profile_id'];
			$data['tt_AY_id'] = $data2['school_AY_id'];
			$data['tt_effective_date'] = date('Y/m/d');
			
			$data2['class_name'] = $_POST['class_name'];
			$data2['division'] = $_POST['division'];
			$data3['days'] = $_POST['days'];
			if ($data3['days'] == 'Monday') 
			{
				$data['tt_day'] = '1';
			}
			if ($data3['days'] == 'Tuesday') 
			{
				$data['tt_day'] = '2';
			}
			if ($data3['days'] == 'Wednesday') 
			{
				$data['tt_day'] = '3';
			}
			if ($data3['days'] == 'Thursday') 
			{
				$data['tt_day'] = '4';
			}
			if ($data3['days'] == 'Friday') 
			{
				$data['tt_day'] = '5';
			}
			if ($data3['days'] == 'Saturday') 
			{
				$data['tt_day'] = '6';
			}
			if ($data3['days'] == 'Sunday') 
			{
				$data['tt_day'] = '7';
			}

			$data2['subject_name'] = $_POST['subject_name'];
			$data2['teacher_name'] = $_POST['teacher_name'];
			$data['tt_start_time'] = $_POST['tt_start_time'];
			$data['tt_end_time'] = $_POST['tt_end_time'];

			$data['tt_TCDS_id'] = $this->Timetable_model->fetch_TCDS_id($data2);
			
			$this->Timetable_model->insert_timetable($data);

			echo json_encode($data);
			// echo "<pre>";
			// print_r($data);die();
		}

		function show_timetable()
		{
			$school_admin = $this->session->userdata('school');
			$data['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$data['school_AY_id'] = $school_admin[0]['school_AY_id'];
			$data['class_name'] = $_POST['class_name'];
			$data['division'] = $_POST['division'];

			$data1['timetable'] = $this->Timetable_model->fetch_timetable($data);
			echo json_encode($data1);
		}
	}
 ?>