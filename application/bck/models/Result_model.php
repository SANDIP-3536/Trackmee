<?php 
	

	class Result_model extends CI_Model
	{
	 	function result_registration($result)
	 	{
	 		$this->db->insert('result',$result);
	 		return 1;
	 	}

	 	function fetch_school_exam($employee_school_profile_id,$school_AY_id)
	 	{
	 		return $this->db->where('exam_sched_school_profile_id',$employee_school_profile_id)->where('exam_sched_expiry_date','9999-12-31')->where('exam_sched_AY_id',$school_AY_id)->get('exam_schedule')->result_array();
	 	}

	 	function fetch_school_student($employee_school_profile_id,$school_AY_id,$employee_profile_id)
	 	{
	 		return $this->db->query("SELECT * FROM teacher_class_division_subject_assgn join student_class_division_assgn on TCDS_class_id = SCD_class_id and TCDS_division_id = SCD_division_id and TCDS_AY_id = SCD_AY_ID and TCDS_expiry_date = '9999-12-31' join student on SCD_student_profile_id = student_profile_id where  TCDS_school_profile_id =".$employee_school_profile_id." and TCDS_employee_profile_id =".$employee_profile_id." group by TCDS_class_id,TCDS_division_id")->result_array();
	 	}
	 	
	 	function fetch_school_result($employee_school_profile_id,$school_AY_id)
	 	{
	 		return $this->db->query("SELECT * FROM result join student on student_profile_id = result_student_id join exam_schedule on exam_sched_id = result_exam_id where result_school_profile_id=".$employee_school_profile_id." and result_AY_id =".$school_AY_id." and result_expiry_date = '9999-12-31'")->result_array();
	 	}
	} 
 ?>