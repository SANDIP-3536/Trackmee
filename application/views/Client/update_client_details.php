        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Update Client Indormation</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addClient" action="<?=site_url('Client/update_details_client')?>">
                                <?php foreach ($client as $key) { ?>
                                    <div class="form-group" hidden="">
                                        <label class="col-lg-2 control-label">profile ID</label>
                                        <div class="col-lg-3">
                                            <input type="text" placeholder="Name" name="client_profile_id" class="form-control" value="<?=$key['client_profile_id']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Name <span style="color:red;">*</span></label>
                                        <div class="col-lg-3">
                                            <input type="text" placeholder="Name" name="client_name" class="form-control" value="<?=$key['client_name']?>">
                                        </div>
                                        <label class="col-lg-2 control-label">Email ID.</label>
                                        <div class="col-lg-3">
                                           <input type="text" placeholder="Email ID" name="client_email_id" class="form-control" value="<?=$key['client_email_id']?>">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Mobile Number</label>
                                        <div class="col-lg-3">
                                            <input type="text" placeholder="Mobile Number" name="client_mobile_number" class="form-control" value="<?=$key['client_mobile_number']?>">
                                        </div>
                                        <label class="col-lg-2 control-label">Phone Number <span style="color:red;">*</span></label>
                                        <div class="col-lg-3">
                                            <input type="text" placeholder="Phone Number" name="client_phone_number" class="form-control" value="<?=$key['client_phone_number']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Latitude</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="client_latitude" placeholder="Latitude" value="<?=$key['client_latitude']?>">
                                        </div>
                                        <label class="col-lg-2 control-label">Longitude</label>
                                        <div class="col-lg-3">
                                            <input type="text" placeholder="Longitude" name="client_longitude" class="form-control" value="<?=$key['client_longitude']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Address <span style="color:red;">*</span></label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="client_address" placeholder="Address" value="<?=$key['client_address']?>">
                                        </div>
                                        <label class="col-lg-2 control-label" id="speed_notifi1">Speed Limit <span style="color:red;">*</span></label>
                                        <div class="col-lg-3" id="speed_notifi">
                                            <input type="text" placeholder="" name="client_speed_limit_val" class="form-control" value="<?=$key['client_speed_limit_val']?>">
                                        </div>
                                    </div>
                                    <div class="form-group functionality">
                                        <?php if($key['institute_panic_notifi'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Panic Notification <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['client_panic_notifi'] == 1) {?>
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
                                            <?php if($key['client_stop_sms'] == 1) {?>
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
                                        <?php } if($key['institute_dest_sms'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Destination SMS <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['client_dest_sms'] == 1) {?>
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
                                        <?php if($key['institute_auth_sms'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Authentication SMS <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['client_auth_sms'] == 1) {?>
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
                                        <label class="col-sm-2 control-label">Speed Limit Notification <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['client_speed_limit_notifi'] == 1) {?>
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
                                        <?php if($key['institute_panic_notifi'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Panic Notification <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['client_panic_notifi'] == 1) {?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" checked class="onoffswitch-checkbox" name="client_panic_notifi" id="example1">
                                                    <label class="onoffswitch-label" for="example1">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php }else{?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" class="onoffswitch-checkbox" name="client_panic_notifi" id="example2">
                                                    <label class="onoffswitch-label" for="example2">
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
                                            <?php if($key['client_stop_sms'] == 1) {?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" checked class="onoffswitch-checkbox" name="client_stop_sms" id="example111">
                                                    <label class="onoffswitch-label" for="example111">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php }else{?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" class="onoffswitch-checkbox" name="client_stop_sms" id="example222">
                                                    <label class="onoffswitch-label" for="example222">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php } if($key['institute_dest_sms'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Destination SMS <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['client_dest_sms'] == 1) {?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" checked class="onoffswitch-checkbox" name="client_dest_sms" id="example10">
                                                    <label class="onoffswitch-label" for="example10">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php }else{?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" class="onoffswitch-checkbox" name="client_dest_sms" id="example12">
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
                                        <?php if($key['institute_auth_sms'] == 1){ ?>
                                        <label class="col-sm-2 control-label">Authentication SMS <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['client_auth_sms'] == 1) {?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" checked class="onoffswitch-checkbox" name="client_auth_sms" id="example5">
                                                    <label class="onoffswitch-label" for="example5">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php }else{?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" class="onoffswitch-checkbox" name="client_auth_sms" id="example6">
                                                    <label class="onoffswitch-label" for="example6">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php } ?>
                                        <label class="col-sm-2 control-label">Speed Limit Notification <span style="color:red;">*</span></label>
                                        <div class="col-sm-1" style="padding:10px;">
                                            <?php if($key['client_speed_limit_notifi'] == 1) {?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" checked class="onoffswitch-checkbox speed_notification" name="client_speed_limit_notifi" id="example65">
                                                    <label class="onoffswitch-label" for="example65">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php }else{?>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" class="onoffswitch-checkbox" name="client_speed_limit_notifi" id="example66">
                                                    <label class="onoffswitch-label" for="example66">
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
                                        <div class="col-sm-6 col-sm-offset-2">
                                            <a href="<?=site_url('Client/client_user_details/') .$key['client_profile_id']?>"><span class="btn btn-white">Cancel</span></a>
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