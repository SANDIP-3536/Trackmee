<?php 
	
	
	class Reports_model extends CI_Model
	{
		function fetch_school_bus($employee_client_profile_id)
		{
			if (isset($this->session->userdata['client'])) {
				return $this->db->query("select bus.* from bus  where  bus_expiry_date='9999-12-31' and bus_client_profile_id =".$employee_client_profile_id."")->result_array();
        	}elseif (isset($this->session->userdata['Institute'])) {
				return $this->db->query("select bus.* from bus  where  bus_expiry_date='9999-12-31' and bus_client_profile_id IN (select client_profile_id from client where client_institute_profile_id =".$employee_client_profile_id.")")->result_array();
        	}
		}

		function distance_report_details($report)
		{
			return $this->db->query("SELECT device_id,CAST(on_day_time AS DATE) as date,max(odometer_reading)-MIN(odometer_reading) as dist_diff FROM gps_location_data_old where on_day_time between '".$report['from']."' and '".$report['to']."' and Device_id in('".$report['bus']."') GROUP BY device_id,CAST(on_day_time AS DATE) order by device_id,CAST(on_day_time AS DATE)")->result_array();
		}

		function history_report_details($report)
		{
			return $this->db->query("SELECT on_day_time as datetime,stop_latitude as latitude,stop_longitude as longitude,speed,heading_angle,gps_valid_data_name,gps_valid_data,total_satellites,gsm_signal_strength,vehicle_movement_status_name,vehicle_movement_status,gps_quality_name,power_status_name,address,ignition FROM gps_location_data_old where on_day_time between '".$report['from']."' and '".$report['to']."' and device_id='".$report['bus']."' group by 2,3 order by on_day_time")->result_array();
		}
	}
 ?>