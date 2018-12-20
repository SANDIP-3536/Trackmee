        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Institute Registration</b></h3>
                                </div>
                                <div class="col-sm-6">
                                    <div class="ibox-tools">
                                        <a href="<?=site_url('Institute/institute_Details')?>"><button class="btn btn-primary">View Institute</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" id="addInstitute" action="<?=site_url('Institute/new_institute_registration')?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Institute Name <span style="color:red;">*</span></label>   
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="institute_name" placeholder="Institute Name"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Institute Name'" >
                                    </div>
                                    <label class="col-sm-2 control-label">Institute Address <span style="color:red;">*</span></label>   
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" placeholder="Institute Address" name="institute_address"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Institute Address'" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Institute Logo <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="file" class="form-control logo" name="institute_logo" accept="image/gif,image/png,image/jpeg" style="border:none;padding:0px;">
                                    </div>
                                    <label class="col-sm-2 control-label">Mobile Number</label>
                                    <div class="col-sm-3">
                                        <input type="text" row="2" name="institute_mobile_number" placeholder="Institute Mobile Number" class="form-control" 
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Institute Mobile Number'" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Phone Number <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="text" row="2" name="institute_phone_number" placeholder="Institute Phone Number" class="form-control"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Institute Phone Number'" >
                                    </div>
                                    <label class="col-sm-2 control-label">Email ID</label>
                                    <div class="col-sm-3">
                                        <input type="text" row="2" name="institute_email_id" placeholder="Institute Email ID" class="form-control"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Institute Email ID'" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Institute Sender ID </label>
                                    <div class="col-sm-3">
                                        <input type="text" name="institute_sender_id" placeholder="Institute Sender ID" class="form-control"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Institute Sender ID'" onkeyup="caps(this)">
                                    </div>
                                    <label class="col-sm-2 control-label">Institute Signature</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="institute_signature" placeholder="Institute Signature" class="form-control"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Institute Signature'" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Panic Notification<span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="institute_panic_notifi" id="example1">
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
                                                <input type="checkbox" class="onoffswitch-checkbox" name="institute_stop_sms" id="example3">
                                                <label class="onoffswitch-label" for="example3">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 control-label">Destination SMS <span style="color:red;">*</span></label>
                                    <div class="col-sm-2" style="padding:10px;">
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="institute_dest_sms" id="example2">
                                                <label class="onoffswitch-label" for="example2">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Authentication SMS<span style="color:red;">*</span></label>
                                    <div class="col-sm-1" style="padding:10px;">
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="institute_auth_sms" id="example5">
                                                <label class="onoffswitch-label" for="example5">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="reset">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>