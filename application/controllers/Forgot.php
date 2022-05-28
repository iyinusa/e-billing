<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller {

	function __construct() {
        parent::__construct();
    }
	
	public function index() {
		if($this->session->userdata('logged_in') == TRUE){
			redirect(base_url('dashboard'), 'refresh');	
		} 
		
		
		$data['title'] = 'Forgot Password | '.app_name;
		$data['page_active'] = 'forgot';
		
		$this->load->view('designs/auth_header', $data);
		$this->load->view('forgot', $data);
		$this->load->view('designs/auth_footer', $data);
	}
}
