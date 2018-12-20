<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:23:03 GMT -->
<head>
    <link rel="shortcut icon" type="image/png" href="<?=base_url()?>assets/img/logo.png"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Trackmee | Login</title>

    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?=base_url()?>assets/css/animate.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">


    <style>
    @media (min-width: 1200px) {
        #log {
            margin-top: -455px;  
        }
    }

    @media (min-width: 980px) and (max-width: 1199px)  {
    #log {
            margin-top: -480px;  
        }
    }
    @media (min-width: 768px) and (max-width: 979px) {
         #log {
            margin-top: -450px;  
        }
    }
   @media  (max-width: 767px) {
        #log {
            margin-top: -435px;  
        }
    } 
   .alert {
    padding: 5px 20px;
    margin-bottom: 8px !important;
    border: 1px solid transparent;
    border-radius: 4px;
    }
    .alert-dismissable, .alert-dismissible {
    padding-right: 35px;
}
 .loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('<?=base_url()?>assets/img/pageLoader2.gif') 50% 50% no-repeat rgb(249,249,249);
        opacity: .8;
    }
 </style>
</head>
<?php 
// $path = base_url('assets')."/img/resize.jpg";
$path = base_url('assets')."/img/resize1.gif";
$path1 = base_url('assets')."/img/logo png file.png";

 ?>
<body class="gray-bg" style="background: url('<?php echo $path;?>') no-repeat center center fixed;background-size: cover;" >
    <div class="loader"></div>
    <div style=" padding-top: 10%;">
        <center>
        <div class="middle-box text-center loginscreen animated fadeInDown" id="log" style=" background: #ffffff;padding: 40px;border-radius: 20px;border: 1px solid #000;width: 100%;padding-top: 10px;margin-top: 0%;">
            <h2 style="color: #000;"><b>Welcome To <span style="color: #67C6F1;">Track</span>Mee</b></h2><img src="<?php echo $path1; ?>" style="padding-bottom: 20px;">
            <form method="post" action="<?=site_url('Authentication/login')?>">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="credential_username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="credential_password" narequired="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                <?php if (isset($success)) { ?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <a class="alert-link" href="#"><?php echo $success; ?> </a>.
                    </div>
                 <?php } ?>   

                <?php if (isset($error)) { ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <a class="alert-link" href="#"><?php echo $error; ?></a>.
                    </div>
                <?php } ?>

                <?php if (isset($Disabled)) { ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <a class="alert-link" href="#"><?php echo $Disabled; ?></a>.
                    </div>
                <?php } ?>  

                <?php if (isset($alert)) { ?>
                    <div class="alert alert-warning alert-dismissable">
                         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <a class="alert-link" href="#"><?php echo $alert;  ?></a>.
                    </div>
                <?php }  ?>  
            </form>
            <a href="<?=site_url('Welcome/login_forgot_password')?>"><small><u>Forgot password?</u></small></a>
            <h4 class="m-t"><small style="color:#000000;"><b><br>Designed & Developed By <a href="http://www.syntech.co.in" target="_blank"><u>Syntech Solution </u></a>&copy; 2017-18 </b></small></p>
        </div>
    </div>
    <div style="border:none; backgorund:none repeat scroll 0 0 #cde7a6 !important;padding:10px 20px;right:0;left:0;bottom:0;position: fixed;">
        <div class="row">
            <div class="col-sm-4">
                <div class="pull-left">
                    <strong><!-- Copyright --> </strong><a href="http://www.syntech.co.in" target="_blank"> <img src="<?=base_url()?>assets/img/syntech1.png" style="height:22px;"></a><strong><!--  &copy; 2017-2018 --> </strong>  
                </div>
            </div>
            <div class="pull-right">
                <i class="fa fa-phone-square" aria-hidden="true"></i><strong> 020-24269021 / 7030578612</strong> | <i class="fa fa-envelope" aria-hidden="true"></i> <strong>contactus@syntech.co.in </strong> 
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?=base_url()?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        });
    </script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:23:03 GMT -->
</html>
