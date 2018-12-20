<?php 

	/**
	* 
	*/
	class Teacher_model extends CI_Model
	{
		function teacher_add($employee_teacher){
			$this->db->insert('employee', $employee_teacher);
			$query = $this->db->query('Select * from employee ORDER BY employee_profile_id DESC limit 1');
			return $query->result_array();
		}

		function teacher_credential($teacher_credential)
		{
			$this->db->insert('credential', $teacher_credential);
		}

		function fetch_teacher_by_session($employee_school_profile_id)				
		{
			return $this->db->where('employee_school_profile_id',$employee_school_profile_id)->where('employee_expiry_date','9999-12-31')->get('employee')->result_array();
		}

		function update_teacher($employee_profile_id)
		{
			return $this->db->where('employee_profile_id', $employee_profile_id)->get('employee')->result_array();
		}

		function update_teacher_details($update_teacher)
		{
			$this->db->set($update_teacher)->where('employee_profile_id',$update_teacher['employee_profile_id'])->update('employee');
			return 0;
		}

		function document_details($teacher)
		{
			return $this->db->where('doc_user',$teacher['student_profile_id'])->where('doc_user_type','5')->get('document')->result_array();
		}

		function deactive($employee_profile_id)
		{
			$this->db->set('employee_expiry_date', date('Y-m-d'))->where('employee_profile_id',$employee_profile_id)->update('employee');
			return 0;
		}

		function active($employee_profile_id)
		{
			$this->db->set('employee_expiry_date', '9999-12-31')->where('employee_profile_id',$employee_profile_id)->update('employee');
			return 0;
		}
	}
 ?>