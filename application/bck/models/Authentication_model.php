<?php
	class Authentication_model extends CI_model	{

		public function login($data)
		{
			$login = $this->db->select('credential_user_type,credential_profile_id')->where('credential_username',$data['credential_username'])->where('credential_password',$data['credential_password'])->get('credential')->result_array();
			// print_r($login);die();
			
			if(empty($login) || $login[0]['credential_user_type'] == ''){
				return 1;
			}
			elseif($login[0]['credential_user_type'] == 7){
				$parent = $this->db->where('parent_profile_id',$login[0]['credential_profile_id'])->get('parent')->result_array();
				if($parent[0]['parent_expiry_date'] == '9999-12-31'){
					$this->session->set_userdata('parent',$parent);
					redirect('parent');	
				}else{
					return 2;
				}
			}
			else{
				if ($login[0]['credential_user_type'] == 2) {
					$employee = $this->db->query('SELECT credential_username,employee.*,institute.*,school.*,academic_year.* FROM credential  JOIN employee on employee_profile_id = credential_profile_id AND employee_type = credential_user_type left join institute on employee_school_profile_id = institute_profile_id left JOIN school on employee_school_profile_id = school_profile_id left join academic_year on AY_id = school_AY_id WHERE credential_profile_id ='.$login[0]['credential_profile_id'].' AND credential_user_type='.$login[0]['credential_user_type'].' and institute_expiry_date ="9999-12-31"')->result_array();
					// print_r($employee);die();
				}
				elseif($login[0]['credential_user_type'] == 1){
					$employee = $this->db->query('SELECT credential_username,employee.*,school.* FROM credential  JOIN employee on employee_profile_id = credential_profile_id AND employee_type = credential_user_type left join school on employee_school_profile_id = school_profile_id WHERE credential_profile_id ='.$login[0]['credential_profile_id'].' AND credential_user_type='.$login[0]['credential_user_type'].'')->result_array();
				}
				else{
					$employee = $this->db->query('SELECT credential_username,employee.*,academic_year.*,school.* FROM credential  JOIN employee on employee_profile_id = credential_profile_id AND employee_type = credential_user_type left join school on employee_school_profile_id = school_profile_id join academic_year on AY_id = school_AY_id WHERE credential_profile_id ='.$login[0]['credential_profile_id'].' AND school_AY_id != 0 AND credential_user_type='.$login[0]['credential_user_type'].' AND school_expiry_date = "9999-12-31"')->result_array();
					// print_r($employee);die();
				}
				if(empty($employee) || $employee[0]['employee_expiry_date'] != '9999-12-31'){
					return 2;
				}elseif($employee[0]['employee_type'] == 1){
					$this->session->set_userdata('super_admin',$employee);
					redirect('Admin');
				}elseif($employee[0]['employee_type'] == 2){
					$this->session->set_userdata('Institute',$employee);
					redirect('Institute');	
				}elseif($employee[0]['employee_type'] == 3){
					$this->session->set_userdata('school',$employee);
					redirect('School');	
				}elseif($employee[0]['employee_type'] == 4){
					$this->session->set_userdata('principal',$employee);
					redirect('principal');	
				}elseif($employee[0]['employee_type'] == 5){
					$this->session->set_userdata('teacher',$employee);
					redirect('Teacher');	
				}elseif($employee[0]['employee_type'] == 6){
					$this->session->set_userdata('driver',$employee);
					redirect('driver');	
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