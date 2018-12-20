<?php 

/**
* 
*/
date_default_timezone_set('Asia/Kolkata');
class Reports extends CI_Controller
{
	function tracking_report_details()
	{
		if(!isset($this->session->userdata['school'])){
			redirect('/');
		}
		if(isset($this->session->userdata['direct'])){
			$admin['direct'] = $this->session->userdata('direct');
		}
		else{
			$admin['direct'] = 1;
		} 

		$class_details['flash']['active'] = $this->session->flashdata('active');
    	$class_details['flash']['title'] = $this->session->flashdata('title');
    	$class_details['flash']['text'] = $this->session->flashdata('text');
    	$class_details['flash']['type'] = $this->session->flashdata('type');
    	
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
		$report['bus'] =  $this->Reports_model->fetch_school_bus($employee_school_profile_id);

		$report['school_report_header'] = $school_admin[0]['school_report_header'];
		$report['school_report_footer'] = $school_admin[0]['school_report_footer'];
		$nav['school_name'] = $school_admin[0]['school_name'];
		$nav['school_logo'] = $school_admin[0]['school_logo'];
		$nav['report'] = 'report';

		$this->load->view('School/school_header', $admin);
		$this->load->view('Reports/tracking_report_details',$report);
		$this->load->view('Reports/tracking_report_footer',$nav);
	}

	function distance_report_details()
	{
		
		$school_admin = $this->session->userdata('school');
		$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
		$report['bus'] = $_POST['bus'];
		$from_date = $_POST['from'];
		$to_date = $_POST['to'];
		$report['from'] = date("Y-m-d", strtotime($from_date)).' '.'00:00:00';
		$report['to'] = date("Y-m-d", strtotime($to_date)).' '.'00:00:00';
		$data = $this->Reports_model->distance_report_details($report);
		echo json_encode($data);
	}

	function stoppage_report_details()
	{
		$school_admin = $this->session->userdata('school');
		$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
		$report['min'] = $_POST['min'];
		$report['bus'] = $_POST['bus'];
		$from_date = $_POST['from'];
		$to_date = $_POST['to'];
		$report['from'] = date("Y-m-d", strtotime($from_date)).' '.'00:00:00';
		$report['to'] = date("Y-m-d", strtotime($to_date)).' '.'00:00:00';
		$res = $this->Reports_model->stoppage_report_details($report);
	   	echo json_encode($res);
	}

	function overspeed_report_details()
	{
		$school_admin = $this->session->userdata('school');
		$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
		$report['speed'] = $_POST['speed'];
		$report['bus'] = $_POST['bus'];
		$from_date = $_POST['from'];
		$to_date = $_POST['to'];
		$report['from'] = date("Y-m-d", strtotime($from_date)).' '.'00:00:00';
		$report['to'] = date("Y-m-d", strtotime($to_date)).' '.'00:00:00';
		$res = $this->Reports_model->overspeed_report_details($report);
	   	echo json_encode($res);
	}

	function history_report_details()
	{
		$school_admin = $this->session->userdata('school');
		$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
		$report['bus'] = $_POST['bus'];
		$from_date = $_POST['from'];
		$to_date = $_POST['to'];

		$report['from'] = date("Y-m-d", strtotime($from_date)).' '.'00:00:00';
		$report['to'] = date("Y-m-d", strtotime($to_date)).' '.'00:00:00';

		$res = $this->Reports_model->history_report_details($report);
		
	   	echo json_encode($res);

	   	$bus_device_id = $_POST['bus'];
		$this->session->set_userdata('lat_lon_data',$res);
		$this->session->set_userdata('bus_device_id',$bus_device_id);
	}

	public function view_history_map()
	{
		
			if(!isset($this->session->userdata['school']))
			{
				redirect('/');
			} 
			if(isset($this->session->userdata['direct'])){
				$data['direct'] = $this->session->userdata('direct');
			}
			else{
				$data['direct'] = 1;
			}

			$school_admin = $this->session->userdata('school');
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];

			$school_admin = $this->session->userdata('school');
			$data['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$data['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$data['photo'] = $school_admin[0]['employee_photo'];
			$data['first_name'] = $school_admin[0]['employee_first_name'];
			$data['last_name'] = $school_admin[0]['employee_last_name'];
			$data['email_id'] = $school_admin[0]['employee_email_id'];
			$data['username'] = $school_admin[0]['credential_username'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$data['functionality'] = $this->School_model->fetch_functionality($school);

			$data['school_name'] = $school_admin[0]['school_name'];
			$data['school_logo'] = $school_admin[0]['school_logo'];
			$data['map'] = 'map';

			$data['map_key1'] = $this->db->query("SELECT school_google_web_map_key FROM `school` where school_profile_id = '".$employee_school_profile_id."'")->row();

			$data['map_key'] = $data['map_key1']->school_google_web_map_key;
			
			$data['lat_lon_data'] = $this->session->userdata('lat_lon_data');
			$data['bus_device_id'] = $this->session->userdata('bus_device_id');
			$data['bus_no'] = $this->db->query(" SELECT bus_no FROM bus where bus_device_id = '".$data['bus_device_id']."'")->row()->bus_no;
		    
		   	$this->load->view('Map/history_map',$data);
	}

	function enquiry_student_report()
	{
		if(!isset($this->session->userdata['school'])){
			redirect('/');
		}
		if(isset($this->session->userdata['direct'])){
			$admin['direct'] = $this->session->userdata('direct');
		}
		else{
			$admin['direct'] = 1;
		} 

		$class_details['flash']['active'] = $this->session->flashdata('active');
    	$class_details['flash']['title'] = $this->session->flashdata('title');
    	$class_details['flash']['text'] = $this->session->flashdata('text');
    	$class_details['flash']['type'] = $this->session->flashdata('type');
    	
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
		$report['class'] =  $this->db->query("SELECT * FROM class where class_school_profile_id = ".$employee_school_profile_id." and class_expiry_date='9999-12-31' GROUP BY class_name")->result_array();
		$report['admission_class'] =  $this->db->query("SELECT enquiry_admission_class FROM `enquiry` where enquiry_school_profile_id =".$employee_school_profile_id." group by enquiry_admission_class")->result_array();
		$report['school'] =  $this->db->query("select school.* from school where school_profile_id =".$employee_school_profile_id."")->result_array();

		$report['school_report_header'] = $school_admin[0]['school_report_header'];
		$report['school_report_footer'] = $school_admin[0]['school_report_footer'];
		$nav['school_name'] = $school_admin[0]['school_name'];
		$nav['school_logo'] = $school_admin[0]['school_logo'];
		$nav['report'] = 'student';

		$this->load->view('School/school_header', $admin);
		$this->load->view('Reports/enquiry_student_report',$report);
		$this->load->view('Reports/enquiry_student_report_footer',$nav);
	}

	function fetch_class_division()
	{
		$school_admin = $this->session->userdata('school');
		$class_id = $_POST['class_id'];
		$school_id = $school_admin[0]['employee_school_profile_id'];
		$data = $this->db->query("SELECT * FROM division where division_class_id =".$class_id." and division_school_profile_id =".$school_id." and division_expiry_date = '9999-12-31' GROUP BY division_name")->result_array();
		echo json_encode($data);
	}

	function gender_school_report()
	{
		$school_admin = $this->session->userdata('school');
		$gender_school['gender'] = $_POST['gender'];
		$gender_school['school_id'] = $school_admin[0]['employee_school_profile_id'];
		$data = $this->db->query("SELECT student.*,class_name,division_name FROM `student` left join student_class_division_assgn on student_profile_id = SCD_student_profile_id left join class on class_id = SCD_class_id left join division on division_id = SCD_division_id where student_gender = '".$gender_school['gender']."' and student_school_profile_id =".$gender_school['school_id']." and student_expiry_date = '9999-12-31'")->result();
		echo json_encode($data);
	}

	function gender_batch_report()
	{
		$school_admin = $this->session->userdata('school');
		$gender_batch['gender'] = $_POST['gender'];
		$gender_batch['class_id'] = $_POST['class_id'];
		$gender_batch['division_id'] = $_POST['division_id'];
		$gender_batch['school_id'] = $school_admin[0]['employee_school_profile_id'];
		$data = $this->db->query("SELECT student.*,class_name,division_name FROM `student` left join student_class_division_assgn on student_profile_id = SCD_student_profile_id left join class on class_id = SCD_class_id left join division on division_id = SCD_division_id where student_gender ='".$gender_batch['gender']."' and SCD_class_id =".$gender_batch['class_id']." and SCD_division_id =".$gender_batch['division_id']." and student_school_profile_id =".$gender_batch['school_id']." and student_expiry_date ='9999-12-31' and SCD_expiry_date ='9999-12-31'")->result();
		echo json_encode($data);
	}

	function caste_school_report()
	{
		$school_admin = $this->session->userdata('school');
		$caste_school['cast'] = $_POST['caste'];
		$caste_school['school_id'] = $school_admin[0]['employee_school_profile_id'];
		$data = $this->db->query("SELECT student.*,class_name,division_name FROM `student` left join student_class_division_assgn on student_profile_id = SCD_student_profile_id left join class on class_id = SCD_class_id left join division on division_id = SCD_division_id where student_category ='".$caste_school['cast']."' and student_school_profile_id =".$caste_school['school_id']." and student_expiry_date = '9999-12-31'")->result();
		echo json_encode($data);
	}

	function caste_batch_report()
	{
		$school_admin = $this->session->userdata('school');
		$caste_batch['cast'] = $_POST['caste'];
		$caste_batch['class_id'] = $_POST['class_id'];
		$caste_batch['division_id'] = $_POST['division_id'];
		$caste_batch['school_id'] = $school_admin[0]['employee_school_profile_id'];
		$data = $this->db->query("SELECT student.*,class_name,division_name FROM `student` left join student_class_division_assgn on student_profile_id = SCD_student_profile_id left join class on class_id = SCD_class_id left join division on division_id = SCD_division_id where student_category ='".$caste_batch['cast']."' and SCD_class_id =".$caste_batch['class_id']." and SCD_division_id =".$caste_batch['division_id']." and student_school_profile_id =".$caste_batch['school_id']." and student_expiry_date ='9999-12-31' and SCD_expiry_date ='9999-12-31'")->result();
		echo json_encode($data);
	}

	function school_enquiry_report()
	{
		$school_admin = $this->session->userdata('school');
		$enquiry_school['school_id'] = $_POST['school_id'];
		$data = $this->db->query("SELECT * FROM `enquiry` where enquiry_school_profile_id =".$enquiry_school['school_id']."")->result();
		echo json_encode($data);
	}

	function enquiry_admission_class_report()
	{
		$school_admin = $this->session->userdata('school');
		$admission_class['class'] = $_POST['admission_class'];
		$admission_class['school_id'] = $school_admin[0]['employee_school_profile_id'];
		$data = $this->db->query("SELECT * FROM `enquiry` where enquiry_admission_class = '".$admission_class['class']."' and enquiry_school_profile_id =".$admission_class['school_id']."")->result();
		echo json_encode($data);
	}

	function class_wise_report()
	{
		$school_admin = $this->session->userdata('school');
		$class['class_id'] = $_POST['class_id'];
		$class['school_id'] = $school_admin[0]['employee_school_profile_id'];
		$class['AY_id'] = $school_admin[0]['AY_id'];
		$data = $this->db->query("SELECT student.*,class_name,division_name FROM `student` join student_class_division_assgn on student_profile_id = SCD_student_profile_id  join class on class_id = SCD_class_id left join division on division_id = SCD_division_id where SCD_AY_id ='".$class['AY_id']."' and SCD_class_id =".$class['class_id']." and student_school_profile_id =".$class['school_id']." and student_expiry_date ='9999-12-31' and SCD_expiry_date ='9999-12-31'")->result();
		echo json_encode($data);
	}

	function division_class_report()
	{
		$school_admin = $this->session->userdata('school');
		$division_class['class_id'] = $_POST['class_id'];
		$division_class['division_id'] = $_POST['division_id'];
		$division_class['school_id'] = $school_admin[0]['employee_school_profile_id'];
		$division_class['AY_id'] = $school_admin[0]['AY_id'];
		$data = $this->db->query("SELECT student.*,class_name,division_name FROM `student` join student_class_division_assgn on student_profile_id = SCD_student_profile_id join class on class_id = SCD_class_id join division on division_id = SCD_division_id where SCD_AY_id ='".$division_class['AY_id']."' and SCD_class_id =".$division_class['class_id']." and SCD_division_id =".$division_class['division_id']." and student_school_profile_id =".$division_class['school_id']." and student_expiry_date ='9999-12-31' and SCD_expiry_date ='9999-12-31'")->result();
		echo json_encode($data);
	}

	function fee_report()
	{
		if(!isset($this->session->userdata['school'])){
			redirect('/');
		}
		if(isset($this->session->userdata['direct'])){
			$admin['direct'] = $this->session->userdata('direct');
		}
		else{
			$admin['direct'] = 1;
		} 

		$class_details['flash']['active'] = $this->session->flashdata('active');
    	$class_details['flash']['title'] = $this->session->flashdata('title');
    	$class_details['flash']['text'] = $this->session->flashdata('text');
    	$class_details['flash']['type'] = $this->session->flashdata('type');
    	
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
		$report['class'] =  $this->db->query("SELECT * FROM class where class_school_profile_id = ".$employee_school_profile_id." and class_expiry_date='9999-12-31' GROUP BY class_name")->result_array();
		$report['admission_class'] =  $this->db->query("SELECT enquiry_admission_class FROM `enquiry` where enquiry_school_profile_id =".$employee_school_profile_id." group by enquiry_admission_class")->result_array();
		$report['school'] =  $this->db->query("select school.* from school where school_profile_id =".$employee_school_profile_id."")->result_array();

		$report['school_report_header'] = $school_admin[0]['school_report_header'];
		$report['school_report_footer'] = $school_admin[0]['school_report_footer'];
		$nav['school_name'] = $school_admin[0]['school_name'];
		$nav['school_logo'] = $school_admin[0]['school_logo'];
		$nav['report'] = 'fee';

		$this->load->view('School/school_header', $admin);
		$this->load->view('Reports/fee_report',$report);
		$this->load->view('Reports/fee_report_footer',$nav);
	}

	function school_total_fee_report()
	{
		$school_admin = $this->session->userdata('school');
		$school_id = $school_admin[0]['employee_school_profile_id'];
		$data = $this->db->query("select Student_profile_id,student_GRN,CONCAT(Student_first_name,' ',student_last_name) as student_name,student_gender,parent_profile_id,CONCAT(parent_first_name,' ',parent_last_name) as parent_name ,parent_mobile_number ,case  when class_id is NULL then '0' else class_id end as class_id ,case  when class_name is NULL then 'N/A' else class_name end as class_name ,case  when division_id is NULL then '0' else division_id end as division_id ,case  when division_name is NULL then 'N/A' else division_name end as division_name ,case  when total_fee_amount is NULL then '0' else total_fee_amount end as total_fee_amount ,case  when fee_waiver_amount is NULL then '0' else fee_waiver_amount end as fee_waiver_amount ,case  when fee_amount is NULL then '0' else fee_amount end as fee_amount, case when fee_waiver_amount is NULL and fee_amount is NULL AND total_fee_amount is NULL then '0' when fee_waiver_amount is NULL and fee_amount is NULL then total_fee_amount when fee_waiver_amount is NULL then (total_fee_amount-fee_amount) when fee_amount is NULL then (total_fee_amount-fee_waiver_amount) else (total_fee_amount-fee_waiver_amount-fee_amount) end as balance from student
								join school on student_school_profile_id=school_profile_id left join parent on parent_profile_id=student_parent_id left join student_class_division_assgn on SCD_student_profile_id=student_profile_id and SCD_AY_id=school_AY_id and SCD_expiry_date='9999-12-31' left join class on SCD_class_id=class_id and class_expiry_date='9999-12-31' left join division on SCD_division_id=division_id and division_expiry_date='9999-12-31' left join (select total_fee_student_profile_id,sum(total_fee_amount) as total_fee_amount,total_fee_AY_id from total_fees group by total_fee_student_profile_id) as total_fees on total_fee_student_profile_id=student_parent_id and total_fee_AY_id=school_AY_id left join (select fee_waiver_student_profile_id,sum(fee_waiver_amount) as fee_waiver_amount,fee_waiver_AY_id from fee_waiver group by fee_waiver_student_profile_id) as fee_waiver on fee_waiver_student_profile_id=student_parent_id and fee_waiver_AY_id=school_AY_id left join (select fee_student_profile_id,sum(fee_amount) as fee_amount,fee_AY_id from fee group by fee_student_profile_id) as fee on fee_student_profile_id=student_profile_id and fee_AY_id=school_AY_id where student_school_profile_id=".$school_id." and student_expiry_date='9999-12-31'")->result();
		echo json_encode($data);
	}

	function class_total_fee_report()
	{
		$school_admin = $this->session->userdata('school');
		$school_id = $school_admin[0]['employee_school_profile_id'];
		$class_id = $_POST['class_id'];
		$data = $this->db->query("select Student_profile_id,student_GRN,CONCAT(Student_first_name,' ',student_last_name) as student_name,student_gender,parent_profile_id,CONCAT(parent_first_name,' ',parent_last_name) as parent_name ,parent_mobile_number ,case  when class_id is NULL then '0' else class_id end as class_id ,case  when class_name is NULL then 'N/A' else class_name end as class_name ,case  when division_id is NULL then '0' else division_id end as division_id ,case  when division_name is NULL then 'N/A' else division_name end as division_name ,case  when total_fee_amount is NULL then '0' else total_fee_amount end as total_fee_amount ,case  when fee_waiver_amount is NULL then '0' else fee_waiver_amount end as fee_waiver_amount ,case  when fee_amount is NULL then '0' else fee_amount end as fee_amount, case when fee_waiver_amount is NULL and fee_amount is NULL AND total_fee_amount is NULL then '0' when fee_waiver_amount is NULL and fee_amount is NULL then total_fee_amount when fee_waiver_amount is NULL then (total_fee_amount-fee_amount) when fee_amount is NULL then (total_fee_amount-fee_waiver_amount) else (total_fee_amount-fee_waiver_amount-fee_amount) end as balance from student
								join school on student_school_profile_id=school_profile_id left join parent on parent_profile_id=student_parent_id left join student_class_division_assgn on SCD_student_profile_id=student_profile_id and SCD_AY_id=school_AY_id and SCD_expiry_date='9999-12-31' left join class on SCD_class_id=class_id and class_expiry_date='9999-12-31' left join division on SCD_division_id=division_id and division_expiry_date='9999-12-31' left join (select total_fee_student_profile_id,sum(total_fee_amount) as total_fee_amount,total_fee_AY_id from total_fees group by total_fee_student_profile_id) as total_fees on total_fee_student_profile_id=student_parent_id and total_fee_AY_id=school_AY_id left join (select fee_waiver_student_profile_id,sum(fee_waiver_amount) as fee_waiver_amount,fee_waiver_AY_id from fee_waiver group by fee_waiver_student_profile_id) as fee_waiver on fee_waiver_student_profile_id=student_parent_id and fee_waiver_AY_id=school_AY_id left join (select fee_student_profile_id,sum(fee_amount) as fee_amount,fee_AY_id from fee group by fee_student_profile_id) as fee on fee_student_profile_id=student_profile_id and fee_AY_id=school_AY_id where student_school_profile_id=".$school_id." and class_id=".$class_id." and student_expiry_date='9999-12-31'")->result();
		echo json_encode($data);		
	}

	function division_total_fee_report()
	{
		$school_admin = $this->session->userdata('school');
		$school_id = $school_admin[0]['employee_school_profile_id'];
		$class_id = $_POST['class_id'];
		$division_id = $_POST['division_id'];
		$data = $this->db->query("select Student_profile_id,student_GRN,CONCAT(Student_first_name,' ',student_last_name) as student_name,student_gender,parent_profile_id,CONCAT(parent_first_name,' ',parent_last_name) as parent_name ,parent_mobile_number ,case  when class_id is NULL then '0' else class_id end as class_id ,case  when class_name is NULL then 'N/A' else class_name end as class_name ,case  when division_id is NULL then '0' else division_id end as division_id ,case  when division_name is NULL then 'N/A' else division_name end as division_name ,case  when total_fee_amount is NULL then '0' else total_fee_amount end as total_fee_amount ,case  when fee_waiver_amount is NULL then '0' else fee_waiver_amount end as fee_waiver_amount ,case  when fee_amount is NULL then '0' else fee_amount end as fee_amount, case when fee_waiver_amount is NULL and fee_amount is NULL AND total_fee_amount is NULL then '0' when fee_waiver_amount is NULL and fee_amount is NULL then total_fee_amount when fee_waiver_amount is NULL then (total_fee_amount-fee_amount) when fee_amount is NULL then (total_fee_amount-fee_waiver_amount) else (total_fee_amount-fee_waiver_amount-fee_amount) end as balance from student
								join school on student_school_profile_id=school_profile_id left join parent on parent_profile_id=student_parent_id left join student_class_division_assgn on SCD_student_profile_id=student_profile_id and SCD_AY_id=school_AY_id and SCD_expiry_date='9999-12-31' left join class on SCD_class_id=class_id and class_expiry_date='9999-12-31' left join division on SCD_division_id=division_id and division_expiry_date='9999-12-31' left join (select total_fee_student_profile_id,sum(total_fee_amount) as total_fee_amount,total_fee_AY_id from total_fees group by total_fee_student_profile_id) as total_fees on total_fee_student_profile_id=student_parent_id and total_fee_AY_id=school_AY_id left join (select fee_waiver_student_profile_id,sum(fee_waiver_amount) as fee_waiver_amount,fee_waiver_AY_id from fee_waiver group by fee_waiver_student_profile_id) as fee_waiver on fee_waiver_student_profile_id=student_parent_id and fee_waiver_AY_id=school_AY_id left join (select fee_student_profile_id,sum(fee_amount) as fee_amount,fee_AY_id from fee group by fee_student_profile_id) as fee on fee_student_profile_id=student_profile_id and fee_AY_id=school_AY_id where student_school_profile_id=".$school_id." and class_id=".$class_id." and division_id=".$division_id." and student_expiry_date='9999-12-31'")->result();
		echo json_encode($data);		
	}

	function school_due_fee_report()
	{
		$school_admin = $this->session->userdata('school');
		$school_id = $school_admin[0]['employee_school_profile_id'];
		$data = $this->db->query("select * from(select Student_profile_id,student_GRN,CONCAT(Student_first_name,' ',student_last_name) as student_name,student_gender,parent_profile_id,CONCAT(parent_first_name,' ',parent_last_name) as parent_name ,parent_mobile_number ,case  when class_id is NULL then '0' else class_id end as class_id ,case  when class_name is NULL then 'N/A' else class_name end as class_name ,case  when division_id is NULL then '0' else division_id end as division_id ,case  when division_name is NULL then 'N/A' else division_name end as division_name ,case  when total_fee_amount is NULL then '0' else total_fee_amount end as total_fee_amount ,case  when fee_waiver_amount is NULL then '0' else fee_waiver_amount end as fee_waiver_amount ,case  when fee_amount is NULL then '0' else fee_amount end as fee_amount, case when fee_waiver_amount is NULL and fee_amount is NULL AND total_fee_amount is NULL then '0' when fee_waiver_amount is NULL and fee_amount is NULL then total_fee_amount when fee_waiver_amount is NULL then (total_fee_amount-fee_amount) when fee_amount is NULL then (total_fee_amount-fee_waiver_amount) else (total_fee_amount-fee_waiver_amount-fee_amount) end as balance from student
								join school on student_school_profile_id=school_profile_id left join parent on parent_profile_id=student_parent_id left join student_class_division_assgn on SCD_student_profile_id=student_profile_id and SCD_AY_id=school_AY_id and SCD_expiry_date='9999-12-31' left join class on SCD_class_id=class_id and class_expiry_date='9999-12-31' left join division on SCD_division_id=division_id and division_expiry_date='9999-12-31' left join (select total_fee_student_profile_id,sum(total_fee_amount) as total_fee_amount,total_fee_AY_id from total_fees group by total_fee_student_profile_id) as total_fees on total_fee_student_profile_id=student_parent_id and total_fee_AY_id=school_AY_id left join (select fee_waiver_student_profile_id,sum(fee_waiver_amount) as fee_waiver_amount,fee_waiver_AY_id from fee_waiver group by fee_waiver_student_profile_id) as fee_waiver on fee_waiver_student_profile_id=student_parent_id and fee_waiver_AY_id=school_AY_id left join (select fee_student_profile_id,sum(fee_amount) as fee_amount,fee_AY_id from fee group by fee_student_profile_id) as fee on fee_student_profile_id=student_profile_id and fee_AY_id=school_AY_id where student_school_profile_id=".$school_id." and student_expiry_date='9999-12-31') as data where balance != 0")->result();
		echo json_encode($data);
	}

	function class_due_fee_report()
	{
		$school_admin = $this->session->userdata('school');
		$school_id = $school_admin[0]['employee_school_profile_id'];
		$class_id = $_POST['class_id'];
		$data = $this->db->query("select * from(select Student_profile_id,student_GRN,CONCAT(Student_first_name,' ',student_last_name) as student_name,student_gender,parent_profile_id,CONCAT(parent_first_name,' ',parent_last_name) as parent_name ,parent_mobile_number ,case  when class_id is NULL then '0' else class_id end as class_id ,case  when class_name is NULL then 'N/A' else class_name end as class_name ,case  when division_id is NULL then '0' else division_id end as division_id ,case  when division_name is NULL then 'N/A' else division_name end as division_name ,case  when total_fee_amount is NULL then '0' else total_fee_amount end as total_fee_amount ,case  when fee_waiver_amount is NULL then '0' else fee_waiver_amount end as fee_waiver_amount ,case  when fee_amount is NULL then '0' else fee_amount end as fee_amount, case when fee_waiver_amount is NULL and fee_amount is NULL AND total_fee_amount is NULL then '0' when fee_waiver_amount is NULL and fee_amount is NULL then total_fee_amount when fee_waiver_amount is NULL then (total_fee_amount-fee_amount) when fee_amount is NULL then (total_fee_amount-fee_waiver_amount) else (total_fee_amount-fee_waiver_amount-fee_amount) end as balance from student
								join school on student_school_profile_id=school_profile_id left join parent on parent_profile_id=student_parent_id left join student_class_division_assgn on SCD_student_profile_id=student_profile_id and SCD_AY_id=school_AY_id and SCD_expiry_date='9999-12-31' left join class on SCD_class_id=class_id and class_expiry_date='9999-12-31' left join division on SCD_division_id=division_id and division_expiry_date='9999-12-31' left join (select total_fee_student_profile_id,sum(total_fee_amount) as total_fee_amount,total_fee_AY_id from total_fees group by total_fee_student_profile_id) as total_fees on total_fee_student_profile_id=student_parent_id and total_fee_AY_id=school_AY_id left join (select fee_waiver_student_profile_id,sum(fee_waiver_amount) as fee_waiver_amount,fee_waiver_AY_id from fee_waiver group by fee_waiver_student_profile_id) as fee_waiver on fee_waiver_student_profile_id=student_parent_id and fee_waiver_AY_id=school_AY_id left join (select fee_student_profile_id,sum(fee_amount) as fee_amount,fee_AY_id from fee group by fee_student_profile_id) as fee on fee_student_profile_id=student_profile_id and fee_AY_id=school_AY_id where student_school_profile_id=".$school_id." and class_id=".$class_id." and student_expiry_date='9999-12-31') as data where balance != 0")->result();
		echo json_encode($data);		
	}

	function division_due_fee_report()
	{
		$school_admin = $this->session->userdata('school');
		$school_id = $school_admin[0]['employee_school_profile_id'];
		$class_id = $_POST['class_id'];
		$division_id = $_POST['division_id'];
		$data = $this->db->query("select * from(select Student_profile_id,student_GRN,CONCAT(Student_first_name,' ',student_last_name) as student_name,student_gender,parent_profile_id,CONCAT(parent_first_name,' ',parent_last_name) as parent_name ,parent_mobile_number ,case  when class_id is NULL then '0' else class_id end as class_id ,case  when class_name is NULL then 'N/A' else class_name end as class_name ,case  when division_id is NULL then '0' else division_id end as division_id ,case  when division_name is NULL then 'N/A' else division_name end as division_name ,case  when total_fee_amount is NULL then '0' else total_fee_amount end as total_fee_amount ,case  when fee_waiver_amount is NULL then '0' else fee_waiver_amount end as fee_waiver_amount ,case  when fee_amount is NULL then '0' else fee_amount end as fee_amount, case when fee_waiver_amount is NULL and fee_amount is NULL AND total_fee_amount is NULL then '0' when fee_waiver_amount is NULL and fee_amount is NULL then total_fee_amount when fee_waiver_amount is NULL then (total_fee_amount-fee_amount) when fee_amount is NULL then (total_fee_amount-fee_waiver_amount) else (total_fee_amount-fee_waiver_amount-fee_amount) end as balance from student
								join school on student_school_profile_id=school_profile_id left join parent on parent_profile_id=student_parent_id left join student_class_division_assgn on SCD_student_profile_id=student_profile_id and SCD_AY_id=school_AY_id and SCD_expiry_date='9999-12-31' left join class on SCD_class_id=class_id and class_expiry_date='9999-12-31' left join division on SCD_division_id=division_id and division_expiry_date='9999-12-31' left join (select total_fee_student_profile_id,sum(total_fee_amount) as total_fee_amount,total_fee_AY_id from total_fees group by total_fee_student_profile_id) as total_fees on total_fee_student_profile_id=student_parent_id and total_fee_AY_id=school_AY_id left join (select fee_waiver_student_profile_id,sum(fee_waiver_amount) as fee_waiver_amount,fee_waiver_AY_id from fee_waiver group by fee_waiver_student_profile_id) as fee_waiver on fee_waiver_student_profile_id=student_parent_id and fee_waiver_AY_id=school_AY_id left join (select fee_student_profile_id,sum(fee_amount) as fee_amount,fee_AY_id from fee group by fee_student_profile_id) as fee on fee_student_profile_id=student_profile_id and fee_AY_id=school_AY_id where student_school_profile_id=".$school_id." and class_id=".$class_id." and division_id=".$division_id." and student_expiry_date='9999-12-31') as data where balance != 0")->result();
		echo json_encode($data);		
	}

	function school_paid_fee_report()
	{
		$school_admin = $this->session->userdata('school');
		$school_id = $school_admin[0]['employee_school_profile_id'];
		$data = $this->db->query("select * from(select Student_profile_id,student_GRN,CONCAT(Student_first_name,' ',student_last_name) as student_name,student_gender,parent_profile_id,CONCAT(parent_first_name,' ',parent_last_name) as parent_name ,parent_mobile_number ,case  when class_id is NULL then '0' else class_id end as class_id ,case  when class_name is NULL then 'N/A' else class_name end as class_name ,case  when division_id is NULL then '0' else division_id end as division_id ,case  when division_name is NULL then 'N/A' else division_name end as division_name ,case  when total_fee_amount is NULL then '0' else total_fee_amount end as total_fee_amount ,case  when fee_waiver_amount is NULL then '0' else fee_waiver_amount end as fee_waiver_amount ,case  when fee_amount is NULL then '0' else fee_amount end as fee_amount, case when fee_waiver_amount is NULL and fee_amount is NULL AND total_fee_amount is NULL then '0' when fee_waiver_amount is NULL and fee_amount is NULL then total_fee_amount when fee_waiver_amount is NULL then (total_fee_amount-fee_amount) when fee_amount is NULL then (total_fee_amount-fee_waiver_amount) else (total_fee_amount-fee_waiver_amount-fee_amount) end as balance from student
								join school on student_school_profile_id=school_profile_id left join parent on parent_profile_id=student_parent_id join student_class_division_assgn on SCD_student_profile_id=student_profile_id and SCD_AY_id=school_AY_id and SCD_expiry_date='9999-12-31' join class on SCD_class_id=class_id and class_expiry_date='9999-12-31' left join division on SCD_division_id=division_id and division_expiry_date='9999-12-31' left join (select total_fee_student_profile_id,sum(total_fee_amount) as total_fee_amount,total_fee_AY_id from total_fees group by total_fee_student_profile_id) as total_fees on total_fee_student_profile_id=student_parent_id and total_fee_AY_id=school_AY_id left join (select fee_waiver_student_profile_id,sum(fee_waiver_amount) as fee_waiver_amount,fee_waiver_AY_id from fee_waiver group by fee_waiver_student_profile_id) as fee_waiver on fee_waiver_student_profile_id=student_parent_id and fee_waiver_AY_id=school_AY_id left join (select fee_student_profile_id,sum(fee_amount) as fee_amount,fee_AY_id from fee group by fee_student_profile_id) as fee on fee_student_profile_id=student_profile_id and fee_AY_id=school_AY_id where student_school_profile_id=".$school_id." and student_expiry_date='9999-12-31') as data where balance = 0")->result();
		echo json_encode($data);
	}

	function class_paid_fee_report()
	{
		$school_admin = $this->session->userdata('school');
		$school_id = $school_admin[0]['employee_school_profile_id'];
		$class_id = $_POST['class_id'];
		$data = $this->db->query("select * from(select Student_profile_id,student_GRN,CONCAT(Student_first_name,' ',student_last_name) as student_name,student_gender,parent_profile_id,CONCAT(parent_first_name,' ',parent_last_name) as parent_name ,parent_mobile_number ,case  when class_id is NULL then '0' else class_id end as class_id ,case  when class_name is NULL then 'N/A' else class_name end as class_name ,case  when division_id is NULL then '0' else division_id end as division_id ,case  when division_name is NULL then 'N/A' else division_name end as division_name ,case  when total_fee_amount is NULL then '0' else total_fee_amount end as total_fee_amount ,case  when fee_waiver_amount is NULL then '0' else fee_waiver_amount end as fee_waiver_amount ,case  when fee_amount is NULL then '0' else fee_amount end as fee_amount, case when fee_waiver_amount is NULL and fee_amount is NULL AND total_fee_amount is NULL then '0' when fee_waiver_amount is NULL and fee_amount is NULL then total_fee_amount when fee_waiver_amount is NULL then (total_fee_amount-fee_amount) when fee_amount is NULL then (total_fee_amount-fee_waiver_amount) else (total_fee_amount-fee_waiver_amount-fee_amount) end as balance from student
								join school on student_school_profile_id=school_profile_id left join parent on parent_profile_id=student_parent_id join student_class_division_assgn on SCD_student_profile_id=student_profile_id and SCD_AY_id=school_AY_id and SCD_expiry_date='9999-12-31' join class on SCD_class_id=class_id and class_expiry_date='9999-12-31' left join division on SCD_division_id=division_id and division_expiry_date='9999-12-31' left join (select total_fee_student_profile_id,sum(total_fee_amount) as total_fee_amount,total_fee_AY_id from total_fees group by total_fee_student_profile_id) as total_fees on total_fee_student_profile_id=student_parent_id and total_fee_AY_id=school_AY_id left join (select fee_waiver_student_profile_id,sum(fee_waiver_amount) as fee_waiver_amount,fee_waiver_AY_id from fee_waiver group by fee_waiver_student_profile_id) as fee_waiver on fee_waiver_student_profile_id=student_parent_id and fee_waiver_AY_id=school_AY_id left join (select fee_student_profile_id,sum(fee_amount) as fee_amount,fee_AY_id from fee group by fee_student_profile_id) as fee on fee_student_profile_id=student_profile_id and fee_AY_id=school_AY_id where student_school_profile_id=".$school_id." and class_id=".$class_id." and student_expiry_date='9999-12-31') as data where balance = 0")->result();
		echo json_encode($data);		
	}

	function division_paid_fee_report()
	{
		$school_admin = $this->session->userdata('school');
		$school_id = $school_admin[0]['employee_school_profile_id'];
		$class_id = $_POST['class_id'];
		$division_id = $_POST['division_id'];
		$data = $this->db->query("select * from(select Student_profile_id,student_GRN,CONCAT(Student_first_name,' ',student_last_name) as student_name,student_gender,parent_profile_id,CONCAT(parent_first_name,' ',parent_last_name) as parent_name ,parent_mobile_number ,case  when class_id is NULL then '0' else class_id end as class_id ,case  when class_name is NULL then 'N/A' else class_name end as class_name ,case  when division_id is NULL then '0' else division_id end as division_id ,case  when division_name is NULL then 'N/A' else division_name end as division_name ,case  when total_fee_amount is NULL then '0' else total_fee_amount end as total_fee_amount ,case  when fee_waiver_amount is NULL then '0' else fee_waiver_amount end as fee_waiver_amount ,case  when fee_amount is NULL then '0' else fee_amount end as fee_amount, case when fee_waiver_amount is NULL and fee_amount is NULL AND total_fee_amount is NULL then '0' when fee_waiver_amount is NULL and fee_amount is NULL then total_fee_amount when fee_waiver_amount is NULL then (total_fee_amount-fee_amount) when fee_amount is NULL then (total_fee_amount-fee_waiver_amount) else (total_fee_amount-fee_waiver_amount-fee_amount) end as balance from student
								join school on student_school_profile_id=school_profile_id left join parent on parent_profile_id=student_parent_id join student_class_division_assgn on SCD_student_profile_id=student_profile_id and SCD_AY_id=school_AY_id and SCD_expiry_date='9999-12-31' join class on SCD_class_id=class_id and class_expiry_date='9999-12-31' left join division on SCD_division_id=division_id and division_expiry_date='9999-12-31' left join (select total_fee_student_profile_id,sum(total_fee_amount) as total_fee_amount,total_fee_AY_id from total_fees group by total_fee_student_profile_id) as total_fees on total_fee_student_profile_id=student_parent_id and total_fee_AY_id=school_AY_id left join (select fee_waiver_student_profile_id,sum(fee_waiver_amount) as fee_waiver_amount,fee_waiver_AY_id from fee_waiver group by fee_waiver_student_profile_id) as fee_waiver on fee_waiver_student_profile_id=student_parent_id and fee_waiver_AY_id=school_AY_id left join (select fee_student_profile_id,sum(fee_amount) as fee_amount,fee_AY_id from fee group by fee_student_profile_id) as fee on fee_student_profile_id=student_profile_id and fee_AY_id=school_AY_id where student_school_profile_id=".$school_id." and class_id=".$class_id." and division_id=".$division_id." and student_expiry_date='9999-12-31') as data where balance = 0")->result();
		echo json_encode($data);		
	}

	function fetch_fee_types()
	{
		$school_admin = $this->session->userdata('school');
		$school_id = $school_admin[0]['employee_school_profile_id'];
		$AY_id = $school_admin[0]['AY_id'];
		$class_id = $_POST['class_id'];
		$data = $this->db->query("select fees_type_name,fees_type_id from fees_type where fees_type_class_id =".$class_id." and fees_type_AY_id =".$AY_id." and fees_type_expiry_date='9999-12-31' and fees_type_school_profile_id =".$school_id."")->result_array();
		echo json_encode($data);
	}

	function school_fee_category_report()
	{
		$school_admin = $this->session->userdata('school');
		$school_id = $school_admin[0]['employee_school_profile_id'];
		$AY_id = $school_admin[0]['AY_id'];
		$data = $this->db->query("select student_profile_id,student_GRN,CONCAT(student_first_name,' ',student_last_name) as student_name, CONCAT(parent_first_name,' ',parent_last_name) as parent_name ,student_gender,parent_mobile_number,total_fee_type_id,total_fee_amount,fees_type_name,class_name,division_name from student join parent on student_parent_id = parent_profile_id join total_fees on total_fee_student_profile_id = student_profile_id  and total_fee_AY_id =".$AY_id." join fees_type on fees_type_id = total_fee_type_id and total_fee_AY_id = fees_type_AY_id join  student_class_division_assgn on student_profile_id = SCD_student_profile_id and SCD_AY_id = total_fee_AY_id and SCD_expiry_date = '9999-12-31' 
									join class on class_id = SCD_class_id join division on division_id = SCD_division_id where student_expiry_date = '9999-12-31' and student_school_profile_id =".$school_id."")->result();
		echo json_encode($data);
	}

	function class_fee_category_report()
	{
		$school_admin = $this->session->userdata('school');
		$school_id = $school_admin[0]['employee_school_profile_id'];
		$AY_id = $school_admin[0]['AY_id'];
		$class_id = $_POST['class_id'];
		$fee_type = $_POST['fee_type'];
		$data = $this->db->query("select student_profile_id,student_GRN,CONCAT(student_first_name,' ',student_last_name) as student_name, CONCAT(parent_first_name,' ',parent_last_name) as parent_name ,student_gender,parent_mobile_number,total_fee_type_id,total_fee_amount,fees_type_name,class_name,division_name from student join parent on student_parent_id = parent_profile_id join total_fees on total_fee_student_profile_id = student_profile_id  and total_fee_AY_id =".$AY_id." join fees_type on fees_type_id = total_fee_type_id and total_fee_AY_id = fees_type_AY_id join  student_class_division_assgn on student_profile_id = SCD_student_profile_id and SCD_AY_id = total_fee_AY_id and SCD_expiry_date = '9999-12-31' 
									join class on class_id = SCD_class_id join division on division_id = SCD_division_id where student_expiry_date = '9999-12-31' and student_school_profile_id =".$school_id." and SCD_class_id =".$class_id." and total_fee_type_id =".$fee_type."")->result();
		echo json_encode($data);		
	}

	function division_fee_category_report()
	{
		$school_admin = $this->session->userdata('school');
		$school_id = $school_admin[0]['employee_school_profile_id'];
		$AY_id = $school_admin[0]['AY_id'];
		$class_id = $_POST['class_id'];
		$division_id = $_POST['division_id'];
		$data = $this->db->query("select student_profile_id,student_GRN,CONCAT(student_first_name,' ',student_last_name) as student_name, CONCAT(parent_first_name,' ',parent_last_name) as parent_name ,student_gender,parent_mobile_number,total_fee_type_id,total_fee_amount,fees_type_name,class_name,division_name from student join parent on student_parent_id = parent_profile_id join total_fees on total_fee_student_profile_id = student_profile_id  and total_fee_AY_id =".$AY_id." join fees_type on fees_type_id = total_fee_type_id and total_fee_AY_id = fees_type_AY_id join  student_class_division_assgn on student_profile_id = SCD_student_profile_id and SCD_AY_id = total_fee_AY_id and SCD_expiry_date = '9999-12-31' 
									join class on class_id = SCD_class_id join division on division_id = SCD_division_id where student_expiry_date = '9999-12-31' and student_school_profile_id =".$school_id." and SCD_class_id =".$class_id." and SCD_division_id =".$division_id."")->result();
		echo json_encode($data);		
	}

	function school_fee_waiver_report()
	{
		$school_admin = $this->session->userdata('school');
		$school_id = $school_admin[0]['employee_school_profile_id'];
		$AY_id = $school_admin[0]['AY_id'];
		$data = $this->db->query("select student_GRN,CONCAT(student_first_name,' ',student_last_name) as student_name, CONCAT(parent_first_name,' ',parent_last_name) as parent_name ,student_gender,parent_mobile_number,fee_waiver_name,fee_waiver_amount,fees_type_name,fees_type_amount,class_name,division_name from student join parent on student_parent_id = parent_profile_id left join fee_waiver on fee_waiver_student_profile_id = student_profile_id join fees_type on fee_waiver_fee_type_id = fees_type_id and fees_type_AY_id = fee_waiver_AY_id left join student_class_division_assgn on student_profile_id = SCD_student_profile_id and SCD_AY_id = fee_waiver_AY_id
									left join class on class_id = SCD_class_id left join division on division_id = SCD_division_id where student_expiry_date = '9999-12-31' and fee_waiver_AY_id =".$AY_id." and student_school_profile_id =".$school_id."")->result();
		echo json_encode($data);
	}

	function class_fee_waiver_report()
	{
		$school_admin = $this->session->userdata('school');
		$school_id = $school_admin[0]['employee_school_profile_id'];
		$AY_id = $school_admin[0]['AY_id'];
		$class_id = $_POST['class_id'];
		$fee_type = $_POST['fee_type'];
		$data = $this->db->query("select student_GRN,CONCAT(student_first_name,' ',student_last_name) as student_name, CONCAT(parent_first_name,' ',parent_last_name) as parent_name ,student_gender,parent_mobile_number,fee_waiver_name,fee_waiver_amount,fees_type_name,fees_type_amount,class_name,division_name from student join parent on student_parent_id = parent_profile_id left join fee_waiver on fee_waiver_student_profile_id = student_profile_id join fees_type on fee_waiver_fee_type_id = fees_type_id and fees_type_AY_id = fee_waiver_AY_id left join student_class_division_assgn on student_profile_id = SCD_student_profile_id and SCD_AY_id = fee_waiver_AY_id
									left join class on class_id = SCD_class_id left join division on division_id = SCD_division_id where student_expiry_date = '9999-12-31' and fee_waiver_AY_id =".$AY_id." and student_school_profile_id =".$school_id." and class_id=".$class_id." and fees_type_id=".$fee_type."")->result();
		echo json_encode($data);		
	}

	function division_fee_waiver_report()
	{
		$school_admin = $this->session->userdata('school');
		$school_id = $school_admin[0]['employee_school_profile_id'];
		$class_id = $_POST['class_id'];
		$division_id = $_POST['division_id'];
		$AY_id = $school_admin[0]['AY_id'];
		$data = $this->db->query("select student_GRN,CONCAT(student_first_name,' ',student_last_name) as student_name, CONCAT(parent_first_name,' ',parent_last_name) as parent_name ,student_gender,parent_mobile_number,fee_waiver_name,fee_waiver_amount,fees_type_name,fees_type_amount,class_name,division_name from student join parent on student_parent_id = parent_profile_id left join fee_waiver on fee_waiver_student_profile_id = student_profile_id join fees_type on fee_waiver_fee_type_id = fees_type_id and fees_type_AY_id = fee_waiver_AY_id left join student_class_division_assgn on student_profile_id = SCD_student_profile_id and SCD_AY_id = fee_waiver_AY_id
									left join class on class_id = SCD_class_id left join division on division_id = SCD_division_id where student_expiry_date = '9999-12-31' and fee_waiver_AY_id = ".$AY_id." and student_school_profile_id=".$school_id." and class_id=".$class_id." and division_id=".$division_id."")->result();
		echo json_encode($data);		
	}

	function exam_report()
	{
		if(!isset($this->session->userdata['school'])){
			redirect('/');
		}
		if(isset($this->session->userdata['direct'])){
			$admin['direct'] = $this->session->userdata('direct');
		}
		else{
			$admin['direct'] = 1;
		} 

		$class_details['flash']['active'] = $this->session->flashdata('active');
    	$class_details['flash']['title'] = $this->session->flashdata('title');
    	$class_details['flash']['text'] = $this->session->flashdata('text');
    	$class_details['flash']['type'] = $this->session->flashdata('type');
    	
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
		$report['class'] =  $this->db->query("SELECT * FROM class where class_school_profile_id = ".$employee_school_profile_id." and class_expiry_date='9999-12-31' GROUP BY class_name")->result_array();
		// $report['admission_class'] =  $this->db->query("SELECT enquiry_admission_class FROM `enquiry` where enquiry_school_profile_id =".$employee_school_profile_id." group by enquiry_admission_class")->result_array();
		// $report['school'] =  $this->db->query("select school.* from school where school_profile_id =".$employee_school_profile_id."")->result_array();

		$report['school_report_header'] = $school_admin[0]['school_report_header'];
		$report['school_report_footer'] = $school_admin[0]['school_report_footer'];
		$nav['school_name'] = $school_admin[0]['school_name'];
		$nav['school_logo'] = $school_admin[0]['school_logo'];
		$nav['report'] = 'exam_report';

		$this->load->view('School/school_header', $admin);
		$this->load->view('Reports/exam_report',$report);
		$this->load->view('Reports/exam_report_footer',$nav);
	}

}

 ?>