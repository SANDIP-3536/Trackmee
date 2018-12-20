<?php 

	/**
	* 
	*/
	class Teacher_subject_assign extends CI_Controller
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
			$TS_assign['flash']['active'] = $this->session->flashdata('active');
        	$TS_assign['flash']['title'] = $this->session->flashdata('title');
        	$TS_assign['flash']['text'] = $this->session->flashdata('text');
        	$TS_assign['flash']['type'] = $this->session->flashdata('type');
        	
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
			$TS_assign['school_class'] =  $this->Teacher_subject_assgn_model->fetch_school_class($employee_school_profile_id);
			$TS_assign['fetch_teacher'] =  $this->Teacher_subject_assgn_model->fetch_school_teacher($employee_school_profile_id);
			$TS_assign['teacher_subject'] =  $this->Teacher_subject_assgn_model->fetch_teacher_subject($employee_school_profile_id,$school_AY_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['education'] = 'education';

			$this->load->view('School/school_header', $admin);
			$this->load->view('Assignment/teacher_subject_assign',$TS_assign);
			$this->load->view('Assignment/assign_footer',$nav);
		}

		function subject_details_class()
		{
			$school_admin = $this->session->userdata('school');
			$subject['subject_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$subject['class_id'] = $_POST['class_id'];
			$data = $this->Teacher_subject_assgn_model->subject_details_class($subject);
			echo json_encode($data);
		}

		function TS_registration()
		{
			$school_admin = $this->session->userdata('school');
			$TS_regis['TS_employee_profile_id'] = $this->input->post('TS_employee_profile_id');		
			$TS_regis['TS_subject_id'] = $this->input->post('TS_subject_id');	
			$TS_regis['TS_effective_date'] = date('Y-m-d');	
			$TS_regis['TS_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			if (empty($TS_regis['TS_subject_id']) || empty($TS_regis['TS_employee_profile_id'])) {
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Please select teacher and subject.");
	            $this->session->set_flashdata('text',"Please Check Details");
	            $this->session->set_flashdata('type',"warning");
				redirect('Teacher_subject_assign');
			}else{
				$cnt = count($TS_regis['TS_subject_id']);
				for ($i=0; $i < $cnt; $i++) { 
					$TS['TS_employee_profile_id'] = $TS_regis['TS_employee_profile_id'];
					$TS['TS_subject_id'] = $TS_regis['TS_subject_id'][$i];
					$TS['TS_effective_date'] = $TS_regis['TS_effective_date'];
					$TS['TS_school_profile_id'] = $TS_regis['TS_school_profile_id'];
					$TS['TS_AY_id'] = $school_admin[0]['school_AY_id'];
					
					$verify = $this->Teacher_subject_assgn_model->verify($TS);
					if($verify != 0){
						$this->session->set_flashdata('active',1);
			            $this->session->set_flashdata('title',"Already Assigned");
			            $this->session->set_flashdata('text',"Please Check Details");
			            $this->session->set_flashdata('type',"warning");
						redirect('Teacher_subject_assign');
					}
					else{
						$con = $this->Teacher_subject_assgn_model->TS_registration($TS);
					}
				}
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Assigned Successfully.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Teacher_subject_assign');			
			}
		}

		function TS_remove()
		{
			$school_admin = $this->session->userdata('school');
			$TS['TS_id'] = $this->input->post('TS_id[]');
			$cnt = count($TS['TS_id']);
			for ($i=0; $i < $cnt; $i++) { 
				$TS_remove['TS_id'] = $TS['TS_id'][$i];
				$TS_remove['TS_expiry_date'] = date('Y-m-d');
				$this->Teacher_subject_assgn_model->TS_remove($TS_remove);
			}
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Subject has been Removed successfully to Teacher");
            $this->session->set_flashdata('text',"");
            $this->session->set_flashdata('type',"success");
			redirect('Teacher_subject_assign');
		}
	}
 ?>