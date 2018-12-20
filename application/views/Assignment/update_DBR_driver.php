        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b> Update Driver Details</b></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="Assign" action="<?=site_url('Driver_bus_route_assgn/update_driver_assign')?>">
                                        <div class="form-group">
                                            <?php foreach ($DBR_record as $key) {?>
                                            <input type="text" name="DBR_id" value="<?=$key['DBR_id']?>" class="form-control hidden">
                                            <label class="col-lg-3 control-label">Driver Name</label>
                                            <div class="col-lg-8">
                                                <select class="form-control driver" id="driver" name="DBR_driver_id" required="">
                                                    <option value="<?=$key['employee_profile_id']?>"><?=$key['employee_first_name']?>&nbsp<?=$key['employee_middle_name']?>&nbsp<?=$key['employee_last_name']?></option>
                                                    <?php foreach ($driver as $key1) { ?>
                                                    <option value="<?=$key1['employee_profile_id']?>"><?=$key1['employee_first_name']?>&nbsp<?=$key1['employee_middle_name']?>&nbsp<?=$key1['employee_last_name']?></option>
                                                    <?php } ?>
                                                </select>
                                                <label class="driver_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                            </div>
                                        </div>
                                        <div class="form-group bus_name">
                                            <label class="col-lg-3 control-label">Bus Name</label>
                                            <div class="col-lg-8">
                                                <select class="form-control bus" readonly>
                                                    <option value=""><?=$key['bus_no']?></option>
                                                </select>
                                                <label class="bus_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                            </div>
                                        </div>
                                        <div class="form-group route_name">
                                            <label class="col-lg-3 control-label">Route Name</label>
                                            <div class="col-lg-8">
                                                <select class="form-control route" readonly>
                                                    <option><?=$key['route_name']?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-12 col-sm-offset-4">
                                                <a href="<?=site_url('Driver_bus_route_assgn/driver_bus_route_assign')?>"><span class="btn btn-white">Cancel</span></a>
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