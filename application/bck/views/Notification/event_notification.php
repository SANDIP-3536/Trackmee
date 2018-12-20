        <div class="wrapper wrapper-content animated fadeInRight">
        	<div class="row">
        		<div class="col-lg-12">
        			<div class="ibox float-e-margins">
        				<div class="ibox-title">
        					<div class="row">
        						<div class="col-sm-6">
        							<h3><b>Event Notification</b></h3>
        						</div>
        						<div class="col-sm-6">
        							<div class="ibox-tools">
        								<span class="btn btn-xs btn-primary" id="toggle_route"> Add </span>     
        							</div>
        						</div>
        					</div>
        				</div>
        				<div class="ibox-content notification_hide">
        					<form method="post" class="form-horizontal" enctype="multipart/form-data" id="addNotification" action="<?=site_url('Notification/add_event_notification')?>">
        						<div class="form-group">
        							<label class="col-lg-2 control-label">Class</label>
        							<div class="col-sm-3">
        								<select class="form-control class_details" name="class_name">
        										<option>Select Class</option>
        										<option value="0">All</option>
	        									<?php foreach ($class_details as $key) { ?>
	        										<option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
	        									<?php } ?>
        								</select>
        							</div>
        							<label class="col-lg-2 control-label">Division</label>
        							<div class="col-sm-3">
    									<select class="form-control division_details" name="division">
    										<option>Select Division</option>
    										<option value="0">All</option>
        									<?php foreach ($division_details as $key) { ?>
        										<option value="<?=$key['division_id']?>"><?=$key['division_name']?></option>
        									<?php } ?>
        								</select>
        							</div>
        						</div>
        						<div class="form-group">
        							<label class="col-lg-2 control-label">Title</label>
        							<div class="col-sm-3">
        								<input type="text" class="form-control" name="notifi_title" placeholder="Notification Title">
        							</div>
        							<label class="col-lg-2 control-label">Date<span style="color:red;">*</span></label>
        							<div class="col-sm-3">
        								<input type="text" class="form-control datepicker" name="notifi_date" placeholder="Notification Date" readonly>
        							</div>
        						</div>
        						<div class="form-group">
                                    <label class="col-lg-2 control-label">Time<span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <span class="input-group-addon">
                                                <span class="fa fa-clock-o"></span>
                                            </span>
                                            <input type="text" class="form-control" name="notifi_time" placeholder="Notification Time" readonly>
                                        </div>
                                    </div>
        							<label class="col-lg-2 control-label">Message<span style="color:red;">*</span></label>
        							<div class="col-sm-3">
        								<textarea cols="2" rows="3" class="form-control" name="notifi_msg" placeholder="Notification Message"></textarea>
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
        											<th>Sr No.</th>
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
        		<div class="ibox-title">
        			<div class="row">
        				<div class="col-sm-6">
        					<h3><b>Event History </b></h3>
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
                                <tbody>
                                    <?php $i=1;
                                    foreach ($event as $key1) {?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$key1['notifi_title']?></td> 
                                        <td><?=$key1['notifi_msg']?></td>
                                        <td><?=$key1['notifi_datetime']?></td>
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