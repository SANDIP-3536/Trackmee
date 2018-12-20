<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Client extends CI_Controller
	{

		function index()
		{
			if(!isset($this->session->userdata['client']))
			{
				redirect('/');
			} 
			$client_admin = $this->session->userdata('client');
			$employee_details = $this->Client_model->employee_details($client_admin);
			$client['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$client['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$client['photo'] = $employee_details[0]['employee_photo'];
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			$client['first_name'] = $employee_details[0]['employee_first_name'];
			$client['last_name'] = $employee_details[0]['employee_last_name'];
			$client['email_id'] = $employee_details[0]['employee_email_id'];
			$client['username'] = $client_admin[0]['credential_username'];
			$date = date('Y-m-d');
			$school['total_user'] = $this->db->where('user_client_profile_id',$employee_client_profile_id)->where('user_expiry_date','9999-12-31')->get('user')->num_rows();
			// $school['total_travel_bus'] = $this->db->where('user_client_profile_id',$employee_client_profile_id)->where('user_expiry_date','9999-12-31')->where('student_tracking','1')->get('student')->num_rows();
			$school['total_driver'] = $this->db->where('employee_client_profile_id',$employee_client_profile_id)->where('employee_expiry_date','9999-12-31')->where('employee_type','4')->get('employee')->num_rows();
			$school['total_employee'] = $this->db->query("SELECT * FROM `employee` where employee_expiry_date = '9999-12-31' and employee_client_profile_id =".$employee_client_profile_id." and employee_type not in(1,2,3)")->num_rows();
			$school['total_bus'] = $this->db->where('bus_client_profile_id',$employee_client_profile_id)->where('bus_expiry_date','9999-12-31')->get('bus')->num_rows();
			$school['total_route'] = $this->db->query("SELECT * FROM `route` where route_client_profile_id =".$employee_client_profile_id." and route_expiry_date='9999-12-31' group by route_no")->num_rows();
			
			$client['flash']['active'] = $this->session->flashdata('active');
	    	$client['flash']['title'] = $this->session->flashdata('title');
	    	$client['flash']['text'] = $this->session->flashdata('text');
	    	$client['flash']['type'] = $this->session->flashdata('type');
	    	$client['client_name'] = $employee_details[0]['client_name'];
			$client['client_logo'] = $employee_details[0]['client_logo'];

	    	$client['dashboard'] = 'dashboard';
	    	$client['events'] = $this->db->where('holiday_client_profile_id',$employee_client_profile_id)->get('holiday')->result_array();
			$this->load->view('Client/client_header', $client);
			$this->load->view('Client/client_dashboard',$client);
		}

		function client_registration()
		{
			if(!isset($this->session->userdata['Institute']))
			{
				redirect('/');
			} 

			$institute_admin = $this->session->userdata('Institute');
			$employee_details = $this->Institute_model->employee_details($institute_admin);

			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['username'] = $institute_admin[0]['credential_username'];
			$nav['institute_name'] = $employee_details[0]['institute_name'];
			$nav['institute_logo'] = $employee_details[0]['institute_logo'];
			$client_institute_profile_id = $employee_details[0]['employee_client_profile_id'];
			$client_details['panic'] = $employee_details[0]['institute_panic_notifi'];
			$client_details['stop_sms'] = $employee_details[0]['institute_stop_sms'];
			$client_details['dest_sms'] = $employee_details[0]['institute_dest_sms'];
			$client_details['auth_sms'] = $employee_details[0]['institute_auth_sms'];
			$nav['insti_admin'] = "client";
			$this->load->view('Institute/institute_header', $admin);
			$this->load->view('Client/client_registration',$client_details);
			$this->load->view('Client/client_footer',$nav);
		}

		function view_client()
		{
			if(!isset($this->session->userdata['Institute']))
			{
				redirect('/');
			} 
			$institute_admin = $this->session->userdata('Institute');
			$employee_details = $this->Institute_model->employee_details($institute_admin);

			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['username'] = $institute_admin[0]['credential_username'];
			$nav['institute_name'] = $employee_details[0]['institute_name'];
			$nav['institute_logo'] = $employee_details[0]['institute_logo'];
			$nav['insti_admin'] = "client";
			$client_institute_profile_id = $employee_details[0]['employee_client_profile_id'];

			$client_details['flash']['active'] = $this->session->flashdata('active');
	    	$client_details['flash']['title'] = $this->session->flashdata('title');
	    	$client_details['flash']['text'] = $this->session->flashdata('text');
	    	$client_details['flash']['type'] = $this->session->flashdata('type');
			
			$client_details['client'] = $this->Client_model->fetch_client($client_institute_profile_id);
			$client_details['all_client'] = $this->db->query("SELECT * from client where client_institute_profile_id=".$client_institute_profile_id."")->result_array();
			$client_details['all_employee'] = $this->db->query("SELECT employee.*,client_name FROM employee join client on employee_client_profile_id = client_profile_id join institute on client_institute_profile_id = institute_profile_id where employee_client_profile_id IN (select client_profile_id from client where client_institute_profile_id = ".$client_institute_profile_id.") and employee_type =3")->result_array();
			
			$this->load->view('Institute/institute_header',$admin);
			$this->load->view('Client/view_client',$client_details);
			$this->load->view('Client/client_footer',$nav);
		}

		function add_client_registration()
		{
			$institute_admin = $this->session->userdata('Institute');
			$employee_details = $this->Institute_model->employee_details($institute_admin);

			$client_registration['client_type'] = $this->input->post('client_type');
			$client_registration['client_name'] = $this->input->post('client_name');
			$client_registration['client_address'] = $this->input->post('client_address');
			$client_registration['client_latitude'] = $this->input->post('client_latitude');
			$client_registration['client_longitude'] = $this->input->post('client_longitude');
			$client_registration['client_mobile_number'] = $this->input->post('client_mobile_number');
			$client_registration['client_phone_number'] = $this->input->post('client_phone_number');
			$client_registration['client_email_id'] = $this->input->post('client_email_id');
			$client_registration['client_speed_limit_val'] = $this->input->post('client_speed_limit_val');
			$limit = $this->input->post('client_speed_limit_notifi');
			if($limit == 'on'){
				$client_registration['client_speed_limit_notifi'] = "1";
			}else{
				$client_registration['client_speed_limit_notifi'] = "0";
			}
			$panic = $this->input->post('client_panic_notifi');
			if($panic == 'on'){
				$client_registration['client_panic_notifi'] = "1";
			}else{
				$client_registration['client_panic_notifi'] = "0";
			}
			$stop_sms = $this->input->post('client_stop_sms');
			if($stop_sms == 'on'){
				$client_registration['client_stop_sms'] = "1";
			}else{
				$client_registration['client_stop_sms'] = "0";
			}
			$dest_sms = $this->input->post('client_dest_sms');
			if($dest_sms == 'on'){
				$client_registration['client_dest_sms'] = "1";
			}else{
				$client_registration['client_dest_sms'] = "0";
			}
			$auth = $this->input->post('client_auth_sms');
			if($auth == 'on'){
				$client_registration['client_auth_sms'] = "1";
			}else{
				$client_registration['client_auth_sms'] = "0";
			}
			$client_registration['client_effective_date'] = date('Y-m-d');
			$client_registration['client_update_date'] = date('Y-m-d');
			$verify = $this->db->query("select * from client where client_name = '".$client_registration['client_name']."' and client_phone_number = ".$client_registration['client_phone_number']." and client_type='".$client_registration['client_type']."' and client_expiry_date = '9999-12-31'")->num_rows();
			if ($verify != 0) {
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Client Already Registered.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"warning");
				redirect('Client/view_client');
			}else{
				$client_registration['client_institute_profile_id'] = $employee_details[0]['employee_client_profile_id'];
				$client_registration['client_logo'] = $this->upload('client_logo', 'profile_photo');
				$client_profile_id = $this->Client_model->add_client_registration($client_registration);
				if($client_profile_id == 0){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Client Added Successfully.");
		            $this->session->set_flashdata('text',""); 
		            $this->session->set_flashdata('type',"success");
					redirect('Client/view_client');
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

		function client_user_details($client_profile_id)
		{
			$this->session->set_userdata('client_data', $client_profile_id);
			redirect('Client/client_user_detailss');
		}


		function client_user_detailss()
		{
			if(!isset($this->session->userdata['Institute']))
			{
				redirect('/');
			} 
			$client_details['flash']['active'] = $this->session->flashdata('active');
	    	$client_details['flash']['title'] = $this->session->flashdata('title');
	    	$client_details['flash']['text'] = $this->session->flashdata('text');
	    	$client_details['flash']['type'] = $this->session->flashdata('type');

			$institute_admin = $this->session->userdata('Institute');
			$employee_details = $this->Institute_model->employee_details($institute_admin);

			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['institute_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$admin['username'] = $institute_admin[0]['credential_username'];
			$client_profile_id = $this->session->userdata('client_data');
			
			$nav['institute_name'] = $employee_details[0]['institute_name'];
			$nav['institute_logo'] = $employee_details[0]['institute_logo'];
			$client_details['client'] = $this->Client_model->client_details($client_profile_id);
			$client_details['client_user'] = $this->Client_model->user_details($client_profile_id);
			$nav['insti_admin'] = "client";
			$this->load->view('Institute/institute_header', $admin);
			$this->load->view('Client/client_user_details', $client_details);
			$this->load->view('Client/client_footer',$nav);
		}

		function update_client_details($client_profile_id)
		{
			$this->session->set_userdata('client_data1', $client_profile_id);
			redirect('Client/update_Client');
		}

		function update_Client()
		{
			$institute_admin = $this->session->userdata('Institute');
			$employee_details = $this->Institute_model->employee_details($institute_admin);

			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['username'] = $institute_admin[0]['credential_username'];
			$id = $this->session->userdata('client_data1');
			$data['client'] = $this->Client_model->fetch_client_id($id);
			$nav['institute_name'] = $employee_details[0]['institute_name'];
			$nav['institute_logo'] = $employee_details[0]['institute_logo'];
			$nav['insti_admin'] = "client";
			$this->load->view('Institute/institute_header',$admin);
			$this->load->view('Client/update_client_details', $data);
			$this->load->view('Client/client_footer',$nav);
		}

		function client_deactive($client_profile_id)
		{
			$this->session->set_userdata('client_deactive',$client_profile_id);
			redirect('Client/client_disable');
		}

		function client_disable(){
			$data['client_profile_id'] = $this->session->userdata('client_deactive');
			$data['client_expiry_date'] = date('Y-m-d');
			$con = $this->Client_model->client_disable($data);
			if($con == 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Client Deactivated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");	
				redirect('Client/client_user_detailss');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Not Added...");
	            $this->session->set_flashdata('type',"warning");	
				redirect('Client/client_user_detailss');
			}
		}

		function client_active($client_profile_id)
		{
			$this->session->set_userdata('client_active',$client_profile_id);
			redirect('Client/client_enable');
		}

		function client_enable()
		{
			$data['client_profile_id'] = $this->session->userdata('client_active');
			$data['client_expiry_date'] = '9999-12-31';
			$con = $this->Client_model->client_enable($data);
			if($con == 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Client Activated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");	
				redirect('Client/client_user_detailss');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Not Added...");
	            $this->session->set_flashdata('type',"warning");	
				redirect('Client/client_user_detailss');
			}
		}
		
		function add_client_user()
		{
			$institute_admin = $this->session->userdata('Institute');
			$admin['client_name'] = $this->input->post('client_name');
			$num['profile'] =$this->input->post('client_profile_id');
			$num['mobile'] =$this->input->post('employee_pri_mobile_number');
			$mobile = $this->Client_model->already_exits_mobile($num);
			$email['profile'] =$this->input->post('client_profile_id');
			$email['mail'] =  $this->input->post('employee_email_id');
			$email_id = $this->Client_model->already_exits_email($email);

			if ($mobile != 0) {

				$this->session->set_flashdata('active',1);
		        $this->session->set_flashdata('title',"Mobile No Already Registered.");
		        $this->session->set_flashdata('text',"Please Fill again with another Mobile Number");
		        $this->session->set_flashdata('type',"warning");
				redirect('Client/client_user_detailss');
			}
			elseif($email_id != 0){	

				$this->session->set_flashdata('active',1);
		        $this->session->set_flashdata('title',"Email ID Already Registered.");
		        $this->session->set_flashdata('text',"Please Fill again with another Email ID."); 
		        $this->session->set_flashdata('type',"warning");
				redirect('Client/client_user_detailss');
			}
			else{

				$client_employee['employee_type'] = $this->input->post('employee_type');
				$client_employee['employee_photo'] = $this->upload('employee_photo', 'profile_photo');
				$client_employee['employee_first_name'] = $this->input->post('employee_first_name');
				$client_employee['employee_middle_name'] = $this->input->post('employee_middle_name');
				$client_employee['employee_last_name'] = $this->input->post('employee_last_name');
				$client_employee['employee_address'] = $this->input->post('employee_address');
				$client_employee['employee_DOB'] = $this->input->post('employee_DOB');
				$client_employee['employee_gender'] = $this->input->post('employee_gender');
				$client_employee['employee_experiance'] = $this->input->post('employee_experiance');
				$client_employee['employee_pri_mobile_number'] = $this->input->post('employee_pri_mobile_number');
				$client_employee['employee_email_id'] = $this->input->post('employee_email_id');
				$client_employee['employee_effective_date'] = date('Y-m-d');
				$client_employee['employee_client_profile_id'] = $this->input->post('client_profile_id');
				$client_details['client_name'] = $this->input->post('client_name');

				// client credential Details
				$client_credential['credential_user_type'] = $this->input->post('employee_type');
				$client_credential['credential_update_date'] = date('Y-m-d');

				$count = $this->db->get('employee')->num_rows();

				$cnt = $count+1;
				$user_type = 3;
				$admin_id = $this->input->post('client_profile_id');
				$mobile = $this->input->post('employee_pri_mobile_number');
				$mobile1 = $mobile[5];
				$mobile2 = $mobile[6];
				$mobile3 = $mobile[7];
				$mobile4 = $mobile[8];
				$mobile5 = $mobile[9];
				$username = array($user_type,$admin_id,$cnt,$mobile1,$mobile2,$mobile3,$mobile4,$mobile5);
				$client_credential['credential_username'] = implode($username);

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
				$client_credential1['credential_password1'] = implode($arr1);
				$client_credential['credential_password'] = md5(implode($arr1)); 

				$signature = $this->db->select('institute_sender_id,institute_signature')->where('institute_profile_id',$admin_id)->get('institute')->result_array();
				$message = "Hi,\nYour profile has been created with TrackMee.\nYour Credential are as follows:\nUsername :".$client_credential['credential_username']."\nPassword :".$client_credential1['credential_password1']."\nRegards,\nTeam TrackMee.";
				$number = $client_employee['employee_pri_mobile_number'];
				
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
				$this->email->from('no-reply@trackmee.syntech.co.in',''.$client_details['client_name'].'');			// $this->email->from($email,$name);
				$this->email->to(''.$client_employee['employee_email_id'].'');
				$this->email->subject('Welcome To '.$client_details['client_name'].' Authencation Details');
				$this->email->message("Hi,<br>Your profile has been created with ".$client_details['client_name'].". Your credentials are as follows:<br>  <p> Username: ".$client_credential['credential_username']."<br> <p>  Password: ".$client_credential1['credential_password1']."<br><br>   Regards,<br> Team TrackMee");

				if($this->email->send()){
					$check = $this->Client_model->check_sms_active($num['profile']);
					if($check[0]['institute_auth_sms'] == 1 && $check[0]['institute_sms_credit'] > 0)
					{
						$sms_status = $this->Institute_model->sms($number,$message,$signature[0]['institute_sender_id']);
						$res_explode = explode(':', $sms_status);
						$count = $check[0]['institute_sms_credit']-1;
						// print_r($count);die();
						$this->Institute_model->set_count($num['profile'],$count);
						$sent['sent_sms_type'] = 2;
						$sent['sent_sms_sub_type'] = 16;
						$sent['sent_sms_mobile_number'] = $number;
						$sent['sent_sms_MsgID'] = $res_explode[1];
						$sent['sent_sms_status'] =  $res_explode[4];
						$sent['sent_sms_count'] = 1;
						$sent['sent_sms_MSG'] = $message;
						$sent['sent_sms_client_profile_id'] = $num['profile'];
						$this->Institute_model->add_sent_sms($sent);
					}
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"User Added Successfully.");
		            $this->session->set_flashdata('text',"Employee credentials are send On his Email ID and Mobile Number."); 
		            $this->session->set_flashdata('type',"success");

		            $employee_profile_id = $this->Client_model->add_school_user($client_employee);

					$client_credential['credential_profile_id'] = $employee_profile_id[0]['employee_profile_id'];
					$this->Client_model->school_user_credential($client_credential);
					redirect('Client/client_user_detailss');
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

		function update_client_user($employee_profile_id)
		{
			$this->session->set_userdata('employee_profile_id', $employee_profile_id);
			redirect('Client/update_user');
		}

		function update_user()	
		{
			$update_client_user['flash']['active'] = $this->session->flashdata('active');
	    	$update_client_user['flash']['title'] = $this->session->flashdata('title');
	    	$update_client_user['flash']['text'] = $this->session->flashdata('text');
	    	$update_client_user['flash']['type'] = $this->session->flashdata('type');

			$employee_profile_id = $this->session->userdata('employee_profile_id');
			$institute_admin = $this->session->userdata('Institute');
			$employee_details = $this->Institute_model->employee_details($institute_admin);

			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['username'] = $institute_admin[0]['credential_username'];
			$update_client_user['client_user'] = $this->Client_model->user_fetch($employee_profile_id);
			$nav['institute_name'] = $employee_details[0]['institute_name'];
			$nav['institute_logo'] = $employee_details[0]['institute_logo'];
			$nav['insti_admin'] = "client";
			$this->load->view('Institute/institute_header',$admin);
			$this->load->view('Client/update_client_user', $update_client_user);
			$this->load->view('Client/client_footer',$nav);
		}

		function disable_client_user($employee_profile_id)
		{
			$this->session->set_userdata('user_disable', $employee_profile_id);
			redirect('Client/disable_user_client');			
		}

		function disable_user_client()
		{
			$disable_employee['employee_profile_id'] = $this->session->userdata('user_disable');
			$disable_employee['employee_expiry_date'] = date('Y-m-d');
			$con = $this->Client_model->client_user_disable($disable_employee);
			if($con == 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"User Deactivated.");
	            $this->session->set_flashdata('text',"Institute User Deactivated"); 
	            $this->session->set_flashdata('type',"success");	
				redirect('Client/client_user_detailss');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Not Added...");
	            $this->session->set_flashdata('type',"warning");	
				redirect('Client/client_user_detailss');
			}
		}

		function enable_client_user($employee_profile_id)
		{
			$this->session->set_userdata('user_enable', $employee_profile_id);
			redirect('Client/enable_user_client');			
		}

		function enable_user_client()
		{
			$enable_employee['employee_profile_id'] = $this->session->userdata('user_enable');
			$enable_employee['employee_expiry_date'] = '9999-12-31';
			$con = $this->Client_model->client_user_enable($enable_employee);
			if($con == 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"User Activated.");
	            $this->session->set_flashdata('text',"Institute User Activated"); 
	            $this->session->set_flashdata('type',"success");	
				redirect('Client/client_user_detailss');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Not Added...");
	            $this->session->set_flashdata('type',"warning");	
				redirect('Client/client_user_detailss');
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

		function update_details_client()
		{
			$client_update = $this->input->post();
			$limit = $this->input->post('client_speed_limit_notifi');
			if($limit == 'on'){
				$client_update['client_speed_limit_notifi'] = "1";
			}else{
				$client_update['client_speed_limit_notifi'] = "0";
			}
			$panic = $this->input->post('client_panic_notifi');
			if($panic == 'on'){
				$client_update['client_panic_notifi'] = "1";
			}else{
				$client_update['client_panic_notifi'] = "0";
			}
			$stop_sms = $this->input->post('client_stop_sms');
			if($stop_sms == 'on'){
				$client_update['client_stop_sms'] = "1";
			}else{
				$client_update['client_stop_sms'] = "0";
			}
			$dest_sms = $this->input->post('client_dest_sms');
			if($dest_sms == 'on'){
				$client_update['client_dest_sms'] = "1";
			}else{
				$client_update['client_dest_sms'] = "0";
			}
			$auth = $this->input->post('client_auth_sms');
			if($auth == 'on'){
				$client_update['client_auth_sms'] = "1";
			}else{
				$client_update['client_auth_sms'] = "0";
			}
			$client_update['client_update_date'] = date('Y-m-d');
			$con = $this->Client_model->update_details_client($client_update);
			if($con == 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"School Details Updated");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Client/view_client');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Not Added...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Client/view_client');
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
			$data['user_details'] = $this->Client_model->user_details($school_profile_id);
			$data['school'] = $this->Client_model->school_details($school_profile_id);
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
			$data = $this->Client_model->already_exits_mobile($num);
			echo json_decode($num);
		}

		function already_exits_email()
		{
			$email['profile_id'] =  $_POST['profile'];
			$email['mail'] = $_POST['email'];
			$data = $this->Client_model->already_exits_email($email);
			echo json_decode($data);
		}

		function forgot_password()
		{
			if(!isset($this->session->userdata['client']))
			{
				redirect('/');
			} 
			$client_admin = $this->session->userdata('client');
			$employee_details = $this->Client_model->employee_details($client_admin);
			$data1['user'] = $client_admin[0]['credential_username'];
			$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$admin['username'] = $client_admin[0]['credential_username'];
			$nav['institute_name'] = $employee_details[0]['client_name'];
			$nav['institute_logo'] = $employee_details[0]['client_logo'];
			$nav['insti_admin'] = "client";
			$this->load->view('Client/client_header',$admin);
			$this->load->view('Client/forgot_password',$data1);
			$this->load->view('Client/client_footer',$nav);
		}

		function edit_profile()
		{
			if(!isset($this->session->userdata['client']))
			{
				redirect('/');
			}
			$school_admin = $this->session->userdata('client');
			$admin['user'] = $school_admin[0]['credential_username'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['functionality'] = $this->Client_model->fetch_functionality($admin);
			$nav['institute_name'] = $school_admin[0]['school_name'];
			$nav['institute_logo'] = $school_admin[0]['school_logo'];

			$data2['user_details'] = $this->Client_model->user_profile($admin);
			$nav['insti_admin'] = "school";
			$this->load->view('Client/client_header',$admin);
			$this->load->view('Client/edit_profile',$data2);
			$this->load->view('Client/client_footer',$nav);
		}

		function client_change_password()
		{
			$data['credential_profile_id'] = $this->input->post('user_profile_id');
			$data12 = $this->Client_model->fetch_user_update_mail($data);
			$data1['employee_email_id'] = $data12[0]['employee_email_id'];
			$data1['employee_pri_mobile_number'] = $data12[0]['employee_pri_mobile_number'];
			$data['credential_password'] = md5($this->input->post('password'));
			$data1['credential_password'] = $this->input->post('password');
			$data['credential_update_date'] = date('Y-m-d');
			$this->Client_model->forgot_password($data);

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
				redirect('Authentication/logout');	
			}
			else{
				$this->session->set_flashdata('active',1);
		        $this->session->set_flashdata('title',"Error...");
		        $this->session->set_flashdata('text',"Not Added...");
		        $this->session->set_flashdata('type',"warning");
				redirect('client');	
			}
		}

		
		function update_client_logo()
		{
			$data['client_profile_id'] = $this->input->post('client_profile_id');
			$data['client_logo'] = $this->upload('client_logo','profile_photo');
			$data['client_update_date'] = date('Y-m-d');
			$con = $this->Client_model->update_client_logo($data);
			if($con == 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Client Logo Updated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");	
				redirect('Client/client_user_detailss');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Not Added...");
	            $this->session->set_flashdata('type',"warning");	
				redirect('Client/client_user_detailss');
			}
		}

		function activate_employee($employee_profile_id){
			$this->session->set_userdata('activated_employee',$employee_profile_id);
			redirect('Client/employee_activate');
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
			$data = $this->Client_model->employee_activate($employee_profile_id);
			if($data == 1){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Employee Activated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");	
				redirect('Client/view_client');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Employee Not Activated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");	
				redirect('Client/view_client');
			}
		}

		function deactivate_employee($employee_profile_id){
			$this->session->set_userdata('deactivated_employee',$employee_profile_id);
			redirect('Client/employee_deactivate');
		}

		function employee_deactivate(){
			if(!isset($this->session->userdata['Institute']))
			{
				redirect('/');
			}
			else{
				$admin['direct'] = 1;
			}  
			$client_admin = $this->session->userdata('Institute');
			$employee_profile_id = $this->session->userdata('deactivated_employee');
			$data = $this->Client_model->employee_deactivate($employee_profile_id);
			if($data == 1){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Employee Deactivated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");	
				redirect('Client/view_client');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Employee Not Deactivated.");
	            $this->session->set_flashdata('text',"warning"); 
	            $this->session->set_flashdata('type',"success");	
				redirect('Client/view_client');
			}
		}
	}
?>