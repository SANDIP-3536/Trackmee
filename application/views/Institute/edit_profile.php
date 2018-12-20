        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Edit Profile</b></h3>
                                </div>
                            </div>
                        </div>
                     <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addInstitute" action="<?=site_url('Institute/update_user_details')?>">
                            <?php foreach($user_details as $key) { ?>
                                <div class="form-group" hidden="">
                                    <label class="col-lg-2 control-label">Employee profile ID</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Employee Name" name="employee_profile_id" class="form-control" value="<?=$key['employee_profile_id']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Employee Name</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Employee Name" name="employee_first_name" class="form-control" value="<?=$key['employee_first_name']?>">
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Employee Name" name="employee_middle_name" class="form-control" value="<?=$key['employee_middle_name']?>">
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Employee Name" name="employee_last_name" class="form-control" value="<?=$key['employee_last_name']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Email ID.</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Employee Email ID" name="employee_email_id" class="form-control" value="<?=$key['employee_email_id']?>">
                                    </div>
                                    <label class="col-lg-3 control-label">Mobile Number</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Employee Mobile Number" name="employee_pri_mobile_number" class="form-control" value="<?=$key['employee_pri_mobile_number']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Address</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Employee Email ID" name="employee_address" class="form-control" value="<?=$key['employee_address']?>">
                                    </div>
                                    <label class="col-lg-3 control-label">Education</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Employee Mobile Number" name="employee_higher_education" class="form-control" value="<?=$key['employee_higher_education']?>">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="reset">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </div>
                                <?php } ?>
                            </form>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>