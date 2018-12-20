<?php 

/**
 * 
 */
 class Student_stop_assign_model extends CI_Model
 {
 	function fetch_route($employee_school_profile_id)
 	{
 		$query = $this->db->query('SELECT route_name,route_no,route_expiry_date FROM route where route_id AND route_school_profile_id ="'.$employee_school_profile_id.'" GROUP BY route_name,route_no ORDER BY route_no');

		$result = $query->result_array();
		return $result;
 	}

 	function stop_details($data1)
	{
		$route_id = $data1['route_id'];
		$route_type = $data1['route_type'];

		$query = $this->db->query('SELECT * FROM stop  JOIN (select route_id FROM route where route_no = '.$route_id.' and route_type = '.$route_type.') as routes on stop_route_id = routes.route_id AND stop_expiry_date="9999-12-31"');
		
			return $query->result_array();
	}

	function fetch_student($employee_school_profile_id)
	{
		return $this->db->query('SELECT * FROM `student` where student_profile_id not in (select SS_student_profile_id from student_stop_assgn where SS_expiry_date = "9999-12-31" and SS_school_profile_id = '.$employee_school_profile_id.') and  student_expiry_date = "9999-12-31" and student_school_profile_id ='.$employee_school_profile_id.'')->result_array();
	}

	function fetch_student_stop($employee_school_profile_id)
	{
		return $this->db->query('SELECT * FROM `student` where student_profile_id in (select SS_student_profile_id from student_stop_assgn where SS_expiry_date = "9999-12-31") and  student_expiry_date = "9999-12-31" and student_school_profile_id ='.$employee_school_profile_id.'')->result_array();
	}

	function add_student_stop($data2)
	{
		$this->db->insert('student_stop_assgn',$data2);
		return 0;
	}

	function update_student_stop($data1)
	{
		$this->db->set($data1)->where('SS_student_profile_id',$data1['SS_student_profile_id'])->update('student_stop_assgn');
		return 0;
	}

	function fetch_stop($id)
	{
		$data = $this->db->select('stop_name')->where('stop_id',$id)->get('stop')->result_array();
		return $data;
	}

	function fetch_stop_id($stop_name)
	{
		return $this->db->select('stop_id')->where('stop_name',$stop_name['stop_name'])->get('stop')->result_array();
		// return $data;
	}
	function fetch_student_stop_assigned($employee_school_profile_id)
	{
		return $this->db->query('SELECT student.student_first_name,student.student_middle_name,student.student_last_name,stop.stop_name,student_stop_assgn.SS_student_profile_id FROM `student_stop_assgn` JOIN student ON student_stop_assgn.SS_student_profile_id = student.student_profile_id JOIN stop ON student_stop_assgn.SS_type_1_stop_id = stop.stop_id WHERE stop.stop_expiry_date = "9999-12-31" AND student_stop_assgn.SS_expiry_date = "9999-12-31" AND student.student_expiry_date = "9999-12-31" AND student_stop_assgn.SS_school_profile_id = '.$employee_school_profile_id.' AND student.student_school_profile_id = '.$employee_school_profile_id.' AND stop.stop_school_profile_id = '.$employee_school_profile_id.'')->result_array();
	}

	
 } 

 ?>