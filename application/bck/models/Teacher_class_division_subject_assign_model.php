<?php 

	/**
	* 
	*/
	class Teacher_class_division_subject_assign_model extends CI_Model
	{
		function fetch_school_class($employee_school_profile_id)
		{
			return $this->db->where('class_school_profile_id',$employee_school_profile_id)->where('class_expiry_date','9999-12-31')->get('class')->result_array();
		}

		function fetch_school_division($employee_school_profile_id)
		{
			return $this->db->where('division_school_profile_id',$employee_school_profile_id)->where('division_expiry_date','9999-12-31')->get('division')->result_array();
		}

		function fetch_school_subject($employee_school_profile_id)
		{
			return $this->db->where('subject_expiry_date','9999-12-31')->where('subject_school_profile_id',$employee_school_profile_id)->get('subject')->result_array();
			// return $this->db->query('SELECT * FROM `subject` where subject_school_profile_id ='.$employee_school_profile_id.' AND subject_expiry_date="9999-12-31" GROUP BY subject_name')->result_array();
		}

		function fetch_school_teacher($employee_school_profile_id)
		{
			return $this->db->where('employee_school_profile_id',$employee_school_profile_id)->where('employee_expiry_date','9999-12-31')->where('employee_type','5')->get('employee')->result_array();
		}

		function TCDS_registration($TCDS)
		{
			$this->db->insert('teacher_class_division_subject_assgn',$TCDS);
			return 0;
		}

		function subject_details_class($subject)
		{
			return $this->db->query("SELECT subject_id,subject_name,case subject_type when '1' then 'Theory' when '2' then 'Practicle' when '3' then 'Project' when '4' then 'Oral' when '5' then 'Assignment' else 'NA' end as subject_type FROM subject where subject_id NOT IN (
						select TCDS_subject_id from teacher_class_division_subject_assgn where TCDS_expiry_date='9999-12-31' and TCDS_school_profile_id =".$subject['subject_school_profile_id'].")  and subject_expiry_date = '9999-12-31' and subject_school_profile_id =".$subject['subject_school_profile_id']." and subject_class_id =".$subject['class_id']."")->result_array();
		}

		function verify($TCDS)
		{
			return $this->db->where('TCDS_employee_profile_id',$TCDS['TCDS_employee_profile_id'])->where('TCDS_class_id',$TCDS['TCDS_class_id'])->where('TCDS_division_id',$TCDS['TCDS_division_id'])->where('TCDS_subject_id',$TCDS['TCDS_subject_id'])->where('TCDS_expiry_date','9999-12-31')->get('teacher_class_division_subject_assgn')->num_rows();
		}

		function fetch_teacher_class_division_subject($employee_school_profile_id,$school_AY_id)
		{
			return $this->db->query('SELECT * FROM employee join teacher_class_division_subject_assgn on employee_profile_id = TCDS_employee_profile_id JOIN class ON class_id = TCDS_class_id join division on division_id = TCDS_division_id JOIN subject on subject_id = TCDS_subject_id where TCDS_expiry_date="9999-12-31" AND TCDS_AY_id = '.$school_AY_id.' AND TCDS_school_profile_id = '.$employee_school_profile_id.'')->result_array();
		}

		function TCDS_remove($TCDS_remove)
		{
			$this->db->set($TCDS_remove)->where('TCDS_id',$TCDS_remove['TCDS_id'])->update('teacher_class_division_subject_assgn');
		}

		function division_details_class($subject)
		{
			return $this->db->query("SELECT * FROM division where division_class_id=".$subject['class_id']." and division_school_profile_id=".$subject['division_school_profile_id']." and division_expiry_date = '9999-12-31'")->result_array();
		}
	}
 ?>