        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="wrapper wrapper-content animated fadeInRight" style="padding-top: 0%;">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#parent_meet_demo">Parent Meet</a></li>
                        <li class=""><a data-toggle="tab" href="#event_demo">Event</a></li>
                        <li class=""><a data-toggle="tab" href="#notice_demo">Circular Notice</a></li>
                        <li class=""><a data-toggle="tab" href="#news_demo">News Feeds</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="parent_meet_demo" class="tab-pane active">
                            <div class="panel-body">
                                <div class="ibox float-e-margins">
                                    <?php if($user_type == 3) { ?>
                                    <div class="ibox-title" style="border:none !important;">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3 class="new_parent_meet"><b>New Parent Meet</b></h3>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="ibox-tools">
                                                    <span class="btn btn-xs btn-primary" id="new_parent_meet"><i class="fa fa-plus" title="New Parent Meet"></i></span>     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content new_parent_meet">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addPMNotification" action="<?=site_url('Notification/add_parent_meeting')?>">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Class<span style="color:red;">*</span></label>
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
                                                <label class="col-lg-2 control-label">Parent Meet Date<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control datepicker" name="notifi_date" placeholder="Notification Date" readonly>
                                                </div>
                                                <label class="col-lg-2 control-label">Parent Meet Time<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <div class="input-group clockpicker" data-autoclose="true">
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-clock-o"></span>
                                                        </span>
                                                        <input type="text" class="form-control" name="notifi_time" placeholder="Notification Time" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Parent Meet Title<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="notifi_title" placeholder="Notification Title">
                                                </div>
                                                <label class="col-lg-2 control-label">Parent Meet Message<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <textarea cols="2" rows="3" class="form-control" name="notifi_msg" placeholder="Notification Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="row">
                                                <div class="col-sm-12">
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
                                            <br>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <button class="btn btn-white close_new_entry" type="reset">Cancel</button>
                                                    <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php } ?>
                                    <div class="ibox-title">
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
                                                <tbody>
                                                    <?php $i=1;
                                                    foreach ($parent as $key1) {?>
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
                        <div id="event_demo" class="tab-pane">
                            <div class="panel-body">
                                <div class="ibox float-e-margins">
                                    <?php if ($user_type == 3) { ?>
                                    <div class="ibox-title" style="border:none !important">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3 class="new_event"><b>New Event </b></h3>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="ibox-tools">
                                                    <span class="btn btn-xs btn-primary" id="new_event"><i class="fa fa-plus" title="New Event"></i></span>     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content new_event">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addEVNotification" action="<?=site_url('Notification/add_event_notification')?>">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Class<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <select class="form-control class_details_event" name="class_name">
                                                        <option>Select Class</option>
                                                        <option value="0">All</option>
                                                        <?php foreach ($class_details as $key) { ?>
                                                        <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <label class="col-lg-2 control-label">Division<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <select class="form-control division_details_event" name="division">
                                                        <option>Select Division</option>
                                                        <option value="0">All</option>
                                                        <?php foreach ($division_details as $key) { ?>
                                                        <option value="<?=$key['division_id']?>"><?=$key['division_name']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Event Date<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control datepicker" name="notifi_date" placeholder="Notification Date" readonly>
                                                </div>
                                                <label class="col-lg-2 control-label">Event Time<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <div class="input-group clockpicker" data-autoclose="true">
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-clock-o"></span>
                                                        </span>
                                                        <input type="text" class="form-control" name="notifi_time" placeholder="Notification Time" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Event Title<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="notifi_title" placeholder="Notification Title">
                                                </div>
                                                <label class="col-lg-2 control-label">Event Message<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <textarea cols="2" rows="3" class="form-control" name="notifi_msg" placeholder="Notification Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="row">
                                                <div class="col-sm-12">
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
                                                            <tbody class="student_details_accor_event">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <button class="btn btn-white close_new_entry" type="reset">Cancel</button>
                                                    <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php } ?>
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
                        <div id="notice_demo" class="tab-pane">
                            <div class="panel-body">
                                <div class="ibox float-e-margins">
                                    <?php if ($user_type == 3) { ?>
                                    <div class="ibox-title" style="border:none !important;">
                                        <div class="row">
                                           <div class="col-sm-6">
                                                <h3 class="new_circular"><b>New Circular Notice</b></h3>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="ibox-tools">
                                                    <span class="btn btn-xs btn-primary" id="new_circular"><i class="fa fa-plus" title="New Circular Notice"></i></span>     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content new_circular">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addENotification" action="<?=site_url('Notification/add_circular_notification')?>">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Class<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <select class="form-control class_details_circular" name="class_name">
                                                        <option>Select Class</option>
                                                        <option value="0">All</option>
                                                        <?php foreach ($class_details as $key) { ?>
                                                        <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <label class="col-lg-2 control-label">Division<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <select class="form-control division_details_circular" name="division">
                                                        <option>Select Division</option>
                                                        <option value="0">All</option>
                                                        <?php foreach ($division_details as $key) { ?>
                                                        <option value="<?=$key['division_id']?>"><?=$key['division_name']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Circular Title<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="notifi_title" placeholder="Notification Title">
                                                </div>
                                                <label class="col-lg-2 control-label"> Circular Message<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <textarea cols="2" rows="3" class="form-control" name="notifi_msg" placeholder="Notification Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Upload Circular Notice</label>
                                                <div class="col-sm-3">
                                                    <input type="file" class="form-control" name="notifi_img" accept="image/jpeg, image/png, image/gif" style="border:none;">
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="row">
                                                <div class="col-sm-12">
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
                                                            <tbody class="student_details_accor_circular">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <button class="btn btn-white close_new_entry" type="reset">Cancel</button>
                                                    <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php } ?>
                                    <div class="ibox-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3><b>Circular Notice History </b></h3>
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
                                                    foreach ($emergency as $key1) {?>
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
                        <div id="news_demo" class="tab-pane">
                            <div class="panel-body">
                                <?php if ($user_type == 3) {?>
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title" style="border:none !important">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3 class="new_news"><b>News Feeds</b></h3>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="ibox-tools">
                                                    <span class="btn btn-xs btn-primary" id="new_news"><i class="fa fa-plus" title="New News Feeds"></i> </span>     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content new_news">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addONotification" action="<?=site_url('Notification/add_news_notification')?>">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Class<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <select class="form-control class_details_news" name="class_name">
                                                        <option>Select Class</option>
                                                        <option value="0">All</option>
                                                        <?php foreach ($class_details as $key) { ?>
                                                        <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <label class="col-lg-2 control-label">Division<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <select class="form-control division_details_news" name="division">
                                                        <option>Select Division</option>
                                                        <option value="0">All</option>
                                                        <?php foreach ($division_details as $key) { ?>
                                                        <option value="<?=$key['division_id']?>"><?=$key['division_name']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">News Title<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="notifi_title" placeholder="Notification Title">
                                                </div>
                                                <label class="col-lg-2 control-label">News Message<span style="color:red;">*</span></label>
                                                <div class="col-sm-3">
                                                    <textarea cols="2" rows="3" class="form-control" name="notifi_msg" placeholder="Notification Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Upload News Feeds</label>
                                                <div class="col-sm-3">
                                                    <input type="file" class="form-control" name="notifi_img" accept="image/jpeg, image/png, image/gif" style="border:none;">
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="row">
                                                <div class="col-sm-12">
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
                                                            <tbody class="student_details_accor_news">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <button class="btn btn-white close_new_entry" type="reset">Cancel</button>
                                                    <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="ibox-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3><b>News Feeds History </b></h3>
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
                                                    foreach ($other as $key1) {?>
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
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>