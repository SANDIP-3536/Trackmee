        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-6" style="padding-right:0px;">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3><b>School New Division</b></h3>
                            </div>
                             <div class="col-sm-6">
                                <div class="ibox-tools">
                                    <!-- <span class="btn btn-xs btn-primary" id="toggle_route"> Add </span>     -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content division_details_hide">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addClass" action="<?=site_url('Division/division_registration')?>">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Class<span style="color:red;">*</span></label>
                                <div class="col-lg-7">
                                    <select name="division_class_id" class="form-control">
                                        <option value="0">Select Class</option>
                                        <?php foreach ($school_class as $key) { ?>
                                            <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Division Name<span style="color:red;">*</span></label>
                                <div class="col-lg-7">
                                    <input type="text" placeholder="Division Name" name="division_name" class="form-control device">
                                    <label class="division_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
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
                                <h3><b>School Division Details</b></h3>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Class Name</th>
                                    <th>Division Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach ($school_division as $key) { ?>
                                    <tr>
                                        <th><?php echo $i++; ?></th>
                                        <th><?=$key['class_name']?></th>
                                        <th><?=$key['division_name']?></th>
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