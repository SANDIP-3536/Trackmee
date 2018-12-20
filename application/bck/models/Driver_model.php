<?php 

	/**
	* 
	*/
	class Driver_model extends CI_Model
	{
		
		function driver_add($employee_driver)
		{
			$this->db->insert('employee', $employee_driver);
			$query = $this->db->query('Select * from employee ORDER BY employee_profile_id DESC limit 1');
			return $query->result_array();
		}

		function driver_credential($driver_credential)
		{
			$this->db->insert('credential', $driver_credential);
		}

		function employee_document($employee_driver_document)
		{
			$this->db->insert('document', $employee_driver_document);
		}

		function fetch_driver($employee_school_profile_id)
		{
			return $this->db->where('employee_school_profile_id', $employee_school_profile_id)->where('employee_type',6)->get('employee')->result_array();
		}

		function update_driver($employee_profile_id)
		{
			return $this->db->where('employee_profile_id', $employee_profile_id)->get('employee')->result_array();
		}	

		function update_driver_details($update_driver)
		{
			$this->db->set($update_driver)->where('employee_profile_id',$update_driver['employee_profile_id'])->update('employee');
			return 0;
		}
		
		function driver_assign($employee_profile_id)
		{
			return $this->db->where('DBR_driver_id',$employee_profile_id)->get('driver_bus_route_assgn')->result_array();
		}
		function deactive($employee_profile_id)
		{
			$this->db->set('employee_expiry_date', date('Y-m-d'))->where('employee_profile_id',$employee_profile_id)->update('employee');
			// $this->db->set('DBR_expiry_date', date('Y-m-d'))->where('DBR_bus_id',$bus_id)->update('driver_bus_route_assgn');
			return 0;
		}

		function active($employee_profile_id)
		{
			$this->db->set('employee_expiry_date', '9999-12-31')->where('employee_profile_id',$employee_profile_id)->update('employee');
			// $this->db->set('DBR_expiry_date', '9999-12-31')->where('DBR_bus_id',$bus_id)->update('driver_bus_route_assgn');
			return 0;
		}
		
		function already_exits_mobile($mobile)
		{
			$data = $this->db->where('employee_pri_mobile_number',$mobile['mobile'])->where('employee_school_profile_id',$mobile['profile_id'])->where('employee_type',6)->get('employee');
			return $data->num_rows();
		}

		function already_exits_email($email)
		{
			$data = $this->db->where('employee_email_id',$email['mail'])->where('employee_school_profile_id',$email['profile_id'])->where('employee_type',6)->get('employee');
			return $data->num_rows();
		}

		function already_exits_license($license)
		{
			$data = $this->db->where('doc_number',$license['license'])->where('doc_school_profile_id',$license['profile_id'])->where('doc_user_type',6)->get('document');
			return $data->num_rows();
		}

		function document_details($student)
		{
			return $this->db->where('doc_user',$student['student_profile_id'])->where('doc_user_type','6')->get('document')->result_array();
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