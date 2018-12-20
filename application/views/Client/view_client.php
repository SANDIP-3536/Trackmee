<style>
.m-b-md[min-height~="66px"] h2 {
    font-size: 24px;
}

.m-b-md[min-height~="92px"] h2 {
    font-size: 20px;
}
</style>       
<div class="wrapper wrapper-content animated fadeInRight" id="list_view">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3><b><i class="fa fa-list list_view_details" title="All School Details" style="color:red;"></i> Client Details</b></h3>
                        </div>
                        <div class="col-sm-6">
                            <div class="ibox-tools">
                                <a href="<?=site_url('Client/client_registration')?>"><button class="btn btn-xs btn-primary"><i class="fa fa-plus " title="New Client"></i></button></a>
                                <span class="btn btn-xs btn-primary user_details"><i class="fa fa-users " title="Employee Details"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="row">
                            <?php foreach ($client as $key => $value) { 
                                if(empty($value)) {
                                        unset($client[$key]);
                                    }
                                }
                                if (empty($client)) { ?>
                                    <center>
                                        <img src='<?=base_url();?>assets/img/No-record-found.png'> 
                                    </center>
                            <?php }foreach ($client as $key) { ?>
                                <div class="col-lg-3">
                                <a href="<?=site_url('Client/client_user_details/') .$key['client_profile_id']?>">
                                <?php if($key['client_expiry_date'] == '9999-12-31'){ ?>
                                    <div class="widget-head-color-box navy-bg p-lg text-center" style="padding:15px 15px 15px 15px;">
                                <?php }else{ ?>
                                    <div class="widget-head-color-box navy-bg p-lg text-center" style="padding:15px 15px 15px 15px; background-color:#fdabab;">
                                <?php } ?>
                                     <center>
                                        <img src="<?=$key['client_logo']?>" class="img-responsive" height= "150" width="150" alt="profile">
                                    </center>
                                    <div class="m-b-md" >
                                        <h2 class="font-bold no-margins">
                                            <?=$key['client_name']?>
                                        </h2>
                                    </div>
                                    <div style="font-size:14px;color:cyan;">
                                        <?php if(empty($key['user_count'])) {?>
                                        <span>00 User</span> |
                                        <?php }else{ ?>
                                        <span><?=$key['user_count']?> User</span> |
                                        <?php } ?>
                                        <?php if(empty($key['employee_count'])) {?>
                                        <span>00 Employee</span> |
                                        <?php }else{ ?>
                                        <span><?=$key['employee_count']?> Employee</span> |
                                        <?php } ?>
                                        <?php if(empty($key['bus_count'])) {?>
                                        <span>00 Bus</span>
                                        <?php }else{ ?>
                                        <span><?=$key['bus_count']?> Bus</span>
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
                            <h3><b><i class="fa fa-th-large grid_view_details" title="All School Details" style="color:red;" ></i> Client Details</b></h3>
                        </div>
                        <div class="col-sm-6">
                            <div class="ibox-tools">
                                <a href="<?=site_url('CLient/client_registration')?>"><button class="btn btn-xs btn-primary"><i class="fa fa-plus " title="New Client"></i></button></a>
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
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Mobile No.</th>
                                    <th>Phone No.</th>
                                    <th>Email ID.</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;
                                    foreach ($all_client as $key) { 
                                ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$key['client_name']?></td>
                                        <td><?=$key['client_address']?></td>
                                        <td><?=$key['client_latitude']?></td>
                                        <td><?=$key['client_longitude']?></td>
                                        <td><?=$key['client_mobile_number']?></td>
                                        <td><?=$key['client_phone_number']?></td>
                                        <td><?=$key['client_email_id']?></td>
                                        <td>
                                            <?php if($key['client_expiry_date'] == '9999-12-31') {?>
                                                <a href="<?=site_url('Client/client_deactive/' .$key['client_profile_id'])?>"><span class="btn btn-xs btn-warning" style="background-color:red;"><i class="fa fa-ban " title="Activate"></i></span></a>
                                            <?php }else{ ?>
                                                <a href="<?=site_url('Client/client_active/' .$key['client_profile_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-ban " title="Deactivate"></i></span></a>
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
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Mobile No.</th>
                                    <th>Email ID.</th>
                                    <th>Gender</th>
                                    <th>Client</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;
                                    foreach ($all_employee as $key) { 
                                ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$key['employee_first_name']?> <?=$key['employee_middle_name']?> <?=$key['employee_last_name']?></td>
                                        <td><?=$key['employee_address']?></td>
                                        <td><?=$key['employee_pri_mobile_number']?></td>
                                        <td><?=$key['employee_email_id']?></td>
                                        <td><?=$key['employee_gender']?></td>
                                        <td><?=$key['client_name']?></td>
                                        <td>
                                            <?php if($key['employee_expiry_date'] == '9999-12-31') {?>
                                                <a href="<?=site_url('Client/deactivate_employee/' .$key['employee_profile_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-ban " title="Deactivate"></i></span></a>
                                            <?php }else{ ?>
                                                <a href="<?=site_url('Client/activate_employee/' .$key['employee_profile_id'])?>"><span class="btn btn-xs btn-warning" style="background-color:red;"><i class="fa fa-ban " title="Activate"></i></span></a>
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
