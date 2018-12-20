        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins" id="aactive">
                        <div class="ibox float-e-margins" id="list">
                            <div class="ibox-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3><i class="fa fa-th list_view" aria-hidden="true"><b> Employee Details</b></i></h3>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="ibox-tools">
                                            <a href="<?=site_url('Employee/employee_registration')?>"><button class="btn btn-xs btn-primary"><i class="fa fa-plus" title="Employee Registration"></i></button></a>
                                            <span class="btn btn-xs btn-danger stu_deactive"><i class="fa fa-ban" title="Employee Deactivate"></i></span>
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
                                            <th class="hidden">Employee Profile</th>
                                            <th>Employee Position</th>
                                            <th>Employee Name</th>
                                            <th>Employee Address</th>
                                            <th>Employee Mobile No.</th>
                                            <th>Employee DOB</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; foreach ($employee as $key) {?>
                                            <tr class="employee_details">
                                                <td><?=$i++?></td>
                                                <td class="employee_details_profile hidden"><?=$key['employee_profile_id']?></td>
                                                <?php if($key['employee_type'] == 5){ ?>
                                                    <td>Teacher</td>
                                                <?php }elseif ($key['employee_type'] == 6) {?>
                                                    <td>Driver</td>
                                                <?php }elseif ($key['employee_type'] == 9) {?>
                                                    <td>Accountant</td>
                                                <?php }elseif ($key['employee_type'] == 10) {?>
                                                    <td>Non Teaching</td>
                                                <?php }elseif ($key['employee_type'] == 11) {?>
                                                    <td>Clerk</td>
                                                <?php }elseif ($key['employee_type'] == 12) {?>
                                                    <td>Peon</td>
                                                <?php } ?>
                                                <td><?=$key['employee_first_name']?>&nbsp<?=$key['employee_middle_name']?>&nbsp<?=$key['employee_last_name']?></td>
                                                <td><?=$key['employee_address']?></td>
                                                <td><?=$key['employee_pri_mobile_number']?></td>
                                                <td><?=$key['employee_DOB']?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="ibox float-e-margins hidden" id="grid">
                            <div class="ibox-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3><i class="fa fa-list grid_view" aria-hidden="true"></i><b> Employee Details</b></h3>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="ibox-tools">
                                            <a href="<?=site_url('Employee/employee_registration')?>"><button class="btn btn-xs btn-primary"><i class="fa fa-plus" title="Employee Registration"></i></button></a>
                                            <span class="btn btn-xs btn-danger stu_deactive"><i class="fa fa-ban" title="Employee Deactivate"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <?php $i=1; foreach ($employee as $key) {?>
                                        <div class="col-md-2">
                                            <div class="ibox-content text-center" style="padding: 3% 0%;">
                                                <h3><?=$key['employee_first_name']?>&nbsp<?=$key['employee_last_name']?></h3>
                                                <div class="m-b-sm">
                                                    <img alt="image" class="img-circle" src="<?=$key['employee_photo']?>" style="max-width:15%;">
                                                </div>
                                                <p class="font-bold"><?php if($key['employee_type'] == 5){ echo "Teacher"; }elseif($key['employee_type'] == 6){ echo "Driver"; }?> </p>
                                                <p class="font-bold">Mobile No. <?=$key['employee_pri_mobile_number']?></p>
                                            </div>
                                        </div>
                                    <?php } ?>                            
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox float-e-margins hidden" id="deactive">
                        <div class="ibox-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3><b>Employee Details</b></h3>
                            </div>
                            <div class="col-sm-6">
                                <div class="ibox-tools">
                                    <a href="<?=site_url('Employee/employee_registration')?>"><button class="btn btn-xs btn-primary"><i class="fa fa-plus" title="Employee Registration"></i></button></a>
                                    <span class="btn btn-xs btn-success stu_active"><i class="fa fa-ban" title="Employee Actived"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <th>Sr No.</th>
                                    <th>Employee Name</th>
                                    <th>Employee Address</th>
                                    <th>Employee Mobile No.</th>
                                    <th>Employee DOB</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                <?php $i=1;
                                    foreach ($employee as $key) {
                                 ?>
                                 <?php if($key['employee_expiry_date']!='9999-12-31') {?>
                                    <tr>
                                        <td><?=$i++?></td>
                                        <td><?=$key['employee_first_name']?>&nbsp<?=$key['employee_middle_name']?>&nbsp<?=$key['employee_last_name']?></td>
                                        <td><?=$key['employee_address']?></td>
                                        <td><?=$key['employee_pri_mobile_number']?></td>
                                        <td><?=$key['employee_DOB']?></td>
                                        <td>
                                            <?php if($key['employee_expiry_date'] != '9999-12-31') {?>
                                                <a href="<?=site_url('Employee/employee_active/' .$key['employee_profile_id'])?>"><span class="btn btn-xs btn-success"><i class="fa fa-ban" title="Employee Active"></i></a></span>
                                            <?php } ?>
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