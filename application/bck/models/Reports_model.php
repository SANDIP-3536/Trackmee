<?php 
	
	
	class Reports_model extends CI_Model
	{
		function fetch_school_bus($employee_school_profile_id)
		{
			return $this->db->query('select * from bus where bus_expiry_date="9999-12-31" and bus_school_profile_id='.$employee_school_profile_id.'')->result_array();
		}

		function distance_report_details($report)
		{
			return $this->db->query("SELECT device_id,CAST(on_day_time AS DATE) as date,max(odometer_reading)-MIN(odometer_reading) as dist_diff FROM gps_location_data_old where on_day_time between '".$report['from']."' and '".$report['to']."' and Device_id in('".$report['bus']."') GROUP BY device_id,CAST(on_day_time AS DATE) order by device_id,CAST(on_day_time AS DATE)")->result_array();
		}

		function stoppage_report_details($report)
		{
			return $this->db->query("SELECT * from (SELECT address,stop_latitude,stop_longitude,max(on_day_time) as end_time,min(on_day_time) as start_time,TIMEDIFF(max(on_day_time),min(on_day_time)) as total_time FROM gps_location_data_old where on_day_time between '".$report['from']."' and '".$report['to']."' and vehicle_movement_status='A' and Device_id='".$report['bus']."' group by 1,2)as data where total_time>TIME('".$report['min']."') order by 3,4")->result_array();
		}

		function overspeed_report_details($report)
		{
			return $this->db->query("SELECT on_day_time as datetime,speed,stop_latitude as latitude,stop_longitude as longitude,address FROM gps_location_data_old where on_day_time between '".$report['from']."' and '".$report['to']."' and device_id='".$report['bus']."' and speed>=".$report['speed']." GROUP BY CAST(on_day_time AS DATE) order by on_day_time desc")->result_array();
		}

		function history_report_details($report)
		{
			return $this->db->query("SELECT on_day_time as datetime,stop_latitude as latitude,stop_longitude as longitude,speed,heading_angle,gps_valid_data_name,total_satellites,gsm_signal_strength,vehicle_movement_status_name,gps_quality_name,power_status_name,address FROM gps_location_data_old where on_day_time between '".$report['from']."' and '".$report['to']."' and device_id='".$report['bus']."' group by 2,3 order by on_day_time")->result_array();
		}
	}
 ?>