 <div id="page-wrapper" class="gray-bg">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="row">
                                <div class="col-sm-6">
                                    <h5>Lesson</h5>
                                </div>
                            </div>
                    </div>
                   
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Class</th>
                                        <th>Date</th>
                                        <th>Subject</th>

                                        <th>Topic</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Update</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                        foreach ($lesson as $key) { 
                                    ?>
                                    <tr >

                                        <td><?=$i++;?></td>
                                        <td><?=$key['class_name']?> (<?=$key['division_name']?>)</td>

                                        <td><?=$key['LP_date']?></td>
                                        <td><?=$key['subject_name']?> (<?=$key['subject_type']?>)</td>

                                        <td><?=$key['LP_topic']?></td>
                                        <td><?=$key['LP_description']?></td>

                                        <td><?=$key['LP_status']?></td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#update_lesson_details" class="btn btn-xs btn-info update_model" title="<?=$key['LP_id']?>">Update</button>
                                        </td>
                                        
                                     </tr>

                                    <?php } ?>
                                </tbody>
                           
                            </table>
                        </div>


                        <div class="modal inmodal" id="update_lesson_details" tabindex="-1" role="dialog"  aria-hidden="true">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="" action="#">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-comments modal-icon"></i>
                                            <h4 class="modal-title"> Lesson </h4>
                                            <small>Update lesson status.</small>
                                            <h6 class="modal-title date"></h6>
                                        </div>
                                        <div class="modal-body">
                                            
                                             <div class="form-group">
                                                <label class="col-lg-2 control-label">Topic</label>
                                                <div class="col-sm-4">
                                                    <textarea class="form-control LP_topic" name="topic" rows="5" readonly></textarea>
                                                </div>
                                                <label class="col-lg-2 control-label">Description</label>
                                                <div class="col-sm-4">
                                                    <textarea class="form-control LP_description" name="description" rows="5" readonly></textarea>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-lg-2 control-label">Status</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control LP_status" name="status">
                                                </div>
                                                <div hidden>
                                                     <label class="col-lg-2 control-label">Lesson ID</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control LP_id" name="LP_id">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="hr-line-dashed"></div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary update">Save changes</button>
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
        