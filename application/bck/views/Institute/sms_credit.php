        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-6" style="padding-right:0px;">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3><b>Institute SMS</b></h3>
                            </div>
                             <div class="col-sm-6">
                                <div class="ibox-tools">
                                    <!-- <span class="btn btn-xs btn-primary" id="toggle_route"> Add </span>     -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content class_details_hide">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addInstitute" action="<?=site_url('Institute/add_sms_credit')?>">
                            <div class="form-group">
                                <label class="col-lg-2 control-label"> Institute<span style="color:red;">*</span></label>
                                <div class="col-lg-7">
                                    <select name="AY_institute_profile_id" class="form-control ">
                                        <option>Select Institute</option>
                                        <?php foreach ($fetch_institute as $key) { ?>
                                        <option value="<?=$key['institute_profile_id']?>"><?=$key['institute_name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">SMS Credit<span style="color:red;">*</span></label>
                                <div class="col-lg-7">
                                    <input type="text" placeholder="10000" name="sms_credit" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-5 col-sm-offset-3">
                                    <button class="btn btn-white" type="reset">Cancel</button>
                                    <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                 <div class="col-lg-6">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3><b>Institute SMS Details</b></h3>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Institute</th>
                                    <th>Total SMS</th>
                                    <!-- <th>Actions</th> -->
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($fetch_institute as $key) { ?>
                                    <tr>
                                        <th><?php echo $i++; ?></th>
                                        <th><?=$key['institute_name']?></th>
                                        <th><?=$key['institute_sms_credit']?></th>
                                        <!-- <th><a href="<?=site_url('Institute/acadmic_year_remove/' .$key['AY_id'])?>"><span class="btn btn-xs btn-success"><i class="fa fa-trash" title="Delete the Acadmic Year"></i></a></span></th> -->
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