<?php echo form_open('fees/pay/'.$param1, array('id'=>'bb_ajax_form','class'=>'form-horizontal')); ?>
	<div id="bb_ajax_msg"></div>
    
    <h2 class="col-lg-12 text-center" style="background-color:#eee; padding:10px; border:2px double #ccc;">
    	<?php
			if($e_second_pay == 0) {
			 	$type = 'Full';
				echo 'FULL PAYMENT<br /><small>&#8358;'.number_format($e_details,2).'</small>';	
			} else {
				if($e_type == 'Second') {
					$type = 'Balance';
					$e_details = $e_details * ($e_second_pay / 100);
					echo 'SECOND PAYMENT (Balance)<br /><small>&#8358;'.number_format($e_details,2).'</small>';
				} else {
					$type = 'Part';
					echo 'FULL PAYMENT<br /><small>&#8358;'.number_format($e_details,2).'</small><br/><b>== OR ==</b><br />
						<input type="hidden" id="first_pay" value="'.$e_first_pay.'" />
						<input type="hidden" id="amt_pay" value="'.$e_details.'" />
						<label class="css-input css-checkbox css-checkbox-default">
							<input id="part" type="checkbox" onclick="get_part();"><span></span> <b>PART PAYMENT &#8358;'.number_format(($e_details * ($e_first_pay / 100)),2).' ('.$e_first_pay.'%)</b>
						</label>
					';
				}
			}
		?>
        
        <script type="text/javascript">
			function get_part() {
				var amt_pay = document.getElementById('amt_pay').value;
				var first_pay = document.getElementById('first_pay').value;
				var amt;
				if(document.getElementById('part').checked) {
					amt = amt_pay * (first_pay / 100);
				} else {
					amt = amt_pay;
				}
				
				document.getElementById('amount').value = amt;
				document.getElementById('amt').innerHTML = Number(amt).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
			}
		</script>
    </h2>
    
    <div class="col-lg-12">
        <div class="form-group">
            <div class="col-xs-12 col-sm-2"></div>
            <div class="col-xs-12 col-sm-8">
                <div class="form-material">
                    <input type="hidden" id="fee_id" name="fee_id" value="<?php echo $e_id; ?>" />
                    <input class="form-control text-center" type="text" id="card_name" name="card_name" placeholder="CARD FULL NAME" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-2"></div>
        </div>
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-2"></div>
            <div class="col-xs-12 col-sm-8">
                <div class="form-material">
                    <input class="form-control text-center" type="text" id="card_no" name="card_no" placeholder="XXXX XXXX XXXX XXXX" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-2"></div>
        </div>
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-2"></div>
            <div class="col-xs-12 col-sm-3">
                <div class="form-material">
                    <input class="form-control text-center" type="text" id="exp_month" name="exp_month" placeholder="MM" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="form-material">
                    <input class="form-control text-center" type="text" id="exp_year" name="exp_year" placeholder="YY" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-2">
                <div class="form-material">
                    <input class="form-control text-center" type="text" id="cvv2" name="cvv2" placeholder="CVV2" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-2"></div>
        </div>
        
    </div>

    <div class="form-group text-center m-t-40">
        <div class="col-xs-12">
        	<img alt="" src="<?php echo base_url('assets/img/pay.png'); ?>" />
        </div>
        <div class="col-xs-12">
            <input type="hidden" id="amount" name="amount" value="<?php echo $e_details; ?>" />
            <input type="hidden" id="type" name="type" value="<?php echo $type; ?>" />
            <button class="btn btn-primary btn-rounded text-uppercase" type="submit">
                <i class="fa fa-credit-card"></i> Pay <?php echo '&#8358;<span id="amt">'.number_format($e_details,2); ?></span> Now
            </button>
        </div>
    </div>
<?php echo form_close(); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jsform.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/select2/select2.full.min.js"></script>
<script>jQuery(function(){App.initHelpers(['datepicker', 'datetimepicker', 'select2']);});</script>