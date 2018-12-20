<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Fee extends CI_Controller
	{
		function fee_setup()
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
			$fee['flash']['active'] = $this->session->flashdata('active');
        	$fee['flash']['title'] = $this->session->flashdata('title');
        	$fee['flash']['text'] = $this->session->flashdata('text');
        	$fee['flash']['type'] = $this->session->flashdata('type');
        	
			$school_admin = $this->session->userdata('school');
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
			$fee['functionality'] = $this->School_model->fetch_functionality($school);
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$school_AY_id = $school_admin[0]['school_AY_id'];
			$fee['class_details'] =  $this->Notification_model->fetch_class($employee_school_profile_id);
			$fee['fee_types'] =  $this->Fee_model->fetch_fee_types($employee_school_profile_id);
			$fee['fee_waiver'] =  $this->Fee_model->fetch_fee_waiver($employee_school_profile_id,$school_AY_id);
			$fee['fee_category'] =  $this->Fee_model->fetch_fee_category($employee_school_profile_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['fee'] = 'fee';

			$this->load->view('School/school_header', $admin);
			$this->load->view('Fee/fee_setup',$fee);
			$this->load->view('Fee/fee_footer',$nav);
		}

		function fee_details()
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
			$fee['flash']['active'] = $this->session->flashdata('active');
        	$fee['flash']['title'] = $this->session->flashdata('title');
        	$fee['flash']['text'] = $this->session->flashdata('text');
        	$fee['flash']['type'] = $this->session->flashdata('type');
        	
			$school_admin = $this->session->userdata('school');
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
			$fee['functionality'] = $this->School_model->fetch_functionality($school);
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$school_AY_id = $school_admin[0]['school_AY_id'];
			$fee['class_details'] =  $this->Notification_model->fetch_class($employee_school_profile_id);
			$fee['fee_types'] =  $this->Fee_model->fetch_fee_types($employee_school_profile_id);
			$fee['fee_waiver'] =  $this->Fee_model->fetch_fee_waiver($employee_school_profile_id,$school_AY_id);
			$fee['fee_category'] =  $this->Fee_model->fetch_fee_category($employee_school_profile_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['fee'] = 'fee';

			$this->load->view('School/school_header', $admin);
			$this->load->view('Fee/fee_details',$fee);
			$this->load->view('Fee/fee_footer',$nav);
		}

		function add_fee_category()
		{
			$school_admin = $this->session->userdata('school');
			$Fee['fee_category_name'] = $this->input->post('fee_category_name');
			$Fee['fee_category_effective_date'] = date('Y-m-d');
			$Fee['fee_category_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$cnt = $this->Fee_model->fee_category($Fee);
			if ($cnt == 1) {
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Fee Category Added Successfully.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Fee/fee_setup');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Not Added.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Fee/fee_setup');
			}
		}		

		function add_fee_waiver()
		{
			$school_admin = $this->session->userdata('school');
			$Fee['fee_waiver_student_profile_id'] = $this->input->post('fee_waiver_student_profile_id');
			$Fee['fee_waiver_fee_type_id'] = $this->input->post('fee_waiver_fee_type_id');
			$Fee['fee_waiver_name'] = $this->input->post('fee_waiver_name');
			$Fee['fee_waiver_amount'] = $this->input->post('fee_waiver_amount');
			$Fee['fee_waiver_effective_date'] = date('Y-m-d');
			$Fee['fee_waiver_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$Fee['fee_waiver_AY_id'] = $school_admin[0]['school_AY_id'];
			$cnt = $this->Fee_model->fee_waiver($Fee);
			if ($cnt == 1) {
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Fee Waiver Added Successfully.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Fee/fee_details');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Not Added.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Fee/fee_details');
			}
		}


		function add_fee_types()
		{
			$school_admin = $this->session->userdata('school');
			$Fee['fees_type_name'] = $this->input->post('fees_type_name');
			$Fee['fees_type_class_id'] = $this->input->post('fees_type_class_id');
			$Fee['fees_type_amount'] = $this->input->post('fees_type_amount');
			$Fee['fees_type_effective_date'] = date('Y-m-d');
			$Fee['fees_type_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$Fee['fees_type_school_AY_id'] = $school_admin[0]['school_AY_id'];
			$cnt = $this->Fee_model->fee_types($Fee);
			if ($cnt == 1) {
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Fee Type Added Successfully.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Fee/fee_details');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Not Added.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Fee/fee_details');
			}
		}

		function update_fee_type($fees_type_id)
		{
			$this->session->set_userdata('fee',$fees_type_id);
			redirect('Fee/edit_fees');
		}

		function edit_fees()
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
			$noti['flash']['active'] = $this->session->flashdata('active');
        	$noti['flash']['title'] = $this->session->flashdata('title');
        	$noti['flash']['text'] = $this->session->flashdata('text');
        	$noti['flash']['type'] = $this->session->flashdata('type');
        	
			$fees_type_id = $this->session->userdata('fee');
			$school_admin = $this->session->userdata('school');
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
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$fee['class_details'] =  $this->Notification_model->fetch_class($employee_school_profile_id);
			$fee['fee_types'] =  $this->Fee_model->fetch_fee_types_detials($fees_type_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['fee'] = 'fee';

			$this->load->view('School/school_header', $admin);
			$this->load->view('Fee/update_fee_type',$fee);
			$this->load->view('Fee/fee_footer',$nav);
		}

		function fee_types_edit()
		{
			$school_admin = $this->session->userdata('school');
			$Fee['fees_type_id'] = $this->input->post('fees_type_id');
			$Fee['fees_type_name'] = $this->input->post('fees_type_name');
			$Fee['fees_type_class_id'] = $this->input->post('fees_type_class_id');
			$Fee['fees_type_amount'] = $this->input->post('fees_type_amount');
			$cnt = $this->Fee_model->update_fee_types($Fee);
			if ($cnt == 1) {
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Fee Type Updated Successfully.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Fee/fee_details');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Not UPdated.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Fee/fee_details');
			}
		}

		function fetch_class_division()
		{
			$school_admin = $this->session->userdata('school');
			$class['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$class['class_id'] = $_POST['class_id'];
			$data = $this->Fee_model->fetch_class_division($class);
			echo json_encode($data);
		}

		function fetch_class_division_student()
		{
			$school_admin = $this->session->userdata('school');
			$student['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$student['class_id'] = $_POST['class_id'];
			$student['division_id'] = $_POST['division_id'];
			$data = $this->Fee_model->fetch_class_division_student($student);
			echo json_encode($data);
		}

		function fetch_student_payments()
		{
			$school_admin = $this->session->userdata('school');
			$payment['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$payment['class_id'] = $_POST['class_id'];
			$payment['student_profile_id'] = $_POST['student_profile_id'];
			$data = $this->Fee_model->fetch_student_payments($payment);
			echo json_encode($data);
		}

		function fetch_student_total_payments()
		{
			$school_admin = $this->session->userdata('school');
			$payment['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$payment['class_id'] = $_POST['class_id'];
			$payment['student_profile_id'] = $_POST['student_profile_id'];
			$data = $this->Fee_model->fetch_student_total_payments($payment);
			echo json_encode($data);
		}

		function add_student_payment()
		{
			$school_admin = $this->session->userdata('school');
			$payment['fee_student_profile_id'] = $this->input->post('fee_student_profile_id');
			// $payment['fee_type_id'] = $this->input->post('fee_type_id');
			$payment['fee_amount'] = $this->input->post('fee_amount');
			$payment['fee_payment_mode'] = $this->input->post('fee_payment_mode');
			$payment['fee_transaction_number'] = $this->input->post('fee_transaction_number');
			$payment['fee_datetime'] = $this->input->post('fee_datetime');
			$payment['fee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$payment['fee_AY_id'] = $school_admin[0]['school_AY_id'];
			$cnt = $this->Fee_model->add_student_payment($payment);
			if ($cnt == 1) {
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Fee  Updated Successfully.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Fee/fee_details');
			}
			else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Not Updated.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Fee/fee_details');
			}
		}

		function payment_history()
		{
			$school_admin = $this->session->userdata('school');
			$PH['fee_AY_id'] = $school_admin[0]['school_AY_id'];;
			$PH['student_profile_id'] = $_POST['student_profile_id'];
			$data = $this->Fee_model->payment_history($PH);
			echo json_encode($data);
		}
		function fee_payment_receipt($fee_id)
		{
			$this->session->set_userdata('fee_receipt_id',$fee_id);
			redirect('Fee/fee_receipt');
		}

		function fee_receipt()
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
			$noti['flash']['active'] = $this->session->flashdata('active');
        	$noti['flash']['title'] = $this->session->flashdata('title');
        	$noti['flash']['text'] = $this->session->flashdata('text');
        	$noti['flash']['type'] = $this->session->flashdata('type');
        	
			$fees_type_id = $this->session->userdata('fee');
			$school_admin = $this->session->userdata('school');
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
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$fee['fee_id'] = $this->session->userdata('fee_receipt_id');
			$fee['fee_details'] =  $this->db->query("SELECT fee_datetime,fee_amount,fee_payment_mode,student_first_name,student_middle_name,student_last_name,student_present_address,class_name,division_name,school_leaving_certificate_header,school_leaving_certificate_footer FROM fee join student  on  fee_student_profile_id = student_profile_id join school on student_school_profile_id = school_profile_id join  student_class_division_assgn on  SCD_student_profile_id = fee_student_profile_id  join  class on  SCD_class_id = class_id  join  division on  SCD_division_id = division_id  where  fee_id =".$fee['fee_id']."")->result_array();
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['fee'] = 'fee';

			$this->load->view('School/school_header', $admin);
			$this->load->view('Fee/fee_receipt',$fee);
			$this->load->view('Fee/fee_footer',$nav);		
		}
	}
 ?>