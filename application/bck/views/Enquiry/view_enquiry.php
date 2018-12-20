        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="wrapper wrapper-content animated fadeInRight all_demo" style="padding-top: 0%;">
                <nav class="white-bg" role="navigation">
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav">
                            <li id="all_click" class="active"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> All (<?php echo $count_all_enquiry ?>)</a></li>
                            <li id="enquiry_form_click"><a><i class="fa fa-list" style="display: inline;font-size: initial;"></i> Enquiry (<?php echo $count_enquiry_form ?>) </a></li>
                            <li id="appoinment_fixed_click"><a><i class="fa fa-signal" style="display:inline;font-size: initial;"></i>Appoinment (<?php echo $count_appoinment_enquiry ?>)</a></li>
                            <li id="meeting_review_click"><a><i class="fa fa-list" style="display: inline;font-size: initial;"></i> Meeting Review (<?php echo $count_meeting_enquiry ?>)</a></li>
                            <li id="pending_conformation_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i>Pending Confirmation (<?php echo $count_pending_enquiry ?>)</a></li>
                            <li id="admitted_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Admitted Student (<?php echo $count_admitted_enquiry ?>)</a></li>
                            <li id="rejected_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Rejected Student (<?php echo $count_rejected_enquiry ?>)</a></li>
                        </ul>
                    </div>
                </nav><br>
                <div class="row">
                    <div class="col-lg-12" id="enquiry_details_view_for" style="padding-right:inherit;">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3><b>All Enquiry Details</b></h3>
                                    </div>
                                    <div class="col-sm-6" style="text-align:right;">
                                        <?php if($school_future_AY_id == 0){ ?>
                                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#start_enquiry">Start Enquiry</button>
                                        <?php } else { ?>
                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#stop_enquiry">Stop Enquiry</button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th class="hidden">Enquiry ID</th>
                                                <th>Form No.</th>
                                                <th>Admission for Class</th>
                                                <th>Student Name</th>
                                                <th>Father Name</th>
                                                <th>Mobile No.</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i = 1;
                                            foreach ($all_enquiry as $key) { ?>
                                            <tr class="enquiry_student_details">                
                                                <th><?php echo $i++; ?></th>
                                                <th class="enquiry_id hidden"><?=$key['enquiry_id']?></th>
                                                <th><?=$key['enquiry_form_no']?></th>
                                                <th><?=$key['enquiry_admission_class']?></th>
                                                <th><?=$key['enquiry_student_first_name']?> &nbsp<?=$key['enquiry_student_middle_name']?> &nbsp<?=$key['enquiry_student_last_name']?></th>
                                                <th><?=$key['enquiry_parent_first_name']?> &nbsp<?=$key['enquiry_parent_middle_name']?> &nbsp<?=$key['enquiry_parent_last_name']?></th>
                                                <th><?=$key['enquiry_parent_mobile_number']?></th>
                                                <th><?=$key['enquiry_status_details']?></th>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                    <div class="slider_down">
                        
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight enquiry_form_demo" style="padding-top: 0%;">
                <nav class="white-bg" role="navigation">
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav">
                            <li id="all_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> All (<?php echo $count_all_enquiry ?>)</a></li>
                            <li id="enquiry_form_click"  class="active"><a><i class="fa fa-list" style="display: inline;font-size: initial;"></i> Enquiry (<?php echo $count_enquiry_form ?>) </a></li>
                            <li id="appoinment_fixed_click"><a><i class="fa fa-signal" style="display:inline;font-size: initial;"></i>Appoinment (<?php echo $count_appoinment_enquiry ?>)</a></li>
                            <li id="meeting_review_click"><a><i class="fa fa-list" style="display: inline;font-size: initial;"></i> Meeting Review (<?php echo $count_meeting_enquiry ?>)</a></li>
                            <li id="pending_conformation_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i>Pending Confirmation (<?php echo $count_pending_enquiry ?>)</a></li>
                            <li id="admitted_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Admitted Student (<?php echo $count_admitted_enquiry ?>)</a></li>
                            <li id="rejected_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Rejected Student (<?php echo $count_rejected_enquiry ?>)</a></li>
                        </ul>
                    </div>
                </nav><br>
                <div class="row">
                    <div class="col-lg-12" id="enquiry_demo_details" style="padding-right:inherit;">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3><b>Enquiry Form Details</b></h3>
                                    </div>
                                    <div class="col-sm-6" style="text-align:right;">
                                        <?php if($school_future_AY_id == 0){ ?>
                                            <span class="btn btn-xs btn-primary start_enqiury">Start Enquiry</span>
                                        <?php } else { ?>
                                            <span class="btn btn-xs btn-danger stop_enqiury">Stop Enquiry</span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th class="hidden">Enquiry ID</th>
                                                <th>Form No.</th>
                                                <th>Admission for Class</th>
                                                <th>Student Name</th>
                                                <th>Father Name</th>
                                                <th>Father Mobile No.</th>
                                                <th>Address</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i = 1;
                                            foreach ($enquiry_form as $key) { ?>
                                            <tr class="enquiry_student_EF_details">                
                                                <th><?php echo $i++; ?></th>
                                                <th class="enquiry_id_form hidden"><?=$key['enquiry_id']?></th>
                                                <th class="enquiry_no_form"><?=$key['enquiry_form_no']?></th>
                                                <th><?=$key['enquiry_admission_class']?></th>
                                                <th><?=$key['enquiry_student_first_name']?> &nbsp<?=$key['enquiry_student_middle_name']?> &nbsp<?=$key['enquiry_student_last_name']?></th>
                                                <th><?=$key['enquiry_parent_first_name']?> &nbsp<?=$key['enquiry_parent_middle_name']?> &nbsp<?=$key['enquiry_parent_last_name']?></th>
                                                <th><?=$key['enquiry_parent_mobile_number']?></th>
                                                <th><?=$key['enquiry_residential_address']?></th>
                                                <!-- <th><a href="<?=site_url('Enquiry/further_process/' .$key['enquiry_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil"> Book Appoinment</i></span></th> -->
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider_down1">
                        
                    </div>
                </div>
                <div class="ibox-content status_of_enquiry make_appoinment_form">
                    <div class="row"><div class="col-sm-11">
                        <h5 style="font-size: 14px;"> Make Appoinment Details</h5></div> 
                        <div class="col-sm-1"><span class ="btn btn-xs btn-success reject_form_entry" style="float:right;"> Reject Form</span></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Enquiry/appoinment_update')?>" id="appoinment_update">
                        <div class="form-group hidden" >   
                            <label class="col-sm-2 control-label">ID</label>   
                            <div class="col-sm-3 ">
                                <input type="text" class="form-control" name="enquiry_id" id="appoinment_Id_enquiry">
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="col-sm-2 control-label">Form No</label>   
                            <div class="col-sm-3 ">
                                <input type="text" class="form-control" name="form_no" id="appoinment_form_no_enquiry" readonly>
                            </div>   
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
                <div class="ibox-content reject_form">
                    <h5 style="font-size: 14px;">Reject Form Deatils</h5> 
                    <div class="hr-line-dashed"></div>
                    <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Enquiry/reject_update')?>" id="reject_update">
                        <div class="form-group hidden" >   
                            <label class="col-sm-2 control-label">ID</label>   
                            <div class="col-sm-3 ">
                                <input type="text" class="form-control" name="enquiry_id" id="reject_Id_enquiry">
                            </div>
                        </div>
                        <div class="form-group" >
                           <label class="col-sm-2 control-label">Form No</label>   
                           <div class="col-sm-3 ">
                            <input type="text" class="form-control" name="form_no" id="appoinment_form_no_reject_enquiry" readonly>
                        </div>  
                        <label class="col-sm-2 control-label">Reason<font color="#FF0000" size="+0"><sup>*</sup></font></label>   
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
        </div>
        <div class="wrapper wrapper-content animated fadeInRight appoinment_fixed_demo" style="padding-top: 0%;">
            <nav class="white-bg" role="navigation">
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li id="all_click" ><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> All (<?php echo $count_all_enquiry ?>)</a></li>
                        <li id="enquiry_form_click"><a><i class="fa fa-list" style="display: inline;font-size: initial;"></i> Enquiry (<?php echo $count_enquiry_form ?>) </a></li>
                        <li id="appoinment_fixed_click" class="active"><a><i class="fa fa-signal" style="display:inline;font-size: initial;"></i>Appoinment (<?php echo $count_appoinment_enquiry ?>)</a></li>
                        <li id="meeting_review_click"><a><i class="fa fa-list" style="display: inline;font-size: initial;"></i> Meeting Review (<?php echo $count_meeting_enquiry ?>)</a></li>
                        <li id="pending_conformation_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i>Pending Confirmation (<?php echo $count_pending_enquiry ?>)</a></li>
                        <li id="admitted_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Admitted Student (<?php echo $count_admitted_enquiry ?>)</a></li>
                        <li id="rejected_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Rejected Student (<?php echo $count_rejected_enquiry ?>)</a></li>
                    </ul>
                </div>
            </nav><br>
            <div class="row">
                <div class="col-lg-12"id="appoint_fixed_demmo" style="padding-right:inherit;">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Appoinment's Details</b></h3>
                                </div>
                                <div class="col-sm-6" style="text-align:right;">
                                    <?php if($school_future_AY_id == 0){ ?>
                                        <span class="btn btn-xs btn-primary start_enqiury">Start Enquiry</span>
                                    <?php } else { ?>
                                        <span class="btn btn-xs btn-danger stop_enqiury">Stop Enquiry</span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th class="hidden">Enquiry ID</th>
                                            <th>Form No.</th>
                                            <th>Admission for Class</th>
                                            <th>Student Name</th>
                                            <th>Father Name</th>
                                            <th>Father Mobile No.</th>
                                            <th>Address</th>
                                            <th>Appoinment Date</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i = 1;
                                        foreach ($appoinment_enquiry as $key) { ?>
                                        <tr class="enquiry_student_status2_details">                
                                            <th><?php echo $i++; ?></th>
                                            <th class="enquiry_id_form1 hidden"><?=$key['enquiry_id']?></th>
                                            <th class="enquiry_no_form1"><?=$key['enquiry_form_no']?></th>
                                            <th><?=$key['enquiry_admission_class']?></th>
                                            <th><?=$key['enquiry_student_first_name']?> &nbsp<?=$key['enquiry_student_middle_name']?> &nbsp<?=$key['enquiry_student_last_name']?></th>
                                            <th><?=$key['enquiry_parent_first_name']?> &nbsp<?=$key['enquiry_parent_middle_name']?> &nbsp<?=$key['enquiry_parent_last_name']?></th>
                                            <th><?=$key['enquiry_parent_mobile_number']?></th>
                                            <th><?=$key['enquiry_residential_address']?></th>
                                            <th><?=$key['enquiry_appointment_date']?></th>
                                            <!-- <th><a href="<?=site_url('Enquiry/further_process/' .$key['enquiry_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil"> Meeting Review</i></span></th> -->
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider_down2">
                    
                </div>
            </div>
            <div class="ibox-content status_of_enquiry1 make_meeting_review">
                <div class="row"><div class="col-sm-11">
                    <h5 style="font-size: 14px;">Meeting Review Details</h5></div> 
                    <div class="col-sm-1"><span class ="btn btn-xs btn-success reject_form_entry1" style="float:right;"> Reject Form</span></div>
                </div> 
                <div class="hr-line-dashed"></div>
                <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Enquiry/meeting_review_update')?>" id="meeting_review_update">
                    <div class="form-group hidden" >   
                        <label class="col-sm-2 control-label">ID</label>   
                        <div class="col-sm-3 ">
                            <input type="text" class="form-control" name="enquiry_id" id="meeting_Id_enquiry">
                        </div>
                    </div>
                    <div class="form-group" >
                       <label class="col-sm-2 control-label">Form No</label>   
                       <div class="col-sm-3 ">
                        <input type="text" class="form-control" name="form_no" id="meeting_form_no_enquiry" readonly>
                    </div>     
                    <label class="col-sm-2 control-label">Meeting Review<font color="#FF0000" size="+0"><sup>*</sup></font></label>   
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
        <div class="ibox-content reject_form1">
            <h5 style="font-size: 14px;">Reject Form Deatils</h5> 
            <div class="hr-line-dashed"></div>
            <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Enquiry/reject_update')?>" id="reject_update">
                <div class="form-group hidden" >   
                    <label class="col-sm-2 control-label">ID</label>   
                    <div class="col-sm-3 ">
                        <input type="text" class="form-control" name="enquiry_id" id="meeting_reject_Id_enquiry">
                    </div>
                </div>
                <div class="form-group" >
                   <label class="col-sm-2 control-label">Form No</label>   
                   <div class="col-sm-3 ">
                    <input type="text" class="form-control" name="form_no" id="meeting_form_no_reject_enquiry" readonly>
                </div>  
                <label class="col-sm-2 control-label">Reason<font color="#FF0000" size="+0"><sup>*</sup></font></label>   
                <div class="col-sm-3">
                    <textarea cols="3" class="form-control" name="enquiry_rejected_reason"></textarea>
                </div>
            </div>
            <div class="form-group" >   
                <div class="col-sm-4 col-sm-offset-4">
                    <button class="btn btn-primary" type="submit">Save</button>
                    <span class="btn btn-white reject_cancel1" type="reset">Cancel</span>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight meeting_review_demo" style="padding-top: 0%;">
    <nav class="white-bg" role="navigation">
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li id="all_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> All (<?php echo $count_all_enquiry ?>)</a></li>
                <li id="enquiry_form_click"><a><i class="fa fa-list" style="display: inline;font-size: initial;"></i> Enquiry (<?php echo $count_enquiry_form ?>) </a></li>
                <li id="appoinment_fixed_click"><a><i class="fa fa-signal" style="display:inline;font-size: initial;"></i>Appoinment (<?php echo $count_appoinment_enquiry ?>)</a></li>
                <li id="meeting_review_click" class="active"><a><i class="fa fa-list" style="display: inline;font-size: initial;"></i> Meeting Review (<?php echo $count_meeting_enquiry ?>)</a></li>
                <li id="pending_conformation_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i>Pending Confirmation (<?php echo $count_pending_enquiry ?>)</a></li>
                <li id="admitted_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Admitted Student (<?php echo $count_admitted_enquiry ?>)</a></li>
                <li id="rejected_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Rejected Student (<?php echo $count_rejected_enquiry ?>)</a></li>
            </ul>
        </div>
    </nav><br>
    <div class="row">
        <div class="col-lg-12" id="meeting_review_demooo" style="padding-right:inherit;">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3><b>Meeting Review Details</b></h3>
                        </div>
                        <div class="col-sm-6" style="text-align:right;">
                            <?php if($school_future_AY_id == 0){ ?>
                                <span class="btn btn-xs btn-primary start_enqiury">Start Enquiry</span>
                            <?php } else { ?>
                                <span class="btn btn-xs btn-danger stop_enqiury">Stop Enquiry</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th class="hidden">Enquiry ID</th>
                                    <th>Form No.</th>
                                    <th>Admission for Class</th>
                                    <th>Student Name</th>
                                    <th>Father Name</th>
                                    <th>Father Mobile No.</th>
                                    <th>Address</th>
                                    <th>Meeting Review</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                foreach ($meeting_enquiry as $key) { ?>
                                <tr class="enquiry_student_status3_details">                
                                    <th><?php echo $i++; ?></th>
                                    <th class="enquiry_id_form2 hidden"><?=$key['enquiry_id']?></th>
                                    <th class="enquiry_no_form2"><?=$key['enquiry_form_no']?></th>
                                    <th><?=$key['enquiry_admission_class']?></th>
                                    <th><?=$key['enquiry_student_first_name']?> &nbsp<?=$key['enquiry_student_middle_name']?> &nbsp<?=$key['enquiry_student_last_name']?></th>
                                    <th><?=$key['enquiry_parent_first_name']?> &nbsp<?=$key['enquiry_parent_middle_name']?> &nbsp<?=$key['enquiry_parent_last_name']?></th>
                                    <th><?=$key['enquiry_parent_mobile_number']?></th>
                                    <th><?=$key['enquiry_residential_address']?></th>
                                    <th><?=$key['enquiry_meeting_review']?></th>
                                    <!-- <th><a href="<?=site_url('Enquiry/further_process/' .$key['enquiry_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil">Confirmation</i></span></th> -->
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider_down3">
            
        </div>
    </div>
    <div class="ibox-content status_of_enquiry2 make_pending_confirmation">
       <div class="row"><div class="col-sm-11">
        <h5 style="font-size: 14px;">Pending For Confirmation</h5></div> 
        <div class="col-sm-1"><span class ="btn btn-xs btn-success reject_form_entry2" style="float:right;"> Reject Form</span></div>
    </div>
    <div class="hr-line-dashed"></div>
    <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Enquiry/pending_confirmation_update')?>" id="pending_confirmation_update">
        <div class="form-group hidden" >   
            <label class="col-sm-2 control-label">ID</label>   
            <div class="col-sm-3 ">
                <input type="text" class="form-control" name="enquiry_id" id="PC_Id_enquiry">
            </div>
        </div>
        <div class="form-group"> 
            <label class="col-sm-2 control-label">Form No</label>   
            <div class="col-sm-3 ">
                <input type="text" class="form-control" name="form_no" id="PC_form_no_enquiry" readonly>
            </div>
        </div>
        <div class="form-group" > 
            <label class="col-sm-2 control-label">Followup Message<font color="#FF0000" size="+0"><sup>*</sup></font></label>   
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
<div class="ibox-content reject_form2">
    <h5 style="font-size: 14px;">Reject Form Deatils</h5> 
    <div class="hr-line-dashed"></div>
    <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Enquiry/reject_update')?>" id="reject_update">
        <div class="form-group hidden" >   
            <label class="col-sm-2 control-label">ID</label>   
            <div class="col-sm-3 ">
                <input type="text" class="form-control" name="enquiry_id" id="PC_reject_Id_enquiry">
            </div>
        </div>
        <div class="form-group" >
           <label class="col-sm-2 control-label">Form No</label>   
           <div class="col-sm-3 ">
            <input type="text" class="form-control" name="form_no" id="PC_form_no_reject_enquiry" readonly>
        </div>  
        <label class="col-sm-2 control-label">Reason<font color="#FF0000" size="+0"><sup>*</sup></font></label>   
        <div class="col-sm-3">
            <textarea cols="3" class="form-control" name="enquiry_rejected_reason"></textarea>
        </div>
    </div>
    <div class="form-group" >   
        <div class="col-sm-4 col-sm-offset-4">
            <button class="btn btn-primary" type="submit">Save</button>
            <span class="btn btn-white reject_cancel2" type="reset">Cancel</span>
        </div>
    </div>
</form>
</div>
</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight pending_conformation_demo" style="padding-top: 0%;">
    <nav class="white-bg" role="navigation">
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li id="all_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> All (<?php echo $count_all_enquiry ?>)</a></li>
                <li id="enquiry_form_click"><a><i class="fa fa-list" style="display: inline;font-size: initial;"></i> Enquiry (<?php echo $count_enquiry_form ?>) </a></li>
                <li id="appoinment_fixed_click"><a><i class="fa fa-signal" style="display:inline;font-size: initial;"></i>Appoinment (<?php echo $count_appoinment_enquiry ?>)</a></li>
                <li id="meeting_review_click"><a><i class="fa fa-list" style="display: inline;font-size: initial;"></i> Meeting Review (<?php echo $count_meeting_enquiry ?>)</a></li>
                <li id="pending_conformation_click" class="active"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i>Pending Confirmation (<?php echo $count_pending_enquiry ?>)</a></li>
                <li id="admitted_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Admitted Student (<?php echo $count_admitted_enquiry ?>)</a></li>
                <li id="rejected_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Rejected Student (<?php echo $count_rejected_enquiry ?>)</a></li>
            </ul>
        </div>
    </nav><br>
    <div class="row">
        <div class="col-lg-12" style="padding-right:inherit;">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3><b>Pending Confirmation Details</b></h3>
                        </div>
                        <div class="col-sm-6" style="text-align:right;">
                            <?php if($school_future_AY_id == 0){ ?>
                                <span class="btn btn-xs btn-primary start_enqiury">Start Enquiry</span>
                            <?php } else { ?>
                                <span class="btn btn-xs btn-danger stop_enqiury">Stop Enquiry</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                   <th>Sr No.</th>
                                   <th>Form No.</th>
                                   <th>Student Name</th>
                                   <th>Student DOB</th>
                                   <th>Student Gender</th>
                                   <th>Father Name</th>
                                   <th>Father Mobile No.</th>
                                   <th>Father Email ID</th>
                                   <th>Address</th>
                                   <th>Previous School Name</th>
                                   <th>Previous School leaving Reason</th>
                                   <th>Phone No.</th>
                                   <th>Notes</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                            <?php 
                            $i = 1;
                            foreach ($pending_enquiry as $key) { ?>
                            <tr>                
                                <th><?php echo $i++; ?></th>
                                <th><?=$key['enquiry_form_no']?></th>
                                <th><?=$key['enquiry_student_first_name']?> &nbsp<?=$key['enquiry_student_middle_name']?> &nbsp<?=$key['enquiry_student_last_name']?></th>
                                <th><?=$key['enquiry_student_DOB']?></th>
                                <th><?=$key['enquiry_student_gender']?></th>
                                <th><?=$key['enquiry_parent_first_name']?> &nbsp<?=$key['enquiry_parent_middle_name']?> &nbsp<?=$key['enquiry_parent_last_name']?></th>
                                <th><?=$key['enquiry_parent_mobile_number']?></th>
                                <th><?=$key['enquiry_parent_email_id']?></th>
                                <th><?=$key['enquiry_residential_address']?></th>
                                <th><?=$key['student_privious_school_name']?></th>
                                <th><?=$key['student_privious_school_left_reason']?></th>
                                <th><?=$key['enquiry_phone_number']?></th>
                                <th><?=$key['enquiry_expectations']?></th>
                                <th><a href="<?=site_url('Enquiry/student_admitted/' .$key['enquiry_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-check-square-o" title="Admitted to school"></i></span></th>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight admitted_demo" style="padding-top: 0%;">
    <nav class="white-bg" role="navigation">
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li id="all_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> All (<?php echo $count_all_enquiry ?>)</a></li>
                <li id="enquiry_form_click"><a><i class="fa fa-list" style="display: inline;font-size: initial;"></i> Enquiry (<?php echo $count_enquiry_form ?>) </a></li>
                <li id="appoinment_fixed_click"><a><i class="fa fa-signal" style="display:inline;font-size: initial;"></i>Appoinment (<?php echo $count_appoinment_enquiry ?>)</a></li>
                <li id="meeting_review_click"><a><i class="fa fa-list" style="display: inline;font-size: initial;"></i> Meeting Review (<?php echo $count_meeting_enquiry ?>)</a></li>
                <li id="pending_conformation_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i>Pending Confirmation (<?php echo $count_pending_enquiry ?>)</a></li>
                <li id="admitted_click" class="active"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Admitted Student (<?php echo $count_admitted_enquiry ?>)</a></li>
                <li id="rejected_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Rejected Student (<?php echo $count_rejected_enquiry ?>)</a></li>
            </ul>
        </div>
    </nav><br>
    <div class="row">
        <div class="col-lg-12" id="admitted_demoo" style="padding-right:inherit;">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3><b>Admitted Student Details</b></h3>
                        </div>
                        <div class="col-sm-6" style="text-align:right;">
                            <?php if($school_future_AY_id == 0){ ?>
                                <span class="btn btn-xs btn-primary start_enqiury">Start Enquiry</span>
                            <?php } else { ?>
                                <span class="btn btn-xs btn-danger stop_enqiury">Stop Enquiry</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th class="hidden">Enquiry ID</th>
                                    <th>Form No.</th>
                                    <th>Student Name</th>
                                    <th>Father Name</th>
                                    <th>Father Mobile No.</th>
                                    <th>Address</th>
                                    <th>Notes</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                foreach ($admitted_enquiry as $key) { ?>
                                <tr class="enquiry_student_status5_details">                
                                    <th><?php echo $i++; ?></th>
                                    <th class="enquiry_id_6 hidden"><?=$key['enquiry_id']?></th>
                                    <th><?=$key['enquiry_form_no']?></th>
                                    <th><?=$key['enquiry_student_first_name']?> &nbsp<?=$key['enquiry_student_middle_name']?> &nbsp<?=$key['enquiry_student_last_name']?></th>
                                    <th><?=$key['enquiry_parent_first_name']?> &nbsp<?=$key['enquiry_parent_middle_name']?> &nbsp<?=$key['enquiry_parent_last_name']?></th>
                                    <th><?=$key['enquiry_parent_mobile_number']?></th>
                                    <th><?=$key['enquiry_residential_address']?></th>
                                    <th><?=$key['enquiry_expectations']?></th>
                                    <!-- <th><a href="<?=site_url('Exam/Edit_exam/' .$key['exam_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil"> Edit</i></span></th> -->
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider_down6">
            
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight rejected_demo" style="padding-top: 0%;">
    <nav class="white-bg" role="navigation">
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li id="all_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> All (<?php echo $count_all_enquiry ?>)</a></li>
                <li id="enquiry_form_click"><a><i class="fa fa-list" style="display: inline;font-size: initial;"></i> Enquiry (<?php echo $count_enquiry_form ?>) </a></li>
                <li id="appoinment_fixed_click"><a><i class="fa fa-signal" style="display:inline;font-size: initial;"></i>Appoinment (<?php echo $count_appoinment_enquiry ?>)</a></li>
                <li id="meeting_review_click"><a><i class="fa fa-list" style="display: inline;font-size: initial;"></i> Meeting Review (<?php echo $count_meeting_enquiry ?>)</a></li>
                <li id="pending_conformation_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i>Pending Confirmation (<?php echo $count_pending_enquiry ?>)</a></li>
                <li id="admitted_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Admitted Student (<?php echo $count_admitted_enquiry ?>)</a></li>
                <li id="rejected_click" class="active"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Rejected Student (<?php echo $count_rejected_enquiry ?>)</a></li>
            </ul>
        </div>
    </nav><br>
    <div class="row">
        <div class="col-lg-12" id="rejected_demoo" style="padding-right:inherit;">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3><b>Rejected Student Details</b></h3>
                        </div>
                        <div class="col-sm-6" style="text-align:right;">
                            <?php if($school_future_AY_id == 0){ ?>
                                <span class="btn btn-xs btn-primary start_enqiury">Start Enquiry</span>
                            <?php } else { ?>
                                <span class="btn btn-xs btn-danger stop_enqiury">Stop Enquiry</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th class="hidden">Enquiry ID</th>
                                    <th>Form No.</th>
                                    <th>Student Name</th>
                                    <th>Father Name</th>
                                    <th>Father Mobile No.</th>
                                    <th>Address</th>
                                    <th>Rejected Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                foreach ($rejected_enquiry as $key) { ?>
                                <tr class="enquiry_student_status7_details">                
                                    <th><?php echo $i++; ?></th>
                                    <th class="enquiry_id_7 hidden"><?=$key['enquiry_id']?></th>
                                    <th><?=$key['enquiry_form_no']?></th>
                                    <th><?=$key['enquiry_student_first_name']?> &nbsp<?=$key['enquiry_student_middle_name']?> &nbsp<?=$key['enquiry_student_last_name']?></th>
                                    <th><?=$key['enquiry_parent_first_name']?> &nbsp<?=$key['enquiry_parent_middle_name']?> &nbsp<?=$key['enquiry_parent_last_name']?></th>
                                    <th><?=$key['enquiry_parent_mobile_number']?></th>
                                    <th><?=$key['enquiry_residential_address']?></th>
                                    <th><?=$key['enquiry_rejected_reason']?></th>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider_down7">
            
        </div>
    </div>
</div>
</div>
</div>
<div id="start_enquiry" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Enquiry Acadmic Year</h4>
            </div>
            <div class="modal-body">
                <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addEnquiry_AY" action="<?=site_url('Enquiry/enquiry_year')?>">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Acadmic Year<span style="color:red;">*</span></label>
                        <div class="col-lg-5">
                            <select name="school_future_AY_id" class="form-control">
                                <option value="0">Select Year</option>
                                <?php foreach ($acadmic_year as $key) { ?>
                                    <option value="<?=$key['AY_id']?>"><?=$key['AY_name']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-3 ">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
        </div>
    </div>
</div>
<div id="stop_enquiry" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Enquiry Acadmic Year</h4>
            </div>
            <div class="modal-body">
                <form method="post" class="form-horizontal" enctype="multipart/form-data" id="" action="<?=site_url('Enquiry/stop_enquiry')?>">
                    <div class="form-group">
                        <label class="col-lg-12 control-label"><center><h3>Do you really want to stop the enquiry ?</h3></center></label>
                        
                        <div class="col-sm-12 "><br></div>
                        <div class="col-sm-12 "><center>
                            <button class="btn btn-primary btn-xs" type="submit">Submit</button>
                            <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
             </div>
        </div>
    </div>
</div>
</div>
</div>