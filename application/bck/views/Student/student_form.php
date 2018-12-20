<!DOCTYPE html>
<html>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/invoice_print.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:32:37 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php foreach ($update_student as $key) { ?>
        <title><?php echo $key['student_enquiry_form_number'] ?> | <?php echo ucfirst($key['student_first_name']) ?> <?php echo ucfirst($key['student_last_name'])?></title>
    <?php } ?>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

    <body class="white-bg">
        <div class="wrapper wrapper-content p-xl" style="padding:0px !important;">
            <div class="ibox-content p-xl" style="padding:0px !important;font-size: small;font-weight: lighter;">
                    <div class="ibox-content">
                        <div style="border:2px solid black;">
                            <div>
                                <img src="<?php echo $school_report_header ?>" class="img-responsive">
                            </div>
                            <table style="width:100%;border:none;">
                                <tr>
                                    <th style="border-left:1px solid black; "colspan = "12"><center><h1><b><br>Admission Form</h1></center></th>
                                </tr>
                                <?php foreach ($class_details as $key => $value) { 
                                if(empty($value)) {
                                        unset($class_details[$key]);
                                    }
                                }
                                if (empty($class_details)) { ?>
                                <tr>
                                    <th style="border-left:1px solid black;" colspan = "12"><center><h3><b>Session : ____-__</h3></center></th>
                                </tr>
                                <?php }else { foreach ($class_details as $key) { ?>
                                    <tr>
                                        <th style="border-left:1px solid black;" colspan = "12"><center><h3><b><?php echo $key['AY_name'] ?></h3></center></th>
                                    </tr>
                                <?php } }?>
                            </table>
                            <!-- <hr style="width:95%;margin-bottom:0px !important"> -->
                            <table style="width:100%;padding-left:10%;">
                                <?php foreach ($update_student as $key) { ?>
                                <tr>
                                    <th rowspan="4" colspan="2" style="width:45%;padding-left:15%;border-left:1px solid black;height:43%;">
                                        <img src="<?php echo $key['student_photo'] ?>" class="img-responsive img-circle circle-border m-b-md" style="border-radius:10%;width:50%;border:3px solid currentColor;">
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="7" style="text-align:left;">
                                        <h3><br>Form No : <span style="font-weight:initial;"><?php echo $key['student_GRN'] ?></span></h3>
                                        <h3>GRN No. : <span style="font-weight:initial;"><?php echo $key['student_GRN'] ?></span></h3>
                                        <h3>Admission Date : <span style="font-weight:initial;"><?php echo date('d/m/Y', strtotime($key['student_admission_date'])); ?></span></h3>
                                        <!-- <h3>Enquiry Date : <span style="font-weight:initial;"><?php echo $key['student_reg_date'] ?></span></h3> -->
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="7" style="text-align:left;height:1%;">
                                        <h3></h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="7" style="text-align:left;height:1%;">
                                        <h3></h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan = "5" style="padding-left:5%;border-left:1px solid black">
                                        <h3><ul><li> Name of the Child : <span style="font-weight:initial;"><?php echo ucfirst($key['student_first_name']) ?> <?php echo ucfirst($key['student_middle_name']) ?> <?php echo ucfirst($key['student_last_name']) ?></li></ul></span></h3>
                                    </th>
                                </tr><br>
                                <tr>
                                    <th colspan = "12" style="padding-left:5%;border-left:1px solid black">
                                        <h3><ul><li> Gender : <span style="font-weight:initial;"><?php echo ucfirst($key['student_gender']) ?></span></li></ul></h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan = "12" style="padding-left:5%;border-right:1px solid black">
                                        <h3><ul><li>Adhar Card No. : <span style="font-weight:initial;"><?php echo $adhar_card_number;  ?></span></li></h3></ul>
                                    </th>
                                </tr> 
                                <tr>
                                    <th colspan = "12" style="padding-left:5%;border-left:1px solid black">
                                        <h3><ul><li> Date of Birth : <span style="font-weight:initial;"><?php echo date('d M Y', strtotime($key['student_DOB'])); ?></span></h3></li></ul>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan = "12" style="padding-left:5%;border-right:1px solid black">
                                        <h3><ul><li>Place of Birth : <span style="font-weight:initial;"><?php echo ucfirst($key['student_birth_place']) ?></li></ul></span></h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan = "12" style="padding-left:5%;border-left:1px solid black">
                                        <h3><ul><li> Age till Now  : <span style="font-weight:initial;"> <?php echo $year; ?> Years <?php echo $month; ?> Months  <?php echo $day; ?> Days</li></ul></span></h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan = "12" style="padding-left:5%;border-left:1px solid black">
                                        <h3><ul><li>Blood Group : <span style="font-weight:initial;"><?php echo ucfirst($key['student_blood_group']) ?></li></span></h3></ul>
                                    </th>
                                </tr> 
                                <tr>
                                    <th colspan = "12" style="padding-left:5%;border-left:1px solid black">
                                        <h3><ul><li> Nationality : <span style="font-weight:initial;"> <?php echo ucfirst($key['student_nationality']) ?> </li></ul></span></h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan = "122" style="padding-left:5%;border-right:1px solid black">
                                        <h3> <ul><li>Mother Tougue : <span style="font-weight:initial;"> <?php echo ucfirst($key['student_mother_tongue']) ?></li></ul></span></h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan = "3" style="padding-left:5%;border-left:1px solid black">
                                        <h3><ul> <li>Category : <span style="font-weight:initial;"> <?php echo ucfirst($key['student_category']) ?></li></span></h3>
                                    </th>
                                    <th colspan = "2" style="padding-left:5%;border-right:1px solid black">
                                        <h3><li>Religion : <span style="font-weight:initial;"> <?php echo ucfirst($key['student_religion']) ?></li></ul></span></h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan = "3" style="padding-left:5%;border-left:1px solid black">
                                        <h3><ul> <li> Cast : <span style="font-weight:initial;"> <?php echo ucfirst($key['student_cast']) ?> </li></span></h3>
                                    </th>
                                    <th colspan = "2" style="padding-left:5%;">
                                        <h3><li> Subcast : <span style="font-weight:initial;"> <?php echo ucfirst($key['student_sub_cast']) ?></li></span></h3>
                                    </th>
                                </tr>
                                <?php } ?>
                                <?php foreach ($class_details as $key => $value) { 
                                if(empty($value)) {
                                        unset($class_details[$key]);
                                    }
                                }
                                if (empty($class_details)) { ?>
                                <tr>
                                    <th colspan="12" style="padding-left:5%;">
                                        <h3><ul><li> Admission Sought in Class : <span style="font-weight:initial;padding-left:5%;"> </li></ul></span></h3>
                                    </th>
                                </tr>
                                <?php }else { foreach ($class_details as $key) { ?>
                                <tr>
                                    <th colspan="12" style="padding-left:5%;">
                                        <h3><ul><li> Admission Sought in Class : <span style="font-weight:initial;padding-left:5%;"><?php echo $key['class_name'] ?> Class</li></ul></span></h3>
                                    </th>
                                </tr>
                                <?php } }?>
                                <?php foreach ($update_student as $key) { ?>
                                <tr>
                                    <th colspan = "12" style="padding-left:5%;border-left:1px solid black">
                                       <h3><ul><li> House No./Street Name/Landmark : <span style="font-weight:initial;"> <?php echo ucfirst($key['student_present_house_no']) ?> </li></ul></span></h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan = "3" style="padding-left:5%;border-left:1px solid black">
                                        <h3><ul> <li> Town : <span style="font-weight:initial;"> <?php echo ucfirst($key['student_present_town']) ?> </li></span></h3>
                                    </th>
                                    <th colspan = "2" style="padding-left:5%;">
                                        <h3><li> Taluka : <span style="font-weight:initial;"> <?php echo ucfirst($key['student_present_tal']) ?></li></span></h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan = "3" style="padding-left:5%;border-left:1px solid black">
                                        <h3><ul> <li> District : <span style="font-weight:initial;"> <?php echo ucfirst($key['student_present_dist']) ?> </li></span></h3>
                                    </th>
                                    <th colspan = "2" style="padding-left:5%;">
                                        <h3><li> State : <span style="font-weight:initial;"> <?php echo ucfirst($key['student_present_state']) ?></li></span></h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan = "12" style="padding-left:5%;border-left:1px solid black">
                                       <h3><ul><li> Pin Code : <span style="font-weight:initial;"> <?php echo ucfirst($key['student_present_pincode']) ?> </li></ul></span></h3>
                                    </th>
                                </tr>
                                <?php  
                                     $path = base_url()."profile_photo/default_student_image.png";
                                     if($key['student_photo'] == $path){ ?>
                                            <br>
                                <?php } ?>
                                <?php } ?>
                            </table>
                            <table class="page_foot" style="margin-bottom:0px !important;">
                                <tr>
                                    <img src="<?php echo $school_report_footer ?>" class="img-responsive" style="padding-top:15%;">
                                </tr>
                            </table>
                            <center>
                            <hr style="border-top: 1px solid #000000 !important;">
                            <table class="table table-borderd" style="width:90%;">
                                <thead>
                                    <tr>
                                        <th style="border-bottom:1px solid black;"><center></center></th>
                                        <th style="padding:0px;"><div  style="border:1px solid black; padding:7px;border-radius:40px 0px 0px;"><center><h3>Father Details</h3></center></div></th>
                                    </tr>
                                </thead>
                                <?php foreach ($father_details as $key => $value) { 
                                    if(empty($value)) {
                                        unset($father_details[$key]);
                                    }
                                }
                                if (empty($father_details)) { ?>
                                <tbody>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Name :</th>
                                        <td style="border-right:1px solid black;"></th>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Qualification :</th>
                                        <td style="border-right:1px solid black;"></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Occupation :</th>
                                        <td style="border-right:1px solid black;"></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Place of Work :</th>
                                        <td style="border-right:1px solid black;"></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Date of Birth :</th>
                                        <td style="border-right:1px solid black;"></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Mobile/Ph. No :</th>
                                        <td style="border-right:1px solid black;"></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Email :</th>
                                        <td style="border-right:1px solid black;"></td>
                                    </tr> 
                                </tbody>
                                <?php } else{ ?>
                                <?php foreach ($father_details as $key) {?>
                                <tbody>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Name :</th>
                                        <td style="border-right:1px solid black;"><b><?php echo ucfirst($key['parent_first_name']) ?> <?php echo ucfirst($key['parent_middle_name']) ?> <?php echo ucfirst($key['parent_last_name']) ?></b></th>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Qualification :</th>
                                        <td style="border-right:1px solid black;"><b><?php echo ucfirst($key['parent_qualification']) ?></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Occupation :</th>
                                        <td style="border-right:1px solid black;"><b><?php echo ucfirst($key['parent_occupation']) ?></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Place of Work :</th>
                                        <td style="border-right:1px solid black;"><b></b></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Date of Birth :</th>
                                        <td style="border-right:1px solid black;"><b><?php echo date('d M Y', strtotime($key['parent_DOB'])); ?></b></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Mobile/Ph. No :</th>
                                        <td style="border-right:1px solid black;"><b><?php echo $key['parent_mobile_number'] ?></b></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Email :</th>
                                        <td style="border-right:1px solid black;"><b><?php echo $key['parent_email_id'] ?></b></td>
                                    </tr> 
                                </tbody>
                                <?php } } ?>
                            </table>
                            <br>
                            <table class="table table-borderd" style="width:90%;">
                                <thead>
                                    <tr>
                                        <th style="border-bottom:1px solid black;"><center></center></th>
                                        <th style="padding:0px;"><div  style="border:1px solid black; padding:7px;border-radius:40px 0px 0px;"><center><h3>Mother Details</h3></center></div></th>
                                    </tr>
                                </thead>
                                <?php foreach ($mother_details as $key => $value) { 
                                    if(empty($value)) {
                                        unset($mother_details[$key]);
                                    }
                                }
                                if (empty($mother_details)) { ?>
                                <tbody>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Name :</th>
                                        <td style="border-right:1px solid black;"></th>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Qualification :</th>
                                        <td style="border-right:1px solid black;"></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Occupation :</th>
                                        <td style="border-right:1px solid black;"></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Place of Work :</th>
                                        <td style="border-right:1px solid black;"></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Date of Birth :</th>
                                        <td style="border-right:1px solid black;"></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Mobile/Ph. No :</th>
                                        <td style="border-right:1px solid black;"></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Email :</th>
                                        <td style="border-right:1px solid black;"></td>
                                    </tr> 
                                </tbody>
                                <?php } else{  foreach ($mother_details as $key) {?>
                                <tbody>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Name :</th>
                                        <td style="border-right:1px solid black;"><b><?php echo ucfirst($key['parent_first_name']) ?> <?php echo ucfirst($key['parent_middle_name']) ?> <?php echo ucfirst($key['parent_last_name']) ?></d></th>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Qualification :</th>
                                        <td style="border-right:1px solid black;"><b><?php echo ucfirst($key['parent_qualification']) ?></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Occupation :</th>
                                        <td style="border-right:1px solid black;"><b><?php echo ucfirst($key['parent_occupation']) ?></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Place of Work :</th>
                                        <td style="border-right:1px solid black;"><b></b></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Date of Birth :</th>
                                        <td style="border-right:1px solid black;"><b><?php echo date('d M Y', strtotime($key['parent_DOB'])); ?></b></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Mobile/Ph. No :</th>
                                        <td style="border-right:1px solid black;"><b><?php echo $key['parent_mobile_number'] ?></b></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Email :</th>
                                        <td style="border-right:1px solid black;"><b><?php echo $key['parent_email_id'] ?></b></td>
                                    </tr> 
                                </tbody>
                                <?php } } ?>
                            </table>
                            <table class="table table-borderd" style="width:90%;">
                                <thead>
                                    <tr>
                                        <th style="border-bottom:1px solid black;"><center></center></th>
                                        <th style="padding:0px;"><div  style="border:1px solid black; padding:7px;border-radius:40px 0px 0px;"><center><h3>Gardien Details</h3></center></div></th>
                                    </tr>
                                </thead>
                                <?php foreach ($gardien_details as $key => $value) { 
                                    if(empty($value)) {
                                        unset($gardien_details[$key]);
                                    }
                                }
                                if (empty($gardien_details)) { ?>
                                <tbody>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Name :</th>
                                        <td style="border-right:1px solid black;"></th>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Qualification :</th>
                                        <td style="border-right:1px solid black;"></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Occupation :</th>
                                        <td style="border-right:1px solid black;"></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Place of Work :</th>
                                        <td style="border-right:1px solid black;"></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Date of Birth :</th>
                                        <td style="border-right:1px solid black;"></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Mobile/Ph. No :</th>
                                        <td style="border-right:1px solid black;"></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Email :</th>
                                        <td style="border-right:1px solid black;"></td>
                                    </tr> 
                                </tbody>
                                <?php } else{ foreach ($gardien_details as $key) {?>
                                <tbody>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Name :</th>
                                        <td style="border-right:1px solid black;"><b><?php echo ucfirst($key['parent_first_name']) ?> &nbsp <?php echo ucfirst($key['parent_middle_name']) ?> &nbsp <?php echo ucfirst($key['parent_last_name']) ?></b></th>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Qualification :</th>
                                        <td style="border-right:1px solid black;"><b><?php echo ucfirst($key['parent_qualification']) ?></b></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Occupation :</th>
                                        <td style="border-right:1px solid black;"><b><?php echo ucfirst($key['parent_occupation']) ?></b></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Place of Work :</th>
                                        <td style="border-right:1px solid black;"><b></b></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Date of Birth :</th>
                                        <td style="border-right:1px solid black;"><b><?php echo date('d M Y', strtotime($key['parent_DOB'])); ?></b></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Mobile/Ph. No :</th>
                                        <td style="border-right:1px solid black;"><b><?php echo $key['parent_mobile_number'] ?></b></td>
                                    </tr>
                                    <tr style="border:1px solid black;">
                                        <th style="border-right:1px solid black;">Email :</th>
                                        <td style="border-right:1px solid black;"><b><?php echo $key['parent_email_id'] ?></b></td>
                                    </tr> 
                                </tbody>
                                <?php } } ?>
                            </table>
                            </center>
                            <table class="page_foot" style="width:80%;margin-bottom:0px !important">
                                <tr>
                                    <img src="<?php echo $school_report_footer ?>" class="img-responsive" style="padding-top:3%;">
                                </tr>
                            </table>
                            <hr style="border-top: 1px solid #000000 !important;">
                            <center>
                            <table class="table table-borderd" style="width:90%;margin-bottom:0px !important;text-align:center;">
                                <thead>
                                    <tr>
                                        <center>
                                        <th style="width:30%;padding:0%;border:none !important;">
                                            <h2><b><center>   UNDERTAKING</center></b></h2>
                                            <h3 style="font-size:small;font-weight: lighter;text-align:justify;">
                                            I/we hereby certify that the information is correct to the best of my / our knowledge and
                                            belief. Further. I/We fully understand that if any inforamtion is found to be false/incorrect. The
                                            admission of my / our ward will stand cancelled. I/We also understand that the application for
                                            registration does not guarantee admission to my / ourward. If my/our son/daughter is selected
                                            foradmission, we hereby agree and give consent to abide by the rules and regulations of school
                                            as applicable now as amended from time to time. </h3>
                                        </th>
                                        </center>
                                    </tr>
                                </thead>                                               
                            </table>
                        </center>
                        <br>
                        <center> 
                            <table class="table table-borderd" style="width:80%;padding-left:10%;margin-bottom:0px !important;">
                                <thead>
                                    <tr>
                                        <th rowspan="2" colspan="2" style="width:30%;padding:0%;border:none !important;">
                                        </th>
                                        <?php foreach ($father_details as $key => $value) { 
                                            if(empty($value)) {
                                                unset($father_details[$key]);
                                            }
                                        }
                                        if (empty($father_details)) { ?>
                                            <th rowspan="2" colspan="2" style="width:30%;padding:0%; border:none !important;">
                                                <img src="<?=base_url();?>profile_photo/default_parent_image.png" class="img-responsive img-circle circle-border m-b-md" style="border-radius:10%;width:60%;border:3px solid currentColor;">
                                            </th>
                                        <?php } else { foreach ($father_details as $key) {?>
                                            <th rowspan="2" colspan="2" style="width:30%;padding:0%; border:none !important;">
                                                <img src="<?=$key['parent_photo'];  ?>" class="img-responsive img-circle circle-border m-b-md" style="border-radius:10%;width:60%;border:3px solid currentColor;">
                                            </th>
                                        <?php } }?>
                                        <?php foreach ($mother_details as $key => $value) { 
                                            if(empty($value)) {
                                                unset($mother_details[$key]);
                                            }
                                        }
                                        if (empty($mother_details)) { ?>
                                            <th rowspan="2" colspan="2" style="width:30%;padding:0%; border:none !important;">
                                                <img src="<?=base_url();?>profile_photo/default_parent_image.png" class="img-responsive img-circle circle-border m-b-md" style="border-radius:10%;width:60%;border:3px solid currentColor;">
                                            </th>
                                        <?php } else { foreach ($mother_details as $key) {?>
                                            <th rowspan="2" colspan="2" style="width:30%;padding:0%; border:none !important;">
                                                <img src="<?=$key['parent_photo'];  ?>" class="img-responsive img-circle circle-border m-b-md" style="border-radius:10%;width:60%;border:3px solid currentColor;">
                                            </th>
                                        <?php } }?>
                                        <?php foreach ($gardien_details as $key => $value) { 
                                            if(empty($value)) {
                                                unset($gardien_details[$key]);
                                            }
                                        }
                                        if (empty($gardien_details)) { ?>
                                            <th rowspan="2" colspan="2" style="width:30%;padding:0%; border:none !important;">
                                                <img src="<?=base_url();?>profile_photo/default_parent_image.png" class="img-responsive img-circle circle-border m-b-md" style="border-radius:10%;width:60%;border:3px solid currentColor;">
                                            </th>
                                        <?php } else { foreach ($gardien_details as $key) {?>
                                            <th rowspan="2" colspan="2" style="width:30%;padding:0%; border:none !important;">
                                                <img src="<?=$key['parent_photo'];  ?>" class="img-responsive img-circle circle-border m-b-md" style="border-radius:10%;width:60%;border:3px solid currentColor;">
                                            </th>
                                        <?php } }?>
                                    </tr>
                                </thead>                                               
                            </table>
                            <table class="table table-borderd" style="width:80%;margin-top:-2% !important">
                                <thead>
                                    <tr>
                                        <center>
                                        <th rowspan="2" colspan="2" style="width:30%;padding:0%;border:none !important;">
                                        </th>
                                        <th rowspan="2" colspan="2" style="width:30%;padding-right: 10%;border:none !important;">
                                            <h5>Father Photo</h5>
                                        </th>
                                        <th rowspan="2" colspan="2" style="width:30%;padding-right: 10%;border:none !important;">
                                            <h5>Mother Photo</h5>
                                        </th>
                                        <th rowspan="2" colspan="2" style="width:30%;padding-right: 10%;border:none !important;">
                                            <h5>Gardien Photo</h5>
                                        </th>
                                        </center>
                                    </tr>
                                </thead>                                               
                            </table>
                            <table class="table table-borderd" style="width:80%;margin-bottom:5% !important">
                                <thead>
                                    <tr>
                                        <center>
                                        <th rowspan="1" colspan="2" style="width:30%;padding:0%;border:none !important;">
                                        </th>
                                        <th rowspan="1" colspan="2" style="width:30%;padding-right: 8%;border:none !important;">
                                            <h5>Father's Sign.</h5>
                                        </th>
                                        <th rowspan="1" colspan="2" style="width:30%;padding-right: 8%;border:none !important;">
                                            <h5>Mother's Sign.</h5>
                                        </th>
                                        <th rowspan="1" colspan="2" style="width:30%;padding-right: 8%;border:none !important;">
                                            <h5>Gardien Sign.</h5>
                                        </th>
                                        </center>
                                    </tr>
                                </thead>                                               
                            </table>
                            <hr style="border-top: 1px solid #000000 !important;">
                            </center>
                            <table class="table table-borderd" style="width:90%;">
                                <thead>
                                    <tr>
                                        <center>
                                        <th style="width:30%;padding-left:7%;border:none !important;border-left:1px solid black;">
                                            <h3> <ul><li><b>Checklist </b></li></ul></h3>
                                        </th>
                                        </center>
                                    </tr>
                                    <tr>
                                        <?php foreach ($birthday_details as $key => $value) { 
                                            if(empty($value)) {
                                                unset($birthday_details[$key]);
                                            }
                                        }
                                        if (empty($birthday_details)) { ?>
                                            <th colspan="3" rowspan="1" style="border-left:1px solid black;width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                                <label class="checkbox-inline i-checks"> <input type="checkbox" value="">Birth Cerificate  </label> &nbsp &nbsp &nbsp
                                            </th>
                                        <?php } else { foreach ($birthday_details as $key) {?>
                                            <th colspan="3" rowspan="1" style="border-left:1px solid black;width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                                <label class="checkbox-inline i-checks"> <input type="checkbox" value="" checked>Birth Cerificate <?php if($key['doc_type'] == 1){ echo '*';} else{ echo '**';} ?> </label> &nbsp &nbsp &nbsp
                                            </th>
                                        <?php } }?>
                                        <?php foreach ($transfer_details as $key => $value) { 
                                            if(empty($value)) {
                                                unset($transfer_details[$key]);
                                            }
                                        }
                                        if (empty($transfer_details)) { ?>
                                            <th colspan="3" rowspan="1" style="width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                                <label class="checkbox-inline i-checks"> <input type="checkbox" value="">Transfer Certificate </label> &nbsp &nbsp &nbsp
                                            </th>
                                        <?php } else { foreach ($transfer_details as $key) {?>
                                            <th colspan="3" rowspan="1" style="width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                                <label class="checkbox-inline i-checks"> <input type="checkbox" value="" checked>Transfer Certificate <?php if($key['doc_type'] == 1){ echo '*';} else{ echo '**';} ?></label> &nbsp &nbsp &nbsp
                                            </th>
                                        <?php } }?>
                                        <th colspan="3" rowspan="1" style="width:30%;padding-left:5%;border:none !important; text-align:justify;">
                                            <label class="checkbox-inline i-checks"> <input type="checkbox" value="">Progress Report(if any) </label> &nbsp &nbsp &nbsp
                                        </th>
                                    </tr>
                                    <tr>
                                        <?php foreach ($adhar_details as $key => $value) { 
                                            if(empty($value)) {
                                                unset($adhar_details[$key]);
                                            }
                                        }
                                        if (empty($adhar_details)) { ?>
                                            <th colspan="3" rowspan="1" style="border-left:1px solid black;width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                                <label class="checkbox-inline i-checks"> <input type="checkbox" value="" >Adhar Card</label> &nbsp &nbsp &nbsp
                                            </th>
                                        <?php } else { foreach ($adhar_details as $key) {?>
                                            <th colspan="3" rowspan="1" style="border-left:1px solid black;width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                                <label class="checkbox-inline i-checks"> <input type="checkbox" value="" checked>Adhar Card <?php if($key['doc_type'] == 1){ echo '*';} else{ echo '**';} ?></label> &nbsp &nbsp &nbsp
                                            </th>
                                        <?php } }?>
                                        <?php foreach ($medical_details as $key => $value) { 
                                            if(empty($value)) {
                                                unset($medical_details[$key]);
                                            }
                                        }
                                        if (empty($medical_details)) { ?>
                                            <th colspan="4" rowspan="1" style="border-left:1px solid black;width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                                <label class="checkbox-inline i-checks"> <input type="checkbox" value="" >Medical Report (if any)</label> &nbsp &nbsp &nbsp
                                            </th>
                                        <?php } else { foreach ($medical_details as $key) {?>
                                            <th colspan="4" rowspan="1" style="border-left:1px solid black;width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                                <label class="checkbox-inline i-checks"> <input type="checkbox" value="" checked>Medical Report(if any) <?php if($key['doc_type'] == 1){ echo '*';} else{ echo '**';} ?></label> &nbsp &nbsp &nbsp
                                            </th>
                                        <?php } }?>

                                        
                                       <!-- <?php foreach ($update_student as $key) {
                                            $path = base_url()."profile_photo/default_student_image.png";
                                            // print_r($path);
                                            // print_r("<br>");
                                            // print_r($key['student_photo']);
                                            if($key['student_photo'] == $path){ ?>
                                                <th colspan="6" rowspan="1" style="width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                                    <label class="checkbox-inline i-checks"> <input type="checkbox" value="" >2 Passport size photo(student)</label> &nbsp &nbsp &nbsp
                                                </th>
                                            <?php }else{ ?>
                                                <th colspan="6" rowspan="1" style="width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                                    <label class="checkbox-inline i-checks"> <input type="checkbox" value="" checked>2 Passport size photo(student)</label> &nbsp &nbsp &nbsp
                                                </th>
                                            <?php } }?>-->
                                        </tr>
                                        <!-- <tr>
                                            <?php foreach ($father_details as $key) {
                                            $path = base_url()."profile_photo/default_parent_image.png";
                                            if($key['parent_photo'] == $path){ ?>
                                                <th colspan="6" rowspan="3" style="width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                                    <label class="checkbox-inline i-checks"> <input type="checkbox" value="">2 Passport size photo(parent)</label> &nbsp &nbsp &nbsp
                                                </th>
                                            <?php }else{ ?>
                                                <th colspan="6" rowspan="3" style="width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                                    <label class="checkbox-inline i-checks"> <input type="checkbox" value="" checked>2 Passport size photo(parent)</label> &nbsp &nbsp &nbsp
                                                </th>
                                            <?php }} ?>
                                        </tr> -->
                                </thead>                                               
                            </table> 
                            <table class="table table-borderd" style="width:90%;margin-bottom:0px !important;text-align:center;">
                                <thead>
                                    <tr>
                                        <th style="width:30%;padding-left:8%;border:none !important;">
                                            <hr style="width:100%;">
                                            <h3><b>FOR OFFICE USE ONLY</b></h3>
                                               <h3 style="font-size:small;font-weight:lighter;">Admission order by the Head of the School Admitted   <input type="checkbox" value="" checked></label>  &nbsp &nbsp Not Admitted <input type="checkbox" value="" ></label></h3>
                                        </th>
                                    </tr>
                                </thead>                                               
                            </table>
                            <br><br><br><br><br><br>
                            <center>
                            <table class="table table-borderd" style="width:100%;margin-bottom:0px !important;">
                                <thead>
                                    <tr>
                                        <center>
                                        <th rowspan="2" colspan="2" style="border-left:1px solid black;width:30%;padding:0%;border:none !important;">
                                        </th>
                                        <th rowspan="2" colspan="2" style="width:30%;padding-right: 8%;border:none !important;">
                                            <h5>Sign. of co-ordination</h5>
                                        </th>
                                        <th rowspan="2" colspan="2" style="width:30%;padding-right: 8%;border:none !important;">
                                            <h5>Sign. of Administrative</h5>
                                        </th>
                                        <th rowspan="2" colspan="2" style="width:30%;padding-right: 8%;border:none !important;">
                                            <h5>Sign. of Principal</h5>
                                        </th>
                                        </center>
                                    </tr>
                                </thead>                                               
                            </table>
                            </center>
                            <table class="page_foot" style="width:80%;margin-bottom:0px !important">
                                <tr>
                                    <img src="<?php echo $school_report_footer ?>" class="img-responsive" style="padding-top:15%;">
                                </tr>
                            </table>
                            <center>
                            <table>
                                <tr>
                                    <img src="<?php echo $school_report_header ?>" class="img-responsive">
                                </tr>
                                <tr>
                                    <th colspan = "12"><center><h1><b><br>Acknowledgement Receipt</h1></center></th>
                                </tr>
                                <?php foreach ($class_details as $key => $value) { 
                                if(empty($value)) {
                                        unset($class_details[$key]);
                                    }
                                }
                                if (empty($class_details)) { ?>
                                <tr>
                                    <th colspan = "12"><center><h3><b>Session : ____-__</h3></center></th>
                                </tr>
                                <?php }else { foreach ($class_details as $key) { ?>
                                    <tr>
                                        <th colspan = "12"><center><h3><b><?php echo $key['AY_name'] ?></h3></center></th>
                                    </tr>
                                <?php } }?>
                            </table>
                            </center>
                             <hr style="width:95%;margin-bottom:0px !important">
                             <br>
                            <table>
                                <?php foreach ($update_student as $key) { ?>
                                <tr>
                                    <th style="padding-left:5%;">
                                        <h3><ul> <li>Admission Date : <span style="font-weight:initial;"> <?php echo date('d/m/Y', strtotime($key['student_admission_date'])); ?></li></ul></span></h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="padding-left:5%;">
                                        <h3> <ul><li>Form No : <span style="font-weight:initial;"> <?php echo $key['student_GRN'] ?></li></ul></span></h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="12" style="padding-left:5%;border-left:1px solid black">
                                        <h3><ul><li>Student Name : <span style="font-weight:initial;"><?php echo $key['student_first_name'] ?> <?php echo $key['student_middle_name'] ?> <?php echo $key['student_last_name'] ?></span></li></ul></h3>
                                    </th>
                                </tr>
                                <?php } ?>
                                <?php foreach ($class_details as $key => $value) { 
                                if(empty($value)) {
                                        unset($class_details[$key]);
                                    }
                                }
                                if (empty($class_details)) { ?>
                                <tr>
                                    <th style="padding-left:5%;">
                                        <h3><ul><li> Admission Sought in Class : <span style="font-weight:initial;padding-left:5%;"> </li></ul></span></h3>
                                    </th>
                                </tr>
                                <?php }else { foreach ($class_details as $key) { ?>
                                <tr>
                                    <th style="padding-left:5%;">
                                        <h3><ul><li> Admission Sought in Class : <span style="font-weight:initial;padding-left:5%;"> <?php echo $key['class_name'] ?></li></ul></span></h3>
                                    </th>
                                </tr>
                                <?php } }?>
                            </table>
                            <br><br><br><br><br>
                            <table class="table table-borderd" style="width:100%;margin-bottom:0px !important">
                                <thead>
                                    <tr>
                                        <center>
                                        <th rowspan="2" colspan="2" style="border-left:1px solid black;width:30%;padding:0%;border:none !important;">
                                        </th>
                                        <th rowspan="2" colspan="2" style="width:30%;padding-right: 8%;border:none !important;">
                                            <h5>Sign. of co-ordination</h5>
                                        </th>
                                        <th rowspan="2" colspan="2" style="width:30%;padding-right: 8%;border:none !important;">
                                            <h5>Sign. of Administrative</h5>
                                        </th>
                                        <th rowspan="2" colspan="2" style="width:30%;padding-right: 8%;border:none !important;">
                                            <h5>Sign. of Principal</h5>
                                        </th>
                                        </center>
                                    </tr>
                                </thead>                                               
                            </table>
                            <table class="table table-borderd" style="width:90%;">
                                <thead>
                                    <tr>
                                        <center>
                                        <th style="width:30%;padding-left:3%;border:none !important;border-left:1px solid black;">
                                            <h3> <ul><li><b>Document's:</b></li></ul></h3>
                                        </th>
                                        </center>
                                    </tr>
                                    <tr>
                                    <?php foreach ($birthday_details as $key => $value) { 
                                        if(empty($value)) {
                                            unset($birthday_details[$key]);
                                        }
                                    }
                                    if (empty($birthday_details)) { ?>
                                        <th colspan="3" rowspan="1" style="border-left:1px solid black;width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                            <label class="checkbox-inline i-checks"> <input type="checkbox" value="">Birth Cerificate  </label> &nbsp &nbsp &nbsp
                                        </th>
                                    <?php } else { foreach ($birthday_details as $key) {?>
                                        <th colspan="3" rowspan="1" style="border-left:1px solid black;width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                            <label class="checkbox-inline i-checks"> <input type="checkbox" value="" checked>Birth Cerificate  <?php if($key['doc_type'] == 1){ echo '*';} else{ echo '**';} ?></label> &nbsp &nbsp &nbsp
                                        </th>
                                    <?php } }?>
                                    <?php foreach ($transfer_details as $key => $value) { 
                                        if(empty($value)) {
                                            unset($transfer_details[$key]);
                                        }
                                    }
                                    if (empty($transfer_details)) { ?>
                                        <th colspan="3" rowspan="1" style="width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                            <label class="checkbox-inline i-checks"> <input type="checkbox" value="">Transfer Certificate</label> &nbsp &nbsp &nbsp
                                        </th>
                                    <?php } else { foreach ($transfer_details as $key) {?>
                                        <th colspan="3" rowspan="1" style="width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                            <label class="checkbox-inline i-checks"> <input type="checkbox" value="" checked>Transfer Certificate <?php if($key['doc_type'] == 1){ echo '*';} else{ echo '**';} ?></label> &nbsp &nbsp &nbsp
                                        </th>
                                    <?php } }?>
                                    <th colspan="3" rowspan="1" style="width:30%;padding-left:5%;border:none !important; text-align:justify;">
                                        <label class="checkbox-inline i-checks"> <input type="checkbox" value="">Progress Report(if any)</label> &nbsp &nbsp &nbsp
                                    </th>
                                </tr>
                                <tr>
                                    <?php foreach ($adhar_details as $key => $value) { 
                                            if(empty($value)) {
                                                unset($adhar_details[$key]);
                                            }
                                        }
                                        if (empty($adhar_details)) { ?>
                                            <th colspan="3" rowspan="1" style="border-left:1px solid black;width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                                <label class="checkbox-inline i-checks"> <input type="checkbox" value="" >Adhar Card</label> &nbsp &nbsp &nbsp
                                            </th>
                                        <?php } else { foreach ($adhar_details as $key) {?>
                                            <th colspan="3" rowspan="1" style="border-left:1px solid black;width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                                <label class="checkbox-inline i-checks"> <input type="checkbox" value="" checked>Adhar Card <?php if($key['doc_type'] == 1){ echo '*';} else{ echo '**';} ?></label> &nbsp &nbsp &nbsp
                                            </th>
                                        <?php } }?>
                                    <?php foreach ($medical_details as $key => $value) { 
                                        if(empty($value)) {
                                            unset($medical_details[$key]);
                                        }
                                    }
                                    if (empty($medical_details)) { ?>
                                        <th colspan="4" rowspan="1" style="border-left:1px solid black;width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                            <label class="checkbox-inline i-checks"> <input type="checkbox" value="" >Medical Report (if any)</label> &nbsp &nbsp &nbsp
                                        </th>
                                    <?php } else { foreach ($medical_details as $key) {?>
                                        <th colspan="4" rowspan="1" style="border-left:1px solid black;width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                            <label class="checkbox-inline i-checks"> <input type="checkbox" value="" checked>Medical Report(if any) <?php if($key['doc_type'] == 1){ echo '*';} else{ echo '**';} ?></label> &nbsp &nbsp &nbsp
                                        </th>
                                    <?php } }?>
                           
                                    <!--<?php foreach ($update_student as $key) {
                                        $path = base_url()."profile_photo/default_student_image.png";
                                        if($key['student_photo'] == $path){ ?>
                                            <th colspan="6" rowspan="1" style="width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                                <label class="checkbox-inline i-checks"> <input type="checkbox" value="">2 Passport size photo(student)</label> &nbsp &nbsp &nbsp
                                            </th>
                                        <?php }else{ ?>
                                            <th colspan="6" rowspan="1" style="width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                                <label class="checkbox-inline i-checks"> <input type="checkbox" value="" checked>2 Passport size photo(student)</label> &nbsp &nbsp &nbsp
                                            </th>
                                        <?php } }?>
                                    </tr><tr>
                                    <?php foreach ($father_details as $key) {
                                        $path = base_url()."profile_photo/default_parent_image.png";
                                        if($key['parent_photo'] == $path){ ?>
                                            <th colspan="6" rowspan="3" style="width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                                <label class="checkbox-inline i-checks"> <input type="checkbox" value="" >2 Passport size photo(parent)</label> &nbsp &nbsp &nbsp
                                            </th>
                                        <?php }else{ ?>
                                            <th colspan="6" rowspan="3" style="width:30%;padding-left:10%;border:none !important; text-align:justify;">
                                                <label class="checkbox-inline i-checks"> <input type="checkbox" value="" checked>2 Passport size photo(parent)</label> &nbsp &nbsp &nbsp
                                            </th>
                                        <?php }} ?>-->
                                    </tr>
                                </thead>                                               
                            </table>
                            <table>
                                <tr>
                                    <th style="padding-left:20%;">Note : * Original & ** Duplicate</th>
                                </tr>
                            </table>
                            <br>
                            <br>
                            <table class="page_foot">
                                <tr>
                                    <img src="<?php echo $school_report_footer ?>" class="img-responsive">
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>

    <script type="text/javascript">
        window.print();
    </script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/invoice_print.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:32:37 GMT -->
</html>
