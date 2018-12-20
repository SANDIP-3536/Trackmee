        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Device Details</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Device No.</th>
                                            <th>Device Mobile No.</th>
                                            <th>Device Mobile IMEI No.</th>
                                            <th>Device Moving Frequency</th>
                                            <th>Device Non-Moving Frequency</th>
                                            <th>Device Port Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0;
                                        foreach ($device as $key) {?>
                                        <tr>
                                            <td><?=$i+1;?></td>
                                            <td><?=$key['device_id']?></td>
                                            <td><?=$key['device_mobile_number']?></td>
                                            <td><?=$key['device_mobile_IMEI_number']?></td>
                                            <td><?=$key['device_moving_frequency']?></td>
                                            <td><?=$key['device_non_moving_frequency']?></td>
                                            <td><?=$key['device_port_number']?></td>
                                        </tr>
                                        <?php $i++;} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>