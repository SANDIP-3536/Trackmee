        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="new_bus"><b>Bus Registration</b></h3>
                                </div>
                                <div class="col-sm-6">
                                   <div class="ibox-tools">
                                        <span class="btn btn-xs btn-primary" id="new_bus"><i class="fa fa-plus"></i></span>     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content new_bus">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addBus" action="<?=site_url('Bus/add_bus_registration')?>">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Bus No <span style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" placeholder="Bus No like MH12 AB 2325" name="bus_no" class="form-control bus_no">
                                        <label class="bus_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Bus Device No <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <select class="form-control select2_demo_2 bus_device" name="bus_device_id">
                                            <option>-Select Device-</option>
                                            <?php foreach ($device as $key) {?>
                                            <option value="<?=$key['device_id']?>"><?=$key['device_id']?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="bus_device_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                    </div>
                                    <label class="col-lg-2 control-label">Bus Total Seats</label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Bus Total Number of Seats" name="bus_total_no_of_seat" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Institute</label>
                                    <div class="col-sm-3">
                                        <select class="form-control institute_details">
                                            <option value="">Select Institute</option>
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
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white close_data" type="reset">Cancel</button>
                                        <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Bus Details</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Bus No.</th>
                                            <th>Bus Device No.</th>
                                            <th>Bus Total Seats</th>
                                            <th>School</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0;
                                        foreach ($bus as $key1) {?>
                                        <tr>
                                            <td><?=$i+1?></td>
                                            <td><?=$key1['bus_no']?></td>
                                            <td><?=$key1['bus_device_id']?></td>
                                            <td><?=$key1['bus_total_no_of_seat']?></td>
                                            <td><?php echo $school_name[$i]?></td>
                                            <td>
                                                <?php if($key1['bus_expiry_date'] == '9999-12-31') {?>
                                                <a href="<?=site_url('Bus/update/' .$key1   ['bus_id'])?>"><span class="btn btn-xs btn-success"><i class="fa fa-pencil edit" title=" Edit"></i></span></a>&nbsp &nbsp
                                                <a href="<?=site_url('Bus/bus_deactive/' .$key1['bus_id'])?>"><span class="btn btn-xs btn-danger"><i class="fa fa-ban view" title="Deactivate"></i></span></a>&nbsp &nbsp
                                                <?php } ?>
                                                <?php if($key1['bus_expiry_date'] != '9999-12-31') {?>
                                                <a href="<?=site_url('Bus/bus_active/' .$key1['bus_id'])?>"><span class="btn btn-xs btn-success"><i class="fa fa-ban view" title=" Active"></i></span></a>&nbsp &nbsp
                                                <?php } ?>
                                                <!-- <span class="action"><a href="#"><i class="fa fa-pencil edit"></i></a></span>&nbsp &nbsp -->
                                            </td>
                                        </tr>
                                        <?php $i++;} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>