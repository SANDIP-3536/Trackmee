        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Fees Category</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="addNotification" action="<?=site_url('Fee/add_fee_category')?>">
                                <div class="form-group">
                                   <label class="col-lg-3 control-label">Category Name</label>
                                   <div class="col-sm-7">
                                        <input type="text" class="form-control" name="fee_category_name" placeholder="Fee Category Name">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary enableOnInput" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3><b>Fee Category Details </b></h3>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Fee Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($fee_category as $key) { ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$key['fee_category_name']?></td>
                                        <td>
                                            <a href="<?=site_url('Fee/update_fee_category/'.$key['fee_category_id'])?>"><span class="btn btn-xs btn-primary"><i class="fa fa-pencil edit"></i> Edit</span></a>
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