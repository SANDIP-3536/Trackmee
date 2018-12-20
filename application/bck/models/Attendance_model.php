<?php 

	/**
	* 
	*/
	class Attendance_model extends CI_Model
	{
		function fetch_TCD($employee_school_profile_id,$school_AY_id,$employee_profile_id)
		{
			return $this->db->query("SELECT * FROM `teacher_class_division_subject_assgn` join class on class_id = TCDS_class_id join division on division_id = TCDS_division_id where TCDS_expiry_date = '9999-12-31' and TCDS_AY_id =".$school_AY_id." and TCDS_school_profile_id = ".$employee_school_profile_id." and TCDS_employee_profile_id = ".$employee_profile_id." group by class_name,division_name")->result_array();
		}

		function fetch_TS($employee_school_profile_id,$school_AY_id,$employee_profile_id)
		{
			return $this->db->query("SELECT * FROM `teacher_class_division_subject_assgn` join  subject on subject_id=TCDS_subject_id where TCDS_expiry_date = '9999-12-31' and TCDS_AY_id =".$school_AY_id." and TCDS_school_profile_id = ".$employee_school_profile_id." and TCDS_employee_profile_id = ".$employee_profile_id."")->result_array();
		}

		function fetch_student_acor_SCD($fetch)
		{
			return $this->db->query("SELECT * from student JOIN student_class_division_assgn on student_profile_id = SCD_student_profile_id join class on class_id= SCD_class_id join division on division_id = SCD_division_id  where SCD_class_id =".$fetch['class_id']." AND SCD_division_id =".$fetch['division_id']." and SCD_expiry_date ='9999-12-31' AND SCD_school_profile_id =".$fetch['profile_id']." AND SCD_AY_id =".$fetch['AY_id']."")->result_array();
		}
	}
 ?>