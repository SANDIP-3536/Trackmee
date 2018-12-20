<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
<head>
    <link rel="shortcut icon" class="img-circle" type="image/png" href="<?=base_url()?>assets/img/logo.png"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Trackmee | School</title>

    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?=base_url()?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="<?=base_url()?>assets/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>
    <link href="<?=base_url()?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="<?=base_url()?>assets/css/animate.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">

</head>


<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
                <a href="#" class="navbar-brand" style="height: 65px;">Trackmee</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active">
                       <a href="#"><i class="fa fa-th-large" style="display: -webkit-box;font-size: initial;padding-left: 30px;"></i> Dashboard </a>
                    </li>
                    <li>
                       <a href="<?=site_url('Student/view_student')?>"><i class="fa fa-users" style="display: -webkit-box;font-size: initial;padding-left: 17px;"></i> Student </a>
                    </li>
                    <li>
                       <a href="<?=site_url('Bus/bus_registration')?>"><i class="fa fa-bus" style="display: -webkit-box;font-size: initial;padding-left: 05px;"></i> Bus</a>
                    </li>
                    <li>
                       <a href="<?=site_url('Device/device_registration')?>"><i class="fa fa-tablet" style="display: -webkit-box;font-size: initial;padding-left: 15px;"></i> Device </a>
                    </li>
                    <li>
                       <a href="<?=site_url('Route/route_registration')?>"><i class="fa fa-road" style="display: -webkit-box;font-size: initial;padding-left: 10px;"></i> Route </a>
                    </li>
                    <li>
                       <a href="<?=site_url('Stop/stop_registration')?>"><i class="fa fa-stop" style="display: -webkit-box;font-size: initial;padding-left: 07px;"></i> Stop </a>
                    </li>
                    <li>
                       <a href="<?=site_url('Driver/view_driver')?>"><i class="fa fa-users" style="display: -webkit-box;font-size: initial;padding-left: 11px;"></i> Driver </a>
                    </li>
                    <li>
                       <a href="<?=site_url('Holiday/holidays')?>"><i class="fa fa-calendar" style="display: -webkit-box;font-size: initial;padding-left: 15px;"></i> Holiday </a>
                    </li>
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-check-square-o" style="display: -webkit-box;font-size: initial;padding-left: 15px;"></i> Assign <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <!-- <li><a href="<?=site_url('Driver/view_driver')?>">View Driver</a></li>
                            <li><a href="<?=site_url('Driver/driver_registration')?>">Driver Registration</a></li> -->
                            <li><a href="<?=site_url('Driver_bus_route_assgn/driver_bus_route_assign')?>">Driver Bus Route Assign</a></li>
                            <li><a href="<?=site_url('Student_stop_assign/student_stop_assignment')?>">Student Stop Assign</a></li>
                        </ul>
                    </li>
                    <!--  <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-secret" style="display: -webkit-box;font-size: initial;padding-left: 30px;"></i> Staff <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="#">View Staff</a></li>
                            <li><a href="<?=site_url('Staff/teaching_staff_registration')?>">Add Teaching Staff</a></li>
                        </ul>
                    </li> -->

                </ul>
                <ul class="nav navbar-top-links navbar-right">
                     <li>
                        <div class="dropdown profile-element">
                            <center>
                                <span>
                                    <img alt="image" class="img-circle" src="<?php echo $photo ?>" style="height:39px;width:39px;padding: 01px;">    
                                </span>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false" style="padding: 0px 0px;">
                                    <span class="clear">
                                        <span class="text-muted text-xs block"> <?php echo $user ?> <b class="caret"></b></span> 
                                    </span>
                                </a>
                                 <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li>
                                        <a href="<?=site_url('Authentication/logout')?>"><i class="fa fa-sign-out"></i> Logout</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-unlock-alt"></i> Forgot Password</a>
                                    </li>
                                  </ul>
                            </center>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        </div>
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Add Holiday's</b></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <!-- <h1>FullCalendar BS3 PHP MySQL</h1> -->
                                            <!-- <p class="lead">Complete with pre-defined file paths that you won't have to change!</p> -->
                                            <div id="calendar" class="col-centered">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.row -->

                                    <!-- Modal -->
                                    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form class="form-horizontal" method="POST" action="<?=site_url('Holiday/addEvent')?>">

                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Add Event</h4>
                                            </div>
                                            <div class="modal-body">

                                              <div class="form-group">
                                                <label for="title" class="col-sm-2 control-label">Title</label>
                                                <div class="col-sm-10">
                                                  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                                              </div>
                                          </div>
                                          <!-- <div class="form-group">
                                            <label for="color" class="col-sm-2 control-label">Color</label>
                                            <div class="col-sm-10">
                                              <select name="color" class="form-control" id="color">
                                                  <option value="">Choose</option>
                                                  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                                                  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                                                  <option style="color:#008000;" value="#008000">&#9724; Green</option>                       
                                                  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                                                  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                                  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                                                  <option style="color:#000;" value="#000">&#9724; Black</option>

                                              </select>
                                          </div>
                                      </div> -->
                                      <div class="form-group">
                                        <label for="start" class="col-sm-2 control-label">Start date</label>
                                        <div class="col-sm-10">
                                          <input type="text" name="start" class="form-control" id="start" readonly>
                                      </div>
                                  </div>
                                  <div class="form-group" hidden="">
                                    <label for="end" class="col-sm-2 control-label">End date</label>
                                    <div class="col-sm-10">
                                      <input type="text" name="end" class="form-control" id="end" readonly>
                                  </div>
                              </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
        
        <!-- Modal -->
        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">  
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="<?=site_url('Holiday/cal_edit')?>">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Event</h4>
                </div>
                <div class="modal-body">

                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                  </div>
              </div>
             <!--  <div class="form-group">
                <label for="color" class="col-sm-2 control-label">Color</label>
                <div class="col-sm-10">
                  <select name="color" class="form-control" id="color">
                      <option value="">Choose</option>
                      <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                      <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                      <option style="color:#008000;" value="#008000">&#9724; Green</option>                       
                      <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                      <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                      <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                      <option style="color:#000;" value="#000">&#9724; Black</option>

                  </select>
              </div>
          </div> -->
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
            </div>
        </div>
    </div>

    <input type="hidden" name="id" class="form-control" id="id">


</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>
</div>

</div>
</div>
</div>
<div class="footer">
            <div class="pull-right">
                <i class="fa fa-phone-square" aria-hidden="true"></i><strong> 020-24269021 / 7030578612</strong> | <i class="fa fa-envelope" aria-hidden="true"></i> <strong>contact@syntech.co.in</strong> 
            </div>
            <div>
                <strong>Copyright </strong><a href="http://www.syntech.co.in" target="_blank"> <img src="<?=base_url()?>assets/img/syntech_logo.png" style="height:13px;"></a><b> &copy; 2017-2018</b> 
            </div>
        </div>
</div>
</div>
</div>

<!-- Mainly scripts -->
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

<!-- Data picker -->
<script src="<?=base_url()?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- iCheck -->
<script src="<?=base_url()?>assets/js/plugins/iCheck/icheck.min.js"></script>

<!-- Full Calendar -->
<script src="<?=base_url()?>assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>

<script>

    $(document).ready(function() {
        
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month'
            },
            // defaultDate: 'date()',
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
            
                $start = explode(" ", $event['start']);
                $end = explode(" ", $event['end']);
                if($start[1] == '00:00:00'){
                    $start = $start[0];
                }else{
                    $start = $event['start'];
                }
                if($end[1] == '00:00:00'){
                    $end = $end[0];
                }else{
                    $end = $event['end'];
                }
            ?>
                {
                    id: '<?php echo $event['id']; ?>',
                    title: '<?php echo $event['title']; ?>',
                    start: '<?php echo $start; ?>',
                    end: '<?php echo $end; ?>',
                    color: '<?php echo $event['color']; ?>',
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
        
    });

</script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:25:00 GMT -->
</html>
