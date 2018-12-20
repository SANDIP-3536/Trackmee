        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><b>Geofence Registration</b></h5>
                            <div class="ibox-tools">
                                <span class="btn btn-xs btn-primary toggle_route"><i class="fa fa-plus" title="Add New Geofence"></i> </span>    
                            </div>
                        </div>
                        <div class="ibox-content route_toggle">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addgeofence" action="<?=site_url('Geofence/add_geofence_registration')?>">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Bus <span style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <select name="geofence_bus_no" class="form-control">
                                            <option value="0">Select Bus</option>
                                            <?php foreach ($bus as $key) { ?>
                                            <option value="<?=$key['bus_id']?>"><?=$key['bus_no']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <?php if ($institute_admin == 1) {?>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Client <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="geofence_client_profile_id">
                                            <option class="0">Select Client</option>
                                            <?php foreach ($client as $key) { ?>
                                                <option value="<?=$key['client_profile_id']?>"><?=$key['client_name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                    <?php } ?>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Lattitude <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" name="geofence_lat" class="form-control" id="geofence_lat">
                                    </div>
                                    <label class="col-lg-2 control-label">Longitude <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" name="geofence_long" class="form-control" id="geofence_long">
                                    </div>
                                    <div class="col-lg-2">
                                    	<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal"><img src="https://trackmee.syntech.co.in/trackmee/assets/img/map_picker.png"></button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Radius</label>
                                    <div class="col-lg-8">
                                        <input type="range" class="ranger" id="ionrange_2" value="0.5" min="0.0" max="1.0" step="0.01" />
                                        <input type="text" name="geofence_radius" class="form-control hidden" id="geofence_radius">
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
                                    <h3><b>Geofence Details</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Bus Number</th>
                                            <th>Lattitute</th>
                                            <th>Longitude</th>
                                            <th>Radius</th>
                                            <?php if($institute_admin == 1){ ?>
                                                <th>Client</th>
                                            <?php } ?>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($geofence as $key) {?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?=$key['bus_no']?></td>
                                            <td><?=$key['geofence_lat']?></td>
                                            <td><?=$key['geofence_long']?></td>
                                            <td><?=$key['geofence_radius']?></td>
                                            <?php if ($institute_admin == 1){ ?>
                                                <td><?=$key['client_name']?></td>
                                            <?php } ?>
                                            <td>
                                                <!-- <a href="<?=site_url('route/edit_route/'.$key['geofence_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil edit"></i> Edit</span></a>&nbsp -->
                                                <?php if($key['geofence_expiry_date'] == '9999-12-31') {?>
                                                    <a href="<?=site_url('Geofence/deactive_geofence/'.$key['geofence_id'])?>"><span class="btn btn-xs btn-danger"><i class="fa fa-ban disable" title=" Deactive"></i></span></a>
                                                <?php } ?>
                                                <?php if($key['geofence_expiry_date'] != '9999-12-31') {?>
                                                    <a href="<?=site_url('Geofence/active_geofence/'.$key['geofence_id'])?>"><span class="btn btn-xs btn-success"><i class="fa fa-ban disable" title="Active"></i></span></a>
                                                <?php } ?>      
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
            <div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title"><b>Map Lat-Long Picker</b></h4>
			      </div>
			      <div class="modal-body">
			         <fieldset class="gllpLatlonPicker">
                        <div class="gllpMap"></div><br><center>
                    	<div class="row">
                    		<div class="col-sm-6">
                                <div class="col-sm-10">   
                                    <div class="form-group">
                                        <label class="control-label" style="padding-bottom:2%">Lattitude</label>
                                        <input type="text" name="" class="form-control gllpLatitude" value="22.38661818384341">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-10">   
                                    <div class="form-group">
                                        <label class="control-label" style="padding-bottom:2%">Longitude</label>
                                        <input type="text" name="" class="form-control gllpLongitude" value="79.52245681526063">
                                    </div>
                                </div>
                            </div>
		                </div>
                        <input type="text" class="gllpZoom hidden" value="3"/>
                    </fieldset>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-info" id="update_lat_long" data-dismiss="modal">Update</button>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>
        </div>