   <br>
      <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Admin Registration Form</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index-2.html">Home</a>
                        </li>
                        <li>
                            <a>Forms</a>
                        </li>
                        <li class="active">
                            <strong>Admin Registration Form</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                         <div class="ibox-title">
                            <h5>Add <small> New Admin.</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                           <form method="post" class="form-horizontal" action="<?=site_url('Admin/Admin_details')?>" enctype="multipart/form-data">
                               
                                <div class="form-group" hidden>
                                    <label class="col-sm-2 control-label">User Type</label>   
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="user_type" value="1">
                                    </div>
                                </div>
                                <div class="form-group" hidden >
                                    <label class="col-sm-2 control-label">Admin Created By</label>   
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="user_created_by" value="<?php echo $user ?>">
                                    </div>
                                </div>
                                 <div class="form-group" hidden>
                                    <label class="col-sm-2 control-label">Admin Created Date</label>   
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="date" value="<?php echo date('Y/m/d');?>">
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Admin Name</label>   
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="user_first_name" placeholder="First Name">
                                    </div> 
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="user_middle_name" placeholder="Middle Name">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="user_last_name" placeholder="Last Name">
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-6">
                                        <input type="textarea" row="2" name="user_email_id" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Contact No</label>
                                    <div class="col-sm-6">
                                        <input type="textarea" row="2" name="user_mobile_number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Photo</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control" name="user_photo">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-6">
                                        <input type="text" row="2" name="credential_username" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-6">
                                        <input type="password" row="2" name="credential_password" class="form-control">
                                    </div>
                                </div>
                               <!--  <div class="form-group">
                                    <label class="col-sm-2 control-label"> Confirm Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" row="2" name="cfm_password" class="form-control">
                                    </div>
                                </div> -->
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="reset">Reset</button>
                                        <button class="btn btn-primary" type="submit">submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>