<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	function __construct() {
        parent::__construct();
    }
	
	public function index() {
		$ebs_id = $this->session->userdata('ebs_id');
		
		$status_update = array('status'=>0);
		if($this->Crud->update('id', $ebs_id, 'eb_user', $status_update) > 0){
			$newdata = array(
				'ebs_id' => '',
				'ebs_user_prog_id' => '',
				'ebs_user_session_id' => '',
				'ebs_user_level_id' => '',
				'ebs_user_dept_id' => '',
				'ebs_user_matric' => '',
				'ebs_user_email' => '',
				'ebs_user_lastlog' => '',
				'ebs_user_status' => '',
				'ebs_user_othername' => '',
				'ebs_user_lastname' => '',
				'ebs_user_dob' => '',
				'ebs_user_sex' => '',
				'ebs_user_phone' => '',
				'ebs_user_address' => '',
				'ebs_user_state' => '',
				'ebs_user_country' => '',
				'ebs_user_pics' => '',
				'ebs_user_role' => '',
				'ebs_user_activate' => '',
				'ebs_user_reg_date' => '',
				'logged_in' => FALSE
			);
			$this->session->unset_userdata($newdata);
			//unset($this->session->userdata); 
			$this->session->sess_destroy();
			delete_cookie( config_item('sess_cookie_name') );
			
			$data['err_msg'] = $this->msg('success', 'Successfully logged out');
		}
		
		$data['title'] = 'Logout | '.app_name;
		$data['page_active'] = 'login';
		
		$this->load->view('designs/auth_header', $data);
		$this->load->view('login', $data);
		$this->load->view('designs/auth_footer', $data);
	}
	
	private function msg($type = '', $text = ''){
		return '<div class="content-mini content-mini-full text-white bg-'.$type.'">'.$text.'</div>';	
	}
}
