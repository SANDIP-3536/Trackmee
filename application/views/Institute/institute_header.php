<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
<head>
    <link rel="shortcut icon" type="image/png" href="<?=base_url()?>assets/img/logo.png"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Trackmee | Institute</title>

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
    <!-- <link href="<?=base_url()?>assets/css/plugins/c3/c3.min.css" rel="stylesheet"> -->
    <link href="<?=base_url()?>assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Google Lat-Long Picker -->
    <link href="<?=base_url()?>assets/css/plugins/lat_long_picker/jquery-gmaps-latlon-picker.css" rel="stylesheet">
    <style type="text/css">
        .open>.dropdown-menu {
            display: block;
            width: max-content;
        }
        .top-navigation .nav > li > a {
            padding: 11px 13px;
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

<body class="top-navigation">
    <div class="loader"></div>
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-header">
                <img class="img-responsive" src="<?=base_url()?>assets/img/Trackmee_logo.png">
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li id="tracking">
                        <a href="<?=site_url('Tracking/view_map_table_institute')?>"><img src="<?=base_url()?>assets/img/icon/Live.png" style="display: -webkit-box;font-size: initial;padding-left: 14px;height: 32px;"></i> Dashboard </a>
                    </li>
                    <li id="client">
                        <a href="<?=site_url('Client/view_client');?>"><img src="<?=base_url()?>assets/img/icon/clients.png" style="display: -webkit-box;font-size: initial;padding-left: 5px;"></i> Client</a></li>
                    <li id="tracking_all"><a href="<?=site_url('Tracking/view_all_device_institute')?>"><img src="<?=base_url()?>assets/img/icon/tracking.png" style="display: -webkit-box;font-size: initial;padding-left: 12px;"></i> <b>Tracking </b></a>
                    </li>
                    <!-- <li id="near_by">
                        <a href="<?=site_url('Tracking/near_by')?>"><img src="<?=base_url()?>assets/img/icon/TRACK DETAILS.png" style="display: -webkit-box;font-size: initial;padding-left: 14px;height: 32px;"></i> Track Details </a>
                    </li> -->
                    <li class="dropdown" id="near_by">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/TRACK DETAILS.png" style="display: -webkit-box;font-size: initial;padding-left: 25px;height: 32px;"></i> Track Details <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?=site_url('Tracking/near_by')?>"><b> Find Near By</b></a></li>
                            <li><a href="<?=site_url('')?>"><b> Ignition On/Off</b></a></li>
                            <li><a href="<?=site_url('Tracking/playback')?>"><b> Playback</b></a></li>
                            <li><a href="<?=site_url('')?>"><b> Tracking Summary</b></a></li>
                        </ul>
                    </li>
                    <li class="dropdown" id="speed">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/speed.png" style="display: -webkit-box;font-size: initial;padding-left: 5px;"></i> Speed <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?=site_url('')?>"><b> Overspeed Alert Report</b></a></li>
                            <!-- <li><a href="<?=site_url('')?>"><b> Over Speed Report</b></a></li>  -->
                            <li><a href="<?=site_url('Speed/tracking_overspeed_report_details')?>"><b> Over Speed Report</b></a></li> 
                            <li><a href="<?=site_url('')?>"><b> Speed Report</b></a></li>
                        </ul>
                    </li>
                    <li class="dropdown" id="stoppage">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/stoppage.png" style="display: -webkit-box;font-size: initial;padding-left: 16px;"></i> Stoppage <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <!-- <li><a href="<?=site_url('')?>"><b> Stoppage On Map</b></a></li> -->
                            <li><a href="<?=site_url('Stoppage/tracking_stoppage_report_details')?>"><b> Stoppage Report</b></a></li>
                        </ul>
                    </li>
                    <li class="dropdown" id="geofence">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/geo_details.png" style="display: -webkit-box;font-size: initial;padding-left: 18px;"></i> Geofence <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?=site_url('Geofence/geofence_registration')?>"><b> Create Geofence</b></a></li>
                            <li><a href="<?=site_url('')?>"><b> Geofence Report - A</b></a></li>
                            <li><a href="<?=site_url('')?>"><b> Geofence Report - B</b></a></li>
                            <li><a href="<?=site_url('')?>"><b> Geofense Trip Report</b></a></li>
                            <li><a href="<?=site_url('')?>"><b> Location Trip Report</b></a></li>
                        </ul>
                    </li>
                    <li class="dropdown" id="employee">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/driver.png" style="display: -webkit-box;font-size: initial;padding-left: 9px;"></i> Driver <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?=site_url('Employee/view_employee')?>"> <b> Driver Details</b></a></li>
                            <li><a href="<?=site_url('Driver_bus_route_assgn/driver_bus_route_assign')?>"><b> Driver Bus Route Assign</b></a></li>
                        </ul>
                    </li>
                    <li class="dropdown" id="user">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/user.png" style="display: -webkit-box;font-size: initial;padding-left:4px;"></i> User <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?=site_url('User/view_user')?>"><b> User Details</b></a></li>
                            <li><a href="<?=site_url('User_stop_assign/user_stop_assignment')?>"><b> User Stop Assign</b></a></li>
                        </ul>
                    </li>
                    <li class="dropdown" id="route_de">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/route.png" style="display: -webkit-box;font-size: initial;padding-left: 4px;"></i> Route <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?=site_url('Route/route_registration')?>"> <b> Route Details</b></a></li>
                            <li><a href="<?=site_url('Driver_bus_route_assgn/driver_bus_route_assign')?>"> <b> Driver Bus Route Assign</b></a></li>
                        </ul>
                    </li>
                    <li class="dropdown" id="stop">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/stop.png" style="display: -webkit-box;font-size: initial;padding-left: 2px;"></i> Stop <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?=site_url('Stop/stop_registration')?>"><b> Stop Details</b></a></li>
                            <li><a href="<?=site_url('User_stop_assign/user_stop_assignment')?>"> <b> User Stop Assign</b></a></li>
                        </ul>
                    </li>
                    <li id="bus">
                        <a href="<?=site_url('Bus/view_school_bus')?>"><img src="<?=base_url()?>assets/img/icon/bus.png" style="display: -webkit-box;font-size: initial;"></i> &nbsp Bus </a>
                    </li>
                    <li id="report">
                        <a href="<?=site_url('Reports/tracking_report_details')?>"><img src="<?=base_url()?>assets/img/icon/report.png" style="display: -webkit-box;font-size: initial;padding-left: 11px;"></i> Reports </a>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right"> 
                    <div class="dropdown profile-element">
                        <center>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false" style="padding: 0px 0px;">
                                <span class="clear">
                                    <img alt="image" class="img-circle" src="<?php echo $photo ?>" style="height:61px;width:61px;padding: 10px;"></span> 
                                </span>
                            </a>
                            <div class="dropdown-menu fadeInLeft" style="">
                                <div class="contact-box" style="margin: 0 0 0 0;">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img alt="image" class="img-circle img-responsive"  src="<?php echo $photo ?>" style="height:81px;width:81px;">
                                        </div>
                                        <div class="col-sm-8" style="padding:0%;">
                                            <h3><strong><?php echo $first_name." ".$last_name; ?></strong></h3>
                                            <h4><?php echo $email_id; ?></h4>
                                            <h5><span>Username: </span><?php echo $username; ?></h5>
                                            <!-- <a href="<?=site_url('Institute/edit_profile')?>">My Account</a> -->
                                        </div>       
                                    </div>
                                </div>

                                <div style="background-color:#000000;">
                                    <div style="padding:3%;">
                                        <a href="<?=site_url('Institute/forgot_password')?>" style="color:#ffffff;">Change Password?</a>
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