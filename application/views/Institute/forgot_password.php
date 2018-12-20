        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Change Password</b></h3>
                                </div>
                            </div>
                        </div>
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="forgotPassword" action="<?=site_url('Institute/institute_change_password')?>">
                            <div class="ibox-content">
                                <div class="form-group" hidden="">
                                    <label class="col-lg-2 control-label">User Profile ID</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="user_profile_id" class="form-control" value="<?php echo $user_profile_id ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">New Password</label>
                                    <div class="col-lg-4">
                                        <input type="password" placeholder="" name="password" class="form-control" id="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Confirm Password</label>
                                    <div class="col-lg-4">
                                        <input type="password" placeholder="" name="confirm_password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-4">
                                        <a href="<?=site_url('Client/view_client')?>"><span class="btn btn-white" type="reset">Cancel</span></a>
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>