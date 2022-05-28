<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    ////////////////// CLEAR CACHE ///////////////////
	public function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
	
	//////////////////// C - CREATE ///////////////////////
	public function create($table, $data) {
		$this->db->insert($table, $data);
		return $this->db->insert_id();	
	}
	
	//////////////////// R - READ /////////////////////////
	public function read($table) {
		$query = $this->db->order_by('id', 'DESC');
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_order($table, $field, $type) {
		$query = $this->db->order_by($field, $type);
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_single($field, $value, $table) {
		$query = $this->db->order_by('id', 'DESC');
		$query = $this->db->where($field, $value);
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_single_reverse($field, $value, $table) {
		$query = $this->db->order_by('id', 'ASC');
		$query = $this->db->where($field, $value);
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_single_order($field, $value, $table, $fd, $type) {
		$query = $this->db->order_by($fd, $type);
		$query = $this->db->where($field, $value);
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read2($field, $value, $field2, $value2, $table) {
		$query = $this->db->order_by('id', 'DESC');
		$query = $this->db->where($field, $value);
		$query = $this->db->where($field2, $value2);
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read2_or($field, $value, $field2, $value2, $table) {
		$query = $this->db->order_by('id', 'DESC');
		$query = $this->db->where($field, $value);
		$query = $this->db->or_where($field2, $value2);
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read2_order($field, $value, $field2, $value2, $table, $fd, $type) {
		$query = $this->db->order_by($fd, $type);
		$query = $this->db->where($field, $value);
		$query = $this->db->where($field2, $value2);
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read3($field, $value, $field2, $value2, $field3, $value3, $table) {
		$query = $this->db->order_by('id', 'DESC');
		$query = $this->db->where($field, $value);
		$query = $this->db->where($field2, $value2);
		$query = $this->db->where($field3, $value3);
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read3_order($field, $value, $field2, $value2, $field3, $value3, $table, $fd, $type) {
		$query = $this->db->order_by($fd, $type);
		$query = $this->db->where($field, $value);
		$query = $this->db->where($field2, $value2);
		$query = $this->db->where($field3, $value3);
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_field($field, $value, $table, $call) {
		$return_call = '';
		$getresult = $this->read_single($field, $value, $table);
		if(!empty($getresult)) {
			foreach($getresult as $result)  {
				$return_call = $result->$call;
			}
		}
		return $return_call;
	}
	
	public function check($field, $value, $table){
		$query = $this->db->where($field, $value);
		$query = $this->db->get($table);
		return $query->num_rows();
	}
	
	public function check2($field, $value, $field2, $value2, $table){
		$query = $this->db->where($field, $value);
		$query = $this->db->where($field2, $value2);
		$query = $this->db->get($table);
		return $query->num_rows();
	}
	
	public function check3($field, $value, $field2, $value2, $field3, $value3, $table){
		$query = $this->db->where($field, $value);
		$query = $this->db->where($field2, $value2);
		$query = $this->db->where($field3, $value3);
		$query = $this->db->get($table);
		return $query->num_rows();
	}
	
	//////////////////// U - UPDATE ///////////////////////
	public function update($field, $value, $table, $data) {
		$this->db->where($field, $value);
		$this->db->update($table, $data);
		return $this->db->affected_rows();	
	}
	
	//////////////////// D - DELETE ///////////////////////
	public function delete($field, $value, $table) {
		$this->db->where($field, $value);
		$this->db->delete($table);
		return $this->db->affected_rows();	
	}
	//////////////////// END DATABASE CRUD ///////////////////////
	
	//////////////////// NOTIFICATION CRUD ///////////////////////
	public function msg($type = '', $text = ''){
		return '<div class="content-mini content-mini-full text-white bg-'.$type.'">'.$text.'</div>';	
	}
	//////////////////// END NOTIFICATION CRUD ///////////////////////
	
	//////////////////// EMAIL CRUD ///////////////////////
	public function send_email($to, $from, $subject, $body_msg, $name, $subhead) {
		//clear initial email variables
		$this->email->clear(); 
		$email_status = '';
		
		$this->email->to($to);
		$this->email->from($from, $name);
		$this->email->subject($subject);
						
		$mail_data = array('message'=>$body_msg, 'subhead'=>$subhead);
		$this->email->set_mailtype("html"); //use HTML format
		$mail_design = $this->load->view('designs/email_template', $mail_data, TRUE);
				
		$this->email->message($mail_design);
		if(!$this->email->send()) {
			$email_status = FALSE;
		} else {
			$email_status = TRUE;
		}
		
		return $email_status;
	}
	//////////////////// END EMAIL CRUD ///////////////////////
	
	//////////////////// SMS CRUD ///////////////////////
	public function get_credit() {
		// create a new cURL resource
		$curl = curl_init();

		// parameters
		$curl_data = array('username'=>'ceo@tehilahbase.com', 'password'=>'4lovina1', 'balance'=>'true');

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, "http://smsmobile24.com/components/com_spc/smsapi.php");
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_data);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}

	public function sms_send($sender = '', $recipient = '', $message = '') {
		// create a new cURL resource
		$curl = curl_init();

		// parameters
		$curl_data = array('username'=>'ceo@tehilahbase.com', 'password'=>'4lovina1', 'sender'=>$sender, 'recipient'=>$recipient, 'message'=>$message);

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, "http://smsmobile24.com/components/com_spc/smsapi.php");
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_data);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}
	//////////////////// END SMS CRUD ///////////////////////
	
	//////////////////// BILLING API CRUD ///////////////////////
	// read
	public function billing_get_records($data_path) {
		// create a new cURL resource
		$curl = curl_init();

		// parameters
		$token = '10290e64cfa40d471d94a019f08c855034cba7a7e9a7876054c9b30a384e965c81d89fdb9346432e31d6cbd87a9ab9b8';
		$chead = array();
		$chead[] = 'Authorization: Token token='.$token.'';
		$chead[] = 'Content-Type: application/json';

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, 'https://nas1dc.basespotisp.com:443/'.$data_path);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl,CURLOPT_HTTPHEADER,$chead);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 0);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return json_decode($result, true);	
	}
	
	//update
	public function billing_update_records($data_path, $data) {
		// create a new cURL resource
		$curl = curl_init();
		
		// custom parameter
		$data_json = json_encode($data);

		// parameters
		$token = '10290e64cfa40d471d94a019f08c855034cba7a7e9a7876054c9b30a384e965c81d89fdb9346432e31d6cbd87a9ab9b8';
		$chead = array();
		$chead[] = 'Authorization: Token token='.$token.'';
		$chead[] = 'Content-Type: application/json';
		$chead[] = 'Content-Length: '.strlen($data_json);

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, 'https://nas1dc.basespotisp.com:443/'.$data_path);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);
		
		return $result;	
	}
	
	//apply changes
	public function billing_apply_changes() {
		// create a new cURL resource
		$curl = curl_init();

		// parameters
		$token = '10290e64cfa40d471d94a019f08c855034cba7a7e9a7876054c9b30a384e965c81d89fdb9346432e31d6cbd87a9ab9b8';
		$chead = array();
		$chead[] = 'Authorization: Token token='.$token.'';
		$chead[] = 'Content-Type: application/json';

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, 'https://nas1dc.basespotisp.com:443/api/apply_changes');
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl,CURLOPT_HTTPHEADER,$chead);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 0);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);
	}
	//////////////////// END BILLING API CRUD ///////////////////////
	
	//////////////////// PAYMENT API CRUD ///////////////////////
	public function pay_sandbox($link) {
		//$api = 'https://moneywave.herokuapp.com/'.$link;
		$api = 'https://live.moneywaveapi.co/'.$link;
		return $api;
	}
	
	public function pay_token() {
		// create a new cURL resource
		$curl = curl_init();

		// parameters
		$api_link = $this->pay_sandbox('v1/merchant/verify');
		$api_key = 'lv_MU8LU5H4LD70BDO0CGKZ';
		$api_secret = 'lv_K3EGMVKB86039IYYLDS7MU32RMLURD';
		$curl_data = array('apiKey'=>$api_key, 'secret'=>$api_secret);
		$curl_data = json_encode($curl_data);
		
		$chead = array();
		$chead[] = 'Content-Type: application/json';
		$chead[] = 'Content-Length: '.strlen($curl_data);

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_POST, 1);
    	curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}
	
	public function pay_getbank($code, $token) {
		// create a new cURL resource
		$curl = curl_init();

		// parameters
		if($code == 'NGN') {
			$api_link = 'https://live.moneywaveapi.co/banks';
		} else {
			$api_link = 'https://live.moneywaveapi.co/banks?country='.$code;	
		}
		
		$chead = array();
		$chead[] = 'Authorization: '.$token;
		$chead[] = 'Content-Type: application/json';

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}
	
	public function pay_validate($acc_no, $bank_code, $token) {
		// create a new cURL resource
		$curl = curl_init();

		// parameters
		$api_link = $this->pay_sandbox('v1/resolve/account');
		$curl_data = array('account_number'=>$acc_no, 'bank_code'=>$bank_code);
		$curl_data = json_encode($curl_data);
		
		$chead = array();
		$chead[] = 'Authorization: '.$token;
		$chead[] = 'Content-Type: application/json';
		$chead[] = 'Content-Length: '.strlen($curl_data);

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}
	
	public function pay_card_to_wallet($firstname, $lastname, $phonenumber, $email, $card_no, $cvv, $expiry_year, $expiry_month, $amount, $fee, $currency, $redirecturl, $token) {
		// create a new cURL resource
		$curl = curl_init();

		// parameters
		$api_link = $this->pay_sandbox('v1/transfer');
		$recipient = 'wallet';
		$apiKey = 'ts_JFVEN8X6FPE166YGBC88';
		$medium = 'web';
		
		$curl_data = array('firstname'=>$firstname, 'lastname'=>$lastname, 'phonenumber'=>$phonenumber, 'email'=>$email, 'recipient'=>$recipient, 'card_no'=>$card_no, 'cvv'=>$cvv, 'expiry_year'=>$expiry_year, 'expiry_month'=>$expiry_month, 'apiKey'=>$apiKey, 'amount'=>$amount, 'fee'=>$fee, 'redirecturl'=>$redirecturl, 'medium'=>$medium, 'chargeCurrency'=>$currency);
		$curl_data = json_encode($curl_data);
		
		$chead = array();
		$chead[] = 'Authorization: '.$token;
		$chead[] = 'Content-Type: application/json';
		$chead[] = 'Content-Length: '.strlen($curl_data);

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}
	
	public function pay_verify($id, $token) {
		// create a new cURL resource
		$curl = curl_init();

		// parameters
		$api_link = $this->pay_sandbox('v1/transfer/'.$id);
		
		$chead = array();
		$chead[] = 'Authorization: '.$token;
		$chead[] = 'Content-Type: application/json';

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}
	
	public function pay_wallet_to_account($amount, $bankcode, $accountNumber, $currency, $senderName, $token) {
		// create a new cURL resource
		$curl = curl_init();

		// parameters
		$api_link = $this->pay_sandbox('v1/disburse');
		$lock = 'tehilah#12';
		
		$curl_data = array('lock'=>$lock, 'amount'=>$amount, 'bankcode'=>$bankcode, 'accountNumber'=>$accountNumber, 'currency'=>$currency, 'senderName'=>$senderName);
		$curl_data = json_encode($curl_data);
		
		$chead = array();
		$chead[] = 'Authorization: '.$token;
		$chead[] = 'Content-Type: application/json';
		$chead[] = 'Content-Length: '.strlen($curl_data);

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}
	
	public function pay_wallet_balance($token) {
		// create a new cURL resource
		$curl = curl_init();
		
		$curl_data = array('name'=>'Wallet');
		$curl_data = json_encode($curl_data);

		// parameters
		$api_link = $this->pay_sandbox('v1/wallet');
		
		$chead = array();
		$chead[] = 'Authorization: '.$token;
		$chead[] = 'Content-Type: application/json';
		$chead[] = 'Content-Length: '.strlen($curl_data);

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
		//curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}
	
	public function pay_wallet_transaction($ref, $token) {
		// create a new cURL resource
		$curl = curl_init();
		
		$curl_data = array('ref'=>$ref);
		$curl_data = json_encode($curl_data);

		// parameters
		$api_link = $this->pay_sandbox('v1/disburse/status');
		
		$chead = array();
		$chead[] = 'Authorization: '.$token;
		$chead[] = 'Content-Type: application/json';
		$chead[] = 'Content-Length: '.strlen($curl_data);

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}
	//////////////////// END PAYMENT API CRUD ///////////////////////
}
