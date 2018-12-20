        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Add School</b></h3>
                                </div>
                                <div class="col-sm-6">
                                    <div class="ibox-tools">
                                        <a href="<?=site_url('School/view_school')?>"><button class="btn btn-xs btn-primary">View School</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addSchool" action="<?=site_url('School/add_school_registration')?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Name <span style="color:red;">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="School Name" name="school_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Address <span style="color:red;">*</span></label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="school_address" placeholder="School Address" rows="3" cols="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Logo <span style="color:red;">*</span></label>
                                        <div class="col-lg-10 col-lg-offset-1">
                                            <input type="file" placeholder="" name="school_logo" class="form-control" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-sm-offset-1" style="padding-top: 6px;">
                                        <span style="color:red;"><b>Only .jpg|.jpeg|.png File types are allowed</b></span>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Email ID.</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="School Email ID" name="school_email_id" class="form-control">
                                    </div>
                                    <label class="col-lg-2 control-label">Acadmic Year<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <select name="school_AY_id" class="form-control">
                                            <option value="0">Select Year</option>
                                            <?php foreach ($acadmic_year as $key) { ?>
                                                <option value="<?=$key['AY_id']?>"><?=$key['AY_name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Mobile Number</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="School Mobile Number" name="school_mobile_number" class="form-control">
                                    </div>
                                    <label class="col-lg-2 control-label">Phone Number <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="School Phone Number" name="school_phone_number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Latitude</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="school_latitude" placeholder="School Latitude">
                                    </div>
                                    <label class="col-lg-2 control-label">Longitude</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="School Longitude" name="school_longitude" class="form-control">
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="col-lg-2 control-label">Website</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="school_website" placeholder="School Website">
                                    </div>
                                    <label class="col-lg-2 control-label">Watermark</label>
                                    <div class="col-lg-3">
                                        <input type="file" placeholder="" name="school_watermark" class="form-control" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Report Header</label>
                                    <div class="col-lg-3">
                                        <input type="file" placeholder="" name="school_report_header" class="form-control" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                    </div>
                                    <label class="col-lg-2 control-label">Report Footer</label>
                                    <div class="col-lg-3">
                                        <input type="file" placeholder="" name="school_report_footer" class="form-control" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Leaving Certificate Header</label>
                                    <div class="col-lg-3">
                                        <input type="file" placeholder="" name="school_leaving_certificate_header" class="form-control" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                    </div>
                                    <label class="col-lg-2 control-label">Leaving Certificate Footer</label>
                                    <div class="col-lg-3">
                                        <input type="file" placeholder="" name="school_leaving_certificate_footer" class="form-control" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Bonafied Certificate Header</label>
                                    <div class="col-lg-3">
                                        <input type="file" placeholder="" name="school_bonafied_certificate_header" class="form-control" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                    </div>
                                    <label class="col-lg-2 control-label">Bonafied Certificate Footer</label>
                                    <div class="col-lg-3">
                                        <input type="file" placeholder="" name="school_bonafied_certificate_footer" class="form-control" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <?php if($tracking == 1){?>
                                    <label class="col-sm-2 control-label">Tracking System <span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="school_tracking" id="example1">
                                                <label class="onoffswitch-label" for="example1">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 control-label">Stop SMS <span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="school_stop_sms" id="example3">
                                                <label class="onoffswitch-label" for="example3">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php if($CRM == 1){ ?>
                                    <label class="col-sm-2 control-label">CRM System <span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox"  class="onoffswitch-checkbox" name="school_CRM" id="example2">
                                                <label class="onoffswitch-label" for="example2">
                                                    <span class="onoffswitch-switch"></span>
                                                    <span class="onoffswitch-inner"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php if($CRM == 1){ ?>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">School SMS <span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="school_school_sms" id="example4">
                                                <label class="onoffswitch-label" for="example4">
                                                    <span class="onoffswitch-switch"></span>
                                                    <span class="onoffswitch-inner"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 control-label"> Student Absent SMS <span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="school_student_absent_sms" id="example5">
                                                <label class="onoffswitch-label" for="example5">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 control-label"> Student Birth SMS <span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="school_student_birth_sms" id="example6">
                                                <label class="onoffswitch-label" for="example6">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Employee Salary SMS <span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="school_employee_salary_sms" id="example7">
                                                <label class="onoffswitch-label" for="example7">
                                                    <span class="onoffswitch-switch"></span>
                                                    <span class="onoffswitch-inner"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 control-label"> Student Fee Remainder SMS <span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="school_student_fee_remainder_sms" id="example8">
                                                <label class="onoffswitch-label" for="example8">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 control-label"> Authentication Details SMS <span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="school_authentication_details_sms" id="example9">
                                                <label class="onoffswitch-label" for="example9">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="<?=site_url('School/view_school')?>"><span class="btn btn-white">Cancel</span></a>
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>