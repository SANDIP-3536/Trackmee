<?php 

	defined('BASEPATH') OR exit('No direct Script access Allowed');

	class Student_class_division_assign extends CI_Controller
	{
		function index()
		{
			if(!isset($this->session->userdata['school'])){
				redirect('/');
			}
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			}
			$SCD_assign['flash']['active'] = $this->session->flashdata('active');
        	$SCD_assign['flash']['title'] = $this->session->flashdata('title');
        	$SCD_assign['flash']['text'] = $this->session->flashdata('text');
        	$SCD_assign['flash']['type'] = $this->session->flashdata('type');
        	
			$school_admin = $this->session->userdata('school');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$school_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_assign['school_class'] =  $this->Student_class_division_assign_model->fetch_school_class($employee_school_profile_id);
			$SCD_assign['school_division'] =  $this->Student_class_division_assign_model->fetch_school_division($employee_school_profile_id);
			$SCD_assign['fetch_student'] =  $this->Student_class_division_assign_model->fetch_school_student($employee_school_profile_id,$school_AY_id);
			$SCD_assign['student_class_division'] =  $this->Student_class_division_assign_model->fetch_school_class_division($employee_school_profile_id,$school_AY_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['education'] = 'education';

			$this->load->view('School/school_header', $admin);
			$this->load->view('Assignment/student_class_division_assign',$SCD_assign);
			$this->load->view('Assignment/assign_footer',$nav);
		}

		function division_class_wise_list_details()
		{
			$school_admin = $this->session->userdata('school');
			$class_id = $_POST['class_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("select data1.SCD_class_id as class_id
				,class_name
				,data1.SCD_division_id as division_id
				,division_name,count as total,
				case when cnt is null then count else (count-cnt) end as assgn,
				case when cnt is null then '0' else cnt end as nt_assgn from (select SCD_class_id,SCD_division_id,count(SCD_student_profile_id) as count from student_class_division_assgn 
				where SCD_AY_id=".$SCD_AY_id." and SCD_class_id=".$class_id."
				group by SCD_class_id,SCD_division_id) as data1
				left join
				(select SCD_class_id,SCD_division_id,count(SCD_student_profile_id) as cnt from student_class_division_assgn where SCD_Roll_No is NULL 
				and SCD_AY_id=".$SCD_AY_id."  and SCD_class_id=".$class_id."
				group by SCD_class_id,SCD_division_id) as data2
				on data1.SCD_class_id=data2.SCD_class_id
				join class
				on data1.SCD_class_id=class_id
				join division
				on data1.SCD_division_id=division_id")->result_array();
			echo json_encode($data);
		}

		function student_class_wise_list_details()
		{
			$school_admin = $this->session->userdata('school');
			$class_id = $_POST['class_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("SELECT class_name
				,SCD_id
				,concat(student_last_name,' ',student_first_name,' ',student_middle_name) as student_name
				,case when division_name is Null then 'N/A' else division_name end as division
				,case when SCD_Roll_No is Null then 'N/A' else SCD_Roll_No end as Roll_No 
				FROM student_class_division_assgn 
				join 
				student on SCD_student_profile_id = student_profile_id 
				join 
				class on class_id=SCD_class_id 
				left join 
				division on division_id = SCD_division_id 
				where 
				SCD_expiry_date = '9999-12-31' and 
				SCD_class_id = ".$class_id." and 
				SCD_school_profile_id = ".$SCD_school_profile_id." and 
				SCD_AY_id = ".$SCD_AY_id." ORDER BY SCD_Roll_No")->result_array();
			echo json_encode($data);
		}

		function total_new_assign_class_student_division()
		{
			$school_admin = $this->session->userdata('school');
			$class_id = $_POST['class_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("SELECT SCD_class_id
				,class_name
				,count(SCD_student_profile_id) as total_student
				,case when student is Null then count(SCD_student_profile_id) else (count(SCD_student_profile_id)-student) end as div_assgn
				,case when student is Null then '0' else student end as no_div_assgn 
				FROM student_class_division_assgn
				left join
				(SELECT SCD_class_id as class,count(SCD_student_profile_id) as student 
				 FROM student_class_division_assgn where SCD_division_id=0
				 group by SCD_class_id
				) as no_assgn
				on class=SCD_class_id
				join
				class on class_id = SCD_class_id
				 where
				SCD_school_profile_id=".$SCD_school_profile_id." 
				AND SCD_AY_id=".$SCD_AY_id."
				AND SCD_expiry_date='9999-12-31'
				AND SCD_class_id=".$class_id."
				group by SCD_class_id")->result_array();
			echo json_encode($data);
		}

		function pending_assign_class_student_division()
		{
			$school_admin = $this->session->userdata('school');
			$class_id = $_POST['class_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("SELECT student_profile_id,SCD_id,SCD_id,concat(student_last_name,' ',student_first_name,' ',student_middle_name) as student_name FROM student_class_division_assgn join student on SCD_student_profile_id = student_profile_id where SCD_expiry_date = '9999-12-31' and SCD_class_id = ".$class_id." and SCD_division_id = 0 and SCD_school_profile_id = ".$SCD_school_profile_id." and SCD_AY_id = ".$SCD_AY_id."")->result_array();
			echo json_encode($data);
		}

		function pending_assign_class_division()
		{
			$school_admin = $this->session->userdata('school');
			$class_id = $_POST['class_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("SELECT * FROM division where division_expiry_date = '9999-12-31' and division_class_id = ".$class_id." and division_school_profile_id = ".$SCD_school_profile_id."")->result_array();
			echo json_encode($data);
		}

		function fetch_student_wise_class()
		{
			$school_admin = $this->session->userdata('school');
			$class_id = $_POST['class_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("SELECT student_profile_id,SCD_id,student_first_name,student_middle_name,student_last_name FROM student_class_division_assgn join student on SCD_student_profile_id = student_profile_id where SCD_expiry_date = '9999-12-31' and SCD_class_id = ".$class_id." and SCD_division_id = 0 and SCD_school_profile_id = ".$SCD_school_profile_id." and SCD_AY_id = ".$SCD_AY_id."")->result_array();
			echo json_encode($data);
		}

		function SCD_registration()
		{
			$school_admin = $this->session->userdata('school');
			$SCD['SCD_class_id'] = $this->input->post('SCD_class_id');
			$SCD['SCD_division_id'] = $this->input->post('SCD_division_id');
			$SCD['SCD_id'] = $this->input->post('SCD_id[]');
			// print_r($SCD);die();
			
			if(empty($SCD['SCD_class_id']) || empty($SCD['SCD_division_id']) || empty($SCD['SCD_id'][0])){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Something Missing");
	            $this->session->set_flashdata('text',"Please Try Again");
	            $this->session->set_flashdata('type',"warning");
				redirect('Student_class_division_assign');
			}
			else{
				$cnt = count($SCD['SCD_id']);

				for ($i=0; $i < $cnt; $i++) { 
					$SCD_assign['SCD_class_id'] = $this->input->post('SCD_class_id');
					$SCD_assign['SCD_division_id'] = $this->input->post('SCD_division_id');
					$SCD_assign['SCD_id'] = $SCD['SCD_id'][$i];
					$SCD_assign['SCD_effective_date'] = date('Y-m-d');
					$SCD_assign['SCD_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
					$SCD_assign['SCD_AY_id'] = $school_admin[0]['school_AY_id'];
					
					$this->Student_class_division_assign_model->update_SCD_Division($SCD_assign);
				}
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Class has been assigned successfully to Student");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Student_class_division_assign');
			}
		}

		function total_new_roll_assign_class_student_division()
		{
			$school_admin = $this->session->userdata('school');
			$class_id = $_POST['class_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("SELECT 
				SCD_class_id
				,SCD_division_id
				,class_name
				,division_name
				,count(SCD_student_profile_id) as total_student
				,case when student_roll is Null then count(SCD_student_profile_id) else (count(SCD_student_profile_id)-student_roll) end as roll_assgn
				,case when student_roll is Null then '0' else student_roll end as no_roll_assgn 
				FROM student_class_division_assgn
				left join
				(SELECT SCD_class_id as class,SCD_division_id as division,count(SCD_student_profile_id) as student_roll 
				FROM student_class_division_assgn 
				where 
				SCD_class_id = ".$class_id." 
				and SCD_division_id != 0 
				and SCD_Roll_No IS Null 
				group by SCD_division_id) as data
				on class=SCD_class_id and division=SCD_division_id
				join
				class on class_id = SCD_class_id
				join
				division on division_id = SCD_division_id
				where
				SCD_school_profile_id=".$SCD_school_profile_id."
				AND SCD_AY_id=".$SCD_AY_id."
				AND SCD_expiry_date='9999-12-31'
				AND SCD_class_id =".$class_id."
				group by SCD_division_id")->result_array();
			echo json_encode($data);
		}

		function fetch_class_student_wise_division()
		{
			$school_admin = $this->session->userdata('school');
			$class_id = $_POST['class_id'];
			$division_id = $_POST['division_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("SELECT 
				SCD_student_profile_id
				,SCD_class_id
				,SCD_division_id
				,concat(student_last_name,' ',student_first_name,' ',student_middle_name) as student_name
				,case when SCD_Roll_No is Null then 'N/A' else SCD_Roll_No end as Roll_no
				,SCD_id
				FROM student_class_division_assgn
				join
				student on student_profile_id = SCD_student_profile_id
				where
				SCD_school_profile_id=".$SCD_school_profile_id."
				AND SCD_AY_id=".$SCD_AY_id."
				AND SCD_expiry_date='9999-12-31'
				AND SCD_class_id =".$class_id."
				AND SCD_Roll_No is Null
				AND SCD_division_id =".$division_id."")->result_array();
			echo json_encode($data);
		}

		function fetch_class_student_wise_division_max_roll_number()
		{
			$school_admin = $this->session->userdata('school');
			$class_id = $_POST['class_id'];
			$division_id = $_POST['division_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("SELECT 
				case when max(SCD_Roll_No) is Null then 0 else max(SCD_Roll_no) end as highest_Roll_no
				FROM student_class_division_assgn
				where
				SCD_school_profile_id=".$SCD_school_profile_id."
				AND SCD_AY_id=".$SCD_AY_id."
				AND SCD_expiry_date='9999-12-31'
				AND SCD_class_id =".$class_id."
				AND SCD_division_id =".$division_id."")->result_array();
			echo json_encode($data);
		}

		function fetch_class_student_wise_division_male_gender()
		{
			$school_admin = $this->session->userdata('school');
			$class_id = $_POST['class_id'];
			$division_id = $_POST['division_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("SELECT 
				SCD_student_profile_id
				,SCD_class_id
				,SCD_division_id
				,concat(student_last_name,' ',student_first_name,' ',student_middle_name) as student_name
				,case when SCD_Roll_No is Null then 'N/A' else SCD_Roll_No end as Roll_no
				,SCD_id
				FROM student_class_division_assgn
				join
				student on student_profile_id = SCD_student_profile_id
				where
				SCD_school_profile_id=".$SCD_school_profile_id."
				AND SCD_AY_id=".$SCD_AY_id."
				AND SCD_expiry_date='9999-12-31'
				AND SCD_class_id =".$class_id."
				AND SCD_Roll_No is Null
				AND SCD_division_id =".$division_id." 
				order by student_gender DESC")->result_array();
			echo json_encode($data);
		}

		function update_fetch_class_student_wise_division_male_gender()
		{
			$school_admin = $this->session->userdata('school');
			$class_id = $_POST['class_id'];
			$division_id = $_POST['division_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("SELECT 
				SCD_student_profile_id
				,SCD_class_id
				,SCD_division_id
				,concat(student_last_name,' ',student_first_name,' ',student_middle_name) as student_name
				,case when SCD_Roll_No is Null then 'N/A' else SCD_Roll_No end as Roll_no
				,SCD_id
				FROM student_class_division_assgn
				join
				student on student_profile_id = SCD_student_profile_id
				where
				SCD_school_profile_id=".$SCD_school_profile_id."
				AND SCD_AY_id=".$SCD_AY_id."
				AND SCD_expiry_date='9999-12-31'
				AND SCD_class_id =".$class_id."
				AND SCD_division_id =".$division_id." 
				order by student_gender DESC")->result_array();
			echo json_encode($data);
		}


		function fetch_class_student_wise_division_female_gender()
		{
			$school_admin = $this->session->userdata('school');
			$class_id = $_POST['class_id'];
			$division_id = $_POST['division_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("SELECT 
				SCD_student_profile_id
				,SCD_class_id
				,SCD_division_id
				,concat(student_last_name,' ',student_first_name,' ',student_middle_name) as student_name
				,case when SCD_Roll_No is Null then 'N/A' else SCD_Roll_No end as Roll_no
				,SCD_id
				FROM student_class_division_assgn
				join
				student on student_profile_id = SCD_student_profile_id
				where
				SCD_school_profile_id=".$SCD_school_profile_id."
				AND SCD_AY_id=".$SCD_AY_id."
				AND SCD_expiry_date='9999-12-31'
				AND SCD_class_id =".$class_id."
				AND SCD_Roll_No is Null
				AND SCD_division_id =".$division_id." 
				order by student_gender")->result_array();
			echo json_encode($data);
		}

		function update_fetch_class_student_wise_division_female_gender()
		{
			$school_admin = $this->session->userdata('school');
			$class_id = $_POST['class_id'];
			$division_id = $_POST['division_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("SELECT 
				SCD_student_profile_id
				,SCD_class_id
				,SCD_division_id
				,concat(student_last_name,' ',student_first_name,' ',student_middle_name) as student_name
				,case when SCD_Roll_No is Null then 'N/A' else SCD_Roll_No end as Roll_no
				,SCD_id
				FROM student_class_division_assgn
				join
				student on student_profile_id = SCD_student_profile_id
				where
				SCD_school_profile_id=".$SCD_school_profile_id."
				AND SCD_AY_id=".$SCD_AY_id."
				AND SCD_expiry_date='9999-12-31'
				AND SCD_class_id =".$class_id."
				AND SCD_division_id =".$division_id." 
				order by student_gender")->result_array();
			echo json_encode($data);
		}

		function fetch_class_student_wise_division_first_name_sort()
		{
			$school_admin = $this->session->userdata('school');
			$class_id = $_POST['class_id'];
			$division_id = $_POST['division_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("SELECT 
				SCD_student_profile_id
				,SCD_class_id
				,SCD_division_id
				,concat(student_last_name,' ',student_first_name,' ',student_middle_name) as student_name
				,case when SCD_Roll_No is Null then 'N/A' else SCD_Roll_No end as Roll_no
				,SCD_id
				FROM student_class_division_assgn
				join
				student on student_profile_id = SCD_student_profile_id
				where
				SCD_school_profile_id=".$SCD_school_profile_id."
				AND SCD_AY_id=".$SCD_AY_id."
				AND SCD_expiry_date='9999-12-31'
				AND SCD_class_id =".$class_id."
				AND SCD_Roll_No is Null
				AND SCD_division_id =".$division_id." 
				order by student_first_name")->result_array();
			echo json_encode($data);
		}

		function update_fetch_class_student_wise_division_first_name_sort()
		{
			$school_admin = $this->session->userdata('school');
			$class_id = $_POST['class_id'];
			$division_id = $_POST['division_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("SELECT 
				SCD_student_profile_id
				,SCD_class_id
				,SCD_division_id
				,concat(student_last_name,' ',student_first_name,' ',student_middle_name) as student_name
				,case when SCD_Roll_No is Null then 'N/A' else SCD_Roll_No end as Roll_no
				,SCD_id
				FROM student_class_division_assgn
				join
				student on student_profile_id = SCD_student_profile_id
				where
				SCD_school_profile_id=".$SCD_school_profile_id."
				AND SCD_AY_id=".$SCD_AY_id."
				AND SCD_expiry_date='9999-12-31'
				AND SCD_class_id =".$class_id."
				AND SCD_division_id =".$division_id." 
				order by student_first_name")->result_array();
			echo json_encode($data);
		}

		function fetch_class_student_wise_division_last_name_sort()
		{
			$school_admin = $this->session->userdata('school');
			$class_id = $_POST['class_id'];
			$division_id = $_POST['division_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("SELECT 
				SCD_student_profile_id
				,SCD_class_id
				,SCD_division_id
				,concat(student_last_name,' ',student_first_name,' ',student_middle_name) as student_name
				,case when SCD_Roll_No is Null then 'N/A' else SCD_Roll_No end as Roll_no
				,SCD_id
				FROM student_class_division_assgn
				join
				student on student_profile_id = SCD_student_profile_id
				where
				SCD_school_profile_id=".$SCD_school_profile_id."
				AND SCD_AY_id=".$SCD_AY_id."
				AND SCD_expiry_date='9999-12-31'
				AND SCD_class_id =".$class_id."
				AND SCD_Roll_No is Null
				AND SCD_division_id =".$division_id." 
				order by student_last_name")->result_array();
			echo json_encode($data);
		}

		function update_fetch_class_student_wise_division_last_name_sort()
		{
			$school_admin = $this->session->userdata('school');
			$class_id = $_POST['class_id'];
			$division_id = $_POST['division_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("SELECT 
				SCD_student_profile_id
				,SCD_class_id
				,SCD_division_id
				,concat(student_last_name,' ',student_first_name,' ',student_middle_name) as student_name
				,case when SCD_Roll_No is Null then 'N/A' else SCD_Roll_No end as Roll_no
				,SCD_id
				FROM student_class_division_assgn
				join
				student on student_profile_id = SCD_student_profile_id
				where
				SCD_school_profile_id=".$SCD_school_profile_id."
				AND SCD_AY_id=".$SCD_AY_id."
				AND SCD_expiry_date='9999-12-31'
				AND SCD_class_id =".$class_id."
				AND SCD_division_id =".$division_id." 
				order by student_last_name")->result_array();
			echo json_encode($data);
		}

		function SCD_roll_number_registration()
		{
			$school_admin = $this->session->userdata('school');
			$Roll['SCD_class_id'] = $this->input->post('SCD_class_id');
			$Roll['SCD_division_id'] = $this->input->post('roll_division_id');
			$Roll['SCD_division_id'] = $this->input->post('roll_division_id');
			$Roll['SCD_id'] = $this->input->post('SCD_id[]');
			$Roll['SCD_Roll_No'] = $this->input->post('new_roll_no[]');
			// print_r($Roll);die();
			
			if(empty($Roll['SCD_class_id']) || empty($Roll['SCD_division_id']) || empty($Roll['SCD_id']) || empty($Roll['SCD_Roll_No'][0])){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Something Missing");
	            $this->session->set_flashdata('text',"Please Try Again");
	            $this->session->set_flashdata('type',"warning");
				redirect('Student_class_division_assign');
			}
			else{
				$cnt = count($Roll['SCD_Roll_No']);

				for ($i=0; $i < $cnt; $i++) { 
					$Roll_assign['SCD_class_id'] = $this->input->post('SCD_class_id');
					$Roll_assign['SCD_division_id'] = $this->input->post('SCD_division_id');
					$Roll_assign['SCD_id'] = $Roll['SCD_id'][$i];
					$Roll_assign['SCD_Roll_No'] = $Roll['SCD_Roll_No'][$i];
					$Roll_assign['SCD_effective_date'] = date('Y-m-d');
					// $Roll_assign['SCD_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
					// $Roll_assign['SCD_AY_id'] = $school_admin[0]['school_AY_id'];
					
					$this->Student_class_division_assign_model->update_Roll_Number($Roll_assign);
				}
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Roll Number has been assigned successfully to Student");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Student_class_division_assign');
			}
		}

		function update_class_student_details()
		{
			$school_admin = $this->session->userdata('school');
			$SCD_id = $_POST['SCD_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("SELECT 
				SCD_student_profile_id
				,SCD_id
				,class_name
				,division_name
				,concat(student_last_name,' ',student_first_name,' ',student_middle_name) as student_name
				,case when SCD_Roll_No is Null then 'N/A' else SCD_Roll_No end as Roll_no
				,SCD_id
				FROM student_class_division_assgn
				join
				student on student_profile_id = SCD_student_profile_id
				join
				class on class_id = SCD_class_id
				join
				division on division_id = SCD_division_id
				where
				SCD_school_profile_id=".$SCD_school_profile_id."
				AND SCD_AY_id=".$SCD_AY_id."
				AND SCD_expiry_date='9999-12-31'
				AND SCD_id =".$SCD_id."
				order by student_last_name")->result_array();
			echo json_encode($data);
		}

		function update_class_class_details()
		{
			$school_admin = $this->session->userdata('school');
			$SCD_id = $_POST['SCD_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("SELECT 
					class_id
					,class_name
					FROM class 
					join 
					fees_type
					on fees_type_class_id = class_id 
					and fees_type_expiry_date = class_expiry_date 
					and fees_type_school_profile_id = class_school_profile_id
					where 
					class_id NOT IN
					(select SCD_class_id from student_class_division_assgn where SCD_id = ".$SCD_id.") group by class_id")->result_array();
			echo json_encode($data);
		}

		function update_division_division_details()
		{
			$school_admin = $this->session->userdata('school');
			$SCD_id = $_POST['SCD_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];	
			$data = $this->db->query("select 
			division_id
			,division_name 
			from 
			division 
			join 
			student_class_division_assgn on division_class_id = SCD_class_id 
			where
			division_id NOT IN (select SCD_division_id from student_class_division_assgn where SCD_id = ".$SCD_id.") 
			and SCD_id = ".$SCD_id." group by division_id")->result_array();
			echo json_encode($data);
		}

		function update_student_class()
		{
			$school_admin = $this->session->userdata('school');
			$SCD['SCD_id'] = $this->input->post('class_update_student_SCD_id');
			$SCD['student_profile_id'] = $this->input->post('class_update_SCD_student_profile_id');
			$SCD['SCD_class_id'] = $this->input->post('update_class_SCD_class_id');
			$FW['fee_waiver_name'] = $this->input->post('fee_waiver_name[]');
			$FW['fee_waiver_amount'] = $this->input->post('fee_waiver_amount[]');
			$TF['total_fee_amount'] = $this->input->post('total_fee_amount[]');
			$TF['total_fee_type_id'] = $this->input->post('fee_type_id[]');
			if(empty($SCD['SCD_class_id']) || empty($SCD['SCD_id']) || empty($TF['total_fee_type_id'][0]) || empty($TF['total_fee_amount'][0])){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Something Missing");
	            $this->session->set_flashdata('text',"Please Try Again");
	            $this->session->set_flashdata('type',"warning");
				redirect('Student_class_division_assign');
			}
			else{

				$this->db->query("UPDATE student_class_division_assgn SET SCD_class_id=".$SCD['SCD_class_id'].",SCD_division_id='0',SCD_Roll_No=Null WHERE SCD_id =".$SCD['SCD_id']."");
				$this->db->query("DELETE FROM fee_waiver WHERE fee_waiver_student_profile_id =".$SCD['student_profile_id']."");
				$this->db->query("DELETE FROM total_fees WHERE total_fee_student_profile_id =".$SCD['student_profile_id']."");

				$cnt = count($TF['total_fee_type_id']);
	            for ($i=0; $i < $cnt; $i++) { 
	            	$fee_type_details['total_fee_type_id'] = $TF['total_fee_type_id'][$i];
	            	$fee_type_details['total_fee_amount'] = $TF['total_fee_amount'][$i];
	            	$fee_type_details['total_fee_student_profile_id'] =$SCD['student_profile_id'];
	            	$fee_type_details['total_fee_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
	            	$fee_type_details['total_fee_AY_id'] = $school_admin[0]['school_AY_id'];
	            	
	            	$fee_waiver_details['fee_waiver_fee_type_id'] =  $TF['total_fee_type_id'][$i];
	            	$fee_waiver_details['fee_waiver_amount'] =$FW['fee_waiver_amount'][$i];
	            	$fee_waiver_details['fee_waiver_name'] = $FW['fee_waiver_name'][$i];
	            	$fee_waiver_details['fee_waiver_student_profile_id'] = $SCD['student_profile_id'];
	            	$fee_waiver_details['fee_waiver_effective_date'] = date('Y-m-d');
	            	$fee_waiver_details['fee_waiver_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
	            	$fee_waiver_details['fee_waiver_AY_id'] = $school_admin[0]['school_AY_id'];
	            	$this->db->insert('total_fees',$fee_type_details);
	            	if ($fee_waiver_details['fee_waiver_name'] !='') {
	            		$this->db->insert('fee_waiver',$fee_waiver_details);
	            	}
	            }
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Class has been updated successfully to Student");
	            $this->session->set_flashdata('text',"Please assign division & Roll No. for updated Student");
	            $this->session->set_flashdata('type',"success");
				redirect('Student_class_division_assign');
			}
		}

		function update_student_division()
		{
			$SCD['SCD_id'] = $this->input->post('division_update_SCD_id');
			$SCD['SCD_division_id'] = $this->input->post('update_division_scd_division_id');
			if(empty($SCD['SCD_division_id']) || empty($SCD['SCD_id'])){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Something Missing");
	            $this->session->set_flashdata('text',"Please Try Again");
	            $this->session->set_flashdata('type',"warning");
				redirect('Student_class_division_assign');
			}
			else{

				$this->db->query("UPDATE student_class_division_assgn SET SCD_division_id=".$SCD['SCD_division_id'].",SCD_Roll_No=Null WHERE SCD_id =".$SCD['SCD_id']."");
				
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Division has been updated successfully to Student");
	            $this->session->set_flashdata('text',"Please assign Roll No. for updated Student division");
	            $this->session->set_flashdata('type',"success");
				redirect('Student_class_division_assign');
			}
		}

		function student_class_division_roll_genrate()
		{
			$school_admin = $this->session->userdata('school');
			$class_id = $_POST['class_id'];
			$division_id = $_POST['division_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$data = $this->db->query("SELECT student_class_division_assgn.*,student_first_name,student_last_name,student_middle_name,student_gender,class_name,division_name FROM student_class_division_assgn join student on student_profile_id = SCD_student_profile_id join class on class_id = SCD_class_id join division on SCD_division_id = division_id where SCD_class_id =".$class_id." and SCD_division_id =".$division_id." and SCD_AY_id =".$SCD_AY_id." and SCD_school_profile_id =".$SCD_school_profile_id." and SCD_expiry_date = '9999-12-31'")->result_array();
			echo json_encode($data);
		}

		function total_update_roll_assign_class_student_division()
		{
			$school_admin = $this->session->userdata('school');
			$class_id = $_POST['class_id'];
			$division_id = $_POST['division_id'];
			$SCD_AY_id = $school_admin[0]['school_AY_id'];
			$SCD_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$data = $this->db->query("SELECT SCD_id
					,concat(student_last_name,' ',student_first_name,' ',student_middle_name) as student_name
					,case when SCD_Roll_No is Null then 'N/A' else SCD_Roll_No end as Roll_no 
					FROM 
					student_class_division_assgn 
					join 
					student on SCD_student_profile_id = student_profile_id 
					where 
					SCD_class_id=".$class_id." 
					and SCD_division_id =".$division_id." 
					and SCD_expiry_date = '9999-12-31' 
					and SCD_AY_id = ".$SCD_AY_id."
					and SCD_school_profile_id = ".$SCD_school_profile_id." ORDER BY SCD_Roll_No")->result_array();
			echo json_encode($data);
		}

		function update_student_Roll_number()
		{
			$SCD['SCD_id'] = $this->input->post('SCD_id[]');
			$SCD['SCD_Roll_No'] = $this->input->post('new_roll_no[]');
			if(empty($SCD['SCD_id'][0]) || empty($SCD['SCD_Roll_No'][0])){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Something Missing");
	            $this->session->set_flashdata('text',"Please Try Again");
	            $this->session->set_flashdata('type',"warning");
				redirect('Student_class_division_assign');
			}
			else{
				$cnt = count($SCD['SCD_id']);
				for ($i=0; $i < $cnt; $i++) { 
					$SCD_Roll['SCD_id'] = $SCD['SCD_id'][$i];
					$SCD_Roll['SCD_Roll_No'] = $SCD['SCD_Roll_No'][$i];
					$this->db->query("UPDATE student_class_division_assgn SET SCD_Roll_No=".$SCD_Roll['SCD_Roll_No']." WHERE SCD_id =".$SCD_Roll['SCD_id']."");
				}
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Roll Number has been updated successfully to Student.");
	            $this->session->set_flashdata('text',"");
	            $this->session->set_flashdata('type',"success");
				redirect('Student_class_division_assign');
			}
		}


		function SCD_remove()
		{
			$school_admin = $this->session->userdata('school');
			$SCD['SCD_id'] = $this->input->post('SCD_id[]');
			$cnt = count($SCD['SCD_id']);
			for ($i=0; $i < $cnt; $i++) { 
				$SCD_remove['SCD_id'] = $SCD['SCD_id'][$i];
				$SCD_remove['SCD_expiry_date'] = date('Y-m-d');
				$this->Student_class_division_assign_model->SCD_remove($SCD_remove);
			}
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Class has been Removed successfully to Student");
            $this->session->set_flashdata('text',"");
            $this->session->set_flashdata('type',"success");
			redirect('Student_class_division_assign');
		}
	}
 ?>