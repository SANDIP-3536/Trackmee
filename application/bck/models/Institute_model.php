<?php
	
	class Institute_model extends CI_Model{

		public function add_institute_user($institute_employee)
		{
			$this->db->insert('employee',$institute_employee);
			$query = $this->db->query('SELECT employee_profile_id from employee order by employee_profile_id desc limit 1 ');
			$result = $query->result_array();
			return $result;	
		}
		function institute_registration($institute_details)
		{
			$this->db->insert('institute',$institute_details);
			return 0;
		}

		function add_institute_user1($data1)
		{
			// print_r($data1);
			$expiry_date = '9999-12-31';
			return $this->db->where('institute_or_school_profile_id', $data1['institute_or_school_profile_id'])->where('user_expiry_date',$expiry_date)->get('users')->result_array();
		}

		function total_school($data1)
		{
			return $this->db->where('institute_profile_id',$data['institute_or_school_profile_id'])->get('school')->result_array();
		}
		function institute_details($institute_profile_id)
		{
			return $this->db->where('institute_profile_id', $institute_profile_id)->get('institute')->result_array();
		}

		function user_details($institute_profile_id)
		{
			return $this->db->where('employee_type','2')->where('employee_school_profile_id', $institute_profile_id)->get('employee')->result_array();
		}

		public function institute_employee_credentials($institute_credential)
		{
			$this->db->insert('credential',$institute_credential);
		}

		public function view()
		{
			return $this->db->query("select institute.*,school_count,employee_count,student_count from institute left join (select school_institute_profile_id,school_profile_id,count(*)as school_count from school where school_expiry_date='9999-12-31' group by school_institute_profile_id ) as school on school_institute_profile_id=institute_profile_id left join (select institute_profile_id as employee_institute_profile_id,count(*)as employee_count from employee join school on school_profile_id = employee_school_profile_id join institute on school_institute_profile_id =  institute_profile_id where employee_expiry_date='9999-12-31' and school_expiry_date='9999-12-31' and institute_expiry_date='9999-12-31' group by school_institute_profile_id) as bus on employee_institute_profile_id = institute_profile_id
									left join (select institute_profile_id as student_institute_profile_id,count(*)as student_count from student join school on school_profile_id = student_school_profile_id join institute on school_institute_profile_id =  institute_profile_id where student_expiry_date='9999-12-31' and school_expiry_date='9999-12-31' and institute_expiry_date='9999-12-31' group by school_institute_profile_id ) as student on student_institute_profile_id = institute_profile_id")->result_array();
		}

		public function fetch_edit($id)
		{
			return $this->db->where('user_profile_id', $id)->get('users')->result_array();
		}

		public function fetch_edit1($id)
		{
			return $this->db->select('user_password')->where('user_profile_id', $id)->get('users')->result_array();
		}

		public function update($data, $id)					
		{
			return $this->db->set($data)->where('user_profile_id',$id)->update("users", $data);
		}

		function fetch_institute_details($institute_profile_id)
		{
			return $this->db->where('institute_profile_id', $institute_profile_id)->get('institute')->result_array();
		}

		function update_details_institute($institute_update)
		{
			// print_r($institute_update);die();
			$this->db->query("UPDATE school SET 
				school_tracking='".$institute_update['institute_tracking']."',
				school_CRM='".$institute_update['institute_CRM']."',
				school_stop_sms='".$institute_update['institute_stop_sms']."',
				school_school_sms='".$institute_update['institute_school_sms']."',
				school_student_absent_sms='".$institute_update['institute_school_sms']."',
				school_student_birth_sms='".$institute_update['institute_school_sms']."',
				school_employee_salary_sms='".$institute_update['institute_school_sms']."',
				school_student_fee_remainder_sms='".$institute_update['institute_school_sms']."',
				school_authentication_details_sms='".$institute_update['institute_school_sms']."',
				school_parent_birth_sms='".$institute_update['institute_school_sms']."',
				school_employee_birth_sms='".$institute_update['institute_school_sms']."',
				school_homework_sms='".$institute_update['institute_school_sms']."',
				school_parentmeet_sms='".$institute_update['institute_school_sms']."',
				school_Newsfeed_sms='".$institute_update['institute_school_sms']."',
				school_circular_sms='".$institute_update['institute_school_sms']."',
				school_event_sms='".$institute_update['institute_school_sms']."',
				school_holiday_sms='".$institute_update['institute_school_sms']."',
				school_enquiry_sms='".$institute_update['institute_school_sms']."' 
				WHERE school_institute_profile_id =".$institute_update['institute_profile_id']."");
			$this->db->set($institute_update)->where('institute_profile_id', $institute_update['institute_profile_id'])->update('institute');
			return 0;
		}

		function user_fetch($employee_profile_id)
		{
			return $this->db->where('employee_profile_id',$employee_profile_id)->get("employee")->result_array();
		}

		function update_user_details($employee_update)
		{
			$this->db->set($employee_update)->where('employee_profile_id',$employee_update['employee_profile_id'])->update("employee", $employee_update);
			return 0;
		}

		function institute_employee_disable($institute_disable)
		{
			$this->db->set($institute_disable)->where('employee_profile_id', $institute_disable['employee_profile_id'])->update('employee');
			return 0;
		}

		function institute_employee_enable($institute_enable)
		{
			$this->db->set($institute_enable)->where('employee_profile_id', $institute_enable['employee_profile_id'])->update('employee');
			return 0;
		}

		function institute_activate($institute_profile_id)
		{
			$this->db->query("update institute set institute_expiry_date = '9999-12-31' where institute_profile_id =".$institute_profile_id."");
			return 1;
		}
		function institute_deactivate($institute_profile_id)
		{
			$date = date('Y-m-d');
  			$this->db->query("update institute set institute_expiry_date = '".$date."' where institute_profile_id =".$institute_profile_id."");
			return 1;
		}

		function already_exits_mobile($num)
		{
			$data = $this->db->where('employee_pri_mobile_number',$num['mobile'])->where('employee_school_profile_id',$num['profile_id'])->get('employee');
			return $data->num_rows();
		}

		function already_exits_email($email)
		{
			$data = $this->db->where('employee_email_id',$email['mail'])->where('employee_school_profile_id',$email['profile_id'])->get('employee');
			return $data->num_rows();
		}

		function forgot_password($employee_password)
		{
			$this->db->set($employee_password)->where('credential_profile_id',$employee_password['credential_profile_id'])->where('credential_user_type','2')->update('credential');
		}

		function fetch_user_update_mail($data)			
		{
			return $this->db->where('user_profile_id',$data['profile_id'])->get('users')->result_array();
		}

		function institute_disable($institute_disable)
		{
			$this->db->set($institute_disable)->where('institute_profile_id',$institute_disable['institute_profile_id'])->update('institute');
			$this->db->query('update school set school_expiry_date="'.$institute_disable['institute_expiry_date'].'" where school_institute_profile_id='.$institute_disable['institute_profile_id'].'');
			$this->db->query('update credential set credential_m_key="" where credential_user_type!="7" and credential_user_type!="1" and credential_profile_id in (select employee_profile_id from employee join school on employee_school_profile_id=school_profile_id where school_institute_profile_id='.$institute_disable['institute_profile_id'].')');
			$this->db->query('update credential set credential_m_key="" where credential_user_type="7" and credential_profile_id in (select parent_profile_id from parent join school on parent_school_profile_id=school_profile_id where  school_institute_profile_id='.$institute_disable['institute_profile_id'].')');
			return 0;
		}

		function institute_enable($institute_enable)
		{
			$this->db->set($institute_enable)->where('institute_profile_id',$institute_enable['institute_profile_id'])->update('institute');
			$this->db->query('update school set school_expiry_date="'.$institute_enable['institute_expiry_date'].'" where school_institute_profile_id='.$institute_enable['institute_profile_id'].'');
			return 0;
		}

		function update_institute_logo($data)
		{
			$this->db->set($data)->where('institute_profile_id',$data['institute_profile_id'])->update('institute');
			return 0;
		}

		function fetch_school()
		{
			return $this->db->where('school_expiry_date','9999-12-31')->get('school')->result_array();
		}
		
		function sms($no,$msg)
		{
		    $no = "91".$no;
		    $ch=curl_init();
		    $message = $msg;
		    $message = urlencode($message);
			curl_setopt($ch,CURLOPT_URL,"http://smsapi.24x7sms.com/api_2.0/SendSMS.aspx?APIKEY=28QHnbg118a&MobileNo=".$no."&SenderID=SYNTEC&Message=".$message."&ServiceName=TEMPLATE_BASED");
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		    $output =curl_exec($ch);
		    curl_close($ch);

		    return true;
		}
	}

?>