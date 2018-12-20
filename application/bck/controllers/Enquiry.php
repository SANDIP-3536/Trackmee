<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry extends CI_Controller {

	public function enquiry_form_LBD()
	{
		$data['flash']['active'] = $this->session->flashdata('active');
        $data['flash']['title'] = $this->session->flashdata('title');
        $data['flash']['text'] = $this->session->flashdata('text');
        $data['flash']['type'] = $this->session->flashdata('type');

        $data['logo'] = $this->Enquiry_model->LBD_logo();
        $data['LBD_pre_primary_school_enquiry_id'] = $this->Enquiry_model->LBD_pre_primary_school_enquiry_id();
        $data['LBD_primary_school_enquiry_id'] = $this->Enquiry_model->LBD_primary_school_enquiry_id();
        // $year = explode('-',date('Y-m-d'));
        // $enquiry_count = $this->db->where('enquiry_school_profile_id','4')->get('enquiry')->num_rows();
        // $form_no = $enquiry_count+1;
        // $enquiry_form_no = array($year[0],$form_no);
        // $data['enquiry_form_no'] = implode($enquiry_form_no);

		$this->load->view('Enquiry/enquiry_form_LBD',$data);
		
	}

	function LBD_admission_class_year()
	{
		$class_id = $_POST['class_id'];
		if($class_id == 'Nursery' || $class_id == 'Junior_kg' || $class_id == 'Senior_kg'){
			$data = $this->db->query('SELECT AY_id,AY_name FROM school join academic_year on school_future_AY_id = AY_id where school_profile_id = 4')->result_array();
		}else{
			$data = $this->db->query('SELECT * FROM school join academic_year on school_future_AY_id = AY_id where school_profile_id = 5')->result_array();
		}
		echo json_encode($class_id);
	}


	function view_enquiry()
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
		$enquiry['flash']['active'] = $this->session->flashdata('active');
    	$enquiry['flash']['title'] = $this->session->flashdata('title');
    	$enquiry['flash']['text'] = $this->session->flashdata('text');
    	$enquiry['flash']['type'] = $this->session->flashdata('type');

		$school_admin = $this->session->userdata('school');
		// print_r($school_admin);die();
		$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
		$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
		$admin['photo'] = $school_admin[0]['employee_photo'];
		$admin['first_name'] = $school_admin[0]['employee_first_name'];
		$admin['last_name'] = $school_admin[0]['employee_last_name'];
		$admin['email_id'] = $school_admin[0]['employee_email_id'];
		$admin['username'] = $school_admin[0]['credential_username'];
		$admin['AY_name'] = $school_admin[0]['AY_name'];
		$admin['school_future_AY_id'] = $school_admin[0]['school_future_AY_id'];
		$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
		$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
		$admin['functionality'] = $this->School_model->fetch_functionality($school);
		$enquiry['acadmic_year'] = $this->db->query("select academic_year.* from academic_year join institute on institute_profile_id = AY_institute_profile_id join school on school_institute_profile_id = AY_institute_profile_id where school_profile_id =".$employee_school_profile_id." and AY_expiry_date = '9999-12-31'")->result_array();
		$nav['school_name'] = $school_admin[0]['school_name'];
		$nav['school_logo'] = $school_admin[0]['school_logo'];
		$nav['education'] = 'education';
		
		$enquiry['all_enquiry'] = $this->Enquiry_model->fetch_all_enquiry($employee_school_profile_id);
		$enquiry['enquiry_form'] = $this->Enquiry_model->fetch_enquiry_form($employee_school_profile_id);
		$enquiry['appoinment_enquiry'] = $this->Enquiry_model->fetch_appoinment_enquiry($employee_school_profile_id);
		$enquiry['meeting_enquiry'] = $this->Enquiry_model->fetch_meeting_enquiry($employee_school_profile_id);
		$enquiry['pending_enquiry'] = $this->Enquiry_model->fetch_pending_enquiry($employee_school_profile_id);
		$enquiry['admitted_enquiry'] = $this->Enquiry_model->fetch_admitted_enquiry($employee_school_profile_id);
		$enquiry['rejected_enquiry'] = $this->Enquiry_model->fetch_rejected_enquiry($employee_school_profile_id);
		$enquiry['count_all_enquiry'] = $this->Enquiry_model->fetch_all_enquiry_count($employee_school_profile_id);
		$enquiry['count_enquiry_form'] = $this->Enquiry_model->fetch_enquiry_form_count($employee_school_profile_id);
		$enquiry['count_appoinment_enquiry'] = $this->Enquiry_model->fetch_appoinment_enquiry_count($employee_school_profile_id);
		$enquiry['count_meeting_enquiry'] = $this->Enquiry_model->fetch_meeting_enquiry_count($employee_school_profile_id);
		$enquiry['count_pending_enquiry'] = $this->Enquiry_model->fetch_pending_enquiry_count($employee_school_profile_id);
		$enquiry['count_admitted_enquiry'] = $this->Enquiry_model->fetch_admitted_enquiry_count($employee_school_profile_id);
		$enquiry['count_rejected_enquiry'] = $this->Enquiry_model->fetch_rejected_enquiry_count($employee_school_profile_id);
		$this->load->view('School/school_header', $admin);
		$this->load->view('Enquiry/view_enquiry',$enquiry);
		$this->load->view('Enquiry/enquiry_footer',$nav);	
	}

	function further_process($enquiry_id)
	{
		$this->session->set_userdata('enquiry',$enquiry_id);
		redirect('Enquiry/next_process');
	}

	function next_process(){
		$enquiry_id= $this->session->userdata('enquiry');
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
		$enquiry['flash']['active'] = $this->session->flashdata('active');
    	$enquiry['flash']['title'] = $this->session->flashdata('title');
    	$enquiry['flash']['text'] = $this->session->flashdata('text');
    	$enquiry['flash']['type'] = $this->session->flashdata('type');

		$school_admin = $this->session->userdata('school');
		$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
		$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
		$admin['photo'] = $school_admin[0]['employee_photo'];
		$admin['first_name'] = $school_admin[0]['employee_first_name'];
		$admin['last_name'] = $school_admin[0]['employee_last_name'];
		$admin['email_id'] = $school_admin[0]['employee_email_id'];
		$admin['username'] = $school_admin[0]['credential_username'];
		$admin['AY_name'] = $school_admin[0]['AY_name'];
		$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
		$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
		$admin['functionality'] = $this->School_model->fetch_functionality($school);

		$nav['school_name'] = $school_admin[0]['school_name'];
		$nav['school_logo'] = $school_admin[0]['school_logo'];
		$nav['education'] = 'education';
		
		$enquiry['enquiry_process'] = $this->Enquiry_model->fetch_enquiry_process($employee_school_profile_id,$enquiry_id);
		$this->load->view('School/school_header', $admin);
		$this->load->view('Enquiry/further_process',$enquiry);
		$this->load->view('Enquiry/enquiry_footer',$nav);	
	}

	function appoinment_update()
	{
		$status['enquiry_appointment_date'] = $this->input->post('enquiry_appointment_date');
		$status['enquiry_status'] = "2";
		$status['enquiry_id'] = $this->input->post('enquiry_id');

		$cnt = $this->Enquiry_model->appoinment_update($status);
		if ($cnt == 1) {
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title','Appoinment Fix on.'.$status['enquiry_appointment_date'].'');
	        $this->session->set_flashdata('text',"Thank You..!!.");
	        $this->session->set_flashdata('type',"success");
	        redirect('Enquiry/view_enquiry');
		}
	}

	function meeting_review_update()
	{
		$status['enquiry_meeting_review'] = $this->input->post('enquiry_meeting_review');
		$status['enquiry_status'] = "3";
		$status['enquiry_id'] = $this->input->post('enquiry_id');

		$cnt = $this->Enquiry_model->appoinment_update($status);
		if ($cnt == 1) {
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title','Meeting Review Submitted.');
	        $this->session->set_flashdata('text',"Thank You..!!.");
	        $this->session->set_flashdata('type',"success");
	        redirect('Enquiry/view_enquiry');
		}
	}

	function pending_confirmation_update()
	{
		$status['enquiry_followup_msg'] = $this->input->post('enquiry_followup_msg');
		$status['enquiry_followup_date'] = $this->input->post('enquiry_followup_date');
		$status['enquiry_status'] = "4";
		$status['enquiry_id'] = $this->input->post('enquiry_id');

		$cnt = $this->Enquiry_model->appoinment_update($status);
		if ($cnt == 1) {
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title','Please Follow Up Date. '.$status['enquiry_followup_date'].' ');
	        $this->session->set_flashdata('text',"Thank You..!!.");
	        $this->session->set_flashdata('type',"success");
	        redirect('Enquiry/view_enquiry');
		}
	}

	function student_admitted($enquiry_id)
	{
		$this->session->set_userdata('enquiry',$enquiry_id);
		redirect('Student/student_registration');
	}

	function reject_update()
	{
		$status['enquiry_rejected_reason'] = $this->input->post('enquiry_rejected_reason');
		$status['enquiry_status'] = "6";
		$status['enquiry_id'] = $this->input->post('enquiry_id');

		$cnt = $this->Enquiry_model->appoinment_update($status);
		if ($cnt == 1) {
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title','Form has been Rejected Successfully.');
	        $this->session->set_flashdata('text',"Thank You..!!.");
	        $this->session->set_flashdata('type',"success");
	        redirect('Enquiry/view_enquiry');
		}
	}


	function add_LBD_enquiry()
	{
		$data['enquiry_student_first_name'] = ucfirst($this->input->post('student_first_name'));
		$data['enquiry_student_middle_name'] = ucfirst($this->input->post('student_middle_name'));
		$data['enquiry_student_last_name'] = ucfirst($this->input->post('student_last_name'));
		$data['enquiry_student_DOB'] = $this->input->post('student_DOB');
		$data['enquiry_student_gender'] = $this->input->post('student_gender');
		$data['enquiry_admission_class'] = $this->input->post('enquiry_admission_class');
		$data['enquiry_parent_first_name'] = ucfirst($this->input->post('father_first_name'));
		$data['enquiry_parent_middle_name'] = ucfirst($this->input->post('father_middle_name'));
		$data['enquiry_parent_last_name'] = ucfirst($this->input->post('father_last_name'));
		$data['enquiry_parent_occupation'] = $this->input->post('father_occupation');
		$data['enquiry_parent_mobile_number'] = $this->input->post('father_mobile_number');
		$data['enquiry_parent_email_id'] = $this->input->post('father_email_id');
		$data['enquiry_parent_place_of_work'] = $this->input->post('father_work_place');
		$data['enquiry_mother_first_name'] = ucfirst($this->input->post('mother_first_name'));
		$data['enquiry_mother_middle_name'] = ucfirst($this->input->post('mother_middle_name'));
		$data['enquiry_mother_last_name'] = ucfirst($this->input->post('mother_last_name'));
		$data['enquiry_mother_occupation'] = $this->input->post('mother_occupation');
		$data['enquiry_mother_place_of_work'] = $this->input->post('mother_work_place');
		$data['enquiry_mother_mobile_number'] = $this->input->post('mother_mobile_number');
		$data['enquiry_mother_email_id'] = $this->input->post('mother_email_id');
		// $data['enquiry_residential_address'] = $this->input->post('parent_address');
		$data['enquiry_house_no'] = ($this->input->post('enquiry_house_no'));
		$data['enquiry_town'] = ucfirst($this->input->post('enquiry_town'));
		$data['enquiry_tal'] = ucfirst($this->input->post('enquiry_tal'));
		$data['enquiry_dist'] = ucfirst($this->input->post('enquiry_dist'));
		$data['enquiry_state'] = ucfirst($this->input->post('enquiry_state'));
		$data['enquiry_pincode'] = $this->input->post('enquiry_pincode');
		$data['enquiry_phone_number'] = $this->input->post('phone_number');
		// $data['enquiry_form_no'] = $this->input->post('enquiry_form_no');
		$data['student_privious_school_name'] = $this->input->post('student_privious_school_name');
		$data['student_privious_school_duration'] = $this->input->post('student_privious_school_duration');
		$data['student_last_attend_class'] = $this->input->post('student_last_attend_class');
		$data['student_privious_school_left_reason'] = $this->input->post('student_privious_school_left_reason');
		$data['enquiry_expectations'] = $this->input->post('expectation');
		$data['enquiry_effective_date'] = $this->input->post('enquiry_date');
		if($data['enquiry_admission_class'] == 'Nursery' || $data['enquiry_admission_class'] == 'Junior_kg' || $data['enquiry_admission_class'] == 'Senior_kg'){
			$data['enquiry_school_profile_id'] = 4;
			$year = explode('-',date('Y-m-d'));
	        $enquiry_count = $this->db->where('enquiry_school_profile_id','4')->get('enquiry')->num_rows();
	        $form_no = $enquiry_count+1;
	        $enquiry_form_no = array(4,$year[0],$form_no);
	        $data['enquiry_form_no'] = implode($enquiry_form_no);
		}else{
			$data['enquiry_school_profile_id'] = 5;
			$year = explode('-',date('Y-m-d'));
	        $enquiry_count = $this->db->where('enquiry_school_profile_id','5')->get('enquiry')->num_rows();
	        $form_no = $enquiry_count+1;
	        $enquiry_form_no = array(5,$year[0],$form_no);
	        $data['enquiry_form_no'] = implode($enquiry_form_no);
		}

		// print_r($data);die();

		$this->Enquiry_model->add_enquiry($data);

		$this->session->set_flashdata('active',1);
        $this->session->set_flashdata('title','Form No.'.$data['enquiry_form_no'].'');
        $this->session->set_flashdata('text',"Thank You..!!. Please note down form no. for further process.");
        $this->session->set_flashdata('type',"success");

		$data1['flash']['active'] = $this->session->flashdata('active');
        $data1['flash']['title'] = $this->session->flashdata('title');
        $data1['flash']['text'] = $this->session->flashdata('text');
        $data1['flash']['type'] = $this->session->flashdata('type');

        redirect('Enquiry/enquiry_form_LBD');
		
	}

	function LBD_enquiry_status_details()
	{
		// print_r($this->input->post());
		$status['form_no'] = $this->input->post('form_no');
		$status['first_name'] = ucfirst($this->input->post('first_name'));
		$status['DOB'] = $this->input->post('DOB');
		$status['mobile_number'] = $this->input->post('mobile_number');
		$status['enquiry_school_profile_id'] = 4;
		$status['enquiry_school_profile_id_1'] = 5;
		if (!empty($status['form_no'])) {			
			$data['status'] = $this->Enquiry_model->LBD_form_no_wise_status($status);
			// print_r($data['status']);die();
		}
		else{
			$data['status'] = $this->Enquiry_model->LBD_other_wise_status($status);
		}
		$data['logo'] = $this->Enquiry_model->LBD_logo();

		$this->load->view('Enquiry/LBD_enquiry_status',$data);
		
	}

	public function enquiry_form_vidya()
	{
		$data['flash']['active'] = $this->session->flashdata('active');
        $data['flash']['title'] = $this->session->flashdata('title');
        $data['flash']['text'] = $this->session->flashdata('text');
        $data['flash']['type'] = $this->session->flashdata('type');

        $data['logo3'] = $this->Enquiry_model->vidya_logo();
        $data['vidya_pre_primary_school_enquiry_id'] = $this->Enquiry_model->vidya_pre_primary_school_enquiry_id();
        $data['vidya_primary_school_enquiry_id'] = $this->Enquiry_model->vidya_primary_school_enquiry_id();
        $year = explode('-',date('Y-m-d'));
        $enquiry_count = $this->db->where('enquiry_school_profile_id','2')->where('enquiry_school_profile_id','3')->get('enquiry')->num_rows();
        $form_no = $enquiry_count+1;
        $enquiry_form_no = array($year[0],$form_no);
        $data['enquiry_form_no'] = implode($enquiry_form_no);
        // print_r($data);die();

		$this->load->view('Enquiry/enquiry_form_vidya',$data);
		
	}
	
	function vidya_admission_class_year()
	{
		$class_id = $_POST['class_id'];
		if($class_id == 'Nursery' || $class_id == 'Junior_kg' || $class_id == 'Senior_kg' || $class_id == 'Play_Group'){
			$data = $this->db->query('SELECT * FROM school join academic_year on school_future_AY_id = AY_id where school_profile_id = 2')->result_array();
		}else{
			$data = $this->db->query('SELECT * FROM school join academic_year on school_future_AY_id = AY_id where school_profile_id = 3')->result_array();
		}
	}

	function add_enquiry_vidya()
	{
		$data['enquiry_student_first_name'] = ucfirst($this->input->post('student_first_name'));
		$data['enquiry_student_middle_name'] = ucfirst($this->input->post('student_middle_name'));
		$data['enquiry_student_last_name'] = ucfirst($this->input->post('student_last_name'));
		$data['enquiry_student_DOB'] = $this->input->post('student_DOB');
		$data['enquiry_student_gender'] = $this->input->post('student_gender');
		$data['enquiry_admission_class'] = $this->input->post('enquiry_admission_class');
		$data['enquiry_parent_first_name'] = ucfirst($this->input->post('father_first_name'));
		$data['enquiry_parent_middle_name'] = ucfirst($this->input->post('father_middle_name'));
		$data['enquiry_parent_last_name'] = ucfirst($this->input->post('father_last_name'));
		$data['enquiry_parent_occupation'] = $this->input->post('father_occupation');
		$data['enquiry_parent_mobile_number'] = $this->input->post('father_mobile_number');
		$data['enquiry_parent_email_id'] = $this->input->post('father_email_id');
		$data['enquiry_parent_place_of_work'] = $this->input->post('father_work_place');
		$data['enquiry_mother_first_name'] = ucfirst($this->input->post('mother_first_name'));
		$data['enquiry_mother_middle_name'] = ucfirst($this->input->post('mother_middle_name'));
		$data['enquiry_mother_last_name'] = ucfirst($this->input->post('mother_last_name'));
		$data['enquiry_mother_occupation'] = $this->input->post('mother_occupation');
		$data['enquiry_mother_place_of_work'] = $this->input->post('mother_work_place');
		$data['enquiry_mother_mobile_number'] = $this->input->post('mother_mobile_number');
		$data['enquiry_mother_email_id'] = $this->input->post('mother_email_id');
		$data['enquiry_residential_address'] = $this->input->post('parent_address');
		$data['enquiry_phone_number'] = $this->input->post('phone_number');
		// $data['enquiry_form_no'] = $this->input->post('enquiry_form_no');
		$data['student_privious_school_name'] = $this->input->post('student_privious_school_name');
		$data['student_privious_school_duration'] = $this->input->post('student_privious_school_duration');
		$data['student_last_attend_class'] = $this->input->post('student_last_attend_class');
		$data['student_privious_school_left_reason'] = $this->input->post('student_privious_school_left_reason');
		$data['enquiry_expectations'] = $this->input->post('expectation');
		$data['enquiry_effective_date'] = $this->input->post('enquiry_date');
		if($data['enquiry_admission_class'] == 'Play_Group' || $data['enquiry_admission_class'] == 'Nursery' || $data['enquiry_admission_class'] == 'Junior_kg' || $data['enquiry_admission_class'] == 'Senior_kg'){
			$data['enquiry_school_profile_id'] = 2;
			$year = explode('-',date('Y-m-d'));
	        $enquiry_count = $this->db->where('enquiry_school_profile_id','4')->get('enquiry')->num_rows();
	        $form_no = $enquiry_count+1;
	        $enquiry_form_no = array(2,$year[0],$form_no);
	        $data['enquiry_form_no'] = implode($enquiry_form_no);
		}else{
			$data['enquiry_school_profile_id'] = 3;
			$year = explode('-',date('Y-m-d'));
	        $enquiry_count = $this->db->where('enquiry_school_profile_id','4')->get('enquiry')->num_rows();
	        $form_no = $enquiry_count+1;
	        $enquiry_form_no = array(3,$year[0],$form_no);
	        $data['enquiry_form_no'] = implode($enquiry_form_no);
		}
		// $data['enquiry_school_profile_id'] = $this->input->post('enquiry_school_profile_id');

		// print_r($data);die();

		$this->Enquiry_model->add_enquiry($data);

		$this->session->set_flashdata('active',1);
        $this->session->set_flashdata('title','Form No.'.$data['enquiry_form_no'].'');
        $this->session->set_flashdata('text',"Thank You..!!. Please note down form no. for further process.");
        $this->session->set_flashdata('type',"success");

		$data1['flash']['active'] = $this->session->flashdata('active');
        $data1['flash']['title'] = $this->session->flashdata('title');
        $data1['flash']['text'] = $this->session->flashdata('text');
        $data1['flash']['type'] = $this->session->flashdata('type');

        redirect('Enquiry/enquiry_form_vidya');
		
	}

	function vidya_enquiry_status_details()
	{
		// print_r($this->input->post());
		$status['form_no'] = $this->input->post('form_no');
		$status['first_name'] = ucfirst($this->input->post('first_name'));
		$status['DOB'] = $this->input->post('DOB');
		$status['mobile_number'] = $this->input->post('mobile_number');
		$status['enquiry_school_profile_id'] = 2;
		$status['enquiry_school_profile_id_1'] = 3;
		if (!empty($status['form_no'])) {			
			$data['status'] = $this->Enquiry_model->vidya_form_no_wise_status($status);
		}
		else{
			$data['status'] = $this->Enquiry_model->vidya_other_wise_status($status);
		}
		 $data['logo3'] = $this->Enquiry_model->vidya_logo();

		$this->load->view('Enquiry/vidya_enquiry_status',$data);
	}

	function enquiry_details_by_id()
	{
		$enquiry_id = $_POST['enquiry_id'];
		$data = $this->Enquiry_model->enquiry_details_by_id($enquiry_id);
		echo json_encode($data);
	}

	function enquiry_year()
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

		$school_admin = $this->session->userdata('school');
		$enquiry['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
		$enquiry['school_future_AY_id'] = $this->input->post('school_future_AY_id');
		$data = $this->Enquiry_model->update_enquiry_status($enquiry);
		if($data == 1){
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title','School enquiry Successfully Start.');
	        $this->session->set_flashdata('text',"");
	        $this->session->set_flashdata('type',"success");
	        redirect('Enquiry/view_enquiry');
	    }else{
	    	$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title','Please try again.');
	        $this->session->set_flashdata('text',"Contact us to system admin.");
	        $this->session->set_flashdata('type',"success");
	        redirect('Enquiry/view_enquiry');
	    }
	}

	function stop_enquiry()
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

		$school_admin = $this->session->userdata('school');
		$enquiry['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
		$enquiry['school_future_AY_id'] = 0;
		$data = $this->Enquiry_model->update_enquiry_status($enquiry);
		if($data == 1){
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title','School enquiry Successfully Stop.');
	        $this->session->set_flashdata('text',"");
	        $this->session->set_flashdata('type',"success");
	        redirect('Enquiry/view_enquiry');
	    }else{
	    	$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title','Please try again.');
	        $this->session->set_flashdata('text',"Contact us to system admin.");
	        $this->session->set_flashdata('type',"success");
	        redirect('Enquiry/view_enquiry');
	    }
	}
}
