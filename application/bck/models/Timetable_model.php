<?php 

	/**
	* 
	*/
	class Timetable_model extends CI_Model
	{
		function fetch_class($employee_school_profile_id)
		{
			return $this->db->query("SELECT * FROM class where class_school_profile_id =".$employee_school_profile_id." and class_expiry_date = '9999-12-31'")->result_array();
		}

		function fetch_class_division($class)
		{
			return $this->db->query("SELECT * FROM student_class_division_assgn join division on SCD_division_id = division_id where SCD_class_id =".$class['class_id']." and SCD_school_profile_id =".$class['employee_school_profile_id']." and SCD_expiry_date = '9999-12-31' group by SCD_division_id")->result_array();
		}

		function fetch_class_division_subject($subject)
		{
			return $this->db->query("select subject_id,subject_name, case subject_type when '1' then 'Theory' when '2' then 'Practicle' when '3' then 'Project' when '4' then 'oral' when '5' then 'Assignment' else 'NA' end as subject_type from subject join teacher_class_division_subject_assgn on TCDS_subject_id = subject_id where TCDS_class_id =".$subject['class_id']." and TCDS_division_id =".$subject['division']." and TCDS_school_profile_id =".$subject['employee_school_profile_id']." and TCDS_expiry_date = '9999-12-31' group by subject_name,subject_id")->result_array();
		}

		function fetch_teacher($subject)
		{
			return $this->db->query("SELECT TCDS.TCDS_employee_profile_id,employee.employee_first_name,employee.employee_middle_name,employee.employee_last_name FROM `teacher_class_division_subject_assgn` as TCDS JOIN employee ON employee.employee_profile_id = TCDS.TCDS_employee_profile_id where TCDS.TCDS_class_id = '".$subject['class_name']."' and TCDS.TCDS_division_id = '".$subject['division']."' and TCDS.TCDS_subject_id = '".$subject['subject_id']."' and TCDS.TCDS_AY_id = '".$subject['school_AY_id']."' and TCDS.TCDS_school_profile_id = '".$subject['employee_school_profile_id']."' and TCDS.TCDS_expiry_date = '9999-12-31' group by TCDS.TCDS_employee_profile_id")->result_array();
		}

		function fetch_TCDS_id($data)
		{
			return $this->db->query('SELECT TCDS_id FROM `teacher_class_division_subject_assgn` where TCDS_employee_profile_id = '.$data['teacher_name'].' and TCDS_class_id = '.$data['class_name'].' and TCDS_division_id = '.$data['division'].' and TCDS_subject_id = '.$data['subject_name'].' and TCDS_AY_id = '.$data['school_AY_id'].' and TCDS_school_profile_id = '.$data['employee_school_profile_id'].' and TCDS_expiry_date = "9999-12-31"')->row()->TCDS_id;
		}
		function insert_timetable($data)
		{
			$this->db->insert('timetable',$data);
		}
		function fetch_timetable($data)
		{
			return $this->db->query('SELECT timetable.tt_day,timetable.tt_start_time,timetable.tt_end_time,employee.employee_first_name,employee.employee_last_name,subject.subject_name,subject.subject_type FROM `timetable` JOIN teacher_class_division_subject_assgn ON timetable.tt_TCDS_id = teacher_class_division_subject_assgn.TCDS_id JOIN employee ON teacher_class_division_subject_assgn.TCDS_employee_profile_id=employee.employee_profile_id JOIN subject ON subject.subject_id = teacher_class_division_subject_assgn.TCDS_subject_id WHERE timetable.tt_school_profile_id = '.$data['employee_school_profile_id'].' AND timetable.tt_expiry_date = "9999-12-31" AND timetable.tt_AY_id = '.$data['school_AY_id'].' AND teacher_class_division_subject_assgn.TCDS_class_id = '.$data['class_name'].' AND teacher_class_division_subject_assgn.TCDS_division_id = '.$data['division'].' AND teacher_class_division_subject_assgn.TCDS_AY_id = '.$data['school_AY_id'].' AND teacher_class_division_subject_assgn.TCDS_expiry_date = "9999-12-31" AND teacher_class_division_subject_assgn.TCDS_school_profile_id = '.$data['employee_school_profile_id'].' ORDER BY timetable.tt_start_time ASC')->result_array();
		}
	}
 ?>