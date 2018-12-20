<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/

	
	class Stop extends CI_Controller
	{

		function stop_registration()
		{
			if(!isset($this->session->userdata['school']))
			{
				redirect('/');
			} 
			if(isset($this->session->userdata['direct'])){
				$data1['direct'] = $this->session->userdata('direct');
			}
			else{
				$data1['direct'] = 1;
			} 
			$data = $this->session->userdata('school');
			$nav['school_name'] = $data[0]['school_name'];
			$nav['school_logo'] = $data[0]['school_logo'];
			$nav['transport'] = "transport";

			$data1['user'] = $data[0]['employee_pri_mobile_number'];
			$data1['user_profile_id'] = $data[0]['employee_profile_id'];
			$data1['photo'] = $data[0]['employee_photo'];
			$data1['first_name'] = $data[0]['employee_first_name'];
			$data1['last_name'] = $data[0]['employee_last_name'];
			$data1['email_id'] = $data[0]['employee_email_id'];
			$data1['username'] = $data[0]['credential_username'];
			$data1['AY_name'] = $data[0]['AY_name'];

			$data['route'] = $this->Stop_model->fetch_route($data[0]['employee_school_profile_id']); 
// print_r($data['route']);die();
			$school['user_profile_id'] = $data[0]['employee_profile_id'];
			$data1['functionality'] = $this->School_model->fetch_functionality($school);
			$this->load->view('School/school_header',$data1);
			$this->load->view('Stop/stop_registration', $data);
			$this->load->view('Stop/stop_footer',$nav);
		}

		function add_stop()
		{
			$stop_seq = $this->input->post();
			$deleted_stops = $this->session->userdata('stop_routes');

			$schid = $this->session->userdata('school');
			$school_profile_id = $schid[0]['employee_school_profile_id']; 

			$expiry_date='9999-12-31';
			$current_date = date('Y-m-d');

			$seq_count = count($stop_seq['route_index']);
			$dlt_count = count($deleted_stops);

//sql query returns the up=1 and down=2 route ids
			$up_down_route_ids = $this->db->select('route_type,route_id')->where('route_no', $stop_seq['route_no'])->get('route')->result_array();

			if($stop_seq['route_type'] == 1)
			{
				//towards the school
				$up_routeid = $up_down_route_ids[0]['route_id']; //1
				$down_routeid = $up_down_route_ids[1]['route_id']; //1
				// $stop_route_id_2 = $up_down_route_ids[1]['route_id']; //2
			}
			else
			{
				//towards the home
				$down_routeid = $up_down_route_ids[0]['route_id']; //1
				$up_routeid = $up_down_route_ids[1]['route_id']; //2
			}

//sql query returns the route stops..
			$route_all_stop = $this->db->query("SELECT * FROM stop WHERE stop_route_id  = ".$up_routeid." AND stop_expiry_date = '9999-12-31'")->result_array();
			
			$r_alls_count = count($route_all_stop);

			$route_no = $deleted_stops[0]['route_no'];

//all up routes stop
			$query_for_route_stop1 = $this->db->query("select * from stop where stop_route_id=(select route_id from route where route_no='".$route_no."' and route_type=1) and stop_expiry_date= '9999-12-31'");

			$route_upstops = $query_for_route_stop1->result_array();


			for ($i=0; $i < $dlt_count; $i++) { 
				
				$stop_index = $deleted_stops[$i]['stop_index'];
				echo $r_alls_count;
				echo "expire of up:".$stop_index;
				
				$query = $this->db->query('update stop set stop_expiry_date ="'.$current_date.'" where stop_route_id = (select route_id from route where route_no='.$route_no.' and route_type=1) AND stop_index ='.$stop_index.'');

				$other_stop_index=($r_alls_count-$deleted_stops[$i]['stop_index'])+1;

				echo "expire of down:".$other_stop_index."<br>";
				$query = $this->db->query('update stop set stop_expiry_date ="'.$current_date.'" where stop_route_id = (select route_id from route where route_no='.$route_no.' and route_type=2) AND stop_index ='.$other_stop_index.'');
			}

//======================new data update and insert================

				$current_date = date('Y-m-d');

				for ($i=0,$j = $seq_count-1;$i < $seq_count ; $i++,$j--)
				{ 

					$data5['stop_index'][$i] = $stop_seq['route_index'][$i];
					$data5['stop_name'][$i] = $stop_seq['route_name'][$i];
					$data5['stop_latitude'][$i] = $stop_seq['route_latitude'][$i];
					$data5['stop_longitude'][$i] = $stop_seq['route_longitude'][$i];

					$data6['stop_index'][$i] = $stop_seq['route_index'][$j];
					$data6['stop_name'][$i] = $stop_seq['route_name'][$j];
					$data6['stop_latitude'][$i] = $stop_seq['route_latitude'][$j];
					$data6['stop_longitude'][$i] = $stop_seq['route_longitude'][$j];
					
					$newi = $i+1;

					if($i< $r_alls_count)
					{
						$up_index = $data5['stop_index'][$i];
						$down_index =($r_alls_count-$up_index)+1;
						echo "<br>".$up_index;
						echo "----".$down_index;

					
						$query=$this->db->query('select * from stop where stop_route_id = '.$up_routeid.' AND stop_index =" '.$up_index.'" and stop_expiry_date="9999-12-31"')->result_array();
						
						if(count($query)>0)
						{
							$this->db->query('update stop set stop_index ='.$newi.',stop_name = "'.$data5['stop_name'][$i].'",stop_latitude='.$data5['stop_latitude'][$i].',stop_longitude='.$data5['stop_longitude'][$i].' where stop_id='.$query[0]['stop_id'].'');
						}
						else
						{
							$this->db->query('insert into stop (stop_route_id,stop_name,stop_index,stop_latitude,stop_longitude,stop_effective_date,stop_update_date,stop_school_profile_id) values ('.$up_routeid.',"'.$data5['stop_name'][$i].'","'.$newi.'","'.$data5['stop_latitude'][$i].'","'.$data5['stop_longitude'][$i].'","'.$current_date.'","'.$current_date.'",'.$school_profile_id.')');
						}

						$query1=$this->db->query('select * from stop where stop_route_id = '.$down_routeid.' AND stop_index ='.$down_index.' and stop_expiry_date="9999-12-31"')->result_array();

						if(count($query1)>0)
						{
							$this->db->query('update stop set stop_index ='.$newi.',stop_name = "'.$data6['stop_name'][$i].'",stop_latitude='.$data6['stop_latitude'][$i].',stop_longitude='.$data6['stop_longitude'][$i].' where stop_id='.$query1[0]['stop_id'].'');
						}
						else
						{
							$this->db->query('insert into stop (stop_route_id,stop_name,stop_index,stop_latitude,stop_longitude,stop_effective_date,stop_update_date,stop_school_profile_id) values ('.$down_routeid.',"'.$data6['stop_name'][$i].'","'.$newi.'","'.$data6['stop_latitude'][$i].'","'.$data6['stop_longitude'][$i].'","'.$current_date.'","'.$current_date.'",'.$school_profile_id.')');
						}

					}
					else
					{

						$this->db->query('insert into stop (stop_route_id,stop_name,stop_index,stop_latitude,stop_longitude,stop_effective_date,stop_update_date,stop_school_profile_id) values ('.$up_routeid.',"'.$data5['stop_name'][$i].'",'.$newi.',"'.$data5['stop_latitude'][$i].'","'.$data5['stop_longitude'][$i].'","'.$current_date.'","'.$current_date.'",'.$school_profile_id.')');

						$this->db->query('insert into stop(stop_route_id,stop_name,stop_index,stop_latitude,stop_longitude,stop_effective_date,stop_update_date,stop_school_profile_id) values ('.$down_routeid.',"'.$data6['stop_name'][$i].'",'.$newi.',"'.$data6['stop_latitude'][$i].'","'.$data6['stop_longitude'][$i].'","'.$current_date.'","'.$current_date.'",'.$school_profile_id.')');
						
					}
				}

				unset($_SESSION['stop_routes'])	;
			redirect('stop/stop_registration');
		}

		function stop_details()
		{
			$data1['route_id'] = $_POST['route_id'];	
			$data1['route_type'] = $_POST['route_type'];

			$data = $this->Stop_model->stop_details($data1);
			echo json_encode($data);
		}

		function stop_details_with_route_type_1()
		{
			$data1['route_id'] = $_POST['route_id'];	
			$data1['route_type'] = 1;
			$data = $this->Stop_model->stop_details_with_route_type_1($data1);
			echo json_encode($data);
		}

		function stop_details_with_route_type_2()
		{
			$data1['route_id'] = $_POST['route_id'];	
			$data1['route_type'] = 2;
			$data = $this->Stop_model->stop_details_with_route_type_2($data1);
			echo json_encode($data);
		}

		function stop_delete_jq()
		{
			$data['stop_index'] = $_POST['route_index'];
			$data['route_no'] = $_POST['stop_route_id'];
			
			$data1 = $this->Stop_model->stop_delete_jq($data);
			
			echo json_encode($data1);
		}

		function stop_route_details()
		{
			$data = $this->session->userdata('school');
			$route['employee_school_profile_id'] = $data[0]['employee_school_profile_id'];
			$route['route_no'] = $_POST['route_no'];
			$data = $this->Stop_model->stop_route_details($route);
			echo json_encode($data);
		}
	}
 ?>