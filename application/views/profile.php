<main id="main-container">
    <div class="content content-boxed">
        <div class="block">
            <div class="bg-image" style="background-image: url('<?php echo base_url('assets/img/skills-bg.jpg'); ?>');">
                <div class="block-content bg-primary-dark-op text-center overflow-hidden">
                    <div class="push-30-t push animated fadeInDown"> 
                    	<img class="img-avatar img-avatar96 img-avatar-thumb" src="<?php echo base_url($pics); ?>" alt=""> 
                    </div>
                    <div class="push-30 animated fadeInUp">
                        <h2 class="h4 font-w600 text-white push-5"><?php echo $othername.' '.$lastname; ?></h2>
                        <h3 class="h5 text-warning"><?php echo $role; ?></h3>
                    </div>
                </div>
            </div>
            <?php
				$list_country = '';
				$member_since = timespan(strtotime($reg_date), time());
				$member_since = explode(', ', $member_since);
				$member_since = $member_since[0];
				
				//get all country
				if(!empty($allcountry)){
					foreach($allcountry as $country){
						if(!empty($country_id)){
							if($country_id == $country->id){
								$c_sel = 'selected="selected"';
							} else {$c_sel = '';}
						} else {$c_sel = '';}
						
						$list_country .= '<option value="'.$country->id.'" '.$c_sel.'>'.$country->name.'</option>';
					}
				}
			?>
            <div class="block-content text-center"> 
                <div class="row items-push text-uppercase">
                    <div class="col-xs-12 col-sm-3">
                        <div class="font-w700 text-gray-darker animated fadeIn">Since</div>
                        <span class="font-w400 text-primary animated flipInX"><?php echo $member_since; ?></span> 
                   	</div>
                    <div class="col-xs-12 col-sm-3">
                        <div class="font-w700 text-gray-darker animated fadeIn">Matric Number</div>
                        <span class="font-w400 text-primary animated flipInX"><?php echo $user_matric; ?></span> 
                   	</div>
                    <div class="col-xs-12 col-sm-3">
                        <div class="font-w700 text-gray-darker animated fadeIn">Phone</div>
                        <span class="font-w400 text-primary animated flipInX"><?php echo $phone; ?></span> 
                  	</div>
                    <div class="col-xs-12 col-sm-3">
                        <div class="font-w700 text-gray-darker animated fadeIn">Email</div>
                        <span class="font-w400 text-primary animated flipInX"><?php echo $email; ?></span> 
                    </div>
                </div>
            </div>
        </div>
        
		<?php echo form_open_multipart('profile'); ?>
        <div class="block">
            <?php if(!empty($err_msg)){echo $err_msg;} ?>
            <ul class="nav nav-tabs nav-justified push-20" data-toggle="tabs">
                <li class="active"> <a href="#tab-profile-setting"><i class="fa fa-fw fa-graduation-cap"></i> Academics</a> </li>
                <li> <a href="#tab-profile-personal"><i class="fa fa-fw fa-user"></i> Personal</a> </li>
                <li> <a href="#tab-profile-password"><i class="fa fa-fw fa-asterisk"></i> Password</a> </li>
            </ul>
            <div class="block-content tab-content">
                <div class="tab-pane fade in active" id="tab-profile-setting">
                    <div class="row items-push">
                        <div class="col-sm-6 col-sm-offset-3 form-horizontal">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                    	<label for="programme">Programme</label>
                                        <h4 for="programme"><?php echo $user_programme; ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                    	<label for="session">Current Session</label>
                                        <h4 for="session"><?php echo $user_session; ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                    	<label for="level">Level</label>
                                        <h4 for="level"><?php echo $user_level; ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                    	<label for="dept">Department</label>
                                        <h4 for="dept"><?php echo $user_dept; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade in" id="tab-profile-personal">
                    <div class="row items-push">
                        <div class="col-sm-6 col-sm-offset-3 form-horizontal">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-material floating">
                                    	<input class="form-control" type="text" id="othername" name="othername" value="<?php if(!empty($othername)){echo $othername;} ?>">
                                    	<label for="othername">Other Names</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-material floating">
                                    	<input class="form-control" type="text" id="lastname" name="lastname" value="<?php if(!empty($lastname)){echo $lastname;} ?>">
                                    	<label for="lastname">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                    	<input class="form-control" type="text" id="phone" name="phone" value="<?php if(!empty($phone)){echo $phone;} ?>">
                                    	<label for="phone">Phone</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                    	<input class="form-control" type="email" id="email" name="email" value="<?php if(!empty($email)){echo $email;} ?>">
                                    	<label for="email">Email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <div class="form-material floating">
                                    	<?php 
											if(!empty($sex)){ 
												if($sex == 'Male'){$m_sel = 'selected="selected"';} else {$m_sel = '';}
												if($sex == 'Female'){$f_sel = 'selected="selected"';} else {$f_sel = '';}
											} else {$m_sel = ''; $f_sel = '';}
										?>
                                        <select class="js-select2 form-control" id="sex" name="sex" style="width: 100%;" data-placeholder="Gender">
                                            <option></option>
                                            <option value="Male" <?php echo $m_sel; ?>>Male</option>
                                            <option value="Female" <?php echo $f_sel; ?>>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-material floating">
                                    	<input class="form-control" type="text" id="dob" name="dob" value="<?php if(!empty($dob)){echo $dob;} ?>">
                                    	<label for="dob">DOB <small class="text-muted">(dd/mm/yyyy)</small></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <div class="form-material floating">
                                    	<textarea class="form-control" id="address" name="address" rows="4"><?php if(!empty($address)){echo $address;} ?></textarea>
                                    <label for="address">Address</label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="state" name="state" value="<?php if(!empty($state)){echo $state;} ?>">
                                            <label for="state">City/State</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <select class="js-select2 form-control" id="country" name="country" style="width: 100%;" data-placeholder="Country">
                                                <option></option>
                                                <?php echo $list_country; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade in" id="tab-profile-password">
                    <div class="row items-push">
                        <div class="col-sm-6 col-sm-offset-3 form-horizontal">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                    	<input class="form-control" type="password" id="old" name="old" value="">
                                    	<label for="old">Current Password</label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                    	<input class="form-control" type="password" id="new" name="new" value="">
                                    	<label for="new">New Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                    	<input class="form-control" type="password" id="confirm" name="confirm" value="">
                                    	<label for="confirm">Confirm New Password</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full bg-gray-lighter text-center">
                <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save push-5-r"></i> Save Changes</button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</main>
