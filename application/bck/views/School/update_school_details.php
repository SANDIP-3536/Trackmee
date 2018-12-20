        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Update School Indormation</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addSchool" action="<?=site_url('School/update_details_school')?>">
                                <?php foreach ($schooll as $key) { ?>
                                    <div class="form-group" hidden="">
                                        <label class="col-lg-2 control-label">School profile ID</label>
                                        <div class="col-lg-3">
                                            <input type="text" placeholder="School Name" name="school_profile_id" class="form-control" value="<?=$key['school_profile_id']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">School Name <span style="color:red;">*</span></label>
                                        <div class="col-lg-3">
                                            <input type="text" placeholder="School Name" name="school_name" class="form-control" value="<?=$key['school_name']?>">
                                        </div>
                                        <label class="col-lg-2 control-label">School Email ID.</label>
                                        <div class="col-lg-3">
                                           <input type="text" placeholder="School Email ID" name="school_email_id" class="form-control" value="<?=$key['school_email_id']?>">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">School Mobile Number</label>
                                        <div class="col-lg-3">
                                            <input type="text" placeholder="School Mobile Number" name="school_mobile_number" class="form-control" value="<?=$key['school_mobile_number']?>">
                                        </div>
                                        <label class="col-lg-2 control-label">School Phone Number <span style="color:red;">*</span></label>
                                        <div class="col-lg-3">
                                            <input type="text" placeholder="School Phone Number" name="school_phone_number" class="form-control" value="<?=$key['school_phone_number']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">School Latitude</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="school_latitude" placeholder="School Latitude" value="<?=$key['school_latitude']?>">
                                        </div>
                                        <label class="col-lg-2 control-label">School Longitude</label>
                                        <div class="col-lg-3">
                                            <input type="text" placeholder="School Longitude" name="school_longitude" class="form-control" value="<?=$key['school_longitude']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">School Address <span style="color:red;">*</span></label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="school_address" placeholder="School Address" value="<?=$key['school_address']?>">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group update_functionality">
                                        <label class="col-lg-2 control-label">Website</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="school_website" placeholder="School Website">
                                        </div>
                                        <label class="col-lg-2 control-label">Watermark</label>
                                        <div class="col-lg-3">
                                            <input type="file" placeholder="" name="school_watermark" class="form-control" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                        </div>
                                    </div>
                                    <div class="form-group update_functionality">
                                        <label class="col-lg-2 control-label">Report Header</label>
                                        <div class="col-lg-3">
                                            <input type="file" placeholder="" name="school_report_header" class="form-control" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                        </div>
                                        <label class="col-lg-2 control-label">Report Footer</label>
                                        <div class="col-lg-3">
                                            <input type="file" placeholder="" name="school_report_footer" class="form-control" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                        </div>
                                    </div>
                                    <div class="form-group update_functionality">
                                        <label class="col-lg-2 control-label">Leaving Certificate Header</label>
                                        <div class="col-lg-3">
                                            <input type="file" placeholder="" name="school_leaving_certificate_header" class="form-control" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                        </div>
                                        <label class="col-lg-2 control-label">Leaving Certificate Footer</label>
                                        <div class="col-lg-3">
                                            <input type="file" placeholder="" name="school_leaving_certificate_footer" class="form-control" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                        </div>
                                    </div>
                                    <div class="form-group update_functionality">
                                        <label class="col-lg-2 control-label">Bonafied Certificate Header</label>
                                        <div class="col-lg-3">
                                            <input type="file" placeholder="" name="school_bonafied_certificate_header" class="form-control" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                        </div>
                                        <label class="col-lg-2 control-label">Bonafied Certificate Footer</label>
                                        <div class="col-lg-3">
                                            <input type="file" placeholder="" name="school_bonafied_certificate_footer" class="form-control" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                        </div>
                                    </div> -->
                                    <div class="form-group functionality">
                                        <?php if($key['institute_tracking'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Tracking System <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['school_tracking'] == 1) {?>
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
                                        <?php } if($key['institute_stop_sms'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Stop SMS <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['school_stop_sms'] == 1) {?>
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
                                        <?php } if($key['institute_CRM'] == 1){ ?>
                                        <label class="col-sm-2 control-label">CRM System <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['school_CRM'] == 1) {?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" checked disabled class="onoffswitch-checkbox" id="example31">
                                                    <label class="onoffswitch-label" for="example31">
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
                                        <?php } ?>
                                    </div>
                                    <div class="form-group functionality">
                                        <?php if($key['institute_school_sms'] == 1){ ?>
                                        <label class="col-sm-2 control-label">School SMS <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['school_school_sms'] == 1) {?>
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
                                        <?php } if($key['institute_school_sms'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Absent SMS <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['school_student_absent_sms'] == 1) {?>
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
                                        <?php } if($key['institute_school_sms'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Birthday SMS <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['school_student_birth_sms'] == 1) {?>
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
                                        <?php } ?>
                                    </div>
                                    <div class="form-group functionality">
                                        <?php if($key['institute_school_sms'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Salary SMS <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['school_employee_salary_sms'] == 1) {?>
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
                                        <?php } if($key['institute_school_sms'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Fee Remainder SMS <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['school_student_fee_remainder_sms'] == 1) {?>
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
                                        <?php } if($key['institute_school_sms'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Authentication SMS <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['school_authentication_details_sms'] == 1) {?>
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
                                        <?php } ?>
                                    </div>
                                    <div class="form-group update_functionality">
                                        <?php if($key['institute_tracking'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Tracking System <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['school_tracking'] == 1) {?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" checked class="onoffswitch-checkbox" name="school_tracking" id="example1">
                                                    <label class="onoffswitch-label" for="example1">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php }else{?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" class="onoffswitch-checkbox" name="school_tracking" id="example2">
                                                    <label class="onoffswitch-label" for="example2">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php } if($key['institute_stop_sms'] == 1){ ?>
                                        <label class="col-sm-2 control-label">CRM System <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['school_CRM'] == 1) {?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" checked class="onoffswitch-checkbox" name="school_CRM" id="example111">
                                                    <label class="onoffswitch-label" for="example111">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php }else{?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" class="onoffswitch-checkbox" name="school_CRM" id="example222">
                                                    <label class="onoffswitch-label" for="example222">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php } if($key['institute_CRM'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Stop SMS <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['school_stop_sms'] == 1) {?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" checked class="onoffswitch-checkbox" name="school_stop_sms" id="example10">
                                                    <label class="onoffswitch-label" for="example10">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php }else{?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" class="onoffswitch-checkbox" name="school_stop_sms" id="example12">
                                                    <label class="onoffswitch-label" for="example12">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <?php } ?>
                                    <div class="form-group update_functionality">
                                        <?php if($key['institute_school_sms'] == 1){ ?>
                                        <label class="col-sm-2 control-label">School SMS <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['school_school_sms'] == 1) {?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" checked class="onoffswitch-checkbox" name="school_school_sms" id="example5">
                                                    <label class="onoffswitch-label" for="example5">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php }else{?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" class="onoffswitch-checkbox" name="school_school_sms" id="example6">
                                                    <label class="onoffswitch-label" for="example6">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php } if($key['institute_school_sms'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Absent SMS <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['school_student_absent_sms'] == 1) {?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" checked class="onoffswitch-checkbox" name="school_student_absent_sms" id="example31">
                                                    <label class="onoffswitch-label" for="example31">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php }else{?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" class="onoffswitch-checkbox" name="school_student_absent_sms" id="example32">
                                                    <label class="onoffswitch-label" for="example32">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php } if($key['institute_school_sms'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Birthday SMS <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['school_student_birth_sms'] == 1) {?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" checked class="onoffswitch-checkbox" name="school_student_birth_sms" id="example41">
                                                    <label class="onoffswitch-label" for="example41">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php }else{?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" class="onoffswitch-checkbox" name="school_student_birth_sms" id="example42">
                                                    <label class="onoffswitch-label" for="example42">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php } ?>
                                    </div>
                                     <div class="form-group update_functionality">
                                        <?php if($key['institute_school_sms'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Salary SMS <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['school_employee_salary_sms'] == 1) {?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" checked class="onoffswitch-checkbox" name="school_employee_salary_sms" id="example51">
                                                    <label class="onoffswitch-label" for="example51">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php }else{?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" class="onoffswitch-checkbox" name="school_employee_salary_sms" id="example52">
                                                    <label class="onoffswitch-label" for="example52">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php } if($key['institute_school_sms'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Fee Remainder SMS <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['school_student_fee_remainder_sms'] == 1) {?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" checked class="onoffswitch-checkbox" name="school_student_fee_remainder_sms" id="example61">
                                                    <label class="onoffswitch-label" for="example61">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php }else{?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" class="onoffswitch-checkbox" name="school_student_fee_remainder_sms" id="example62">
                                                    <label class="onoffswitch-label" for="example62">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php } if($key['institute_school_sms'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Authentication SMS <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['school_authentication_details_sms'] == 1) {?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" checked class="onoffswitch-checkbox" name="school_authentication_details_sms" id="example71">
                                                    <label class="onoffswitch-label" for="example71">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php }else{?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" class="onoffswitch-checkbox" name="school_authentication_details_sms" id="example72">
                                                    <label class="onoffswitch-label" for="example72">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-6 col-sm-offset-2">
                                            <a href="<?=site_url('School/school_user_details/') .$key['school_profile_id']?>"><span class="btn btn-white">Cancel</span></a>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                            <span class="btn btn-primary edit_functionality">Edit Functionality</span>
                                        </div>
                                    </div>
                                </form>
                               </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>