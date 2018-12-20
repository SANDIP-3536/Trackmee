<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Tracking extends CI_Controller
	{
		
	public function index($device_id = 0)
	{
		if(isset($this->session->userdata['client']))
		{
			$data['car']=$this->session->userdata('bus_no');
		} 
		if(isset($this->session->userdata['Institute']))
		{
			$data['car']=$this->session->userdata('bus_no_institute');
		} 
		if(isset($this->session->userdata['direct'])){
			$data['direct'] = $this->session->userdata('direct');
		}
		else{
			$data['direct'] = 1;
		}
		
		if(!empty($this->input->post('device_id')))
		{
			$device_selected = $this->input->post('device_id');
		}
		else
		{
			$device_selected = $device_id;		
		}
		
		$this->session->set_userdata('device_selected',$device_selected);

		$driver = $this->db->query('SELECT CONCAT(employee_first_name,employee_middle_name,employee_last_name) AS name,employee_pri_mobile_number AS mob, employee_photo FROM `bus` LEFT JOIN driver_bus_route_assgn ON bus_id = DBR_bus_id AND DBR_expiry_date = "9999-12-31" LEFT JOIN employee ON DBR_driver_id = employee_profile_id LEFT JOIN client ON client_profile_id = employee_client_profile_id WHERE bus_device_id = "'.$device_selected.'"')->result_array();
		$data['driver_name'] = $driver[0]['name'];
		$data['driver_mob'] = $driver[0]['mob'];
		$data['employee_photo'] = $driver[0]['employee_photo'];
		$data['client_speed_limit_val'] = $this->db->query('SELECT client_speed_limit_val FROM client JOIN bus ON bus_client_profile_id = client_profile_id WHERE bus_device_id = "'.$device_selected.'"')->row()->client_speed_limit_val;
		// print_r($data);die();

	    $res =	$this->db->query("SELECT prnt.* FROM gps_location_data prnt JOIN (SELECT device_id,MAX(on_day_time) as on_day_time FROM gps_location_data where device_id in ('".$device_selected."') GROUP BY device_id)chld ON prnt.device_id = chld.device_id AND prnt.on_day_time = chld.on_day_time")->result_array();
		$data['max_run'] = $this->db->query("SELECT round(MAX(odometer_reading)-min(odometer_reading)) as dist FROM `gps_location_data` WHERE device_id = '".$device_selected."'")->row()->dist;
		$data['max_run_time'] = $this->db->query("SELECT SEC_TO_TIMe(TIME_TO_SEC(now())-sum(TIME_TO_SEC(total_time))) as sec from ( SELECT stop_latitude ,stop_longitude ,odometer_reading ,max(on_day_time) as end_time ,min(on_day_time) as start_time ,TIMEDIFF(max(on_day_time),min(on_day_time)) as total_time FROM gps_location_data where vehicle_movement_status='A' and device_id='".$device_selected."' group by 3)as data")->row()->sec;
		
	    $data['current_device'] = $device_selected;
	    $data['lat'] = $res[0]['stop_latitude'];
	    $data['lon'] = $res[0]['stop_longitude'];
	    $data['angle'] = $res[0]['heading_angle'];
	    $data['GPS'] = $res[0]['gps_valid_data'];
	    $data['movement'] = $res[0]['vehicle_movement_status'];
	    $data['speed'] = $res[0]['speed'];
	    $data['device_id'] = $res[0]['device_id'];
	    $data['xml_date_time'] = $res[0]['xml_date_time'];
	    $data['gps_valid_data'] = $res[0]['gps_valid_data'];
	    $data['total_satellites'] = $res[0]['total_satellites'];
	    $data['gsm_signal_strength'] = $res[0]['gsm_signal_strength'];
	    $data['panic_status'] = $res[0]['panic_status'];
	    $data['vehicle_movement_status'] = $res[0]['vehicle_movement_status'];
	    $data['power_status'] = $res[0]['power_status'];
	    $data['ignition'] = $res[0]['ignition'];
	    $data['vehicle_no'] =  $this->getBus_no($data['device_id']);

		$check_address = $this->check_address($data['lat'],$data['lon']);

		if (empty($check_address)) 
		{	
			$data['address'] =  $this->getAddress($data['lat'],$data['lon']);

			if ($data['address'] != '') {
				$put_address = $this->put_address($data['lat'],$data['lon'],$data['address']);
			}
		}
		else
		{
			$data['address'] = $check_address[0]['address'];
		}

	    if(isset($this->session->userdata['client']))
		{
			$client_admin = $this->session->userdata('client');
			$employee_details = $this->Client_model->employee_details($client_admin);
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
		
			$datam =  $this->db->query(" SELECT bus_no,bus_device_id FROM bus where bus_expiry_date = '9999-12-31' and bus_client_profile_id = '".$employee_client_profile_id."' order by bus_device_id")->result_array();
			$count = count($datam);
			for ($i=0; $i < $count ; $i++) { 
					$data10[] = $datam[$i]['bus_device_id']; 
			}

			for ($j=0; $j < count($data10) ; $j++) 
			{ 
			   $res['res1'][] =	$this->db->query("SELECT prnt.* FROM gps_location_data prnt JOIN (SELECT device_id,MAX(on_day_time) as on_day_time FROM gps_location_data where device_id in ('".$data10[$j]."') GROUP BY device_id)chld ON prnt.device_id = chld.device_id AND prnt.on_day_time = chld.on_day_time")->result_array();
			
			    $device_id = $res['res1'][$j][0]['device_id'];
				$vehicle_no =  $this->getBus_no($device_id);
				$res['res1'][$j]['vehicle_no'] = $vehicle_no;

				$stop_latitude = $res['res1'][$j][0]['stop_latitude'];
				$stop_longitude = $res['res1'][$j][0]['stop_longitude'];
				// $address =  $this->getAddress($stop_latitude,$stop_longitude);

				$check_address = $this->check_address($stop_latitude,$stop_longitude);

					if (empty($check_address)) 
					{	
						$address =  $this->getAddress($stop_latitude,$stop_longitude);
						if ($address != '') {				
							$put_address = $this->put_address($stop_latitude,$stop_longitude,$address);
						}
					}
					else
					{
						$address = $check_address[0]['address'];
					}
					
				$res['res1'][$j]['address'] = $address;
			}
			$data['res1'] = $res['res1'];

			$client_admin = $this->session->userdata('client');
			$employee_details = $this->Client_model->employee_details($client_admin);
			$data['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$data['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$data['photo'] = $employee_details[0]['employee_photo'];
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			$data['first_name'] = $employee_details[0]['employee_first_name'];
			$data['last_name'] = $employee_details[0]['employee_last_name'];
			$data['email_id'] = $employee_details[0]['employee_email_id'];
			$data['username'] = $client_admin[0]['credential_username'];
			$data['client_name'] = $employee_details[0]['client_name'];
			$data['client_logo'] = $employee_details[0]['client_logo'];
			$data['map'] = 'map';

			$data['map_key1'] = $this->db->query("SELECT client_google_web_map_key FROM `client` where client_profile_id = '".$employee_client_profile_id."'")->row();
			$data['map_key'] = $data['map_key1']->client_google_web_map_key;
			
			$this->load->view('Map/map',$data);
		}	
		if(isset($this->session->userdata['Institute']))
		{
			$institute_admin = $this->session->userdata('Institute');
			$employee_details = $this->Institute_model->employee_details($institute_admin);
			$institute_profile_id = $employee_details[0]['institute_profile_id'];
			
			$datam =  $this->db->query("SELECT bus_no,bus_device_id FROM `client` left join bus on bus_client_profile_id=client_profile_id where client_institute_profile_id ='".$institute_profile_id."' AND bus_device_id is NOT null AND bus_expiry_date = '9999-12-31'")->result_array();

			$count = count($datam);
			for ($i=0; $i < $count ; $i++) { 
					$data9[] = $datam[$i]['bus_device_id']; 
			}

			for ($j=0; $j < count($data9) ; $j++) 
			{ 
				$res['res1'][] =	$this->db->query("SELECT prnt.* FROM gps_location_data prnt JOIN (SELECT device_id,MAX(on_day_time) as on_day_time FROM gps_location_data where device_id in ('".$data9[$j]."') GROUP BY device_id)chld ON prnt.device_id = chld.device_id AND prnt.on_day_time = chld.on_day_time")->result_array();
			
			    $device_id = $res['res1'][$j][0]['device_id'];
				$vehicle_no =  $this->getBus_no($device_id);
				$res['res1'][$j]['vehicle_no'] = $vehicle_no;

				$stop_latitude = $res['res1'][$j][0]['stop_latitude'];
				$stop_longitude = $res['res1'][$j][0]['stop_longitude'];

				$check_address = $this->check_address($stop_latitude,$stop_longitude);

					if (empty($check_address)) 
					{	
						$address =  $this->getAddress($stop_latitude,$stop_longitude);
						if ($address != '') {				
							$put_address = $this->put_address($stop_latitude,$stop_longitude,$address);
						}
					}
					else
					{
						$address = $check_address[0]['address'];
					}
					
				$res['res1'][$j]['address'] = $address;				    
			}

			$data['res1'] = $res['res1'];
			
			$institute_admin = $this->session->userdata('Institute');
			$employee_details = $this->Institute_model->employee_details($institute_admin);
			$institute_profile_id = $employee_details[0]['institute_profile_id'];
			$data['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$data['first_name'] = $employee_details[0]['employee_first_name'];
			$data['last_name'] = $employee_details[0]['employee_last_name'];
			$data['email_id'] = $employee_details[0]['employee_email_id'];
			$data['photo'] = $employee_details[0]['employee_photo'];
			$data['username'] = $institute_admin[0]['credential_username'];
			$data['institute_name'] = $employee_details[0]['institute_name'];
			$data['institute_logo'] = $employee_details[0]['institute_logo'];

			$data['map_key1'] = $this->db->query("SELECT client_google_web_map_key FROM `client` where client_institute_profile_id = '".$institute_profile_id."'")->result_array();
			$data['map_key'] = $data['map_key1'][0]['client_google_web_map_key'];
			
			$this->load->view('Map/map_institute',$data);
		} 
	}

	public function route_curl()
	{
	    $device_selected=$this->session->userdata('device_selected');
	    $res =	$this->db->query("SELECT prnt.* FROM gps_location_data prnt JOIN (SELECT device_id,MAX(on_day_time) as on_day_time FROM gps_location_data where device_id in ('".$device_selected."') GROUP BY device_id)chld ON prnt.device_id = chld.device_id AND prnt.on_day_time = chld.on_day_time")->result_array();
		$data['max_run'] = $this->db->query("SELECT round(MAX(odometer_reading)-min(odometer_reading)) as dist FROM `gps_location_data` WHERE device_id = '".$device_selected."'")->row()->dist;
		$data['max_run_time'] = $this->db->query("SELECT SEC_TO_TIME(TIME_TO_SEC(now())-sum(TIME_TO_SEC(total_time))) as sec from ( SELECT stop_latitude ,stop_longitude ,odometer_reading ,max(on_day_time) as end_time ,min(on_day_time) as start_time ,TIMEDIFF(max(on_day_time),min(on_day_time)) as total_time FROM gps_location_data where vehicle_movement_status='A' and device_id='".$device_selected."' group by 3)as data")->row()->sec;	
	 
	    $data['lat'] = $res[0]['stop_latitude'];
	    $data['lon'] = $res[0]['stop_longitude'];
	    $data['angle'] = $res[0]['heading_angle'];
	    $data['GPS'] = $res[0]['gps_valid_data'];
	    $data['movement'] = $res[0]['vehicle_movement_status'];
	    $data['speed'] = $res[0]['speed'];
	    $data['device_id'] = $res[0]['device_id'];
	    $data['xml_date_time'] = $res[0]['xml_date_time'];
	    $data['panic_status'] = $res[0]['panic_status'];
	    $data['vehicle_movement_status'] = $res[0]['vehicle_movement_status'];
	    $data['gps_valid_data'] = $res[0]['gps_valid_data'];
	    $data['total_satellites'] = $res[0]['total_satellites'];
	    $data['gsm_signal_strength'] = $res[0]['gsm_signal_strength'];
	    $data['panic_status'] = $res[0]['panic_status'];
	    $data['power_status'] = $res[0]['power_status'];
	    $data['vehicle_movement_status'] = $res[0]['vehicle_movement_status'];
	    $data['gps_quality'] = $res[0]['gps_quality'];
	    $data['ignition'] = $res[0]['ignition'];
	  	$data['vehicle_no'] =  $this->getBus_no($data['device_id']);
		
	    echo json_encode($data);
	}	

	public function last_lat_lon()
	{
	    $device_selected = $_POST['device_id'];
	    $res =	$this->db->query("SELECT prnt.* FROM gps_location_data prnt JOIN (SELECT device_id,MAX(on_day_time) as on_day_time FROM gps_location_data where device_id in ('".$device_selected."') GROUP BY device_id)chld ON prnt.device_id = chld.device_id AND prnt.on_day_time = chld.on_day_time")->result_array();
		
	    $data['lat'] = $res[0]['stop_latitude'];
	    $data['lon'] = $res[0]['stop_longitude'];
	    $data['angle'] = $res[0]['heading_angle'];
	    $data['GPS'] = $res[0]['gps_valid_data'];
	    $data['movement'] = $res[0]['vehicle_movement_status'];
	    $data['speed'] = $res[0]['speed'];
	    $data['device_id'] = $res[0]['device_id'];
	    $data['xml_date_time'] = $res[0]['xml_date_time'];
	    $data['panic_status'] = $res[0]['panic_status'];
	    $data['vehicle_movement_status'] = $res[0]['vehicle_movement_status'];
	    $data['gps_valid_data'] = $res[0]['gps_valid_data'];
	    $data['total_satellites'] = $res[0]['total_satellites'];
	    $data['gsm_signal_strength'] = $res[0]['gsm_signal_strength'];
	    $data['panic_status'] = $res[0]['panic_status'];
	    $data['power_status'] = $res[0]['power_status'];
	    $data['vehicle_movement_status'] = $res[0]['vehicle_movement_status'];
	    $data['gps_quality'] = $res[0]['gps_quality'];
	    $data['ignition'] = $res[0]['ignition'];
	  	$data['vehicle_no'] =  $this->getBus_no($data['device_id']);
		
	    echo json_encode($data);
	}	

	public function view_map_table()
	{			
		if(!isset($this->session->userdata['client']))
		{
			redirect('/');
		} 
		if(isset($this->session->userdata['direct'])){
			$admin['direct'] = $this->session->userdata('direct');
		}
		else{
			$admin['direct'] = 1;
		}
		
		$client_admin = $this->session->userdata('client');
		$employee_details = $this->Client_model->employee_details($client_admin);
		$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
		$data =  $this->db->query(" SELECT bus_no,bus_device_id FROM bus where bus_expiry_date = '9999-12-31' and bus_client_profile_id = '".$employee_client_profile_id."' AND bus_expiry_date = '9999-12-31'")->result_array();
		$count = count($data);
		
		if ($count == 0) 
		{
			$client_admin = $this->session->userdata('client');
			$employee_details = $this->Client_model->employee_details($client_admin);
			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$admin['username'] = $client_admin[0]['credential_username'];
			$nav['client_name'] = $employee_details[0]['client_name'];
			$nav['client_logo'] = $employee_details[0]['client_logo'];
			$nav['insti_admin'] = 'tracking';
		
			$this->load->view('Client/client_header', $admin);
			$this->load->view('Map/data_not_available');
			$this->load->view('Map/map_footer',$nav);						
		}
		else
		{
			for ($i=0; $i < $count ; $i++) 
			{ 
				$data1[] = $data[$i]['bus_device_id']; 		
			}

			$this->session->set_userdata('bus_no',$data);

			for ($j=0; $j < count($data1) ; $j++) 
			{ 
				$res['res1'][] = $this->db->query("SELECT prnt.* FROM gps_location_data prnt JOIN (SELECT device_id,MAX(on_day_time) as on_day_time FROM gps_location_data where device_id in ('".$data1[$j]."') GROUP BY device_id)chld ON prnt.device_id = chld.device_id AND prnt.on_day_time = chld.on_day_time")->result_array();

				$stop_latitude = $res['res1'][$j][0]['stop_latitude'];
				$stop_longitude = $res['res1'][$j][0]['stop_longitude'];

				$check_address = $this->check_address($stop_latitude,$stop_longitude);

				if (empty($check_address)) 
				{	
					$address =  $this->getAddress($stop_latitude,$stop_longitude);
					if ($address != '') {				
						$put_address = $this->put_address($stop_latitude,$stop_longitude,$address);
					}
				}
				else
				{
					$address = $check_address[0]['address'];
				}
				
				$device_id = $res['res1'][$j][0]['device_id'];
				$vehicle_no =  $this->getBus_no($device_id);
				$res['res1'][$j][0]['stop_longitude'] = $vehicle_no;
				$res['res1'][$j][0]['stop_latitude'] = $address;
			}
			
			$client_admin = $this->session->userdata('client');
			$employee_details = $this->Client_model->employee_details($client_admin);
			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$admin['username'] = $client_admin[0]['credential_username'];
			$nav['client_name'] = $employee_details[0]['client_name'];
			$nav['client_logo'] = $employee_details[0]['client_logo'];
			$nav['insti_admin'] = 'tracking';

			 $stop = 0; 
             $running = 0; 
             $gpsnotfixed = 0; 
             $gpsfixed = 0; 
             $parking = 0; 
             $idling = 0; 
             $toweing = 0; 
         
            for ($i=0; $i < count($res['res1']); $i++) 
            {
                if ($res['res1'][$i][0]['vehicle_movement_status'] == "B") {
                  $running = $running+1; 
                }elseif ($res['res1'][$i][0]['vehicle_movement_status'] == "c") {
                  $parking = $parking+1; 
                }elseif ($res['res1'][$i][0]['vehicle_movement_status'] == "d") {
                  $idling = $idling+1; 
                }elseif ($res['res1'][$i][0]['vehicle_movement_status'] == "e") {
                  $toweing = $toweing+1; 
                }else{
                  $stop = $stop+1; 
                }
                if ($res['res1'][$i][0]['gps_valid_data'] == "1") {
                  $gpsfixed = $gpsfixed+1; 
                } else {
                  $gpsnotfixed = $gpsnotfixed+1; 
                }
            }

            $res['stop'] = $stop; 
            $res['running'] = $running; 
            $res['gpsnotfixed'] = $gpsnotfixed; 
            $res['gpsfixed'] = $gpsfixed; 
            $res['parking'] = $parking; 
            $res['idling'] = $idling; 
            $res['toweing'] = $toweing; 
			
			$this->load->view('Client/client_header', $admin);
			$this->load->view('Map/view_map_table',$res);
			$this->load->view('Map/map_footer',$nav);	
		}
	}
	public function view_map_table_update()
	{
		$client_admin = $this->session->userdata('client');
		$employee_details = $this->Client_model->employee_details($client_admin);
		$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];

		$data =  $this->db->query("SELECT bus_no,bus_device_id FROM bus where bus_expiry_date = '9999-12-31' and bus_client_profile_id = '".$employee_client_profile_id."' AND bus_expiry_date = '9999-12-31' ")->result_array();
		$count = count($data);
		for ($i=0; $i < $count ; $i++) { 
				$data1[] = $data[$i]['bus_device_id']; 
		}

		for ($j=0; $j < count($data1) ; $j++) 
		{ 
			$res['res1'][] =	$this->db->query("SELECT prnt.* FROM gps_location_data prnt JOIN (SELECT device_id,MAX(on_day_time) as on_day_time FROM gps_location_data where device_id in ('".$data1[$j]."') GROUP BY device_id)chld ON prnt.device_id = chld.device_id AND prnt.on_day_time = chld.on_day_time")->result_array();
			
			$stop_latitude = $res['res1'][$j][0]['stop_latitude'];
			$stop_longitude = $res['res1'][$j][0]['stop_longitude'];

			$check_address = $this->check_address($stop_latitude,$stop_longitude);

			if (empty($check_address))
			{	
				$address =  $this->getAddress($stop_latitude,$stop_longitude);
				if ($address != '') {				
					$put_address = $this->put_address($stop_latitude,$stop_longitude,$address);
				}
			}
			else
			{
				$address = $check_address[0]['address'];
			}

			$device_id = $res['res1'][$j][0]['device_id'];
			$vehicle_no =  $this->getBus_no($device_id);

			$res['res1'][$j][0]['stop_longitude'] = $vehicle_no;
			$res['res1'][$j][0]['stop_latitude'] = $address;
		}
	    echo json_encode($res);
	}

	public function address()
	{
		$data1['lat'] = $_POST['lat'];
	    $data1['lon'] = $_POST['lon'];

		$check_address = $this->check_address($data1['lat'],$data1['lon']);

			if (empty($check_address)) 
			{	
				$data['address'] =  $this->getAddress($data1['lat'],$data1['lon']);

				if ($data['address'] != '') 
				{
					$put_address = $this->put_address($data1['lat'],$data1['lon'],$data['address']);
				}
			}
			else
			{
				$data['address'] = $check_address[0]['address'];
			}

	    echo json_encode($data);
	}

	public function getBus_no($device_id)
	{
		$bus_no =  $this->db->query('SELECT bus_no FROM `bus` where bus_device_id = "'.$device_id.'"')->row();
		$vehicle_no = $bus_no->bus_no;
		 return $vehicle_no;
	}

	public function view_all_device()
	{
		if(!isset($this->session->userdata['client']))
		{
			redirect('/');
		} 
		if(isset($this->session->userdata['direct'])){
			$res['direct'] = $this->session->userdata('direct');
		}
		else{
			$res['direct'] = 1;
		}

		$client_admin = $this->session->userdata('client');
		$employee_details = $this->Client_model->employee_details($client_admin);
		$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
	
		$datam =  $this->db->query(" SELECT bus_no,bus_device_id FROM bus where bus_expiry_date = '9999-12-31' and bus_client_profile_id = '".$employee_client_profile_id."' order by bus_device_id")->result_array();
		$count = count($datam);
		for ($i=0; $i < $count ; $i++) { 
				$data[] = $datam[$i]['bus_device_id']; 
		}

		for ($j=0; $j < count($data) ; $j++) 
		{ 
		   $res['res1'][] =	$this->db->query("SELECT prnt.* FROM gps_location_data prnt JOIN (SELECT device_id,MAX(on_day_time) as on_day_time FROM gps_location_data where device_id in ('".$data[$j]."') GROUP BY device_id)chld ON prnt.device_id = chld.device_id AND prnt.on_day_time = chld.on_day_time")->result_array();
		
		    $device_id = $res['res1'][$j][0]['device_id'];
			$vehicle_no =  $this->getBus_no($device_id);
			$res['res1'][$j]['vehicle_no'] = $vehicle_no;

			$stop_latitude = $res['res1'][$j][0]['stop_latitude'];
			$stop_longitude = $res['res1'][$j][0]['stop_longitude'];

			$check_address = $this->check_address($stop_latitude,$stop_longitude);

				if (empty($check_address)) 
				{	
					$address =  $this->getAddress($stop_latitude,$stop_longitude);
					if ($address != '') {				
						$put_address = $this->put_address($stop_latitude,$stop_longitude,$address);
					}
				}
				else
				{
					$address = $check_address[0]['address'];
				}
				
			$res['res1'][$j]['address'] = $address;
		}
		$client_admin = $this->session->userdata('client');
		$employee_details = $this->Client_model->employee_details($client_admin);
		$res['user'] = $employee_details[0]['employee_pri_mobile_number'];
		$res['user_profile_id'] = $employee_details[0]['employee_profile_id'];
		$res['photo'] = $employee_details[0]['employee_photo'];
		$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
		$res['first_name'] = $employee_details[0]['employee_first_name'];
		$res['last_name'] = $employee_details[0]['employee_last_name'];
		$res['email_id'] = $employee_details[0]['employee_email_id'];
		$res['username'] = $client_admin[0]['credential_username'];
		$res['client_name'] = $employee_details[0]['client_name'];
		$res['client_logo'] = $employee_details[0]['client_logo'];
		$res['map'] = 'map';

		$res['map_key1'] = $this->db->query("SELECT client_google_web_map_key FROM `client` where client_profile_id = '".$employee_client_profile_id."'")->row();
		$res['map_key'] = $res['map_key1']->client_google_web_map_key;

		$this->load->view('Map/all_device_map',$res);
	}

	public function last_record()
	{
		if(isset($this->session->userdata['Institute']))
		{
			$institute_admin = $this->session->userdata('Institute');
			$employee_details = $this->Institute_model->employee_details($institute_admin);

			$institute_profile_id = $employee_details[0]['institute_profile_id'];
			
			$data =  $this->db->query("SELECT bus_no,bus_device_id FROM `client` left join bus on bus_client_profile_id=client_profile_id where client_institute_profile_id ='".$institute_profile_id."' AND bus_device_id is NOT null")->result_array();
		}
		if(isset($this->session->userdata['client']))
		{
			$client_admin = $this->session->userdata('client');
			$employee_details = $this->Client_model->employee_details($client_admin);
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			
			$data =  $this->db->query(" SELECT bus_no,bus_device_id FROM bus where bus_expiry_date = '9999-12-31' and bus_client_profile_id = '".$employee_client_profile_id."' order by bus_device_id ")->result_array();
		}
		 
		$count = count($data);

		for ($i=0; $i < $count ; $i++) { 
				$data1[] = $data[$i]['bus_device_id']; 
		}

		for ($j=0; $j < count($data1) ; $j++) { 
	
		    $res['res1'][] =	$this->db->query("SELECT prnt.* FROM gps_location_data prnt JOIN (SELECT device_id,MAX(on_day_time) as on_day_time FROM gps_location_data where device_id in ('".$data1[$j]."') GROUP BY device_id)chld ON prnt.device_id = chld.device_id AND prnt.on_day_time = chld.on_day_time")->result_array();
		
		    $device_id = $res['res1'][$j][0]['device_id'];
			$vehicle_no =  $this->getBus_no($device_id);
			$res['res1'][$j]['vehicle_no'] = $vehicle_no;

		}
		echo json_encode($res['res1']);
	}

	function getAddress($latitude,$longitude)
	{
		if(isset($this->session->userdata['client']))
		{
			$client_admin = $this->session->userdata('client');
			$employee_details = $this->Client_model->employee_details($client_admin);
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];

			$data['map_key1'] = $this->db->query("SELECT client_google_web_map_key FROM `client` where client_profile_id = '".$employee_client_profile_id."'")->row();
			$data['map_key'] = $data['map_key1']->client_google_web_map_key;
		}
		if(isset($this->session->userdata['Institute']))
		{
			$institute_admin = $this->session->userdata('Institute');
			$employee_details = $this->Institute_model->employee_details($institute_admin);
			$institute_profile_id = $employee_details[0]['institute_profile_id'];
			$data['map_key1'] = $this->db->query("SELECT client_google_web_map_key FROM `client` where client_institute_profile_id = '".$institute_profile_id."'")->result_array();
			$data['map_key'] = $data['map_key1'][0] ['client_google_web_map_key'];
		}

		// if( ini_get('allow_url_fopen') ) {
		//    print_r("allow_url_fopen is enabled. file_get_contents should work well");
		// } else {
		//     print_r("allow_url_fopen is disabled. file_get_contents would not work");
		// }die();

	    if(!empty($latitude) && !empty($longitude))
	    {
	    	$ch=curl_init();
		    
		    curl_setopt($ch,CURLOPT_URL,"https://maps.googleapis.com/maps/api/geocode/json?latlng=".trim($latitude).",".trim($longitude)."&sensor=false");
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		    $geocodeFromLatLong =curl_exec($ch);
		    curl_close($ch);

	        //Send request and receive json data by address
	        // $geocodeFromLatLong = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&sensor=false'); 
	        $output = json_decode($geocodeFromLatLong);
	        $status = $output->status;
	        // print_r($output);
	        //Get address from json data
	        $address = ($status=="OK")?$output->results[0]->formatted_address:'';
	        if(!empty($address)){
	            return $address;
	        }else{
	            // return false;
	            $ch=curl_init();
			    curl_setopt($ch,CURLOPT_URL,"https://maps.googleapis.com/maps/api/geocode/json?latlng=".trim($latitude).",".trim($longitude)."&key=".$data['map_key']."");
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			    $geocodeFromLatLong =curl_exec($ch);
			    curl_close($ch);

	            // $geocodeFromLatLong = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&key='.$data['map_key'].''); 
		        $output = json_decode($geocodeFromLatLong);
		        $status = $output->status;
		        // print_r($output);
		        //Get address from json data
		        $address = ($status=="OK")?$output->results[0]->formatted_address:'';
		        if(!empty($address))
		        {
				    return $address;
				}else
				{
				    return false;
				}
	       	}
	    }
	    else
	    {
	        return false1;   
	   	}

	}

	public function check_address($latitude,$longitude)
	{
		$res = $this->db->query("select LLA_address as address from lat_long_add where LLA_latitude='".$latitude."' and LLA_longitude='".$longitude."' order by LLA_datetime desc limit 1")->result_array();
	    return $res;
	}

	public function put_address($latitude,$longitude,$address)
	{
		$this->db->query("insert into lat_long_add (LLA_latitude,LLA_longitude,LLA_address) values ('".$latitude."','".$longitude."','".$address."')");
	    return 1;
	}

	public function view_map_table_institute()
	{			
		if(!isset($this->session->userdata['Institute']))
		{
			redirect('/');
		} 
		$institute_admin = $this->session->userdata('Institute');
		$employee_details = $this->Institute_model->employee_details($institute_admin);
		$institute_profile_id = $employee_details[0]['institute_profile_id'];
		$data =  $this->db->query("SELECT client_name as school_name,bus_no,bus_device_id FROM `client` left join bus on bus_client_profile_id=client_profile_id where client_institute_profile_id ='".$institute_profile_id."' AND bus_device_id is NOT null AND bus_expiry_date = '9999-12-31'")->result_array();
		$count = count($data);
		
		if ($count == 0) 
		{
			$institute_admin = $this->session->userdata('Institute');
			$employee_details = $this->Institute_model->employee_details($institute_admin);
			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['username'] = $institute_admin[0]['credential_username'];
			$nav['institute_name'] = $employee_details[0]['institute_name'];
			$nav['institute_logo'] = $employee_details[0]['institute_logo'];
			$nav['insti_admin'] = "tracking";

			$this->load->view('Institute/institute_header', $admin);
			$this->load->view('Map/data_not_available');
			$this->load->view('Map/map_footer',$nav);
		}
		else
		{
			for ($i=0; $i < $count ; $i++) 
			{ 
				$data1[] = $data[$i]['bus_device_id']; 		
				$school_name[] = $data[$i]['school_name']; 		
			}

			$this->session->set_userdata('bus_no_institute',$data);

			for ($j=0; $j < count($data1) ; $j++) 
			{ 
				
				$res['res1'][] = $this->db->query("SELECT prnt.* FROM gps_location_data prnt JOIN (SELECT device_id,MAX(on_day_time) as on_day_time FROM gps_location_data where device_id in ('".$data1[$j]."') GROUP BY device_id)chld ON prnt.device_id = chld.device_id AND prnt.on_day_time = chld.on_day_time")->result_array();
				
				$stop_latitude = $res['res1'][$j][0]['stop_latitude'];
				$stop_longitude = $res['res1'][$j][0]['stop_longitude'];

				$check_address = $this->check_address($stop_latitude,$stop_longitude);

				if (empty($check_address)) 
				{	
					$address =  $this->getAddress($stop_latitude,$stop_longitude);
					if ($address != '') {				
						$put_address = $this->put_address($stop_latitude,$stop_longitude,$address);
					}
				}
				else
				{
					$address = $check_address[0]['address'];
				}
			
				$device_id = $res['res1'][$j][0]['device_id'];
				$vehicle_no =  $this->getBus_no($device_id);
				$res['res1'][$j][0]['stop_longitude'] = $vehicle_no;
				$res['res1'][$j][0]['stop_latitude'] = $address;
				$res['res1'][$j]['school_name'] = $school_name[$j];

			}
		
			$institute_admin = $this->session->userdata('Institute');
			$employee_details = $this->Institute_model->employee_details($institute_admin);

			$admin['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$admin['first_name'] = $employee_details[0]['employee_first_name'];
			$admin['last_name'] = $employee_details[0]['employee_last_name'];
			$admin['email_id'] = $employee_details[0]['employee_email_id'];
			$admin['photo'] = $employee_details[0]['employee_photo'];
			$admin['username'] = $institute_admin[0]['credential_username'];
			$nav['institute_name'] = $employee_details[0]['institute_name'];
			$nav['institute_logo'] = $employee_details[0]['institute_logo'];
			$nav['insti_admin'] = "tracking";

			 $stop = 0; 
             $running = 0; 
             $gpsnotfixed = 0; 
             $gpsfixed = 0; 
             $parking = 0; 
             $idling = 0; 
             $toweing = 0; 
         
             for ($i=0; $i < count($res['res1']); $i++) 
             {
                if ($res['res1'][$i][0]['vehicle_movement_status'] == "B") {
                  $running = $running+1; 
                }elseif ($res['res1'][$i][0]['vehicle_movement_status'] == "c") {
                  $parking = $parking+1; 
                }elseif ($res['res1'][$i][0]['vehicle_movement_status'] == "d") {
                  $idling = $idling+1; 
                }elseif ($res['res1'][$i][0]['vehicle_movement_status'] == "e") {
                  $toweing = $toweing+1; 
                }else{
                  $stop = $stop+1; 
                }
                if ($res['res1'][$i][0]['gps_valid_data'] == "1") {
                  $gpsfixed = $gpsfixed+1; 
                } else {
                  $gpsnotfixed = $gpsnotfixed+1; 
                }
            }

            $res['stop'] = $stop; 
            $res['running'] = $running; 
            $res['gpsnotfixed'] = $gpsnotfixed; 
            $res['gpsfixed'] = $gpsfixed; 
            $res['parking'] = $parking; 
            $res['idling'] = $idling; 
            $res['toweing'] = $toweing; 
			
			$this->load->view('Institute/institute_header', $admin);
			$this->load->view('Map/view_map_table',$res);
			$this->load->view('Map/map_footer',$nav);	
		}
	}

	public function view_map_table_update_institute()
	{
		$institute_admin = $this->session->userdata('Institute');
		$employee_details = $this->Institute_model->employee_details($institute_admin);

		$institute_profile_id = $employee_details[0]['institute_profile_id'];
		
		$data =  $this->db->query("SELECT client_name as school_name,bus_no,bus_device_id FROM `client` left join bus on bus_client_profile_id=client_profile_id where client_institute_profile_id ='".$institute_profile_id."' AND bus_device_id is NOT null AND bus_expiry_date = '9999-12-31'")->result_array();

		$count = count($data);
		for ($i=0; $i < $count ; $i++) { 
				$data1[] = $data[$i]['bus_device_id']; 
				$school_name[] = $data[$i]['school_name']; 	
		}

		for ($j=0; $j < count($data1) ; $j++) { 
			
	    $res['res1'][] = $this->db->query("SELECT prnt.* FROM gps_location_data prnt JOIN (SELECT device_id,MAX(on_day_time) as on_day_time FROM gps_location_data where device_id in ('".$data1[$j]."') GROUP BY device_id)chld ON prnt.device_id = chld.device_id AND prnt.on_day_time = chld.on_day_time")->result_array();
		
		$stop_latitude = $res['res1'][$j][0]['stop_latitude'];
		$stop_longitude = $res['res1'][$j][0]['stop_longitude'];

		$check_address = $this->check_address($stop_latitude,$stop_longitude);

		if (empty($check_address)) 
		{	
			$address =  $this->getAddress($stop_latitude,$stop_longitude);
			if ($address != '') {				
				$put_address = $this->put_address($stop_latitude,$stop_longitude,$address);
			}
		}
		else
		{
			$address = $check_address[0]['address'];
		}

		$device_id = $res['res1'][$j][0]['device_id'];
		$vehicle_no =  $this->getBus_no($device_id);

		$res['res1'][$j][0]['stop_longitude'] = $vehicle_no;
		$res['res1'][$j][0]['stop_latitude'] = $address;
		$res['res1'][$j]['school_name'] = $school_name[$j];

		}
		echo json_encode($res);
		
	}

	public function view_all_device_institute()
	{
			if(!isset($this->session->userdata['Institute']))
			{
				redirect('/');
			} 
			
			$institute_admin = $this->session->userdata('Institute');
			$employee_details = $this->Institute_model->employee_details($institute_admin);

			$institute_profile_id = $employee_details[0]['institute_profile_id'];
			
			$datam =  $this->db->query("SELECT bus_no,bus_device_id FROM `client` left join bus on bus_client_profile_id=client_profile_id where client_institute_profile_id ='".$institute_profile_id."' AND bus_device_id is NOT null AND bus_expiry_date = '9999-12-31'")->result_array();

			$count = count($datam);
			for ($i=0; $i < $count ; $i++) { 
					$data[] = $datam[$i]['bus_device_id']; 
			}

			for ($j=0; $j < count($data) ; $j++) { 
			
				$res['res1'][] =	$this->db->query("SELECT prnt.* FROM gps_location_data prnt JOIN (SELECT device_id,MAX(on_day_time) as on_day_time FROM gps_location_data where device_id in ('".$data[$j]."') GROUP BY device_id)chld ON prnt.device_id = chld.device_id AND prnt.on_day_time = chld.on_day_time")->result_array();
			
			    $device_id = $res['res1'][$j][0]['device_id'];
				$vehicle_no =  $this->getBus_no($device_id);
				$res['res1'][$j]['vehicle_no'] = $vehicle_no;

				$stop_latitude = $res['res1'][$j][0]['stop_latitude'];
				$stop_longitude = $res['res1'][$j][0]['stop_longitude'];

				$check_address = $this->check_address($stop_latitude,$stop_longitude);

					if (empty($check_address)) 
					{	
						$address =  $this->getAddress($stop_latitude,$stop_longitude);
						if ($address != '') {				
							$put_address = $this->put_address($stop_latitude,$stop_longitude,$address);
						}
					}
					else
					{
						$address = $check_address[0]['address'];
					}
					
				$res['res1'][$j]['address'] = $address;

			    
			}
				json_encode($res);

				$res['user'] = $employee_details[0]['employee_pri_mobile_number'];
				$res['first_name'] = $employee_details[0]['employee_first_name'];
				$res['last_name'] = $employee_details[0]['employee_last_name'];
				$res['email_id'] = $employee_details[0]['employee_email_id'];
				$res['photo'] = $employee_details[0]['employee_photo'];
				$res['username'] = $institute_admin[0]['credential_username'];
				$res['institute_name'] = $employee_details[0]['institute_name'];
				$res['institute_logo'] = $employee_details[0]['institute_logo'];
				$res['insti_admin'] = "tracking_all";


			$res['map_key1'] = $this->db->query("SELECT client_google_web_map_key FROM `client` where client_institute_profile_id = '".$institute_profile_id."'")->result_array();
			$res['map_key'] = $res['map_key1'][0] ['client_google_web_map_key'];
			
			$this->load->view('Map/all_device_map_institute',$res);

	}

	public function near_by()
	{
		if(!isset($this->session->userdata['Institute']))
		{
			redirect('/');
		} 
		
		$institute_admin = $this->session->userdata('Institute');
		$employee_details = $this->Institute_model->employee_details($institute_admin);
		$institute_profile_id = $employee_details[0]['institute_profile_id'];
		
		$datam =  $this->db->query("SELECT bus_no,bus_device_id FROM `client` left join bus on bus_client_profile_id=client_profile_id where client_institute_profile_id ='".$institute_profile_id."' AND bus_device_id is NOT null AND bus_expiry_date = '9999-12-31'")->result_array();
		$count = count($datam);
		for ($i=0; $i < $count ; $i++) { 
				$data[] = $datam[$i]['bus_device_id']; 
		}

		for ($j=0; $j < count($data) ; $j++) { 
		
			$res['res1'][] =	$this->db->query("SELECT prnt.* FROM gps_location_data prnt JOIN (SELECT device_id,MAX(on_day_time) as on_day_time FROM gps_location_data where device_id in ('".$data[$j]."') GROUP BY device_id)chld ON prnt.device_id = chld.device_id AND prnt.on_day_time = chld.on_day_time")->result_array();
		
		    $device_id = $res['res1'][$j][0]['device_id'];
			$vehicle_no =  $this->getBus_no($device_id);
			$res['res1'][$j]['vehicle_no'] = $vehicle_no;

			$stop_latitude = $res['res1'][$j][0]['stop_latitude'];
			$stop_longitude = $res['res1'][$j][0]['stop_longitude'];

			$check_address = $this->check_address($stop_latitude,$stop_longitude);

				if (empty($check_address)) 
				{	
					$address =  $this->getAddress($stop_latitude,$stop_longitude);
					if ($address != '') {				
						$put_address = $this->put_address($stop_latitude,$stop_longitude,$address);
					}
				}
				else
				{
					$address = $check_address[0]['address'];
				}
				
			$res['res1'][$j]['address'] = $address;   
		}

			$res['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$res['first_name'] = $employee_details[0]['employee_first_name'];
			$res['last_name'] = $employee_details[0]['employee_last_name'];
			$res['email_id'] = $employee_details[0]['employee_email_id'];
			$res['photo'] = $employee_details[0]['employee_photo'];
			$res['username'] = $institute_admin[0]['credential_username'];
			$res['institute_name'] = $employee_details[0]['institute_name'];
			$res['institute_logo'] = $employee_details[0]['institute_logo'];
			$res['insti_admin'] = "tracking_all";

		$res['map_key1'] = $this->db->query("SELECT client_google_web_map_key FROM `client` where client_institute_profile_id = '".$institute_profile_id."'")->result_array();
		$res['map_key'] = $res['map_key1'][0] ['client_google_web_map_key'];
		
		$this->load->view('Map/near_by',$res);
	}

	public function near_by_client()
	{
		if(!isset($this->session->userdata['client']))
		{
			redirect('/');
		} 

		$client_admin = $this->session->userdata('client');
		$employee_details = $this->Client_model->employee_details($client_admin);
		$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];

		$datam =  $this->db->query("SELECT bus_no,bus_device_id FROM bus where bus_expiry_date = '9999-12-31' and bus_client_profile_id = '".$employee_client_profile_id."' ")->result_array();

		$count = count($datam);
		for ($i=0; $i < $count ; $i++) 
		{ 
			$data1[] = $datam[$i]['bus_device_id']; 
		}

		for ($j=0; $j < count($data1) ; $j++) { 
		
			$res['res1'][] = $this->db->query("SELECT prnt.* FROM gps_location_data prnt JOIN (SELECT device_id,MAX(on_day_time) as on_day_time FROM gps_location_data where device_id in ('".$data1[$j]."') GROUP BY device_id)chld ON prnt.device_id = chld.device_id AND prnt.on_day_time = chld.on_day_time")->result_array();
		
		    $device_id = $res['res1'][$j][0]['device_id'];
			$vehicle_no =  $this->getBus_no($device_id);
			$res['res1'][$j]['vehicle_no'] = $vehicle_no;

			$stop_latitude = $res['res1'][$j][0]['stop_latitude'];
			$stop_longitude = $res['res1'][$j][0]['stop_longitude'];

			$check_address = $this->check_address($stop_latitude,$stop_longitude);

				if (empty($check_address)) 
				{	
					$address =  $this->getAddress($stop_latitude,$stop_longitude);
					if ($address != '') {				
						$put_address = $this->put_address($stop_latitude,$stop_longitude,$address);
					}
				}
				else
				{
					$address = $check_address[0]['address'];
				}
			$res['res1'][$j]['address'] = $address;
		}

		$client_admin = $this->session->userdata('client');
		$employee_details = $this->Client_model->employee_details($client_admin);
		$res['user'] = $employee_details[0]['employee_pri_mobile_number'];
		$res['user_profile_id'] = $employee_details[0]['employee_profile_id'];
		$res['photo'] = $employee_details[0]['employee_photo'];
		$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
		$res['first_name'] = $employee_details[0]['employee_first_name'];
		$res['last_name'] = $employee_details[0]['employee_last_name'];
		$res['email_id'] = $employee_details[0]['employee_email_id'];
		$res['username'] = $client_admin[0]['credential_username'];
		$res['client_name'] = $employee_details[0]['client_name'];
		$res['client_logo'] = $employee_details[0]['client_logo'];
		$res['insti_admin'] = 'tracking';

		$res['map_key1'] = $this->db->query("SELECT client_google_web_map_key FROM `client` where client_profile_id = '".$employee_client_profile_id."'")->row();
		$res['map_key'] = $res['map_key1']->client_google_web_map_key;

		
		$this->load->view('Map/near_by_client',$res);

	}
	function playback()
	{
		if(isset($this->session->userdata['Institute']))
		{
			$institute_admin = $this->session->userdata('Institute');
			$employee_details = $this->Institute_model->employee_details($institute_admin);
			$institute_profile_id = $employee_details[0]['institute_profile_id'];
			$res['vehicle'] =  $this->db->query("SELECT bus_no,bus_device_id FROM `client` left join bus on bus_client_profile_id=client_profile_id where client_institute_profile_id ='".$institute_profile_id."' AND bus_device_id is NOT null")->result_array();
			$res['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$res['first_name'] = $employee_details[0]['employee_first_name'];
			$res['last_name'] = $employee_details[0]['employee_last_name'];
			$res['email_id'] = $employee_details[0]['employee_email_id'];
			$res['photo'] = $employee_details[0]['employee_photo'];
			$res['username'] = $institute_admin[0]['credential_username'];
			$res['name'] = $employee_details[0]['institute_name'];
			$res['logo'] = $employee_details[0]['institute_logo'];
			$res['insti_admin'] = "tracking_all";
			$res['map_key1'] = $this->db->query("SELECT client_google_web_map_key FROM `client` where client_institute_profile_id = '".$institute_profile_id."'")->result_array();
			$res['map_key'] = $res['map_key1'][0] ['client_google_web_map_key'];
		} 
		if(isset($this->session->userdata['client']))
		{
			$client_admin = $this->session->userdata('client');
			$employee_details = $this->Client_model->employee_details($client_admin);
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			$res['vehicle'] =  $this->db->query("SELECT bus_no,bus_device_id FROM bus where bus_expiry_date = '9999-12-31' and bus_client_profile_id = '".$employee_client_profile_id."' ")->result_array();
			$res['user'] = $employee_details[0]['employee_pri_mobile_number'];
			$res['user_profile_id'] = $employee_details[0]['employee_profile_id'];
			$res['photo'] = $employee_details[0]['employee_photo'];
			$employee_client_profile_id = $employee_details[0]['employee_client_profile_id'];
			$res['first_name'] = $employee_details[0]['employee_first_name'];
			$res['last_name'] = $employee_details[0]['employee_last_name'];
			$res['email_id'] = $employee_details[0]['employee_email_id'];
			$res['username'] = $client_admin[0]['credential_username'];
			$res['name'] = $employee_details[0]['client_name'];
			$res['logo'] = $employee_details[0]['client_logo'];
			$res['insti_admin'] = 'tracking';
			$res['map_key1'] = $this->db->query("SELECT client_google_web_map_key FROM `client` where client_profile_id = '".$employee_client_profile_id."'")->row();
			$res['map_key'] = $res['map_key1']->client_google_web_map_key;
		}
			$this->session->set_userdata('res',$res);
			$this->load->view('Map/playback',$res);
	}

	public function playback1()
	{
		$res = $this->session->userdata('res');

		$res['start'] = $this->input->post('start');
		$res['end'] = $this->input->post('end');
		$report['bus'] = $this->input->post('device_id');
		if ($res['start'] == $res['end']) 
		{
			$report['from'] = date("Y-m-d", strtotime($res['start'])).' '.'00:00:00';
			$report['to'] = date("Y-m-d", strtotime($res['end'])).' '.'23:59:59';
		}
		else
		{
			$report['from'] = date("Y-m-d", strtotime($res['start'])).' '.'00:00:00';
			$report['to'] = date("Y-m-d", strtotime($res['end'])).' '.'00:00:00';
		}

		$res['lat_lon_data'] = $this->Reports_model->history_report_details($report);

		$res['bus_device_id'] = $report['bus'];
		$res['bus_no'] = $this->db->query("SELECT bus_no FROM bus where bus_device_id = '".$report['bus']."'")->row()->bus_no;
		// echo "<pre>"; print_r($res);die();
	    $this->session->set_userdata('res1', $res);
		redirect('Tracking/playback2');
	}

	public function playback2()
	{
		$res = $this->session->userdata('res1');
		$this->load->view('Map/playback1',$res);
	}
	// public function summary()
	// {
	// 	if(isset($this->session->userdata['Institute']))
	// 	{
	// 		$institute_admin = $this->session->userdata('Institute');
	// 		$employee_details = $this->Institute_model->employee_details($institute_admin);
	// 		$institute_profile_id = $employee_details[0]['institute_profile_id'];
	// 		$res['vehicle'] =  $this->db->query("SELECT bus_no,bus_device_id FROM `client` left join bus on bus_client_profile_id=client_profile_id where client_institute_profile_id ='".$institute_profile_id."' AND bus_device_id is NOT null")
}