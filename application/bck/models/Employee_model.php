<?php
	class Employee_model extends CI_Model
	{
		function employee_add($employee_teacher){
			$this->db->insert('employee', $employee_teacher);
			$query = $this->db->query('Select * from employee ORDER BY employee_profile_id DESC limit 1');
			return $query->result_array();
		}

		function employee_credential($employee_credential)
		{
			$this->db->insert('credential', $employee_credential);
		}

		function fetch_employee_by_session($employee_school_profile_id)				
		{
			return $this->db->query("SELECT * FROM `employee` where employee_school_profile_id =".$employee_school_profile_id." and employee_type != 1 and employee_type != 2 and employee_type != 3 and employee_type != 4")->result_array();
		}

		function update_employee($employee_profile_id)
		{
			return $this->db->where('employee_profile_id', $employee_profile_id)->get('employee')->result_array();
		}

		function update_employee_details($update_employee)
		{
			$this->db->set($update_employee)->where('employee_profile_id',$update_employee['employee_profile_id'])->update('employee');
			return 0;
		}

		function edit_profile($profile)
		{
			$this->db->set($profile)->where('employee_profile_id',$profile['employee_profile_id'])->update('employee');
			return 1;
		}

		function document_details($employee)
		{
			return $this->db->where('doc_user',$employee['student_profile_id'])->where('doc_user_type','5')->get('document')->result_array();
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

		function sms($no,$msg,$id)
		{
		    $no = "91".$no;
		    $id = $id;
		    $ch = curl_init();
		    $message = urlencode($msg);
		    
		    curl_setopt($ch,CURLOPT_URL,"http://smsapi.24x7sms.com/api_2.0/SendSMS.aspx?APIKEY=28QHnbg118a&MobileNo=".$no."&SenderID=".$id."&Message=".$message."&ServiceName=TEMPLATE_BASED");
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		    $output =curl_exec($ch);
		    // echo json_encode($output);
		    curl_close($ch);

		    return true;
		}
	}
 ?>