<?php 

	/**
	* 
	*/
	class Teacher_subject_assgn_model extends CI_Model
	{
		function fetch_school_class($employee_school_profile_id)
		{
			return $this->db->where('class_school_profile_id',$employee_school_profile_id)->where('class_expiry_date','9999-12-31')->get('class')->result_array();
		}

		function fetch_school_teacher($employee_school_profile_id)
		{
			return $this->db->where('employee_school_profile_id',$employee_school_profile_id)->where('employee_expiry_date','9999-12-31')->where('employee_type','5')->get('employee')->result_array();
		}

		function fetch_teacher_subject($employee_school_profile_id,$school_AY_id)
		{
			return $this->db->query('SELECT * FROM employee join teacher_subject_assgn on employee_profile_id = TS_employee_profile_id JOIN subject on subject_id = TS_subject_id JOIN class ON subject_class_id = class_id where TS_expiry_date="9999-12-31" AND TS_school_profile_id = '.$employee_school_profile_id.' AND TS_AY_id = '.$school_AY_id.'')->result_array();
		}

		function subject_details_class($subject)
		{
			return $this->db->query("SELECT subject_id,subject_name,case subject_type when '1' then 'Theory' when '2' then 'Practicle' when '3' then 'Project' when '4' then 'oral' when '5' then 'Assignment' else 'NA' end as subject_type FROM subject where subject_id NOT IN (
						select TS_subject_id from teacher_subject_assgn where TS_expiry_date='9999-12-31' and TS_school_profile_id =".$subject['subject_school_profile_id'].")  and subject_expiry_date = '9999-12-31' and subject_school_profile_id =".$subject['subject_school_profile_id']." and subject_class_id =".$subject['class_id']."")->result_array();
		}

		function verify($TS)
		{
			return $this->db->where('TS_employee_profile_id',$TS['TS_employee_profile_id'])->where('TS_subject_id',$TS['TS_subject_id'])->where('TS_expiry_date','9999-12-31')->get('teacher_subject_assgn')->num_rows();
		}

		function TS_registration($TS)
		{
			$this->db->insert('teacher_subject_assgn',$TS);
			return 0;
		}

		function TS_remove($TS_remove)
		{
			$this->db->set($TS_remove)->where('TS_id',$TS_remove['TS_id'])->update('teacher_subject_assgn');
		}
	}
 ?>