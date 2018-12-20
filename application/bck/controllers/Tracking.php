<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Tracking extends CI_Controller
	{
		
	public function index($device_id = 0)
	{

		if(isset($this->session->userdata['school']))
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

		    $res =	$this->db->query("SELECT prnt.* FROM gps_location_data prnt JOIN (SELECT device_id,MAX(on_day_time) as on_day_time FROM gps_location_data where device_id in ('".$device_selected."') GROUP BY device_id)chld ON prnt.device_id = chld.device_id AND prnt.on_day_time = chld.on_day_time")->result_array();
	
			// print_r($res);die();
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
		    $data['vehicle_no'] =  $this->getBus_no($data['device_id']);
			// $data['address'] =  $this->getAddress($data['lat'],$data['lon']);

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

			// print_r($address);die();
		    // json_encode($data);
		    // curl_close($ch);

		    if(isset($this->session->userdata['school']))
			{
				
			    $school_admin = $this->session->userdata('school');
				$data['user'] = $school_admin[0]['employee_pri_mobile_number'];
				$data['user_profile_id'] = $school_admin[0]['employee_profile_id'];
				$data['photo'] = $school_admin[0]['employee_photo'];
				$data['first_name'] = $school_admin[0]['employee_first_name'];
				$data['last_name'] = $school_admin[0]['employee_last_name'];
				$data['email_id'] = $school_admin[0]['employee_email_id'];
				$data['username'] = $school_admin[0]['credential_username'];
				$data['AY_name'] = $school_admin[0]['AY_name'];
				$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
				$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
				$data['functionality'] = $this->School_model->fetch_functionality($school);

				$data['school_name'] = $school_admin[0]['school_name'];
				$data['school_logo'] = $school_admin[0]['school_logo'];
				$data['map'] = 'map';

				$data['map_key1'] = $this->db->query("SELECT school_google_web_map_key FROM `school` where school_profile_id = '".$employee_school_profile_id."'")->row();
				$data['map_key'] = $data['map_key1']->school_google_web_map_key;
				
				$this->load->view('Map/map',$data);
			}	
			if(isset($this->session->userdata['Institute']))
			{
				$institute_admin = $this->session->userdata('Institute');
				$institute_profile_id = $institute_admin[0]['institute_profile_id'];
				$data['user'] = $institute_admin[0]['employee_pri_mobile_number'];
				$data['photo'] = $institute_admin[0]['employee_photo'];
				$data['first_name'] = $institute_admin[0]['employee_first_name'];
				$data['last_name'] = $institute_admin[0]['employee_last_name'];
				$data['email_id'] = $institute_admin[0]['employee_email_id'];
				$data['username'] = $institute_admin[0]['credential_username'];
				$data['institute_name'] = $institute_admin[0]['institute_name'];
				$data['institute_logo'] = $institute_admin[0]['institute_logo'];

				$data['map_key1'] = $this->db->query("SELECT school_google_web_map_key FROM `school` where school_institute_profile_id = '".$institute_profile_id."'")->result_array();
				$data['map_key'] = $data['map_key1'][0]['school_google_web_map_key'];
				
				$this->load->view('Map/map_institute',$data);
			} 

	}



	public function route_curl()
	{
	    $device_selected=$this->session->userdata('device_selected');
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
	  	$data['vehicle_no'] =  $this->getBus_no($data['device_id']);
		
	    echo json_encode($data);
	    
	}	

	public function view_map_table()
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
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			
			$data =  $this->db->query(" SELECT bus_no,bus_device_id FROM bus where bus_expiry_date = '9999-12-31' and bus_school_profile_id = '".$employee_school_profile_id."' ")->result_array();
			$count = count($data);
			
			if ($count == 0) {
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
				$nav['map'] = 'map';
			
				$this->load->view('Map/map_header', $admin);
				$this->load->view('Map/data_not_available');
				$this->load->view('Map/map_footer',$nav);						
				}
			else{

			for ($i=0; $i < $count ; $i++) { 
					$data1[] = $data[$i]['bus_device_id']; 		
			}

			$this->session->set_userdata('bus_no',$data);

			for ($j=0; $j < count($data1) ; $j++) { 
				
			$res['res1'][] =	$this->db->query("SELECT prnt.* FROM gps_location_data prnt JOIN (SELECT device_id,MAX(on_day_time) as on_day_time FROM gps_location_data where device_id in ('".$data1[$j]."') GROUP BY device_id)chld ON prnt.device_id = chld.device_id AND prnt.on_day_time = chld.on_day_time")->result_array();
			// print_r($res);

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
			// die();
			
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
			$nav['map'] = 'map';
			
			$this->load->view('Map/map_header', $admin);
			$this->load->view('Map/view_map_table',$res);
			$this->load->view('Map/map_footer',$nav);	
		}
	}
	public function view_map_table_update()
	{

			$school_admin = $this->session->userdata('school');
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];

			$data =  $this->db->query("SELECT bus_no,bus_device_id FROM bus where bus_expiry_date = '9999-12-31' and bus_school_profile_id = '".$employee_school_profile_id."' ")->result_array();
			$count = count($data);
			for ($i=0; $i < $count ; $i++) { 
					$data1[] = $data[$i]['bus_device_id']; 
			}

			for ($j=0; $j < count($data1) ; $j++) { 
				
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

		    echo json_encode($res);

			}

			// $this->load->view('Map/view_map_table',$res);	
	}

	

	public function address()
	{
		$data1['lat'] = $_POST['lat'];
	    $data1['lon'] = $_POST['lon'];

		// $data['address'] =  $this->getAddress($data1['lat'],$data1['lon']);

		$check_address = $this->check_address($data1['lat'],$data1['lon']);

			if (empty($check_address)) 
			{	
				$data['address'] =  $this->getAddress($data1['lat'],$data1['lon']);

				if ($data['address'] != '') {
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
			if(!isset($this->session->userdata['school']))
			{
				redirect('/');
			} 
			if(isset($this->session->userdata['direct'])){
				$res['direct'] = $this->session->userdata('direct');
			}
			else{
				$res['direct'] = 1;
			}

			$school_admin = $this->session->userdata('school');
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
		
			$datam =  $this->db->query(" SELECT bus_no,bus_device_id FROM bus where bus_expiry_date = '9999-12-31' and bus_school_profile_id = '".$employee_school_profile_id."' order by bus_device_id")->result_array();
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
			
		    $school_admin = $this->session->userdata('school');
			$res['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$res['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$res['photo'] = $school_admin[0]['employee_photo'];
			$res['first_name'] = $school_admin[0]['employee_first_name'];
			$res['last_name'] = $school_admin[0]['employee_last_name'];
			$res['email_id'] = $school_admin[0]['employee_email_id'];
			$res['username'] = $school_admin[0]['credential_username'];
			$res['AY_name'] = $school_admin[0]['AY_name'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$res['functionality'] = $this->School_model->fetch_functionality($school);

			$res['school_name'] = $school_admin[0]['school_name'];
			$res['school_logo'] = $school_admin[0]['school_logo'];
			$res['map'] = 'map';

			$res['map_key1'] = $this->db->query("SELECT school_google_web_map_key FROM `school` where school_profile_id = '".$employee_school_profile_id."'")->row();
			// $res['map_key'] = $res['map_key1'][0];
			$res['map_key'] = $res['map_key1']->school_google_web_map_key;

			$this->load->view('Map/all_device_map',$res);

	}

	public function last_record()
	{
		if(isset($this->session->userdata['Institute']))
		{
			$institute_admin = $this->session->userdata('Institute');
			$institute_profile_id = $institute_admin[0]['institute_profile_id'];
			
			$data =  $this->db->query(" SELECT bus.bus_no,bus.bus_device_id FROM bus JOIN school ON school.school_profile_id = bus.bus_school_profile_id where bus_expiry_date = '9999-12-31' AND school.school_institute_profile_id = '".$institute_profile_id."' ")->result_array();
			
		}
		if(isset($this->session->userdata['school']))
		{
			$school_admin = $this->session->userdata('school');
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			
			$data =  $this->db->query(" SELECT bus_no,bus_device_id FROM bus where bus_expiry_date = '9999-12-31' and bus_school_profile_id = '".$employee_school_profile_id."' order by bus_device_id ")->result_array();
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
		if(isset($this->session->userdata['school']))
		{
			$school_admin = $this->session->userdata('school');
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$data['map_key1'] = $this->db->query("SELECT school_google_web_map_key FROM `school` where school_profile_id = '".$employee_school_profile_id."'")->row();
			$data['map_key'] = $data['map_key1']->school_google_web_map_key;
		}
		if(isset($this->session->userdata['Institute']))
		{
			$institute_admin = $this->session->userdata('Institute');
			$institute_profile_id = $institute_admin[0]['institute_profile_id'];
			$data['map_key1'] = $this->db->query("SELECT school_google_web_map_key FROM `school` where school_institute_profile_id = '".$institute_profile_id."'")->result_array();
			$data['map_key'] = $data['map_key1'][0] ['school_google_web_map_key'];
		}

		// if( ini_get('allow_url_fopen') ) {
		//    print_r("allow_url_fopen is enabled. file_get_contents should work well");
		// } else {
		//     print_r("allow_url_fopen is disabled. file_get_contents would not work");
		// }die();

	    if(!empty($latitude) && !empty($longitude))
	    {
	    	$ch=curl_init();
		    
		    curl_setopt($ch,CURLOPT_URL,"http://maps.googleapis.com/maps/api/geocode/json?latlng=".trim($latitude).",".trim($longitude)."&sensor=false");
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		    $geocodeFromLatLong =curl_exec($ch);
		    curl_close($ch);

	        //Send request and receive json data by address
	        // $geocodeFromLatLong = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&sensor=false'); 
	        $output = json_decode($geocodeFromLatLong);
	        $status = $output->status;
	        // print_r($output);
	        //Get address from json data
	        $address = ($status=="OK")?$output->results[1]->formatted_address:'';
	        if(!empty($address)){
	            return $address;
	        }else{
	            // return false;
	            $ch=curl_init();
			    curl_setopt($ch,CURLOPT_URL,"http://maps.googleapis.com/maps/api/geocode/json?latlng=".trim($latitude).",".trim($longitude)."&key=".$data['map_key']."");
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			    $geocodeFromLatLong =curl_exec($ch);
			    curl_close($ch);

	            // $geocodeFromLatLong = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&key='.$data['map_key'].''); 
		        $output = json_decode($geocodeFromLatLong);
		        $status = $output->status;
		        //Get address from json data
		        $address = ($status=="OK")?$output->results[1]->formatted_address:'';
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
			$institute_profile_id = $institute_admin[0]['institute_profile_id'];
			
			$data =  $this->db->query(" SELECT bus.bus_no,bus.bus_device_id,school.school_name FROM bus JOIN school ON school.school_profile_id = bus.bus_school_profile_id where bus_expiry_date = '9999-12-31' AND school.school_institute_profile_id = '".$institute_profile_id."' ")->result_array();
			$count = count($data);
			// print_r($data);die();
			
			if ($count == 0) {
				$institute_admin = $this->session->userdata('Institute');
				$admin['user'] = $institute_admin[0]['employee_pri_mobile_number'];
				$admin['photo'] = $institute_admin[0]['employee_photo'];
				$admin['first_name'] = $institute_admin[0]['employee_first_name'];
				$admin['last_name'] = $institute_admin[0]['employee_last_name'];
				$admin['email_id'] = $institute_admin[0]['employee_email_id'];
				$admin['username'] = $institute_admin[0]['credential_username'];
				$nav['institute_name'] = $institute_admin[0]['institute_name'];
				$nav['institute_logo'] = $institute_admin[0]['institute_logo'];

				$this->load->view('Institute/institute_header', $admin);
				$this->load->view('Map/data_not_available');
				$this->load->view('School/school_footer',$nav);
			
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
				
				$admin['user'] = $institute_admin[0]['employee_pri_mobile_number'];
				$admin['photo'] = $institute_admin[0]['employee_photo'];
				$admin['first_name'] = $institute_admin[0]['employee_first_name'];
				$admin['last_name'] = $institute_admin[0]['employee_last_name'];
				$admin['email_id'] = $institute_admin[0]['employee_email_id'];
				$admin['username'] = $institute_admin[0]['credential_username'];
				$nav['institute_name'] = $institute_admin[0]['institute_name'];
				$nav['institute_logo'] = $institute_admin[0]['institute_logo'];
				
				$this->load->view('Institute/institute_header', $admin);
				$this->load->view('Map/view_map_table',$res);
				$this->load->view('School/school_footer',$nav);
			}
	}

	public function view_map_table_update_institute()
	{
			$institute_admin = $this->session->userdata('Institute');
			$institute_profile_id = $institute_admin[0]['institute_profile_id'];
			
			$data =  $this->db->query(" SELECT bus.bus_no,bus.bus_device_id FROM bus JOIN school ON school.school_profile_id = bus.bus_school_profile_id where bus_expiry_date = '9999-12-31' AND school.school_institute_profile_id = '".$institute_profile_id."' ")->result_array();
			$count = count($data);
			for ($i=0; $i < $count ; $i++) { 
					$data1[] = $data[$i]['bus_device_id']; 
					$school_name[] = $data[$i]['school_name']; 	
			}

			for ($j=0; $j < count($data1) ; $j++) { 
				
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
			$res['res1'][$j]['school_name'] = $school_name[$j];

			echo json_encode($res);
			}
			
	}

	public function view_all_device_institute()
	{
			if(!isset($this->session->userdata['Institute']))
			{
				redirect('/');
			} 
			
			$institute_admin = $this->session->userdata('Institute');
			$institute_profile_id = $institute_admin[0]['institute_profile_id'];
			
			$datam =  $this->db->query(" SELECT bus.bus_no,bus.bus_device_id FROM bus JOIN school ON school.school_profile_id = bus.bus_school_profile_id where bus_expiry_date = '9999-12-31' AND school.school_institute_profile_id = '".$institute_profile_id."' ")->result_array();
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

				json_encode($res);
			    
			}
			// print_r($res['res1']);die();

		   $institute_admin = $this->session->userdata('Institute');
				
				$res['user'] = $institute_admin[0]['employee_pri_mobile_number'];
				$res['photo'] = $institute_admin[0]['employee_photo'];
				$res['first_name'] = $institute_admin[0]['employee_first_name'];
				$res['last_name'] = $institute_admin[0]['employee_last_name'];
				$res['email_id'] = $institute_admin[0]['employee_email_id'];
				$res['username'] = $institute_admin[0]['credential_username'];
				$res['institute_name'] = $institute_admin[0]['institute_name'];
				$res['institute_logo'] = $institute_admin[0]['institute_logo'];

			$res['map_key1'] = $this->db->query("SELECT school_google_web_map_key FROM `school` where school_institute_profile_id = '".$institute_profile_id."'")->result_array();
			$res['map_key'] = $res['map_key1'][0] ['school_google_web_map_key'];
			// print_r($res['map_key']);
			
			$this->load->view('Map/all_device_map_institute',$res);

	}
}
?>