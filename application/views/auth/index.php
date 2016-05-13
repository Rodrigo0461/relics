<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Control Panel</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/styles.css" rel="stylesheet">
	</head>
	<body>
<!-- Header -->
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
            <li><a href="#">My Profile</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-lock"></i>  <?php echo anchor('auth/logout','Logout'  )?></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container">
  
  <!-- upper section -->
  <div class="row">
      <div class="col-sm-3">
      <!-- left -->
      <h3><i class="glyphicon glyphicon-briefcase"></i> Toolbox</h3>
      <hr>
      
      <ul class="nav nav-stacked">
        <li><a href="#" target="ext"><i class="glyphicon glyphicon-flash"></i> Alerts</a></li>
        <li><a href="#" target="ext"><i class="glyphicon glyphicon-link"></i> Links</a></li>
        <li><a href="#" target="ext"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>
          
      </ul>
      
      <hr>
      
      </div><!-- /span-3 -->
    
        
        <!-- Aqui van los graficos -->
       <div class="col-sm-9">
      	
      <!-- column 2 -->	
       <h3><i class="glyphicon glyphicon-dashboard"></i> Bootply Dashboard</h3>  
            <hr>
      
	    <div class="row">
            <!-- center left-->	
         	<div class="col-md-7">
          	</div><!--/col-->
            </div><!--/row-->
        </div><!--/col-span-9-->
    
  </div><!--/row-->
  
  </div>
	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="../assets/js/bootstrap.min.js"></script>
	</body>
</html>
