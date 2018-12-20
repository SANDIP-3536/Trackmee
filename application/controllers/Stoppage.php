<?php 
date_default_timezone_set('Asia/Kolkata');
class Stoppage extends CI_Controller
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

	function tracking_stoppage_report_details()
	{
		$this->load->model('Stoppage_model');
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
		$report['bus'] =  $this->Stoppage_model->fetch_school_bus($employee_client_profile_id);
		$nav['stoppage'] = 'stoppage';

		if (isset($this->session->userdata['client'])) {
			$this->load->view('Client/client_header', $admin);
    	}elseif (isset($this->session->userdata['Institute'])) {
			$this->load->view('Institute/institute_header', $admin);
    	}
		$this->load->view('Stoppage/stoppage_report_details',$report);
		$this->load->view('Stoppage/stoppage_footer',$nav);
	}

	function stoppage_report_details()
	{
		$report['min'] = $_POST['min'];
		$report['bus'] = $_POST['bus'];
		$bus_number = $_POST['bus_no'];
		$from_date = $_POST['from'];
		$to_date = $_POST['to'];
		$report['from'] = date("Y-m-d", strtotime($from_date)).' '.'00:00:00';
		$report['to'] = date("Y-m-d", strtotime($to_date)).' '.'00:00:00';
		$res = $this->Stoppage_model->stoppage_report_details($report);
	   	echo json_encode($res);
	}

	function view_stoppage_map()
	{
		if (isset($this->session->userdata['client'])) {
			$client_admin = $this->session->userdata('client');
			$employee_details = $this->Client_model->employee_details($client_admin);
			$map['username'] = $client_admin[0]['credential_username'];
			$map['client_name'] = $employee_details[0]['client_name'];
			$map['client_logo'] = $employee_details[0]['client_logo'];
			$map['institute_admin'] = 0;
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			$map['map_key1'] = $this->db->query("SELECT client_google_web_map_key FROM `client` where client_profile_id = '".$employee_client_profile_id."'")->row();
			$map['map_key'] = $map['map_key1']->client_google_web_map_key;
    	}elseif (isset($this->session->userdata['Institute'])) {
    		$institute_admin = $this->session->userdata('Institute');
			$employee_details = $this->Institute_model->employee_details($institute_admin);
			$map['username'] = $institute_admin[0]['credential_username'];
			$map['client_name'] = $employee_details[0]['institute_name'];
			$map['client_logo'] = $employee_details[0]['institute_logo'];
			$map['institute_admin'] = 1;
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			$map['map_key1'] = $this->db->query("SELECT client_google_web_map_key FROM `client` where client_institute_profile_id = '".$employee_client_profile_id."'")->result_array();
			$map['map_key'] = $map['map_key1'][0]['client_google_web_map_key'];
    	}
    	$map['bus_device_id']= $this->session->userdata('device_id');
    	$map['bus_no']= $this->session->userdata('bus_no');
    	$map['from']= $this->session->userdata('from_date');
    	$map['to']= $this->session->userdata('to_date');
    	$map['lat_lon_data']= $this->session->userdata('stoppage_map');
		$map['flash']['active'] = $this->session->flashdata('active');
    	$map['flash']['title'] = $this->session->flashdata('title');
    	$map['flash']['text'] = $this->session->flashdata('text');
    	$map['flash']['type'] = $this->session->flashdata('type');
    	
		$map['user'] = $employee_details[0]['employee_pri_mobile_number'];
		$map['user_profile_id'] = $employee_details[0]['employee_profile_id'];
		$map['photo'] = $employee_details[0]['employee_photo'];
		$map['first_name'] = $employee_details[0]['employee_first_name'];
		$map['last_name'] = $employee_details[0]['employee_last_name'];
		$map['email_id'] = $employee_details[0]['employee_email_id'];
		$school['user_profile_id'] = $employee_details[0]['employee_profile_id'];
		$map['bus'] =  $this->Stoppage_model->fetch_school_bus($employee_client_profile_id);
		$map['stoppage'] = 'stoppage';

		$this->load->view('Stoppage/view_stoppage_map',$map);
	}

}
?>