        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>User Registration</b></h3>
                                </div>
                                <div class="col-sm-6">
                                    <div class="ibox-tools">
                                        <a href="<?=site_url('User/view_user')?>"><button class="btn btn-xs btn-primary">View User</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addUser" action="<?=site_url('User/add_user_registration')?>">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">User Name <span style="color:red;">*</span></label>
                                    <div class="col-sm-8">
                                         <div class="form-group">
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control employee_first_name" name="user_first_name" placeholder="First Name" id="employee_first_name" onkeyup="capitalize(this.id, this.value);">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="user_middle_name" placeholder="Middle Name" id="employee_middle_name" onkeyup="capitalize(this.id, this.value);">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="user_last_name" placeholder="Last Name" id="employee_last_name" onkeyup="capitalize(this.id, this.value);">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Birth Date <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" readonly="" Placeholder="User Birth Date" name="user_DOB" class="form-control datepicker">
                                    </div>
                                    <label class="col-lg-2 control-label">Gender <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <label class="radio-inline"> 
                                            <input type="radio" name="user_gender" value="male">&nbsp  Male 
                                        </label> 
                                        <label class="radio-inline">
                                            <input type="radio" name="user_gender" value="female">  &nbsp Female
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="user_gender" value="other">  &nbsp Other
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Address <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <textarea type="text" placeholder=" User Address" name="user_address" class="form-control"></textarea>
                                    </div>
                                    <label class="col-sm-2 control-label">Photo</label>
                                    <div class="col-sm-3">
                                        <input type="file" placeholder="placeholder" name="user_photo" class="form-control" accept="image/jpeg, image/png, image/gif" style="border:none;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Mobile No. <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control mobile" id="mobile" name="user_mobile_number" Placeholder="User Mobile No.">
                                        <label class="mobile_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                    </div>
                                    <label class="col-sm-2 control-label">Email ID. <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="email" class="form-control email_id" id="email_id" name="user_email_id" Placeholder="User Email Address">
                                        <label class="email_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php if ($institute_admin == 1) {?>
                                    <label class="col-sm-2 control-label">Client <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="user_client_profile_id">
                                            <option class="0">Select Client</option>
                                            <?php foreach ($client as $key) { ?>
                                                <option value="<?=$key['client_profile_id']?>"><?=$key['client_name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <?php } ?>
                                </div><br>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="<?=site_url('User/view_user')?>"><span class="btn btn-white" type="reset">Cancel</span></a>
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>