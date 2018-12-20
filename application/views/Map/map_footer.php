<div class="footer">
    <div class="row">
        <div class="col-sm-4">
            <div class="pull-left">
                <strong>Copyright </strong><a href="http://www.syntech.co.in" target="_blank"> <img src="<?=base_url()?>assets/img/syntech_logo.png" style="height:13px;"></a><strong> &copy; 2017-2018 </strong>  
            </div>
        </div>
        <div class="col-sm-4">
            <center>
                <?php if(isset($this->session->userdata['Institute'])) { ?>
                    <div>
                       <img src="<?php echo $institute_logo; ?>" style="height:20px;width:20px;"> <strong style="color:#ffffff;"><?php echo $institute_name; ?> </strong> 
                    </div>
                <?php } ?>
                <?php if(isset($this->session->userdata['client'])) { ?>
                    <div>
                       <img src="<?php echo $client_logo; ?>" style="height:20px;width:20px;"> <strong style="color:#ffffff;"><?php echo $client_name; ?> </strong> 
                    </div>
                <?php } ?>
            </center>
        </div>
        <div class="pull-right">
            <i class="fa fa-phone-square" aria-hidden="true"></i><strong> 020-24269021 / 7030578612</strong> | <i class="fa fa-envelope" aria-hidden="true"></i> <strong>contactus@syntech.co.in </strong> 
        </div>
    </div>
</div>


<!-- Mainly scripts -->
<script src="<?=base_url()?>assets/js/jquery-2.1.1.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery-ui.min.js"></script>
<script src="<?=base_url();?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?=base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url();?>assets/js/plugins/select2/select2.full.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?=base_url()?>assets/js/inspinia.js"></script>
<script src="<?=base_url()?>assets/js/plugins/pace/pace.min.js"></script>

<script src="<?=base_url()?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>

<!-- clockpicker -->
<script src="<?=base_url()?>assets/js/plugins/clockpicker/clockpicker.js"></script>

<script src="<?= base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>
<script src="<?= base_url();?>assets/js/plugins/validate/jquery.validate.min.js"></script>
<script src="<?= base_url();?>assets/js/plugins/validate/additional-methods.min.js"></script>
<!-- d3 and c3 charts -->
<!--<script src="<?= base_url();?>assets/js/plugins/d3/d3.min.js"></script>
<script src="<?= base_url();?>assets/js/plugins/c3/c3.min.js"></script>-->
 <!-- Flot -->
 <!--<script src="<?= base_url();?>assets/js/plugins/flot/jquery.flot.js"></script>
<script src="<?= base_url();?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?= base_url();?>assets/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="<?= base_url();?>assets/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="<?= base_url();?>assets/js/plugins/flot/jquery.flot.time.js"></script>-->
<!-- Sparkline -->
<script src="<?= base_url();?>assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        });
    </script>
<script>

    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });

    function capitalize(textboxid, str) {
        if (str && str.length >= 1)
        {       
            var firstChar = str.charAt(0);
            var remainingStr = str.slice(1);
            str = firstChar.toUpperCase() + remainingStr.toLowerCase();
        }
        document.getElementById(textboxid).value = str;
    }


    <?php if($insti_admin == 'dashboard') {?>
        $('#school_header').addClass('active');
        document.title = "TrackMee | Institude Admin"
    <?php } elseif($insti_admin == 'client') {?>
        $('#client').addClass('active');
         document.title = "TrackMee | School Details"
    <?php }elseif($insti_admin == 'tracking') {?>
        $('#tracking').addClass('active');
         document.title = "TrackMee | Tracking Details"
    <?php }elseif($insti_admin == 'tracking_all') {?>
        $('#tracking_all').addClass('active');
         document.title = "TrackMee | Tracking ALL "
    <?php } ?>

    $(document).ready(function(){
            // var mydiv = $('#title_div');
            $(document).bind('keydown',function(e){
               if(e.keyCode == 88) {
                    window.location.href = "<?=site_url('Tracking/view_all_device_institute')?>";
                  // mydiv.toggle();
               }
            });

        <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
            swal({
                title: "<?=$flash['title']?>",
                text: "<?=$flash['text']?>",
                type: "<?=$flash['type']?>"
            });
        <?php } ?>

        var today = new Date();
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose:true,
            endDate: "today",
            maxDate: today
        }).on('changeDate', function (ev) {
            $(this).datepicker('hide');
        });


        $('.datepicker').keyup(function () {
            if (this.value.match(/[^0-9]/g)) {
                this.value = this.value.replace(/[^0-9^-]/g, '');
            }
        });

        $(document).on('click','.list_view_details',function(){
            $('#grid_view').removeClass();
            $('#list_view').removeClass();
            $('#employee_details').removeClass();
            $('#grid_view').addClass('wrapper wrapper-content animated fadeInRight');
            $('#list_view').addClass('wrapper wrapper-content animated fadeInRight hidden');
            $('#employee_details').addClass('wrapper wrapper-content animated fadeInRight hidden');
        });

        $(document).on('change','.speed_notification',function(){
            if($(this).is(':checked')){
                $('#speed_notifi').removeClass();
                $('#speed_notifi1').removeClass();
                $('#speed_notifi').addClass('col-lg-3');
                $('#speed_notifi1').addClass('col-lg-2 control-label');
            }else{
                $('#speed_notifi').removeClass();
                $('#speed_notifi1').removeClass();
                $('#speed_notifi').addClass('col-lg-3 hidden');
                $('#speed_notifi1').addClass('col-lg-2 control-label hidden');
            }
        });

        $(document).on('click','.grid_view_details',function(){
            $('#grid_view').removeClass();
            $('#list_view').removeClass();
            $('#employee_details').removeClass();
            $('#grid_view').addClass('wrapper wrapper-content animated fadeInRight hidden');
            $('#list_view').addClass('wrapper wrapper-content animated fadeInRight');
            $('#employee_details').addClass('wrapper wrapper-content animated fadeInRight hidden');
        });

        $(document).on('click','.user_details',function(){
            $('#grid_view').removeClass();
            $('#list_view').removeClass();
            $('#employee_details').removeClass();
            $('#grid_view').addClass('wrapper wrapper-content animated fadeInRight hidden');
            $('#list_view').addClass('wrapper wrapper-content animated fadeInRight hidden');
            $('#employee_details').addClass('wrapper wrapper-content animated fadeInRight');
        });


        $(document).on('change','.mobile',function(){
            var num  = $(this).val();
            var profile = $('.school_profile').val();
            $.post('<?=site_url('Client/already_exits_mobile')?>',{num:num,profile:profile}, function(res){
                console.log(res);
                if(res == 0){
                    $('.mobile_verification').hide();
                    $('.mobile_verification').text('');
                }
                else{
                    $('.mobile_verification').show();
                    $('.mobile_verification').text('Mobile No. already Registered.');
                }
            },'json');
        });

        $(document).on('change','.email_id',function(){
            var email  = $(this).val();
            var profile = $('.school_profile').val();
            $.post('<?=site_url('Client/already_exits_email')?>',{email:email,profile:profile}, function(res){
        // console.log(data);
                if(res == 0){
                    $('.email_verification').hide();
                    $('.email_verification').text('');
                }
                else{
                    $('.email_verification').show();
                    $('.email_verification').text('Email ID. already Registered.');
                    
                }
            },'json');
        });

        $('.update_functionality').hide();
        $(document).on('click','.edit_functionality',function(){
            $('.update_functionality').show();
            $('.functionality').hide();
            $('.edit_functionality').hide();
        });

        $('.clockpicker').clockpicker();

        $(document).on('click','#add_user',function(){
            $('.delete_user').toggle();
        });

        $(document).on('click','.hide_user',function(){

            $('.delete_user').toggle();
        });

        $('.profile_hide').hide();
        $('.close_edit_profile').hide();
        $(document).on('click','.edit_profile',function(){
            $('.profile_hide').show();
            $('.close_edit_profile').show();
            $('.edit_profile').hide();
        });
        $(document).on('click','.close_edit_profile',function(){
            $('.profile_hide').hide();
            $('.close_edit_profile').hide();
            $('.edit_profile').show();
        });
        
        $('.update').hide();
        $(document).on('click','.edit',function(){
          
           $('.update').show();
           $('.view').hide();
       });

             $("#sparkline7").sparkline([<?=$running; ?>, <?=$stop; ?>, <?=$parking; ?>, <?=$idling; ?>, <?=$toweing; ?>], {
                type: 'pie',
                height: '150px',
                sliceColors: ['#33cc33', '#cc0000', '#FFFF00', '#000080', '#808080']});

             $("#sparkline8").sparkline([<?=$gpsfixed; ?>,<?=$gpsnotfixed; ?>], {
                type: 'pie',
                height: '150px',
                sliceColors: ['#2F7A4C', '#933EC5']});

           
            // autoUpdate(); 
            setTimeout(autoUpdate, 3000);   
            function autoUpdate() 
            {
                <?php if(isset($this->session->userdata['Institute'])) { ?>
                    // alert("Institute");
                    $.post('<?=site_url('Tracking/view_map_table_update_institute')?>',{}, function(data){
             
                  var stop = 0;
                  var running = 0;
                  var gpsnotfixed = 0;
                  var gpsfixed = 0;
                  var parking = 0; 
                  var idling = 0; 
                  var toweing = 0; 

                        $('#vehical_status').empty();
                        $('#total_status').empty();
                        $('#total_status2').empty();
                        for (var i = 0; i < data.res1.length; i++) 
                        {
                            var j =0;
                            j = i+1;

                            if (data.res1[i][0].vehicle_movement_status == "B") 
                            { 
                                running = running +1; 
                            }
                            else if (data.res1[i][0].vehicle_movement_status == "c") 
                            { 
                                parking = parking +1; 
                            }
                            else if (data.res1[i][0].vehicle_movement_status == "d") 
                            { 
                                idling = idling +1; 
                            }
                            else if (data.res1[i][0].vehicle_movement_status == "e") 
                            { 
                                toweing = toweing +1; 
                            }
                            else{ stop = stop+1;  };
                            
                            if (data.res1[i][0].gps_valid_data == "1") { gpsfixed = gpsfixed +1; }else{ gpsnotfixed = gpsnotfixed+1;  };
                        }  

                        for (var i = 0; i < data.res1.length; i++) 
                        {    
                                $('#vehical_status').append('<tr class="map_details">'+
                                            '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>"">'+ (i+1) +'</a></td>'+
                                            '<th><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>"">'+data.res1[i].school_name+'</a></th>'+
                                          (data.res1[i][0].vehicle_movement_status == "B" ? '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/car_green.png" alt="running" "></a></td>' : (data.res1[i][0].vehicle_movement_status == "c" ? '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/car_yellow.png" alt="parking" "></a></td>' : (data.res1[i][0].vehicle_movement_status == "d" ? '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/car_blue.png" alt="idling" "></a></td>' : (data.res1[i][0].vehicle_movement_status == "e" ? '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/car_gray.png" alt="toweing" "></a></td>' : ' <td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/car_red.png" alt="stop"></a></td>' ) ) ) )+ 
                                           
                                            '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>"">'+data.res1[i][0].stop_longitude+'</a></td>'+
                                            '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>"">'+data.res1[i][0].device_id+'</a></td>' +
                                            '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>"">'+data.res1[i][0].xml_date_time+'</a></td>'+
                                            '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>"">'+data.res1[i][0].speed+'</a></td>'+
                                            '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>"">'+data.res1[i][0].stop_latitude+'</a></td>'+
                                           (data.res1[i][0].power_status == "1" || "2" ? '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/BatteryOK.png" alt="Power" style="height:25px;"></a></td>' : '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/BatteryDis.png" alt="Internal Battery" style="height:25px;"></a></td>')+ 
                                           (data.res1[i][0].ignition == "1"  ? '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/ign_on.png" alt="ign_on"></a></td>' : '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/ign_off.png" alt="ign_off"></a></td>')+ 
                                          (data.res1[i][0].gps_valid_data == "1" ? '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/signal_green.png" alt="" "></a></td>':'<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/signal_red.png" alt=""></a></td>')+ 
                                             
                                            '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>"">'+data.res1[i][0].total_satellites+'</a></td>'+
                                            '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>"">'+data.res1[i][0].gsm_signal_strength+'</a></td>'+
                                            '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>"">'+
                                            (data.res1[i][0].gps_quality == "F" ? 'Good' : (data.res1[i][0].gps_quality == "E" ? 'Average' : (data.res1[i][0].gps_quality == "D" ? 'Poor' : 'Very Poor') ) )+
                                            '</a></td>'+
                                          
                                        '</tr>');
                        }

                        $('#total_status').append('<tr><td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/car_green.png" alt="running" style="padding-right: 15px;"> Running : '+ running+'</td></tr>'+
                                                  '<tr><td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/car_red.png" alt="stop" style="padding-right: 15px;"> Idle : '+stop+'</td></tr>'+
                                                  '<tr><td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/car_yellow.png" alt="Parking" style="padding-right: 15px;"> Parking : '+parking+'</td></tr>'+
                                                  '<tr><td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/car_blue.png" alt="Idling" style="padding-right: 15px;"> Idling : '+idling+'</td></tr>'+
                                                  '<tr><td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/car_gray.png" alt="Toweing" style="padding-right: 15px;"> Toweing : '+toweing+'</td></tr>');

                        $('#total_status2').append('<tr><td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/car_darkgreen.png" alt="gpsfixed" style="padding-right: 15px;"> GPS Location : '+gpsfixed+'</td></tr>'+
                                                  '<tr><td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/purpal.png" alt="gpsnotfixed" style="padding-right: 15px;"> CellId Location : '+gpsnotfixed+'</td></tr>');

                        $("#sparkline7").sparkline([running, stop, parking, idling, toweing], {
                            type: 'pie',
                            height: '150px',
                            sliceColors: ['#33cc33', '#cc0000', '#FFFF00', '#000080', '#808080']});

                        $("#sparkline8").sparkline([gpsfixed,gpsnotfixed], {
                            type: 'pie',
                            height: '150px',
                            sliceColors: ['#2F7A4C', '#933EC5']});

                    },'json');

                <?php } ?>

                <?php if(isset($this->session->userdata['client'])) { ?>
                    // alert("client");
                    $.post('<?=site_url('Tracking/view_map_table_update')?>',{}, function(data){
                        // console.log(data);
                          var stop = 0;
                          var running = 0;
                          var gpsnotfixed = 0;
                          var gpsfixed = 0;
                          var parking = 0; 
                          var idling = 0; 
                          var toweing = 0; 

                        $('#vehical_status').empty();
                        $('#total_status').empty();
                        $('#total_status2').empty();
                        for (var i = 0; i < data.res1.length; i++) 
                        {
                            var j =0;
                            j = i+1;

                            if (data.res1[i][0].vehicle_movement_status == "B") 
                            { 
                                running = running +1; 
                            }
                            else if (data.res1[i][0].vehicle_movement_status == "c") 
                            { 
                                parking = parking +1; 
                            }
                            else if (data.res1[i][0].vehicle_movement_status == "d") 
                            { 
                                idling = idling +1; 
                            }
                            else if (data.res1[i][0].vehicle_movement_status == "e") 
                            { 
                                toweing = toweing +1; 
                            }
                            else{ stop = stop+1;  };
                            
                            if (data.res1[i][0].gps_valid_data == "1") { gpsfixed = gpsfixed +1; }else{ gpsnotfixed = gpsnotfixed+1;  };
                        }  

                        for (var i = 0; i < data.res1.length; i++) 
                        {    
                                $('#vehical_status').append('<tr class="map_details">'+
                                            '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>"">'+ (i+1) +'</a></td>'+
                                          (data.res1[i][0].vehicle_movement_status == "B" ? '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/car_green.png" alt="running" "></a></td>' : (data.res1[i][0].vehicle_movement_status == "c" ? '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/car_yellow.png" alt="parking" "></a></td>' : (data.res1[i][0].vehicle_movement_status == "d" ? '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/car_blue.png" alt="idling" "></a></td>' : (data.res1[i][0].vehicle_movement_status == "e" ? '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/car_gray.png" alt="toweing" "></a></td>' : ' <td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/car_red.png" alt="stop"></a></td>' ) ) ) )+ 
                                           
                                            '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>"">'+data.res1[i][0].stop_longitude+'</a></td>'+
                                            '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>"">'+data.res1[i][0].device_id+'</a></td>' +
                                            '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>"">'+data.res1[i][0].xml_date_time+'</a></td>'+
                                            '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>"">'+data.res1[i][0].speed+'</a></td>'+
                                            '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>"">'+data.res1[i][0].stop_latitude+'</a></td>'+
                                           (data.res1[i][0].power_status == "1" || "2" ? '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/BatteryOK.png" alt="Power" style="height:25px;"></a></td>' : '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/BatteryDis.png" alt="Internal Battery" style="height:25px;"></a></td>')+ 
                                           (data.res1[i][0].ignition == "1"  ? '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/ign_on.png" alt="ign_on"></a></td>' : '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/ign_off.png" alt="ign_off"></a></td>')+ 
                                          (data.res1[i][0].gps_valid_data == "1" ? '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/signal_green.png" alt="" "></a></td>':'<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>""><img src="<?=base_url()?>assets/img/signal_red.png" alt=""></a></td>')+ 
                                             
                                            '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>"">'+data.res1[i][0].total_satellites+'</a></td>'+
                                            '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>"">'+data.res1[i][0].gsm_signal_strength+'</a></td>'+
                                            '<td><a href="<?=site_url("Tracking/index/'+data.res1[i][0].device_id+'")?>"">'+
                                            (data.res1[i][0].gps_quality == "F" ? 'Good' : (data.res1[i][0].gps_quality == "E" ? 'Average' : (data.res1[i][0].gps_quality == "D" ? 'Poor' : 'Very Poor') ) )+
                                            '</a></td>'+
                                          
                                        '</tr>');
                        }

                        $('#total_status').append('<tr><td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/car_green.png" alt="running" style="padding-right: 15px;"> Running : '+ running+'</td></tr>'+
                                                  '<tr><td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/car_red.png" alt="stop" style="padding-right: 15px;"> Idle : '+stop+'</td></tr>'+
                                                  '<tr><td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/car_yellow.png" alt="Parking" style="padding-right: 15px;"> Parking : '+parking+'</td></tr>'+
                                                  '<tr><td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/car_blue.png" alt="Idling" style="padding-right: 15px;"> Idling : '+idling+'</td></tr>'+
                                                  '<tr><td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/car_gray.png" alt="Toweing" style="padding-right: 15px;"> Toweing : '+toweing+'</td></tr>');

                        $('#total_status2').append('<tr><td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/car_darkgreen.png" alt="gpsfixed" style="padding-right: 15px;"> GPS Location : '+gpsfixed+'</td></tr>'+
                                                  '<tr><td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/purpal.png" alt="gpsnotfixed" style="padding-right: 15px;"> CellId Location : '+gpsnotfixed+'</td></tr>');

                        $("#sparkline7").sparkline([running, stop, parking, idling, toweing], {
                            type: 'pie',
                            height: '150px',
                            sliceColors: ['#33cc33', '#cc0000', '#FFFF00', '#000080', '#808080']});

                        $("#sparkline8").sparkline([gpsfixed,gpsnotfixed], {
                            type: 'pie',
                            height: '150px',
                            sliceColors: ['#2F7A4C', '#933EC5']});

                    },'json');

                <?php } ?>
             setTimeout(autoUpdate, 4000);
            }


        $("#addClient").validate({
            rules: {
                client_name: {
                    required: true
                },
                client_address: {
                    required: true
                },
                client_logo:{
                   required:true
                },
                client_latitude:{
                   pattern:/^[0-9\.]*$/
                },
                client_longitude:{
                   pattern:/^[0-9\.]*$/
                },
                client_email_id: {
                    pattern: /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
                    email: true
                },
                client_mobile_number: {
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                client_phone_number:{
                   required:true,
                   digits: true,
                   minlength: 11,
                   maxlength: 11                   
                },
                client_speed_limit_val:{
                    required:true,
                    digits:true
                },
               photo:{
                   required:true
               },
               employee_first_name: {
                    required: true,
                    pattern: /^[a-zA-Z\s]*$/
                },
                employee_middle_name: {
                    pattern: /^[a-zA-Z\s]*$/
                },
                employee_last_name: {
                    required: true,
                    pattern: /^[a-zA-Z\s]*$/
                },
                employee_address:{
                    required:true
                },
                employee_email_id: {
                    required:true,
                    pattern: /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
                    email: true
                },
                employee_pri_mobile_number: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                employee_DOB:{
                    required:true
                },
                employee_gender:{
                    required:true
                },
                photo:{
                    required:true
                }
            },
        messages: {
            client_name: {
                required: "Please enter Client name."
            },
            client_address: {
                required: "Please enter Client Address."
            },
            client_latitude:{
                   pattern:"Please enter Client lattitude for eg.102.230.56.23"
            },
            client_longitude:{
                   pattern:"Please enter Client longitude for eg.102.230.56.23"
                },
            client_email_id: {
                required: "Please enter Client Email.",
                pattern:"Please enter valid format of email.",
                email: "Please enter Correct Email"
            },
            client_mobile_number: {
                required: "Please enter Client mobile no.",
                digits: "Please enter 10 digit mobile no.",
                minlength: "Please enter 10 digit mobile no.",
                maxlength: "Please enter 10 digit mobile no."
            },
            client_phone_number: {
                required: "Please enter Client mobile no.",
                digits: "Please enter 10/11 digit mobile/phone no.",
                minlength: "Please enter 10/11 digit mobile/phone no.",
                maxlength: "Please enter 10/11 digit mobile/phone no."
            },
            client_speed_limit_val:{
               required: "Please enter Speed Limit.",
                digits: "Please enter only digit speed.",
            },
             employee_photo:{
                required:"Please Select Employee photo."
            },
            employee_first_name: {
                required: "Please enter employee First name.",
                pattern:"Please enter only alphabets"
            },
            employee_middle_name: {
                required: "Please enter employee Middle name.",
                pattern:"Please enter only alphabets"
            },
            employee_last_name: {
                required: "Please enter employee Last name.",
                pattern:"Please enter only alphabets"
            },
            employee_DOB:{
                required:"Please Select Student Date Of Birth."
            },
             employee_pri_mobile_number: {
                required: "Please enter  mobile number.",
                digits: "Please enter 10 digit mobile number.",
                minlength: "Please enter 10 digit mobile number.",
                maxlength: "Please enter 10 digit mobile number."
            },
            employee_email_id: {
                required: "Please enter Email.",
                pattern:"Please enter valid format of email.",
                email: "Please enter Correct Email"
            },
            photo:{
                required:"Please Select Teacher Photo."
            }
        }
    });

    $("#forgotPassword").validate({
        rules: {
            password:{
                required:true,
            },
            confirm_password:{
                required:true,
                equalTo:"#password"
            }
        },
    messages: {
        }
    });

    $('.dataTables-example').DataTable({
        pageLength: 10,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [ ],
        "language": {
            "emptyTable": "<img src='<?=base_url();?>assets/img/No-record-found.png'> "
        }
    });

    $(document).on('click','.details', function(){
        $('.info').toggle();
    })
});
</script>
</body>
</html>