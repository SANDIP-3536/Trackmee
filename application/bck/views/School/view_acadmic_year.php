        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-6" style="padding-right:0px;">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3><b>School Acadmic Year</b></h3>
                            </div>
                             <div class="col-sm-6">
                                <div class="ibox-tools">
                                    <!-- <span class="btn btn-xs btn-primary" id="toggle_route"> Add </span>     -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content class_details_hide">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addInstitute" action="<?=site_url('Institute/acadmic_year_registration')?>">
                            <div class="form-group">
                                <label class="col-lg-2 control-label"> Institute<span style="color:red;">*</span></label>
                                <div class="col-lg-7">
                                    <select name="AY_institute_profile_id" class="form-control ">
                                        <option value="0">Select Institute</option>
                                        <?php foreach ($fetch_institute as $key) { ?>
                                        <option value="<?=$key['institute_profile_id']?>"><?=$key['institute_name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Year<span style="color:red;">*</span></label>
                                <div class="col-lg-7">
                                    <input type="text" placeholder="2017-18" name="AY_name" class="form-control year">
                                    <label class="year_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Start Month<span style="color:red;">*</span></label>
                                <div class="col-lg-7">
                                    <select name="AY_start_month" class="form-control ">
                                        <option value="00">Select Month</option>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-lg-2 control-label">End Month<span style="color:red;">*</span></label>
                                <div class="col-lg-7">
                                    <select name="AY_end_month" class="form-control ">
                                        <option value="00">Select Month</option>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
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
                                <h3><b>School Acadmic Year</b></h3>
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
                                    <th>Acadmic Year</th>
                                    <th>Start Month</th>
                                    <th>End Month</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach ($acadmic_year as $key) { ?>
                                    <tr>
                                        <th><?php echo $i++; ?></th>
                                        <th><?=$key['institute_name']?></th>
                                        <th><?=$key['AY_name']?></th>
                                        <th><?=$key['AY_start_name']?></th>
                                        <th><?=$key['AY_end_name']?></th>
                                        <th><a href="<?=site_url('Institute/acadmic_year_remove/' .$key['AY_id'])?>"><span class="btn btn-xs btn-success"><i class="fa fa-trash" title="Delete the Acadmic Year"></i></a></span></th>
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