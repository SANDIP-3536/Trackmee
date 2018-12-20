         <div class="wrapper wrapper-content">
            <?php foreach ($update_user as $key) { ?>
            <div class="row animated fadeInRight">
                  <div class="col-md-offset-1 col-md-3" style="padding-right:0px;">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-9">
                                    <h5  style="color: #fff;">User Profile Photo </h5>
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
                                <img alt="Student Photo" class="img-responsive" src="<?=$key['user_photo']?>" style="width: 55%;padding: 15px;">
                            </div>
                            <div class="ibox-content profile_normal"></div>
                            <div class="img-wrapper profile_hide">
                                <img alt="Student Photo" class="img-responsive" src="<?=$key['user_photo']?>" style="width: 55%;padding: 15px; opacity:0.1;">
                            </div>
                            <div class="ibox-content profile_hide">
                            <div class="data">
                                <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addUser" action="<?=site_url('User/edit_profile')?>">
                                    <div class="form-group hidden">
                                        <div class="col-lg-3">
                                            <input type="text" name="user_profile_id" class="form-control" value="<?=$key['user_profile_id']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Profile Photo</label>
                                        <div class="col-lg-9">
                                            <input type="file" placeholder="placeholder" name="user_photo" class="form-control" accept="image/jpeg, image/png, image/gif" style="border:none;">
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
                            <h5 style="color: #fff;">User Details</h5>
                        </div>   
                        <div class="col-lg-3" style="text-align:right;">
                            <a class="btn btn-xs btn-white" href="<?=site_url('User/update_user/'.$key['user_profile_id'])?>"><i class="fa fa-pencil" title="Edit User Details"></i></a>
                            <!-- <a class="btn btn-xs btn-white" href="<?=site_url('User/add_document/'.$key['user_profile_id'])?>"><i class="fa fa-file" title="Add New Document"></i></a> -->
                            <?php if($key['user_expiry_date'] == '9999-12-31') {?>
                                <a class="btn btn-xs btn-danger" href="<?=site_url('User/user_deactive/'.$key['user_profile_id'])?>"><i class="fa fa-ban" title="Deactivate User"></i></a>
                            <?php }else{ ?>
                                <a href="<?=site_url('User/user_active/' .$key['user_profile_id'])?>"><span class="btn btn-xs btn-success"><i class="fa fa-ban" title="User Active"></i></a></span>
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
                                    <div class="col-sm-6"><?=$key['user_first_name']?> <?=$key['user_middle_name']?> <?=$key['user_last_name']?></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="feed-activity-list">
                        <div class="feed-element" style="padding-top: 15px;"> 
                            <div class="media-body ">
                             <div class="form-group">
                                <div class="col-sm-2"> <strong>Date of Birth</strong></div>
                                <div class="col-sm-3"> <?=$key['user_DOB']?></div>
                                <div class="col-sm-2"> <strong>Gender</strong></div>
                                <div class="col-sm-3"> <?=$key['user_gender']?></div>
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
                            <div class="col-sm-3"> <?=$key['user_mobile_number']?></div>
                            <div class="col-sm-2"> <strong> Email</strong></div>
                            <div class="col-sm-4"> <?=$key['user_email_id']?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feed-activity-list">
                <div class="feed-element" style="padding-top: 15px;">
                    <div class="media-body ">
                     <div class="form-group">
                        <div class="col-sm-2"> <strong> Address</strong></div>
                        <div class="col-sm-6"> <?=$key['user_address']?></div>
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
