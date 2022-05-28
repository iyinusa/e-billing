<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct() {
        parent::__construct();
    }
	
	public function index() {
		if($this->session->userdata('logged_in') == FALSE){
			redirect(base_url('login'), 'refresh');	
		} 
		
		$data['err_msg'] = '';
		
		//check for posting
		if($_POST){
			$user_id = $this->session->userdata('ebs_id');
			$country = $_POST['country'];
			$othername = $_POST['othername'];
			$lastname = $_POST['lastname'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$sex = $_POST['sex'];
			$dob = $_POST['dob'];		
			$address = $_POST['address'];
			$state = $_POST['state'];
			
			$upd_data = array(
				'country' => $country,
				'othername' => $othername,
				'lastname' => $lastname,
				'address' => $address,
				'state' => $state,
				'phone' => $phone,
				'email' => $email,
				'sex' => $sex,
				'dob' => $dob
			);
			
			if($this->Crud->update('id', $user_id, 'eb_user', $upd_data) > 0){
				//add data to session
				$s_data = array (
					'ebs_user_email' => $email,
					'ebs_user_othername' => $othername,
					'ebs_user_lastname' => $lastname,
					'ebs_user_dob' => $dob,
					'ebs_user_sex' => $sex,
					'ebs_user_phone' => $phone,
					'ebs_user_address' => $address,
					'ebs_user_state' => $state,
					'ebs_user_country' => $country,
				);	
				$this->session->set_userdata($s_data);
				$data['err_msg'] .= $this->msg('success', 'Record Updated');
			} else {
				$data['err_msg'] .= $this->msg('info', 'No changes made to profile data');
			}
			
			//now check change password posting
			$old = $_POST['old'];
			$new = $_POST['new'];
			$confirm = $_POST['confirm'];
			
			if($old != '' || $new != '' || $confirm != ''){
				if($old != '' && $new != '' && $confirm != ''){
					//check if new and confirm password are same
					if($new != $confirm){
						$data['err_msg'] .= $this->msg('warning', 'New and Confirm Passwords are not same');
					} else {
						$old = md5($old);
						$new = md5($new);
						//now check if current password correspond with account
						if($this->Crud->check2('id', $user_id, 'password', $old, 'eb_user') <= 0){
							$data['err_msg'] .= $this->msg('danger', 'Your Current Password doesn\'t match');
						} else {
							$p_data = array('password' => $new);
							if($this->Crud->update('id', $user_id, 'eb_user', $p_data) > 0){
								$data['err_msg'] .= $this->msg('success', 'Password changed successfully');
							} else {
								$data['err_msg'] .= $this->msg('danger', 'Please try later');
							}
						}
					}
				} else {
					$data['err_msg'] .= $this->msg('warning', 'Current, New and Confirm Passwords are required');
				}
			}
		}
		
		$data['user_id'] = $this->session->userdata('ebs_id');
		$data['user_matric'] = $this->session->userdata('ebs_user_matric');
		$data['user_programme'] = $this->Crud->read_field('id', $this->session->userdata('ebs_user_prog_id'), 'eb_programme', 'name');
		$data['user_session'] = $this->Crud->read_field('id', $this->session->userdata('ebs_user_session_id'), 'eb_session', 'name');
		$data['user_level'] = $this->Crud->read_field('id', $this->session->userdata('ebs_user_level_id'), 'eb_level', 'name');
		$data['user_dept'] = $this->Crud->read_field('id', $this->session->userdata('ebs_user_dept_id'), 'eb_department', 'name');
		$data['othername'] = $this->session->userdata('ebs_user_othername');
		$data['lastname'] = $this->session->userdata('ebs_user_lastname');
		$data['phone'] = $this->session->userdata('ebs_user_phone');
		$data['email'] = $this->session->userdata('ebs_user_email');
		$data['dob'] = $this->session->userdata('ebs_user_dob');
		$data['sex'] = $this->session->userdata('ebs_user_sex');
		$data['address'] = $this->session->userdata('ebs_user_address');
		$data['state'] = $this->session->userdata('ebs_user_state');
		$data['country_id'] = $this->session->userdata('ebs_user_country');
		$data['reg_date'] = $this->session->userdata('ebs_user_reg_date');
		$data['pics'] = $this->session->userdata('ebs_user_pics');
		$data['role'] = $this->session->userdata('ebs_user_role');
		
		$data['allcountry'] = $this->Crud->read_order('eb_country', 'name', 'ASC');
		
		$data['title'] = 'Profile | '.app_name;
		$data['page_active'] = 'profile';
		
		$this->load->view('designs/header', $data);
		$this->load->view('profile', $data);
		$this->load->view('designs/footer', $data);
	}
	
	private function msg($type = '', $text = ''){
		return '<div class="content-mini content-mini-full text-white bg-'.$type.'">'.$text.'</div>';	
	}
}
