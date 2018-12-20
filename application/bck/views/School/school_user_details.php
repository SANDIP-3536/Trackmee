        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-offset-1 col-md-3" style="padding-right:0px !important;">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="background: #2f4050;">
                        <div class="row" style="padding-bottom:1%;padding:1%;">
                            <div class="col-lg-10">
                                <h5  style="color: #fff;">School Logo </h5>
                            </div>
                            <div class="col-lg-1">
                                <span class="btn btn-xs btn-white edit_profile"><i class="fa fa-pencil" title="Edit School Photo"></i> </span>
                                <span class="btn btn-xs btn-white close_edit_profile"><i class="fa fa-times"></i> </span>
                            </div>
                        </div> 
                        <div class="ibox-content no-padding border-left-right" >
                            <center> 
                            <?php foreach ($school as $key) {?>
                            <div class="img-wrapper">
                                <img alt="School Photo" class="img-responsive" src="<?=$key['school_logo']?>" style="width: 50%;padding: 15px;">
                            </div>
                            <div class="ibox-content profile_hide">
                                <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addSchool_logo" action="<?=site_url('School/update_school_logo')?>">
                                    <div class="form-group hidden">
                                        <div class="col-lg-3">
                                            <input type="text" name="school_profile_id" class="form-control" value="<?=$key['school_profile_id']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-12 col-sm-offset-1 control-label" style="text-align:left">School Logo :</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="file" placeholder="placeholder" name="school_logo" class="form-control" accept="file/jpg,file/png,file/jpeg" style="border:none;">
                                        </div>
                                        <div class="col-lg-1">
                                            <button class="btn btn-xs btn-primary" type="submit">Upload</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php } ?>
                            </center>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-7" style="padding-left:0px !important;">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h5 style="color: #fff;">School Details</h5>
                                </div>   
                                <div class="col-lg-4" style="text-align:right;">
                                <?php foreach ($school as $key) {?>
                                    <?php if ($key['school_expiry_date'] == '9999-12-31') { ?>
                                       <a href="<?=site_url('School/update_school_details/') .$key['school_profile_id']?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit School Details"></i></span></a>
                                        <a href="<?=site_url('School/school_deactive/') .$key['school_profile_id']?>"><span class="btn btn-xs btn-danger"><i class="fa fa-ban" aria-hidden="true" title="School Deactivate"></i></span></a>
                                       <?php } ?>
                                       <?php if ($key['school_expiry_date'] != '9999-12-31') { ?>
                                       <a href="<?=site_url('School/school_active/') .$key['school_profile_id']?>"><span class="btn btn-xs btn-success"><i class="fa fa-ban" aria-hidden="true" title="School Activate"></i></span></a>
                                       <?php } ?>
                                <?php } ?>
                                </div>            
                            </div>
                        </div>
                        <div class="ibox-content">
                            <?php foreach ($school as $key) {?>
                            <div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;">
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong>Name</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-5"><?=ucfirst($key['school_name'])?></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;">
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong>Address</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3"><?=$key['school_address']?> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong>Mobile No.</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3"> <?=$key['school_mobile_number']?></div>
                                                <div class="col-sm-2"> <strong>Phone No.</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3"> <?=$key['school_phone_number']?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong>Email ID</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3"> <?=$key['school_email_id']?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong>Latitude</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3"> <?=$key['school_latitude']?></div>
                                                 <div class="col-sm-2"> <strong>Lognitude</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3"> <?=$key['school_longitude']?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if($key['institute_tracking'] == 1 || $key['institute_stop_sms'] == 1) {?>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <?php if($key['institute_tracking'] == 1) {?>
                                                <div class="col-sm-2"> <strong>Tracking System</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3">
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
                                                <?php }?>
                                                <?php if($key['institute_stop_sms'] == 1) {?>
                                                <div class="col-sm-2"> <strong>Stop SMS</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3">
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
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if($key['institute_CRM'] == 1 || $key['institute_school_sms'] == 1) {?>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <?php if($key['institute_CRM'] == 1) {?>
                                                <div class="col-sm-2"> <strong>CRM System</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3">
                                                    <?php if($key['school_CRM'] == 1) {?>
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
                                                
                                                <?php if($key['institute_school_sms'] == 1) {?>
                                                <div class="col-sm-2"> <strong>School SMS</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3"> 
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
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <?php if($key['institute_school_sms'] == 1) {?>
                                                <div class="col-sm-2"> <strong>Student Absent</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3">
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
                                                <?php } ?>
                                                
                                                <?php if($key['institute_school_sms'] == 1) {?>
                                                <div class="col-sm-2"> <strong>Student Birthday SMS</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3"> 
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
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <?php if($key['institute_school_sms'] == 1) {?>
                                                <div class="col-sm-2"> <strong>Employee Salary</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3">
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
                                                <?php } ?>
                                                
                                                <?php if($key['institute_school_sms'] == 1) {?>
                                                <div class="col-sm-2"> <strong>Student Fee Remainder</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3"> 
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
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <?php if($key['institute_school_sms'] == 1) {?>
                                                <div class="col-sm-2"> <strong>Authentication Details</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3">
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
                                                
                                                <?php if($key['institute_school_sms'] == 1) {?>
                                                <div class="col-sm-2"> <strong>Parent Birthday</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3"> 
                                                    <?php if($key['school_parent_birth_sms'] == 1) {?>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <?php if($key['institute_school_sms'] == 1) {?>
                                                <div class="col-sm-2"> <strong>Employee Birthday</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3"> 
                                                    <?php if($key['school_employee_birth_sms'] == 1) {?>
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
                                                <?php if($key['institute_school_sms'] == 1) {?>
                                                <div class="col-sm-2"> <strong>Homework</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3">
                                                    <?php if($key['school_homework_sms'] == 1) {?>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <?php if($key['institute_school_sms'] == 1) {?>
                                                <div class="col-sm-2"> <strong>Parent Meet</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3"> 
                                                    <?php if($key['school_parentmeet_sms'] == 1) {?>
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
                                                <?php if($key['institute_school_sms'] == 1) {?>
                                                <div class="col-sm-2"> <strong>News Feed</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3">
                                                    <?php if($key['school_newsfeed_sms'] == 1) {?>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <?php if($key['institute_school_sms'] == 1) {?>
                                                <div class="col-sm-2"> <strong>Circular</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3"> 
                                                    <?php if($key['school_circular_sms'] == 1) {?>
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
                                                <?php if($key['institute_school_sms'] == 1) {?>
                                                <div class="col-sm-2"> <strong>Event</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3">
                                                    <?php if($key['school_event_sms'] == 1) {?>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <?php if($key['institute_school_sms'] == 1) {?>
                                                <div class="col-sm-2"> <strong>Holiday</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3"> 
                                                    <?php if($key['school_holiday_sms'] == 1) {?>
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
                                        </div>
                                    </div>
                                </div>
                            <?php } } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($key['school_expiry_date'] == '9999-12-31') { ?>
            <div class="row">
                <div class="col-sm-offset-1 col-sm-10">
                    <div class="ibox-title">
                        <div id="user">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addSchool"  action="<?=site_url('School/add_school_user')?>">
                                <div class="form-group" hidden="">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control school_profile" name="school_profile_id" value="<?=$key['school_profile_id']?>">
                                    </div>
                                </div>
                                <div class="form-group" hidden="">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="school_name" value="<?=$key['school_name']?>">
                                    </div>
                                </div>
                                <div class="delete_user" hidden="">
                                    <div class="ibox-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3><b>Employee Registration</b></h3>
                                            </div>
                                            <div class="ibox-tools">
                                                <span class="btn btn-xs btn-primary hide_user">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Employee <span style="color:red;">*</span></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="employee_type" readonly>
                                                <?php if($admin_count == 0) {?>
                                                    <option value="3">Admin</option>
                                                <?php }if($principal_count == 0) { ?>
                                                    <option value="4">Principal</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Name <span style="color:red;">*</span></label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-4" style="padding:0px;">
                                                <input type="text" class="form-control" name="employee_first_name" placeholder="First Name" id="employee_school_first" onkeyup="capitalize(this.id, this.value);">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="employee_middle_name" placeholder="Middle Name" id="employee_school_middle" onkeyup="capitalize(this.id, this.value);">
                                            </div>
                                            <div class="col-sm-4" style="padding:0px;">
                                                <input type="text" class="form-control" name="employee_last_name" placeholder="Last Name" id="employee_school_last" onkeyup="capitalize(this.id, this.value);">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Mobile Number <span style="color:red;">*</span></label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control mobile" id="mobile" name="employee_pri_mobile_number" placeholder="Employee Mobile Number">
                                            <label class="mobile_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                        </div>
                                        <label class="col-lg-2 control-label">Email ID <span style="color:red;">*</span></label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control email_id" id="email_id" name="employee_email_id" placeholder="Employee Email ID">
                                            <label class="email_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Employee Photo</label>
                                        <div class="col-sm-3" style="padding:0px;">
                                            <input type="file" placeholder="placeholder" name="employee_photo" class="form-control photo" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                        </div> 
                                        <label class="col-lg-2 control-label">Gender <span style="color:red;">*</span></label>
                                        <div class="col-lg-4">
                                            <label class="radio-inline"> 
                                                <input type="radio" name="employee_gender" value="male">&nbsp  Male 
                                            </label> 
                                            <label class="radio-inline">
                                                <input type="radio" name="employee_gender" value="female">  &nbsp Female
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="employee_gender" value="other">  &nbsp Other
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Employee Address <span style="color:red;">*</span></label>   
                                        <div class="col-sm-3">
                                            <input type="textarea" class="form-control" placeholder="Employee Address" name="employee_address"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Institute Address'" >
                                        </div>
                                        <label class="col-lg-2 control-label">Birth Date <span style="color:red;">*</span></label>
                                        <div class="col-lg-3">
                                            <input type="text" readonly="" placeholder="Employee Birth Date" name="employee_DOB" class="form-control datepicker">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Education</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="employee_higher_education" placeholder="Employee Higher Education">
                                        </div>
                                        <label class="col-sm-2 control-label">Experience</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="employee_experiance" placeholder="Employee Total Experience In Years">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <span class="btn btn-white hide_user">Cancel</span>
                                            <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>                           
                            </form> 
                        </div>
                    </div>
                </div>
                <div class="col-sm-offset-1 col-sm-10">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="ibox-title">
                                    <div class="row"  style="border-bottom: 1px solid #e7eaec;">
                                        <div class="col-sm-6">
                                            <h3><b>School Admin</b></h3>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="ibox-tools">
                                                <?php if($admin_count == 0) {?>
                                                    <span class="btn btn-xs btn-primary hide_user">
                                                        <i class="fa fa-plus-square" aria-hidden="true"></i></i>
                                                    </span>
                                                <?php } ?>
                                                <?php foreach ($school_user as $key1) {?>
                                                    <?php  if($admin_count != 0) { ?>
                                                        <a href="<?=site_url('School/disable_school_user/' .$key1['employee_profile_id'])?>"><span class="btn btn-xs btn-primary">
                                                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </span>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                            <div class="col-sm-6">
                                <div class="ibox-title">
                                    <div class="row"  style="border-bottom: 1px solid #e7eaec;">
                                        <div class="col-sm-6">
                                            <h3><b>School Principal</b></h3>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="ibox-tools">
                                                <?php if($principle_count == 0) {?>
                                                    <span class="btn btn-xs btn-primary hide_user">
                                                        <i class="fa fa-plus-square" aria-hidden="true"></i></i>
                                                    </span>
                                                <?php } ?>
                                                <?php foreach ($school_principle as $key1) { ?>
                                                    <?php  if($principle_count != 0) { ?>
                                                        <a href="<?=site_url('School/disable_school_user/' .$key1['employee_profile_id'])?>"><span class="btn btn-xs btn-primary">
                                                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </span>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <?php foreach ($school_user as $key1) {?>
                                <div class="col-sm-4">
                                    <center>
                                    <div class="form-group">
                                        <a href="<?=site_url('Authentication/direct_school_entry/') .$key1['employee_profile_id'] ?>"><img src="<?=$key1['employee_photo']?>" class="img-circle" height="100" width="100" alt="No Image Found" style="border:1px solid #000;padding: 10px;background-color: rgba(128, 128, 128, 0.11);border-top: 2px solid black;"></a>
                                        <div class="col-lg-12" style="padding-top: 08px; color:#000;">
                                            <span><h3><?=$key1['employee_first_name']?>&nbsp<?=$key1['employee_middle_name']?>&nbsp<?=$key1['employee_last_name']?></h3></span>
                                            <span><h3>  Admin   </h3></span>
                                        </div>
                                    </div>
                                    </center>
                                </div>
                                <div class="col-sm-offset-1 col-sm-7">
                                    <div class="feed-activity-list">
                                        <div class="feed-element" style="padding-top: 15px;">
                                            <div class="media-body ">
                                                <div class="form-group">
                                                    <div class="col-sm-4"> <strong>Mobile No</strong></div>
                                                    <div class="col-sm-1"> <strong>:</strong></div>
                                                    <div class="col-sm-5"><?=ucfirst($key1['employee_pri_mobile_number'])?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="feed-activity-list">
                                        <div class="feed-element" style="padding-top: 15px;">
                                            <div class="media-body ">
                                                <div class="form-group">
                                                    <div class="col-sm-3"> <strong>Email</strong></div>
                                                    <div class="col-sm-1"> <strong>:</strong></div>
                                                    <div class="col-sm-5"><?=ucfirst($key1['employee_email_id'])?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="feed-activity-list">
                                        <div class="feed-element" style="padding-top: 15px;">
                                            <div class="media-body ">
                                                <div class="form-group">
                                                    <div class="col-sm-4"> <strong>Qualification</strong></div>
                                                    <div class="col-sm-1"> <strong>:</strong></div>
                                                    <div class="col-sm-5"><?=ucfirst($key1['employee_higher_education'])?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6">
                                <?php foreach ($school_principle as $key1) {?>
                                 <div class="col-sm-offset-1 col-sm-7">
                                    <div class="feed-activity-list">
                                        <div class="feed-element" style="padding-top: 15px;">
                                            <div class="media-body ">
                                                <div class="form-group">
                                                    <div class="col-sm-4"> <strong>Mobile No</strong></div>
                                                    <div class="col-sm-1"> <strong>:</strong></div>
                                                    <div class="col-sm-5"><?=ucfirst($key1['employee_pri_mobile_number'])?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="feed-activity-list">
                                        <div class="feed-element" style="padding-top: 15px;">
                                            <div class="media-body ">
                                                <div class="form-group">
                                                    <div class="col-sm-3"> <strong>Email</strong></div>
                                                    <div class="col-sm-1"> <strong>:</strong></div>
                                                    <div class="col-sm-5"><?=ucfirst($key1['employee_email_id'])?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="feed-activity-list">
                                        <div class="feed-element" style="padding-top: 15px;">
                                            <div class="media-body ">
                                                <div class="form-group">
                                                    <div class="col-sm-4"> <strong>Qualification</strong></div>
                                                    <div class="col-sm-1"> <strong>:</strong></div>
                                                    <div class="col-sm-5"><?=ucfirst($key1['employee_higher_education'])?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <center>
                                    <div class="form-group">
                                        <a href="<?=site_url('Authentication/direct_school_entry/') .$key1['employee_profile_id'] ?>"><img src="<?=$key1['employee_photo']?>" class="img-circle" height="100" width="100" alt="No Image Found" style="border:1px solid #000;padding: 10px;background-color: rgba(128, 128, 128, 0.11);border-top: 2px solid black;"></a>
                                        <div class="col-lg-12" style="padding-top: 08px; color:#000;">
                                            <span><h3><?=$key1['employee_first_name']?>&nbsp<?=$key1['employee_middle_name']?>&nbsp<?=$key1['employee_last_name']?></h3></span>
                                            <span><h3> Principal   </h3></span>
                                        </div>
                                    </div>
                                    </center>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div>
            <?php } ?>
        </div>