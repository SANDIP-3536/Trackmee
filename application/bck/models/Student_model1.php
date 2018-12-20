<?php 

/**
* 
*/
class Student_model extends CI_model
{
	function student_add($student)
	{
		$this->db->insert('student', $student);
		$query = $this->db->query('Select * from student ORDER BY student_profile_id DESC limit 1');
		$result = $query->result_array();
		return $result;
	}

	function parent_add($parent) 
	{
		$this->db->insert('parent', $parent);
		$query = $this->db->query('Select * from parent ORDER BY parent_profile_id DESC limit 1');
		$result = $query->result_array();
		return $result;
	}

	function update_student_parent_details($student_details)
	{
		$this->db->set($student_details)->where('student_profile_id',$student_details['student_profile_id'])->update('student');;
	}

	// function already_exits_mobile($data)
	// {
	// 	$query = $this->db->query('SELECT parent.parent_mobile_number FROM parent JOIN student ON parent.parent_student_profile_id = student.student_profile_id WHERE parent.parent_mobile_number = "'.$data['num'].'" AND student.student_first_name = "'.$data['name'].'"');
	// 	$result = $query->num_rows();
	// 	return $result;
	// }​

	function student_credential($data2)
	{
		$this->db->insert('credential', $data2);
		return 0;
	}
	function fetch_stu_details($profile_id)
	{
		// print_r($profile_id);
		$query = $this->db->query('Select * from student WHERE student_profile_id  = '.$profile_id.'');
		$result = $query->result_array();
		return $result;	
	}

	function fetch_student_by_session($employee_school_profile_id)
	{
		// return $this->db->where('student_school_profile_id', $employee_school_profile_id)->get('student')->result_array();
		$query = $this->db->query('SELECT * FROM `student` JOIN parent ON student.student_profile_id = parent.parent_student_profile_id WHERE student_school_profile_id = '.$employee_school_profile_id.'');
		return $query->result_array();
	}

	function update_student($id)
	{
		return $this->db->where('student_profile_id', $id)->get('student')->result_array();
	}	

	function update_student_details($data)
	{
		$this->db->set($data)->where('student_profile_id',$data['student_profile_id'])->update('student');;
	}

	function deactive($student_profile_id)
	{
		$this->db->set('student_expiry_date', date('Y-m-d'))->where('student_profile_id',$student_profile_id)->update('student');
		// $this->db->set('DBR_expiry_date', date('Y-m-d'))->where('DBR_bus_id',$bus_id)->update('student_bus_route_assgn');
		return 0;
	}

	function active($student_profile_id)
	{
		$this->db->set('student_expiry_date', '9999-12-31')->where('student_profile_id',$student_profile_id)->update('student');
		// $this->db->set('DBR_expiry_date', '9999-12-31')->where('DBR_bus_id',$bus_id)->update('student_bus_route_assgn');
		return 0;
	}

	function already_exits_mobile($data)
	{
		$data = $this->db->where('student_pri_mobile_number',$data['num'])->where('student_first_name',$data['name'])->get('student');
		return $data->num_rows();
	}

	function already_exits_email($email)
	{
		$data = $this->db->where('student_pri_email_id',$email)->get('student');
		return $data->num_rows();
	}

	function sms($no,$msg)
	{
	    $no = "91".$no;
	    $ch = curl_init();
	    $message = urlencode($msg);
	    
	    curl_setopt($ch,CURLOPT_URL,"http://smsapi.24x7sms.com/api_2.0/SendSMS.aspx?APIKEY=28QHnbg118a&MobileNo=".$no."&SenderID=SYNTEC&Message=".$message."&ServiceName=TEMPLATE_BASED");
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    $output =curl_exec($ch);
	    curl_close($ch);

	    return true;
	}	
}
 ?>