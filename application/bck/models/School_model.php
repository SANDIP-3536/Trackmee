<?php 

	class School_model extends CI_Model
	{
		
		function add_school_registration($school_registration)
		{
			$this->db->insert('school',$school_registration);
			return 0;
		}

		function add_school_user($school_employee)
		{
			$this->db->insert('employee', $school_employee);
			$query = $this->db->query('Select * from employee ORDER BY employee_profile_id DESC limit 1');
			return $query->result_array();
		}

		function fetch_school($school_institute_profile_id)
		{
			return $this->db->query("SELECT school.*,employee_count,student_count,bus_count from school left join (select school_profile_id as employee_school_profile_id,count(*)as employee_count from employee join school on school_profile_id = employee_school_profile_id where employee_expiry_date='9999-12-31' group by employee_school_profile_id) as bus on employee_school_profile_id = school_profile_id left join (select school_profile_id as student_school_profile_id,count(*)as student_count from student join school on school_profile_id = student_school_profile_id where student_expiry_date='9999-12-31' group by student_school_profile_id ) as student on student_school_profile_id = school_profile_id left join (select school_profile_id as bus_school_profile_id,count(*)as bus_count from bus join school on school_profile_id = bus_school_profile_id where bus_expiry_date='9999-12-31' group by bus_school_profile_id ) as bus_details on bus_school_profile_id = school_profile_id where school_institute_profile_id =".$school_institute_profile_id."")->result_array();
		}

		function fetch_functionality($school)
		{
			$trac_CRM =  $this->db->query('SELECT * FROM employee join school on employee_school_profile_id = school_profile_id join institute on school_institute_profile_id = institute_profile_id where employee_profile_id = '.$school['user_profile_id'].'');
			return $trac_CRM->result_array();
		}

		function school_user_credential($institute_credential)
		{
			$this->db->insert('credential', $institute_credential);
		}

		function fetch_school_id($id)
		{
			return $this->db->query("SELECT * FROM school join institute on school_institute_profile_id = institute_profile_id where school_profile_id = ".$id."")->result_array();
		}

		function update_details_school($data)
		{
			$this->db->set($data)->where('school_profile_id', $data['school_profile_id'])->update('school');
		}

		function school_details($school_profile_id)
		{
			return $this->db->query("SELECT * FROM `school` join institute on school_institute_profile_id = institute_profile_id")->result_array();
		}

		function user_details($school_profile_id)
		{
			return $this->db->where('employee_type','3')->where('employee_school_profile_id', $school_profile_id)->where('employee_expiry_date', '9999-12-31')->get('employee')->result_array();
		}

		function principle_details($school_profile_id)
		{
			return $this->db->where('employee_type','4')->where('employee_school_profile_id', $school_profile_id)->where('employee_expiry_date', '9999-12-31')->get('employee')->result_array();
		}

		function update_user_details($data)
		{
			$this->db->set($data)->where('user_profile_id', $data['user_profile_id'])->update('users');
			return 0;
		}

		function user_profile($admin)
		{
			return $this->db->where('employee_profile_id',$admin['user_profile_id'])->get('employee')->result_array();
		}

		function school_disable($data)
		{
			$this->db->set($data)->where('school_profile_id',$data['school_profile_id'])->update('school');
			return 0;
		}

		function school_enable($data)
		{
			$this->db->set($data)->where('school_profile_id',$data['school_profile_id'])->update('school');
			return 0;
		}

		function update_school_logo($data)
		{
			$this->db->set($data)->where('school_profile_id',$data['school_profile_id'])->update('school');
			return 0;
		}

		function add_school_class($data)
		{
			$this->db->insert('class', $data);
		}

		function fetch_school_class()
		{
			return $this->db->get('class')->result_array();
		}

		function add_school_division($data)
		{
			$this->db->insert('division', $data);
		}

		function fetch_school_division()
		{
			return $this->db->get('division')->result_array();
		}

		function user_fetch($employee_profile_id)
		{
			return $this->db->where('employee_profile_id',$employee_profile_id)->get("employee")->result_array();
		}

		function school_user_disable($disable_employee)
		{
			$this->db->set($disable_employee)->where('employee_profile_id', $disable_employee['employee_profile_id'])->update('employee');
			return 0;
		}

		function school_user_enable($enable_employee)
		{
			$this->db->set($enable_employee)->where('employee_profile_id', $enable_employee['employee_profile_id'])->update('employee');
			return 0;
		}

		function already_exits_mobile($num)
		{
			$data = $this->db->where('employee_pri_mobile_number',$num['mobile'])->where('employee_school_profile_id',$num['profile'])->where('employee_type',3)->get('employee');
			return $data->num_rows();
		}

		function already_exits_email($email)
		{
			$data = $this->db->where('employee_email_id',$email['mail'])->where('employee_school_profile_id',$email['profile'])->where('employee_type',3)->get('employee');
			return $data->num_rows();
		}

		function forgot_password($data)
		{
			$this->db->set($data)->where('credential_profile_id',$data['credential_profile_id'])->where('credential_user_type','3')->update('credential');
		}

		function fetch_user_update_mail($data)			
		{
			return $this->db->where('employee_profile_id',$data['credential_profile_id'])->get('employee')->result_array();
		}

		function acadmic_year_registration($AY)
		{
			$this->db->insert('academic_year',$AY);
			// $school_id = $this->db->query("SELECT AY_id FROM `academic_year` order by AY_id DESC limit 1")->result_array();
			// $this->db->query("UPDATE school SET school_AY_id =".$school_id[0]['AY_id']." WHERE school_profile_id =".$AY['AY_school_profile_id']."");

			// print_r($school_id);die();
			return 1;
		}

		function fetch_acadmic_year()
		{
			return $this->db->query("SELECT 
					institute_name
					,AY_id
					,AY_name
					,case when AY_start_month='1' then 'January' when AY_start_month='2' then 'February' when AY_start_month='3' then 'March' when AY_start_month='4' then 'April' when AY_start_month='5' then 'May' when AY_start_month='6' then 'June' when AY_start_month='7' then 'July' when AY_start_month='8' then 'August' when AY_start_month='9' then 'September' when AY_start_month='10' then 'October' when AY_start_month='11' then 'November' when AY_start_month='12' then 'December' else 'NA' end as AY_start_name
					,case when AY_end_month='1' then 'January' when AY_end_month='2' then 'February' when AY_end_month='3' then 'March' when AY_end_month='4' then 'April' when AY_end_month='5' then 'May' when AY_end_month='6' then 'June' when AY_end_month='7' then 'July' when AY_end_month='8' then 'August' when AY_end_month='9' then 'September' when AY_end_month='10' then 'October' when AY_end_month='11' then 'November' when AY_end_month='12' then 'December' else 'NA' end as AY_end_name
					from institute 
					join academic_year on AY_id = institute_profile_id 
					and 
					institute_expiry_date= AY_expiry_date")->result_array();
		}

		function remove_AY_year($AY)
		{
			$this->db->set($AY)->where('AY_id',$AY['AY_id'])->update('academic_year');
			$school_id = $this->db->where('AY_id',$AY['AY_id'])->get('academic_year')->result_array();
			$this->db->set('school_AY_id','')->where('school_profile_id',$school_id[0]['AY_institute_profile_id'])->update('school');
			return 1;
		}

		function school_activate($school_profile_id)
		{
			$this->db->query("update school set school_expiry_date = '9999-12-31' where school_profile_id =".$school_profile_id."");
			return 1;
		}
		function school_deactivate($school_profile_id)
		{
			$date = date('Y-m-d');
  			$this->db->query("update school set school_expiry_date = '".$date."' where school_profile_id =".$school_profile_id."");
			return 1;
		}

		function employee_activate($employee_profile_id)
		{
			$this->db->query("update employee set employee_expiry_date = '9999-12-31' where employee_profile_id =".$employee_profile_id."");
			return 1;
		}
		function employee_deactivate($employee_profile_id)
		{
			$date = date('Y-m-d');
  			$this->db->query("update employee set employee_expiry_date = '".$date."' where employee_profile_id =".$employee_profile_id."");
			return 1;
		}
	}
 ?>