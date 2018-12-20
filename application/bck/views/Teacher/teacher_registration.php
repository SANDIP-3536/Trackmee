        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Fill Employee Details</b></h3>
                                </div>
                                <div class="col-sm-6">
                                    <div class="ibox-tools">
                                        <a href="<?=site_url('Teacher/view_teacher')?>"><button class="btn btn-primary">View Employee</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addteacher" action="<?=site_url('Employee/add_employee_registration')?>">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Employee Name <span style="color:red;">*</span></label>
                                    <div class="col-sm-8">
                                         <div class="form-group">
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control employee_first_name" name="employee_first_name" placeholder="First Name" id="employee_first_name">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="employee_middle_name" placeholder="Middle Name">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="employee_last_name" placeholder="Last Name">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Employee Birth Date <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" readonly="" placeholder="Teacher Birth Date" name="employee_DOB" class="form-control datepicker">
                                    </div>
                                    <label class="col-lg-2 control-label">Gender <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <label class="radio-inline"> 
                                            <input type="radio" name="employee_gender" value="male">&nbsp  Male 
                                        </label> 
                                        <label class="radio-inline">
                                            <input type="radio" name="employee_gender" value="female">  &nbsp Female
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="employee_gender" value="other">  &nbsp Other
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Employee Address <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <textarea type="text" placeholder=" Teacher Address" name="employee_address" class="form-control"></textarea>
                                    </div>
                            
                                    <label class="col-sm-2 control-label">Employee Photo <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                      
                                        <input type="file" placeholder="placeholder" name="employee_photo" class="form-control" accept="image/jpeg, image/png, image/gif" style="border:none;">
                                          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Employee Mobile No. <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control mobile" id="mobile" name="employee_pri_mobile_number" placeholder="Teacher Mobile No.">
                                        <label class="mobile_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                    </div>
                                    <label class="col-sm-2 control-label">Employee Email ID. <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="email" class="form-control email_id" id="email_id" name="employee_email_id" placeholder="Teacher Email Address">
                                        <label class="email_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Higher Education <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"  name="employee_higher_education" placeholder="Teacher Higher Education">
                                    </div>
                                    <label class="col-sm-2 control-label">Total Experience<span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="employee_experiance" placeholder="Teacher Experiance">
                                    </div>
                                </div>
                                 <div class="hr-line-dashed"></div>
    
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="<?=site_url('Teacher/view_teacher')?>"><span class="btn btn-white" type="reset">Cancel</span></a>
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>