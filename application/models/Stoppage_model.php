<?php 
	class Stoppage_model extends CI_Model
	{
		function fetch_school_bus($employee_client_profile_id)
		{
			if (isset($this->session->userdata['client'])) {
				return $this->db->query("select bus.* from bus  where  bus_expiry_date='9999-12-31' and bus_client_profile_id =".$employee_client_profile_id."")->result_array();
        	}elseif (isset($this->session->userdata['Institute'])) {
				return $this->db->query("select bus.* from bus  where  bus_expiry_date='9999-12-31' and bus_client_profile_id IN (select client_profile_id from client where client_institute_profile_id =".$employee_client_profile_id.")")->result_array();
        	}
		}

		function stoppage_report_details($report)
		{
			return $this->db->query("SELECT * from (SELECT address,stop_latitude as latitude,stop_longitude as longitude ,max(on_day_time) as end_time,min(on_day_time) as start_time,TIMEDIFF(max(on_day_time),min(on_day_time)) as total_time,speed,heading_angle,gps_valid_data_name, total_satellites,gsm_signal_strength, vehicle_movement_status_name, gps_quality_name, power_status_name,on_day_time as datetime FROM gps_location_data_old where on_day_time between '".$report['from']."' and '".$report['to']."' and vehicle_movement_status='A' and Device_id='".$report['bus']."' group by 1,2)as data where total_time>TIME('".$report['min']."') order by 3,4")->result_array();
		}
	}
 ?>