        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3 class="new_device"><b>Device Registration</b></h3>
                                        </div>
                                        <div class="col-sm-6">
                                           <div class="ibox-tools">
                                                <span class="btn btn-xs btn-primary" id="new_device"><i class="fa fa-plus"></i></span>     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content new_device">
                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addDevice" action="<?=site_url('Device/add_registration')?>">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Device No. <span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                <input type="text" placeholder="Device ID" name="device_id" class="form-control device">
                                                <label class="device_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                            </div>
                                            <label class="col-sm-2 control-label">Device Mobile No. <span style="color:red;">*</span></label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control mobile" name="device_mobile_number" placeholder="Device Mobile No.">
                                                 <label class="mobile_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Device Mobile SIM Number</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="device_mobile_sim_number" placeholder="Device SIM Number">
                                            </div>
                                            <label class="col-lg-2 control-label">Device Mobile IMSI No. <span style="color:red;">*</span></label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="device_mobile_IMSI_number" placeholder="Device Mobile IMSI Number">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Device Non-Moving Frequency</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="device_non_moving_frequency" placeholder="Device Non-Moving Frequency" value="300">
                                            </div>
                                            <label class="col-lg-2 control-label">Device Port Number <span style="color:red;">*</span></label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="device_port_number" placeholder="Device Port Number">
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label class="col-lg-2 control-label">Device Port Number <span style="color:red;">*</span></label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="device_port_number" placeholder="Device Port Number">
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Institute</label>
                                            <div class="col-sm-3">
                                                <select class="form-control institute_details">
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
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-5 col-sm-offset-3">
                                                <button class="btn btn-white close_data" type="reset">Cancel</button>
                                                <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Device Details</b></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Device No.</th>
                                                <th>Device Mobile No.</th>
                                                <th>Device Mobile IMSI No.</th>
                                                <th>Device Mobile SIM No.</th>
                                                <th>Device Moving Frequency</th>
                                                <th>Device Non-Moving Frequency</th>
                                                <th>Device Port Number</th>
                                                <th>School</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $j=0;
                                            foreach ($device as $key) {?>
                                                <tr>
                                                    <td><?=$j+1;?></td>
                                                    <td><?=$key['device_id']?></td>
                                                    <td><?=$key['device_mobile_number']?></td>
                                                    <td><?=$key['device_mobile_IMSI_number']?></td>
                                                    <td><?=$key['device_mobile_sim_number']?></td>
                                                    <td><?=$key['device_moving_frequency']?></td>
                                                    <td><?=$key['device_non_moving_frequency']?></td>
                                                    <td><?=$key['device_port_number']?></td>
                                                    <td><?=$key['school_name']?></td>
                                                    <td>
                                                        <?php if($key['device_expiry_date'] == '9999-12-31') {?>
                                                            <a href="<?=site_url('Device/update_device/' .$key['device_id'])?>"><span class="btn btn-xs btn-success"><i class="fa fa-pencil edit" title="Edit"></i></span></a>&nbsp
                                                            <a href="<?=site_url('Device/deactivate_device/' .$key['device_id'])?>"><span class="btn btn-xs btn-danger"><i class="fa fa-ban" title="Deactivate"></i></span></a>
                                                        <?php } ?>
                                                        <?php if($key['device_expiry_date'] != '9999-12-31') {?>
                                                            <a href="<?=site_url('Device/device_active/' .$key['device_id'])?>"><span class="btn btn-xs btn-success"><i class="fa fa-ban" title=" Active"></i></span></a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php $j++;} ?>
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