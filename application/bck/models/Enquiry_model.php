<?php
	
	class Enquiry_model extends CI_Model{
		
		function LBD_logo()
		{
			return  $this->db->query('SELECT school_logo FROM `school` WHERE school_profile_id = 4')->row()->school_logo;
		}

		function LBD_pre_primary_school_enquiry_id()
		{
			return $this->db->query("SELECT school_future_AY_id from school where school_profile_id = 4")->row()->school_future_AY_id;
		}

		function LBD_primary_school_enquiry_id()
		{
			return $this->db->query("SELECT school_future_AY_id from school where school_profile_id = 5")->row()->school_future_AY_id;
		}

		function vidya_logo()
		{
			return  $this->db->query('SELECT school_logo FROM `school` WHERE school_profile_id = 3')->row()->school_logo;
		}

		function vidya_pre_primary_school_enquiry_id()
		{
			return $this->db->query("SELECT school_future_AY_id from school where school_profile_id = 2")->row()->school_future_AY_id;
		}

		function vidya_primary_school_enquiry_id()
		{
			return $this->db->query("SELECT school_future_AY_id from school  where school_profile_id = 3")->row()->school_future_AY_id;
		}

		function add_enquiry($data)
		{
			$this->db->insert('enquiry',$data);
		}

		function LBD_form_no_wise_status($status)
		{
			return $this->db->query("SELECT enquiry.*,case when enquiry_status = 1 then 'Form submitted. Pending for Appoinment.' when enquiry_status = 2 then CONCAT('Appointment has been sheduled on ',enquiry_appointment_date)  when enquiry_status = 3 then 'Pending for conformation.'  when enquiry_status = 4 then 'Pending for conformation.'  when enquiry_status = 5 then 'Student has been admitted successfully in school.' when enquiry_status = 6 then 'Student has been Rejected.' end as enquiry_status_details FROM `enquiry` where enquiry_form_no =".$status['form_no']." and enquiry_school_profile_id =".$status['enquiry_school_profile_id']." or enquiry_school_profile_id =".$status['enquiry_school_profile_id_1']."")->result_array();
		}

		function LBD_other_wise_status($status)
		{
			return $this->db->query("SELECT enquiry.*,case when enquiry_status = 1 then 'Form submitted. Pending for Appoinment.' when enquiry_status = 2 then CONCAT('Appointment has been sheduled on ',enquiry_appointment_date)  when enquiry_status = 3 then 'Pending for conformation.'  when enquiry_status = 4 then 'Pending for conformation.'  when enquiry_status = 5 then 'Student has been admitted successfully in school.' when enquiry_status = 6 then 'Student has been Rejected.' end as enquiry_status_details FROM `enquiry` where enquiry_student_first_name ='".$status['first_name']."' and enquiry_parent_mobile_number =".$status['mobile_number']." and enquiry_student_DOB ='".$status['DOB']."' and enquiry_school_profile_id =".$status['enquiry_school_profile_id']." or enquiry_school_profile_id =".$status['enquiry_school_profile_id_1']."")->result_array();
		}

		function vidya_form_no_wise_status($status)
		{
			return $this->db->query("SELECT enquiry.*,case when enquiry_status = 1 then 'Form submitted. Pending for Appoinment.' when enquiry_status = 2 then CONCAT('Appointment has been sheduled on ',enquiry_appointment_date)  when enquiry_status = 3 then 'Pending for conformation.'  when enquiry_status = 4 then 'Pending for conformation.'  when enquiry_status = 5 then 'Student has been admitted successfully in school.' when enquiry_status = 6 then 'Student has been Rejected.' end as enquiry_status_details FROM `enquiry` where enquiry_form_no =".$status['form_no']." and enquiry_school_profile_id =".$status['enquiry_school_profile_id']." or enquiry_school_profile_id =".$status['enquiry_school_profile_id_1']."")->result_array();
		}

		function vidya_other_wise_status($status)
		{
			return $this->db->query("SELECT enquiry.*,case when enquiry_status = 1 then 'Form submitted. Pending for Appoinment.' when enquiry_status = 2 then CONCAT('Appointment has been sheduled on ',enquiry_appointment_date)  when enquiry_status = 3 then 'Pending for conformation.'  when enquiry_status = 4 then 'Pending for conformation.'  when enquiry_status = 5 then 'Student has been admitted successfully in school.' when enquiry_status = 6 then 'Student has been Rejected.' end as enquiry_status_details FROM `enquiry` where enquiry_student_first_name ='".$status['first_name']."' and enquiry_parent_mobile_number =".$status['mobile_number']." and enquiry_student_DOB ='".$status['DOB']."' and enquiry_school_profile_id =".$status['enquiry_school_profile_id']." or enquiry_school_profile_id =".$status['enquiry_school_profile_id_1']."")->result_array();
		}

		function fetch_all_enquiry($employee_school_profile_id)
		{
			return $this->db->query("SELECT enquiry.*,case when enquiry_status = 1 then 'Form submitted. Pending for Appoinment.' when enquiry_status = 2 then CONCAT('Appointment has been sheduled on ',enquiry_appointment_date)  when enquiry_status = 3 then 'Pending for conformation.'  when enquiry_status = 4 then 'Pending for conformation.'  when enquiry_status = 5 then 'Student has been admitted successfully in school.' when enquiry_status = 6 then 'Student has been Rejected.' end as enquiry_status_details from enquiry where enquiry_school_profile_id =".$employee_school_profile_id." order by enquiry_form_no")->result_array();
		}

		function fetch_enquiry_form($employee_school_profile_id)
		{
			return $this->db->query("SELECT enquiry.*,case when enquiry_status = 1 then 'Form submitted. Pending for Appoinment.' when enquiry_status = 2 then CONCAT('Appointment has been sheduled on ',enquiry_appointment_date)  when enquiry_status = 3 then 'Pending for conformation.'  when enquiry_status = 4 then 'Pending for conformation.'  when enquiry_status = 5 then 'Student has been admitted successfully in school.' when enquiry_status = 6 then 'Student has been Rejected.' end as enquiry_status_details from enquiry where enquiry_school_profile_id =".$employee_school_profile_id." and enquiry_status = 1")->result_array();
		}

		function fetch_appoinment_enquiry($employee_school_profile_id)
		{
			return $this->db->query("SELECT enquiry.*,case when enquiry_status = 1 then 'Form submitted. Pending for Appoinment.' when enquiry_status = 2 then CONCAT('Appointment has been sheduled on ',enquiry_appointment_date)  when enquiry_status = 3 then 'Pending for conformation.'  when enquiry_status = 4 then 'Pending for conformation.'  when enquiry_status = 5 then 'Student has been admitted successfully in school.' when enquiry_status = 6 then 'Student has been Rejected.'  end as enquiry_status_details from enquiry where enquiry_school_profile_id =".$employee_school_profile_id." and enquiry_status = 2")->result_array();
		}

		function fetch_meeting_enquiry($employee_school_profile_id)
		{
			return $this->db->query("SELECT enquiry.*,case when enquiry_status = 1 then 'Form submitted. Pending for Appoinment.' when enquiry_status = 2 then CONCAT('Appointment has been sheduled on ',enquiry_appointment_date)  when enquiry_status = 3 then 'Pending for conformation.'  when enquiry_status = 4 then 'Pending for conformation.'  when enquiry_status = 5 then 'Student has been admitted successfully in school.' when enquiry_status = 6 then 'Student has been Rejected.'  end as enquiry_status_details from enquiry where enquiry_school_profile_id =".$employee_school_profile_id." and enquiry_status = 3")->result_array();
		}

		function fetch_pending_enquiry($employee_school_profile_id)
		{
			return $this->db->query("SELECT enquiry.*,case when enquiry_status = 1 then 'Form submitted. Pending for Appoinment.' when enquiry_status = 2 then CONCAT('Appointment has been sheduled on ',enquiry_appointment_date)  when enquiry_status = 3 then 'Pending for conformation.'  when enquiry_status = 4 then 'Pending for conformation.'  when enquiry_status = 5 then 'Student has been admitted successfully in school.' when enquiry_status = 6 then 'Student has been Rejected.'  end as enquiry_status_details from enquiry where enquiry_school_profile_id =".$employee_school_profile_id." and enquiry_status = 4")->result_array();
		}	

		function fetch_admitted_enquiry($employee_school_profile_id)
		{
			return $this->db->query("SELECT enquiry.*,case when enquiry_status = 1 then 'Form submitted. Pending for Appoinment.' when enquiry_status = 2 then CONCAT('Appointment has been sheduled on ',enquiry_appointment_date)  when enquiry_status = 3 then 'Pending for conformation.'  when enquiry_status = 4 then 'Pending for conformation.'  when enquiry_status = 5 then 'Student has been admitted successfully in school.' when enquiry_status = 6 then 'Student has been Rejected.'  end as enquiry_status_details from enquiry where enquiry_school_profile_id =".$employee_school_profile_id." and enquiry_status = 5")->result_array();
		}

		function fetch_rejected_enquiry($employee_school_profile_id)
		{
			return $this->db->query("SELECT enquiry.*,case when enquiry_status = 1 then 'Form submitted. Pending for Appoinment.' when enquiry_status = 2 then CONCAT('Appointment has been sheduled on ',enquiry_appointment_date)  when enquiry_status = 3 then 'Pending for conformation.'  when enquiry_status = 4 then 'Pending for conformation.'  when enquiry_status = 5 then 'Student has been admitted successfully in school.' when enquiry_status = 6 then 'Student has been Rejected.'  end as enquiry_status_details from enquiry where enquiry_school_profile_id =".$employee_school_profile_id." and enquiry_status = 6	")->result_array();
		}

		function fetch_all_enquiry_count($employee_school_profile_id)
		{
			return $this->db->query("SELECT enquiry.*,case when enquiry_status = 1 then 'Form submitted. Pending for Appoinment.' when enquiry_status = 2 then CONCAT('Appointment has been sheduled on ',enquiry_appointment_date)  when enquiry_status = 3 then 'Pending for conformation.'  when enquiry_status = 4 then 'Pending for conformation.'  when enquiry_status = 5 then 'Student has been admitted successfully in school.' when enquiry_status = 6 then 'Student has been Rejected.' end as enquiry_status_details from enquiry where enquiry_school_profile_id =".$employee_school_profile_id."")->num_rows();
		}

		function fetch_enquiry_form_count($employee_school_profile_id)
		{
			return $this->db->query("SELECT enquiry.*,case when enquiry_status = 1 then 'Form submitted. Pending for Appoinment.' when enquiry_status = 2 then CONCAT('Appointment has been sheduled on ',enquiry_appointment_date)  when enquiry_status = 3 then 'Pending for conformation.'  when enquiry_status = 4 then 'Pending for conformation.'  when enquiry_status = 5 then 'Student has been admitted successfully in school.' when enquiry_status = 6 then 'Student has been Rejected.' end as enquiry_status_details from enquiry where enquiry_school_profile_id =".$employee_school_profile_id." and enquiry_status = 1")->num_rows();
		}

		function fetch_appoinment_enquiry_count($employee_school_profile_id)
		{
			return $this->db->query("SELECT enquiry.*,case when enquiry_status = 1 then 'Form submitted. Pending for Appoinment.' when enquiry_status = 2 then CONCAT('Appointment has been sheduled on ',enquiry_appointment_date)  when enquiry_status = 3 then 'Pending for conformation.'  when enquiry_status = 4 then 'Pending for conformation.'  when enquiry_status = 5 then 'Student has been admitted successfully in school.' when enquiry_status = 6 then 'Student has been Rejected.'  end as enquiry_status_details from enquiry where enquiry_school_profile_id =".$employee_school_profile_id." and enquiry_status = 2")->num_rows();
		}

		function fetch_meeting_enquiry_count($employee_school_profile_id)
		{
			return $this->db->query("SELECT enquiry.*,case when enquiry_status = 1 then 'Form submitted. Pending for Appoinment.' when enquiry_status = 2 then CONCAT('Appointment has been sheduled on ',enquiry_appointment_date)  when enquiry_status = 3 then 'Pending for conformation.'  when enquiry_status = 4 then 'Pending for conformation.'  when enquiry_status = 5 then 'Student has been admitted successfully in school.' when enquiry_status = 6 then 'Student has been Rejected.'  end as enquiry_status_details from enquiry where enquiry_school_profile_id =".$employee_school_profile_id." and enquiry_status = 3")->num_rows();
		}

		function fetch_pending_enquiry_count($employee_school_profile_id)
		{
			return $this->db->query("SELECT enquiry.*,case when enquiry_status = 1 then 'Form submitted. Pending for Appoinment.' when enquiry_status = 2 then CONCAT('Appointment has been sheduled on ',enquiry_appointment_date)  when enquiry_status = 3 then 'Pending for conformation.'  when enquiry_status = 4 then 'Pending for conformation.'  when enquiry_status = 5 then 'Student has been admitted successfully in school.' when enquiry_status = 6 then 'Student has been Rejected.'  end as enquiry_status_details from enquiry where enquiry_school_profile_id =".$employee_school_profile_id." and enquiry_status = 4")->num_rows();
		}	

		function fetch_admitted_enquiry_count($employee_school_profile_id)
		{
			return $this->db->query("SELECT enquiry.*,case when enquiry_status = 1 then 'Form submitted. Pending for Appoinment.' when enquiry_status = 2 then CONCAT('Appointment has been sheduled on ',enquiry_appointment_date)  when enquiry_status = 3 then 'Pending for conformation.'  when enquiry_status = 4 then 'Pending for conformation.'  when enquiry_status = 5 then 'Student has been admitted successfully in school.' when enquiry_status = 6 then 'Student has been Rejected.'  end as enquiry_status_details from enquiry where enquiry_school_profile_id =".$employee_school_profile_id." and enquiry_status = 5")->num_rows();
		}

		function fetch_rejected_enquiry_count($employee_school_profile_id)
		{
			return $this->db->query("SELECT enquiry.*,case when enquiry_status = 1 then 'Form submitted. Pending for Appoinment.' when enquiry_status = 2 then CONCAT('Appointment has been sheduled on ',enquiry_appointment_date)  when enquiry_status = 3 then 'Pending for conformation.'  when enquiry_status = 4 then 'Pending for conformation.'  when enquiry_status = 5 then 'Student has been admitted successfully in school.' when enquiry_status = 6 then 'Student has been Rejected.'  end as enquiry_status_details from enquiry where enquiry_school_profile_id =".$employee_school_profile_id." and enquiry_status = 6	")->num_rows();
		}	

		function fetch_enquiry_process($employee_school_profile_id,$enquiry_id)
		{
			return $this->db->query("SELECT * FROM enquiry where enquiry_id = ".$enquiry_id." and enquiry_school_profile_id = ".$employee_school_profile_id."")->result_array();			
		}	

		function appoinment_update($status)
		{
			$this->db->set($status)->where('enquiry_id',$status['enquiry_id'])->update('enquiry',$status);
			return 1;
		}	

		function enquiry_details_by_id($enquiry_id)
		{
			return $this->db->query("SELECT enquiry.*,case when enquiry_status = 1 then 'Form submitted. Pending for Appoinment.' when enquiry_status = 2 then CONCAT('Appointment has been sheduled on ',enquiry_appointment_date)  when enquiry_status = 3 then 'Pending for conformation.'  when enquiry_status = 4 then 'Pending for conformation.'  when enquiry_status = 5 then 'Student has been admitted successfully in school.' when enquiry_status = 6 then 'Student has been Rejected.' end as enquiry_status_details from enquiry where enquiry_id =".$enquiry_id."")->result();
		}

		function update_enquiry_status($enquiry)
		{
			$this->db->set('school_future_AY_id',$enquiry['school_future_AY_id'])->where('school_profile_id',$enquiry['employee_school_profile_id'])->update('school');
			return 1;
		}

	}

?>