        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Employee Information</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addtEmployee" action="<?=site_url('Employee/update_employee_details')?>">
                                <div class="form-group" hidden="">
                                <?php foreach ($update_employee as $key) { ?>
                                    <label class="col-lg-2 control-label"></label>
                                    <div class="col-lg-7">
                                        <input type="text" placeholder=" " name="employee_profile_id" class="form-control" value="<?=$key['employee_profile_id']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-8">
                                        <div class="col-sm-4" style="padding:0px;">
                                            <input type="text" class="form-control" name="employee_first_name" placeholder="First Name" value="<?=$key['employee_first_name']?>" id="employee_first_name" onkeyup="capitalize(this.id, this.value);">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="employee_middle_name" placeholder="Middle Name" value="<?=$key['employee_middle_name']?>" id="employee_middle_name" onkeyup="capitalize(this.id, this.value);">
                                        </div>
                                        <div class="col-sm-4" style="padding:0px;">
                                            <input type="text" class="form-control" name="employee_last_name" placeholder="Last Name" value="<?=$key['employee_last_name']?>" id="employee_last_name" onkeyup="capitalize(this.id, this.value);">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Address</label>
                                    <div class="col-lg-8">
                                        <input type="text" placeholder=" Driver Address" name="employee_address" class="form-control" value="<?=$key['employee_address']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"> Mobile No.</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="employee_pri_mobile_number" placeholder="Driver Primary Mobile No." value="<?=$key['employee_pri_mobile_number']?>"> 
                                    </div>
                                    <label class="col-sm-2 control-label">Email ID.</label>
                                    <div class="col-sm-3">
                                        <input type="email" class="form-control" name="employee_email_id" placeholder="Driver Primary Email Address" value="<?=$key['employee_email_id']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"> Education</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="employee_higher_education" placeholder="Teacher Education" value="<?=$key['employee_higher_education']?>"> 
                                    </div>
                                    <label class="col-sm-2 control-label">Experiance</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="employee_experiance" placeholder="Teacher Experiance" value="<?=$key['employee_experiance']?>">
                                    </div>
                                </div>  
                               
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                       <a href="<?=site_url('Employee/view_employee_details/' .$key['employee_profile_id'])?>"><button class="btn btn-white" >Cancel</button></a> 
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