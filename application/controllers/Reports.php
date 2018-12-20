<?php 
date_default_timezone_set('Asia/Kolkata');
class Reports extends CI_Controller
{
	function tracking_report_details()
	{
		if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$admin['username'] = $client_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['client_name'];
				$nav['client_logo'] = $employee_details[0]['client_logo'];
				$employee['institute_admin'] = 0;
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$admin['username'] = $institute_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['institute_name'];
				$nav['client_logo'] = $employee_details[0]['institute_logo'];
				$employee['institute_admin'] = 1;
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
		$report['bus'] =  $this->Reports_model->fetch_school_bus($employee_client_profile_id);

		// $report['school_report_header'] = $school_admin[0]['school_report_header'];
		// $report['school_report_footer'] = $school_admin[0]['school_report_footer'];
		$nav['report'] = 'report';

		if (isset($this->session->userdata['client'])) {
			$this->load->view('Client/client_header', $admin);
    	}elseif (isset($this->session->userdata['Institute'])) {
			$this->load->view('Institute/institute_header', $admin);
    	}
		$this->load->view('Reports/tracking_report_details',$report);
		$this->load->view('Reports/tracking_report_footer',$nav);
	}

	function distance_report_details()
	{
		$report['bus'] = $_POST['bus'];
		$from_date = $_POST['from'];
		$to_date = $_POST['to'];
		$report['from'] = date("Y-m-d", strtotime($from_date)).' '.'00:00:00';
		$report['to'] = date("Y-m-d", strtotime($to_date)).' '.'00:00:00';
		$data = $this->Reports_model->distance_report_details($report);
		echo json_encode($data);
	}

	function history_report_details()
	{
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
		if(!isset($this->session->userdata['client']))
		{
			redirect('/');
		} 

		$client_admin = $this->session->userdata('client');
		$employee_details = $this->Client_model->employee_details($client_admin);
		$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
		$data['user'] = $employee_details[0]['employee_pri_mobile_number'];
		$data['user_profile_id'] = $employee_details[0]['employee_profile_id'];
		$data['photo'] = $employee_details[0]['employee_photo'];
		$data['first_name'] = $employee_details[0]['employee_first_name'];
		$data['last_name'] = $employee_details[0]['employee_last_name'];
		$data['email_id'] = $employee_details[0]['employee_email_id'];
		$data['username'] = $client_admin[0]['credential_username'];
		$client['user_profile_id'] = $employee_details[0]['employee_profile_id'];
		$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];

		$data['client_name'] = $employee_details[0]['client_name'];
		$data['client_logo'] = $employee_details[0]['client_logo'];
		$data['map'] = 'map';

		$data['map_key1'] = $this->db->query("SELECT school_google_web_map_key FROM `school` where school_profile_id = '".$employee_school_profile_id."'")->row();

		$data['map_key'] = $data['map_key1']->school_google_web_map_key;
		
		$data['lat_lon_data'] = $this->session->userdata('lat_lon_data');
		$data['bus_device_id'] = $this->session->userdata('bus_device_id');
		$data['bus_no'] = $this->db->query(" SELECT bus_no FROM bus where bus_device_id = '".$data['bus_device_id']."'")->row()->bus_no;
	    
	   	$this->load->view('Map/history_map',$data);
	}
}
?>