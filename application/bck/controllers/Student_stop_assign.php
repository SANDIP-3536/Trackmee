<?php 

	defined('BASEPATH') OR exit('No direct Script access Allowed');


	/**
	* 
	*/
	class Student_stop_assign extends CI_Controller
	{
		function student_stop_assignment()
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
			$SS_assign['flash']['active'] = $this->session->flashdata('active');
        	$SS_assign['flash']['title'] = $this->session->flashdata('title');
        	$SS_assign['flash']['text'] = $this->session->flashdata('text');
        	$SS_assign['flash']['type'] = $this->session->flashdata('type');
        	
			$school_admin = $this->session->userdata('school');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];

			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['transport'] = 'transport';
			$SS_assign['route'] =  $this->Student_stop_assign_model->fetch_route($employee_school_profile_id); 
			$SS_assign['student'] =  $this->Student_stop_assign_model->fetch_student($employee_school_profile_id);
			$SS_assign['student_stop'] =  $this->Student_stop_assign_model->fetch_student_stop($employee_school_profile_id);
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);

			$SS_assign['student_stop_assigned'] =  $this->Student_stop_assign_model->fetch_student_stop_assigned($employee_school_profile_id);

			$this->load->view('School/school_header', $admin);
			$this->load->view('Assignment/student_stop_assign',$SS_assign);
			$this->load->view('Assignment/assign_footer',$nav);
		}

		function stop_details_route()
		{
			$data1['route_id'] = $_POST['route_id'];	
			$data1['route_type'] = $_POST['route_type'];
			$data = $this->Student_stop_assign_model->stop_details($data1);
			echo json_encode($data);
		}

		function add_student_stop1()
		{
			$school_admin = $this->session->userdata('school');

			$stop_name['stop_name'] = $this->input->post('stop_name');
			$stop_id = $this->Student_stop_assign_model->fetch_stop_id($stop_name);
			$stop_id_1 = $stop_id[0]['stop_id'];
			$stop_id_2 = $stop_id[1]['stop_id'];
			if($stop_id_1 == 'null' || $stop_id_2 == 'null'){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Student Stop not Assign...");
	            $this->session->set_flashdata('text',"Please Select Route Stop");
	            $this->session->set_flashdata('type',"warning");
				redirect('Student_stop_assign/student_stop_assignment');
			}
			else{
			$data['SS_student_profile_id'] = $this->input->post('SS_student_profile_id[]');

			for ($i=0; $i <count($data['SS_student_profile_id']) ; $i++) {
					$SS_assign['SS_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
					$SS_assign['SS_effective_date'] = date('Y-m-d');
					$SS_assign['SS_type_1_stop_id'] = $stop_id_1;
					$SS_assign['SS_type_2_stop_id'] = $stop_id_2;
					$SS_assign['SS_student_profile_id'] = $data['SS_student_profile_id'][$i];
					$this->Student_stop_assign_model->add_student_stop($SS_assign);		
				}
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Stop has been assigned successfully to Student");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Student_stop_assign/student_stop_assignment');
			}	
		}

		function deactivate_student_stop(){
			$SS_student_profile_id = $this->input->post('SS_student_profile_id[]');
			$cnt = count($SS_student_profile_id);
			for ($i=0; $i <$cnt ; $i++) { 
				$this->db->query('delete from student_stop_assgn where SS_student_profile_id ='.$SS_student_profile_id[$i].'');
			}

			redirect('Student_stop_assign/student_stop_assignment');
		}
	}
 ?>