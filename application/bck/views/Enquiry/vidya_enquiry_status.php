<!DOCTYPE html>
<html>
<head>
    <!-- <link rel="shortcut icon" type="image/png" href="<?=base_url()?>assets/img/logo.png"/> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Enquiry</title>

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
    <link href="<?=base_url();?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <style type="text/css">
    .input-group[class*=col-] {
        float: left;
        padding-right: 15px;
        padding-left: 15px;
    }

    .open>.dropdown-menu {
        display: block;
        width: max-content;
    }

    </style>
</head>
<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg" style="background-color: gray;">
            <div class="row border-bottom white-bg">
                <nav class="navbar navbar-static-top" role="navigation">
                    <center>
                        <div class="navbar-header" style="border-bottom: 1px solid gray;box-shadow: 2px 1px #888888;float: inherit;">
                           <img class="img-responsive" src="<?php echo $logo3; ?>" style="width: 6%;float: left;margin-left: 194px;padding: 5px;">
                           <p style="width: 15%;background-color: #3d8bec;color: #fff;padding: 3px;border-radius: 50px;margin: 15px 0 0px;">Vidya Sanskar Pratishthan </p>
                           <h1 style="color: #d83a3a;margin-top: 10px;width: 45%;"><b> Vidya Intenational School </b></h1>
                       </div>
                   </center>
                   <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav">
                    <!-- <li id="institute_header">
                       <a href="<?=site_url('#')?>"><i class="fa fa-th-large" style="display: -webkit-box;font-size: initial;padding-left: 15px;"></i> Home </a>
                   </li> -->
                   
               </ul>
               
           </div>
       </nav>
   </div>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="ibox float-e-margins">
                    <div class="enquiry_status">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-md-10">
                                    <h2  style="text-align: left;color: #2b2fa2;font-weight: bold;">Enquiry Status</h2>
                                </div>
                                <div class="col-md-2">
                                    <a href="<?=base_url()?>index.php/Enquiry/enquiry_form_vidya"><button class ="btn btn-xs btn-success" style="float:right;"> Enquiry form</button></a>
                                </div>
                            </div>
                            <?php if (empty($status)) {?>
                                <div><div class="row"><div class="col-sm-12" style="padding-bottom: 2%;"><center><img src="<?=base_url();?>assets/img/No-record-found.png"><center></div></div></div>
                            <?php }else{ ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Enquiry Status Details</b></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <?php if ($status[0]['enquiry_status'] == 1){?>
                                    <div><div class="row"><div class="col-sm-12 col-sm-offset-2" style="padding-bottom: 2%;"><img src="<?=base_url()?>assets/img/enquiry_status/status_1.png" style="width: 62%;"></div></div></div>
                                <?php }elseif($status[0]['enquiry_status'] == 2){ ?>
                                     <div><div class="row"><div class="col-sm-12 col-sm-offset-2" style="padding-bottom: 2%;"><img src="<?=base_url()?>assets/img/enquiry_status/status_2.png" style="width: 62%;"></div></div></div>
                                <?php }elseif($status[0]['enquiry_status'] == 3){ ?>
                                    <div><div class="row"><div class="col-sm-12 col-sm-offset-2" style="padding-bottom: 2%;"><img src="<?=base_url()?>assets/img/enquiry_status/status_3.png" style="width: 62%;"></div></div></div>
                                <?php }elseif($status[0]['enquiry_status'] == 4){ ?>
                                    <div><div class="row"><div class="col-sm-12 col-sm-offset-2" style="padding-bottom: 2%;"><img src="<?=base_url()?>assets/img/enquiry_status/status_4.png" style="width: 62%;"></div></div></div>
                                <?php }elseif($status[0]['enquiry_status'] == 5){ ?>
                                    <div><div class="row"><div class="col-sm-12 col-sm-offset-2" style="padding-bottom: 2%;"><img src="<?=base_url()?>assets/img/enquiry_status/status_5.png" style="width: 62%;"></div></div></div>
                                 <?php }elseif($status[0]['enquiry_appointment_date'] == '9999-12-31' && $status[0]['enquiry_status'] == 6){ ?>
                                    <div><div class="row"><div class="col-sm-12 col-sm-offset-2" style="padding-bottom: 2%;"><img src="<?=base_url()?>assets/img/enquiry_status/status_6_without_app.png" style="width: 62%;"></div></div></div>
                                <?php }elseif(empty($status[0]['enquiry_meeting_review']) && $status[0]['enquiry_status'] == 6){ ?>
                                    <div><div class="row"><div class="col-sm-12 col-sm-offset-2" style="padding-bottom: 2%;"><img src="<?=base_url()?>assets/img/enquiry_status/status_6_cancelled.png" style="width: 62%;"></div></div></div>
                                <?php }elseif($status[0]['enquiry_status'] == 6){ ?>
                                    <div><div class="row"><div class="col-sm-12 col-sm-offset-2" style="padding-bottom: 2%;"><img src="<?=base_url()?>assets/img/enquiry_status/status_6.png" style="width: 62%;"></div></div></div>
                                <?php } ?>


                                
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Student Details</b></th>
                                            </tr>
                                            <tr>
                                                <td><b>Form No</b></td>
                                                <td colspan="2" style="background-color: #ffffff;"><b><?php echo $status[0]['enquiry_form_no']; ?></b></td>
                                                <td><b>Enquiry Status</td>
                                                <td colspan="2" style="color:Red;background-color: #ffffff;"><b><?php echo $status[0]['enquiry_status_details']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Name</b></td>
                                                <td colspan="2" style="background-color: #ffffff;"><b><?php echo $status[0]['enquiry_student_first_name'];?>&nbsp<?php echo $status[0]['enquiry_student_middle_name']; ?>&nbsp<?php echo $status[0]['enquiry_student_last_name']; ?></b></td>
                                                <td><b>Admission Class</td>
                                                <td colspan="2" style="background-color: #ffffff;"><b><?php echo $status[0]['enquiry_admission_class']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Birth Date</td>
                                                <td style="background-color: #ffffff;"><b><?php echo $status[0]['enquiry_student_DOB']; ?></td>
                                                <td><b>Gender</td>
                                                <td style="background-color: #ffffff;"><b><?php echo $status[0]['enquiry_student_gender']; ?></td>
                                                <td><b>Phone No.</td>
                                                <td style="background-color: #ffffff;"><b><?php echo $status[0]['enquiry_phone_number']; ?></td>
                                            </tr>
                                             <tr>
                                                <td><b>Address</b></td>
                                                <td colspan="5" style="background-color: #ffffff;"><b><?php echo $status[0]['enquiry_residential_address']; ?></b></td>
                                            </tr>
                                             <tr>
                                                <td><b>Notes</b></td>
                                                <td colspan="5" style="background-color: #ffffff;"><b><?php echo $status[0]['enquiry_expectations']; ?></b></td>
                                            </tr>
                                            <tr>
                                                <th colspan = "6"  style="background-color: #d0d2ce;color:#000000;"><b>Father Details</b></th>
                                            </tr>
                                            <tr>
                                                <td><b>Name</b></td>
                                                <td colspan="5" style="background-color: #ffffff;"><b><?php echo $status[0]['enquiry_parent_first_name'];?>&nbsp<?php echo $status[0]['enquiry_parent_middle_name']; ?>&nbsp<?php echo $status[0]['enquiry_parent_last_name']; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Mobile No.</td>
                                                <td style="background-color: #ffffff;"><b><?php echo $status[0]['enquiry_parent_mobile_number']; ?></td>
                                                <td><b>Email ID</td>
                                                <td style="background-color: #ffffff;"><b><?php echo $status[0]['enquiry_parent_email_id']; ?></td>
                                                <td><b>Occupation</td>
                                                <td style="background-color: #ffffff;"><b><?php echo $status[0]['enquiry_parent_occupation']; ?></td>
                                            </tr>
                                            <tr>
                                                <th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Mother Details</b></th>
                                            </tr>
                                            <tr>
                                                <td><b>Name</b></td>
                                                <td colspan="5" style="background-color: #ffffff;"><b><?php echo $status[0]['enquiry_mother_first_name'];?>&nbsp<?php echo $status[0]['enquiry_mother_middle_name']; ?>&nbsp<?php echo $status[0]['enquiry_mother_last_name']; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Mobile No.</td>
                                                <td style="background-color: #ffffff;"><b><?php echo $status[0]['enquiry_mother_mobile_number']; ?></td>
                                                <td><b>Email ID</td>
                                                <td style="background-color: #ffffff;"><b><?php echo $status[0]['enquiry_mother_email_id']; ?></td>
                                                <td><b>Occupation</td>
                                                <td style="background-color: #ffffff;"><b><?php echo $status[0]['enquiry_mother_occupation']; ?></td>
                                            </tr>
                                            <tr>
                                                <th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Previous School Details</b></th>
                                            </tr>
                                            <tr>
                                                <td><b>Name</b></td>
                                                <td colspan="5" style="background-color: #ffffff;"><b><?php echo $status[0]['student_privious_school_name']; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td><b>School Duration</td>
                                                <td style="background-color: #ffffff;"><b><?php echo $status[0]['student_privious_school_duration']; ?></td>
                                                <td><b>Last Attend Class</td>
                                                <td style="background-color: #ffffff;"><b><?php echo $status[0]['student_last_attend_class']; ?></td>
                                                <td><b>Leaving Reason</td>
                                                <td style="background-color: #ffffff;"><b><?php echo $status[0]['student_privious_school_left_reason']; ?></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            <?php } ?>
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
                <strong>Copyright </strong><a href="http://www.syntech.co.in" target="_blank"> <img src="<?=base_url()?>assets/img/syntech_logo.png" style="height:13px;"></a><strong> &copy; 2017-2018 </strong> 
            </div>
        </div>
    </div>
</div>



<!-- Mainly scripts -->
<script src="<?=base_url()?>assets/js/jquery-2.1.1.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery-ui.min.js"></script>
<script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?=base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url();?>assets/js/plugins/select2/select2.full.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?=base_url()?>assets/js/inspinia.js"></script>
<script src="<?=base_url()?>assets/js/plugins/pace/pace.min.js"></script>

<script src="<?=base_url()?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>

<!-- clockpicker -->
<script src="<?=base_url()?>assets/js/plugins/clockpicker/clockpicker.js"></script>
<!-- Data picker -->
<script src="<?= base_url();?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>


<script src="<?= base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>
<script src="<?= base_url();?>assets/js/plugins/validate/jquery.validate.min.js"></script>
<script src="<?= base_url();?>assets/js/plugins/validate/additional-methods.min.js"></script>

<script>

$.validator.setDefaults({
    submitHandler: function (form) {
        form.submit();
    }
});

$(document).ready(function(){

    <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
        swal({
            title: "<?=$flash['title']?>",
            text: "<?=$flash['text']?>",
            type: "<?=$flash['type']?>"
                });
        <?php } ?>

        


$(".select2_demo_2").select2({

});
});
</script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>       