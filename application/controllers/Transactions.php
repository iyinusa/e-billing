<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends CI_Controller {

	function __construct() {
        parent::__construct();
    }
	
	public function index() {
		if($this->session->userdata('logged_in') == FALSE){
			redirect(base_url('login'), 'refresh');
		} else {
			$ebs_user_id = $this->session->userdata('ebs_id');
			$ebs_user_role = $this->session->userdata('ebs_user_role');	
			$data['ebs_user_role'] = $ebs_user_role;
		}
		
		// load records
		$list = '';
		if($ebs_user_role == 'Student') {
			$allrec = $this->Crud->read_single_order('user_id', $ebs_user_id, 'eb_transaction', 'id', 'desc');
		} else {
			$allrec = $this->Crud->read_order('eb_transaction', 'id', 'desc');
		}
		if(!empty($allrec)){
			foreach($allrec as $rec){
				$id = $rec->id;
				$user_id = $rec->user_id;
				$order_no = $rec->order_no;
				$fee_id = $rec->fee_id;
				$type = $rec->type;
				$amount = $rec->amount;
				$card_name = $rec->card_name;
				$card_no = $rec->card_no;
				$exp_month = $rec->exp_month;
				$exp_year = $rec->exp_year;
				$cvv2 = $rec->cvv2;
				$status = $rec->status;
				$msg = $rec->msg;
				$reg_date = $rec->reg_date;
				
				$othername = $this->Crud->read_field('id', $user_id, 'eb_user', 'othername');
				$lastname = $this->Crud->read_field('id', $user_id, 'eb_user', 'lastname');
				$matric = $this->Crud->read_field('id', $user_id, 'eb_user', 'username');
				$level_id = $this->Crud->read_field('id', $user_id, 'eb_user', 'level_id');
				$dept_id = $this->Crud->read_field('id', $user_id, 'eb_user', 'dept_id');
				$level = $this->Crud->read_field('id', $level_id, 'eb_level', 'name');
				$dept = $this->Crud->read_field('id', $dept_id, 'eb_department', 'name');
				
				$fee_name = $this->Crud->read_field('id', $fee_id, 'eb_fee', 'name');
				$card_first = substr($card_no, 0, 4);
				
				if($ebs_user_role == 'Admin') {
					$admin_column = '<td>'.$othername.' '.$lastname.' ('.$matric.')<br /><small classs="text-muted">'.$level.' - '.$dept.'</small></td>';
				} else {$admin_column = '';}
				
				if($status == 'Paid') {
					$alert = 'success';
					$invoice_btn = '<a href="'.base_url('transactions/invoice/'.$id).'" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-book"></i><br />Invoice</a>';
				} else {
					$alert = 'danger';
					$invoice_btn = '';
				}
				
				$list .= '
					<tr class="text-'.$alert.'">
						<td>'.date('M d, Y h:i:s A', strtotime($reg_date)).'</td>
						<td><b>'.$order_no.'</b></td>
						'.$admin_column.'
						<td>'.$fee_name.'</td>
						<td align="right">&#8358;'.number_format($amount).'</td>
						<td>'.$card_name.'<br /><small class="text-muted">'.$card_first.' **** **** ****<br />'.$exp_month.'/'.$exp_year.'</small></td>
						<td>'.$type.' Payment</td>
						<td><span class="label label-'.$alert.'">'.$status.'</span><br/><small>'.$msg.'</small></td>
						<td align="center">
							'.$invoice_btn.'
						</td>
					</tr>
				';
			}
		}
		$data['list'] = $list;
		
		$data['title'] = app_name.' | Transactions';
		$data['page_active'] = 'transaction';
		
		$this->load->view('designs/header', $data);
		$this->load->view('transaction', $data);
		$this->load->view('designs/footer', $data);
	}
	
	public function invoice($param) {
		$ebs_user_id = $this->session->userdata('ebs_id');
		$ebs_user_role = $this->session->userdata('ebs_user_role');
		$fee_list = '';
		$fee_total = 0;
		
		if($ebs_user_role == ''){redirect(base_url('transactions'), 'refresh');}
		
		// check record
		if($ebs_user_role == 'Student') {
			$allrec = $this->Crud->read2('id', $param, 'user_id', $ebs_user_id, 'eb_transaction');
		} else {
			$allrec = $this->Crud->read_single('id', $param, 'eb_transaction');
		}
		
		if(empty($allrec)) {
			redirect(base_url('transactions'), 'refresh');
		} else {
			foreach($allrec as $rec){
				$id = $rec->id;
				$user_id = $rec->user_id;
				$order_no = $rec->order_no;
				$fee_id = $rec->fee_id;
				$type = $rec->type;
				$amount = $rec->amount;
				$status = $rec->status;
				$msg = $rec->msg;
				$reg_date = $rec->reg_date;
				
				$fee_name = $this->Crud->read_field('id', $fee_id, 'eb_fee', 'name');
				
				$othername = $this->Crud->read_field('id', $user_id, 'eb_user', 'othername');
				$lastname = $this->Crud->read_field('id', $user_id, 'eb_user', 'lastname');
				$matric = $this->Crud->read_field('id', $user_id, 'eb_user', 'username');
				$prog_id = $this->Crud->read_field('id', $user_id, 'eb_user', 'prog_id');
				$session_id = $this->Crud->read_field('id', $user_id, 'eb_user', 'session_id');
				$level_id = $this->Crud->read_field('id', $user_id, 'eb_user', 'level_id');
				$dept_id = $this->Crud->read_field('id', $user_id, 'eb_user', 'dept_id');
				
				$programme = $this->Crud->read_field('id', $prog_id, 'eb_programme', 'name');
				$session = $this->Crud->read_field('id', $session_id, 'eb_session', 'name');
				$level = $this->Crud->read_field('id', $level_id, 'eb_level', 'name');
				$dept = $this->Crud->read_field('id', $dept_id, 'eb_department', 'name');
				$school_id = $this->Crud->read_field('id', $dept_id, 'eb_department', 'school_id');
				$school = $this->Crud->read_field('id', $school_id, 'eb_school', 'name');
				
				if($type == 'Balance') {
					// get the part partment details
					if($ebs_user_role == 'Student') {
						$allpart = $this->Crud->read3('fee_id', $fee_id, 'user_id', $ebs_user_id, 'status', 'Paid', 'eb_transaction');
					} else {
						$allpart = $this->Crud->read3('fee_id', $fee_id, 'user_id', $user_id, 'status', 'Paid', 'eb_transaction');
					}
					
					if(!empty($allpart)) {
						foreach($allpart as $part) {
							if($part->type == 'Part'){
								$p_fee_name = $this->Crud->read_field('id', $part->fee_id, 'eb_fee', 'name');
								$fee_list = '
									<tr>
										<td class="border" align="left">&nbsp;<small>'.date('M d, Y h:i:s A', strtotime($part->reg_date)).'</small></td>
										<td class="border" align="left">&nbsp;'.strtoupper($p_fee_name).'<br /> <small>&nbsp;- '.$part->type.' Payment</small></td>
										<td class="border" align="center">'.strtoupper($part->status).'<br/><small>'.$part->msg.'</small></td>
										<td class="border" align="center">=N= '.number_format($part->amount,2).'</td>
									</tr>
								';
								$fee_total += $part->amount; 
							}
						}
					}
				}
				
				$fee_list .= '
					<tr>
						<td class="border" align="left">&nbsp;<small>'.date('M d, Y h:i:s A', strtotime($reg_date)).'</small></td>
						<td class="border" align="left">&nbsp;'.strtoupper($fee_name).'<br /> <small>&nbsp;- '.$type.' Payment</small></td>
						<td class="border" align="center">'.strtoupper($status).'<br/><small>'.$msg.'</small></td>
						<td class="border" align="center">=N= '.number_format($amount,2).'</td>
					</tr>
				'; 
				$fee_total += $amount;
			}
		}
		
		// pdf output parameters
		$pdf_logo = base_url('assets/img/laspo_logo.png');
		$pdf_content = '
			<style>
				.head {text-align:center;}
				.tb {width:auto;}
				.tb .fc {font-weight:bold; width:180px;}
				.tb .lc {border:1px solid #ddd;}
				td.border{border:1px solid #ddd;}
			</style>
			
			<div class="">
				<table width="100%">
					<tr>
						<td align="left" width="40%">
							<img alt="LAGOS STATE POLYTECHNIC" src="'.$pdf_logo.'" height="50px" />
						</td>
						<td align="left">
							<div style="font-size:14px">
								<b>STUDENT E-BILLING SYSTEM</b><br/>
								INVOICE - <b>'.strtoupper($status).'</b>
							</div>
						</td>
					</tr>
				</table><hr style="border:1px solid #ff0;"/>
			</div>
			
			<div>
				<table width="50%">
					<tr>
						<td class="border">&nbsp;STUDENT NAME:</td>
						<td>&nbsp;'.strtoupper($othername).' '.strtoupper($lastname).'</td>
					</tr>
					<tr>
						<td class="border">&nbsp;MATRIC NUMBER:</td>
						<td>&nbsp;'.$matric.'</td>
					</tr>
					<tr>
						<td class="border">&nbsp;PROGRAMME:</td>
						<td>&nbsp;'.strtoupper($programme).'</td>
					</tr>
					<tr>
						<td class="border">&nbsp;SCHOOL/FACAULTY:</td>
						<td>&nbsp;'.strtoupper($school).'</td>
					</tr>
					<tr>
						<td class="border">&nbsp;CURRENT SESSION:</td>
						<td>&nbsp;'.$session.'</td>
					</tr>
					<tr>
						<td class="border">&nbsp;LEVEL:</td>
						<td>&nbsp;'.strtoupper($level).'</td>
					</tr>
					<tr>
						<td class="border">&nbsp;DEPARTMENT:</td>
						<td>&nbsp;'.strtoupper($dept).'</td>
					</tr>
				</table>
			</div>
			
			<div style="font-size:10px; background-color:#ddd; text-align:center;"><b>PAYMENT DETAILS</b></div>
			<div style="border:1px solid #ddd;">
				<table width="100%">
					<tr>
						<td class="border" align="left" style="background-color:#eee;"><b>&nbsp;DATE</b></td>
						<td class="border" align="left" style="background-color:#eee;"><b>&nbsp;FEE</b></td>
						<td class="border" align="center" style="background-color:#eee;"><b>&nbsp;STATUS</b></td>
						<td class="border" align="center" style="background-color:#eee;"><b>&nbsp;AMOUNT</b></td>
					</tr>
					'.$fee_list.'
					<tr>
						<td class="border" align="right" colspan="3"><b>TOTAL&nbsp;</b></td>
						<td class="border" align="center">=N= '.number_format($fee_total,2).'</td>
					</tr>
				</table>
				<span style="text-align:center;"><b>Invoice Generated Date:</b> '.date('M d, Y h:i:s A', time()).'</span> 
			</div>
		';
		
		$data['title'] = 'INVOICE NO';
		$data['pdf_content'] = $pdf_content;
		
		$this->load->view('pdf/print', $data);
	}
}
