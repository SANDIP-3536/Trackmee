<?php 
	class Driver_bus_route_assgn_model extends CI_Model
	{
		
		function fetch_driver($employee_school_profile_id)
		{
			return $this->db->where('employee_school_profile_id',$employee_school_profile_id)->where('employee_type',6)->get('employee')->result_array();
			// return $this->db->query('SELECT * FROM employee where employee_profile_id NOT IN (select DBR_driver_id from driver_bus_route_assgn where DBR_expiry_date="9999-12-31" and DBR_school_profile_id = '.$employee_school_profile_id.') and employee_type = 6 and employee_expiry_date ="9999-12-31" and employee_school_profile_id = '.$employee_school_profile_id.'')->result_array();
		}

		function fetch_bus($employee_school_profile_id)
		{
			return $this->db->where('bus_school_profile_id',$employee_school_profile_id)->get('bus')->result_array();
			// return $this->db->query('SELECT * FROM bus where bus_id NOT IN (select DBR_bus_id from driver_bus_route_assgn where DBR_expiry_date="9999-12-31" and DBR_school_profile_id = '.$employee_school_profile_id.')  and bus_expiry_date = "9999-12-31" and bus_school_profile_id = '.$employee_school_profile_id.'')->result_array();

		}

		function fetch_route($employee_school_profile_id)
		{
			return $this->db->query('SELECT route_name,route_no FROM route where route_no NOT IN (select DBR_route_no from driver_bus_route_assgn where DBR_expiry_date="9999-12-31" and DBR_school_profile_id = '.$employee_school_profile_id.')  and route_expiry_date = "9999-12-31" and route_school_profile_id = '.$employee_school_profile_id.' GROUP BY route_name,route_no ORDER BY route_no')->result_array();
		}

		function fetch_assign($employee_school_profile_id)
		{
			// return $this->db->query("SELECT * FROM `driver_bus_route_assgn` JOIN driver on driver_bus_route_assgn.DBR_driver_id = driver.driver_profile_id JOIN bus ON bus.bus_id = DBR_bus_id JOIN route on route.route_no = driver_bus_route_assgn.DBR_route_id")->result_array();
			return $this->db->query('select * from employee join driver_bus_route_assgn on employee.employee_profile_id = driver_bus_route_assgn.DBR_driver_id join bus on bus.bus_id = driver_bus_route_assgn.DBR_bus_id join route on route.route_id = driver_bus_route_assgn.DBR_route_no WHERE driver_bus_route_assgn.DBR_school_profile_id = '.$employee_school_profile_id.' AND driver_bus_route_assgn.DBR_expiry_date="9999-12-31"')->result_array();
		}

		function add_driver_bus_route_assign($DBR)			
		{
			$this->db->insert('driver_bus_route_assgn',$DBR);
			return 0;
		}

		function disable_DBR($DBR)
		{
			$this->db->set($DBR)->where('DBR_id',$DBR['DBR_id'])->update('driver_bus_route_assgn');
			return 0;
		}

		function already_exits_driver($data1)
		{
			$data = $this->db->where('DBR_driver_id',$data1['driver'])->where('DBR_school_profile_id',$data1['employee_school_profile_id'])->get('driver_bus_route_assgn');
			return $data->num_rows();
		}

		function already_exits_bus($data1)
		{
			$data = $this->db->where('DBR_bus_id',$data1['bus'])->where('DBR_school_profile_id',$data1['employee_school_profile_id'])->get('driver_bus_route_assgn');
			return $data->num_rows();
		}

		function already_exits_route($data4)
		{
			$data = $this->db->where('DBR_route_id',$data4['route'])->where('DBR_school_profile_id',$data4['employee_school_profile_id'])->get('driver_bus_route_assgn');
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