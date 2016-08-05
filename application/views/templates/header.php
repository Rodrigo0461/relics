<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Uptime</title>
       
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css" >
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui.css" />
      
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-1.12.4.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/bootbox.min.js"></script>
    </head>
	<body>

<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-toggle"></span>
      </button>
      <a class="navbar-brand" href="#">Control Panel</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
            <i class="glyphicon glyphicon-user"></i> <?php echo $this->ion_auth->user()->row()->username;?> <span class="caret"></span></a>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
            <li><a href="#"><i class="glyphicon glyphicon-lock"></i>  <?php echo anchor('auth/logout','Logout'  );?></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div> 
</div>

