<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sessions extends CI_Controller {

	function __construct() {
        parent::__construct();
    }
	
	public function index() {
		if($this->session->userdata('logged_in') == FALSE){
			redirect(base_url('login'), 'refresh');
		} else {
			$ebs_user_id = $this->session->userdata('ebs_id');
			$ebs_user_role = $this->session->userdata('ebs_user_role');
			$permit = array('Admin');
			if(!in_array($ebs_user_role, $permit)){
				redirect(base_url('profile'), 'refresh');	
			}	
		}
		
		// load records
		$list = '';
		$allrec = $this->Crud->read_order('eb_session', 'name', 'asc');
		if(!empty($allrec)){
			foreach($allrec as $rec){
				$id = $rec->id;
				$name = $rec->name;
				
				$edit_link = '<li><a href="javascript:;" class="pop text-primary" pageTitle="Edit '.$name.'" pageName="'.base_url('sessions/form/add/'.$id).'"><i class="si si-pencil"></i> Manage Record</a></li>';
				
				$del_link = '<li><a href="javascript:;" class="pop text-danger" pageTitle="Delete '.$name.'" pageName="'.base_url('sessions/form/del/'.$id).'"><i class="si si-trash"></i> Delete Record</a></li>';
				
				$list .= '
					<tr>
						<td><b>'.$name.'</b></td>
						<td>
							<div class="btn-group">
								<a class="btn btn-danger btn-xs btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="si si-settings"></i>&nbsp;<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									'.$edit_link.'
									'.$del_link.'
								</ul>
							</div>
						</td>
					</tr>
				';
			}
		}
		$data['list'] = $list;
		
		$data['title'] = app_name.' | Session';
		$data['page_active'] = 'session';
		
		$this->load->view('designs/header', $data);
		$this->load->view('setup/session', $data);
		$this->load->view('designs/footer', $data);
	}
	
	public function form($param1='',$param2='') {
		$data['param1'] = $param1;
		$data['param2'] = $param2;
		$err_msg = '';
		
		//////////////// INSERT/EDIT RECORDS /////////////
		if($param1 == 'add' || $param1 == ''){
			if($param2 != '') {
				$getrec = $this->Crud->read_single('id', $param2, 'eb_session');
				if(!empty($getrec)){
					foreach($getrec as $rec){
						$data['e_id'] = $rec->id;
						$data['e_name'] = $rec->name;
					}
				}
			}
			
			if($_POST){
				$session_id = $_POST['session_id'];
				$name = $_POST['name'];
				
				if($session_id != ''){
					$upd_data = array(
						'name' => $name,
					);
					$upd_id = $this->Crud->update('id', $session_id, 'eb_session', $upd_data);
					if($upd_id){
						$err_msg = $this->Crud->msg('success', 'Record Updated');
						
						echo '<script>window.location.replace("'.base_url('sessions').'");</script>';	
					} else {
						$err_msg .= $this->Crud->msg('info', 'No Record Changes');
					}
				} else {
					if($this->Crud->check('name', $name, 'eb_session') > 0){
						$err_msg = $this->Crud->msg('danger', 'Record already created');
					} else {
						// register record
						$ins_data = array(
							'name' => $name,
						);
						$ins_id = $this->Crud->create('eb_session', $ins_data);
						if($ins_id){
							$err_msg = $this->Crud->msg('success', 'Record Created');
							echo '<script>window.location.replace("'.base_url('sessions').'");</script>';	
						} else {
							$err_msg = $this->Crud->msg('warning', 'Please try later');
						}
					}
				}
				
				echo $err_msg;
				exit;
			}
		//////////////// DELETE RECORDS /////////////
		} else if($param1 == 'del'){ 
			if($param2 != '') {
				$getrec = $this->Crud->read_single('id', $param2, 'eb_session');
				if(!empty($getrec)){
					foreach($getrec as $rec){
						$data['d_id'] = $rec->id;
					}
				}
			}
			
			if($_POST){
				$d_session_id = $_POST['d_session_id'];
				if($_POST){
					if($this->Crud->delete('id', $d_session_id, 'eb_session') > 0) {
						$err_msg = $this->Crud->msg('success', 'Record Deleted');
						echo '<script>window.location.replace("'.base_url('sessions').'");</script>';
					}
				}
				
				echo $err_msg;
				exit;
			}
		}
		
		$this->load->view('setup/session_form', $data);
	}
}
