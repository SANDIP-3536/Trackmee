        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Teacher Subject Assign</b></h3>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="ibox-tools">
                                                <!-- <i class="fa fa-chevron-down" id="toggle_route"></i> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Teacher_subject_assign/TS_remove')?>">
                                            <div class="col-sm-12">
                                                <div class="ibox-title">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h3><b>Teacher Subject Details</b></h3><h5>(Assigned)</h5>
                                                        </div>
                                                        <div class="col-sm-6" style="text-align:right;">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <span class="btn btn-white ass_details_edit"><i class="fa fa-pencil"></i></span>
                                                                    <span class="btn btn-white ass_details1"><i class="fa fa-times"></i></span>
                                                                    <button class="btn btn-primary ass_details" type="submit"><i class="fa fa-trash"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ibox-content">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered table-hover" >
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr No.</th>
                                                                    <th>Teacher Name</th>
                                                                    <th>Class</th>
                                                                    <th>Subject</th>
                                                                    <th class="ass_details">Select To Remove</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i=1;
                                                                foreach ($teacher_subject as $key) { ?>
                                                                <tr>
                                                                    <td><?=$i++?></td>
                                                                    <td><?=$key['employee_first_name']?>&nbsp<?=$key['employee_middle_name']?>&nbsp<?=$key['employee_last_name']?></td>
                                                                    <td><?=$key['class_name']?></td>
                                                                    <td><?=$key['subject_name']?> 
                                                                        <?php if($key['subject_type'] == 1){
                                                                            echo "( theory )";
                                                                        }elseif ($key['subject_type'] == 2) {
                                                                            echo "( practical )";
                                                                        }elseif ($key['subject_type'] == 3) {
                                                                           echo "( project )";
                                                                        }elseif($key['subject_type'] == 4){
                                                                            echo "( oral )";
                                                                        }elseif($key['subject_type'] == 5){
                                                                            echo "( assignment )";
                                                                        }?>
                                                                    </td>
                                                                    <td class="ass_details">
                                                                        <input type="checkbox" name="TS_id[]" value="<?=$key['TS_id']?>">
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="Assign" action="<?=site_url('Teacher_subject_assign/TS_registration')?>">
                                            <div class="col-sm-7">
                                                <div class="ibox-title">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <h3><b>Teacher Details</b></h3>
                                                        </div>
                                                        <div class="col-sm-4 stop_ass">
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control_label" style="padding-top:05px;">Class</label>
                                                                <div class="col-sm-8">
                                                                    <select class="form-control class_details" name="class_details">
                                                                        <option>Select Class</option>
                                                                        <?php foreach ($school_class as $key) { ?>
                                                                        <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="ibox-content">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover" >
                                                        <thead>
                                                            <tr>
                                                                <th>Sr No.</th>
                                                                <th>Teacher Name</th>
                                                                <th class="stop_ass">Select</th>
                                                            </tr>
                                                        </thead>
                                                        <thead>
                                                            <tbody>
                                                                <?php 
                                                                $i = 1;
                                                                foreach ($fetch_teacher as $key) {?>
                                                                <tr>
                                                                    <td><?php echo $i++;?></td>
                                                                    <td><?=$key['employee_first_name']?> <?=$key['employee_middle_name']?> <?=$key['employee_last_name']?></td>
                                                                    <td class="stop_ass"><input type="radio" value="<?=$key['employee_profile_id']?>" name="TS_employee_profile_id" required></td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="ibox-title">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h3><b>Subject Details</b></h3>
                                                            <h6>(Please Select Class)</h6>    
                                                        </div>
                                                        <div class="col-sm-6" style="text-align:right;">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <span class="btn btn-white stop_ass_edit"><i class="fa fa-pencil"></i></span>
                                                                    <span class="btn btn-white stop_ass1"><i class="fa fa-times"></i></span>
                                                                    <button class="btn btn-primary stop_ass" type="submit"><i class="fa fa-check-square-o"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ibox-content">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr No.</th>
                                                                    <th>Subject</th>
                                                                    <th class="stop_ass">Select</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="subject_details">
                                                            </tbody>
                                                        </table>
                                                    </div>
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
        </div>
    </div>
</div>
</div>
</div>
</div>