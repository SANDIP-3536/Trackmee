        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins aactive">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Employee Details</b></h3>
                                </div>
                                <div class="col-sm-6">
                                    <div class="ibox-tools">
                                        <a href="<?=site_url('employee/employee_registration')?>"><button class="btn btn-xs btn-primary">Employee Registration</button></a>
                                        <span class="btn btn-xs btn-danger stu_deactive">Employee Deactivate</span>
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
                                        <th>Employee Name</th>
                                        <th>Employee Address</th>
                                        <th>Employee Mobile No.</th>
                                        <th>Employee Photo</th>
                                        <th>Employee DOB</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1;
                                        foreach ($employee as $key) {
                                     ?>
                                     <?php if($key['employee_expiry_date']=='9999-12-31') {?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?=$key['employee_first_name']?>&nbsp<?=$key['employee_middle_name']?>&nbsp<?=$key['employee_last_name']?></td>
                                            <td><?=$key['employee_address']?></td>
                                            <td><?=$key['employee_pri_mobile_number']?></td>
                                            <td><img src="<?=$key['employee_photo']?>" width="100"  height="100"></td>
                                            <td><?=$key['employee_DOB']?></td>
                                            <td>
                                                <?php if($key['employee_expiry_date'] == '9999-12-31') {?>
                                                    <a href="<?=site_url('Employee/view_employee_details/' .$key['employee_profile_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil edit" title="Edit"> Edit</i></span></a>&nbsp
                                                    <a href="<?=site_url('Employee/employee_deactive/' .$key['employee_profile_id'])?>"><span class="btn btn-xs btn-danger"><i class="fa fa-ban view" title="Deactive"> Deactive</i></a></span>
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
                    <div class="ibox float-e-margins deactive" >
                        <div class="ibox-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3><b>Employee Details</b></h3>
                            </div>
                            <div class="col-sm-6">
                                <div class="ibox-tools">
                                    <a href="<?=site_url('Employee/employee_registration')?>"><button class="btn btn-xs btn-primary">Employee Registration</button></a>
                                    <span class="btn btn-xs btn-primary stu_active">Employee Activate</span>
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
                                    <th>Employee Photo</th>
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
                                        <td><img src="<?=$key['employee_photo']?>" width="100"  height="100"></td>
                                        <td><?=$key['employee_DOB']?></td>
                                        <td>
                                            <?php if($key['employee_expiry_date'] != '9999-12-31') {?>
                                                <a href="<?=site_url('employee/employee_active/' .$key['employee_profile_id'])?>"><span class="btn btn-xs btn-success"><i class="fa fa-ban view"> Active</i></a></span>
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