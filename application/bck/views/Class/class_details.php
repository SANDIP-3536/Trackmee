        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-6" style="padding-right:0px;">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3><b>School New Class</b></h3>
                            </div>
                             <div class="col-sm-6">
                                <div class="ibox-tools">
                                    <!-- <span class="btn btn-xs btn-primary" id="toggle_route"> Add </span>     -->
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
                    <div class="ibox-title">
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
</div>