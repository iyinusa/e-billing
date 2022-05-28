<?php echo form_open('fees/form/'.$param1.'/'.$param2, array('id'=>'bb_ajax_form','class'=>'form-horizontal')); ?>
	<div id="bb_ajax_msg"></div>
    
    <?php if($param1 == 'del') { // delete view ?>
        <div class="col-xs-12 text-center">
            <h3><b>Are you sure?</b></h3>
            <input type="hidden" name="d_fee_id" value="<?php if(!empty($d_id)){echo $d_id;} ?>" />
        </div>
        <div class="form-group text-center m-t-40">
            <div class="col-xs-12">
                <button class="btn btn-danger btn-rounded text-uppercase waves-effect waves-light" type="submit">
                    <span class="btn-label"><i class="ti-trash"></i></span> Yes - Delete
                </button>
            </div>
        </div>
    
    <?php } else { // insert/edit view ?>
        <div class="col-lg-12">
            <div class="form-group">
                <div class="col-xs-12 col-sm-7">
                    <div class="form-material">
                        <input id="fee_id" name="fee_id" type="hidden" value="<?php if(!empty($e_id)){echo $e_id;} ?>">
                        
                        <?php
							$list_prog = '';
							if(!empty($allprog)) {
								foreach($allprog as $prog) {
									if(!empty($e_prog_id)) {
										if($e_prog_id == $prog->id) {
											$p_sel = 'selected="selected"';
										} else {$p_sel = '';}
									} else {$p_sel = '';}
									
									$list_prog .= '<option value="'.$prog->id.'" '.$p_sel.'>'.$prog->name.'</option>';	
								}
							}
						?>
                        <select class="js-select2 form-control" id="prog_id" name="prog_id" style="width: 100%;" data-placeholder="Programme" required>
                            <option></option>
                            <?php echo $list_prog; ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5">
                    <div class="form-material">
                        <?php
							$list_session = '';
							if(!empty($allsession)) {
								foreach($allsession as $session) {
									if(!empty($e_session_id)) {
										if($e_session_id == $session->id) {
											$s_sel = 'selected="selected"';
										} else {$s_sel = '';}
									} else {$s_sel = '';}
									
									$list_session .= '<option value="'.$session->id.'" '.$s_sel.'>'.$session->name.'</option>';	
								}
							}
						?>
                        <select class="js-select2 form-control" id="session_id" name="session_id" style="width: 100%;" data-placeholder="Current Session" required>
                            <option></option>
                            <?php echo $list_session; ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-xs-12 col-sm-4">
                    <div class="form-material">
                        <?php
							$list_level = '';
							if(!empty($alllevel)) {
								foreach($alllevel as $level) {
									if(!empty($e_level_id)) {
										if($e_level_id == $level->id) {
											$l_sel = 'selected="selected"';
										} else {$l_sel = '';}
									} else {$l_sel = '';}
									
									$list_level .= '<option value="'.$level->id.'" '.$l_sel.'>'.$level->name.'</option>';	
								}
							}
						?>
                        <select class="js-select2 form-control" id="level_id" name="level_id" style="width: 100%;" data-placeholder="Level" required>
                            <option></option>
                            <?php echo $list_level; ?>
                        </select>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-8">
                    <div class="form-material">
                        <?php
							$list_dept = '';
							if(!empty($alllevel)) {
								foreach($alldept as $dept) {
									if(!empty($e_dept_id)) {
										if($e_dept_id == $dept->id) {
											$d_sel = 'selected="selected"';
										} else {$d_sel = '';}
									} else {$d_sel = '';}
									
									$list_dept .= '<option value="'.$dept->id.'" '.$d_sel.'>'.$dept->name.'</option>';	
								}
							}
						?>
                        <select class="js-select2 form-control" id="dept_id" name="dept_id" style="width: 100%;" data-placeholder="Department" required>
                            <option>All Departments</option>
                            <?php echo $list_dept; ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-xs-12 col-sm-8">
                    <div class="form-material">
                        <input class="form-control" type="text" id="name" name="name" value="<?php if(!empty($e_name)){echo $e_name;} ?>" required>
                        <label for="name">Fee Name</label>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-material">
                        <input class="form-control" type="text" id="details" name="details" value="<?php if(!empty($e_details)){echo $e_details;} ?>" placeholder="E.g. 50000" required>
                        <label for="details">Amount (&#8358;)</label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <script type="text/javascript">
					function inst() {
						var first = document.getElementById('first_pay').value;
						var second = document.getElementById('second_pay').value;
						
						document.getElementById('second_pay').value = 100 - Number(first);
					}
				</script>
                <div class="col-xs-12 col-sm-3">
                    <div class="form-material">
                        <input class="form-control" type="text" id="first_pay" name="first_pay" value="<?php if(!empty($e_first_pay)){echo $e_first_pay;} ?>" oninput="inst();" required>
                        <label for="first_pay">1st Payment</label>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <div class="form-material">
                        <input class="form-control" type="text" id="second_pay" name="second_pay" value="<?php if(!empty($e_second_pay)){echo $e_second_pay;} ?>" oninput="inst();" required>
                        <label for="second_pay">2nd Payment</label>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <div class="form-material">
                        <input class="<?php if(empty($e_pay_start)){echo 'js-datetimepicker';} ?> form-control" type="text" id="pay_start" name="pay_start" value="<?php if(!empty($e_pay_start)){echo $e_pay_start;} ?>" required>
                        <label for="pay_start">Open Payment</label>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <div class="form-material">
                        <input class="<?php if(empty($e_pay_start)){echo 'js-datetimepicker';} ?> form-control" type="text" id="pay_end" name="pay_end" value="<?php if(!empty($e_pay_end)){echo $e_pay_end;} ?>" required>
                        <label for="pay_end">Close Payment</label>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="form-group text-center m-t-40">
            <div class="col-xs-12">
                <button class="btn btn-primary btn-rounded text-uppercase" type="submit">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>
        </div>
    <?php } ?>
<?php echo form_close(); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jsform.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/select2/select2.full.min.js"></script>
<script>jQuery(function(){App.initHelpers(['datepicker', 'datetimepicker', 'select2']);});</script>