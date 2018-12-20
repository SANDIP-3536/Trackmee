         <div class="wrapper wrapper-content">
            <?php 
              foreach ($update_teacher as $key) {
                  ?>
            <div class="row animated fadeInRight">
                  <div class="col-md-offset-1 col-md-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h5  style="color: #fff;">Teacher Profile Photo </h5>
                                </div>
                            </div> 
                        </div>
                        
                        <div class="ibox-content no-padding border-left-right" >
                           <center> 
                             <div class="img-wrapper">
                                <img alt="Student Photo" class="img-responsive" src="<?=$key['employee_photo']?>" style="width: 50%;padding: 15px;">
                                <!-- <a class="btn btn-xs btn-white" href="<?=site_url('Student/student_details_edit/'.$key['student_profile_id'])?>"><i class="fa fa-pencil"></i> Edit </a> -->
                            </div> 
                        </center>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="background: #2f4050;">
                     <div class="row">
                        <div class="col-lg-9">
                            <h5 style="color: #fff;">Student Details</h5>
                        </div>   
                         <div class="col-lg-3" style="text-align:right;">
                            <a class="btn btn-xs btn-white" href="<?=site_url('Teacher/update_teacher/'.$key['employee_profile_id'])?>"><i class="fa fa-pencil"></i> Edit </a>
                            <a class="btn btn-xs btn-white" href="<?=site_url('Teacher/add_document/'.$key['employee_profile_id'])?>"><i class="fa fa-file"></i> Documents </a>
                         </div>            
                    </div>
                </div>
                <div class="ibox-content">
                    <div> 
                     <div class="feed-activity-list">
                        <div class="feed-element" style="padding-top: 15px;">
                            <div class="media-body ">
                                <div class="form-group">
                                    <div class="col-sm-3"> <strong>Teacher Name</strong></div>
                                    <div class="col-sm-6"><?=$key['employee_first_name']?> <?=$key['employee_middle_name']?> <?=$key['employee_last_name']?></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    

                    <div class="feed-activity-list">
                        <div class="feed-element" style="padding-top: 15px;"> 
                            <div class="media-body ">
                             <div class="form-group">
                                <div class="col-sm-3"> <strong>Date of Birth</strong></div>
                                <div class="col-sm-3"> <?=$key['employee_DOB']?></div>
                                <div class="col-sm-3"> <strong>Gender</strong></div>
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
                        <div class="col-sm-3"> <strong> Address</strong></div>
                        <div class="col-sm-6"> <?=$key['employee_address']?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="feed-activity-list">
                <div class="feed-element" style="padding-top: 15px;">
                    <div class="media-body ">
                     <div class="form-group">
                        <div class="col-sm-3"> <strong> Email</strong></div>
                        <div class="col-sm-6"> <?=$key['employee_email_id']?></div>
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
