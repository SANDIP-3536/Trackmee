    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#class_demo"> Class </a></li>
                <li class=""><a data-toggle="tab" href="#division_demo">Division</a></li>
                <li class=""><a data-toggle="tab" href="#subject_demo">Subject</a></li>
            </ul>
            <div class="tab-content">
                <div id="class_demo" class="tab-pane active">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6" style="padding-right:0px;">
                                <div class="ibox-title" style="border:none;border-bottom:1px solid !important;">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>School New Class</b></h3>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="ibox-tools">
                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content class_details_hide">
                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addClass" action="<?=site_url('School_class/class_registration')?>">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Class Name<span style="color:red;">*</span></label>
                                            <div class="col-lg-7">
                                                <input type="text" placeholder="Class Name" name="class_name" class="form-control device">
                                                <label class="class_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Min Attendance %<span style="color:red;">*</span></label>
                                            <div class="col-lg-7">
                                                <input type="text" placeholder="Class Minimum Attendance %" name="class_minimum_attendance" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Attendance Type<span style="color:red;">*</span></label>
                                            <div class="col-lg-7">
                                                <select name="class_attendance_type" class="form-control ">
                                                    <option value="0">Select Attendance Type</option>
                                                    <option value="1">Daily</option>
                                                    <option value="2">Subjectwise</option>
                                                </select>
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
                            </div>
                            <div class="col-lg-6">
                                <div class="ibox-title" style="border:none;border-bottom:1px solid !important;">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>School Class Details</b></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Class Name</th>
                                                    <th>Attendance</th>
                                                    <!-- <th>Actions</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i = 1;
                                                foreach ($school_class as $key) { ?>
                                                <tr>
                                                    <th><?php echo $i++; ?></th>
                                                    <th><?=$key['class_name']?></th>
                                                    <th><?=$key['class_minimum_attendance']?>%</th>
                                                    <!-- <th></th> -->
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
                <div id="division_demo" class="tab-pane">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6" style="padding-right:0px;">
                                <div class="ibox-title" style="border:none;border-bottom:1px solid !important;">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>School New Division</b></h3>
                                        </div>
                                         <div class="col-sm-6">
                                            <div class="ibox-tools">
                                                <!-- <span class="btn btn-xs btn-primary" id="toggle_route"> Add </span>     -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content division_details_hide">
                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addDivision" action="<?=site_url('School_class/division_registration')?>">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Class<span style="color:red;">*</span></label>
                                            <div class="col-lg-7">
                                                <select name="division_class_id" class="form-control">
                                                    <option value="0">Select Class</option>
                                                    <?php foreach ($school_class as $key) { ?>
                                                        <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Division Name<span style="color:red;">*</span></label>
                                            <div class="col-lg-7">
                                                <input type="text" placeholder="Division Name" name="division_name" class="form-control device">
                                                <label class="division_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
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
                            </div>
                            <div class="col-lg-6">
                                <div class="ibox-title" style="border:none;border-bottom:1px solid !important;">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>School Division Details</b></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Class Name</th>
                                                    <th>Division Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i = 1;
                                                foreach ($school_division as $key) { ?>
                                                <tr>
                                                    <th><?php echo $i++; ?></th>
                                                    <th><?=$key['class_name']?></th>
                                                    <th><?=$key['division_name']?></th>
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
                <div id="subject_demo" class="tab-pane">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title" style="border:none;border-bottom:1px solid !important;">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3><b>School New Subject</b></h3>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="ibox-tools">
                                                    <!-- <span class="btn btn-xs btn-primary" id="toggle_route"> Add </span>      -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content class_details_hide">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addSubject" action="<?=site_url('School_class/subject_registration')?>">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Class Name<span style="color:red;">*</span></label>
                                                <div class="col-lg-7">
                                                    <select name="subject_class_id" class="form-control">
                                                        <option value="0">Select Class</option>
                                                        <?php foreach ($school_class as $key) { ?>
                                                        <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Subject Name<span style="color:red;">*</span></label>
                                                <div class="col-lg-7">
                                                    <input type="text" placeholder="Subject Name" name="subject_name" class="form-control device">
                                                    <label class="class_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Subject Type<span style="color:red;">*</span></label>
                                                <div class="col-lg-7">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" value="1" name="subject_type[]">Theory
                                                    </label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" value="2" name="subject_type[]">Practical
                                                    </label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" value="3" name="subject_type[]">Project
                                                    </label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" value="4" name="subject_type[]">Oral
                                                    </label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" value="5" name="subject_type[]">Assignment
                                                    </label>
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
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="ibox-title" style="border:none;border-bottom:1px solid !important;">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>School Class Details</b></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Class Name</th>
                                                    <th>Subject Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i = 1;
                                                foreach ($school_subject as $key) { ?>
                                                <tr>
                                                    <th><?php echo $i++; ?></th>
                                                    <th><?=$key['class_name']?></th>
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