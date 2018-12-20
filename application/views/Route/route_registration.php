        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><b>Route Registration</b></h5>
                            <div class="ibox-tools">
                                <span class="btn btn-xs btn-primary toggle_route"> Add </span>    
                            </div>
                        </div>
                        <div class="ibox-content route_toggle">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addRoute" action="<?=site_url('Route/add_route_registration')?>">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Route Name</label>
                                    <div class="col-lg-8">
                                        <input type="text" placeholder="Route Name" name="route_name" class="form-control">
                                    </div>
                                </div>
                                <?php if ($institute_admin == 1) {?>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Client</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="route_client_profile_id">
                                            <option class="0">Select Client</option>
                                            <?php foreach ($client as $key) { ?>
                                                <option value="<?=$key['client_profile_id']?>"><?=$key['client_name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="hr-line-dashed"></div>
                                <div class="row" >
                                    <div class="col-lg-6" style="border-right: 1px solid;">
                                        <div class="form-group">
                                            <div class="row" style="padding-left: 200px;">
                                                <div class="col-lg-8">
                                                    <label class="col-sm-12 control-label">Towards Workplace/School</label>
                                                </div>
                                            </div>
                                            <div class="row" hidden="">
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="route_type_1" value="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" >
                                        <div class="form-group">
                                            <div class="row" style="padding-right: 130px;">
                                                <div class="col-lg-6">
                                                    <label class="col-sm-12 control-label">Towards Home</label>
                                                </div>
                                            </div>
                                            <div class="row" hidden="">
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="route_type_2" value="2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6" style="border-right: 1px solid;">
                                        <div class="form-group">
                                            <div class="row" >
                                                <div class="col-sm-12">
                                                <div class="col-lg-6" >
                                                    <label class="col-sm-12 control-label">Route Start Time</label>
                                                </div>
                                                <div class="col-lg-6" style="padding-right: 96px;">
                                                    <label class="col-sm-12 control-label">Route End Time</label>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="row" style="padding-right: 0px;">
                                                <div class="col-lg-4">
                                                    <label class="col-sm-12 control-label">Route Start Time</label>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="col-sm-12 control-label">Route End Time</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6" style="border-right: 1px solid;">
                                        <div class="form-group">
                                            <div class="row" style="padding-left: 90px;">
                                                <div class="col-lg-5 col-sm-offset-1">
                                                    <div class="col-sm-12">
                                                        <div class="input-group clockpicker" data-autoclose="true">
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-clock-o"></span>
                                                            </span>
                                                            <input type="text" class="form-control" name="route_start_time_1" placeholder="Route Start Time">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5" style="padding-right: 10px;">
                                                    <div class="col-sm-12">
                                                        <div class="input-group clockpicker" data-autoclose="true">
                                                        <span class="input-group-addon">
                                                                <span class="fa fa-clock-o"></span>
                                                            </span>
                                                            <input type="text" class="form-control" name="route_end_time_1" placeholder="Route End Time" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="row" style="padding-left: 30px;padding-right: 150px;">
                                                    <div class="col-lg-6">
                                                        <div class="col-sm-12">
                                                            <div class="input-group clockpicker" data-autoclose="true">
                                                                <!-- <input type="text" class="form-control" value="09:30" > -->
                                                                <span class="input-group-addon">
                                                                    <span class="fa fa-clock-o"></span>
                                                                </span>
                                                                <input type="text" class="form-control" name="route_start_time_2" placeholder="Route Start Time">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="col-sm-12">
                                                            <div class="input-group clockpicker" data-autoclose="true">
                                                            <span class="input-group-addon">
                                                                    <span class="fa fa-clock-o"></span>
                                                                </span>
                                                                <input type="text" class="form-control" name="route_end_time_2" placeholder="Route End Time" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <span class="btn btn-white toggle_route" type="reset">Cancel</span>
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Route Details</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" style="width:"100%";>
                                    <thead>
                                        <tr>
                                            <?php if ($institute_admin == 0) {?>
                                                <th colspan="3"></th>
                                            <?php }else{ ?>
                                                <th colspan="4"></th>
                                            <?php } ?>
                                            <th colspan="3">Towards School</th>
                                            <th colspan="3">Towards Home</th>
                                        </tr>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Route Number</th>
                                            <th>Route Name</th>
                                            <?php if ($institute_admin == 1) {?>
                                                <th>Client</th>
                                            <?php } ?>
                                            <th>Route ID</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Route ID</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($route as $key) {?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?=$key['route_no']?></td>
                                            <td><?=$key['route_name']?></td>
                                            <?php if ($institute_admin == 1) {?>
                                                <td><?=$key['client_name']?></td>
                                            <?php } ?>
                                            <td><?=$key['type1_route_id']?></td>
                                            <td><?=$key['type1_route_start_time']?></td>
                                            <td><?=$key['type1_route_end_time']?></td>
                                            <td><?=$key['type2_route_id']?></td>
                                            <td><?=$key['type2_route_start_time']?></td>
                                            <td><?=$key['type2_route_end_time']?></td>
                                            <td>
                                                <a href="<?=site_url('route/edit_route/'.$key['route_no'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil edit"></i> Edit</span></a>&nbsp
                                                <!--<?php if($key['route_expiry_date'] == '9999-12-31') {?>
                                                    <a href="<?=site_url('route/deactive_route/'.$key['route_no'])?>"><span class="btn btn-xs btn-danger"><i class="fa fa-ban disable"></i> Deactive</span></a>
                                                <?php } ?>
                                                <?php if($key['route_expiry_date'] != '9999-12-31') {?>
                                                    <a href="<?=site_url('route/active_route/'.$key['route_no'])?>"><span class="btn btn-xs btn-success"><i class="fa fa-ban disable"></i> Active</span></a>
                                                <?php } ?>   -->   
                                            </td>
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