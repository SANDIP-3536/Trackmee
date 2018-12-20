        <div class="wrapper wrapper-content animated fadeInRight">
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
        					<form method="post" class="form-horizontal" enctype="multipart/form-data" id="addNotification" action="<?=site_url('Fee/add_fee_waiver')?>">
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
                                        <select class="form-control student_details" name=" fee_waiver_student_profile_id">
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
</div>    