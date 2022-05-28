    <!-- Modal -->
    <div class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="icon-close"></i></span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body row"> </div>
            </div>
        </div>
    </div>
    
    <footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
        <div class="pull-right"> Powered by <a href="javascript:;" class="pop" pageTitle="About Project" pageName="<?php echo base_url('about'); ?>">Final Year Students</a> </div>
        <div class="pull-left"> <?php echo app_name; ?> &copy; <?php echo date('Y'); ?> | All rights reserved </div>
    </footer>
</div>

<script src="<?php echo base_url(); ?>assets/js/main.min-2.2.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jsform.js"></script>
 
<?php if($page_active!='dashboard'){ ?>
<script src="<?php echo base_url(); ?>/assets/js/plugins/card/jquery.card.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/base_forms_wizard.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datetimepicker/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/pages/base_tables_datatables.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/dropzonejs/dropzone.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/base_forms_pickers_more.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/base_pages_files.js"></script>
<script>jQuery(function(){App.initHelpers('appear');jQuery('.js-card-form').card({container: '.js-card-container',formSelectors: {numberInput: '#checkout-cc-number',expiryInput: '#checkout-cc-expiry',cvcInput: '#checkout-cc-cvc',nameInput: '#checkout-cc-name'}});});</script>
<script>jQuery(function(){App.initHelpers(['datepicker', 'datetimepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']);});</script>
<?php } ?>
<script>jQuery(function(){App.initHelpers(['appear', 'appear-countTo']);});</script> 

</body>
</html>