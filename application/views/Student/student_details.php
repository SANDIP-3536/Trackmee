        <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight" id="student_details_view">
                <div class="col-md-offset-1 col-md-3" style="padding-right:0px !important;">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="background: #2f4050; padding-right:0px;">
                            <div class="row" style="padding-bottom:1%;padding:1%;">
                                <div class="col-lg-10">
                                    <h5  style="color: #fff;">Student Profile Photo </h5>
                                </div>
                                <div class="col-lg-1">
                                    <span class="btn btn-xs btn-white edit_profile"><i class="fa fa-pencil" title="Edit Student Photo"></i> </span>
                                    <span class="btn btn-xs btn-white hidden" id="close_edit_profile"><i class="fa fa-times" title="Close Upload."></i> </span>
                                </div>
                            </div> 
                            <div class="ibox-content no-padding border-left-right" >
                                <center> 
                                <?php foreach ($update_student as $key) {?>
                                <div class="img-wrapper">
                                    <img alt="Student Photo" class="img-responsive" src="<?=$key['student_photo']?>" style="width: 50%;padding: 15px;">
                                </div>
                                <div class="ibox-content profile_hide">
                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addStudent" action="<?=site_url('Student/edit_profile')?>">
                                        <div class="form-group hidden">
                                            <div class="col-lg-3">
                                                <input type="text" name="student_profile_id" class="form-control" value="<?=$key['student_profile_id']?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Profile Photo</label>
                                            <div class="col-lg-9">
                                                <input type="file" placeholder="placeholder" name="student_photo" class="form-control" accept="file/jpg,file/png,file/jpeg" style="border:none;">
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
                        <div class="ibox-title father_detaills_view" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5  style="color: #fff;">Father Details</h5>
                                </div>
                            </div> 
                        </div>
                        <div class="ibox-title mother_detaills_view" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5  style="color: #fff;">Mother Details</h5>
                                </div>
                            </div> 
                        </div>
                        <div class="ibox-title gardien_detaills_view" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5  style="color: #fff;">Gardien Details</h5>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-md-7" style="padding-left:0px !important;">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h5 style="color: #fff;">Student Details</h5>
                                </div>   
                                <div class="col-lg-4" style="text-align:right;">
                                <?php foreach ($update_student as $key) {?>
                                    <a class="btn btn-xs btn-white" href="<?=site_url('Student/print_student_form/'.$key['student_profile_id'])?>"><i class="fa fa-print" title="Print Form"></i>  </a>
                                    <a class="btn btn-xs btn-white" href="<?=site_url('Student/student_details_edit/'.$key['student_profile_id'])?>"><i class="fa fa-pencil" title="Edit Student Details"></i> </a>
                                    <a class="btn btn-xs btn-white" href="<?=site_url('Student/student_document/'.$key['student_profile_id'])?>"><i class="fa fa-file" title="Add Student Documents"></i> </a>
                                    <a class="btn btn-xs btn-white" href="<?=site_url('Student/add_another_parent_details/'.$key['student_profile_id'])?>"><i class="fa fa-plus" title="Add Another Parent"></i> </a>
                                <?php } ?>
                                </div>            
                            </div>
                        </div>
                        <div class="ibox-content">
                            <?php foreach ($update_student as $key) {?>
                            <div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;">
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong>Name</strong></div>
                                                <div class="col-sm-5"><?=ucfirst($key['student_first_name'])?> <?=ucfirst($key['student_middle_name'])?> <?=ucfirst($key['student_last_name'])?></div>
                                                <div class="col-sm-2"> <strong>GRN No.</strong></div>
                                                <div class="col-sm-3"> <?=$key['student_GRN']?></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;">
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong>Adhar Card</strong></div>
                                                <div class="col-sm-3"><?=$key['student_adhar_card_number']?> </div>
                                                <div class="col-sm-3"> <strong>Admission Date</strong></div>
                                                <div class="col-sm-3"> <?=$key['student_admission_date']?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong>Date of Birth</strong></div>
                                                <div class="col-sm-3"> <?=$key['student_DOB']?></div>
                                                <div class="col-sm-3"> <strong>Gender</strong></div>
                                                <div class="col-sm-3"> <?=ucfirst($key['student_gender'])?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong>Birth Place</strong></div>
                                                <div class="col-sm-3"> <?=$key['student_birth_place']?></div>
                                                <div class="col-sm-3"> <strong>Nationality</strong></div>
                                                <div class="col-sm-3"> <?=ucfirst($key['student_nationality'])?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong>Blood Group</strong></div>
                                                <div class="col-sm-3"> <?=ucfirst($key['student_blood_group'])?></div>
                                                <div class="col-sm-3"> <strong>Mother Tongue</strong></div>
                                                <div class="col-sm-3"> <?=ucfirst($key['student_mother_tongue'])?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong>Category</strong></div>
                                                <div class="col-sm-3"> <?=ucfirst($key['student_category'])?></div>
                                                <div class="col-sm-3"> <strong>Religion</strong></div>
                                                <div class="col-sm-3"> <?=ucfirst($key['student_religion'])?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong>Cast</strong></div>
                                                <div class="col-sm-3"> <?=ucfirst($key['student_cast'])?></div>
                                                <div class="col-sm-3"> <strong>Subcast</strong></div>
                                                <div class="col-sm-3"> <?=ucfirst($key['student_sub_cast'])?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if($functionality[0]['school_tracking'] == 1) {?>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-3"> <strong>Tracking</strong></div>
                                                <div class="col-sm-3">
                                                    <?php if($key['student_tracking'] == 1) {?>
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
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="feed-activity-list">
                                <div class="feed-element" style="padding-top: 15px;">
                                    <div class="media-body ">
                                        <div class="form-group">
                                            <div class="col-sm-2"> <strong> Address</strong></div>
                                            <div class="col-sm-7"><?=ucfirst($key['student_present_house_no'])?> <?=ucfirst($key['student_present_town'])?> <?=ucfirst($key['student_present_tal'])?> <?=ucfirst($key['student_present_dist'])?> <?=ucfirst($key['student_present_state'])?> <?=ucfirst($key['student_present_pincode'])?></div>
                                        </div>   
                                    </div>
                                </div>
                                <div class="ibox-title" style="background: #2f4050;">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <h5  style="color: #fff;">Admission Details</h5>
                                        </div>
                                    </div> 
                                </div>
                                <div class="ibox-content">
                                    <div>
                                        <div class="feed-activity-list">
                                            <div class="feed-element" style="padding-top: 15px;border:none !important;">
                                                <div class="media-body ">
                                                    <div class="form-group">
                                                        <div class="col-sm-4"> <strong>Admission Class</strong></div>
                                                        <?php foreach ($class_details as $key) { ?>
                                                        <div class="col-sm-8"><?=$key['class_name']?> Class</div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                                <div class="ibox-title" style="background: #2f4050;">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h5  style="color: #fff;">Fee Details</h5>
                                        </div>
                                        <div class="col-lg-6" style="text-align:right;">
                                            <?php foreach ($update_student as $key) {?>
                                                <button class="btn btn-white btn-xs" data-toggle="modal" id ='<?=$key['student_profile_id']; ?>' data-target="#editFee"><i class="fa fa-pencil"></i></button>
                                             <?php } ?>
                                        </div>
                                    </div> 
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Fee Type</th>
                                                <th>Fee Category</th>
                                                <th>Fee Type Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($fee_details as $key) {?>
                                            <tr>
                                                <td><?=$key['fees_type_name']?></td>
                                                <td><?=$key['fee_category_name']?></td>
                                                <td><?=$key['total_fee_amount']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="ibox-title" style="background: #2f4050;">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <h5  style="color: #fff;">Document Details</h5>
                                        </div>
                                    </div> 
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Number</th>
                                                <th>Type</th>
                                                <th>File</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($document_details as $key) {?>
                                            <tr>
                                                <td><?=$key['doc_name']?></td>
                                                <td><?=$key['doc_number']?></td>
                                                <td><?=$key['doc_type']?></td>
                                                <td><a href="<?=$key['doc_file']?>" download ><i class="fa fa-download fa-2x"></i></a></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row animated fadeInRight hidden" id="father_details_view">
                <div class="col-md-offset-1 col-md-3" style="padding-right:0px !important;">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="background: #2f4050; padding-right:0px;">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5  style="color: #fff;">Father Profile Photo </h5>
                                </div>
                                <div class="col-lg-1">
                                <?php foreach ($father_details as $key => $value) { 
                                if(empty($value)) {
                                        unset($father_details[$key]);
                                    }
                                }
                                if (empty($father_details)) { }else{ foreach ($father_details as $key){?>
                                    <span class="btn btn-xs btn-white father_edit_profile"><i class="fa fa-pencil" title="Edit Father Photo"></i> </span>
                                    <span class="btn btn-xs btn-white hidden" id="close_father_edit_profile"><i class="fa fa-times" title="Close Upload."></i> </span>
                                <?php }} ?>
                                </div>
                            </div> 
                        </div>
                        <div class="ibox-content no-padding border-left-right" >
                            <center> 
                            <?php foreach ($father_details as $key => $value) { 
                            if(empty($value)) {
                                    unset($father_details[$key]);
                                }
                            }
                            if (empty($father_details)) { }else{ foreach ($father_details as $key){?>
                            <div class="img-wrapper">
                                <img alt="Father Photo" class="img-responsive" src="<?=$key['parent_photo']?>" style="width: 50%;padding: 15px;">
                            </div>
                            <div class="ibox-content father_profile_hide">
                                <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addParent" action="<?=site_url('Student/edit_parent_profile')?>">
                                    <div class="form-group hidden">
                                        <div class="col-lg-3">
                                            <input type="text" name="parent_profile_id" class="form-control" value="<?=$key['parent_profile_id']?>">
                                        </div>
                                    </div>
                                    <div class="form-group hidden">
                                        <div class="col-lg-3">
                                            <input type="text" name="parent_student_profile_id" class="form-control" value="<?=$key['parent_student_profile_id']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Profile Photo</label>
                                        <div class="col-lg-9">
                                            <input type="file" placeholder="placeholder" name="parent_photo" class="form-control" accept="file/jpg,file/png,file/jpeg" style="border:none;">
                                        </div>
                                        <div class="col-lg-1">
                                            <button class="btn btn-xs btn-primary" type="submit">Upload</button>
                                        </div>
                                    </div>
                                </form>
                            </div> 
                            <?php } }?>
                            </center>
                        </div>
                        <div class="ibox-title student_detaills_view" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5  style="color: #fff;">Student Details</h5>
                                </div>
                            </div> 
                        </div>
                        <div class="ibox-title mother_detaills_view" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5  style="color: #fff;">Mother Details</h5>
                                </div>
                            </div> 
                        </div>
                        <div class="ibox-title gardien_detaills_view" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5  style="color: #fff;">Gardien Details</h5>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-md-7" style="padding-left:0px !important;">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h5 style="color: #fff;">Father Details</h5>
                                </div>   
                                <div class="col-lg-4" style="text-align:right;">
                                    <?php foreach ($father_details as $key => $value) { 
                                    if(empty($value)) {
                                            unset($father_details[$key]);
                                        }
                                    }
                                    if (empty($father_details)) { ?>
                                    <!-- <a class="btn btn-xs btn-white" href="<?=site_url('Student/add_another_parent_details/')?>"><i class="fa fa-plus" title=" Add Father"></i> </a> -->
                                    <?php } else{ foreach ($father_details as $key){?>
                                    <a class="btn btn-xs btn-white" href="<?=site_url('Student/parent_details_edit/'.$key['parent_profile_id'])?>"><i class="fa fa-pencil" title="Edit Father Details"></i> </a>
                                    <?php } } ?>
                                </div>            
                            </div>
                        </div>
                        <div class="ibox-content">
                            <?php foreach ($father_details as $key => $value) { 
                            if(empty($value)) {
                                    unset($father_details[$key]);
                                }
                            }
                            if (empty($father_details)) { ?>
                                <center>
                                    <img src='<?=base_url();?>assets/img/No-record-found.png'> 
                                </center>
                            <?php }else{ foreach ($father_details as $key){?>
                            <div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;">
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong>Name</strong></div>
                                                <div class="col-sm-9"><?=ucfirst($key['parent_first_name'])?> <?=ucfirst($key['parent_middle_name'])?> <?=ucfirst($key['parent_last_name'])?></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong>Date of Birth</strong></div>
                                                <div class="col-sm-4"> <?=$key['parent_DOB']?></div>
                                                <div class="col-sm-2"> <strong>Gender</strong></div>
                                                <div class="col-sm-4"> <?=ucfirst($key['parent_gender'])?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;">
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong> Mobile No</strong></div>
                                                <div class="col-sm-4"> <?=$key['parent_mobile_number']?></div>
                                                <div class="col-sm-2"> <strong> Email ID.</strong></div>
                                                <div class="col-sm-4"> <?=$key['parent_email_id']?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;">
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong> Qualification</strong></div>
                                                <div class="col-sm-4"> <?=ucfirst($key['parent_qualification'])?></div>
                                                <div class="col-sm-2"> <strong> Occupation</strong></div>
                                                <div class="col-sm-4"> <?=ucfirst($key['parent_occupation'])?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;">
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong> Address</strong></div>
                                                <div class="col-sm-7"> <?=ucfirst($key['parent_house_no'])?> <?=ucfirst($key['parent_town'])?> <?=ucfirst($key['parent_tal'])?> <?=ucfirst($key['parent_dist'])?> <?=ucfirst($key['parent_state'])?> <?=ucfirst($key['parent_pincode'])?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-title" style="background: #2f4050;">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <h5  style="color: #fff;">Authetication Details</h5>
                                        </div>
                                    </div> 
                                </div>
                                <div class="ibox-content">
                                    <div class="feed-activity-list">
                                        <div class="feed-element" style="padding-top: 15px;">
                                            <div class="media-body ">
                                                <div class="form-group">
                                                    <div class="col-sm-2"> <strong> Username</strong></div>
                                                    <div class="col-sm-5"> <?=$key['credential_username']?></div>
                                                    <div class="col-sm-1"> <strong></strong></div>
                                                    <div class="col-sm-4" style="text-align:right;"> <button class="btn btn-primary btn-xs" data-toggle="modal" id ='<?=$key['parent_profile_id']?>' data-target="#resetPassword">Reset Password</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row animated fadeInRight hidden" id="mother_details_view">
                <div class="col-md-offset-1 col-md-3" style="padding-right:0px !important;">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="background: #2f4050; padding-right:0px;">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5  style="color: #fff;">Mother Profile Photo </h5>
                                </div>
                                <div class="col-lg-1">
                                <?php foreach ($mother_details as $key => $value) { 
                                if(empty($value)) {
                                        unset($mother_details[$key]);
                                    }
                                }
                                if (empty($mother_details)) { }else{ foreach ($mother_details as $key){?>
                                    <span class="btn btn-xs btn-white mother_edit_profile"><i class="fa fa-pencil" title="Edit Mother Photo"></i> </span>
                                    <span class="btn btn-xs btn-white hidden" id="close_mother_edit_profile"><i class="fa fa-times" title="Close Upload."></i> </span>
                                <?php }} ?>
                                </div>
                            </div> 
                        </div>
                        <div class="ibox-content no-padding border-left-right" >
                            <center> 
                            <?php foreach ($mother_details as $key => $value) { 
                            if(empty($value)) {
                                    unset($mother_details[$key]);
                                }
                            }
                            if (empty($mother_details)) { }else{ foreach ($mother_details as $key){?>
                            <div class="img-wrapper">
                                <img alt="Father Photo" class="img-responsive" src="<?=$key['parent_photo']?>" style="width: 50%;padding: 15px;">
                            </div>
                            <div class="ibox-content mother_profile_hide">
                                <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addParent" action="<?=site_url('Student/edit_parent_profile')?>">
                                    <div class="form-group hidden">
                                        <div class="col-lg-3">
                                            <input type="text" name="parent_profile_id" class="form-control" value="<?=$key['parent_profile_id']?>">
                                        </div>
                                    </div>
                                    <div class="form-group hidden">
                                        <div class="col-lg-3">
                                            <input type="text" name="parent_student_profile_id" class="form-control" value="<?=$key['parent_student_profile_id']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Profile Photo</label>
                                        <div class="col-lg-9">
                                            <input type="file" placeholder="placeholder" name="parent_photo" class="form-control" accept="file/jpg,file/png,file/jpeg" style="border:none;">
                                        </div>
                                        <div class="col-lg-1">
                                            <button class="btn btn-xs btn-primary" type="submit">Upload</button>
                                        </div>
                                    </div>
                                </form>
                            </div> 
                            <?php } }?>
                            </center>
                        </div>
                        <div class="ibox-title student_detaills_view" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5  style="color: #fff;">Student Details</h5>
                                </div>
                            </div> 
                        </div>
                        <div class="ibox-title father_detaills_view" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5  style="color: #fff;">Father Details</h5>
                                </div>
                            </div> 
                        </div>
                        <div class="ibox-title gardien_detaills_view" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5  style="color: #fff;">Gardien Details</h5>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-md-7" style="padding-left:0px !important;">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h5 style="color: #fff;">Mother Details</h5>
                                </div>   
                                <div class="col-lg-4" style="text-align:right;">
                                    <?php foreach ($mother_details as $key => $value) { 
                                    if(empty($value)) {
                                            unset($mother_details[$key]);
                                        }
                                    }
                                    if (empty($mother_details)) {?>
                                    <!-- <a class="btn btn-xs btn-white" href="<?=site_url('Student/add_another_parent_details/')?>"><i class="fa fa-plus" title=" Add Father"></i> </a> -->
                                    <?php } else{ foreach ($mother_details as $key){?>
                                    <a class="btn btn-xs btn-white" href="<?=site_url('Student/parent_details_edit/'.$key['parent_profile_id'])?>"><i class="fa fa-pencil" title="Edit Father Details"></i> </a>
                                    <?php } } ?>
                                </div>            
                            </div>
                        </div>
                        <div class="ibox-content">
                            <?php foreach ($mother_details as $key => $value) { 
                            if(empty($value)) {
                                    unset($mother_details[$key]);
                                }
                            }
                            if (empty($mother_details)) { ?>
                                <center>
                                    <img src='<?=base_url();?>assets/img/No-record-found.png'> 
                                </center>
                            <?php }else{ foreach ($mother_details as $key){?>
                            <div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;">
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong>Name</strong></div>
                                                <div class="col-sm-9"><?=ucfirst($key['parent_first_name'])?> <?=ucfirst($key['parent_middle_name'])?> <?=ucfirst($key['parent_last_name'])?></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong>Date of Birth</strong></div>
                                                <div class="col-sm-4"> <?=$key['parent_DOB']?></div>
                                                <div class="col-sm-2"> <strong>Gender</strong></div>
                                                <div class="col-sm-4"> <?=ucfirst($key['parent_gender'])?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;">
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong> Mobile No</strong></div>
                                                <div class="col-sm-4"> <?=$key['parent_mobile_number']?></div>
                                                <div class="col-sm-2"> <strong> Email ID.</strong></div>
                                                <div class="col-sm-4"> <?=$key['parent_email_id']?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;">
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong> Qualification</strong></div>
                                                <div class="col-sm-4"> <?=ucfirst($key['parent_qualification'])?></div>
                                                <div class="col-sm-2"> <strong> Occupation</strong></div>
                                                <div class="col-sm-4"> <?=ucfirst($key['parent_occupation'])?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;">
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong> Address</strong></div>
                                                <div class="col-sm-7"> <?=ucfirst($key['parent_house_no'])?> <?=ucfirst($key['parent_town'])?> <?=ucfirst($key['parent_tal'])?> <?=ucfirst($key['parent_dist'])?> <?=ucfirst($key['parent_state'])?> <?=ucfirst($key['parent_pincode'])?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-title" style="background: #2f4050;">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <h5  style="color: #fff;">Authetication Details</h5>
                                        </div>
                                    </div> 
                                </div>
                                <div class="ibox-content">
                                    <div class="feed-activity-list">
                                        <div class="feed-element" style="padding-top: 15px;">
                                            <div class="media-body ">
                                                <div class="form-group">
                                                    <div class="col-sm-2"> <strong> Username</strong></div>
                                                    <div class="col-sm-5"> <?=$key['credential_username']?></div>
                                                    <div class="col-sm-1"> <strong></strong></div>
                                                    <div class="col-sm-4" style="text-align:right;"> <button class="btn btn-primary btn-xs" data-toggle="modal" id ='<?=$key['parent_profile_id']?>' data-target="#resetPassword">Reset Password</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row animated fadeInRight hidden" id="gardien_details_view">
                <div class="col-md-offset-1 col-md-3" style="padding-right:0px !important;">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="background: #2f4050; padding-right:0px;">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5  style="color: #fff;">Gardien Profile Photo </h5>
                                </div>
                                <div class="col-lg-1">
                                <?php foreach ($gardien_details as $key => $value) { 
                                if(empty($value)) {
                                        unset($gardien_details[$key]);
                                    }
                                }
                                if (empty($gardien_details)) { }else{ foreach ($gardien_details as $key){?>
                                    <span class="btn btn-xs btn-white gardien_edit_profile"><i class="fa fa-pencil" title="Edit Gardien Photo"></i> </span>
                                    <span class="btn btn-xs btn-white hidden" id="close_gardien_edit_profile"><i class="fa fa-times" title="Close Upload"></i> </span>
                                <?php }} ?>
                                </div>
                            </div> 
                        </div>
                        <div class="ibox-content no-padding border-left-right" >
                            <center> 
                            <?php foreach ($gardien_details as $key => $value) { 
                            if(empty($value)) {
                                    unset($gardien_details[$key]);
                                }
                            }
                            if (empty($gardien_details)) { }else{ foreach ($gardien_details as $key){?>
                            <div class="img-wrapper">
                                <img alt="Father Photo" class="img-responsive" src="<?=$key['parent_photo']?>" style="width: 50%;padding: 15px;">
                            </div>
                            <div class="ibox-content gardien_profile_hide">
                                <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addParent" action="<?=site_url('Student/edit_parent_profile')?>">
                                    <div class="form-group hidden">
                                        <div class="col-lg-3">
                                            <input type="text" name="parent_profile_id" class="form-control" value="<?=$key['parent_profile_id']?>">
                                        </div>
                                    </div>
                                    <div class="form-group hidden">
                                        <div class="col-lg-3">
                                            <input type="text" name="parent_student_profile_id" class="form-control" value="<?=$key['parent_student_profile_id']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Profile Photo</label>
                                        <div class="col-lg-9">
                                            <input type="file" placeholder="placeholder" name="parent_photo" class="form-control" accept="file/jpg,file/png,file/jpeg" style="border:none;">
                                        </div>
                                        <div class="col-lg-1">
                                            <button class="btn btn-xs btn-primary" type="submit">Upload</button>
                                        </div>
                                    </div>
                                </form>
                            </div> 
                            <?php } }?>
                            </center>
                        </div>
                        <div class="ibox-title student_detaills_view" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5  style="color: #fff;">Student Details</h5>
                                </div>
                            </div> 
                        </div>
                        <div class="ibox-title mother_detaills_view" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5  style="color: #fff;">Father Details</h5>
                                </div>
                            </div> 
                        </div>
                        <div class="ibox-title mother_detaills_view" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5  style="color: #fff;">Mother Details</h5>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-md-7" style="padding-left:0px !important;">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="background: #2f4050;">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h5 style="color: #fff;">Gardien Details</h5>
                                </div>   
                                <div class="col-lg-4" style="text-align:right;">
                                    <?php foreach ($gardien_details as $key => $value) { 
                                    if(empty($value)) {
                                            unset($gardien_details[$key]);
                                        }
                                    }
                                    if (empty($gardien_details)) { ?>
                                    <!-- <a class="btn btn-xs btn-white" href="<?=site_url('Student/add_another_parent_details/')?>"><i class="fa fa-plus" title=" Add Father"></i> </a> -->
                                    <?php } else{ foreach ($gardien_details as $key){?>
                                    <a class="btn btn-xs btn-white" href="<?=site_url('Student/parent_details_edit/'.$key['parent_profile_id'])?>"><i class="fa fa-pencil" title="Edit Father Details"></i> </a>
                                    <?php } } ?>
                                </div>            
                            </div>
                        </div>
                        <div class="ibox-content">
                            <?php foreach ($gardien_details as $key => $value) { 
                            if(empty($value)) {
                                    unset($gardien_details[$key]);
                                }
                            }
                            if (empty($gardien_details)) { ?>
                                <center>
                                    <img src='<?=base_url();?>assets/img/No-record-found.png'> 
                                </center>
                            <?php }else{ foreach ($gardien_details as $key){?>
                            <div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;">
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong>Name</strong></div>
                                                <div class="col-sm-9"><?=ucfirst($key['parent_first_name'])?> <?=ucfirst($key['parent_middle_name'])?> <?=ucfirst($key['parent_last_name'])?></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;"> 
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong>Date of Birth</strong></div>
                                                <div class="col-sm-4"> <?=$key['parent_DOB']?></div>
                                                <div class="col-sm-2"> <strong>Gender</strong></div>
                                                <div class="col-sm-4"> <?=ucfirst($key['parent_gender'])?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;">
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong> Mobile No</strong></div>
                                                <div class="col-sm-4"> <?=$key['parent_mobile_number']?></div>
                                                <div class="col-sm-2"> <strong> Email ID.</strong></div>
                                                <div class="col-sm-4"> <?=$key['parent_email_id']?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;">
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong> Qualification</strong></div>
                                                <div class="col-sm-4"> <?=ucfirst($key['parent_qualification'])?></div>
                                                <div class="col-sm-2"> <strong> Occupation</strong></div>
                                                <div class="col-sm-4"> <?=ucfirst($key['parent_occupation'])?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-activity-list">
                                    <div class="feed-element" style="padding-top: 15px;">
                                        <div class="media-body ">
                                            <div class="form-group">
                                                <div class="col-sm-2"> <strong> Address</strong></div>
                                                <div class="col-sm-7"> <?=ucfirst($key['parent_house_no'])?> <?=ucfirst($key['parent_town'])?> <?=ucfirst($key['parent_tal'])?> <?=ucfirst($key['parent_dist'])?> <?=ucfirst($key['parent_state'])?> <?=ucfirst($key['parent_pincode'])?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-title" style="background: #2f4050;">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <h5  style="color: #fff;">Authetication Details</h5>
                                        </div>
                                    </div> 
                                </div>
                                <div class="ibox-content">
                                    <div class="feed-activity-list">
                                        <div class="feed-element" style="padding-top: 15px;">
                                            <div class="media-body ">
                                                <div class="form-group">
                                                    <div class="col-sm-2"> <strong> Username</strong></div>
                                                    <div class="col-sm-5"> <?=$key['credential_username']?></div>
                                                    <div class="col-sm-1"> <strong></strong></div>
                                                    <div class="col-sm-4" style="text-align:right;"> <button class="btn btn-primary btn-xs" data-toggle="modal" id ='<?=$key['parent_profile_id']?>' data-target="#resetPassword">Reset Password</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="resetPassword" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Reset Password</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" class="form-horizontal addStudent1" id="addStudent1" action="<?=site_url('Student/reset_parent_password')?>" enctype="multipart/form-data">
                                <div class="form-group hidden">
                                    <label class="col-sm-3 control-label">Parent ID</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control parent_reset_password" name="parent_id">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" name="password" id="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Confirm Password</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" name="confirm_pass">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-lg-6" style="text-align:right;">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="editFee" class="modal fade" role="dialog">
                <div class="modal-dialog" style="width:65% !important;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Student Fee Details</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" class="form-horizontal" action="<?=site_url('Student/update_student_fee_structure')?>" enctype="multipart/form-data">
                               <div class="form-group hidden">
                                    <label class="col-sm-3 control-label">Student ID</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control edit_student_profile_id" name="student_profile_id">
                                    </div>
                                </div>
                                <div class="ibox-content" style="border:none !important;">
                                    <div class="form-group" style="border-bottom: 1px solid #000000;">
                                        <label class="col-sm-1 control-label">Sr.No</label>
                                        <label class="col-sm-2 control-label" style="text-align:center;">fee Name</label>
                                        <label class="col-sm-2 control-label" style="text-align:center;">fee Category</label>
                                        <label class="col-sm-2 control-label" style="text-align:left;">fee Amount</label>
                                        <label class="col-sm-2 control-label" style="text-align:left;">fee Waiver Name</label>
                                        <label class="col-sm-2 control-label" style="text-align:left;">Waiver Amount</label>
                                        <label class="col-sm-1 control-label" style="text-align:center;">Select</label>
                                    </div>
                                    <?php $i =1; foreach ($total_fee_update as $key) { ?>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label"><?=$i++;?>)</label>
                                        <label class="col-sm-2 control-label" style="text-align:center;"><?=$key['fees_type_name']?></label>
                                        <label class="col-sm-2 control-label" style="text-align:center;"><?=$key['fee_category_name']?></label>
                                        <div class="col-sm-2" style="text-align:left;">    
                                            <input type="text" class="form-control"  name="" value="<?php  echo number_format($key['fees_type_amount'])?>" readonly>
                                            <input type="text" class="form-control hidden"  name="total_fee_amount[]" value="<?=$key['fees_type_amount']?>" readonly>
                                        </div>
                                        <div class="col-sm-2" style="text-align:left;">
                                            <input type="text" class="form-control"  name="fee_waiver_name[]" >
                                        </div>
                                        <div class="col-sm-2" style="text-align:left;">
                                            <input type="text" class="form-control"  name="fee_waiver_amount[]" value="00">
                                        </div>
                                        <div class="col-sm-1" style="text-align:center;">
                                            <?php if($key['total_fee_id'] == '') {?>
                                                <label class="checkbox-inline i-checks"> <input type="checkbox" name="fee_type_id[]" value="<?=$key['fees_type_id']?>"></label> 
                                            <?php }else{ ?>
                                                <label class="checkbox-inline i-checks"> <input type="checkbox" name="fee_type_id[]" value="<?=$key['fees_type_id']?>" checked></label> 
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-lg-6" style="text-align:right;">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
