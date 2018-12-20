<?php 

/**
 * 
 */
 class Student_stop_assign_model extends CI_Model
 {
 	function fetch_route($employee_school_profile_id)
 	{
 		$query = $this->db->query('SELECT route_name,route_no,route_expiry_date FROM route where route_id AND route_school_profile_id ="'.$employee_school_profile_id.'" GROUP BY 1,2 ORDER BY 1');

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
		return $this->db->query('SELECT * FROM `student` where student_profile_id not in (select SS_student_profile_id from student_stop_assgn where SS_expiry_date = "9999-12-31") and  student_expiry_date = "9999-12-31" and student_school_profile_id ='.$employee_school_profile_id.'')->result_array();
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

 } 

 ?>