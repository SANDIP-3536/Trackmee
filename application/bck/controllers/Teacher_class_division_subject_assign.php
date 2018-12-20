<?php 

	class Teacher_class_division_subject_assign extends CI_Controller
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
			$TCDS_assign['flash']['active'] = $this->session->flashdata('active');
        	$TCDS_assign['flash']['title'] = $this->session->flashdata('title');
        	$TCDS_assign['flash']['text'] = $this->session->flashdata('text');
        	$TCDS_assign['flash']['type'] = $this->session->flashdata('type');
        	
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
			$TCDS_assign['school_class'] =  $this->Teacher_class_division_subject_assign_model->fetch_school_class($employee_school_profile_id);
			$TCDS_assign['school_division'] =  $this->Teacher_class_division_subject_assign_model->fetch_school_division($employee_school_profile_id);
			$TCDS_assign['fetch_subject'] =  $this->Teacher_class_division_subject_assign_model->fetch_school_subject($employee_school_profile_id);
			$TCDS_assign['fetch_teacher'] =  $this->Teacher_class_division_subject_assign_model->fetch_school_teacher($employee_school_profile_id);
			$TCDS_assign['teacher_class_division_subject'] =  $this->Teacher_class_division_subject_assign_model->fetch_teacher_class_division_subject($employee_school_profile_id,$school_AY_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['education'] = 'education';

			$this->load->view('School/school_header', $admin);
			$this->load->view('Assignment/teacher_class_division_subject_assign',$TCDS_assign);
			$this->load->view('Assignment/assign_footer',$nav);
		}

		function class_wise_division_details()
		{
			$school_admin = $this->session->userdata('school');
			$subject['division_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$subject['class_id'] = $_POST['class_id'];
			$data = $this->Teacher_class_division_subject_assign_model->division_details_class($subject);
			echo json_encode($data);
		}

		function class_wise_subject_details()
		{
			$school_admin = $this->session->userdata('school');
			$subject['subject_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$subject['class_id'] = $_POST['class_id'];
			$data = $this->Teacher_class_division_subject_assign_model->subject_details_class($subject);
			echo json_encode($data);
		}


		function TCDS_registration()
		{
			$school_admin = $this->session->userdata('school');
			$TCDS_regis['TCDS_employee_profile_id'] = $this->input->post('TCDS_employee_profile_id');	
			$TCDS_regis['TCDS_class_id'] = $this->input->post('TCDS_class_id');	
			$TCDS_regis['TCDS_division_id'] = $this->input->post('TCDS_division_id');	
			$TCDS_regis['TCDS_subject_id'] = $this->input->post('TCDS_subject_id');	
			$TCDS_regis['TCDS_effective_date'] = date('Y-m-d');	
			$TCDS_regis['TCDS_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$cnt = count($TCDS_regis['TCDS_subject_id']);
			for ($i=0; $i < $cnt; $i++) { 
				$TCDS['TCDS_employee_profile_id'] = $TCDS_regis['TCDS_employee_profile_id'];
				$TCDS['TCDS_class_id'] = $TCDS_regis['TCDS_class_id'];
				$TCDS['TCDS_division_id'] = $TCDS_regis['TCDS_division_id'];
				$TCDS['TCDS_subject_id'] = $TCDS_regis['TCDS_subject_id'][$i];
				$TCDS['TCDS_effective_date'] = $TCDS_regis['TCDS_effective_date'];
				$TCDS['TCDS_school_profile_id'] = $TCDS_regis['TCDS_school_profile_id'];
				$TCDS['TCDS_AY_id'] = $school_admin[0]['school_AY_id'];
				
				$verify = $this->Teacher_class_division_subject_assign_model->verify($TCDS);
				if($verify != 0){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Already Assigned");
		            $this->session->set_flashdata('text',"Please Check Details");
		            $this->session->set_flashdata('type',"warning");
					redirect('Teacher_class_division_subject_assign');
				}
				else{
					$con = $this->Teacher_class_division_subject_assign_model->TCDS_registration($TCDS);
				}
			}
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Assigned Successfully.");
            $this->session->set_flashdata('text',"");
            $this->session->set_flashdata('type',"success");
			redirect('Teacher_class_division_subject_assign');	
		}

		function TCDS_remove()
		{
			$school_admin = $this->session->userdata('school');
			$TCDS['TCDS_id'] = $this->input->post('TCDS_id[]');
			$cnt = count($TCDS['TCDS_id']);
			for ($i=0; $i < $cnt; $i++) { 
				$TCDS_remove['TCDS_id'] = $TCDS['TCDS_id'][$i];
				$TCDS_remove['TCDS_expiry_date'] = date('Y-m-d');
				$this->Teacher_class_division_subject_assign_model->TCDS_remove($TCDS_remove);
			}
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Subject has been Removed successfully to Teacher");
            $this->session->set_flashdata('text',"");
            $this->session->set_flashdata('type',"success");
			redirect('Teacher_class_division_subject_assign');
		}
	}
 ?>