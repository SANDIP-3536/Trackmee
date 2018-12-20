        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Add Client</b></h3>
                                </div>
                                <div class="col-sm-6">
                                    <div class="ibox-tools">
                                        <a href="<?=site_url('Client/view_client')?>"><button class="btn btn-xs btn-primary">View Client</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addClient" action="<?=site_url('Client/add_client_registration')?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Name <span style="color:red;">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="Client Name" name="client_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Address <span style="color:red;">*</span></label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="client_address" placeholder="Client Address" rows="3" cols="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Logo <span style="color:red;">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="file" placeholder="" name="client_logo" class="form-control" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-sm-offset-1" style="padding-top: 6px;">
                                        <span style="color:red;"><b>Only .jpg|.jpeg|.png File types are allowed</b></span>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Mobile Number</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="CLient Mobile Number" name="client_mobile_number" class="form-control">
                                    </div>
                                    <label class="col-lg-2 control-label">Phone Number <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Client Phone Number" name="client_phone_number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Latitude</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="client_latitude" placeholder="Client Latitude">
                                    </div>
                                    <label class="col-lg-2 control-label">Longitude</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Client Longitude" name="client_longitude" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Email ID.</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Client Email ID" name="client_email_id" class="form-control">
                                    </div>
                                    <label class="col-lg-2 control-label">Client Type  <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <select name="client_type" class="form-control">
                                            <option value="0">Select Type</option>
                                            <option value="1">Corporate</option>
                                            <option value="2">School</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label hidden" id="speed_notifi1">Speed Limit <span style="color:red;">*</span></label>
                                    <div class="col-lg-3 hidden" id="speed_notifi">
                                        <input type="text" placeholder="" name="client_speed_limit_val" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Speed Limit Notificaton <span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox"  class="onoffswitch-checkbox speed_notification" name="client_speed_limit_notifi" id="example2">
                                                <label class="onoffswitch-label" for="example2">
                                                    <span class="onoffswitch-switch"></span>
                                                    <span class="onoffswitch-inner"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($panic == 1){ ?>
                                    <label class="col-sm-2 control-label">Panic Notification <span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox"  class="onoffswitch-checkbox" name="client_panic_notifi" id="example24">
                                                <label class="onoffswitch-label" for="example24">
                                                    <span class="onoffswitch-switch"></span>
                                                    <span class="onoffswitch-inner"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php if($stop_sms == 1){?>
                                    <label class="col-sm-2 control-label"> Stop SMS<span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="client_stop_sms" id="example1">
                                                <label class="onoffswitch-label" for="example1">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php if ($dest_sms == 1) { ?>
                                    <label class="col-sm-2 control-label">Destination SMS <span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="client_dest_sms" id="example3">
                                                <label class="onoffswitch-label" for="example3">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <?php if ($auth_sms == 1) { ?>
                                    <label class="col-sm-2 control-label">Authentication SMS <span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="client_auth_sms" id="example13">
                                                <label class="onoffswitch-label" for="example13">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="<?=site_url('Client/view_client')?>"><span class="btn btn-white">Cancel</span></a>
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>