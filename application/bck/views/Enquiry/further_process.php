<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="ibox float-e-margins">
              <div class="enquiry_details">
               <div class="ibox-title">
                   <div class="row">
                        <div class="col-md-10">
                           <h2  style="text-align: left;color: #2b2fa2;font-weight: bold;">Enquiry Process</h2>
                        </div>
                        <div class="col-md-2">
                            <span class ="btn btn-xs btn-success reject_form_entry" style="float:right;"> Reject Form</span>
                        </div>
                   </div>
                    <?php if ($enquiry_process[0]['enquiry_status'] == 1) { ?>
                    <div class="ibox-content status_of_enquiry" style="background-color: #f6f6f7;">
                        <h5 style="font-size: 14px;"> Make Appoinment Details</h5> 
                        <div class="hr-line-dashed"></div>
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Enquiry/appoinment_update')?>" id="appoinment_update">
                            <div class="form-group hidden" >   
                                <label class="col-sm-2 control-label">ID</label>   
                                <div class="col-sm-3 ">
                                    <input type="text" class="form-control" name="enquiry_id" value="<?php echo $enquiry_process[0]['enquiry_id'];?>" >
                                </div>
                            </div>
                            <div class="form-group" >   
                                <label class="col-sm-2 control-label">Appoinment Date <font color="#FF0000" size="+0"><sup>*</sup></font></label>   
                                <div class="col-sm-3 input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="enquiry_appointment_date" readonly>
                                </div>
                            </div>
                            <div class="form-group" >   
                                <div class="col-sm-4 col-sm-offset-4">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php } ?>
                    <?php if ($enquiry_process[0]['enquiry_status'] == 2) { ?>
                    <div class="ibox-content status_of_enquiry" style="background-color: #f6f6f7;">
                        <h5 style="font-size: 14px;"> Meeting Review Details</h5> 
                        <div class="hr-line-dashed"></div>
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Enquiry/meeting_review_update')?>" id="meeting_review_update">
                            <div class="form-group hidden" >   
                                <label class="col-sm-2 control-label">ID</label>   
                                <div class="col-sm-3 ">
                                    <input type="text" class="form-control" name="enquiry_id" value="<?php echo $enquiry_process[0]['enquiry_id'];?>" >
                                </div>
                            </div>
                            <div class="form-group" >   
                                <label class="col-sm-2 control-label">Meeting Review</label>   
                                <div class="col-sm-3 ">
                                    <textarea cols="3" class="form-control" name="enquiry_meeting_review"></textarea>
                                </div>
                            </div>
                            <div class="form-group" >   
                                <div class="col-sm-4 col-sm-offset-4">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php } ?>
                    <?php if ($enquiry_process[0]['enquiry_status'] == 3) { ?>
                    <div class="ibox-content status_of_enquiry" style="background-color: #f6f6f7;">
                        <h5 style="font-size: 14px;">Pending For Confirmation</h5> 
                        <div class="hr-line-dashed"></div>
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Enquiry/pending_confirmation_update')?>" id="pending_confirmation_update">
                            <div class="form-group hidden" >   
                                <label class="col-sm-2 control-label">ID</label>   
                                <div class="col-sm-3 ">
                                    <input type="text" class="form-control" name="enquiry_id" value="<?php echo $enquiry_process[0]['enquiry_id'];?>" >
                                </div>
                            </div>
                            <div class="form-group" > 
                                <label class="col-sm-2 control-label">Followup Message</label>   
                                <div class="col-sm-3">
                                    <textarea cols="3" class="form-control" name="enquiry_followup_msg"></textarea>
                                </div>
                                <label class="col-sm-2 control-label">Followup Date <font color="#FF0000" size="+0"><sup>*</sup></font></label>   
                                <div class="col-sm-3 input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="enquiry_followup_date" readonly>
                                </div>
                            </div>
                            <div class="form-group" >   
                                <div class="col-sm-4 col-sm-offset-4">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php } ?>
                    <div class="ibox-content reject_form" style="background-color: #f6f6f7;">
                        <h5 style="font-size: 14px;">Reject Form Deatils</h5> 
                        <div class="hr-line-dashed"></div>
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Enquiry/reject_update')?>" id="reject_update">
                            <div class="form-group hidden" >   
                                <label class="col-sm-2 control-label">ID</label>   
                                <div class="col-sm-3 ">
                                    <input type="text" class="form-control" name="enquiry_id" value="<?php echo $enquiry_process[0]['enquiry_id'];?>" >
                                </div>
                            </div>
                            <div class="form-group" > 
                                <label class="col-sm-2 control-label">Reason</label>   
                                <div class="col-sm-3">
                                    <textarea cols="3" class="form-control" name="enquiry_rejected_reason"></textarea>
                                </div>
                            </div>
                            <div class="form-group" >   
                                <div class="col-sm-4 col-sm-offset-4">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <span class="btn btn-white reject_cancel" type="reset">Cancel</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content" style="background-color: #f6f6f7;">
                        <h5 style="font-size: 14px;"> Student Details</h5> 
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Effective Date :</label>   
                            <label class="col-sm-1 control-label" style="text-align:left;color:#337ab7;"><?php echo $enquiry_process[0]['enquiry_effective_date']; ?></label>
                            <label class="col-sm-2 control-label">Form No :</label>   
                            <label class="col-sm-1 control-label" style="text-align:left;color:#337ab7;"><?php echo $enquiry_process[0]['enquiry_form_no'] ?></label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Student Name :</label>   
                            <label class="col-sm-4 control-label" style="text-align:left;color:#337ab7;"><?php echo $enquiry_process[0]['enquiry_student_first_name'] ?>&nbsp <?php echo $enquiry_process[0]['enquiry_student_middle_name'] ?>&nbsp <?php echo $enquiry_process[0]['enquiry_student_last_name']; ?></label>
                            <label class="col-sm-2 control-label">Date of Birth :</label>   
                            <label class="col-sm-2 control-label" style="text-align:left;color:#337ab7;"><?php echo $enquiry_process[0]['enquiry_student_DOB'] ?></label>
                            <label class="col-sm-1 control-label">Gender :</label>   
                            <label class="col-sm12 control-label" style="text-align:left;color:#337ab7;"><?php  echo $enquiry_process[0]['enquiry_student_gender']?></label>
                        </div>
                    </div>
                    <div class="ibox-content"  style="background-color: #f6f6f7;">
                        <h5 style="font-size: 14px;">Father's Details</h5> 
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name :</label>
                            <label class="col-sm-5 control-label" style="text-align:left;color:#337ab7;"><?php  echo $enquiry_process[0]['enquiry_parent_first_name'] ?>&nbsp <?php echo $enquiry_process[0]['enquiry_parent_middle_name'] ?>&nbsp <?php echo $enquiry_process[0]['enquiry_parent_last_name'];?></label>
                            <label class="col-sm-2 control-label">Mobile No. :</label>
                            <label class="col-sm-2 control-label" style="text-align:left;color:#337ab7;"><?php echo $enquiry_process[0]['enquiry_parent_mobile_number'] ?></label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email ID. :</label>
                            <label class="col-sm-2 control-label" style="text-align:left;color:#337ab7;"><?php echo $enquiry_process[0]['enquiry_parent_email_id'] ?></label>
                            <label class="col-sm-2 control-label">Occupation. :</label>
                            <label class="col-sm-2 control-label" style="text-align:left;color:#337ab7;"><?php echo $enquiry_process[0]['enquiry_parent_occupation'] ?></label>
                            <label class="col-sm-2 control-label">Place of work.:</label>
                            <label class="col-sm-2 control-label" style="text-align:left;color:#337ab7;"><?php echo $enquiry_process[0]['enquiry_parent_place_of_work']; ?></label>
                        </div>
                    </div>
                    <div class="ibox-content"  style="background-color: #f6f6f7;">
                        <h5 style="font-size: 14px;">Mother's Details</h5>     
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name :</label>                                     
                            <label class="col-sm-5 control-label" style="text-align:left;color:#337ab7;"><?php  echo $enquiry_process[0]['enquiry_mother_first_name'] ?>&nbsp <?php echo $enquiry_process[0]['enquiry_mother_middle_name'] ?>&nbsp <?php echo $enquiry_process[0]['enquiry_mother_last_name'];?></label>
                            <label class="col-sm-2 control-label">Mobile No. :</label>
                            <label class="col-sm-2 control-label" style="text-align:left;color:#337ab7;"><?php  echo $enquiry_process[0]['enquiry_mother_mobile_number']?></label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email ID.:</label>
                            <label class="col-sm-2 control-label" style="text-align:left;color:#337ab7;"><?php echo $enquiry_process[0]['enquiry_mother_email_id'] ?></label>
                            <label class="col-sm-2 control-label">Occupation. :</label>
                            <label class="col-sm-2 control-label" style="text-align:left;color:#337ab7;"><?php echo $enquiry_process[0]['enquiry_mother_occupation'] ?></label>
                            <label class="col-sm-2 control-label">Place of work. :</label>
                            <label class="col-sm-2 control-label" style="text-align:left;color:#337ab7;"><?php echo $enquiry_process[0]['enquiry_mother_place_of_work'] ?></label>
                        </div>
                    </div>
                    <div class="ibox-content"  style="background-color: #f6f6f7;">
                        <h5 style="font-size: 14px;">Previous School Details</h5> 
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">School Name :</label>
                            <label class="col-sm-2 control-label" style="text-align:left;color:#337ab7;"><?php  echo $enquiry_process[0]['student_privious_school_name'] ?></label>
                            <label class="col-sm-2 control-label">School Duration :</label>
                            <label class="col-sm-2 control-label" style="text-align:left;color:#337ab7;"><?php echo $enquiry_process[0]['student_privious_school_duration'] ?></label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Last Attend Class :</label>
                            <label class="col-sm-2 control-label" style="text-align:left;color:#337ab7;"><?php echo $enquiry_process[0]['student_last_attend_class'] ?></label>
                            <label class="col-sm-2 control-label">Reason :</label>
                            <label class="col-sm-6 control-label" style="text-align:left;color:#337ab7;"><?php echo $enquiry_process[0]['student_privious_school_left_reason'] ?></label>
                        </div>
                    </div>
                    <div class="ibox-content"  style="background-color: #f6f6f7;">
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Phone Number :</label>
                        <label class="col-sm-2 control-label" style="text-align:left;color:#337ab7;"><?php echo $enquiry_process[0]['enquiry_phone_number'] ?></label>
                        <label class="col-lg-2 control-label">Parent Address :</label>
                        <label class="col-sm-6 control-label" style="text-align:left;color:#337ab7;"><?php echo $enquiry_process[0]['enquiry_residential_address'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Your expectation from the school :</label>
                        <label class="col-sm-8 control-label" style="text-align:left;color:#337ab7;"><?php echo $enquiry_process[0]['enquiry_expectations'] ?></label>
                    </div>
            </div>
        </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>