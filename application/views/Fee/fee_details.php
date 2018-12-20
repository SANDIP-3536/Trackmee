    <style type="text/css">
    .total_payment_accoding_student tr,.total_payment_accoding_student td,.total_payment_accoding_student th{
        border:none;
    }
    </style>
    <div class="wrapper wrapper-content animated fadeInRight" style="padding-bottom:0%;">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3><b>Student Class</b></h3>
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
                                    <select class="form-control division_details1" name="division">
                                    </select>
                                </div>
                                <label class="col-lg-1 control-label">Student</label>
                                <div class="col-sm-3">
                                    <select class="form-control student_details1 select2_demo" name="student">
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="hidden" id="fee_status_detailssss">
                                <div class="row">
                                    <div class="col-sm-8">
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
                                                        <th>Term</th>
                                                        <th>Fee Category</th>
                                                        <th>Total Fee</th>
                                                        <th>Fee Waiver Name</th>
                                                        <th>Fee Waiver Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="student_details_accor">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="ibox-title">
                                            <div class="row">
                                                <div class="col-sm-12" style="text-align:right;">
                                                    <span class="btn btn-xs btn-success student_new_payment"><i class="fa fa-inr"> Make Payment</i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                </thead>
                                                <tbody class="total_payment_accoding_student">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><br><br>
                    <div class="hidden" id="payment_history_details">
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
                                        <input type="hidden" name="fee_student_profile_id" id="student_profile_id">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Total Amount</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" id="fees_total_amount" readonly="" name="total_amt">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Remaining Amount<span style="color:red;">*</span></label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" id="balance" name="remain_amt" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Paid<span style="color:red;">*</span></label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" id="paidamt" name="fee_amount">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Date<span style="color:red;">*</span></label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="fee_datetime" value="<?php date_default_timezone_set('Asia/Kolkata'); echo date('Y-m-d h:i'); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Note</label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control" name="fee_narration"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Mode<span style="color:red;">*</span></label>
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
</div>       