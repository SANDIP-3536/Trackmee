<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	* 
	*/
	class Holiday extends CI_Controller
	{

		function holidays()
		{
			if(!isset($this->session->userdata['school']))
			{
				redirect('/');
			} 
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			} 
			$admin['flash']['active'] = $this->session->flashdata('active');
        	$admin['flash']['title'] = $this->session->flashdata('title');
        	$admin['flash']['text'] = $this->session->flashdata('text');
        	$admin['flash']['type'] = $this->session->flashdata('type');

			$school_admin = $this->session->userdata('school');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$school_AY_id = $school_admin[0]['school_AY_id'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$admin['school_name'] = $school_admin[0]['school_name'];
			$admin['school_logo'] = $school_admin[0]['school_logo'];
			$admin['holiday'] = 'holiday';

			$admin['events'] = $this->db->where('holiday_school_profile_id',$school_profile_id)->where('holiday_AY_id',$school_AY_id)->get('holiday')->result_array();
			$this->load->view('Holidays/holiday1', $admin);
		}

		function addEvent()
		{
			$school_admin = $this->session->userdata('school');
			$data['holiday_name'] = $this->input->post('title');
			$data['holiday_start_date'] = $this->input->post('start');
			$data['holiday_end_date'] = $this->input->post('end');
			$data['holiday_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
			$data['holiday_AY_id'] = $school_admin[0]['school_AY_id'];
			
			if($this->db->insert('holiday',$data)){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Holiday Added Successfully.");
	            $this->session->set_flashdata('text',""); 
	            $this->session->set_flashdata('type',"success");
				redirect('Holiday/holidays');
			}else{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Error...");
	            $this->session->set_flashdata('text',"Holiday not Added...");
	            $this->session->set_flashdata('type',"warning");
				redirect('Holiday/holidays');
			}	
		}

		public function cal_edit()
		{
			$data = $this->input->post();
			// print_r($data);die();
			if($data['delete'] == 'on')
			{
				$sql = "DELETE FROM holiday WHERE holiday_id = ".$data['id']."";
				
				if($this->db->query($sql)){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Holiday Deleted Successfully.");
		            $this->session->set_flashdata('text',""); 
		            $this->session->set_flashdata('type',"success");
					redirect('Holiday/holidays');
				}else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Error...");
		            $this->session->set_flashdata('text',"Holiday not Deleted...");
		            $this->session->set_flashdata('type',"warning");
					redirect('Holiday/holidays');
				}
			}
			elseif ($data['id']!= '') {
				$data1['holiday_name'] = $data['title'];
				// print_r($data1);die();
				$this->db->where('holiday_id',$data['id'])->update('holiday',$data1);
				if($this->db->where('holiday_id',$data['id'])->update('holiday',$data1)){
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Holiday Updated Successfully.");
		            $this->session->set_flashdata('text',""); 
		            $this->session->set_flashdata('type',"success");
					redirect('Holiday/holidays');
				}else{
					$this->session->set_flashdata('active',1);
		            $this->session->set_flashdata('title',"Error...");
		            $this->session->set_flashdata('text',"Holiday not Updated...");
		            $this->session->set_flashdata('type',"warning");
					redirect('Holiday/holidays');
				}
			}



		}

		public function select_cal_edit()
		{
			$id = $_POST['Event'][0];
			$start = $_POST['Event'][1];
			$end = $_POST['Event'][2];

			$sql = "UPDATE holiday SET  holiday_start_date = '".$start."', holiday_end_date = '".$end."' WHERE holiday_id = ".$id." ";
			$rep = $this->db->query($sql);
			echo json_encode($rep);
			// redirect('Welcome');
			// echo json_encode($new[0]);
		}
	}
 ?>