<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');
	class Stop extends CI_Controller
	{

		function stop_registration()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$stop['username'] = $client_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['client_name'];
				$nav['client_logo'] = $employee_details[0]['client_logo'];
				$stop_details['institute_admin'] = 0;
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$stop['username'] = $institute_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['institute_name'];
				$nav['client_logo'] = $employee_details[0]['institute_logo'];
				$stop_details['institute_admin'] = 1;
        	}
			$nav['stop'] = "stop";

			$stop['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$stop['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$stop['photo'] = $employee_details[0]['employee_photo'];
			$stop['first_name'] = $employee_details[0]['employee_first_name'];
			$stop['last_name'] = $employee_details[0]['employee_last_name'];
			$stop['email_id'] = $employee_details[0]['employee_email_id'];

			$stop_details['flash']['active'] = $this->session->flashdata('active');
        	$stop_details['flash']['title'] = $this->session->flashdata('title');
        	$stop_details['flash']['text'] = $this->session->flashdata('text');
        	$stop_details['flash']['type'] = $this->session->flashdata('type');

			$stop_details['route'] = $this->Stop_model->fetch_route($employee_details[0]['employee_client_profile_id']);
			$stop_details['client'] = $this->Client_model->fetch_client($employee_details[0]['employee_client_profile_id']); 
			$client['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			if (isset($this->session->userdata['client'])) {
				$this->load->view('Client/client_header', $stop);
        	}elseif (isset($this->session->userdata['Institute'])) {
				$this->load->view('Institute/institute_header', $stop);
        	}
			$this->load->view('Stop/stop_registration', $stop_details);
			$this->load->view('Stop/stop_footer',$nav);
		}

		function add_stop()
		{
			$stop_details = $this->input->post();
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$stop_client_profile_id = $employee_details[0]['employee_client_profile_id'];
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$stop_client_profile_id = $this->input->post('stop_client_profile_id');
        	}
			$stop['route_no'] = $this->input->post('route_no');
			$stop['route_type'] = $this->input->post('route_type');
			$stop['route_index'] = $this->input->post('route_index[]');
			$stop['route_name'] = $this->input->post('route_name[]');
			$stop['route_latitude'] = $this->input->post('route_latitude[]');
			$stop['route_longitude'] = $this->input->post('route_longitude[]');
			$stop['route_client_profile_id'] = $stop_client_profile_id;
			$cnt = count($stop['route_index']);
			$route_from_id = $this->db->select('route_id')->where('route_type',1)->where('route_no',$stop['route_no'])->get('route')->result_array(); 
			// $route_from_id = $this->db->select('route_id')->where('route_type',1)->where('route_no',$stop['route_no'])->where('route_client_profile_id',$employee_details[0]['employee_client_profile_id'])->get('route')->result_array(); 
			$route_to_id = $this->db->select('route_id')->where('route_type',2)->where('route_no',$stop['route_no'])->get('route')->result_array();
			// $route_to_id = $this->db->select('route_id')->where('route_type',2)->where('route_no',$stop['route_no'])->where('route_client_profile_id',$employee_details[0]['employee_client_profile_id'])->get('route')->result_array();
			$this->Stop_model->delete_stop_details($route_from_id[0]['route_id'],$route_to_id[0]['route_id'],$stop['route_client_profile_id']);
			for ($i=0; $i < $cnt; $i++) { 
				$stop_from['stop_route_id'] = $route_from_id[0]['route_id'];
				$stop_from['stop_index'] = $stop['route_index'][$i];
				$stop_from['stop_name'] = $stop['route_name'][$i];
				$stop_from['stop_latitude'] = $stop['route_latitude'][$i];
				$stop_from['stop_longitude'] = $stop['route_longitude'][$i];
				$stop_from['stop_client_profile_id'] = $stop_client_profile_id;
				$this->Stop_model->add_stop($stop_from);
			}
			for ($i= $cnt-1; $i >= 0; $i--) { 
				$stop_to['stop_route_id'] = $route_to_id[0]['route_id'];
				$stop_to['stop_index'] = $stop['route_index'][$i];
				$stop_to['stop_name'] = $stop['route_name'][$i];
				$stop_to['stop_latitude'] = $stop['route_latitude'][$i];
				$stop_to['stop_longitude'] = $stop['route_longitude'][$i];
				$stop_to['stop_client_profile_id'] = $stop_client_profile_id;
				$this->Stop_model->add_stop($stop_to);
			}
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Stop Added Successfully.");
            $this->session->set_flashdata('text',""); 
            $this->session->set_flashdata('type',"success");
			redirect('stop/stop_registration');
		}

		function stop_details()
		{
			$data1['route_id'] = $_POST['route_id'];	
			$data1['route_type'] = $_POST['route_type'];
			$data = $this->Stop_model->stop_details($data1);
			echo json_encode($data);
		}

		function stop_details_with_route_type_1()
		{
			$data1['route_id'] = $_POST['route_id'];	
			$data1['route_type'] = 1;
			$data = $this->Stop_model->stop_details_with_route_type_1($data1);
			echo json_encode($data);
		}

		function stop_details_with_route_type_2()
		{
			$data1['route_id'] = $_POST['route_id'];	
			$data1['route_type'] = 2;
			$data = $this->Stop_model->stop_details_with_route_type_2($data1);
			echo json_encode($data);
		}

		function route_client_details()
		{
			$data1['route_id'] = $_POST['route_id'];
			$data = $this->db->select('client_profile_id,client_name')->from('route')->join('client','client_profile_id = route_client_profile_id')->where('route_no',$data1['route_id'])->group_by('1')->get()->result_array();
			echo json_encode($data);
		}

		function stop_delete_jq()
		{
			$data['stop_index'] = $_POST['route_index'];
			$data['route_no'] = $_POST['stop_route_id'];
			
			$data1 = $this->Stop_model->stop_delete_jq($data);
			
			echo json_encode($data1);
		}

		function stop_route_details()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
        	}
			$route['employee_client_profile_id'] = $employee_details[0]['employee_client_profile_id'];
			$route['route_no'] = $_POST['route_no'];
			$data = $this->Stop_model->stop_route_details($route);
			echo json_encode($data);
		}
	}
 ?>