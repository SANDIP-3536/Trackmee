<?php 
	class Speed_model extends CI_Model
	{
		function fetch_school_bus($employee_client_profile_id)
		{
			if (isset($this->session->userdata['client'])) {
				return $this->db->query("select bus.* from bus  where  bus_expiry_date='9999-12-31' and bus_client_profile_id =".$employee_client_profile_id."")->result_array();
        	}elseif (isset($this->session->userdata['Institute'])) {
				return $this->db->query("select bus.* from bus  where  bus_expiry_date='9999-12-31' and bus_client_profile_id IN (select client_profile_id from client where client_institute_profile_id =".$employee_client_profile_id.")")->result_array();
        	}
		}

		function overspeed_report_details($report)
		{
			return $this->db->query("SELECT on_day_time as datetime,speed,stop_latitude as latitude,stop_longitude as longitude,address FROM gps_location_data_old where on_day_time between '".$report['from']."' and '".$report['to']."' and device_id='".$report['bus']."' and speed >=".$report['speed']." order by on_day_time desc")->result_array();
		}
	}
 ?>