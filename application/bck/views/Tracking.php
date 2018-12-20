<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Tracking extends CI_Controller
	{

		// function index()
		// {
		// 	if(!isset($this->session->userdata['school']))
		// 	{
		// 		redirect('/');
		// 	} 
		// 	$school_admin = $this->session->userdata('school');
		// 	$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
		// 	$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
		// 	$admin['photo'] = $school_admin[0]['employee_photo'];
		// 	$admin['first_name'] = $school_admin[0]['employee_first_name'];
		// 	$admin['last_name'] = $school_admin[0]['employee_last_name'];
		// 	$admin['email_id'] = $school_admin[0]['employee_email_id'];
		// 	$admin['username'] = $school_admin[0]['credential_username'];
		// 	$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
		// 	$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
		// 	$admin['functionality'] = $this->School_model->fetch_functionality($school);

		// 	$bus_details = $this->db->where('bus_school_profile_id',$school_admin[0]['employee_school_profile_id'])->where('bus_expiry_date','9999-12-31')->get('bus')->result_array();
		// 	print_r($bus_details);die();
		// }

	public function index()
	{
		$data['car'] = ['STX-868325022962221'=>'MH 12 EG 9616','STX-868325025854722'=>'MH 14 AB '];
		if(!empty($this->input->post('device_id')))
		{
			$device_selected = $this->input->post('device_id');
		}
		else
		{
			$device_selected = 'STX-868325022962221';		
		}
		// print_r($device_selected);die();
		$this->session->set_userdata('device_selected',$device_selected);

		$path = "http://trackmee.syntech.co.in/api/v1/get_location?device_id='".$device_selected."'";
		
		
		    $ch=curl_init();
		    curl_setopt($ch,CURLOPT_URL,$path);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		    $output =curl_exec($ch);
		    $res = json_decode($output);
	
			// print_r($res);die();
		    
		    $data['lat'] = $res[0]->stop_latitude;
		    $data['lon'] = $res[0]->stop_longitude;
		    $data['angle'] = $res[0]->heading_angle;
	
		    json_encode($data);
		    curl_close($ch);
		// print_r($this->session->userdata('device_selected'));die();
		$this->load->view('Employee/map',$data);
	}

	public function route_curl()
	{
	    $ch=curl_init();


	    $device_selected=$this->session->userdata('device_selected');
	    $path = $path = "http://trackmee.syntech.co.in/api/v1/get_location?device_id='".$device_selected."'";

	    curl_setopt($ch,CURLOPT_URL,$path);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    $output =curl_exec($ch);
	    $res = json_decode($output);
// print_r($res);die();

	    $data['lat'] = $res[0]->stop_latitude;
	    $data['lon'] = $res[0]->stop_longitude;
	    $data['angle'] = $res[0]->heading_angle;
	  
	    echo json_encode($data);
	    curl_close($ch);
	}	

	}
?>