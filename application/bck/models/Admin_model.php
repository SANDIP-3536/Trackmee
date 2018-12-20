<?php 

	/**
	* 
	*/
	class Admin_model extends CI_model	{

		
		public function admin_registration($data)
		{
			$this->db->insert('users',$data);
			$query = $this->db->query('SELECT user_profile_id from users order by user_profile_id desc limit 1 ');
			$result = $query->result_array();
			return $result;	
		}
		public function admin_registration_credential($data1)
		{
			$this->db->insert('credential',$data1);
		}

		function forgot_password($admin_password)
		{
			$this->db->set($admin_password)->where('credential_profile_id',$admin_password['credential_profile_id'])->where('credential_user_type','1')->update('credential');
			return 0;
		}
	}
?>