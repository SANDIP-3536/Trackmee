<?php
	date_default_timezone_set('Asia/Kolkata');
	class Employee extends CI_Controller
	{
		function view_employee()
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
			
			$employee['flash']['active'] = $this->session->flashdata('active');
        	$employee['flash']['title'] = $this->session->flashdata('title');
        	$employee['flash']['text'] = $this->session->flashdata('text');
        	$employee['flash']['type'] = $this->session->flashdata('type');

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
			
			$employee['employee'] = $this->Employee_model->fetch_employee_by_session($employee_school_profile_id);
			$this->load->view('School/school_header', $admin);
			$this->load->view('Employee/view_employee',$employee);
			$this->load->view('Employee/employee_footer',$nav);	
		}

		function employee_registration()
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

			$employee['flash']['active'] = $this->session->flashdata('active');
        	$employee['flash']['title'] = $this->session->flashdata('title');
        	$employee['flash']['text'] = $this->session->flashdata('text');
        	$employee['flash']['type'] = $this->session->flashdata('type');

        	$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$employee['functionality'] = $this->School_model->fetch_functionality($school);
			$employee['subject_details'] = $this->db->query("SELECT class_name,subject_id,subject_name,CASE when subject_type='1' then 'Theory' when subject_type='3' then 'Practical' when subject_type='3' then 'Project' when subject_type='4' then 'Oral' when subject_type='5' then 'Assignment' else '' end as type from subject join class on subject_class_id = class_id where subject_expiry_date='9999-12-31' and subject_school_profile_id = ".$school_admin[0]['employee_school_profile_id']."")->result_array();
			$this->load->view('School/school_header',$admin);
			$this->load->view('Employee/employee_registration',$employee);
			$this->load->view('Employee/employee_footer', $nav);
		}

		function add_employee_registration()
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
			$employee_employee['employee_type'] = $this->input->post('employee_type');
			$employee_employee['employee_first_name'] = ucfirst($this->input->post('employee_first_name'));
			$employee_employee['employee_middle_name'] = ucfirst($this->input->post('employee_middle_name'));
			$employee_employee['employee_last_name'] = ucfirst($this->input->post('employee_last_name'));
			$employee_employee['employee_gender'] = $this->input->post('employee_gender');
			$employee_employee['employee_DOB'] = $this->input->post('employee_DOB');
			$employee_employee['employee_address'] = ucfirst($this->input->post('employee_address'));
			$employee_employee['employee_pri_mobile_number'] = $this->input->post('employee_pri_mobile_number');
			$employee_employee['employee_email_id'] = $this->input->post('employee_email_id');
			$employee_employee['employee_higher_education'] = ucfirst($this->input->post('employee_higher_education'));
			$employee_employee['employee_experiance'] = $this->input->post('employee_experiance');
			$employee_employee['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$employee_employee['employee_effective_date'] = date('Y-m-d');		
			$TS_regis['TS_subject_id'] = $this->input->post('TS_subject_id');	
			$TS_regis['TS_effective_date'] = date('Y-m-d');	
			$TS_regis['TS_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$verify = $this->db->query("select * from employee WHERE employee_pri_mobile_number =".$employee_employee['employee_pri_mobile_number']." and employee_first_name = '".$employee_employee['employee_first_name']."'  and employee_last_name = '".$employee_employee['employee_last_name']."' and employee_expiry_date = '9999-12-31' and employee_school_profile_id =".$employee_employee['employee_school_profile_id']." and employee_type NOT IN(2,3,1)")->num_rows();
			if($verify != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Employee Already Registered.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"warning");
				redirect('Employee/employee_registration');
			}else{
				$employee_employee['employee_photo'] = $this->upload('employee_photo', 'profile_photo');
				$signature = $this->db->query('select institute_sender_id,institute_signature from institute where institute_profile_id=(select school_institute_profile_id from school where school_profile_id='.$school_admin[0]['employee_school_profile_id'].')')->result_array();
				$count = $this->db->get('employee')->num_rows();

				$cnt = $count+1;
				$user_type = 2;
				$admin_id = $school_admin[0]['employee_school_profile_id'];
				$mobile = $this->input->post('employee_pri_mobile_number');
				$mobile1 = $mobile[5];
				$mobile2 = $mobile[6];
				$mobile3 = $mobile[7];
				$mobile4 = $mobile[8];
				$mobile5 = $mobile[9];
				$username = array($user_type,$admin_id,$cnt,$mobile1,$mobile2,$mobile3,$mobile4,$mobile5);
				$employee_credential['credential_user_type'] = 5;
				$employee_credential['credential_update_date'] = date('Y-m-d');
				
				$employee_credential['credential_username'] = implode($username);
				//random password generate using first character of name and date

				$pas = str_split($this->input->post('employee_first_name'));
				$pass = $pas[0];
				$pas1 = str_split($this->input->post('employee_last_name'));
				$pass1 = $pas1[0];
				$pas2 = $this->input->post('employee_DOB');
				$pas3 = date_format(new Datetime($pas2),"Y/m/d");
				$pas4 = explode("/", $pas3);
				$pass3 =$pas4[0];
				$pass4 =$pas4[1];
				$pass5 =$pas4[2];
				$arr1 = array($pass,$pass4,$pass1,$pass3,$pass5,$pass4);
				$employee_credential1['credential_password1'] = implode($arr1);
				$employee_credential['credential_password'] = md5(implode($arr1));
					
				$number=$employee_employee['employee_pri_mobile_number'];
				$msg = "Hi, \nYour profile has been created with ".$signature[0]['institute_signature'].". \nYour Credential is as follows: \nUsername :".$employee_credential['credential_username']." \nPassword :".$employee_credential1['credential_password1']." \nRegards, \n".$signature[0]['institute_signature'].".";
			
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
				if (empty($employee_employee['employee_email_id'])) {
					$this->email->to(''.$school_admin[0]['school_email_id'].'');
				}else{
					$this->email->to(''.$employee_employee['employee_email_id'].'');
				}
				$this->email->subject('Welcome To Trackmee Authencation Details');
				$this->email->message("Hi,<br>Your profile has been created with ".$signature[0]['institute_signature'].". Your credentials are as follows:<br>  <p> Username: ".$employee_credential['credential_username']."<br> <p>  Password: ".$employee_credential1['credential_password1']."<br><br>   Regards,<br> ".$signature[0]['institute_signature'].".");

				if($this->email->send()){
					if($school_admin[0]['school_authentication_details_sms'] == 1)
					{
						$sms_status = $this->Student_model->sms($number,$msg,$signature[0]['institute_sender_id']);
					}
						
					$employee_profile_id = $this->Employee_model->employee_add($employee_employee);
					$employee_employee_document['doc_user'] = $employee_profile_id[0]['employee_profile_id'];
					$employee_credential['credential_profile_id'] = $employee_profile_id[0]['employee_profile_id'];
					$this->Employee_model->employee_credential($employee_credential);
					$cnt = count($TS_regis['TS_subject_id']);
					for ($i=0; $i < $cnt; $i++) { 
						$TS['TS_employee_profile_id'] = $employee_profile_id[0]['employee_profile_id'];
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
		            $this->session->set_flashdata('title',"Employee Added Successfully.");
		            $this->session->set_flashdata('text',"User credentials are send On his Email ID and Mobile Number."); 
		            $this->session->set_flashdata('type',"success");
					redirect('Employee/view_employee');
				}
				else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Error...");
		            $this->session->set_flashdata('text',"");
		            $this->session->set_flashdata('type',"warning");
					redirect('Employee/view_employee');
				}
			}
		}

		function upload($file,$folder)						
		{
			// $school_admin = $this->session->userdata('school');
			// $datetime = date('Y-m-d\_H:i:s');
			// $employee_type = $school_admin[0]['employee_type'];
			// $file_name = array($datetime,$employee_type);
			// $file = implode("_",$file_name);
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

		function view_employee_details($employee_profile_id)
		{
			$this->session->set_userdata('user_data', $employee_profile_id);
			redirect('Employee/employee_deatails_view');  
		}

		function employee_deatails_view()
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

			$update_employee['flash']['active'] = $this->session->flashdata('active');
        	$update_employee['flash']['title'] = $this->session->flashdata('title');
        	$update_employee['flash']['text'] = $this->session->flashdata('text');
        	$update_employee['flash']['type'] = $this->session->flashdata('type');
        	
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
			$employee_profile_id = $this->session->userdata('user_data');
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$update_employee['update_employee'] = $this->Employee_model->update_employee($employee_profile_id);

			$this->load->view('School/school_header',$admin);
			$this->load->view('Employee/employee_details',$update_employee);
			$this->load->view('Employee/employee_footer',$nav);
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

		function update_employee($employee_profile_id)
		{
			$this->session->set_userdata('user_data', $employee_profile_id);
			redirect('Employee/employee_update');  
		}

		function employee_update()
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
			$employee_profile_id = $this->session->userdata('user_data');
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$update_employee['update_employee'] = $this->Employee_model->update_employee($employee_profile_id);

			$this->load->view('School/school_header',$admin);
			$this->load->view('Employee/update_employee',$update_employee);
			$this->load->view('Employee/employee_footer',$nav);
		}

		function update_employee_details()
		{
			$update_employee = $this->input->post();
			$employee_profile_id = $this->input->post('employee_profile_id');
			$update_employee['employee_update_date'] = date('Y-m-d');
			$con = $this->Employee_model->update_employee_details($update_employee);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Employee not Updated...");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
				$this->session->set_userdata('user_data', $employee_profile_id);
				redirect('Employee/employee_deatails_view');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"employee Information Updated Successfully.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Employee/employee_deatails_view');
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

		function employee_deactive($employee_profile_id)			
		{
			$this->session->set_userdata('employee_deactive',$employee_profile_id);
			redirect('Employee/deactive');
		}

		function deactive()
		{
			$employee_profile_id = $this->session->userdata('employee_deactive');
			$con = $this->Employee_model->deactive($employee_profile_id);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"employee not Deactivated...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Employee/view_employee');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"employee Deactivated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Employee/view_employee');
			}
		}

		function edit_profile(){
			$profile['employee_profile_id'] = $this->input->post('employee_profile_id');
			$employee_profile_id = $this->input->post('employee_profile_id');
			$profile['employee_photo'] = $this->upload('employee_photo', 'profile_photo');
			$cnt = $this->Employee_model->edit_profile($profile);
			if($cnt == 1){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Profile Successfully Updated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				$this->session->set_userdata('user_data', $employee_profile_id);
				redirect('Employee/employee_deatails_view');
			}
		}

		function employee_active($employee_profile_id)			
		{
			$this->session->set_userdata('employee_deactive',$employee_profile_id);
			redirect('Employee/active');
		}

		function active()
		{
			$employee_profile_id = $this->session->userdata('employee_deactive');

			$this->Employee_model->active($employee_profile_id);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"employee not Activated...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Employee/view_employee');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"employee Activated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Employee/view_employee');
			}
		}
	}
?>