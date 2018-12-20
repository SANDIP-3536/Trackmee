        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>New Exam</b></h3>
                                        </div>
                                         <div class="col-sm-6">
                                            <div class="ibox-tools">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addSubject" action="<?=site_url('Exam/update_exam_details')?>">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Exam Name<span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                <?php foreach ($exam_details as $key) { ?>
                                               <input type="text" class="form-control hidden" name="exam_id" value="<?=$key['exam_id']?>">
                                               <input type="text" class="form-control" name="exam_name" value="<?=$key['exam_name']?>">
                                               <?php } ?>
                                            </div>
                                            <label class="col-lg-2 control-label"> Subject <span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                <Select name="exam_subject_id" class="form-control" required>
                                                    <option value="<?=$key['subject_id']?>"><?=$key['subject_name']?>
                                                        <?php if($key['subject_type'] == 1){
                                                            echo "( Theory )";
                                                        }elseif ($key['subject_type'] == 2) {
                                                            echo "( Practical )";
                                                        }elseif ($key['subject_type'] == 3) {
                                                           echo "( Project )";
                                                        }elseif($key['subject_type'] == 4){
                                                            echo "( Oral )";
                                                        }?></option>
                                                    <?php foreach ($teacher_subject as $key) { ?>
                                                    <option value="<?=$key['subject_id']?>"><?=$key['subject_name']?>
                                                        <?php if($key['subject_type'] == 1){
                                                            echo "( Theory )";
                                                        }elseif ($key['subject_type'] == 2) {
                                                            echo "( Practical )";
                                                        }elseif ($key['subject_type'] == 3) {
                                                           echo "( Project )";
                                                        }elseif($key['subject_type'] == 4){
                                                            echo "( Oral )";
                                                        }?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label"> Class <span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                 <?php foreach ($exam_details as $key) { ?>
                                                <Select name="exam_class_id" class="form-control">
                                                    <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                    <?php foreach ($teacher_class as $key) {?>
                                                    <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                             <?php foreach ($exam_details as $key) { ?>
                                            <label class="col-lg-2 control-label">Exam Date<span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                <input type="text" placeholder="Exam Date" name="exam_date" class="form-control datepicker" value="<?=$key['exam_date']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Exam Start Time<span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                <div class="input-group clockpicker" data-autoclose="true">
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-clock-o"></span>
                                                    </span>
                                                    <input type="text" class="form-control" name="exam_start_time" placeholder="Start Time" value="<?=$key['exam_start_time']?>" readonly>
                                                </div>
                                            </div>
                                            <label class="col-lg-2 control-label">Exam End Time<span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                 <div class="input-group clockpicker" data-autoclose="true">
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-clock-o"></span>
                                                    </span>
                                                    <input type="text" class="form-control" name="exam_end_time" placeholder="End Time" value="<?=$key['exam_start_time']?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Exam Maximum Marks<span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                <input type="text" placeholder=" Maximum Marks" name="exam_max_marks" class="form-control" value="<?=$key['exam_max_marks']?>">
                                            </div>
                                            <label class="col-lg-2 control-label">Result Date</label>
                                            <div class="col-lg-3">
                                                <input type="text" placeholder="Result Date" name="exam_result_datetime" class="form-control datepicker" value="<?=$key['exam_result_datetime']?>"readonly>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php } ?>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-5 col-sm-offset-3">
                                                <a href="<?=site_url('Exam/exam_details')?>"><span class="btn btn-white" type="reset">Cancel</span></a>
                                                <button class="btn btn-primary enableOnInput" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>