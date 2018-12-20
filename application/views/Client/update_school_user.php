<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title view">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3><b>School Employee Details</b></h3>
                        </div>
                        <?php foreach ($school_user as $key) {?>
                        <div class="col-sm-6" style="text-align: right;">
                            <?php if ($key['employee_expiry_date'] == '9999-12-31') { ?>
                            <a href="<?=site_url('School/disable_school_user/') .$key['employee_profile_id']?>"><button class="btn btn-xs btn-danger">Deactivate</button></a>
                            <?php } ?>
                            <?php if ($key['employee_expiry_date'] != '9999-12-31') { ?>
                            <a href="<?=site_url('School/enable_school_user/') .$key['employee_profile_id']?>"><button class="btn btn-xs btn-success">Activate</button></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="ibox-content view">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addSchool" action="<?=site_url('School/update_details_school')?>">
                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-1">
                                <center>
                                    <div class="col-lg-12" hidden="">
                                        <input type="text" placeholder="School Name" name="school_name" class="form-control" value="<?=$key['employee_profile_id']?>">
                                    </div>
                                    <div class="form-group">
                                        <img src="<?=$key['employee_photo']?>" height="150" width="200" alt="No Image Found" style="border:1px solid #000;padding: 20px;background-color: rgba(128, 128, 128, 0.11);border-top: 3px solid black;">
                                       
                                        <div class="col-lg-12" style="padding-top: 10px; color:#67C6F1;">
                                         <span><h3><?=$key['employee_first_name']?> <?=$key['employee_middle_name']?> <?=$key['employee_last_name']?> </h3></span>
                                     </div>
                                 </div>
                                    </center>
                             </div>
                              <div class="col-sm-7">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Address </label>
                                    <div class="col-lg-6" style="padding-top: 08px; color:#67C6F1;">
                                        <span><b><?=$key['employee_address']?></b></span>
                                    </div>
                                </div>
                            </div>
                             <div class="col-sm-7">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Email </label>
                                    <div class="col-lg-3" style="padding-top: 08px; color:#67C6F1;">
                                        <span><b><?=$key['employee_email_id']?></b></span>
                                    </div>
                                    <label class="col-lg-3 control-label">Mobile Number </label>
                                    <div class="col-lg-3" style="padding-top: 08px; color:#67C6F1;">
                                        <span><b><?=$key['employee_pri_mobile_number']?></b></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Gender </label>
                                    <div class="col-lg-3" style="padding-top: 08px; color:#67C6F1;">
                                        <span><b><?=$key['employee_gender']?></b></span>
                                    </div>
                                    <label class="col-lg-3 control-label">Date Of Birth </label>
                                    <div class="col-lg-3" style="padding-top: 08px; color:#67C6F1;">
                                        <span><b><?=$key['employee_DOB']?></b></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Experiance </label>
                                    <div class="col-lg-3" style="padding-top: 08px; color:#67C6F1;">
                                        <span><b><?=$key['employee_experiance']?></b></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>  
                </div>  
                <div class="ibox-title update">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3><b>Update Institude Indormation</b></h3>
                        </div>
                    </div>
                </div>
                <div class="ibox-content update">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addInstitude" action="<?=site_url('School/update_employee_details')?>">
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
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Employee Email ID.</label>
                            <div class="col-lg-3">
                                <input type="text" placeholder="Employee Email ID" name="employee_email_id" class="form-control" value="<?=$key['employee_email_id']?>">
                            </div>
                            <label class="col-lg-2 control-label">Employee Mobile Number</label>
                            <div class="col-lg-3">
                                <input type="text" placeholder="Employee Mobile Number" name="employee_pri_mobile_number" class="form-control" value="<?=$key['employee_pri_mobile_number']?>">
                            </div>
                        </div>
                        <?php } ?>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-white" type="reset">Cancel</button>
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>