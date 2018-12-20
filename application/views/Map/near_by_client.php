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
    <script src="<?=base_url()?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery-ui.min.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/nouslider/jquery.nouislider.min.js"></script>
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

    var recent_point ;
    var marker;
    var map;
    var markers = [];
    var markers1 = [];
    var device_id;
    var places_arr = [];

  $(document).ready(function () {

      var mapOptions = {
          zoom: 13,
          center: new google.maps.LatLng(18.5204, 73.8567),
          mapTypeControl: false
      };

      map = new google.maps.Map($('#map')[0], mapOptions);

      var infowindow;
      infowindow = new google.maps.InfoWindow();
      var old_range = 2000;
      var new_range;
      var circle = [];
      var j = 0;
      var place_name;
      var place_name1;
      var uniqueId;
      var k = 0;
      var place_data;
      var cityCircle;
      var circle_arr = [];
      // var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
     var icons = {
        accounting: {
              icon: 'http://maps.google.com/mapfiles/kml/pal4/icon4.png'
            },
        airport: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon48.png'
            },
        amusement_park: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon5.png'
            },
        aquarium: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/fishing.png'
            },
        art_gallery: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/arts.png'
            },
        atm: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/dollar.png',
            },
        bakery: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon54.png'
            },
        bank: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon51.png'
            },
        bar: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon27.png'
            },
        beauty_salon: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/salon.png'
            },
        bicycle_store: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/cycling.png'
            },
        book_store: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon14.png'
            },
        bowling_alley: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon57.png'
            },
        bus_station: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/bus.png'
            },
        cafe: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon54.png'
            },
        campground: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/campground.png'
            },
        car_dealer: {
              icon: 'http://maps.google.com/mapfiles/kml/pal4/icon31.png'
            },
        car_rental: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/cabs.png'
            },
        car_repair: {
              icon: 'http://maps.google.com/mapfiles/kml/pal4/icon62.png'
            },
        car_wash: {
              icon: 'http://maps.google.com/mapfiles/kml/pal4/icon54.png'
            },
        casino: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/euro.png'
            },
        cemetery: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon18.png'
            },
        church: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon3.png'
            },
        city_hall: {
              icon: 'http://maps.google.com/mapfiles/kml/pal3/icon48.png'
            },
        clothing_store: {
              icon: 'https://maps.google.com/mapfiles/ms/micons/ylw-pushpin.png'
            },
        convenience_store: {
              icon: 'http://maps.google.com/mapfiles/kml/pal3/icon26.png'
            },
        courthouse: {
              icon: 'http://maps.google.com/mapfiles/kml/pal3/icon21.png'
            },
        dentist: {
              icon: 'http://maps.google.com/mapfiles/kml/pal3/icon46.png'
            },
        department_store: {
              icon: 'http://maps.google.com/mapfiles/kml/pal3/icon18.png'
            },
        doctor: {
              icon: 'http://maps.google.com/mapfiles/kml/pal3/icon38.png'
            },
        electrician: {
              icon: 'http://maps.google.com/mapfiles/kml/pal3/icon28.png'
            },
        electronics_store: {
              icon: 'http://maps.google.com/mapfiles/kml/pal3/icon26.png'
            },
        embassy: {
              icon: 'http://maps.google.com/mapfiles/kml/pal3/icon30.png'
            },
        fire_station: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/volcano.png'
            },
        florist: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/sunny.png'
            },
        funeral_home: {
              icon: 'http://maps.google.com/mapfiles/kml/pal4/icon3.png'
            },
        furniture_store: {
              icon: 'http://maps.google.com/mapfiles/kml/pal5/icon53.png'
            },
        gas_station: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon21.png'
            },
        gym: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/hiker.png'
            },
        hair_care: {
              icon: 'http://maps.google.com/mapfiles/kml/pal5/icon55.png'
            },
        hardware_store: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/mechanic.png'
            },
        hindu_temple: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon2.png'
            },
        home_goods_store: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/homegardenbusiness.png'
            },
        hospital: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/hospitals.png'
            },
        insurance_agency: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/info.png'
            },
        jewelry_store: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/yen.png'
            },
        laundry: {
              icon: 'http://maps.google.com/mapfiles/kml/pal3/icon2.png'
            },
        lawyer: {
              icon: 'http://maps.google.com/mapfiles/kml/pal4/icon8.png'
            },
        library: {
              icon: 'http://maps.google.com/mapfiles/kml/pal3/icon62.png'
            },
        liquor_store: {
              icon: 'https://maps.google.com/mapfiles/ms/micons/blue-pushpin.png'
            },
        local_government_office: {
              icon: 'http://maps.google.com/mapfiles/kml/pal3/icon36.png'
            },
        locksmith: {
              icon: 'https://maps.google.com/mapfiles/ms/micons/grn-pushpin.png'
            },
        lodging: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/lodging.png'
            },
        meal_delivery: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/hotsprings.png'
            },
        meal_takeaway: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon40.png'
            },
        mosque: {
              icon: 'http://maps.google.com/mapfiles/kml/pal3/icon56.png'
            },
        movie_rental: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/movies.png'
            },
        movie_theater: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/movies.png'
            },
        moving_company: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon22.png'
            },
        museum: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/camera.png'
            },
        night_club: {
              icon: 'http://maps.google.com/mapfiles/kml/pal4/icon59.png'
            },
        painter: {
              icon: 'http://maps.google.com/mapfiles/kml/pal4/icon53.png'
            },
        park: {
              icon: 'http://maps.google.com/mapfiles/kml/pal3/icon29.png'
            },
        parking: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/parkinglot.png'
            },
        pet_store: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/horsebackriding.png'
            },
        pharmacy: {
              icon: 'http://maps.google.com/mapfiles/kml/pal3/icon38.png'
            },
        physiotherapist: {
              icon: 'http://maps.google.com/mapfiles/kml/pal5/icon12.png'
            },
        plumber: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/mechanic.png'
            },
        police: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/police.png'
            },
        post_office: {
              icon: 'http://maps.google.com/mapfiles/kml/pal3/icon54.png'
            },
        real_estate_agency: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/realestate.png'
            },
        restaurant: {
              icon: 'http://maps.google.com/mapfiles/kml/pal5/icon32.png'
            },
        roofing_contractor: {
              icon: 'http://maps.google.com/mapfiles/kml/pal5/icon14.png'
            },
        rv_park: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon12.png'
            },
        school: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon14.png'
            },
        shoe_store: {
              icon: 'http://maps.google.com/mapfiles/kml/pal3/icon18.png'
            },
        shopping_mall: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/shopping.png'
            },
        spa: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/sunny.png'
            },
        stadium: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon57.png'
            },
        storage: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon7.png'
            },
        store: {
              icon: 'http://maps.google.com/mapfiles/kml/pal3/icon26.png'
            },
        subway_station: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/subway.png'
            },
        supermarket: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/convienancestore.png'
            },
        synagogue: {
              icon: 'https://maps.google.com/mapfiles/ms/micons/purple-pushpin.png'
            },
        taxi_stand: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/cabs.png'
            },
        train_station: {
              icon: 'https://maps.google.com/mapfiles/kml/shapes/rail.png'
            },
        transit_station: {
              icon: 'https://maps.google.com/mapfiles/ms/micons/pink-pushpin.png'
            },
        travel_agency: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon13.png'
            },
        veterinary_care: {
              icon: 'https://maps.google.com/mapfiles/ms/micons/red-pushpin.png'
            },
        zoo: {
              icon: 'http://maps.google.com/mapfiles/kml/pal2/icon4.png'
            }
      };

      height = $(window).height();
      height1 = $("#collapse").height();
      height4 = $(".ibox-title").height();
      height2 = ((height - height1) - (height1*0.6)-100);
      height3 = ((height - height1) - (height1*0.6)-150 - height4);
      $("#map").height(height2);
      $("#page-wrapper").height(height);
      $("#device_table").height(height3);

      $(document).on('click','#view_places',function(){
          device_id = this.title;
          $(".style_input").prop('checked', false);
          setMapOnAll(null);
          setMapOnAll1(null);
          markers = [];
          markers1 = [];
          places_arr = [];

          $.post('<?=site_url('tracking/last_lat_lon')?>',{device_id:device_id}, function(data){
             
               recent_point = new google.maps.LatLng(data.lat, data.lon);

                if ((data.GPS == "1" && data.movement == "B")) 
                {
                  marker = new google.maps.Marker(
                  {
                    position: recent_point,
                    map: map,
                    title:' Vehicle No : '+data.vehicle_no,
                    icon : 
                    {
                      path: 'M55 84c1,-1 1,0 2,0 1,0 1,0 2,0l10 0c0,0 0,0 1,0 1,0 2,-1 2,0 2,2 -3,1 -5,1 -1,0 -1,0 -1,0 -1,0 -1,1 -2,1l-2 0c0,0 -1,0 -1,0 -2,0 -4,-1 -5,-1 -2,0 -1,-1 -1,-1zm9 -79l0 0c2,0 4,0 6,0 2,1 4,1 5,2 1,2 1,2 1,4 0,0 0,0 -1,0 0,-1 0,-1 0,-2 -1,-1 -3,-2 -4,-2 -2,0 -4,-1 -5,-1 -2,0 -2,0 -2,0 1,0 5,0 6,1 0,0 0,0 0,1 1,1 3,5 5,3 0,0 0,0 0,0 1,0 1,0 1,1 0,1 0,2 0,3 0,1 0,1 1,1 0,2 -1,3 -1,4 1,0 2,1 2,1 0,0 1,0 1,0 0,1 0,1 -1,1 0,0 -1,0 -1,0 -1,0 0,0 -1,-1 0,1 0,1 0,1 0,1 0,1 0,2 0,0 0,0 0,1l0 37c3,0 5,0 7,0 1,0 2,0 3,0 0,0 1,0 1,0 1,0 1,1 2,1 0,-4 -1,-8 -3,-11l-1 -1c0,-1 -1,-1 -1,-1 0,-1 0,-1 1,-1 0,-1 0,-1 0,-1 1,0 1,0 2,1 0,0 0,0 0,1 1,0 1,0 1,0l1 2c1,3 2,6 2,11 1,0 1,0 1,0 0,0 1,0 1,0l5 0c0,-3 -1,-5 -1,-7 -1,-3 -1,-5 -2,-7 -1,-2 -2,-4 -4,-6 0,-1 -1,-2 -1,-2 0,-1 1,-1 1,-2 1,0 2,2 2,2 2,2 4,5 5,8 0,1 0,2 1,3 1,3 2,7 2,11 0,0 1,0 1,0 1,0 2,0 2,0 1,0 2,0 2,0l2 0c0,-4 -1,-7 -1,-10 -1,-2 -1,-3 -2,-4 0,-2 -1,-4 -2,-4l-1 -3c-1,-1 -1,-2 -2,-3 -1,-2 -4,-6 -7,-7 0,-1 1,-1 1,-1 0,-1 1,-1 1,-2 1,1 2,2 3,3l2 3c2,2 4,5 6,8 0,1 0,2 1,2l1 2c2,6 3,10 3,16 0,0 1,0 2,0 0,0 1,0 1,0 2,0 3,0 4,0 0,-9 -3,-17 -6,-23 0,-1 -1,-2 -1,-3 -2,-2 -3,-4 -5,-7 0,0 0,0 0,-1 -1,-1 -2,-2 -3,-2l-1 -2c-1,-1 -2,-1 -3,-2 0,0 1,-2 1,-2 1,0 4,3 5,3l5 7c0,0 1,1 1,1 1,2 2,3 3,5 1,2 2,4 3,7 2,5 4,11 4,17l0 2c0,7 -2,13 -4,19 -1,3 -2,5 -4,8 -1,2 -3,4 -4,7 -1,1 -2,2 -3,3 0,0 0,0 0,0 -1,0 -1,0 -1,0 -1,-1 -1,-1 -1,-1 0,-1 1,-2 1,-2 2,-2 3,-4 4,-6l3 -5c0,-1 1,-1 1,-1 0,-1 0,-1 0,-1 1,-1 1,-2 1,-3 1,0 1,-1 1,-2 0,-1 1,-1 1,-2 1,-4 2,-9 2,-14 -2,0 -5,0 -7,0 0,4 -1,7 -1,9 -1,3 -3,8 -4,11l-1 1c-1,2 -2,4 -4,6l-2 3 -1 -1c0,0 -1,-1 -1,-1 0,0 0,0 0,0 2,-2 3,-4 4,-6 4,-6 7,-14 7,-22 -1,0 -1,0 -2,0l-5 0c0,0 0,0 0,0 0,6 -1,10 -3,14 0,1 -1,1 -1,1 0,1 -3,7 -4,7 0,0 0,0 0,0l-2 -1c0,-1 1,-2 1,-2 1,-1 2,-2 2,-3 2,-5 4,-10 4,-16 -1,0 -1,0 -2,0 0,0 -1,0 -1,0 -2,0 -2,0 -4,0 0,3 0,6 -1,8 -1,1 -1,2 -2,3 0,1 -1,2 -1,3 -1,0 -2,-2 -2,-2 0,0 1,-2 1,-2 2,-3 3,-6 3,-10 -4,0 -7,0 -11,0 -1,0 -1,0 -2,0l0 23c-1,0 -1,0 -2,0 0,0 0,0 0,1 0,2 0,2 -1,2 -3,1 -3,0 -7,1 0,0 0,0 -1,0 0,0 0,0 -1,0 0,0 0,0 0,0 3,0 6,0 9,0 0,0 1,0 1,-1l0 -3c1,0 3,0 3,1 -1,3 -2,3 -5,3 -1,1 -1,0 -2,1 -2,0 -4,0 -6,0 0,0 0,0 0,1 0,0 0,1 0,1 0,2 0,4 0,6 0,1 0,1 0,1 2,0 5,0 7,-1 2,0 3,-1 5,-2 1,1 1,1 1,2 0,1 0,1 -1,1 -4,2 -8,3 -12,3 0,2 0,3 0,4 0,3 -1,3 1,3 0,0 0,0 1,0 0,0 0,0 1,0 5,0 12,-2 17,-5 0,0 0,0 1,0 0,0 1,2 1,2 0,0 -4,2 -5,3l-2 1c-1,0 -2,0 -3,0 -3,2 -6,2 -9,2 -1,0 -1,0 -2,0 0,0 0,0 -1,0 0,0 0,0 0,0 0,1 -1,2 -1,3 0,1 0,1 0,2 0,0 0,1 0,1 9,0 16,-1 23,-4 0,0 1,-1 1,-1l4 -2c0,0 1,2 2,2l-3 2c-4,1 -7,3 -10,4 -10,3 -22,3 -32,0 -2,-1 -5,-2 -7,-3 -1,0 -2,-1 -3,-1l-3 -2c0,0 0,-1 0,-1 1,0 1,-1 1,-1 0,0 1,0 1,1 2,0 3,1 5,2 2,1 4,1 6,2 4,1 7,2 11,2l4 0c0,-2 0,-4 0,-6 -2,0 -4,0 -6,-1 -3,0 -5,-1 -8,-2 -1,0 -2,0 -2,-1 -1,0 -1,0 -2,0l-2 -1c0,0 -1,-1 -1,-1 0,0 1,-2 1,-2 2,0 3,1 5,2 3,1 6,2 9,3 2,0 4,0 6,0 0,0 0,-1 0,-2 0,0 0,-1 0,-1 0,-1 0,-1 0,-1l0 -2c0,-1 1,-1 1,-1 -4,0 -7,-1 -10,-2 -1,0 -3,-1 -4,-2 0,0 1,-1 1,-2 0,0 1,0 1,1 4,1 7,2 12,2 0,-1 0,-3 0,-5 0,0 0,0 0,-1l0 -3c-3,0 -6,0 -9,-1 -3,0 -4,0 -4,-3 -1,-1 -1,-1 0,-1 1,0 2,0 2,0 0,1 0,2 0,3 1,1 2,1 3,1l2 0c1,0 1,0 2,0 0,0 0,0 1,0 1,0 2,0 3,0 0,0 0,0 0,0 -1,0 -2,0 -3,0 -1,0 -2,-1 -3,-1 -1,0 -4,0 -5,0 0,-1 1,-2 1,-3l-3 0 0 -23c-1,0 -1,0 -2,0 0,0 -1,0 -1,0 -1,0 -3,0 -4,0 0,0 -2,0 -3,0 0,0 -1,0 -1,0 -1,0 -1,0 -2,0 0,1 0,1 0,1 0,2 0,3 0,4 1,1 1,2 1,3 0,0 0,1 0,1 1,1 2,3 2,4 0,0 -1,1 -2,1 0,0 -4,-5 -4,-12l0 -2 -6 0c0,0 0,0 0,1 0,5 0,8 2,12 1,3 2,5 3,7 0,1 0,1 0,1 0,1 -1,1 -2,2 0,-1 0,-1 -1,-1 -1,-3 -2,-6 -3,-8 -1,-4 -2,-8 -2,-13 0,0 0,-1 0,-1 -2,0 -5,0 -7,0 0,1 0,1 0,2 0,1 0,1 0,1 0,2 0,4 0,5 1,3 1,5 2,8 1,0 1,1 1,1 1,4 3,7 5,9 0,1 1,1 1,2 0,0 -1,0 -1,1 0,0 -1,0 -1,0 0,0 -1,0 -1,0 -2,-3 -4,-6 -5,-10 0,0 0,0 0,0 -1,-1 -1,-2 -1,-2 -1,-3 -2,-5 -2,-8 -1,-1 -1,-3 -1,-4l0 -3c0,0 0,-1 0,-2l-7 0c0,5 0,8 1,13 1,1 1,3 1,4 1,1 1,2 1,2 0,1 1,1 1,2 0,1 1,3 2,4 0,1 1,2 1,3 1,1 1,2 1,2l4 5c-1,0 -2,1 -3,2 0,-1 0,-2 -1,-2 -4,-7 -7,-13 -9,-22 -2,-4 -2,-8 -2,-12 0,-5 1,-10 3,-15 0,-2 1,-4 2,-6 0,-1 1,-1 1,-2 0,-1 0,-1 1,-1 0,0 0,-1 0,-1l1 -2c1,-2 2,-3 3,-4 0,-1 1,-1 1,-1 1,-2 2,-3 4,-5 0,-1 1,-2 2,-2 1,-1 2,-2 3,-3 0,0 2,-1 2,-1 1,0 1,0 1,0 0,1 1,1 1,2 -1,1 -2,1 -3,2 0,0 -1,0 -1,0l-4 4 -3 4c-1,2 -3,5 -4,6l-2 4c-2,4 -3,8 -4,13 0,1 -1,2 -1,3 0,0 0,1 0,2 0,0 0,1 0,1 1,0 1,0 2,0 1,0 1,0 2,0l2 0c1,0 1,0 1,0 0,0 0,-1 0,-1 0,-1 1,-3 1,-4 0,-3 1,-5 2,-8 1,-2 2,-4 3,-6 2,-3 4,-5 6,-7l0 -1c1,-1 3,-3 4,-3 0,-1 2,-2 3,-2 0,0 1,1 1,2 -1,0 -2,1 -2,1 -2,1 -3,3 -5,5 -1,2 -3,4 -4,6 -1,1 -1,2 -2,2 -1,2 -1,4 -2,7 -1,1 -1,3 -1,4 -1,1 -1,2 -1,3 0,1 0,2 0,2 1,0 1,1 2,1 0,0 1,0 2,0 0,0 1,0 1,0 1,0 2,0 2,0 0,-1 0,-1 0,-1 1,-3 1,-5 2,-7 1,-4 3,-8 5,-11 1,-1 3,-4 5,-5 0,1 1,2 1,3 0,0 0,0 -1,0 -1,1 -3,3 -4,5 -2,4 -4,8 -4,12 -1,1 -1,2 -1,2l0 2c2,0 4,0 6,0 1,-1 1,-1 1,-1 0,-1 0,-3 0,-4 1,0 1,-1 1,-2 1,-2 2,-3 3,-5 0,0 2,-2 3,-3 0,1 1,2 1,3 0,0 -1,0 -1,1 0,0 0,0 -1,0l-1 2c-1,2 -2,4 -2,5 0,1 -1,3 -1,4 2,0 5,0 7,0 2,0 4,0 6,0l0 -41 -2 0c0,0 -1,0 -1,-1 1,0 2,-1 3,-1l0 -8c0,-1 1,-1 1,-1 0,0 1,1 1,1 2,0 2,-1 3,-2 0,-1 1,-2 1,-3 1,0 2,0 3,-1 1,0 2,0 3,0 0,0 0,0 0,0 -1,0 -1,0 -2,0 -1,0 -2,0 -3,1 -2,0 -3,0 -4,1 -1,0 -1,0 -2,1 0,1 0,1 0,2 0,0 0,0 -1,0 0,0 0,0 0,0 0,-1 1,-3 1,-4 1,-1 3,-2 5,-2 2,0 4,0 7,0zm11 77c-1,0 -2,0 -2,-1l0 -43c0,-1 2,-1 2,0 1,0 1,3 1,4 0,1 0,4 0,5 0,3 0,34 -1,34 0,1 0,1 0,1zm-21 -18l0 7c0,1 0,1 0,2 0,1 0,2 0,3 0,1 1,6 -1,6 -1,0 -1,-1 -1,-2l0 -40c0,-1 0,-2 0,-2 0,-1 0,-1 1,-1 2,0 1,4 1,6 0,2 0,5 0,7 0,2 0,5 0,7 0,2 0,5 0,7zm19 -28c0,-3 0,-5 0,-7l0 5c0,0 0,1 0,1 0,1 0,0 0,1zm3 -2l0 0c0,0 -1,-1 0,-1 0,0 0,1 0,1zm-25 0c0,-1 0,-1 0,-1 1,0 1,0 1,1 0,0 0,0 -1,0l0 0zm0 -11l1 -1 0 0c1,1 1,8 1,10 1,1 1,3 0,3 -1,0 -1,-2 -1,-3 0,0 0,-1 0,-1 0,-1 0,-1 0,-2l-1 -6zm25 1c0,2 0,2 0,4l0 2c0,1 -1,5 -2,5 -1,0 0,-4 0,-5 0,-3 0,-2 0,-6 0,0 1,-1 1,-1 0,-1 0,-1 0,-1 0,0 0,-1 0,-1 0,0 0,0 1,0 0,1 0,1 0,1 0,1 0,1 0,2zm-24 -3l0 0c0,0 0,0 0,0zm-1 -1l1 0 0 0 -1 0 0 0zm12 -5l6 0c6,1 6,2 5,8 0,2 -1,4 -1,6l0 0c0,-1 0,-2 0,-3l-9 -1c-1,0 -2,1 -3,1 0,0 -1,0 -2,0l-4 0c0,0 0,0 -1,0l0 1c0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,-1 -1,-7 -1,-8 0,0 0,-1 0,-2 1,-1 1,-1 2,-1 3,-1 5,-1 8,-1zm-5 -8l1 0c1,-1 3,0 5,0 1,0 1,-1 3,0 1,0 2,0 2,0 0,0 -3,0 -4,0 0,0 -2,0 -2,0 -2,0 -3,0 -4,0 0,0 0,0 -1,0z',
                      scale: 0.5,
                      fillColor: 'green',
                      fillOpacity: 1,
                      anchor: new google.maps.Point(25, 50)
                    }
                  });
                }
                else if ((data.GPS == "1")) 
                {
                  marker = new google.maps.Marker(
                  {
                    position: recent_point,
                    map: map,
                    title:' Vehicle No : '+data.vehicle_no,
                    icon : 
                    {
                      path: 'M55 84c1,-1 1,0 2,0 1,0 1,0 2,0l10 0c0,0 0,0 1,0 1,0 2,-1 2,0 2,2 -3,1 -5,1 -1,0 -1,0 -1,0 -1,0 -1,1 -2,1l-2 0c0,0 -1,0 -1,0 -2,0 -4,-1 -5,-1 -2,0 -1,-1 -1,-1zm9 -79l0 0c2,0 4,0 6,0 2,1 4,1 5,2 1,2 1,2 1,4 0,0 0,0 -1,0 0,-1 0,-1 0,-2 -1,-1 -3,-2 -4,-2 -2,0 -4,-1 -5,-1 -2,0 -2,0 -2,0 1,0 5,0 6,1 0,0 0,0 0,1 1,1 3,5 5,3 0,0 0,0 0,0 1,0 1,0 1,1 0,1 0,2 0,3 0,1 0,1 1,1 0,2 -1,3 -1,4 1,0 2,1 2,1 0,0 1,0 1,0 0,1 0,1 -1,1 0,0 -1,0 -1,0 -1,0 0,0 -1,-1 0,1 0,1 0,1 0,1 0,1 0,2 0,0 0,0 0,1l0 37c3,0 5,0 7,0 1,0 2,0 3,0 0,0 1,0 1,0 1,0 1,1 2,1 0,-4 -1,-8 -3,-11l-1 -1c0,-1 -1,-1 -1,-1 0,-1 0,-1 1,-1 0,-1 0,-1 0,-1 1,0 1,0 2,1 0,0 0,0 0,1 1,0 1,0 1,0l1 2c1,3 2,6 2,11 1,0 1,0 1,0 0,0 1,0 1,0l5 0c0,-3 -1,-5 -1,-7 -1,-3 -1,-5 -2,-7 -1,-2 -2,-4 -4,-6 0,-1 -1,-2 -1,-2 0,-1 1,-1 1,-2 1,0 2,2 2,2 2,2 4,5 5,8 0,1 0,2 1,3 1,3 2,7 2,11 0,0 1,0 1,0 1,0 2,0 2,0 1,0 2,0 2,0l2 0c0,-4 -1,-7 -1,-10 -1,-2 -1,-3 -2,-4 0,-2 -1,-4 -2,-4l-1 -3c-1,-1 -1,-2 -2,-3 -1,-2 -4,-6 -7,-7 0,-1 1,-1 1,-1 0,-1 1,-1 1,-2 1,1 2,2 3,3l2 3c2,2 4,5 6,8 0,1 0,2 1,2l1 2c2,6 3,10 3,16 0,0 1,0 2,0 0,0 1,0 1,0 2,0 3,0 4,0 0,-9 -3,-17 -6,-23 0,-1 -1,-2 -1,-3 -2,-2 -3,-4 -5,-7 0,0 0,0 0,-1 -1,-1 -2,-2 -3,-2l-1 -2c-1,-1 -2,-1 -3,-2 0,0 1,-2 1,-2 1,0 4,3 5,3l5 7c0,0 1,1 1,1 1,2 2,3 3,5 1,2 2,4 3,7 2,5 4,11 4,17l0 2c0,7 -2,13 -4,19 -1,3 -2,5 -4,8 -1,2 -3,4 -4,7 -1,1 -2,2 -3,3 0,0 0,0 0,0 -1,0 -1,0 -1,0 -1,-1 -1,-1 -1,-1 0,-1 1,-2 1,-2 2,-2 3,-4 4,-6l3 -5c0,-1 1,-1 1,-1 0,-1 0,-1 0,-1 1,-1 1,-2 1,-3 1,0 1,-1 1,-2 0,-1 1,-1 1,-2 1,-4 2,-9 2,-14 -2,0 -5,0 -7,0 0,4 -1,7 -1,9 -1,3 -3,8 -4,11l-1 1c-1,2 -2,4 -4,6l-2 3 -1 -1c0,0 -1,-1 -1,-1 0,0 0,0 0,0 2,-2 3,-4 4,-6 4,-6 7,-14 7,-22 -1,0 -1,0 -2,0l-5 0c0,0 0,0 0,0 0,6 -1,10 -3,14 0,1 -1,1 -1,1 0,1 -3,7 -4,7 0,0 0,0 0,0l-2 -1c0,-1 1,-2 1,-2 1,-1 2,-2 2,-3 2,-5 4,-10 4,-16 -1,0 -1,0 -2,0 0,0 -1,0 -1,0 -2,0 -2,0 -4,0 0,3 0,6 -1,8 -1,1 -1,2 -2,3 0,1 -1,2 -1,3 -1,0 -2,-2 -2,-2 0,0 1,-2 1,-2 2,-3 3,-6 3,-10 -4,0 -7,0 -11,0 -1,0 -1,0 -2,0l0 23c-1,0 -1,0 -2,0 0,0 0,0 0,1 0,2 0,2 -1,2 -3,1 -3,0 -7,1 0,0 0,0 -1,0 0,0 0,0 -1,0 0,0 0,0 0,0 3,0 6,0 9,0 0,0 1,0 1,-1l0 -3c1,0 3,0 3,1 -1,3 -2,3 -5,3 -1,1 -1,0 -2,1 -2,0 -4,0 -6,0 0,0 0,0 0,1 0,0 0,1 0,1 0,2 0,4 0,6 0,1 0,1 0,1 2,0 5,0 7,-1 2,0 3,-1 5,-2 1,1 1,1 1,2 0,1 0,1 -1,1 -4,2 -8,3 -12,3 0,2 0,3 0,4 0,3 -1,3 1,3 0,0 0,0 1,0 0,0 0,0 1,0 5,0 12,-2 17,-5 0,0 0,0 1,0 0,0 1,2 1,2 0,0 -4,2 -5,3l-2 1c-1,0 -2,0 -3,0 -3,2 -6,2 -9,2 -1,0 -1,0 -2,0 0,0 0,0 -1,0 0,0 0,0 0,0 0,1 -1,2 -1,3 0,1 0,1 0,2 0,0 0,1 0,1 9,0 16,-1 23,-4 0,0 1,-1 1,-1l4 -2c0,0 1,2 2,2l-3 2c-4,1 -7,3 -10,4 -10,3 -22,3 -32,0 -2,-1 -5,-2 -7,-3 -1,0 -2,-1 -3,-1l-3 -2c0,0 0,-1 0,-1 1,0 1,-1 1,-1 0,0 1,0 1,1 2,0 3,1 5,2 2,1 4,1 6,2 4,1 7,2 11,2l4 0c0,-2 0,-4 0,-6 -2,0 -4,0 -6,-1 -3,0 -5,-1 -8,-2 -1,0 -2,0 -2,-1 -1,0 -1,0 -2,0l-2 -1c0,0 -1,-1 -1,-1 0,0 1,-2 1,-2 2,0 3,1 5,2 3,1 6,2 9,3 2,0 4,0 6,0 0,0 0,-1 0,-2 0,0 0,-1 0,-1 0,-1 0,-1 0,-1l0 -2c0,-1 1,-1 1,-1 -4,0 -7,-1 -10,-2 -1,0 -3,-1 -4,-2 0,0 1,-1 1,-2 0,0 1,0 1,1 4,1 7,2 12,2 0,-1 0,-3 0,-5 0,0 0,0 0,-1l0 -3c-3,0 -6,0 -9,-1 -3,0 -4,0 -4,-3 -1,-1 -1,-1 0,-1 1,0 2,0 2,0 0,1 0,2 0,3 1,1 2,1 3,1l2 0c1,0 1,0 2,0 0,0 0,0 1,0 1,0 2,0 3,0 0,0 0,0 0,0 -1,0 -2,0 -3,0 -1,0 -2,-1 -3,-1 -1,0 -4,0 -5,0 0,-1 1,-2 1,-3l-3 0 0 -23c-1,0 -1,0 -2,0 0,0 -1,0 -1,0 -1,0 -3,0 -4,0 0,0 -2,0 -3,0 0,0 -1,0 -1,0 -1,0 -1,0 -2,0 0,1 0,1 0,1 0,2 0,3 0,4 1,1 1,2 1,3 0,0 0,1 0,1 1,1 2,3 2,4 0,0 -1,1 -2,1 0,0 -4,-5 -4,-12l0 -2 -6 0c0,0 0,0 0,1 0,5 0,8 2,12 1,3 2,5 3,7 0,1 0,1 0,1 0,1 -1,1 -2,2 0,-1 0,-1 -1,-1 -1,-3 -2,-6 -3,-8 -1,-4 -2,-8 -2,-13 0,0 0,-1 0,-1 -2,0 -5,0 -7,0 0,1 0,1 0,2 0,1 0,1 0,1 0,2 0,4 0,5 1,3 1,5 2,8 1,0 1,1 1,1 1,4 3,7 5,9 0,1 1,1 1,2 0,0 -1,0 -1,1 0,0 -1,0 -1,0 0,0 -1,0 -1,0 -2,-3 -4,-6 -5,-10 0,0 0,0 0,0 -1,-1 -1,-2 -1,-2 -1,-3 -2,-5 -2,-8 -1,-1 -1,-3 -1,-4l0 -3c0,0 0,-1 0,-2l-7 0c0,5 0,8 1,13 1,1 1,3 1,4 1,1 1,2 1,2 0,1 1,1 1,2 0,1 1,3 2,4 0,1 1,2 1,3 1,1 1,2 1,2l4 5c-1,0 -2,1 -3,2 0,-1 0,-2 -1,-2 -4,-7 -7,-13 -9,-22 -2,-4 -2,-8 -2,-12 0,-5 1,-10 3,-15 0,-2 1,-4 2,-6 0,-1 1,-1 1,-2 0,-1 0,-1 1,-1 0,0 0,-1 0,-1l1 -2c1,-2 2,-3 3,-4 0,-1 1,-1 1,-1 1,-2 2,-3 4,-5 0,-1 1,-2 2,-2 1,-1 2,-2 3,-3 0,0 2,-1 2,-1 1,0 1,0 1,0 0,1 1,1 1,2 -1,1 -2,1 -3,2 0,0 -1,0 -1,0l-4 4 -3 4c-1,2 -3,5 -4,6l-2 4c-2,4 -3,8 -4,13 0,1 -1,2 -1,3 0,0 0,1 0,2 0,0 0,1 0,1 1,0 1,0 2,0 1,0 1,0 2,0l2 0c1,0 1,0 1,0 0,0 0,-1 0,-1 0,-1 1,-3 1,-4 0,-3 1,-5 2,-8 1,-2 2,-4 3,-6 2,-3 4,-5 6,-7l0 -1c1,-1 3,-3 4,-3 0,-1 2,-2 3,-2 0,0 1,1 1,2 -1,0 -2,1 -2,1 -2,1 -3,3 -5,5 -1,2 -3,4 -4,6 -1,1 -1,2 -2,2 -1,2 -1,4 -2,7 -1,1 -1,3 -1,4 -1,1 -1,2 -1,3 0,1 0,2 0,2 1,0 1,1 2,1 0,0 1,0 2,0 0,0 1,0 1,0 1,0 2,0 2,0 0,-1 0,-1 0,-1 1,-3 1,-5 2,-7 1,-4 3,-8 5,-11 1,-1 3,-4 5,-5 0,1 1,2 1,3 0,0 0,0 -1,0 -1,1 -3,3 -4,5 -2,4 -4,8 -4,12 -1,1 -1,2 -1,2l0 2c2,0 4,0 6,0 1,-1 1,-1 1,-1 0,-1 0,-3 0,-4 1,0 1,-1 1,-2 1,-2 2,-3 3,-5 0,0 2,-2 3,-3 0,1 1,2 1,3 0,0 -1,0 -1,1 0,0 0,0 -1,0l-1 2c-1,2 -2,4 -2,5 0,1 -1,3 -1,4 2,0 5,0 7,0 2,0 4,0 6,0l0 -41 -2 0c0,0 -1,0 -1,-1 1,0 2,-1 3,-1l0 -8c0,-1 1,-1 1,-1 0,0 1,1 1,1 2,0 2,-1 3,-2 0,-1 1,-2 1,-3 1,0 2,0 3,-1 1,0 2,0 3,0 0,0 0,0 0,0 -1,0 -1,0 -2,0 -1,0 -2,0 -3,1 -2,0 -3,0 -4,1 -1,0 -1,0 -2,1 0,1 0,1 0,2 0,0 0,0 -1,0 0,0 0,0 0,0 0,-1 1,-3 1,-4 1,-1 3,-2 5,-2 2,0 4,0 7,0zm11 77c-1,0 -2,0 -2,-1l0 -43c0,-1 2,-1 2,0 1,0 1,3 1,4 0,1 0,4 0,5 0,3 0,34 -1,34 0,1 0,1 0,1zm-21 -18l0 7c0,1 0,1 0,2 0,1 0,2 0,3 0,1 1,6 -1,6 -1,0 -1,-1 -1,-2l0 -40c0,-1 0,-2 0,-2 0,-1 0,-1 1,-1 2,0 1,4 1,6 0,2 0,5 0,7 0,2 0,5 0,7 0,2 0,5 0,7zm19 -28c0,-3 0,-5 0,-7l0 5c0,0 0,1 0,1 0,1 0,0 0,1zm3 -2l0 0c0,0 -1,-1 0,-1 0,0 0,1 0,1zm-25 0c0,-1 0,-1 0,-1 1,0 1,0 1,1 0,0 0,0 -1,0l0 0zm0 -11l1 -1 0 0c1,1 1,8 1,10 1,1 1,3 0,3 -1,0 -1,-2 -1,-3 0,0 0,-1 0,-1 0,-1 0,-1 0,-2l-1 -6zm25 1c0,2 0,2 0,4l0 2c0,1 -1,5 -2,5 -1,0 0,-4 0,-5 0,-3 0,-2 0,-6 0,0 1,-1 1,-1 0,-1 0,-1 0,-1 0,0 0,-1 0,-1 0,0 0,0 1,0 0,1 0,1 0,1 0,1 0,1 0,2zm-24 -3l0 0c0,0 0,0 0,0zm-1 -1l1 0 0 0 -1 0 0 0zm12 -5l6 0c6,1 6,2 5,8 0,2 -1,4 -1,6l0 0c0,-1 0,-2 0,-3l-9 -1c-1,0 -2,1 -3,1 0,0 -1,0 -2,0l-4 0c0,0 0,0 -1,0l0 1c0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,-1 -1,-7 -1,-8 0,0 0,-1 0,-2 1,-1 1,-1 2,-1 3,-1 5,-1 8,-1zm-5 -8l1 0c1,-1 3,0 5,0 1,0 1,-1 3,0 1,0 2,0 2,0 0,0 -3,0 -4,0 0,0 -2,0 -2,0 -2,0 -3,0 -4,0 0,0 0,0 -1,0z',
                      scale: 0.5,
                      fillColor: 'red',
                      fillOpacity: 1,
                      anchor: new google.maps.Point(25, 50)
                    }
                   });
                }
                else if ((data.GPS == "3" && data.movement == "B")) 
                {
                  marker = new google.maps.Marker(
                  {
                    position: recent_point,
                    map: map,
                    title:' Vehicle No : '+data.vehicle_no,
                    icon : 
                    {
                      path: 'M201 445c5,-1 6,0 12,0 4,1 6,1 10,1l55 0c2,0 3,-1 5,-1 7,0 10,-1 15,0 5,12 -19,10 -30,10 -3,0 -4,1 -7,1 -3,0 -5,0 -7,0l-14 0c-2,0 -5,0 -7,0 -7,0 -21,-1 -27,-3 -7,-2 -6,-3 -5,-8zm48 -431l1 0c11,0 25,1 36,3 10,1 22,2 27,12 3,6 5,11 5,20 -3,-1 -3,-3 -5,-3 0,-3 -2,-6 -3,-8 -5,-8 -13,-10 -22,-12 -10,-1 -18,-5 -28,-4 -10,0 -8,-2 -10,0 8,0 27,1 34,5 1,1 1,1 1,3 2,7 15,28 25,20 1,0 2,-2 2,-3 3,0 5,2 6,5 1,5 1,14 1,20 0,2 1,2 1,5 0,8 -1,15 -1,23 3,0 6,0 8,1 2,1 6,2 6,4 0,6 0,6 -6,5 -2,-1 -2,-1 -4,-1 -5,-2 -3,-2 -6,-4 0,2 2,1 2,5 0,2 0,5 0,7 0,3 0,4 0,7l0 205 0 1 0 127c-5,0 -9,0 -14,0 0,2 0,2 0,4 0,12 1,13 -2,13 -20,4 -18,3 -38,4 -3,0 -4,1 -7,0 -1,0 -4,0 -6,0 1,1 1,1 1,3 16,0 31,0 47,-3 2,0 6,0 6,-2l-1 -17c7,0 17,-2 16,4 -2,16 -11,19 -26,20 -3,0 -7,0 -10,0l-33 1 -2 0c-16,0 -33,1 -49,-1 -13,-2 -23,-3 -23,-19 -1,-5 -3,-5 4,-5 4,0 6,0 11,0 0,6 -1,12 -1,18 3,1 9,2 13,2l14 1c3,0 6,0 8,0 2,0 4,1 7,1 5,0 10,0 15,0 0,-1 0,-2 1,-3 -5,0 -10,0 -16,0 -4,0 -9,-1 -14,-1 -6,0 -23,-2 -27,-3 0,-6 1,-11 1,-18l-14 1 0 -122 0 -2 0 -225 -13 2c0,-1 -1,-4 -1,-6 6,-3 7,-4 14,-4l1 -47c0,-3 2,-4 4,-6 2,1 4,5 7,5 8,0 11,-5 15,-10 2,-3 7,-10 7,-15 6,-2 8,-3 16,-4 5,0 11,-1 18,-1 -2,-2 -2,-1 -5,-1 -2,1 -4,0 -6,1 -8,0 -13,1 -21,3 -6,2 -12,1 -19,5 -5,3 -6,4 -9,9 -4,7 0,5 -4,8 -1,1 -1,1 -2,1 0,1 -1,1 -1,1 0,-7 2,-15 5,-20 6,-10 17,-11 27,-12 12,-2 24,-3 36,-3zm60 423c-4,0 -7,-1 -7,-7l0 -232c0,-9 9,-10 12,-5 2,6 0,19 1,23 1,7 -1,22 -1,31 0,13 1,182 0,186 -1,2 -2,4 -5,4zm-112 -97l0 37c0,3 0,5 0,8 0,6 0,12 0,17 0,6 5,34 -5,34 -6,0 -7,-5 -7,-13l0 -218c0,-3 0,-8 1,-10 0,-3 2,-5 5,-5 10,0 6,23 6,32 0,13 0,26 0,39 0,13 0,25 0,39 0,13 0,26 0,40zm104 -157c0,-13 0,-25 0,-37l1 29c0,1 1,5 0,6 0,2 1,1 -1,2zm16 -7l-3 0c0,-4 0,-6 2,-7 2,1 2,6 1,7zm-136 -4c0,-1 1,-1 1,-3 3,0 3,1 3,6 0,2 -2,2 -4,2l0 -5zm2 -59l0 -7 5 0c3,7 5,44 5,54 1,6 3,18 -2,18 -6,0 -5,-9 -6,-13 0,-2 0,-6 0,-8 -1,-3 -1,-6 -1,-9l-1 -35zm133 6c0,10 -1,12 -1,22l-1 14c0,3 0,23 -6,23 -7,0 -3,-22 -3,-27 1,-18 0,-12 3,-30 0,-3 1,-6 1,-9 1,-2 1,-3 1,-4 1,-2 1,-3 3,-3 1,-2 0,-1 3,-1 0,3 -1,4 -1,7 0,3 1,4 1,8zm-131 -16l0 0c0,0 0,0 0,0zm-2 -3l2 0 0 0 -2 0 0 0zm64 -30l33 2c33,5 32,9 26,40 -1,11 -4,21 -4,33l0 0c0,-6 -1,-9 -1,-13l-51 -5c-3,0 -10,1 -13,1 -3,1 -6,0 -13,1l-20 2c-2,0 -4,0 -7,0l0 6c0,0 0,-1 0,-1 0,0 0,0 0,0 -1,-2 1,2 0,-1 -2,-4 -7,-37 -8,-40 0,-5 0,-10 3,-14 2,-3 6,-5 10,-6 14,-3 30,-5 45,-5zm-27 -42l3 -2c8,-2 19,-1 27,-1 8,0 6,-1 17,0 4,0 12,1 14,4 -4,0 -17,-2 -22,-3 -2,0 -13,0 -15,0 -7,1 -13,1 -20,1 -2,0 -2,1 -4,1z',
                      scale: 0.1,
                      fillColor: 'green',
                      fillOpacity: 1,
                      anchor: new google.maps.Point(25, 50)
                    }
                  });
                }
                else  
                {
                  marker = new google.maps.Marker(
                  {
                    position: recent_point,
                    map: map,
                    title:' Vehicle No : '+data.vehicle_no,
                    icon : 
                    {
                      path: 'M201 445c5,-1 6,0 12,0 4,1 6,1 10,1l55 0c2,0 3,-1 5,-1 7,0 10,-1 15,0 5,12 -19,10 -30,10 -3,0 -4,1 -7,1 -3,0 -5,0 -7,0l-14 0c-2,0 -5,0 -7,0 -7,0 -21,-1 -27,-3 -7,-2 -6,-3 -5,-8zm48 -431l1 0c11,0 25,1 36,3 10,1 22,2 27,12 3,6 5,11 5,20 -3,-1 -3,-3 -5,-3 0,-3 -2,-6 -3,-8 -5,-8 -13,-10 -22,-12 -10,-1 -18,-5 -28,-4 -10,0 -8,-2 -10,0 8,0 27,1 34,5 1,1 1,1 1,3 2,7 15,28 25,20 1,0 2,-2 2,-3 3,0 5,2 6,5 1,5 1,14 1,20 0,2 1,2 1,5 0,8 -1,15 -1,23 3,0 6,0 8,1 2,1 6,2 6,4 0,6 0,6 -6,5 -2,-1 -2,-1 -4,-1 -5,-2 -3,-2 -6,-4 0,2 2,1 2,5 0,2 0,5 0,7 0,3 0,4 0,7l0 205 0 1 0 127c-5,0 -9,0 -14,0 0,2 0,2 0,4 0,12 1,13 -2,13 -20,4 -18,3 -38,4 -3,0 -4,1 -7,0 -1,0 -4,0 -6,0 1,1 1,1 1,3 16,0 31,0 47,-3 2,0 6,0 6,-2l-1 -17c7,0 17,-2 16,4 -2,16 -11,19 -26,20 -3,0 -7,0 -10,0l-33 1 -2 0c-16,0 -33,1 -49,-1 -13,-2 -23,-3 -23,-19 -1,-5 -3,-5 4,-5 4,0 6,0 11,0 0,6 -1,12 -1,18 3,1 9,2 13,2l14 1c3,0 6,0 8,0 2,0 4,1 7,1 5,0 10,0 15,0 0,-1 0,-2 1,-3 -5,0 -10,0 -16,0 -4,0 -9,-1 -14,-1 -6,0 -23,-2 -27,-3 0,-6 1,-11 1,-18l-14 1 0 -122 0 -2 0 -225 -13 2c0,-1 -1,-4 -1,-6 6,-3 7,-4 14,-4l1 -47c0,-3 2,-4 4,-6 2,1 4,5 7,5 8,0 11,-5 15,-10 2,-3 7,-10 7,-15 6,-2 8,-3 16,-4 5,0 11,-1 18,-1 -2,-2 -2,-1 -5,-1 -2,1 -4,0 -6,1 -8,0 -13,1 -21,3 -6,2 -12,1 -19,5 -5,3 -6,4 -9,9 -4,7 0,5 -4,8 -1,1 -1,1 -2,1 0,1 -1,1 -1,1 0,-7 2,-15 5,-20 6,-10 17,-11 27,-12 12,-2 24,-3 36,-3zm60 423c-4,0 -7,-1 -7,-7l0 -232c0,-9 9,-10 12,-5 2,6 0,19 1,23 1,7 -1,22 -1,31 0,13 1,182 0,186 -1,2 -2,4 -5,4zm-112 -97l0 37c0,3 0,5 0,8 0,6 0,12 0,17 0,6 5,34 -5,34 -6,0 -7,-5 -7,-13l0 -218c0,-3 0,-8 1,-10 0,-3 2,-5 5,-5 10,0 6,23 6,32 0,13 0,26 0,39 0,13 0,25 0,39 0,13 0,26 0,40zm104 -157c0,-13 0,-25 0,-37l1 29c0,1 1,5 0,6 0,2 1,1 -1,2zm16 -7l-3 0c0,-4 0,-6 2,-7 2,1 2,6 1,7zm-136 -4c0,-1 1,-1 1,-3 3,0 3,1 3,6 0,2 -2,2 -4,2l0 -5zm2 -59l0 -7 5 0c3,7 5,44 5,54 1,6 3,18 -2,18 -6,0 -5,-9 -6,-13 0,-2 0,-6 0,-8 -1,-3 -1,-6 -1,-9l-1 -35zm133 6c0,10 -1,12 -1,22l-1 14c0,3 0,23 -6,23 -7,0 -3,-22 -3,-27 1,-18 0,-12 3,-30 0,-3 1,-6 1,-9 1,-2 1,-3 1,-4 1,-2 1,-3 3,-3 1,-2 0,-1 3,-1 0,3 -1,4 -1,7 0,3 1,4 1,8zm-131 -16l0 0c0,0 0,0 0,0zm-2 -3l2 0 0 0 -2 0 0 0zm64 -30l33 2c33,5 32,9 26,40 -1,11 -4,21 -4,33l0 0c0,-6 -1,-9 -1,-13l-51 -5c-3,0 -10,1 -13,1 -3,1 -6,0 -13,1l-20 2c-2,0 -4,0 -7,0l0 6c0,0 0,-1 0,-1 0,0 0,0 0,0 -1,-2 1,2 0,-1 -2,-4 -7,-37 -8,-40 0,-5 0,-10 3,-14 2,-3 6,-5 10,-6 14,-3 30,-5 45,-5zm-27 -42l3 -2c8,-2 19,-1 27,-1 8,0 6,-1 17,0 4,0 12,1 14,4 -4,0 -17,-2 -22,-3 -2,0 -13,0 -15,0 -7,1 -13,1 -20,1 -2,0 -2,1 -4,1z',
                      scale: 0.1,
                      fillColor: 'red',
                      fillOpacity: 1,
                      anchor: new google.maps.Point(25, 50)
                    }
                  });
                }

              markers1.push(marker);
              map.setCenter(recent_point);
              $('#place_div').show();    
              $('#slider_div').show();    
              $('#select_vehicle').hide();    

                cityCircle = new google.maps.Circle({
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                map: map,
                center: recent_point,
                radius: old_range
              });  
              circle_arr.push(cityCircle);
              
              // cityCircle.setMap(null);
              for (var l = 0; l < circle_arr.length; l++) {
                circle_arr[l].setMap(null);
              }

                cityCircle = new google.maps.Circle({
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                map: map,
                center: recent_point,
                radius: old_range
              }); 
              circle_arr.push(cityCircle); 

          },'json');
      });  

       $(document).on('click','.style_input',function(){
          var data = this.title;
          var data1 = data.split("@");
          uniqueId  =  data1[0];
          var place = data1[1];

          // var place = this.title;
          place_name1 = place;
          // alert(place);
           if ($('#'+place+'').is(':checked'))
           {
                // new_id = uniqueId;
                // uniqueId++;
                var service = new google.maps.places.PlacesService(map);
                service.nearbySearch({
                  location: recent_point,
                  radius: old_range,
                  type: [place]
                }, callback1);

                // places_arr.push(place);
                places_arr.push(data);

           }else{

              var removeItem = data;

              places_arr = jQuery.grep(places_arr, function(value) {
                return value != removeItem;
              });
                  // console.log(places_arr);

                  for (var i = 0; i < markers.length; i++) {
                      if (markers[i].id == uniqueId) {
                          //Remove the marker from Map                  
                          markers[i].setMap(null);
           
                          //Remove the marker from array.
                          // markers.splice(i, 1);
                          // return;
                      }
                  }
           }
      });


      $(document).on('click','#tab1a',function(){
          $('#list_div').toggle();
      });

      function callback(results, status) {
          // console.log(k);
          place_data = places_arr[k];
          var place_data1 = place_data.split("@");
          uniqueId  =  place_data1[0];
          var place = place_data1[1];
          place_name1 = place;
          // console.log(place_data);
          if (status === google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
              createMarker(results[i]);
            }
            k++;
          }
      }
      function callback1(results, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
              createMarker1(results[i]);
              // console.log(uniqueId);
            }
          }
      }

      function createMarker(place) {
          var id = uniqueId;
          // console.log(id);
          // console.log(place_name1);
          var placeLoc = place.geometry.location;
          var marker = new google.maps.Marker({
            map: map,
            position: place.geometry.location,
            id: id,
            icon : {
                  url: icons[place_name1].icon, // url
                  scaledSize: new google.maps.Size(30, 30), // size
              }
          });
          // console.log(id);
          markers.push(marker);

          google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent(place.name);
            infowindow.open(map, this);
          });
      }
      
      function createMarker1(place) {
          var id = uniqueId;
          // console.log(id);
          // console.log(place_name1);
          var placeLoc = place.geometry.location;
          var marker = new google.maps.Marker({
            map: map,
            position: place.geometry.location,
            id: id,
            icon : {
                  url: icons[place_name1].icon, // url
                  scaledSize: new google.maps.Size(30, 30), // size
              }
          });
          // console.log(id);
          markers.push(marker);

          google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent(place.name);
            infowindow.open(map, this);
          });
      }

      function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }

      function setMapOnAll1(map) {
        for (var i = 0; i < markers1.length; i++) {
          markers1[i].setMap(map);
        }
      }

      var slider = document.getElementById('slider');

        noUiSlider.create(slider, {
            start: [ 2000 ],
            // step: 10,
            range: {
              'min': [ 500 ],
              'max': [ 20000 ]
              },
            format: {
                to: function ( value ) {
                return Math.round(value);

                },
                from: function ( value ) {
                return value.replace(',-', '');
                }
              }
        });

        $(document).on('click','#slider',function(){
              k = 0;
              cityCircle.setMap(null);
              new_range = slider.noUiSlider.get();

                if (old_range > new_range) 
                {
                  setMapOnAll(null);
                  markers = [];
                };

                for (var i = 0; i < places_arr.length; i++) {
                  // if (k < places_arr.length) {
                    place_data = places_arr[i];
                    var place_data1 = place_data.split("@");
                    uniqueId  =  place_data1[0];
                    var place = place_data1[1];
                    place_name1 = place;
                    // console.log(place_name1 +","+uniqueId);
                      var service = new google.maps.places.PlacesService(map);
                       service.nearbySearch({
                          location: recent_point,
                          radius: new_range,
                          type: [place]
                        }, callback);
                };

               cityCircle = new google.maps.Circle({
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                map: map,
                center: recent_point,
                radius: new_range
              });   

              circle_arr.push(cityCircle); 

              old_range = new_range;
            // console.log(old_range);
        });  
 
        $(document.body).click( function() {
          $('#list_div').hide();
        });

  });

    </script>

  </head>
  <body  class="top-navigation">
    <div class="loader"></div>
<div id="wrapper">
  <div id="page-wrapper" class="gray-bg" style="min-height: 850px;background: white;padding: 0;">
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
       <div class="col-sm-8" style="border-right: 2px solid #686868;padding-right: 0px;">
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
              <li><p>TOWEING</p></li>
              <li><div class="style-gray" id="toweing" ><?=$toweing?></div></li>



              <li><span><img src="<?=base_url()?>assets/img/car_darkgreen.png"></span></li>
              <li><p>GPS LOCATION</p></li>
              <li><div class="style-darkgreen" id="gpsfixed" ><?=$gpsfixed?></div></li>

              <li><span><img src="<?=base_url()?>assets/img/purpal.png"></span></li>
              <li><p>CELLID LOCATION</p></li>
              <li><div class="style-purpal" id="gpsnotfixed" ><?=$gpsnotfixed?></div></li>
          </ul>
      </div>
      <div id="slider_div" hidden>
        <div class="col-lg-1"> <p style="float: right;"> Radius </p></div>
        <div class="col-lg-3" style="padding-top: 10px;padding-right: 30px;">
            <div id="slider" ></div>
        </div>
      </div>
      <div id="select_vehicle">
        <div class="col-lg-4"> <h3 style="text-align: center;color: #fff;"><b> Select Vehicle </b></h3></div>
      </div>
    </div>

        <div class="wrapper wrapper-content" style="padding: 0;">
            <div class="row">
              <div class="col-sm-10">
                  <div class="ibox float-e-margins" >
                      <div class="ibox-content" style="padding: 0;">
                         <div id="map">
                          </div>
                          <div id="place_div" hidden style="position: absolute;top: 20px;left: 35px;width: 101px;padding: 18px;background-color: rgb(57, 57, 57);border-radius: 6px;">

                            <div id="menu" style="width: auto; top: 7px; right: 29px;">
                                <ul class="level1">
                                  <li class="level1-li">
                                    <!-- <input type="radio" name="tab1" id="tab1a" class="tabs subs"> -->
                                    <label id="tab1a" style="padding: 2px">Address</label>
                                    <!-- <input type="radio" name="tab1" id="tab1ac" class="tabs subs close"> -->
                                    <!-- <label for="tab1ac" class="close" style="position:static;"></label> -->
                                    <div id="list_div" hidden>
                                      <ul class="left" style="overflow-y: scroll; overflow-x: hidden; position: fixed; display: block; width: 179px; left: 120px; top: 102px; max-height: 500px; margin-top: 10px;">
                                          <li class="li_style"><a href="#"><input class="style_input" title="1@accounting" id="accounting" type="checkbox" readonly="true"> <label for="accounting"> accounting </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="2@airport" id="airport" type="checkbox" readonly="true"> <label for="airport"> airport </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="3@amusement_park" id="amusement_park" type="checkbox" readonly="true"> <label for="amusement_park"> amusement park </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="4@aquarium" id="aquarium" type="checkbox" readonly="true"> <label for="aquarium"> aquarium </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="5@art_gallery" id="art_gallery" type="checkbox" readonly="true"> <label for="art_gallery"> art gallery </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="6@atm" id="atm" type="checkbox" readonly="true"><label for="atm">atm </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="7@bakery" id="bakery" type="checkbox" readonly="true"><label for="bakery">bakery </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="8@bank" id="bank" type="checkbox" readonly="true"><label for="bank">bank </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="9@bar" id="bar" type="checkbox" readonly="true"><label for="bar">bar </label></a></li>
                                          
                                          <li class="li_style"><a href="#"><input class="style_input" title="10@beauty_salon" id="beauty_salon" type="checkbox" readonly="true"><label for="beauty_salon">beauty salon </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="11@bicycle_store" id="bicycle_store" type="checkbox" readonly="true"><label for="bicycle_store">bicycle store </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="12@book_store" id="book_store" type="checkbox" readonly="true"><label for="book_store">book store </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="13@bowling_alley" id="bowling_alley" type="checkbox" readonly="true"><label for="bowling_alley">bowling alley </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="14@bus_station" id="bus_station" type="checkbox" readonly="true"><label for="bus_station">bus station </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="15@cafe" id="cafe" type="checkbox" readonly="true"><label for="cafe">cafe </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="16@campground" id="campground" type="checkbox" readonly="true"><label for="campground">campground </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="17@car_dealer" id="car_dealer" type="checkbox" readonly="true"><label for="car_dealer">car dealer </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="18@car_rental" id="car_rental" type="checkbox" readonly="true"><label for="car_rental">car rental </label></a></li>
                                          
                                          <li class="li_style"><a href="#"><input class="style_input" title="19@car_repair" id="car_repair" type="checkbox" readonly="true"><label for="car_repair">car repair </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="20@car_wash" id="car_wash" type="checkbox" readonly="true"><label for="car_wash">car wash </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="21@casino" id="casino" type="checkbox" readonly="true"><label for="casino">casino </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="22@cemetery" id="cemetery" type="checkbox" readonly="true"><label for="cemetery">cemetery </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="23@church" id="church" type="checkbox" readonly="true"><label for="church">church </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="24@city_hall" id="city_hall" type="checkbox" readonly="true"><label for="city_hall">city hall </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="25@clothing_store" id="clothing_store" type="checkbox" readonly="true"><label for="clothing_store">clothing store </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="26@convenience_store" id="convenience_store" type="checkbox" readonly="true"><label for="convenience_store">convenience store </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="27@courthouse" id="courthouse" type="checkbox" readonly="true"><label for="courthouse">courthouse </label></a></li>
                                          
                                          <li class="li_style"><a href="#"><input class="style_input" title="28@dentist" id="dentist" type="checkbox" readonly="true"> <label for="dentist">dentist</label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="29@department_store" id="department_store" type="checkbox" readonly="true"> <label for="department_store">department store</label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="30@doctor" id="doctor" type="checkbox" readonly="true"> <label for="doctor">doctor</label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="31@electrician" id="electrician" type="checkbox" readonly="true"> <label for="electrician">electrician</label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="32@electronics_store" id="electronics_store" type="checkbox" readonly="true"> <label for="electronics_store">electronics store</label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="33@embassy" id="embassy" type="checkbox" readonly="true"> <label for="embassy">embassy</label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="34@fire_station" id="fire_station" type="checkbox" readonly="true"> <label for="fire_station">fire station</label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="35@florist" id="florist" type="checkbox" readonly="true"> <label for="florist">florist</label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="36@funeral_home" id="funeral_home" type="checkbox" readonly="true"> <label for="funeral_home">funeral home</label></a></li>
                                          
                                          <li class="li_style"><a href="#"><input class="style_input" title="37@furniture_store" id="furniture_store" type="checkbox" readonly="true"> <label for="furniture_store">furniture store</label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="38@gas_station" id="gas_station" type="checkbox" readonly="true"> <label for="gas_station"> gas station </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="39@gym" id="gym" type="checkbox" readonly="true"> <label for="gym"> gym </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="40@hair_care" id="hair_care" type="checkbox" readonly="true"> <label for="hair_care"> hair care </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="41@hardware_store" id="hardware_store" type="checkbox" readonly="true"> <label for="hardware_store"> hardware store </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="42@hindu_temple" id="hindu_temple" type="checkbox" readonly="true"> <label for="hindu_temple"> hindu temple </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="43@home_goods_store" id="home_goods_store" type="checkbox" readonly="true"> <label for="home_goods_store"> home goods store </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="44@hospital" id="hospital" type="checkbox" readonly="true"> <label for="hospital"> hospital </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="45@insurance_agency" id="insurance_agency" type="checkbox" readonly="true"> <label for="insurance_agency"> insurance agency </label></a></li>
                                          
                                          <li class="li_style"><a href="#"><input class="style_input" title="46@jewelry_store" id="jewelry_store" type="checkbox" readonly="true"> <label for="jewelry_store"> jewelry store </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="47@laundry" id="laundry" type="checkbox" readonly="true"> <label for="laundry"> laundry </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="48@lawyer" id="lawyer" type="checkbox" readonly="true"> <label for="lawyer"> lawyer </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="49@library" id="library" type="checkbox" readonly="true"> <label for="library"> library </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="50@liquor_store" id="liquor_store" type="checkbox" readonly="true"> <label for="liquor_store"> liquor store </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="51@local_government_office" id="local_government_office" type="checkbox" readonly="true"> <label for="local_government_office"> local government office </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="52@locksmith" id="locksmith" type="checkbox" readonly="true"> <label for="locksmith"> locksmith </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="53@lodging" id="lodging" type="checkbox" readonly="true"> <label for="lodging"> lodging </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="54@meal_delivery" id="meal_delivery" type="checkbox" readonly="true"> <label for="meal_delivery"> meal delivery </label></a></li>
                                          
                                          <li class="li_style"><a href="#"><input class="style_input" title="55@meal_takeaway" id="meal_takeaway" type="checkbox" readonly="true"> <label for="meal_takeaway"> meal takeaway </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="56@mosque" id="mosque" type="checkbox" readonly="true"> <label for="mosque"> mosque </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="57@movie_rental" id="movie_rental" type="checkbox" readonly="true"> <label for="movie_rental"> movie rental </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="58@movie_theater" id="movie_theater" type="checkbox" readonly="true"> <label for="movie_theater"> movie theater </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="59@moving_company" id="moving_company" type="checkbox" readonly="true"> <label for="moving_company"> moving company </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="60@museum" id="museum" type="checkbox" readonly="true"> <label for="museum"> museum </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="61@night_club" id="night_club" type="checkbox" readonly="true"> <label for="night_club"> night club </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="62@painter" id="painter" type="checkbox" readonly="true"> <label for="painter"> painter </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="63@park" id="park" type="checkbox" readonly="true"> <label for="park"> park </label></a></li>
                                          
                                          <li class="li_style"><a href="#"><input class="style_input" title="64@parking" id="parking" type="checkbox" readonly="true"> <label for="parking"> parking </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="65@pet_store" id="pet_store" type="checkbox" readonly="true"><label for="pet_store">pet store </label></a></li> 
                                          <li class="li_style"><a href="#"><input class="style_input" title="66@pharmacy" id="pharmacy" type="checkbox" readonly="true"><label for="pharmacy">pharmacy </label></a></li> 
                                          <li class="li_style"><a href="#"><input class="style_input" title="67@physiotherapist" id="physiotherapist" type="checkbox" readonly="true"><label for="physiotherapist">physiotherapist </label></a></li> 
                                          <li class="li_style"><a href="#"><input class="style_input" title="68@plumber" id="plumber" type="checkbox" readonly="true"><label for="plumber">plumber </label></a></li> 
                                          <li class="li_style"><a href="#"><input class="style_input" title="69@police" id="police" type="checkbox" readonly="true"><label for="police">police </label></a></li> 
                                          <li class="li_style"><a href="#"><input class="style_input" title="70@post_office" id="post_office" type="checkbox" readonly="true"><label for="post_office">post office </label></a></li> 
                                          <li class="li_style"><a href="#"><input class="style_input" title="71@real_estate_agency" id="real_estate_agency" type="checkbox" readonly="true"><label for="real_estate_agency">real estate agency </label></a></li> 
                                          <li class="li_style"><a href="#"><input class="style_input" title="72@restaurant" id="restaurant" type="checkbox" readonly="true"><label for="restaurant">restaurant </label></a></li> 
                                          <li class="li_style"><a href="#"><input class="style_input" title="73@roofing_contractor" id="roofing_contractor" type="checkbox" readonly="true"><label for="roofing_contractor">roofing contractor </label></a></li> 
                                          
                                          <li class="li_style"><a href="#"><input class="style_input" title="74@rv_park" id="rv_park" type="checkbox" readonly="true"> <label for="rv_park"> rv park</a></li></label>
                                          <li class="li_style"><a href="#"><input class="style_input" title="75@school" id="school" type="checkbox" readonly="true"> <label for="school"> school</a></li></label>
                                          <li class="li_style"><a href="#"><input class="style_input" title="76@shoe_store" id="shoe_store" type="checkbox" readonly="true"> <label for="shoe_store"> shoe store</a></li></label>
                                          <li class="li_style"><a href="#"><input class="style_input" title="77@shopping_mall" id="shopping_mall" type="checkbox" readonly="true"> <label for="shopping_mall"> shopping mall</a></li></label>
                                          <li class="li_style"><a href="#"><input class="style_input" title="78@spa" id="spa" type="checkbox" readonly="true"> <label for="spa"> spa</a></li></label>
                                          <li class="li_style"><a href="#"><input class="style_input" title="79@stadium" id="stadium" type="checkbox" readonly="true"> <label for="stadium"> stadium</a></li></label>
                                          <li class="li_style"><a href="#"><input class="style_input" title="80@storage" id="storage" type="checkbox" readonly="true"> <label for="storage"> storage</a></li></label>
                                          <li class="li_style"><a href="#"><input class="style_input" title="81@store" id="store" type="checkbox" readonly="true"> <label for="store"> store</a></li></label>
                                          <li class="li_style"><a href="#"><input class="style_input" title="82@subway_station" id="subway_station" type="checkbox" readonly="true"> <label for="subway_station"> subway station</a></li></label>
                                          
                                          <li class="li_style"><a href="#"><input class="style_input" title="83@supermarket" id="supermarket" type="checkbox" readonly="true"> <label for="supermarket"> supermarket </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="84@synagogue" id="synagogue" type="checkbox" readonly="true"> <label for="synagogue"> synagogue </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="85@taxi_stand" id="taxi_stand" type="checkbox" readonly="true"> <label for="taxi_stand"> taxi stand </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="86@train_station" id="train_station" type="checkbox" readonly="true"> <label for="train_station"> train station </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="87@transit_station" id="transit_station" type="checkbox" readonly="true"> <label for="transit_station"> transit station </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="88@travel_agency" id="travel_agency" type="checkbox" readonly="true"> <label for="travel_agency"> travel agency </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="90@veterinary_care" id="veterinary_care" type="checkbox" readonly="true"> <label for="veterinary_care"> veterinary care </label></a></li>
                                          <li class="li_style"><a href="#"><input class="style_input" title="91@zoo" id="zoo" type="checkbox" readonly="true"> <label for="zoo"> zoo </label></a></li>
                                      </ul>
                                    </div>
                                  </li>
                                </ul>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-sm-2">
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
                                            <th style="text-align: center;">Vehical</th>
                                        </tr>
                                      </thead>
                                      <tbody id="vehical_status">
                                        <?php for ($i=0; $i < count($res1); $i++) { ?>
                                        <tr  class="map_details" id="view_places" title="<?=$res1[$i][0]['device_id']?>">
                                            <td>

                                              <?php if ($res1[$i][0]['vehicle_movement_status'] == "B") { ?>
                                                    <img src="<?=base_url()?>assets/img/icon-bus-green.png" alt="running" style="height:20px;float:left;">
                                              <?php  }else { ?>
                                                    <img src="<?=base_url()?>assets/img/icon-bus-red.png" alt="stop" style="height:20px;float:left;">
                                              <?php  } ?> 
                                              <label class="control-label vehicle_no"><?=$res1[$i]['vehicle_no']?></label>

                                            </td>
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
</body>
</html>