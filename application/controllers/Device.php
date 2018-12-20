<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Device extends CI_Controller
	{
		function __construct() {
	        parent::__construct();
	        if(!isset($this->session->userdata['super_admin']))
			{
				redirect('/');
			}
	    }

		function device_registration()
		{ 
			$device['flash']['active'] = $this->session->flashdata('active');
        	$device['flash']['title'] = $this->session->flashdata('title');
        	$device['flash']['text'] = $this->session->flashdata('text');
        	$device['flash']['type'] = $this->session->flashdata('type');

			$super_admin = $this->session->userdata('super_admin');
			$employee_details = $this->Admin_model->employee_details($super_admin);
			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$admin['username'] = $super_admin[0]['credential_username'];
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			$device['institute'] = $this->Device_model->fetch_institute();
			$result = $this->db->query('select * from device')->result_array();

			$nav['transport'] = 'device';
			$device['device'] = $this->Device_model->fetch_device();
			$this->load->view('Dashboard/header',$admin);
			$this->load->view('Device/device_registration', $device);
			$this->load->view('Device/device_footer',$nav);
		}

		function view_school_device()
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
			$device['flash']['active'] = $this->session->flashdata('active');
        	$device['flash']['title'] = $this->session->flashdata('title');
        	$device['flash']['text'] = $this->session->flashdata('text');
        	$device['flash']['type'] = $this->session->flashdata('type');

			$school_admin = $this->session->userdata('school');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);

			$nav['transport'] = 'device';

			$device['device'] = $this->Device_model->fetch_school_device($employee_school_profile_id);
			$this->load->view('School/school_header',$admin);
			$this->load->view('Device/view_device', $device);
			$this->load->view('Device/device_footer', $nav);
		}

		function fetch_school_institute(){
			$institute = $_POST['institute'];
			$data = $this->Device_model->fetch_school($institute);
			echo json_encode($data);
		}

		function add_registration()
		{
			if(!isset($this->session->userdata['super_admin']))
			{
				redirect('/');
			} 
			$super_admin = $this->session->userdata('super_admin');
			$device['device'] =  $this->input->post('device_id');
			$device_id = $this->Device_model->already_exits_device($device);

			$num['mobile'] =  $this->input->post('device_mobile_number');
			$mobile_no = $this->Device_model->already_exits_mobile($num);

			if($device_id != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Device Already Registered.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
				redirect('Device/device_registration');
			}
			elseif($mobile_no != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Mobile Number Already Configured With Other Device.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
				redirect('Device/device_registration');
			}
			else{
				$device_registration['device_id'] = $this->input->post('device_id');
				$device_registration['device_mobile_number'] = $this->input->post('device_mobile_number');
				$device_registration['device_mobile_IMSI_number'] = $this->input->post('device_mobile_IMSI_number');
				$device_registration['device_mobile_sim_number'] = $this->input->post('device_mobile_sim_number');
				$device_registration['device_non_moving_frequency'] =  $this->input->post('device_non_moving_frequency');
				$device_registration['device_port_number'] =  $this->input->post('device_port_number');
				$device_registration['device_effective_date'] = date('Y-m-d');
				$con = $this->Device_model->add_device($device_registration);
				if($con != 0){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Device not Added...");
		            $this->session->set_flashdata('text',"");
		            $this->session->set_flashdata('type',"warning");
					redirect('Device/device_registration');
				}else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Device Added Successfully.");
		            $this->session->set_flashdata('text',"");
		            $this->session->set_flashdata('type',"success");
					redirect('Device/device_registration');
				}	
			}
		}

		function update_device($device_id){
			$this->session->set_userdata('update_device',$device_id);
			redirect('Device/update_device_view');
		}

		function update_device_view()
		{
			if(!isset($this->session->userdata['super_admin']))
			{
				redirect('/');
			} 
			$device['flash']['active'] = $this->session->flashdata('active');
        	$device['flash']['title'] = $this->session->flashdata('title');
        	$device['flash']['text'] = $this->session->flashdata('text');
        	$device['flash']['type'] = $this->session->flashdata('type');

			$super_admin = $this->session->userdata('super_admin');
			$employee_details = $this->Admin_model->employee_details($super_admin);
			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$admin['username'] = $super_admin[0]['credential_username'];
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			$device_update['institute'] = $this->Device_model->fetch_institute();
			$nav['transport'] = 'device';

			$device_id = $this->session->userdata('update_device');
			$device_update['device'] = $this->Device_model->fetch_device_update($device_id);

			$this->load->view('Dashboard/header', $admin);
			$this->load->view('Device/update_device',$device_update);
			$this->load->view('Device/device_footer',$nav);
		}

		function update_device_details()
		{
			$data['device_id'] = $this->input->post('device_id');
			$data['device_mobile_number'] = $this->input->post('device_mobile_number');
			$data['device_mobile_IMSI_number'] = $this->input->post('device_mobile_IMSI_number');
			$data['device_mobile_sim_number'] = $this->input->post('device_mobile_sim_number');
			$data['device_non_moving_frequency'] =  $this->input->post('device_non_moving_frequency');
			$data['device_port_number'] =  $this->input->post('device_port_number');
			$con = $this->Device_model->update_device_details($data);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Device not Updated...");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
				redirect('Device/device_registration');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Device Updated Successfully.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Device/device_registration');
			}
		}

		function deactivate_device($device_id)
		{
			$this->session->set_userdata('deactivate_device',$device_id);
			redirect('Device/disable_device');
		}

		function disable_device(){
			$device_id = $this->session->userdata('deactivate_device');
			$bus_device_details = $this->Device_model->fetch_bus_device($device_id);
			if (empty($bus_device_details)){
				$con = $this->Device_model->disable_device($device_id);
				if($con != 0){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Device not Deactivated...");
		            $this->session->set_flashdata('text',"");
		            $this->session->set_flashdata('type',"warning");
					redirect('Device/device_registration');
				}else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Device Deactivated.");
		            $this->session->set_flashdata('text',"");
		            $this->session->set_flashdata('type',"success");
					redirect('Device/device_registration');
				}
			}
			else{
				$bus_no = $bus_device_details[0]['bus_no'];
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Device Already Assign to ".$bus_no."");
	            $this->session->set_flashdata('text',"Please Update Bus Device");
	            $this->session->set_flashdata('type',"warning");
				redirect('Bus/bus_registration');
			}
		}

		function device_active($device_id)
		{
			$this->session->set_userdata('active_device',$device_id);
			redirect('Device/enable_device');
		}

		function enable_device(){
			$device_id = $this->session->userdata('active_device');
			$con = $this->Device_model->enable_device($device_id);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Device not Activated...");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"warning");
				redirect('Device/device_registration');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Device Activated.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Device/device_registration');
			}
		}

		function already_exits_mobile()
		{
			$num['mobile'] = $_POST['num'];
			$data = $this->Device_model->already_exits_mobile($num);
			echo json_decode($data);
		}

		function already_exits_device()
		{
			$device['device'] = $_POST['device'];
			$data = $this->Device_model->already_exits_device($device);
			echo json_decode($data);
		}
	}
 ?>