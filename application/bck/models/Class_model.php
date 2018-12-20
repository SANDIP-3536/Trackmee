<?php 
	/**
	* 
	*/
	class Class_model extends CI_Model
	{
		function class_registration($class_regi)
		{
			$this->db->insert('class',$class_regi);
			return 0;
		}

		function fetch_school_class($employee_school_profile_id)
		{
			return $this->db->where('class_school_profile_id',$employee_school_profile_id)->get('class')->result_array();
		}
	}
 ?>