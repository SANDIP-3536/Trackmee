    <div class="wrapper wrapper-content animated fadeInRight" id="list_view">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3><i class="fa fa-list list_view_details" title="All Institute Details" style="color:red;"></i><b> Institute Details</b></h3>
                            </div>
                            <div class="col-sm-6">
                                <div class="ibox-tools">
                                    <a href="<?=site_url('Institute/institute_registration')?>"><button class="btn btn-xs btn-primary"><i class="fa fa-plus " title="New Institute"></i></button></a>
                                    <!-- <span class="btn btn-xs btn-primary user_details"><i class="fa fa-users " title="Employee Details"></i></span> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ibox-content">
                        <div class="wrapper wrapper-content animated fadeInRight">
                                <div class="row">
                                <?php foreach ($institute as $key => $value) { 
                                if(empty($value)) {
                                        unset($institute[$key]);
                                    }
                                }
                                if (empty($institute)) { ?>
                                     <center>
                                        <img src='<?=base_url();?>assets/img/No-record-found.png'> 
                                    </center>
                                <?php }foreach ($institute as $key) { ?>
                                <div class="col-lg-3">
                                    <a href="<?=site_url('institute/institute_user/' .$key['institute_profile_id'])?>">
                                        <div class="widget-head-color-box navy-bg p-lg text-center">
                                            <center>
                                                <img src="<?=$key['institute_logo']?>" class="img-responsive" height= "150" width="150" alt="institute_logo" style="height:150px !important;">
                                            </center>
                                            <div class="m-b-md">
                                                <h2 class="font-bold no-margins" style="font-size:22px; font-weight:600 !important;">
                                                    <?=$key['institute_name']?>
                                                </h2>
                                            </div>
                                            <div style="font-size:14px;color:cyan;">
                                                <?php if(empty($key['client_count'])) {?>
                                                    <span>00 Client</span> |
                                                <?php }else{ ?>
                                                    <span><?=$key['client_count']?> Client</span> |
                                                <?php } ?>
                                                <?php if(empty($key['user_count'])) {?>
                                                    <span>00 User</span> |
                                                <?php }else{ ?>
                                                    <span><?=$key['user_count']?> User</span> |
                                                <?php } ?>
                                                <?php if(empty($key['employee_count'])) {?>
                                                    <span>00 Employee</span> 
                                                <?php }else{ ?>
                                                    <span><?=$key['employee_count']?> Employee</span> 
                                                <?php } ?>
                                            </div>
                                        </div></a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight hidden" id="grid_view">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3><b><i class="fa fa-th-large grid_view_details" title="All School Details" style="color:red;" ></i> Institute Details</b></h3>
                            </div>
                            <div class="col-sm-6">
                                <div class="ibox-tools">
                                    <a href="<?=site_url('Institute/institute_registration')?>"><button class="btn btn-xs btn-primary"><i class="fa fa-plus " title="New Institute"></i></button></a>
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
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Mobile No.</th>
                                        <th>Phone No.</th>
                                        <th>Email ID.</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;
                                        foreach ($all_institute as $key) { 
                                    ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$key['institute_name']?></td>
                                            <td><?=$key['institute_address']?></td>
                                            <td><?=$key['institute_mobile_number']?></td>
                                            <td><?=$key['institute_phone_number']?></td>
                                            <td><?=$key['institute_email_id']?></td>
                                            <td>
                                                <?php if($key['institute_expiry_date'] == '9999-12-31') {?>
                                                    <a href="<?=site_url('Institute/deactivate_institute/' .$key['institute_profile_id'])?>"><span class="btn btn-xs btn-primary" ><i class="fa fa-ban " title="Deactivate"></i></span></a>
                                                <?php }else{ ?>
                                                    <a href="<?=site_url('Institute/activate_institute/' .$key['institute_profile_id'])?>"><span class="btn btn-xs btn-warning" style="background-color:red;"><i class="fa fa-ban " title="Activate"></i></span></a>
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
    </div>
    <div class="wrapper wrapper-content animated fadeInRight hidden" id="employee_details">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3><b><i class="fa fa-th-large grid_view_details" title="All School Details" style="color:red;" ></i> Employee Details</b></h3>
                            </div>
                            <div class="col-sm-6">
                                <div class="ibox-tools">
                                    <!-- <a href="<?=site_url('School/school_registration')?>"><button class="btn btn-xs btn-primary"><i class="fa fa-plus " title="New School"></i></button></a> -->
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
                                        <th>Institute</th>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Mobile No.</th>
                                        <th>Email ID.</th>
                                        <th>Gender</th>
                                        <th>Date of Birth</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;
                                        foreach ($all_employee as $key) { 
                                    ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$key['institute_name']?></td>
                                            <td>Admin</td>  
                                            <td><?=$key['employee_first_name']?> <?=$key['employee_middle_name']?> <?=$key['employee_last_name']?></td>
                                            <td><?=$key['employee_address']?></td>
                                            <td><?=$key['employee_pri_mobile_number']?></td>
                                            <td><?=$key['employee_email_id']?></td>
                                            <td><?=$key['employee_gender']?></td>
                                            <td><?=$key['employee_DOB']?></td>
                                            <td>
                                                <?php if($key['employee_expiry_date'] == '9999-12-31') {?>
                                                    <a href="<?=site_url('Institute/disable_institute_employee/' .$key['employee_profile_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-ban " title="Deactivate"></i></span></a>
                                                <?php }else{ ?>
                                                    <a href="<?=site_url('Institute/enable_institute_employee/' .$key['employee_profile_id'])?>"><span class="btn btn-xs btn-warning" style="background-color:red;"><i class="fa fa-ban " title="Activate"></i></span></a>
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
    </div>

        