<!DOCTYPE html>

<html>

  <head>

    <title>Trackmee | Stoppage Map</title>

    <link rel="shortcut icon" type="image/png" href="<?=base_url()?>assets/img/logo.png"/>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=650, user-scalable=yes">

     <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?=base_url();?>assets/css/datepicker.css" rel="stylesheet">

    <link href="<?=base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?=base_url()?>assets/css/animate.css" rel="stylesheet">

    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">

    <link href="<?=base_url();?>assets/css/plugins/select2/select2.min.css" rel="stylesheet">

     <!-- orris -->

    <link href="<?=base_url();?>assets/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    

    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>-->

    <script src="<?=base_url()?>assets/js/jquery-2.1.1.js"></script>

    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

    <script src="<?=base_url();?>assets/js/jquery-ui.min.js"></script>

    <script src="<?=base_url();?>assets/js/bootstrap-datepicker.js"></script>

    <script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <script src="<?=base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Morris -->

    <script src="<?=base_url()?>assets/js/plugins/morris/raphael-2.1.0.min.js"></script>

    <script src="<?=base_url()?>assets/js/plugins/morris/morris.js"></script>



    <!-- Custom and plugin javascript -->

    <script src="<?=base_url()?>assets/js/inspinia.js"></script>

    <script src="<?=base_url()?>assets/js/plugins/pace/pace.min.js"></script>



    <!-- Custom and plugin javascript -->

    <script src="https://maps.googleapis.com/maps/api/js?key=<?=$map_key?>"></script>

    <!-- <?php print_r($map_key); ?> -->



    <style  type="text/css">

      html, body {

        height: 100%;

        margin: 0;      

      }



       .open>.dropdown-menu {

          display: block;

          width: max-content;

      }



      #mapcanvas {

        height:70%;

        width: 96.5%;

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

      #graph #morris-one-line-chart>svg{

        height:150px;

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

  <body  class="top-navigation">
    <div class="loader"></div>
     <div id="wrapper">

        <div id="page-wrapper" class="gray-bg" style="min-height: 850px;">

        <div class="row border-bottom white-bg">

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

                            <?php if($institute_admin == 1){?> 

                            <li id="client">

                              <a href="<?=site_url('Client/view_client');?>"><img src="<?=base_url()?>assets/img/icon/clients.png" style="display: -webkit-box;font-size: initial;padding-left: 5px;"></i> Client</a>

                            </li>

                            <?php } ?>

                            <li id="tracking_all">

                                <a href="<?=site_url('Tracking/view_all_device')?>"><img src="<?=base_url()?>assets/img/icon/tracking.png" style="display: -webkit-box;font-size: initial;padding-left: 12px;"></i> <b>Tracking </b></a>

                            </li>

                            <li class="dropdown" id="tracking_details">

                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/track_details.png" style="display: -webkit-box;font-size: initial;padding-left: 25px;"></i> Track Details <span class="caret"></span></a>

                                <ul role="menu" class="dropdown-menu">

                                    <li><a href="<?=site_url('Tracking/near_by_client')?>"><b> Find Near By</b></a></li>

                                    <li><a href="<?=site_url('')?>"><b> Ignition On/Off</b></a></li>

                                    <li><a href="<?=site_url('')?>"><b> Playback</b></a></li>

                                    <li><a href="<?=site_url('')?>"><b> Tracking Summary</b></a></li>

                                </ul>

                            </li>

                            <li class="dropdown" id="speed">

                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/speed.png" style="display: -webkit-box;font-size: initial;padding-left: 5px;"></i> Speed <span class="caret"></span></a>

                                <ul role="menu" class="dropdown-menu">

                                    <li><a href="<?=site_url('')?>"><b> Overspeed Alert Report</b></a></li>

                                     <li><a href="<?=site_url('Speed/tracking_overspeed_report_details')?>"><b> Over Speed Report</b></a></li> 

                                    <li><a href="<?=site_url('')?>"><b> Speed Report</b></a></li>

                                </ul>

                            </li>

                            <li class="dropdown" id="stoppage">

                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/stoppage.png" style="display: -webkit-box;font-size: initial;padding-left: 16px;"></i> Stoppage <span class="caret"></span></a>

                                <ul role="menu" class="dropdown-menu">

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

        </div>

         <div class="wrapper wrapper-content">

            

                    <div class="ibox float-e-margins" style="margin-bottom: 0px;">

                        <div class="ibox-title">

                             <div class="row">

                                <div class="col-sm-10">

                                    <h3><b>Stoppage On Map</b></h3> 

                                </div>

                                <!-- <div class="col-sm-2">

                                    <h5><b>Bus</b>:<?=$bus_no?></h5>

                                    <h5><b>&nbsp &nbsp Date</b></h5>:<?=$from?> - <?=$to?>; 

                                </div> -->

                             </div>

                        </div>

                    </div>

                          <div id="mapcanvas-cover">

                              <div id="mapcanvas">

                              </div>

                          </div>

                          <div class="ibox-content" id="graph">

                                  <div id="morris-one-line-chart"></div>

                              </div>



                             

        </div>



       <div class="footer">

            <div class="pull-right">

                <i class="fa fa-phone-square" aria-hidden="true"></i><strong> 020-24269021 / 7030578612</strong> | <i class="fa fa-envelope" aria-hidden="true"></i> <strong>contact@syntech.co.in</strong> 

            </div>

            <div>

                <strong>Copyright </strong><a href="http://www.syntech.co.in" target="_blank"> <img src="<?=base_url()?>assets/img/syntech_logo.png" style="height:13px;"></a><strong> &copy; 2017-2018 </strong> 

            </div>

        </div>

        </div>

        </div>
        <script type="text/javascript">
            $(window).load(function() {
                $(".loader").fadeOut("slow");
            });
        </script>
        <script type="text/javascript">

      var directionDisplay;

      var directionsService = new google.maps.DirectionsService();

      var map;

      

      var i = 0;

      var device_id = "<?=$bus_device_id?>";



      var infowindow;   

     

      var latLonList = [

      <?php  

       for ($i=0; $i < count($lat_lon_data) ; $i++) { 

        ?>

          

        { lat: <?=number_format((float)$lat_lon_data[$i]['latitude'], 7, '.', '')?>, lon: <?=number_format((float)$lat_lon_data[$i]['longitude'], 7, '.', '')?>,direction:<?=$lat_lon_data[$i]['heading_angle']?>,datetime:"<?=$lat_lon_data[$i]['datetime']?>",vehicle_movement_status:"<?=$lat_lon_data[$i]['vehicle_movement_status_name']?>",power_status:"<?=$lat_lon_data[$i]['power_status_name']?>" ,gps_valid_data:"<?=$lat_lon_data[$i]['gps_quality_name']?>" ,address:"<?=$lat_lon_data[$i]['address']?>" ,total_satellites:<?=$lat_lon_data[$i]['total_satellites']?> ,gsm_signal_strength:<?=$lat_lon_data[$i]['gsm_signal_strength']?> },

       

      <?php  } ?>

      ]



      console.log(latLonList);





      $(document).ready(function () {

                 // $('#graph').hide();



        directionsDisplay = new google.maps.DirectionsRenderer( {

            suppressMarkers: true

        });

        var mapOptions = {

          zoom: 13,

          center: new google.maps.LatLng(latLonList[i].lat, latLonList[i].lon),

          mapTypeId: google.maps.MapTypeId.ROADMAP,

          mapTypeControl: false

        };



        // var contentString="<strong>Vehicle No : </strong>"+bus_no+ "<br><strong>Address : </strong>"+latLonList[i].address ;

        // var infowindow = new google.maps.InfoWindow({

          // content: contentString

        // }); 

        map = new google.maps.Map($('#mapcanvas')[0], mapOptions);



                var marker2 = null ;              

                var numDeltas = 100;

                var j = 0;

                var deltaLat;

                var deltaLng;

                var old_lat;

                var old_lon;

                var routes;

                var points;

                var l = 0;

                var p;

                var time = 1000;

                var height_graph;

                var height2;

                 var height5; 

                 var height_status=0; 



                 height = $(window).height();

                 height1 = $(".collapse").height();

                 height3 = $(".ibox").height();

                 height2 = (height - height1 - height3) -(height3*0.85) ;

                 $("#mapcanvas").height(height2);

                 $("#mapcanvas-cover").height(height2);

                 $("#page-wrapper").height(height);

                 // $('#device_id').append(device_id);

                 // $('#vehicle_no').append(bus_no);



                autoUpdate();



                function autoUpdate() {



                  directionsDisplay.setMap(map);

                  directionsDisplay.setPanel(document.getElementById("directionsPanel"));



                   

                        var myLatlng = new google.maps.LatLng(latLonList[i].lat, latLonList[i].lon);

                        // var direction = latLonList[i].direction;

 

                       if (i  > 1) {

                        // console.log(i);

                           // POLYLINE START

                            var flightPlanCoordinates = [

                              {lat: latLonList[i-1].lat, lng: latLonList[i-1].lon},

                              {lat: latLonList[i].lat, lng: latLonList[i].lon}

                            ];

                             var iconsetngs = {

                                path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,

                                strokeOpacity: 1,

                                scale: 1.5

                            };

                            var flightPath = new google.maps.Polyline({

                              path: flightPlanCoordinates,

                              geodesic: true,

                              strokeColor: '#FF0000',

                              strokeOpacity: 0.8,

                              strokeWeight: 2,

                              icons: [{

                                  icon: iconsetngs,

                                  // repeat:'35px',

                                  offset: '100%'}]

                            });



                            flightPath.setMap(map);

                            // POLYLINE END

                        }    

                        

                              

                                 marker2 = new google.maps.Marker(

                                {

                                    position: myLatlng,

                                    map: map,

                                    // title: bus_no

                                });

                           

                  

                        map.setCenter(myLatlng);



                        i++;



                  autoUpdate();

                 

                }

        });//end document ready

          <?php if($stoppage = 'stoppage') {?>

              $('#stoppage').addClass('active');

          <?php } ?>

        </script>



  </body>

</html>