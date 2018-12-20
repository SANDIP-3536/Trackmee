        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Update Parent Details</b></h3>
                                </div>
                              
                            </div>
                        </div>
                        <?php foreach ($parent as $key) { ?>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addStudent" action="<?=site_url('Student/edit_parent_details')?>">
                            <div class="form-group" hidden>
                                <label class="col-sm-2 control-label">Parent Id</label>
                                <div class="col-sm-4">
                                        <input type="text" class="form-control" name="parent_profile_id" value="<?=$key['parent_profile_id']?>">
                                   
                                </div>
                                <label class="col-sm-2 control-label">Student Profile Id</label>
                                <div class="col-sm-4">
                                        <input type="text" class="form-control" name="student_profile_id" value="<?=$key['parent_student_profile_id']?>">
                                </div>
                             </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Parent Name</label>
                                    <div class="col-sm-8">
                                         <div class="form-group">
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="parent_first_name" value="<?=$key['parent_first_name']?>" id="update_first_name"onkeyup="capitalize(this.id, this.value);">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="parent_middle_name" value="<?=$key['parent_middle_name']?>" id="update_middle_name"onkeyup="capitalize(this.id, this.value);">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="parent_last_name" value="<?=$key['parent_last_name']?>" id="update_last_name"onkeyup="capitalize(this.id, this.value);">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                   <label class="col-lg-2 control-label">Parent Birth Date</label>
                                    <div class="col-lg-3">
                                        <input type="text" readonly=""  name="parent_DOB" class="form-control datepicker" value="<?=$key['parent_DOB']?>">
                                    </div>
                             
                                    <label class="col-lg-2 control-label">Gender</label>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <?php if($key['parent_gender'] == "Male"){ ?>
                                                <input type="radio" name="parent_gender" value="male" checked=""> Male
                                                <?php } ?>
                                                 <?php if($key['parent_gender'] != "Male"){ ?>
                                                <input type="radio" name="parent_gender" value="male" > Male
                                                <?php } ?>
                                            </div>
                                            <div class="col-sm-4">
                                                <?php if($key['parent_gender'] == "Female"){ ?>
                                                <input type="radio" name="parent_gender" value="female" checked=""> Female
                                                <?php } ?>
                                                 <?php if($key['parent_gender'] != "Female"){ ?>
                                                <input type="radio" name="parent_gender" value="female" > Female
                                                <?php } ?>
                                            </div>
                                          
                                            <div class="col-sm-4">
                                                <?php if($key['parent_gender'] == "Other"){ ?>
                                                <input type="radio" name="parent_gender" value="other" checked=""> Other
                                                <?php } ?>
                                                <?php if($key['parent_gender'] != "Other"){ ?>
                                                <input type="radio" name="parent_gender" value="other" > Other
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Parent Mobile No.</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control mobile"  name="parent_mobile_number" value="<?=$key['parent_mobile_number']?>">
                                    </div>
                                    <label class="col-sm-2 control-label">Parent Email ID.</label>
                                    <div class="col-sm-3">
                                        <input type="email" class="form-control email_id"  name="parent_email_id" value="<?=$key['parent_email_id']?>">
                                     </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Qualification</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control mobile"  name="parent_qualification" value="<?=$key['parent_qualification']?>" placeholder="Enter the Qualification.">
                                    </div>
                                    <label class="col-sm-2 control-label">Occupation</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control email_id"  name="parent_occupation" value="<?=$key['parent_occupation']?>" placeholder="Enter the Occupation." id="update_occu" onkeyup="capitalize(this.id, this.value);">
                                     </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">House No./Street Name/Landmark</label>
                                    <div class="col-lg-3">
                                         <input type="text" class="form-control " name="parent_house_no" value="<?=$key['parent_house_no']?>" placeholder="Enter the House No./Street Name/Landmark." id="update_house" onkeyup="capitalize(this.id, this.value);">
                                    </div>
                                    <label class="col-lg-2 control-label">Town</label>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control " name="parent_town" value="<?=$key['parent_town']?>" placeholder="Enter the Home Town" id="update_parent_town"onkeyup="capitalize(this.id, this.value);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Taluka</label>
                                    <div class="col-lg-3">
                                         <input type="text" class="form-control " name="parent_tal" value="<?=$key['parent_tal']?>" placeholder="Enter the taluka." id="update_parent_tal"onkeyup="capitalize(this.id, this.value);">
                                    </div>
                                    <label class="col-lg-2 control-label">District</label>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control " name="parent_dist" value="<?=$key['parent_dist']?>" placeholder="Enter the District." id="update_parent_dist"onkeyup="capitalize(this.id, this.value);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">State</label>
                                    <div class="col-lg-3">
                                        <select class="form-control " name="parent_state">
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
                                        <input type="text" class="form-control " name="parent_pincode" value="<?=$key['parent_pincode']?>" placeholder="Enter the Pin Code.">
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="col-sm-2 control-label">Student Photo</label>
                                    <div class="col-sm-3">
                                        <input type="file" placeholder="placeholder" name="student_photo" class="form-control" accept="image/jpeg, image/png, image/gif" style="border:none;">
                                    </div>
                                </div> -->
                               
                                 <div class="hr-line-dashed"></div>
    
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                         <a href="<?=site_url('Student/view_student')?>"><span class="btn btn-white">Cancel</span></a>
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>