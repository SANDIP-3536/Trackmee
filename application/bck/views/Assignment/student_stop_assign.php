        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Student Stop Assign</b></h3>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="ibox-tools">
                                                <!-- <a href="<?=site_url('Route/route_registration')?>"><button class="btn btn-xs btn-primary student_stop_assign">Add Route</button></a> -->
                                                <!-- <a href="<?=site_url('Stop/stop_registration')?>"><button class="btn btn-xs btn-primary stop_details">Add Stop</button></a> -->
                                                <i class="fa fa-chevron-down" id="toggle_route"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">

                                    <div class="row">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Student_stop_assign/deactivate_student_stop')?>">
                                            <div class="col-sm-4">
                                                <div class="ibox-title">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h3><b>Student Stop Details</b></h3><h5>(Assigned)</h5>
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
                                                                    <th>Student Name</th>
                                                                    <th>Stop Name</th>
                                                                    <th class="ass_details">Select To Remove</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <?php $i=1;
                                                                foreach ($student_stop_assigned as $key) { ?>
                                                                <tr>
                                                                    <td><?=$i++?></td>
                                                                    <td><?=$key['student_first_name']?>&nbsp<?=$key['student_middle_name']?>&nbsp<?=$key['student_last_name']?></td>
                                                                    <td><?=$key['stop_name']?></td>
                                                                    <td class="ass_details">
                                                                        <input type="checkbox" name="SS_student_profile_id[]" value="<?=$key['SS_student_profile_id']?>">
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="Assign" action="<?=site_url('Student_stop_assign/add_student_stop1')?>">
                                            <div class="col-sm-4">
                                                <div class="ibox-title">
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <h3><b>Route Stop Details</b></h3>
                                                        </div>
                                                        <div class="col-sm-7 stop_ass" style="text-align:right;">
                                                            <div class="form-group">
                                                                <label class="col-lg-5 control-label">Route Name</label>
                                                                <div class="col-lg-7">
                                                                 <select class="form-control route_details" required="">
                                                                    <option value="">Select Route</option>
                                                                    <?php foreach ($route as $key) { ?>
                                                                    <option value="<?=$key['route_no']?>"><?=$key['route_name']?></option>
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
                                                                <th>Stop ID</th>
																<th>Stop Index</th>
                                                                <th>Stop Name</th>
                                                                <th class="stop_ass">Select</th>
                                                            </tr>
                                                        </thead>
                                                        <thead>
                                                            <tbody id="route_type1">


                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="ibox-title">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h3><b>Student Details</b></h3><h5>(Not Assigned)</h5>
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
                                                        <table class="table table-striped table-bordered table-hover" >
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr No.</th>
                                                                    <th>Student Name</th>
                                                                    <th class="stop_ass">Select</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody >
                                                                <?php $i = 1;
                                                                foreach ($student as $key){ ?>
                                                                <tr>
                                                                    <td><?php echo $i++; ?></td>
                                                                    <td><?=$key['student_first_name']?>&nbsp<?=$key['student_middle_name']?>&nbsp<?=$key['student_last_name']?></td>
                                                                    <td class="stop_ass">
                                                                        <input type="checkbox" name="SS_student_profile_id[]" value="<?=$key['student_profile_id']?>">
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