<?php 

	/**
	* 
	*/
	class Stop_model extends CI_Model
	{
		
		// function __construct(argument)
		// {
		// 	# code...
		// }

		function fetch_route($ic_or_school_profile_id)
		{

			$query = $this->db->query("SELECT route_name,route_no FROM route where route_school_profile_id = ".$ic_or_school_profile_id." GROUP BY 1,2 ORDER BY 1");

			$result = $query->result_array();
			return $result;
		}

		function add_stop($data4)
		{
			// print_r($data4);
			$this->db->insert('stop', $data4);
		}
		function add_stop1($data9)
		{
			$Count = count($data9); 
				for ($i=0; $i < $Count; $i++) { 
					$data1['stop_route_id'] = $data9[$i]['stop_route_id'];
					$data1['stop_index'] = $data9[$i]['stop_index'];
					$data1['stop_name'] = $data9[$i]['stop_name'];
					$data1['stop_latitude'] = $data9[$i]['stop_latitude'];
					$data1['stop_longitude'] = $data9[$i]['stop_longitude'];
					$data1['stop_effective_date'] = $data9[$i]['stop_effective_date'];
					$data1['stop_update_date']= $data9[$i]['stop_update_date'];
					// echo "<pre>";
					// print_r($data1);
					$this->db->insert('stop', $data1);
				}
		}

		function stop_details($data1)
		{
			$route_id = $data1['route_id'];
			$route_type = $data1['route_type'];

			$query = 'SELECT * FROM stop  JOIN (select route_id FROM route where route_no = '.$route_id.' and route_type = '.$route_type.') as routes on stop_route_id = routes.route_id AND stop_expiry_date="9999-12-31"';

			$result = $this->db->query($query)->result_array();
			
			return $result;
		}

		function stop_details_with_route_type_1($data1)
		{
			$route_id = $data1['route_id'];
			$route_type = $data1['route_type'];
			$query = $this->db->query('SELECT * FROM stop  JOIN (select route_id FROM route where route_no = '.$route_id.' and route_type = '.$route_type.' ) as routes on stop_route_id = routes.route_id
				where stop_expiry_date="9999-12-31" ORDER BY stop_index');
			
			return $query->result_array();
		}

		function stop_details_with_route_type_2($data1)
		{
			$route_id = $data1['route_id'];
			$route_type = $data1['route_type'];
			$query = $this->db->query('SELECT * FROM stop  JOIN (select route_id FROM route where route_no = '.$route_id.' and route_type = '.$route_type.') as routes on stop_route_id = routes.route_id where stop_expiry_date="9999-12-31" ORDER BY stop_index'
				);
				return $query->result_array();
		}

		function stop_delete_jq($data)
		{
			
			// return $current_date;

			if(!isset($this->session->userdata['stop_routes']))
			{
				$count = count($this->session->userdata['stop_routes']);
				$data1[$count]['stop_index']= $data['stop_index'];
				$data1[$count]['route_no'] = $data['route_no'];

				$this->session->set_userdata('stop_routes',$data1);
				
				return 1;
			}
			else
			{
				$count = count($this->session->userdata['stop_routes']);
				$olddata = 	$this->session->userdata('stop_routes');
				
				$olddata[$count]['stop_index'] = $data['stop_index'];
				$olddata[$count]['route_no']= $data['route_no'];
				$this->session->set_userdata('stop_routes',$olddata);
				return 1;
			}
			
			

			// return 1;	
			// $stop_count1 = $this->db->query('select * from stop where stop_route_id=(select route_id from route where route_no='.$route_no.' and route_type=1) and stop_expiry_date= "9999-12-31"');

			// $stop_count = $stop_count1->result_array();
			// $other_stop_index=count($stop_count)-$stop_index+(1);


			// return $other_stop_index;
			// $query = $this->db->query('update stop set stop_expiry_date ="'.$current_date.'" where stop_route_id = (select route_id from route where route_no='.$route_no.' and route_type=1) AND stop_index ='.$stop_index.'');
			// $query = $this->db->query('update stop set stop_expiry_date ="'.$current_date.'" where stop_route_id = (select route_id from route where route_no='.$route_no.' and route_type=2) AND stop_index ='.$other_stop_index.'');
		}

		function stop_route_details($route)
		{
			return $this->db->query('select type1_route_no as route_no,route_name,type1_route_id,type1_route_start_time,type1_route_end_time,type2_route_id,type2_route_start_time,type2_route_end_time from 
 								(SELECT route_name,route_no as type1_route_no,route_id as type1_route_id,route_start_time as type1_route_start_time,route_end_time as type1_route_end_time FROM `route` WHERE route_expiry_date ="9999-12-31" AND route_school_profile_id = '.$route['employee_school_profile_id'].' and route_type=1) as type1,
								(SELECT route_no as type2_route_no,route_id as type2_route_id,route_start_time as type2_route_start_time,route_end_time as type2_route_end_time FROM `route` WHERE route_expiry_date ="9999-12-31" AND route_school_profile_id = '.$route['employee_school_profile_id'].' and route_type=2) as type2
								where type2_route_no=type1_route_no and type1_route_no='.$route['route_no'].'')->result_array();
		}
	}
 ?>