        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>User Information</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addUser" action="<?=site_url('User/update_user_details')?>">
                                <?php foreach ($update_user as $key) { ?>
                                <div class="form-group" hidden="">
                                    <label class="col-lg-2 control-label"></label>
                                    <div class="col-lg-7">
                                        <input type="text" placeholder=" " name="user_profile_id" class="form-control" value="<?=$key['user_profile_id']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-8">
                                        <div class="col-sm-4" style="padding:0px;">
                                            <input type="text" class="form-control" name="user_first_name" placeholder="First Name" value="<?=$key['user_first_name']?>" id="employee_first_name" onkeyup="capitalize(this.id, this.value);">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="user_middle_name" placeholder="Middle Name" value="<?=$key['user_middle_name']?>" id="employee_middle_name" onkeyup="capitalize(this.id, this.value);">
                                        </div>
                                        <div class="col-sm-4" style="padding:0px;">
                                            <input type="text" class="form-control" name="user_last_name" placeholder="Last Name" value="<?=$key['user_last_name']?>" id="employee_last_name" onkeyup="capitalize(this.id, this.value);">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Address</label>
                                    <div class="col-lg-8">
                                        <input type="text" placeholder=" Driver Address" name="user_address" class="form-control" value="<?=$key['user_address']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"> Mobile No.</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="user_mobile_number" placeholder="Driver Primary Mobile No." value="<?=$key['user_mobile_number']?>"> 
                                    </div>
                                    <label class="col-sm-2 control-label">Email ID.</label>
                                    <div class="col-sm-3">
                                        <input type="email" class="form-control" name="user_email_id" placeholder="Driver Primary Email Address" value="<?=$key['user_email_id']?>">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                       <a href="<?=site_url('User/view_user_details/' .$key['user_profile_id'])?>"><span class="btn btn-white" >Cancel</span></a> 
                                        <?php } ?>  
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>