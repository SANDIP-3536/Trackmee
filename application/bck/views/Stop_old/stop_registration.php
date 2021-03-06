        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Stop Registration</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Stop/add_stop')?>">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Route Name</label>
                                    <div class="col-lg-8">
                                        <select name="stop_route_id" class="form-control" id="stop_route_id">
                                            <option>Select Route</option>
                                            <?php foreach ($route as $key) {?>
                                                <option value="<?=$key['route_no']?>"><?=$key['route_no']?>-><?=$key['route_name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-lg-2 control-label">Route Type</label>
                                    <div class="col-lg-8">
                                        <label class="radio-inline"> 
                                            <input type="radio" class="route_type" name="route_type" value="1">&nbsp  Towards School 
                                        </label> 
                                        <label class="radio-inline">
                                            <input type="radio" name="route_type" class="route_type" value="2">  &nbsp Towards Home
                                        </label>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                 <div class="table-responsive" style="padding-left: 100px;padding-right: 100px;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <!-- <th>Route Type</th> -->
                                                <th>Stop Index</th>
                                                <th>Stop Name</th>
                                                <th>Stop latitude</th>
                                                <th>Stop Longitude</th>
                                            </tr>
                                        </thead>
                                        <tbody class="stock">

                                        </tbody> 
                                    </table>
                                     <span class="add_stop" style="color:#67C6F1; font-size: 08px;"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"><u>New Stop</u></i></span>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="reset">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Stop Details</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-6">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Stop Towards School</b></h3>
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
                                    <h3><b>Stop Towards Home</b></h3>
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
                </div>
            </div>