<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title><?php echo $title; ?></title>

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicons/favicon.png">

    <!-- theme -->
    <link href="<?php echo base_url(); ?>landing/css/rockox.css" rel="stylesheet">
    
	<!-- animation -->
    <link href="<?php echo base_url(); ?>landing/css/animate.css" rel="stylesheet">
    
    <!-- piecharts -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>landing/css/pie-charts-style.css">
	
    <!-- Add fancyBox -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>landing/css/jquery.fancybox-v=2.1.5.css" media="screen">

	<!-- jcarousel styling -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>landing/css/skin.css">
    
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>landing/css/bootstrap.css" rel="stylesheet">
    <!--<link href="<?php echo base_url(); ?>landing/css/dark_theme.css" rel="stylesheet">-->
    
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="fixed-header" data-spy="scroll" data-target=".navbar">
  	<div id="wrapper">
    <!-- BEGIN HEADER -->
    <header id="home">
	    <nav class="navbar navbar-default" role="navigation">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- BEGIN LOGO -->
              <a class="navbar-brand" href="#home"><img alt="" src="<?php echo base_url(); ?>landing/images/basespot.png" height="50px" /></a>
              <!-- END LOGO -->
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
            	<!-- BEGIN NAVIGATION -->
                  <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('stores'); ?>">Stores</a></li>
                    <li><a href="<?php echo base_url('login'); ?>" style="background-color:#F93; color:#fff;">Login</a></li>
                  </ul>
            	<!-- END NAVIGATION -->
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
    </nav>
    </header>
    <!-- END HEADER -->