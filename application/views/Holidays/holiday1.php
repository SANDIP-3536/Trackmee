<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
<head>
    <link rel="shortcut icon" type="image/png" href="<?=base_url()?>assets/img/logo.png"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Trackmee | School</title>

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
    <style type="text/css">
    .open>.dropdown-menu {
        display: block;
        width: max-content;
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
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar" style="background-color: black;"></span>
                            <span class="icon-bar" style="background-color: black;"></span>
                            <span class="icon-bar" style="background-color: black;"></span> 
                        </button>
                        <img class="img-responsive" src="<?=base_url()?>assets/img/Trackmee_logo.png" style="height:74px;"></a>
                    </div>
                    <div class="navbar-collapse collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <?php if($direct == 0){ ?>
                            <li>
                                <a href="<?=site_url('Authentication/direct_logout')?>"><img src="<?=base_url()?>assets/img/icon/school.png" style="display: -webkit-box;font-size: initial;padding-left: 12px;"></i> School</a>
                            </li>
                            <?php }?>
                            <?php if($functionality[0]['school_tracking'] == 1 && $functionality[0]['school_CRM'] == 0) {?>
                            <li id="dashboard">
                             <a href="<?=site_url('School')?>"><img src="<?=base_url()?>assets/img/icon/dashboard.png" style="display: -webkit-box;font-size: initial;padding-left: 20px;"></i> Dashboard </a>
                            </li>
                            <li class="dropdown" id="student">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/student.png" style="display: -webkit-box;font-size: initial;padding-left: 15px;"></i> Student <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="<?=site_url('Enquiry/view_enquiry')?>"> <img src="<?=base_url()?>assets/img/icon/student_small.png" style="display: inline-blocl;font-size: initial;   "></i> <b>Enquiry Details</b></a></li>
                                    <li><a href="<?=site_url('Student/student_registration')?>"> <img src="<?=base_url()?>assets/img/icon/student_small.png" style="display: inline-blocl;font-size: initial;"></i> <b>Student Registration</b></a></li>
                                    <li><a href="<?=site_url('Student/view_student')?>"> <img src="<?=base_url()?>assets/img/icon/student_small.png" style="display: inline-blocl;font-size: initial;   "></i> <b>Student Details</b></a></li>
                                    <li><a href="<?=site_url('Student_class_division_assign')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;color:#67C6F1;"></i> <b>Class & Division Assignment</b></a></li>
                                    <li><a href="<?=site_url('')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;color:#67C6F1;"></i> <b>Report</b></a></li>
                                </ul>
                            </li>
                            <li class="dropdown" id="employee">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/employee.png" style="display: -webkit-box;font-size: initial;padding-left: 25px;"></i> Employee <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="<?=site_url('Employee/employee_registration')?>"> <img src="<?=base_url()?>assets/img/icon/employee_small.png" style="display: inline-blocl;font-size: initial;"></i> <b>Employee Registration</b></a></li>
                                    <li><a href="<?=site_url('Employee/view_employee')?>"> <img src="<?=base_url()?>assets/img/icon/employee_small.png" style="display: inline-blocl;font-size: initial;"></i> <b>Employee Details</b></a></li>
                                     <li><a href="<?=site_url('Employee/HR_pay_roll')?>"> <img src="<?=base_url()?>assets/img/icon/employee_small.png" style="display: inline-blocl;font-size: initial;   "></i> <b>HR Pay Roll</b></a></li>
                                </ul>
                            </li>
                        <li class="dropdown" id="transport">
                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/transport.png" style="display: -webkit-box;font-size: initial;padding-left: 25px;"></i> Transport <span class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu">
                                <!-- <li><a href="<?=site_url('Driver/view_driver')?>"><img src="<?=base_url()?>assets/img/icon/driver.png" style="display: inline;font-size: initial;"></i> <b>Driver</b></a></li> -->
                                <li><a href="<?=site_url('Bus/view_school_bus')?>"><img src="<?=base_url()?>assets/img/icon/bus.png" style="display: inline;font-size: initial;"></i> <b>Bus Details</b></a></li>
                                <li><a href="<?=site_url('Route/route_registration')?>"><i class="fa fa-road" style="display: inline;font-size: initial;"></i> <b>Route Details</b></a></li>
                                <li><a href="<?=site_url('Stop/stop_registration')?>"><img src="<?=base_url()?>assets/img/icon/stop.png" style="display: inline;font-size: initial;"></i> <b>Stop Details</b></a></li>
                                <li><a href="<?=site_url('Driver_bus_route_assgn/driver_bus_route_assign')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial; color:#67C6F1;"></i> <b>Route Assignment</b></a></li>
                                <li><a href="<?=site_url('Student_stop_assign/student_stop_assignment')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;color:#67C6F1;"></i> <b>Stop Assignment</b></a></li>
                            </ul>
                        </li>
                        <li id="tracking">
                            <a href="<?=site_url('Tracking/view_map_table')?>"><img src="<?=base_url()?>assets/img/icon/tracking.png" style="display: -webkit-box;font-size: initial;padding-left: 15px;"></i> Tracking </a>
                        </li>
                        <li id="report">
                            <a href="<?=site_url('Reports/tracking_report_details')?>"><img src="<?=base_url()?>assets/img/icon/report.png" style="display: -webkit-box;font-size: initial;padding-left: 15px;"></i> Reports </a>
                        </li>
                        <li id="gallery">
                            <a href="<?=site_url('Gallery')?>"><img src="<?=base_url()?>assets/img/icon/gallery.png" style="display: -webkit-box;font-size: initial;padding-left: 10px;"></i> Gallery </a>
                        </li>
                        <li id="notification">
                            <a href="<?=site_url('Notification/notification_details')?>"><img src="<?=base_url()?>assets/img/icon/notification.png" style="display: -webkit-box;font-size: initial;padding-left: 30px;"></i> Notification's </a>
                        </li>
                        <li class="dropdown" id="fee">
                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/money.png" style="display: -webkit-box;font-size: initial;padding-left: 5px;"></i> Fee <span class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="<?=site_url('Fee/fee_details')?>"><img src="<?=base_url()?>assets/img/icon/event.png" style="display: inline;font-size: initial;"></i> <b> Fee Setup</b></a></li>
                                <li><a href="<?=site_url('Fee/fee_details')?>"><img src="<?=base_url()?>assets/img/icon/event.png" style="display: inline;font-size: initial;"></i> <b> Fee Details</b></a></li>
                                <li><a href="<?=site_url('Fee/fee_details')?>"><img src="<?=base_url()?>assets/img/icon/event.png" style="display: inline;font-size: initial;"></i> <b> Fee Reports</b></a></li>
                            </ul>
                        </li>
                        <li id="holiday">
                            <a href="<?=site_url('Holiday/holidays')?>"><img src="<?=base_url()?>assets/img/icon/holiday.png" style="display: -webkit-box;font-size: initial;padding-left: 15px;"></i> Holiday</a>
                        </li>
                        <li class="dropdown" id="help">
                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/help1.png" style="display: -webkit-box;font-size: initial;padding-left: 5px;"></i> Help <span class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu">
                                <!-- <li><a href="<?=site_url('Reports/tracking_report_details')?>"><i class="fa fa-bar-chart" style="display: inline;font-size: initial;"></i> <b> Tracking Report</b></a></li> -->
                            </ul>
                        </li>
                        <?php }  elseif($functionality[0]['school_tracking'] == 0 && $functionality[0]['school_CRM'] == 1) {?>
                        <li id="dashboard">
                         <a href="<?=site_url('School')?>"><img src="<?=base_url()?>assets/img/icon/dashboard.png" style="display: -webkit-box;font-size: initial;padding-left: 20px;"></i> Dashboard </a>
                        </li>
                        <li class="dropdown" id="student">
                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/student.png" style="display: -webkit-box;font-size: initial;padding-left: 15px;"></i> Student <span class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="<?=site_url('Enquiry/view_enquiry')?>"> <img src="<?=base_url()?>assets/img/icon/student_small.png" style="display: inline-blocl;font-size: initial;   "></i> <b>Enquiry Details</b></a></li>
                                <li><a href="<?=site_url('Student/student_registration')?>"> <img src="<?=base_url()?>assets/img/icon/student_small.png" style="display: inline-blocl;font-size: initial;"></i> <b>Student Registration</b></a></li>
                                <li><a href="<?=site_url('Student/view_student')?>"> <img src="<?=base_url()?>assets/img/icon/student_small.png" style="display: inline-blocl;font-size: initial;   "></i> <b>Student Details</b></a></li>
                                <li><a href="<?=site_url('Student_class_division_assign')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;color:#67C6F1;"></i> <b>Class & Division Assignment</b></a></li>
                                <li><a href="<?=site_url('')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;color:#67C6F1;"></i> <b>Report</b></a></li>
                            </ul>
                        </li>
                        <li class="dropdown" id="employee">
                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/employee.png" style="display: -webkit-box;font-size: initial;padding-left: 25px;"></i> Employee <span class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="<?=site_url('Employee/employee_registration')?>"> <img src="<?=base_url()?>assets/img/icon/employee_small.png" style="display: inline-blocl;font-size: initial;"></i> <b>Employee Registration</b></a></li>
                                <li><a href="<?=site_url('Employee/view_employee')?>"> <img src="<?=base_url()?>assets/img/icon/employee_small.png" style="display: inline-blocl;font-size: initial;"></i> <b>Employee Details</b></a></li>
                                 <li><a href="<?=site_url('Employee/HR_pay_roll')?>"> <img src="<?=base_url()?>assets/img/icon/employee_small.png" style="display: inline-blocl;font-size: initial;   "></i> <b>HR Pay Roll</b></a></li>
                            </ul>
                        </li>
                    <li id="gallery">
                        <a href="<?=site_url('Gallery')?>"><img src="<?=base_url()?>assets/img/icon/gallery.png" style="display: -webkit-box;font-size: initial;padding-left: 10px;"></i> Gallery </a>
                    </li>
                    <li class="dropdown" id="education">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/education1.png" style="display: -webkit-box;font-size: initial;padding-left: 20px;"></i> Academic <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?=site_url('School_class/class_details')?>"><img src="<?=base_url()?>assets/img/icon/subject.png" style="display: inline;font-size: initial;"></i> <b>Class&Division&Subject Details</b></a></li>
                            <li><a href="<?=site_url('Teacher_subject_assign')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;color:#67C6F1;"></i> <b>Subject Assignment</b></a></li>
                            <li><a href="<?=site_url('Teacher_class_division_subject_assign')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;color:#67C6F1;"></i> <b>Teacher Assignment</b></a></li>
                            <li><a href="<?=site_url('Lesson')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;color:#67C6F1;"></i> <b>Lesson Management</b></a></li>
                            <li><a href="<?=site_url('Timetable')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;"></i> <b>Timetables</b></a></li>
                            <!-- <li><a href="<?=site_url('Attendance')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;"></i> <b>Attendance</b></a></li> -->
                            <!-- <li><a href="<?=site_url('Division/division_details')?>"><img src="<?=base_url()?>assets/img/icon/class.png" style="display: inline;font-size: initial;"></i> <b>Division</b></a></li> -->
                            <!-- <li><a href="<?=site_url('Subject/subject_details')?>"><img src="<?=base_url()?>assets/img/icon/subject.png" style="display: inline;font-size: initial;"></i> <b>Subject</b></a></li> -->
                            <!-- <li><a href="<?=site_url('Student_class_division_assign')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;color:#67C6F1;"></i> <b>Student Class Division</b></a></li> -->
                        </ul>
                    </li>
                    <li id="exam">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/exam1.png" style="display: -webkit-box;font-size: initial;padding-left: 10px;"></i> Exam <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?=site_url('Exam/exam_details')?>"><img src="<?=base_url()?>assets/img/icon/exam.png" style="display: inline;font-size: initial;"></i> <b>Exam Setup</b></a></li>
                            <li><a href="<?=site_url('Exam/exam_details')?>"><img src="<?=base_url()?>assets/img/icon/exam.png" style="display: inline;font-size: initial;"></i> <b>Exam Schedule</b></a></li>
                            <li><a href="<?=site_url('Exam/exam_details')?>"><img src="<?=base_url()?>assets/img/icon/exam.png" style="display: inline;font-size: initial;"></i> <b>Exam Report</b></a></li>
                        </ul>
                    </li>
                    <li id="notification">
                        <a href="<?=site_url('Notification/notification_details')?>"><img src="<?=base_url()?>assets/img/icon/notification.png" style="display: -webkit-box;font-size: initial;padding-left: 30px;"></i> Notification's </a>
                    </li>
                    <li class="dropdown" id="fee">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/money.png" style="display: -webkit-box;font-size: initial;padding-left: 5px;"></i> Fee <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?=site_url('Fee/fee_details')?>"><img src="<?=base_url()?>assets/img/icon/event.png" style="display: inline;font-size: initial;"></i> <b> Fee Setup</b></a></li>
                            <li><a href="<?=site_url('Fee/fee_details')?>"><img src="<?=base_url()?>assets/img/icon/event.png" style="display: inline;font-size: initial;"></i> <b> Fee Details</b></a></li>
                            <li><a href="<?=site_url('Fee/fee_details')?>"><img src="<?=base_url()?>assets/img/icon/event.png" style="display: inline;font-size: initial;"></i> <b> Fee Reports</b></a></li>
                        </ul>
                    </li>
                    <li id="holiday">
                        <a href="<?=site_url('Holiday/holidays')?>"><img src="<?=base_url()?>assets/img/icon/holiday.png" style="display: -webkit-box;font-size: initial;padding-left: 15px;"></i> Holiday</a>
                    </li>
                    <li class="dropdown" id="help">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/help1.png" style="display: -webkit-box;font-size: initial;padding-left: 5px;"></i> Help <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <!-- <li><a href="<?=site_url('Reports/tracking_report_details')?>"><i class="fa fa-bar-chart" style="display: inline;font-size: initial;"></i> <b> Tracking Report</b></a></li> -->
                        </ul>
                    </li>
                    <?php }  else {?>
                    <li id="dashboard">
                     <a href="<?=site_url('School')?>"><img src="<?=base_url()?>assets/img/icon/dashboard.png" style="display: -webkit-box;font-size: initial;padding-left: 20px;"></i> Dashboard </a>
                 </li>
                 <li class="dropdown" id="student">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/student.png" style="display: -webkit-box;font-size: initial;padding-left: 15px;"></i> Student <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="<?=site_url('Enquiry/view_enquiry')?>"> <img src="<?=base_url()?>assets/img/icon/student_small.png" style="display: inline-blocl;font-size: initial;   "></i> <b>Enquiry Details</b></a></li>
                        <li><a href="<?=site_url('Student/student_registration')?>"> <img src="<?=base_url()?>assets/img/icon/student_small.png" style="display: inline-blocl;font-size: initial;"></i> <b>Student Registration</b></a></li>
                        <li><a href="<?=site_url('Student/view_student')?>"> <img src="<?=base_url()?>assets/img/icon/student_small.png" style="display: inline-blocl;font-size: initial;   "></i> <b>Student Details</b></a></li>
                        <li><a href="<?=site_url('Student_class_division_assign')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;color:#67C6F1;"></i> <b>Class & Division Assignment</b></a></li>
                        <li><a href="<?=site_url('')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;color:#67C6F1;"></i> <b>Report</b></a></li>
                    </ul>
                </li>
                 <li class="dropdown" id="employee">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/employee.png" style="display: -webkit-box;font-size: initial;padding-left: 25px;"></i> Employee <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="<?=site_url('Employee/employee_registration')?>"> <img src="<?=base_url()?>assets/img/icon/employee_small.png" style="display: inline-blocl;font-size: initial;"></i> <b>Employee Registration</b></a></li>
                        <li><a href="<?=site_url('Employee/view_employee')?>"> <img src="<?=base_url()?>assets/img/icon/employee_small.png" style="display: inline-blocl;font-size: initial;"></i> <b>Employee Details</b></a></li>
                         <li><a href="<?=site_url('Employee/HR_pay_roll')?>"> <img src="<?=base_url()?>assets/img/icon/employee_small.png" style="display: inline-blocl;font-size: initial;   "></i> <b>HR Pay Roll</b></a></li>
                    </ul>
                </li>
                <li class="dropdown" id="transport">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/transport.png" style="display: -webkit-box;font-size: initial;padding-left: 25px;"></i> Transport <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="<?=site_url('Bus/view_school_bus')?>"><img src="<?=base_url()?>assets/img/icon/bus.png" style="display: inline;font-size: initial;"></i> <b>Bus Details</b></a></li>
                        <li><a href="<?=site_url('Route/route_registration')?>"><i class="fa fa-road" style="display: inline;font-size: initial;"></i> <b>Route Details</b></a></li>
                        <li><a href="<?=site_url('Stop/stop_registration')?>"><img src="<?=base_url()?>assets/img/icon/stop.png" style="display: inline;font-size: initial;"></i> <b>Stop Details</b></a></li>
                        <li><a href="<?=site_url('Driver_bus_route_assgn/driver_bus_route_assign')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial; color:#67C6F1;"></i> <b>Route Assignment</b></a></li>
                        <li><a href="<?=site_url('Student_stop_assign/student_stop_assignment')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;color:#67C6F1;"></i> <b>Stop Assignment</b></a></li>
                        <li id="tracking"><a href="<?=site_url('Tracking/view_map_table')?>"><img src="<?=base_url()?>assets/img/icon/tracking_small.png" style="display:inline-block;font-size: initial;"></i> <b>Live Tracking </b></a></li>
                        <li><a href="<?=site_url('Reports/tracking_report_details')?>"><i class="fa fa-bar-chart" style="display: inline;font-size: initial;"></i> <b> Tracking Report</b></a></li>
                    </ul>
                </li>
                <li class="dropdown" id="education">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/education1.png" style="display: -webkit-box;font-size: initial;padding-left: 20px;"></i> Academic <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="<?=site_url('School_class/class_details')?>"><img src="<?=base_url()?>assets/img/icon/subject.png" style="display: inline;font-size: initial;"></i> <b>Class&Division&Subject Details</b></a></li>
                        <li><a href="<?=site_url('Teacher_subject_assign')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;color:#67C6F1;"></i> <b>Subject Assignment</b></a></li>
                        <li><a href="<?=site_url('Teacher_class_division_subject_assign')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;color:#67C6F1;"></i> <b>Teacher Assignment</b></a></li>
                        <li><a href="<?=site_url('Lesson')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;color:#67C6F1;"></i> <b>Lesson Management</b></a></li>
                        <li><a href="<?=site_url('Timetable')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;"></i> <b>Timetables</b></a></li>
                        <!-- <li><a href="<?=site_url('Attendance')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;"></i> <b>Attendance</b></a></li> -->
                        <!-- <li><a href="<?=site_url('Division/division_details')?>"><img src="<?=base_url()?>assets/img/icon/class.png" style="display: inline;font-size: initial;"></i> <b>Division</b></a></li> -->
                        <!-- <li><a href="<?=site_url('Subject/subject_details')?>"><img src="<?=base_url()?>assets/img/icon/subject.png" style="display: inline;font-size: initial;"></i> <b>Subject</b></a></li> -->
                        <!-- <li><a href="<?=site_url('Student_class_division_assign')?>"><i class="fa fa-check-square-o" style="display: inline;font-size: initial;color:#67C6F1;"></i> <b>Student Class Division</b></a></li> -->
                    </ul>
                </li>
                <li id="exam">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/exam1.png" style="display: -webkit-box;font-size: initial;padding-left: 10px;"></i> Exam <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="<?=site_url('Exam/exam_details')?>"><img src="<?=base_url()?>assets/img/icon/exam.png" style="display: inline;font-size: initial;"></i> <b>Exam Setup</b></a></li>
                        <li><a href="<?=site_url('Exam/exam_details')?>"><img src="<?=base_url()?>assets/img/icon/exam.png" style="display: inline;font-size: initial;"></i> <b>Exam Schedule</b></a></li>
                        <li><a href="<?=site_url('Exam/exam_details')?>"><img src="<?=base_url()?>assets/img/icon/exam.png" style="display: inline;font-size: initial;"></i> <b>Exam Report</b></a></li>
                    </ul>
                </li>
                <li class="dropdown" id="fee">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/money.png" style="display: -webkit-box;font-size: initial;padding-left: 5px;"></i> Fee <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="<?=site_url('Fee/fee_details')?>"><img src="<?=base_url()?>assets/img/icon/event.png" style="display: inline;font-size: initial;"></i> <b> Fee Setup</b></a></li>
                        <li><a href="<?=site_url('Fee/fee_details')?>"><img src="<?=base_url()?>assets/img/icon/event.png" style="display: inline;font-size: initial;"></i> <b> Fee Details</b></a></li>
                        <li><a href="<?=site_url('Fee/fee_details')?>"><img src="<?=base_url()?>assets/img/icon/event.png" style="display: inline;font-size: initial;"></i> <b> Fee Reports</b></a></li>
                    </ul>
                </li>
                <li class="dropdown" id="other">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/other_big.png" style="display: -webkit-box;font-size: initial;padding-left: 23px;"></i> Add One's <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li id="gallery"><a href="<?=site_url('Gallery')?>"><img src="<?=base_url()?>assets/img/icon/gallery_small.png" style="display: inline-block;font-size: initial;"></i> <b>Gallery </b></a></li>
                        <li id="holiday"><a href="<?=site_url('Holiday/holidays')?>"><img src="<?=base_url()?>assets/img/icon/holiday_small.png" style="display: inline-block;font-size: initial;"></i> <b>Holiday</b></a></li>
                        <li id="notification"><a href="<?=site_url('Notification/notification_details')?>"><img src="<?=base_url()?>assets/img/icon/stu_notification.png" style="display: inline;font-size: initial;"></i> <b> Notification's</b></a></li>
                    </ul>
                </li>
                <li class="dropdown" id="report">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/report.png" style="display: -webkit-box;font-size: initial;padding-left: 15px;"></i> Reports <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <!-- <li><a href="<?=site_url('Reports/tracking_report_details')?>"><i class="fa fa-bar-chart" style="display: inline;font-size: initial;"></i> <b> Tracking Report</b></a></li> -->
                    </ul>
                </li>
                <li class="dropdown" id="help">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/help1.png" style="display: -webkit-box;font-size: initial;padding-left: 5px;"></i> Help <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <!-- <li><a href="<?=site_url('Reports/tracking_report_details')?>"><i class="fa fa-bar-chart" style="display: inline;font-size: initial;"></i> <b> Tracking Report</b></a></li> -->
                    </ul>
                </li>
                <?php } ?>
            </ul> 
            <ul class="nav navbar-top-links navbar-right">
             <div class="dropdown profile-element">
                <center>
                    <?php if($direct != 0){ ?>
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
                                    <?php if($direct != 0){ ?><a href="<?=site_url('School/edit_profile')?>">My Account</a> <?php } ?>
                                </div>       
                            </div>

                        </div>
                        
                        <div style="background-color:#000000;">
                            <div style="padding:3%;">
                                <a href="<?=site_url('School/forgot_password')?>" style="color:#ffffff;">Change Password?</a>
                                <a href="<?=site_url('Authentication/logout')?>" class="btn btn-xs btn-primary pull-right" style:"color:#000000; padding-bottom:2%;">Logout</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </center>
            </div>
        </ul>
        <ul class="nav navbar-top-links navbar-right">
            <li style="padding-top: 20%;">
                <span class="m-r-sm text-muted welcome-message"> <b>Academic Year </b><br><center><b><?php echo $AY_name; ?></b></center></span>
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
                                <div id="calendar" class="col-centered">
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form class="form-horizontal" method="POST" action="<?=site_url('Holiday/addEvent')?>" id="addHoliday">
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
                                            <div class="form-group"> 
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" class="form-control" id="id">
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
            <i class="fa fa-phone-square" aria-hidden="true"></i><strong> 020-24269021 / 7030578612</strong> | <i class="fa fa-envelope" aria-hidden="true"></i> <strong>contactus@syntech.co.in </strong> 
        </div>
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

<script src="<?=base_url()?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>

<!-- Data picker -->
<script src="<?=base_url()?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- iCheck -->
<script src="<?=base_url()?>assets/js/plugins/iCheck/icheck.min.js"></script>

<!-- Full Calendar -->
<script src="<?=base_url()?>assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="<?= base_url();?>assets/js/plugins/validate/jquery.validate.min.js"></script>
<script src="<?= base_url();?>assets/js/plugins/validate/additional-methods.min.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $(".loader").fadeOut("slow");
    });
</script>
<script>

$(document).ready(function() {
    <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
        swal({
            title: "<?=$flash['title']?>",
            text: "<?=$flash['text']?>",
            type: "<?=$flash['type']?>"
        });
        <?php } ?> 

        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            }
        }); 

         $("#addHoliday").validate({
                rules: {
                    title:{
                        required:true,
                        pattern:/^[a-zA-Z\s]*$/
                    }
                },
                messages: {
                    title:{
                        pattern:"Please Enter only charater."
                    }
                }
            });

        <?php if($holiday == 'holiday'){?>
            $('#holiday').addClass('active');
            $('#other').addClass('active');
            document.title = "TrackMee | Holiday";
        <?php } ?>
            
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month'
                },
            // defaultDate: 'date()',
            editable: true,
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

});

</script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:25:00 GMT -->
</html>
