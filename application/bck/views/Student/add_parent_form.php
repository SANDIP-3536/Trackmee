    <div class="wrapper wrapper-content">
        <div class="row animated fadeInRight">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Fill Parents Details (Father/Mother/Gardian)</b></h3>
                                </div>
                              
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addStudent" action="<?=site_url('Student/add_another_parent')?>">
                               <div class="form-group hidden">
                                    <label class="col-sm-2 control-label">Student Id</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="parent_student_profile_id" value="<?php echo $student_profile_id; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Type<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <!-- <?php if(!in_array(1,$parent_type)){ ?> -->
                                        <label class="radio-inline"> 
                                            <input type="radio" name="parent_type" value="1">&nbsp  Father 
                                        </label> 
                                        <!--<?php } ?>
                                        <?php if(!in_array(2,$parent_type)){ ?>-->
                                        <label class="radio-inline">
                                            <input type="radio" name="parent_type" value="2">  &nbsp Mother 
                                        </label>
                                        <!--<?php } ?>
                                        <?php if(!in_array(3,$parent_type)){ ?>-->
                                        <label class="radio-inline">
                                            <input type="radio" name="parent_type" value="3">  &nbsp Gardian
                                        </label>
                                        <!--<?php } ?>-->
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Name<span style="color:red;">*</span></label>
                                    <div class="col-sm-8">
                                         <div class="form-group">
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="parent_first_name" placeholder="First Name" id="another_parent_first" onkeyup="capitalize(this.id, this.value);">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="parent_middle_name" placeholder="Middle Name" id="another_parent_middle" onkeyup="capitalize(this.id, this.value);">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="parent_last_name" placeholder="Last Name" id="another_parent_last" onkeyup="capitalize(this.id, this.value);">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                   <label class="col-lg-2 control-label">Birth Date<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" readonly="" placeholder="Parent Birth Date" name="parent_DOB" class="form-control datepicker">
                                    </div>
                               <!--  </div>
                             
                                <div class="form-group"> -->
                                    <label class="col-lg-2 control-label">Gender<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <label class="radio-inline"> 
                                            <input type="radio" name="parent_gender" value="male">&nbsp  Male 
                                        </label> 
                                        <label class="radio-inline">
                                            <input type="radio" name="parent_gender" value="female">  &nbsp Female
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="parent_gender" value="other">  &nbsp Other
                                        </label>
                                    </div>
                                   
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Mobile No.<span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control mobile" id="mobile" name="parent_mobile_number" placeholder="Parent Mobile No.">
                                        <label class="mobile_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                    </div>
                                <!-- </div>
                                <div class="form-group"> -->
                                    <label class="col-sm-2 control-label">Email ID.</label>
                                    <div class="col-sm-3">
                                        <input type="email" class="form-control email_id" id="email_id" name="parent_email_id" placeholder="Parent Email Address">
                                        <label class="email_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Qualification</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="parent_qualification" placeholder="Parent Qualification">
                                    </div>
                                <!-- </div>
                                <div class="form-group"> -->
                                    <label class="col-sm-2 control-label">Occupation</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="parent_occupation" id="another_praent_occu" onkeyup="capitalize(this.id, this.value);" placeholder="Parent Occupation">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">House No./Street Name/Landmark</label>
                                    <div class="col-lg-3">
                                         <input type="text" class="form-control student_permament_pre_house" name="parent_house_no" placeholder="Enter the House No./Street Name/Landmark." id="another_parent_house" onkeyup="capitalize(this.id, this.value);">
                                    </div>
                                    <label class="col-lg-2 control-label">Town<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control student_permament_pre_town" name="parent_town" placeholder="Enter the Home Town." id="another_praent_town" onkeyup="capitalize(this.id, this.value);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Taluka<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                         <input type="text" class="form-control student_permament_pre_tal" name="parent_tal" placeholder="Enter the taluka." id="another_parent_taluka" onkeyup="capitalize(this.id, this.value);">
                                    </div>
                                    <label class="col-lg-2 control-label">District<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control student_permament_pre_dist" name="parent_dist" placeholder="Enter the District." id="another_parent_district" onkeyup="capitalize(this.id, this.value);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">State<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <select class="form-control student_present_pre_state" name="parent_state">
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
                                        <input type="text" class="form-control student_permament_pre_pincode" name="parent_pincode" placeholder="Enter the Pin Code.">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Parent Photo</label>
                                    <div class="col-sm-3">
                                        <input type="file" name="parent_photo" class="form-control" accept="image/jpeg, image/png, image/gif" style="border:none;">
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <div class="col-sm-offset-1 col-sm-4">
                                    <div class="checkbox checkbox-primary">
                                        <input id="" type="checkbox" name="student_parent_primary" >
                                        <label for="">Do You Want To Register This Number For Daily Communication</label>
                                    </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                    
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="reset">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
