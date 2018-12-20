<?php
	class User_model extends CI_Model
	{
		function user_add($user){
			$this->db->insert('user', $user);
			$query = $this->db->query('Select * from user ORDER BY user_profile_id DESC limit 1');
			return $query->result_array();
		}

		function user_credential($user_credential)
		{
			$this->db->insert('credential', $user_credential);
		}

		function fetch_user_by_session($user_client_profile_id)				
		{
			if (isset($this->session->userdata['client'])) {
				return $this->db->query("SELECT * FROM user join client on client_profile_id =user_client_profile_id where user_client_profile_id = ".$user_client_profile_id."")->result_array();
			}elseif (isset($this->session->userdata['Institute'])) {
				return $this->db->query("SELECT * FROM user join client on client_profile_id =user_client_profile_id where user_client_profile_id IN (select client_profile_id from client where client_institute_profile_id = ".$user_client_profile_id.")")->result_array();
			}
		}

		function update_user($user_profile_id)
		{
			return $this->db->where('user_profile_id', $user_profile_id)->get('user')->result_array();
		}

		function update_user_details($update_user)
		{
			$this->db->set($update_user)->where('user_profile_id',$update_user['user_profile_id'])->update('user');
			return 0;
		}

		function edit_profile($profile)
		{
			$this->db->set($profile)->where('user_profile_id',$profile['user_profile_id'])->update('user');
			return 1;
		}

		function document_details($employee)
		{
			return $this->db->where('doc_user',$employee['student_profile_id'])->where('doc_user_type','5')->get('document')->result_array();
		}

		function deactive($user_profile_id)
		{
			$this->db->set('user_expiry_date', date('Y-m-d'))->where('user_profile_id',$user_profile_id)->update('user');
			return 0;
		}

		function active($user_profile_id)
		{
			$this->db->set('user_expiry_date', '9999-12-31')->where('user_profile_id',$user_profile_id)->update('user');
			return 0;
		}
	}
 ?>