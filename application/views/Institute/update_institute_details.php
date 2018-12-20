        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Update Institute Indormation</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addInstitute" action="<?=site_url('Institute/update_details_institute')?>">
                                <?php foreach ($institute as $key) { ?>
                                <div class="form-group" hidden="">
                                    <label class="col-lg-2 control-label">profile ID</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Institute Name" name="institute_profile_id" class="form-control" value="<?=$key['institute_profile_id']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Name <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Institute Name" name="institute_name" class="form-control" value="<?=$key['institute_name']?>">
                                    </div>
                                    <label class="col-lg-2 control-label">Email ID.</label>
                                    <div class="col-lg-3">
                                     <input type="text" placeholder="Institute Email ID" name="institute_email_id" class="form-control" value="<?=$key['institute_email_id']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Mobile Number</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Institute Mobile Number" name="institute_mobile_number" class="form-control" value="<?=$key['institute_mobile_number']?>">
                                    </div>
                                    <label class="col-lg-2 control-label">Phone Number <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Institute Phone Number" name="institute_phone_number" class="form-control" value="<?=$key['institute_phone_number']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Address <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="institute_address" placeholder="Institute Address" value="<?=$key['institute_address']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Sender ID</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Institute Sender ID" name="institute_sender_id" class="form-control" value="<?=$key['institute_sender_id']?>" onkeyup="caps(this)">
                                    </div>
                                    <label class="col-lg-2 control-label">Signature</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Institute Signature" name="institute_signature" class="form-control" value="<?=$key['institute_signature']?>">
                                    </div>
                                </div>
                                <div class="form-group update_functionality">
                                    <label class="col-sm-2 control-label">Panic Notification<span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <?php if($key['institute_panic_notifi'] == 1) {?>
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" checked class="onoffswitch-checkbox" name="institute_panic_notifi" id="example1">
                                                <label class="onoffswitch-label" for="example1">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php }else{?>
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="institute_panic_notifi" id="example2">
                                                <label class="onoffswitch-label" for="example2">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <label class="col-sm-2 control-label">Stop SMS <span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <?php if($key['institute_stop_sms'] == 1) {?>
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" checked class="onoffswitch-checkbox" name="institute_stop_sms" id="example10">
                                                <label class="onoffswitch-label" for="example10">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php }else{?>
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="institute_stop_sms" id="example12">
                                                <label class="onoffswitch-label" for="example12">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <?php } ?>
                                    <label class="col-sm-2 control-label">School SMS <span style="color:red;">*</span></label>
                                    <div class="col-sm-2" style="padding:10px;">
                                        <?php if($key['institute_dest_sms'] == 1) {?>
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" checked class="onoffswitch-checkbox" name="institute_dest_sms" id="example5">
                                                <label class="onoffswitch-label" for="example5">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php }else{?>
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="institute_dest_sms" id="example6">
                                                <label class="onoffswitch-label" for="example6">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group update_functionality">
                                    <label class="col-sm-2 control-label">Authentication SMS<span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <?php if($key['institute_auth_sms'] == 1) {?>
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" checked class="onoffswitch-checkbox" name="institute_auth_sms" id="example12">
                                                <label class="onoffswitch-label" for="example12">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php }else{?>
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="institute_auth_sms" id="example22">
                                                <label class="onoffswitch-label" for="example22">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group functionality">
                                    <label class="col-sm-2 control-label">Panic Notification <span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <?php if($key['institute_panic_notifi'] == 1) {?>
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
                                    <label class="col-sm-2 control-label">Stop SMS <span style="color:red;">*</span></label>
                                    <div class="col-sm-2" style="padding:10px;">
                                        <?php if($key['institute_stop_sms'] == 1) {?>
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
                                                <input type="checkbox" disabled class="onoffswitch-checkbox" id="example41">
                                                <label class="onoffswitch-label" for="example41">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <label class="col-sm-2 control-label">Destination SMS <span style="color:red;">*</span></label>
                                    <div class="col-sm-2" style="padding:10px;">
                                        <?php if($key['institute_dest_sms'] == 1) {?>
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" checked disabled class="onoffswitch-checkbox" id="example32">
                                                <label class="onoffswitch-label" for="example32">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php }else{?>
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" disabled class="onoffswitch-checkbox" id="example42">
                                                <label class="onoffswitch-label" for="example42">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group functionality">
                                    <label class="col-sm-2 control-label">Authentication SMS<span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <?php if($key['institute_auth_sms'] == 1) {?>
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" checked disabled class="onoffswitch-checkbox" id="example23">
                                                <label class="onoffswitch-label" for="example23">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php }else{?>
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" disabled class="onoffswitch-checkbox" id="example24">
                                                <label class="onoffswitch-label" for="example24">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="<?=site_url('Institute/institute_user/') .$key['institute_profile_id']?>"><span class="btn btn-white">Cancel</span></a>
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <span class="btn btn-primary edit_functionality" type="submit">Edit Functionality</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>