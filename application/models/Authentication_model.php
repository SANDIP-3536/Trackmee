<?php
	class Authentication_model extends CI_model	{

		public function login($data)
		{
			$login = $this->db->select('credential_user_type,credential_profile_id')->where('credential_username',$data['credential_username'])->where('credential_password',$data['credential_password'])->get('credential')->result_array();
			
			if(empty($login) || $login[0]['credential_user_type'] == ''){
				return 1;
			}
			else{
				if($login[0]['credential_user_type'] == 1){
					$employee = $this->db->select('credential_username,employee_type,employee_profile_id')->from('credential')->join('employee','employee_profile_id = credential_profile_id')->where('credential_profile_id',$login[0]['credential_profile_id'])->where("credential_user_type",$login[0]['credential_user_type'])->where("employee_expiry_date","9999-12-31")->get()->result_array();
				}
				elseif ($login[0]['credential_user_type'] == 2) {
					$employee = $this->db->select('credential_username,employee_profile_id,employee_type,employee_client_profile_id')->from('credential')->join('employee','employee_profile_id = credential_profile_id')->join('institute','employee_client_profile_id = institute_profile_id','left')->where('credential_profile_id',$login[0]['credential_profile_id'])->where("credential_user_type",$login[0]['credential_user_type'])->where("employee_expiry_date","9999-12-31")->where("institute_expiry_date","9999-12-31")->get()->result_array();
				}
				elseif ($login[0]['credential_user_type'] == 3) {
					$employee = $this->db->select('credential_username,employee_profile_id,employee_type,employee_client_profile_id')->from('credential')->join('employee','employee_profile_id = credential_profile_id','credential_user_type = employee_type')->join('client','employee_client_profile_id = client_profile_id')->join('institute','client_institute_profile_id = institute_profile_id')->where('credential_profile_id',$login[0]['credential_profile_id'])->where("credential_user_type",$login[0]['credential_user_type'])->where("employee_expiry_date","9999-12-31")->where("institute_expiry_date","9999-12-31")->where("credential_user_type","3")->where("client_expiry_date","9999-12-31")->get()->result_array();
					// print_r($employee);die();
				}
				else{
					return 2;
				}
				if(empty($employee)){
					return 2;
				}elseif($employee[0]['employee_type'] == 1){
					$this->session->set_userdata('super_admin',$employee);
					redirect('Admin');
				}elseif($employee[0]['employee_type'] == 2){
					$this->session->set_userdata('Institute',$employee);
					redirect('Tracking/view_map_table_institute');	
				}elseif($employee[0]['employee_type'] == 3){
					$this->session->set_userdata('client',$employee);
					// redirect('Client');	
					redirect('Tracking/view_map_table');	
				}elseif($employee[0]['employee_type'] == 4){
					$this->session->set_userdata('principal',$employee);
					redirect('principal');	
				}
			}
		}

		public function admin_registration($data)
		{
			$this->db->insert('users',$data);
		}

		public function user_check($data)
		{
			$user_cnt = $this->db->query('SELECT * FROM `credential` WHERE credential_username = "'.$data['credential_username'].'"')->result_array();
			if($user_cnt[0]['credential_user_type'] != 7 ){
				$acc_type = $this->db->query('SELECT * FROM `employee` WHERE employee_profile_id = "'.$user_cnt[0]['credential_profile_id'].'"')->result_array();
				if($acc_type[0]['employee_expiry_date'] != '9999-12-31'){
					return 5;
				}
				$user_details['email_id'] = $acc_type[0]['employee_email_id'];
				$user_details['mobile_number'] = $acc_type[0]['employee_pri_mobile_number'];
				return $user_details;	
			}
			if($user_cnt[0]['credential_user_type'] == 7 ){
				$acc_type7 = $this->db->query('SELECT * FROM `parent` WHERE parent_profile_id = "'.$user_cnt[0]['credential_profile_id'].'"')->result_array();
					if($acc_type7[0]['parent_expiry_date'] != '9999-12-31'){
						return 5;
					}
					$user_details['email_id'] = $acc_type7[0]['parent_email_id'];
					$user_details['mobile_number'] = $acc_type7[0]['parent_mobile_number'];
					return $user_details;
				}
			return 5;
		}

		public function update($data1)					
		{
			$this->db->set($data1)->where('credential_username', $data1['credential_username'])->update("credential", $data1);	
		}

		public function otp_check($data)
		{
			$otp_check = $this->db->where('credential_username', $data['credential_username'])->where('otp', $data['otp'])->get('credential')->num_rows();
			if($otp_check == 0){
				return 6;
			}
		}

		public function update_pass($data1)					
		{
			$this->db->set($data1)->where('credential_username', $data1['credential_username'])->update("credential", $data1);
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