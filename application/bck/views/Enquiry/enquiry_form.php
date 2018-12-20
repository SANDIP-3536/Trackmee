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
            <div class="navbar-header" style="border-top: 10px solid #883232;border-bottom: 1px solid gray;box-shadow: 2px 1px #888888;float: inherit;">
                 <img class="img-responsive" src="<?php echo $logo; ?>" style="width: 6%;float: left;margin-left: 194px;padding: 5px;">
                 <p style="width: 15%;background-color: #3d8bec;color: #fff;padding: 3px;border-radius: 50px;margin: 15px 0 0px;">Arihant Youth Foundation</p>
                 <h1 style="color: #d83a3a;margin-top: 10px;    width: 45%;"><b> Late. Balasaheb Darure International School </b></h1>
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
                        <div class="ibox-title">
                            <h2  style="text-align: center;color: #2b2fa2;font-weight: bold;">Enquiry Form</h2>
                        </div>
                             <form method="post" class="form-horizontal" action="<?=site_url('Enquiry/add_enquiry')?>" enctype="multipart/form-data" id="add_enquiry">
                        <div class="ibox-content" style="background-color: #f6f6f7;">
                            <h5 style="font-size: 14px;"> Student Details</h5> 
                                 <div class="form-group"  hidden>
                                    <label class="col-sm-2 control-label">Effective Date</label>   
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="enquiry_date" value = "<?php echo date('Y/m/d');?>" >
                                    </div>
                                </div>
                                <div class="form-group"  hidden>
                                    <label class="col-sm-2 control-label">enquiry_school_profile_id</label>   
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="enquiry_school_profile_id" value = "4" >
                                    </div>
                                </div>

                                <!--  <div class="form-group">
                                    <label class="col-sm-2 control-label">Select School <font color="#FF0000" size="+0"><sup>*</sup></font></label>   
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <input type="radio" name="enquiry_school_profile_id" value="2"> Vidya Pre School
                                            </div>
                                          
                                            <div class="col-sm-4">
                                                <input type="radio" name="enquiry_school_profile_id" value="3"> Vidya International School
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Student Name <font color="#FF0000" size="+0"><sup>*</sup></font></label>   
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="student_first_name" placeholder="First Name">
                                            </div>
                                          
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="student_middle_name" placeholder="Middle Name">
                                            </div>
                                          
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="student_last_name" placeholder="Last Name">
                                            </div>
                                      </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Date of Birth <font color="#FF0000" size="+0"><sup>*</sup></font></label>   
                                    <div class="col-sm-3 input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="student_DOB" readonly>
                                    </div>
                               
                                    <label class="col-sm-2 control-label">Gender <font color="#FF0000" size="+0"><sup>*</sup></font></label>   
                                        <div class="col-sm-3">
                                         <div class="form-group">
                                            <div class="col-sm-4">
                                                <input type="radio" name="student_gender" value="male"> Male
                                            </div>
                                          
                                            <div class="col-sm-4">
                                                <input type="radio" name="student_gender" value="female"> Female
                                            </div>
                                          
                                            <div class="col-sm-4">
                                                <input type="radio" name="student_gender" value="other"> Other
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content"  style="background-color: #f6f6f7;">
                              <h5 style="font-size: 14px;">Father's Details</h5> 

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Name <font color="#FF0000" size="+0"><sup>*</sup></font></label>
                                    <div class="col-sm-8">
                                         <div class="form-group">
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control " name="father_first_name" placeholder="First Name">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="father_middle_name" placeholder="Middle Name">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="father_last_name" placeholder="Last Name">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Mobile No. <font color="#FF0000" size="+0"><sup>*</sup></font></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="father_mobile_number" placeholder=" Mobile No.">
                                    </div>
                                    <label class="col-sm-2 control-label">Email ID. <font color="#FF0000" size="+0"><sup>*</sup></font></label>
                                    <div class="col-sm-3">
                                        <input type="email" class="form-control email_id" id="email_id" name="father_email_id" placeholder=" Email Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Occupation. <font color="#FF0000" size="+0"><sup>*</sup></font></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="father_occupation" placeholder=" Occupation.">
                                    </div>
                                    <label class="col-sm-2 control-label">Place of work. <font color="#FF0000" size="+0"><sup>*</sup></font></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control email_id" id="email_id" name="father_work_place" placeholder=" Place of work">
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content"  style="background-color: #f6f6f7;">
                              <h5 style="font-size: 14px;">Mother's Details</h5>     

                                 <div class="hr-line-dashed"></div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Name <font color="#FF0000" size="+0"><sup>*</sup></font></label>
                                    <div class="col-sm-8">
                                         <div class="form-group">
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="mother_first_name" placeholder="First Name">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="mother_middle_name" placeholder="Middle Name">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="mother_last_name" placeholder="Last Name">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Mobile No. <font color="#FF0000" size="+0"><sup>*</sup></font></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control mobile" id="mobile" name="mother_mobile_number" placeholder=" Mobile No.">
                                    </div>
                                    <label class="col-sm-2 control-label">Email ID. <font color="#FF0000" size="+0"><sup>*</sup></font></label>
                                    <div class="col-sm-3">
                                        <input type="email" class="form-control email_id" id="email_id" name="mother_email_id" placeholder=" Email Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Occupation. <font color="#FF0000" size="+0"><sup>*</sup></font></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control mobile" id="mobile" name="mother_occupation" placeholder=" Occupation.">
                                    </div>
                                    <label class="col-sm-2 control-label">Place of work. <font color="#FF0000" size="+0"><sup>*</sup></font></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control email_id" id="email_id" name="mother_work_place" placeholder=" Place of work">
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content"  style="background-color: #f6f6f7;">

                                 <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Phone Number <font color="#FF0000" size="+0"><sup>*</sup></font></label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder=" Phone Number" name="phone_number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Parent Address <font color="#FF0000" size="+0"><sup>*</sup></font></label>
                                    <div class="col-lg-8">
                                        <textarea type="text" placeholder=" Parent Address" name="parent_address" class="form-control"></textarea>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="col-lg-2 control-label">Your expectation from the school <font color="#FF0000" size="+0"><sup>*</sup></font></label>
                                    <div class="col-lg-8">
                                        <textarea type="text" placeholder="Comment" name="expectation" class="form-control"></textarea>
                                    </div>
                                </div>

                                 <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-4">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <button class="btn btn-white" type="reset">Cancel</button>
                                    </div>
                                </div>
                        </div>
                        </div>
                            </form>
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
                    // type: "<?=$flash['type']?>"
                });
            <?php } ?>

            var today = new Date();
           $('.date').datepicker({
                format:"yyyy-mm-dd",
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });


                $("#add_enquiry").validate({
                rules: {

                    student_first_name:{
                        required:true,
                        pattern: /^[a-zA-Z\s]*$/
                    },
                    student_middle_name:{
                         pattern: /^[a-zA-Z\s]*$/
                    },
                    student_last_name:{
                        required:true,
                         pattern: /^[a-zA-Z\s]*$/
                    },
                    student_DOB:{
                        required:true
                    },
                    student_gender:{
                        required:true
                    },
                    father_first_name:{
                        required:true,
                         pattern: /^[a-zA-Z\s]*$/
                    },
                    father_middle_name:{
                          pattern: /^[a-zA-Z\s]*$/
                    },
                    father_last_name:{
                        required:true,
                         pattern: /^[a-zA-Z\s]*$/
                    },
                    father_occupation:{
                        pattern: /^[a-zA-Z\s]*$/
                    },
                    father_mobile_number:{
                        required:true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    father_email_id:{
                       pattern: /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
                        email: true
                    },
                    father_work_place:{
                         pattern: /^[a-zA-Z\s]*$/
                    },
                    mother_first_name:{
                        required:true,
                         pattern: /^[a-zA-Z\s]*$/
                    },
                    mother_middle_name:{
                         pattern: /^[a-zA-Z\s]*$/
                    },
                    mother_last_name:{
                        required:true,
                         pattern: /^[a-zA-Z\s]*$/
                    },
                    mother_occupation:{
                         pattern: /^[a-zA-Z\s]*$/
                    },
                    mother_work_place:{
                         pattern: /^[a-zA-Z\s]*$/
                    },
                    mother_mobile_number:{
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    mother_email_id:{
                        pattern: /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
                        email: true
                    },
                    parent_address:{
                        required:true,
                         pattern: /^[a-zA-Z\s]*$/
                    },
                    phone_number:{
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    expectation:{
                        pattern: /^[a-zA-Z\s]*$/
                    }



                },
                messages: {
                   
                }
            });

             

                $(".select2_demo_2").select2({
                    
                });
            });
        </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>       