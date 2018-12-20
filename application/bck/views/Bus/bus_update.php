        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Bus Information</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addBus" action="<?=site_url('Bus/add_bus_update')?>">
                                <div class="form-group">
                                    <?php foreach ($bus as $key) { ?>
                                    <label class="col-lg-2 control-label">Bus No <span style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" placeholder="Bus No like MH12 AB 2325" name="bus_no" class="form-control bus_no" value="<?=$key['bus_no']?>">
                                         <label class="bus_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                    </div>
                                    <div class="col-lg-8" hidden>
                                        <input type="text"  name="bus_id" class="form-control" value="<?=$key['bus_id']?>">
                                    </div>
                                    <?php } ?>
                                </div>
                                 <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Bus Device No <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <!-- <input type="text" placeholder="Bus Total Number of Seats" name="bus_total_no_of_seat" class="form-control" value="<?=$key['bus_device_id']?>" readonly> -->
                                        <select class="form-control bus_device" name="bus_device_id">
                                            <option><?=$key['bus_device_id']?></option>
                                            <?php foreach ($device as $key) {?>
                                                <option value="<?=$key['device_id']?>"><?=$key['device_id']?></option>
                                            <?php } ?>
                                       </select>
                                       <!-- <label class="bus_device_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label> -->
                                    </div>
                                    <label class="col-lg-2 control-label">Bus Total Seats</label>
                                    <div class="col-lg-3">
                                         <?php foreach ($bus as $key) { ?>
                                        <input type="text" placeholder="Bus Total Number of Seats" name="bus_total_no_of_seat" class="form-control" value="<?=$key['bus_total_no_of_seat']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">School</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" value="<?=$key['school_name']?>" readonly>
                                    </div>
                                    <!-- <label class="col-lg-2 control-label"></label> -->
                                    <div class="col-sm-2">
                                        <span class="btn btn-xs btn-primary other">Assign To Other</span>
                                    </div>
                                </div>
                                <div class="form-group other_assignment">
                                    <label class="col-lg-2 control-label">Institude</label>
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
                                        <select class=" form-control school" name="bus_school_profile_id">
                                        </select>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
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