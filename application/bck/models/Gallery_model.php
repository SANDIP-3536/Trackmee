<?php 
/**
* 
*/
class Gallery_model extends CI_Model
{
	function image_gallery($employee_school_profile_id)
	{
		// print_r($this->db->where('gallery_school_profile_id', $employee_school_profile_id)->get('gallery')->result_array());die();
		$query = 'SELECT gallery_datetime,gallery_big,gallery_album_name,COUNT(*) as total FROM gallery WHERE gallery_school_profile_id ='.$employee_school_profile_id.' GROUP by gallery_album_name';

		return $this->db->query($query)->result_array();
	}

	function gallery($data)
	{
		$this->db->insert('gallery',$data);
	}

	function gallery_cat($data)
	{

		$query = 'SELECT gallery_datetime,gallery_big,gallery_album_name  FROM gallery WHERE gallery_school_profile_id ='.$data['school_id'].' AND gallery_album_name="'.$data['image_cat'].'"';	

		return $this->db->query($query)->result_array();
	}

}
 ?>