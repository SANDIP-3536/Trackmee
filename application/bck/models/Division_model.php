<?php 
	/**
	* 
	*/
	class Division_model extends CI_Model
	{
		function division_registration($division_regi)
		{
			$this->db->insert('division',$division_regi);
			return 0;
		}

		function fetch_school_division($employee_school_profile_id)
		{
			return $this->db->query("SELECT * FROM class join division on class_id = division_class_id where division_expiry_date = '9999-12-31' and division_school_profile_id =".$employee_school_profile_id."")->result_array();
		}

		function fetch_school_class($employee_school_profile_id)
		{
			return $this->db->where('class_school_profile_id',$employee_school_profile_id)->where('class_expiry_date','9999-12-31')->get('class')->result_array();
		}
	}
 ?>