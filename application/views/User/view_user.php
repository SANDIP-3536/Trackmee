        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins" id="aactive">
                        <div class="ibox float-e-margins" id="list">
                            <div class="ibox-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3><i class="fa fa-th list_view" aria-hidden="true"><b> User Details</b></i></h3>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="ibox-tools">
                                            <a href="<?=site_url('User/user_registration')?>"><button class="btn btn-xs btn-primary"><i class="fa fa-plus" title="USer Registration"></i></button></a>
                                            <span class="btn btn-xs btn-danger stu_deactive"><i class="fa fa-ban" title="User Deactivate"></i></span>
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
                                            <th class="hidden">User Profile</th>
                                            <th>User Name</th>
                                            <th>User Address</th>
                                            <th>User Mobile No.</th>
                                            <th>User DOB</th>
                                            <?php if($institute_admin == 1) {?>
                                                <th>Client</th>
                                            <?php } ?>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; foreach ($user as $key) {?>
                                        <?php if($key['user_expiry_date'] =='9999-12-31') {?>
                                            <tr class="user_details">
                                                <td><?=$i++?></td>
                                                <td class="user_details_profile hidden"><?=$key['user_profile_id']?></td>
                                                <td><?=$key['user_first_name']?>&nbsp<?=$key['user_middle_name']?>&nbsp<?=$key['user_last_name']?></td>
                                                <td><?=$key['user_address']?></td>
                                                <td><?=$key['user_mobile_number']?></td>
                                                <td><?=$key['user_DOB']?></td>
                                                <?php if($institute_admin == 1) {?>
                                                    <td><?=$key['client_name']?></td>
                                                <?php } ?>
                                            </tr>
                                        <?php } }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="ibox float-e-margins hidden" id="grid">
                            <div class="ibox-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3><i class="fa fa-list grid_view" aria-hidden="true"></i><b> User Details</b></h3>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="ibox-tools">
                                            <a href="<?=site_url('User/user_registration')?>"><button class="btn btn-xs btn-primary"><i class="fa fa-plus" title="User Registration"></i></button></a>
                                            <span class="btn btn-xs btn-danger stu_deactive"><i class="fa fa-ban" title="User Deactivate"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <?php $i=1; foreach ($user as $key) {?>
                                        <div class="col-md-2">
                                            <div class="ibox-content text-center" style="padding: 3% 0%;">
                                                <h3><?=$key['user_first_name']?>&nbsp<?=$key['user_last_name']?></h3>
                                                <div class="m-b-sm">
                                                    <img alt="image" class="img-circle" src="<?=$key['user_photo']?>" style="max-width:15%;">
                                                </div>
                                                <p class="font-bold">Mobile No. <?=$key['user_mobile_number']?></p>
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
                                <h3><b>User Details</b></h3>
                            </div>
                            <div class="col-sm-6">
                                <div class="ibox-tools">
                                    <a href="<?=site_url('User/user_registration')?>"><button class="btn btn-xs btn-primary"><i class="fa fa-plus" title="User Registration"></i></button></a>
                                    <span class="btn btn-xs btn-success stu_active"><i class="fa fa-ban" title="User Actived"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <th>Sr No.</th>
                                    <th>User Name</th>
                                    <th>User Address</th>
                                    <th>User Mobile No.</th>
                                    <th>User DOB</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                <?php $i=1;
                                    foreach ($user as $key) {
                                 ?>
                                 <?php if($key['user_expiry_date'] !='9999-12-31') {?>
                                    <tr>
                                        <td><?=$i++?></td>
                                        <td><?=$key['user_first_name']?>&nbsp<?=$key['user_middle_name']?>&nbsp<?=$key['user_last_name']?></td>
                                        <td><?=$key['user_address']?></td>
                                        <td><?=$key['user_mobile_number']?></td>
                                        <td><?=$key['user_DOB']?></td>
                                        <td>
                                            <?php if($key['user_expiry_date'] != '9999-12-31') {?>
                                                <a href="<?=site_url('User/user_active/' .$key['user_profile_id'])?>"><span class="btn btn-xs btn-success"><i class="fa fa-ban" title="User Active"></i></a></span>
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