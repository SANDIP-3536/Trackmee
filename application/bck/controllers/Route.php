<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Route extends Ci_controller
	{
		
		function route_registration()
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
			$route['flash']['active'] = $this->session->flashdata('active');
        	$route['flash']['title'] = $this->session->flashdata('title');
        	$route['flash']['text'] = $this->session->flashdata('text');
        	$route['flash']['type'] = $this->session->flashdata('type');
        	
			$school_admin = $this->session->userdata('school');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['transport'] = 'transport';
			$route['route'] = $this->Route_model->fetch_route($employee_school_profile_id);
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$this->load->view('School/school_header',$admin);
			$this->load->view('Route/route_registration', $route);
			$this->load->view('Route/route_footer',$nav);
		}

		function edit_route($route_no){
			$this->session->set_userdata('route',$route_no);
			redirect('Route/edit_routes');
		}

		function edit_routes()
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
			$route['flash']['active'] = $this->session->flashdata('active');
        	$route['flash']['title'] = $this->session->flashdata('title');
        	$route['flash']['text'] = $this->session->flashdata('text');
        	$route['flash']['type'] = $this->session->flashdata('type');
        	
			$school_admin = $this->session->userdata('school');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];

			$route_data['school_id'] = $school_admin[0]['employee_school_profile_id'];
			$route_data['route_no'] = $this->session->userdata('route');
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['transport'] = 'transport';
			$route['route'] = $this->Route_model->fetch_route_towards_school($route_data);
			$route['route1'] = $this->Route_model->fetch_route_towards_home($route_data);
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$this->load->view('School/school_header',$admin);
			$this->load->view('Route/update_route', $route);
			$this->load->view('Route/route_footer',$nav);
		}

		function add_route_registration()
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
			$route1['route_name'] = $this->input->post('route_name');
			$route1['route_type'] = $this->input->post('route_type_1');
			$route1['route_start_time'] = $this->input->post('route_start_time_1');
			$route1['route_end_time'] = $this->input->post('route_end_time_1');
			$route1['route_effective_date'] = date('Y-m-d');
			$route1['route_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];

			$route_id = $this->Route_model->add_route($route1);
			// print_r($route_id);die();
			$route2['route_name'] = $this->input->post('route_name');
			$route2['route_type'] = $this->input->post('route_type_2');
			$route2['route_no'] = $route_id[0]['route_id'];
			$route2['route_start_time'] = $this->input->post('route_start_time_2');
			$route2['route_end_time'] = $this->input->post('route_end_time_2');
			$route2['route_effective_date'] = date('Y-m-d');
			$route2['route_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];

			$con = $this->Route_model->add_second_route($route2);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Route not Added...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Route/route_registration');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Route Added Successfully.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Route/route_registration');
			}
		}

		function edit_route_details()
		{
			// print_r($this->input->post());die();
			$school_admin = $this->session->userdata('school');
			$route1['route_id'] = $this->input->post('route_id');
			$route1['route_name'] = $this->input->post('route_name');
			$route1['route_type'] = $this->input->post('route_type_1');
			$route1['route_start_time'] = $this->input->post('route_start_time_1');
			$route1['route_end_time'] = $this->input->post('route_end_time_1');
			$route1['route_update_date'] = date('Y-m-d');
			$route1['route_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			
			$this->Route_model->update_route($route1);
			// print_r($route_id);die();
			$route2['route_id'] = $this->input->post('route_id_2');
			$route2['route_name'] = $this->input->post('route_name');
			$route2['route_type'] = $this->input->post('route_type_2');
			$route2['route_start_time'] = $this->input->post('route_start_time_2');
			$route2['route_end_time'] = $this->input->post('route_end_time_2');
			$route2['route_update_date'] = date('Y-m-d');
			$route2['route_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];

			$con = $this->Route_model->update_second_route($route2);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Route not Updated...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Route/route_registration');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Route Updated Successfully.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Route/route_registration');
			}
		}

		function deactive_route($route_no)
		{
			$this->session->set_userdata('route_deactive',$route_no);
			redirect('Route/disable_route');
		}

		function disable_route()
		{
			$route_no = $this->session->userdata('route_deactive');
			$con = $this->Route_model->disable_route($route_no);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Route not Updated...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Route/route_registration');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Route Deactive.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Route/route_registration');
			}
		}

		function active_route($route_no)
		{
			$this->session->set_userdata('route_active',$route_no);
			redirect('Route/enable_route');
		}

		function enable_route()
		{
			$route_no = $this->session->userdata('route_active');
			$con = $this->Route_model->enable_route($route_no);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Route not Updated...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Route/route_registration');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Route Active.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Route/route_registration');
			}
		}
	}
 ?>