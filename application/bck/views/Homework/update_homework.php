        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b> Update Homework</b></h3>
                                        </div>
                                         <div class="col-sm-6">
                                            <div class="ibox-tools">
                                                <!-- <span class="btn btn-xs btn-primary" id="toggle_route"> Add </span>      -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addSubject" action="<?=site_url('Homework/update_homework_details')?>">
                                        <div class="form-group">
                                            <?php foreach ($homework as $key) { ?>
                                            <label class="col-lg-2 control-label">Date<span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                <input type="text" placeholder="Date" name="hw_id" class="form-control hidden" value="<?=$key['hw_id']?>" readonly>
                                                <input type="text" placeholder="Date" name="hw_datetime" class="form-control datepicker" value="<?=$key['hw_datetime']?>" readonly>
                                            </div>
                                            <label class="col-lg-2 control-label">Home Work<span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                <select name="hw_TCDS_id" class="form-control">
                                                    <option value="<?=$key['TCDS_id']?>"><?=$key['subject_name']?>
                                                        <?php if($key['subject_type'] == 1){
                                                            echo "( Theory )";
                                                        }elseif ($key['subject_type'] == 2) {
                                                            echo "( Practical )";
                                                        }elseif ($key['subject_type'] == 3) {
                                                           echo "( Project )";
                                                        }elseif($key['subject_type'] == 4){
                                                            echo "( Oral )";
                                                        }?></option>
                                                    <?php foreach ($TCDS as $key) { ?>
                                                    <option value="<?=$key['TCDS_id']?>"><?=$key['subject_name']?>
                                                        <?php if($key['subject_type'] == 1){
                                                            echo "( Theory )";
                                                        }elseif ($key['subject_type'] == 2) {
                                                            echo "( Practical )";
                                                        }elseif ($key['subject_type'] == 3) {
                                                           echo "( Project )";
                                                        }elseif($key['subject_type'] == 4){
                                                            echo "( Oral )";
                                                        }?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <?php foreach ($homework as $key) { ?>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Message<span style="color:red;">*</span></label>
                                            <div class="col-lg-3">
                                                <input type="text" placeholder="Date" name="hw_msg" class="form-control" value="<?=$key['hw_msg']?>">
                                            </div>
                                            <label class="col-lg-2 control-label">End Date</label>
                                            <div class="col-lg-3">
                                                <input type="text" name="hw_end_date" class="form-control datepicker" placeholder="End Date" value="<?=$key['hw_end_date']?>" readonly>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php } ?>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-5 col-sm-offset-3">
                                                <a href="<?=site_url('Homework/homework_details')?>"><span class="btn btn-white":>Cancel</span></a>
                                                <button class="btn btn-primary enableOnInput" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                               <!-- 
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Date</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>End Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i = 1;
                                                foreach ($homework as $key) { ?>
                                                <tr>                
                                                    <th><?php echo $i++; ?></th>
                                                    <th><?=$key['hw_datetime']?></th>
                                                    <th><?=$key['subject_name']?>
                                                        <?php if($key['subject_type'] == 1){
                                                            echo "( Theory )";
                                                        }elseif ($key['subject_type'] == 2) {
                                                            echo "( Practical )";
                                                        }elseif ($key['subject_type'] == 3) {
                                                           echo "( Project )";
                                                        }elseif($key['subject_type'] == 4){
                                                            echo "( Oral )";
                                                        }?>
                                                    </th>
                                                    <th><?=$key['hw_msg']?></th>
                                                    <th><?=$key['hw_end_date']?></th>
                                                    <th><a href="<?=site_url('Homework/Edit_homework/' .$key['hw_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil"> Edit</i></span></th>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>