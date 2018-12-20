<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12" style="padding-right:inherit;">
            <div class="ibox float-e-margins">
                <?php if ($user_type == 3) { ?>
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="new_exam_schedule"><b>New Exam Schedule</b></h3>
                        </div>
                        <div class="col-sm-6">
                            <div class="ibox-tools">
                                <span class="btn btn-xs btn-primary" id="new_exam_schedule"><i class="fa fa-plus"></i></span>     
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content new_exam_schedule">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addExamScedule" action="<?=site_url('Exam/exam_schedule_registration')?>">
                        <div class="form-group">
                            <label class="col-lg-2 control-label"> Exam <span style="color:red;">*</span></label>
                            <div class="col-lg-3">
                                <Select name="exam_sched_exam_id" class="form-control" required>
                                    <option>Select Exam</option>
                                    <?php foreach ($exam_details as $key) { ?>
                                    <option value="<?=$key['exam_id']?>"><?=$key['exam_name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <label class="col-lg-2 control-label">Exam Schedule Name<span style="color:red;">*</span></label>
                            <div class="col-lg-3">
                               <input type="text" class="form-control" name="exam_sched_name" placeholder="Schedule Name">
                           </div>
                       </div>
                       <div class="form-group">
                        <label class="col-lg-2 control-label"> Class <span style="color:red;">*</span></label>
                        <div class="col-lg-3">
                            <Select name="exam_sched_class_id" class="form-control class_details">
                                <option>Select Class</option>
                                <?php foreach ($school_class as $key) {?>
                                <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label class="col-lg-2 control-label"> Subject <span style="color:red;">*</span></label>
                        <div class="col-lg-3">
                            <Select name="exam_sched_subject_id" class="form-control subject_details" required>
                            </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Exam Date<span style="color:red;">*</span></label>
                    <div class="col-lg-3">
                        <input type="text" placeholder="Exam Date" name="exam_sched_date" class="form-control datepicker" readonly>
                    </div>
                    <label class="col-lg-2 control-label">Exam Start Time<span style="color:red;">*</span></label>
                    <div class="col-lg-3">
                        <div class="input-group clockpicker" data-autoclose="true">
                            <span class="input-group-addon">
                                <span class="fa fa-clock-o"></span>
                            </span>
                            <input type="text" class="form-control" name="exam_sched_start_time" placeholder="Start Time" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Exam End Time<span style="color:red;">*</span></label>
                    <div class="col-lg-3">
                     <div class="input-group clockpicker" data-autoclose="true">
                        <span class="input-group-addon">
                            <span class="fa fa-clock-o"></span>
                        </span>
                        <input type="text" class="form-control" name="exam_sched_end_time" placeholder="End Time" readonly>
                    </div>
                </div>
                <label class="col-lg-2 control-label">Total Marks<span style="color:red;">*</span></label>
                <div class="col-lg-3">
                    <input type="text" placeholder=" Maximum Marks" name="exam_sched_total_marks" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Result Date</label>
                <div class="col-lg-3">
                    <input type="text" placeholder="Result Date" name="exam_sched_result_datetime" class="form-control datepicker" readonly>
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
                <h3><b>Exam Schedule Details</b></h3>
            </div>
        </div>
    </div>
    <div class="ibox-content">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Term</th>
                        <th>Exam Name</th>
                        <th>Sunject Name</th>
                        <th>Class Name</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Marks</th>
                        <th>Result Date</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                    foreach ($exam_sched_details as $key) { ?>
                    <tr>                
                        <th><?php echo $i++; ?></th>
                        <th><?=$key['term_name']?></th>
                        <th><?=$key['exam_sched_name']?></th>
                        <th><?=$key['subject_name']?>
                            <?php if($key['subject_type'] == 1){
                                echo "( Theory )";
                            }elseif ($key['subject_type'] == 2) {
                                echo "( Practical )";
                            }elseif ($key['subject_type'] == 3) {
                               echo "( Project )";
                           }elseif($key['subject_type'] == 4){
                            echo "( Oral )";
                        }?>
                    </th>
                    <th><?=$key['class_name']?></th>
                    <th><?=$key['exam_sched_date']?></th>
                    <th><?=$key['exam_sched_start_time']?></th>
                    <th><?=$key['exam_sched_end_time']?></th>
                    <th><?=$key['exam_sched_total_marks']?></th>
                    <th><?=$key['exam_sched_result_datetime']?></th>
                    <!-- <th><a href="<?=site_url('Exam/Edit_exam/' .$key['exam_sched_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></span></th> -->
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