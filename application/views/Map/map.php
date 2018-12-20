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
    
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>-->
    <script src="<?=base_url()?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery-ui.min.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

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
        /*height:70%;*/
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
      var directionDisplay;
      var directionsService = new google.maps.DirectionsService();
      var map;
      var marker2 = null ; 
      var i = 0;
      var infowindow;     
      
      var latLonList = [
        { lat: <?=$lat?>, lon:<?=$lon?>,direction:<?=$angle?>,GPS:<?=$GPS?>,movement:"<?=$movement?>",vehicle_no:"<?=$vehicle_no?>",address:"<?=$address?>"},
      ]
 // console.log(latLonList);
      $(document).ready(function () {

         $('.bus_select').on('change', function() {
             $('#submit').click();

           });


        directionsDisplay = new google.maps.DirectionsRenderer( {
            suppressMarkers: true
        });

        var mapOptions = {
          zoom: 18,
          center: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lon; ?>),
          mapTypeId: google.maps.MapTypeId.ROADMAP,
           // mapTypeControl: false
        };
        var contentString="<strong>Vehicle No : </strong>"+latLonList[i].vehicle_no+ "<br><strong>Address : </strong>"+latLonList[i].address ;
        var infowindow = new google.maps.InfoWindow({
          content: contentString
        }); 

        map = new google.maps.Map($('#mapcanvas')[0], mapOptions);
                var numDeltas = 100;
                var j = 0;
                var deltaLat;
                var deltaLng;
                var old_lat;
                var old_lon;
                var l = 0;
                var data_flag=0;
                var height;
                var height1;
                var height2;
                var height3;

                autoUpdate();

                function autoUpdate()
                {
                   height = $(window).height();
                   height1 = $("#collapse").height();
                   height4 = $(".ibox-title").height();
                   height5 = $("#count").height();
                   height6 = $("#hearder_row").height();
                   height2 = (((height - height6) - height1) - (height1*0.6)-100);
                   height3 = (((height - height6) - height1) - (height1*0.6)-150 - height4- height5);
                   $("#mapcanvas").height(height2);
                   $("#page-wrapper").height(height);
                   $("#device_table").height(height3);

                     $.post('<?=site_url('Tracking/last_record')?>',{}, function(data1)
                      {
                          $('#vehical_status').empty();
                          $('#running').empty();
                          $('#stop').empty();
                          $('#parking').empty();
                          $('#idling').empty();
                          $('#toweing').empty();
                          $('#gpsfixed').empty();
                          $('#gpsnotfixed').empty();

                          var stop = 0; 
                          var running = 0; 
                          var parking = 0; 
                          var idling = 0; 
                          var toweing = 0; 
                          var gpsnotfixed = 0; 
                          var gpsfixed = 0; 
                          for (var i = 0; i < data1.length; i++) 
                          {
                            if (data1[i][0].vehicle_movement_status == "B") 
                            { 
                              running = running+1; 
                            }else if (data1[i][0].vehicle_movement_status == "c") 
                            { 
                              parking = parking+1; 
                            }else if (data1[i][0].vehicle_movement_status == "d") 
                            { 
                              idling = idling+1; 
                            }else if (data1[i][0].vehicle_movement_status == "e") 
                            { 
                              toweing = toweing+1; 
                            }else{
                             stop = stop+1; 
                           }

                            if (data1[i][0].gps_valid_data == "1") { gpsfixed = gpsfixed+1; }else{ gpsnotfixed = gpsnotfixed+1; }
                          }
                          $('#running').append(running);
                          $('#stop').append(stop);
                          $('#parking').append(parking);
                          $('#idling').append(idling);
                          $('#toweing').append(toweing);
                          $('#gpsfixed').append(gpsfixed);
                          $('#gpsnotfixed').append(gpsnotfixed);



                          for (var i = 0; i < data1.length; i++) 
                          {
                              $('#vehical_status').append('<tr class="map_details">'+

                                    '<td style="border-right: none;"><a href="<?=site_url("Tracking/index/'+data1[i][0].device_id+'")?>">'+
                                    ( data1[i][0].vehicle_movement_status == "B" ? '<img src="<?=base_url()?>assets/img/icon-bus-green.png" alt="running" style="height:20px;float: left;">' : '<img src="<?=base_url()?>assets/img/icon-bus-red.png" alt="stop" style="height:20px;float: left;">' )+
                                    '</a></td>'+ 
                                    '<td style="border-left: none;"><a href="<?=site_url("Tracking/index/'+data1[i][0].device_id+'")?>"><label class="control-label">'+
                                    ''+data1[i]['vehicle_no']+'</lable></a></td>'+ 
                                    '<td><a href="<?=site_url("Tracking/index/'+data1[i][0].device_id+'")?>">'+data1[i][0].speed+'</a></td>'+ 
                                     
                                     ( data1[i][0].panic_status == "0" ? '<td><img src="<?=base_url()?>assets/img/green1.png" style="height:15px;"></td>' : '<td><img src="<?=base_url()?>assets/img/red_deep.png" style="height:15px;"></td>' )+
                                  '</tr>');

                          }
                      },'json');



                    $.post('<?=site_url('tracking/route_curl')?>',{}, function(data){
                      // console.log(data);

                        xml_date_time = data.xml_date_time;
                        power_status = data.power_status;
                        speed = data.speed;
                        gps_valid_data = data.gps_valid_data;
                        panic_status = data.panic_status;
                        gps_quality = data.gps_quality;
                        ignition = data.ignition;
                        // console.log(gps_quality);
                        $('#gsm_signal').empty();
                        $('#satellites').empty();
                        $('#ign').empty();
                        $('#pow').empty();
                        $('#gps').empty();
                        $('#max_run').empty();
                        $('#max_run_time').empty();
                        $('#speed_label').empty();
                        $('#gsm_signal').append(data.gsm_signal_strength);
                        $('#satellites').append(data.total_satellites);
                        $('#max_run').append(data.max_run);
                        $('#max_run_time').append(data.max_run_time);
                        $('#speed_label').append(data.speed);
                        $('#time_label').empty().append(xml_date_time);
                          if (data.ignition == "1") 
                          { 
                            $('#ign').append('<img width="64" height="24" src="<?=base_url()?>assets/img/ignition-on.png">'); 
                          }else{ 
                            $('#ign').append('<img width="64" height="24" src="<?=base_url()?>assets/img/ignition-off.png">');
                          };
                          if (data.power_status == "1") 
                          { 
                            $('#pow').append('<img width="64" height="24" src="<?=base_url()?>assets/img/power-on.png">'); 
                          }else{ 
                            $('#pow').append('<img width="64" height="24" src="<?=base_url()?>assets/img/power-off.png">');
                          };
                          if (data.gps_valid_data == "1") 
                          { 
                            $('#gps').append('<img width="64" height="24" src="<?=base_url()?>assets/img/gps-on.png">'); 
                          }else{ 
                            $('#gps').append('<img width="64" height="24" src="<?=base_url()?>assets/img/gps-off.png">');
                          };

                        // $('#xml_date_time').empty();
                        // $('#device_id').empty();
                        // $('#speed').empty();
                        // $('#gps_valid_data').empty();
                        // $('#stop').empty();
                        // $('#power').empty();
                        // $('#vehicle_no').empty();
                        // // $('#address').empty();
                        // $('#total_satellites').empty();
                        // $('#gsm_signal_strength').empty();

                        // if (data.vehicle_movement_status == "A") {
                        //    $('#stop').append("Stop");
                        // };
                        // if (data.vehicle_movement_status == "c") {
                        //    $('#stop').append("Stop");
                        // };
                        // if (data.vehicle_movement_status == "D") {
                        //    $('#stop').append("Stop");
                        // };
                        // if (data.vehicle_movement_status == "E") {
                        //    $('#stop').append("Stop");
                        // };

                        // if (data.vehicle_movement_status == "B") {
                        //    $('#stop').append("Running");
                        // };
                        //  if (data.power_status == "1") {
                        //    $('#power').append("Power");
                        // };
                        //  if (data.power_status == "2") {
                        //    $('#power').append("Power");
                        // };
                        // if (data.power_status == "0") {
                        //    $('#power').append("Internal Battery");
                        // };
                        //  if (data.power_status == "3") {
                        //    $('#power').append("Internal Battery");
                        // };

                        // $('#xml_date_time').append(data.xml_date_time);
                        // $('#device_id').append(data.device_id);
                        // $('#speed').append(data.speed);
                        // $('#gps_valid_data').append(data.gps_valid_data);
                        // $('#vehicle_no').append(data.vehicle_no);
                        // // $('#address').append(data.address);
                        // $('#total_satellites').append(data.total_satellites);
                        // $('#gsm_signal_strength').append(data.gsm_signal_strength);
                     // alert(data.lat+":"+data.lon);
                      if(data.lat!="")
                      {
                        latLonList.push({lat:data.lat,lon:data.lon,direction:data.angle,GPS:data.GPS,movement:data.movement,vehicle_no:data.vehicle_no});
                        data_flag=1;
                      }
                      else{
                        data_flag=0;
                      }
                      // console.log(latLonList);
                    },'json');

                  if(data_flag==1)
                  {
                  j=0;
                  directionsDisplay.setMap(map);
                  directionsDisplay.setPanel(document.getElementById("directionsPanel"));
                    
                    var trafficLayer = new google.maps.TrafficLayer();
                    trafficLayer.setMap(map);

                        var myLatlng = new google.maps.LatLng(latLonList[i].lat, latLonList[i].lon);

                        var direction = latLonList[i].direction;
					             	map.setCenter(myLatlng);
                        if (marker2)
                        {
                          // alert("first");
                          if ((latLonList[i].GPS == "1" && latLonList[i].movement == "B")) 
                          {
                            marker2.setIcon(
                            {
                              path: 'M55 84c1,-1 1,0 2,0 1,0 1,0 2,0l10 0c0,0 0,0 1,0 1,0 2,-1 2,0 2,2 -3,1 -5,1 -1,0 -1,0 -1,0 -1,0 -1,1 -2,1l-2 0c0,0 -1,0 -1,0 -2,0 -4,-1 -5,-1 -2,0 -1,-1 -1,-1zm9 -79l0 0c2,0 4,0 6,0 2,1 4,1 5,2 1,2 1,2 1,4 0,0 0,0 -1,0 0,-1 0,-1 0,-2 -1,-1 -3,-2 -4,-2 -2,0 -4,-1 -5,-1 -2,0 -2,0 -2,0 1,0 5,0 6,1 0,0 0,0 0,1 1,1 3,5 5,3 0,0 0,0 0,0 1,0 1,0 1,1 0,1 0,2 0,3 0,1 0,1 1,1 0,2 -1,3 -1,4 1,0 2,1 2,1 0,0 1,0 1,0 0,1 0,1 -1,1 0,0 -1,0 -1,0 -1,0 0,0 -1,-1 0,1 0,1 0,1 0,1 0,1 0,2 0,0 0,0 0,1l0 37c3,0 5,0 7,0 1,0 2,0 3,0 0,0 1,0 1,0 1,0 1,1 2,1 0,-4 -1,-8 -3,-11l-1 -1c0,-1 -1,-1 -1,-1 0,-1 0,-1 1,-1 0,-1 0,-1 0,-1 1,0 1,0 2,1 0,0 0,0 0,1 1,0 1,0 1,0l1 2c1,3 2,6 2,11 1,0 1,0 1,0 0,0 1,0 1,0l5 0c0,-3 -1,-5 -1,-7 -1,-3 -1,-5 -2,-7 -1,-2 -2,-4 -4,-6 0,-1 -1,-2 -1,-2 0,-1 1,-1 1,-2 1,0 2,2 2,2 2,2 4,5 5,8 0,1 0,2 1,3 1,3 2,7 2,11 0,0 1,0 1,0 1,0 2,0 2,0 1,0 2,0 2,0l2 0c0,-4 -1,-7 -1,-10 -1,-2 -1,-3 -2,-4 0,-2 -1,-4 -2,-4l-1 -3c-1,-1 -1,-2 -2,-3 -1,-2 -4,-6 -7,-7 0,-1 1,-1 1,-1 0,-1 1,-1 1,-2 1,1 2,2 3,3l2 3c2,2 4,5 6,8 0,1 0,2 1,2l1 2c2,6 3,10 3,16 0,0 1,0 2,0 0,0 1,0 1,0 2,0 3,0 4,0 0,-9 -3,-17 -6,-23 0,-1 -1,-2 -1,-3 -2,-2 -3,-4 -5,-7 0,0 0,0 0,-1 -1,-1 -2,-2 -3,-2l-1 -2c-1,-1 -2,-1 -3,-2 0,0 1,-2 1,-2 1,0 4,3 5,3l5 7c0,0 1,1 1,1 1,2 2,3 3,5 1,2 2,4 3,7 2,5 4,11 4,17l0 2c0,7 -2,13 -4,19 -1,3 -2,5 -4,8 -1,2 -3,4 -4,7 -1,1 -2,2 -3,3 0,0 0,0 0,0 -1,0 -1,0 -1,0 -1,-1 -1,-1 -1,-1 0,-1 1,-2 1,-2 2,-2 3,-4 4,-6l3 -5c0,-1 1,-1 1,-1 0,-1 0,-1 0,-1 1,-1 1,-2 1,-3 1,0 1,-1 1,-2 0,-1 1,-1 1,-2 1,-4 2,-9 2,-14 -2,0 -5,0 -7,0 0,4 -1,7 -1,9 -1,3 -3,8 -4,11l-1 1c-1,2 -2,4 -4,6l-2 3 -1 -1c0,0 -1,-1 -1,-1 0,0 0,0 0,0 2,-2 3,-4 4,-6 4,-6 7,-14 7,-22 -1,0 -1,0 -2,0l-5 0c0,0 0,0 0,0 0,6 -1,10 -3,14 0,1 -1,1 -1,1 0,1 -3,7 -4,7 0,0 0,0 0,0l-2 -1c0,-1 1,-2 1,-2 1,-1 2,-2 2,-3 2,-5 4,-10 4,-16 -1,0 -1,0 -2,0 0,0 -1,0 -1,0 -2,0 -2,0 -4,0 0,3 0,6 -1,8 -1,1 -1,2 -2,3 0,1 -1,2 -1,3 -1,0 -2,-2 -2,-2 0,0 1,-2 1,-2 2,-3 3,-6 3,-10 -4,0 -7,0 -11,0 -1,0 -1,0 -2,0l0 23c-1,0 -1,0 -2,0 0,0 0,0 0,1 0,2 0,2 -1,2 -3,1 -3,0 -7,1 0,0 0,0 -1,0 0,0 0,0 -1,0 0,0 0,0 0,0 3,0 6,0 9,0 0,0 1,0 1,-1l0 -3c1,0 3,0 3,1 -1,3 -2,3 -5,3 -1,1 -1,0 -2,1 -2,0 -4,0 -6,0 0,0 0,0 0,1 0,0 0,1 0,1 0,2 0,4 0,6 0,1 0,1 0,1 2,0 5,0 7,-1 2,0 3,-1 5,-2 1,1 1,1 1,2 0,1 0,1 -1,1 -4,2 -8,3 -12,3 0,2 0,3 0,4 0,3 -1,3 1,3 0,0 0,0 1,0 0,0 0,0 1,0 5,0 12,-2 17,-5 0,0 0,0 1,0 0,0 1,2 1,2 0,0 -4,2 -5,3l-2 1c-1,0 -2,0 -3,0 -3,2 -6,2 -9,2 -1,0 -1,0 -2,0 0,0 0,0 -1,0 0,0 0,0 0,0 0,1 -1,2 -1,3 0,1 0,1 0,2 0,0 0,1 0,1 9,0 16,-1 23,-4 0,0 1,-1 1,-1l4 -2c0,0 1,2 2,2l-3 2c-4,1 -7,3 -10,4 -10,3 -22,3 -32,0 -2,-1 -5,-2 -7,-3 -1,0 -2,-1 -3,-1l-3 -2c0,0 0,-1 0,-1 1,0 1,-1 1,-1 0,0 1,0 1,1 2,0 3,1 5,2 2,1 4,1 6,2 4,1 7,2 11,2l4 0c0,-2 0,-4 0,-6 -2,0 -4,0 -6,-1 -3,0 -5,-1 -8,-2 -1,0 -2,0 -2,-1 -1,0 -1,0 -2,0l-2 -1c0,0 -1,-1 -1,-1 0,0 1,-2 1,-2 2,0 3,1 5,2 3,1 6,2 9,3 2,0 4,0 6,0 0,0 0,-1 0,-2 0,0 0,-1 0,-1 0,-1 0,-1 0,-1l0 -2c0,-1 1,-1 1,-1 -4,0 -7,-1 -10,-2 -1,0 -3,-1 -4,-2 0,0 1,-1 1,-2 0,0 1,0 1,1 4,1 7,2 12,2 0,-1 0,-3 0,-5 0,0 0,0 0,-1l0 -3c-3,0 -6,0 -9,-1 -3,0 -4,0 -4,-3 -1,-1 -1,-1 0,-1 1,0 2,0 2,0 0,1 0,2 0,3 1,1 2,1 3,1l2 0c1,0 1,0 2,0 0,0 0,0 1,0 1,0 2,0 3,0 0,0 0,0 0,0 -1,0 -2,0 -3,0 -1,0 -2,-1 -3,-1 -1,0 -4,0 -5,0 0,-1 1,-2 1,-3l-3 0 0 -23c-1,0 -1,0 -2,0 0,0 -1,0 -1,0 -1,0 -3,0 -4,0 0,0 -2,0 -3,0 0,0 -1,0 -1,0 -1,0 -1,0 -2,0 0,1 0,1 0,1 0,2 0,3 0,4 1,1 1,2 1,3 0,0 0,1 0,1 1,1 2,3 2,4 0,0 -1,1 -2,1 0,0 -4,-5 -4,-12l0 -2 -6 0c0,0 0,0 0,1 0,5 0,8 2,12 1,3 2,5 3,7 0,1 0,1 0,1 0,1 -1,1 -2,2 0,-1 0,-1 -1,-1 -1,-3 -2,-6 -3,-8 -1,-4 -2,-8 -2,-13 0,0 0,-1 0,-1 -2,0 -5,0 -7,0 0,1 0,1 0,2 0,1 0,1 0,1 0,2 0,4 0,5 1,3 1,5 2,8 1,0 1,1 1,1 1,4 3,7 5,9 0,1 1,1 1,2 0,0 -1,0 -1,1 0,0 -1,0 -1,0 0,0 -1,0 -1,0 -2,-3 -4,-6 -5,-10 0,0 0,0 0,0 -1,-1 -1,-2 -1,-2 -1,-3 -2,-5 -2,-8 -1,-1 -1,-3 -1,-4l0 -3c0,0 0,-1 0,-2l-7 0c0,5 0,8 1,13 1,1 1,3 1,4 1,1 1,2 1,2 0,1 1,1 1,2 0,1 1,3 2,4 0,1 1,2 1,3 1,1 1,2 1,2l4 5c-1,0 -2,1 -3,2 0,-1 0,-2 -1,-2 -4,-7 -7,-13 -9,-22 -2,-4 -2,-8 -2,-12 0,-5 1,-10 3,-15 0,-2 1,-4 2,-6 0,-1 1,-1 1,-2 0,-1 0,-1 1,-1 0,0 0,-1 0,-1l1 -2c1,-2 2,-3 3,-4 0,-1 1,-1 1,-1 1,-2 2,-3 4,-5 0,-1 1,-2 2,-2 1,-1 2,-2 3,-3 0,0 2,-1 2,-1 1,0 1,0 1,0 0,1 1,1 1,2 -1,1 -2,1 -3,2 0,0 -1,0 -1,0l-4 4 -3 4c-1,2 -3,5 -4,6l-2 4c-2,4 -3,8 -4,13 0,1 -1,2 -1,3 0,0 0,1 0,2 0,0 0,1 0,1 1,0 1,0 2,0 1,0 1,0 2,0l2 0c1,0 1,0 1,0 0,0 0,-1 0,-1 0,-1 1,-3 1,-4 0,-3 1,-5 2,-8 1,-2 2,-4 3,-6 2,-3 4,-5 6,-7l0 -1c1,-1 3,-3 4,-3 0,-1 2,-2 3,-2 0,0 1,1 1,2 -1,0 -2,1 -2,1 -2,1 -3,3 -5,5 -1,2 -3,4 -4,6 -1,1 -1,2 -2,2 -1,2 -1,4 -2,7 -1,1 -1,3 -1,4 -1,1 -1,2 -1,3 0,1 0,2 0,2 1,0 1,1 2,1 0,0 1,0 2,0 0,0 1,0 1,0 1,0 2,0 2,0 0,-1 0,-1 0,-1 1,-3 1,-5 2,-7 1,-4 3,-8 5,-11 1,-1 3,-4 5,-5 0,1 1,2 1,3 0,0 0,0 -1,0 -1,1 -3,3 -4,5 -2,4 -4,8 -4,12 -1,1 -1,2 -1,2l0 2c2,0 4,0 6,0 1,-1 1,-1 1,-1 0,-1 0,-3 0,-4 1,0 1,-1 1,-2 1,-2 2,-3 3,-5 0,0 2,-2 3,-3 0,1 1,2 1,3 0,0 -1,0 -1,1 0,0 0,0 -1,0l-1 2c-1,2 -2,4 -2,5 0,1 -1,3 -1,4 2,0 5,0 7,0 2,0 4,0 6,0l0 -41 -2 0c0,0 -1,0 -1,-1 1,0 2,-1 3,-1l0 -8c0,-1 1,-1 1,-1 0,0 1,1 1,1 2,0 2,-1 3,-2 0,-1 1,-2 1,-3 1,0 2,0 3,-1 1,0 2,0 3,0 0,0 0,0 0,0 -1,0 -1,0 -2,0 -1,0 -2,0 -3,1 -2,0 -3,0 -4,1 -1,0 -1,0 -2,1 0,1 0,1 0,2 0,0 0,0 -1,0 0,0 0,0 0,0 0,-1 1,-3 1,-4 1,-1 3,-2 5,-2 2,0 4,0 7,0zm11 77c-1,0 -2,0 -2,-1l0 -43c0,-1 2,-1 2,0 1,0 1,3 1,4 0,1 0,4 0,5 0,3 0,34 -1,34 0,1 0,1 0,1zm-21 -18l0 7c0,1 0,1 0,2 0,1 0,2 0,3 0,1 1,6 -1,6 -1,0 -1,-1 -1,-2l0 -40c0,-1 0,-2 0,-2 0,-1 0,-1 1,-1 2,0 1,4 1,6 0,2 0,5 0,7 0,2 0,5 0,7 0,2 0,5 0,7zm19 -28c0,-3 0,-5 0,-7l0 5c0,0 0,1 0,1 0,1 0,0 0,1zm3 -2l0 0c0,0 -1,-1 0,-1 0,0 0,1 0,1zm-25 0c0,-1 0,-1 0,-1 1,0 1,0 1,1 0,0 0,0 -1,0l0 0zm0 -11l1 -1 0 0c1,1 1,8 1,10 1,1 1,3 0,3 -1,0 -1,-2 -1,-3 0,0 0,-1 0,-1 0,-1 0,-1 0,-2l-1 -6zm25 1c0,2 0,2 0,4l0 2c0,1 -1,5 -2,5 -1,0 0,-4 0,-5 0,-3 0,-2 0,-6 0,0 1,-1 1,-1 0,-1 0,-1 0,-1 0,0 0,-1 0,-1 0,0 0,0 1,0 0,1 0,1 0,1 0,1 0,1 0,2zm-24 -3l0 0c0,0 0,0 0,0zm-1 -1l1 0 0 0 -1 0 0 0zm12 -5l6 0c6,1 6,2 5,8 0,2 -1,4 -1,6l0 0c0,-1 0,-2 0,-3l-9 -1c-1,0 -2,1 -3,1 0,0 -1,0 -2,0l-4 0c0,0 0,0 -1,0l0 1c0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,-1 -1,-7 -1,-8 0,0 0,-1 0,-2 1,-1 1,-1 2,-1 3,-1 5,-1 8,-1zm-5 -8l1 0c1,-1 3,0 5,0 1,0 1,-1 3,0 1,0 2,0 2,0 0,0 -3,0 -4,0 0,0 -2,0 -2,0 -2,0 -3,0 -4,0 0,0 0,0 -1,0z',
                              scale: 0.5,
                              fillColor: 'green',
                              fillOpacity: 1,
                              anchor: new google.maps.Point(25, 50)
                            })   
                          }
                          else if ((latLonList[i].GPS == "1")) 
                          {
                            marker2.setIcon(
                            {
                              path: 'M55 84c1,-1 1,0 2,0 1,0 1,0 2,0l10 0c0,0 0,0 1,0 1,0 2,-1 2,0 2,2 -3,1 -5,1 -1,0 -1,0 -1,0 -1,0 -1,1 -2,1l-2 0c0,0 -1,0 -1,0 -2,0 -4,-1 -5,-1 -2,0 -1,-1 -1,-1zm9 -79l0 0c2,0 4,0 6,0 2,1 4,1 5,2 1,2 1,2 1,4 0,0 0,0 -1,0 0,-1 0,-1 0,-2 -1,-1 -3,-2 -4,-2 -2,0 -4,-1 -5,-1 -2,0 -2,0 -2,0 1,0 5,0 6,1 0,0 0,0 0,1 1,1 3,5 5,3 0,0 0,0 0,0 1,0 1,0 1,1 0,1 0,2 0,3 0,1 0,1 1,1 0,2 -1,3 -1,4 1,0 2,1 2,1 0,0 1,0 1,0 0,1 0,1 -1,1 0,0 -1,0 -1,0 -1,0 0,0 -1,-1 0,1 0,1 0,1 0,1 0,1 0,2 0,0 0,0 0,1l0 37c3,0 5,0 7,0 1,0 2,0 3,0 0,0 1,0 1,0 1,0 1,1 2,1 0,-4 -1,-8 -3,-11l-1 -1c0,-1 -1,-1 -1,-1 0,-1 0,-1 1,-1 0,-1 0,-1 0,-1 1,0 1,0 2,1 0,0 0,0 0,1 1,0 1,0 1,0l1 2c1,3 2,6 2,11 1,0 1,0 1,0 0,0 1,0 1,0l5 0c0,-3 -1,-5 -1,-7 -1,-3 -1,-5 -2,-7 -1,-2 -2,-4 -4,-6 0,-1 -1,-2 -1,-2 0,-1 1,-1 1,-2 1,0 2,2 2,2 2,2 4,5 5,8 0,1 0,2 1,3 1,3 2,7 2,11 0,0 1,0 1,0 1,0 2,0 2,0 1,0 2,0 2,0l2 0c0,-4 -1,-7 -1,-10 -1,-2 -1,-3 -2,-4 0,-2 -1,-4 -2,-4l-1 -3c-1,-1 -1,-2 -2,-3 -1,-2 -4,-6 -7,-7 0,-1 1,-1 1,-1 0,-1 1,-1 1,-2 1,1 2,2 3,3l2 3c2,2 4,5 6,8 0,1 0,2 1,2l1 2c2,6 3,10 3,16 0,0 1,0 2,0 0,0 1,0 1,0 2,0 3,0 4,0 0,-9 -3,-17 -6,-23 0,-1 -1,-2 -1,-3 -2,-2 -3,-4 -5,-7 0,0 0,0 0,-1 -1,-1 -2,-2 -3,-2l-1 -2c-1,-1 -2,-1 -3,-2 0,0 1,-2 1,-2 1,0 4,3 5,3l5 7c0,0 1,1 1,1 1,2 2,3 3,5 1,2 2,4 3,7 2,5 4,11 4,17l0 2c0,7 -2,13 -4,19 -1,3 -2,5 -4,8 -1,2 -3,4 -4,7 -1,1 -2,2 -3,3 0,0 0,0 0,0 -1,0 -1,0 -1,0 -1,-1 -1,-1 -1,-1 0,-1 1,-2 1,-2 2,-2 3,-4 4,-6l3 -5c0,-1 1,-1 1,-1 0,-1 0,-1 0,-1 1,-1 1,-2 1,-3 1,0 1,-1 1,-2 0,-1 1,-1 1,-2 1,-4 2,-9 2,-14 -2,0 -5,0 -7,0 0,4 -1,7 -1,9 -1,3 -3,8 -4,11l-1 1c-1,2 -2,4 -4,6l-2 3 -1 -1c0,0 -1,-1 -1,-1 0,0 0,0 0,0 2,-2 3,-4 4,-6 4,-6 7,-14 7,-22 -1,0 -1,0 -2,0l-5 0c0,0 0,0 0,0 0,6 -1,10 -3,14 0,1 -1,1 -1,1 0,1 -3,7 -4,7 0,0 0,0 0,0l-2 -1c0,-1 1,-2 1,-2 1,-1 2,-2 2,-3 2,-5 4,-10 4,-16 -1,0 -1,0 -2,0 0,0 -1,0 -1,0 -2,0 -2,0 -4,0 0,3 0,6 -1,8 -1,1 -1,2 -2,3 0,1 -1,2 -1,3 -1,0 -2,-2 -2,-2 0,0 1,-2 1,-2 2,-3 3,-6 3,-10 -4,0 -7,0 -11,0 -1,0 -1,0 -2,0l0 23c-1,0 -1,0 -2,0 0,0 0,0 0,1 0,2 0,2 -1,2 -3,1 -3,0 -7,1 0,0 0,0 -1,0 0,0 0,0 -1,0 0,0 0,0 0,0 3,0 6,0 9,0 0,0 1,0 1,-1l0 -3c1,0 3,0 3,1 -1,3 -2,3 -5,3 -1,1 -1,0 -2,1 -2,0 -4,0 -6,0 0,0 0,0 0,1 0,0 0,1 0,1 0,2 0,4 0,6 0,1 0,1 0,1 2,0 5,0 7,-1 2,0 3,-1 5,-2 1,1 1,1 1,2 0,1 0,1 -1,1 -4,2 -8,3 -12,3 0,2 0,3 0,4 0,3 -1,3 1,3 0,0 0,0 1,0 0,0 0,0 1,0 5,0 12,-2 17,-5 0,0 0,0 1,0 0,0 1,2 1,2 0,0 -4,2 -5,3l-2 1c-1,0 -2,0 -3,0 -3,2 -6,2 -9,2 -1,0 -1,0 -2,0 0,0 0,0 -1,0 0,0 0,0 0,0 0,1 -1,2 -1,3 0,1 0,1 0,2 0,0 0,1 0,1 9,0 16,-1 23,-4 0,0 1,-1 1,-1l4 -2c0,0 1,2 2,2l-3 2c-4,1 -7,3 -10,4 -10,3 -22,3 -32,0 -2,-1 -5,-2 -7,-3 -1,0 -2,-1 -3,-1l-3 -2c0,0 0,-1 0,-1 1,0 1,-1 1,-1 0,0 1,0 1,1 2,0 3,1 5,2 2,1 4,1 6,2 4,1 7,2 11,2l4 0c0,-2 0,-4 0,-6 -2,0 -4,0 -6,-1 -3,0 -5,-1 -8,-2 -1,0 -2,0 -2,-1 -1,0 -1,0 -2,0l-2 -1c0,0 -1,-1 -1,-1 0,0 1,-2 1,-2 2,0 3,1 5,2 3,1 6,2 9,3 2,0 4,0 6,0 0,0 0,-1 0,-2 0,0 0,-1 0,-1 0,-1 0,-1 0,-1l0 -2c0,-1 1,-1 1,-1 -4,0 -7,-1 -10,-2 -1,0 -3,-1 -4,-2 0,0 1,-1 1,-2 0,0 1,0 1,1 4,1 7,2 12,2 0,-1 0,-3 0,-5 0,0 0,0 0,-1l0 -3c-3,0 -6,0 -9,-1 -3,0 -4,0 -4,-3 -1,-1 -1,-1 0,-1 1,0 2,0 2,0 0,1 0,2 0,3 1,1 2,1 3,1l2 0c1,0 1,0 2,0 0,0 0,0 1,0 1,0 2,0 3,0 0,0 0,0 0,0 -1,0 -2,0 -3,0 -1,0 -2,-1 -3,-1 -1,0 -4,0 -5,0 0,-1 1,-2 1,-3l-3 0 0 -23c-1,0 -1,0 -2,0 0,0 -1,0 -1,0 -1,0 -3,0 -4,0 0,0 -2,0 -3,0 0,0 -1,0 -1,0 -1,0 -1,0 -2,0 0,1 0,1 0,1 0,2 0,3 0,4 1,1 1,2 1,3 0,0 0,1 0,1 1,1 2,3 2,4 0,0 -1,1 -2,1 0,0 -4,-5 -4,-12l0 -2 -6 0c0,0 0,0 0,1 0,5 0,8 2,12 1,3 2,5 3,7 0,1 0,1 0,1 0,1 -1,1 -2,2 0,-1 0,-1 -1,-1 -1,-3 -2,-6 -3,-8 -1,-4 -2,-8 -2,-13 0,0 0,-1 0,-1 -2,0 -5,0 -7,0 0,1 0,1 0,2 0,1 0,1 0,1 0,2 0,4 0,5 1,3 1,5 2,8 1,0 1,1 1,1 1,4 3,7 5,9 0,1 1,1 1,2 0,0 -1,0 -1,1 0,0 -1,0 -1,0 0,0 -1,0 -1,0 -2,-3 -4,-6 -5,-10 0,0 0,0 0,0 -1,-1 -1,-2 -1,-2 -1,-3 -2,-5 -2,-8 -1,-1 -1,-3 -1,-4l0 -3c0,0 0,-1 0,-2l-7 0c0,5 0,8 1,13 1,1 1,3 1,4 1,1 1,2 1,2 0,1 1,1 1,2 0,1 1,3 2,4 0,1 1,2 1,3 1,1 1,2 1,2l4 5c-1,0 -2,1 -3,2 0,-1 0,-2 -1,-2 -4,-7 -7,-13 -9,-22 -2,-4 -2,-8 -2,-12 0,-5 1,-10 3,-15 0,-2 1,-4 2,-6 0,-1 1,-1 1,-2 0,-1 0,-1 1,-1 0,0 0,-1 0,-1l1 -2c1,-2 2,-3 3,-4 0,-1 1,-1 1,-1 1,-2 2,-3 4,-5 0,-1 1,-2 2,-2 1,-1 2,-2 3,-3 0,0 2,-1 2,-1 1,0 1,0 1,0 0,1 1,1 1,2 -1,1 -2,1 -3,2 0,0 -1,0 -1,0l-4 4 -3 4c-1,2 -3,5 -4,6l-2 4c-2,4 -3,8 -4,13 0,1 -1,2 -1,3 0,0 0,1 0,2 0,0 0,1 0,1 1,0 1,0 2,0 1,0 1,0 2,0l2 0c1,0 1,0 1,0 0,0 0,-1 0,-1 0,-1 1,-3 1,-4 0,-3 1,-5 2,-8 1,-2 2,-4 3,-6 2,-3 4,-5 6,-7l0 -1c1,-1 3,-3 4,-3 0,-1 2,-2 3,-2 0,0 1,1 1,2 -1,0 -2,1 -2,1 -2,1 -3,3 -5,5 -1,2 -3,4 -4,6 -1,1 -1,2 -2,2 -1,2 -1,4 -2,7 -1,1 -1,3 -1,4 -1,1 -1,2 -1,3 0,1 0,2 0,2 1,0 1,1 2,1 0,0 1,0 2,0 0,0 1,0 1,0 1,0 2,0 2,0 0,-1 0,-1 0,-1 1,-3 1,-5 2,-7 1,-4 3,-8 5,-11 1,-1 3,-4 5,-5 0,1 1,2 1,3 0,0 0,0 -1,0 -1,1 -3,3 -4,5 -2,4 -4,8 -4,12 -1,1 -1,2 -1,2l0 2c2,0 4,0 6,0 1,-1 1,-1 1,-1 0,-1 0,-3 0,-4 1,0 1,-1 1,-2 1,-2 2,-3 3,-5 0,0 2,-2 3,-3 0,1 1,2 1,3 0,0 -1,0 -1,1 0,0 0,0 -1,0l-1 2c-1,2 -2,4 -2,5 0,1 -1,3 -1,4 2,0 5,0 7,0 2,0 4,0 6,0l0 -41 -2 0c0,0 -1,0 -1,-1 1,0 2,-1 3,-1l0 -8c0,-1 1,-1 1,-1 0,0 1,1 1,1 2,0 2,-1 3,-2 0,-1 1,-2 1,-3 1,0 2,0 3,-1 1,0 2,0 3,0 0,0 0,0 0,0 -1,0 -1,0 -2,0 -1,0 -2,0 -3,1 -2,0 -3,0 -4,1 -1,0 -1,0 -2,1 0,1 0,1 0,2 0,0 0,0 -1,0 0,0 0,0 0,0 0,-1 1,-3 1,-4 1,-1 3,-2 5,-2 2,0 4,0 7,0zm11 77c-1,0 -2,0 -2,-1l0 -43c0,-1 2,-1 2,0 1,0 1,3 1,4 0,1 0,4 0,5 0,3 0,34 -1,34 0,1 0,1 0,1zm-21 -18l0 7c0,1 0,1 0,2 0,1 0,2 0,3 0,1 1,6 -1,6 -1,0 -1,-1 -1,-2l0 -40c0,-1 0,-2 0,-2 0,-1 0,-1 1,-1 2,0 1,4 1,6 0,2 0,5 0,7 0,2 0,5 0,7 0,2 0,5 0,7zm19 -28c0,-3 0,-5 0,-7l0 5c0,0 0,1 0,1 0,1 0,0 0,1zm3 -2l0 0c0,0 -1,-1 0,-1 0,0 0,1 0,1zm-25 0c0,-1 0,-1 0,-1 1,0 1,0 1,1 0,0 0,0 -1,0l0 0zm0 -11l1 -1 0 0c1,1 1,8 1,10 1,1 1,3 0,3 -1,0 -1,-2 -1,-3 0,0 0,-1 0,-1 0,-1 0,-1 0,-2l-1 -6zm25 1c0,2 0,2 0,4l0 2c0,1 -1,5 -2,5 -1,0 0,-4 0,-5 0,-3 0,-2 0,-6 0,0 1,-1 1,-1 0,-1 0,-1 0,-1 0,0 0,-1 0,-1 0,0 0,0 1,0 0,1 0,1 0,1 0,1 0,1 0,2zm-24 -3l0 0c0,0 0,0 0,0zm-1 -1l1 0 0 0 -1 0 0 0zm12 -5l6 0c6,1 6,2 5,8 0,2 -1,4 -1,6l0 0c0,-1 0,-2 0,-3l-9 -1c-1,0 -2,1 -3,1 0,0 -1,0 -2,0l-4 0c0,0 0,0 -1,0l0 1c0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,-1 -1,-7 -1,-8 0,0 0,-1 0,-2 1,-1 1,-1 2,-1 3,-1 5,-1 8,-1zm-5 -8l1 0c1,-1 3,0 5,0 1,0 1,-1 3,0 1,0 2,0 2,0 0,0 -3,0 -4,0 0,0 -2,0 -2,0 -2,0 -3,0 -4,0 0,0 0,0 -1,0z',
                              scale: 0.5,
                              fillColor: 'red',
                              fillOpacity: 1,
                               anchor: new google.maps.Point(25, 50)
                             })   
                          }
                          else if ((latLonList[i].GPS == "3" && latLonList[i].movement == "B")) 
                          {
                            marker2.setIcon(
                            {
                              path: 'M201 445c5,-1 6,0 12,0 4,1 6,1 10,1l55 0c2,0 3,-1 5,-1 7,0 10,-1 15,0 5,12 -19,10 -30,10 -3,0 -4,1 -7,1 -3,0 -5,0 -7,0l-14 0c-2,0 -5,0 -7,0 -7,0 -21,-1 -27,-3 -7,-2 -6,-3 -5,-8zm48 -431l1 0c11,0 25,1 36,3 10,1 22,2 27,12 3,6 5,11 5,20 -3,-1 -3,-3 -5,-3 0,-3 -2,-6 -3,-8 -5,-8 -13,-10 -22,-12 -10,-1 -18,-5 -28,-4 -10,0 -8,-2 -10,0 8,0 27,1 34,5 1,1 1,1 1,3 2,7 15,28 25,20 1,0 2,-2 2,-3 3,0 5,2 6,5 1,5 1,14 1,20 0,2 1,2 1,5 0,8 -1,15 -1,23 3,0 6,0 8,1 2,1 6,2 6,4 0,6 0,6 -6,5 -2,-1 -2,-1 -4,-1 -5,-2 -3,-2 -6,-4 0,2 2,1 2,5 0,2 0,5 0,7 0,3 0,4 0,7l0 205 0 1 0 127c-5,0 -9,0 -14,0 0,2 0,2 0,4 0,12 1,13 -2,13 -20,4 -18,3 -38,4 -3,0 -4,1 -7,0 -1,0 -4,0 -6,0 1,1 1,1 1,3 16,0 31,0 47,-3 2,0 6,0 6,-2l-1 -17c7,0 17,-2 16,4 -2,16 -11,19 -26,20 -3,0 -7,0 -10,0l-33 1 -2 0c-16,0 -33,1 -49,-1 -13,-2 -23,-3 -23,-19 -1,-5 -3,-5 4,-5 4,0 6,0 11,0 0,6 -1,12 -1,18 3,1 9,2 13,2l14 1c3,0 6,0 8,0 2,0 4,1 7,1 5,0 10,0 15,0 0,-1 0,-2 1,-3 -5,0 -10,0 -16,0 -4,0 -9,-1 -14,-1 -6,0 -23,-2 -27,-3 0,-6 1,-11 1,-18l-14 1 0 -122 0 -2 0 -225 -13 2c0,-1 -1,-4 -1,-6 6,-3 7,-4 14,-4l1 -47c0,-3 2,-4 4,-6 2,1 4,5 7,5 8,0 11,-5 15,-10 2,-3 7,-10 7,-15 6,-2 8,-3 16,-4 5,0 11,-1 18,-1 -2,-2 -2,-1 -5,-1 -2,1 -4,0 -6,1 -8,0 -13,1 -21,3 -6,2 -12,1 -19,5 -5,3 -6,4 -9,9 -4,7 0,5 -4,8 -1,1 -1,1 -2,1 0,1 -1,1 -1,1 0,-7 2,-15 5,-20 6,-10 17,-11 27,-12 12,-2 24,-3 36,-3zm60 423c-4,0 -7,-1 -7,-7l0 -232c0,-9 9,-10 12,-5 2,6 0,19 1,23 1,7 -1,22 -1,31 0,13 1,182 0,186 -1,2 -2,4 -5,4zm-112 -97l0 37c0,3 0,5 0,8 0,6 0,12 0,17 0,6 5,34 -5,34 -6,0 -7,-5 -7,-13l0 -218c0,-3 0,-8 1,-10 0,-3 2,-5 5,-5 10,0 6,23 6,32 0,13 0,26 0,39 0,13 0,25 0,39 0,13 0,26 0,40zm104 -157c0,-13 0,-25 0,-37l1 29c0,1 1,5 0,6 0,2 1,1 -1,2zm16 -7l-3 0c0,-4 0,-6 2,-7 2,1 2,6 1,7zm-136 -4c0,-1 1,-1 1,-3 3,0 3,1 3,6 0,2 -2,2 -4,2l0 -5zm2 -59l0 -7 5 0c3,7 5,44 5,54 1,6 3,18 -2,18 -6,0 -5,-9 -6,-13 0,-2 0,-6 0,-8 -1,-3 -1,-6 -1,-9l-1 -35zm133 6c0,10 -1,12 -1,22l-1 14c0,3 0,23 -6,23 -7,0 -3,-22 -3,-27 1,-18 0,-12 3,-30 0,-3 1,-6 1,-9 1,-2 1,-3 1,-4 1,-2 1,-3 3,-3 1,-2 0,-1 3,-1 0,3 -1,4 -1,7 0,3 1,4 1,8zm-131 -16l0 0c0,0 0,0 0,0zm-2 -3l2 0 0 0 -2 0 0 0zm64 -30l33 2c33,5 32,9 26,40 -1,11 -4,21 -4,33l0 0c0,-6 -1,-9 -1,-13l-51 -5c-3,0 -10,1 -13,1 -3,1 -6,0 -13,1l-20 2c-2,0 -4,0 -7,0l0 6c0,0 0,-1 0,-1 0,0 0,0 0,0 -1,-2 1,2 0,-1 -2,-4 -7,-37 -8,-40 0,-5 0,-10 3,-14 2,-3 6,-5 10,-6 14,-3 30,-5 45,-5zm-27 -42l3 -2c8,-2 19,-1 27,-1 8,0 6,-1 17,0 4,0 12,1 14,4 -4,0 -17,-2 -22,-3 -2,0 -13,0 -15,0 -7,1 -13,1 -20,1 -2,0 -2,1 -4,1z',
                              scale: 0.1,
                              fillColor: 'green',
                              fillOpacity: 1,
                              anchor: new google.maps.Point(25, 50)
                            })   
                          }
                          else  
                          {
                            marker2.setIcon(
                            {
                              path: 'M201 445c5,-1 6,0 12,0 4,1 6,1 10,1l55 0c2,0 3,-1 5,-1 7,0 10,-1 15,0 5,12 -19,10 -30,10 -3,0 -4,1 -7,1 -3,0 -5,0 -7,0l-14 0c-2,0 -5,0 -7,0 -7,0 -21,-1 -27,-3 -7,-2 -6,-3 -5,-8zm48 -431l1 0c11,0 25,1 36,3 10,1 22,2 27,12 3,6 5,11 5,20 -3,-1 -3,-3 -5,-3 0,-3 -2,-6 -3,-8 -5,-8 -13,-10 -22,-12 -10,-1 -18,-5 -28,-4 -10,0 -8,-2 -10,0 8,0 27,1 34,5 1,1 1,1 1,3 2,7 15,28 25,20 1,0 2,-2 2,-3 3,0 5,2 6,5 1,5 1,14 1,20 0,2 1,2 1,5 0,8 -1,15 -1,23 3,0 6,0 8,1 2,1 6,2 6,4 0,6 0,6 -6,5 -2,-1 -2,-1 -4,-1 -5,-2 -3,-2 -6,-4 0,2 2,1 2,5 0,2 0,5 0,7 0,3 0,4 0,7l0 205 0 1 0 127c-5,0 -9,0 -14,0 0,2 0,2 0,4 0,12 1,13 -2,13 -20,4 -18,3 -38,4 -3,0 -4,1 -7,0 -1,0 -4,0 -6,0 1,1 1,1 1,3 16,0 31,0 47,-3 2,0 6,0 6,-2l-1 -17c7,0 17,-2 16,4 -2,16 -11,19 -26,20 -3,0 -7,0 -10,0l-33 1 -2 0c-16,0 -33,1 -49,-1 -13,-2 -23,-3 -23,-19 -1,-5 -3,-5 4,-5 4,0 6,0 11,0 0,6 -1,12 -1,18 3,1 9,2 13,2l14 1c3,0 6,0 8,0 2,0 4,1 7,1 5,0 10,0 15,0 0,-1 0,-2 1,-3 -5,0 -10,0 -16,0 -4,0 -9,-1 -14,-1 -6,0 -23,-2 -27,-3 0,-6 1,-11 1,-18l-14 1 0 -122 0 -2 0 -225 -13 2c0,-1 -1,-4 -1,-6 6,-3 7,-4 14,-4l1 -47c0,-3 2,-4 4,-6 2,1 4,5 7,5 8,0 11,-5 15,-10 2,-3 7,-10 7,-15 6,-2 8,-3 16,-4 5,0 11,-1 18,-1 -2,-2 -2,-1 -5,-1 -2,1 -4,0 -6,1 -8,0 -13,1 -21,3 -6,2 -12,1 -19,5 -5,3 -6,4 -9,9 -4,7 0,5 -4,8 -1,1 -1,1 -2,1 0,1 -1,1 -1,1 0,-7 2,-15 5,-20 6,-10 17,-11 27,-12 12,-2 24,-3 36,-3zm60 423c-4,0 -7,-1 -7,-7l0 -232c0,-9 9,-10 12,-5 2,6 0,19 1,23 1,7 -1,22 -1,31 0,13 1,182 0,186 -1,2 -2,4 -5,4zm-112 -97l0 37c0,3 0,5 0,8 0,6 0,12 0,17 0,6 5,34 -5,34 -6,0 -7,-5 -7,-13l0 -218c0,-3 0,-8 1,-10 0,-3 2,-5 5,-5 10,0 6,23 6,32 0,13 0,26 0,39 0,13 0,25 0,39 0,13 0,26 0,40zm104 -157c0,-13 0,-25 0,-37l1 29c0,1 1,5 0,6 0,2 1,1 -1,2zm16 -7l-3 0c0,-4 0,-6 2,-7 2,1 2,6 1,7zm-136 -4c0,-1 1,-1 1,-3 3,0 3,1 3,6 0,2 -2,2 -4,2l0 -5zm2 -59l0 -7 5 0c3,7 5,44 5,54 1,6 3,18 -2,18 -6,0 -5,-9 -6,-13 0,-2 0,-6 0,-8 -1,-3 -1,-6 -1,-9l-1 -35zm133 6c0,10 -1,12 -1,22l-1 14c0,3 0,23 -6,23 -7,0 -3,-22 -3,-27 1,-18 0,-12 3,-30 0,-3 1,-6 1,-9 1,-2 1,-3 1,-4 1,-2 1,-3 3,-3 1,-2 0,-1 3,-1 0,3 -1,4 -1,7 0,3 1,4 1,8zm-131 -16l0 0c0,0 0,0 0,0zm-2 -3l2 0 0 0 -2 0 0 0zm64 -30l33 2c33,5 32,9 26,40 -1,11 -4,21 -4,33l0 0c0,-6 -1,-9 -1,-13l-51 -5c-3,0 -10,1 -13,1 -3,1 -6,0 -13,1l-20 2c-2,0 -4,0 -7,0l0 6c0,0 0,-1 0,-1 0,0 0,0 0,0 -1,-2 1,2 0,-1 -2,-4 -7,-37 -8,-40 0,-5 0,-10 3,-14 2,-3 6,-5 10,-6 14,-3 30,-5 45,-5zm-27 -42l3 -2c8,-2 19,-1 27,-1 8,0 6,-1 17,0 4,0 12,1 14,4 -4,0 -17,-2 -22,-3 -2,0 -13,0 -15,0 -7,1 -13,1 -20,1 -2,0 -2,1 -4,1z',
                              scale: 0.1,
                              fillColor: 'red',
                              fillOpacity: 1,
                              anchor: new google.maps.Point(25, 50)
                            })   
                          }

                        
                         
                          marker2.icon.rotation = direction;
                          marker2.setTitle(' Vehicle No : '+latLonList[i].vehicle_no);
                          if ((latLonList[i].lat != latLonList[i-1].lat && latLonList[i].lon != latLonList[i-1].lon))
                          {
                              old_lat = latLonList[i-1].lat;
                              old_lon = latLonList[i-1].lon;
                              deltaLat = (latLonList[i].lat - old_lat)/100;
                              deltaLng = (latLonList[i].lon - old_lon)/100;
                              moveMarker();

                              // latLonList[i].address = 0;

                                     $.post('<?=site_url('tracking/address')?>',{lat : latLonList[i].lat, lon : latLonList[i].lon}, function(data){
                                            console.log(data);
                                             latLonList[i].address = data.address;
                                     },'json');

                          }
                               latLonList[i+1].address = latLonList[i].address;
                         
                          // console.log(latLonList[i]);
                           marker2.setMap(map);

                           marker2.addListener('click', function() {
                             infowindow.setContent('<div>'+
                                                    '<div class="modal-body" style="padding: 1px 0px 16px 1px;">'+
                                                      '<div class="box_style">'+
                                                        '<div class="car-yellow-strip"><strong>' + latLonList[i].vehicle_no + ' </strong></div>'+
                                                        '<div class="car-location"><span> <i class="car-laocation-icon fa fa-map-marker"></i></span><p class="car-laocation-style1" style="margin-top:-6%;"> ' + latLonList[i].address + '</p></div>'+
                                                          '<div style="float:left;">'+

                                                            '<div class="port-details">'+
                                                              '<span class="ign-style port-style">IGN <img src="<?=base_url()?>assets/img/'+
                                                              (ignition == "1" ? "ign_on.png" : "ign_off.png" ) + 
                                                              '" style="max-width:12px;"></span>'+
                                                              '<span class="pow-style port-style">POW <img src="<?=base_url()?>assets/img/'+
                                                              (power_status == "1" || power_status == "2" ? "BatteryOK.png" : "BatteryDis.png")+
                                                              '" style="max-width:15px;"></span>'+
                                                              '<span class="ac-style port-style">GPS <img src="<?=base_url()?>assets/img/'+
                                                              (gps_valid_data == "1" ? "signal_green.png" : "signal_red.png")+
                                                              '" style="max-width:15px;"></span>'+
                                                            '<span class="gps-style port-style">'+
                                                            (latLonList[i].movement == "B" ? "Running" : "Stop" ) + 
                                                            '<img src="<?=base_url()?>assets/img/'+
                                                              (latLonList[i].movement == "B" ? "icon-bus-green.png" : "icon-bus-red.png")+
                                                              '" style="max-width:15px;"></span>'+
                                                            '</div>'+
                                                          '</div>'+
                                                          
                                                          // '<div class="car-status-details">'+
                                                          //   '<span class="car-status-green"><img src="<?=base_url()?>assets/img/'+
                                                          //       (latLonList[i].movement == "B" ? "green-circle.png" : "red-circle.png" ) + 
                                                          //       '" style="max-width:9px;"></span>'+
                                                          //   '<span class="car-status-style"><span>' + 
                                                          //   (latLonList[i].movement == "B" ? "Running" : "Stop" ) + 
                                                          //   '</span>'+
                                                          //     '<p class="car-laocation-style1" style="margin-top: -16px;font-size: 14px; margin-left: 110px;color: #696969;">@ '+ xml_date_time +'</p>'+
                                                          //   '</span>'+
                                                          // '</div>'+


                                                          // '<div style="float:left;">'+
                                                          //   '<div class="port-details" style="width: 220px;">'+

                                                          //     '<span class="ign-style port-style"><a href="<?=site_url("Tracking/playback")?>">PLAYBACK <img src="<?=base_url()?>assets/img/play-button.png'+
                                                          //     '" style="max-width:15px;"></a></span>'+

                                                          //     '<span class="pow-style1 port-style">GPS <img src="<?=base_url()?>assets/img/'+
                                                          //     (gps_quality == "F" ? "good.png" : (gps_quality == "E" ? "average.png" : (gps_quality == "D" ? "poor.png" : "very_poor.png") ) ) +
                                                          //     '" style="max-width:15px;"></span>'+
                                                          //   '</div>'+
                                                          //   '<div class="port-details" style="width: 220px;">'+
                                                          //     '<span class="ign-style port-style">PANIC <img src="<?=base_url()?>assets/img/'+
                                                          //     (panic_status == "0" ? "panic.png" : "warning.png" ) + 
                                                          //     '" style="max-width:12px;"></span>'+
                                                          //     '<span class="pow-style1 port-style">OVERSPPED <img src="<?=base_url()?>assets/img/'+
                                                          //     (speed > <?=$client_speed_limit_val?> ? 'speedlimit_max.png' : 'speedlimit.png')+
                                                          //     '" style="max-width:15px;"></span>'+
                                                          //   '</div>'+
                                                          // '</div>'+


                                                          '<div class="car-icons-four-details" style="border-top: 1px solid #b4b4b4;">'+
                                                            '<div style="height:29px;">'+
                                                              '<span><a href="<?=site_url("Tracking/playback")?>"><i class="car-icons-four fa fa-play-circle"></i></a></span>'+
                                                              '<span class="">'+
                                                              (gps_quality == "F" ? '<img src="<?=base_url()?>assets/img/good.png" class="car-icons-four1"' : (gps_quality == "E" ? '<img src="<?=base_url()?>assets/img/average.png" class="car-icons-four1"' : (gps_quality == "D" ? '<img src="<?=base_url()?>assets/img/poor.png" class="car-icons-four1"' : '<img src="<?=base_url()?>assets/img/very_poor.png" class="car-icons-four1"') ) ) +
                                                             
                                                              '<span class=""><i class="car-icons-four2 fa fa-map-marker"></i></span>'+
                                                              '<span class="">'+
                                                              (panic_status == "0" ? '<i class="car-icons-four3 fa fa-exclamation-triangle"></i>' : '<img src="<?=base_url()?>assets/img/warning.png" class="car-icons-four3" style=" margin-top: 10px;">') +
                                                              '</span>'+
                                                              // '<span class=""><i class="car-icons-four4 fa fa-comment"></i></span>'+
                                                              '<span class=""><img src="<?=base_url()?>assets/img/'+
                                                              (speed > <?=$client_speed_limit_val?> ? 'speedlimit_max.png' : 'speedlimit.png')+
                                                              '" class="car-icons-four4" "></span>'+
                                                            '</div>'+
                                                            '<div>'+
                                                              '<span class="car-icons-four-style">PLAYBACK</span>'+
                                                              '<span class="car-icons-four-style1">GPS QUALITY</span>'+
                                                              '<span class="car-icons-four-style2">GEO FENCE</span>'+
                                                              '<span class="car-icons-four-style3">PANIC</span>'+
                                                              '<span class="car-icons-four-style4">OVERSPPED</span>'+
                                                            '</div>'+
                                                          '</div>'+
                                                      '</div>'+
                                                    '</div>'+
                                                  '</div>');
                              // infowindow.setOptions({maxWidth: 200});
                              infowindow.open(map, marker2);
                          });  
                           if (i == 1) 
                          {
                            infowindow.open(map, marker2);
                          };
                           infowindow.setContent('<div>'+
                                                    '<div class="modal-body" style="padding: 1px 0px 16px 1px;">'+
                                                      '<div class="box_style">'+
                                                        '<div class="car-yellow-strip"><strong>' + latLonList[i].vehicle_no + ' </strong></div>'+
                                                        '<div class="car-location"><span> <i class="car-laocation-icon fa fa-map-marker"></i></span><p class="car-laocation-style1" style="margin-top:-6%;"> ' + latLonList[i].address + '</p></div>'+
                                                          '<div style="float:left;">'+
                                                            '<div class="port-details">'+
                                                              '<span class="ign-style port-style">IGN <img src="<?=base_url()?>assets/img/'+
                                                              (ignition == "1" ? "ign_on.png" : "ign_off.png" ) + 
                                                              '" style="max-width:12px;"></span>'+
                                                              '<span class="pow-style port-style">POW <img src="<?=base_url()?>assets/img/'+
                                                              (power_status == "1" || power_status == "2" ? "BatteryOK.png" : "BatteryDis.png")+
                                                              '" style="max-width:15px;"></span>'+
                                                              '<span class="ac-style port-style">GPS <img src="<?=base_url()?>assets/img/'+
                                                              (gps_valid_data == "1" ? "signal_green.png" : "signal_red.png")+
                                                              '" style="max-width:15px;"></span>'+
                                                              '<span class="gps-style port-style">'+
                                                              (latLonList[i].movement == "B" ? "Running" : "Stop" ) + 
                                                              '<img src="<?=base_url()?>assets/img/'+
                                                                (latLonList[i].movement == "B" ? "icon-bus-green.png" : "icon-bus-red.png")+
                                                                '" style="max-width:15px;"></span>'+
                                                            '</div>'+
                                                          '</div>'+
                                                          // '<div class="car-status-details">'+
                                                          //   '<span class="car-status-green"><img src="<?=base_url()?>assets/img/'+
                                                          //       (latLonList[i].movement == "B" ? "green-circle.png" : "red-circle.png" ) + 
                                                          //       '" style="max-width:9px;"></span>'+
                                                          //   '<span class="car-status-style"><span>' + 
                                                          //   (latLonList[i].movement == "B" ? "Running" : "Stop" ) + 
                                                          //   '</span>'+
                                                          //     '<p class="car-laocation-style1" style="margin-top: -16px;font-size: 14px; margin-left: 110px;color: #696969;">@ '+ xml_date_time +'</p>'+
                                                          //   '</span>'+
                                                          // '</div>'+


                                                          // '<div style="float:left;">'+
                                                          //   '<div class="port-details" style="width: 220px;">'+

                                                          //     '<span class="ign-style port-style"><a href="<?=site_url("Tracking/playback")?>">PLAYBACK <img src="<?=base_url()?>assets/img/play-button.png'+
                                                          //     '" style="max-width:15px;"></a></span>'+

                                                          //     '<span class="pow-style1 port-style">GPS <img src="<?=base_url()?>assets/img/'+
                                                          //     (gps_quality == "F" ? "good.png" : (gps_quality == "E" ? "average.png" : (gps_quality == "D" ? "poor.png" : "very_poor.png") ) ) +
                                                          //     '" style="max-width:15px;"></span>'+
                                                          //   '</div>'+
                                                          //   '<div class="port-details" style="width: 220px;">'+
                                                          //     '<span class="ign-style port-style">PANIC <img src="<?=base_url()?>assets/img/'+
                                                          //     (panic_status == "0" ? "panic.png" : "warning.png" ) + 
                                                          //     '" style="max-width:12px;"></span>'+
                                                          //     '<span class="pow-style1 port-style">OVERSPPED <img src="<?=base_url()?>assets/img/'+
                                                          //     (speed > <?=$client_speed_limit_val?> ? 'speedlimit_max.png' : 'speedlimit.png')+
                                                          //     '" style="max-width:15px;"></span>'+
                                                          //   '</div>'+
                                                          // '</div>'+

                                                          '<div class="car-icons-four-details" style="border-top: 1px solid #b4b4b4;">'+
                                                            '<div style="height:29px;">'+
                                                              '<span><a href="<?=site_url("Tracking/playback")?>"><i class="car-icons-four fa fa-play-circle"></i></a></span>'+
                                                              '<span class="">'+
                                                              (gps_quality == "F" ? '<img src="<?=base_url()?>assets/img/good.png" class="car-icons-four1"' : (gps_quality == "E" ? '<img src="<?=base_url()?>assets/img/average.png" class="car-icons-four1"' : (gps_quality == "D" ? '<img src="<?=base_url()?>assets/img/poor.png" class="car-icons-four1"' : '<img src="<?=base_url()?>assets/img/very_poor.png" class="car-icons-four1"') ) ) +
                                                             
                                                              '<span class=""><i class="car-icons-four2 fa fa-map-marker"></i></span>'+
                                                              '<span class="">'+
                                                              (panic_status == "0" ? '<i class="car-icons-four3 fa fa-exclamation-triangle"></i>' : '<img src="<?=base_url()?>assets/img/warning.png" class="car-icons-four3" style=" margin-top: 10px;">') +
                                                              '</span>'+
                                                              // '<span class=""><i class="car-icons-four4 fa fa-comment"></i></span>'+
                                                              '<span class=""><img src="<?=base_url()?>assets/img/'+
                                                              (speed > <?=$client_speed_limit_val?> ? 'speedlimit_max.png' : 'speedlimit.png')+
                                                              '" class="car-icons-four4" "></span>'+
                                                            '</div>'+
                                                            '<div>'+
                                                              '<span class="car-icons-four-style">PLAYBACK</span>'+
                                                              '<span class="car-icons-four-style1">GPS QUALITY</span>'+
                                                              '<span class="car-icons-four-style2">GEO FENCE</span>'+
                                                              '<span class="car-icons-four-style3">PANIC</span>'+
                                                              '<span class="car-icons-four-style4">OVERSPPED</span>'+
                                                            '</div>'+
                                                          '</div>'+
                                                      '</div>'+
                                                    '</div>'+
                                                  '</div>');
                        
                        }
                        else
                        {
                          if ((latLonList[i].GPS == "1" && latLonList[i].movement == "B")) 
                          {
                            marker2 = new google.maps.Marker(
                            {
                              position: myLatlng,
                              map: map,
                              title:' Vehicle No : '+latLonList[i].vehicle_no,
                              icon : 
                              {
                                path: 'M55 84c1,-1 1,0 2,0 1,0 1,0 2,0l10 0c0,0 0,0 1,0 1,0 2,-1 2,0 2,2 -3,1 -5,1 -1,0 -1,0 -1,0 -1,0 -1,1 -2,1l-2 0c0,0 -1,0 -1,0 -2,0 -4,-1 -5,-1 -2,0 -1,-1 -1,-1zm9 -79l0 0c2,0 4,0 6,0 2,1 4,1 5,2 1,2 1,2 1,4 0,0 0,0 -1,0 0,-1 0,-1 0,-2 -1,-1 -3,-2 -4,-2 -2,0 -4,-1 -5,-1 -2,0 -2,0 -2,0 1,0 5,0 6,1 0,0 0,0 0,1 1,1 3,5 5,3 0,0 0,0 0,0 1,0 1,0 1,1 0,1 0,2 0,3 0,1 0,1 1,1 0,2 -1,3 -1,4 1,0 2,1 2,1 0,0 1,0 1,0 0,1 0,1 -1,1 0,0 -1,0 -1,0 -1,0 0,0 -1,-1 0,1 0,1 0,1 0,1 0,1 0,2 0,0 0,0 0,1l0 37c3,0 5,0 7,0 1,0 2,0 3,0 0,0 1,0 1,0 1,0 1,1 2,1 0,-4 -1,-8 -3,-11l-1 -1c0,-1 -1,-1 -1,-1 0,-1 0,-1 1,-1 0,-1 0,-1 0,-1 1,0 1,0 2,1 0,0 0,0 0,1 1,0 1,0 1,0l1 2c1,3 2,6 2,11 1,0 1,0 1,0 0,0 1,0 1,0l5 0c0,-3 -1,-5 -1,-7 -1,-3 -1,-5 -2,-7 -1,-2 -2,-4 -4,-6 0,-1 -1,-2 -1,-2 0,-1 1,-1 1,-2 1,0 2,2 2,2 2,2 4,5 5,8 0,1 0,2 1,3 1,3 2,7 2,11 0,0 1,0 1,0 1,0 2,0 2,0 1,0 2,0 2,0l2 0c0,-4 -1,-7 -1,-10 -1,-2 -1,-3 -2,-4 0,-2 -1,-4 -2,-4l-1 -3c-1,-1 -1,-2 -2,-3 -1,-2 -4,-6 -7,-7 0,-1 1,-1 1,-1 0,-1 1,-1 1,-2 1,1 2,2 3,3l2 3c2,2 4,5 6,8 0,1 0,2 1,2l1 2c2,6 3,10 3,16 0,0 1,0 2,0 0,0 1,0 1,0 2,0 3,0 4,0 0,-9 -3,-17 -6,-23 0,-1 -1,-2 -1,-3 -2,-2 -3,-4 -5,-7 0,0 0,0 0,-1 -1,-1 -2,-2 -3,-2l-1 -2c-1,-1 -2,-1 -3,-2 0,0 1,-2 1,-2 1,0 4,3 5,3l5 7c0,0 1,1 1,1 1,2 2,3 3,5 1,2 2,4 3,7 2,5 4,11 4,17l0 2c0,7 -2,13 -4,19 -1,3 -2,5 -4,8 -1,2 -3,4 -4,7 -1,1 -2,2 -3,3 0,0 0,0 0,0 -1,0 -1,0 -1,0 -1,-1 -1,-1 -1,-1 0,-1 1,-2 1,-2 2,-2 3,-4 4,-6l3 -5c0,-1 1,-1 1,-1 0,-1 0,-1 0,-1 1,-1 1,-2 1,-3 1,0 1,-1 1,-2 0,-1 1,-1 1,-2 1,-4 2,-9 2,-14 -2,0 -5,0 -7,0 0,4 -1,7 -1,9 -1,3 -3,8 -4,11l-1 1c-1,2 -2,4 -4,6l-2 3 -1 -1c0,0 -1,-1 -1,-1 0,0 0,0 0,0 2,-2 3,-4 4,-6 4,-6 7,-14 7,-22 -1,0 -1,0 -2,0l-5 0c0,0 0,0 0,0 0,6 -1,10 -3,14 0,1 -1,1 -1,1 0,1 -3,7 -4,7 0,0 0,0 0,0l-2 -1c0,-1 1,-2 1,-2 1,-1 2,-2 2,-3 2,-5 4,-10 4,-16 -1,0 -1,0 -2,0 0,0 -1,0 -1,0 -2,0 -2,0 -4,0 0,3 0,6 -1,8 -1,1 -1,2 -2,3 0,1 -1,2 -1,3 -1,0 -2,-2 -2,-2 0,0 1,-2 1,-2 2,-3 3,-6 3,-10 -4,0 -7,0 -11,0 -1,0 -1,0 -2,0l0 23c-1,0 -1,0 -2,0 0,0 0,0 0,1 0,2 0,2 -1,2 -3,1 -3,0 -7,1 0,0 0,0 -1,0 0,0 0,0 -1,0 0,0 0,0 0,0 3,0 6,0 9,0 0,0 1,0 1,-1l0 -3c1,0 3,0 3,1 -1,3 -2,3 -5,3 -1,1 -1,0 -2,1 -2,0 -4,0 -6,0 0,0 0,0 0,1 0,0 0,1 0,1 0,2 0,4 0,6 0,1 0,1 0,1 2,0 5,0 7,-1 2,0 3,-1 5,-2 1,1 1,1 1,2 0,1 0,1 -1,1 -4,2 -8,3 -12,3 0,2 0,3 0,4 0,3 -1,3 1,3 0,0 0,0 1,0 0,0 0,0 1,0 5,0 12,-2 17,-5 0,0 0,0 1,0 0,0 1,2 1,2 0,0 -4,2 -5,3l-2 1c-1,0 -2,0 -3,0 -3,2 -6,2 -9,2 -1,0 -1,0 -2,0 0,0 0,0 -1,0 0,0 0,0 0,0 0,1 -1,2 -1,3 0,1 0,1 0,2 0,0 0,1 0,1 9,0 16,-1 23,-4 0,0 1,-1 1,-1l4 -2c0,0 1,2 2,2l-3 2c-4,1 -7,3 -10,4 -10,3 -22,3 -32,0 -2,-1 -5,-2 -7,-3 -1,0 -2,-1 -3,-1l-3 -2c0,0 0,-1 0,-1 1,0 1,-1 1,-1 0,0 1,0 1,1 2,0 3,1 5,2 2,1 4,1 6,2 4,1 7,2 11,2l4 0c0,-2 0,-4 0,-6 -2,0 -4,0 -6,-1 -3,0 -5,-1 -8,-2 -1,0 -2,0 -2,-1 -1,0 -1,0 -2,0l-2 -1c0,0 -1,-1 -1,-1 0,0 1,-2 1,-2 2,0 3,1 5,2 3,1 6,2 9,3 2,0 4,0 6,0 0,0 0,-1 0,-2 0,0 0,-1 0,-1 0,-1 0,-1 0,-1l0 -2c0,-1 1,-1 1,-1 -4,0 -7,-1 -10,-2 -1,0 -3,-1 -4,-2 0,0 1,-1 1,-2 0,0 1,0 1,1 4,1 7,2 12,2 0,-1 0,-3 0,-5 0,0 0,0 0,-1l0 -3c-3,0 -6,0 -9,-1 -3,0 -4,0 -4,-3 -1,-1 -1,-1 0,-1 1,0 2,0 2,0 0,1 0,2 0,3 1,1 2,1 3,1l2 0c1,0 1,0 2,0 0,0 0,0 1,0 1,0 2,0 3,0 0,0 0,0 0,0 -1,0 -2,0 -3,0 -1,0 -2,-1 -3,-1 -1,0 -4,0 -5,0 0,-1 1,-2 1,-3l-3 0 0 -23c-1,0 -1,0 -2,0 0,0 -1,0 -1,0 -1,0 -3,0 -4,0 0,0 -2,0 -3,0 0,0 -1,0 -1,0 -1,0 -1,0 -2,0 0,1 0,1 0,1 0,2 0,3 0,4 1,1 1,2 1,3 0,0 0,1 0,1 1,1 2,3 2,4 0,0 -1,1 -2,1 0,0 -4,-5 -4,-12l0 -2 -6 0c0,0 0,0 0,1 0,5 0,8 2,12 1,3 2,5 3,7 0,1 0,1 0,1 0,1 -1,1 -2,2 0,-1 0,-1 -1,-1 -1,-3 -2,-6 -3,-8 -1,-4 -2,-8 -2,-13 0,0 0,-1 0,-1 -2,0 -5,0 -7,0 0,1 0,1 0,2 0,1 0,1 0,1 0,2 0,4 0,5 1,3 1,5 2,8 1,0 1,1 1,1 1,4 3,7 5,9 0,1 1,1 1,2 0,0 -1,0 -1,1 0,0 -1,0 -1,0 0,0 -1,0 -1,0 -2,-3 -4,-6 -5,-10 0,0 0,0 0,0 -1,-1 -1,-2 -1,-2 -1,-3 -2,-5 -2,-8 -1,-1 -1,-3 -1,-4l0 -3c0,0 0,-1 0,-2l-7 0c0,5 0,8 1,13 1,1 1,3 1,4 1,1 1,2 1,2 0,1 1,1 1,2 0,1 1,3 2,4 0,1 1,2 1,3 1,1 1,2 1,2l4 5c-1,0 -2,1 -3,2 0,-1 0,-2 -1,-2 -4,-7 -7,-13 -9,-22 -2,-4 -2,-8 -2,-12 0,-5 1,-10 3,-15 0,-2 1,-4 2,-6 0,-1 1,-1 1,-2 0,-1 0,-1 1,-1 0,0 0,-1 0,-1l1 -2c1,-2 2,-3 3,-4 0,-1 1,-1 1,-1 1,-2 2,-3 4,-5 0,-1 1,-2 2,-2 1,-1 2,-2 3,-3 0,0 2,-1 2,-1 1,0 1,0 1,0 0,1 1,1 1,2 -1,1 -2,1 -3,2 0,0 -1,0 -1,0l-4 4 -3 4c-1,2 -3,5 -4,6l-2 4c-2,4 -3,8 -4,13 0,1 -1,2 -1,3 0,0 0,1 0,2 0,0 0,1 0,1 1,0 1,0 2,0 1,0 1,0 2,0l2 0c1,0 1,0 1,0 0,0 0,-1 0,-1 0,-1 1,-3 1,-4 0,-3 1,-5 2,-8 1,-2 2,-4 3,-6 2,-3 4,-5 6,-7l0 -1c1,-1 3,-3 4,-3 0,-1 2,-2 3,-2 0,0 1,1 1,2 -1,0 -2,1 -2,1 -2,1 -3,3 -5,5 -1,2 -3,4 -4,6 -1,1 -1,2 -2,2 -1,2 -1,4 -2,7 -1,1 -1,3 -1,4 -1,1 -1,2 -1,3 0,1 0,2 0,2 1,0 1,1 2,1 0,0 1,0 2,0 0,0 1,0 1,0 1,0 2,0 2,0 0,-1 0,-1 0,-1 1,-3 1,-5 2,-7 1,-4 3,-8 5,-11 1,-1 3,-4 5,-5 0,1 1,2 1,3 0,0 0,0 -1,0 -1,1 -3,3 -4,5 -2,4 -4,8 -4,12 -1,1 -1,2 -1,2l0 2c2,0 4,0 6,0 1,-1 1,-1 1,-1 0,-1 0,-3 0,-4 1,0 1,-1 1,-2 1,-2 2,-3 3,-5 0,0 2,-2 3,-3 0,1 1,2 1,3 0,0 -1,0 -1,1 0,0 0,0 -1,0l-1 2c-1,2 -2,4 -2,5 0,1 -1,3 -1,4 2,0 5,0 7,0 2,0 4,0 6,0l0 -41 -2 0c0,0 -1,0 -1,-1 1,0 2,-1 3,-1l0 -8c0,-1 1,-1 1,-1 0,0 1,1 1,1 2,0 2,-1 3,-2 0,-1 1,-2 1,-3 1,0 2,0 3,-1 1,0 2,0 3,0 0,0 0,0 0,0 -1,0 -1,0 -2,0 -1,0 -2,0 -3,1 -2,0 -3,0 -4,1 -1,0 -1,0 -2,1 0,1 0,1 0,2 0,0 0,0 -1,0 0,0 0,0 0,0 0,-1 1,-3 1,-4 1,-1 3,-2 5,-2 2,0 4,0 7,0zm11 77c-1,0 -2,0 -2,-1l0 -43c0,-1 2,-1 2,0 1,0 1,3 1,4 0,1 0,4 0,5 0,3 0,34 -1,34 0,1 0,1 0,1zm-21 -18l0 7c0,1 0,1 0,2 0,1 0,2 0,3 0,1 1,6 -1,6 -1,0 -1,-1 -1,-2l0 -40c0,-1 0,-2 0,-2 0,-1 0,-1 1,-1 2,0 1,4 1,6 0,2 0,5 0,7 0,2 0,5 0,7 0,2 0,5 0,7zm19 -28c0,-3 0,-5 0,-7l0 5c0,0 0,1 0,1 0,1 0,0 0,1zm3 -2l0 0c0,0 -1,-1 0,-1 0,0 0,1 0,1zm-25 0c0,-1 0,-1 0,-1 1,0 1,0 1,1 0,0 0,0 -1,0l0 0zm0 -11l1 -1 0 0c1,1 1,8 1,10 1,1 1,3 0,3 -1,0 -1,-2 -1,-3 0,0 0,-1 0,-1 0,-1 0,-1 0,-2l-1 -6zm25 1c0,2 0,2 0,4l0 2c0,1 -1,5 -2,5 -1,0 0,-4 0,-5 0,-3 0,-2 0,-6 0,0 1,-1 1,-1 0,-1 0,-1 0,-1 0,0 0,-1 0,-1 0,0 0,0 1,0 0,1 0,1 0,1 0,1 0,1 0,2zm-24 -3l0 0c0,0 0,0 0,0zm-1 -1l1 0 0 0 -1 0 0 0zm12 -5l6 0c6,1 6,2 5,8 0,2 -1,4 -1,6l0 0c0,-1 0,-2 0,-3l-9 -1c-1,0 -2,1 -3,1 0,0 -1,0 -2,0l-4 0c0,0 0,0 -1,0l0 1c0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,-1 -1,-7 -1,-8 0,0 0,-1 0,-2 1,-1 1,-1 2,-1 3,-1 5,-1 8,-1zm-5 -8l1 0c1,-1 3,0 5,0 1,0 1,-1 3,0 1,0 2,0 2,0 0,0 -3,0 -4,0 0,0 -2,0 -2,0 -2,0 -3,0 -4,0 0,0 0,0 -1,0z',
                                scale: 0.5,
                                fillColor: 'green',
                                fillOpacity: 1,
                                rotation: direction,
                                anchor: new google.maps.Point(25, 50)
                              }
                            });
                          }
                          else if ((latLonList[i].GPS == "1")) 
                          {
                            marker2 = new google.maps.Marker(
                            {
                              position: myLatlng,
                              map: map,
                              title:' Vehicle No : '+latLonList[i].vehicle_no,
                              icon : 
                              {
                                path: 'M55 84c1,-1 1,0 2,0 1,0 1,0 2,0l10 0c0,0 0,0 1,0 1,0 2,-1 2,0 2,2 -3,1 -5,1 -1,0 -1,0 -1,0 -1,0 -1,1 -2,1l-2 0c0,0 -1,0 -1,0 -2,0 -4,-1 -5,-1 -2,0 -1,-1 -1,-1zm9 -79l0 0c2,0 4,0 6,0 2,1 4,1 5,2 1,2 1,2 1,4 0,0 0,0 -1,0 0,-1 0,-1 0,-2 -1,-1 -3,-2 -4,-2 -2,0 -4,-1 -5,-1 -2,0 -2,0 -2,0 1,0 5,0 6,1 0,0 0,0 0,1 1,1 3,5 5,3 0,0 0,0 0,0 1,0 1,0 1,1 0,1 0,2 0,3 0,1 0,1 1,1 0,2 -1,3 -1,4 1,0 2,1 2,1 0,0 1,0 1,0 0,1 0,1 -1,1 0,0 -1,0 -1,0 -1,0 0,0 -1,-1 0,1 0,1 0,1 0,1 0,1 0,2 0,0 0,0 0,1l0 37c3,0 5,0 7,0 1,0 2,0 3,0 0,0 1,0 1,0 1,0 1,1 2,1 0,-4 -1,-8 -3,-11l-1 -1c0,-1 -1,-1 -1,-1 0,-1 0,-1 1,-1 0,-1 0,-1 0,-1 1,0 1,0 2,1 0,0 0,0 0,1 1,0 1,0 1,0l1 2c1,3 2,6 2,11 1,0 1,0 1,0 0,0 1,0 1,0l5 0c0,-3 -1,-5 -1,-7 -1,-3 -1,-5 -2,-7 -1,-2 -2,-4 -4,-6 0,-1 -1,-2 -1,-2 0,-1 1,-1 1,-2 1,0 2,2 2,2 2,2 4,5 5,8 0,1 0,2 1,3 1,3 2,7 2,11 0,0 1,0 1,0 1,0 2,0 2,0 1,0 2,0 2,0l2 0c0,-4 -1,-7 -1,-10 -1,-2 -1,-3 -2,-4 0,-2 -1,-4 -2,-4l-1 -3c-1,-1 -1,-2 -2,-3 -1,-2 -4,-6 -7,-7 0,-1 1,-1 1,-1 0,-1 1,-1 1,-2 1,1 2,2 3,3l2 3c2,2 4,5 6,8 0,1 0,2 1,2l1 2c2,6 3,10 3,16 0,0 1,0 2,0 0,0 1,0 1,0 2,0 3,0 4,0 0,-9 -3,-17 -6,-23 0,-1 -1,-2 -1,-3 -2,-2 -3,-4 -5,-7 0,0 0,0 0,-1 -1,-1 -2,-2 -3,-2l-1 -2c-1,-1 -2,-1 -3,-2 0,0 1,-2 1,-2 1,0 4,3 5,3l5 7c0,0 1,1 1,1 1,2 2,3 3,5 1,2 2,4 3,7 2,5 4,11 4,17l0 2c0,7 -2,13 -4,19 -1,3 -2,5 -4,8 -1,2 -3,4 -4,7 -1,1 -2,2 -3,3 0,0 0,0 0,0 -1,0 -1,0 -1,0 -1,-1 -1,-1 -1,-1 0,-1 1,-2 1,-2 2,-2 3,-4 4,-6l3 -5c0,-1 1,-1 1,-1 0,-1 0,-1 0,-1 1,-1 1,-2 1,-3 1,0 1,-1 1,-2 0,-1 1,-1 1,-2 1,-4 2,-9 2,-14 -2,0 -5,0 -7,0 0,4 -1,7 -1,9 -1,3 -3,8 -4,11l-1 1c-1,2 -2,4 -4,6l-2 3 -1 -1c0,0 -1,-1 -1,-1 0,0 0,0 0,0 2,-2 3,-4 4,-6 4,-6 7,-14 7,-22 -1,0 -1,0 -2,0l-5 0c0,0 0,0 0,0 0,6 -1,10 -3,14 0,1 -1,1 -1,1 0,1 -3,7 -4,7 0,0 0,0 0,0l-2 -1c0,-1 1,-2 1,-2 1,-1 2,-2 2,-3 2,-5 4,-10 4,-16 -1,0 -1,0 -2,0 0,0 -1,0 -1,0 -2,0 -2,0 -4,0 0,3 0,6 -1,8 -1,1 -1,2 -2,3 0,1 -1,2 -1,3 -1,0 -2,-2 -2,-2 0,0 1,-2 1,-2 2,-3 3,-6 3,-10 -4,0 -7,0 -11,0 -1,0 -1,0 -2,0l0 23c-1,0 -1,0 -2,0 0,0 0,0 0,1 0,2 0,2 -1,2 -3,1 -3,0 -7,1 0,0 0,0 -1,0 0,0 0,0 -1,0 0,0 0,0 0,0 3,0 6,0 9,0 0,0 1,0 1,-1l0 -3c1,0 3,0 3,1 -1,3 -2,3 -5,3 -1,1 -1,0 -2,1 -2,0 -4,0 -6,0 0,0 0,0 0,1 0,0 0,1 0,1 0,2 0,4 0,6 0,1 0,1 0,1 2,0 5,0 7,-1 2,0 3,-1 5,-2 1,1 1,1 1,2 0,1 0,1 -1,1 -4,2 -8,3 -12,3 0,2 0,3 0,4 0,3 -1,3 1,3 0,0 0,0 1,0 0,0 0,0 1,0 5,0 12,-2 17,-5 0,0 0,0 1,0 0,0 1,2 1,2 0,0 -4,2 -5,3l-2 1c-1,0 -2,0 -3,0 -3,2 -6,2 -9,2 -1,0 -1,0 -2,0 0,0 0,0 -1,0 0,0 0,0 0,0 0,1 -1,2 -1,3 0,1 0,1 0,2 0,0 0,1 0,1 9,0 16,-1 23,-4 0,0 1,-1 1,-1l4 -2c0,0 1,2 2,2l-3 2c-4,1 -7,3 -10,4 -10,3 -22,3 -32,0 -2,-1 -5,-2 -7,-3 -1,0 -2,-1 -3,-1l-3 -2c0,0 0,-1 0,-1 1,0 1,-1 1,-1 0,0 1,0 1,1 2,0 3,1 5,2 2,1 4,1 6,2 4,1 7,2 11,2l4 0c0,-2 0,-4 0,-6 -2,0 -4,0 -6,-1 -3,0 -5,-1 -8,-2 -1,0 -2,0 -2,-1 -1,0 -1,0 -2,0l-2 -1c0,0 -1,-1 -1,-1 0,0 1,-2 1,-2 2,0 3,1 5,2 3,1 6,2 9,3 2,0 4,0 6,0 0,0 0,-1 0,-2 0,0 0,-1 0,-1 0,-1 0,-1 0,-1l0 -2c0,-1 1,-1 1,-1 -4,0 -7,-1 -10,-2 -1,0 -3,-1 -4,-2 0,0 1,-1 1,-2 0,0 1,0 1,1 4,1 7,2 12,2 0,-1 0,-3 0,-5 0,0 0,0 0,-1l0 -3c-3,0 -6,0 -9,-1 -3,0 -4,0 -4,-3 -1,-1 -1,-1 0,-1 1,0 2,0 2,0 0,1 0,2 0,3 1,1 2,1 3,1l2 0c1,0 1,0 2,0 0,0 0,0 1,0 1,0 2,0 3,0 0,0 0,0 0,0 -1,0 -2,0 -3,0 -1,0 -2,-1 -3,-1 -1,0 -4,0 -5,0 0,-1 1,-2 1,-3l-3 0 0 -23c-1,0 -1,0 -2,0 0,0 -1,0 -1,0 -1,0 -3,0 -4,0 0,0 -2,0 -3,0 0,0 -1,0 -1,0 -1,0 -1,0 -2,0 0,1 0,1 0,1 0,2 0,3 0,4 1,1 1,2 1,3 0,0 0,1 0,1 1,1 2,3 2,4 0,0 -1,1 -2,1 0,0 -4,-5 -4,-12l0 -2 -6 0c0,0 0,0 0,1 0,5 0,8 2,12 1,3 2,5 3,7 0,1 0,1 0,1 0,1 -1,1 -2,2 0,-1 0,-1 -1,-1 -1,-3 -2,-6 -3,-8 -1,-4 -2,-8 -2,-13 0,0 0,-1 0,-1 -2,0 -5,0 -7,0 0,1 0,1 0,2 0,1 0,1 0,1 0,2 0,4 0,5 1,3 1,5 2,8 1,0 1,1 1,1 1,4 3,7 5,9 0,1 1,1 1,2 0,0 -1,0 -1,1 0,0 -1,0 -1,0 0,0 -1,0 -1,0 -2,-3 -4,-6 -5,-10 0,0 0,0 0,0 -1,-1 -1,-2 -1,-2 -1,-3 -2,-5 -2,-8 -1,-1 -1,-3 -1,-4l0 -3c0,0 0,-1 0,-2l-7 0c0,5 0,8 1,13 1,1 1,3 1,4 1,1 1,2 1,2 0,1 1,1 1,2 0,1 1,3 2,4 0,1 1,2 1,3 1,1 1,2 1,2l4 5c-1,0 -2,1 -3,2 0,-1 0,-2 -1,-2 -4,-7 -7,-13 -9,-22 -2,-4 -2,-8 -2,-12 0,-5 1,-10 3,-15 0,-2 1,-4 2,-6 0,-1 1,-1 1,-2 0,-1 0,-1 1,-1 0,0 0,-1 0,-1l1 -2c1,-2 2,-3 3,-4 0,-1 1,-1 1,-1 1,-2 2,-3 4,-5 0,-1 1,-2 2,-2 1,-1 2,-2 3,-3 0,0 2,-1 2,-1 1,0 1,0 1,0 0,1 1,1 1,2 -1,1 -2,1 -3,2 0,0 -1,0 -1,0l-4 4 -3 4c-1,2 -3,5 -4,6l-2 4c-2,4 -3,8 -4,13 0,1 -1,2 -1,3 0,0 0,1 0,2 0,0 0,1 0,1 1,0 1,0 2,0 1,0 1,0 2,0l2 0c1,0 1,0 1,0 0,0 0,-1 0,-1 0,-1 1,-3 1,-4 0,-3 1,-5 2,-8 1,-2 2,-4 3,-6 2,-3 4,-5 6,-7l0 -1c1,-1 3,-3 4,-3 0,-1 2,-2 3,-2 0,0 1,1 1,2 -1,0 -2,1 -2,1 -2,1 -3,3 -5,5 -1,2 -3,4 -4,6 -1,1 -1,2 -2,2 -1,2 -1,4 -2,7 -1,1 -1,3 -1,4 -1,1 -1,2 -1,3 0,1 0,2 0,2 1,0 1,1 2,1 0,0 1,0 2,0 0,0 1,0 1,0 1,0 2,0 2,0 0,-1 0,-1 0,-1 1,-3 1,-5 2,-7 1,-4 3,-8 5,-11 1,-1 3,-4 5,-5 0,1 1,2 1,3 0,0 0,0 -1,0 -1,1 -3,3 -4,5 -2,4 -4,8 -4,12 -1,1 -1,2 -1,2l0 2c2,0 4,0 6,0 1,-1 1,-1 1,-1 0,-1 0,-3 0,-4 1,0 1,-1 1,-2 1,-2 2,-3 3,-5 0,0 2,-2 3,-3 0,1 1,2 1,3 0,0 -1,0 -1,1 0,0 0,0 -1,0l-1 2c-1,2 -2,4 -2,5 0,1 -1,3 -1,4 2,0 5,0 7,0 2,0 4,0 6,0l0 -41 -2 0c0,0 -1,0 -1,-1 1,0 2,-1 3,-1l0 -8c0,-1 1,-1 1,-1 0,0 1,1 1,1 2,0 2,-1 3,-2 0,-1 1,-2 1,-3 1,0 2,0 3,-1 1,0 2,0 3,0 0,0 0,0 0,0 -1,0 -1,0 -2,0 -1,0 -2,0 -3,1 -2,0 -3,0 -4,1 -1,0 -1,0 -2,1 0,1 0,1 0,2 0,0 0,0 -1,0 0,0 0,0 0,0 0,-1 1,-3 1,-4 1,-1 3,-2 5,-2 2,0 4,0 7,0zm11 77c-1,0 -2,0 -2,-1l0 -43c0,-1 2,-1 2,0 1,0 1,3 1,4 0,1 0,4 0,5 0,3 0,34 -1,34 0,1 0,1 0,1zm-21 -18l0 7c0,1 0,1 0,2 0,1 0,2 0,3 0,1 1,6 -1,6 -1,0 -1,-1 -1,-2l0 -40c0,-1 0,-2 0,-2 0,-1 0,-1 1,-1 2,0 1,4 1,6 0,2 0,5 0,7 0,2 0,5 0,7 0,2 0,5 0,7zm19 -28c0,-3 0,-5 0,-7l0 5c0,0 0,1 0,1 0,1 0,0 0,1zm3 -2l0 0c0,0 -1,-1 0,-1 0,0 0,1 0,1zm-25 0c0,-1 0,-1 0,-1 1,0 1,0 1,1 0,0 0,0 -1,0l0 0zm0 -11l1 -1 0 0c1,1 1,8 1,10 1,1 1,3 0,3 -1,0 -1,-2 -1,-3 0,0 0,-1 0,-1 0,-1 0,-1 0,-2l-1 -6zm25 1c0,2 0,2 0,4l0 2c0,1 -1,5 -2,5 -1,0 0,-4 0,-5 0,-3 0,-2 0,-6 0,0 1,-1 1,-1 0,-1 0,-1 0,-1 0,0 0,-1 0,-1 0,0 0,0 1,0 0,1 0,1 0,1 0,1 0,1 0,2zm-24 -3l0 0c0,0 0,0 0,0zm-1 -1l1 0 0 0 -1 0 0 0zm12 -5l6 0c6,1 6,2 5,8 0,2 -1,4 -1,6l0 0c0,-1 0,-2 0,-3l-9 -1c-1,0 -2,1 -3,1 0,0 -1,0 -2,0l-4 0c0,0 0,0 -1,0l0 1c0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,-1 -1,-7 -1,-8 0,0 0,-1 0,-2 1,-1 1,-1 2,-1 3,-1 5,-1 8,-1zm-5 -8l1 0c1,-1 3,0 5,0 1,0 1,-1 3,0 1,0 2,0 2,0 0,0 -3,0 -4,0 0,0 -2,0 -2,0 -2,0 -3,0 -4,0 0,0 0,0 -1,0z',
                                scale: 0.5,
                                fillColor: 'red',
                                fillOpacity: 1,
                                rotation: direction,
                                anchor: new google.maps.Point(25, 50)
                              }
                             });
                          }
                          else if ((latLonList[i].GPS == "3" && latLonList[i].movement == "B")) 
                          {
                            marker2 = new google.maps.Marker(
                            {
                              position: myLatlng,
                              map: map,
                              title:' Vehicle No : '+latLonList[i].vehicle_no,
                              icon : 
                              {
                                path: 'M201 445c5,-1 6,0 12,0 4,1 6,1 10,1l55 0c2,0 3,-1 5,-1 7,0 10,-1 15,0 5,12 -19,10 -30,10 -3,0 -4,1 -7,1 -3,0 -5,0 -7,0l-14 0c-2,0 -5,0 -7,0 -7,0 -21,-1 -27,-3 -7,-2 -6,-3 -5,-8zm48 -431l1 0c11,0 25,1 36,3 10,1 22,2 27,12 3,6 5,11 5,20 -3,-1 -3,-3 -5,-3 0,-3 -2,-6 -3,-8 -5,-8 -13,-10 -22,-12 -10,-1 -18,-5 -28,-4 -10,0 -8,-2 -10,0 8,0 27,1 34,5 1,1 1,1 1,3 2,7 15,28 25,20 1,0 2,-2 2,-3 3,0 5,2 6,5 1,5 1,14 1,20 0,2 1,2 1,5 0,8 -1,15 -1,23 3,0 6,0 8,1 2,1 6,2 6,4 0,6 0,6 -6,5 -2,-1 -2,-1 -4,-1 -5,-2 -3,-2 -6,-4 0,2 2,1 2,5 0,2 0,5 0,7 0,3 0,4 0,7l0 205 0 1 0 127c-5,0 -9,0 -14,0 0,2 0,2 0,4 0,12 1,13 -2,13 -20,4 -18,3 -38,4 -3,0 -4,1 -7,0 -1,0 -4,0 -6,0 1,1 1,1 1,3 16,0 31,0 47,-3 2,0 6,0 6,-2l-1 -17c7,0 17,-2 16,4 -2,16 -11,19 -26,20 -3,0 -7,0 -10,0l-33 1 -2 0c-16,0 -33,1 -49,-1 -13,-2 -23,-3 -23,-19 -1,-5 -3,-5 4,-5 4,0 6,0 11,0 0,6 -1,12 -1,18 3,1 9,2 13,2l14 1c3,0 6,0 8,0 2,0 4,1 7,1 5,0 10,0 15,0 0,-1 0,-2 1,-3 -5,0 -10,0 -16,0 -4,0 -9,-1 -14,-1 -6,0 -23,-2 -27,-3 0,-6 1,-11 1,-18l-14 1 0 -122 0 -2 0 -225 -13 2c0,-1 -1,-4 -1,-6 6,-3 7,-4 14,-4l1 -47c0,-3 2,-4 4,-6 2,1 4,5 7,5 8,0 11,-5 15,-10 2,-3 7,-10 7,-15 6,-2 8,-3 16,-4 5,0 11,-1 18,-1 -2,-2 -2,-1 -5,-1 -2,1 -4,0 -6,1 -8,0 -13,1 -21,3 -6,2 -12,1 -19,5 -5,3 -6,4 -9,9 -4,7 0,5 -4,8 -1,1 -1,1 -2,1 0,1 -1,1 -1,1 0,-7 2,-15 5,-20 6,-10 17,-11 27,-12 12,-2 24,-3 36,-3zm60 423c-4,0 -7,-1 -7,-7l0 -232c0,-9 9,-10 12,-5 2,6 0,19 1,23 1,7 -1,22 -1,31 0,13 1,182 0,186 -1,2 -2,4 -5,4zm-112 -97l0 37c0,3 0,5 0,8 0,6 0,12 0,17 0,6 5,34 -5,34 -6,0 -7,-5 -7,-13l0 -218c0,-3 0,-8 1,-10 0,-3 2,-5 5,-5 10,0 6,23 6,32 0,13 0,26 0,39 0,13 0,25 0,39 0,13 0,26 0,40zm104 -157c0,-13 0,-25 0,-37l1 29c0,1 1,5 0,6 0,2 1,1 -1,2zm16 -7l-3 0c0,-4 0,-6 2,-7 2,1 2,6 1,7zm-136 -4c0,-1 1,-1 1,-3 3,0 3,1 3,6 0,2 -2,2 -4,2l0 -5zm2 -59l0 -7 5 0c3,7 5,44 5,54 1,6 3,18 -2,18 -6,0 -5,-9 -6,-13 0,-2 0,-6 0,-8 -1,-3 -1,-6 -1,-9l-1 -35zm133 6c0,10 -1,12 -1,22l-1 14c0,3 0,23 -6,23 -7,0 -3,-22 -3,-27 1,-18 0,-12 3,-30 0,-3 1,-6 1,-9 1,-2 1,-3 1,-4 1,-2 1,-3 3,-3 1,-2 0,-1 3,-1 0,3 -1,4 -1,7 0,3 1,4 1,8zm-131 -16l0 0c0,0 0,0 0,0zm-2 -3l2 0 0 0 -2 0 0 0zm64 -30l33 2c33,5 32,9 26,40 -1,11 -4,21 -4,33l0 0c0,-6 -1,-9 -1,-13l-51 -5c-3,0 -10,1 -13,1 -3,1 -6,0 -13,1l-20 2c-2,0 -4,0 -7,0l0 6c0,0 0,-1 0,-1 0,0 0,0 0,0 -1,-2 1,2 0,-1 -2,-4 -7,-37 -8,-40 0,-5 0,-10 3,-14 2,-3 6,-5 10,-6 14,-3 30,-5 45,-5zm-27 -42l3 -2c8,-2 19,-1 27,-1 8,0 6,-1 17,0 4,0 12,1 14,4 -4,0 -17,-2 -22,-3 -2,0 -13,0 -15,0 -7,1 -13,1 -20,1 -2,0 -2,1 -4,1z',
                                scale: 0.1,
                                fillColor: 'green',
                                fillOpacity: 1,
                                rotation: direction,
                                anchor: new google.maps.Point(25, 50)
                              }
                            });
                          }
                          else  
                          {
                            marker2 = new google.maps.Marker(
                            {
                              position: myLatlng,
                              map: map,
                              title:' Vehicle No : '+latLonList[i].vehicle_no,
                              icon : 
                              {
                                path: 'M201 445c5,-1 6,0 12,0 4,1 6,1 10,1l55 0c2,0 3,-1 5,-1 7,0 10,-1 15,0 5,12 -19,10 -30,10 -3,0 -4,1 -7,1 -3,0 -5,0 -7,0l-14 0c-2,0 -5,0 -7,0 -7,0 -21,-1 -27,-3 -7,-2 -6,-3 -5,-8zm48 -431l1 0c11,0 25,1 36,3 10,1 22,2 27,12 3,6 5,11 5,20 -3,-1 -3,-3 -5,-3 0,-3 -2,-6 -3,-8 -5,-8 -13,-10 -22,-12 -10,-1 -18,-5 -28,-4 -10,0 -8,-2 -10,0 8,0 27,1 34,5 1,1 1,1 1,3 2,7 15,28 25,20 1,0 2,-2 2,-3 3,0 5,2 6,5 1,5 1,14 1,20 0,2 1,2 1,5 0,8 -1,15 -1,23 3,0 6,0 8,1 2,1 6,2 6,4 0,6 0,6 -6,5 -2,-1 -2,-1 -4,-1 -5,-2 -3,-2 -6,-4 0,2 2,1 2,5 0,2 0,5 0,7 0,3 0,4 0,7l0 205 0 1 0 127c-5,0 -9,0 -14,0 0,2 0,2 0,4 0,12 1,13 -2,13 -20,4 -18,3 -38,4 -3,0 -4,1 -7,0 -1,0 -4,0 -6,0 1,1 1,1 1,3 16,0 31,0 47,-3 2,0 6,0 6,-2l-1 -17c7,0 17,-2 16,4 -2,16 -11,19 -26,20 -3,0 -7,0 -10,0l-33 1 -2 0c-16,0 -33,1 -49,-1 -13,-2 -23,-3 -23,-19 -1,-5 -3,-5 4,-5 4,0 6,0 11,0 0,6 -1,12 -1,18 3,1 9,2 13,2l14 1c3,0 6,0 8,0 2,0 4,1 7,1 5,0 10,0 15,0 0,-1 0,-2 1,-3 -5,0 -10,0 -16,0 -4,0 -9,-1 -14,-1 -6,0 -23,-2 -27,-3 0,-6 1,-11 1,-18l-14 1 0 -122 0 -2 0 -225 -13 2c0,-1 -1,-4 -1,-6 6,-3 7,-4 14,-4l1 -47c0,-3 2,-4 4,-6 2,1 4,5 7,5 8,0 11,-5 15,-10 2,-3 7,-10 7,-15 6,-2 8,-3 16,-4 5,0 11,-1 18,-1 -2,-2 -2,-1 -5,-1 -2,1 -4,0 -6,1 -8,0 -13,1 -21,3 -6,2 -12,1 -19,5 -5,3 -6,4 -9,9 -4,7 0,5 -4,8 -1,1 -1,1 -2,1 0,1 -1,1 -1,1 0,-7 2,-15 5,-20 6,-10 17,-11 27,-12 12,-2 24,-3 36,-3zm60 423c-4,0 -7,-1 -7,-7l0 -232c0,-9 9,-10 12,-5 2,6 0,19 1,23 1,7 -1,22 -1,31 0,13 1,182 0,186 -1,2 -2,4 -5,4zm-112 -97l0 37c0,3 0,5 0,8 0,6 0,12 0,17 0,6 5,34 -5,34 -6,0 -7,-5 -7,-13l0 -218c0,-3 0,-8 1,-10 0,-3 2,-5 5,-5 10,0 6,23 6,32 0,13 0,26 0,39 0,13 0,25 0,39 0,13 0,26 0,40zm104 -157c0,-13 0,-25 0,-37l1 29c0,1 1,5 0,6 0,2 1,1 -1,2zm16 -7l-3 0c0,-4 0,-6 2,-7 2,1 2,6 1,7zm-136 -4c0,-1 1,-1 1,-3 3,0 3,1 3,6 0,2 -2,2 -4,2l0 -5zm2 -59l0 -7 5 0c3,7 5,44 5,54 1,6 3,18 -2,18 -6,0 -5,-9 -6,-13 0,-2 0,-6 0,-8 -1,-3 -1,-6 -1,-9l-1 -35zm133 6c0,10 -1,12 -1,22l-1 14c0,3 0,23 -6,23 -7,0 -3,-22 -3,-27 1,-18 0,-12 3,-30 0,-3 1,-6 1,-9 1,-2 1,-3 1,-4 1,-2 1,-3 3,-3 1,-2 0,-1 3,-1 0,3 -1,4 -1,7 0,3 1,4 1,8zm-131 -16l0 0c0,0 0,0 0,0zm-2 -3l2 0 0 0 -2 0 0 0zm64 -30l33 2c33,5 32,9 26,40 -1,11 -4,21 -4,33l0 0c0,-6 -1,-9 -1,-13l-51 -5c-3,0 -10,1 -13,1 -3,1 -6,0 -13,1l-20 2c-2,0 -4,0 -7,0l0 6c0,0 0,-1 0,-1 0,0 0,0 0,0 -1,-2 1,2 0,-1 -2,-4 -7,-37 -8,-40 0,-5 0,-10 3,-14 2,-3 6,-5 10,-6 14,-3 30,-5 45,-5zm-27 -42l3 -2c8,-2 19,-1 27,-1 8,0 6,-1 17,0 4,0 12,1 14,4 -4,0 -17,-2 -22,-3 -2,0 -13,0 -15,0 -7,1 -13,1 -20,1 -2,0 -2,1 -4,1z',
                                scale: 0.1,
                                fillColor: 'red',
                                fillOpacity: 1,
                                rotation: direction,
                                anchor: new google.maps.Point(25, 50)
                              }
                            });
                          }

                          latLonList[i+1].address = latLonList[i].address;
                          // console.log(latLonList[i+1].address);

                          marker2.addListener('click', function() {
                           infowindow.setContent('<div><strong> Vehicle Number : </strong>' + latLonList[i].lat + '<br>'+
                                                    '<strong> Address : </strong>' + latLonList[i].address + '<br>'+
                                                    '</div>');
                              // infowindow.setOptions({maxWidth: 200});
                              // infowindow.open(map, marker2);
                          });  
                          // infowindow.open(map, marker2);


                        
                        }

                        i++;
                
                  setTimeout(autoUpdate, 3000);
                }
                else
                {
                 setTimeout(autoUpdate, 500);
                }
                }


// Move smouthly
            function moveMarker(){
				
              old_lat = +old_lat + +deltaLat;
              old_lon = +old_lon + +deltaLng;

              // alert(old_lat+":"+old_lon);
              var latlng = new google.maps.LatLng(old_lat, old_lon);          
              marker2.setPosition(latlng);
				
              if(j!=numDeltas)
              {
                    j++;
                    setTimeout(moveMarker, 10);                      
              }

            }
// END move smouthly

        //end document ready
          <?php if($map = 'map') {?>
            $('#tracking').addClass('active');
        <?php } ?>

        });

    </script>
  </head>
  <body  class="top-navigation">
    <div class="loader"></div>
<!-- <div style="text-align:right">
<form action="<?=site_url('tracking')?>" method="POST" enctype="multipart/form-data">
   Currenttt Device:<input type="text" value="<?=$current_device?>">
    Select The Device: 
    <select id="bus_select" name="device_id">
      <?php foreach ($car as $key ) {?>
        <option value="<?=$key['device_id']?>"><?=$key['bus_no']?></option>
      <?php } ?>
    </select>
    <input type="submit" >  
</form>
</div> -->

   
    <!-- <div id="mapcanvas">
    </div>
 -->
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
                            <li id="tracking_all">
                                <a href="<?=site_url('Tracking/view_all_device')?>"><img src="<?=base_url()?>assets/img/icon/tracking.png" style="display: -webkit-box;font-size: initial;padding-left: 12px;"></i> <b>Tracking </b></a>
                            </li>
                            <li class="dropdown" id="tracking_details">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/TRACK DETAILS.png" style="display: -webkit-box;font-size: initial;padding-left: 25px;height: 32px;"></i> Track Details <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="<?=site_url('Tracking/near_by_client')?>"><b> Find Near By</b></a></li>
                                    <li><a href="<?=site_url('')?>"><b> Ignition On/Off</b></a></li>
                                    <li><a href="<?=site_url('Tracking/playback')?>"><b> Playback</b></a></li>
                                    <li><a href="<?=site_url('')?>"><b> Tracking Summary</b></a></li>
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
                            <li class="dropdown" id="stop_report">
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
          </div>
<style type="text/css">
p {
    margin: 5px;
    margin: 5px 3px 0px 2px;
}
</style>
<?php
     $stop = 0; 
     $running = 0; 
     $gpsnotfixed = 0; 
     $gpsfixed = 0; 
     $parking = 0; 
     $idling = 0; 
     $toweing = 0; 
 
     for ($i=0; $i < count($res1); $i++) 
     {
        if ($res1[$i][0]['vehicle_movement_status'] == "B") {
          $running = $running+1; 
        }elseif ($res1[$i][0]['vehicle_movement_status'] == "c") {
          $parking = $parking+1; 
        }elseif ($res1[$i][0]['vehicle_movement_status'] == "d") {
          $idling = $idling+1; 
        }elseif ($res1[$i][0]['vehicle_movement_status'] == "e") {
          $toweing = $toweing+1; 
        }else{
          $stop = $stop+1; 
        }
        if ($res1[$i][0]['gps_valid_data'] == "1") {
          $gpsfixed = $gpsfixed+1; 
        } else {
          $gpsnotfixed = $gpsnotfixed+1; 
        }
    }
?>    
  <div class="row" id="hearder_row" style="border-bottom: 3px solid #38b7ec;border-top: 3px solid #38b7ec;background: none repeat scroll 0 0 #404040;color:#e1e1e1;">
      <div class="col-sm-7" style="border-right: 2px solid #686868;padding-right: 0px;">
          <ul class="nav navbar-nav" style="margin-left: 1%;">
              <li><span><img src="<?=base_url()?>assets/img/car_green.png"></span></li>
              <li><p>RUNNING</p></li>
              <li><div class="style-green" id="running" ><?=$running?></div></li>

              <li><span><img src="<?=base_url()?>assets/img/car_red.png"></span></li>
              <li><p>IDLE</p></li>
              <li><div class="style-red" id="stop" ><?=$stop?></div></li>



              <li><span><img src="<?=base_url()?>assets/img/car_yellow.png"></span></li>
              <li><p>PARKING</p></li>
              <li><div class="style-yellow" id="parking" ><?=$parking?></div></li>

              <li><span><img src="<?=base_url()?>assets/img/car_blue.png"></span></li>
              <li><p>IDLING</p></li>
              <li><div class="style-blue" id="idling" ><?=$idling?></div></li>

              <li><span><img src="<?=base_url()?>assets/img/car_gray.png"></span></li>
              <li><p>TOWING</p></li>
              <li><div class="style-gray" id="toweing" ><?=$toweing?></div></li>



              <li><span><img src="<?=base_url()?>assets/img/car_darkgreen.png"></span></li>
              <li><p>GPS LOCATION</p></li>
              <li><div class="style-darkgreen" id="gpsfixed" ><?=$gpsfixed?></div></li>

              <li><span><img src="<?=base_url()?>assets/img/purpal.png"></span></li>
              <li><p>CELLID LOCATION</p></li>
              <li><div class="style-purpal" id="gpsnotfixed" ><?=$gpsnotfixed?></div></li>
          </ul>
      </div>
      <div class="col-sm-2" style="border-right: 2px solid #686868;padding: 0px;">
          <ul class="nav navbar-nav" style="margin-left: 1%;">
              <li><p style="margin: 3px 8px 0px 8px;" id="ign">
                <?php if ($ignition == "1"){ ?>
                    <img width="64" height="24" src="<?=base_url()?>assets/img/ignition-on.png">
                <?php }else{ ?>
                    <img width="64" height="24" src="<?=base_url()?>assets/img/ignition-off.png">
                <?php } ?>
                  </p>
              </li>
              <li><p style="margin: 3px 8px 0px 8px;" id="pow">
                <?php if ($power_status == "1") { ?>
                    <img width="64" height="24" src="<?=base_url()?>assets/img/power-on.png">
                <?php }else{ ?>
                    <img width="64" height="24" src="<?=base_url()?>assets/img/power-off.png">
                <?php } ?>
                  </p>
              </li>

              <li><p style="margin: 3px 8px 0px 8px;" id="gps">
                <?php if ($gps_valid_data == "1") { ?>
                    <img width="64" height="24" src="<?=base_url()?>assets/img/gps-on.png">
                <?php }else{ ?>
                    <img width="64" height="24" src="<?=base_url()?>assets/img/gps-off.png">
                <?php } ?>
                  </p>
              </li>
          </ul>
      </div>
      <div class="col-sm-3">
         <ul class="nav navbar-nav" style="margin-right: 15px;">
              <li><p>Today's Run :</p></li>
              <li class="gray-kms" id="max_run"><?=$max_run?></li>
              <li class="style9">km</li>
          </ul>
      
        <ul class="nav navbar-nav" style="margin-left: 15px;">
            <li><p>Total Duration :</p></li>
            <li class="gray-hrs" id="max_run_time" style="width:80px;"> <?=$max_run_time?></li>
        </ul>
      </div>
    </div>

    <div class="wrapper wrapper-content"  style="padding: 0;">
      <div class="row">
        <div class="col-sm-10" style="padding: 0px;">
            <div class="ibox float-e-margins" >
                <div class="ibox-content" style="padding: 0;">
                    <div id="mapcanvas"></div>
                </div>
                <div style="color: black; position: absolute; text-align: center; right: 18px; top: 56px; background-color: rgb(109, 193, 147); border-radius: 6px; padding: 5px; min-width: 150px; min-height: 15px;">
                  <lable style="font-weight: bold;">GSM Signal : </lable>
                  <span style="font-weight: bold;" id="gsm_signal"><?=$gsm_signal_strength?></span>
                </div>
                <div style="color: black; position: absolute; text-align: center; right: 18px; top: 88px; background-color: rgb(109, 193, 147); border-radius: 6px; padding: 5px; min-width: 150px; min-height: 15px;">
                  <lable style="font-weight: bold;">Satellites : </lable>
                  <span style="font-weight: bold;" id="satellites" ><?=$total_satellites?></span>
                </div>
                <div style="color: black; position: absolute; text-align: center; right: 18px; top: 118px; background-color: rgb(109, 193, 147); border-radius: 6px; padding: 5px; min-width: 150px; min-height: 15px;">
                  <lable style="font-weight: bold;">Speed : </lable>
                  <span style="font-weight: bold;"> <span id="speed_label" >0 </span> km/h</span>
                </div>
                <div style="color: black; position: absolute; text-align: center; right: 18px; top: 148px; background-color: rgb(109, 193, 147); border-radius: 6px; padding: 5px; min-width: 150px; min-height: 15px;">
                  <lable style="font-weight: bold;"></lable>
                  <span style="font-weight: bold;"> <span id="time_label" ></span></span>
                </div>
                <div style="position: fixed;padding: 5px; min-width: 80px; min-height: 80px;bottom: 42px;">
                  <img src="<?=$employee_photo?>" style="height:80px;width:80px;">
                </div>
                <div style="color: black; position: fixed; text-align: center; left: 90px; background-color: #f8ac59;bottom: 42px; border-radius: 6px; padding: 5px; min-width: 150px; min-height: 15px;">
                  <lable style="font-weight: bold;"> <?=$driver_mob?></lable>
                </div>
                <div style="color: black; position: fixed; text-align: center; left: 250px; background-color: rgb(109, 193, 147);bottom: 42px; border-radius: 6px; padding: 5px; min-width: 150px; min-height: 15px;">
                  <lable style="font-weight: bold;"><?=$driver_name?> </lable>
                </div>

            </div>
        </div>
        <div class="col-sm-2" style="padding: 0px;">
            <div class="ibox float-e-margins">
                <div class="ibox-title" style="padding-top: 8px;background: #000;">
                      <div class="form-group">
                          <div class="col-sm-12" style="padding: 0;">
                              <h3 style="color: white;"><b>All Device</b></h3>
                          </div>                         
                      </div>
                </div>
                <div class="ibox-content" style="padding-top: 5px;padding: 0;">
                    <div class="form-group" style="max-height: 500px;" id="device_table">
                        <div class="col-lg-12" style="padding: 0;">
                            <table class="table table-hover table-bordered" style="text-align: center;background-color: #fff;"> 
                                <thead>
                                  <tr style="color:#0073ea;">
                                      <th style="text-align: center;" colspan="2">Vehicle</th>
                                      <th style="text-align: center;">Speed</th>
                                      <th style="text-align: center;">Panic</th>
                                  </tr>
                                </thead>
                                <tbody id="vehical_status">
                                  <?php for ($i=0; $i < count($res1); $i++) { ?>
                                  <tr  class="map_details"  title="<?=$res1[$i][0]['device_id']?>">
                                      <td style="border-right: none;">
                                        <a href="<?=site_url('Tracking/index/'.$res1[$i][0]['device_id'])?>" >
                                        <?php if ($res1[$i][0]['vehicle_movement_status'] == "B") { ?>
                                              <img src="<?=base_url()?>assets/img/icon-bus-green.png" alt="running" style="height:20px;float: left;">
                                        <?php  }else { ?>
                                              <img src="<?=base_url()?>assets/img/icon-bus-red.png" alt="stop" style="height:20px;float: left;">
                                        <?php  } ?> 
                                        </a>
                                      </td>
                                      <td style="border-left: none;">
                                        <a href="<?=site_url('Tracking/index/'.$res1[$i][0]['device_id'])?>" >
                                          <label class="control-label vehicle_no"><?=$res1[$i]['vehicle_no']?></label>
                                        </a>
                                      </td>
                                      <td class="text-navy" id="<?=$res1[$i][0]['device_id']?>">
                                        <a href="<?=site_url('Tracking/index/'.$res1[$i][0]['device_id'])?>" >
                                          <?=$res1[$i][0]['speed']?>
                                        </a>
                                      </td>
                                       <?php if ($res1[$i][0]['panic_status'] == "0") { ?>
                                            <td><a href="<?=site_url('Tracking/index/'.$res1[$i][0]['device_id'])?>" ><img src="<?=base_url()?>assets/img/green1.png" alt="" style="height:15px;"></a></td>
                                      <?php  }else { ?>
                                            <td><a href="<?=site_url('Tracking/index/'.$res1[$i][0]['device_id'])?>" ><img src="<?=base_url()?>assets/img/red_deep.png" alt="" style="height:15px;"></a></td>
                                      <?php  } ?>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                            </table>
                        </div>
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
                           <img src="<?php echo $client_logo; ?>" style="height:20px;width:20px;"> <strong style="color:#ffffff;"><?php echo $client_name; ?> </strong> 
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

<script>

</script>
  </body>
</html>