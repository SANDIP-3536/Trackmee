<div class="footer">

    <div class="row">

        <div class="col-sm-4">

            <div class="pull-left">

                <strong>Copyright </strong><a href="http://www.syntech.co.in" target="_blank"> <img src="<?=base_url()?>assets/img/syntech_logo.png" style="height:13px;"></a><strong> &copy; 2017-2018 </strong>  

            </div>

        </div>

        <?php if(!empty($client_logo)){  ?>

        <div class="col-sm-4">

            <center>

                <div>

                   <img src="<?php if(!empty($client_logo)){echo $client_logo;} ?>" style="height:20px;width:20px;"> <strong style="color:#ffffff;"><?php if(!empty($client_name)){echo $client_name;} ?> </strong> 

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
    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        });
    </script>
    <script>

        

        $('.loading').hide();

        $.validator.setDefaults({

            submitHandler: function (form) {    

                form.submit();

            }

        });



        <?php if($stoppage == 'stoppage'){?>

            $('#stoppage').addClass('active');

            document.title = 'Trackmee | Stoppage Details'

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

                $.post('<?=site_url('Stoppage/stoppage_report_details')?>',{bus:bus,from:from,to:to,min:min,bus_no:bus_no}, function(data){

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

                    $('#stoppage_on_map').removeClass();

                    $('#stoppage_on_map').addClass('btn btn-info');

                    $('.loading').hide();

                },'json');

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

        });

    </script>

</body>





<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->

</html>