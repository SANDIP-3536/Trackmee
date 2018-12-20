        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Update Device Information</b></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addDevice" action="<?=site_url('Device/update_device_details')?>">
                                        <div class="form-group">
                                            <?php foreach($device as $key) ?>
                                            <label class="col-lg-2 control-label">Device ID <span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                <input type="text" placeholder="Device ID" name="device_id" class="form-control device" value="<?=$key['device_id']?>" readonly>
                                                <label class="device_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                            </div>
                                            <label class="col-sm-2 control-label">Device Mobile No. <span style="color:red;">*</span></label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control mobile" name="device_mobile_number" placeholder="Device Mobile No." value="<?=$key['device_mobile_number']?>" readonly>
                                                <label class="mobile_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Device Mobile SIM Number</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="device_mobile_sim_number" placeholder="Device SIM Number" value="<?=$key['device_mobile_sim_number']?>">
                                            </div>
                                            <label class="col-lg-2 control-label">Device Mobile IMSI No. <span style="color:red;">*</span></label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="device_mobile_IMSI_number" placeholder="Device Mobile IMEI Number" value="<?=$key['device_mobile_IMSI_number']?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Device Non-Moving Frequency</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="device_non_moving_frequency" placeholder="Device Non-Moving Frequency" value="300">
                                            </div>
                                            <label class="col-lg-2 control-label">Device Port Number <span style="color:red;">*</span></label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="device_port_number" placeholder="Device Port Number" value="<?=$key['device_port_number']?>">
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label class="col-lg-2 control-label">Institude</label>
                                            <div class="col-sm-3">
                                                <select class="form-control institute_details" required="">
                                                    <option value="">Select Institude</option>
                                                    <?php foreach ($institute as $key) { ?>
                                                    <option value="<?=$key['institute_profile_id']?>"><?=$key['institute_name']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <label class="col-lg-2 control-label">School</label>
                                            <div class="col-sm-3">
                                                <select class=" form-control school" name="device_school_profile_id">
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-5 col-sm-offset-3">
                                                <button class="btn btn-white" type="reset">Cancel</button>
                                                <button class="btn btn-primary" type="submit">Update</button>
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