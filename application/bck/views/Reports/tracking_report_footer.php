<div class="footer">
    <div class="row">
        <div class="col-sm-4">
            <div class="pull-left">
                <strong>Copyright </strong><a href="http://www.syntech.co.in" target="_blank"> <img src="<?=base_url()?>assets/img/syntech_logo.png" style="height:13px;"></a><strong> &copy; 2017-2018 </strong>  
            </div>
        </div>
        <?php if(!empty($school_logo)){  ?>
        <div class="col-sm-4">
            <center>
                <div>
                   <img src="<?php if(!empty($school_logo)){echo $school_logo;} ?>" style="height:20px;width:20px;"> <strong style="color:#ffffff;"><?php if(!empty($school_name)){echo $school_name;} ?> </strong> 
                </div>
            </center>
        </div>
        <?php } ?>
        <div class="pull-right">
            <i class="fa fa-phone-square" aria-hidden="true"></i><strong> 020-24269021 / 7030578612</strong> | <i class="fa fa-envelope" aria-hidden="true"></i> <strong>contactus@syntech.co.in </strong> 
        </div>
    </div>
</div>



    <!-- Mainly scripts -->
    <!--<script src="<?=base_url()?>assets/js/jquery-2.1.1.js"></script>-->
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery-ui.min.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?=base_url();?>assets/js/plugins/select2/select2.full.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?=base_url()?>assets/js/inspinia.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="<?=base_url();?>assets/js/plugins/fullcalendar/moment.min.js"></script>

     <!-- Date range picker -->
    <script src="<?=base_url();?>assets/js/plugins/daterangepicker/daterangepicker.js"></script>

    <script src="<?=base_url()?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- clockpicker -->
     <script src="<?=base_url()?>assets/js/plugins/clockpicker/clockpicker.js"></script>
    
    <script src="<?= base_url();?>assets/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/validate/additional-methods.min.js"></script>
    <script>
        
        $('.loading').hide();
        $.validator.setDefaults({
            submitHandler: function (form) {    
                form.submit();
            }
        });

        <?php if($report == 'report'){?>
            // $('#report').addClass('active');
        <?php } ?>

        $(function() {

            var start = moment().subtract(1, 'days');
            var end = moment();


            function cb(start, end) {
                $('.reportrange span').html(start.format('YYYY/MM/DD') + ' - ' + end.format('YYYY/MM/DD'));
            }

            $('.reportrange').daterangepicker({
                "autoApply": true,
                "showCustomRangeLabel": false,
                startDate: start,
                endDate:end,
                maxDate: moment().subtract(1, 'days'),
                dateLimit: {
                    days: 29
                },
                ranges: {
                   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                   'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                   'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                   'This Month': [moment().startOf('month'), moment().endOf('month')],
                   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            $('.reportrange1').daterangepicker({
                "autoApply": true,
                "showCustomRangeLabel": false,
                startDate: start,
                endDate:end,
                maxDate: moment().subtract(1, 'days'),
                dateLimit: {
                    days: 1
                },
                ranges: {
                   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')]
                }
            }, cb);

            cb(start, end);
            
        });


        $(document).ready(function(){

            $('.stoppage_demo').hide();
            $('.overspeed_demo').hide();
            $('.history_demo').hide();
            $(document).on('click','#toggle_route',function(){
                $('.division_details_hide').toggle();
            });
            $(document).on('click','#distance_click',function(){
                $('.distance_demo').show();
                $('.overspeed_demo').hide();
                $('.stoppage_demo').hide();
                $('.history_demo').hide();
            });
            $(document).on('click','#stoppage_click',function(){
                $('.distance_demo').hide();
                $('.overspeed_demo').hide();
                $('.stoppage_demo').show();
                $('.history_demo').hide();
            });
            $(document).on('click','#overspeed_click',function(){
                $('.distance_demo').hide();
                $('.overspeed_demo').show();
                $('.stoppage_demo').hide();
                $('.history_demo').hide();
            });
            $(document).on('click','#history_click',function(){
                $('.distance_demo').hide();
                $('.overspeed_demo').hide();
                $('.stoppage_demo').hide();
                $('.history_demo').show();
            });

            <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
                swal({
                    title: "<?=$flash['title']?>",
                    text: "<?=$flash['text']?>",
                    type: "<?=$flash['type']?>"
                });
            <?php } ?> 

            $(document).on('click','.fetch_distance_report',function(){
                $('.loading').show();
                var bus  = $('.bus').val();
                var bus_number  = $('.bus').text();
                var bus_no = bus_number.split('Bus');
                var date  = $('.from').val();
                var arr = date.split(' - ');
                var from  = arr[0];
                var to  = arr[1];
                $.post('<?=site_url('Reports/distance_report_details')?>',{bus:bus,from:from,to:to}, function(data){
                    console.log(data);
                         myTable.clear();
                    $.each(data,function(k,v){
                            myTable.row.add(v);
                    });
                     myTable.draw();

                         $('#title').empty();
                         $('#bus_number').empty();
                         $('#date_range').empty();
                         $('#title').append('Distance Report');
                         $('#bus_number').append(bus_no[1]);
                         $('#date_range').append(date);

                         $('#example_data_head').empty();
                         $('#example_data').empty();
                         $('#example_data_head').append('<tr>'+
                                '<th>Sr No.</th>'+
                                '<th>Date</th>'+
                                '<th>Distance (km)</th>'+                                                            
                            '</tr>');
                        
                     $.each(data, function(k,v){

                        $('#example_data').append('<tr>'+
                            '<td>'+v.device_id+'</td>'+
                            '<td>'+v.date+'</td>'+
                            '<td>'+v.dist_diff+'</td>'+                                                    
                          '</tr>');
                    });
                    $('#example_foot').attr('colspan',3);

                     $('.loading').hide();
                },'json');
            });

            $(document).on('click','.stoppage_report',function(){
                $('.loading').show();
                var bus  = $('.bus1').val();
                var bus_number  = $('.bus1').text();
                var bus_no = bus_number.split('Bus');
                var min  = $('.min1').val();
                var date  = $('.from1').val();
                var arr = date.split(' - ');
                var from  = arr[0];
                var to  = arr[1];
                $.post('<?=site_url('Reports/stoppage_report_details')?>',{bus:bus,from:from,to:to,min:min}, function(data){
                    console.log(data);
                    stoppage.clear();
                    $.each(data,function(k,v){
                        stoppage.row.add(v);
                    });
                    stoppage.draw();

                         $('#title').empty();
                         $('#bus_number').empty();
                         $('#date_range').empty();
                         $('#title').append('Stoppage Report');
                         $('#bus_number').append(bus_no[1]);
                         $('#date_range').append(date);

                         $('#example_data_head').empty();
                         $('#example_data').empty();
                         $('#example_data_head').append('<tr>'+
                                                            '<th>Address</th>'+
                                                            '<th>Start Time</th>'+
                                                            '<th>End Time</th>'+
                                                            '<th>Total Time</th>'+
                                                            
                                                        '</tr>');
                        
                     $.each(data, function(k,v){

                        $('#example_data').append('<tr>'+
                                                    '<td>'+v.address+'</td>'+
                                                    '<td>'+v.end_time+'</td>'+
                                                    '<td>'+v.start_time+'</td>'+
                                                    '<td>'+v.total_time+'</td>'+
                                                    
                                                  '</tr>');
                    });

                     $('#example_foot').attr('colspan',4);

                    $('.loading').hide();
                },'json');
            });

            $(document).on('click','.overspeed_report',function(){
                $('.loading').show();
                var bus  = $('.bus2').val();
                var bus_number  = $('.bus2').text();
                var bus_no = bus_number.split('Bus');
                var speed  = $('.speed2').val();
                var date  = $('.from2').val();
                var arr = date.split(' - ');
                var from  = arr[0];
                var to  = arr[1];
                $.post('<?=site_url('Reports/overspeed_report_details')?>',{bus:bus,from:from,to:to,speed:speed}, function(data){
                    console.log(data);
                    overspeed.clear();
                    $.each(data,function(k,v){
                            overspeed.row.add(v);
                    });
                     overspeed.draw();

                         $('#title').empty();
                         $('#bus_number').empty();
                         $('#date_range').empty();
                         $('#title').append('Overspeed Report');
                         $('#bus_number').append(bus_no[1]);
                         $('#date_range').append(date);

                         $('#example_data_head').empty();
                         $('#example_data').empty();
                         $('#example_data_head').append('<tr>'+
                                                            '<th>Date</th>'+
                                                            '<th>Speed (kmph)</th>'+
                                                            '<th>Location</th>'+
                                                            
                                                        '</tr>');
                        
                     $.each(data, function(k,v){

                        $('#example_data').append('<tr>'+
                                                    '<td>'+v.datetime+'</td>'+
                                                    '<td>'+v.speed+'</td>'+
                                                    '<td>'+v.address+'</td>'+
                                                    
                                                  '</tr>');
                    });
                    $('#example_foot').attr('colspan',3);
                    $('.loading').hide();
                },'json');
            });
            
            $(document).on('click','.history_report',function(){
                $('.loading').show();
                var bus  = $('.bus3').val();
                var bus_number  = $('.bus3').text();
                var bus_no = bus_number.split('Bus');
                var date  = $('.from3').val();
                var arr = date.split(' - ');
                var from  = arr[0];
                var to  = arr[1];   
                $.post('<?=site_url('Reports/history_report_details')?>',{bus:bus,from:from,to:to}, function(data){
                    console.log(data);
                    history.clear();
                    $.each(data,function(k,v){
                        history.row.add(v);
                    });
                    history.draw();

                         $('#title').empty();
                         $('#bus_number').empty();
                         $('#date_range').empty();
                         $('#title').append('History Report');
                         $('#bus_number').append(bus_no[1]);
                         $('#date_range').append(date);

                         $('#example_data_head').empty();
                         $('#example_data').empty();
                         $('#example_data_head').append('<tr>'+
                                                            '<th>Date</th>'+
                                                            '<th>GPS Quality</th>'+
                                                            '<th>GPS Valid Data</th>'+
                                                            '<th>GPS Signal Strength</th>'+
                                                            '<th>Location</th>'+
                                                            '<th>Power</th>'+
                                                            '<th>Speed</th>'+
                                                            '<th>Total Satellites</th>'+
                                                            '<th>Vehicle Movement</th>'+
                                                        '</tr>');
                        
                     $.each(data, function(k,v){

                        $('#example_data').append('<tr>'+
                                                    '<td>'+v.datetime+'</td>'+
                                                    '<td>'+v.gps_quality_name+'</td>'+
                                                    '<td>'+v.gps_valid_data_name+'</td>'+
                                                    '<td>'+v.gsm_signal_strength+'</td>'+
                                                    '<td>'+v.address+'</td>'+
                                                    '<td>'+v.power_status_name+'</td>'+
                                                    '<td>'+v.speed+'</td>'+
                                                    '<td>'+v.total_satellites+'</td>'+
                                                    '<td>'+v.vehicle_movement_status_name+'</td>'+
                                                  '</tr>');
                    });
                    $('#example_foot').attr('colspan',9);
                    $('.loading').hide();
                    $('.history_map').show();
                },'json');
            });

            var myTable = $('.dataTables-example').DataTable({
                "paging": true,
                "pageLength": 20,
                "searching": false,
                "ordering": true,
                "info": true,
                "dom": "Bfrtip",
                "data": [],
                "buttons": [
                     {
                        "extend" : "excelHtml5",
                        "text" : "<i class='fa fa-file-excel-o'></i>",
                        "titleAttr" : "Excel",
                    },
                    {
                        "extend" : "pdfHtml5",
                        "text" : "<i class='fa fa-file-pdf-o'></i>",
                        "titleAttr" : "PDF",
                    }
                ],
                "columns": [{
                    "title": "Sr No",
                    "data": "device_id"
                }, {
                    "title": "Date",
                    "data": "date"
                }, {
                    "title": "Distance (km)",
                    "data": "dist_diff"
                }],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                }

            });

            var stoppage = $('.dataTables-example1').DataTable({
                "paging": true,
                "pageLength": 20,
                "searching": false,
                "ordering": true,
                "info": true,
                "dom": "Bfrtip",
                "data": [],
                "buttons": [
                     {
                        "extend" : "excelHtml5",
                        "text" : "<i class='fa fa-file-excel-o'></i>",
                        "titleAttr" : "Excel",
                    },
                    {
                        "extend" : "pdfHtml5",
                        "text" : "<i class='fa fa-file-pdf-o'></i>",
                        "titleAttr" : "PDF"
                    }
                ],
                "columns": [{
                    "title": "Stop Name",
                    "data": "address",
                    "defaultContent": "<i>N/A</i>"
                }, {
                    "title": "Start Time",
                    "data": "start_time",
                    "defaultContent": "<i>N/A</i>"
                }, {
                    "title": "End Time",
                    "data": "end_time"
                }, {
                    "title": "Total Time",
                    "data": "total_time"
                }],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                }

            });

            var overspeed = $('.dataTables-example2').DataTable({
                "paging": true,
                "pageLength": 20,
                "searching": false,
                "ordering": true,
                "info": true,
                "dom": "Bfrtip",
                "data": [],
                "buttons": [
                     {
                        "extend" : "excelHtml5",
                        "text" : "<i class='fa fa-file-excel-o'></i>",
                        "titleAttr" : "Excel",
                    },
                    {
                        "extend" : "pdfHtml5",
                        "text" : "<i class='fa fa-file-pdf-o'></i>",
                        "titleAttr" : "PDF"
                    }
                ],
                "columns": [{
                    "title": "Date",
                    "data": "datetime"
                }, {
                    "title": "Speed (kmph)",
                    "data": "speed"
                }, {
                    "title": "Location",
                    "data": "address",
                    "defaultContent": "<i>N/A</i>"
                }],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                }

            });

            var history = $('.dataTables-example3').DataTable({
                "paging": true,
                "pageLength": 20,
                "searching": false,
                "ordering": true,
                "info": true,
                "dom": "Bfrtip",
                "data": [],
                "buttons": [
                     {
                        "extend" : "excelHtml5",
                        "text" : "<i class='fa fa-file-excel-o'></i>",
                        "titleAttr" : "Excel",
                    },
                    {
                        "extend" : "pdfHtml5",
                        "text" : "<i class='fa fa-file-pdf-o'></i>",
                        "titleAttr" : "PDF"
                    }
                ],
                "columns": [{
                    "title": "Date",
                    "data": "datetime"
                }, {
                    "title": "GPS Quality",
                    "data": "gps_quality_name"
                },{
                    "title": "GPS Valid Data",
                    "data": "gps_valid_data_name"
                },{
                    "title": "GSM Signal Strength",
                    "data": "gsm_signal_strength"
                },{
                    "title": "Location",
                    "data": "address",
                     "defaultContent": "<i>N/A</i>"
                },{
                    "title": "Power",
                    "data": "power_status_name"
                },{
                    "title": "Speed (kmph)",
                    "data": "speed"
                },{
                    "title": "Total Satellites",
                    "data": "total_satellites"
                },{
                    "title": "Vehicle Movement",
                    "data": "vehicle_movement_status_name"
                }],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'>"
                }

            });
        });
    </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>