<?php 

	/**
	* 
	*/
	class Lesson extends CI_Controller
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
			$TT['class_details'] =  $this->Lesson_model->fetch_class($employee_school_profile_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['education'] = 'lesson';

			$this->load->view('School/school_header', $admin);
			$this->load->view('Lesson/lesson_assign',$TT);
			$this->load->view('Lesson/lesson_footer',$nav);
		}

		function fetch_class_division()
		{
			$school_admin = $this->session->userdata('school');
			$class['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$class['class_id'] = $_POST['class_id'];
			$data = $this->Lesson_model->fetch_class_division($class);
			echo json_encode($data);
		}

		function fetch_class_division_subject()
		{
			$school_admin = $this->session->userdata('school');
			$subject['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$subject['class_id'] = $_POST['class_id'];
			$subject['division'] = $_POST['division'];
			$data = $this->Lesson_model->fetch_class_division_subject($subject);
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
			$data = $this->Lesson_model->fetch_teacher($subject);
			echo json_encode($data);
		}

		function add_lesson()
		{
			$school_admin = $this->session->userdata('school');
			$data2['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$data2['school_AY_id'] = $school_admin[0]['school_AY_id'];
			
			$data2['class_name'] = $this->input->post('class_name');
			$data2['division'] = $this->input->post('division');
			$data2['subject_name'] = $this->input->post('subject_name');
			$data2['teacher_name'] = $this->input->post('teacher_name');

			$data['LP_TCDS_id'] = $this->Lesson_model->fetch_TCDS_id($data2);
			$data['LP_school_profile_id'] = $data2['employee_school_profile_id'];
			$data['LP_AY_id'] = $data2['school_AY_id'];
			
			$data['LP_date'] = $this->input->post('date');
			$data['LP_status'] = $this->input->post('status');
			$data['LP_topic'] = $this->input->post('topic');
			$data['LP_description'] = $this->input->post('description');

			$this->Lesson_model->insert_lesson($data);

			// echo json_encode($data);
			redirect('Lesson/show_lesson');
			
		}

		function show_lesson()
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
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['education'] = 'lesson';

			$data['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$data['school_AY_id'] = $school_admin[0]['school_AY_id'];
		
			$TT['lesson'] = $this->Lesson_model->fetch_lesson($data);
			// print_r($TT);die();

			$this->load->view('School/school_header', $admin);
			$this->load->view('Lesson/lesson_view',$TT);
			$this->load->view('Lesson/lesson_footer',$nav);

		}

		function teacher_lesson_details()
		{
			if(!isset($this->session->userdata['teacher']))
			{
				redirect('/');
			}
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			} 
			$teacher['flash']['active'] = $this->session->flashdata('active');
        	$teacher['flash']['title'] = $this->session->flashdata('title');
        	$teacher['flash']['text'] = $this->session->flashdata('text');
        	$teacher['flash']['type'] = $this->session->flashdata('type');

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

			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			// $nav['lesson'] = 'lesson';

			$data['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$data['school_AY_id'] = $school_admin[0]['school_AY_id'];
			$data['employee_profile_id'] = $school_admin[0]['employee_profile_id'];
			
			$TT['lesson'] = $this->Lesson_model->teacher_lesson_details($data);
			// print_r($TT);die();

			$this->load->view('Teacher/teacher_header', $admin);
			$this->load->view('Lesson/teacher_lesson_details',$TT);
			$this->load->view('Teacher/teacher_footer',$nav);
		}

		function fetch_lesson()
		{
			$school_admin = $this->session->userdata('teacher');
			$lesson['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$lesson['LP_id'] = $_POST['LP_id'];
			$data = $this->Lesson_model->fetch_lesson_details($lesson);
			echo json_encode($data);
		}
		function update_lesson()
		{
			$school_admin = $this->session->userdata('teacher');
			$lesson['LP_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$lesson['LP_id'] = $_POST['LP_id'];
			$lesson['LP_status'] = $_POST['LP_status'];
			$data = $this->Lesson_model->update_lesson($lesson);
			echo json_encode($data);
		}
	}
 ?>