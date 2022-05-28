<div class="pulldown push-30-t text-center animated fadeInUp"> 
	<small class="text-muted"><?php echo date('Y'); ?> &copy; <?php echo app_name; ?></small>
</div>
<script src="<?php echo base_url(); ?>assets/js/main.min-2.2.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script> 

<?php if($page_active == 'login'){ ?>
<script src="<?php echo base_url(); ?>assets/js/pages/base_pages_login.js"></script>
<?php } ?>

<?php if($page_active == 'forgot'){ ?>
<script src="<?php echo base_url(); ?>assets/js/pages/base_pages_reminder.js"></script>
<?php } ?>

<?php if($page_active == 'pay'){ ?>
<script src="<?php echo base_url(); ?>assets/js/plugins/card/jquery.card.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datetimepicker/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/dropzonejs/dropzone.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/base_forms_pickers_more.js"></script>
<script>jQuery(function(){App.initHelpers('appear');jQuery('.js-card-form').card({container: '.js-card-container',formSelectors: {numberInput: '#checkout-cc-number',expiryInput: '#checkout-cc-expiry',cvcInput: '#checkout-cc-cvc',nameInput: '#checkout-cc-name'}});});</script>
<script>jQuery(function(){App.initHelpers(['datepicker', 'datetimepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']);});</script>
<?php } ?>
</body>
</html>