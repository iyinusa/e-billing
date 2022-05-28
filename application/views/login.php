<div class="bg-white pulldown" style="background: rgba(255, 255, 255, 0.85);">
    <div class="content content-boxed overflow-hidden">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                <div class="push-30-t push-50 animated fadeIn">
                    <div class="text-center"> <img alt="<?php echo app_name; ?>" src="<?php echo base_url('assets/img/laspo_logo.png'); ?>" /> 
                        <p class="text-muted push-15-t"><?php if(!empty($err_msg)){echo $err_msg;} else {echo app_meta_desc;} ?></p>
                    </div>
                    <?php echo form_open_multipart('login', array('class'=>'js-validation-login form-horizontal push-30-t')); ?>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                    <input class="form-control" type="text" id="username" name="username">
                                    <label for="username">Matric Number</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                    <input class="form-control" type="password" id="-password" name="password">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label class="css-input switch switch-sm switch-primary">
                                    <input type="checkbox" id="remember-me" name="remember-me">
                                    <span></span> Remember Me? </label>
                            </div>
                            <div class="col-xs-6">
                                <div class="font-s13 text-right push-5-t"> <a href="<?php echo base_url('forgot'); ?>">Forgot Password?</a> </div>
                            </div>
                        </div>
                        <div class="form-group push-30-t">
                            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                <button class="btn btn-sm btn-block btn-primary" type="submit"><i class="fa fa-key"></i> Log in</button>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>