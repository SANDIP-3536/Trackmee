        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Route Registration</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <?php foreach ($route as $key) { ?>
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addRoute" action="<?=site_url('Route/edit_route_details')?>">
                                <div class="form-group">
                                    <div class="col-lg-8" hidden>
                                        <input type="text" placeholder="Route Name" name="route_id" class="form-control" value="<?=$key['route_id']?>">
                                    </div>
                                    <label class="col-lg-2 control-label">Route Name</label>
                                    <div class="col-lg-8">
                                        <input type="text" placeholder="Route Name" name="route_name" class="form-control" value="<?=$key['route_name']?>" readonly>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="row" >
                                    <div class="col-lg-6" style="border-right: 1px solid;">
                                        <div class="form-group">
                                            <div class="row" style="padding-left: 200px;">
                                                <div class="col-lg-6">
                                                    <label class="col-sm-12 control-label">Towards School</label>
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
                                                        <input type="text" class="form-control" name="route_start_time_1" placeholder="Route Start Time" value="<?=$key['route_start_time']?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5" style="padding-right: 10px;">
                                                    <div class="col-sm-12">
                                                        <div class="input-group clockpicker" data-autoclose="true">
                                                        <span class="input-group-addon">
                                                                <span class="fa fa-clock-o"></span>
                                                            </span>
                                                            <input type="text" class="form-control" name="route_end_time_1" placeholder="Route End Time" value="<?=$key['route_end_time']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="col-lg-6">
                                            <?php foreach ($route1 as $key) { ?>
                                            <div class="form-group">
                                                <div class="row" style="padding-left: 30px;padding-right: 150px;">
                                                    <div class="col-lg-8" hidden>
                                                        <input type="text" placeholder="Route Name" name="route_id_2" class="form-control" value="<?=$key['route_id']?>">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="col-sm-12">
                                                            <div class="input-group clockpicker" data-autoclose="true">
                                                                <!-- <input type="text" class="form-control" value="09:30" > -->
                                                                <span class="input-group-addon">
                                                                    <span class="fa fa-clock-o"></span>
                                                                </span>
                                                                <input type="text" class="form-control" name="route_start_time_2" placeholder="Route Start Time" value="<?=$key['route_start_time']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="col-sm-12">
                                                            <div class="input-group clockpicker" data-autoclose="true">
                                                            <span class="input-group-addon">
                                                                    <span class="fa fa-clock-o"></span>
                                                                </span>
                                                                <input type="text" class="form-control" name="route_end_time_2" placeholder="Route End Time" value="<?=$key['route_end_time']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                           <a href="<?=site_url('Route/route_registration')?>"><span class="btn btn-white">Cancel</span></a>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>