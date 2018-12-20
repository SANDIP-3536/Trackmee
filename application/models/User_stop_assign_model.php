<?php
 class User_stop_assign_model extends CI_Model
 {
 	function fetch_route($bus_id)
 	{
 		return $this->db->query("SELECT route_name,route_no FROM `driver_bus_route_assgn` join route on DBR_route_no = route_no where DBR_bus_id =".$bus_id." and DBR_expiry_date = '9999-12-31' group by route_name, route_no")->result_array();
 	}

 	function fetch_bus($employee_client_profile_id)
 	{
 		if (isset($this->session->userdata['client'])) {
			return$this->db->query('SELECT * FROM bus where bus_client_profile_id ="'.$employee_client_profile_id.'" GROUP BY bus_no ORDER BY bus_no')->result_array();
    	}elseif (isset($this->session->userdata['Institute'])) {
			return $this->db->query("SELECT * FROM `bus` where bus_client_profile_id IN (select client_profile_id from client where client_institute_profile_id = ".$employee_client_profile_id.")")->result_array();
    	}
 		
 	}

 	function stop_details($data1)
	{
		$route_id = $data1['route_id'];
		$route_type = $data1['route_type'];

		$query = $this->db->query('SELECT * FROM stop  JOIN (select route_id FROM route where route_no = '.$route_id.' and route_type = '.$route_type.') as routes on stop_route_id = routes.route_id');
		
		return $query->result_array();
	}

	function fetch_user($employee_client_profile_id)
	{
		if (isset($this->session->userdata['client'])) {
			return $this->db->query('SELECT * FROM `user` where user_profile_id not in (select SS_user_profile_id from user_stop_assgn where SS_expiry_date = "9999-12-31" and SS_client_profile_id = '.$employee_client_profile_id.') and  user_expiry_date = "9999-12-31" and user_client_profile_id ='.$employee_client_profile_id.'')->result_array();
		}elseif (isset($this->session->userdata['Institute'])) {
			return $this->db->query('SELECT * FROM `user` where user_profile_id not in (select SS_user_profile_id from user_stop_assgn where SS_expiry_date = "9999-12-31" and SS_client_profile_id IN (select client_profile_id from client where client_institute_profile_id = '.$employee_client_profile_id.') ) and  user_expiry_date = "9999-12-31" and user_client_profile_id IN (select client_profile_id from client where client_institute_profile_id ='.$employee_client_profile_id.')')->result_array();
		}
	}

	function fetch_user_stop($employee_client_profile_id)
	{
		return $this->db->query('SELECT * FROM `user` where user_profile_id in (select SS_user_profile_id from user_stop_assgn where SS_expiry_date = "9999-12-31") and  user_expiry_date = "9999-12-31" and user_client_profile_id ='.$employee_client_profile_id.'')->result_array();
	}

	function add_user_stop($data2)
	{
		$this->db->insert('user_stop_assgn',$data2);
		return 0;
	}

	function update_user_stop($data1)
	{
		$this->db->set($data1)->where('SS_user_profile_id',$data1['SS_user_profile_id'])->update('user_stop_assgn');
		return 0;
	}

	function fetch_stop($id)
	{
		$data = $this->db->select('stop_name')->where('stop_id',$id)->get('stop')->result_array();
		return $data;
	}

	function fetch_stop_id($stop_name)
	{
		return $this->db->select('stop_id')->where('stop_name',$stop_name['stop_name'])->get('stop')->result_array();
	}
	function fetch_user_stop_assigned($employee_client_profile_id)
	{
		return $this->db->query('SELECT user_first_name,user_middle_name,user_last_name,bus_no,stop_name,SS_user_profile_id FROM `user_stop_assgn` JOIN user ON SS_user_profile_id = user_profile_id left join stop on SS_type_1_stop_id = stop_id join bus on SS_bus_id = bus_id WHERE SS_expiry_date = "9999-12-31" AND SS_client_profile_id = '.$employee_client_profile_id.'')->result_array();
	}
 } 

 ?>