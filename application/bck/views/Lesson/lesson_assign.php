    <style type="text/css">
.input-group[class*=col-] {
    float: none;
    padding-right: 15px;
    padding-left: 15px;
}
    </style>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>Lesson Assign</h5>
                                </div>

                                <div class="col-sm-6">
                                    <div class="ibox-tools">
                                        <a href="<?=site_url('Lesson/show_lesson')?>"><button class="btn btn-sm btn-info">View Lesson</button></a>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                          <form method="post" class="form-horizontal" enctype="multipart/form-data" id="add_lesson" action="<?=site_url('Lesson/add_lesson')?>">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Class</label>
                                    <div class="col-sm-3">
                                        <select class="form-control class_details class_name" name="class_name">
                                                <option>Select Class</option>
                                                <?php foreach ($class_details as $key) { ?>
                                                    <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                    <label class="col-lg-2 control-label">Division</label>
                                    <div class="col-sm-3">
                                        <select class="form-control division_details division" name="division">
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Subject</label>
                                    <div class="col-sm-3">
                                        <select class="form-control subject_details subject_name" name="subject_name">
                                               
                                        </select>
                                    </div>
                                    <label class="col-lg-2 control-label">Teacher</label>
                                    <div class="col-sm-3">
                                        <select class="form-control teacher_details teacher_name" name="teacher_name">
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Date</label>
                                    <div class="col-sm-3 input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control date_assign" name="date" readonly>
                                    </div>
                                    <div hidden>
                                    <label class="col-lg-2 control-label">Status</label>
                                    <div class="col-sm-3">
                                       <input type="text" class="form-control status" name="status" value="Open">
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Topic</label>
                                    <div class="col-sm-3">
                                         <textarea class="form-control topic" name="topic" rows="5"></textarea>     
                                    </div>
                                    <label class="col-lg-2 control-label">Description</label>
                                    <div class="col-sm-3">
                                       <textarea class="form-control description" name="description" rows="5"></textarea>
                                    </div>
                                </div>
                                 <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary add_lesson" type="submit">Save</button>
                                        <button class="btn btn-white" type="reset">Cancel</button>
                                    </div>
                                </div>
                         </form> 

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>