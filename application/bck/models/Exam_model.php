<?php 

	
	class Exam_model extends CI_Model
	{
		function exam_registration($exam)
		{
			$this->db->insert('exam',$exam);
			return 1;
		}

		function exam_schedule_registration($exam)
		{
			$this->db->insert('exam_schedule',$exam);
			return 1;
		}

		function term_registration($term)
		{
			$this->db->insert('term',$term);
			return 1;
		}

		function grade_registration($GC_grade)
		{
			$this->db->insert('grade_scale',$GC_grade);
			return 1;
		}

		function internal_exam_registration($IE)
		{
			$this->db->insert('internal_exam',$IE);
			return 1;
		}

		function exam_mark_registration($exam_marks)
		{
			$this->db->insert('exam_marks',$exam_marks);
			return 1;
		}

		function IE_mark_registration($IE_marks)
		{
			$this->db->insert('internal_exam_marks',$IE_marks);
			return 1;
		}

		function fetch_term($employee_school_profile_id,$school_AY_id)
		{
			return $this->db->query("SELECT * FROM term where term_school_profile_id =".$employee_school_profile_id." and term_AY_id =".$school_AY_id."")->result_array();
		}

		function fetch_exam($employee_school_profile_id,$school_AY_id)
		{
			return $this->db->query("SELECT * FROM exam join term on exam_term_id= term_id where exam_school_profile_id =".$employee_school_profile_id." and exam_AY_id =".$school_AY_id."")->result_array();
		}

		function fetch_grade($employee_school_profile_id,$school_AY_id)
		{
			return $this->db->query("SELECT * FROM grade_scale where GC_school_profile_id =".$employee_school_profile_id." and GC_AY_id =".$school_AY_id."")->result_array();
		}
		function fetch_IE($employee_school_profile_id,$school_AY_id)
		{
			return $this->db->query("SELECT * FROM `internal_exam` join exam_schedule on IE_exam_sched_id = exam_sched_id where IE_AY_id =".$school_AY_id." and IE_school_profile_id =".$employee_school_profile_id."")->result_array();
		}

		function fetch_exam_schedule($employee_school_profile_id,$school_AY_id)
		{
			return $this->db->query("SELECT * FROM exam_schedule join subject on subject_id = exam_sched_subject_id join class on class_id = exam_sched_class_id join term on exam_sched_exam_id = term_id where exam_sched_expiry_date = '9999-12-31' and exam_sched_school_profile_id =".$employee_school_profile_id." and exam_sched_AY_id =".$school_AY_id."")->result_array();
		}

		function fetch_teacher_exam_marks($employee_school_profile_id,$school_AY_id,$employee_profile_id)
		{
			return $this->db->query("SELECT * from exam_marks join exam ON exam_id = exam_marks_exam_id JOIN exam_schedule ON exam_marks_exam_sched_id = exam_sched_id JOIN(SELECT * from student join (select * from student_class_division_assgn join teacher_class_division_subject_assgn on TCDS_class_id = SCD_class_id and TCDS_division_id = SCD_division_id where TCDS_school_profile_id =".$employee_school_profile_id." and TCDS_AY_id=".$school_AY_id." and TCDS_expiry_date='9999-12-31' and TCDS_employee_profile_id =".$employee_profile_id." group by SCD_student_profile_id) as student_class on student_profile_id = SCD_student_profile_id and student_expiry_date = student_class.TCDS_expiry_date and student_class.TCDS_school_profile_id = student_school_profile_id) as student_details 
									on student_details.student_profile_id = exam_marks_student_id and exam_marks_expiry_date = student_details.student_expiry_date and student_details.student_school_profile_id = exam_marks_school_profile_id and student_details.TCDS_AY_id = exam_marks_AY_id")->result_array();	
		}

		function fetch_teacher_IE_exam($employee_school_profile_id,$school_AY_id,$employee_profile_id)
		{
			return $this->db->query("SELECT * from internal_exam_marks join internal_exam ON IEM_id = IE_id JOIN(SELECT * from student join (select * from student_class_division_assgn join teacher_class_division_subject_assgn on TCDS_class_id = SCD_class_id and TCDS_division_id = SCD_division_id where TCDS_school_profile_id =".$employee_school_profile_id." and TCDS_AY_id=".$school_AY_id." and TCDS_expiry_date='9999-12-31' and TCDS_employee_profile_id =".$employee_profile_id." group by SCD_student_profile_id) as student_class on student_profile_id = SCD_student_profile_id and student_class.TCDS_school_profile_id = student_school_profile_id) as student_details 
									on student_details.student_profile_id = IEM_student_id and student_details.student_school_profile_id = IEM_school_profile_id and student_details.TCDS_AY_id = IEM_AY_id")->result_array();	
		}

		function fetch_exam_marks($employee_school_profile_id,$school_AY_id)
		{
			return $this->db->query("select * from exam_marks join exam on exam_id = exam_marks_exam_id join exam_schedule on exam_marks_exam_sched_id = exam_sched_id join student on student_profile_id = exam_marks_student_id where exam_marks_school_profile_id =".$employee_school_profile_id." and exam_marks_AY_id=".$school_AY_id." and exam_marks_expiry_date='9999-12-31'")->result_array();
		}

		function fetch_IE_marks($employee_school_profile_id,$school_AY_id)
		{
			return $this->db->query("select * from internal_exam_marks join internal_exam on IE_id = IEM_IE_id join student on student_profile_id = IEM_student_id where IEM_school_profile_id =".$employee_school_profile_id." and IEM_AY_id=".$school_AY_id."")->result_array();
		}

		function exam_update($exam)
		{
			$this->db->where('exam_id',$exam['exam_id'])->update('exam_schedule',$exam);
			return 1;
		}

		function fetch_school_class($employee_school_profile_id)
		{
			return $this->db->query("SELECT * FROM class where class_school_profile_id =".$employee_school_profile_id." and class_expiry_date='9999-12-31' group by class_id")->result_array();
		}

		function fetch_teacher_class_subject($employee_school_profile_id,$school_AY_id,$employee_profile_id)
		{
			return $this->db->query("SELECT TCDS_id,class_name,division_name,subject_name,case when subject_type = 1 then 'Theory' when subject_type = 2 then 'Practical' when subject_type = 3 then 'Project' when subject_type = 4 then 'Oral' when subject_type = 5 then 'Assignment' end as subject_type FROM `teacher_class_division_subject_assgn` join class on class_id = TCDS_class_id join division on division_id = TCDS_division_id join subject on TCDS_subject_id = subject_id where TCDS_Ay_id =".$school_AY_id." and TCDS_school_profile_id =".$employee_school_profile_id." and TCDS_employee_profile_id =".$employee_profile_id." group by class_name,division_name,subject_name,subject_type")->result_array();
		}

		function fetch_school_subject($subject)
		{
			return $this->db->query("SELECT subject_id,subject_name,case when subject_type = 1 then 'Theory' when subject_type= 2 then 'Practical' when subject_type= 3 then 'Project' when subject_type= 4 then 'Oral' when subject_type= 5 then 'Assignment' end as subject_type from subject  where subject_school_profile_id =".$subject['subject_school_profile_id']." and subject_expiry_date = '9999-12-31' and subject_class_id =".$subject['class_id']."")->result_array();
		}

		function fetch_exam_schedule_wise_exam($exam)
		{
			return $this->db->query("SELECT * FROM exam_schedule where exam_sched_exam_id =".$exam['exam_id']." and exam_sched_expiry_date ='9999-12-31' and exam_sched_AY_id =".$exam['school_AY_id']." and exam_sched_school_profile_id =".$exam['employee_school_profile_id']."")->result_array();
		}

		function fetch_teacher_student($employee_school_profile_id,$school_AY_id,$employee_profile_id)
		{
			return $this->db->query("SELECT * from student join(select * from student_class_division_assgn join teacher_class_division_subject_assgn on TCDS_class_id = SCD_class_id and TCDS_division_id = SCD_division_id where TCDS_school_profile_id =".$employee_school_profile_id." and TCDS_AY_id=".$school_AY_id." and TCDS_expiry_date='9999-12-31' and TCDS_employee_profile_id =".$employee_profile_id." group by SCD_student_profile_id) as student_class on student_profile_id = SCD_student_profile_id and student_expiry_date = student_class.TCDS_expiry_date and student_class.TCDS_school_profile_id = student_school_profile_id")->result_array();
		}

		// function fetch_school_class($employee_school_profile_id,$employee_profile_id,$school_AY_id)
		// {
		// 	return $this->db->query("SELECT * FROM `teacher_class_division_subject_assgn` join class on class_id = TCDS_class_id join subject on subject_id = TCDS_subject_id where TCDS_school_profile_id =".$employee_school_profile_id." and TCDS_expiry_date='9999-12-31' and TCDS_AY_id =".$school_AY_id." and TCDS_employee_profile_id =".$employee_profile_id." group by class_name")->result_array();
		// }

		// function fetch_school_subject($employee_school_profile_id,$employee_profile_id,$school_AY_id)
		// {
		// 	return $this->db->query("SELECT * FROM `teacher_class_division_subject_assgn` join class on class_id = TCDS_class_id join subject on subject_id = TCDS_subject_id where TCDS_school_profile_id =".$employee_school_profile_id." and TCDS_expiry_date='9999-12-31' and TCDS_AY_id =".$school_AY_id." and TCDS_employee_profile_id =".$employee_profile_id." group by subject_name,subject_type")->result_array();
		// }
	}
 ?>