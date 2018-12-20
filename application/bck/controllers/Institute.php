<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class institute extends CI_Controller {

	function index()
	{
		if(!isset($this->session->userdata['Institute']))
		{
			redirect('/');
		} 
		$institute_admin = $this->session->userdata('Institute');
		$institute['flash']['active'] = $this->session->flashdata('active');
    	$institute['flash']['title'] = $this->session->flashdata('title');
    	$institute['flash']['text'] = $this->session->flashdata('text');
    	$institute['flash']['type'] = $this->session->flashdata('type');
		
		$admin['user'] = $institute_admin[0]['employee_pri_mobile_number'];
		$admin['photo'] = $institute_admin[0]['employee_photo'];
		$admin['first_name'] = $institute_admin[0]['employee_first_name'];
		$admin['last_name'] = $institute_admin[0]['employee_last_name'];
		$admin['email_id'] = $institute_admin[0]['employee_email_id'];
		$admin['username'] = $institute_admin[0]['credential_username'];
		$nav['institute_name'] = $institute_admin[0]['institute_name'];
		$nav['institute_logo'] = $institute_admin[0]['institute_logo'];
		$nav['insti_admin'] = "dashboard";
		$this->load->view('Institute/institute_header', $admin);
		$this->load->view('Institute/institute_dashboard',$institute);
		$this->load->view('School/school_footer',$nav);
		
	}
	function institute_registration()
	{
		if(!isset($this->session->userdata['super_admin']))
		{ 
			redirect('/'); 
		} 

		$super_admin = $this->session->userdata('super_admin');
		$admin['user'] = $super_admin[0]['employee_pri_mobile_number'];
		$admin['photo'] = $super_admin[0]['employee_photo'];
		$admin['first_name'] = $super_admin[0]['employee_first_name'];
		$admin['last_name'] = $super_admin[0]['employee_last_name'];
		$admin['email_id'] = $super_admin[0]['employee_email_id'];
		$admin['username'] = $super_admin[0]['credential_username'];

		$nav['super_admin'] = "institute";
		$this->load->view('Dashboard/header', $admin);
		$this->load->view('Institute/institute_registration');
		$this->load->view('Dashboard/footer',$nav);		
	}

	function institute_Details()
	{
		if(!isset($this->session->userdata['super_admin']))
		{ 
			redirect('/'); 
		} 
		$super_admin = $this->session->userdata('super_admin');

		$institute['flash']['active'] = $this->session->flashdata('active');
    	$institute['flash']['title'] = $this->session->flashdata('title');
    	$institute['flash']['text'] = $this->session->flashdata('text');
    	$institute['flash']['type'] = $this->session->flashdata('type');
	
		$admin['user'] = $super_admin[0]['employee_pri_mobile_number'];
		$admin['photo'] = $super_admin[0]['employee_photo'];
		$admin['first_name'] = $super_admin[0]['employee_first_name'];
		$admin['last_name'] = $super_admin[0]['employee_last_name'];
		$admin['email_id'] = $super_admin[0]['employee_email_id'];
		$admin['username'] = $super_admin[0]['credential_username'];
		$admin['photo'] = $super_admin[0]['employee_photo'];
		$institute['institute'] = $this->Institute_model->view(); 
		$institute['all_employee'] = $this->db->query("SELECT employee.*,institute_name from employee join institute on institute_profile_id = employee_school_profile_id where employee_type = 2")->result_array(); 
		$institute['all_institute'] = $this->db->query("SELECT * from institute")->result_array(); 
		// print_r($institute['all_employee']);die();
		$nav['super_admin'] = "institute";
		$this->load->view('Dashboard/header', $admin);
		$this->load->view('Institute/institute_details', $institute);
		$this->load->view('Dashboard/footer',$nav);
	}



	 function new_institute_registration(){

		$super_admin = $this->session->userdata('super_admin');

		$admin['user'] = $super_admin[0]['employee_pri_mobile_number'];
		
		$institute_details['institute_logo'] = $this->upload('institute_logo', 'profile_photo');
		$institute_details['institute_name'] = $this->input->post('institute_name');
		$institute_details['institute_address'] = $this->input->post('institute_address');
		$institute_details['institute_mobile_number'] = $this->input->post('institute_mobile_number');
		$institute_details['institute_phone_number'] = $this->input->post('institute_phone_number');
		$institute_details['institute_email_id'] = $this->input->post('institute_email_id');
		$institute_details['institute_sender_id'] = $this->input->post('institute_sender_id');
		$institute_details['institute_signature'] = $this->input->post('institute_signature');
		$tracking = $this->input->post('institute_tracking');
		if($tracking == 'on'){
			$institute_details['institute_tracking'] = "1";
		}else{
			$institute_details['institute_tracking'] = "0";
		}
		$CRM = $this->input->post('institute_CRM');
		if($CRM == 'on'){
			$institute_details['institute_CRM'] = "1";
		}else{
			$institute_details['institute_CRM'] = "0";
		}
		$stop_SMS = $this->input->post('institute_stop_sms');
		if($stop_SMS == 'on'){
			$institute_details['institute_stop_sms'] = "1";
		}else{
			$institute_details['institute_stop_sms'] = "0";
		}
		$school_sms = $this->input->post('institute_school_sms');
		if($school_sms == 'on'){
			$institute_details['institute_school_sms'] = "1";
		}else{
			$institute_details['institute_school_sms'] = "0";
		}
		$institute_details['institute_effective_date'] = date('Y-m-d');
		$verify = $this->db->query("SELECT * FROM `institute` where institute_name='".$institute_details['institute_name']."' and institute_email_id='".$institute_details['institute_email_id']."' and institute_phone_number='".$institute_details['institute_phone_number']."' and institute_expiry_date = '9999-12-31'")->num_rows();
		if($verify != 0){
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Institute Already Registered.");
            $this->session->set_flashdata('text',""); 
            $this->session->set_flashdata('type',"success");
			redirect('Institute/institute_Details');
		}
		else{
			$institute_registration = $this->Institute_model->institute_registration($institute_details);

			// $data = $this->session->set_userdata('institute_profile_id', $institute_profile_id);
			if($institute_registration == 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"institute Added Successfully.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Institute/institute_Details');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Not Added...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Institute/institute_Details');
	        }
	    }
	}

	function institute_user($institute_profile_id)
	{
		$this->session->set_userdata('institute_id', $institute_profile_id);
		redirect('Institute/institute_new_user');
	}

	function institute_new_user()
	{
		if(!isset($this->session->userdata['super_admin']))
		{ 
			redirect('/'); 
		} 
		$institute_user['flash']['active'] = $this->session->flashdata('active');
    	$institute_user['flash']['title'] = $this->session->flashdata('title');
    	$institute_user['flash']['text'] = $this->session->flashdata('text');
    	$institute_user['flash']['type'] = $this->session->flashdata('type');

		$institute_profile_id = $this->session->userdata('institute_id');
		$super_admin = $this->session->userdata('super_admin');
		$admin['user'] = $super_admin[0]['employee_pri_mobile_number'];
		$admin['first_name'] = $super_admin[0]['employee_first_name'];
		$admin['last_name'] = $super_admin[0]['employee_last_name'];
		$admin['email_id'] = $super_admin[0]['employee_email_id'];
		$admin['username'] = $super_admin[0]['credential_username'];
		$institute_user['institute'] = $this->Institute_model->institute_details($institute_profile_id);
		$institute_user['institute_user'] = $this->Institute_model->user_details($institute_profile_id);	
		$nav['super_admin'] = "institute";
		$this->load->view('Dashboard/header',$admin);
		$this->load->view('Institute/institute_users_details', $institute_user);
		$this->load->view('Dashboard/footer',$nav);
	}

	function update_institute_details($institute_profile_id)
	{
		$this->session->set_userdata('institute_details_update', $institute_profile_id);
		redirect('institute/update_institute');
	}

	function update_institute()
	{
		if(!isset($this->session->userdata['super_admin']))
		{ 
			redirect('/'); 
		} 
		$institute_profile_id = $this->session->userdata('institute_details_update');
		$super_admin = $this->session->userdata('super_admin');
		$admin['user'] = $super_admin[0]['employee_pri_mobile_number'];
		$admin['first_name'] = $super_admin[0]['employee_first_name'];
		$admin['last_name'] = $super_admin[0]['employee_last_name'];
		$admin['email_id'] = $super_admin[0]['employee_email_id'];
		$admin['username'] = $super_admin[0]['credential_username'];
		$institute_update['institute'] = $this->Institute_model->fetch_institute_details($institute_profile_id);
		$nav['super_admin'] = "institute";
		$this->load->view('Dashboard/header',$admin);
		$this->load->view('Institute/update_institute_details', $institute_update);
		$this->load->view('Dashboard/footer',$nav);
	}

	function update_details_institute()
	{
		$institute_update = $this->input->post();
		$tracking = $this->input->post('institute_tracking');
		if($tracking == 'on'){
			$institute_update['institute_tracking'] = "1";
		}else{
			$institute_update['institute_tracking'] = "0";
		}
		$CRM = $this->input->post('institute_CRM');
		if($CRM == 'on'){
			$institute_update['institute_CRM'] = "1";
		}else{
			$institute_update['institute_CRM'] = "0";
		}
		$stop_SMS = $this->input->post('institute_stop_sms');
		if($stop_SMS == 'on'){
			$institute_update['institute_stop_sms'] = "1";
		}else{
			$institute_update['institute_stop_sms'] = "0";
		}
		$school_sms = $this->input->post('institute_school_sms');
		if($school_sms == 'on'){
			$institute_update['institute_school_sms'] = "1";
		}else{
			$institute_update['institute_school_sms'] = "0";
		}
		$institute_update['institute_update_date'] = date('Y-m-d');
		$con = $this->Institute_model->update_details_institute($institute_update);
		if($con == 0){
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Details Updated.");
            $this->session->set_flashdata('text',"institute Details are Successfully Updated"); 
            $this->session->set_flashdata('type',"success");
			redirect('institute/institute_new_user');	
		}
		else{
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Error...");
            $this->session->set_flashdata('text',"Not Added...");
            $this->session->set_flashdata('type',"warning");
			redirect('institute/institute_new_user');	
		}
	}

	function institute_deactive($institute_profile_id){
		$this->session->set_userdata('institute_deactive', $institute_profile_id);
		redirect('institute/institute_disable');
	}

	function institute_disable()
	{
		$institute_disable['institute_profile_id'] = $this->session->userdata('institute_deactive');
		$institute_disable['institute_expiry_date'] = date('Y-m-d');

		$con = $this->Institute_model->institute_disable($institute_disable);
		if($con != 0){
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Error...");
            $this->session->set_flashdata('text',"");
            $this->session->set_flashdata('type',"warning");
			redirect('institute/institute_Details');
		}else{
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"institute Deactivated.");
            $this->session->set_flashdata('text',""); 
            $this->session->set_flashdata('type',"success");
			redirect('institute/institute_Details');
		}
	}

	function institute_active($institute_profile_id){
		$this->session->set_userdata('institute_active', $institute_profile_id);
		redirect('institute/institute_enable');
	}

	function institute_enable()
	{
		$institute_enable['institute_profile_id'] = $this->session->userdata('institute_active');
		$institute_enable['institute_expiry_date'] = '9999-12-31';

		$con = $this->Institute_model->institute_enable($institute_enable);
		if($con != 0){
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Error...");
            $this->session->set_flashdata('text',"");
            $this->session->set_flashdata('type',"warning");
			redirect('institute/institute_Details');
		}else{
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"institute Activated.");
            $this->session->set_flashdata('text',""); 
            $this->session->set_flashdata('type',"success");
			redirect('institute/institute_Details');
		}
	}

	function add_institute_user()
	{
		$super_admin = $this->session->userdata('super_admin');
		$admin['user'] = $super_admin[0]['employee_pri_mobile_number'];

		$num['profile_id'] = $this->input->post('institute_profile_id');
		$num['mobile'] = $this->input->post('employee_pri_mobile_number');
		$mobile = $this->Institute_model->already_exits_mobile($num);

		$email['profile_id'] = $this->input->post('institute_profile_id');
		$email['mail'] = $this->input->post('employee_email_id');
		$email_id = $this->Institute_model->already_exits_email($email);

		if ($mobile != 0) {

			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Mobile No Already Registered.");
            $this->session->set_flashdata('text',"");
            $this->session->set_flashdata('type',"warning");
			redirect('institute/institute_new_user');
		}
		// elseif($email_id != 0){

		// 	$this->session->set_flashdata('active',1);
  //           $this->session->set_flashdata('title',"Email ID Already Registered.");
  //           $this->session->set_flashdata('text',""); 
  //           $this->session->set_flashdata('type',"warning");
		// 	redirect('institute/institute_new_user');
		// }
		else{
			$institute_employee['employee_type'] = 2;
			$institute_employee['employee_photo'] = $this->upload('employee_photo', 'profile_photo');
			$institute_employee['employee_first_name'] = $this->input->post('employee_first_name');
			$institute_employee['employee_middle_name'] = $this->input->post('employee_middle_name');
			$institute_employee['employee_last_name'] = $this->input->post('employee_last_name');
			$institute_employee['employee_address'] = $this->input->post('employee_address');
			$institute_employee['employee_DOB'] = $this->input->post('employee_DOB');
			$institute_employee['employee_gender'] = $this->input->post('employee_gender');
			$institute_employee['employee_higher_education'] = $this->input->post('employee_higher_education');
			$institute_employee['employee_experiance'] = $this->input->post('employee_experiance');
			$institute_employee['employee_pri_mobile_number'] = $this->input->post('employee_pri_mobile_number');
			$institute_employee['employee_email_id'] = $this->input->post('employee_email_id');
			$institute_employee['employee_effective_date'] = date('Y-m-d');
			$institute_employee['employee_school_profile_id'] = $this->input->post('institute_profile_id');
			$institute_details['institute_name'] = $this->input->post('institute_name');
			
			$count = $this->db->get('employee')->num_rows();

			$cnt = $count+1;
			$user_type = 2;
			$admin_id = $this->input->post('institute_profile_id');
			$mobile = $this->input->post('employee_pri_mobile_number');
			$mobile1 = $mobile[5];
			$mobile2 = $mobile[6];
			$mobile3 = $mobile[7];
			$mobile4 = $mobile[8];
			$mobile5 = $mobile[9];
			$username = array($user_type,$admin_id,$cnt,$mobile1,$mobile2,$mobile3,$mobile4,$mobile5);
			$institute_credential['credential_username'] = implode($username);

			$institute_credential['credential_user_type'] = 2;
			$institute_credential['credential_update_date'] = date('Y-m-d');

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
			$institute_credential1['credential_password1'] = implode($arr1);
			$institute_credential['credential_password'] = md5($institute_credential1['credential_password1']); 

			// sending SMS Code
			$message = "Hi,\nYour profile has been created with TrackMee.\nYour Credential are as follows:\nUsername :".$institute_credential['credential_username']."\nPassword :".$institute_credential1['credential_password1']."\nRegards,\nTeam TrackMee.";
			$no = $institute_employee['employee_pri_mobile_number'];
            
            // Sending Mail Code
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
			$this->email->from('no-reply@trackmee.syntech.co.in',''.$institute_details['institute_name'].'');
			$this->email->to(''.$institute_employee['employee_email_id'].'');
			$this->email->subject('Welcome To '.$institute_details['institute_name'].'');
			$this->email->message("Hi,<br>Your profile has been created with ".$institute_details['institute_name'].". Your credentials are as follows:<br>    Username: ".$institute_credential['credential_username']."<br>   Password: ".$institute_credential1['credential_password1']."<br><br>Regards,<br>Team TrackMee");

			if($this->email->send()){
				if($this->Institute_model->sms($no,$message)){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"User Added Successfully.");
		            $this->session->set_flashdata('text',"User credentials are send On his Email ID and Mobile Number."); 
		            $this->session->set_flashdata('type',"success");

		            $employee_profile_id = $this->Institute_model->add_institute_user($institute_employee);

					$institute_credential['credential_profile_id'] = $employee_profile_id[0]['employee_profile_id'];
					$this->Institute_model->institute_employee_credentials($institute_credential);
					// $data456 = $this->session->set_userdata('institute_user', $user_profile_id1);
					redirect('institute/institute_new_user');
				}
				else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"SMS Not Send");
		            $this->session->set_flashdata('text',"In Sending Authentinstituteation Details..Please Try ahain");
		            $this->session->set_flashdata('type',"warning");
		            echo $this->email->print_debugger();
					redirect('institute/institute_new_user');	
				}
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Mail Not Send");
	            $this->session->set_flashdata('text',"In Sending Authentinstituteation Details..Please Try ahain");
	            $this->session->set_flashdata('type',"warning");
	            echo $this->email->print_debugger();
				redirect('institute/institute_new_user');	
			}
		}
	}

	function update_institute_user($employee_profile_id)
	{
		+$this->session->set_userdata('employee_profile_id', $employee_profile_id);
		redirect('institute/update_user');
	}

	function update_user()
	{
		if(!isset($this->session->userdata['super_admin']))
		{ 
			redirect('/'); 
		} 
		$employee_profile_id = $this->session->userdata('employee_profile_id');
		$super_admin = $this->session->userdata('super_admin');
		$admin['user'] = $super_admin[0]['employee_pri_mobile_number'];
		$admin['user'] = $super_admin[0]['employee_pri_mobile_number'];
		$admin['first_name'] = $super_admin[0]['employee_first_name'];
		$admin['last_name'] = $super_admin[0]['employee_last_name'];
		$admin['email_id'] = $super_admin[0]['employee_email_id'];
		$admin['username'] = $super_admin[0]['credential_username'];
		$institute_user['institute_user'] = $this->Institute_model->user_fetch($employee_profile_id);
		$nav['super_admin'] = "institute";
		$this->load->view('Dashboard/header',$admin);
		$this->load->view('Institute/update_institute_user', $institute_user);
		$this->load->view('Dashboard/footer',$nav);
	}

	function disable_institute_employee($employee_profile_id)
	{
		$this->session->set_userdata('employee_disable', $employee_profile_id);
		redirect('institute/disable_employee_institute');			
	}	

	function disable_employee_institute()
	{
		$institute_disable['employee_profile_id'] = $this->session->userdata('employee_disable');
		$institute_disable['employee_expiry_date'] = date('Y-m-d');
		// print_r($data);die();
		$con = $this->Institute_model->institute_employee_disable($institute_disable);
		if($con != 0){
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Error...");
            $this->session->set_flashdata('text',"");
            $this->session->set_flashdata('type',"warning");
			redirect('institute/update_user');
		}else{
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"employee Deativated.");
            $this->session->set_flashdata('text',""); 
            $this->session->set_flashdata('type',"success");
			redirect('institute/update_user');
		}
	}

	function enable_institute_employee($employee_profile_id)
	{
		$this->session->set_userdata('employee_enable', $employee_profile_id);
		redirect('institute/enable_employee_institute');			
	}	

	function enable_employee_institute()
	{
		$institute_enable['employee_profile_id'] = $this->session->userdata('employee_enable');
		$institute_enable['employee_expiry_date'] = '9999-12-31';
		// print_r($institute_enable);die();
		$con = $this->Institute_model->institute_employee_enable($institute_enable);
		if($con != 0){
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Error...");
            $this->session->set_flashdata('text',"");
            $this->session->set_flashdata('type',"warning");
			redirect('institute/update_user');
		}else{
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Employee Activated.");
            $this->session->set_flashdata('text',""); 
            $this->session->set_flashdata('type',"success");
			redirect('institute/update_user');
		}
	}
	function activate_institute($institute_profile_id){
		$this->session->set_userdata('activated_institute',$institute_profile_id);
		redirect('Institute/institute_activate');
	}

	function institute_activate(){
		if(!isset($this->session->userdata['super_admin']))
		{
			redirect('/');
		}
		else{
			$admin['direct'] = 1;
		}  
		$school_admin = $this->session->userdata('super_admin');
		$institute_profile_id = $this->session->userdata('activated_institute');	
		// print_r($school_profile_id);die();
		$data = $this->Institute_model->institute_activate($institute_profile_id);
		if($data == 1){
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Institute Activated.");
	        $this->session->set_flashdata('text',""); 
	        $this->session->set_flashdata('type',"success");	
			redirect('Institute/institute_Details');
		}else{
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Institute Not Activated.");
	        $this->session->set_flashdata('text',"warning"); 
	        $this->session->set_flashdata('type',"success");	
			redirect('Institute/institute_Details');
		}
	}

	function deactivate_institute($institute_profile_id){
		$this->session->set_userdata('deactivated_institute',$institute_profile_id);
		redirect('Institute/institute_deactivate');
	}

	function institute_deactivate(){
		if(!isset($this->session->userdata['super_admin']))
		{
			redirect('/');
		}
		else{
			$admin['direct'] = 1;
		}  
		$institute_admin = $this->session->userdata('super_admin');
		$institute_profile_id = $this->session->userdata('deactivated_institute');	
		// print_r($school_profile_id);die();
		$data = $this->Institute_model->institute_deactivate($institute_profile_id);
		if($data == 1){
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Institute Deactivated.");
            $this->session->set_flashdata('text',""); 
            $this->session->set_flashdata('type',"success");	
			redirect('Institute/institute_Details');
		}else{
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Institute Not Deactivated.");
            $this->session->set_flashdata('text',"warning"); 
            $this->session->set_flashdata('type',"success");	
			redirect('Institute/institute_Details');
		}
	}

	function upload($file, $folder)
	{	
		$config = array(
			'upload_path' => 'profile_photo/',
			'upload_url' => base_url() .'profile_photo/',
			'allowed_types' => 'jpg|jpeg|png|gif',
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

	function already_exits_mobile()
	{
		$num['profile_id'] = $_POST['profile'];
		$num['mobile'] = $_POST['num'];
		$data = $this->Institute_model->already_exits_mobile($num);
		echo json_decode($data);
	}

	function already_exits_email()
	{
		$email['profile_id'] =  $_POST['profile'];
		$email['mail'] = $_POST['email'];
		$data = $this->Institute_model->already_exits_email($email);
		echo json_decode($data);
	}

	function forgot_password()
	{	
		if(!isset($this->session->userdata['Institute']))
		{ 
			redirect('/'); 
		} 
		$institude_admin = $this->session->userdata('Institute');
		$admin['user'] = $institude_admin[0]['employee_pri_mobile_number'];
		$admin['user_profile_id'] = $institude_admin[0]['employee_profile_id'];
		$admin['photo'] = $institude_admin[0]['employee_photo'];
		$admin['first_name'] = $institude_admin[0]['employee_first_name'];
		$admin['last_name'] = $institude_admin[0]['employee_last_name'];
		$admin['email_id'] = $institude_admin[0]['employee_email_id'];
		$admin['username'] = $institude_admin[0]['credential_username'];
		$nav['super_admin'] = "institute";
		$this->load->view('Institute/institute_header',$admin);
		$this->load->view('Institute/forgot_password',$admin);
		$this->load->view('Dashboard/footer',$nav);
	}

	function institute_change_password()
	{
		$institute_admin = $this->session->userdata('Institute');
		$employee_password['credential_profile_id'] = $this->input->post('employee_profile_id');
		$institute_employee['employee_email_id'] = $institute_admin[0]['employee_email_id'];
		$institute_employee['employee_mobile_number'] = $institute_admin[0]['employee_pri_mobile_number'];
		$employee_password['credential_password'] = md5($this->input->post('password'));
		$institute_employee['credential_password1'] = $this->input->post('password');
		$employee_password['credential_update_date'] = date('Y-m-d');

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
		$this->email->from('ino-replt@trackmee.syntech.co.in');	
		$this->email->to(''.$institute_employee['employee_email_id'].'');
		$this->email->subject('Updated Authencation Details');
		$this->email->message("Hi,<br>Your profile has been created with System Your credentials Password Updated are as follows:<br> <p>  Password: ".$institute_employee['credential_password1']."<br><br>  Thanks & Regards,<br>  ");

		if($this->email->send()){

			$this->Institute_model->forgot_password($employee_password);
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Password Updated.");
	        $this->session->set_flashdata('text',"Updated password are also send On Email ID."); 
	        $this->session->set_flashdata('type',"success");
			redirect('institute');	
		}
		else{
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Error...");
	        $this->session->set_flashdata('text',"Not Added...");
	        $this->session->set_flashdata('type',"warning");
			redirect('institute');	
		}
	}
	function edit_profile()
	{
		if(!isset($this->session->userdata['Institute']))
		{ 
			redirect('/'); 
		} 
		$institude_admin = $this->session->userdata('Institute');
		$admin['user'] = $institude_admin[0]['employee_pri_mobile_number'];
		$admin['user_profile_id'] = $institude_admin[0]['employee_profile_id'];
		$admin['photo'] = $institude_admin[0]['employee_photo'];
		$admin['first_name'] = $institude_admin[0]['employee_first_name'];
		$admin['last_name'] = $institude_admin[0]['employee_last_name'];
		$admin['email_id'] = $institude_admin[0]['employee_email_id'];
		$admin['username'] = $institude_admin[0]['credential_username'];

		$nav['super_admin'] = "institute";
		$institute_employee['user_details'] = $this->School_model->user_profile($admin);

		$this->load->view('Institute/institute_header',$admin);
		$this->load->view('Institute/edit_profile',$institute_employee);
		$this->load->view('Dashboard/footer',$nav);
	}


	function update_user_details()
	{
		$employee_update = $this->input->post();
		$employee_update['employee_update_date'] = date('Y-m-d');
		$con = $this->Institute_model->update_user_details($employee_update);
		if($con == 0){
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"User Profile Updated.");
            $this->session->set_flashdata('text',""); 
            $this->session->set_flashdata('type',"success");
			redirect('institute');
		}else{
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Error");
            $this->session->set_flashdata('text',"");
            $this->session->set_flashdata('type',"warning");
			redirect('institute');
		}
	}


	function institute_user_details()
	{
		$data45 = $this->session->userdata('super_admin');
		$data456['user'] = $data45['employee_pri_mobile_number'];
		$data456['user_profile_id'] = $data45['user_profile_id'];

		$data['institute'] = $this->session->userdata('institute_profile_id');
		$data['institute_user'] = $this->session->userdata('institute_user');
		$nav['super_admin'] = "institute";
		$this->load->view('Dashboard/header',$data456);
		$this->load->view('Institute/institute_new_user', $data);
		$this->load->view('Dashboard/footer',$nav);
	}


	function institute_Details_Update_1()
	{
		$data['user_username'] = $this->input->post('user_username');
		$data['user_email_id'] = $this->input->post('user_email_id');
		$data['user_mobile_number'] = $this->input->post('user_mobile_number');
		$data['user_password'] = md5($this->input->post('user_password'));
		
		$data['user_photo'] = $this->upload('user_photo', 'profile_photo');

		$this->Institute_model->update($data,$data['user_profile_id']);
		redirect('Admin');
	}
	
	
	function institute_details_update($id)
	{
		$data['update'] = $this->Institute_model->fetch_edit($id);
		
		$id = $this->session->set_userdata('userdata', $data);
		redirect('institute/institute_details_update1');
	}

	function institute_details_update1()
	{
		if(!isset($this->session->userdata['super_admin']))
		{ 
			redirect('/'); 
		} 
		$data1 = $this->session->userdata('userdata');
		$nav['super_admin'] = "institute";
		$this->load->view('Dashboard/header', $data1);
		$this->load->view('Institute/institute_details_update',$data1);
		$this->load->view('Dashboard/footer',$nav);

	}

	function add_new_user1($institute_profile_id)
	{
		$this->session->set_userdata('institute_id', $institute_profile_id);
		redirect('institute/add_new_user');
	}

	function add_new_user()
	{
		$institute_profile_id = $this->session->userdata('institute_id');
		$data45 = $this->session->userdata('super_admin');
		$data1['user'] = $data45['employee_pri_mobile_number'];
		$data['institute_user'] = $this->Institute_model->user_details($institute_profile_id);
		$data['institute'] = $this->Institute_model->institute_details($institute_profile_id);
		$nav['super_admin'] = "institute";
		$this->load->view('Dashboard/header',$data1);
		$this->load->view('Institute/institute_new_user', $data);
		$this->load->view('Dashboard/footer',$nav);
	}

	function update_institute_logo()
	{
		$data['institute_profile_id'] = $this->input->post('institute_profile_id');
		$data['institute_logo'] = $this->upload('institute_logo', 'profile_photo');
		$data['institute_update_date'] = date('Y-m-d');
		$con = $this->Institute_model->update_institute_logo($data);
		// print_r($data);die();
		$this->session->set_userdata('institude_id',$data['institute_profile_id']);
		if($con == 0){
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"institute Logo Updated.");
            $this->session->set_flashdata('text',""); 
            $this->session->set_flashdata('type',"success");	
			redirect('institute/institute_new_user');
		}
		else{
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Error...");
            $this->session->set_flashdata('text',"Not Added...");
            $this->session->set_flashdata('type',"warning");	
			redirect('institute/institute_new_user');
		}
	}

	function view_acadmic_year()
	{
		$school_details['flash']['active'] = $this->session->flashdata('active');
    	$school_details['flash']['title'] = $this->session->flashdata('title');
    	$school_details['flash']['text'] = $this->session->flashdata('text');
    	$school_details['flash']['type'] = $this->session->flashdata('type');
		$super_admin = $this->session->userdata('super_admin');
		$admin['user'] = $super_admin[0]['employee_pri_mobile_number'];
		$admin['user_profile_id'] = $super_admin[0]['employee_profile_id'];
		$admin['photo'] = $super_admin[0]['employee_photo'];
		$admin['first_name'] = $super_admin[0]['employee_first_name'];
		$admin['last_name'] = $super_admin[0]['employee_last_name'];
		$admin['email_id'] = $super_admin[0]['employee_email_id'];
		$admin['username'] = $super_admin[0]['credential_username'];
		$employee_school_profile_id = $super_admin[0]['employee_school_profile_id'];
		
		$school_details['acadmic_year'] = $this->School_model->fetch_acadmic_year();
		$school_details['fetch_institute'] = $this->db->query("SELECT * from institute where institute_expiry_date='9999-12-31'")->result_array();
		$nav['super_admin'] = "year";

		$this->load->view('Dashboard/header',$admin);
		$this->load->view('School/view_acadmic_year',$school_details);
		$this->load->view('Dashboard/footer',$nav);
	}

	function acadmic_year_registration()
	{
		$institute_admin = $this->session->userdata('super_admin');
		$AY['AY_name'] = $this->input->post('AY_name');
		$AY['AY_start_month'] = $this->input->post('AY_start_month');
		$AY['AY_end_month'] = $this->input->post('AY_end_month');
		$AY['AY_effective_date'] = date('Y-m-d');
		$AY['AY_institute_profile_id'] = $this->input->post('AY_institute_profile_id');
		$year = $this->input->post('AY_name');
		$verify = explode("-",$year);
        $verify_year = intval($verify[0]) + 1;
        $start_year_no = str_split($verify[0],2);
        $verify_end_year = intval($start_year_no[0]).intval($verify[1]);
        if($verify_year == $verify_end_year){
        	$total = $this->db->query("SELECT * FROM academic_year where AY_expiry_date = '9999-12-31' and AY_institute_profile_id =".$AY['AY_institute_profile_id']."")->num_rows();
        	if ($total >= 2) {
        		$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"More than 2 Acadmic year not Assigned For same School.");
	            $this->session->set_flashdata('text',"Please Delete and then Assigned.");
	            $this->session->set_flashdata('type',"warning");		
				redirect('Institute/view_acadmic_year');
        	}else{
        		$verify_already_assign = $this->db->query("SELECT * FROM academic_year where AY_expiry_date = '9999-12-31' and AY_name = ".$AY['AY_name']." and AY_institute_profile_id =".$AY['AY_institute_profile_id']."")->num_rows();
              	if ($verify_already_assign != 0) {
	        		$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Already acadmic year Register.");
		            $this->session->set_flashdata('text',"Duplicate acadmic year for same school are not allowed.");
		            $this->session->set_flashdata('type',"warning");		
					redirect('Institute/view_acadmic_year');
        		}else{
	        		$con = $this->School_model->acadmic_year_registration($AY);
					if($con == 1){
						$this->session->set_flashdata('active',1);
			            $this->session->set_flashdata('title',"Acadmic year Register.");
			            $this->session->set_flashdata('text',"Assigned to school Successfully."); 
			            $this->session->set_flashdata('type',"success");	
						redirect('Institute/view_acadmic_year');
					}
				}
			}
        }else{
           	$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Please Enter Correct Acadmic Duration. for eg.2017-18");
            $this->session->set_flashdata('text',"");
            $this->session->set_flashdata('type',"warning");	
			redirect('Institute/view_acadmic_year');
        }
	}

	function acadmic_year_remove($AY_id)
	{
		$this->session->set_userdata('AY',$AY_id);
		redirect('Institute/remove_AY_year');
	}

	function remove_AY_year()
	{
		$AY['AY_id'] = $this->session->userdata('AY');
		$AY['AY_expiry_date'] = date('Y-m-d');
		$con = $this->School_model->remove_AY_year($AY);
		if($con == 1){
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Delete the Acadmic Year of School");
            $this->session->set_flashdata('text',"Please Assign the New Year."); 
            $this->session->set_flashdata('type',"success");	
			redirect('Institute/view_acadmic_year');
		}
	}

	function sms_credit()
	{
		$sms['flash']['active'] = $this->session->flashdata('active');
    	$sms['flash']['title'] = $this->session->flashdata('title');
    	$sms['flash']['text'] = $this->session->flashdata('text');
    	$sms['flash']['type'] = $this->session->flashdata('type');
		$super_admin = $this->session->userdata('super_admin');
		$admin['user'] = $super_admin[0]['employee_pri_mobile_number'];
		$admin['user_profile_id'] = $super_admin[0]['employee_profile_id'];
		$admin['photo'] = $super_admin[0]['employee_photo'];
		$admin['first_name'] = $super_admin[0]['employee_first_name'];
		$admin['last_name'] = $super_admin[0]['employee_last_name'];
		$admin['email_id'] = $super_admin[0]['employee_email_id'];
		$admin['username'] = $super_admin[0]['credential_username'];
		$employee_school_profile_id = $super_admin[0]['employee_school_profile_id'];
		
		$sms['fetch_institute'] = $this->db->query("SELECT * from institute where institute_expiry_date='9999-12-31'")->result_array();
		$nav['super_admin'] = "SMS";

		$this->load->view('Dashboard/header',$admin);
		$this->load->view('Institute/sms_credit',$sms);
		$this->load->view('Dashboard/footer',$nav);
	}

	function add_sms_credit()
	{
		$institute_profile_id = $this->input->post('AY_institute_profile_id');
		$sms_credit = $this->input->post('sms_credit');
		$sms['previous_count'] = $this->db->query("SELECT institute_sms_credit from institute where institute_profile_id =".$institute_profile_id."")->result_array();
		$previous_count = $sms['previous_count'][0]['institute_sms_credit'];
		$total_count = $previous_count + $sms_credit;
		$this->db->query("UPDATE institute set institute_sms_credit =".$total_count." where institute_profile_id =".$institute_profile_id."");
		$this->session->set_flashdata('active',1);
        $this->session->set_flashdata('title',"Institute SMS Credit Updated Successfully");
        $this->session->set_flashdata('text',""); 
        $this->session->set_flashdata('type',"success");	
		redirect('Institute/sms_credit');
	}
}
?>