<?php 
	class Client_model extends CI_Model
	{
		function employee_details($client_admin)
		{
			return $this->db->query("select employee.*,client.*,institute.* from credential  join employee on credential_user_type = employee_type and credential_profile_id = employee_profile_id  join client on client_profile_id = employee_client_profile_id  join institute on client_institute_profile_id = institute_profile_id  where employee_profile_id =".$client_admin[0]['employee_profile_id']."  and employee_type =".$client_admin[0]['employee_type']."  and employee_expiry_date ='9999-12-31'  and client_expiry_date ='9999-12-31'  and institute_expiry_date = '9999-12-31'")->result_array();
		}
		
		function add_client_registration($client_registration)
		{
			$this->db->insert('client',$client_registration);
			return 0;
		}

		function add_school_user($school_employee)
		{
			$this->db->insert('employee', $school_employee);
			$query = $this->db->query('Select * from employee ORDER BY employee_profile_id DESC limit 1');
			return $query->result_array();
		}

		function fetch_client($client_institute_profile_id)
		{
			return $this->db->query("SELECT client.*,employee_count,user_count,bus_count from client left join (select client_profile_id as employee_client_profile_id,count(*)as employee_count from employee join client on client_profile_id = employee_client_profile_id where employee_expiry_date='9999-12-31' and employee_type IN (3,5) group by employee_client_profile_id) as bus on employee_client_profile_id = client_profile_id left join (select client_profile_id as user_client_profile_id,count(*)as user_count from user join client on client_profile_id = user_client_profile_id where user_expiry_date='9999-12-31' group by user_client_profile_id ) as user on user_client_profile_id = client_profile_id left join (select client_profile_id as bus_client_profile_id,count(*)as bus_count from bus join client on client_profile_id = bus_client_profile_id where bus_expiry_date='9999-12-31' group by bus_client_profile_id ) as bus_details on bus_client_profile_id = client_profile_id where client_institute_profile_id =".$client_institute_profile_id."")->result_array();
		}

		function fetch_functionality($school)
		{
			$trac_CRM =  $this->db->query('SELECT * FROM employee join client on employee_school_profile_id = school_profile_id join institute on school_institute_profile_id = institute_profile_id where employee_profile_id = '.$school['user_profile_id'].'');
			return $trac_CRM->result_array();
		}

		function school_user_credential($institute_credential)
		{
			$this->db->insert('credential', $institute_credential);
		}

		function fetch_client_id($id)
		{
			return $this->db->query("SELECT * FROM client join institute on client_institute_profile_id = institute_profile_id where client_profile_id = ".$id."")->result_array();
		}

		function update_details_client($data)
		{
			$this->db->set($data)->where('client_profile_id', $data['client_profile_id'])->update('client');
		}

		function client_details($client_profile_id)
		{
			return $this->db->query("SELECT * FROM `client` join institute on client_institute_profile_id = institute_profile_id where client_profile_id = ".$client_profile_id."")->result_array();
		}

		function user_details($client_profile_id)
		{
			return $this->db->where('employee_type','3')->where('employee_client_profile_id', $client_profile_id)->where('employee_expiry_date', '9999-12-31')->get('employee')->result_array();
		}

		function principle_details($client_profile_id)
		{
			return $this->db->where('employee_type','4')->where('employee_client_profile_id', $client_profile_id)->where('employee_expiry_date', '9999-12-31')->get('employee')->result_array();
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

		function client_disable($data)
		{
			$this->db->set($data)->where('client_profile_id',$data['client_profile_id'])->update('client');
			return 0;
		}

		function client_enable($data)
		{
			$this->db->set($data)->where('client_profile_id',$data['client_profile_id'])->update('client');
			return 0;
		}

		function update_client_logo($data)
		{
			$this->db->set($data)->where('client_profile_id',$data['client_profile_id'])->update('client');
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

		function client_user_disable($disable_employee)
		{
			$this->db->set($disable_employee)->where('employee_profile_id', $disable_employee['employee_profile_id'])->update('employee');
			return 0;
		}

		function client_user_enable($enable_employee)
		{
			$this->db->set($enable_employee)->where('employee_profile_id', $enable_employee['employee_profile_id'])->update('employee');
			return 0;
		}

		function already_exits_mobile($num)
		{
			$data = $this->db->where('employee_pri_mobile_number',$num['mobile'])->where('employee_client_profile_id',$num['profile'])->where('employee_type',3)->get('employee');
			return $data->num_rows();
		}

		function already_exits_email($email)
		{
			$data = $this->db->where('employee_email_id',$email['mail'])->where('employee_client_profile_id',$email['profile'])->where('employee_type',3)->get('employee');
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

		function client_activate($school_profile_id)
		{
			$this->db->query("update school set school_expiry_date = '9999-12-31' where school_profile_id =".$school_profile_id."");
			return 1;
		}
		function client_deactivate($school_profile_id)
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

		function check_sms_active($client_profile_id)
		{
			return $this->db->select('institute_profile_id,institute_auth_sms,institute_sms_credit ')->from('client')->join('institute','client_institute_profile_id=institute_profile_id')->where('client_profile_id',$client_profile_id)->get()->result_array();
		}
	}
 ?>