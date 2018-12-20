<?php 

	class Teacher extends CI_Controller
	{
		function index()
		{
			if(!isset($this->session->userdata['teacher']))
			{
				redirect('/');
			}
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			} 
			$teacher['flash']['active'] = $this->session->flashdata('active');
        	$teacher['flash']['title'] = $this->session->flashdata('title');
        	$teacher['flash']['text'] = $this->session->flashdata('text');
        	$teacher['flash']['type'] = $this->session->flashdata('type');

			$school_admin = $this->session->userdata('teacher');
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
			
			$teacher['teacher'] = $this->Teacher_model->fetch_teacher_by_session($employee_school_profile_id);
			$this->load->view('Teacher/teacher_header', $admin);
			$this->load->view('Teacher/teacher_dashboard',$teacher);
			$this->load->view('Teacher/teacher_footer',$nav);	
		}

		function view_teacher()
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
			$teacher['flash']['active'] = $this->session->flashdata('active');
        	$teacher['flash']['title'] = $this->session->flashdata('title');
        	$teacher['flash']['text'] = $this->session->flashdata('text');
        	$teacher['flash']['type'] = $this->session->flashdata('type');

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
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);

			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['education'] = 'education';
			
			$teacher['teacher'] = $this->Teacher_model->fetch_teacher_by_session($employee_school_profile_id);
			$this->load->view('School/school_header', $admin);
			$this->load->view('Teacher/view_teacher',$teacher);
			$this->load->view('Teacher/teacher_footer',$nav);	
		}

		function teacher_registration()
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


			$teacher['flash']['active'] = $this->session->flashdata('active');
        	$teacher['flash']['title'] = $this->session->flashdata('title');
        	$teacher['flash']['text'] = $this->session->flashdata('text');
        	$teacher['flash']['type'] = $this->session->flashdata('type');

        	$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$this->load->view('School/school_header',$admin);
			$this->load->view('Teacher/teacher_registration',$teacher);
			$this->load->view('Teacher/teacher_footer', $nav);
		}

		function add_teacher_registration()
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
			$employee_teacher['employee_type'] = 5;
			$employee_teacher['employee_first_name'] = $this->input->post('employee_first_name');
			$employee_teacher['employee_middle_name'] = $this->input->post('employee_middle_name');
			$employee_teacher['employee_last_name'] = $this->input->post('employee_last_name');
			$employee_teacher['employee_gender'] = $this->input->post('employee_gender');
			$employee_teacher['employee_DOB'] = $this->input->post('employee_DOB');
			$employee_teacher['employee_address'] = $this->input->post('employee_address');
			$employee_teacher['employee_pri_mobile_number'] = $this->input->post('employee_pri_mobile_number');
			$employee_teacher['employee_email_id'] = $this->input->post('employee_email_id');
			$employee_teacher['employee_higher_education'] = $this->input->post('employee_higher_education');
			$employee_teacher['employee_experiance'] = $this->input->post('employee_experiance');
			$employee_teacher['employee_photo'] = $this->upload('employee_photo', 'profile_photo');
			$employee_teacher['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$employee_teacher['employee_effective_date'] = date('Y-m-d');


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
			$teacher_credential['credential_user_type'] = 5;
			$teacher_credential['credential_update_date'] = date('Y-m-d');
			
			$teacher_credential['credential_username'] = implode($username);


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
			$teacher_credential1['credential_password1'] = implode($arr1);
			$teacher_credential['credential_password'] = md5(implode($arr1));

			echo "<pre>";
				
			$number=$employee_teacher['employee_pri_mobile_number'];
			$message = "Hi,\nYour profile has been created with ".$signature[0]['institute_signature'].".\nYour Credential are as follows: \nUsername :".$teacher_credential['credential_username']."\nPassword :".$teacher_credential1['credential_password1']."\nRegards,\n".$signature[0]['institute_signature'].".";
			// $message = "Hi,\nYour profile has been created with Trackmee.\nYour credentials are as follows:\nUsername: ".$teacher_credential['credential_username']."\nPassword: ".$teacher_credential1['credential_password1']."\nRegards,\nTeam TrackMee.";
	
		
			// $this->Student_model->sms($number,$msg);

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
			$this->email->from('no-reply@syntech.co.in','School Tracking');
			$this->email->to(''.$employee_teacher['employee_email_id'].'');
			$this->email->subject('Welcome To Trackmee Authencation Details');
			$this->email->message("Hi,<br>Your profile has been created with ".$signature[0]['institute_signature'].". Your credentials are as follows:<br>  <p> Username: ".$teacher_credential['credential_username']."<br> <p>  Password: ".$teacher_credential1['credential_password1']."<br><br>   Regards,<br> ".$signature[0]['institute_signature'].".");

			if($this->email->send()){
				if($this->Institute_model->sms($number,$message)){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"User Added Successfully.");
		            $this->session->set_flashdata('text',"User credentials are send On his Email ID and Mobile Number."); 
		            $this->session->set_flashdata('type',"success");
					
					$employee_profile_id = $this->Teacher_model->teacher_add($employee_teacher);
					$employee_teacher_document['doc_user'] = $employee_profile_id[0]['employee_profile_id'];
					$teacher_credential['credential_profile_id'] = $employee_profile_id[0]['employee_profile_id'];
					$this->Teacher_model->teacher_credential($teacher_credential);
					redirect('teacher/view_teacher');
				}
				else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"SMS Not Send");
		            $this->session->set_flashdata('text',"In Sending Authentinstituteation Details..Please Try ahain");
		            $this->session->set_flashdata('type',"warning");
					redirect('teacher/teacher_registration');	
				}
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
				redirect('teacher/view_teacher');
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
				$user_photo = base_url().'profile_photo/default_teacher_image.png';
				return $user_photo;
			}
			else{
				$upload_files = array('upload_data' => $this->upload->data());

				$user_photo = base_url().'profile_photo/'.$upload_files['upload_data']['file_name'];
				$this->upload->data();

				return $user_photo;
			}
		}

		function view_teacher_details($employee_profile_id)
		{
			$this->session->set_userdata('user_data', $employee_profile_id);
			redirect('Teacher/teacher_deatails_view');  
		}

		function teacher_deatails_view()
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
			$update_teacher['update_teacher'] = $this->Teacher_model->update_teacher($employee_profile_id);

			$this->load->view('School/school_header',$admin);
			$this->load->view('Teacher/teacher_details',$update_teacher);
			$this->load->view('Teacher/teacher_footer',$nav);
		}

		function add_document($employee_profile_id)
		{
			$this->session->set_userdata('user_data', $employee_profile_id);
			redirect('Teacher/teacher_document');  
		}

		function teacher_document()
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
			$teacher['student_profile_id'] = $this->session->userdata('user_data');
			$teacher['document'] = $this->Teacher_model->document_details($teacher);

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
			$this->load->view('Teacher/add_document',$teacher);
			$this->load->view('Teacher/teacher_footer',$nav);
		}

		function add_teacher_document()
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
				redirect('teacher/view_teacher');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Document Submited.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('teacher/view_teacher');
			}
		}

		function update_teacher($employee_profile_id)
		{
			$this->session->set_userdata('user_data', $employee_profile_id);
			redirect('Teacher/add_teacher');  
		}

		function add_teacher()
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
			$update_teacher['update_teacher'] = $this->Teacher_model->update_teacher($employee_profile_id);

			$this->load->view('School/school_header',$admin);
			$this->load->view('Teacher/update_teacher',$update_teacher);
			$this->load->view('Teacher/teacher_footer',$nav);
		}

		function update_teacher_details()
		{
			$update_teacher = $this->input->post();
			$update_teacher['employee_update_date'] = date('Y-m-d');
			$con = $this->Teacher_model->update_teacher_details($update_teacher);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Bus not Added...");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
				redirect('Teacher/view_teacher');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"teacher Information Updated Successfully.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Teacher/view_teacher');
			}
		}

		function upload1($file,$folder)						
		{
			$config = array(
				'upload_path' => 'document/',
				'upload_url' => base_url().'document/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload($file)){
				$upload_files = array('upload_data' => '');
				echo $this->upload->display_errors('<p style="color:#FF0000;">','</p>');die();
			}
			else{
				$upload_files = array('upload_data' => $this->upload->data());
			}

			$user_photo = base_url().'document/'.$upload_files['upload_data']['file_name'];
			$this->upload->data();

			return $user_photo;
		}

		function teacher_deactive($employee_profile_id)			
		{
			$this->session->set_userdata('employee_deactive',$employee_profile_id);
			redirect('Teacher/deactive');
		}

		function deactive()
		{
			$employee_profile_id = $this->session->userdata('employee_deactive');
			// $teacher_assign = $this->teacher_model->teacher_assign($employee_profile_id);
			// if(empty($teacher_assign)){
				$con = $this->Teacher_model->deactive($employee_profile_id);
				if($con != 0){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Error...");
		            $this->session->set_flashdata('text',"Teacher not Deactivated...");
		            $this->session->set_flashdata('type',"warning");
					redirect('teacher/view_teacher');
				}else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Teacher Deactivated.");
		            $this->session->set_flashdata('text',""); 
		            $this->session->set_flashdata('type',"success");
					redirect('teacher/view_teacher');
				}
			// }
			// else{
			// 	$bus_no = $this->db->select('bus_no')->where('bus_id',$teacher_assign[0]['DBR_bus_id'])->get('bus')->result_array();
			// 	$route_name = $this->db->select('route_name')->where('route_no',$teacher_assign[0]['DBR_route_no'])->where('route_type',1)->get('route')->result_array();
			// 	$this->session->set_flashdata('active',1);
	  //           $this->session->set_flashdata('title',"teacher Already Assign to ".$bus_no[0]['bus_no']." AND ".$route_name[0]['route_name']." route.");
	  //           $this->session->set_flashdata('text',"Please Update Assignment");
	  //           $this->session->set_flashdata('type',"warning");
			// 	redirect('teacher_bus_route_assgn/teacher_bus_route_assign');
			// }
		}

		function teacher_active($employee_profile_id)			
		{
			$this->session->set_userdata('employee_deactive',$employee_profile_id);
			redirect('Teacher/active');
		}

		function active()
		{
			$employee_profile_id = $this->session->userdata('employee_deactive');

			$this->Teacher_model->active($employee_profile_id);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Teacher not Activated...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Teacher/view_teacher');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Teacher Activated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Teacher/view_teacher');
			}
		}
	}
 ?>