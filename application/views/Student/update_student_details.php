        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Update Student Details</b></h3>
                                </div>
                                
                            </div>
                        </div>
                        <?php foreach ($student as $key) { ?>
                            
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addStudent" action="<?=site_url('Student/edit_student_details')?>">
                                <div class="form-group" hidden>
                                    <label class="col-sm-2 control-label">Student Id</label>
                                    <div class="col-sm-8">
                                            <input type="text" class="form-control" name="student_profile_id" value="<?=$key['student_profile_id']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Student Name <span style="color:red;">*</span></label>
                                    <div class="col-sm-8">
                                         <div class="form-group">
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="student_first_name" value="<?=$key['student_first_name']?>" id="update_student_first_name" onkeyup="capitalize(this.id, this.value);">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="student_middle_name" value="<?=$key['student_middle_name']?>"  id="update_middle_name" onkeyup="capitalize(this.id, this.value);">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="student_last_name" value="<?=$key['student_last_name']?>"  id="update_last_name" onkeyup="capitalize(this.id, this.value);">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Student Adhar Card No.<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Adhar Card Number" name="student_adhar_card_number" class="form-control " value="<?=$key['student_adhar_card_number']?>">
                                    </div>
                                    <label class="col-lg-2 control-label">Student GRN No.<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="GRN No" name="student_GRN" class="form-control " value="<?=$key['student_GRN']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Student Birth Date<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" readonly="" placeholder="Student Birth Date" name="student_DOB" class="form-control datepicker" value="<?=$key['student_DOB']?>" >
                                    </div>
                                    <label class="col-lg-2 control-label">Gender <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                           <div class="form-group">
                                                <div class="col-sm-4">
                                                    <?php if($key['student_gender'] == "Male"){ ?>
                                                    <input type="radio" name="student_gender" value="male" checked=""> Male
                                                    <?php } ?>
                                                     <?php if($key['student_gender'] != "Male"){ ?>
                                                    <input type="radio" name="student_gender" value="male" > Male
                                                    <?php } ?>

                                                </div>
                                              
                                                <div class="col-sm-4">
                                                    <?php if($key['student_gender'] == "Female"){ ?>
                                                    <input type="radio" name="student_gender" value="female" checked=""> Female
                                                    <?php } ?>
                                                     <?php if($key['student_gender'] != "Female"){ ?>
                                                    <input type="radio" name="student_gender" value="female" > Female
                                                    <?php } ?>

                                                </div>
                                              
                                                <div class="col-sm-4">
                                                    <?php if($key['student_gender'] == "Other"){ ?>
                                                    <input type="radio" name="student_gender" value="other" checked=""> Other
                                                    <?php } ?>
                                                    <?php if($key['student_gender'] != "Tther"){ ?>
                                                    <input type="radio" name="student_gender" value="other" > Other
                                                    <?php } ?>

                                                </div>
                                            </div>

                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-lg-2 control-label">Blood Group</label>
                                    <div class="col-lg-3">
                                        <select name="student_blood_group" class="form-control">
                                            <option value="<?=$key['student_blood_group']?>"><?=$key['student_blood_group']?></option>
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
                                        <INPUT type="text" placeholder=" Student Birth Place" name="student_birth_place" class="form-control" value="<?=$key['student_birth_place']?>" id="update_birth_place" onkeyup="capitalize(this.id, this.value);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Nationality<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder=" Student Nationality" name="student_nationality" class="form-control" value="<?=$key['student_nationality']?>" id="update_nationality" onkeyup="capitalize(this.id, this.value);">
                                    </div>
                                    <label class="col-lg-2 control-label">Mother Tongue</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder=" Student Mother Tongue" name="student_mother_tongue" class="form-control" value="<?=$key['student_mother_tongue']?>" id="update_mt" onkeyup="capitalize(this.id, this.value);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Category</label>
                                    <div class="col-lg-3">
                                        <select name="student_category" class="form-control">
                                            <option value="<?=$key['student_category']?>"><?=$key['student_category']?></option>
                                            <option value="0">Select Category</option>
                                            <option value="OPEN">OPEN</option>
                                            <option value="ST">ST</option>
                                            <option value="SBC">SBC</option>
                                            <option value="BC-A">BC-A</option>
                                            <option value="BC-B">BC-B</option>
                                            <option value="SC">SC</option>
                                            <option value="OBC">OBC</option>
                                            <option value="VJNT">VJNT</option>
                                            <option value="NT">NT</option>
                                        </select>
                                    </div>
                                    <label class="col-lg-2 control-label">Religion</label>
                                    <div class="col-lg-3">
                                        <INPUT type="text" placeholder="Student Religion" name="student_religion" class="form-control" value="<?=$key['student_religion']?>" id="update_religion" onkeyup="capitalize(this.id, this.value);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Cast</label>
                                    <div class="col-lg-3">
                                        <INPUT type="text" placeholder="Student Cast" name="student_cast" class="form-control" value="<?=$key['student_cast']?>" id="update_cast" onkeyup="capitalize(this.id, this.value);">
                                    </div>
                                    <label class="col-lg-2 control-label">Sub Cast</label>
                                    <div class="col-lg-3">
                                        <INPUT type="text" placeholder="Student Sub Cast" name="student_sub_cast" class="form-control" value="<?=$key['student_sub_cast']?>" id="update_sub_cast" onkeyup="capitalize(this.id, this.value);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">House No./Street Name/Landmark</label>
                                    <div class="col-lg-3">
                                         <input type="text" class="form-control student_present_pre_house" name="student_present_house_no" value="<?=$key['student_present_house_no']?>" placeholder="Enter the House No./Street Name/Landmark." id="" onkeyup="capitalize(this.id, this.value);">
                                    </div>
                                    <label class="col-lg-2 control-label">Town<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control student_present_pre_town" name="student_present_town" value="<?=$key['student_present_town']?>" placeholder="Enter the Home Town" id="" onkeyup="capitalize(this.id, this.value);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Taluka<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                         <input type="text" class="form-control student_present_pre_tal" name="student_present_tal" value="<?=$key['student_present_tal']?>" placeholder="Enter the taluka." id="" onkeyup="capitalize(this.id, this.value);">
                                    </div>
                                    <label class="col-lg-2 control-label">District<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control student_present_pre_dist" name="student_present_dist" value="<?=$key['student_present_dist']?>" placeholder="Enter the District." id="" onkeyup="capitalize(this.id, this.value);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">State<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <select class="form-control student_present_pre_state" name="student_present_state">
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
                                    <label class="col-lg-2 control-label">Pin Code<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control student_present_pre_pincode" name="student_present_pincode" value="<?=$key['student_present_pincode']?>" placeholder="Enter the Pin Code.">
                                    </div>
                                </div>
                                 <!-- <div class="form-group">
                                    <label class="col-lg-2 control-label">Permament Address <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <textarea type="text" name="student_permament_address" class="form-control"><?=$key['student_permament_address']?></textarea>
                                    </div> -->
                                    <!-- <label class="col-lg-2 control-label">Present Address <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <textarea type="text" name="student_present_address" class="form-control"><?=$key['student_present_address']?></textarea>
                                    </div> -->
                                <!-- </div> -->
                                <?php if($functionality[0]['school_tracking'] == 1) {?>
                                <div class="form-group functionality">
                                        <label class="col-sm-2 control-label">Tracking System <span style="color:red;">*</span></label>
                                        <div class="col-sm-3" style="padding:10px;">
                                            <?php if($key['student_tracking'] == 1) {?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" checked disabled class="onoffswitch-checkbox" id="example3">
                                                    <label class="onoffswitch-label" for="example3">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php }else{?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" disabled class="onoffswitch-checkbox" id="example4">
                                                    <label class="onoffswitch-label" for="example4">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group update_functionality">
                                        <label class="col-sm-2 control-label">Tracking System <span style="color:red;">*</span></label>
                                        <div class="col-sm-3" style="padding:10px;">
                                            <?php if($key['student_tracking'] == 1) {?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" checked class="onoffswitch-checkbox" name="student_tracking" id="example1">
                                                    <label class="onoffswitch-label" for="example1">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php }else{?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" class="onoffswitch-checkbox" name="student_tracking" id="example2">
                                                    <label class="onoffswitch-label" for="example2">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php } ?>
                                <br>
                                 <div class="hr-line-dashed"></div>
    
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-4">
                                        <a href="<?=site_url('Student/update_student/') .$key['student_profile_id']?>"><span class="btn btn-white">Cancel</span></a>
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <?php if($functionality[0]['school_tracking'] == 1) {?>
                                            <span class="btn btn-primary edit_functionality" type="submit">Edit Functionality</span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <?php   } ?>
                    </div>
                </div>
            </div>

        </div>