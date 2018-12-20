    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#term_demo">Term</a></li>
                <li class=""><a data-toggle="tab" href="#exam_demo">Exam</a></li>
                <li class=""><a data-toggle="tab" href="#internal_exam_demo">Internal Exam</a></li>
                <li class=""><a data-toggle="tab" href="#exam_marks_demo">Exam Marks</a></li>
                <li class=""><a data-toggle="tab" href="#internal_exam_marks_demo">Internal Exam Marks</a></li>
                <li class=""><a data-toggle="tab" href="#grade_scale_demo">Grade Scale</a></li>
            </ul>
            <div class="tab-content">
                <div id="term_demo" class="tab-pane active">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12" style="padding-right:inherit;">
                                <div class="ibox float-e-margins">
                                    <?php if ($user_type == 3) { ?>
                                    <div class="ibox-title" style="border:none !important;">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3 class="new_term"><b>New Term</b></h3>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="ibox-tools">
                                                    <span class="btn btn-xs btn-primary" id="new_term"><i class="fa fa-plus"></i></span>     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content new_term">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addTerm" action="<?=site_url('Exam/term_registration')?>">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Term Name<span style="color:red;">*</span></label>
                                                <div class="col-lg-3">
                                                    <input type="text" class="form-control" name="term_name">
                                                </div>
                                                <label class="col-lg-2 control-label">Term Start Date</label>
                                                <div class="col-lg-3">
                                                    <input type="text" placeholder="Start Date" name="term_start_date" class="form-control datepicker" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Term End Date</label>
                                                <div class="col-lg-3">
                                                    <input type="text" placeholder="End Date" name="term_end_date" class="form-control datepicker" readonly>
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group">
                                                <div class="col-sm-5 col-sm-offset-3">
                                                    <button class="btn btn-white close_data" type="reset">Cancel</button>
                                                    <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php } ?>
                                    <div class="ibox-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3><b>Term Details</b></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Sr No.</th>
                                                        <th>Term Name</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <!-- <th>Action</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $i = 1;
                                                    foreach ($term_details as $key) { ?>
                                                    <tr>                
                                                        <th><?php echo $i++; ?></th>
                                                        <th><?=$key['term_name']?></th>
                                                        <th><?=$key['term_start_date']?></th>
                                                        <th><?=$key['term_end_date']?></th>
                                                        <!-- <th><a href="<?=site_url('Exam/Edit_exam/' .$key['exam_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil"> Edit</i></span></th> -->
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
                </div>
                <div id="exam_demo" class="tab-pane">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12" style="padding-right:inherit;">
                                <div class="ibox float-e-margins">
                                    <?php if ($user_type == 3) { ?>
                                    <div class="ibox-title" style="border:none !important;">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3 class="new_exam"><b>New Exam</b></h3>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="ibox-tools">
                                                    <span class="btn btn-xs btn-primary" id="new_exam"><i class="fa fa-plus"></i></span>     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content new_exam">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addExam" action="<?=site_url('Exam/exam_registration')?>">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Exam Name<span style="color:red;">*</span></label>
                                                <div class="col-lg-3">
                                                   <input type="text" class="form-control" name="exam_name" placeholder="Exam Name">
                                               </div>
                                               <label class="col-lg-2 control-label">Total Weightage<span style="color:red;">*</span></label>
                                               <div class="col-lg-3">
                                                    <input type="text" placeholder="Total Weightage" name="exam_total_weightage" class="form-control">
                                                </div>
                                            </div>                            
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"> Term <span style="color:red;">*</span></label>
                                                <div class="col-lg-3">
                                                    <Select name="exam_term_id" class="form-control" required>
                                                        <option>Select Term</option>
                                                        <?php foreach ($term_details as $key) { ?>
                                                        <option value="<?=$key['term_id']?>"><?=$key['term_name']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group">
                                                <div class="col-sm-5 col-sm-offset-3">
                                                    <button class="btn btn-white close_data" type="reset">Cancel</button>
                                                    <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php } ?>
                                    <div class="ibox-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3><b>Exam Details</b></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Sr No.</th>
                                                        <th>Exam Name</th>
                                                        <th>Total Weightage</th>
                                                        <th>Term Name</th>
                                                        <!-- <th>Action</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $i = 1;
                                                    foreach ($exam_details as $key) { ?>
                                                    <tr>                
                                                        <th><?php echo $i++; ?></th>
                                                        <th><?=$key['exam_name']?></th>
                                                        <th><?=$key['exam_total_weightage']?></th>
                                                        <th><?=$key['term_name']?></th>
                                                        <!-- <th><a href="<?=site_url('Exam/Edit_exam/' .$key['exam_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil"> Edit</i></span></th> -->
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
                </div>
                <div id="internal_exam_demo" class="tab-pane">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12" style="padding-right:inherit;">
                                <div class="ibox float-e-margins">
                                    <?php if ($user_type == 5) { ?>
                                    <div class="ibox-title" style="border:none !important;">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3 class="new_internal_exam"><b>Internal Exam</b></h3>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="ibox-tools">
                                                    <span class="btn btn-xs btn-primary" id="new_internal_exam"><i class="fa fa-plus"></i> </span>     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content new_internal_exam">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addIExam" action="<?=site_url('Exam/internal_exam_registration')?>">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"> Exam <span style="color:red;">*</span></label>
                                                <div class="col-lg-3">
                                                    <Select name="IE_exam_sched_id" class="form-control" required>
                                                        <option>Select Exam</option>
                                                        <?php foreach ($exam_sched_details as $key) { ?>
                                                        <option value="<?=$key['exam_sched_id']?>"><?=$key['exam_sched_name']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <label class="col-lg-2 control-label"> Class Subject <span style="color:red;">*</span></label>
                                                <div class="col-lg-3">
                                                    <select name="IE_TCDS_id" class="form-control" required>
                                                        <option>Select Exam</option>
                                                        <?php foreach ($school_TCDS as $key) { ?>
                                                        <option value="<?=$key['TCDS_id']?>"><?=$key['class_name']?> <?=$key['division_name']?> <?=$key['subject_name']?> <?=$key['subject_type']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Internal Exam Name<span style="color:red;">*</span></label>
                                                <div class="col-lg-3">
                                                   <input type="text" class="form-control" name="IE_title" placeholder="Internal Exam Name">
                                               </div>
                                               <label class="col-lg-2 control-label">Submission Date<span style="color:red;">*</span></label>
                                               <div class="col-lg-3">
                                                    <input type="text" placeholder="Submission Date" name="IE_submission_date" class="form-control datepicker" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Descripation<span style="color:red;">*</span></label>
                                                <div class="col-lg-3">
                                                   <textarea cols="3" rows="3" class="form-control" name="IE_description" placeholder="Internal Exam Descripation"></textarea>
                                               </div>
                                               <label class="col-lg-2 control-label">Photo</label>
                                               <div class="col-sm-3">
                                                <input type="file" name="IE_photo" class="form-control" accept="image/jpeg, image/png, image/gif" style="border:none;">
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group">
                                                <div class="col-sm-5 col-sm-offset-3">
                                                    <button class="btn btn-white close_data" type="reset">Cancel</button>
                                                    <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php } ?>
                                    <div class="ibox-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3><b>Internal Exam Details</b></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Sr No.</th>
                                                        <th>Exam Name</th>
                                                        <th>Internal Exam Name</th>
                                                        <th>Description</th>
                                                        <th>Submission Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $i = 1;
                                                    foreach ($IE_details as $key) { ?>
                                                    <tr>                
                                                        <th><?php echo $i++; ?></th>
                                                        <th><?=$key['exam_sched_name']?></th>
                                                        <th><?=$key['IE_title']?></th>
                                                        <th><?=$key['IE_description']?></th>
                                                        <th><?=$key['IE_submission_date']?></th>
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
                </div>
                <div id="exam_marks_demo" class="tab-pane">
                    <div class="panel-body">
                        <div class="row">
                        <div class="col-lg-12" style="padding-right:inherit;">
                            <?php if ($user_type == 5) {?>
                            <div class="ibox float-e-margins">
                                <div class="ibox-title" style="border:none !important">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3 class="new_exam_marks"><b>Exam Marks</b></h3>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="ibox-tools">
                                                <span class="btn btn-xs btn-primary" id="new_exam_marks"> Add </span>     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content new_exam_marks">
                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addEMark" action="<?=site_url('Exam/exam_mark_registration')?>">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label"> Exam <span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                <Select name="exam_marks_exam_id" class="form-control exam_name" required>
                                                    <option>Select Exam</option>
                                                    <?php foreach ($exam_details as $key) { ?>
                                                    <option value="<?=$key['exam_id']?>"><?=$key['exam_name']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <label class="col-lg-2 control-label"> Exam Schedule <span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                <Select name="exam_marks_exam_sched_id" class="form-control ES_name" required>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label"> Student <span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                <Select name="exam_marks_student_id" class="form-control">
                                                    <option>Select Student</option>
                                                    <?php foreach ($school_student as $key) {?>
                                                    <option value="<?=$key['student_profile_id']?>"><?=$key['student_last_name']?> <?=$key['student_first_name']?> <?=$key['student_middle_name']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <label class="col-lg-2 control-label">Exam Marks<span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                <input type="text" placeholder="Obtained Exam Marks" name="exam_marks" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Exam Weightage<span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                <input type="text" placeholder="Exam Weightage" name="exam_weightage" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-5 col-sm-offset-3">
                                                <button class="btn btn-white close_data" type="reset">Cancel</button>
                                                <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Exam Marks Details</b></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Student Name</th>
                                                    <th>Exam Name</th>
                                                    <th>Exam Sched Name</th>
                                                    <th>Obtained Marks</th>
                                                    <th>Marks Weightage</th>
                                                    <!-- <th>Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i = 1;
                                                foreach ($fetch_teacher_exam_marks as $key) { ?>
                                                <tr>                
                                                    <th><?php echo $i++; ?></th>
                                                    <th><?=$key['student_last_name']?> <?=$key['student_first_name']?> <?=$key['student_middle_name']?></th>
                                                    <th><?=$key['exam_name']?></th>
                                                    <th><?=$key['exam_sched_name']?></th>
                                                    <th><?=$key['exam_marks']?></th>
                                                    <th><?=$key['exam_weightage']?></th>
                                                    <!-- <th><a href="<?=site_url('Exam/Edit_exam/' .$key['exam_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil"> Edit</i></span></th> -->
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if ($user_type == 3) { ?>
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Exam Marks Details</b></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Student Name</th>
                                                    <th>Exam Name</th>
                                                    <th>Exam Sched Name</th>
                                                    <th>Obtained Marks</th>
                                                    <th>Marks Weightage</th>
                                                    <!-- <th>Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i = 1;
                                                foreach ($fetch_exam_marks as $key) { ?>
                                                <tr>                
                                                    <th><?php echo $i++; ?></th>
                                                    <th><?=$key['student_last_name']?> <?=$key['student_first_name']?> <?=$key['student_middle_name']?></th>
                                                    <th><?=$key['exam_name']?></th>
                                                    <th><?=$key['exam_sched_name']?></th>
                                                    <th><?=$key['exam_marks']?></th>
                                                    <th><?=$key['exam_weightage']?></th>
                                                    <!-- <th><a href="<?=site_url('Exam/Edit_exam/' .$key['exam_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil"> Edit</i></span></th> -->
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
                <div id="internal_exam_marks_demo" class="tab-pane">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12" style="padding-right:inherit;">
                                <div class="ibox float-e-margins">
                                    <?php if ($user_type == 5) { ?>
                                    <div class="ibox-title" style="border:none !important">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3 class="new_internal_exam_marks"><b>Internal Exam Marks</b></h3>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="ibox-tools">
                                                    <span class="btn btn-xs btn-primary" id="new_internal_exam_marks"><i class="fa fa-plus"></i> </span>     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content new_internal_exam_marks">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addIExam_marks" action="<?=site_url('Exam/IE_mark_registration')?>">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"> Internal Exam <span style="color:red;">*</span></label>
                                                <div class="col-lg-3">
                                                    <Select name="IEM_IE_id" class="form-control" required>
                                                        <option>Select Internal Exam</option>
                                                        <?php foreach ($IE_details as $key) { ?>
                                                        <option value="<?=$key['IE_id']?>"><?=$key['IE_title']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <label class="col-lg-2 control-label"> Student <span style="color:red;">*</span></label>
                                                <div class="col-lg-3">
                                                    <Select name="IEM_student_id" class="form-control">
                                                        <option>Select Student</option>
                                                        <?php foreach ($school_student as $key) {?>
                                                        <option value="<?=$key['student_profile_id']?>"><?=$key['student_last_name']?> <?=$key['student_first_name']?> <?=$key['student_middle_name']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Marks<span style="color:red;">*</span></label>
                                                <div class="col-lg-3">
                                                    <input type="text" placeholder="Obtained Marks" name="IEM_marks" class="form-control">
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group">
                                                <div class="col-sm-5 col-sm-offset-3">
                                                    <button class="btn btn-white close_data" type="reset">Cancel</button>
                                                    <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="ibox-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3><b>Exam Details</b></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Sr No.</th>
                                                        <th>Student Name</th>
                                                        <th>Internal Exam Name</th>
                                                        <th>Obtained Marks</th>
                                                        <!-- <th>Action</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $i = 1;
                                                    foreach ($fetch_teacher_IE_exam as $key) { ?>
                                                    <tr>                
                                                        <th><?php echo $i++; ?></th>
                                                        <th><?=$key['student_last_name']?> <?=$key['student_first_name']?> <?=$key['student_middle_name']?></th>
                                                        <th><?=$key['IE_title']?></th>
                                                        <th><?=$key['IEM_marks']?></th>
                                                        <!-- <th><a href="<?=site_url('Exam/Edit_exam/' .$key['exam_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil"> Edit</i></span></th> -->
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php if ($user_type == 3) { ?>
                                    <div class="ibox-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3><b>Internal Exam Marks</b></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Sr No.</th>
                                                        <th>Student Name</th>
                                                        <th>Internal Exam Name</th>
                                                        <th>Obtained Marks</th>
                                                        <!-- <th>Action</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $i = 1;
                                                    foreach ($fetch_IE_marks as $key) { ?>
                                                    <tr>                
                                                        <th><?php echo $i++; ?></th>
                                                        <th><?=$key['student_last_name']?> <?=$key['student_first_name']?> <?=$key['student_middle_name']?></th>
                                                        <th><?=$key['IE_title']?></th>
                                                        <th><?=$key['IEM_marks']?></th>
                                                        <!-- <th><a href="<?=site_url('Exam/Edit_exam/' .$key['exam_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil"> Edit</i></span></th> -->
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
                </div>
                <div id="grade_scale_demo" class="tab-pane">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12" style="padding-right:inherit;">
                                <div class="ibox float-e-margins">
                                    <?php if ($user_type == 3) { ?>
                                    <div class="ibox-title" style="border:none !important;">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3 class="new_grade"><b>Assign Grade Scale</b></h3>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="ibox-tools">
                                                    <span class="btn btn-xs btn-primary" id="new_grade"><i class="fa fa-plus"></i></span>     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content new_grade">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addGrade" action="<?=site_url('Exam/grade_registration')?>">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Grade<span style="color:red;">*</span></label>
                                                <div class="col-lg-3">
                                                   <input type="text" class="form-control" name="GC_grade" placeholder="Grade Name">
                                               </div>
                                               <label class="col-lg-2 control-label">Higher Mark Range<span style="color:red;">*</span></label>
                                               <div class="col-lg-3">
                                                   <input type="text" class="form-control" name="GC_higher_mark_range" placeholder=" Higher Mark Range">
                                               </div>
                                           </div>
                                           <div class="form-group">
                                               <label class="col-lg-2 control-label">Lower Mark Range<span style="color:red;">*</span></label>
                                               <div class="col-lg-3">
                                                   <input type="text" class="form-control" name="GC_lower_mark_range" id="lower_mark_range" placeholder=" Lower Mark Range">
                                               </div>
                                           </div>
                                           <div class="hr-line-dashed"></div>
                                           <div class="form-group">
                                            <div class="col-sm-5 col-sm-offset-3">
                                                <button class="btn btn-white close_data" type="reset">Cancel</button>
                                                <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <?php } ?>
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Grade Details</b></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Grade</th>
                                                    <th>Higher Mark</th>
                                                    <th>Lower Mark</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i = 1;
                                                foreach ($grade_details as $key) { ?>
                                                <tr>                
                                                    <th><?php echo $i++; ?></th>
                                                    <th><?=$key['GC_grade']?></th>
                                                    <th><?=$key['GC_higher_mark_range']?></th>
                                                    <th><?=$key['GC_lower_mark_range']?></th>
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
                </div>
            </div> 
        </div>   
     </div>