<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
<head>
    <link rel="shortcut icon" type="image/png" href="<?=base_url()?>assets/img/logo.png"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Trackmee | Teacher</title>

    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/datepicker.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/animate.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>
    <link href="<?=base_url()?>assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/jquery.paginate.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <style type="text/css">
        .open>.dropdown-menu {
            display: block;
            width: max-content;
        }
        .dropdown-menu > li > a:hover{
            border-bottom: 1px solid #a7b1c2;
            border-radius: 02px;
        }
    </style>
</head>

<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom white-bg">
                <nav class="navbar navbar-static-top" role="navigation">
                    <div class="navbar-header">
                        <img class="img-responsive" src="<?=base_url()?>assets/img/Trackmee_logo.png" style="height:74px;"></a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                        <?php if($direct == 0){ ?>
                            <li>
                                <a href="<?=site_url('Authentication/direct_logout')?>"><img src="<?=base_url()?>assets/img/icon/school.png" style="display: -webkit-box;font-size: initial;padding-left: 12px;"></i> School</a>
                            </li>
                        <?php }?>
                            <li id="dashboard">
                               <a href="<?=site_url('Teacher')?>"><img src="<?=base_url()?>assets/img/icon/dashboard.png" style="display: -webkit-box;font-size: initial;padding-left: 20px;"></i> Dashboard </a>
                            </li>
                            <li id="student">
                                <a href="<?=site_url('Student/view_student')?>"> <img src="<?=base_url()?>assets/img/icon/student.png" style="display: -webkit-box;font-size: initial;padding-left: 12px;"></i> <b>Student</b></a>
                            </li>
                            <li id="attendance">
                                <a href="<?=site_url('Attendance/attend_details')?>"><img src="<?=base_url()?>assets/img/icon/attendance.png" style="display: -webkit-box;font-size: initial;padding-left: 25px;"></i> <b>Attendance</b></a>
                            </li>
                            <li id="homework">
                                <a href="<?=site_url('Homework/homework_details')?>"> <img src="<?=base_url()?>assets/img/icon/homework1.png" style="display: -webkit-box;font-size: initial;padding-left: 23px;"></i> <b>homework</b></a>
                            </li>
                            <li id="exam">
                                <a href="<?=site_url('Exam/teacher_exam_details')?>"> <img src="<?=base_url()?>assets/img/icon/exam1.png" style="display: -webkit-box;font-size: initial;padding-left: 08px;"></i> <b>Exam</b></a>
                            </li>
                             <li id="lesson">
                                <a href="<?=site_url('Lesson/teacher_lesson_details')?>"> <img src="<?=base_url()?>assets/img/icon/homework1.png" style="display: -webkit-box;font-size: initial;padding-left: 08px;"></i> <b>Lesson</b></a>
                            </li>
                            <li id="result">
                                <a href="<?=site_url('Result/result_details')?>"> <img src="<?=base_url()?>assets/img/icon/result1.png" style="display: -webkit-box;font-size: initial;padding-left: 08px;"></i> <b>Result</b></a>
                            </li>
                            <li id="gallery">
                                <a href="<?=site_url('Gallery/teacher_gallery')?>"><img src="<?=base_url()?>assets/img/icon/gallery.png" style="display: -webkit-box;font-size: initial;padding-left: 10px;"></i> Gallery </a>
                            </li>
                            <li class="dropdown" id="notification">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/icon/notification.png" style="display: -webkit-box;font-size: initial;padding-left: 30px;"></i> Notification <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="<?=site_url('Notification/parent_meeting')?>"><img src="<?=base_url()?>assets/img/icon/parent1.png" style="display: inline;font-size: initial;"></i> <b> Parent Meeting</b></a></li>
                                    <li><a href="<?=site_url('Notification/event_notification')?>"><img src="<?=base_url()?>assets/img/icon/event.png" style="display: inline;font-size: initial;"></i> <b> Event Notification</b></a></li>
                                    <li><a href="<?=site_url('Notification/student_teacher')?>"><img src="<?=base_url()?>assets/img/icon/stu_notification.png" style="display: inline;font-size: initial;"></i> <b> Student Notification</b></a></li>
                                </ul>
                            </li>
                            <li id="holiday">
                                <a href="<?=site_url('Holiday/holidays')?>"><img src="<?=base_url()?>assets/img/icon/holiday.png" style="display: -webkit-box;font-size: initial;padding-left: 15px;"></i> Holiday</a>
                            </li>
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
            </div>
        </nav>
    </div>