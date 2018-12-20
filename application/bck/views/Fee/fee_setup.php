    <div class="wrapper wrapper-content animated fadeInRight" style="padding-bottom:0%;">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#fee_category_demo"> Fee Category</a></li>
                <li class=""><a data-toggle="tab" href="#fee_type_demo">Fee Type</a></li>
                <li class=""><a data-toggle="tab" href="#fee_waiver_demo">Fee Waiver</a></li>
            </ul>
            <div class="tab-content">
                <div id="fee_category_demo" class="tab-pane active">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6" style="padding-right:inherit;">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title" style="border:none;border-bottom:1px solid black !important;">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3><b>Fees Category</b></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addNotification" action="<?=site_url('Fee/add_fee_category')?>">
                                            <div class="form-group">
                                               <label class="col-lg-3 control-label">Category Name<span style="color:red;">*</span></label>
                                               <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="fee_category_name" placeholder="Fee Category Name">
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="ibox-title" style="border:none;border-bottom:1px solid black !important;">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Fee Category Details </b></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Fee Category Name</th>
                                                    <!-- <th>Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($fee_category as $key) { ?>
                                                <tr>
                                                    <td><?=$i++;?></td>
                                                    <td><?=$key['fee_category_name']?></td>
                                                    <!-- <td>
                                                        <a href="<?=site_url('Fee/update_fee_category/'.$key['fee_category_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil edit"></i> Edit</span></a>
                                                    </td> -->
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
                <div id="fee_type_demo" class="tab-pane">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6" style="padding-right:inherit;">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title" style="border:none;border-bottom:1px solid black !important;">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3><b>Fees Type</b></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addNotification1" action="<?=site_url('Fee/add_fee_types')?>">
                                            <div class="form-group">
                                               <label class="col-lg-2 control-label">Name<span style="color:red;">*</span></label>
                                               <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="fees_type_name" placeholder="Fee Type Name">
                                                </div>
                                            </div>
                                            <?php if($functionality[0]['school_CRM'] == 1) {?>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Class<span style="color:red;">*</span></label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" name="fees_type_class_id">
                                                        <option>Select Class</option>
                                                        <option value="0">Default</option>
                                                        <?php foreach ($class_details as $key) { ?>
                                                        <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php } else {?>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Class<span style="color:red;">*</span></label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" name="fees_type_class_id" readonly>
                                                        <option value="0">Default</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="form-group">
                                               <label class="col-lg-2 control-label">Amount<span style="color:red;">*</span></label>
                                               <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="fees_type_amount" placeholder="Fee Type Amount">
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <!-- <button class="btn btn-white" type="reset">Cancel</button> -->
                                                    <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6" style="padding-bottom:inherit;">
                                <div class="ibox-title" style="border:none;border-bottom:1px solid black !important;">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Fee Types Details </b></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Fee Type</th>
                                                    <th>Class</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($fee_types as $key) { ?>
                                                <tr>
                                                    <td><?=$i++;?></td>
                                                    <td><?=$key['fees_type_name']?></td>
                                                    <?php if($key['class_name'] != ""){?>
                                                        <td><?=$key['class_name']?></td>
                                                    <?php }else{ ?>
                                                        <td>Default</td>
                                                    <?php } ?>
                                                    <td><?=$key['fees_type_amount']?></td>
                                                    <td>
                                                        <a href="<?=site_url('Fee/update_fee_type/'.$key['fees_type_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil edit"></i> Edit</span></a>
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
                <div id="fee_waiver_demo" class="tab-pane">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title" style="border:none !important;">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3 class="new_fee_waiver"><b>Fees Waiver</b></h3>
                                            </div>
                                            <div class="col-sm-6">
                                               <div class="ibox-tools">
                                                    <span class="btn btn-xs btn-primary" id="new_fee_waiver"><i class="fa fa-plus"></i></span>     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content new_fee_waiver">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addNotification2" action="<?=site_url('Fee/add_fee_waiver')?>">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Class<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <select class="form-control class_details" name="fee_waiver_fee_type_class_id">
                                                        <option>Select Class</option>
                                                        <?php foreach ($class_details as $key) { ?>
                                                        <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <label class="col-lg-2 control-label">Division<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <select class="form-control division_details" name="fee_waiver_fee_type_division_id">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Student<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <select class="form-control student_details" name="fee_waiver_student_profile_id">
                                                    </select>
                                                </div>
                                                <label class="col-lg-2 control-label">Fee Type<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <select class="form-control fees_types_details" name="fee_waiver_fee_type_id">
                                                        <option value="0">Select Fee Type</option>
                                                        <?php foreach ($fee_types as $key) { ?>
                                                        <option value="<?=$key['fees_type_id']?>"><?=$key['fees_type_name']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Fee Waiver Name<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                   <input type="text" class="form-control" name="fee_waiver_name" placeholder="Fee Waiver Name">
                                                </div>
                                                <label class="col-lg-2 control-label">Amount<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="fee_waiver_amount" placeholder="Fee Waiver Amount">
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <button class="btn btn-white close_data" type="reset">Cancel</button>
                                                    <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="ibox-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3><b>Fee Waiver Details </b></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Student ID.</th>
                                                        <th>Student Name</th>
                                                        <th>Fee Waiver Name</th>
                                                        <th>Fee Waiver Amount</th>
                                                        <th>Fee Type</th>
                                                        <!-- <th>Action</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   <?php $i = 1;
                                                   foreach ($fee_waiver as $key) { ?>
                                                   <tr>
                                                       <td><?=$key['student_profile_id'] ?></td>
                                                       <td><?=$key['student_first_name'] ?> <?=$key['student_middle_name'] ?> <?=$key['student_last_name'] ?></td>
                                                       <td><?=$key['fee_waiver_name'] ?></td>
                                                       <td><?=$key['fee_waiver_amount'] ?></td>
                                                       <td><?=$key['fees_type_name'] ?></td>
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
                </div>
            </div>
        </div>
    </div>       