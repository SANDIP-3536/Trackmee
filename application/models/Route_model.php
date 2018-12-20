<?php
 class Route_model extends CI_Model
 {

 	function add_route($route1)
 	{
 		$this->db->insert('route', $route1);
 		$query = $this->db->query('Select * from route ORDER BY route_id DESC limit 1');
		$result = $query->result_array();
		return $result;
 	}

 	function add_second_route($route2)
 	{		
 		$this->db->insert('route',$route2);
 		$route_no = $route2['route_no'];
 		$this->db->query("update route set route_no = $route_no where route_id = $route_no");
 		return 0;
 	}

 	function fetch_route($employee_client_profile_id)
 	{
 		if (isset($this->session->userdata['client'])) {
				$query = $this->db->query("select type1_route_no as route_no,route_name,type1_route_id,type1_route_start_time,type1_route_end_time,type2_route_id,type2_route_start_time,type2_route_end_time,client_name from 
 								(SELECT route_name,route_no as type1_route_no,route_id as type1_route_id,route_start_time as type1_route_start_time,route_end_time as type1_route_end_time,route_client_profile_id FROM `route` WHERE route_expiry_date ='9999-12-31' AND route_client_profile_id = ".$employee_client_profile_id." and route_type=1) as type1,
								(SELECT route_no as type2_route_no,route_id as type2_route_id,route_start_time as type2_route_start_time,route_end_time as type2_route_end_time,route_client_profile_id FROM `route` WHERE route_expiry_date ='9999-12-31' AND route_client_profile_id = ".$employee_client_profile_id." and route_type=2) as type2
								join client on route_client_profile_id = client_profile_id where type2_route_no=type1_route_no");
		 		$result = $query->result_array();
				return $result;
        	}elseif (isset($this->session->userdata['Institute'])) {
	 			$query = $this->db->query("select type1_route_no as route_no,route_name,type1_route_id,type1_route_start_time,type1_route_end_time,type2_route_id,type2_route_start_time,type2_route_end_time,client_name from 
	 								(SELECT route_name,route_no as type1_route_no,route_id as type1_route_id,route_start_time as type1_route_start_time,route_end_time as type1_route_end_time,route_client_profile_id FROM `route` WHERE route_expiry_date ='9999-12-31' AND route_client_profile_id IN (select client_profile_id from client where client_institute_profile_id = ".$employee_client_profile_id.") and route_type=1) as type1,
									(SELECT route_no as type2_route_no,route_id as type2_route_id,route_start_time as type2_route_start_time,route_end_time as type2_route_end_time,route_client_profile_id FROM `route` WHERE route_expiry_date ='9999-12-31' AND route_client_profile_id IN (select client_profile_id from client where client_institute_profile_id = ".$employee_client_profile_id.") and route_type=2) as type2
									join client on route_client_profile_id = client_profile_id where type2_route_no=type1_route_no");
		 		$result = $query->result_array();
				return $result;
        	}
 	}

 	function fetch_route_towards_client($data)
 	{
 		return $this->db->query("SELECT * FROM route where route_type = '1' AND route_no =".$data['route_no']."")->result_array();
 	}

 	function fetch_route_towards_home($data)
 	{
 		return $this->db->query("SELECT * FROM route where route_type = '2' AND route_no =".$data['route_no']."")->result_array();
 	}


 	function update_route($route1)
 	{
 		$this->db->set($route1)->where('route_id',$route1['route_id'])->update('route');
 	}

 	function update_second_route($route2)
 	{		
 		$this->db->set($route2)->where('route_id',$route2['route_id'])->update('route');
 		return 0;
 	}

 	function disable_route($route_no){
 		$this->db->set('route_expiry_date',date('Y-m-d'))->where('route_no', $route_no)->update('route');
 		return 0;
 	}

 	function enable_route($route_no){
 		$this->db->set('route_expiry_date', '9999-12-31')->where('route_no', $route_no)->update('route');
 		return 0;
 	}
 } 

 ?>