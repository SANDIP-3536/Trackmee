        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Update Result Details</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addSubject" action="<?=site_url('Result/result_update_marks')?>">
                                <div class="form-group hidden">
                                    <?php foreach ($result_data as $key) { ?>
                                    <label class="col-lg-2 control-label">Exam Name<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" name="result_id" class="form-control" value="<?= $key['result_id']  ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Exam Name<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Exam Name" name="" class="form-control" value="<?= $key['exam_sched_name']  ?>" readonly>
                                    </div>
                                    <label class="col-lg-2 control-label">Student<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Student Name" name="" class="form-control" value="<?= $key['student_first_name'] ?> <?= $key['student_middle_name'] ?> <?= $key['student_last_name'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Marks<span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Marks" name="result_marks" class="form-control" value="<?=$key['result_marks'] ?>">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-5 col-sm-offset-3">
                                        <button class="btn btn-white" type="reset">Cancel</button>
                                        <button class="btn btn-primary enableOnInput" type="submit">Update</button>
                                    </div>
                                </div>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>