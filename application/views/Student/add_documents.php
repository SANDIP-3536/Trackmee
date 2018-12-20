        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><b>New Document</b></h5>
                            <div class="ibox-tools">
                                <span class="btn btn-xs btn-primary" id="toggle_document"> New Doc. </span>    
                            </div>
                        </div>
                        <div class="ibox-content document_toggle">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addStudent" action="<?=site_url('Student/add_student_document')?>">
                                <div class="form-group" hidden>
                                    <label class="col-sm-2 control-label">Student Id</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="student_profile_id" value="<?php echo $student_profile_id;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Document Name <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <select name="doc_name" class="form-control">
                                            <option value="Adhar_Card">Adhar Card</option>
                                            <option value="Transfer_Certificate">Transfer Certificate(TC)</option>
                                            <option value="Leaving_Certificate">Leaving Certificate(LC)</option>
                                            <option value="Medical_Certificate">Medical Certificate(if any)</option>
                                            <option value="Birth_Certificate">Birth Certificate</option>
                                        </select>
                                    </div>
                                    <label class="col-lg-2 control-label">Document Number <span style="color:red;">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Student Document Number " name="doc_number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Document File <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="file" placeholder="placeholder" name="doc_file" class="form-control" accept="file/pdf,file/doc,file/jpeg" style="border:none;">
                                    </div>
                                    <label class="col-lg-2 control-label">Type <span style="color:red;">*</span></label>
                                    <div class="col-lg-5">
                                        <div class="col-sm-6">
                                            <label class="radio-inline"> 
                                                <input type="radio" name="doc_type" value="1" checked>&nbsp  Original 
                                            </label>
                                            <label class="radio-inline"> 
                                                <input type="radio" name="doc_type" value="0" >&nbsp  Duplicate 
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-4">
                                        <a href="<?=site_url('Student/update_student/') .$student_profile_id?>"><span class="btn btn-white">Cancel</span></a>
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
                                            <th>Type</th>
                                            <th>Document file</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;
                                        foreach ($document as $key) {?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?=$key['doc_name']?></td>
                                            <td><?php if($key['doc_type'] == '0'){ echo "Duplicate";}else{echo "Original";}?></td>
                                            <td><a href="<?=$key['doc_file']?>" download ><img src="<?=$key['doc_file']?>" width="100"  height="100"></a></td>
                                            <td>
                                                <button class="btn btn-danger btn-xs" data-toggle="modal" id ='<?=$key['doc_id']; ?>' data-target="#deleteDoc"><i class="fa fa-trash"></i></button>
                                            </td>
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
        <div id="deleteDoc" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete Document Details</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" class="form-horizontal" action="<?=site_url('Student/delete_document')?>" enctype="multipart/form-data">
                           <div class="form-group hidden">
                                <label class="col-sm-3 control-label">Docuemnt ID</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control doc_id_delete" name="doc_id">
                                </div>
                            </div>
                            <center><h3>Do you really want to Delete?</h3></center>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-lg-6" style="text-align:right;">
                                    <button class="btn btn-primary" type="submit">Yes</button>
                                </div>
                                <div class="col-lg-6">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>