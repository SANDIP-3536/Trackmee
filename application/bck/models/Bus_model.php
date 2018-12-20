<?php 

	class Bus_model extends CI_Model
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
			return $data[0]['school_name'];
		}

		function add_bus($bus_registration)
		{
			if($this->db->insert('bus',$bus_registration)){
				return 0;
			}
		}	

		function fetch_bus($employee_school_profile_id)
		{
			return $this->db->get('bus')->result_array();
		}

		function fetch_school_bus($employee_school_profile_id)
		{
			return $this->db->where('bus_school_profile_id',$employee_school_profile_id)->get('bus')->result_array();
		}

		function fetch_device($employee_school_profile_id)
		{
			return $this->db->where('device_expiry_date','9999-12-31')->get('device')->result_array();
		}

		function fetch_bus_details($bus_id)
		{
			return $this->db->query("SELECT bus.*,case when school_name is NULL then 'NA' else school_name end as school_name FROM bus left join school on school_profile_id = bus_school_profile_id where bus_id=".$bus_id."")->result_array();
		}

		function update_bus($bus_update)
		{
			$this->db->set($bus_update)->where('bus_id',$bus_update['bus_id'])->update('bus');
			return 0;
		}

		function bus_assign($bus_id)
		{
			return $this->db->where('DBR_bus_id',$bus_id)->get('driver_bus_route_assgn')->result_array();
		}
		function deactive($bus_id)
		{
			$this->db->set('bus_expiry_date', date('Y-m-d'))->where('bus_id',$bus_id)->update('bus');
			return 0;
			// $this->db->set('DBR_expiry_date', date('Y-m-d'))->where('DBR_bus_id',$bus_id)->update('driver_bus_route_assgn');
		}

		function active($bus_id)
		{
			$this->db->set('bus_expiry_date', '9999-12-31')->where('bus_id',$bus_id)->update('bus');
			// $this->db->set('DBR_expiry_date', '9999-12-31')->where('DBR_bus_id',$bus_id)->update('driver_bus_route_assgn');
		}

		function already_exits_bus($num)
		{
			return $this->db->where('bus_no',$num['bus'])->get('bus')->num_rows();
		}

		function already_exits_bus_device($bus_device)
		{
			return $this->db->where('bus_device_id',$bus_device['device'])->get('bus')->num_rows();
		}

		function already_exits_school_bus($update_bus)
		{
			return $this->db->where('bus_no',$update_bus['bus_no'])->where('bus_school_profile_id',$update_bus['bus_school_profile_id'])->get('bus')->num_rows();
		}
	}
?>