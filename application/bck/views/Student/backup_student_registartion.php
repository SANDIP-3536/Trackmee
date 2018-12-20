        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Fill Student Details</b></h3>
                                </div>
                                <div class="col-sm-6">
                                    <div class="ibox-tools">
                                        <a href="<?=site_url('Student/view_student')?>"><button class="btn btn-xs btn-primary">View Student</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addStudent" action="<?=site_url('Student/add_student_registration')?>">
                                 <div class="form-group">
                                    <label class="col-lg-2 control-label">Admission Date</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder=" Student admission Date" name="student_admission_date" class="form-control " value="<?php echo date('Y-m-d');?>" readonly>
                                    </div>
                                    <label class="col-lg-2 control-label">Registartion Date<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder=" Student Reg. Date" name="student_reg_date" class="form-control" value="<?php echo date('Y-m-d');?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Student Name <span style="color:red;">*</span></label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                        <?php if ($enquiry != 1){?>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control student_first_name" name="student_first_name" placeholder="First Name" id="student_first_name" value="<?php echo $enquiry_details[0]['enquiry_student_first_name'] ?>">
                                                </div>
                                        <?php }else{ ?>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control student_first_name" name="student_first_name" placeholder="First Name" id="student_first_name">
                                                </div>
                                        <?php } ?>
                                        <?php if ($enquiry != 1){?>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="student_middle_name" placeholder="Middle Name" value="<?php echo $enquiry_details[0]['enquiry_student_middle_name'] ?>">
                                            </div>
                                        <?php }else{ ?>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="student_middle_name" placeholder="Middle Name">
                                            </div>
                                        <?php } ?>
                                        <?php if ($enquiry != 1){?>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="student_last_name" placeholder="Last Name" value="<?php echo $enquiry_details[0]['enquiry_student_last_name'] ?>">
                                            </div>
                                        <?php }else{ ?>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="student_last_name" placeholder="Last Name">
                                            </div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Adhar Card No.<span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="Student Adhar card" name="student_adhar_card_number" class="form-control">
                                    </div>
                                    <label class="col-lg-2 control-label">GRN No. <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="GRN No." name="student_GRN" class="form-control" value="0">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Student Birth Date <span style="color:red;">*</span></label>
                                    <?php if ($enquiry != 1){?>
                                        <div class="col-lg-3">
                                            <input type="text" readonly="" placeholder="Student Birth Date" name="student_DOB" class="form-control datepicker" value="<?php echo $enquiry_details[0]['enquiry_student_DOB'] ?>">
                                        </div>
                                    <?php }else{ ?>
                                        <div class="col-lg-3">
                                            <input type="text" readonly="" placeholder="Student Birth Date" name="student_DOB" class="form-control datepicker">
                                        </div>
                                    <?php } ?>
                                    <label class="col-lg-2 control-label">Gender <span style="color:red;">*</span></label>
                                    <?php if($enquiry != 1){ ?>
                                        <div class="col-lg-3">
                                            <?php if ($enquiry_details[0]['enquiry_student_gender'] == 'male') {?>
                                                <label class="radio-inline"> 
                                                    <input type="radio" name="student_gender" value="male" checked>&nbsp  Male 
                                                </label> 
                                            <?php }elseif ($enquiry_details[0]['enquiry_student_gender'] == 'female') { ?>
                                                <label class="radio-inline">
                                                    <input type="radio" name="student_gender" value="female" checked>  &nbsp Female
                                                </label>
                                            <?php }else{ ?>
                                                <label class="radio-inline">
                                                    <input type="radio" name="student_gender" value="other" checked>  &nbsp Other
                                                </label>
                                            <?php } ?>
                                        </div>
                                    <?php }else{ ?>
                                        <div class="col-lg-3">
                                            <label class="radio-inline"> 
                                                <input type="radio" name="student_gender" value="male">&nbsp  Male 
                                            </label> 
                                            <label class="radio-inline">
                                                <input type="radio" name="student_gender" value="female">  &nbsp Female
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="student_gender" value="other">  &nbsp Other
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Blood Group</label>
                                    <div class="col-lg-3">
                                        <select name="student_blood_group" class="form-control">
                                            <option>Select Blood Group</option>
                                            <option value="A+">A +ve</option>
                                            <option value="B+">B +ve</option>
                                            <option value="AB+">AB +ve</option>
                                            <option value="O+">O +ve</option>
                                            <option value="A-">A -ve</option>
                                            <option value="B-">B -ve</option>
                                            <option value="AB-">AB -ve</option>
                                            <option value="O-">O -ve</option>
                                        </select>
                                    </div>
                                    <label class="col-lg-2 control-label">Birth Place</label>
                                    <div class="col-lg-3">
                                        <INPUT type="text" placeholder=" Student Birth Place" name="student_birth_place" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Nationality<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder=" Student Nationality" name="student_nationality" class="form-control">
                                    </div>
                                    <label class="col-lg-2 control-label">Mother Tongue</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder=" Student Mother Tongue" name="student_mother_tongue" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Category</label>
                                    <div class="col-lg-3">
                                        <select name="student_category" class="form-control">
                                            <option value="0">Select Category</option>
                                            <option value="OPEN">OPEN</option>
                                            <option value="ST">ST</option>
                                            <option value="SBC">SBC</option>
                                            <option value="BC-A">BC-A</option>
                                            <option value="BC-B">BC-B</option>
                                            <option value="SC">SC</option>
                                        </select>
                                    </div>
                                    <label class="col-lg-2 control-label">Religion</label>
                                    <div class="col-lg-3">
                                        <INPUT type="text" placeholder="Student Religion" name="student_religion" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Sub_Cast</label>
                                    <div class="col-lg-3">
                                        <INPUT type="text" placeholder="Student Sub Cast" name="student_cast" class="form-control">
                                    </div>
                                    <label class="col-sm-2 control-label">Tracking System <span style="color:red;">*</span></label>
                                    <div class="col-sm-3" style="padding:10px;">
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="student_tracking" id="example1">
                                                <label class="onoffswitch-label" for="example1">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Permament Address <span style="color:red;">*</span></label>
                                    <?php if ($enquiry != 1){?>
                                        <div class="col-lg-3">
                                            <textarea type="text" placeholder=" Student Permament Address" name="student_permament_address" class="form-control" ><?php echo $enquiry_details[0]['enquiry_residential_address'] ?></textarea>
                                        </div>
                                    <?php }else{ ?>
                                        <div class="col-lg-3">
                                            <textarea type="text" placeholder=" Student Permament Address" name="student_permament_address" class="form-control"></textarea>
                                        </div>
                                    <?php } ?>
                                    <label class="col-lg-2 control-label">Present Address <span style="color:red;">*</span></label>
                                    <?php if ($enquiry != 1){?>
                                        <div class="col-lg-3">
                                            <textarea type="text" placeholder=" Student Present Address" name="student_present_address" class="form-control"><?php echo $enquiry_details[0]['enquiry_residential_address'] ?></textarea>
                                        </div>
                                    <?php }else{ ?>
                                        <div class="col-lg-3">
                                            <textarea type="text" placeholder=" Student Present Address" name="student_present_address" class="form-control"></textarea>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Student Photo</label>
                                    <div class="col-sm-3">
                                        <input type="file" placeholder="placeholder" name="student_photo" class="form-control" accept="image/jpeg, image/png, image/gif" style="border:none;">
                                    </div>
                                </div>
                                <br>
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <h3><b>Fill Parent Details</b></h3>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <label class="radio-inline" readonly> 
                                                    <input type="checkbox" name="parent_type_show[]" value="1"  class="father_details" checked>&nbsp  Father 
                                                </label>
                                                <label class="radio-inline" readonly> 
                                                    <input type="checkbox" name="parent_type_show[]" value="2" class="mother_details">&nbsp  Mother 
                                                </label>
                                                <label class="radio-inline"> 
                                                    <input type="checkbox" name="parent_type_show[]" class="gardien_details" value="3">&nbsp  Gardien 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="father_details">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Fill Father Details</b></h3>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group hidden">
                                    <label class="col-lg-2 control-label">Parent Type <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <label class="radio-inline"> 
                                            <input type="checkbox" name="parent_type[0]" value="1" checked>&nbsp  Father 
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Father Name <span style="color:red;">*</span></label>
                                    <div class="col-sm-8">
                                         <div class="form-group">
                                         <?php if ($enquiry != 1){?>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control parent_first_name" name="parent_first_name[0]" placeholder="First Name" value="<?php echo $enquiry_details[0]['enquiry_parent_first_name'] ?>">
                                            </div>
                                        <?php }else{ ?>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control parent_first_name" name="parent_first_name[0]" placeholder="First Name">
                                            </div>
                                        <?php } ?>
                                        <?php if ($enquiry != 1){?>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="parent_middle_name[0]" placeholder="Middle Name" value="<?php echo $enquiry_details[0]['enquiry_parent_middle_name'] ?>">
                                            </div>
                                        <?php }else{ ?>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="parent_middle_name[0]" placeholder="Middle Name">
                                            </div>
                                        <?php } ?>
                                        <?php if ($enquiry != 1){?>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="parent_last_name[0]" placeholder="Last Name" value="<?php echo $enquiry_details[0]['enquiry_parent_last_name'] ?>">
                                            </div>
                                        <?php }else{ ?>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="parent_last_name[0]" placeholder="Last Name">
                                            </div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                   <label class="col-lg-2 control-label">Father Birth Date <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" readonly="" placeholder="Parent Birth Date" name="parent_DOB[0]" class="form-control datepicker">
                                    </div>
                                   
                                    <label class="col-lg-2 control-label">Gender <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" name="parent_gender[0]" value="male" style="border:none;" class="form-control hidden">&nbsp  Male 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Father Mobile No.</label>
                                    <?php if ($enquiry != 1){?>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control mobile" id="mobile" name="parent_mobile_number[0]" placeholder="Parent Mobile No." value="<?php echo $enquiry_details[0]['enquiry_parent_mobile_number'] ?>">
                                            <label class="mobile_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                        </div>
                                    <?php }else{ ?>
                                        <div class="col-sm-3">
                                        <input type="text" class="form-control mobile" id="mobile" name="parent_mobile_number[0]" placeholder="Parent Mobile No.">
                                        <label class="mobile_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                    </div>
                                    <?php } ?>
                                    <label class="col-sm-2 control-label">Father Email ID. <span style="color:red;">*</span></label>
                                    <?php if ($enquiry != 1){?>
                                        <div class="col-sm-3">
                                            <input type="email" class="form-control email_id" id="email_id" name="parent_email_id[0]" placeholder="Parent Email Address" value="<?php echo $enquiry_details[0]['enquiry_parent_email_id'] ?>">
                                            <label class="email_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                        </div>
                                    <?php }else{ ?>
                                        <div class="col-sm-3">
                                        <input type="email" class="form-control email_id" id="email_id" name="parent_email_id[0]" placeholder="Parent Email Address">
                                            <label class="email_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Father Qualification</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="parent_qualification[0]" placeholder="Parent Qualification">
                                    </div>
                                    <?php if ($enquiry != 1){?>
                                        <label class="col-sm-2 control-label">Father Occupation</label>
                                        <div class="col-sm-3">
                                            <input type="email" class="form-control" name="parent_occupation[0]" placeholder="Parent Occupation" value="<?php echo $enquiry_details[0]['enquiry_parent_occupation'] ?>">
                                        </div>
                                    <?php }else{ ?>
                                        <label class="col-sm-2 control-label">Father Occupation</label>
                                        <div class="col-sm-3">
                                            <input type="email" class="form-control" name="parent_occupation[0]" placeholder="Parent Occupation">
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <?php if ($enquiry != 1){?>
                                        <label class="col-lg-2 control-label">Father Address <span style="color:red;">*</span></label>
                                        <div class="col-lg-3">
                                            <textarea type="text" placeholder=" Parent Address" name="parent_address[0]" class="form-control"><?php echo $enquiry_details[0]['enquiry_residential_address'] ?></textarea>
                                        </div>
                                    <?php }else{ ?>
                                        <label class="col-lg-2 control-label">Father Address <span style="color:red;">*</span></label>
                                        <div class="col-lg-3">
                                            <textarea type="text" placeholder=" Parent Address" name="parent_address[0]" class="form-control"></textarea>
                                        </div>
                                    <?php } ?>
                                    <label class="col-sm-2 control-label">Father Photo</label>
                                    <div class="col-sm-3">
                                        <input type="file" name="parent_photo[0]" class="form-control" accept="image/jpeg, image/png, image/gif" style="border:none;">
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <div class="col-sm-offset-1 col-sm-12">
                                    <div class="radio">
                                        <input id="student_parent_primary" type="radio" name="student_parent_primary[]"  value="1" checked>
                                        <label for="">Do You Want To Register This Number For Daily Communication</label>
                                    </div>
                                </div>
                                </div>
                                </div>
                                <div id="mother_details">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Fill Mother Details</b></h3>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group hidden">
                                    <label class="col-lg-2 control-label">Parent Type <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <label class="radio-inline">
                                            <input type="checkbox" name="parent_type[1]" value="2" checked>  &nbsp Mother 
                                        </label>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Mother Name <span style="color:red;">*</span></label>
                                    <div class="col-sm-8">
                                         <div class="form-group">
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control parent_first_name" name="parent_first_name[1]" placeholder="First Name">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="parent_middle_name[1]" placeholder="Middle Name">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="parent_last_name[1]" placeholder="Last Name">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                   <label class="col-lg-2 control-label">Mother Birth Date <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" readonly="" placeholder="Parent Birth Date" name="parent_DOB[1]" class="form-control datepicker">
                                    </div>
                             
                                    <label class="col-lg-2 control-label">Gender <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" name="parent_gender[1]" value="female" class="form-control hidden" style="border:none;">  &nbsp Female
                                    </div>
                                   
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Mother Mobile No. <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control mobile" name="parent_mobile_number[1]" placeholder="Parent Mobile No.">
                                        <label class="mobile_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                    </div>
                                    <label class="col-sm-2 control-label">Mother Email ID.</label>
                                    <div class="col-sm-3">
                                        <input type="email" class="form-control email_id" id="email_id" name="parent_email_id[1]" placeholder="Parent Email Address">
                                        <label class="email_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Mother Qualification</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="parent_qualification[1]" placeholder="Parent Qualification">
                                    </div>
                                    <label class="col-sm-2 control-label">Mother Occupation</label>
                                    <div class="col-sm-3">
                                        <input type="email" class="form-control" name="parent_occupation[1]" placeholder="Parent Occupation">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Mother Address <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <textarea type="text" placeholder=" Parent Address" name="parent_address[1]" class="form-control"></textarea>
                                    </div>
                                    <label class="col-sm-2 control-label">Mother Photo</label>
                                    <div class="col-sm-3">
                                        <input type="file" name="parent_photo[1]" class="form-control" accept="image/jpeg, image/png, image/gif" style="border:none;">
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <div class="col-sm-offset-1 col-sm-12">
                                    <div class="radio">
                                        <input id="student_parent_primary" type="radio" name="student_parent_primary[]" value="1">
                                        <label for="">Do You Want To Register This Number For Daily Communication</label>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div id="gardien_details">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Fill Gardian Details</b></h3>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group hidden">
                                    <label class="col-lg-2 control-label">Parent Type <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <label class="radio-inline">
                                            <input type="checkbox" name="parent_type[2]" value="3" checked>  &nbsp Gardian 
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Gardian Name <span style="color:red;">*</span></label>
                                    <div class="col-sm-8">
                                         <div class="form-group">
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control parent_first_name" name="parent_first_name[2]" placeholder="First Name">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="parent_middle_name[2]" placeholder="Middle Name">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="parent_last_name[2]" placeholder="Last Name">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                   <label class="col-lg-2 control-label">Gardian Birth Date <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" readonly="" placeholder="Parent Birth Date" name="parent_DOB[2]" class="form-control datepicker">
                                    </div>
                             
                                    <label class="col-lg-2 control-label">Gender <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <label class="radio-inline">
                                            <input type="radio" name="parent_gender[2]" value="male">  &nbsp Male
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="parent_gender[2]" value="female">  &nbsp Female
                                        </label>
                                    </div>
                                   
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Gardian Mobile No.</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control mobile" name="parent_mobile_number[2]" placeholder="Parent Mobile No.">
                                        <label class="mobile_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                    </div>
                                    <label class="col-sm-2 control-label">Gardian Email ID. <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="email" class="form-control email_id" id="email_id" name="parent_email_id[2]" placeholder="Parent Email Address">
                                        <label class="email_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Gardian Qualification</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="parent_qualification[2]" placeholder="Parent Qualification">
                                    </div>
                                    <label class="col-sm-2 control-label">Gardian Occupation</label>
                                    <div class="col-sm-3">
                                        <input type="email" class="form-control" name="parent_occupation[2]" placeholder="Parent Occupation">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Gardian Address <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <textarea type="text" placeholder=" Parent Address" name="parent_address[2]" class="form-control"></textarea>
                                    </div>
                                    <label class="col-sm-2 control-label">Gardian Photo</label>
                                    <div class="col-sm-3">
                                        <input type="file" name="parent_photo[2]" class="form-control" accept="image/jpeg, image/png, image/gif" style="border:none;">
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <div class="col-sm-offset-1 col-sm-12">
                                    <div class="radio">
                                        <input id="student_parent_primary" type="radio" name="student_parent_primary[]" value="1">
                                        <label for="">Do You Want To Register This Number For Daily Communication</label>
                                    </div>
                                    </div>
                                </div>
                                </div>
                               <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <h3><b>Assign Class & Division</b></h3>
                                        </div>
                                         <div class="col-sm-9">
                                            <?php if($functionality[0]['school_CRM'] == 0) {?>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Class</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control class_details" name="SCD_class_name">
                                                        <option>Select Class</option>
                                                        <option value="0">Default</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php } else {?>
                                            <div class="form-group">
                                                <label class="col-lg-1 control-label">Class</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control class_details" name="SCD_class_id">
                                                            <option>Select Class</option>
                                                            <?php foreach ($class_details as $key) { ?>
                                                                <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                                <label class="col-lg-1 control-label">Division</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control division_details" name="SCD_division_id">
                                                        
                                                    </select>
                                                </div>
                                                <!-- <label class="col-lg-1 control-label">Roll No</label>
                                                <div class="col-sm-2">
                                                    <input type="text" placeholder="Student Roll No" name="SCD_Roll_No" class="form-control">
                                                </div> -->
                                            </div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div><br></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="ibox-title">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h3><b>Select Other Fee's</b></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ibox-content">
                                            <div class="form-group" style="border-bottom: 1px solid #000000;">
                                                <label class="col-sm-1 control-label">Sr.No</label>
                                                <label class="col-sm-2 control-label" style="text-align:center;">fee Type</label>
                                                <label class="col-sm-2 control-label" style="text-align:left;">fee Amount</label>
                                                <label class="col-sm-2 control-label" style="text-align:left;">fee Waiver Name</label>
                                                <label class="col-sm-2 control-label" style="text-align:left;">Waiver Amount</label>
                                                <label class="col-sm-1 control-label" style="text-align:center;">Select</label>
                                            </div>
                                             <?php 
                                                $i =1;
                                                foreach ($fee_type as $key) { ?>
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label"><?=$i++;?>)</label>
                                                <label class="col-sm-2 control-label" style="text-align:center;"><?=$key['fees_type_name']?></label>
                                                <div class="col-sm-2" style="text-align:left;">    
                                                    <input type="text" class="form-control"  name="" value="<?php  echo number_format($key['fees_type_amount'])?>" readonly>
                                                    <input type="text" class="form-control hidden"  name="total_fee_amount[]" value="<?=$key['fees_type_amount']?>" readonly>
                                                </div>
                                                <div class="col-sm-2" style="text-align:left;">
                                                    <input type="text" class="form-control"  name="fee_waiver_name[]" >
                                                </div>
                                                <div class="col-sm-2" style="text-align:left;">
                                                    <input type="text" class="form-control"  name="fee_waiver_amount[]" value="00">
                                                </div>
                                                <div class="col-sm-1" style="text-align:center;">
                                                    <label class="checkbox-inline i-checks"> <input type="checkbox" name="fee_type_id[]" value="<?=$key['fees_type_id']?>"></label> 
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="ibox-title">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h3><b>Class wise Fee's</b></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ibox-content">
                                            <div class="form-group"  style="border-bottom: 1px solid #000000;">
                                                <label class="col-sm-1 control-label">Sr.No</label>
                                                <label class="col-sm-2 control-label" style="text-align:center;">fee Type</label>
                                                <label class="col-sm-2 control-label" style="text-align:left;">fee Amount</label>
                                                <label class="col-sm-2 control-label" style="text-align:left;">fee Waiver Name</label>
                                                <label class="col-sm-2 control-label" style="text-align:left;">Waiver Amount</label>
                                                <label class="col-sm-1 control-label" style="text-align:center;">Select</label>
                                            </div>
                                            <div class="fee_details">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="<?=site_url('Student/view_student')?>"><span class="btn btn-white">Cancel</span></a>
                                        <button class="btn btn-primary" type="submit" id="submit">Proceed To Next</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>