<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {
	
	public function index()
	{
		if(isset($this->session->userdata['super_admin']))
        {
            redirect('Admin');
        }elseif(isset($this->session->userdata['Institute']))
        {
            redirect('Institute');
        }elseif(isset($this->session->userdata['school']))
        {
            redirect('School');
        }
        
		$data['error'] = $this->session->flashdata('error');
		$data['success'] = $this->session->flashdata('success');
		$data['Disabled'] = $this->session->flashdata('Disabled');


		$this->load->view('Dashboard/login',$data);
	}

	public function logout()
	{
		$sessiondata['credential_username'] = '';
		$sessiondata['credential_password'] = '';

		$this->session->unset_userdata('super_admin',$sessiondata);
		$this->session->unset_userdata('Institute',$sessiondata);
		$this->session->unset_userdata('client',$sessiondata);
      
        $this->session->set_flashdata('success',"Logout Successfully..!!");
        
        redirect('/');
	}


	public function login()
	{

		$this->form_validation->set_rules('credential_username','trim|required');
		$this->form_validation->set_rules('credential_password','password','trim|required');

		if($this->form_validation->run() == FALSE){

			$this->session->set_flashdata('error','Please Enter Correct Details');
			redirect('Authentication');
		}
		else
		{

			$data['credential_username'] = $this->input->post('credential_username');
			$data['credential_password'] = md5($this->input->post('credential_password'));
			
			
			$log_check = $this->Authentication_model->login($data);
			if($log_check == 1){
				$this->session->set_flashdata('error',"User does Not Exists");
				redirect('Authentication');
			}elseif ($log_check == 2) {
				$this->session->set_flashdata('Disabled',"User is Disabled By Admin. Please Contact us ..!");
				redirect('Authentication');
			}

		}

	}

	function direct_school_entry($employee_profile_id)
	{
		$this->session->set_userdata('direct_employee_id',$employee_profile_id);
		redirect('Authentication/direct_entry');
	}

	function direct_entry()
	{
		$employee_profile_id = $this->session->userdata('direct_employee_id');
		$direct = 0;
		$employee = $this->db->query("SELECT * FROM employee join school on employee_school_profile_id=school_profile_id join credential on credential_profile_id = employee_profile_id join academic_year on AY_id = school_AY_id where employee_profile_id=".$employee_profile_id." and employee_expiry_date='9999-12-31'  and credential_user_type = 3")->result_array();
		foreach ($employee as $key => $value) { 
            if(empty($value)) {
                unset($employee[$key]);
            }
        }
        if (empty($employee)) {
        	$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Please contact to admin.");
            $this->session->set_flashdata('text',"Acadmic Year Not Assigned to School."); 
            $this->session->set_flashdata('type',"warning");
            redirect('School/view_school');
        }
        else{
			$this->session->set_userdata('school',$employee);
			$this->session->set_userdata('direct',$direct);
			redirect('School');
		}
		// print_r($employee);die();
	}

	function direct_logout()
	{
		$this->session->unset_userdata('school');
		$this->session->unset_userdata('direct');
		// $this->session->unset_userdata('school_principle',$sessiondata);
		// $this->session->unset_userdata('teaching_staff',$sessiondata);
		// $this->session->unset_userdata('non_teaching_staff',$sessiondata);
		// $this->session->unset_userdata('driver',$sessiondata);
		// $this->session->unset_userdata('student',$sessiondata);
		// $this->session->unset_userdata('corporate_admin',$sessiondata);
      
        $this->session->set_flashdata('success',"Logout Successfully..!!");
        
        redirect('School/view_school');
	}
}
