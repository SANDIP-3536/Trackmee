<?php 
	/**
	* 
	*/
	class Notification_model extends CI_Model
	{
		function fetch_class($employee_school_profile_id)
		{
			return $this->db->where('class_school_profile_id',$employee_school_profile_id)->where('class_expiry_date','9999-12-31')->get('class')->result_array();
		}

		function fetch_division($employee_school_profile_id)
		{
			return $this->db->where('division_school_profile_id',$employee_school_profile_id)->where('division_expiry_date','9999-12-31')->get('division')->result_array();
		}

		function fetch_student_acor_class($student)
		{
			return $this->db->query('SELECT * FROM student join student_class_division_assgn on student_profile_id = SCD_student_profile_id JOIN class on class_id = SCD_class_id join division on division_id = SCD_division_id where SCD_school_profile_id='.$student['employee_school_profile_id'].' AND SCD_class_id='.$student['class_id'].' AND SCD_expiry_date="9999-12-31"')->result_array();
		}

		function fetch_student_acor_division($student)
		{
			return $this->db->query('SELECT * FROM student join student_class_division_assgn on student_profile_id = SCD_student_profile_id JOIN class on class_id = SCD_class_id join division on division_id = SCD_division_id where SCD_school_profile_id='.$student['employee_school_profile_id'].' AND SCD_division_id='.$student['division_id'].' AND SCD_expiry_date="9999-12-31"')->result_array();
		}

		function fetch_student_acor_class_division($student)
		{
			return $this->db->query('SELECT * FROM student join student_class_division_assgn on student_profile_id = SCD_student_profile_id JOIN class on class_id = SCD_class_id join division on division_id = SCD_division_id where SCD_school_profile_id='.$student['employee_school_profile_id'].' AND SCD_class_id='.$student['class_id'].' AND SCD_division_id='.$student['division_id'].' AND SCD_expiry_date="9999-12-31"')->result_array();
		}
		function fetch_student_acor_school($student)
		{
			return $this->db->query('SELECT * FROM student join student_class_division_assgn on student_profile_id = SCD_student_profile_id JOIN class on class_id = SCD_class_id join division on division_id = SCD_division_id where SCD_school_profile_id='.$student['employee_school_profile_id'].' AND SCD_expiry_date="9999-12-31"')->result_array();
		}

		function parent_notification($Notification)
		{
			$this->db->insert('notification',$Notification);
		}

		function fetch_event($employee_school_profile_id)
		{
			return $this->db->query('select * from notification where notifi_type = 4 group by notifi_title')->result_array();
		}

		function fetch_parent_meet($employee_school_profile_id)
		{
			return $this->db->query('select * from notification where notifi_type = 3 group by notifi_title')->result_array();
		}

		function fetch_other_notifi($employee_school_profile_id)
		{
			return $this->db->query('select * from notification where notifi_type = 6 group by notifi_title')->result_array();
		}

		function fetch_student_teacher($employee_school_profile_id)
		{
			return $this->db->query('select * from notification where notifi_type = 5 group by notifi_title')->result_array();
		}

		function fetch_emergency($employee_school_profile_id)
		{
			return $this->db->query('select * from notification where notifi_type = 1 group by notifi_title')->result_array();
		}
	}
 ?>