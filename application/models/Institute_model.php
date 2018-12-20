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
			return $this->db->where('institute_or_school_profile_id', $data1['institute_or_school_profile_id'])->where('user_expiry_date','9999-12-31')->get('users')->result_array();
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
			return $this->db->where('employee_type','2')->where('employee_client_profile_id', $institute_profile_id)->get('employee')->result_array();
		}

		public function institute_employee_credentials($institute_credential)
		{
			$this->db->insert('credential',$institute_credential);
		}

		public function view()
		{
			return $this->db->query("select institute.*,client_count,employee_count,user_count from institute 
					left join (
					select
					client_institute_profile_id
					,count(*)as client_count
					from client
					where client_expiry_date='9999-12-31'
					group by client_institute_profile_id ) as client
					on client_institute_profile_id=institute_profile_id

					left join
					(select employee_client_profile_id,(temp_cnt+cnt1)as employee_count from (select employee_client_profile_id,count(*) as temp_cnt from employee where employee_type=2 group by 1)as institute
					,
					(select client_institute_profile_id,count(*) as cnt1 from (select
					client_institute_profile_id
					,client_profile_id
					,cnt from
					(select client_institute_profile_id,client_profile_id from client group by 1,2) as client left join (select employee_client_profile_id,count(*) as cnt from employee where employee_type=3 group by 1) as employee_count
					on employee_client_profile_id=client_profile_id)as emp group by client_institute_profile_id) as client
					where employee_client_profile_id=client_institute_profile_id) as employee
					on employee_client_profile_id=institute_profile_id

					left join

					(select client_institute_profile_id as id,sum(cnt) as user_count from (
					select client_institute_profile_id,client_profile_id,cnt from(select client_institute_profile_id,client_profile_id from client group by 1,2) as client
					left join
					(select user_client_profile_id,count(*) as cnt from user group by 1) as usr
					on client_profile_id=user_client_profile_id ) as user group by 1) as user_dtl
					on id=institute_profile_id")->result_array();
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

		function already_exits_mobile($num)
		{
			$data = $this->db->where('employee_pri_mobile_number',$num['mobile'])->where('employee_client_profile_id',$num['profile_id'])->get('employee');
			return $data->num_rows();
		}

		function already_exits_email($email)
		{
			$data = $this->db->where('employee_email_id',$email['mail'])->where('employee_client_profile_id',$email['profile_id'])->get('employee');
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
			$this->db->query('update client set client_expiry_date="'.$institute_disable['institute_expiry_date'].'" where client_institute_profile_id='.$institute_disable['institute_profile_id'].'');
			$this->db->set('employee_expiry_date',date('Y-m-d'))->where('employee_client_profile_id',$institute_disable['institute_profile_id'])->where('employee_type',2)->update('employee');
			return 0;
		}

		function institute_enable($institute_enable)
		{
			$this->db->set($institute_enable)->where('institute_profile_id',$institute_enable['institute_profile_id'])->update('institute');
			$this->db->query('update client set client_expiry_date="'.$institute_enable['institute_expiry_date'].'" where client_institute_profile_id='.$institute_enable['institute_profile_id'].'');
			$this->db->set('employee_expiry_date','9999-12-31')->where('employee_client_profile_id',$institute_enable['institute_profile_id'])->where('employee_type',2)->update('employee');
			return 0;
		}

		function update_institute_logo($data)
		{
			$this->db->set($data)->where('institute_profile_id',$data['institute_profile_id'])->update('institute');
			return 0;
		}

		function fetch_client()
		{
			return $this->db->where('client_expiry_date','9999-12-31')->get('client')->result_array();
		}
		
		function sms($no,$msg,$id)
		{
		    $id = $id;
		    $ch = curl_init();
		    $message = urlencode($msg);
		    curl_setopt($ch,CURLOPT_URL,"http://smsapi.24x7sms.com/api_2.0/SendSMS.aspx?APIKEY=28QHnbg118a&MobileNo=91".$no."&SenderID=".$id."&Message=".$message."&ServiceName=PROMOTIONAL_SPL");
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		    $output =curl_exec($ch);
		    curl_close($ch);
		    return $output;
		}

		function check_sms_active($institute_profile_id)
		{
			return $this->db->select('institute_profile_id,institute_auth_sms,institute_sms_credit ')->where('institute_profile_id',$institute_profile_id)->from('institute')->get()->result_array();
		}
		
		function set_count($institute_profile_id,$count)
		{
			$this->db->set('institute_sms_credit',$count)->where('institute_profile_id',$institute_profile_id)->update('institute');
		}

		function add_sent_sms($data)
		{
			$this->db->insert('sent_sms',$data);
		}

		function employee_details($institute_admin)
		{
			return $this->db->query("SELECT employee.*,institute.* FROM employee join institute on employee_client_profile_id = institute_profile_id WHERE employee_profile_id=".$institute_admin[0]['employee_profile_id']." and employee_type = ".$institute_admin[0]['employee_type']."")->result_array();
		}
	}
?>