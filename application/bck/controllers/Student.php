<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Student extends CI_Controller
	{
		public function index()
		{
			if(!isset($this->session->userdata['school']))
			{
				redirect('/');
			}
			if(!isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			}			
			$school_admin = $this->session->userdata('school');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);

			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['dashboard'] = 'dashboard';

			$this->load->view('Student/school_header', $admin);
			$this->load->view('Dashboard/dashboard');
			$this->load->view('Student/student_footer',$nav);
		}

		function student_registration()
		{
			if(isset($this->session->userdata['school']))
			{
				$school_admin = $this->session->userdata('school');
			}
			elseif(isset($this->session->userdata['teacher']))
			{
				$school_admin = $this->session->userdata('teacher');
			}
			else{
				redirect('/');
			}

			if(isset($this->session->userdata['enquiry'])){
				$enquiry_id = $this->session->userdata['enquiry'];
				$student['enquiry_details'] = $this->db->query("SELECT * from enquiry where enquiry_id =".$enquiry_id."")->result_array();
				$student['enquiry'] = 0;
			}else{
				$student['enquiry'] = 1;
			}
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			} 
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
			$nav['student'] = 'student';


			$student['flash']['active'] = $this->session->flashdata('active');
        	$student['flash']['title'] = $this->session->flashdata('title');
        	$student['flash']['text'] = $this->session->flashdata('text');
        	$student['flash']['type'] = $this->session->flashdata('type');

        	$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
        	$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$student['fee_type'] = $this->Student_model->fetch_other_fee_type($employee_school_profile_id);
			$student['class_details'] =  $this->db->query("SELECT class.* FROM `class` join fees_type on fees_type_class_id = class_id and fees_type_school_profile_id = class_school_profile_id where class_school_profile_id =".$employee_school_profile_id." and class_expiry_date = '9999-12-31' group by fees_type_class_id")->result_array();
			$student['division_details'] =  $this->db->query("select * from division where division_school_profile_id =".$employee_school_profile_id." and division_expiry_date='9999-12-31' group by division_name")->result_array();
			$GRN = $this->db->query("select student_GRN from student where student_school_profile_id =".$employee_school_profile_id." ORDER BY  student_GRN DESC limit 1")->result_array();
			foreach ($GRN as $key => $value) { 
                if(empty($value)) {
                    unset($GRN[$key]);
                }
            }
			if(empty($GRN)){
				$student['GRN_number'] = 1;
			}else{
				$student['GRN_number'] = $GRN[0]['student_GRN'] + 1;
			}

			if(isset($this->session->userdata['school']))
			{
				$this->load->view('School/school_header', $admin);
			}elseif(isset($this->session->userdata['teacher'])){
				$this->load->view('Teacher/teacher_header', $admin);
			}
			$this->load->view('Student/student_registration',$student);
			$this->load->view('Student/student_footer', $nav);
			$this->session->unset_userdata('enquiry');
		}

		function fetch_class_division()
		{
			$school_admin = $this->session->userdata('school');
			$class['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$class['class_id'] = $_POST['class_id'];
			$data = $this->db->query("SELECT * from division where division_class_id=".$class['class_id']." and division_expiry_date='9999-12-31' and division_school_profile_id = ".$class['employee_school_profile_id']."")->result_array();
			echo json_encode($data);
		}

		function fetch_class_fee_types()
		{
			$school_admin = $this->session->userdata('school');
			$fee_type['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$fee_type['class_id'] = $_POST['class_id'];
			$data = $this->Student_model->fetch_class_fee_types($fee_type);
			echo json_encode($data);
		}

		function view_student()
		{
			if(isset($this->session->userdata['school']))
			{
				$school_admin = $this->session->userdata('school');
			}
			elseif(isset($this->session->userdata['teacher']))
			{
				$school_admin = $this->session->userdata('teacher');
			}
			else{
				redirect('/');
			}

			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			} 
			$student['flash']['active'] = $this->session->flashdata('active');
        	$student['flash']['title'] = $this->session->flashdata('title');
        	$student['flash']['text'] = $this->session->flashdata('text');
        	$student['flash']['type'] = $this->session->flashdata('type');

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
			$admin['school_report_header'] = $school_admin[0]['school_report_header'];
			$admin['school_report_footer'] = $school_admin[0]['school_report_footer'];

			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['student'] = 'student';
			
			$student['student'] = $this->Student_model->fetch_student_by_session($employee_school_profile_id);

			if(isset($this->session->userdata['school']))
			{
				$this->load->view('School/school_header', $admin);
			}elseif(isset($this->session->userdata['teacher'])){
				$this->load->view('Teacher/teacher_header', $admin);
			}

			$this->load->view('Student/view_student', $student);
			$this->load->view('Student/student_footer',$nav);	
		}

		function add_student_registration()
		{
			$fee_type['fee_type_id'] = $this->input->post('fee_type_id[]');
			$fee_type['total_fees_amount'] = $this->input->post('total_fee_amount[]');
			$fee_type['fee_waiver_name'] = $this->input->post('fee_waiver_name[]');
			$fee_type['fee_waiver_amount'] = $this->input->post('fee_waiver_amount[]');

			if(isset($this->session->userdata['school']))
			{
				$school_admin = $this->session->userdata('school');
			}
			elseif(isset($this->session->userdata['teacher']))
			{
				$school_admin = $this->session->userdata('teacher');
			}
			else{
				redirect('/');
			}

			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			}

			$student['student_admission_date'] = $this->input->post('student_admission_date');
			$student['student_reg_date'] = $this->input->post('student_reg_date');
			if (empty($this->input->post('student_GRN_regular'))) {
				$student['student_GRN'] = $this->input->post('student_GRN_auto');
			}else{
				$student['student_GRN'] = $this->input->post('student_GRN_regular');
			}
			$student['student_adhar_card_number'] = $this->input->post('student_adhar_card_number');
			$student['student_enquiry_form_number'] = $this->input->post('student_enquiry_form_number');
			$student['student_first_name'] = ucfirst($this->input->post('student_first_name'));
			$student['student_middle_name'] = ucfirst($this->input->post('student_middle_name'));
			$student['student_last_name'] = ucfirst($this->input->post('student_last_name'));
			$student['student_gender'] = ucfirst($this->input->post('student_gender'));
			$student['student_DOB'] = $this->input->post('student_DOB');
			$student['student_blood_group'] = $this->input->post('student_blood_group');
			$student['student_birth_place'] = ucfirst($this->input->post('student_birth_place'));
			$student['student_nationality'] = ucfirst($this->input->post('student_nationality'));
			$student['student_mother_tongue'] = ucfirst($this->input->post('student_mother_tongue'));
			$student['student_category'] = $this->input->post('student_category');
			$student['student_religion'] = ucfirst($this->input->post('student_religion'));
			$student['student_cast'] = ucfirst($this->input->post('student_cast'));
			$student['student_sub_cast'] = ucfirst($this->input->post('student_sub_cast'));
			$student['student_present_house_no'] = ($this->input->post('student_present_house_no'));
			$student['student_present_town'] = ucfirst($this->input->post('student_present_town'));
			$student['student_present_tal'] = ucfirst($this->input->post('student_present_tal'));
			$student['student_present_dist'] = ucfirst($this->input->post('student_present_dist'));
			$student['student_present_state'] = ucfirst($this->input->post('student_present_state'));
			$student['student_present_pincode'] = $this->input->post('student_present_pincode');
			$student['student_permament_house_no'] = ($this->input->post('student_permament_house_no'));
			$student['student_permament_town'] = ucfirst($this->input->post('student_permament_town'));
			$student['student_permament_tal'] = ucfirst($this->input->post('student_permament_tal'));
			$student['student_permament_dist'] = ucfirst($this->input->post('student_permament_dist'));
			$student['student_permament_state'] = ucfirst($this->input->post('student_permament_state'));
			$student['student_permament_pincode'] = $this->input->post('student_permament_pincode');
			$student['student_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$student['student_effective_date'] = date('Y-m-d');
			$student['student_photo'] = $this->upload('student_photo', 'profile_photo');
			$tracking = $this->input->post('school_tracking');
			if($tracking == 'on'){
				$school_registration['student_tracking'] = "1";
			}else{
				$school_registration['student_tracking'] = "0";
			}

			$parent['student_parent_primary'] = $this->input->post('student_parent_primary[]');
			$parent['parent_type_show'] = $this->input->post('parent_type_show[]');
			$parent['parent_first_name'] = $this->input->post('parent_first_name[]');
			$parent['parent_middle_name'] = $this->input->post('parent_middle_name[]');
			$parent['parent_last_name'] = $this->input->post('parent_last_name[]');
			$parent['parent_gender'] = $this->input->post('parent_gender[]');
			$parent['parent_DOB'] = $this->input->post('parent_DOB[]');
			// $parent['parent_address'] = $this->input->post('parent_address[]');
			$parent['parent_permament_house_no'] = $this->input->post('parent_permament_house_no[]');
			$parent['parent_permament_town'] = $this->input->post('parent_permament_town[]');
			$parent['parent_permament_tal'] = $this->input->post('parent_permament_tal[]');
			$parent['parent_permament_dist'] = $this->input->post('parent_permament_dist[]');
			$parent['parent_permament_state'] = $this->input->post('parent_permament_state[]');
			$parent['parent_permament_pincode'] = $this->input->post('parent_permament_pincode[]');
			$parent['parent_mobile_number'] = $this->input->post('parent_mobile_number[]');
			$parent['parent_email_id'] = $this->input->post('parent_email_id[]');
			$parent['parent_qualification'] = $this->input->post('parent_qualification[]');
			$parent['parent_occupation'] = $this->input->post('parent_occupation[]');
			$parent['parent_type'] = $this->input->post('parent_type[]');
			$parent['parent_effective_date'] = date('Y-m-d');
			$parent['parent_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$parent['parent_photo'] = $this->input->post('parent_photo[]');

			$cont = count($parent['parent_type_show']);
			for ($i=0; $i < $cont; $i++) { 
				$parent_details1['parent_first_name'] = $parent['parent_first_name'][$i];
				$parent_details1['parent_middle_name'] = $parent['parent_middle_name'][$i];
				$parent_details1['parent_last_name'] = $parent['parent_last_name'][$i];
				$parent_details1['parent_gender'] = $parent['parent_gender'][$i];
				$parent_details1['parent_DOB'] = $parent['parent_DOB'][$i];
				$parent_details1['parent_permament_house_no'] = $parent['parent_permament_house_no'][$i];
				$parent_details1['parent_permament_town'] = $parent['parent_permament_town'][$i];
				$parent_details1['parent_permament_tal'] = $parent['parent_permament_tal'][$i];
				$parent_details1['parent_permament_dist'] = $parent['parent_permament_dist'][$i];
				$parent_details1['parent_permament_state'] = $parent['parent_permament_state'][$i];
				$parent_details1['parent_permament_pincode'] = $parent['parent_permament_pincode'][$i];
				$parent_details1['parent_mobile_number'] = $parent['parent_mobile_number'][$i];
				$parent_details1['parent_email_id'] = $parent['parent_email_id'][$i];
				$parent_details1['parent_qualification'] = $parent['parent_qualification'][$i];
				$parent_details1['parent_occupation'] = $parent['parent_occupation'][$i];
				$parent_details1['parent_type'] = $parent['parent_type'][$i];
				$parent_details1['parent_photo'] = $parent['parent_photo'][$i];
				$parent_details1['parent_effective_date'] = date('Y-m-d');
				$parent_details1['parent_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
				$mobile['profile_id'] = $school_admin[0]['employee_school_profile_id'];
				$mobile['num'] = $parent_details1['parent_mobile_number'];
				$mobile['name'] = $this->input->post('student_first_name');
				$mobile_no = $this->Student_model->already_exits_mobile($mobile);

				if($mobile_no != 0){
					$this->session->set_flashdata('active',1);
					$this->session->set_flashdata('title',"Mobile Number and First Name Alredy Exits.");
					$this->session->set_flashdata('text',"");
					$this->session->set_flashdata('type',"warning");
					print_r("Mobile Number and First Name Alredy Exits.");die();
				}
			}

			$student_profile_id = $this->Student_model->student_add($student);
			$profile_id = $student_profile_id[0]['student_profile_id'];
			$config = array(
				'upload_path' => 'profile_photo/',
				'upload_url' => base_url().'profile_photo/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'encrypt_name' => TRUE,
				);
			$this->load->library('upload', $config);

			for ($i=0; $i < $cont; $i++) { 
				$parent_details['parent_first_name'] = ucfirst($parent['parent_first_name'][$i]);
				$parent_details['parent_middle_name'] = ucfirst($parent['parent_middle_name'][$i]);
				$parent_details['parent_last_name'] = ucfirst($parent['parent_last_name'][$i]);
				$parent_details['parent_gender'] = ucfirst($parent['parent_gender'][$i]);
				$parent_details['parent_DOB'] = $parent['parent_DOB'][$i];
				$parent_details['parent_house_no'] = $parent['parent_permament_house_no'][$i];
				$parent_details['parent_town'] = ucfirst($parent['parent_permament_town'][$i]);
				$parent_details['parent_tal'] = ucfirst($parent['parent_permament_tal'][$i]);
				$parent_details['parent_dist'] = ucfirst($parent['parent_permament_dist'][$i]);
				$parent_details['parent_state'] = ucfirst($parent['parent_permament_state'][$i]);
				$parent_details['parent_pincode'] = $parent['parent_permament_pincode'][$i];
				$parent_details['parent_mobile_number'] = $parent['parent_mobile_number'][$i];
				$parent_details['parent_email_id'] = $parent['parent_email_id'][$i];
				$parent_details['parent_qualification'] = $parent['parent_qualification'][$i];
				$parent_details['parent_occupation'] = $parent['parent_occupation'][$i];
				$parent_details['parent_type'] = $parent['parent_type'][$i];

				$_FILES['userFile']['name'] = $_FILES['parent_photo']['name'][$i];
				$path = $config['upload_url']."".$_FILES['userFile']['name'];
				$_FILES['userFile']['type'] = $_FILES['parent_photo']['type'][$i];
				$_FILES['userFile']['tmp_name'] = $_FILES['parent_photo']['tmp_name'][$i];
				$_FILES['userFile']['size'] = $_FILES['parent_photo']['size'][$i];
				$this->upload->initialize($config);
				if ($this->upload->do_upload('userFile'))
				{
					$data_photo = $this->upload->data(); 
					$parent_details['parent_photo']=$config['upload_url']."".$data_photo['file_name'];
				}
				if(!empty($parent['student_parent_primary'][$i])) {
					$parent_details1['student_parent_primary'] = '1';
				}else{
					$parent_details1['student_parent_primary'] = '0';
				}
				$parent_details['parent_effective_date'] = date('Y-m-d');
				$parent_details['parent_student_profile_id'] = $profile_id;
				$parent_details['parent_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];

				$signature = $this->db->query('select institute_sender_id,institute_signature from institute where institute_profile_id=(select school_institute_profile_id from school where school_profile_id='.$school_admin[0]['employee_school_profile_id'].')')->result_array();
				$count = $this->db->get('parent')->num_rows();

				$cnt = $count+1;
				$user_type = 7;
				$admin_id = $school_admin[0]['employee_school_profile_id'];
				$mobile = $parent_details['parent_mobile_number'];
				$mobile1 = $mobile[5];
				$mobile2 = $mobile[6];
				$mobile3 = $mobile[7];
				$mobile4 = $mobile[8];
				$mobile5 = $mobile[9];
				$username = array($user_type,$admin_id,$cnt,$mobile1,$mobile2,$mobile3,$mobile4,$mobile5);
				$credentials['credential_user_type'] = 7;
				$credentials['credential_update_date'] = date('Y-m-d');


				$credentials['credential_username'] = implode($username);

				$pas = str_split($parent_details['parent_first_name']);
				$pass = $pas[0];
				$pas1 = str_split($parent_details['parent_last_name']);
				$pass1 = $pas1[0];
				$pas2 = $parent_details['parent_DOB'];
				$pas3 = date_format(new Datetime($pas2),"Y/m/d");
				$pas4 = explode("/", $pas3);
				$pass3 =$pas4[0];
				$pass4 =$pas4[1];
				$pass5 =$pas4[2];
				$arr1 = array($pass,$pass1,$pass3,$pass4,$pass5);
				$credentials1['credential_password1'] = implode($arr1);
				$credentials['credential_password'] = md5(implode($arr1));

				$number=$parent_details['parent_mobile_number'];

				
				$msg = "Hi, \nYour profile has been created with ".$signature[0]['institute_signature'].". \nYour Credential is as follows: \nUsername :".$credentials['credential_username']." \nPassword :".$credentials1['credential_password1']." \nRegards, \n".$signature[0]['institute_signature'].".";
					
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
				if (empty($parent_details['parent_email_id'])) {
					$this->email->to(''.$school_admin[0]['school_email_id'].'');
				}else{
					$this->email->to(''.$parent_details['parent_email_id'].'');
				}
				$this->email->subject('Welcome To Trackmee Authencation Details');
				$this->email->message("Hi,<br>Your profile has been created with ".$signature[0]['institute_signature'].". Your credentials is as follows:<br>  <p> Username: ".$credentials['credential_username']."<br> <p>  Password: ".$credentials1['credential_password1']."<br><br>   Regards,<br> ".$signature[0]['institute_signature']."");
				
				if($this->email->send()){
					if($school_admin[0]['school_authentication_details_sms'] == 1)
					{
						$sms_status = $this->Student_model->sms($number,$msg,$signature[0]['institute_sender_id']);
					}

					$pr_profile_id = $this->Student_model->parent_add($parent_details);
					$parent_profile_id = $pr_profile_id[0]['parent_profile_id'];

					$student_details['student_profile_id'] = $profile_id;
					$student_details['student_parent_id'] = $parent_profile_id;
					if ($parent_details1['student_parent_primary'] == 1) {
						$this->Student_model->update_student_parent_details($student_details);
					}
		            $credentials['credential_profile_id'] = $parent_profile_id;
		            $this->Student_model->student_credential($credentials);
			    }
			    else{
					$this->session->set_flashdata('active',1);
			        $this->session->set_flashdata('title',"Mail Not Send");
			        $this->session->set_flashdata('text',"In Sending Authentinstituteation Details..Please Try ahain");
			        $this->session->set_flashdata('type',"warning");
			        redirect('Student/view_student');
				}
			}
			$SCD_assign['SCD_class_id'] = $this->input->post('SCD_class_id');
            $SCD_assign['SCD_division_id'] = $this->input->post('SCD_division_id');
            $SCD_assign['SCD_student_profile_id'] = $profile_id;
            $SCD_assign['SCD_effective_date'] = date('Y-m-d');
			$SCD_assign['SCD_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$SCD_assign['SCD_AY_id'] = $school_admin[0]['school_AY_id'];
            if ($school_admin[0]['school_CRM'] == 1 && $SCD_assign['SCD_division_id'] != '' &&  $SCD_assign['SCD_class_id'] != '') {
            	$this->db->insert('student_class_division_assgn',$SCD_assign);
            }
            $cnt = count($fee_type['fee_type_id']);
            for ($i=0; $i < $cnt; $i++) { 
            	$fee_type_details['total_fee_type_id'] = $fee_type['fee_type_id'][$i];
            	$fee_type_details['total_fee_amount'] = $fee_type['total_fees_amount'][$i];
            	$fee_type_details['total_fee_student_profile_id'] = $profile_id;
            	$fee_type_details['total_fee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
            	$fee_type_details['total_fee_AY_id'] = $school_admin[0]['school_AY_id'];
            	$fee_waiver_details['fee_waiver_fee_type_id'] = $fee_type['fee_type_id'][$i];
            	$fee_waiver_details['fee_waiver_amount'] = $fee_type['total_fees_amount'][$i];
            	$fee_waiver_details['fee_waiver_name'] = $fee_type['fee_waiver_name'][$i];
            	$fee_waiver_details['fee_waiver_student_profile_id'] = $profile_id;
            	$fee_waiver_details['fee_waiver_effective_date'] = date('Y-m-d');
            	$fee_waiver_details['fee_waiver_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
            	$fee_waiver_details['fee_waiver_AY_id'] = $school_admin[0]['school_AY_id'];
            	$this->db->insert('total_fees',$fee_type_details);
            	if ($fee_waiver_details['fee_waiver_name'] !='') {
            		$this->db->insert('fee_waiver',$fee_waiver_details);
            	}
            }

            if(!empty($this->input->post('student_enquiry_id'))){
            	$enquiry_id = $this->input->post('student_enquiry_id');
            	$this->db->query("UPDATE enquiry SET enquiry_status = '5' WHERE enquiry_id =".$enquiry_id."");
            }

            $document['doc_name_show'] = $this->input->post('doc_name_show[]');
            $document['doc_name'] = $this->input->post('doc_name[]');
			$document['doc_number'] = $this->input->post('doc_number[]');
			$document['doc_type'] = $this->input->post('doc_type[]');
			$document['doc_file'] = $this->input->post('doc_file[]');
			$document['doc_effective_date'] = date('Y-m-d');
			$document['doc_user'] = $this->input->post('student_profile_id');
			$document['doc_user_type'] = '8';
			$document['doc_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$config1 = array(
				'upload_path' => 'document/',
				'upload_url' => base_url().'document/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'encrypt_name' => TRUE,
				);
			$doc_cnt = count($document['doc_name_show']);
			for ($i=0; $i < $doc_cnt; $i++) { 
				$_FILES['userFile']['name'] = $_FILES['doc_file']['name'][$i];
				$_FILES['userFile']['type'] = $_FILES['doc_file']['type'][$i];
				$_FILES['userFile']['tmp_name'] = $_FILES['doc_file']['tmp_name'][$i];
				$_FILES['userFile']['size'] = $_FILES['doc_file']['size'][$i];
				$this->upload->initialize($config1);
				if ($this->upload->do_upload('userFile'))
				{
					$data_doc = $this->upload->data();
					$document_details['doc_name'] = $document['doc_name'][$i];
					$document_details['doc_number'] = $document['doc_number'][$i];
					$document_details['doc_type'] = $document['doc_type'][$i];
					$document_details['doc_file']=$config1['upload_url']."".$data_doc['file_name'];
					$document_details['doc_effective_date'] = date('Y-m-d');
					$document_details['doc_user'] = $profile_id;
					$document_details['doc_user_type'] = '8';
					$document_details['doc_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
					$this->Student_model->student_document($document_details);
				}
			}
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Student Register Successfully.");
            $this->session->set_flashdata('text',"Authentinstituteation Details send on Email or Mobile.");
            $this->session->set_flashdata('type',"success");
			redirect('Student/view_student');
		}

		function add_another_parent_details($parent_student_profile_id){
			$this->session->set_userdata('another_parent',$parent_student_profile_id);
			redirect('Student/add_parent_form1');
		}


		function add_parent_form1()
		{
			if(isset($this->session->userdata['school']))
			{
				$school_admin = $this->session->userdata('school');
			}
			elseif(isset($this->session->userdata['teacher']))
			{
				$school_admin = $this->session->userdata('teacher');
			}
			else{
				redirect('/');
			}

			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			}

			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];

			$data4['student_profile_id'] = $this->session->userdata('another_parent');
			// $data4['parent_type'] = $this->db->query("SELECT parent_type from parent where parent_student_profile_id =".$data4['student_profile_id']." and parent_school_profile_id =".$employee_school_profile_id."")->result_array();

			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['student'] = $this->session->flashdata('student');

			$data4['flash'] = $this->session->flashdata('flash');

			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);

			if(isset($this->session->userdata['school']))
			{
				$this->load->view('School/school_header', $admin);
			}elseif(isset($this->session->userdata['teacher'])){
				$this->load->view('Teacher/teacher_header', $admin);
			}
			$this->load->view('Student/add_parent_form',$data4);
			$this->load->view('Student/student_footer',$nav);

		}

		function add_another_parent()
		{
			if(isset($this->session->userdata['school']))
			{
				$school_admin = $this->session->userdata('school');
			}
			elseif(isset($this->session->userdata['teacher']))
			{
				$school_admin = $this->session->userdata('teacher');
			}
			else{
				redirect('/');
			}
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			}
			$parent_student_profile_id = $this->session->userdata('another_parent');

			$another_parent['parent_first_name'] = ucfirst($this->input->post('parent_first_name'));
			$another_parent['parent_middle_name'] = ucfirst($this->input->post('parent_middle_name'));
			$another_parent['parent_last_name'] = ucfirst($this->input->post('parent_last_name'));
			$another_parent['parent_gender'] = ucfirst($this->input->post('parent_gender'));
			$another_parent['parent_DOB'] = $this->input->post('parent_DOB');
			$another_parent['parent_house_no'] = $this->input->post('parent_house_no');
			$another_parent['parent_town'] = ucfirst($this->input->post('parent_town'));
			$another_parent['parent_tal'] = ucfirst($this->input->post('parent_tal'));
			$another_parent['parent_dist'] = ucfirst($this->input->post('parent_dist'));
			$another_parent['parent_state'] = ucfirst($this->input->post('parent_state'));
			$another_parent['parent_pincode'] = $this->input->post('parent_pincode');
			$another_parent['parent_mobile_number'] = $this->input->post('parent_mobile_number');
			$another_parent['parent_email_id'] = $this->input->post('parent_email_id');
			$another_parent['parent_type'] = $this->input->post('parent_type');
			$another_parent['parent_student_profile_id'] = $this->input->post('parent_student_profile_id');
			$student_profile_id = $this->input->post('parent_student_profile_id');
			$another_parent['parent_effective_date'] = date('Y-m-d');
			$another_parent['parent_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$another_parent['parent_photo'] = $this->upload_parent('parent_photo', 'profile_photo');
			$verify = $this->db->query("SELECT * FROM parent where parent_type =".$another_parent['parent_type']." and parent_student_profile_id =".$another_parent['parent_student_profile_id']." and parent_expiry_date = '9999-12-31' and parent_school_profile_id =".$another_parent['parent_school_profile_id']."")->num_rows();
			if ($verify != 0) {
				$this->session->set_userdata('user_data', $student_profile_id);
				$this->session->set_flashdata('active',1);
		        $this->session->set_flashdata('title',"Sorry");
	            $this->session->set_flashdata('text',"Parent Already Register.");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Student/add_student');
			}

			$signature = $this->db->query('select institute_sender_id,institute_signature from institute where institute_profile_id=(select school_institute_profile_id from school where school_profile_id='.$school_admin[0]['employee_school_profile_id'].')')->result_array();
			$count = $this->db->get('student')->num_rows();

			$cnt = $count+1;
			$user_type = 7;
			$admin_id = $school_admin[0]['employee_school_profile_id'];
			$mobile = $another_parent['parent_mobile_number'];
			$mobile1 = $mobile[5];
			$mobile2 = $mobile[6];
			$mobile3 = $mobile[7];
			$mobile4 = $mobile[8];
			$mobile5 = $mobile[9];
			$username = array($user_type,$admin_id,$cnt,$mobile1,$mobile2,$mobile3,$mobile4,$mobile5);

			$credentials['credential_user_type'] = 7;
			$credentials['credential_update_date'] = date('Y-m-d');

			$credentials['credential_username'] = implode($username);

			$pas = str_split($this->input->post('parent_first_name'));
			$pass = $pas[0];
			$pas1 = str_split($this->input->post('parent_last_name'));
			$pass1 = $pas1[0];
			$pas2 = $this->input->post('parent_DOB');
			$pas3 = date_format(new Datetime($pas2),"Y/m/d");
			$pas4 = explode("/", $pas3);
			$pass3 =$pas4[0];
			$pass4 =$pas4[1];
			$pass5 =$pas4[2];
			$arr1 = array($pass,$pass1,$pass3,$pass4,$pass5);
			$credentials1['credential_password1'] = implode($arr1);
			$credentials['credential_password'] = md5(implode($arr1));

			$number=$another_parent['parent_mobile_number'];

			
			$msg = "Hi,\nYour profile has been created with ".$signature[0]['institute_signature'].".\nYour Credential is as follows:\nUsername :".$credentials['credential_username']."\nPassword :".$credentials1['credential_password1']."\nRegards,\n".$signature[0]['institute_signature'].".";
			
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
			if (empty($another_parent['parent_email_id'])) {
				$this->email->to(''.$school_admin[0]['school_email_id'].'');
			}else{
				$this->email->to(''.$another_parent['parent_email_id'].'');
			}
			$this->email->subject('Welcome To Trackmee Authencation Details');
			$this->email->message("Hi,<br>Your profile has been created with ".$signature[0]['institute_signature'].". Your credentials is as follows:<br>  <p> Username: ".$credentials['credential_username']."<br> <p>  Password: ".$credentials1['credential_password1']."<br><br>   Regards,<br> ".$signature[0]['institute_signature']."");

			if($this->email->send()){
				if($school_admin[0]['school_authentication_details_sms'] == 1)
				{
					$sms_status = $this->Student_model->sms($number,$msg,$signature[0]['institute_sender_id']);
				}
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Parent Added Successfully.");
	            $this->session->set_flashdata('text',"User credentials are send On Parent's Email ID and Mobile Number."); 
	            $this->session->set_flashdata('type',"success");

				$pr_profile_id = $this->Student_model->parent_add($another_parent);
				$parent_profile_id = $pr_profile_id[0]['parent_profile_id'];

				$data4['student_parent_primary'] = $this->input->post('student_parent_primary');

					if($data4['student_parent_primary'] == 'on'){

						$data3['student_profile_id'] = $another_parent['parent_student_profile_id'];
						$data3['student_parent_id'] = $parent_profile_id;

						$this->Student_model->update_student_parent_details($data3);
						}	

				$credentials['credential_profile_id'] = $parent_profile_id;
	            $this->Student_model->student_credential($credentials);

	          	redirect('Student/add_student');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Mail Not Send");
	            $this->session->set_flashdata('text',"In Sending Authentinstituteation Details..Please Try ahain");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Student/add_student');
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
				$user_photo = base_url().'profile_photo/default_student_image.png';
				return $user_photo;
			}
			else{
				$upload_files = array('upload_data' => $this->upload->data());

				$user_photo = base_url().'profile_photo/'.$upload_files['upload_data']['file_name'];
				$this->upload->data();

				return $user_photo;
			}
		}

		function upload_parent($file,$folder)						
		{
			$config = array(
				'upload_path' => 'profile_photo/',
				'upload_url' => base_url().'profile_photo/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'encrypt_name' => TRUE,
				);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload($file)){
				$user_photo = base_url().'profile_photo/default_parent_image.png';
				return $user_photo;
			}
			else{
				$upload_files = array('upload_data' => $this->upload->data());

				$user_photo = base_url().'profile_photo/'.$upload_files['upload_data']['file_name'];
				$this->upload->data();

				return $user_photo;
			}
		}

		function student_document($student_profile_id)
		{
			$this->session->set_userdata('stu_data', $student_profile_id);
			redirect('Student/add_document');
		}

		function add_document()
		{
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			}		
			$student['student_profile_id'] = $this->session->userdata('stu_data');
			$student['document'] = $this->Student_model->document_details($student);

			if(isset($this->session->userdata['school']))
			{
				$school_admin = $this->session->userdata('school');
			}
			elseif(isset($this->session->userdata['teacher']))
			{
				$school_admin = $this->session->userdata('teacher');
			}
			else{
				redirect('/');
			}
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
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			
			if(isset($this->session->userdata['school']))
			{
				$this->load->view('School/school_header', $admin);
			}elseif(isset($this->session->userdata['teacher'])){
				$this->load->view('Teacher/teacher_header', $admin);
			}
			$this->load->view('Student/add_documents',$student);
			$this->load->view('Student/student_footer',$nav);
		}

		function add_student_document()
		{
			if(isset($this->session->userdata['school']))
			{
				$school_admin = $this->session->userdata('school');
			}
			elseif(isset($this->session->userdata['teacher']))
			{
				$school_admin = $this->session->userdata('teacher');
			}
			else{
				redirect('/');
			}
			$document['doc_name'] = $this->input->post('doc_name');
			$document['doc_number'] = $this->input->post('doc_number');
			$document['doc_type'] = $this->input->post('doc_type');
			$document['doc_file'] = $this->upload_document('doc_file','document');
			$document['doc_effective_date'] = date('Y-m-d');
			$document['doc_user'] = $this->input->post('student_profile_id');
			$student_profile_id = $this->input->post('student_profile_id');
			$document['doc_user_type'] = '8';
			$document['doc_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$verify = $this->db->query("SELECT * FROM `document` where doc_name ='".$document['doc_name']."' and doc_user =".$document['doc_user']." and doc_expiry_date ='9999-12-31' and doc_user_type = '8' and doc_school_profile_id =".$document['doc_school_profile_id']."")->num_rows();
			if($verify == 0){
				$con = $this->Student_model->student_document($document);
				if($con != 0){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Error...");
		            $this->session->set_flashdata('text',"Document not Sumbited...");
		            $this->session->set_flashdata('type',"warning");
		            $this->session->set_userdata('user_data', $student_profile_id);
					redirect('Student/add_student');
				}else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Document Submited.");
		            $this->session->set_flashdata('text',""); 
		            $this->session->set_flashdata('type',"success");
					redirect('Student/add_student');
				}
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Document Alredy Sumbited.");
	            $this->session->set_flashdata('text',"Please removed then add.");
	            $this->session->set_flashdata('type',"warning");
	            $this->session->set_userdata('user_data', $student_profile_id);
				redirect('Student/add_student');
			}
		}

		function delete_document()
		{
			$doc_id = $this->input->post('doc_id');
			$path_doc = $this->db->query("SELECT * from document where doc_id =".$doc_id."")->result_array();
			$path = $path_doc[0]['doc_file'];
			$student_profile_id = $path_doc[0]['doc_user'];
			$this->load->helper("file");
			delete_files($path);
			unlink($path);
			$this->db->query("DELETE from document where doc_id =".$doc_id."");
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Document Deleted.");
            $this->session->set_flashdata('text',"");
            $this->session->set_flashdata('type',"success");
            $this->session->set_userdata('user_data', $student_profile_id);
			redirect('Student/add_student');
		}

		function edit_profile()
		{
			$profile['student_profile_id'] = $this->input->post('student_profile_id');
			$student_profile_id = $this->input->post('student_profile_id');
			$profile['student_photo'] = $this->upload('student_photo', 'profile_photo');
			$cnt = $this->Student_model->edit_profile($profile);
			$this->session->set_userdata('user_data', $student_profile_id);
			if($cnt == 1){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Profile Successfully Updated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Student/add_student');
			}
		}

		function upload_document($file,$folder)						
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

		public function student_details_edit($student_profile_id)
		{
			$data['student'] = $this->Student_model->update_student($student_profile_id);
			$this->session->set_userdata('stu_data', $data);
			redirect('Student/student_details_edit1');	
		}
	
		public function student_details_edit1()
		{
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			}		
			$data1 = $this->session->userdata('stu_data');

			if(isset($this->session->userdata['school']))
			{
				$school_admin = $this->session->userdata('school');
			}
			elseif(isset($this->session->userdata['teacher']))
			{
				$school_admin = $this->session->userdata('teacher');
			}
			else{
				redirect('/');
			}
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];

			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			
			if(isset($this->session->userdata['school']))
			{
				$this->load->view('School/school_header', $admin);
			}elseif(isset($this->session->userdata['teacher'])){
				$this->load->view('Teacher/teacher_header', $admin);
			}
			$this->load->view('Student/update_student_details',$data1);
			$this->load->view('Student/student_footer',$nav);

		}

		function edit_student_details()
		{
			$student['student_profile_id'] = $this->input->post('student_profile_id');
			$student['student_GRN'] = $this->input->post('student_GRN');
			$student['student_adhar_card_number'] = $this->input->post('student_adhar_card_number');
			$student['student_first_name'] = ucfirst($this->input->post('student_first_name'));
			$student['student_middle_name'] = ucfirst($this->input->post('student_middle_name'));
			$student['student_last_name'] = ucfirst($this->input->post('student_last_name'));
			$student['student_gender'] = ucfirst($this->input->post('student_gender'));
			$student['student_DOB'] = $this->input->post('student_DOB');
			$student['student_blood_group'] = $this->input->post('student_blood_group');
			$student['student_birth_place'] = ucfirst($this->input->post('student_birth_place'));
			$student['student_nationality'] = ucfirst($this->input->post('student_nationality'));
			$student['student_mother_tongue'] = ucfirst($this->input->post('student_mother_tongue'));
			$student['student_category'] = ucfirst($this->input->post('student_category'));
			$student['student_religion'] = ucfirst($this->input->post('student_religion'));
			$student['student_cast'] = ucfirst($this->input->post('student_cast'));
			$student['student_sub_cast'] = ucfirst($this->input->post('student_sub_cast'));
			$student['student_present_house_no'] = ($this->input->post('student_present_house_no'));
			$student['student_present_town'] = ucfirst($this->input->post('student_present_town'));
			$student['student_present_tal'] = ucfirst($this->input->post('student_present_tal'));
			$student['student_present_dist'] = ucfirst($this->input->post('student_present_dist'));
			$student['student_present_state'] = ucfirst($this->input->post('student_present_state'));
			$student['student_present_pincode'] = $this->input->post('student_present_pincode');
			$student['student_update_date'] = date('Y-m-d');
			$tracking = $this->input->post('student_tracking');
			if($tracking == 'on'){
				$student['student_tracking'] = "1";
			}else{
				$student['student_tracking'] = "0";
			}

			 $this->Student_model->update_student_details($student);

			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Successfully.");
            $this->session->set_flashdata('text',"Student Datails Updated Successfully."); 
            $this->session->set_flashdata('type',"success");
			$student_profile_id = $this->input->post('student_profile_id');
            $this->session->set_userdata('user_data', $student_profile_id);

             redirect('Student/add_student');
			
		}
		function edit_parent_profile()
		{
			$profile['parent_profile_id'] = $this->input->post('parent_profile_id');
			$student_profile_id = $this->input->post('parent_student_profile_id');
			$profile['parent_photo'] = $this->upload_parent('parent_photo', 'profile_photo');
			$cnt = $this->db->query("update parent set parent_photo = '".$profile['parent_photo']."' where parent_profile_id=".$profile['parent_profile_id']."");
			$this->session->set_userdata('user_data', $student_profile_id);
			if($cnt == 1){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Profile Successfully Updated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Student/add_student');
			}
		}

		public function parent_details_edit($parent_profile_id)
		{
			$data['parent'] = $this->Student_model->update_parent($parent_profile_id);
		
			$this->session->set_userdata('parent_data', $data);
	
			redirect('Student/parent_details_edit1');	
		}
	
		public function parent_details_edit1()
		{
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			}			
			$data1 = $this->session->userdata('parent_data');

			if(isset($this->session->userdata['school']))
			{
				$school_admin = $this->session->userdata('school');
			}
			elseif(isset($this->session->userdata['teacher']))
			{
				$school_admin = $this->session->userdata('teacher');
			}
			else{
				redirect('/');
			}

			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];

			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			
			if(isset($this->session->userdata['school']))
			{
				$this->load->view('School/school_header', $admin);
			}elseif(isset($this->session->userdata['teacher'])){
				$this->load->view('Teacher/teacher_header', $admin);
			}
			$this->load->view('Student/update_parent_details',$data1);
			$this->load->view('Student/student_footer',$nav);

		}

		function edit_parent_details()
		{
			$parent['parent_profile_id'] = $this->input->post('parent_profile_id');
			$parent['parent_first_name'] = ucfirst($this->input->post('parent_first_name'));
			$parent['parent_middle_name'] = ucfirst($this->input->post('parent_middle_name'));
			$parent['parent_last_name'] = ucfirst($this->input->post('parent_last_name'));
			$parent['parent_gender'] = ucfirst($this->input->post('parent_gender'));
			$parent['parent_qualification'] = ucfirst($this->input->post('parent_qualification'));
			$parent['parent_occupation'] = ucfirst($this->input->post('parent_occupation'));
			$parent['parent_DOB'] = $this->input->post('parent_DOB');
			$parent['parent_house_no'] = ($this->input->post('parent_house_no'));
			$parent['parent_town'] = ucfirst($this->input->post('parent_town'));
			$parent['parent_tal'] = ucfirst($this->input->post('parent_tal'));
			$parent['parent_dist'] = ucfirst($this->input->post('parent_dist'));
			$parent['parent_state'] = ucfirst($this->input->post('parent_state'));
			$parent['parent_pincode'] = $this->input->post('parent_pincode');
			$parent['parent_address'] = ucfirst($this->input->post('parent_address'));
			$parent['parent_email_id'] = $this->input->post('parent_email_id');
			$parent['parent_update_date'] = date('Y-m-d');
			$student_profile_id = $this->input->post('student_profile_id');

			$this->Student_model->update_parent_details($parent);

			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Successfully.");
            $this->session->set_flashdata('text',"Parent Datails Updated Successfully."); 
            $this->session->set_flashdata('type',"success");
            $this->session->set_userdata('user_data', $student_profile_id);

            redirect('Student/add_student');
			
		}

		function reset_parent_password()
		{
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			}		
			$data1 = $this->session->userdata('stu_data');

			if(isset($this->session->userdata['school']))
			{
				$school_admin = $this->session->userdata('school');
			}
			elseif(isset($this->session->userdata['teacher']))
			{
				$school_admin = $this->session->userdata('teacher');
			}
			else{
				redirect('/');
			}
			$parent_id = $this->input->post('parent_id');
			$password = $this->input->post('password');
			$parent_details = $this->db->query("SELECT parent_mobile_number,parent_email_id,credential_username FROM parent join credential on credential_profile_id = parent_profile_id where credential_user_type =7 and parent_profile_id=".$parent_id."")->result_array();
			$signature = $this->db->query('select institute_sender_id,institute_signature from institute where institute_profile_id=(select school_institute_profile_id from school where school_profile_id='.$school_admin[0]['employee_school_profile_id'].')')->result_array();
			
			$number=$parent_details[0]['parent_mobile_number'];
			$username=$parent_details[0]['credential_username'];
			$email=$parent_details[0]['parent_email_id'];

				
			$msg = "Hi,\nYour profile has been updated with ".$signature[0]['institute_signature'].".\nYour Credential is as follows:\nUsername :".$username."\nPassword :".$password."\nRegards,\n".$signature[0]['institute_signature'].".";
			
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
			if (empty($email)) {
				$this->email->to(''.$school_admin[0]['school_email_id'].'');
			}else{
				$this->email->to(''.$email.'');
			}
			$this->email->subject('Welcome To Trackmee Authencation Details');
			$this->email->message("Hi,<br>Your profile has been updated with ".$signature[0]['institute_signature'].". Your credentials is as follows:<br>  <p> Username: ".$username."<br> <p>  Password: ".$password."<br><br>   Regards,<br> ".$signature[0]['institute_signature']."");

			if($this->email->send()){
				if($school_admin[0]['school_authentication_details_sms'] == 1)
				{
					$sms_status = $this->Student_model->sms($number,$msg,$signature[0]['institute_sender_id']);
				}
				$encry_password = md5($password);
				$this->db->query("update credential set credential_password = '".$encry_password."' where credential_profile_id = ".$parent_id." and credential_user_type = 7");
				
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Parent Authencation Details Updated..");
	            $this->session->set_flashdata('text',"Updated details shared on register mobile number and email ID."); 
	            $this->session->set_flashdata('type',"success");
	            redirect('Student/view_student');
			}
		}

		function update_student($student_profile_id)
		{
			$this->session->set_userdata('user_data', $student_profile_id);
			redirect('Student/add_student');  
		}

		function add_student()
		{	
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			}	

			if(isset($this->session->userdata['school']))
			{
				$school_admin = $this->session->userdata('school');
			}
			elseif(isset($this->session->userdata['teacher']))
			{
				$school_admin = $this->session->userdata('teacher');
			}
			else{
				redirect('/');
			}

			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];

			$id = $this->session->userdata('user_data');
			$data['flash']['active'] = $this->session->flashdata('active');
        	$data['flash']['title'] = $this->session->flashdata('title');
        	$data['flash']['text'] = $this->session->flashdata('text');
        	$data['flash']['type'] = $this->session->flashdata('type');
        	$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$data['update_student'] = $this->Student_model->update_student($id);
			$data['father_details'] = $this->db->query("SELECT * FROM parent join credential on credential_profile_id = parent_profile_id where parent_type = 1 and credential_user_type =7 and parent_expiry_date='9999-12-31' and parent_student_profile_id=".$id." and parent_school_profile_id =".$employee_school_profile_id."")->result_array();
			$data['mother_details'] = $this->db->query("SELECT * FROM parent join credential on credential_profile_id = parent_profile_id where parent_type = 2 and credential_user_type =7 and parent_expiry_date='9999-12-31' and parent_student_profile_id=".$id." and parent_school_profile_id =".$employee_school_profile_id."")->result_array();
			$data['gardien_details'] = $this->db->query("SELECT * FROM parent join credential on credential_profile_id = parent_profile_id where parent_type = 3 and credential_user_type =7 and parent_expiry_date='9999-12-31' and parent_student_profile_id=".$id." and parent_school_profile_id =".$employee_school_profile_id."")->result_array();
			$data['document_details'] = $this->db->query("SELECT  doc_name,doc_number,doc_file,case when doc_type='0' then 'Duplicate' when doc_type='1' then 'Original' else 'NA' end as doc_type  FROM document where doc_user_type = '8' and doc_expiry_date='9999-12-31' and doc_school_profile_id =".$employee_school_profile_id." and doc_user =".$id."")->result_array();
			$data['class_details'] = $this->db->query("SELECT class_name,AY_name FROM `student_class_division_assgn` join class on class_id = SCD_class_id join school on SCD_school_profile_id = school_profile_id and SCD_AY_id = school_AY_id join academic_year on AY_id = SCD_AY_id where SCD_student_profile_id = ".$id." and SCD_expiry_date='9999-12-31' and SCD_school_profile_id=".$employee_school_profile_id."")->result_array();
			$data['fee_details'] = $this->db->query("SELECT * FROM total_fees join fees_type on total_fee_type_id = fees_type_id where total_fee_student_profile_id =".$id." and total_fee_school_profile_id = ".$employee_school_profile_id."")->result_array();
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$data['school_report_header'] = $school_admin[0]['school_report_header'];
			$data['school_report_footer'] = $school_admin[0]['school_report_footer'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];

			if(isset($this->session->userdata['school']))
			{
				$this->load->view('School/school_header', $admin);
			}elseif(isset($this->session->userdata['teacher'])){
				$this->load->view('Teacher/teacher_header', $admin);
			}
			$this->load->view('Student/student_details',$data);
			$this->load->view('Student/student_footer',$nav);
		}

		function print_student_form($student_profile_id)
		{
			$this->session->set_userdata('user_data', $student_profile_id);
			redirect('Student/student_form');  
		}

		function student_form()
		{	
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			}	

			if(isset($this->session->userdata['school']))
			{
				$school_admin = $this->session->userdata('school');
			}
			elseif(isset($this->session->userdata['teacher']))
			{
				$school_admin = $this->session->userdata('teacher');
			}
			else{
				redirect('/');
			}

			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];

			$id = $this->session->userdata('user_data');
			$data['flash']['active'] = $this->session->flashdata('active');
        	$data['flash']['title'] = $this->session->flashdata('title');
        	$data['flash']['text'] = $this->session->flashdata('text');
        	$data['flash']['type'] = $this->session->flashdata('type');
			$data['update_student'] = $this->Student_model->update_student($id);
			$data['father_details'] = $this->db->query("SELECT * FROM parent where parent_type = 1 and parent_expiry_date='9999-12-31' and parent_student_profile_id=".$id." and parent_school_profile_id =".$employee_school_profile_id."")->result_array();
			$data['mother_details'] = $this->db->query("SELECT * FROM parent where parent_type = 2 and parent_expiry_date='9999-12-31' and parent_student_profile_id=".$id." and parent_school_profile_id =".$employee_school_profile_id."")->result_array();
			$data['gardien_details'] = $this->db->query("SELECT * FROM parent where parent_type = 3 and parent_expiry_date='9999-12-31' and parent_student_profile_id=".$id." and parent_school_profile_id =".$employee_school_profile_id."")->result_array();
			$data['birthday_details'] = $this->db->query("SELECT * FROM document where doc_user_type = '8' and doc_name='Birth_Certificate' and doc_expiry_date='9999-12-31' and doc_school_profile_id =".$employee_school_profile_id." and doc_user =".$id."")->result_array();
			$data['transfer_details'] = $this->db->query("SELECT * FROM document where doc_user_type = '8' and doc_name='Transfer_Certificate' and doc_expiry_date='9999-12-31' and doc_school_profile_id =".$employee_school_profile_id." and doc_user =".$id."")->result_array();
			$data['medical_details'] = $this->db->query("SELECT * FROM document where doc_user_type = '8' and doc_name='Medical_Certificate' and doc_expiry_date='9999-12-31' and doc_school_profile_id =".$employee_school_profile_id." and doc_user =".$id."")->result_array();
			$data['adhar_details'] = $this->db->query("SELECT * FROM document where doc_user_type = '8' and doc_name='Adhar_Card' and doc_expiry_date='9999-12-31' and doc_school_profile_id =".$employee_school_profile_id." and doc_user =".$id."")->result_array();
			$data['class_details'] = $this->db->query("SELECT class_name,AY_name FROM `student_class_division_assgn` join class on class_id = SCD_class_id join school on SCD_school_profile_id = school_profile_id and SCD_AY_id = school_AY_id join academic_year on AY_id = SCD_AY_id where SCD_student_profile_id = ".$id." and SCD_expiry_date='9999-12-31' and SCD_school_profile_id=".$employee_school_profile_id."")->result_array();
			$bday = new Datetime($data['update_student'][0]['student_DOB']);
			$today = new DateTime('00:00:00');
			$diff = $today->diff($bday);
			$data['year'] = $diff->y;
			$data['month'] = $diff->m;
			$data['day'] = $diff->d;
			$adhar_card = $data['update_student'][0]['student_adhar_card_number'];
			$adhar_card1 = substr($adhar_card,0,4);
			$adhar_card2 = substr($adhar_card,4,4);
			$adhar_card3 = substr($adhar_card,8,4);
			$data['adhar_card_number'] = $adhar_card1." ".$adhar_card2." ".$adhar_card3;
			
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$data['school_report_header'] = $school_admin[0]['school_report_header'];
			$data['school_report_footer'] = $school_admin[0]['school_report_footer'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];

			if(isset($this->session->userdata['school']))
			{
				$this->load->view('School/school_header', $admin);
			}elseif(isset($this->session->userdata['teacher'])){
				$this->load->view('Teacher/teacher_header', $admin);
			}
			$this->load->view('Student/student_form',$data);
		}

		function student_deactive($student_profile_id)			
		{
			$this->session->set_userdata('Student_deactive',$student_profile_id);
			redirect('Student/deactive');
		}

		function deactive()
		{
			$student_profile_id = $this->session->userdata('Student_deactive');

			$con = $this->Student_model->deactive($student_profile_id);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Student not Deactivated...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Student/view_');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Student Deactivated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Student/view_student');
			}
		}

		function student_active($student_profile_id)			
		{
			$this->session->set_userdata('Student_active',$student_profile_id);
			redirect('Student/active');
		}

		function active()
		{
			$student_profile_id = $this->session->userdata('Student_active');

			$this->Student_model->active($student_profile_id);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Student not Activated...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Student/view_student');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Student Activated.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Student/view_student');
			}
		}

		function already_exits_mobile()
		{
			if(isset($this->session->userdata['school']))
			{
				$school_admin = $this->session->userdata('school');
			}
			elseif(isset($this->session->userdata['teacher']))
			{
				$school_admin = $this->session->userdata('teacher');
			}
			else{
				redirect('/');
			}

			$mobile['profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$mobile['num'] = $_POST['num'];
			$mobile['name'] = $_POST['name'];
			$mobile['parent'] = $_POST['parent'];
			$data = $this->Student_model->already_exits_mobile($mobile);
			echo json_decode($data);
		}

		function already_exits_email()
		{
			$email = $_POST['email'];
			$data = $this->Student_model->already_exits_email($email);
			echo json_decode($data);
		}

		function GRN_verification()
		{
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			}	

			if(isset($this->session->userdata['school']))
			{
				$school_admin = $this->session->userdata('school');
			}
			elseif(isset($this->session->userdata['teacher']))
			{
				$school_admin = $this->session->userdata('teacher');
			}
			else{
				redirect('/');
			}
			$student_GRN = $_POST['GRN'];
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$data = $this->db->query("SELECT * FROM student where student_GRN =".$student_GRN." and student_school_profile_id =".$employee_school_profile_id." and student_expiry_date = '9999-12-31'")->num_rows();
			echo json_encode($data);
		}
	}
?>