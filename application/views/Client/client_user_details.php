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
                            <?php foreach ($client as $key) {?>
                            <div class="img-wrapper">
                                <img alt="Client Photo" class="img-responsive" src="<?=$key['client_logo']?>" style="width: 50%;padding: 15px;">
                            </div>
                            <div class="ibox-content profile_hide">
                                <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addSchool_logo" action="<?=site_url('Client/update_client_logo')?>">
                                    <div class="form-group hidden">
                                        <div class="col-lg-3">
                                            <input type="text" name="client_profile_id" class="form-control" value="<?=$key['client_profile_id']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-12 col-sm-offset-1 control-label" style="text-align:left">Client Logo :</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="file" placeholder="placeholder" name="client_logo" class="form-control" accept="file/jpg,file/png,file/jpeg" style="border:none;">
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
                                    <h5 style="color: #fff;">Client Details</h5>
                                </div>   
                                <div class="col-lg-4" style="text-align:right;">
                                <?php foreach ($client as $key) {?>
                                    <?php if ($key['client_expiry_date'] == '9999-12-31') { ?>
                                       <a href="<?=site_url('Client/update_client_details/') .$key['client_profile_id']?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit Client Details"></i></span></a>
                                        <a href="<?=site_url('Client/client_deactive/') .$key['client_profile_id']?>"><span class="btn btn-xs btn-danger"><i class="fa fa-ban" aria-hidden="true" title="Client Deactivate"></i></span></a>
                                       <?php } ?>
                                       <?php if ($key['client_expiry_date'] != '9999-12-31') { ?>
                                       <a href="<?=site_url('Client/client_active/') .$key['client_profile_id']?>"><span class="btn btn-xs btn-success"><i class="fa fa-ban" aria-hidden="true" title="Client Activate"></i></span></a>
                                       <?php } ?>
                                <?php } ?>
                                </div>            
                            </div>
                        </div>
                        <div class="ibox-content">
                            <?php foreach ($client as $key) {?>
                            <div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;">
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong>Name</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-5"><?=ucfirst($key['client_name'])?></div>
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
                                                <div class="col-sm-9"><?=$key['client_address']?> </div>
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
                                                <div class="col-sm-3"> <?=$key['client_mobile_number']?></div>
                                                <div class="col-sm-2"> <strong>Phone No.</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3"> <?=$key['client_phone_number']?></div>
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
                                                <div class="col-sm-3"> <?=$key['client_email_id']?></div>
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
                                                <div class="col-sm-3"> <?=$key['client_latitude']?></div>
                                                 <div class="col-sm-2"> <strong>Lognitude</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3"> <?=$key['client_longitude']?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <?php if($key['institute_panic_notifi'] == 1) {?>
                                                <div class="col-sm-2"> <strong>Panic Notification</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3">
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
                                                <?php }?>
                                                <?php if($key['institute_stop_sms'] == 1) {?>
                                                <div class="col-sm-2"> <strong>Stop SMS</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3">
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
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <?php if($key['institute_dest_sms'] == 1) {?>
                                                <div class="col-sm-2"> <strong>Destination SMS</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3">
                                                    <?php if($key['client_dest_sms'] == 1) {?>
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
                                                <?php if($key['institute_auth_sms'] == 1) {?>
                                                <div class="col-sm-2"> <strong>Authentication SMS</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3"> 
                                                    <?php if($key['institute_auth_sms'] == 1) {?>
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
                                                <div class="col-sm-2"> <strong>Speed Limit Notification</strong></div>
                                                <div class="col-sm-1"> <strong>:</strong></div>
                                                <div class="col-sm-3">
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
                                                <?php if($key['client_speed_limit_notifi'] == 1) {?>
                                                    <div class="col-sm-2"> <strong>Speed Limit Val</strong></div>
                                                    <div class="col-sm-1"> <strong>:</strong></div>
                                                    <div class="col-sm-3"><?=$key['client_speed_limit_val'] ?> </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($key['client_expiry_date'] == '9999-12-31') { ?>
            <div class="row">
                <div class="col-sm-offset-1 col-sm-10">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3><b>Users Details</b></h3>
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                <?php if ($key['institute_expiry_date'] == '9999-12-31') { ?>
                                <span class="btn btn-xs btn-primary" id="add_user"><i class="fa fa-plus-square" aria-hidden="true" title="Add New User"></i></span>
                                <?php } ?>
                            </div>
                        </div> 
                        <div id="user">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addClient"  action="<?=site_url('Client/add_client_user')?>">
                                <div class="form-group" hidden="">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control school_profile" name="client_profile_id" value="<?=$key['client_profile_id']?>">
                                    </div>
                                </div>
                                <div class="form-group" hidden="">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="client_name" value="<?=$key['client_name']?>">
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
                                    <div class="form-group hidden">
                                        <label class="col-sm-2 control-label">Employee <span style="color:red;">*</span></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="employee_type" readonly>
                                                <option value="3">Admin</option>
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
                        <?php foreach ($client_user as $key1) { ?>
                            <div class="col-sm-3">
                                <center>
                                    <div class="form-group">
                                        <a href="<?=site_url('Client/update_client_user/') .$key1['employee_profile_id'] ?>"><img src="<?=$key1['employee_photo']?>" class="img-circle" height="100" width="100" alt="No Image Found" style="border:1px solid #000;padding: 10px;background-color: rgba(128, 128, 128, 0.11);border-top: 2px solid black;"><!-- </a> -->
                                        <div class="col-lg-12" style="padding-top: 08px; color:#000;">
                                            <span><h3><?=$key1['employee_first_name']?>&nbsp<?=$key1['employee_last_name']?></h3></span>
                                        </div>
                                    </div>
                                </center>
                            </div>
                        <?php } ?>
                        <?php } ?>
                        </div>
                    </div>
                </div> 
            </div>
        </div>