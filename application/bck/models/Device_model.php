<?php 

/**
* 
*/
class Device_model extends CI_Model
{
	function fetch_institute()
	{
		return $this->db->get('institute')->result_array();
	}

	function fetch_school($institute)
	{
		return $this->db->where('school_institute_profile_id',$institute)->get('school')->result_array();
	}

	function fetch_school_record($device_school_profile_id)
	{
		$data = $this->db->select('school_name')->where('school_profile_id',$device_school_profile_id)->get('school')->result_array();
		// print_r($data[0]);die();
		return $data[0]['school_name'];
	}

	function fetch_school_device($employee_school_profile_id)
	{
		return $this->db->where('device_school_profile_id',$employee_school_profile_id)->get('device')->result_array();
	}
	function add_device($device_registration)
	{
		$this->db->insert('device', $device_registration);
	}

	function fetch_device($employee_school_profile_id)
	{
		return $this->db->query("SELECT device.*,case when school_name is NULL then 'NA' end as school_name FROM device left join school on device_school_profile_id = school_profile_id where device_expiry_date ='9999-12-31'")->result_array();
	}

	function already_exits_mobile($num)
	{
		$data = $this->db->where('device_mobile_number',$num['mobile'])->get('device');
		return $data->num_rows();
	}

	function already_exits_device($device)
	{
		$data = $this->db->where('device_id',$device['device'])->get('device');
		return $data->num_rows();
	}

	function fetch_device_update($device_id)
	{
		return $this->db->where('device_id', $device_id)->get('device')->result_array();
	}

	function update_device_details($data)
	{
		$this->db->set($data)->where('device_id',$data['device_id'])->update('device');
		return 0;
	}

	function fetch_bus_device($device_id)				
	{
		return $this->db->where('bus_device_id',$device_id)->get('bus')->result_array();
	}
	
	function disable_device($device_id)
	{
		$this->db->set('device_expiry_date', date('Y-m-d'))->where('device_id', $device_id)->update('device');
		return 0;
	}

	function enable_device($device_id)
	{
		$this->db->set('device_expiry_date', '9999-12-31')->where('device_id', $device_id)->update('device');
		return 0;
	}
}
 ?>