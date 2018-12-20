        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Student & Enquiry Reports Detail</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                                <div class="tabs-container">
                                    <div class="tabs-left">
                                        <ul class="nav nav-tabs" style="width:15% !important;">
                                            <li class="active"><a data-toggle="tab" href="#student_report"> Student Report</a></li>
                                            <li class=""><a data-toggle="tab" href="#enquiry_report">Enquiry Report</a></li>
                                            <li class=""><a data-toggle="tab" href="#class_division_report">Class Division Report</a></li>
                                        </ul>
                                        <div class="tab-content ">
                                            <div id="student_report" class="tab-pane active">
                                                <div class="panel-body" style="margin-left:15% !important; width:85%;">
                                                    <div class="wrapper wrapper-content animated fadeInRight">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="ibox float-e-margins">
                                                                    <div class="ibox-content">
                                                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="StudentReport">
                                                                            <div class="form-group">
                                                                                <div class="col-sm-3">
                                                                                    <div class="col-sm-10">   
                                                                                        <div class="form-group">
                                                                                            <label class="control-label" style="padding-bottom:2%">&nbsp Report For</label> 
                                                                                            <select class="form-control student_report_for" name="student_report_for"style="border-radius:3px;" id="student_report_for">
                                                                                                <option value="0">Please Select</option>
                                                                                                <option value="1">Gender</option>
                                                                                                <option value="2">Cast</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3 fadeInRight" id="gender_wise">
                                                                                    <div class="col-sm-10">   
                                                                                        <div class="form-group">
                                                                                            <label class="control-label" style="padding-bottom:2%">&nbsp Gender</label> 
                                                                                            <select class="form-control student_gender_report" name="student_gender_report" style="border-radius:3px;" id="student_gender_report">
                                                                                                <option value="0">Select Gender Type</option>
                                                                                                <option value="male">Male</option>
                                                                                                <option value="female">Female</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> 
                                                                                <div class="col-sm-3" id="caste_wise">
                                                                                    <div class="col-sm-10">   
                                                                                        <div class="form-group">
                                                                                            <label class="control-label" style="padding-bottom:2%">&nbsp Caste</label> 
                                                                                            <select class="form-control student_cast_report" name="student_cast_report" style="border-radius:3px;" id="student_cast_report">
                                                                                                <option value="0">Select Caste Type</option>
                                                                                                <option value="OPEN">Open</option>
                                                                                                <option value="ST">ST</option>
                                                                                                <option value="SC">SC</option>
                                                                                                <option value="SBC">SBC</option>
                                                                                                <option value="BC-A">BC-A</option>
                                                                                                <option value="BC-B">BC-B</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> 
                                                                                <div class="col-sm-3">
                                                                                    <div class="col-sm-10">   
                                                                                        <div class="form-group">
                                                                                            <label class="control-label" style="padding-bottom:2%">&nbsp School / Batch</label> 
                                                                                            <select class="form-control school_batch" name="school_batch" style="border-radius:3px;" id="school_batch">
                                                                                                <option value="0">Please Select</option>
                                                                                                <option value="1">School</option>
                                                                                                <option value="2">Batch</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> 
                                                                                <div class="col-sm-3" id="class_details">
                                                                                    <div class="col-sm-10">   
                                                                                        <div class="form-group">
                                                                                            <label class="control-label" style="padding-bottom:2%">&nbsp Class</label> 
                                                                                            <select class="form-control student_class_report" name="student_class_report" style="border-radius:3px;" id="student_class_report">
                                                                                                <option value="0">Select Class Type</option>
                                                                                                <?php foreach ($class as $key) {?>
                                                                                                    <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                                                                <?php } ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3" id="division_details">
                                                                                    <div class="col-sm-10">   
                                                                                        <div class="form-group">
                                                                                            <label class="control-label" style="padding-bottom:2%">&nbsp Division</label> 
                                                                                            <select class="form-control student_division_report" name="student_division_report" style="border-radius:3px;" id="student_division_report">
                                                                                                <!-- <option value="0">Select Class Type</option>
                                                                                                <option value="1">A</option>
                                                                                                <option value="2">B</option> -->
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="col-sm-5 col-sm-offset-1">   
                                                                                    <span class="btn btn-success show_student_report">Show Report</span>
                                                                                </div>
                                                                                <!-- <div class="col-sm-5" style="text-align:right;">   
                                                                                    <span class="btn btn-primary">Print Report</span>
                                                                                </div> -->
                                                                            </div>  
                                                                        </form>
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="enquiry_report" class="tab-pane">
                                                <div class="panel-body" style="margin-left:15% !important;width:85%;">
                                                    <div class="wrapper wrapper-content animated fadeInRight">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="ibox float-e-margins">
                                                                    <div class="ibox-content">
                                                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addtEmployee">
                                                                            <div class="form-group">
                                                                                <div class="col-sm-3">
                                                                                    <div class="col-sm-10">   
                                                                                        <div class="form-group">
                                                                                            <label class="control-label" style="padding-bottom:2%">&nbsp Report For</label> 
                                                                                            <select class="form-control enquiry_report_for" name="enquiry_report_for" style="border-radius:3px;" id="enquiry_report_for">
                                                                                                <option value="0">Please Select</option>
                                                                                                <option value="1">School Wise</option>
                                                                                                <option value="2">Admission Class Wise</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3 fadeInRight" id="school_wise">
                                                                                    <div class="col-sm-10">   
                                                                                        <div class="form-group">
                                                                                            <label class="control-label" style="padding-bottom:2%">&nbsp School</label> 
                                                                                            <select class="form-control enquiry_school_report" name="enquiry_school_report" style="border-radius:3px;" id="enquiry_school_report">
                                                                                                <option value="0">Select School</option>
                                                                                                <?php foreach ($school as $key) { ?>
                                                                                                    <option value="<?=$key['school_profile_id']?>"><?=$key['school_name']?></option>
                                                                                                <?php } ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> 
                                                                                <div class="col-sm-3" id="admission_class_wise">
                                                                                    <div class="col-sm-10">   
                                                                                        <div class="form-group">
                                                                                            <label class="control-label" style="padding-bottom:2%">&nbsp Addmission Class</label> 
                                                                                            <select class="form-control enquiry_admission_class_report" name="enquiry_admission_class_report" style="border-radius:3px;" id="enquiry_admission_class_report">
                                                                                                <option value="0">Select Admission Class</option>
                                                                                                <?php foreach ($admission_class as $key) { ?>
                                                                                                    <option value="<?=$key['enquiry_admission_class']?>"><?=$key['enquiry_admission_class']?></option>
                                                                                                <?php } ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="col-sm-5 col-sm-offset-1">   
                                                                                    <span class="btn btn-success show_enquiry_report">Show Report</span>
                                                                                </div>
                                                                                <!-- <div class="col-sm-5" style="text-align:right;">   
                                                                                    <span class="btn btn-primary">Print Report</span>
                                                                                </div> -->
                                                                            </div>  
                                                                        </form>
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped table-bordered table-hover dataTables-example1">
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="class_division_report" class="tab-pane">
                                                <div class="panel-body" style="margin-left:15% !important;width:85%;">
                                                    <div class="wrapper wrapper-content animated fadeInRight">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="ibox float-e-margins">
                                                                    <div class="ibox-content">
                                                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addtEmployee">
                                                                            <div class="form-group">
                                                                                <div class="col-sm-3">
                                                                                    <div class="col-sm-10">   
                                                                                        <div class="form-group">
                                                                                            <label class="control-label" style="padding-bottom:2%">&nbsp Report For</label> 
                                                                                            <select class="form-control class_division_report_for" name="class_division_report_for" style="border-radius:3px;" id="class_division_report_for">
                                                                                                <option value="0">Please Select</option>
                                                                                                <option value="1">Class Wise</option>
                                                                                                <option value="2">Division Wise</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3 fadeInRight" id="class_wise">
                                                                                    <div class="col-sm-10">   
                                                                                        <div class="form-group">
                                                                                            <label class="control-label" style="padding-bottom:2%">&nbsp Class</label> 
                                                                                            <select class="form-control class_report" name="class_report" style="border-radius:3px;" id="class_report">
                                                                                                <option value="0">Select Class Type</option>
                                                                                                <?php foreach ($class as $key) {?>
                                                                                                    <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                                                                <?php } ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> 
                                                                                <div class="col-sm-3" id="division_wise">
                                                                                    <div class="col-sm-10">   
                                                                                        <div class="form-group">
                                                                                            <label class="control-label" style="padding-bottom:2%">&nbsp Division</label> 
                                                                                            <select class="form-control division_report" name="division_report" style="border-radius:3px;" id="division_report">
                                                                                               
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="col-sm-5 col-sm-offset-1">   
                                                                                    <span class="btn btn-success show_class_division_report">Show Report</span>
                                                                                </div>
                                                                                <!-- <div class="col-sm-5" style="text-align:right;">   
                                                                                    <span class="btn btn-primary">Print Report</span>
                                                                                </div> -->
                                                                            </div>  
                                                                        </form>
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped table-bordered table-hover dataTables-example2" style="width:100% !important;">
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>