<?php
	defined('BASEPATH') OR exit('No direct Script access Allowed');
	class User_stop_assign extends CI_Controller
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

		function user_stop_assignment()
		{	
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$admin['username'] = $client_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['client_name'];
				$nav['client_logo'] = $employee_details[0]['client_logo'];
				$SS_assign['institute_admin'] = 0;
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$admin['username'] = $institute_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['institute_name'];
				$nav['client_logo'] = $employee_details[0]['institute_logo'];
				$SS_assign['institute_admin'] = 1;
        	}
			$SS_assign['flash']['active'] = $this->session->flashdata('active');
        	$SS_assign['flash']['title'] = $this->session->flashdata('title');
        	$SS_assign['flash']['text'] = $this->session->flashdata('text');
        	$SS_assign['flash']['type'] = $this->session->flashdata('type');
        	
			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];

			$nav['transport'] = 'stop';
			// $SS_assign['route'] =  $this->User_stop_assign_model->fetch_route($employee_client_profile_id); 
			$SS_assign['bus'] =  $this->User_stop_assign_model->fetch_bus($employee_client_profile_id); 
			$SS_assign['user'] =  $this->User_stop_assign_model->fetch_user($employee_client_profile_id);
			$SS_assign['user_stop'] =  $this->User_stop_assign_model->fetch_user_stop($employee_client_profile_id);

			$SS_assign['user_stop_assigned'] =  $this->User_stop_assign_model->fetch_user_stop_assigned($employee_client_profile_id);
			$SS_assign['client'] = $this->Client_model->fetch_client($employee_client_profile_id);

			if (isset($this->session->userdata['client'])) {
				$this->load->view('Client/client_header', $admin);
        	}elseif (isset($this->session->userdata['Institute'])) {
				$this->load->view('Institute/institute_header', $admin);
        	}
			$this->load->view('Assignment/user_stop_assign',$SS_assign);
			$this->load->view('Assignment/assign_footer',$nav);
		}

		function stop_details_route()
		{
			$data1['route_id'] = $_POST['route_id'];	
			$data1['route_type'] = $_POST['route_type'];
			$data = $this->User_stop_assign_model->stop_details($data1);
			echo json_encode($data);
		}

		function bus_details_route()
		{
			$bus_id = $_POST['bus_id'];	
			$data = $this->User_stop_assign_model->fetch_route($bus_id);
			echo json_encode($data);
		}

		function client_details_bus_wise()
		{
			$bus_id = $_POST['bus_id'];
			$data = $this->db->query("SELECT client_name,client_profile_id from bus join client on bus_client_profile_id = client_profile_id where bus_client_profile_id=".$bus_id." group by 2")->result_array();
			echo json_encode($data);
		}

		function add_user_stop1()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$SS_client_profile_id = $employee_details[0]['employee_client_profile_id'];
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$SS_client_profile_id = $this->input->post('SS_client_profile_id');
        	}
			$stop_name['stop_name'] = $this->input->post('stop_name');
			$stop_id = $this->User_stop_assign_model->fetch_stop_id($stop_name);
			if(empty($stop_id)){
				$stop_id_1 = '';
				$stop_id_2 = '';
			}else{
				$stop_id_1 = $stop_id[0]['stop_id'];
				$stop_id_2 = $stop_id[1]['stop_id'];
				if($stop_id_1 == 'null' || $stop_id_2 == 'null'){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"User Stop not Assign...");
		            $this->session->set_flashdata('text',"Please Select Route Stop");
		            $this->session->set_flashdata('type',"warning");
					redirect('User_stop_assign/user_stop_assignment');
				}
			}
			$data['SS_user_profile_id'] = $this->input->post('SS_user_profile_id[]');

			for ($i=0; $i <count($data['SS_user_profile_id']); $i++) {
					$SS_assign['SS_client_profile_id'] = $SS_client_profile_id;
					$SS_assign['SS_effective_date'] = date('Y-m-d');
					$SS_assign['SS_type_1_stop_id'] = $stop_id_1;
					$SS_assign['SS_type_2_stop_id'] = $stop_id_2;
					$SS_assign['SS_user_profile_id'] = $data['SS_user_profile_id'][$i];
					$SS_assign['SS_bus_id'] = $this->input->post('bus_id');
					$SS_assign['SS_route_no'] = $this->input->post('route_id');
					$this->User_stop_assign_model->add_user_stop($SS_assign);		
				}
			$this->session->set_flashdata('active',1);
			if(empty($stop_id)){
	            $this->session->set_flashdata('title',"Bus has been assigned successfully to User");
	            $this->session->set_flashdata('text',"But Bus Stop Not assigned to User");
        	}else{
	            $this->session->set_flashdata('title',"Bus Stop has been assigned successfully to User");
	            $this->session->set_flashdata('text',"");
        	}
            $this->session->set_flashdata('type',"success");
			redirect('User_stop_assign/user_stop_assignment');
		}

		function deactivate_user_stop(){
			$SS_user_profile_id = $this->input->post('SS_user_profile_id[]');
			$cnt = count($SS_user_profile_id);
			for ($i=0; $i <$cnt ; $i++) { 
				$this->db->query('delete from user_stop_assgn where SS_user_profile_id ='.$SS_user_profile_id[$i].'');
			}

			redirect('User_stop_assign/user_stop_assignment');
		}
	}
 ?>