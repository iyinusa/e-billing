<?php echo form_open('school/form/'.$param1.'/'.$param2, array('id'=>'bb_ajax_form','class'=>'form-horizontal')); ?>
	<div id="bb_ajax_msg"></div><br />
    
    <?php if($param1 == 'del') { // delete view ?>
        <div class="col-xs-12 text-center">
            <h3><b>Are you sure?</b></h3>
            <input type="hidden" name="d_school_id" value="<?php if(!empty($d_id)){echo $d_id;} ?>" />
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
                <div class="col-xs-12 col-sm-8">
                    <div class="form-material">
                        <input id="school_id" name="school_id" type="hidden" value="<?php if(!empty($e_id)){echo $e_id;} ?>">
                        <input class="form-control" type="text" id="name" name="name" value="<?php if(!empty($e_name)){echo $e_name;} ?>" required>
                        <label for="name">School/Faculty</label>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-4">
                    <div class="form-material">
                        <input class="form-control" type="text" id="code" name="code" value="<?php if(!empty($e_code)){echo $e_code;} ?>">
                        <label for="code">Code</label>
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