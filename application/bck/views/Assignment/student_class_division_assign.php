        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Student Class Division Assign</b></h3>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="ibox-tools">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="tabs-container">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#viewAssign"> view</a></li>
                                                <li class=""><a data-toggle="tab" href="#newAssign">New Assign</a></li>
                                                <li class=""><a data-toggle="tab" href="#roll_noAssign">Roll Number Assign</a></li>
                                                <li class=""><a data-toggle="tab" href="#updateAssign">Update Assign</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="viewAssign" class="tab-pane active">
                                                    <div class="panel-body">
                                                        <form class="form-horizontal" enctype="multipart/form-data">
                                                            <div class="col-sm-12">
                                                                <div class="ibox-title">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <h3><b>Class Student Details</b></h3><h5>(Please click from below table for perticular Class Division List )</h5>
                                                                        </div>
                                                                        <div class="col-sm-6" style="text-align:right;">
                                                                            <div class="form-group">
                                                                                <div class="col-sm-12">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="ibox-content">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped table-bordered table-hover" >
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="hidden">Class ID</th>
                                                                                    <th>Sr No.</th>
                                                                                    <th>Class</th>
                                                                                    <th>No.of Student</th>
                                                                                    <th>Assigned Division</th>
                                                                                    <th>Not Assigned Division</th>
                                                                                </tr>
                                                                            </thead>

                                                                            <tbody>
                                                                                <?php $i=1;
                                                                                foreach ($student_class_division as $key) { ?>
                                                                                <tr class="fetch_student_list_acc_class">
                                                                                    <td class="fetch_student_by_class hidden"><?=$key['SCD_class_id']?></td>
                                                                                    <td><?=$i++ ?></td>
                                                                                    <td><?=$key['class_name']?></td>
                                                                                    <td><?=$key['total_student']?></td>
                                                                                    <td><?=$key['div_assgn']?></td>
                                                                                    <td><?=$key['no_div_assgn']?></td>
                                                                                </tr>
                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="hidden" id="class_div_roll_details">
                                                                    <div class="ibox-title">
                                                                        <div class="row">
                                                                            <h3><b>Class Division Roll Numbere Wise Details</b></h3><h5>(Please click from below table for perticular Class Division Student List )</h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ibox-content">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped table-bordered table-hover" >
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Class Name</th>
                                                                                        <th>Division Name</th>
                                                                                        <th>No. Of Student</th>
                                                                                        <th>Assign Student Roll Number</th>
                                                                                        <th>Not Assign Student Roll Number</th>
                                                                                    </tr>
                                                                                </thead>

                                                                                <tbody class="student_class_division_wise_list_details">
                                                                                   
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="hidden" id="student_class_div_list">
                                                                    <div class="ibox-title">
                                                                        <div class="row">
                                                                            <h3><b>Student Class Division Wise List</b></h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ibox-content">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped table-bordered table-hover" >
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Class Name</th>
                                                                                        <th>Division Name</th>
                                                                                        <th>Student Name</th>
                                                                                        <th>Roll Number</th>
                                                                                    </tr>
                                                                                </thead>

                                                                                <tbody class="student_class_wise_list_details">
                                                                                   
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div id="newAssign" class="tab-pane">
                                                    <div class="panel-body">
                                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Student_class_division_assign/SCD_registration')?>">
                                                            <div class="form-group">
                                                                <label class="col-lg-2 control-label">Class Name</label>
                                                                <div class="col-sm-6">
                                                                    <select class="form-control new_assign_class_student_division" name="SCD_class_id">
                                                                        <option>Select Class</option>
                                                                        <?php foreach ($school_class as $key) { ?>
                                                                        <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <label class="col-lg-4 control-label" style="text-align:left;color:red;">(Please select the class for assign division to student.)</label>
                                                            </div>
                                                            <div class="ibox-content hidden" id="newassignHeader">
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped table-bordered table-hover" >
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Class</th>
                                                                                <th>No.of Student</th>
                                                                                <th>Assigned Division</th>
                                                                                <th>Not Assigned Division</th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody class="new_assign_student_class_wise_list_details">
                                                                           
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="ibox-title">
                                                                            <h3><b>Assign Student Details</b></h3>
                                                                        </div>
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped table-bordered table-hover" >
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="hidden">Student ID</th>
                                                                                        <th>Student Name</th>
                                                                                        <th>Select</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody class="pending_student_class_wise_list_details">
                                                                                   
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="ibox-title">
                                                                            <h3><b>Assign Division Details</b></h3>
                                                                        </div>
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped table-bordered table-hover" >
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="hidden">Division ID</th>
                                                                                        <th>Division Name</th>
                                                                                        <th>Select</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody class="pending_division_class_wise_list_details">
                                                                                   
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-12 col-sm-offset-10">
                                                                        <button class="btn btn-primary enableOnInput" type="submit">Submit & Procced</button>
                                                                        <button class="btn btn-white" type="reset">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div id="roll_noAssign" class="tab-pane">
                                                    <div class="panel-body">
                                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Student_class_division_assign/SCD_roll_number_registration')?>">
                                                            <div class="form-group">
                                                                <label class="col-lg-2 control-label">Class Name</label>
                                                                <div class="col-sm-6">
                                                                    <select class="form-control new_roll_assign_class_student_division" name="SCD_class_id">
                                                                        <option>Select Class</option>
                                                                        <?php foreach ($school_class as $key) { ?>
                                                                        <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <label class="col-lg-4 control-label" style="text-align:left;color:red;">(Please select the class for assign Roll Number to student acc. Division.)</label>
                                                            </div>
                                                            <div class="ibox-content" style="border:none;">
                                                                <div class="table-responsive hidden" id="new_rollnumber_assignHeader">
                                                                    <table class="table table-striped table-bordered table-hover" >
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Class</th>
                                                                                <th>Division</th>
                                                                                <th>No. of Student</th>
                                                                                <th>Assigned Student Roll Number</th>
                                                                                <th>Not Assigned Student Roll Number</th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody class="new_roll_assign_student_class_wise_list_details">
                                                                           
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="form-group hidden">
                                                                <label class="control-label col-sm-1">Class Id</label>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="roll_class_id" class="form-control roll_number_backup_class_id">
                                                                </div>
                                                                <label class="control-label col-sm-1">division Id</label>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="roll_division_id" class="form-control roll_number_backup_division_id">
                                                                </div>
                                                                <label class="control-label col-sm-1">Previous Roll No</label>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="previous_roll_division_id" class="form-control privious_roll_number_backup_division_id">
                                                                </div>
                                                            </div>
                                                            <div class="ibox_content hidden" id="ROll_NO_GENRATION">
                                                                <div class="form-group">
                                                                    <div class="col-sm-2">
                                                                        <div class="col-sm-10">   
                                                                            <div class="form-group">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="col-sm-10">   
                                                                            <div class="form-group">
                                                                                <label class="control-label" style="padding-bottom:2%">&nbsp Sort By</label> 
                                                                                <select class="form-control sort_by_first_roll_number" name="sort_by_first_roll_number" style="border-radius:3px;" id="sort_by_first_roll_number">
                                                                                    <option value="0"> Please Select</option>
                                                                                    <option value="1"> Gender</option>
                                                                                    <option value="2">First Name</option>
                                                                                    <option value="3">Last Name</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3 fadeInRight hidden" id="roll_number_gender">
                                                                        <div class="col-sm-10">   
                                                                            <div class="form-group">
                                                                                <label class="control-label" style="padding-bottom:2%">&nbsp Gender</label> 
                                                                                <select class="form-control student_gender_roll_number" name="student_gender_roll_number" style="border-radius:3px;" id="student_gender_roll_number">
                                                                                    <option value="0">Select Gender</option>
                                                                                    <option value="1">Male</option>
                                                                                    <option value="2">Female</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <div class="table-responsive" id="new_rollnumber_assignHeader">
                                                                    <table class="table table-striped table-bordered table-hover" >
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Student Name</th>
                                                                                <th>Roll Number</th>
                                                                                <th>New Roll Number</th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody class="new_roll_assign_student_division_wise_list_details">
                                                                           
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-12 col-sm-offset-10">
                                                                        <button class="btn btn-primary enableOnInput" type="submit">Submit & Procced</button>
                                                                        <button class="btn btn-white" type="reset">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div id="updateAssign" class="tab-pane">
                                                     <div class="tabs-container">
                                                        <div class="tabs-left">
                                                            <ul class="nav nav-tabs">
                                                                <li class="active"><a data-toggle="tab" href="#updateClass"> Update Class</a></li>
                                                                <li class=""><a data-toggle="tab" href="#updateDivision">Update Division</a></li>
                                                                <li class=""><a data-toggle="tab" href="#updateRoll">Update Roll Number</a></li>
                                                            </ul>
                                                            <div class="tab-content ">
                                                                <div id="updateClass" class="tab-pane active">
                                                                    <div class="panel-body">
                                                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Student_class_division_assign/update_student_class')?>">
                                                                            <div class="form-group">
                                                                                <label class="col-lg-2 control-label">Class Name</label>
                                                                                <div class="col-sm-6">
                                                                                    <select class="form-control update_assign_class_student" name="SCD_class_id">
                                                                                        <option>Select Class</option>
                                                                                        <?php foreach ($school_class as $key) { ?>
                                                                                        <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </div>
                                                                                <label class="col-lg-6 control-label" style="color:red;">(Please select the class in order to assign student.)</label>
                                                                            </div>
                                                                            <div class="ibox-content hidden" id="updateassignHeader" style="border:none;">
                                                                                <div class="ibox-title">
                                                                                    <h3><b>Class Division Details</b></h3><h5 style="color:red;">(Please click from below table for perticular Class Division Student List )</h5>
                                                                                </div><br>
                                                                                <div class="table-responsive">
                                                                                    <table class="table table-striped table-bordered table-hover" >
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Class</th>
                                                                                                <th>Division</th>
                                                                                                <th>No. of Student</th>
                                                                                                <th>Assigned Student Roll Number</th>
                                                                                                <th>Not Assigned Student Roll Number</th>
                                                                                            </tr>
                                                                                        </thead>

                                                                                        <tbody class="update_assign_student_class_wise_list_details">
                                                                                           
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="ibox-content hidden" id="updateClassStudentList" style="border:none;">
                                                                                <div class="ibox-title">
                                                                                    <h3><b>Class Division Student Details</b></h3><h5 style="color:red;">(Please click from below table for perticular Student for update class)</h5>
                                                                                </div><br>
                                                                                <div class="table-responsive">
                                                                                    <table class="table table-striped table-bordered table-hover" >
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Class</th>
                                                                                                <th>Division</th>
                                                                                                <th>Student Name</th>
                                                                                                <th>Roll No</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody class="update_assign_student_class_division_wise_list_details">
                                                                                           
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row hidden" id="update_class_student_details">
                                                                                <div class="col-sm-6">
                                                                                    <div class="ibox-content" style="border:none;">
                                                                                        <div class="ibox-title">
                                                                                            <h3><b>Update Student Details</b></h3>
                                                                                        </div><br>
                                                                                        <div class="table-responsive">
                                                                                            <table class="table table-striped table-bordered table-hover" >
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>Previous Class</th>
                                                                                                        <th>Previous Division</th>
                                                                                                        <th>Student Name</th>
                                                                                                        <th>Previous Roll No</th>
                                                                                                        <th>Select</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody class="update_class_student_detailsSS">
                                                                                                   
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="ibox-content" style="border:none;">
                                                                                        <div class="ibox-title">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-6">
                                                                                                    <h3><b>Update Class Details</b></h3><h5 style="color:red;">(Please Select new Class update.)</h5>
                                                                                                </div>
                                                                                                 <div class="col-sm-6">
                                                                                                     <div class="form-group">
                                                                                                        <select class="form-control update_class_SCD_class_id" name="update_class_SCD_class_id">
                                                                                                            
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="table-responsive">
                                                                                            <table class="table table-striped table-bordered table-hover" >
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>Sr.No</th>
                                                                                                        <th>fee Type</th>
                                                                                                        <th>fee Amount</th>
                                                                                                        <th>fee Waiver Name</th>
                                                                                                        <th>Waiver Amount</th>
                                                                                                        <th>Select</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody class="update_class_fee_details">
                                                                                                   
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12 col-sm-offset-9">
                                                                                        <button class="btn btn-primary enableOnInput" type="submit">Submit & Procced</button>
                                                                                        <button class="btn btn-white" type="reset">Cancel</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div id="updateDivision" class="tab-pane">
                                                                   <div class="panel-body">
                                                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Student_class_division_assign/update_student_division')?>">
                                                                            <div class="form-group">
                                                                                <label class="col-lg-2 control-label">Class Name</label>
                                                                                <div class="col-sm-6">
                                                                                    <select class="form-control update_division_assign_class_student" name="SCD_class_id">
                                                                                        <option>Select Class</option>
                                                                                        <?php foreach ($school_class as $key) { ?>
                                                                                        <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </div>
                                                                                <label class="col-lg-6 control-label" style="color:red;">(Please select the class in order to update student.)</label>
                                                                            </div>
                                                                            <div class="ibox-content hidden" id="updatedivisionassignHeader" style="border:none;">
                                                                                <div class="ibox-title">
                                                                                    <h3><b>Class Division Details</b></h3><h5 style="color:red;">(Please click from below table for perticular Class Division Student List )</h5>
                                                                                </div><br>
                                                                                <div class="table-responsive">
                                                                                    <table class="table table-striped table-bordered table-hover" >
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Class</th>
                                                                                                <th>Division</th>
                                                                                                <th>No. of Student</th>
                                                                                                <th>Assigned Student Roll Number</th>
                                                                                                <th>Not Assigned Student Roll Number</th>
                                                                                            </tr>
                                                                                        </thead>

                                                                                        <tbody class="update_division_assign_student_class_wise_list_details">
                                                                                           
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="ibox-content hidden" id="updateDivisionStudentList" style="border:none;">
                                                                                <div class="ibox-title">
                                                                                    <h3><b>Class Division Student Details</b></h3><h5 style="color:red;">(Please click from below table for perticular Student for update class)</h5>
                                                                                </div><br>
                                                                                <div class="table-responsive">
                                                                                    <table class="table table-striped table-bordered table-hover" >
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Class</th>
                                                                                                <th>Division</th>
                                                                                                <th>Student Name</th>
                                                                                                <th>Roll No</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody class="update_Division_assign_student_class_division_wise_list_details">
                                                                                           
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row hidden" id="update_Division_student_details">
                                                                                <div class="col-sm-8">
                                                                                    <div class="ibox-content" style="border:none;">
                                                                                        <div class="ibox-title">
                                                                                            <h3><b>Update Student Details</b></h3>
                                                                                        </div><br>
                                                                                        <div class="table-responsive">
                                                                                            <table class="table table-striped table-bordered table-hover" >
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>Previous Class</th>
                                                                                                        <th>Previous Division</th>
                                                                                                        <th>Student Name</th>
                                                                                                        <th>Previous Roll No</th>
                                                                                                        <th>Select</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody class="update_division_student_detailsSS">
                                                                                                   
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <div class="ibox-content" style="border:none;">
                                                                                        <div class="ibox-title">
                                                                                            <h3><b>Update Division Details</b></h3><h5 style="color:red;">(Please Select new Division update.)</h5>
                                                                                        </div><br>
                                                                                        <div class="table-responsive">
                                                                                            <table class="table table-striped table-bordered table-hover" >
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>Division Name</th>
                                                                                                        <th>Select</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody class="update_division_division_details">
                                                                                                   
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12 col-sm-offset-9">
                                                                                        <button class="btn btn-primary enableOnInput" type="submit">Submit & Procced</button>
                                                                                        <button class="btn btn-white" type="reset">Cancel</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div id="updateRoll" class="tab-pane">
                                                                    <div class="panel-body">
                                                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Student_class_division_assign/update_student_Roll_number')?>">
                                                                            <div class="form-group">
                                                                                <label class="col-lg-2 control-label">Class Name</label>
                                                                                <div class="col-sm-6">
                                                                                    <select class="form-control update_roll_assign_class_student_division" name="SCD_class_id">
                                                                                        <option>Select Class</option>
                                                                                        <?php foreach ($school_class as $key) { ?>
                                                                                        <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </div>
                                                                               <label class="col-lg-6 control-label" style="color:red;">(Please select the class in order to update student.)</label>
                                                                            </div>
                                                                            <div class="ibox-content" style="border:none;">
                                                                                <div class="table-responsive hidden" id="update_rollnumber_assignHeader">
                                                                                    <table class="table table-striped table-bordered table-hover" >
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Class</th>
                                                                                                <th>Division</th>
                                                                                                <th>No. of Student</th>
                                                                                                <th>Assigned Student Roll Number</th>
                                                                                                <th>Not Assigned Student Roll Number</th>
                                                                                            </tr>
                                                                                        </thead>

                                                                                        <tbody class="update_roll_assign_student_class_wise_list_details">
                                                                                           
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group hidden">
                                                                                <label class="control-label col-sm-1">Class Id</label>
                                                                                <div class="col-sm-2">
                                                                                    <input type="text" name="update_roll_class_id" class="form-control update_roll_number_backup_class_id">
                                                                                </div>
                                                                                <label class="control-label col-sm-1">division Id</label>
                                                                                <div class="col-sm-2">
                                                                                    <input type="text" name="update_roll_division_id" class="form-control update_roll_number_backup_division_id">
                                                                                </div>
                                                                                <!-- <label class="control-label col-sm-1">Previous Roll No</label>
                                                                                <div class="col-sm-2">
                                                                                    <input type="text" name="previous_roll_division_id" class="form-control privious_roll_number_backup_division_id">
                                                                                </div> -->
                                                                            </div>
                                                                            <div class="ibox_content hidden" id="update_ROll_NO_GENRATION">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="col-sm-10">   
                                                                                            <div class="form-group">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <div class="col-sm-10">   
                                                                                            <div class="form-group">
                                                                                                <label class="control-label" style="padding-bottom:2%">&nbsp Sort By</label> 
                                                                                                <select class="form-control update_sort_by_first_roll_number" name="update_sort_by_first_roll_number" style="border-radius:3px;" id="sort_by_first_roll_number">
                                                                                                    <option value="0"> Please Select</option>
                                                                                                    <option value="1"> Gender</option>
                                                                                                    <option value="2">First Name</option>
                                                                                                    <option value="3">Last Name</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-3 fadeInRight hidden" id="update_roll_number_gender">
                                                                                        <div class="col-sm-10">   
                                                                                            <div class="form-group">
                                                                                                <label class="control-label" style="padding-bottom:2%">&nbsp Gender</label> 
                                                                                                <select class="form-control update_student_gender_roll_number" name="update_student_gender_roll_number" style="border-radius:3px;" id="student_gender_roll_number">
                                                                                                    <option value="0">Select Gender</option>
                                                                                                    <option value="1">Male</option>
                                                                                                    <option value="2">Female</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> 
                                                                                </div>
                                                                                <div class="table-responsive" id="update_rollnumber_assignHeader">
                                                                                    <table class="table table-striped table-bordered table-hover" >
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Student Name</th>
                                                                                                <th>Roll Number</th>
                                                                                                <th>New Roll Number</th>
                                                                                            </tr>
                                                                                        </thead>

                                                                                        <tbody class="update_roll_assign_student_division_wise_list_details">
                                                                                           
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12 col-sm-offset-10">
                                                                                        <button class="btn btn-primary enableOnInput" type="submit">Submit & Procced</button>
                                                                                        <button class="btn btn-white" type="reset">Cancel</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
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
       
