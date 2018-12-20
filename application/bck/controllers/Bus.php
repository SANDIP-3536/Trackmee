<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
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
			$admin['user'] = $super_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $super_admin[0]['employee_profile_id'];
			$admin['photo'] = $super_admin[0]['employee_photo'];
			$employee_school_profile_id = $super_admin[0]['employee_school_profile_id'];
			$admin['first_name'] = $super_admin[0]['employee_first_name'];
			$admin['last_name'] = $super_admin[0]['employee_last_name'];
			$admin['email_id'] = $super_admin[0]['employee_email_id'];
			$admin['username'] = $super_admin[0]['credential_username'];
			$bus['institute'] = $this->Bus_model->fetch_institute();
			$result = $this->db->query('select * from bus')->result_array();
			for ($i=0; $i < count($result); $i++) { 
				if (!empty($result[$i]['bus_school_profile_id'])) {
					 $bus['school_name'][$i] = $this->Bus_model->fetch_school_record($result[$i]['bus_school_profile_id']);
				}
				else
				{
					$bus['school_name'][$i] = "NA";
				}
			}

			$nav['bus'] ='bus';
			
			$bus['device'] = $this->Bus_model->fetch_device($employee_school_profile_id);
			$bus['bus'] = $this->Bus_model->fetch_bus($employee_school_profile_id);
			$this->load->view('Dashboard/header', $admin);
			$this->load->view('Bus/bus_registration', $bus);
			$this->load->view('Bus/bus_footer',$nav);
		}

		function view_school_bus()
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
			$bus['flash']['active'] = $this->session->flashdata('active');
        	$bus['flash']['title'] = $this->session->flashdata('title');
        	$bus['flash']['text'] = $this->session->flashdata('text');
        	$bus['flash']['type'] = $this->session->flashdata('type');

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
			$nav['bus'] ='transport';

			$bus['bus'] = $this->Bus_model->fetch_school_bus($employee_school_profile_id);
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
		
			$this->load->view('School/school_header', $admin);
			$this->load->view('Bus/view_bus', $bus);
			$this->load->view('Bus/bus_footer',$nav);
		}

		function fetch_school_institute(){
			$institute = $_POST['institute'];
			$data = $this->Bus_model->fetch_school($institute);
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
	            $this->session->set_flashdata('type',"warning");
				redirect('Bus/bus_registration');
			}
			else{
				$bus_registration['bus_no'] = $this->input->post('bus_no');
				$bus_registration['bus_device_id'] = $this->input->post('bus_device_id');
				$bus_registration['bus_total_no_of_seat'] = $this->input->post('bus_total_no_of_seat');
				$bus_registration['bus_effective_date'] = date('Y-m-d');
				$bus_registration['bus_school_profile_id'] = $this->input->post('bus_school_profile_id');
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
				print_r('expire');die();
				$cnt = $this->Bus_model->deactive($bus_id);
				if($con != 0){
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
				// print_r($driver_name);
				// print_r($route_name);die();
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
			$admin['user'] = $super_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $super_admin[0]['employee_profile_id'];
			$admin['photo'] = $super_admin[0]['employee_photo'];
			$admin['first_name'] = $super_admin[0]['employee_first_name'];
			$admin['last_name'] = $super_admin[0]['employee_last_name'];
			$admin['email_id'] = $super_admin[0]['employee_email_id'];
			$admin['username'] = $super_admin[0]['credential_username'];
			$employee_school_profile_id = $super_admin[0]['employee_school_profile_id'];
			$bus['institute'] = $this->Bus_model->fetch_institute();
			$bus_id = $this->session->userdata('bus_update');
			// print_r($bus_id);die();
			
			$bus['device'] = $this->Bus_model->fetch_device($employee_school_profile_id);
			$bus['bus'] = $this->Bus_model->fetch_bus_details($bus_id);
			// print_r($bus['bus']);die();
			$this->load->view('Dashboard/header', $admin);
			$this->load->view('Bus/bus_update', $bus);
			$this->load->view('Bus/bus_footer');
		}

		function add_bus_update()
		{
			$school_admin = $this->session->userdata('school');
			// $num =  $this->input->post('bus_no');
			// $bus_no = $this->Bus_model->already_exits_bus($num);

			// $bus_device = $this->input->post('bus_device_id');
			// $device_id =  $this->Bus_model->already_exits_bus_device($bus_device);

			// if($bus_no != 0){
			// 	$this->session->set_flashdata('active',1);
	  //           $this->session->set_flashdata('title',"Bus Number Already Registerd.");
	  //           $this->session->set_flashdata('text',""); 
	  //           $this->session->set_flashdata('type',"success");
			// 	redirect('Bus/bus_registration');
			// }
			// if($device_id != 0){
			// 	$this->session->set_flashdata('active',1);
	  //           $this->session->set_flashdata('title',"Bus Device Already Assigned.");
	  //           $this->session->set_flashdata('text',"Device Already Assigned to Other Bus"); 
	  //           $this->session->set_flashdata('type',"success");
			// 	redirect('Bus/bus_registration');
			// }
			// else{
				$bus_update['bus_id'] = $this->input->post('bus_id');
				$bus_update['bus_no'] = $this->input->post('bus_no');
				$bus_update['bus_device_id'] = $this->input->post('bus_device_id');
				$bus_update['bus_total_no_of_seat'] = $this->input->post('bus_total_no_of_seat');

				$bus_update['bus_school_profile_id'] = $this->input->post('bus_school_profile_id');
				$bus_school = $this->Bus_model->already_exits_school_bus($bus_update);
				if ($bus_school != 0) {
					$con = $this->Bus_model->update_bus($bus_update);
				}
				else{
					// $bus_registration['bus_id'] = $this->input->post('bus_id');
					$bus_registration['bus_no'] = $this->input->post('bus_no');
					$bus_registration['bus_device_id'] = $this->input->post('bus_device_id');
					$bus_registration['bus_total_no_of_seat'] = $this->input->post('bus_total_no_of_seat');
					$bus_registration['bus_effective_date'] = date('Y-m-d');
					$bus_registration['bus_school_profile_id'] = $this->input->post('bus_school_profile_id');
					$con = $this->Bus_model->add_bus($bus_registration);
				}
				if($con != 0){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Bus not Added...");
		            $this->session->set_flashdata('text',"");
		            $this->session->set_flashdata('type',"warning");
		            redirect('Bus/bus_registration');
				}else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Bus Updated Successfully.");
		            $this->session->set_flashdata('text',"");
		            $this->session->set_flashdata('type',"success");
					redirect('Bus/bus_registration');
				}
			// }
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