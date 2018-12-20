<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Fee_model extends CI_Model
	{
		function fee_category($fee)
		{
			$this->db->insert('fee_category',$fee);
			return 1; 
		}

		function fee_waiver($fee)
		{
			$this->db->insert('fee_waiver',$fee);
			return 1; 
		}

		function fee_types($fee)
		{
			$this->db->insert('fees_type',$fee);
			return 1; 
		}

		function fetch_fee_category($employee_school_profile_id)
		{
			return $this->db->query("SELECT * FROM fee_category where fee_category_school_profile_id =".$employee_school_profile_id." and fee_category_expiry_date ='9999-12-31'")->result_array();
		}

		function fetch_fee_types($employee_school_profile_id)
		{
			return $this->db->query("select * from class right join fees_type on class.class_id = fees_type.fees_type_class_id where fees_type.fees_type_school_profile_id =".$employee_school_profile_id." and fees_type.fees_type_expiry_date = '9999-12-31'")->result_array();
		}

		function fetch_fee_waiver($employee_school_profile_id,$school_AY_id)
		{
			return $this->db->query("SELECT * FROM `fee_waiver` join student on fee_waiver_student_profile_id = student_profile_id join fees_type on fees_type_id = fee_waiver_fee_type_id where fee_waiver_AY_id =".$school_AY_id." and fee_waiver_school_profile_id =".$employee_school_profile_id."")->result_array();
		}

		function fetch_fee_types_detials($fees_type_id)
		{
			return $this->db->query("select * from class join fees_type on class.class_id = fees_type.fees_type_class_id where fees_type.fees_type_id =".$fees_type_id."")->result_array();
		}

		function update_fee_types($fee)
		{
			$this->db->where('fees_type_id',$fee['fees_type_id'])->update('fees_type',$fee);
			return 1;
		}

		function fetch_class_division($class)
		{
			return $this->db->query("SELECT * FROM student_class_division_assgn join division on SCD_division_id = division_id where SCD_class_id =".$class['class_id']." and SCD_school_profile_id =".$class['employee_school_profile_id']." and SCD_expiry_date = '9999-12-31' group by SCD_division_id")->result_array();
		}

		function fetch_class_division_student($student)
		{
			return $this->db->query("SELECT * FROM `student_class_division_assgn` join student on SCD_student_profile_id = student_profile_id where SCD_class_id =".$student['class_id']." and SCD_division_id =".$student['division_id']." and SCD_school_profile_id =".$student['employee_school_profile_id']." and SCD_expiry_date = '9999-12-31'")->result_array();
		}

		function fetch_student_payments($payment)
		{
			return $this->db->query("select total_fee_type_id ,fees_type_name,total_fee_amount,case  when fee_waiver_name is NULL then 'Not Applicable' else fee_waiver_name end as fee_waiver_name,case  when fee_waiver_amount is NULL then '0' else fee_waiver_amount end as fee_waiver_amount from student 
									join school on student_school_profile_id=school_profile_id left join total_fees on total_fee_student_profile_id=student_profile_id and total_fee_AY_id=school_AY_id left join fees_type on total_fee_type_id=fees_type_id and fees_type_AY_id=school_AY_id left join fee_waiver on fee_waiver_student_profile_id=student_profile_id 
									and fee_waiver_AY_id=school_AY_id and total_fee_type_id=fee_waiver_fee_type_id where student_profile_id=".$payment['student_profile_id']." and student_school_profile_id=".$payment['employee_school_profile_id']." and student_expiry_date='9999-12-31' order by total_fee_type_id")->result_array();
		}

		function fetch_student_total_payments($payment)
		{
			return $this->db->query("select Student_profile_id ,case  when total_fee_amount is NULL then '0' else total_fee_amount end as total_fee_amount ,case  when fee_waiver_amount is NULL then '0' else fee_waiver_amount end as fee_waiver_amount ,case  when fee_amount is NULL then '0' else fee_amount end as fee_amount ,case when fee_waiver_amount is NULL and fee_amount is NULL then total_fee_amount when fee_waiver_amount is NULL then (total_fee_amount-fee_amount) when fee_amount is NULL then (total_fee_amount-fee_waiver_amount) else (total_fee_amount-fee_waiver_amount-fee_amount) end as balance from student
									join school on student_school_profile_id=school_profile_id left join (select total_fee_student_profile_id,sum(total_fee_amount) as total_fee_amount,total_fee_AY_id from total_fees group by total_fee_student_profile_id) as total_fees on total_fee_student_profile_id=student_parent_id and total_fee_AY_id=school_AY_id left join (select fee_waiver_student_profile_id,sum(fee_waiver_amount) as fee_waiver_amount,fee_waiver_AY_id from fee_waiver group by fee_waiver_student_profile_id) as fee_waiver on fee_waiver_student_profile_id=student_parent_id and fee_waiver_AY_id=school_AY_id left join (select fee_student_profile_id,sum(fee_amount) as fee_amount,fee_AY_id from fee group by fee_student_profile_id) as fee
									on fee_student_profile_id=student_profile_id and fee_AY_id=school_AY_id where student_school_profile_id=".$payment['employee_school_profile_id']." and student_profile_id=".$payment['student_profile_id']." and student_expiry_date='9999-12-31'")->result_array();
		}

		function add_student_payment($payment)
		{
			$this->db->insert('fee',$payment);
			return 1;
		}

		function payment_history($PH)
		{
			return $this->db->query("SELECT * FROM fee where fee_student_profile_id=".$PH['student_profile_id']." and fee_AY_id=".$PH['fee_AY_id']."")->result_array();
		}
	}
 ?>