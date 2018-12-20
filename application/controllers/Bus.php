<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Bus extends CI_Controller
	{

		function bus_registration()
		{	
			if(!isset($this->session->userdata['super_admin']))
			{
				redirect('/');
			} 
			$bus['flash']['active'] = $this->session->flashdata('active');
        	$bus['flash']['title'] = $this->session->flashdata('title');
        	$bus['flash']['text'] = $this->session->flashdata('text');
        	$bus['flash']['type'] = $this->session->flashdata('type');

			$super_admin = $this->session->userdata('super_admin');
			$employee_details = $this->Admin_model->employee_details($super_admin);
			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			$admin['username'] = $super_admin[0]['credential_username'];
			$bus['institute'] = $this->Bus_model->fetch_institute();
			$result = $this->db->query('select * from bus')->result_array();

			$nav['bus'] ='bus';
			
			$bus['device'] = $this->Bus_model->fetch_device($employee_client_profile_id);
			$bus['bus'] = $this->Bus_model->fetch_bus($employee_client_profile_id);
			$this->load->view('Dashboard/header', $admin);
			$this->load->view('Bus/bus_registration', $bus);
			$this->load->view('Bus/bus_footer',$nav);
		}

		function view_school_bus()
		{	
			if(isset($this->session->userdata['client'])){

			}elseif(isset($this->session->userdata['Institute'])) {

			}else{
				redirect('/');
			}

			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$admin['username'] = $client_admin[0]['credential_username'];
				$bus['institute_admin'] = 0;
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$admin['username'] = $institute_admin[0]['credential_username'];
				$bus['institute_admin'] = 1;
        	} 

			$bus['flash']['active'] = $this->session->flashdata('active');
        	$bus['flash']['title'] = $this->session->flashdata('title');
        	$bus['flash']['text'] = $this->session->flashdata('text');
        	$bus['flash']['type'] = $this->session->flashdata('type');

			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			$nav['bus'] ='bus';

			$bus['bus'] = $this->Bus_model->fetch_client_bus($employee_client_profile_id);
			$school['user_profile_id'] = $employee_details[0]['employee_profile_id'];
		
			if (isset($this->session->userdata['client'])) {
				$this->load->view('Client/client_header', $admin);
        	}elseif (isset($this->session->userdata['Institute'])) {
				$this->load->view('Institute/institute_header', $admin);
        	}
			$this->load->view('Bus/view_bus', $bus);
			$this->load->view('Bus/bus_footer',$nav);
		}

		public function bus_deactivatee($bus_id)
		{
			$this->Bus_model->deactive($bus_id);
			redirect('Bus/view_school_bus');
		}

		public function bus_activatee($bus_id)
		{
			$this->Bus_model->active($bus_id);
			redirect('Bus/view_school_bus');
		}
		
		function fetch_school_institute(){
			$institute = $_POST['institute'];
			$data = $this->Bus_model->fetch_client($institute);
			echo json_encode($data);
		}

		function add_bus_registration()
		{
			if(!isset($this->session->userdata['super_admin']))
			{
				redirect('/');
			} 
			$super_admin = $this->session->userdata('super_admin');
			$num['bus'] =  $this->input->post('bus_no');
			$bus_no = $this->Bus_model->already_exits_bus($num);
			$bus_device['device'] = $this->input->post('bus_device_id');
			$device_id =  $this->Bus_model->already_exits_bus_device($bus_device);

			if($bus_no != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Bus Number Already Registerd.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Bus/bus_registration');
			}
			if($device_id != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Bus Device Already Assigned.");
	            $this->session->set_flashdata('text',"Device Already Assigned to Other Bus"); 
	            $this->session->set_flashdata('type',"success");
				redirect('Bus/bus_registration');
			}
			else{
				$bus_registration['bus_no'] = $this->input->post('bus_no');
				$bus_registration['bus_device_id'] = $this->input->post('bus_device_id');
				$bus_registration['bus_total_no_of_seat'] = $this->input->post('bus_total_no_of_seat');
				$bus_registration['bus_effective_date'] = date('Y-m-d');
				$bus_registration['bus_client_profile_id'] = $this->input->post('bus_client_profile_id');
				$con = $this->Bus_model->add_bus($bus_registration);
				if($con != 0){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Bus not Added...");
		            $this->session->set_flashdata('text',"");
		            $this->session->set_flashdata('type',"warning");
		            redirect('Bus/bus_registration');
				}else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Bus Added Successfully.");
		            $this->session->set_flashdata('text',"");
		            $this->session->set_flashdata('type',"success");
					redirect('Bus/bus_registration');
				}
			}
		}

		function bus_deactive($bus_id)			
		{
			$this->session->set_userdata('bus_deactive',$bus_id);
			redirect('Bus/deactive');
		}

		function deactive()
		{
			$bus_id = $this->session->userdata('bus_deactive');
			$bus_assign = $this->Bus_model->bus_assign($bus_id);
			if(empty($bus_assign)){
				$cnt = $this->Bus_model->deactive($bus_id);
				if($cnt != 0){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Bus not Added...");
		            $this->session->set_flashdata('text',"");
		            $this->session->set_flashdata('type',"warning");
		            redirect('Bus/bus_registration');
				}else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Bus Deactivated Successfully.");
		            $this->session->set_flashdata('text',"");
		            $this->session->set_flashdata('type',"success");
					redirect('Bus/bus_registration');
				}
			}
			else{
				$driver_name = $this->db->select('employee_first_name,employee_last_name')->where('employee_profile_id',$bus_assign[0]['DBR_driver_id'])->get('employee')->result_array();
				$route_name = $this->db->select('route_name')->where('route_no',$bus_assign[0]['DBR_route_no'])->where('route_type',1)->get('route')->result_array();
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Bus Already Assign to ".$driver_name[0]['employee_first_name']." ".$driver_name[0]['employee_last_name']." AND ".$route_name[0]['route_name']." route.");
	            $this->session->set_flashdata('text',"Please Contact to School");
	            $this->session->set_flashdata('type',"warning");
				redirect('Bus/bus_registration');
			}
		}

		function update($bus_id){
			$this->session->set_userdata('bus_update',$bus_id);
			redirect('Bus/bus_update');
		}
		function bus_update()
		{
			$super_admin = $this->session->userdata('super_admin');
			$employee_details = $this->Admin_model->employee_details($super_admin);
			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			$admin['username'] = $super_admin[0]['credential_username'];
			$bus['institute'] = $this->Bus_model->fetch_institute();
			$bus_id = $this->session->userdata('bus_update');
			$nav['bus'] ='bus';
			
			$bus['device'] = $this->Bus_model->fetch_device($employee_client_profile_id);
			$bus['bus_details'] = $this->Bus_model->fetch_bus_details($bus_id);
			$this->load->view('Dashboard/header', $admin);
			$this->load->view('Bus/bus_update',$bus);
			$this->load->view('Bus/bus_footer',$nav);
		}

		function add_bus_update1()
		{
			$super_admin = $this->session->userdata('super_admin');
			$bus_update['bus_no'] = $this->input->post('bus_no');
			$bus_update['bus_device_id'] = $this->input->post('bus_device_id');
			$bus_update['bus_total_no_of_seat'] = $this->input->post('bus_total_no_of_seat');
			$bus_update['bus_client_profile_id'] = $this->input->post('bus_client_profile_id');
			$bus_update['bus_client_profile_id'] = $this->input->post('bus_client_profile_id');
			$bus_school = $this->Bus_model->already_exits_client_bus($bus_update);
			if ($bus_school != 0) {
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Bus Already Registerd...");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Bus/bus_registration');
			}
			else{
				$bus_registration['bus_no'] = $this->input->post('bus_no');
				$bus_registration['bus_device_id'] = $this->input->post('bus_device_id');
				$bus_registration['bus_total_no_of_seat'] = $this->input->post('bus_total_no_of_seat');
				$bus_registration['bus_effective_date'] = date('Y-m-d');
				$bus_registration['bus_client_profile_id'] = $this->input->post('bus_client_profile_id');
				$con = $this->Bus_model->add_bus($bus_registration);

				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Bus Registerd Successfully.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Bus/bus_registration');
			}
		}

		function add_bus_update()
		{
			$school_admin = $this->session->userdata('school');
			$bus_update['bus_id'] = $this->input->post('bus_id');
			$bus_update['bus_no'] = $this->input->post('bus_no');
			$bus_update['bus_device_id'] = $this->input->post('bus_device_id');
			$bus_update['bus_total_no_of_seat'] = $this->input->post('bus_total_no_of_seat');

			$bus_update['bus_client_profile_id'] = $this->input->post('bus_client_profile_id');
			$bus_school = $this->Bus_model->already_exits_client_bus($bus_update);
			if ($bus_school != 0) {
				$con = $this->Bus_model->update_bus($bus_update);
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Bus Updated Successfully.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Bus/bus_registration');
			}
			else{
				// $bus_registration['bus_id'] = $this->input->post('bus_id');
				$bus_registration['bus_no'] = $this->input->post('bus_no');
				$bus_registration['bus_device_id'] = $this->input->post('bus_device_id');
				$bus_registration['bus_total_no_of_seat'] = $this->input->post('bus_total_no_of_seat');
				$bus_registration['bus_effective_date'] = date('Y-m-d');
				$bus_registration['bus_client_profile_id'] = $this->input->post('bus_client_profile_id');
				$con = $this->Bus_model->add_bus($bus_registration);
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Bus Registerd Successfully.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Bus/bus_registration');
			}
		}

		function bus_active($bus_id)			
		{
			$this->session->set_userdata('bus_active',$bus_id);
			redirect('Bus/active');
		}

		function active()
		{
			$bus_id = $this->session->userdata('bus_active');

			$con = $this->Bus_model->active($bus_id);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Bus...");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
	            redirect('Bus/bus_registration');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Bus Activated Successfully.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Bus/bus_registration');
			}
		}

		function already_exits_bus()
		{
			$num['bus'] = $_POST['num'];
			$data = $this->Bus_model->already_exits_bus($num);
			echo json_decode($data);
		}

		function already_exits_bus_device()
		{
			$bus_device['device'] = $_POST['bus_device'];
			$data = $this->Bus_model->already_exits_bus_device($bus_device);
			echo json_decode($data);	
		}
	}
 ?>