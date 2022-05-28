<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Fees extends CI_Controller {

	function __construct() {
        parent::__construct();
    }
	
	public function index() {
		// redirect if coming from native login
		$s_data = array ('ebs_redirect' => uri_string());
		$this->session->set_userdata($s_data);
		if($this->session->userdata('logged_in') == FALSE){
			redirect(base_url('login'), 'refresh');
		} else {
			$ebs_user_id = $this->session->userdata('ebs_id');
			$ebs_user_role = $this->session->userdata('ebs_user_role');
			$ebs_user_dept_id = $this->session->userdata('ebs_user_dept_id');	
		}
		
		// load records
		$list = '';
		$allrec = $this->Crud->read2_or('dept_id', $ebs_user_dept_id, 'dept_id', 0, 'eb_fee');
		if(!empty($allrec)){
			foreach($allrec as $rec){
				$id = $rec->id;
				$prog_id = $rec->prog_id;
				$session_id = $rec->session_id;
				$level_id = $rec->level_id;
				$dept_id = $rec->dept_id;
				$name = $rec->name;
				$details = $rec->details;
				$first_pay = $rec->first_pay;
				$second_pay = $rec->second_pay;
				$pay_start = $rec->pay_start;
				$pay_end = $rec->pay_end;
				
				$user_prog_id = $this->Crud->read_field('id', $ebs_user_id, 'eb_user', 'prog_id');
				$user_session_id = $this->Crud->read_field('id', $ebs_user_id, 'eb_user', 'session_id');
				$user_level_id = $this->Crud->read_field('id', $ebs_user_id, 'eb_user', 'level_id');
				$user_dept_id = $this->Crud->read_field('id', $ebs_user_id, 'eb_user', 'dept_id');
				
				$pay_start_f = date('M d, Y', strtotime($pay_start));
				$pay_end_f = date('M d, Y', strtotime($pay_end));
				
				// get open count
				$status = '';
				$icon_color = '';
				$btn_show = 'disabled';
				$pop = '';
				$now = new DateTime(date('M d, Y'));
				$open = new DateTime($pay_start_f);
				$interval = $now->diff($open);
				$open_left = $interval->format('%R%a'); // with absolute sign + or -
				
				// get close count
				$close = new DateTime($pay_end_f);
				$interval2 = $now->diff($close);
				$close_left = $interval2->format('%R%a'); // with absolute sign + or -
				
				// get status
				if($open_left <= 0) {
					if($close_left > 0) {
						$status = '<span class="label label-success">Active</span>';
						$icon_color = 'success';
						$btn_show = '';
						$pop = 'pop';
					} else {
						$status = '<span class="label label-danger">Closed</span>';	
						$icon_color = 'danger';
					}
				} else {
					$status = '<span class="label label-primary">Upcoming</span>';
					$icon_color = 'primary';
				}
				
				$programme = $this->Crud->read_field('id', $prog_id, 'eb_programme', 'name');
				$session = $this->Crud->read_field('id', $session_id, 'eb_session', 'name');
				$level = $this->Crud->read_field('id', $level_id, 'eb_level', 'name');
				$dept = $this->Crud->read_field('id', $dept_id, 'eb_department', 'name');
				
				$edit_link = '<li><a href="javascript:;" class="pop text-primary" pageTitle="Edit '.$name.'" pageName="'.base_url('fees/form/add/'.$id).'"><i class="si si-pencil"></i> Manage Record</a></li>';
				
				$del_link = '<li><a href="javascript:;" class="pop text-danger" pageTitle="Delete '.$name.'" pageName="'.base_url('fees/form/del/'.$id).'"><i class="si si-trash"></i> Delete Record</a></li>';
				
				if($ebs_user_role == 'Admin') {
					$admin_btn = '
						<div class="btn-group">
							<a class="btn btn-danger btn-xs btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="si si-settings"></i>&nbsp;<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								'.$edit_link.'
								'.$del_link.'
							</ul>
						</div>
					';	
					if($dept == ''){$depts = 'All';} else {$depts = $dept;}
					$dept_show = $session.' '.$depts.' '.$level.' '.$programme;
				} else {$admin_btn = ''; $dept_show = '';}
				
				if($ebs_user_role == 'Student') {
					// check if user paid or all
					$paid_amount = 0;
					$chk = $this->Crud->read3('fee_id', $id, 'user_id', $ebs_user_id, 'status', 'Paid', 'eb_transaction');
					if(!empty($chk)) {
						foreach($chk as $ch) {
							$paid_amount += $ch->amount;
						}
					}
					
					if($paid_amount >= $details) {
						// get transaction id
						$get_trans = $this->Crud->read2('user_id', $ebs_user_id, 'fee_id', $id, 'eb_transaction');
						if(!empty($get_trans)) {
							foreach($get_trans as $trans) {
								if($trans->type == 'Balance') {
									$trans_id = $trans->id;	
								}
							}
						}
						 
						$pay_btn = '
							<td align="center" width="80px">
								<a href="'.base_url('transactions/invoice/'.$trans_id).'" class=" btn btn-default" style="display:block;" target="_blank"><i class="fa fa-book fa-2x"></i><br/>INVOICE</a>
							</td>
						';
					} else {
						$pay_btn = '
							<td align="center" width="80px">
								<a href="javascript:;" class="'.$pop.' btn btn-success" style="display:block;" '.$btn_show.' pageTitle="'.$name.' Payment" pageName="'.base_url('fees/pay/'.$id).'"><i class="fa fa-money fa-2x"></i><br/>PAY NOW</a>
							</td>
						';	
					}
				} else {$pay_btn = '';}
				
				if(($user_prog_id == $prog_id && $user_session_id == $session_id && $user_level_id == $level_id) || $ebs_user_role == 'Admin') {
					$list .= '
						<tr>
							<td width="40px">
								<span class="text-'.$icon_color.'"><i class="fa fa-money fa-5x"></i></span>
							</td>
							<td>
								<b class="small">'.$dept_show.'</b>
								<h3>'.$name.' '.$admin_btn.'<br /><small class="text-muted">&#8358;'.number_format($details,2).'</small></h3>
							</td>
							<td align="center" width="100px">
								<div style="border-bottom:3px double #ddd; padding-bottom:5px; margin-bottom:10px;"><small class="text-success">OPEN DATE</small></div>
								<small class="text-muted">'.$pay_start_f.'</small>
							</td>
							<td align="center" width="100px">
								<div style="border-bottom:3px double #ddd; padding-bottom:5px; margin-bottom:10px;"><small class="text-danger">CLOSE DATE</small></div>
								<small class="text-muted">'.$pay_end_f.'</small>
							</td>
							<td align="center" width="100px">
								<div style="border-bottom:3px double #ddd; padding-bottom:5px; margin-bottom:10px;"><small class="text-primary">STATUS</small></div>
								<b>'.$status.'</b>
							</td>
							'.$pay_btn.'
						</tr>
					';
				}
			}
		}
		$data['list'] = '<table class="table table-bordered table-striped">'.$list.'</table>';
		
		$data['title'] = app_name.' | Fees';
		$data['page_active'] = 'fee';
		
		$this->load->view('designs/header', $data);
		$this->load->view('fees', $data);
		$this->load->view('designs/footer', $data);
	}
	
	public function form($param1='',$param2='') {
		$data['param1'] = $param1;
		$data['param2'] = $param2;
		$data['allprog'] = $this->Crud->read_order('eb_programme', 'name', 'asc');
		$data['allsession'] = $this->Crud->read_order('eb_session', 'name', 'asc');
		$data['alllevel'] = $this->Crud->read_order('eb_level', 'name', 'asc');
		$data['alldept'] = $this->Crud->read_order('eb_department', 'name', 'asc');
		$err_msg = '';
		
		//////////////// INSERT/EDIT RECORDS /////////////
		if($param1 == 'add' || $param1 == ''){
			if($param2 != '') {
				$getrec = $this->Crud->read_single('id', $param2, 'eb_fee');
				if(!empty($getrec)){
					foreach($getrec as $rec){
						$data['e_id'] = $rec->id;
						$data['e_prog_id'] = $rec->prog_id;
						$data['e_session_id'] = $rec->session_id;
						$data['e_level_id'] = $rec->level_id;
						$data['e_dept_id'] = $rec->dept_id;
						$data['e_name'] = $rec->name;
						$data['e_details'] = $rec->details;
						$data['e_first_pay'] = $rec->first_pay;
						$data['e_second_pay'] = $rec->second_pay;
						$data['e_pay_start'] = $rec->pay_start;
						$data['e_pay_end'] = $rec->pay_end;
					}
				}
			}
			
			if($_POST){
				$fee_id = $_POST['fee_id'];
				$prog_id = $_POST['prog_id'];
				$session_id = $_POST['session_id'];
				$level_id = $_POST['level_id'];
				$dept_id = $_POST['dept_id'];
				$name = $_POST['name'];
				$details = $_POST['details'];
				$first_pay = $_POST['first_pay'];
				$second_pay = $_POST['second_pay'];
				$pay_start = date(fdate, strtotime($_POST['pay_start']));
				$pay_end = date(fdate, strtotime($_POST['pay_end']));
				
				if($fee_id != ''){
					$upd_data = array(
						'prog_id' => $prog_id,
						'session_id' => $session_id,
						'level_id' => $level_id,
						'dept_id' => $dept_id,
						'name' => $name,
						'details' => $details,
						'first_pay' => $first_pay,
						'second_pay' => $second_pay,
						'pay_start' => $pay_start,
						'pay_end' => $pay_end,
					);
					$upd_id = $this->Crud->update('id', $fee_id, 'eb_fee', $upd_data);
					if($upd_id){
						$err_msg = $this->Crud->msg('success', 'Record Updated');
						
						echo '<script>window.location.replace("'.base_url('fees').'");</script>';	
					} else {
						$err_msg .= $this->Crud->msg('info', 'No Record Changes');
					}
				} else {
					// check if someone has email registered
					if($this->Crud->check('name', $name, 'eb_fee') > 0) {
						$err_msg = $this->Crud->msg('danger', 'Fees already created');
					} else {
						$ins_data = array(
							'prog_id' => $prog_id,
							'session_id' => $session_id,
							'level_id' => $level_id,
							'dept_id' => $dept_id,
							'name' => $name,
							'details' => $details,
							'first_pay' => $first_pay,
							'second_pay' => $second_pay,
							'pay_start' => $pay_start,
							'pay_end' => $pay_end,
							'reg_date' => date(fdate),
						);
						$ins_id = $this->Crud->create('eb_fee', $ins_data);
						if($ins_id > 0) {
							$err_msg = $this->Crud->msg('success', 'Record Created');
							echo '<script>window.location.replace("'.base_url('fees').'");</script>';	
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
				$getrec = $this->Crud->read_single('id', $param2, 'eb_fee');
				if(!empty($getrec)){
					foreach($getrec as $rec){
						$data['d_id'] = $rec->id;
					}
				}
			}
			
			if($_POST){
				$d_fee_id = $_POST['d_fee_id'];
				if($_POST){
					if($this->Crud->delete('id', $d_fee_id, 'eb_fee') > 0) {
						$err_msg = $this->Crud->msg('success', 'Record Deleted');
						echo '<script>window.location.replace("'.base_url('fees').'");</script>';
					}
				}
				
				echo $err_msg;
				exit;
			}
		}
		
		$this->load->view('fees_form', $data);
	}
	
	public function pay($param1) {
		$data['param1'] = $param1;
		$ebs_user_id = $this->session->userdata('ebs_id');
		$err_msg = '';
		
		//////////////// INSERT/EDIT RECORDS /////////////
		if($param1 != ''){
			$getrec = $this->Crud->read_single('id', $param1, 'eb_fee');
			if(!empty($getrec)){
				foreach($getrec as $rec){
					$data['e_id'] = $rec->id;
					$data['e_name'] = $rec->name;
					$data['e_details'] = $rec->details;
					$data['e_first_pay'] = $rec->first_pay;
					$data['e_second_pay'] = $rec->second_pay;
					
					// determine which payment if its not full payment
					if($rec->second_pay > 0) {
						if($this->Crud->check3('fee_id', $rec->id, 'user_id', $ebs_user_id, 'status', 'Paid', 'eb_transaction') > 0) {
							$data['e_type'] = 'Second';
						} else {
							$data['e_type'] = 'First';
						}
					}
				}
			}
			
			if($_POST){
				$fee_id = $_POST['fee_id'];
				$order_no = rand();
				$type = $_POST['type'];
				$amount = $_POST['amount'];
				$card_name = $_POST['card_name'];
				$card_no = $_POST['card_no'];
				$exp_month = $_POST['exp_month'];
				$exp_year = $_POST['exp_year'];
				$cvv2 = $_POST['cvv2'];
				
				if(strlen(str_replace(' ', '', $card_no)) != 16) {
					$err_msg = $this->Crud->msg('danger', 'Invalid Credit/Debit Card');
					$status = 'Failed';
					$msg = 'Invalid Credit/Debit Card';
				} else {
					$status = 'Paid';
					$msg = 'Transaction Completed';
				}
				
				$ins_data = array(
					'user_id' => $ebs_user_id,
					'fee_id' => $fee_id,
					'order_no' => $order_no,
					'type' => $type,
					'amount' => $amount,
					'card_name' => $card_name,
					'card_no' => $card_no,
					'exp_month' => $exp_month,
					'exp_year' => $exp_year,
					'cvv2' => $cvv2,
					'status' => $status,
					'msg' => $msg,
					'reg_date' => date(fdate),
				);
				$ins_id = $this->Crud->create('eb_transaction', $ins_data);
				if($ins_id > 0) {
					if($status == 'Paid') {
						$err_msg = $this->Crud->msg('success', 'Record Created');
						echo '<script>window.location.replace("'.base_url('fees').'");</script>';
					}
				} else {
					$err_msg = $this->Crud->msg('warning', 'Please try later');
				}
				
				echo $err_msg;
				exit;
			}
		}
		
		$this->load->view('fees_pay', $data);
	}
}
