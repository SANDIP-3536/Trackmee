        <div class="wrapper wrapper-content animated fadeInRight">
        	<div class="row">
        		<div class="col-lg-12">
        			<div class="ibox float-e-margins">
        				<div class="ibox-title">
        					<div class="row">
        						<div class="col-sm-6">
        							<h3><b>Update Fee Type Details</b></h3>
        						</div>
        					</div>
        				</div>
        				<div class="ibox-content">
        					<form method="post" class="form-horizontal" enctype="multipart/form-data" id="addNotification" action="<?=site_url('Fee/fee_types_edit')?>">
        						<div class="form-group">
                                <?php foreach ($fee_types as $key) { ?>
                                    <input type="text" class="form-control hidden" name="fees_type_id" placeholder="Fee Type Name" value="<?=$key['fees_type_id']?>">
                                   <label class="col-lg-2 control-label">Name</label>
                                   <div class="col-sm-7">
                                        <input type="text" class="form-control" name="fees_type_name" placeholder="Fee Type Name" value="<?=$key['fees_type_name']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Class</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="fees_type_class_id">
                                            <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                            <?php foreach ($class_details as $key) { ?>
                                            <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                   <label class="col-lg-2 control-label">Amount</label>
                                   <div class="col-sm-7">
                                     <?php foreach ($fee_types as $key) { ?>
                                        <input type="text" class="form-control" name="fees_type_amount" placeholder="Fee Type Amount" value="<?=$key['fees_type_amount']?>">
                                    </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="<?=site_url('Fee/fee_types')?>"><span class="btn btn-white">Cancel</span></a>
                                        <button class="btn btn-primary enableOnInput" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>      