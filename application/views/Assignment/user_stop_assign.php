        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>user Stop Assign</b></h3>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="ibox-tools">
                                                <!-- <a href="<?=site_url('Route/route_registration')?>"><button class="btn btn-xs btn-primary user_stop_assign">Add Route</button></a> -->
                                                <!-- <a href="<?=site_url('Stop/stop_registration')?>"><button class="btn btn-xs btn-primary stop_details">Add Stop</button></a> -->
                                                <!-- <i class="fa fa-chevron-down" id="toggle_route"></i> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('user_stop_assign/deactivate_user_stop')?>">
                                            <div class="col-sm-4">
                                                <div class="ibox-title">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h3><b>user Stop Details</b></h3><h5>(Assigned)</h5>
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
                                                                    <th>User</th>
                                                                    <th>Bus</th>
                                                                    <th>Stop</th>
                                                                    <th class="ass_details">Select To Remove</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <?php $i=1;
                                                                foreach ($user_stop_assigned as $key) { ?>
                                                                <tr>
                                                                    <td><?=$i++?></td>
                                                                    <td><?=$key['user_first_name']?>&nbsp<?=$key['user_middle_name']?>&nbsp<?=$key['user_last_name']?></td>
                                                                    <td><?=$key['bus_no']?></td>
                                                                    <td><?=$key['stop_name']?></td>
                                                                    <td class="ass_details">
                                                                        <input type="checkbox" name="SS_user_profile_id[]" value="<?=$key['SS_user_profile_id']?>">
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="Assign" action="<?=site_url('User_stop_assign/add_user_stop1')?>">
                                            <div class="col-sm-4">
                                                <div class="ibox-title">
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <h3><b>Route Stop Details</b></h3>
                                                        </div>
                                                        <div class="col-sm-7 stop_ass" style="text-align:right;">
                                                            <div class="form-group">
                                                                <label class="col-lg-5 control-label">Bus ID</label>
                                                                <div class="col-lg-7">
                                                                     <select class="form-control bus_details" name="bus_id">
                                                                        <option value="0">Select Bus</option>
                                                                        <?php foreach ($bus as $key) { ?>
                                                                        <option value="<?=$key['bus_id']?>"><?=$key['bus_no']?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div><br>
                                                        <div class="form-group stop_ass">
                                                            <label class="col-lg-1 control-label">Route</label>
                                                            <div class="col-lg-5">
                                                                <select class="form-control route_details" name="route_id">
                                                                </select>
                                                            </div>
                                                            <?php if ($institute_admin == 1) {?>
                                                            <label class="col-lg-1 control-label">Client</label>
                                                            <div class="col-lg-5">
                                                                <select class="form-control client_details" name="SS_client_profile_id">
                                                                </select>
                                                            </div>
                                                            <?php } ?>
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
                                                                    <tbody id="route_type1">


                                                                    </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                        <div class="col-sm-4">
                                                            <div class="ibox-title">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <h3><b>user Details</b></h3><h5>(Not Assigned)</h5>
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
                                                                                <th>user Name</th>
                                                                                <th class="stop_ass">Select</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody >
                                                                            <?php $i = 1;
                                                                            foreach ($user as $key){ ?>
                                                                            <tr>
                                                                                <td><?php echo $i++; ?></td>
                                                                                <td><?=$key['user_first_name']?>&nbsp<?=$key['user_middle_name']?>&nbsp<?=$key['user_last_name']?></td>
                                                                                <td class="stop_ass">
                                                                                    <input type="checkbox" name="SS_user_profile_id[]" value="<?=$key['user_profile_id']?>">
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