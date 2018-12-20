<?php 

	class Bus_model extends CI_Model
	{

		function fetch_institute()
		{
			return $this->db->get('institute')->result_array();
		}

		function fetch_client($institute)
		{
			return $this->db->where('client_institute_profile_id',$institute)->get('client')->result_array();
		}

		function add_bus($bus_registration)
		{
			if($this->db->insert('bus',$bus_registration)){
				return 0;
			}
		}	

		function fetch_bus($employee_client_profile_id)
		{
			return $this->db->query("SELECT bus.*,case when client_name is NULL then 'N/A' else client_name end as client_name  FROM bus left join client on bus_client_profile_id = client_profile_id")->result_array();
		}

		function fetch_client_bus($employee_client_profile_id)
		{
			if (isset($this->session->userdata['client'])) {
				return $this->db->query("select bus.*,client_name from bus join client on bus_client_profile_id = client_profile_id where bus_client_profile_id =".$employee_client_profile_id."")->result_array();
        	}elseif (isset($this->session->userdata['Institute'])) {
				return $this->db->query("select bus.*,client_name from bus join client on bus_client_profile_id = client_profile_id where bus_client_profile_id IN (select client_profile_id from client where client_institute_profile_id =".$employee_client_profile_id.")")->result_array();
        	}
			
		}

		function fetch_device($employee_client_profile_id)
		{
			return $this->db->where('device_expiry_date','9999-12-31')->get('device')->result_array();
		}

		function fetch_bus_details($bus_id)
		{
			return $this->db->query('SELECT client_name, bus.* FROM client right join bus on client_profile_id = bus_client_profile_id where bus_id='.$bus_id.'')->result_array();
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

		function already_exits_client_bus($update_bus)
		{
			return $this->db->where('bus_device_id',$update_bus['bus_device_id'])->where('bus_client_profile_id',$update_bus['bus_client_profile_id'])->get('bus')->num_rows();
		}
	}
?>