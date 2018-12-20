<?php 
	class Driver_bus_route_assgn_model extends CI_Model
	{
		function fetch_driver($employee_client_profile_id)
		{
			if (isset($this->session->userdata['client'])) {
				return $this->db->select('client_name,employee.*')->from('employee')->join('client','client_profile_id = employee_client_profile_id')->where('employee_client_profile_id',$employee_client_profile_id)->where('employee_type','5')->where('employee_expiry_date','9999-12-31')->get()->result_array();
        	}elseif (isset($this->session->userdata['Institute'])) {
				return $this->db->query("SELECT client_name,employee.* FROM `employee` join client on client_profile_id = employee_client_profile_id where employee_client_profile_id IN (select client_profile_id from client where client_institute_profile_id = ".$employee_client_profile_id.") and employee_type = '5' and employee_expiry_date='9999-12-31'")->result_array();
        	}
			
		}

		function fetch_all_bus($employee_client_profile_id,$DBR_id)
		{
			if (isset($this->session->userdata['client'])) {
				return $this->db->query("SELECT client_name,bus.* FROM `bus` join client on client_profile_id = bus_client_profile_id where bus_client_profile_id=".$employee_client_profile_id." and bus_expiry_date='9999-12-31' and bus_id NOT IN (select DBR_bus_id from driver_bus_route_assgn where DBR_id = ".$DBR_id.")")->result_array();
        	}elseif (isset($this->session->userdata['Institute'])) {
				return $this->db->query("SELECT client_name,bus.* FROM `bus` join client on client_profile_id = bus_client_profile_id where bus_client_profile_id IN (select client_profile_id from client where client_institute_profile_id = ".$employee_client_profile_id.") and bus_expiry_date='9999-12-31' and bus_id NOT IN (select DBR_bus_id from driver_bus_route_assgn where DBR_id = ".$DBR_id.")")->result_array();
        	}
		}

		function fetch_bus($driver)
		{
			return $this->db->query("select bus.* from bus join employee on employee_client_profile_id = bus_client_profile_id where employee_profile_id = ".$driver." and bus_expiry_date='9999-12-31'")->result_array();
		}
		function fetch_bus11($employee_client_profile_id)
		{
			if (isset($this->session->userdata['client'])) {
				return $this->db->query('SELECT * FROM bus where bus_id NOT IN (select DBR_bus_id from driver_bus_route_assgn where DBR_expiry_date="9999-12-31" and DBR_client_profile_id = '.$employee_client_profile_id.')  and bus_expiry_date = "9999-12-31" and bus_client_profile_id = '.$employee_client_profile_id.'')->result_array();
			}elseif (isset($this->session->userdata['Institute'])) {
				return $this->db->query("SELECT * FROM bus where bus_id NOT IN (select DBR_bus_id from driver_bus_route_assgn where DBR_expiry_date='9999-12-31' and DBR_client_profile_id IN (select client_profile_id from client where client_institute_profile_id = ".$employee_client_profile_id."))  and bus_expiry_date = '9999-12-31' and bus_client_profile_id IN (select client_profile_id from client where client_institute_profile_id = ".$employee_client_profile_id.")")->result_array();
			}
		}

		function fetch_client($driver)
		{
			return $this->db->query("select client_name,client_profile_id from client join employee on employee_client_profile_id = client_profile_id where employee_profile_id = ".$driver." group by 2")->result_array();
		}

		function fetch_route($employee_client_profile_id)
		{
			if (isset($this->session->userdata['client'])) {
				return $this->db->query('SELECT route_name,route_no FROM route where route_no NOT IN (select DBR_route_no from driver_bus_route_assgn where DBR_expiry_date="9999-12-31" and DBR_client_profile_id = '.$employee_client_profile_id.')  and route_expiry_date = "9999-12-31" and route_client_profile_id = '.$employee_client_profile_id.' GROUP BY route_name,route_no ORDER BY route_no')->result_array();
			}elseif (isset($this->session->userdata['Institute'])) {
				return $this->db->query("SELECT route_name,route_no FROM route where route_no NOT IN (select DBR_route_no from driver_bus_route_assgn where DBR_expiry_date='9999-12-31' and DBR_client_profile_id  IN (select client_profile_id from client where client_institute_profile_id = ".$employee_client_profile_id."))  and route_expiry_date = '9999-12-31' and route_client_profile_id IN (select client_profile_id from client where client_institute_profile_id = ".$employee_client_profile_id.") GROUP BY route_name,route_no ORDER BY route_no")->result_array();
			}
		}

		function fetch_assign($employee_client_profile_id)
		{
			if (isset($this->session->userdata['client'])) {
				return $this->db->query("SELECT employee_first_name,employee_last_name,employee_middle_name,DBR_id,bus_no,route_name,client_name from employee join driver_bus_route_assgn on employee_profile_id = DBR_driver_id join bus on bus_id = DBR_bus_id join route on route_id = DBR_route_no join client on client_profile_id = DBR_client_profile_id WHERE DBR_client_profile_id  = ".$employee_client_profile_id." AND DBR_expiry_date='9999-12-31'")->result_array();
			}elseif (isset($this->session->userdata['Institute'])) {
				return $this->db->query("SELECT employee_first_name,employee_last_name,employee_middle_name,DBR_id,bus_no,route_name,client_name from employee join driver_bus_route_assgn on employee_profile_id = DBR_driver_id join bus on bus_id = DBR_bus_id join route on route_id = DBR_route_no join client on client_profile_id = DBR_client_profile_id WHERE DBR_client_profile_id  IN (select client_profile_id from client where client_institute_profile_id = ".$employee_client_profile_id.") AND driver_bus_route_assgn.DBR_expiry_date='9999-12-31'")->result_array();
			}
		}

		function add_driver_bus_route_assign($DBR)			
		{
			$this->db->insert('driver_bus_route_assgn',$DBR);
			return 0;
		}

		function disable_DBR($DBR)
		{
			$this->db->set($DBR)->where('DBR_id',$DBR['DBR_id'])->update('driver_bus_route_assgn');
			$SS_id = $this->db->query("SELECT SS_id FROM `driver_bus_route_assgn` join route on DBR_route_no=route_no join stop on route_id=stop_route_id join user_stop_assgn on SS_type_1_stop_id=stop_id and DBR_bus_id=SS_bus_id where DBR_id=".$DBR['DBR_id']."")->result_array();
			$cnt = count($SS_id);
			for ($i=0; $i < $cnt; $i++) {
				$this->db->where('SS_id',$SS_id[$i]['SS_id'])->delete("user_stop_assgn");
			}
			return 0;
		}

		function already_exits_driver($data1)
		{
			$data = $this->db->where('DBR_driver_id',$data1['driver'])->where('DBR_client_profile_id',$data1['employee_client_profile_id'])->get('driver_bus_route_assgn');
			return $data->num_rows();
		}

		function fetch_DBR_record($DBR_id)
		{
			return $this->db->select('DBR_id,employee_first_name,employee_middle_name,employee_last_name,employee_profile_id,employee_middle_name,bus_no,route_name,bus_id,route_id')->from('driver_bus_route_assgn')->join('employee','DBR_driver_id = employee_profile_id')->join('bus','bus_id = DBR_bus_id')->join('route','DBR_route_no = route_no')->where('DBR_id',$DBR_id)->group_by('route_no')->get()->result_array();
		}

		function already_exits_bus($data1)
		{
			$data = $this->db->where('DBR_bus_id',$data1['bus'])->where('DBR_client_profile_id',$data1['employee_client_profile_id'])->get('driver_bus_route_assgn');
			return $data->num_rows();
		}

		function already_exits_route($data4)
		{
			$data = $this->db->where('DBR_route_id',$data4['route'])->where('DBR_client_profile_id',$data4['employee_client_profile_id'])->get('driver_bus_route_assgn');
			return $data->num_rows();
		}

		function fetch_name($driver_id)
		{
			$data= $this->db->query('select driver_first_name,driver_last_name,driver_middle_name,bus_no, route_name from driver,bus,route where driver_profile_id='.$driver_id['driver_id'].' AND bus_id='.$driver_id['bus_id'].' AND route_id='.$driver_id['route_id'].'');
			return $data->result_array();
		}

		function fetch_driver_record($id)
		{
			$data = $this->db->select('employee_first_name,employee_middle_name,employee_last_name')->where('employee_profile_id',$id)->get('employee')->result_array();

			return $data;
		}

		function fetch_bus_record($id)
		{
			$data = $this->db->select('bus_no')->where('bus_id',$id)->get('bus')->result_array();
			return $data;
		}

		function fetch_route_record($id)
		{
			$data = $this->db->select('route_name')->where('route_no',$id)->get('route')->result_array();
			return $data;
		}
	}
 ?>