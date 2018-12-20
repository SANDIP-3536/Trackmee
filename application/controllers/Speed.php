<?php 
date_default_timezone_set('Asia/Kolkata');
class Speed extends CI_Controller
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

	function tracking_overspeed_report_details()
	{
		if (isset($this->session->userdata['client'])) {
			$client_admin = $this->session->userdata('client');
			$employee_details = $this->Client_model->employee_details($client_admin);
			$admin['username'] = $client_admin[0]['credential_username'];
			$nav['client_name'] = $employee_details[0]['client_name'];
			$nav['client_logo'] = $employee_details[0]['client_logo'];
			$report['institute_admin'] = 0;
    	}elseif (isset($this->session->userdata['Institute'])) {
    		$institute_admin = $this->session->userdata('Institute');
			$employee_details = $this->Institute_model->employee_details($institute_admin);
			$admin['username'] = $institute_admin[0]['credential_username'];
			$nav['client_name'] = $employee_details[0]['institute_name'];
			$nav['client_logo'] = $employee_details[0]['institute_logo'];
			$report['institute_admin'] = 1;
    	}

		$report['flash']['active'] = $this->session->flashdata('active');
    	$report['flash']['title'] = $this->session->flashdata('title');
    	$report['flash']['text'] = $this->session->flashdata('text');
    	$report['flash']['type'] = $this->session->flashdata('type');
    	
		$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
		$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
		$admin['photo'] = $employee_details[0]['employee_photo'];
		$admin['first_name'] = $employee_details[0]['employee_first_name'];
		$admin['last_name'] = $employee_details[0]['employee_last_name'];
		$admin['email_id'] = $employee_details[0]['employee_email_id'];
		$school['user_profile_id'] = $employee_details[0]['employee_profile_id'];
		$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
		$report['bus'] =  $this->Speed_model->fetch_school_bus($employee_client_profile_id);
		$nav['speed'] = 'speed';

		if (isset($this->session->userdata['client'])) {
			$this->load->view('Client/client_header', $admin);
    	}elseif (isset($this->session->userdata['Institute'])) {
			$this->load->view('Institute/institute_header', $admin);
    	}
		$this->load->view('Speed/speed_report_details',$report);
		$this->load->view('Speed/speed_footer',$nav);
	}

	function overspeed_report_details()
	{
		$report['speed'] = $_POST['speed'];
		$report['bus'] = $_POST['bus'];
		$from_date = $_POST['from'];
		$to_date = $_POST['to'];
		$report['from'] = date("Y-m-d", strtotime($from_date)).' '.'00:00:00';
		$report['to'] = date("Y-m-d", strtotime($to_date)).' '.'00:00:00';
		$res = $this->Speed_model->overspeed_report_details($report);
	   	echo json_encode($res);
	}
}
?>