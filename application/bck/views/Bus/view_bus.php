        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Bus Device Details</b></h3>
                                </div>
                                <div class="col-sm-6">
                                    <div class="ibox-tools">
                                        <a href="<?=site_url('Device/device_registration')?>"><button class="btn btn-xs btn-primary device">Add Device</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Bus Number</th>
                                            <th>Device Number</th>
                                            <th>Total No. of Seats</th>                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0;
                                        foreach ($bus as $key1) {?>
                                        <tr>
                                            <td><?=$i+1?></td>
                                            <td><?=$key1['bus_no']?></td>
                                            <td><?=$key1['bus_device_id']?></td>
                                            <td><?=$key1['bus_total_no_of_seat']?></td>
                                        </tr>
                                        <?php $i++;} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- <div class="row">
                        <div class="col-lg-6">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Device Details</b><h5>(Not Assigned)</h5></h3>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="ibox-tools">
                                                <a href="<?=site_url('Device/device_registration')?>"><button class="btn btn-xs btn-primary device">Add Device</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Bus Number</th>
                                                    <th>Device Number</th>
                                                    <th>Total No. of Seats</th>                                        </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=0;
                                                foreach ($bus as $key1) {?>
                                                <tr>
                                                    <td><?=$i+1?></td>
                                                    <td><?=$key1['bus_no']?></td>
                                                    <td><?=$key1['bus_device_id']?></td>
                                                    <td><?=$key1['bus_total_no_of_seat']?></td>
                                                </tr>
                                                <?php $i++;} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3><b>Bus Details</b><h5>(Not Assigned)</h5></h3>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="ibox-tools">
                                                <a href="<?=site_url('Device/device_registration')?>"><button class="btn btn-xs btn-primary device">Add Device</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Bus Number</th>
                                                    <th>Device Number</th>
                                                    <th>Total No. of Seats</th>                                        </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=0;
                                                foreach ($bus as $key1) {?>
                                                <tr>
                                                    <td><?=$i+1?></td>
                                                    <td><?=$key1['bus_no']?></td>
                                                    <td><?=$key1['bus_device_id']?></td>
                                                    <td><?=$key1['bus_total_no_of_seat']?></td>
                                                </tr>
                                                <?php $i++;} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>