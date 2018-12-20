<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Driver extends CI_Controller
	{	
		function driver_registration()
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
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);

			$driver['flash']['active'] = $this->session->flashdata('active');
        	$driver['flash']['title'] = $this->session->flashdata('title');
        	$driver['flash']['text'] = $this->session->flashdata('text');
        	$driver['flash']['type'] = $this->session->flashdata('type');

        	$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
        	$nav['transport'] = 'transport';

			$this->load->view('School/school_header',$admin);
			$this->load->view('Driver/driver_registration',$driver);
			$this->load->view('Driver/driver_footer',$nav);
		}

		function view_driver()
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
			$driver_details['flash']['active'] = $this->session->flashdata('active');
        	$driver_details['flash']['title'] = $this->session->flashdata('title');
        	$driver_details['flash']['text'] = $this->session->flashdata('text');
        	$driver_details['flash']['type'] = $this->session->flashdata('type');


			$school_admin = $this->session->userdata('school');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);

			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['transport'] = 'transport';

			$driver_details['driver'] = $this->Driver_model->fetch_driver($employee_school_profile_id);
			
			$this->load->view('School/school_header',$admin);
			$this->load->view('Driver/view_driver',$driver_details);
			$this->load->view('Driver/driver_footer',$nav);
		}

		function add_driver_registration()
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
			$mobile['profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$mobile['mobile'] = $this->input->post('employee_pri_mobile_number');
			$email['profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$email['mail'] = $this->input->post('employee_pri_email_id');
			$license['profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$license['license'] = $this->input->post('employee_licence_number');

			$email_id = $this->Driver_model->already_exits_email($email);
			$mobile_no= $this->Driver_model->already_exits_mobile($mobile);
			$license_no = $this->Driver_model->already_exits_license($license);

			// if($mobile_no != 0){
			// 	$this->session->set_flashdata('active',1);
	  //           $this->session->set_flashdata('title',"Mobile No Already Registered.");
	  //           $this->session->set_flashdata('text',"");
	  //           $this->session->set_flashdata('type',"warning");
			// 	redirect('Driver/driver_registration');
			// }
			// elseif($email_id != 0){
			// 	$this->session->set_flashdata('active',1);
	  //           $this->session->set_flashdata('title',"Email ID Already Registered.");
	  //           $this->session->set_flashdata('text',""); 
	  //           $this->session->set_flashdata('type',"warning");
			// 	redirect('Driver/driver_registration');
			// }
			// elseif ($license_no != 0) {
			// 	$this->session->set_flashdata('active',1);
	  //           $this->session->set_flashdata('title',"License No Already Registered");
	  //           $this->session->set_flashdata('text',""); 
	  //           $this->session->set_flashdata('type',"warning");
			// 	redirect('Driver/driver_registration');
			// }
			// else{
				$employee_driver['employee_type'] = 6;
				$employee_driver['employee_first_name'] = $this->input->post('employee_first_name');
				$employee_driver['employee_middle_name'] = $this->input->post('employee_middle_name');
				$employee_driver['employee_last_name'] = $this->input->post('employee_last_name');
				$employee_driver['employee_gender'] = $this->input->post('employee_gender');
				$employee_driver['employee_DOB'] = $this->input->post('employee_DOB');
				$employee_driver['employee_address'] = $this->input->post('employee_address');
				$employee_driver['employee_pri_mobile_number'] = $this->input->post('employee_pri_mobile_number');
				$employee_driver['employee_email_id'] = $this->input->post('employee_email_id');
				$employee_driver['employee_photo'] = $this->upload('photo', 'profile_photo');
				$employee_driver['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
				$employee_driver['employee_effective_date'] = date('Y-m-d');

				$employee_driver_document['doc_name'] = 'License_copy';
				$employee_driver_document['doc_number'] = $this->input->post('employee_licence_number');
				$employee_driver_document['doc_file'] = $this->upload1('license_photo', 'document');
				$employee_driver_document['doc_effective_date'] = date('Y-m-d');
				$employee_driver_document['doc_user_type'] = '6';
				$employee_driver_document['doc_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];

				print_r($employee_driver);die();
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
				$driver_credential['credential_user_type'] = 6;
				$driver_credential['credential_update_date'] = date('Y-m-d');
				
				$driver_credential['credential_username'] = implode($username);


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
				$driver_credential1['credential_password1'] = implode($arr1);
				$driver_credential['credential_password'] = md5(implode($arr1));

				echo "<pre>";
					
				
				$number=$employee_driver['employee_pri_mobile_number'];
				$message = "Hi,\nYour profile has been created with ".$signature[0]['institute_signature'].".\nYour Credential are as follows: \nUsername :".$driver_credential['credential_username']."\nPassword :".$driver_credential1['credential_password1']."\nRegards,\n".$signature[0]['institute_signature'].".";
				// $message = "Hi,\nYour profile has been created with Trackmee.\nYour credentials are as follows:\nUsername: ".$driver_credential['credential_username']."\nPassword: ".$driver_credential1['credential_password1']."\nRegards,\nTeam TrackMee.";
		
			
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
				$this->email->to(''.$employee_driver['employee_email_id'].'');
				$this->email->subject('Welcome To Trackmee Authencation Details');
				$this->email->message("Hi,<br>Your profile has been created with ".$signature[0]['institute_signature'].". Your credentials are as follows:<br>  <p> Username: ".$driver_credential['credential_username']."<br> <p>  Password: ".$driver_credential1['credential_password1']."<br><br>   Regards,<br> ".$signature[0]['institute_signature']."");

				if($this->email->send()){
					if($this->Institute_model->sms($number,$message)){
						$this->session->set_flashdata('active',1);
			            $this->session->set_flashdata('title',"User Added Successfully.");
			            $this->session->set_flashdata('text',"User credentials are send On his Email ID and Mobile Number."); 
			            $this->session->set_flashdata('type',"success");
						
						$employee_profile_id = $this->Driver_model->driver_add($employee_driver);
						$employee_driver_document['doc_user'] = $employee_profile_id[0]['employee_profile_id'];
						$driver_credential['credential_profile_id'] = $employee_profile_id[0]['employee_profile_id'];
						$this->Driver_model->employee_document($employee_driver_document);
						$this->Driver_model->driver_credential($driver_credential);
						redirect('Driver/view_driver');
					}
					else{
						$this->session->set_flashdata('active',1);
			            $this->session->set_flashdata('title',"SMS Not Send");
			            $this->session->set_flashdata('text',"In Sending Authentinstituteation Details..Please Try ahain");
			            $this->session->set_flashdata('type',"warning");
						redirect('Driver/driver_registration');	
					}
				}
				else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Error...");
		            $this->session->set_flashdata('text',"");
		            $this->session->set_flashdata('type',"warning");
					redirect('Driver/view_driver');
				}
			// }
		}

		function upload($file,$folder)						
		{
			$config = array(
				'upload_path' => 'profile_photo/',
				'upload_url' => base_url().'profile_photo/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload($file)){
				$user_photo = base_url().'profile_photo/default_driver_image.png';
				return $user_photo;
			}
			else{
				$upload_files = array('upload_data' => $this->upload->data());
				$user_photo = base_url().'profile_photo/'.$upload_files['upload_data']['file_name'];
				$this->upload->data();
				return $user_photo;
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
				$user_photo = base_url().'document/default_driver_licence_image.png';
				return $user_photo;
			}
			else{
				$upload_files = array('upload_data' => $this->upload->data());

				$user_photo = base_url().'document/'.$upload_files['upload_data']['file_name'];
				$this->upload->data();

				return $user_photo;
			}
		}

		function view_driver_details($employee_profile_id)
		{
			$this->session->set_userdata('user_data', $employee_profile_id);
			redirect('Driver/driver_deatails_view');  
		}

		function driver_deatails_view()
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
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['transport'] = 'transport';
			$employee_profile_id = $this->session->userdata('user_data');
			// print_r($id);
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$update_driver['update_driver'] = $this->Driver_model->update_driver($employee_profile_id);

			$this->load->view('School/school_header',$admin);
			$this->load->view('Driver/driver_details',$update_driver);
			$this->load->view('Driver/driver_footer',$nav);
		}

		function add_document($employee_profile_id)
		{
			$this->session->set_userdata('user_data', $employee_profile_id);
			redirect('Driver/driver_document');  
		}

		function driver_document()
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
			$student['student_profile_id'] = $this->session->userdata('user_data');
			$student['document'] = $this->Driver_model->document_details($student);

			$school_admin = $this->session->userdata('school');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['transport'] = 'transport';
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			
			$this->load->view('School/school_header',$admin);
			$this->load->view('Driver/add_document',$student);
			$this->load->view('Driver/driver_footer',$nav);
		}

		function add_driver_document()
		{
			$school_admin = $this->session->userdata('school');
			$document['doc_name'] = $this->input->post('doc_name');
			$document['doc_number'] = $this->input->post('doc_number');
			$document['doc_file'] = $this->upload1('doc_file','document');
			$document['doc_effective_date'] = date('Y-m-d');
			$document['doc_user'] = $this->input->post('employee_profile_id');
			$document['doc_user_type'] = '6';
			$document['doc_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$con = $this->Student_model->student_document($document);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Document not Sumbited...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Driver/view_driver');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Document Submited.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Driver/view_driver');
			}
		}

		function update_driver($employee_profile_id)
		{
			$this->session->set_userdata('user_data', $employee_profile_id);
			redirect('Driver/add_driver');  
		}

		function add_driver()
		{
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
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['transport'] = 'transport';
			$employee_profile_id = $this->session->userdata('user_data');
			// print_r($id);
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$update_driver['update_driver'] = $this->Driver_model->update_driver($employee_profile_id);

			$this->load->view('School/school_header',$admin);
			$this->load->view('Driver/update_driver_details',$update_driver);
			$this->load->view('Driver/driver_footer',$nav);
		}

		function update_driver_details()
		{
			$update_driver = $this->input->post();
			$update_driver['employee_update_date'] = date('Y-m-d');
			// print_r($data);
			$con = $this->Driver_model->update_driver_details($update_driver);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Bus not Added...");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
				redirect('Driver/view_driver');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Driver Information Updated Successfully.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Driver/view_driver');
			}
		}

		function driver_deactive($employee_profile_id)			
		{
			$this->session->set_userdata('employee_deactive',$employee_profile_id);
			redirect('Driver/deactive');
		}

		function deactive()
		{
			$employee_profile_id = $this->session->userdata('employee_deactive');
			$driver_assign = $this->Driver_model->driver_assign($employee_profile_id);
			if(empty($driver_assign)){
				$con = $this->Driver_model->deactive($employee_profile_id);
				if($con != 0){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Error...");
		            $this->session->set_flashdata('text',"Driver not Deactivated...");
		            $this->session->set_flashdata('type',"warning");
					redirect('Driver/view_driver');
				}else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Driver Deactivated.");
		            $this->session->set_flashdata('text',""); 
		            $this->session->set_flashdata('type',"success");
					redirect('Driver/view_driver');
				}
			}
			else{
				$bus_no = $this->db->select('bus_no')->where('bus_id',$driver_assign[0]['DBR_bus_id'])->get('bus')->result_array();
				$route_name = $this->db->select('route_name')->where('route_no',$driver_assign[0]['DBR_route_no'])->where('route_type',1)->get('route')->result_array();
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Driver Already Assign to ".$bus_no[0]['bus_no']." AND ".$route_name[0]['route_name']." route.");
	            $this->session->set_flashdata('text',"Please Update Assignment");
	            $this->session->set_flashdata('type',"warning");
				redirect('Driver_bus_route_assgn/driver_bus_route_assign');
			}
		}

		function driver_active($employee_profile_id)			
		{
			$this->session->set_userdata('employee_deactive',$employee_profile_id);
			redirect('Driver/active');
		}

		function active()
		{
			$employee_profile_id = $this->session->userdata('employee_deactive');

			$this->Driver_model->active($employee_profile_id);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Driver not Activated...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Driver/view_driver');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Driver Activated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Driver/view_driver');
			}
		}

		function already_exits_mobile()
		{	
			$school_admin = $this->session->userdata('school');
			$mobile['profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$mobile['mobile'] = $_POST['num'];
			$data = $this->Driver_model->already_exits_mobile($mobile);
			echo json_decode($data);
		}

		function already_exits_email()
		{	
			$school_admin = $this->session->userdata('school');
			$email['profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$email['mail(to, subject, message)'] = $_POST['email'];
			$data = $this->Driver_model->already_exits_email($email);
			echo json_decode($data);
		}

		function already_exits_license()
		{
			$school_admin = $this->session->userdata('school');
			$license['profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$license['license'] = $_POST['license'];
			$data = $this->Driver_model->already_exits_license($license);
			echo json_decode($data);
		}
	}
 ?>