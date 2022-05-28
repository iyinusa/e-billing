<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
        parent::__construct();
    }
	
	public function index() {
		if($this->session->userdata('logged_in') == TRUE){
			redirect(base_url('dashboard'), 'refresh');	
		} 
		
		if($_POST) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$password = md5($password);
			if(isset($_POST['remember-me'])){$remind='true';}else{$remind='';}
			
			if($this->Crud->check2('username', $username, 'password', $password, 'eb_user') <= 0){
				$data['err_msg'] = $this->msg('danger', 'Matric No. and/or password is wrong!');
			} else {
				$query = $this->Crud->read2('username', $username, 'password', $password, 'eb_user');
				
				if(!empty($query)) {
					foreach($query as $row) {
						//update status
						$first_log = $row->last_log; //to check first time user
						
						$now = date("Y-m-d H:i:s");
						$status_update = array('status'=>1, 'last_log'=>$now);
						$this->Crud->update('id', $row->id, 'eb_user', $status_update);
						
						//get country name
						$country_name = $this->Crud->read_field('id', $row->country, 'eb_country', 'name');
						
						//get logo
						$logo_path = $this->Crud->read_field('id', $row->pics, 'eb_img', 'pics');
						if($logo_path == ''){$logo_path = 'assets/img/avatars/avatar1.png';}
						
						//add data to session
						$s_data = array (
							'ebs_id' => $row->id,
							'ebs_user_prog_id' => $row->prog_id,
							'ebs_user_session_id' => $row->session_id,
							'ebs_user_level_id' => $row->level_id,
							'ebs_user_dept_id' => $row->dept_id,
							'ebs_user_matric' => $row->username,
							'ebs_user_email' => $row->email,
							'ebs_user_lastlog' => $row->last_log,
							'ebs_user_status' => $row->status,
							'ebs_user_othername' => $row->othername,
							'ebs_user_lastname' => $row->lastname,
							'ebs_user_dob' => $row->dob,
							'ebs_user_sex' => $row->sex,
							'ebs_user_phone' => $row->phone,
							'ebs_user_address' => $row->address,
							'ebs_user_state' => $row->state,
							'ebs_user_country' => $row->country,
							'ebs_user_country_name' => $country_name,
							'ebs_user_pics' => $logo_path,
							'ebs_user_role' => $row->role,
							'ebs_user_activate' => $row->activate,
							'ebs_user_reg_date' => $row->reg_date,
							'logged_in' => TRUE
						);
					}
					
					$check = $this->session->set_userdata($s_data);
					
					//redirect
					redirect(base_url('profile/'), 'refresh');
				}
			}
		}
		
		$data['title'] = 'Login | '.app_name;
		$data['page_active'] = 'login';
		
		$this->load->view('designs/auth_header', $data);
		$this->load->view('login', $data);
		$this->load->view('designs/auth_footer', $data);
	}
	
	private function msg($type = '', $text = ''){
		return '<div class="content-mini content-mini-full text-white bg-'.$type.'">'.$text.'</div>';	
	}
}
