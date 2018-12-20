<?php 
	/**
	* 
	*/
	date_default_timezone_set('Asia/Kolkata');
	class Attendance extends CI_Controller
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
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$employee_profile_id = $school_admin[0]['employee_profile_id'];
			$school_AY_id = $school_admin[0]['school_AY_id'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$attend_details['TCD_details'] =  $this->db->query("SELECT * FROM `teacher_class_division_subject_assgn` join class on class_id = TCDS_class_id join division on division_id = TCDS_division_id where TCDS_expiry_date = '9999-12-31' and TCDS_AY_id =".$school_AY_id." and TCDS_school_profile_id = ".$employee_school_profile_id." group by class_name,division_name")->result_array();
			$attend_details['TS_details'] =  $this->db->query("SELECT * FROM `teacher_class_division_subject_assgn` join  subject on subject_id=TCDS_subject_id where TCDS_expiry_date = '9999-12-31' and TCDS_AY_id =".$school_AY_id." and TCDS_school_profile_id = ".$employee_school_profile_id."")->result_array();
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['education'] = 'education';

			$this->load->view('School/school_header', $admin);
			$this->load->view('Attendance/attend_details',$attend_details);
			$this->load->view('Attendance/attend_footer',$nav);
		}

		function attend_details()
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

			$attend_details['flash']['active'] = $this->session->flashdata('active');
        	$attend_details['flash']['title'] = $this->session->flashdata('title');
        	$attend_details['flash']['text'] = $this->session->flashdata('text');
        	$attend_details['flash']['type'] = $this->session->flashdata('type');
			
			$school_admin = $this->session->userdata('teacher');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$employee_profile_id = $school_admin[0]['employee_profile_id'];
			$school_AY_id = $school_admin[0]['school_AY_id'];
			$attend_details['TCD_details'] =  $this->Attendance_model->fetch_TCD($employee_school_profile_id,$school_AY_id,$employee_profile_id);
			$attend_details['TS_details'] =  $this->Attendance_model->fetch_TS($employee_school_profile_id,$school_AY_id,$employee_profile_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['education'] = 'education';

			$this->load->view('Teacher/teacher_header', $admin);
			$this->load->view('Attendance/attend_details',$attend_details);
			$this->load->view('Attendance/attend_footer',$nav);
		}

		function fetch_student_acor_SCD()
		{	
			if(isset($this->session->userdata['teacher'])){
				$school_admin = $this->session->userdata('teacher');
			}
			else{
				$school_admin = $this->session->userdata('school');
			}
			$class_id = $_POST['class_id'];
			$TCD = explode('-',$class_id);
			$fetch['class_id'] = $TCD[0];
			$fetch['division_id'] = $TCD[1];
			$fetch['profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$fetch['AY_id'] = $school_admin[0]['school_AY_id'];
			$data = $this->Attendance_model->fetch_student_acor_SCD($fetch);
			echo json_encode($data);
		}

		function add_student_attendance()
		{
			if(isset($this->session->userdata['teacher'])){
				$school_admin = $this->session->userdata('teacher');
			}else if(isset($this->session->userdata['school'])){
				$school_admin = $this->session->userdata('school');
			}
			$attend['attend_status'] = $this->input->post('attend_status');
			$attend['attend_TCDS_id'] = $this->input->post('TCDS_id');
			$attend['attend_SCD_id'] = $this->input->post('SCD_id');
			$attend['attend_datetime'] = $this->input->post('attend_datetime');
			$cnt = count($attend['attend_SCD_id']);
			if(empty($attend['attend_SCD_id']) || empty($attend['attend_TCDS_id'])){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Somthing missing.");
	            $this->session->set_flashdata('text',"Please take again.");
	            $this->session->set_flashdata('type',"Warning");
	            if(isset($this->session->userdata['teacher'])){
					redirect('Attendance/attend_details');
				}else{
					redirect('Attendance');
				}
			}else{
				for ($i=0; $i < $cnt; $i++) {	
					$attend_reg['attend_SCD_id'] = $attend['attend_SCD_id'][$i];
					$status = $attend['attend_status'][$i];
					if ($status == 'on') {
						$attend_reg['attend_status'] = "P";
					}
					else{
						$attend_reg['attend_status'] = "A";
					}
					$attend_reg['attend_datetime'] = $attend['attend_datetime'].' '.date('H:i:s');;
					$attend_reg['attend_TCDS_id'] = $attend['attend_TCDS_id'];
					$attend_reg['attend_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
					$attend_reg['attend_AY_id'] = $school_admin[0]['school_AY_id'];
					$this->db->insert('attendance',$attend_reg);
				}
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Attendance Successfully Taken.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
	            if(isset($this->session->userdata['teacher'])){
					redirect('Attendance/attend_details');
				}else{
					redirect('Attendance');
				}
			}
		}
	}
?>