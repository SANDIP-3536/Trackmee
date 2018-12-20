<?php
 class Geofence_model extends CI_Model
 {

 	function add_geofence($geofence)
 	{
 		$this->db->insert('geofence', $geofence);
 		return 0;
 	}

 	function fetch_geofence($employee_client_profile_id)
 	{
 		if (isset($this->session->userdata['client'])) {
			return $this->db->select('geofence.*, bus_no,client_name')->from('geofence')->join('bus','bus_id = geofence_bus_no')->join('client','client_profile_id = geofence_client_profile_id')->where('geofence_client_profile_id',$employee_client_profile_id)->get()->result_array();
    	}elseif (isset($this->session->userdata['Institute'])) {
			return $this->db->query("SELECT geofence.*, bus_no,client_name FROM geofence join bus on bus_id = geofence_bus_no join client on client_profile_id = geofence_client_profile_id where geofence_client_profile_id IN (select client_profile_id from client where client_institute_profile_id = ".$employee_client_profile_id.")")->result_array();
    	}

 	}

 	function fetch_bus($employee_client_profile_id)
 	{
 		return $this->db->where('bus_client_profile_id',$employee_client_profile_id)->where('bus_expiry_date','9999-12-31')->get('bus')->result_array();
 	}

 	function update_route($route1)
 	{
 		$this->db->set($route1)->where('route_id',$route1['route_id'])->update('route');
 	}

 	function disable_geofence($geofence_no){
 		// $this->db->where('geofence_id', $geofence_no)->delete('geofence');
 		$this->db->set('geofence_expiry_date',date('Y-m-d'))->where('geofence_id', $geofence_no)->update('geofence');
 		return 0;
 	}

 	function enable_geofence($geofence_no){
 		$this->db->set('geofence_expiry_date', '9999-12-31')->where('geofence_id', $geofence_no)->update('geofence');
 		return 0;
 	}
 } 

 ?>