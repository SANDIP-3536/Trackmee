    <div class="wrapper wrapper-content animated fadeInRight" style="padding-bottom:0%;">
        <div class="wrapper wrapper-content animated fadeInRight fee_category_demo" style="padding-top: 0%;">
            <nav class="white-bg" role="navigation">
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li id="fee_category_click" class="active">
                           <a><i class="fa fa-list" style="display: inline;font-size: initial;"></i> Fee Category</a>
                        </li>
                        <li id="fee_type_click"><a><i class="fa fa-signal" style="display:inline;font-size: initial;"></i>Fee Type</a>
                        </li>
                        <li id="fee_waiver_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Fee Waiver</a>
                        </li>
                        <li id="fee_details_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Fee Details</a>
                        </li>
                    </ul>
                </div>
            </nav><br>
            <div class="row">
                <div class="col-lg-6" style="padding-right:inherit;">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Fees Category</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addNotification" action="<?=site_url('Fee/add_fee_category')?>">
                                <div class="form-group">
                                   <label class="col-lg-3 control-label">Category Name</label>
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
                    <div class="ibox-title">
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($fee_category as $key) { ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$key['fee_category_name']?></td>
                                        <td>
                                            <a href="<?=site_url('Fee/update_fee_category/'.$key['fee_category_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil edit"></i> Edit</span></a>
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
        <div class="wrapper wrapper-content animated fadeInRight fee_type_demo" style="padding-top: 0%;">
            <nav class="white-bg" role="navigation">
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li id="fee_category_click">
                           <a><i class="fa fa-list" style="display: inline;font-size: initial;"></i> Fee Category</a>
                        </li>
                        <li id="fee_type_click"  class="active"><a><i class="fa fa-signal" style="display:inline;font-size: initial;"></i>Fee Type</a>
                        </li>
                        <li id="fee_waiver_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Fee Waiver</a>
                        </li>
                        <li id="fee_details_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Fee Details</a>
                        </li>
                    </ul>
                </div>
            </nav><br>
            <div class="row">
                <div class="col-lg-6" style="padding-right:inherit;">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Fees Type</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addNotification1" action="<?=site_url('Fee/add_fee_types')?>">
                                <div class="form-group">
                                   <label class="col-lg-2 control-label">Name</label>
                                   <div class="col-sm-7">
                                        <input type="text" class="form-control" name="fees_type_name" placeholder="Fee Type Name">
                                    </div>
                                </div>
                                <?php if($functionality[0]['school_CRM'] == 1) {?>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Class</label>
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
                                    <label class="col-lg-2 control-label">Class</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="fees_type_class_id" readonly>
                                            <option value="0">Default</option>
                                        </select>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                   <label class="col-lg-2 control-label">Amount</label>
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
                    <div class="ibox-title">
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
        <div class="wrapper wrapper-content animated fadeInRight fee_waiver_demo" style="padding-top: 0%;">
            <nav class="white-bg" role="navigation">
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li id="fee_category_click">
                           <a><i class="fa fa-list" style="display: inline;font-size: initial;"></i> Fee Category</a>
                        </li>
                        <li id="fee_type_click"><a><i class="fa fa-signal" style="display:inline;font-size: initial;"></i>Fee Type</a>
                        </li>
                        <li id="fee_waiver_click" class="active"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Fee Waiver</a>
                        </li>
                        <li id="fee_details_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Fee Details</a>
                        </li>
                    </ul>
                </div>
            </nav><br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Fees Waiver</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addNotification2" action="<?=site_url('Fee/add_fee_waiver')?>">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Class</label>
                                    <div class="col-sm-3">
                                        <select class="form-control class_details" name="fee_waiver_fee_type_class_id">
                                            <option>Select Class</option>
                                            <?php foreach ($class_details as $key) { ?>
                                            <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <label class="col-lg-2 control-label">Division</label>
                                    <div class="col-sm-3">
                                        <select class="form-control division_details" name="fee_waiver_fee_type_division_id">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Student</label>
                                    <div class="col-sm-3">
                                        <select class="form-control student_details" name="fee_waiver_student_profile_id">
                                        </select>
                                    </div>
                                    <label class="col-lg-2 control-label">Fee Type</label>
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
                                    <label class="col-lg-2 control-label">Fee Waiver Name</label>
                                    <div class="col-sm-3">
                                       <input type="text" class="form-control" name="fee_waiver_name" placeholder="Fee Waiver Name">
                                    </div>
                                    <label class="col-lg-2 control-label">Amount</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="fee_waiver_amount" placeholder="Fee Waiver Amount">
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
                    <div class="ibox-title">
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
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight fee_details_demo" style="padding-top: 0%;">
        <nav class="white-bg" role="navigation">
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li id="fee_category_click">
                           <a><i class="fa fa-list" style="display: inline;font-size: initial;"></i> Fee Category</a>
                        </li>
                        <li id="fee_type_click"><a><i class="fa fa-signal" style="display:inline;font-size: initial;"></i>Fee Type</a>
                        </li>
                        <li id="fee_waiver_click"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Fee Waiver</a>
                        </li>
                        <li id="fee_details_click"  class="active"><a><i class="fa fa-money" style="display:inline;font-size: initial;"></i> Fee Details</a>
                        </li>
                    </ul>
                </div>
            </nav><br>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3><b>Student Class</b></h3>
                        </div>
                        <div class="col-sm-6">
                            <div class="ibox-tools">
                                <span class="btn btn-xs btn-primary" id="toggle_route"> Add </span>     
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content notification_hide">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label class="col-lg-1 control-label">Class</label>
                            <div class="col-sm-2">
                                <select class="form-control class_details1" name="class_name">
                                    <option value="0">Select Class</option>
                                    <?php foreach ($class_details as $key) { ?>
                                    <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <label class="col-lg-1 control-label">Division</label>
                            <div class="col-sm-2">
                                <select class="form-control division_details" name="division">
                                </select>
                            </div>
                            <label class="col-lg-1 control-label">Student</label>
                            <div class="col-sm-3">
                                <select class="form-control student_details" name="student">
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Student Payment Details</b></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Type ID</th>
                                                <th>Fee Type</th>
                                                <th>Total Fee</th>
                                                <th>Paid Fee Amount</th>
                                                <th>Pending Fee Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody class="student_details_accor">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row slider_down">
                    <div class="col-sm-6" style="padding-right:0px;">
                        <div class="ibox-title" style="border-top:2px solid;">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Payment History</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Last Payment Date</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="payment_history">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ibox-title" style="border-top:2px solid;">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Make Payment</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form class="form-horizontal" role="form" method="post" id="addNotification3" action="<?=site_url('Fee/add_student_payment')?>">
                                <input type="hidden" name="fee_type_id" id="fee_type_id">
                                <input type="hidden" name="fee_student_profile_id" id="student_profile_id">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Fee Type</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" readonly="" name="vendor" id="fees_type_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Total Amount</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="fees_total_amount" readonly="" name="total_amt">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Remaining Amount</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="balance" name="remain_amt" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Paid</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="paidamt" name="fee_amount">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Date</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="fee_datetime" value="<?php date_default_timezone_set('Asia/Kolkata'); echo date('Y-m-d h:i'); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Mode</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" id="pay_mode" name="fee_payment_mode">
                                            <option value="0">- Choose Mode -</option>
                                            <option value="1">Cash</option>
                                            <option value="2">Card</option>
                                            <option value="3">Cheque</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="pay_detail_cheque">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Bank Name</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="bank_name" id="bank1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Cheque No.</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="fee_transaction_number" id="chq">
                                        </div>
                                    </div>
                                </div>
                                <div id="pay_detail_card">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Bank Name</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="bank_name" id="bank2">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Card No.</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="fee_transaction_number" id="card">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>       