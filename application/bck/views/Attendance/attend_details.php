        <div class="wrapper wrapper-content animated fadeInRight">
        	<div class="row">
        		<div class="col-lg-12">
        			<div class="ibox float-e-margins">
        				<div class="ibox-title">
        					<div class="row">
        						<div class="col-sm-6">
        							<h3><b>Student Attendance</b></h3>
        						</div>
        						<div class="col-sm-6">
        							<div class="ibox-tools">
        								<i class="fa fa-chevron-down" id="toggle_route"></i>    
        							</div>
        						</div>
        					</div>
        				</div>
        				<div class="ibox-content notification_hide">
        					<form method="post" class="form-horizontal" enctype="multipart/form-data" id="addNotification" action="<?=site_url('Attendance/add_student_attendance')?>">
        						<div class="form-group">
        							<label class="col-lg-2 control-label">Class</label>
        							<div class="col-sm-3">
        								<select class="form-control class_details" name="class_name">
                                            <option>Select Class</option>
                                            <?php foreach ($TCD_details as $key) { ?>
                                            <option value="<?=$key['TCDS_class_id']?>-<?=$key['TCDS_division_id']?>"><?=$key['class_name']?> <?php echo "(" .$key['division_name']. ")"; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                      <label class="col-lg-2 control-label">Subject</label>
                                    <div class="col-sm-3">
                                        <select class="form-control division_details" name="TCDS_id">
                                        <option>Select Subject</option>
                                        <?php foreach ($TS_details as $key) { ?>
                                        <option value="<?=$key['TCDS_id']?>"><?=$key['subject_name']?>
                                            <?php if($key['subject_type'] == 1){
                                                echo "( theory )";
                                            }elseif ($key['subject_type'] == 2) {
                                                echo "( practical )";
                                            }elseif ($key['subject_type'] == 3) {
                                               echo "( project )";
                                            }elseif($key['subject_type'] == 4){
                                                echo "( oral )";
                                            }?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Date & Time</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control datepicker"  name="attend_datetime" value="<?php echo date('Y-m-d H:i:s');?>" readonly>
                                </div>
                            </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row"><div class="col-sm-12">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Student Details</b></h3>
                                </div>
                                <div class="col-sm-6">
                                    <div class="ibox-tools">
                                        <h3><input type="checkbox" class="checkall"> CheckAll</h3>   
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Roll No.</th>
                                        <th>Student Name</th>
                                        <th>Class</th>
                                        <th>Division</th>
                                        <th>Select</th>
                                    </tr>
                                </thead>
                                <tbody class="student_details_accor">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-white" type="reset">Cancel</button>
                        <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <!--<div class="ibox-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3><b>Parent Meet History </b></h3>
                </div>
            </div>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Event Name</th>
                            <th>Event Message</th>
                            <th>Event Date</th>
                        </tr>
                    </thead>
                    <!-- <tbody>
                        <?php $i=1;
                        foreach ($parent as $key1) {?>
                        <tr>
                            <td><?=$i++;?></td>
                            <td><?=$key1['notifi_title']?></td> 
                            <td><?=$key1['notifi_msg']?></td>
                            <td><?=$key1['notifi_datetime']?></td>
                        </tr>
                        <?php } ?>
                    </tbody> -->
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>