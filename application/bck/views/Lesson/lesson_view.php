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

                                <div class="col-sm-6">
                                    <div class="ibox-tools">
                                        <a href="<?=site_url('Lesson/index')?>"><button class="btn btn-sm btn-info">Lesson Assign</button></a>
                                       
                                    </div>
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
                                        <th>Teacher</th>
                                        <th>Topic</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        
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
                                        <td><?=$key['employee_first_name']?> <?=$key['employee_middle_name']?> <?=$key['employee_last_name']?></td>
                                        <td><?=$key['LP_topic']?></td>
                                        <td><?=$key['LP_description']?></td>

                                        <td><?=$key['LP_status']?></td>
                                        
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
        