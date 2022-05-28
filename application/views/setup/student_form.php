<?php echo form_open('students/form/'.$param1.'/'.$param2, array('id'=>'bb_ajax_form','class'=>'form-horizontal')); ?>
	<div id="bb_ajax_msg"></div>
    
    <?php if($param1 == 'del') { // delete view ?>
        <div class="col-xs-12 text-center">
            <h3><b>Are you sure?</b></h3>
            <input type="hidden" name="d_student_id" value="<?php if(!empty($d_id)){echo $d_id;} ?>" />
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
                        <input id="student_id" name="student_id" type="hidden" value="<?php if(!empty($e_id)){echo $e_id;} ?>">
                        
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
                            <option></option>
                            <?php echo $list_dept; ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-material">
                        <input class="form-control" type="text" id="othername" name="othername" value="<?php if(!empty($e_othername)){echo $e_othername;} ?>" required>
                        <label for="othername">Other Names</label>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-material">
                        <input class="form-control" type="text" id="lastname" name="lastname" value="<?php if(!empty($e_lastname)){echo $e_lastname;} ?>" required>
                        <label for="lastname">Last Name</label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-xs-12 col-sm-4">
                    <div class="form-material">
                        <input class="form-control" type="text" id="matric" name="matric" value="<?php if(!empty($e_matric)){echo $e_matric;} ?>" required>
                        <label for="matric">Matric Number</label>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="form-material">
                        <input class="form-control" type="email" id="email" name="email" value="<?php if(!empty($e_email)){echo $e_email;} ?>" required>
                        <label for="email">Email Address</label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-xs-12 col-sm-7">
                    <div class="form-material">
                        <input class="form-control" type="text" id="phone" name="phone" value="<?php if(!empty($e_phone)){echo $e_phone;} ?>">
                        <label for="phone">Phone Number</label>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5">
                    <div class="form-material">
                        <input class="form-control" type="text" id="password" name="password" value="<?php if(empty($e_id)){echo substr(md5(rand()),0,6);} ?>" <?php if(empty($e_id)){echo 'required';} ?>>
                        <label for="password">Password <small class="text-muted">(auto generated)</small></label>
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
<script>jQuery(function(){App.initHelpers(['select2']);});</script>