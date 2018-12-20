<?php 
	/**
	* 
	*/
	class Student_class_division_assign_model extends CI_Model
	{
		function fetch_school_class($employee_school_profile_id)
		{
			return $this->db->where('class_school_profile_id',$employee_school_profile_id)->where('class_expiry_date','9999-12-31')->get('class')->result_array();
		}

		function fetch_school_division($employee_school_profile_id)
		{
			return $this->db->where('division_school_profile_id',$employee_school_profile_id)->where('division_expiry_date','9999-12-31')->get('division')->result_array();
		}

		function fetch_school_student($employee_school_profile_id,$school_AY_id)
		{
			return $this->db->query('SELECT * FROM `student` where student_profile_id not in (select SCD_student_profile_id from student_class_division_assgn where SCD_expiry_date = "9999-12-31" and SCD_school_profile_id = '.$employee_school_profile_id.' and SCD_AY_id = '.$school_AY_id.') and  student_expiry_date = "9999-12-31" and student_school_profile_id ='.$employee_school_profile_id.' ORDER BY student_first_name')->result_array();
		}

		function update_SCD_Division($SCD_assign)
		{
			$this->db->query("UPDATE student_class_division_assgn set SCD_division_id = ".$SCD_assign['SCD_division_id']." where SCD_id = ".$SCD_assign['SCD_id']."");
		}

		function update_Roll_Number($Roll_assign)
		{
			$this->db->query("UPDATE student_class_division_assgn set SCD_Roll_No = ".$Roll_assign['SCD_Roll_No']." where SCD_id = ".$Roll_assign['SCD_id']."");
		}

		function fetch_school_class_division($employee_school_profile_id,$school_AY_id)
		{
			return $this->db->query("SELECT SCD_class_id
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
				SCD_school_profile_id=".$employee_school_profile_id." 
				AND SCD_AY_id=".$school_AY_id."
				AND SCD_expiry_date='9999-12-31'
				group by SCD_class_id")->result_array();
		}

		function SCD_remove($SCD_remove)
		{
			$this->db->set($SCD_remove)->where('SCD_id',$SCD_remove['SCD_id'])->update('student_class_division_assgn');
		}

		function verify($SCD_assign)
		{
			return $this->db->where('SCD_expiry_date','9999-12-31')->where('SCD_class_id',$SCD_assign['SCD_class_id'])->where('SCD_division_id',$SCD_assign['SCD_division_id'])->where('SCD_Roll_No',$SCD_assign['SCD_Roll_No'])->get('student_class_division_assgn')->num_rows();
		}

		function name_male_wise_sort($Roll)
		{
			// return $Roll;
			print_r($this->db->query("SELECT student.*,case when SCD_Roll_No is NULL then 'N/A' else SCD_Roll_No end as SCD_Roll_No,SCD_id FROM student_class_division_assgn join student on SCD_student_profile_id = student_profile_id where SCD_class_id =".$Roll['class_id']." and SCD_division_id =".$Roll['division_id']." and SCD_AY_id =".$Roll['SCD_AY_id']." and SCD_school_profile_id =".$Roll['SCD_school_profile_id']." order by student_gender,".$roll['name']." DESC"));die();
			// print_r($this->db->query("SELECT student.*,case when SCD_Roll_No is NULL then 'N/A' else SCD_Roll_No end as SCD_Roll_No,SCD_id FROM student_class_division_assgn join student on SCD_student_profile_id = student_profile_id where SCD_class_id =".$Roll['class_id']." and SCD_division_id =".$Roll['division_id']." and SCD_AY_id =".$Roll['SCD_AY_id']." and SCD_school_profile_id =".$Roll['SCD_school_profile_id']." order by student_gender,".$roll['name']." DESC")->result_array();
		}

		function name_female_wise_sort($Roll)
		{
			return $Roll;
			// return $this->db->query("SELECT student.*,case when SCD_Roll_No is NULL then 'N/A' else SCD_Roll_No end as SCD_Roll_No,SCD_id FROM student_class_division_assgn join student on SCD_student_profile_id = student_profile_id where SCD_class_id =".$Roll['class_id']." and SCD_division_id =".$Roll['division_id']." and SCD_AY_id =".$Roll['SCD_AY_id']." and SCD_school_profile_id =".$Roll['SCD_school_profile_id']." order by student_gender,".$roll['name']."")->result_array();
		}
	}
 ?>