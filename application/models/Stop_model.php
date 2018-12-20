<?php
	class Stop_model extends CI_Model
	{
		function fetch_route($ic_or_client_profile_id)
		{
			if (isset($this->session->userdata['client'])) {
				return $this->db->query("SELECT route_name,route_no FROM route where route_client_profile_id= ".$ic_or_client_profile_id." GROUP BY 1,2 ORDER BY 2")->result_array();
        	}elseif (isset($this->session->userdata['Institute'])) {
				return $this->db->query("SELECT route_name,route_no FROM route where route_client_profile_id IN (select client_profile_id from client where client_institute_profile_id = ".$ic_or_client_profile_id.") GROUP BY 1,2 ORDER BY 2")->result_array();
        	}
		}

		function add_stop($stop_details)
		{
			$this->db->insert('stop', $stop_details);
		}

		function stop_details($data1)
		{
			$route_id = $data1['route_id'];
			$route_type = $data1['route_type'];
			$query = 'SELECT * FROM stop  JOIN (select route_id FROM route where route_no = '.$route_id.' and route_type = '.$route_type.') as routes on stop_route_id = routes.route_id';
			$result = $this->db->query($query)->result_array();
			return $result;
		}

		function stop_details_with_route_type_1($data1)
		{
			$route_id = $data1['route_id'];
			$route_type = $data1['route_type'];
			$query = $this->db->query('SELECT * FROM stop  JOIN (select route_id FROM route where route_no = '.$route_id.' and route_type = 1) as routes on stop_route_id = routes.route_id
				ORDER BY stop_index');
			return $query->result_array();
		}

		function stop_details_with_route_type_2($data1)
		{
			$route_id = $data1['route_id'];
			$route_type = $data1['route_type'];
			$query = $this->db->query('SELECT * FROM stop  JOIN (select route_id FROM route where route_no = '.$route_id.' and route_type = 2) as routes on stop_route_id = routes.route_id ORDER BY stop_index DESC '
				);
				return $query->result_array();
		}

		function delete_stop_details($route_from_id,$route_to_id,$route_client_profile_id)
		{
			return $this->db->query("DELETE from stop where stop_route_id IN(".$route_from_id.",".$route_to_id.") and stop_client_profile_id = ".$route_client_profile_id."");
		}

		function stop_route_details($route)
		{
			return $this->db->query("select type1_route_no as route_no,route_name,type1_route_id,type1_route_start_time,type1_route_end_time,type2_route_id,type2_route_start_time,type2_route_end_time from 
 								(SELECT route_name,route_no as type1_route_no,route_id as type1_route_id,route_start_time as type1_route_start_time,route_end_time as type1_route_end_time FROM `route` WHERE route_expiry_date ='9999-12-31' and route_type=1) as type1,
								(SELECT route_no as type2_route_no,route_id as type2_route_id,route_start_time as type2_route_start_time,route_end_time as type2_route_end_time FROM `route` WHERE route_expiry_date ='9999-12-31' and route_type=2) as type2
								where type2_route_no=type1_route_no and type1_route_no=".$route['route_no']."")->result_array();
		}
	}
 ?>