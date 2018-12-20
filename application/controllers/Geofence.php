<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Geofence extends Ci_controller
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

		function geofence_registration()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$admin['username'] = $client_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['client_name'];
				$nav['client_logo'] = $employee_details[0]['client_logo'];
				$geofence['institute_admin'] = 0;
				$nav['key'] = $employee_details[0]['client_google_web_map_key'];
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$admin['username'] = $institute_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['institute_name'];
				$nav['client_logo'] = $employee_details[0]['institute_logo'];
				$google_key = $this->db->query("SELECT client_google_web_map_key FROM `client` where client_institute_profile_id = '".$employee_details[0]['employee_client_profile_id']."'")->result_array();
				
				$nav['key'] = $google_key[0]['client_google_web_map_key'];
				$geofence['institute_admin'] = 1;
        	}
			$geofence['flash']['active'] = $this->session->flashdata('active');
        	$geofence['flash']['title'] = $this->session->flashdata('title');
        	$geofence['flash']['text'] = $this->session->flashdata('text');
        	$geofence['flash']['type'] = $this->session->flashdata('type');
        	
			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			$nav['geofence'] = 'geofence';
			$geofence['geofence'] = $this->Geofence_model->fetch_geofence($employee_client_profile_id);
			$geofence['bus'] = $this->Geofence_model->fetch_bus($employee_client_profile_id);
			$geofence['client'] = $this->Client_model->fetch_client($employee_client_profile_id);
			$client['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			if (isset($this->session->userdata['client'])) {
				$this->load->view('Client/client_header', $admin);
        	}elseif (isset($this->session->userdata['Institute'])) {
				$this->load->view('Institute/institute_header', $admin);
        	}
			$this->load->view('Geofence/geofence_registration',$geofence);
			$this->load->view('Geofence/geofence_footer',$nav);
		}

		// function edit_route($route_no){
		// 	$this->session->set_userdata('route',$route_no);
		// 	redirect('Route/edit_routes');
		// }

		// function edit_routes()
		// {
		// 	if(!isset($this->session->userdata['client']))
		// 	{
		// 		redirect('/');
		// 	}
		// 	$route['flash']['active'] = $this->session->flashdata('active');
  //       	$route['flash']['title'] = $this->session->flashdata('title');
  //       	$route['flash']['text'] = $this->session->flashdata('text');
  //       	$route['flash']['type'] = $this->session->flashdata('type');
        	
		// 	$client_admin = $this->session->userdata('client');
		// 	$employee_details = $this->Client_model->employee_details($client_admin);
		// 	$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
		// 	$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
		// 	$admin['photo'] = $employee_details[0]['employee_photo'];
		// 	$admin['first_name'] = $employee_details[0]['employee_first_name'];
		// 	$admin['last_name'] = $employee_details[0]['employee_last_name'];
		// 	$admin['email_id'] = $employee_details[0]['employee_email_id'];
		// 	$admin['username'] = $client_admin[0]['credential_username'];

		// 	$route_data['client_id'] = $employee_details[0]['employee_client_profile_id'];
		// 	$route_data['route_no'] = $this->session->userdata('route');
		// 	$nav['client_name'] = $employee_details[0]['client_name'];
		// 	$nav['client_logo'] = $employee_details[0]['client_logo'];
		// 	$nav['transport'] = 'route';
		// 	$route['route'] = $this->Route_model->fetch_route_towards_client($route_data);
		// 	$route['route1'] = $this->Route_model->fetch_route_towards_home($route_data);
		// 	$this->load->view('client/client_header',$admin);
		// 	$this->load->view('Route/update_route', $route);
		// 	$this->load->view('Route/route_footer',$nav);
		// }

		function add_geofence_registration()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$geofence['geofence_client_profile_id'] = $employee_details[0]['employee_client_profile_id'];
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$geofence['geofence_client_profile_id'] = $this->input->post('geofence_client_profile_id');
        	}
			$geofence['geofence_bus_no'] = $this->input->post('geofence_bus_no');
			$geofence['geofence_lat'] = $this->input->post('geofence_lat');
			$geofence['geofence_long'] = $this->input->post('geofence_long');
			$geofence['geofence_radius'] = $this->input->post('geofence_radius');
			$geofence['geofence_effective_date'] = date('Y-m-d');
			$con = $this->Geofence_model->add_geofence($geofence);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Geofence not Added...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Geofence/geofence_registration');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Geofence Added Successfully.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Geofence/geofence_registration');
			}
		}

		// function edit_route_details()
		// {
		// 	// print_r($this->input->post());die();
		// 	$client_admin = $this->session->userdata('client');
		// 	$route1['route_id'] = $this->input->post('route_id');
		// 	$route1['route_name'] = $this->input->post('route_name');
		// 	$route1['route_type'] = $this->input->post('route_type_1');
		// 	$route1['route_start_time'] = $this->input->post('route_start_time_1');
		// 	$route1['route_end_time'] = $this->input->post('route_end_time_1');
		// 	$route1['route_update_date'] = date('Y-m-d');
		// 	$route1['route_client_profile_id'] = $client_admin[0]['employee_client_profile_id'];
			
		// 	$this->Route_model->update_route($route1);
		// 	// print_r($route_id);die();
		// 	$route2['route_id'] = $this->input->post('route_id_2');
		// 	$route2['route_name'] = $this->input->post('route_name');
		// 	$route2['route_type'] = $this->input->post('route_type_2');
		// 	$route2['route_start_time'] = $this->input->post('route_start_time_2');
		// 	$route2['route_end_time'] = $this->input->post('route_end_time_2');
		// 	$route2['route_update_date'] = date('Y-m-d');
		// 	$route2['route_client_profile_id'] = $client_admin[0]['employee_client_profile_id'];

		// 	$con = $this->Route_model->update_second_route($route2);
		// 	if($con != 0){
		// 		$this->session->set_flashdata('active',1);
	 //            $this->session->set_flashdata('title',"Error...");
	 //            $this->session->set_flashdata('text',"Route not Updated...");
	 //            $this->session->set_flashdata('type',"warning");
		// 		redirect('Route/route_registration');
		// 	}else{
		// 		$this->session->set_flashdata('active',1);
	 //            $this->session->set_flashdata('title',"Route Updated Successfully.");
	 //            $this->session->set_flashdata('text',""); 
	 //            $this->session->set_flashdata('type',"success");
		// 		redirect('Route/route_registration');
		// 	}
		// }

		function deactive_geofence($geofence_id)
		{
			$this->session->set_userdata('geofence_deactive',$geofence_id);
			redirect('Geofence/disable_geofence');
		}

		function disable_geofence()
		{
			$geofence_id = $this->session->userdata('geofence_deactive');
			$con = $this->Geofence_model->disable_geofence($geofence_id);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Geofence not Deactive...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Geofence/geofence_registration');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Geofence Deactive.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Geofence/geofence_registration');
			}
		}

		function active_geofence($geofence_id)
		{
			$this->session->set_userdata('geofence_active',$geofence_id);
			redirect('Geofence/enable_geofence');
		}

		function enable_geofence()
		{
			$geofence_id = $this->session->userdata('geofence_active');
			$con = $this->Geofence_model->enable_geofence($geofence_id);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Geofence not Activated...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Geofence/geofence_registration');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Geofence Active.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Geofence/geofence_registration');
			}
		}
	}
 ?>