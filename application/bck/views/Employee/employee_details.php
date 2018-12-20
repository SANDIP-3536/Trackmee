         <div class="wrapper wrapper-content">
            <?php foreach ($update_employee as $key) { ?>
            <div class="row animated fadeInRight">
                  <div class="col-md-offset-1 col-md-3" style="padding-right:0px;">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-9">
                                    <h5  style="color: #fff;">Employee Profile Photo </h5>
                                </div>
                                <div class="col-lg-3" style="text-align:right;">
                                    <span class="btn btn-xs btn-white edit_profile"><i class="fa fa-pencil"></i></span>
                                    <span class="btn btn-xs btn-white cancel_profile"><i class="fa fa-times"></i> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="ibox-content no-padding border-left-right" >
                           <center> 
                            <div class="img-wrapper profile_normal">
                                <img alt="Student Photo" class="img-responsive" src="<?=$key['employee_photo']?>" style="width: 55%;padding: 15px;">
                            </div>
                            <div class="ibox-content profile_normal"></div>
                            <div class="img-wrapper profile_hide">
                                <img alt="Student Photo" class="img-responsive" src="<?=$key['employee_photo']?>" style="width: 55%;padding: 15px; opacity:0.1;">
                            </div>
                            <div class="ibox-content profile_hide">
                            <div class="data">
                                <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addStudent" action="<?=site_url('Employee/edit_profile')?>">
                                    <div class="form-group hidden">
                                        <div class="col-lg-3">
                                            <input type="text" name="employee_profile_id" class="form-control" value="<?=$key['employee_profile_id']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Profile Photo</label>
                                        <div class="col-lg-9">
                                            <input type="file" placeholder="placeholder" name="employee_photo" class="form-control" accept="image/jpeg, image/png, image/gif" style="border:none;">
                                        </div>
                                        <div class="col-lg-1">
                                            <button class="btn btn-xs btn-primary" type="submit">Upload</button>
                                        </div>
                                    </div>
                                </form>
                            </div> 
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-7" style="padding-left:0px;">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="background: #2f4050;">
                     <div class="row">
                        <div class="col-lg-9">
                            <h5 style="color: #fff;">Employee Details</h5>
                        </div>   
                        <div class="col-lg-3" style="text-align:right;">
                            <a class="btn btn-xs btn-white" href="<?=site_url('Employee/update_employee/'.$key['employee_profile_id'])?>"><i class="fa fa-pencil" title="Edit Employee Details"></i></a>
                            <a class="btn btn-xs btn-white" href="<?=site_url('Employee/add_document/'.$key['employee_profile_id'])?>"><i class="fa fa-file" title="Add New Document"></i></a>
                            <?php if($key['employee_expiry_date'] == '9999-12-31') {?>
                                <a class="btn btn-xs btn-danger" href="<?=site_url('Employee/employee_deactive/'.$key['employee_profile_id'])?>"><i class="fa fa-ban" title="Deactivate Employee"></i></a>
                            <?php }else{ ?>
                                <a href="<?=site_url('Employee/employee_active/' .$key['employee_profile_id'])?>"><span class="btn btn-xs btn-success"><i class="fa fa-ban" title="Employee Active"></i></a></span>
                            <?php } ?>
                        </div>            
                    </div>
                </div>
                <div class="ibox-content">
                    <div> 
                     <div class="feed-activity-list">
                        <div class="feed-element" style="padding-top: 15px;">
                            <div class="media-body ">
                                <div class="form-group">
                                    <div class="col-sm-2"> <strong>Name</strong></div>
                                    <div class="col-sm-6"><?=$key['employee_first_name']?> <?=$key['employee_middle_name']?> <?=$key['employee_last_name']?></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="feed-activity-list">
                        <div class="feed-element" style="padding-top: 15px;"> 
                            <div class="media-body ">
                             <div class="form-group">
                                <div class="col-sm-2"> <strong>Date of Birth</strong></div>
                                <div class="col-sm-3"> <?=$key['employee_DOB']?></div>
                                <div class="col-sm-2"> <strong>Gender</strong></div>
                                <div class="col-sm-3"> <?=$key['employee_gender']?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feed-activity-list">
                    <div class="feed-element" style="padding-top: 15px;">
                        <div class="media-body ">
                         <div class="form-group">
                            <div class="col-sm-2"> <strong>Mobile No.</strong></div>
                            <div class="col-sm-3"> <?=$key['employee_pri_mobile_number']?></div>
                            <div class="col-sm-2"> <strong> Email</strong></div>
                            <div class="col-sm-4"> <?=$key['employee_email_id']?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feed-activity-list">
                <div class="feed-element" style="padding-top: 15px;">
                    <div class="media-body ">
                     <div class="form-group">
                        <div class="col-sm-2"> <strong>Education</strong></div>
                        <div class="col-sm-3"> <?=$key['employee_higher_education']?></div>
                        <div class="col-sm-2"> <strong> Experience</strong></div>
                        <div class="col-sm-4"> <?=$key['employee_experiance']?></div>
                    </div>
                </div>
            </div>
            <div class="feed-activity-list">
                <div class="feed-element" style="padding-top: 15px;">
                    <div class="media-body ">
                     <div class="form-group">
                        <div class="col-sm-2"> <strong> Address</strong></div>
                        <div class="col-sm-6"> <?=$key['employee_address']?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php }?>
</div>
