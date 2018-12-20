        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Driver Registration</b></h3>
                                </div>
                                <div class="col-sm-6">
                                    <div class="ibox-tools">
                                        <a href="<?=site_url('Driver/view_driver')?>"><button class="btn btn-primary">View Driver</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addDriver" action="<?=site_url('Driver/add_driver_registration')?>">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Driver Name <span style="color:red;">*</span></label>
                                    <div class="col-sm-8">
                                        <div class="col-sm-4" style="padding:0px;">
                                            <input type="text" class="form-control" name="employee_first_name" placeholder="First Name">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="employee_middle_name" placeholder="Middle Name">
                                        </div>
                                        <div class="col-sm-4" style="padding:0px;">
                                            <input type="text" class="form-control" name="employee_last_name" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Driver Address <span style="color:red;">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" placeholder=" Driver Address" name="employee_address" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Gender <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <label class="radio-inline"> 
                                            <input type="radio" name="employee_gender" value="male">&nbsp  Male 
                                        </label> 
                                        <label class="radio-inline">
                                            <input type="radio" name="employee_gender" value="female">  &nbsp Female
                                        </label>
                                    </div>
                                    <label class="col-lg-2 control-label">Birth Date <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Driver Birth Date" name="employee_DOB" class="form-control datepicker" readonly="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Driver Pri. Mobile No. <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control mobile" id="mobile" name="employee_pri_mobile_number" placeholder="Driver Primary Mobile No."> 
                                        <label class="mobile_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                    </div>
                                    <label class="col-sm-2 control-label">Driver Pri. Email ID. <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="email" class="form-control email_id" id="email_id" name="employee_email_id" placeholder="Driver Primary Email Address">
                                        <label class="email_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"> Driver Licence No. <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control license" id="license" name="employee_licence_number" placeholder="Driver Licence No. MH12 12345678910"> 
                                        <label class="license_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                    </div>
                                     <label class="col-sm-2 control-label"> Driver Experiance <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"  name="employee_experiance" placeholder="Driver Experiance">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Driver Licence Photo <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="file" placeholder="placeholder" name="license_photo" class="form-control" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                    </div>
                                    <label class="col-sm-2 control-label">Driver Photo</label>
                                    <div class="col-sm-3">
                                        <input type="file" placeholder="placeholder" name="photo" class="form-control" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="<?=site_url('Driver/view_driver')?>"><span class="btn btn-white">Cancel</span></a>
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>