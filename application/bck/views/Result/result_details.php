        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Result</b></h3>
                                        </div>
                                         <div class="col-sm-6">
                                            <div class="ibox-tools">
                                                <span class="btn btn-xs btn-primary" id="toggle_route"> Add </span>     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content class_details_hide">
                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addSubject" action="<?=site_url('Result/result_registration')?>">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Exam Name<span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                <Select name="result_exam_id" class="form-control">
                                                    <option>Select Exam</option>
                                                    <?php foreach ($exam as $key) { ?>
                                                    <option value="<?=$key['exam_sched_id']?>"><?=$key['exam_sched_name']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <label class="col-lg-2 control-label">Student<span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                <Select name="result_student_id" class="form-control">
                                                    <option>Select Student</option>
                                                    <?php foreach ($student as $key) { ?>
                                                    <option value="<?=$key['student_profile_id']?>"><?=$key['student_first_name']?> <?=$key['student_middle_name']?> <?=$key['student_last_name']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Marks<span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                <input type="text" placeholder="Marks" name="result_marks" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-5 col-sm-offset-3">
                                                <button class="btn btn-white" type="reset">Cancel</button>
                                                <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Result Details</b></h3>
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
                                                <th>Student Name</th>
                                                <th>Marks</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i = 1;
                                                foreach ($result as $key) { ?>
                                                <tr>                
                                                    <th><?php echo $i++; ?></th>
                                                    <th><?=$key['exam_sched_name']?></th>
                                                    <th><?=$key['student_first_name']?> <?=$key['student_middle_name']?> <?=$key['student_last_name']?></th>
                                                    <th><?=$key['result_marks']?></th>
                                                    <th>
                                                        <a href="<?=site_url('Result/Edit_result/' .$key['result_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil" title="Edit"></i></span> &nbsp
                                                        <a href="<?=site_url('Result/delete_result/' .$key['result_id'])?>"><span class="btn btn-xs btn-danger"><i class="fa fa-ban view" title="Delete"></i></span>
                                                    </th>
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