<?php 

	defined('BASEPATH') OR exit('No direct Script access Allowed');

	/**
	* 
	*/
	class Driver_bus_route_assgn extends CI_Controller
	{

		function driver_bus_route_assign()
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
			$DBR_assign['flash']['active'] = $this->session->flashdata('active');
        	$DBR_assign['flash']['title'] = $this->session->flashdata('title');
        	$DBR_assign['flash']['text'] = $this->session->flashdata('text');
        	$DBR_assign['flash']['type'] = $this->session->flashdata('type');

			$school_admin = $this->session->userdata('school');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['transport'] = 'transport';

			$DBR_assign['driver'] = $this->Driver_bus_route_assgn_model->fetch_driver($employee_school_profile_id);
			$DBR_assign['bus'] = $this->Driver_bus_route_assgn_model->fetch_bus($employee_school_profile_id);
			$DBR_assign['route'] = $this->Driver_bus_route_assgn_model->fetch_route($employee_school_profile_id);
			$DBR_assign['assign'] = $this->Driver_bus_route_assgn_model->fetch_assign($employee_school_profile_id);

			$this->load->view('School/school_header', $admin);
			$this->load->view('Assignment/driver_bus_route_assgn', $DBR_assign);
			$this->load->view('Assignment/assign_footer',$nav);
		}

		function add_driver_bus_route_assign()
		{
			$school_admin = $this->session->userdata('school');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];

			$DBR['DBR_driver_id'] = $this->input->post('DBR_driver_id');
			$DBR['DBR_bus_id'] = $this->input->post('DBR_bus_id');
			$DBR['DBR_route_no'] = $this->input->post('DBR_route_no');
			$DBR['DBR_effective_date'] = date('Y-m-d');
			$DBR['DBR_school_profile_id'] = $admin['employee_school_profile_id'];

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

		function expire_DBR($DBR_id)	
		{
			$this->session->set_userdata('expire_DBR',$DBR_id);
			redirect('Driver_bus_route_assgn/disable_DBR');
		}

		function disable_DBR()
		{
			$DBR['DBR_id'] = $this->session->userdata('expire_DBR');
			$DBR['DBR_expiry_date'] = date('Y-m-d');
			$cnt = $this->Driver_bus_route_assgn_model->disable_DBR($DBR);	

			if($con != 0){
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

		function already_exits_driver_bus()
		{
			$school_admin = $this->session->userdata('school');
			$data4['employee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$data4['bus'] = $_POST['bus'];
			$data4['driver'] = $_POST['driver'];
			$dataa = array();

			

			$DB_assign_result = $this->db->query('SELECT route_id,route_type,route_no,route_name,route_start_time,route_end_time FROM driver_bus_route_assgn as DBR join route on DBR_route_no=route_no where (DBR_driver_id='.$data4['driver'].' or DBR_bus_id='.$data4['bus'].') and DBR_expiry_date="9999-12-31"')->result_array();
			if(empty($DB_assign_result)){
				$data = $this->db->query("SELECT route_no,route_name from route where route_expiry_date='9999-12-31' and route_school_profile_id='".$data4['employee_school_profile_id']."' group by 1,2" )->result_array();;
			}
			else{
				$flag=0;

				$route_data = $this->db->query("SELECT route_id,route_no,route_name,route_start_time,route_end_time from route where route_expiry_date='9999-12-31' and route_school_profile_id='".$data4['employee_school_profile_id']."' and route_id not in (SELECT route_id FROM driver_bus_route_assgn as DBR join route on DBR_route_no=route_no where (DBR_driver_id='".$data4['driver']."' or DBR_bus_id='".$data4['bus']."') and DBR_expiry_date='9999-12-31')" )->result_array();;
				
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