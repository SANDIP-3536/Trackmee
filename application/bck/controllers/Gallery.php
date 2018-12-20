<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Gallery extends CI_Controller
	{
		function index()
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
			$school_admin = $this->session->userdata('school');

			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);

			$gallery['image'] = $this->Gallery_model->image_gallery($employee_school_profile_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['gallery'] = 'gallery';

			$this->load->view('School/school_header',$admin);
			$this->load->view('Gallery/gallery', $gallery);
			$this->load->view('Gallery/gallery_footer',$nav);
		}

		function teacher_gallery()
		{
			if(!isset($this->session->userdata['teacher']))
			{
				redirect('/');
			}
			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
			}
			else{
				$admin['direct'] = 1;
			}  
			$school_admin = $this->session->userdata('teacher');

			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);

			$gallery['image'] = $this->Gallery_model->image_gallery($employee_school_profile_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['gallery'] = 'gallery';

			$this->load->view('Teacher/teacher_header',$admin);
			$this->load->view('Gallery/gallery', $gallery);
			$this->load->view('Gallery/gallery_footer',$nav);
		}	 

		function upload() 
		{
			if($this->session->userdata('school')) {
				$school_admin = $this->session->userdata('school');
			}else {
				$school_admin = $this->session->userdata('teacher');
			}
			$config = array(
				'upload_path' => "uploads/",
				'upload_url' => base_url() . "uploads/",
				'allowed_types' => "jpg|png|gif|jpeg"
				);
			$this->load->library('upload', $config);

			$filesCount = count($_FILES['filename']['name']);
			// print_r($filesCount);die();

			$count =0;
			$index = 0;

			for($i = 0; $i < $filesCount; $i++)
			{
				$_FILES['userFile']['name'] = $_FILES['filename']['name'][$i];
				$_FILES['userFile']['type'] = $_FILES['filename']['type'][$i];
				$_FILES['userFile']['tmp_name'] = $_FILES['filename']['tmp_name'][$i];
                // $_FILES['userFile']['error'] = $_FILES['filename']['error'][$i];
				$_FILES['userFile']['size'] = $_FILES['filename']['size'][$i];

				$path = $config['upload_url']."".$_FILES['userFile']['name'];
				// print_r($path);echo "<br>";
				// print_r(FCPATH."/uploads/".$_FILES['userFile']['name']);die();
				
				$data = $this->input->post();
				$this->upload->initialize($config);

				if ($this->upload->do_upload('userFile'))
				{
					$this->upload->data();

					$uploadData[$i]['gallery_album_name']= $this->input->post('gallery_name'); 
					$uploadData[$i]['gallery_big']=$path;
					$uploadData[$i]['gallery_effective_date'] =  date('Y-m-d h:i:s');
					$uploadData[$i]['gallery_school_profile_id'] = $school_admin[0]['employee_school_profile_id'];
					// $uploadData[$i]['imaeg_added_by_user'] = $this->session->userdata['school']['user_profile_id'];
// ========================================================
				    $config['image_library'] = 'GD2';
				    $config['source_image'] = FCPATH.'uploads/'.$_FILES['userFile']['name'];
				    $config['create_thumb'] = FCPATH.'uploads/'.$_FILES['userFile']['name'];
				    $config['width'] = '100';
				    
				    // $config['height'] = '3';
				    $config['maintain_ratio'] = TRUE;

				    $this->image_lib->initialize($config);

				    if ( ! $this->image_lib->resize())
				    {
				        echo $this->image_lib->display_errors();

				    }else
				    {
				    	$data = explode('.',$_FILES['userFile']['name']);
				    	$uploadData[$i]['gallery_small'] = base_url().'uploads/'.$data[0].'_thumb.'.$data[1];
				    }

// ========================================================

					$this->db->insert("gallery", $uploadData[$i]);

				}
				else
				{
					echo "Error uploading file";
				}
			}
			if($this->session->userdata('school')) {
				redirect('Gallery');
			}else {
				redirect('Gallery/teacher_gallery');
			}
		}

		public function img_link($image_cat)	
		{ 

			$this->session->set_flashdata('img_cat',$image_cat);
			redirect('gallery/img_link_new');
		}

		public function img_link_new()	
		{ 
			$data['image_cat'] = $this->session->flashdata('img_cat');

			if(isset($this->session->userdata['direct'])){
				$admin['direct'] = $this->session->userdata('direct');
				// print($school['direct']);die();
			}
			else{
				$admin['direct'] = 1;
			}
			$school_admin = $this->session->userdata('school');
			$admin['user'] = $school_admin[0]['employee_pri_mobile_number'];
			$admin['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['photo'] = $school_admin[0]['employee_photo'];
			$admin['first_name'] = $school_admin[0]['employee_first_name'];
			$admin['last_name'] = $school_admin[0]['employee_last_name'];
			$admin['email_id'] = $school_admin[0]['employee_email_id'];
			$admin['username'] = $school_admin[0]['credential_username'];
			$admin['AY_name'] = $school_admin[0]['AY_name'];
			$employee_school_profile_id = $school_admin[0]['employee_school_profile_id'];
			$school['user_profile_id'] = $school_admin[0]['employee_profile_id'];
			$admin['functionality'] = $this->School_model->fetch_functionality($school);
			
			$data['school_id'] = $school_admin[0]['employee_school_profile_id'];
			$gallery['image'] = $this->Gallery_model->gallery_cat($data);
			$gallery['image_cat'] = $this->Gallery_model->image_gallery($employee_school_profile_id);
			$nav['school_name'] = $school_admin[0]['school_name'];
			$nav['school_logo'] = $school_admin[0]['school_logo'];
			$nav['gallery'] = 'gallery';

			
			$this->load->view('School/school_header',$admin);
			$this->load->view('Gallery/gallery_pic_view', $gallery);
			$this->load->view('Gallery/gallery_footer',$nav);
		}





	}
 ?>