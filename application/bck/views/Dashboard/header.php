<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
<head>
    <link rel="shortcut icon" type="image/png" href="<?=base_url()?>assets/img/logo.png"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Trackmee | Admin</title>

    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/datepicker.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/animate.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>
    <link href="<?=base_url()?>assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
<style type="text/css">
.open>.dropdown-menu {
    display: block;
    width: max-content;
}

</style>
</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-header">
                 <img class="img-responsive" src="<?=base_url()?>assets/img/Trackmee_logo.png" style="height:74px;"></a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li id="institute_header">
                       <a href="<?=site_url('admin/')?>"><img src="<?=base_url()?>assets/img/icon/dashboard.png" style="display: -webkit-box;font-size: initial;padding-left: 24px;"></i> Dashboard </a>
                    </li>
                    <li id="institute">
                        <a href="<?=site_url('institute/institute_Details');?>"><img src="<?=base_url()?>assets/img/icon/university.png" style="display: -webkit-box;font-size: initial;padding-left: 15px;"></i> institute</a>
                    </li>
                    <li id="device">
                       <a href="<?=site_url('Device/device_registration')?>"><img src="<?=base_url()?>assets/img/icon/device.png" style="display: -webkit-box;font-size: initial;padding-left: 13px;"></i> Device </a>
                    </li>
                    <li id="bus">
                       <a href="<?=site_url('Bus/bus_registration')?>"><img src="<?=base_url()?>assets/img/icon/transport.png" style="display: -webkit-box;font-size: initial;padding-left: 01px;"></i> Bus</a>
                    </li>
                    <li id="AY">
                        <a href="<?=site_url('Institute/view_acadmic_year')?>"><i class="fa fa-graduation-cap" style="display: -webkit-box;font-size: x-large;padding-left: 22px;"></i> Acadmic Year</a>
                    </li>
                    <li id="SMS">
                        <a href="<?=site_url('Institute/sms_credit')?>"><i class="fa fa-envelope" style="display: -webkit-box;font-size: x-large;padding-left: 22px;"></i> SMS Credit</a>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right"> 
                    <div class="dropdown profile-element">
                        <center>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false" style="padding: 0px 0px;">
                                <span class="clear">
                                    <img alt="image" class="img-circle" src="<?=base_url()?>/assets/img/logo.png" style="height:61px;width:61px;padding: 10px;"></span> 
                                </span>
                            </a>
                            <div class="dropdown-menu fadeInLeft" style="">
                                <div class="contact-box" style="margin: 0 0 0 0;">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <img alt="image" class="img-circle img-responsive"  src="<?=base_url()?>assets/img/logo.png" style="height:81px;width:81px;">
                                            </div>
                                            <div class="col-sm-8" style="padding:0%;">
                                                <h3><strong><?php echo $first_name." ".$last_name; ?></strong></h3>
                                                <h4><?php echo $email_id; ?></h4>
                                                <h5><span>Username: </span><?php echo $username; ?></h5>
                                                <a href="">My Account</a>
                                            </div>       
                                        </div>

                                </div>

                                <div style="background-color:#000000;">
                                    <div style="padding:3%;">
                                        <a href="<?=site_url('Admin/forgot_password')?>" style="color:#ffffff;">Change Password?</a>
                                        <a href="<?=site_url('Authentication/logout')?>" class="btn btn-xs btn-primary pull-right" style:"color:#000000; padding-bottom:2%;">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>
                </ul>
            </div>
        </nav>
        </div>