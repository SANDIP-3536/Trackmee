<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class School extends CI_Controller
	{

		function index()
		{
			if(!isset($this->session->userdata['school']))
			{
				redirect('/');
			} 
			if(isset($this->session->userdata['direct'])){
				$school['direct'] = $this->session->userdata('direct');
				// print($school['direct']);die();
			}
			else{
				$school['direct'] = 1;
			}
			$school_admin = $this->session->userdata('school');
			$school['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$school['photo'] = $school_admin[0]['employee_photo'];
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$school_AY_id = $school_admin[0]['school_AY_id'];
			$school['first_name'] = $school_admin[0]['employee_first_name'];
			$school['last_name'] = $school_admin[0]['employee_last_name'];
			$school['email_id'] = $school_admin[0]['employee_email_id'];
			$school['username'] = $school_admin[0]['credential_username'];
			$school['AY_name'] = $school_admin[0]['AY_name'];
			$date = date('Y-m-d');
			$school['functionality'] = $this->School_model->fetch_functionality($school);
			$school['total_student'] = $this->db->where('student_school_profile_id',$employee_school_profile_id)->where('student_expiry_date','9999-12-31')->get('student')->num_rows();
			$school['total_travel_bus'] = $this->db->where('student_school_profile_id',$employee_school_profile_id)->where('student_expiry_date','9999-12-31')->where('student_tracking','1')->get('student')->num_rows();
			$school['total_teacher'] = $this->db->where('employee_school_profile_id',$employee_school_profile_id)->where('employee_expiry_date','9999-12-31')->where('employee_type','5')->get('employee')->num_rows();
			$school['total_driver'] = $this->db->where('employee_school_profile_id',$employee_school_profile_id)->where('employee_expiry_date','9999-12-31')->where('employee_type','6')->get('employee')->num_rows();
			$school['total_employee'] = $this->db->query("SELECT * FROM `employee` where employee_expiry_date = '9999-12-31' and employee_school_profile_id =".$employee_school_profile_id." and employee_type not in(1,2,3)")->num_rows();
			$school['total_bus'] = $this->db->where('bus_school_profile_id',$employee_school_profile_id)->where('bus_expiry_date','9999-12-31')->get('bus')->num_rows();
			$school['total_route'] = $this->db->query("SELECT * FROM `route` where route_school_profile_id =".$employee_school_profile_id." and route_expiry_date='9999-12-31' group by route_no")->num_rows();
			$school['student_birthday'] = $this->db->query("SELECT * FROM student WHERE DATE_FORMAT(student_DOB, '%m-%d') = DATE_FORMAT('".$date."', '%m-%d') and student_school_profile_id=".$employee_school_profile_id."")->num_rows();
			$school['employee_birthday'] = $this->db->query("SELECT * FROM employee WHERE DATE_FORMAT(employee_DOB, '%m-%d') = DATE_FORMAT('".$date."', '%m-%d') and employee_school_profile_id=".$employee_school_profile_id." and employee_type not in(1,2,3)")->num_rows();
			$school['student_birthday_list'] = $this->db->query("SELECT * FROM student WHERE DATE_FORMAT(student_DOB, '%m-%d') = DATE_FORMAT('".$date."', '%m-%d') and student_school_profile_id=".$employee_school_profile_id."")->result_array();
			$school['employee_birthday_list'] = $this->db->query("SELECT * FROM employee WHERE DATE_FORMAT(employee_DOB, '%m-%d') = DATE_FORMAT('".$date."', '%m-%d') and employee_school_profile_id=".$employee_school_profile_id." and employee_type not in(1,2,3)")->result_array();
			// $school['present_student'] = $this->db->query("")->num_rows();


			$school['flash']['active'] = $this->session->flashdata('active');
	    	$school['flash']['title'] = $this->session->flashdata('title');
	    	$school['flash']['text'] = $this->session->flashdata('text');
	    	$school['flash']['type'] = $this->session->flashdata('type');
	    	$school['school_name'] = $school_admin[0]['school_name'];
			$school['school_logo'] = $school_admin[0]['school_logo'];

	    	$school['dashboard'] = 'dashboard';
	    	$school['events'] = $this->db->where('holiday_school_profile_id',$employee_school_profile_id)->where('holiday_AY_id',$school_AY_id)->get('holiday')->result_array();
			$this->load->view('School/school_header', $school);
			$this->load->view('School/school_dashboard',$school);
		}

		function school_registration()
		{
			if(!isset($this->session->userdata['Institute']))
			{
				redirect('/');
			} 

			$institute_admin = $this->session->userdata('Institute');
			$admin['user'] = $institute_admin[0]['employee_pri_mobile_number'];
			$admin['photo'] = $institute_admin[0]['employee_photo'];
			$admin['first_name'] = $institute_admin[0]['employee_first_name'];
			$admin['last_name'] = $institute_admin[0]['employee_last_name'];
			$admin['email_id'] = $institute_admin[0]['employee_email_id'];
			$admin['username'] = $institute_admin[0]['credential_username'];
			$nav['institute_name'] = $institute_admin[0]['institute_name'];
			$nav['institute_logo'] = $institute_admin[0]['institute_logo'];
			$school_institute_profile_id = $institute_admin[0]['employee_school_profile_id'];
			$school_details['acadmic_year'] = $this->db->query("SELECT * FROM `academic_year` where AY_institute_profile_id =".$school_institute_profile_id." and AY_expiry_date = '9999-12-31' group by AY_name")->result_array();
			$school_details['tracking'] = $institute_admin[0]['institute_tracking'];
			$school_details['CRM'] = $institute_admin[0]['institute_CRM'];
			$nav['insti_admin'] = "school";
			$this->load->view('Institute/institute_header', $admin);
			$this->load->view('School/school_registration',$school_details);
			$this->load->view('School/school_footer',$nav);
		}

		function view_school()
		{	

			if(!isset($this->session->userdata['Institute']))
			{
				redirect('/');
			} 
			$institute_admin = $this->session->userdata('Institute');
			$admin['user'] = $institute_admin[0]['employee_pri_mobile_number'];
			$admin['photo'] = $institute_admin[0]['employee_photo'];
			$school_institute_profile_id = $institute_admin[0]['employee_school_profile_id'];
			$admin['first_name'] = $institute_admin[0]['employee_first_name'];
			$admin['last_name'] = $institute_admin[0]['employee_last_name'];
			$admin['email_id'] = $institute_admin[0]['employee_email_id'];
			$admin['username'] = $institute_admin[0]['credential_username'];

			$school_details['flash']['active'] = $this->session->flashdata('active');
	    	$school_details['flash']['title'] = $this->session->flashdata('title');
	    	$school_details['flash']['text'] = $this->session->flashdata('text');
	    	$school_details['flash']['type'] = $this->session->flashdata('type');
			
			$school_details['school'] = $this->School_model->fetch_school($school_institute_profile_id);
			$school_details['all_school'] = $this->db->query("SELECT * from school where school_institute_profile_id=".$school_institute_profile_id."")->result_array();
			$school_details['all_employee'] = $this->db->query("SELECT employee.* FROM `employee` join school on employee_school_profile_id = school_profile_id join institute on school_institute_profile_id = institute_profile_id where employee_school_profile_id =".$school_institute_profile_id." and employee_type IN(3,4)")->result_array();
			$nav['institute_name'] = $institute_admin[0]['institute_name'];
			$nav['institute_logo'] = $institute_admin[0]['institute_logo'];
			$nav['insti_admin'] = "school";

			$this->load->view('Institute/institute_header',$admin);
			$this->load->view('School/view_school',$school_details);
			$this->load->view('School/school_footer',$nav);
		}

		function add_school_registration()
		{
			$institute_admin = $this->session->userdata('Institute');
			$school_registration['school_name'] = $this->input->post('school_name');
			$school_registration['school_address'] = $this->input->post('school_address');
			$school_registration['school_latitude'] = $this->input->post('school_latitude');
			$school_registration['school_longitude'] = $this->input->post('school_longitude');
			$school_registration['school_mobile_number'] = $this->input->post('school_mobile_number');
			$school_registration['school_phone_number'] = $this->input->post('school_phone_number');
			$school_registration['school_email_id'] = $this->input->post('school_email_id');
			$school_registration['school_AY_id'] = $this->input->post('school_AY_id');
			$tracking = $this->input->post('school_tracking');
			if($tracking == 'on'){
				$school_registration['school_tracking'] = "1";
			}else{
				$school_registration['school_tracking'] = "0";
			}
			$CRM = $this->input->post('school_CRM');
			if($CRM == 'on'){
				$school_registration['school_CRM'] = "1";
			}else{
				$school_registration['school_CRM'] = "0";
			}
			$stop_sms = $this->input->post('school_stop_sms');
			if($stop_sms == 'on'){
				$school_registration['school_stop_sms'] = "1";
			}else{
				$school_registration['school_stop_sms'] = "0";
			}
			$school_sms = $this->input->post('school_school_sms');
			if($school_sms == 'on'){
				$school_registration['school_school_sms'] = "1";
			}else{
				$school_registration['school_school_sms'] = "0";
			}
			$absent = $this->input->post('school_student_absent_sms');
			if($absent == 'on'){
				$school_registration['school_student_absent_sms'] = "1";
			}else{
				$school_registration['school_student_absent_sms'] = "0";
			}
			$birth = $this->input->post('school_student_birth_sms');
			if($birth == 'on'){
				$school_registration['school_student_birth_sms'] = "1";
			}else{
				$school_registration['school_student_birth_sms'] = "0";
			}
			$salary = $this->input->post('school_employee_salary_sms');
			if($salary == 'on'){
				$school_registration['school_employee_salary_sms'] = "1";
			}else{
				$school_registration['school_employee_salary_sms'] = "0";
			}
			$fee_remainder = $this->input->post('school_student_fee_remainder_sms');
			if($fee_remainder == 'on'){
				$school_registration['school_student_fee_remainder_sms'] = "1";
			}else{
				$school_registration['school_student_fee_remainder_sms'] = "0";
			}
			$authentiction_details = $this->input->post('school_authentication_details_sms');
			if($authentiction_details == 'on'){
				$school_registration['school_authentication_details_sms'] = "1";
			}else{
				$school_registration['school_authentication_details_sms'] = "0";
			}
			$school_registration['school_effective_date'] = date('Y-m-d');
			$school_registration['school_update_date'] = date('Y-m-d');
			$verify = $this->db->query("select * from school where school_name = '".$school_registration['school_name']."' and school_phone_number = ".$school_registration['school_phone_number']." or school_email_id ='".$school_registration['school_email_id']."' and school_expiry_date = '9999-12-31'")->num_rows();
			// print_r($verify);die();
			if ($verify != 0) {
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"School Already Registered.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"warning");
				redirect('School/view_school');
			}else{
				$school_registration['school_institute_profile_id'] = $institute_admin[0]['employee_school_profile_id'];
				$school_registration['school_logo'] = $this->upload('school_logo', 'profile_photo');
				// print_r($school_registration);die();
				$school_profile_id = $this->School_model->add_school_registration($school_registration);
				if($school_profile_id == 0){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"School Added Successfully.");
		            $this->session->set_flashdata('text',""); 
		            $this->session->set_flashdata('type',"success");
					redirect('School/view_school');
				}
				else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Error...");
		            $this->session->set_flashdata('text',"Not Added...");
		            $this->session->set_flashdata('type',"warning");
					redirect('School/view_school');
		        }
		    }
		}

		function school_user_details($school_profile_id)
		{
			$this->session->set_userdata('school_data', $school_profile_id);
			redirect('School/school_user_detailss');
		}


		function school_user_detailss()
		{
			if(!isset($this->session->userdata['Institute']))
			{
				redirect('/');
			} 
			$school_details['flash']['active'] = $this->session->flashdata('active');
	    	$school_details['flash']['title'] = $this->session->flashdata('title');
	    	$school_details['flash']['text'] = $this->session->flashdata('text');
	    	$school_details['flash']['type'] = $this->session->flashdata('type');

			$institute_admin = $this->session->userdata('Institute');

			$admin['user'] = $institute_admin[0]['employee_pri_mobile_number'];
			$admin['photo'] = $institute_admin[0]['employee_photo'];
			$admin['institute_profile_id'] = $institute_admin[0]['employee_profile_id'];
			$admin['first_name'] = $institute_admin[0]['employee_first_name'];
			$admin['last_name'] = $institute_admin[0]['employee_last_name'];
			$admin['email_id'] = $institute_admin[0]['employee_email_id'];
			$admin['username'] = $institute_admin[0]['credential_username'];
			$school_profile_id = $this->session->userdata('school_data');
			
			$nav['institute_name'] = $institute_admin[0]['institute_name'];
			$nav['institute_logo'] = $institute_admin[0]['institute_logo'];
			$school_details['school'] = $this->School_model->school_details($school_profile_id);
			$school_details['school_user'] = $this->School_model->user_details($school_profile_id);
			$school_details['admin_count'] = count($school_details['school_user']);
			$school_details['school_principle'] = $this->School_model->principle_details($school_profile_id);
			$school_details['principle_count'] = count($school_details['school_principle']);
			// print_r($school_details['school_principle']);die();
			$nav['insti_admin'] = "school";
			$this->load->view('Institute/institute_header', $admin);
			$this->load->view('School/school_user_details', $school_details);
			$this->load->view('School/school_footer',$nav);
		}

		function update_school_details($school_profile_id)
		{
			$this->session->set_userdata('school_data1', $school_profile_id);
			redirect('School/update_school');
		}

		function update_school()
		{
			$institute_admin = $this->session->userdata('Institute');

			// $admin['user'] = $institute_admin[0]['credential_username'];
			$admin['photo'] = $institute_admin[0]['employee_photo'];
			$admin['institute_profile_id'] = $institute_admin[0]['employee_profile_id'];
			$admin['first_name'] = $institute_admin[0]['employee_first_name'];
			$admin['last_name'] = $institute_admin[0]['employee_last_name'];
			$admin['email_id'] = $institute_admin[0]['employee_email_id'];
			$admin['username'] = $institute_admin[0]['credential_username'];
			$id = $this->session->userdata('school_data1');
			$data['schooll'] = $this->School_model->fetch_school_id($id);
			$nav['institute_name'] = $institute_admin[0]['institute_name'];
			$nav['institute_logo'] = $institute_admin[0]['institute_logo'];
			$nav['insti_admin'] = "school";
			// print_r($data);die();
			$this->load->view('Institute/institute_header',$admin);
			$this->load->view('School/update_school_details', $data);
			$this->load->view('School/school_footer',$nav);
		}

		function school_deactive($school_profile_id)
		{
			$this->session->set_userdata('school_deactive',$school_profile_id);
			redirect('School/school_disable');
		}

		function school_disable(){
			$data['school_profile_id'] = $this->session->userdata('school_deactive');
			$data['school_expiry_date'] = date('Y-m-d');
			$con = $this->School_model->school_disable($data);
			if($con == 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"School Deactivated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");	
				redirect('School/school_user_detailss');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Not Added...");
	            $this->session->set_flashdata('type',"warning");	
				redirect('School/school_user_detailss');
			}
		}

		function school_active($school_profile_id)
		{
			$this->session->set_userdata('school_active',$school_profile_id);
			redirect('School/school_enable');
		}

		function school_enable(){
			$data['school_profile_id'] = $this->session->userdata('school_active');
			$data['school_expiry_date'] = '9999-12-31';
			$con = $this->School_model->school_enable($data);
			if($con == 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"School Activated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");	
				redirect('School/school_user_detailss');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Not Added...");
	            $this->session->set_flashdata('type',"warning");	
				redirect('School/school_user_detailss');
			}
		}
		
		function add_school_user()
		{
			$institute_admin = $this->session->userdata('Institute');
			$admin['school_name'] = $this->input->post('school_name');
			$num['profile'] =$this->input->post('school_profile_id');
			$num['mobile'] =$this->input->post('employee_pri_mobile_number');
			$mobile = $this->School_model->already_exits_mobile($num);
			$email['profile'] =$this->input->post('school_profile_id');
			$email['mail'] =  $this->input->post('employee_email_id');
			$email_id = $this->School_model->already_exits_email($email);

			if ($mobile != 0) {

				$this->session->set_flashdata('active',1);
		        $this->session->set_flashdata('title',"Mobile No Already Registered.");
		        $this->session->set_flashdata('text',"Please Fill again with another Mobile Number");
		        $this->session->set_flashdata('type',"warning");
				redirect('School/school_user_detailss');
			}
			elseif($email_id != 0){

				$this->session->set_flashdata('active',1);
		        $this->session->set_flashdata('title',"Email ID Already Registered.");
		        $this->session->set_flashdata('text',"Please Fill again with another Email ID."); 
		        $this->session->set_flashdata('type',"warning");
				redirect('School/school_user_detailss');
			}
			else{

				$school_employee['employee_type'] = $this->input->post('employee_type');
				$school_employee['employee_photo'] = $this->upload('employee_photo', 'profile_photo');
				$school_employee['employee_first_name'] = $this->input->post('employee_first_name');
				$school_employee['employee_middle_name'] = $this->input->post('employee_middle_name');
				$school_employee['employee_last_name'] = $this->input->post('employee_last_name');
				$school_employee['employee_address'] = $this->input->post('employee_address');
				$school_employee['employee_DOB'] = $this->input->post('employee_DOB');
				$school_employee['employee_gender'] = $this->input->post('employee_gender');
				$school_employee['employee_higher_education'] = $this->input->post('employee_higher_education');
				$school_employee['employee_experiance'] = $this->input->post('employee_experiance');
				$school_employee['employee_pri_mobile_number'] = $this->input->post('employee_pri_mobile_number');
				$school_employee['employee_email_id'] = $this->input->post('employee_email_id');
				$school_employee['employee_effective_date'] = date('Y-m-d');
				$school_employee['employee_school_profile_id'] = $this->input->post('school_profile_id');
				$school_details['school_name'] = $this->input->post('school_name');

				// school credential Details
				$school_credential['credential_user_type'] = $this->input->post('employee_type');
				$school_credential['credential_update_date'] = date('Y-m-d');

				$count = $this->db->get('employee')->num_rows();

				$cnt = $count+1;
				$user_type = 3;
				$admin_id = $this->input->post('school_profile_id');
				$mobile = $this->input->post('employee_pri_mobile_number');
				$mobile1 = $mobile[5];
				$mobile2 = $mobile[6];
				$mobile3 = $mobile[7];
				$mobile4 = $mobile[8];
				$mobile5 = $mobile[9];
				$username = array($user_type,$admin_id,$cnt,$mobile1,$mobile2,$mobile3,$mobile4,$mobile5);
				$school_credential['credential_username'] = implode($username);

				//random password generate using four character of name and Mobile

				$pas = str_split($this->input->post('employee_first_name'));
				$pass = $pas[0];
				$pass1 = $pas[1];
				$pas1 = str_split($this->input->post('employee_last_name'));
				$pas12 = $pas1[0];
				$pas13 = $pas1[1];
				$pas2 = str_split($this->input->post('employee_pri_mobile_number'));
				$pas21 = $pas2['0'];
				$pas22 = $pas2['1'];
				$pas23 = $pas2['2'];
				$pas24 = $pas2['3'];
				$pas25 = $pas2['4'];
				$pas26 = $pas2['5'];
				$arr1 = array($pas12,$pas24,$pas13,$pass1,$pas23,$pas21,$pas25,$pas26,$pas22,$pass);
				$school_credential1['credential_password1'] = implode($arr1);
				$school_credential['credential_password'] = md5(implode($arr1)); 

				$message = "Hi,\nYour profile has been created with TrackMee.\nYour Credential are as follows:\nUsername :".$school_credential['credential_username']."\nPassword :".$school_credential1['credential_password1']."\nRegards,\nTeam TrackMee.";
				$no = $school_employee['employee_pri_mobile_number'];
			

				$config['protocol'] = $this->config->item('protocol');
				$config['smtp_host'] = $this->config->item('smtp_host');
				$config['smtp_port'] = $this->config->item('smtp_port');
				$config['smtp_timeout'] = $this->config->item('smtp_timeout');
				$config['smtp_user'] = $this->config->item('smtp_user');
				$config['smtp_pass'] = $this->config->item('smtp_pass');
				$config['charset'] = $this->config->item('charset');
				$config['newline'] = $this->config->item('newline');
				$config['mailtype'] = $this->config->item('mailtype');
				$config['validation'] = $this->config->item('validation');

				$this->email->initialize($config);
				$this->email->from('no-reply@trackmee.syntech.co.in',''.$school_details['school_name'].'');			// $this->email->from($email,$name);
				$this->email->to(''.$school_employee['employee_email_id'].'');
				$this->email->subject('Welcome To '.$school_details['school_name'].' Authencation Details');
				$this->email->message("Hi,<br>Your profile has been created with ".$school_details['school_name'].". Your credentials are as follows:<br>  <p> Username: ".$school_credential['credential_username']."<br> <p>  Password: ".$school_credential1['credential_password1']."<br><br>   Regards,<br> Team TrackMee");

				if($this->email->send()){
					if($this->Institute_model->sms($no,$message)){
						$this->session->set_flashdata('active',1);
			            $this->session->set_flashdata('title',"User Added Successfully.");
			            $this->session->set_flashdata('text',"Employee credentials are send On his Email ID and Mobile Number."); 
			            $this->session->set_flashdata('type',"success");

			            $employee_profile_id = $this->School_model->add_school_user($school_employee);

						$school_credential['credential_profile_id'] = $employee_profile_id[0]['employee_profile_id'];
						$this->School_model->school_user_credential($school_credential);
						redirect('School/school_user_detailss');
					}
					else{
						$this->session->set_flashdata('active',1);
			            $this->session->set_flashdata('title',"SMS Not Send");
			            $this->session->set_flashdata('text',"In Sending Authentication Details..Please Try ahain");
			            $this->session->set_flashdata('type',"warning");
						redirect('School/school_user_detailss');	
					}
				}
				else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Error...");
		            $this->session->set_flashdata('text',"Not Added...");
		            $this->session->set_flashdata('type',"warning");
					redirect('School/school_user_detailss');
				}
			}
		}

		function update_school_user($employee_profile_id)
		{
			$this->session->set_userdata('employee_profile_id', $employee_profile_id);
			redirect('School/update_user');
		}

		function update_user()	
		{
			$update_school_user['flash']['active'] = $this->session->flashdata('active');
	    	$update_school_user['flash']['title'] = $this->session->flashdata('title');
	    	$update_school_user['flash']['text'] = $this->session->flashdata('text');
	    	$update_school_user['flash']['type'] = $this->session->flashdata('type');

			$employee_profile_id = $this->session->userdata('employee_profile_id');
			$institute_admin = $this->session->userdata('Institute');
			$admin['user'] = $institute_admin['employee_pri_mobile_number'];
			$admin['photo'] = $institute_admin['employee_photo'];
			$admin['first_name'] = $institute_admin[0]['employee_first_name'];
			$admin['last_name'] = $institute_admin[0]['employee_last_name'];
			$admin['email_id'] = $institute_admin[0]['employee_email_id'];
			$admin['username'] = $institute_admin[0]['credential_username'];
			$update_school_user['school_user'] = $this->School_model->user_fetch($employee_profile_id);
			$nav['institute_name'] = $institute_admin[0]['institute_name'];
			$nav['institute_logo'] = $institute_admin[0]['institute_logo'];
			$nav['insti_admin'] = "school";
			$this->load->view('Institute/institute_header',$admin);
			$this->load->view('School/update_school_user', $update_school_user);
			$this->load->view('School/school_footer',$nav);
		}

		function disable_school_user($employee_profile_id)
		{
			$this->session->set_userdata('user_disable', $employee_profile_id);
			redirect('School/disable_user_school');			
		}

		function disable_user_school()
		{
			$disable_employee['employee_profile_id'] = $this->session->userdata('user_disable');
			$disable_employee['employee_expiry_date'] = date('Y-m-d');
			$con = $this->School_model->school_user_disable($disable_employee);
			if($con == 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"User Deactivated.");
	            $this->session->set_flashdata('text',"Institute User Deactivated"); 
	            $this->session->set_flashdata('type',"success");	
				redirect('School/school_user_detailss');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Not Added...");
	            $this->session->set_flashdata('type',"warning");	
				redirect('School/school_user_detailss');
			}
		}

		function enable_school_user($employee_profile_id)
		{
			$this->session->set_userdata('user_enable', $employee_profile_id);
			redirect('School/enable_user_school');			
		}

		function enable_user_school()
		{
			$enable_employee['employee_profile_id'] = $this->session->userdata('user_enable');
			$enable_employee['employee_expiry_date'] = '9999-12-31';
			$con = $this->School_model->school_user_enable($enable_employee);
			if($con == 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"User Activated.");
	            $this->session->set_flashdata('text',"Institute User Activated"); 
	            $this->session->set_flashdata('type',"success");	
				redirect('School/school_user_detailss');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Not Added...");
	            $this->session->set_flashdata('type',"warning");	
				redirect('School/school_user_detailss');
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
				$user_photo = base_url().'profile_photo/default_employee_image.png';
				return $user_photo;
			}
			else{
				$upload_files = array('upload_data' => $this->upload->data());

				$school_photo = base_url().'profile_photo/'.$upload_files['upload_data']['file_name'];
				$this->upload->data();

				return $school_photo;
			}
		}
		
		// function upload($file,$folder)						
		// {
		// 	$config = array(
		// 		'upload_path' => 'profile_photo/',
		// 		'upload_url' => base_url().'profile_photo/',
		// 		'allowed_types' => 'jpg|jpeg|gif|png',
		// 		);
		// 	$this->upload->initialize($config);
		// 	if(!$this->upload->do_upload($file)){
		// 		$upload_files = array('upload_data' => '');
		// 		echo $this->upload->display_errors('<p style="color:#FF0000;">','</p>');die();
		// 	}
		// 	else{
		// 		$upload_files = array('upload_data' => $this->upload->data());
		// 	}

		// 	$school_photo = base_url().'profile_photo/'.$upload_files['upload_data']['file_name'];
		// 	$this->upload->data();

		// 	return $school_photo;
		// }


		function school_user()
		{
			$data2 = $this->session->userdata('institute');

			$data1['user'] = $data2['credential_username'];
			$data1['photo'] = $data2['user_photo'];
			$data1['institute_profile_id'] = $data2['user_profile_id'];
			$data['school'] = $this->session->userdata('school_session');	
			$nav['institute_name'] = $institute_admin[0]['institute_name'];
			$nav['institute_logo'] = $institute_admin[0]['institute_logo'];
			$nav['insti_admin'] = "school";
			$this->load->view('Institute/institute_header', $data1);
			$this->load->view('School/school_user', $data);
			$this->load->view('School/school_footer',$nav);
		}

		function update_user_details()
		{
			$data['user_profile_id'] = $this->input->post('user_profile_id');
			$data['user_first_name'] = $this->input->post('user_first_name');
			$data['user_middle_name'] = $this->input->post('user_middle_name');
			$data['user_last_name'] = $this->input->post('user_last_name');
			$data['user_mobile_number'] = $this->input->post('user_mobile_number');
			$data['user_email_id'] = $this->input->post('user_email_id');
			$data['user_update_date'] = date('Y-m-d');
			$con = $this->School_model->update_user_details($data);
			if($con == 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Details Updated");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('School');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Not Added...");
	            $this->session->set_flashdata('type',"warning");
				redirect('School');
			}
		}	

		function update_details_school()
		{
			$school_update = $this->input->post();
			$tracking = $this->input->post('school_tracking');
			if($tracking == 'on'){
				$school_update['school_tracking'] = "1";
			}else{
				$school_update['school_tracking'] = "0";
			}
			$CRM = $this->input->post('school_CRM');
			if($CRM == 'on'){
				$school_update['school_CRM'] = "1";
			}else{
				$school_update['school_CRM'] = "0";
			}
			$stop_SMS = $this->input->post('school_stop_sms');
			if($stop_SMS == 'on'){
				$school_update['school_stop_sms'] = "1";
			}else{
				$school_update['school_stop_sms'] = "0";
			}
			$school_sms = $this->input->post('school_school_sms');
			if($school_sms == 'on'){
				$school_update['school_school_sms'] = "1";
			}else{
				$school_update['school_school_sms'] = "0";
			}
			$absent = $this->input->post('school_student_absent_sms');
			if($absent == 'on'){
				$school_update['school_student_absent_sms'] = "1";
			}else{
				$school_update['school_student_absent_sms'] = "0";
			}
			$birth = $this->input->post('school_student_birth_sms');
			if($birth == 'on'){
				$school_update['school_student_birth_sms'] = "1";
			}else{
				$school_update['school_student_birth_sms'] = "0";
			}
			$salary = $this->input->post('school_employee_salary_sms');
			if($salary == 'on'){
				$school_update['school_employee_salary_sms'] = "1";
			}else{
				$school_update['school_employee_salary_sms'] = "0";
			}
			$fee_remainder = $this->input->post('school_student_fee_remainder_sms');
			if($fee_remainder == 'on'){
				$school_update['school_student_fee_remainder_sms'] = "1";
			}else{
				$school_update['school_student_fee_remainder_sms'] = "0";
			}
			$authentiction_details = $this->input->post('school_authentication_details_sms');
			if($authentiction_details == 'on'){
				$school_update['school_authentication_details_sms'] = "1";
			}else{
				$school_update['school_authentication_details_sms'] = "0";
			}
			$school_update['school_update_date'] = date('Y-m-d');
			// print_r($school_update);die();
			$con = $this->School_model->update_details_school($school_update);
			if($con == 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"School Details Updated");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('School/view_school');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Not Added...");
	            $this->session->set_flashdata('type',"warning");
				redirect('School/view_school');
			}
		}

		function add_new_user1($school_profile_id)
		{
			$this->session->set_userdata('school_id', $school_profile_id);
			redirect('School/add_new_user');
		}

		function add_new_user()
		{
			$data2 = $this->session->userdata('institute');

			$data1['user'] = $data2['credential_username'];
			$data1['photo'] = $data2['user_photo'];
			$data1['institute_profile_id'] = $data2['user_profile_id'];
			$school_profile_id = $this->session->userdata('school_id');
			$data['user_details'] = $this->School_model->user_details($school_profile_id);
			$data['school'] = $this->School_model->school_details($school_profile_id);
			$nav['institute_name'] = $institute_admin[0]['institute_name'];
			$nav['institute_logo'] = $institute_admin[0]['institute_logo'];
			$nav['insti_admin'] = "school";
			$this->load->view('Institute/institute_header',$data1);
			$this->load->view('School/school_new_user', $data);
			$this->load->view('School/school_footer',$nav);
		}


		function already_exits_mobile()
		{
			$num['profile_id'] = $_POST['profile'];
			$num['mobile'] = $_POST['num'];
			$data = $this->School_model->already_exits_mobile($num);
			echo json_decode($data);
		}

		function already_exits_email()
		{
			$email['profile_id'] =  $_POST['profile'];
			$email['mail'] = $_POST['email'];
			$data = $this->School_model->already_exits_email($email);
			echo json_decode($data);
		}

		function forgot_password()
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
			$data1['user'] = $school_admin[0]['credential_username'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['functionality'] = $this->School_model->fetch_functionality($admin);
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$nav['institute_name'] = $school_admin[0]['school_name'];
			$nav['institute_logo'] = $school_admin[0]['school_logo'];
			$nav['insti_admin'] = "school";
			$this->load->view('School/school_header',$admin);
			$this->load->view('School/forgot_password',$data1);
			$this->load->view('School/school_footer',$nav);
		}

		function edit_profile()
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
			$admin['user'] = $school_admin[0]['credential_username'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$admin['functionality'] = $this->School_model->fetch_functionality($admin);
			$nav['institute_name'] = $school_admin[0]['school_name'];
			$nav['institute_logo'] = $school_admin[0]['school_logo'];

			$data2['user_details'] = $this->School_model->user_profile($admin);
			$nav['insti_admin'] = "school";
			$this->load->view('School/school_header',$admin);
			$this->load->view('School/edit_profile',$data2);
			$this->load->view('School/school_footer',$nav);
		}

		function school_change_password()
		{
			$data['credential_profile_id'] = $this->input->post('user_profile_id');
			$data12 = $this->School_model->fetch_user_update_mail($data);
			$data1['employee_email_id'] = $data12[0]['employee_email_id'];
			$data1['employee_pri_mobile_number'] = $data12[0]['employee_pri_mobile_number'];
			$data['credential_password'] = md5($this->input->post('password'));
			$data1['credential_password'] = $this->input->post('password');
			$data['credential_update_date'] = date('Y-m-d');
			$this->School_model->forgot_password($data);

			$config['protocol'] = $this->config->item('protocol');
			$config['smtp_host'] = $this->config->item('smtp_host');
			$config['smtp_port'] = $this->config->item('smtp_port');
			$config['smtp_timeout'] = $this->config->item('smtp_timeout');
			$config['smtp_user'] = $this->config->item('smtp_user');
			$config['smtp_pass'] = $this->config->item('smtp_pass');
			$config['charset'] = $this->config->item('charset');
			$config['newline'] = $this->config->item('newline');
			$config['mailtype'] = $this->config->item('mailtype');
			$config['validation'] = $this->config->item('validation');

			$this->email->initialize($config);
			$this->email->from('no-reply@trackmee.syntech.co.in');			// $this->email->from($email,$name);
			$this->email->to(''.$data1['employee_email_id'].'');
			$this->email->subject('Updated Authencation Details');
			$this->email->message("Hi,<br>Your profile has been created with System Your credentials are as follows:<br> <p>  Password: ".$data1['credential_password']."<br><br>  Thanks & Regards,<br>  ");
			if($this->email->send()){
				$this->session->set_flashdata('active',1);
		        $this->session->set_flashdata('title',"Password Updated.");
		        $this->session->set_flashdata('text',"User updated password are send On Email ID."); 
		        $this->session->set_flashdata('type',"success");
				redirect('School');	
			}
			else{
				$this->session->set_flashdata('active',1);
		        $this->session->set_flashdata('title',"Error...");
		        $this->session->set_flashdata('text',"Not Added...");
		        $this->session->set_flashdata('type',"warning");
				redirect('School');	
			}
		}

		
		function update_school_logo()
		{
			$data['school_profile_id'] = $this->input->post('school_profile_id');
			$data['school_logo'] = $this->upload('photo', 'profile_photo');
			$data['school_update_date'] = date('Y-m-d');
			$con = $this->School_model->update_school_logo($data);
			if($con == 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"School Logo Updated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");	
				redirect('School/school_user_detailss');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Not Added...");
	            $this->session->set_flashdata('type',"warning");	
				redirect('School/school_user_detailss');
			}
		}

		function activate_school($school_profile_id){
			$this->session->set_userdata('activated_school',$school_profile_id);
			redirect('School/school_activate');
		}

		function school_activate(){
			if(!isset($this->session->userdata['Institute']))
			{
				redirect('/');
			}
			else{
				$admin['direct'] = 1;
			}  
			$school_admin = $this->session->userdata('Institute');
			$school_profile_id = $this->session->userdata('activated_school');	
			// print_r($school_profile_id);die();
			$data = $this->School_model->school_activate($school_profile_id);
			if($data == 1){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"School Activated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");	
				redirect('School/view_school');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"School Not Activated.");
	            $this->session->set_flashdata('text',"warning"); 
	            $this->session->set_flashdata('type',"success");	
				redirect('School/view_school');
			}
		}

		function deactivate_school($school_profile_id){
			$this->session->set_userdata('deactivated_school',$school_profile_id);
			redirect('School/school_deactivate');
		}

		function school_deactivate(){
			if(!isset($this->session->userdata['Institute']))
			{
				redirect('/');
			}
			else{
				$admin['direct'] = 1;
			}  
			$school_admin = $this->session->userdata('Institute');
			$school_profile_id = $this->session->userdata('deactivated_school');	
			// print_r($school_profile_id);die();
			$data = $this->School_model->school_deactivate($school_profile_id);
			if($data == 1){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"School Deactivated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");	
				redirect('School/view_school');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"School Not Deactivated.");
	            $this->session->set_flashdata('text',"warning"); 
	            $this->session->set_flashdata('type',"success");	
				redirect('School/view_school');
			}
		}

		function activate_employee($employee_profile_id){
			$this->session->set_userdata('activated_employee',$employee_profile_id);
			redirect('School/employee_activate');
		}

		function employee_activate(){
			if(!isset($this->session->userdata['Institute']))
			{
				redirect('/');
			}
			else{
				$admin['direct'] = 1;
			}  
			$school_admin = $this->session->userdata('Institute');
			$employee_profile_id = $this->session->userdata('activated_employee');	
			$employee = $this->db->query("SELECT employee_type,employee_school_profile_id FROM employee where employee_profile_id =".$employee_profile_id."")->result_array(); 
			$verify = $this->db->query("SELECT * FROM employee where employee_type =".$employee[0]['employee_type']." and employee_expiry_date = '9999-12-31' and employee_school_profile_id = ".$employee[0]['employee_school_profile_id']."")->num_rows();
			// print_r($verify);die();
			if ($verify >= 1) {
				// print_r('Ahready');die();
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Employee Already Register.");
	            $this->session->set_flashdata('text',"Please remove and register."); 
	            $this->session->set_flashdata('type',"warning");	
				redirect('School/view_school');
			}else{
				$data = $this->School_model->employee_activate($employee_profile_id);
				if($data == 1){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Employee Activated.");
		            $this->session->set_flashdata('text',""); 
		            $this->session->set_flashdata('type',"success");	
					redirect('School/view_school');
				}else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Employee Not Activated.");
		            $this->session->set_flashdata('text',""); 
		            $this->session->set_flashdata('type',"success");	
					redirect('School/view_school');
				}
			}
		}

		function deactivate_employee($employee_profile_id){
			$this->session->set_userdata('deactivated_employee',$employee_profile_id);
			redirect('School/employee_deactivate');
		}

		function employee_deactivate(){
			if(!isset($this->session->userdata['Institute']))
			{
				redirect('/');
			}
			else{
				$admin['direct'] = 1;
			}  
			$school_admin = $this->session->userdata('Institute');
			$employee_profile_id = $this->session->userdata('deactivated_employee');	
			// print_r($employee_profile_id);die();
			$data = $this->School_model->employee_deactivate($employee_profile_id);
			if($data == 1){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Employee Deactivated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");	
				redirect('School/view_school');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Employee Not Deactivated.");
	            $this->session->set_flashdata('text',"warning"); 
	            $this->session->set_flashdata('type',"success");	
				redirect('School/view_school');
			}
		}
	}
?>