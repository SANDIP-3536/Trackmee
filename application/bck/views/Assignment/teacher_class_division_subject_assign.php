        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Teacher Class Division Subject Assign</b></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="Assign" action="<?=site_url('Teacher_class_division_subject_assign/TCDS_registration')?>">
                                                <div class="ibox-title">
                                                    <div class="row">
                                                        <div class="col-sm-7">
                                                            <h3><b>Teacher Details</b></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ibox-content">
                                                    <div class="form-group">
                                                        <label class="col-lg-3 control-label">Class Name</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control new_TCDS_class_assign" name="TCDS_class_id">
                                                                <option>Select Class</option>
                                                                <?php foreach ($school_class as $key) { ?>
                                                                <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <label class="col-lg-12 control-label" style="text-align:center;color:red;">(Please select the class for assign division to student.)</label>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered table-hover" >
                                                            <thead>
                                                                <tr class="division_details">
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <thead>
                                                                <tbody class="subject_details"> 
                                                                </tbody>
                                                            </table>
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