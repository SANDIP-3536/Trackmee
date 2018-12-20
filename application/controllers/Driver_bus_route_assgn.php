<?php 

	defined('BASEPATH') OR exit('No direct Script access Allowed');
	class Driver_bus_route_assgn extends CI_Controller
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

		function driver_bus_route_assign()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$admin['username'] = $client_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['client_name'];
				$nav['client_logo'] = $employee_details[0]['client_logo'];
				$DBR_assign['institute_admin'] = 0;
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$admin['username'] = $institute_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['institute_name'];
				$nav['client_logo'] = $employee_details[0]['institute_logo'];
				$DBR_assign['institute_admin'] = 1;
        	}	
			$DBR_assign['flash']['active'] = $this->session->flashdata('active');
        	$DBR_assign['flash']['title'] = $this->session->flashdata('title');
        	$DBR_assign['flash']['text'] = $this->session->flashdata('text');
        	$DBR_assign['flash']['type'] = $this->session->flashdata('type');

			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$client['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			$nav['transport'] = 'transport';

			$DBR_assign['driver'] = $this->Driver_bus_route_assgn_model->fetch_driver($employee_client_profile_id);
			$DBR_assign['bus'] = $this->Driver_bus_route_assgn_model->fetch_bus11($employee_client_profile_id);
			$DBR_assign['route'] = $this->Driver_bus_route_assgn_model->fetch_route($employee_client_profile_id);
			$DBR_assign['assign'] = $this->Driver_bus_route_assgn_model->fetch_assign($employee_client_profile_id);
			$DBR_assign['client'] = $this->Client_model->fetch_client($employee_client_profile_id);
			if (isset($this->session->userdata['client'])) {
				$this->load->view('Client/client_header', $admin);
        	}elseif (isset($this->session->userdata['Institute'])) {
				$this->load->view('Institute/institute_header', $admin);
        	}
			$this->load->view('Assignment/driver_bus_route_assgn', $DBR_assign);
			$this->load->view('Assignment/assign_footer',$nav);
		}

		function add_driver_bus_route_assign()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$admin['DBR_client_profile_id'] = $employee_details[0]['employee_client_profile_id'];
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$admin['DBR_client_profile_id'] = $this->input->post('DBR_client_profile_id');
        	}
			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];

			$DBR['DBR_driver_id'] = $this->input->post('DBR_driver_id');
			$DBR['DBR_bus_id'] = $this->input->post('DBR_bus_id');
			$DBR['DBR_route_no'] = $this->input->post('DBR_route_no');
			$DBR['DBR_effective_date'] = date('Y-m-d');
			$DBR['DBR_client_profile_id'] = $admin['DBR_client_profile_id'];
			$con = $this->Driver_bus_route_assgn_model->add_driver_bus_route_assign($DBR);
			if($con != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Not Assigned...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Driver_bus_route_assgn/driver_bus_route_assign');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Assigned Successfully.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Driver_bus_route_assgn/driver_bus_route_assign');
			}
		}

		function disable_DBR()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$admin['username'] = $client_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['client_name'];
				$nav['client_logo'] = $employee_details[0]['client_logo'];
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$admin['username'] = $institute_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['institute_name'];
				$nav['client_logo'] = $employee_details[0]['institute_logo'];
        	}	
			$DBR['DBR_id'] = $this->input->post('DBR_id');
			$DBR['DBR_expiry_date'] = date('Y-m-d');
			$cnt = $this->Driver_bus_route_assgn_model->disable_DBR($DBR);	

			if($cnt != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Not Assigned...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Driver_bus_route_assgn/driver_bus_route_assign');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Deactivated Successfully.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Driver_bus_route_assgn/driver_bus_route_assign');
			}
		}

		function Update_DBR($DBR_id)
		{
			$this->session->set_userdata("DBR",$DBR_id);
			redirect('Driver_bus_route_assgn/update_details_DBR');
		}

		function update_details_DBR()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$admin['username'] = $client_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['client_name'];
				$nav['client_logo'] = $employee_details[0]['client_logo'];
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$admin['username'] = $institute_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['institute_name'];
				$nav['client_logo'] = $employee_details[0]['institute_logo'];
        	}	
			$DBR_assign['flash']['active'] = $this->session->flashdata('active');
        	$DBR_assign['flash']['title'] = $this->session->flashdata('title');
        	$DBR_assign['flash']['text'] = $this->session->flashdata('text');
        	$DBR_assign['flash']['type'] = $this->session->flashdata('type');

			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$client['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			
			$nav['transport'] = 'transport';
			$DBR_id = $this->session->userdata("DBR");
			$DBR_assign['driver'] = $this->Driver_bus_route_assgn_model->fetch_driver($employee_client_profile_id);
			$DBR_assign['DBR_record'] = $this->Driver_bus_route_assgn_model->fetch_DBR_record($DBR_id);
			// print_r($DBR_assign['DBR_record']);die();
			if (isset($this->session->userdata['client'])) {
				$this->load->view('Client/client_header', $admin);
        	}elseif (isset($this->session->userdata['Institute'])) {
				$this->load->view('Institute/institute_header', $admin);
        	}
			$this->load->view('Assignment/update_DBR_driver', $DBR_assign);
			$this->load->view('Assignment/assign_footer',$nav);
		}

		function Update_DBR_bus($DBR_id)
		{
			$this->session->set_userdata("DBR",$DBR_id);
			redirect('Driver_bus_route_assgn/update_details_DBR_bus');
		}

		function update_details_DBR_bus()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$admin['username'] = $client_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['client_name'];
				$nav['client_logo'] = $employee_details[0]['client_logo'];
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$admin['username'] = $institute_admin[0]['credential_username'];
				$nav['client_name'] = $employee_details[0]['institute_name'];
				$nav['client_logo'] = $employee_details[0]['institute_logo'];
        	}	
			$DBR_assign['flash']['active'] = $this->session->flashdata('active');
        	$DBR_assign['flash']['title'] = $this->session->flashdata('title');
        	$DBR_assign['flash']['text'] = $this->session->flashdata('text');
        	$DBR_assign['flash']['type'] = $this->session->flashdata('type');

			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$client['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			
			$nav['transport'] = 'transport';
			$DBR_id = $this->session->userdata("DBR");
			$DBR_assign['bus'] = $this->Driver_bus_route_assgn_model->fetch_all_bus($employee_client_profile_id,$DBR_id);
			$DBR_assign['DBR_record'] = $this->Driver_bus_route_assgn_model->fetch_DBR_record($DBR_id);
			// print_r($DBR_assign['DBR_record']);die();
			if (isset($this->session->userdata['client'])) {
				$this->load->view('Client/client_header', $admin);
        	}elseif (isset($this->session->userdata['Institute'])) {
				$this->load->view('Institute/institute_header', $admin);
        	}
			$this->load->view('Assignment/update_DBR_bus', $DBR_assign);
			$this->load->view('Assignment/assign_footer',$nav);
		}

		function already_exits_route_bus()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$data4['employee_client_profile_id'] = $employee_details[0]['employee_client_profile_id'];
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$data4['employee_client_profile_id'] = $_POST['profile_id'];
        	}
			$bus = $_POST['bus'];
			$route = $_POST['route'];
			$data = $this->db->query("SELECT * from route as r, (select route_id,route_start_time,route_end_time from driver_bus_route_assgn join route on DBR_route_no=route_no 	where DBR_bus_id=".$bus." and DBR_client_profile_id=".$data4['employee_client_profile_id']." and DBR_expiry_date='9999-12-31') as new_route_bus where ((new_route_bus.route_start_time between r.route_start_time and r.route_end_time and new_route_bus.route_end_time between r.route_start_time and r.route_end_time) or (r.route_start_time between new_route_bus.route_start_time and new_route_bus.route_end_time and r.route_end_time  between new_route_bus.route_start_time and new_route_bus.route_end_time) ) and r.route_id != new_route_bus.route_id and route_client_profile_id=".$data4['employee_client_profile_id']." and route_expiry_date='9999-12-31' and r.route_no=".$route."")->num_rows();
			echo json_encode($data);
		}

		function update_driver_assign()
		{
			$data = $this->input->post();
			$this->db->set($data)->where('DBR_id',$data['DBR_id'])->update('driver_bus_route_assgn',$data);
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Driver Details updated Successfully.");
            $this->session->set_flashdata('text',""); 
            $this->session->set_flashdata('type',"success");
			redirect('Driver_bus_route_assgn/driver_bus_route_assign');
		}

		function update_bus_assign()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$data4['employee_client_profile_id'] = $employee_details[0]['employee_client_profile_id'];
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				// $data4['employee_client_profile_id'] = $_POST['profile_id'];
				$data4['employee_client_profile_id'] = $employee_details[0]['employee_client_profile_id'];
        	}
			$DBR_id = $this->input->post('DBR_id');
			$driver = $this->input->post('DBR_driver_id');
			$bus = $this->input->post('DBR_bus_id');
			$route = $this->input->post('DBR_route_no');
			$sql= "SELECT * from route as r, (select route_id,route_start_time,route_end_time from driver_bus_route_assgn join route on DBR_route_no=route_no 	where DBR_bus_id=".$bus." and DBR_client_profile_id=".$data4['employee_client_profile_id']." and DBR_expiry_date='9999-12-31') as new_route_bus where ((new_route_bus.route_start_time between r.route_start_time and r.route_end_time and new_route_bus.route_end_time between r.route_start_time and r.route_end_time) or (r.route_start_time between new_route_bus.route_start_time and new_route_bus.route_end_time and r.route_end_time  between new_route_bus.route_start_time and new_route_bus.route_end_time) ) and r.route_id != new_route_bus.route_id and route_client_profile_id=".$data4['employee_client_profile_id']." and route_expiry_date='9999-12-31' and r.route_no=".$route."";

			$data = $this->db->query($sql)->num_rows();
			if($data != 0){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Bus Route time Complicate with other.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"warning");
				redirect('Driver_bus_route_assgn/driver_bus_route_assign');
			}	
			else{
				$this->db->set('DBR_expiry_date',date('Y-m-d'))->where('DBR_id',$DBR_id)->update('driver_bus_route_assgn');
				$DBR['DBR_driver_id'] = $this->input->post('DBR_driver_id');
				$DBR['DBR_bus_id'] = $this->input->post('DBR_bus_id');
				$DBR['DBR_route_no'] = $this->input->post('DBR_route_no');
				$DBR['DBR_effective_date'] = date('Y-m-d');
				// $DBR['DBR_client_profile_id'] = $admin['DBR_client_profile_id'];
				$DBR['DBR_client_profile_id'] = $employee_details[0]['employee_client_profile_id'];
				$this->db->insert('driver_bus_route_assgn',$DBR);
				$new_DBR_id = $this->db->query("select DBR_bus_id from driver_bus_route_assgn where DBR_id = ".$DBR_id."")->result_array();
				// print_r("update user_stop_assgn set SS_bus_id =".$bus." where SS_bus_id =".$new_DBR_id[0]['DBR_bus_id']." and SS_route_no =".$route."");die();
				$this->db->query("update user_stop_assgn set SS_bus_id =".$bus." where SS_bus_id =".$new_DBR_id[0]['DBR_bus_id']." and SS_route_no =".$route."");
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Bus Updated Successfully.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Driver_bus_route_assgn/driver_bus_route_assign');
			}
		}

		function bus_details_driver_wise()
		{
			$driver = $_POST['driver'];
			$data = $this->Driver_bus_route_assgn_model->fetch_bus($driver);
			echo json_encode($data);
		}

		function client_details_driver_wise()
		{
			$driver = $_POST['driver'];
			$data = $this->Driver_bus_route_assgn_model->fetch_client($driver);
			echo json_encode($data);
		}

		function already_exits_driver_bus()
		{
			if (isset($this->session->userdata['client'])) {
				$client_admin = $this->session->userdata('client');
				$employee_details = $this->Client_model->employee_details($client_admin);
				$data4['employee_client_profile_id'] = $employee_details[0]['employee_client_profile_id'];
        	}elseif (isset($this->session->userdata['Institute'])) {
        		$institute_admin = $this->session->userdata('Institute');
				$employee_details = $this->Institute_model->employee_details($institute_admin);
				$data4['employee_client_profile_id'] = $_POST['profile_id'];
        	}
			$data4['bus'] = $_POST['bus'];
			$data4['driver'] = $_POST['driver'];
			// $dataa = array();

			$DB_assign_result = $this->db->query("SELECT route_id,route_type,route_no,route_name,route_start_time,route_end_time FROM driver_bus_route_assgn as DBR join route on DBR_route_no=route_no where (DBR_driver_id=".$data4['driver']." or DBR_bus_id=".$data4['bus'].") and DBR_expiry_date='9999-12-31'")->result_array();
			if(empty($DB_assign_result)){
				$data = $this->db->query("SELECT route_no,route_name from route where route_expiry_date='9999-12-31' and route_client_profile_id='".$data4['employee_client_profile_id']."' group by 1,2" )->result_array();;
			}
			else{
				$flag=0;

				$route_data = $this->db->query("SELECT route_id,route_no,route_name,route_start_time,route_end_time from route where route_expiry_date='9999-12-31' and route_client_profile_id='".$data4['employee_client_profile_id']."' and route_id not in (SELECT route_id FROM driver_bus_route_assgn as DBR join route on DBR_route_no=route_no where (DBR_driver_id='".$data4['driver']."' or DBR_bus_id='".$data4['bus']."') and DBR_expiry_date='9999-12-31')" )->result_array();;
				
				for($i=0;$i<count($route_data);$i++)
				{
					$check_start_time=$route_data[$i]['route_start_time'];
					$check_end_time=$route_data[$i]['route_end_time'];
					for($j=0;$j<count($DB_assign_result);$j++)
					{
						$assign_start_time=$DB_assign_result[$j]['route_start_time'];
						$assign_end_time=$DB_assign_result[$j]['route_end_time'];
						if((strtotime($assign_start_time) >=strtotime($check_start_time) && strtotime($assign_start_time) <= strtotime($check_end_time)) || (strtotime($assign_end_time) >=strtotime($check_start_time) && strtotime($assign_end_time) <= strtotime($check_end_time)))
						{
							$flag=0;
							break;
						}
						else
						{
							$flag=1;
						}
					}
					if($flag=1)
					{
						$dataa[] = array('route_no'=> ''.$route_data[$i]['route_no'].'','route_name'=>''.$route_data[$i]['route_name'].'');
					}
				}
				$data = array_unique($dataa,SORT_REGULAR);
			}
			echo json_encode($data);
		}
		
	}
	
 ?>