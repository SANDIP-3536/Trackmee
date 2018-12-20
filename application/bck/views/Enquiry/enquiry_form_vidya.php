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
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-md-10">
                            <h2  style="text-align: left;color: #2b2fa2;font-weight: bold;">Enquiry Form</h2>
                        </div>
                        <div class="col-md-2">
                            <span class ="btn btn-xs btn-success modal_with_data" data-toggle="modal" data-target="#enquiry_status" style="float:right;"> Enquiry status</span>
                        </div>
                    </div>
                <!-- </div> -->
                <?php if($vidya_pre_primary_school_enquiry_id == 0 && $vidya_primary_school_enquiry_id == 0){ ?>
                    <center><img src="<?=base_url()?>assets/img/School_Admission.png" class="img-responsive"></center>
                <?php }else{ ?>     
                <form method="post" class="form-horizontal" action="<?=site_url('Enquiry/add_enquiry_vidya')?>" enctype="multipart/form-data" id="add_enquiry">
                    <div class="ibox-content" style="background-color: #f6f6f7;">
                        <h5 style="font-size: 14px;"> Student Details</h5> 
                        <div class="form-group"  hidden>
                            <label class="col-sm-2 control-label">Effective Date</label>   
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="enquiry_date" value = "<?php echo date('Y/m/d');?>" >
                            </div>
                        </div>
                        <div class="form-group" hidden>
                            <label class="col-sm-2 control-label">Form No.</label>   
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="enquiry_form_no" value = "<?php echo $enquiry_form_no;?>" >
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="col-sm-2 control-label">Select School <font color="#FF0000" size="+0"><sup>*</sup></font></label>   
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                       <div class="radio radio-info radio-inline">
                                            <input type="radio" id="inlineRadio1" class="vidya_pre_class" value="2" name="enquiry_school_profile_id" checked>
                                            <label for="inlineRadio1"> Vidya Pre School </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="inlineRadio2" value="3" name="enquiry_school_profile_id">
                                            <label for="inlineRadio2"> Vidya International School </label>
                                        </div>
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
                                        <div class="radio radio-success radio-inline">
                                            <input type="radio" id="inlineRadio1" value="male" name="student_gender">
                                            <label for="inlineRadio1"> Male </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="radio radio-success radio-inline">
                                            <input type="radio" id="inlineRadio12" value="female" name="student_gender">
                                            <label for="inlineRadio12"> Female </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="radio radio-success radio-inline">
                                            <input type="radio" id="inlineRadio12" value="other" name="student_gender">
                                            <label for="inlineRadio12"> Other </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Admission Required for Class<font color="#FF0000" size="+0"><sup>*</sup></font></label>   
                            <div class="col-sm-3">
                                <select class="form-control vidya_admission_class" name="enquiry_admission_class">
                                    <option value="">Select Class</option>
                                    <?php if ($vidya_pre_primary_school_enquiry_id != 0) {?>
                                        <option value="Play_Group">Play Group</option>
                                        <option value="Nursery">Nursery</option>
                                        <option value="Junior_kg">Junior kg</option>
                                        <option value="Senior_kg">Senior kg</option>
                                    <?php } ?>
                                    <?php if ($vidya_primary_school_enquiry_id != 0) {?>
                                        <option value="1st">1st standard</option>
                                        <option value="2nd">2nd standard</option>
                                        <option value="3rd">3rd standard</option>
                                        <option value="4th">4th standard</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <label class="col-sm-2 control-label">Enquiry Year</label>   
                            <div class="col-sm-3">
                                <select class="form-control vidya_enquiry_year" name="enquiry_acadmic_year"></select>
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
                            <label class="col-sm-2 control-label">Email ID. </label>
                            <div class="col-sm-3">
                                <input type="email" class="form-control email_id" id="email_id" name="father_email_id" placeholder=" Email Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Occupation. </font></label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="father_occupation" placeholder=" Occupation.">
                            </div>
                            <label class="col-sm-2 control-label">Place of work. </label>
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
                            <label class="col-sm-2 control-label">Mobile No. </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control mobile" id="mobile" name="mother_mobile_number" placeholder=" Mobile No.">
                            </div>
                            <label class="col-sm-2 control-label">Email ID. </label>
                            <div class="col-sm-3">
                                <input type="email" class="form-control email_id" id="email_id" name="mother_email_id" placeholder=" Email Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Occupation. </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control mobile" id="mobile" name="mother_occupation" placeholder=" Occupation.">
                            </div>
                            <label class="col-sm-2 control-label">Place of work. </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control email_id" id="email_id" name="mother_work_place" placeholder=" Place of work">
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content"  style="background-color: #f6f6f7;">
                        <h5 style="font-size: 14px;">Previous School Details</h5> 
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">School Name</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control " name="student_privious_school_name" placeholder="Previous School Name">
                            </div>
                            <label class="col-sm-2 control-label">School Duration </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="student_privious_school_duration" placeholder=" Previous School Duration">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Last Attend Class </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="student_last_attend_class" placeholder=" Last Attend Class.">
                            </div>
                            <label class="col-sm-2 control-label">Reason</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="student_privious_school_left_reason" placeholder=" School Left Reason">
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content"  style="background-color: #f6f6f7;">
                       <div class="hr-line-dashed"></div>
                       <div class="form-group">
                        <label class="col-lg-2 control-label">Phone Number </label>
                        <div class="col-lg-3">
                            <input type="text" placeholder=" Phone Number" name="phone_number" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                                    <label class="col-lg-2 control-label">House No./Street Name/Landmark</label>
                                    <div class="col-lg-3">
                                         <input type="text" class="form-control" name="enquiry_house_no" placeholder="Enter the House No./Street Name/Landmark.">
                                    </div>
                                    <label class="col-lg-2 control-label">Town</label>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control" name="enquiry_town" placeholder="Enter the Home Town.">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Taluka</label>
                                    <div class="col-lg-3">
                                         <input type="text" class="form-control" name="enquiry_tal" placeholder="Enter the taluka.">
                                    </div>
                                    <label class="col-lg-2 control-label">District</label>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control" name="enquiry_dist" placeholder="Enter the District.">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">State</label>
                                    <div class="col-lg-3">
                                        <select class="form-control" name="enquiry_state">
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu & Kashmir">Jammu & Kashmir</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Odisha (Orissa)">Odisha (Orissa)</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="West Bengal">West Bengal</option>
                                        </select>
                                    </div>
                                    <label class="col-lg-2 control-label">Pin Code</label>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control" name="enquiry_pincode" placeholder="Enter the Pin Code.">
                                    </div>
                                </div>
                    <!-- <div class="form-group">
                        <label class="col-lg-2 control-label">Parent Address <font color="#FF0000" size="+0"><sup>*</sup></font></label>
                        <div class="col-lg-8">
                            <textarea type="text" placeholder=" Parent Address" name="parent_address" class="form-control"></textarea>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Your expectation from the school</label>
                        <div class="col-lg-8">
                            <textarea type="text" placeholder="Comment" name="expectation" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-4">
                            <button class="btn btn-primary" type="submit" id="submit" >Save</button>
                            <button class="btn btn-white" type="reset">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php } ?>
        <div class="modal inmodal" id="enquiry_status" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" style="width:550px !important;">
                <div class="modal-content animated fadeIn">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <i class="fa fa-clock-o modal-icon" style="font-size:35px;"></i>
                        <h4 class="modal-title"> Enquiry Status Details</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="enquiry_status_" action="<?=site_url('Enquiry/vidya_enquiry_status_details')?>">
                            <div class="form-group"> 
                             <label class="col-sm-3 control-label"></label>  
                                <div class="col-sm-7">
                                    <select class="form-control search" name="enquiry_date">
                                        <option value="1">Form No.</option>
                                        <option value="2">Other</option>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group form_no_search">
                                <label class="col-sm-3 control-label ">Form No</label>   
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="form_no" id="form_no">
                                </div>
                            </div>
                            <div class="form-group other_search">
                                <label class="col-sm-3 control-label">First Name</label>   
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="first_name" id="first_name" required>
                                </div>
                            </div>
                            <div class="form-group other_search">
                                <label class="col-sm-3 control-label">Birth Date</label>   
                                <div class="col-sm-7 input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="DOB" id="DOB" readonly required>
                                </div>
                            </div>
                            <div class="form-group other_search">
                                <label class="col-sm-3 control-label">Reg. Mobile No</label>   
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </form>
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
                autoclose: true,

                endDate:"today"
            });

            $('.other_search').hide();
            $(document).on('change','.search',function(){
                if($('.search').val() == '2') {
                    $('.other_search').show(); 
                    $('.form_no_search').hide(); 
                } else {
                    $('.other_search').hide(); 
                    $('.form_no_search').show(); 
                } 
            });

            $(".vidya_IN_class_details").hide();
            $("input[name$='enquiry_school_profile_id']").click(function(){
                var value = $(this).val();
                if(value=='2') {
                    $(".vidya_pre_class_details").show();
                    $(".vidya_IN_class_details").hide();
                }
                else if(value=='3') {
                    $(".vidya_IN_class_details").show();
                    $(".vidya_pre_class_details").hide();
                }
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
                    },
                    phone_number:{
                        digits: true,
                        minlength: 11,
                        maxlength: 11
                    },
                    enquiry_admission_class:{
                        required:true
                    }
                },
                messages: {
                    
                }
            });

            $("#enquiry_status_").validate({
                rules: {
                    form_no:{
                        required:true,
                        digits:true
                    },
                    DOB:{
                        required:true
                    },
                    first_name:{
                        required:true,
                        pattern: /^[a-zA-Z\s]*$/
                    },
                    mobile_number:{
                        required:true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10
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