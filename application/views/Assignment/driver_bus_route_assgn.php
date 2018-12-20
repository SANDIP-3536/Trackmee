        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Driver Bus Route Assign</b></h3>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="ibox-tools">
                                                <a href="<?=site_url('Driver/driver_registration')?>"><button class="btn btn-xs btn-primary driver_bus_route">Add Driver</button></a>
                                                <!-- <a href="<?=site_url('Bus/bus_registration')?>"><button class="btn btn-xs btn-primary bus_name">Add Bus</button></a> -->
                                                <a href="<?=site_url('Route/route_registration')?>"><button class="btn btn-xs btn-primary route_name hidden" >Add Route</button></a>
                                                <span class="btn btn-xs btn-primary toggle_route"> Add </span>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content driver_bus_route">
                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="Assign" action="<?=site_url('Driver_bus_route_assgn/add_driver_bus_route_assign')?>">
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Driver Name</label>
                                            <div class="col-lg-8">
                                                <select class="form-control driver" id="driver" name="DBR_driver_id">
                                                    <option value="0">Select Driver</option>
                                                    <?php foreach ($driver as $key) { ?>
                                                    <option value="<?=$key['employee_profile_id']?>"><?=$key['employee_first_name']?>&nbsp<?=$key['employee_middle_name']?>&nbsp<?=$key['employee_last_name']?></option>
                                                    <?php } ?>
                                                </select>
                                                <label class="driver_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group bus_name">
                                            <label class="col-lg-3 control-label">Bus Name</label>
                                            <div class="col-lg-8">
                                                <select class="form-control bus" name="DBR_bus_id">
                                                </select>
                                                <label class="bus_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                            </div>
                                        </div>
                                        <?php if ($institute_admin == 1) {?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Client</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="DBR_client_profile_id" id="profile_id">
                                                </select>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group route_name">
                                            <label class="col-lg-3 control-label">Route Name</label>
                                            <div class="col-lg-8">
                                                <select class="form-control route" name="DBR_route_no" required="">
                                                </select>
                                                <label class="route_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-12 col-sm-offset-4">
                                                <span class="btn btn-white toggle_route">Cancel</span>
                                                <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Driver Bus Route Details </b></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Driver Name</th>
                                                    <th>Bus Number</th>
                                                    <th>Route Name</th>
                                                    <?php if ($institute_admin == 1) {?>
                                                        <th>Client</th>
                                                    <?php } ?>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1;
                                                foreach ($assign as $key3) {?>
                                                <tr>
                                                    <td><?php echo $i++;?></td>
                                                    <td><?=$key3['employee_first_name']." ".$key3['employee_middle_name']." ".$key3['employee_last_name']?></td>
                                                    <td><?=$key3['bus_no']?></td>
                                                    <td><?=$key3['route_name']?></td>
                                                    <?php if ($institute_admin == 1) {?>
                                                        <td><?=$key3['client_name']?></td>
                                                    <?php } ?>
                                                     <td>
                                                        <span class="action"><a href="<?=site_url('Driver_bus_route_assgn/Update_DBR/' .$key3['DBR_id'])?>"><i class="fa fa-user" title="Update Driver"></i></a></span>&nbsp &nbsp
                                                        <span class="action" data-toggle="modal" id ='<?=$key3['DBR_id']; ?>' data-target="#deleteDBR"><i class="fa fa-trash" title="Delete Records"></i></span>&nbsp &nbsp
                                                        <span class="action"><a href="<?=site_url('Driver_bus_route_assgn/Update_DBR_bus/' .$key3['DBR_id'])?>"><i class="fa fa-bus" title="Update Bus"></i></a></span>
                                                    </td>
                                                </tr>
                                                <?php $i++;} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="ibox-title">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h3><b>Driver Details</b></h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ibox-content">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover" >
                                                        <thead>
                                                            <tr>
                                                                <th>Sr No.</th>
                                                                <th>Driver Name</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody >
                                                             <?php $i = 1;
                                                                foreach ($driver as $key) { ?>
                                                                <tr>
                                                                    <td><?php echo $i++; ?></td>
                                                                    <td><?=$key['employee_first_name']?> <?=$key['employee_middle_name']?> <?=$key['employee_last_name']?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="ibox-title">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h3><b>Bus Details</b></h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ibox-content">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover" >
                                                        <thead>
                                                            <tr>
                                                                <th>Sr.No</th>
                                                                <th>Bus No</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1;
                                                            foreach ($bus as $key) { ?>
                                                                <tr>
                                                                    <td><?php echo $i++; ?></td>
                                                                    <td><?=$key['bus_no']?></td>             
                                                                </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="ibox-title">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h3><b>Route Details</b></h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ibox-content">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover" >
                                                        <thead>
                                                            <tr>
                                                                <th>Sr No.</th>
                                                                <th>Route No.</th>
                                                                <th>Route Name</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1;
                                                            foreach ($route as $key) { ?>
                                                                <tr>
                                                                    <td><?php echo $i++; ?></td> 
                                                                    <td><?=$key['route_no']?></td>    
                                                                    <td><?=$key['route_name']?></td>    
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
            </div>
            <div id="deleteDBR" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Delete Driver Bus Route Details</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" class="form-horizontal" action="<?=site_url('Driver_bus_route_assgn/disable_DBR')?>" enctype="multipart/form-data">
                               <div class="form-group hidden">
                                    <label class="col-sm-3 control-label">DBR</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control DBR_id_delete" name="DBR_id">
                                    </div>
                                </div>
                                <center><h3>Do you really want to Delete?</h3></center>
                                <center><h5>All the Stop / Bus also delete from User Stop Assignment?</h5></center>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-lg-6" style="text-align:right;">
                                        <button class="btn btn-primary" type="submit">Yes</button>
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>