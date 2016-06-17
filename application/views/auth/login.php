<!DOCTYPE html>
<html lang="es">
    <head>
        <base url="<?php echo base_url();?>">
        <meta charset="utf-8">
        <meta http-equiv="X-UA_Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title><?php echo $title;?></title>
        
        <!-- CSS -->
        <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
       <!-- Custom styles for this template -->
     
        <!-- JS -->
        <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
    </head>
    
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <h1 class="page-header"><?php echo lang('login_heading');?></h1>
            <?php if(isset($message) && !empty($message)) {?>
            <div class="alert alert-danger"><?php echo $message;?></div>
            <?php } ?>
    
        <p><?php echo lang('login_subheading');?></p>
            <?php echo form_open("auth/login",'role="form"');?>
        
        <div class="form-group">
            <?php echo form_input($identity);?>
        </div>
        
        <div class="form-group">
            <?php echo form_input($password);?>
        </div>
        <div class="form-group">
            <label>
            <?php echo lang('login_remember_label', 'remember');?>
            </label>
            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
        </div>

        <div class="form-group">
            <?php echo form_submit('submit', lang('login_submit_btn'),'class="btn btn-success"');?>
        </div>
        <?php echo form_close();?>
        <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
       
        </div>
    </div>
   
<script>
    
    $(document).on("click", ".login", function(e) {
        jQuery.ajax({
            type: 'POST',
            url: 'auth/login',
            success: function(data) {
                bootbox.dialog({
                    title: "Login",
                    message: data,
                    onEscape: function() {},
                    /*buttons: {
                        success: {
                            label: "Success!",
                            className: "btn-success",
                        },
                    }*/
                });
            }
        });
    
    });
    
    $(document).on("click", ".register", function(e) {
        jQuery.ajax({
            type: 'POST',
            url: 'auth/register',
            success: function(data) {
                bootbox.dialog({
                    title: "Login",
                    message: data,
                    onEscape: function() {},
                    /*buttons: {
                        success: {
                            label: "Success!",
                            className: "btn-success",
                        },
                    }*/
                });
            }
        });
    
    });
    
</script>