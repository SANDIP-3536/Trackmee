<?php 
	/**
	* 
	*/
	class Notification_model extends CI_Model
	{
		function fetch_bus($employee_client_profile_id)
		{
			return $this->db->where('bus_client_profile_id',$employee_client_profile_id)->where('bus_expiry_date','9999-12-31')->get('bus')->result_array();
		}

		function fetch_notification($employee_client_profile_id)
		{
			return $this->db->query("SELECT notification.*,concat(user_last_name,' ',user_first_name,' ',user_middle_name) as user FROM `notification` join user on notifi_user_profile_id = user_profile_id where notifi_client_profile_id =".$employee_client_profile_id." order by notifi_datetime DESC")->result_array();
		}

		function fetch_user_acor_client($user)
		{
			return $this->db->query("SELECT concat(user_last_name,' ',user_first_name,' ',user_middle_name) as user_name,bus_no,user_profile_id FROM `user_stop_assgn` join bus on bus_id = SS_bus_id and bus_client_profile_id = SS_client_profile_id join user on user_profile_id = SS_user_profile_id and user_client_profile_id = SS_client_profile_id where SS_expiry_date = '9999-12-31' and SS_client_profile_id =".$user['employee_client_profile_id']."")->result_array();
		}
		function fetch_user_acor_bus($user)
		{
			return $this->db->query("SELECT concat(user_last_name,' ',user_first_name,' ',user_middle_name) as user_name,bus_no,user_profile_id FROM `user_stop_assgn` join bus on bus_id = SS_bus_id and bus_client_profile_id = SS_client_profile_id join user on user_profile_id = SS_user_profile_id and user_client_profile_id = SS_client_profile_id where SS_expiry_date = '9999-12-31' and SS_client_profile_id =".$user['employee_client_profile_id']." and SS_bus_id = ".$user['bus_id']."")->result_array();
		}

		function add_notification($Notification)
		{
			$this->db->insert('notification',$Notification);
		}
	}
 ?>