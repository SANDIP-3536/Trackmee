<?php 

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

	function fetch_class_division($class)
	{
		return $this->db->query("SELECT * FROM student_class_division_assgn join division on SCD_division_id = division_id where SCD_class_id =".$class['class_id']." and SCD_school_profile_id =".$class['employee_school_profile_id']." and SCD_expiry_date = '9999-12-31' group by SCD_division_id")->result_array();
	}

	function fetch_class_fee_types($fee_type)
	{
		return $this->db->query("(SELECT * FROM fees_type join fee_category on fees_type_fee_category_id = fee_category_id where fees_type_class_id =".$fee_type['class_id']." and fees_type_expiry_date = '9999-12-31' and fees_type_school_profile_id =".$fee_type['employee_school_profile_id']." and fees_type_name NOT IN('Default') ORDER BY fees_type_name)
							union
							(SELECT * FROM fees_type join fee_category on fees_type_fee_category_id = fee_category_id where fees_type_class_id =".$fee_type['class_id']." and fees_type_expiry_date = '9999-12-31' and fees_type_school_profile_id =".$fee_type['employee_school_profile_id']." and fees_type_name IN('Default') ORDER BY fees_type_name)")->result_array();
	}

	function update_student_parent_details($student_details)
	{
		$this->db->set($student_details)->where('student_profile_id',$student_details['student_profile_id'])->update('student');;
	}

	function student_credential($data2)
	{
		$this->db->insert('credential', $data2);
		return 0;
	}
	function fetch_stu_details($profile_id)
	{
		$query = $this->db->query('Select * from student WHERE student_profile_id  = '.$profile_id.'');
		$result = $query->result_array();
		return $result;	
	}

	function fetch_student_by_session($employee_school_profile_id)
	{
		return $this->db->query('SELECT * FROM `student` JOIN parent ON student_parent_id = parent_profile_id WHERE student_school_profile_id = '.$employee_school_profile_id.'')->result_array();
	}

	function update_student($id)
	{
		return $this->db->where('student_profile_id', $id)->get('student')->result_array();
	}	
	function update_parent($id)
	{
		return $this->db->where('parent_profile_id', $id)->get('parent')->result_array();
	}	

	function parent_details($id)
	{
		return $this->db->where('parent_student_profile_id ', $id)->get('parent')->result_array();
	}	

	function update_student_details($data)
	{
		$this->db->set($data)->where('student_profile_id',$data['student_profile_id'])->update('student');
	}

	function update_parent_details($data)
	{
		$this->db->set($data)->where('parent_profile_id',$data['parent_profile_id'])->update('parent');
	}
	
	function edit_profile($profile)
	{
		$this->db->set($profile)->where('student_profile_id',$profile['student_profile_id'])->update('student');
		return 1;
	}

	function deactive($student_profile_id)
	{
		$this->db->set('student_expiry_date', date('Y-m-d'))->where('student_profile_id',$student_profile_id)->update('student');
		return 0;
	}

	function active($student_profile_id)
	{
		$this->db->set('student_expiry_date', '9999-12-31')->where('student_profile_id',$student_profile_id)->update('student');
		return 0;
	}

	function already_exits_mobile($mobile)
	{
		$data = $this->db->query('SELECT parent_mobile_number FROM parent JOIN student ON parent_student_profile_id = student_profile_id WHERE parent_mobile_number = "'.$mobile['num'].'" AND student_first_name = "'.$mobile['name'].'" AND student.student_school_profile_id = "'.$mobile['profile_id'].'"');
		return $data->num_rows();
	}

	function already_exits_email($email)
	{
		$data = $this->db->where('student_pri_email_id',$email)->get('student');
		return $data->num_rows();
	}

	function student_document($document)
	{
		$this->db->insert('document',$document);
		return 0;
	}

	function document_details($student)
	{
		return $this->db->where('doc_user',$student['student_profile_id'])->where('doc_user_type','8')->get('document')->result_array();
	}

	function sms($no,$msg,$id)
	{
	    $id = $id;
	    $ch = curl_init();
	    $message = urlencode($msg);
	    curl_setopt($ch,CURLOPT_URL,"http://smsapi.24x7sms.com/api_2.0/SendSMS.aspx?APIKEY=28QHnbg118a&MobileNo=91".$no."&SenderID=VIDYAA&Message=".$message."&ServiceName=PROMOTIONAL_SPL");
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    $output =curl_exec($ch);
	    curl_close($ch);

	    return $output;
	}	

	function fetch_other_fee_type($employee_school_profile_id)
	{
		return $this->db->query("SELECT * FROM fees_type join fee_category on fees_type_fee_category_id = fee_category_id  where fees_type_school_profile_id =".$employee_school_profile_id." and fees_type_expiry_date='9999-12-31' and fees_type_class_id = 0 ORDER BY fees_type_name")->result_array();
	}
}
 ?>