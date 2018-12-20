        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><b>Stop Registration</b></h5>
                            <div class="ibox-tools">
                                <span class="btn btn-xs btn-primary" id="toggle_route"> Add </span>    
                            </div>
                        </div>
                        <div class="stop_regis">
                            <div class="ibox-content">
                                <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addStop" action="<?=site_url('Stop/add_stop')?>">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Route Name</label>
                                        <div class="col-lg-2">
                                            <select name="route_no" class="form-control" id="stop_route_id">
                                                <option value="0">Select Route</option>
                                                <?php foreach ($route as $key) {?>
                                                <option value="<?=$key['route_no']?>"><?=$key['route_no']?>:<?=$key['route_name']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <label class="col-lg-1 control-label">Route Type</label>
                                        <div class="col-lg-3">
                                            <select name="route_type" class="form-control route_type" >
                                                <option value="0">Select Route</option>
                                                <option value="1">From Home to Workplace\School</option>
                                                <option value="2">From Workplace\School to Home</option>
                                            </select>
                                        </div>
                                        <?php if ($institute_admin == 1) {?>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">Client</label>
                                            <div class="col-sm-2">
                                                <select class="form-control client_details" name="stop_client_profile_id">
                                                </select>
                                            </div>
                                        </div>
                                        <?php } ?>
                                </div>
                                <div class="table-responsive" style="padding-left: 100px;padding-right: 100px;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%;">Stop Index</th>
                                                <th>Stop Name</th>
                                                <th style="width: 20%;">Stop latitude</th>
                                                <th style="width: 20%;">Stop Longitude</th>
                                                <th style="width: 100px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="stock">

                                        </tbody> 
                                    </table>
                                    <span class="add_stop pull-right" style="color:#67C6F1; font-size: 08px;"><i class="fa fa-plus fa-2x" aria-hidden="true"><u style="margin-left: 5px;"> <b>New Stop</b></u></i></span>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2 col-sm-offset-2">
                                        <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Stop From Home to Workplace\School</b></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" >
                                            <thead>
                                                <tr>
                                                    <th>Stop No</th>
                                                    <th>Stop Name</th>
                                                    <th>Stop Latitude</th>
                                                    <th>Stop Longitude</th>
                                                </tr>
                                            </thead>
                                            <tbody id="route_type1">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="ibox-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3><b>Stop From Workplace\School to Home</b></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Stop No</th>
                                                <th>Stop Name</th>
                                                <th>Stop Latitude</th>
                                                <th>Stop Longitude</th>
                                            </tr>
                                        </thead>
                                        <tbody id="route_type2">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3><b>Stop Details</b></h3>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Route Name</label>
                            <div class="col-lg-4">
                                <select name="route_no" class="form-control route_no">
                                    <option>Select Route</option>
                                    <?php foreach ($route as $key) {?>
                                    <option value="<?=$key['route_no']?>"><?=$key['route_name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th style="border-right:none; text-align:center;">Route No : <span class="route_number"></span>  &nbsp &nbsp &nbsp Route Name : <span class="route_name"></span></th> 
                                        </tr>
                                    </thead>
                                </table>
                                <div class="col-sm-6">
                                    <div class="ibox-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3><b>Stop From Home to Workplace\School</b></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" >
                                                <thead>
                                                    <tr>
                                                        <th>Route ID: <span class="route_id"></span></th>
                                                        <th colspan="2">Start Time: <span class="school_start_time"></span></th>
                                                        <th colspan="2">End Time: <span class="school_end_time"></span></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Stop ID</th>
                                                        <th>Stop Index</th>
                                                        <th>Stop Name</th>
                                                        <th>Stop Latitude</th>
                                                        <th>Stop Longitude</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="route_type1">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                   <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Stop From Workplace\School to Home</b></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Route ID: <span class="route_id_1"></span></th>
                                                    <th colspan="2">Start Time: <span class="home_start_time"></span></th>
                                                    <th colspan="2">End Time: <span class="home_end_time"></span></th>
                                                </tr>
                                                <tr>
                                                    <th>Stop ID</th>
                                                    <th>Stop Index</th>
                                                    <th>Stop Name</th>
                                                    <th>Stop Latitude</th>
                                                    <th>Stop Longitude</th>
                                                </tr>
                                            </thead>
                                            <tbody class="route_type2">

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
</div>
</div>