<?php 

	/**
	* 
	*/
	class Homework_model extends CI_Model
	{
		function fetch_TCDS($employee_school_profile_id,$school_AY_id,$employee_profile_id)
		{
			return $this->db->query('select * from employee join teacher_class_division_subject_assgn on employee_profile_id = TCDS_employee_profile_id join subject on subject.subject_id = TCDS_subject_id where TCDS_school_profile_id ='.$employee_school_profile_id.' and TCDS_AY_id ='.$school_AY_id.' and TCDS_employee_profile_id ='.$employee_profile_id.' and TCDS_expiry_date = "9999-12-31"')->result_array();
		}

		function homework_registration($HW)
		{
			$this->db->insert('homework',$HW);
			return 1;
		}

		function fetch_homework($employee_school_profile_id,$school_AY_id)
		{
			return $this->db->query("SELECT * FROM homework join teacher_class_division_subject_assgn on TCDS_id = hw_TCDS_id join employee on TCDS_employee_profile_id = employee_profile_id JOIN subject ON subject_id = TCDS_subject_id where hw_school_profile_id =".$employee_school_profile_id." and hw_AY_id =".$school_AY_id." and hw_expiry_date = '9999-12-31'")->result_array();
		}

		function homework_details($hw_id)
		{
			return $this->db->query("SELECT * FROM homework join teacher_class_division_subject_assgn on TCDS_id = hw_TCDS_id join employee on TCDS_employee_profile_id = employee_profile_id JOIN subject ON subject_id = TCDS_subject_id where hw_school_profile_id =".$hw_id." and hw_expiry_date = '9999-12-31'")->result_array();
		}

		function update_homework($HW)			
		{
			$this->db->where('hw_id',$HW['hw_id'])->update('homework',$HW);
			return 1;
		}
	}
 ?>