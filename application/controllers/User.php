<?php
	date_default_timezone_set('Asia/Kolkata');
	class User extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			if(isset($this->session->userdata['client'])){

			}elseif(isset($this->session->userdata['Institute'])) {

			}else{
				redirect('/');
			}
		}

		function view_user()
		{	
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$admin['username'] = $client_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['client_name'];
				$nav['client_logo'] = $employee_details[0]['client_logo'];
				$user['institute_admin'] = 0;
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$admin['username'] = $institute_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['institute_name'];
				$nav['client_logo'] = $employee_details[0]['institute_logo'];
				$user['institute_admin'] = 1;
        	}			
			$user['flash']['active'] = $this->session->flashdata('active');
        	$user['flash']['title'] = $this->session->flashdata('title');
        	$user['flash']['text'] = $this->session->flashdata('text');
        	$user['flash']['type'] = $this->session->flashdata('type');

			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$user_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			$school['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$nav['user'] = 'user';

			$user['user'] = $this->User_model->fetch_user_by_session($user_client_profile_id);
			if (isset($this->session->userdata['client'])) {
				$this->load->view('Client/client_header', $admin);
        	}elseif (isset($this->session->userdata['Institute'])) {
				$this->load->view('Institute/institute_header', $admin);
        	}
			$this->load->view('User/view_user',$user);
			$this->load->view('User/user_footer',$nav);	
		}

		function user_registration()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$admin['username'] = $client_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['client_name'];
				$nav['client_logo'] = $employee_details[0]['client_logo'];
				$admin['institute_admin'] = 0;
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$admin['username'] = $institute_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['institute_name'];
				$nav['client_logo'] = $employee_details[0]['institute_logo'];
				$admin['institute_admin'] = 1;
        	}
			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$nav['user'] = 'user';

			$user['flash']['active'] = $this->session->flashdata('active');
        	$user['flash']['title'] = $this->session->flashdata('title');
        	$user['flash']['text'] = $this->session->flashdata('text');
        	$user['flash']['type'] = $this->session->flashdata('type');

        	$user['user_profile_id'] = $employee_details[0]['employee_profile_id'];
        	$user['client'] = $this->Client_model->fetch_client($employee_details[0]['employee_client_profile_id']);
        	if (isset($this->session->userdata['client'])) {
				$this->load->view('Client/client_header', $admin);
        	}elseif (isset($this->session->userdata['Institute'])) {
				$this->load->view('Institute/institute_header', $admin);
        	}
			$this->load->view('User/user_registration',$user);
			$this->load->view('User/user_footer', $nav);
		}

		function add_user_registration()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$user_user['user_client_profile_id'] = $employee_details[0]['employee_client_profile_id'];
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$user_user['user_client_profile_id'] = $this->input->post('user_client_profile_id');
        	}
			$user_user['user_first_name'] = ucfirst($this->input->post('user_first_name'));
			$user_user['user_middle_name'] = ucfirst($this->input->post('user_middle_name'));
			$user_user['user_last_name'] = ucfirst($this->input->post('user_last_name'));
			$user_user['user_gender'] = $this->input->post('user_gender');
			$user_user['user_DOB'] = $this->input->post('user_DOB');
			$user_user['user_address'] = ucfirst($this->input->post('user_address'));
			$user_user['user_mobile_number'] = $this->input->post('user_mobile_number');
			$user_user['user_email_id'] = $this->input->post('user_email_id');
			$user_user['user_effective_date'] = date('Y-m-d');
			$verify = $this->db->query("select * from user WHERE user_mobile_number ='".$user_user['user_mobile_number']."' and user_first_name = '".$user_user['user_first_name']."'  and user_last_name = '".$user_user['user_last_name']."' and user_expiry_date = '9999-12-31' and user_client_profile_id =".$user_user['user_client_profile_id']."")->num_rows();
			if($verify != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"User Already Registered.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"warning");
				redirect('User/user_registration');
			}else{
				$user_user['user_photo'] = $this->upload('user_photo', 'profile_photo');
				$signature = $this->db->query('select institute_sender_id,institute_signature from institute where institute_profile_id=(select client_institute_profile_id from client where client_profile_id='.$employee_details[0]['employee_client_profile_id'].')')->result_array();
				$count = $this->db->get('user')->num_rows();

				$cnt = $count+1;
				$user_type = 2;
				$admin_id = $employee_details[0]['employee_client_profile_id'];
				$mobile = $this->input->post('user_mobile_number');
				$mobile1 = $mobile[5];
				$mobile2 = $mobile[6];
				$mobile3 = $mobile[7];
				$mobile4 = $mobile[8];
				$mobile5 = $mobile[9];
				$username = array($user_type,$admin_id,$cnt,$mobile1,$mobile2,$mobile3,$mobile4,$mobile5);
				$user_credential['credential_user_type'] = 5;
				$user_credential['credential_update_date'] = date('Y-m-d');
				
				$user_credential['credential_username'] = implode($username);
				$user_credential['credential_user_type'] = 4;
				//random password generate using first character of name and date

				$pas = str_split($this->input->post('user_first_name'));
				$pass = $pas[0];
				$pas1 = str_split($this->input->post('user_last_name'));
				$pass1 = $pas1[0];
				$pas2 = $this->input->post('user_DOB');
				$pas3 = date_format(new Datetime($pas2),"Y/m/d");
				$pas4 = explode("/", $pas3);
				$pass3 =$pas4[0];
				$pass4 =$pas4[1];
				$pass5 =$pas4[2];
				$arr1 = array($pass,$pass4,$pass1,$pass3,$pass5,$pass4);
				$user_credential1['credential_password1'] = implode($arr1);
				$user_credential['credential_password'] = md5(implode($arr1));
					
				$number=$user_user['user_mobile_number'];
				$message = "Hi, \nYour profile has been created with ".$signature[0]['institute_signature'].". \nYour Credential is as follows: \nUsername :".$user_credential['credential_username']." \nPassword :".$user_credential1['credential_password1']." \nRegards, \n".$signature[0]['institute_signature'].".";

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
				$this->email->from('no-reply@trackmee.syntech.co.in',$signature[0]['institute_signature']);
				if (empty($user_user['user_email_id'])) {
					$this->email->to(''.$employee_details[0]['client_email_id'].'');
				}else{
					$this->email->to(''.$user_user['user_email_id'].'');
				}
				$this->email->subject('Welcome To Trackmee Authencation Details');
				$this->email->message("Hi,<br>Your profile has been created with ".$signature[0]['institute_signature'].". Your credentials are as follows:<br>  <p> Username: ".$user_credential['credential_username']."<br> <p>  Password: ".$user_credential1['credential_password1']."<br><br>   Regards,<br> ".$signature[0]['institute_signature'].".");

				if($this->email->send()){
					$check = $this->Institute_model->check_sms_active($employee_details[0]['institute_profile_id']);
					if($check[0]['institute_auth_sms'] == 1 && $check[0]['institute_sms_credit'] > 0)
					{
						$sms_status = $this->Institute_model->sms($number,$message,$signature[0]['institute_sender_id']);
						$res_explode = explode(':', $sms_status);
						$count = $check[0]['institute_sms_credit']-1;
						$this->Institute_model->set_count($employee_details[0]['institute_profile_id'],$count);
						$sent['sent_sms_type'] = 2;
						$sent['sent_sms_sub_type'] = 16;
						$sent['sent_sms_mobile_number'] = '9890575638';
						$sent['sent_sms_MsgID'] = $res_explode[1];
						$sent['sent_sms_status'] =  $res_explode[4];
						$sent['sent_sms_count'] = 1;
						$sent['sent_sms_MSG'] = $message;
						$sent['sent_sms_client_profile_id'] = $employee_details[0]['institute_profile_id'];
						$this->Institute_model->add_sent_sms($sent);
					}
					$user_profile_id = $this->User_model->user_add($user_user);
					$user_user_document['doc_user'] = $user_profile_id[0]['user_profile_id'];
					$user_credential['credential_profile_id'] = $user_profile_id[0]['user_profile_id'];
					$this->User_model->user_credential($user_credential);

					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Employee Added Successfully.");
		            $this->session->set_flashdata('text',"User credentials are send On his Email ID and Mobile Number."); 
		            $this->session->set_flashdata('type',"success");
					redirect('User/view_user');
				}
				else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Error...");
		            $this->session->set_flashdata('text',"");
		            $this->session->set_flashdata('type',"warning");
					redirect('User/view_user');
				}
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
				$user_photo = base_url().'profile_photo/'.$upload_files['upload_data']['file_name'];
				$this->upload->data();

				return $user_photo;
			}
		}

		function view_user_details($user_profile_id)
		{
			$this->session->set_userdata('user_data', $user_profile_id);
			redirect('User/user_deatails_view');  
		}

		function user_deatails_view()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$admin['username'] = $client_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['client_name'];
				$nav['client_logo'] = $employee_details[0]['client_logo'];
				$admin['institute_admin'] = 0;
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$admin['username'] = $institute_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['institute_name'];
				$nav['client_logo'] = $employee_details[0]['institute_logo'];
				$admin['institute_admin'] = 1;
        	}

			$update_user['flash']['active'] = $this->session->flashdata('active');
        	$update_user['flash']['title'] = $this->session->flashdata('title');
        	$update_user['flash']['text'] = $this->session->flashdata('text');
        	$update_user['flash']['type'] = $this->session->flashdata('type');
        	
			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$nav['user'] = 'user';
			$user_profile_id = $this->session->userdata('user_data');
			$update_user['update_user'] = $this->User_model->update_user($user_profile_id);

			if (isset($this->session->userdata['client'])) {
				$this->load->view('Client/client_header', $admin);
        	}elseif (isset($this->session->userdata['Institute'])) {
				$this->load->view('Institute/institute_header', $admin);
        	}
			$this->load->view('User/user_details',$update_user);
			$this->load->view('User/user_footer',$nav);
		}

		function add_document($employee_profile_id)
		{
			$this->session->set_userdata('user_data', $employee_profile_id);
			redirect('Employee/employee_document');  
		}

		function employee_document()
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
			$employee['student_profile_id'] = $this->session->userdata('user_data');
			$employee['document'] = $this->Employee_model->document_details($employee);

			$school_admin = $this->session->userdata('school');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['education'] = 'education';
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			
			$this->load->view('School/school_header',$admin);
			$this->load->view('Employee/add_document',$employee);
			$this->load->view('Employee/employee_footer',$nav);
		}

		function add_employee_document()
		{
			$school_admin = $this->session->userdata('school');
			$document['doc_name'] = $this->input->post('doc_name');
			$document['doc_number'] = $this->input->post('doc_number');
			$document['doc_file'] = $this->upload1('doc_file','document');
			$document['doc_effective_date'] = date('Y-m-d');
			$document['doc_user'] = $this->input->post('employee_profile_id');
			$document['doc_user_type'] = '5';
			$document['doc_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$con = $this->Student_model->student_document($document);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Document not Sumbited...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Employee/view_employee');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Document Submited.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Employee/view_employee');
			}
		}

		function update_user($user_profile_id)
		{
			$this->session->set_userdata('user_data', $user_profile_id);
			redirect('User/user_update');  
		}

		function user_update()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$admin['username'] = $client_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['client_name'];
				$nav['client_logo'] = $employee_details[0]['client_logo'];
				$admin['institute_admin'] = 0;
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$admin['username'] = $institute_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['institute_name'];
				$nav['client_logo'] = $employee_details[0]['institute_logo'];
				$admin['institute_admin'] = 1;
        	}

			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$nav['user'] = 'user';
			$user_profile_id = $this->session->userdata('user_data');
			$update_user['update_user'] = $this->User_model->update_user($user_profile_id);

			if (isset($this->session->userdata['client'])) {
				$this->load->view('Client/client_header', $admin);
        	}elseif (isset($this->session->userdata['Institute'])) {
				$this->load->view('Institute/institute_header', $admin);
        	}
			$this->load->view('User/update_user',$update_user);
			$this->load->view('User/user_footer',$nav);
		}

		function update_user_details()
		{
			$update_user = $this->input->post();
			$user_profile_id = $this->input->post('user_profile_id');
			$update_user['user_update_date'] = date('Y-m-d');
			$con = $this->User_model->update_user_details($update_user);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"User not Updated...");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
				$this->session->set_userdata('user_data', $user_profile_id);
				redirect('User/user_deatails_view');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"User Information Updated Successfully.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('User/user_deatails_view');
			}
		}

		function upload1($file,$folder)
		{
			$config = array(
				'upload_path' => 'document/',
				'upload_url' => base_url().'document/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'encrypt_name' => TRUE,
				);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload($file)){
				$user_photo = base_url().'document/default_document_image.png';
				return $user_photo;
			}
			else{
				$upload_files = array('upload_data' => $this->upload->data());
				$user_photo = base_url().'document/'.$upload_files['upload_data']['file_name'];
				$this->upload->data();
				return $user_photo;
			}

		}

		function user_deactive($user_profile_id)			
		{
			$this->session->set_userdata('user_deactive',$user_profile_id);
			redirect('User/deactive');
		}

		function deactive()
		{
			$user_profile_id = $this->session->userdata('user_deactive');
			$con = $this->User_model->deactive($user_profile_id);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"user not Deactivated...");
	            $this->session->set_flashdata('type',"warning");
				redirect('User/view_user');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"user Deactivated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('User/view_user');
			}
		}

		function edit_profile()
		{
			$profile['user_profile_id'] = $this->input->post('user_profile_id');
			$user_profile_id = $this->input->post('user_profile_id');
			$profile['user_photo'] = $this->upload('user_photo', 'profile_photo');
			$cnt = $this->User_model->edit_profile($profile);
			if($cnt == 1){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Profile Successfully Updated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				$this->session->set_userdata('user_data', $user_profile_id);
				redirect('User/user_deatails_view');
			}
		}

		function user_active($user_profile_id)			
		{
			$this->session->set_userdata('user_deactive',$user_profile_id);
			redirect('User/active');
		}

		function active()
		{
			$user_profile_id = $this->session->userdata('user_deactive');

			$con = $this->User_model->active($user_profile_id);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"user not Activated...");
	            $this->session->set_flashdata('type',"warning");
				redirect('User/view_user');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"User Activated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('User/view_user');
			}
		}
	}
?>