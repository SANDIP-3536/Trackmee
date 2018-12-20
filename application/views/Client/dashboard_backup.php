        <div class="wrapper wrapper-content">
            <nav class="white-bg" role="navigation">
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li id="activity">
                           <a><i class="fa fa-list" style="display: inline;font-size: initial;"></i> Activity <span></span></a>
                        </li>
                        <li id="schedule"><a><i class="fa fa-calendar" style="display:inline;font-size: initial;"></i> Schedule</a>
                        </li>
                        <li id="fee_report"><a><i class="fa fa-signal" style="display:inline;font-size: initial;"></i>Fee Report</a>
                        </li>
                    </ul>
                </div>
            </nav><br>
            <div class="row">       
                <div class="col-md-7" style="position:sticky;" id="activity_portion">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Daily Attendance Overview</h5>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>      
                <div class="col-md-7 " style="position:sticky;" id="schedule_portion">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Schedule Overview</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <div id="calendar" class="col-centered"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
                <div class="col-md-7" style="position:sticky;" id="fee_portion">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Fee Report Overview</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row" >
                        <div class="col-sm-12" style="padding-left:03px;">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title" style="background-image: url(http://syntech.co.in/trackmee/assets/img/bck_birthday.png);background-size: contain;color:#fff;">
                                    <h5>Birthday</h5>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <h1 class="no-margins" style="padding-top: 0px;padding-right:45px;"><b><center>
                                                <?php echo $total_student; ?></b></center>
                                            </h1>
                                            <h3><b>Student Birthday</b></h3>
                                            <h1 class="no-margins" style="padding-top: 0px;padding-right:45px;"><b><center>
                                                <?php echo $total_student; ?></b></center>
                                            </h1>
                                            <h3><b>Employee Birthday</b></h3>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="image"><img src="<?=base_url()?>assets/img/birthday.png"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <div class="ibox float-e-margins"  style="background-color:rgba(35, 198, 200, 0.74);margin-bottom:1px;">
                            <div class="ibox-content"  style="background-color:rgba(35, 198, 200, 0.74);padding:5px 7px 11px 21px;">
                                <div class="row">
                                    <div class="col-sm-5" style="color:#ffffff;">
                                        <h1 class="no-margins" style="padding-top: 21px;"><b><center>
                                            <?php echo $total_student; ?></b></center>
                                        </h1>
                                        <h3><b>Student's</b></h3>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="image"><img src="<?=base_url()?>assets/img/student.png"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="ibox float-e-margins"  style="background-color:rgba(103, 198, 241, 0.74);margin-bottom:1px;">
                            <div class="ibox-content"  style="background-color:rgba(103, 198, 241, 0.74);padding:5px 7px 11px 21px;">
                                <div class="row">
                                    <div class="col-sm-5" style="color:#ffffff;">
                                        <h1 class="no-margins" style="padding-top: 21px;"><b><center>
                                            <?php echo $total_employee; ?></b></center></h1>
                                            <h3><b>Employee's</b></h3>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="image"><img src="<?=base_url()?>assets/img/employee.png"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="ibox float-e-margins"  style="background-color:rgba(103, 58, 183, 0.74);margin-bottom:1px;">
                            <div class="ibox-content"  style="background-color:rgba(103, 58, 183, 0.74);padding:5px 7px 11px 21px;">
                                <div class="row">
                                    <div class="col-sm-5" style="color:#ffffff;">
                                        <h1 class="no-margins" style="padding-top: 21px;"><b><center>
                                            <?php echo $total_teacher; ?></b></center></h1>
                                            <h3><b>Teacher's</b></h3>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="image"><img src="<?=base_url()?>assets/img/teacher.png"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="ibox float-e-margins"  style="background-color:rgba(103, 198, 241, 0.74);margin-bottom:1px;">
                            <div class="ibox-content"  style="background-color:rgba(103, 198, 241, 0.74);padding:5px 7px 11px 21px;">
                                <div class="row">
                                    <div class="col-sm-5" style="color:#ffffff;">
                                        <h1 class="no-margins" style="padding-top: 21px;"><b><center>
                                            <?php echo $total_bus; ?></b></center></h1>
                                            <h3><b>Bus's</b></h3>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="image"><img src="<?=base_url()?>assets/img/bus.png"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="ibox float-e-margins"  style="background-color:rgba(35, 198, 200, 0.74);margin-bottom:1px;">
                            <div class="ibox-content"  style="background-color:rgba(35, 198, 200, 0.74);padding:5px 7px 11px 21px;">
                                <div class="row">
                                    <div class="col-sm-5" style="color:#ffffff;">
                                        <h1 class="no-margins" style="padding-top: 21px;"><b><center>
                                            <?php echo $total_driver; ?></b></center></h1>
                                            <h3><b>Driver's</b></h3>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="image"><img src="<?=base_url()?>assets/img/driver.png"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="ibox float-e-margins"  style="background-color:rgba(103, 58, 183, 0.74);margin-bottom:1px;">
                            <div class="ibox-content"  style="background-color:rgba(103, 58, 183, 0.74);padding:5px 7px 11px 21px;">
                                <div class="row">
                                    <div class="col-sm-5" style="color:#ffffff;">
                                        <h1 class="no-margins" style="padding-top: 21px;"><b><center>
                                            <?php echo $total_travel_bus; ?></b></center></h1>
                                            <h3><b>Travel Bus's</b></h3>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="image"><img src="<?=base_url()?>assets/img/bus.png"></div>
                                    </div>
                                </div>
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
                               <img src="<?php echo $school_logo; ?>" style="height:20px;width:20px;"> <strong style="color:#ffffff;"><?php echo $school_name; ?> </strong> 
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
</div>
<script src="<?=base_url()?>assets/js/plugins/fullcalendar/moment.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery-2.1.1.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?=base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?=base_url()?>assets/js/inspinia.js"></script>
<script src="<?=base_url()?>assets/js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI custom -->
<script src="<?=base_url()?>assets/js/jquery-ui.custom.min.js"></script>

<script src="<?=base_url()?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>

<!-- Data picker -->
<script src="<?=base_url()?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- iCheck -->
<script src="<?=base_url()?>assets/js/plugins/iCheck/icheck.min.js"></script>

<!-- Full Calendar -->
<script src="<?=base_url()?>assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>

<script src="<?=base_url()?>assets/js/plugins/chartJs/Chart.min.js"></script>

<script>

$(document).ready(function() {
    <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
        swal({
            title: "<?=$flash['title']?>",
            text: "<?=$flash['text']?>",
            type: "<?=$flash['type']?>"
        });
        <?php } ?> <?php if($dashboard = 'dashboard') {?>
            $('#dashboard').addClass('active');
            <?php } ?>
            
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    // right: 'month'
                },
            // defaultDate: 'date()',
            // editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            select: function(start, end) {

                $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd').modal('show');
            },
            eventRender: function(event, element) {
                element.bind('dblclick', function() {
                    $('#ModalEdit #id').val(event.id);
                    $('#ModalEdit #title').val(event.title);
                    $('#ModalEdit #color').val(event.color);
                    $('#ModalEdit').modal('show');
                });
            },
            eventDrop: function(event, delta, revertFunc) { // si changement de position

                edit(event);

            },
            eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

                edit(event);

            },
            events: [
            <?php foreach($events as $event): 
            
            $start = explode(" ", $event['holiday_start_date']);
            $end = explode(" ", $event['holiday_end_date']);
            if($start[1] == '00:00:00'){
                $start = $start[0];
            }else{
                $start = $event['holiday_start_date'];
            }
            if($end[1] == '00:00:00'){
                $end = $end[0];
            }else{
                $end = $event['holiday_end_date'];
            }
            ?>
            {
                id: '<?php echo $event['holiday_id']; ?>',
                title: '<?php echo $event['holiday_name']; ?>',
                start: '<?php echo $start; ?>',
                end: '<?php echo $end; ?>',
                color: '#000',
            },
            <?php endforeach; ?>
            ]
        });
        
        function edit(event){
            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end){
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }else{
                end = start;
            }
            
            id =  event.id;
            
            Event = [];
            Event[0] = id;
            Event[1] = start;
            Event[2] = end;
            
            $.ajax({
               url: "<?=site_url('Holiday/select_cal_edit')?>",
               type: "POST",
               data: {Event:Event},
               success: function(rep){
                console.log(rep);
                if(rep == 'true'){
                    alert('Saved');
                }else{
                    alert('Could not be saved. try again.'); 
                }
            }
        });
        }

    var barData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "Employee",
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                pointBorderColor: "#fff",
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: "Student",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    };

    var barOptions = {
        responsive: true
    };


    var ctx2 = document.getElementById("barChart").getContext("2d");
    new Chart(ctx2, {type: 'bar', data: barData, options:barOptions});

    $('#schedule_portion').hide();
    $('#fee_portion').hide();
    $(document).on('click','#schedule',function(){
        $('#schedule_portion').show();
        $('#fee_portion').hide();
        $('#activity_portion').hide();
    });
    $(document).on('click','#activity',function(){
        $('#schedule_portion').hide();
        $('#fee_portion').hide();
        $('#activity_portion').show();
    });
    $(document).on('click','#fee_report',function(){
        $('#schedule_portion').hide();
        $('#fee_portion').show();
        $('#activity_portion').hide();
    });
});



        </script>
    </body>


    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:25:00 GMT -->
    </html>



