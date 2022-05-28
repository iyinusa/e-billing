<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
	if($page_active == 'programme'){$prog_act='active';}else{$prog_act='';}
	if($page_active == 'session'){$session_act='active';}else{$session_act='';}
	if($page_active == 'level'){$level_act='active';}else{$level_act='';}
	if($page_active == 'school'){$school_act='active';}else{$school_act='';}
	if($page_active == 'department'){$dept_act='active';}else{$dept_act='';}
	if($page_active == 'student'){$student_act='active';}else{$student_act='';}
	if($page_active == 'fee'){$fee_act='active';}else{$fee_act='';}
	if($page_active == 'transaction'){$trans_act='active';}else{$trans_act='';}
?>
<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-focus" lang="en">
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<meta charset="utf-8">
<title><?php echo $title; ?></title>
<meta name="description" content="<?php echo app_meta_desc; ?>">
<meta name="author" content="">
<meta name="robots" content="noindex, nofollow">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicons/favicon.png">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
<?php if($page_active != 'dashboard'){ ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/select2/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/select2/select2-bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.skinHTML5.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/dropzonejs/dropzone.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.skinHTML5.min.css">
<?php } ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min-1.4.css">
<link rel="stylesheet" id="css-main" href="<?php echo base_url(); ?>assets/css/main.min-2.2.css">
</head>
<body>
<div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
    <nav id="sidebar">
        <div id="sidebar-scroll">
            <div class="sidebar-content">
                <div class="side-header side-content bg-white">
                    <a class="h5 text-white" href="<?php echo base_url('profile'); ?>"> 
                    	<img alt="<?php echo app_name; ?>" src="<?php echo base_url('assets/img/avatars/avatar1.png'); ?>" style="height:40px;" />
                        <span class="h4 font-w600 sidebar-mini-hide text-black">E-Billing System</span> 
                    </a> 
              	</div>
                
                <div class="side-content">
                    <ul class="nav-main">
                        <?php if($this->session->userdata('ebs_user_role') == 'Admin'){ ?>
                        <li class="nav-main-heading"><span class="sidebar-mini-hide">Setup</span></li>
                        <li class="<?php if($page_active=='programme' || $page_active=='session' || $page_active=='level' || $page_active=='school' || $page_active=='department' || $page_active=='student'){echo 'open';} ?>"> 
                        	<a class="nav-submenu" data-toggle="nav-submenu" href="javascript:;"><i class="si si-settings"></i><span class="sidebar-mini-hide">Settings</span></a>
                            <ul>
                                <li> <a href="<?php echo base_url('programme'); ?>" class="<?php echo $prog_act; ?>">Programme</a> </li>
                                <li> <a href="<?php echo base_url('sessions'); ?>" class="<?php echo $session_act; ?>">Session</a> </li>
                                <li> <a href="<?php echo base_url('level'); ?>" class="<?php echo $level_act; ?>">Level</a> </li>
                                <li> <a href="<?php echo base_url('school'); ?>" class="<?php echo $school_act; ?>">School/Faculty</a> </li>
                                <li> <a href="<?php echo base_url('department'); ?>" class="<?php echo $dept_act; ?>">Department</a> </li>
                                <li> <a href="<?php echo base_url('students'); ?>" class="<?php echo $student_act; ?>">Students</a> </li>
                            </ul>
                        </li>
                        <?php } ?>
                        
                        <li class="nav-main-heading"><span class="sidebar-mini-hide">E-Billing</span></li>
                        <li> 
                        	<a href="<?php echo base_url('fees'); ?>" class="<?php echo $fee_act; ?>"><i class="si si-wallet"></i><span class="sidebar-mini-hide">Fees</span></a> 
                     	</li>
                        
                        <li> 
                        	<a href="<?php echo base_url('transactions'); ?>" class="<?php echo $trans_act; ?>"><i class="si si-book-open"></i><span class="sidebar-mini-hide">Transactions</span></a> 
                     	</li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
    <header id="header-navbar" class="content-mini content-mini-full">
        <ul class="nav-header pull-right">
            <li>
                <div class="btn-group">
                    <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button"> <img src="<?php echo base_url('assets/img/avatars/avatar1.png'); ?>" alt=""> <span class="caret"></span> </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-header">Account</li>
                        <li> <a tabindex="-1" href="<?php echo base_url('profile'); ?>"> <i class="si si-user pull-right"></i> Profile </a> </li>
                        <!--<li> <a tabindex="-1" href="javascript:;"> <i class="si si-settings pull-right"></i>Settings </a> </li>-->
                        <li class="divider"></li>
                        <li class="dropdown-header">Actions</li>
                        <li> <a tabindex="-1" href="<?php echo base_url('logout'); ?>"> <i class="si si-logout pull-right"></i>Log out </a> </li>
                    </ul>
                </div>
            </li>
        </ul>
        <ul class="nav-header pull-left">
            <li class="hidden-md hidden-lg">
                <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button"> <i class="fa fa-navicon"></i> </button>
            </li>
            <li class="hidden-xs hidden-sm">
                <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button"> <i class="fa fa-ellipsis-v"></i> </button>
            </li>
            <li class="text-muted small">
            	<b class="text-danger">Laspotech E-Billing</b><br />
                <span class="hidden-xs">
					<?php echo $this->session->userdata('ebs_user_othername').' <b>- '.$this->session->userdata('ebs_user_role').'</b>'; ?>
                </span>
                <span class="xs-only hidden-lg hidden-md hidden-sm">
					<?php echo substr($this->session->userdata('ebs_user_othername'),0,10).'... <b>- '.$this->session->userdata('ebs_user_role').'</b>'; ?>
                </span>
            </li>
        </ul>
    </header>