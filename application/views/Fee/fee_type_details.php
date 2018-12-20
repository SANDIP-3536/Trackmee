    <div class="wrapper wrapper-content animated fadeInRight" style="padding-bottom:0%;">
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
                               <label class="col-lg-2 control-label">Category<span style="color:red;">*</span></label>
                               <div class="col-sm-7">
                                    <select class="form-control" name="fees_type_fee_category_id">
                                        <option value ="0">-- Select Category --</option>
                                        <?php foreach ($fee_category as $key) {?>
                                            <option value="<?=$key['fee_category_id']?>"><?=$key['fee_category_name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                               <label class="col-lg-2 control-label">Term<span style="color:red;">*</span></label>
                               <div class="col-sm-7">
                                    <select class="form-control" name="fees_type_name">
                                        <option value="0">--Select Term--</option>
                                        <option value="Default">Default</option>
                                        <?php foreach ($term as $key) {?>
                                            <option value="<?=$key['term_name']?>"><?=$key['term_name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <?php if($functionality[0]['school_CRM'] == 1) {?>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Class<span style="color:red;">*</span></label>
                                <div class="col-sm-7">
                                    <select class="form-control class_fee_type_student_list" name="fees_type_class_id">
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
                                    <input type="text" class="form-control" id="fees_type_amount" name="fees_type_amount" placeholder="Fee Type Amount">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Amount Period<span style="color:red;">*</span></label>
                                <div class="col-sm-7">
                                    <select class="form-control fees_type_period" name="fees_type_period">
                                        <option value="0">-- Select Period --</option>
                                        <option value="Annual">Annual</option>
                                        <option value="Half Yearly">Half Yearly</option>
                                        <option value="Quaterly">Quaterly</option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="One Time">One Time</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group hidden" id="total_period">
                                <label class="col-lg-2 control-label">Period<span style="color:red;">*</span></label>
                                <div class="col-sm-7">
                                    <select class="form-control" id="fees_type_total_period" name="fees_type_total_period">
                                        <option value="0">-- Select Period --</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                               <label class="col-lg-2 control-label">Total Amount<span style="color:red;">*</span></label>
                               <div class="col-sm-7">
                                    <input type="text" class="form-control" id="fees_type_total_amount" name="fees_type_total_amount" placeholder="Fee Type Total Amount">
                                </div>
                            </div>
                            <div class="ibox-title" style="border-top-width:1px;">
                                <div class="row">
                                    <h3><b>Student Details</b></h3><h5>(Please select if already register student assigned Fee.)</h5>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Student Name</th>
                                                <th>Select</th>
                                            </tr>
                                        </thead>

                                        <tbody class="assign_fee_alredy_assign_student">
                                           
                                        </tbody>
                                    </table>
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
                                    <th>Term</th>
                                    <th>Fee Category</th>
                                    <th>Class</th>
                                    <th>Amount</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($fee_types as $key) { ?>
                                <tr>
                                    <td><?=$i++;?></td>
                                    <td><?=$key['fees_type_name']?></td>
                                    <td><?=$key['fee_category_name']?></td>
                                    <?php if($key['class_name'] != ""){?>
                                        <td><?=$key['class_name']?></td>
                                    <?php }else{ ?>
                                        <td>Default</td>
                                    <?php } ?>
                                    <td><?=$key['fees_type_amount']?></td>
                                    <!-- <td>
                                        <a href="<?=site_url('Fee/update_fee_type/'.$key['fees_type_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil edit" title="Edit Fee's"></i></span></a>
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