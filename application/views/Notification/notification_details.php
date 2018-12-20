        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="wrapper wrapper-content animated fadeInRight" style="padding-top: 0%;">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="border:none !important;">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="new_notification_meet"><b>New Notification</b></h3>
                            </div>
                            <div class="col-sm-6">
                                <div class="ibox-tools">
                                    <span class="btn btn-xs btn-primary" id="new_notification_meet"><i class="fa fa-plus" title="New Notification Meet"></i></span>     
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content new_notification_meet">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addNotification" action="<?=site_url('Notification/add_notification')?>">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Bus<span style="color:red;">*</span></label>
                                <div class="col-sm-3">
                                    <select class="form-control bus_details" name="bus_name">
                                        <option>Select Bus</option>
                                        <option value="0">All</option>
                                        <?php foreach ($bus as $key) { ?>
                                        <option value="<?=$key['bus_id']?>"><?=$key['bus_no']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Title<span style="color:red;">*</span></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="notifi_title" placeholder="Notification Title">
                                </div>
                                <label class="col-lg-2 control-label">Message<span style="color:red;">*</span></label>
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
                                                <h3><b>User Details</b></h3>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="ibox-tools">
                                                    <h3><input type="checkbox" class="CheckAll"> CheckAll</h3>   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>User Name</th>
                                                    <th>Bus No.</th>
                                                    <th>Select</th>
                                                </tr>
                                            </thead>
                                            <tbody class="user_details_accor">
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
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3><b>Notification History </b></h3>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>User</th>
                                        <th>Title</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $i=1;
                                    foreach ($notification as $key1) {?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$key1['user']?></td> 
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
</div>