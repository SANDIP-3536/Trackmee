        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins aactive">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Driver Details</b></h3>
                                </div>
                                <div class="col-sm-6">
                                    <div class="ibox-tools">
                                        <a href="<?=site_url('Driver/driver_registration')?>"><button class="btn btn-xs btn-primary">Driver Registration</button></a>
                                        <span class="btn btn-xs btn-danger dri_deactive">Driver Deactivate</span>
                                    </div>
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
                                        <th>Driver Address</th>
                                        <th>Driver Photo</th>
                                        <th>Driver Mobile No.</th>
                                        <th>Driver DOB</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i =1;
                                    foreach ($driver as $key) {?>
                                     <?php if($key['employee_expiry_date']=='9999-12-31') {?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$key['employee_first_name']?>&nbsp<?=$key['employee_middle_name']?>&nbsp<?=$key['employee_last_name']?></td>
                                            <td><?=$key['employee_address']?></td>
                                            <td><img src="<?=$key['employee_photo']?>" width="100"  height="100"></td>
                                            <td><?=$key['employee_pri_mobile_number']?></td>
                                            <td><?=$key['employee_DOB']?></td>
                                            <!-- <td><img src="<?=$key['driver_licence_photo']?>" width="100"  height="100" alt="image not found"></td> -->
                                            <td>
                                                <?php if($key['employee_expiry_date'] == '9999-12-31') {?>
                                                    <a href="<?=site_url('Driver/view_driver_details/' .$key['employee_profile_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil edit"></i> Edit </a></span>&nbsp &nbsp
                                                    <a href="<?=site_url('Driver/driver_deactive/' .$key['employee_profile_id'])?>"><span class="btn btn-xs btn-danger"><i class="fa fa-ban view"></i> Deactive</span></a>&nbsp
                                                <?php } ?>
                                                <?php if($key['employee_expiry_date'] != '9999-12-31') {?>
                                                <a href="<?=site_url('Driver/driver_active/' .$key['employee_profile_id'])?>"><span class="btn btn-xs btn-success"><i class="fa fa-ban view"></i> Active</span></a>&nbsp &nbsp
                                                <?php } ?>
                                               <!--  <span class="action"><a href="<?=site_url('Driver/delete_driver/' .$key['driver_profile_id'])?>"><i class="fa fa-trash-o"></i></a></span> -->
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="ibox float-e-margins deactive">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Driver Details</b></h3>
                                </div>
                                <div class="col-sm-6">
                                    <div class="ibox-tools">
                                        <a href="<?=site_url('Driver/driver_registration')?>"><button class="btn btn-xs btn-primary">Driver Registration</button></a>
                                        <span class="btn btn-xs btn-primary dri_active">Driver Activate</span>
                                    </div>
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
                                        <th>Driver Address</th>
                                        <th>Driver Photo</th>
                                        <th>Driver Mobile No.</th>
                                        <th>Driver DOB</th>
                                        <!-- <th>Driver License</th> -->
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i =1;
                                    foreach ($driver as $key) {?>
                                    <?php if($key['employee_expiry_date']!='9999-12-31') {?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$key['employee_first_name']?>&nbsp<?=$key['employee_middle_name']?>&nbsp<?=$key['employee_last_name']?></td>
                                            <td><?=$key['employee_address']?></td>
                                            <td><img src="<?=$key['employee_photo']?>" width="100"  height="100"></td>
                                            <td><?=$key['employee_pri_mobile_number']?></td>
                                            <td><?=$key['employee_DOB']?></td>
                                            <!-- <td><img src="<?=$key['driver_licence_photo']?>" width="100"  height="100" alt="image not found"></td> -->
                                            <td>
                                                <?php if($key['employee_expiry_date'] == '9999-12-31') {?>
                                                    <a href="<?=site_url('Driver/update_driver/' .$key['employee_profile_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil edit"></i>Edit</a></span>&nbsp &nbsp
                                                    <a href="<?=site_url('Driver/driver_deactive/' .$key['employee_profile_id'])?>"><span class="btn btn-xs btn-danger"><i class="fa fa-ban view"></i> Deactive</span></a>&nbsp &nbsp
                                                <?php } ?>
                                                <?php if($key['employee_expiry_date'] != '9999-12-31') {?>
                                                <a href="<?=site_url('Driver/driver_active/' .$key['employee_profile_id'])?>"><span class="btn btn-xs btn-success"><i class="fa fa-ban view"></i> Active</span></a>&nbsp &nbsp
                                                <?php } ?>
                                               <!--  <span class="action"><a href="<?=site_url('Driver/delete_driver/' .$key['driver_profile_id'])?>"><i class="fa fa-trash-o"></i></a></span> -->
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
