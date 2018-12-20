<!DOCTYPE html>
<html>
  <head>
    <title>Trackmee | Map</title>
    <link rel="shortcut icon" type="image/png" href="<?=base_url()?>assets/img/logo.png"/>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=650, user-scalable=yes">
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/datepicker.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/animate.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/infowindow.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <script src="<?=base_url()?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery-ui.min.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/nouslider/jquery.nouislider.min.js"></script>
    <!-- Data picker -->
   <script src="<?=base_url()?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <!-- Custom and plugin javascript -->
<script src="https://maps.googleapis.com/maps/api/js?key=<?=$map_key?>&libraries=places"></script>


    <style>
       #map {
        height: 600px;
        width: 100%;
        position: absolute;
       }
  
        #info {
        width: auto;
        margin: 5px;
        height: 3%;
      }

      #directionsPanel{
          height: 80%;
        width: 70%;
      }

        #page-wrapper {
            min-height: 500px !important;
          }
          .float-e-margins .btn {
            margin-bottom: 0;
        }

       .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td 
        {
            padding: 2px;
        }
        .m-r-sm {
            margin-right: 0px;
            padding: 3px 6px;
        }
        .top-navigation .nav > li > a {
            padding: 11px 13px;
        }
        .form-control{
          color: #555;
        }
        .input-daterange .input-group-addon{
          color: #555;
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
    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        });
    </script>
    <script>

    // var recent_point ;
    // var marker;
    var map;
    // var markers = [];
    // var markers1 = [];
    // var device_id;
    // var places_arr = [];
    // var place_name;

  $(document).ready(function () {

      var mapOptions = {
          zoom: 10,
          center: new google.maps.LatLng(18.5204, 73.8567),
          mapTypeControl: false
      };

      map = new google.maps.Map($('#map')[0], mapOptions);

      // var infowindow;
      // infowindow = new google.maps.InfoWindow();
      // var old_range = 1000;
      // var new_range;
      // var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
    

      height = $(window).height();
      height1 = $("#collapse").height();
      height4 = $(".ibox-title").height();
      height2 = ((height - height1) - (height1*0.6)-100);
      height3 = ((height - height1) - (height1*0.6)-150 - height4);
      $("#map").height(height2);
      $("#page-wrapper").height(height);
      // $("#device_table").height(height3);    

       function getYesterdaysDate() {
            var date = new Date();
            date.setDate(date.getDate()-1);
            var getYesterdaysDate =  (date.getMonth()+1) + '/' + date.getDate() + '/' + date.getFullYear();

            $('#start').val(getYesterdaysDate);
            $('#end').val(getYesterdaysDate);
            return getYesterdaysDate;
        }

       $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            endDate: getYesterdaysDate(),
            maxDate: '0'
        });

  });

    </script>

  </head>
  <body  class="top-navigation">
    <div class="loader"></div>
<div id="wrapper">
  <div id="page-wrapper" class="gray-bg" style="min-height: 850px;background: white;padding: 0;">
        <div class="row border-bottom white-bg">
          <?php if(isset($this->session->userdata['Institute'])) { ?>
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
                                  <li><a href="<?=site_url('Tracking/summary')?>"><b> Tracking Summary</b></a></li>
                              </ul>
                          </li>
                          <li class="dropdown" id="speed">
                              <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/speed.png" style="display: -webkit-box;font-size: initial;padding-left: 5px;"></i> Speed <span class="caret"></span></a>
                              <ul role="menu" class="dropdown-menu">
                                  <li><a href="<?=site_url('')?>"><b> Overspeed Alert Report</b></a></li>
                                  <li><a href="<?=site_url('')?>"><b> Over Speed Report</b></a></li> 
                                  <li><a href="<?=site_url('')?>"><b> Speed Report</b></a></li>
                              </ul>
                          </li>
                          <li class="dropdown" id="stoppage">
                              <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/stoppage.png" style="display: -webkit-box;font-size: initial;padding-left: 16px;"></i> Stoppage <span class="caret"></span></a>
                              <ul role="menu" class="dropdown-menu">
                                  <li><a href="<?=site_url('')?>"><b> Stoppage On Map</b></a></li>
                                  <li><a href="<?=site_url('')?>"><b> Stoppage Report</b></a></li>
                              </ul>
                          </li>
                          <li class="dropdown" id="geofence">
                              <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/geo_details.png" style="display: -webkit-box;font-size: initial;padding-left: 18px;"></i> Geofence <span class="caret"></span></a>
                              <ul role="menu" class="dropdown-menu">
                                  <!-- <li><a href="<?=site_url('Geofence/geofence_registration')?>"><b> Create Geofence</b></a></li> -->
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
                                  <!-- <li><a href="<?=site_url('Driver_bus_route_assgn/driver_bus_route_assign')?>"><b> Driver Bus Route Assign</b></a></li> -->
                              </ul>
                          </li>
                          <li class="dropdown" id="user">
                              <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/user.png" style="display: -webkit-box;font-size: initial;padding-left:4px;"></i> User <span class="caret"></span></a>
                              <ul role="menu" class="dropdown-menu">
                                  <li><a href="<?=site_url('User/view_user')?>"><b> User Details</b></a></li>
                                  <!-- <li><a href="<?=site_url('User_stop_assign/user_stop_assignment')?>"><b> User Stop Assign</b></a></li> -->
                              </ul>
                          </li>
                          <li class="dropdown" id="route_de">
                              <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/route.png" style="display: -webkit-box;font-size: initial;padding-left: 4px;"></i> Route <span class="caret"></span></a>
                              <ul role="menu" class="dropdown-menu">
                                  <li><a href="<?=site_url('Route/route_registration')?>"> <b> Route Details</b></a></li>
                                  <!-- <li><a href="<?=site_url('Driver_bus_route_assgn/driver_bus_route_assign')?>"> <b> Driver Bus Route Assign</b></a></li> -->
                              </ul>
                          </li>
                          <li class="dropdown" id="stop">
                              <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/stop.png" style="display: -webkit-box;font-size: initial;padding-left: 2px;"></i> Stop <span class="caret"></span></a>
                              <ul role="menu" class="dropdown-menu">
                                  <li><a href="<?=site_url('Stop/stop_registration')?>"><b> Stop Details</b></a></li>
                                  <!-- <li><a href="<?=site_url('User_stop_assign/user_stop_assignment')?>"> <b> User Stop Assign</b></a></li> -->
                              </ul>
                          </li>
                         <!--  <li id="bus">
                              <a href="<?=site_url('Bus/view_school_bus')?>"><img src="<?=base_url()?>assets/img/icon/bus.png" style="display: -webkit-box;font-size: initial;"></i> &nbsp Bus </a>
                          </li> -->
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
                                                  <a href="<?=site_url('Institute/edit_profile')?>">My Account</a>
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
          <?php } ?>
          <?php if(isset($this->session->userdata['client'])) { ?>
              <nav class="navbar navbar-static-top" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar" style="background-color: black;"></span>
                            <span class="icon-bar" style="background-color: black;"></span>
                            <span class="icon-bar" style="background-color: black;"></span> 
                        </button>
                        <img class="img-responsive" src="<?=base_url()?>assets/img/Trackmee_logo.png"></a>
                    </div>
                    <div class="navbar-collapse collapse" id="myNavbar">
                        <ul class="nav navbar-nav"> 
                            <li id="tracking">
                               <a href="<?=site_url('Tracking/view_map_table')?>"><img src="<?=base_url()?>assets/img/icon/Live.png" style="display: -webkit-box;font-size: initial;padding-left: 14px;height: 32px;"></i> Dashboard </a>
                            </li>
                            <li id="tracking_all">
                                <a href="<?=site_url('Tracking/view_all_device')?>"><img src="<?=base_url()?>assets/img/icon/tracking.png" style="display: -webkit-box;font-size: initial;padding-left: 12px;"></i> <b>Tracking </b></a>
                            </li>
                            <li class="dropdown" id="tracking_details">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/TRACK DETAILS.png" style="display: -webkit-box;font-size: initial;padding-left: 25px;height: 32px;"></i> Track Details <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="<?=site_url('Tracking/near_by_client')?>"><b> Find Near By</b></a></li>
                                    <li><a href="<?=site_url('')?>"><b> Ignition On/Off</b></a></li>
                                    <li><a href="<?=site_url('Tracking/playback')?>"><b> Playback</b></a></li>
                                    <li><a href="<?=site_url('Tracking/summary')?>"><b> Tracking Summary</b></a></li>
                                </ul>
                            </li>
                            <li class="dropdown" id="speed">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/speed.png" style="display: -webkit-box;font-size: initial;padding-left: 5px;"></i> Speed <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="<?=site_url('')?>"><b> Overspeed Alert Report</b></a></li>
                                    <li><a href="<?=site_url('')?>"><b> Over Speed Report</b></a></li> 
                                    <!-- <li><a href="<?=site_url('Speed/tracking_overspeed_report_details')?>"><b> Over Speed Report</b></a></li>  -->
                                    <li><a href="<?=site_url('')?>"><b> Speed Report</b></a></li>
                                </ul>
                            </li>
                            <li class="dropdown" id="stoppage">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/stoppage.png" style="display: -webkit-box;font-size: initial;padding-left: 16px;"></i> Stoppage <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <!-- <li><a href="<?=site_url('')?>"><b> Stoppage Report</b></a></li> -->
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
                           <!--  <li id="report">
                                <a href="<?=site_url('Reports/tracking_report_details')?>"><img src="<?=base_url()?>assets/img/icon/report.png" style="display: -webkit-box;font-size: initial;padding-left: 11px;"></i> Reports </a>
                            </li> -->
                            <!-- <li id="gallery">
                                <a href="<?=site_url('Gallery')?>"><img src="<?=base_url()?>assets/img/icon/gallery.png" style="display: -webkit-box;font-size: initial;padding-left: 10px;"></i> Gallery </a>
                            </li> -->
                            <!-- <li id="holiday">
                                <a href="<?=site_url('Holiday/holidays')?>"><img src="<?=base_url()?>assets/img/icon/holiday.png" style="display: -webkit-box;font-size: initial;padding-left: 15px;"></i> Holiday</a>
                            </li>
                            <li class="dropdown" id="help">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/help1.png" style="display: -webkit-box;font-size: initial;padding-left: 5px;"></i> Help <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <!-- <li><a href="<?=site_url('Reports/tracking_report_details')?>"><i class="fa fa-bar-chart" style="display: inline;font-size: initial;"></i> <b> Tracking Report</b></a></li> -->
                                <!-- </ul>
                            </li> -->
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
                                                <!-- <a href="<?=site_url('School/edit_profile')?>">My Account</a>  -->
                                            </div>       
                                        </div>

                                    </div>
                                    
                                    <div style="background-color:#000000;">
                                        <div style="padding:3%;">
                                            <a href="<?=site_url('Client/forgot_password')?>" style="color:#ffffff;">Change Password?</a>
                                            <a href="<?=site_url('Authentication/logout')?>" class="btn btn-xs btn-primary pull-right" style:"color:#000000; padding-bottom:2%;">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </center>
                            </div>
                        </ul>
                    </div>
              </nav>
          <?php } ?>

          
        </div>
<style type="text/css">
p {
    margin: 5px;
}
.noUi-target {
    height: 10px;
}
.noUi-horizontal .noUi-handle {
    height: 25px;
    top: -8px;
}
.noUi-base {
    background-color: #8b0000;
}
button.dim {
    margin-bottom: 0px !important;
    border-radius: 20px;
    padding: 5px 10px;
}
</style>
  

    <div class="row" id="hearder_row" style="border-bottom: 3px solid #38b7ec;border-top: 3px solid #38b7ec;background: none repeat scroll 0 0 #404040;color:#e1e1e1;">
       <div class="col-sm-8" style="border-right: 2px solid #686868;padding-right: 0px;">
            <form  class="form-horizontal"  action="<?=site_url('Tracking/playback1')?>" method="POST" enctype="multipart/form-data"> 
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="col-sm-2 control-label">Select The Device </label>   
                    <div class="col-sm-3">
                      <select class="form-control" name="device_id">
                          <option value="" disabled selected>Select Bus</option>
                        <?php foreach ($vehicle as $key ) {?>
                          <option value="<?=$key['bus_device_id']?>"><?=$key['bus_no']?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <div id="data_5">
                          <div class="input-daterange input-group" id="datepicker">
                              <input type="text" class="input-sm form-control" name="start" id="start" />
                              <span class="input-group-addon">to</span>
                              <input type="text" class="input-sm form-control" name="end" id="end"  />
                          </div>
                      </div>
                    </div>
                    <div class="col-sm-1">
                        <button class="btn btn-primary dim" type="submit"><i class="fa fa-check"></i></button>
                    </div>
                </div>
            </form> 
      </div>
    </div>

        <div class="wrapper wrapper-content" style="padding: 0;">
            <div class="row">
              <div class="col-sm-12">
                  <div class="ibox float-e-margins" >
                      <div class="ibox-content" style="padding: 0;">
                         <div id="map">
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>

    <div class="footer">
        <div class="row">
            <div class="col-sm-4">
                <div class="pull-left">
                    <strong>Copyright </strong><a href="http://www.syntech.co.in" target="_blank"> <img src="<?=base_url()?>assets/img/syntech_logo.png" style="height:13px;"></a><strong> &copy; 2017-2018 </strong>  
                </div>
            </div>
            <div class="col-sm-4">
                <center>
                    <div>
                       <img src="<?php echo $logo; ?>" style="height:20px;width:20px;"> <strong style="color:#ffffff;"><?php echo $name; ?> </strong> 
                    </div>
                </center>
            </div>
            <div class="pull-right">
                <i class="fa fa-phone-square" aria-hidden="true"></i><strong> 020-24269021 / 7030578612</strong> | <i class="fa fa-envelope" aria-hidden="true"></i> <strong>contact@syntech.co.in </strong> 
            </div>
        </div>
    </div>
  </div>
</div>
</body>
</html>