<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['alert'] = $this->session->flashdata('alert');
		$data['error'] = $this->session->flashdata('error');
		$data['success'] = $this->session->flashdata('success');
		// $this->load->view('Dashboard/login');
		$this->load->view('Dashboard/header');
		$this->load->view('Dashboard/dashboard');
		$this->load->view('Dashboard/footer');
	}

	function dashboard()
	{
		$this->load->view('Dashboard/header');
		$this->load->view('Dashboard/dashboard');
		$this->load->view('Dashboard/footer');
	}

	public function admin_registration()
	{
			$this->load->view('Dashboard/header');
			$this->load->view('Admin/admin_registration');
			$this->load->view('Dashboard/footer');		
	}

	
	
	public function Admin_details(){


		$data['user_type'] = $this->input->post('user_type');
		$data['user_created_by'] = $this->input->post('user_created_by');
		$data['user_username'] = $this->input->post('user_username');
		$data['user_email_id'] = $this->input->post('user_email_id');
		$data['user_mobile_number'] = $this->input->post('user_mobile_number');
		$data['user_password'] = md5($this->input->post('user_password'));
		$data['user_effective_date'] = date('d/m/Y');
		// print_r($data);die();
		
		$data['user_photo'] = $this->upload('user_photo', 'profile_photo');


		// print_r($data);die();

		$this->Authentication_model->admin_registration($data);
		redirect('Welcome/dashboard');
		// print_r($data);
	}

	public function upload($file, $folder)
	{	
		$config = array(
			'upload_path' => 'profile_photo/',
			'upload_url' => base_url() .'profile_photo/',
			'allowed_types' => 'jpg|jpeg|png|gif',
			 );
		$this->upload->initialize($config);

		if(!$this->upload->do_upload($file)){
			$upload_files = array('upload_data' => '');
			echo $this->upload->display_errors('<p style="color:#FF0000;">','</p>');die();
		}
		else{
		$upload_files = array('upload_data' => $this->upload->data());
			
		}

		$user_photo = base_url().'profile_photo/'.$upload_files['upload_data']['file_name'];
		$this->upload->data();

		return $user_photo;


	}

	function login_forgot_password()
	{
		$data['flash']['active'] = $this->session->flashdata('active');
        $data['flash']['title'] = $this->session->flashdata('title');
        $data['flash']['text'] = $this->session->flashdata('text');
        $data['flash']['type'] = $this->session->flashdata('type');

		$this->load->view('Dashboard/login_forgot_password',$data);
	}

	function valid_user_or_not()
	{
		$username = $_POST['username'];
		$data = $this->db->where('credential_username',$username)->get('credential')->num_rows();
		echo json_decode($data);
	}

	public function forgot_password_form()
	{
		$data['flash']['active'] = $this->session->flashdata('active');
        $data['flash']['title'] = $this->session->flashdata('title');
        $data['flash']['text'] = $this->session->flashdata('text');
        $data['flash']['type'] = $this->session->flashdata('type');

		$data['credential_username'] = $this->input->post('credential_username');

		$user_check = $this->Authentication_model->user_check($data);

		$data['email_id'] = $user_check['email_id'];
		$data['mobile_number'] = $user_check['mobile_number'];

		if($user_check == 5){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Sorry!");
	            $this->session->set_flashdata('text',"User Does Not Exists.");
	            $this->session->set_flashdata('type',"warning");

				redirect('Welcome/login_forgot_password');
			}

		$otp = rand(10000000,99999999);
		$data1['OTP'] = $otp;
		$data1['credential_username'] = $data['credential_username'];

		$this->Authentication_model->update($data1);

		$number=$data['mobile_number'] ;
		
		$message="Dear User, \nYour OTP to reset password is ".$data1['OTP'].". \nRegards, \nTeam TrackMee.";

		if(!$this->Authentication_model->sms($number,$message))
			{
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Sorry!");
	            $this->session->set_flashdata('text',"Error in Sending..Sorry.");
	            $this->session->set_flashdata('type',"warning");

				redirect('Welcome/login_forgot_password');
			}
			else
			{
				// Send Mail of OTP Begin
				$config['protocol'] = $this->config->item('protocol');
				$config['smtp_host'] = $this->config->item('smtp_host');
				$config['smtp_port'] = $this->config->item('smtp_port');
				$config['smtp_timeout'] = $this->config->item('smtp_timeout');
				$config['smtp_user'] = $this->config->item('smtp_user');
				$config['smtp_pass'] = $this->config->item('smtp_pass');
				$config['charset'] = $this->config->item('charset');
				$config['newline'] = $this->config->item('newline');
				$config['mailtype'] = $this->config->item('mailtype');
				$config['validation'] = $this->config->item('validation');

				$this->email->initialize($config);
				$this->email->from('info@syntech.co.in','School Tracking');
				$this->email->to(''.$data['email_id'].'');
				$this->email->subject('OTP For Password Change Of School Tracking Account');
				$this->email->message('Your OTP for Username: '.$data1['credential_username'].' is as follows : <br> OTP: '.$data1['OTP'].'');

				if($this->email->send()){
						$this->session->set_flashdata('active',1);
			            $this->session->set_flashdata('title',"Send!");
			            $this->session->set_flashdata('text',"OTP Sent On Mobile Number");
			            $this->session->set_flashdata('type',"success");

				$this->load->view('Dashboard/otp_send',$data);

				}else{
						$this->session->set_flashdata('active',1);
			            $this->session->set_flashdata('title',"Sorry!");
			            $this->session->set_flashdata('text',"Error in Sending OTP.");
			            $this->session->set_flashdata('type',"warning");

				redirect('Welcome/login_forgot_password');
			}
		}
	}

	function forgot_password_otp()
	{
		$data['flash']['active'] = $this->session->flashdata('active');
        $data['flash']['title'] = $this->session->flashdata('title');
        $data['flash']['text'] = $this->session->flashdata('text');
        $data['flash']['type'] = $this->session->flashdata('type');

		$data['credential_username'] = $this->input->post('credential_username');
		$data['otp'] = $this->input->post('otp');
		$data['email_id'] = $this->input->post('email_id');
		$data['mobile_number'] = $this->input->post('mobile_number');

		$otp_check = $this->Authentication_model->otp_check($data);

		if($otp_check == 6){
				$this->session->set_flashdata('active',1);
	            $this->session->set_flashdata('title',"Sorry!");
	            $this->session->set_flashdata('text',"OTP Does Not Match.");
	            $this->session->set_flashdata('type',"warning");
				redirect('Welcome/login_forgot_password');
			}

				// redirect('Welcome/change_password');
				$this->load->view('Dashboard/change_password',$data);	

	}
	// function change_password()
	// {
	// 	$data['flash']['active'] = $this->session->flashdata('active');
 //        $data['flash']['title'] = $this->session->flashdata('title');
 //        $data['flash']['text'] = $this->session->flashdata('text');
 //        $data['flash']['type'] = $this->session->flashdata('type');

	// 	$this->load->view('Dashboard/change_password',$data);	
	// }

	function new_password()
	{
		$data['credential_username'] = $this->input->post('credential_username');
		$data['email_id'] = $this->input->post('email_id');
		$data['mobile_number'] = $this->input->post('mobile_number');
		
		$data2['credential_password'] = $this->input->post('password');

		$data1['credential_password'] = md5($this->input->post('password'));
		$data1['credential_username'] = $data['credential_username'];
		$data1['OTP'] = '';


		$this->Authentication_model->update_pass($data1);

		
		// Send Mail of New Password Begin
		$config['protocol'] = $this->config->item('protocol');
		$config['smtp_host'] = $this->config->item('smtp_host');
		$config['smtp_port'] = $this->config->item('smtp_port');
		$config['smtp_timeout'] = $this->config->item('smtp_timeout');
		$config['smtp_user'] = $this->config->item('smtp_user');
		$config['smtp_pass'] = $this->config->item('smtp_pass');
		$config['charset'] = $this->config->item('charset');
		$config['newline'] = $this->config->item('newline');
		$config['mailtype'] = $this->config->item('mailtype');
		$config['validation'] = $this->config->item('validation');

		$this->email->initialize($config);
		$this->email->from('info@syntech.co.in','School Tracking');
	
		$this->email->to(''.$data['email_id'].'');
		$this->email->subject('Password For Your School Tracking Account Has Changed');
		$this->email->message('Hi,Your Password has changed for Username: '.$data['credential_username'].' is as follows: New Password: '.$data2['credential_password'].'');

		if($this->email->send()){
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Saved!");
            $this->session->set_flashdata('text',"Password Changed Successfully.");
            $this->session->set_flashdata('type',"success");
		
			redirect('Authentication');
			// print_r("Mail Send Successfully");
		}else{
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Sorry!");
            $this->session->set_flashdata('text',"Error in Sending...");
            $this->session->set_flashdata('type',"warning");
			
			redirect('/');

			// print_r("Error in Sending..Sorry");
			// echo $this->email->print_debugger();
		}
		// Send Mail of New Password End


	}
}
