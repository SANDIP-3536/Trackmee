        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><b>New Document</b></h5>
                            <div class="ibox-tools">
                                <i class="fa fa-chevron-down" id="toggle_document"></i>    
                            </div>
                        </div>
                        <div class="ibox-content document_toggle">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addteacher" action="<?=site_url('Teacher/add_teacher_document')?>">
                                <div class="form-group" hidden>
                                    <label class="col-lg-2 control-label"></label>
                                    <div class="col-lg-7">
                                        <input type="text" placeholder=" " name="employee_profile_id" class="form-control" value="<?php echo $student_profile_id;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Document Name <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Driver Document Name" name="doc_name" class="form-control">
                                    </div>
                                    <label class="col-lg-2 control-label">Document Number <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Driver Document Number " name="doc_number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Document File <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="file" placeholder="placeholder" name="doc_file" class="form-control" accept="image/gif,image/png,image/jpeg" style="border:none;">
                                    </div>
                                </div>
                                <br>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-4">
                                        <a href="<?=site_url('Teacher/view_teacher')?>"><span class="btn btn-white" type="reset">Cancel</span></a>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h5><b>Student Documents</b></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                               <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Document Name</th>
                                            <th>Document Number</th>
                                            <th>Document file</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;
                                        foreach ($document as $key) {?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?=$key['doc_name']?></td>
                                            <td><?=$key['doc_number']?></td>
                                            <td><img src="<?=$key['doc_file']?>" width="100"  height="100"></td>
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