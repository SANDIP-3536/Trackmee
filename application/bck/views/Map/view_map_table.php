        <div class="wrapper wrapper-content animated fadeInRight" id="load_content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins aactive">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h3><b>Map Dashboard</b></h3>
                                </div>
                                
                        <?php
                             $stop = 0; 
                             $running = 0; 
                             $gpsnotfixed = 0; 
                             $gpsfixed = 0; 
                         
                             for ($i=0; $i < count($res1); $i++) {
                                if ($res1[$i][0]['vehicle_movement_status'] == "B") {
                                  $running = $running+1; 
                                }else{
                                  $stop = $stop+1; 
                                }
                                if ($res1[$i][0]['gps_valid_data'] == "1") {
                                  $gpsfixed = $gpsfixed+1; 
                                } else {
                                  $gpsnotfixed = $gpsnotfixed+1; 
                                }
                            }   

                         ?> 
                                 <div class="col-sm-offset-1 col-sm-5">
                                    <div class="table-responsive" style="">
                                        <table class="table table-striped table-hover"  style="font-weight: bold;margin-bottom: 0;">
                                            <thead>
                                            <tr>
                                                <td style="border:none;"><img src="<?=base_url()?>assets/img/icon-bus-green.png" alt="running" style="padding-right: 15px;height:15px;"> Running : <?php print_r($running); ?></td>
                                                <td style="border:none;"><img src="<?=base_url()?>assets/img/icon-bus-red.png" alt="stop" style="padding-right: 15px;height:15px;"> Idle : <?php print_r($stop); ?></td>
                                                <td style="border:none;"><img src="<?=base_url()?>assets/img/yellow-circle.jpg" alt="gpsfixed" style="padding-right: 15px;"> GPS Location : <?php print_r($gpsfixed); ?></td>
                                                <td style="border:none;"><img src="<?=base_url()?>assets/img/orange-circle.png" alt="gpsnotfixed" style="padding-right: 15px;"> CellId Location : <?php print_r($gpsnotfixed); ?></td>
                                            </tr>
                                            </thead>
                                           </table>
                                     </div> 
                                 </div>
                                  <div class="col-sm-3">
                                    <div class="ibox-tools">
                                      <?php if(isset($this->session->userdata['Institute'])) { ?>
                                        <a href="<?=site_url('Tracking/view_all_device_institute')?>"><button class="btn btn-sm btn-info">View All Device</button></a>
                                      <?php }else{ ?>
                                        <a href="<?=site_url('Tracking/view_all_device')?>"><button class="btn btn-sm btn-info">View All Device</button></a>
                                       <?php } ?>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                               <div class="col-lg-11" style="padding: 0;">

                                      <table class="table table-bordered table-hover" style="text-align: center;">
                                          <thead>
                                          <tr style="color:#0073ea;" class="map_details_head">
                                              <th style="text-align: center;">Id</th>
                                              <?php if(isset($this->session->userdata['Institute'])) { ?>
                                              <th style="text-align: center;">School</th>
                                              <?php } ?>
                                              <th style="text-align: center;">Status</th>
                                              <th style="text-align: center;">GPS Status</th>
                                              <th style="text-align: center;">Vehicle</th>
                                              <th style="text-align: center;">Device Id</th>
                                              <th style="text-align: center;">Timestamp</th>
                                              <th style="text-align: center;">Speed(kmph)</th>
                                              <th style="text-align: center;">Location</th>
                                              <th style="text-align: center;">Battery</th>
                                              <th style="text-align: center;">Total Satellites</th>
                                              <th style="text-align: center;">GSM Signal Strength</th>
                                          </tr>
                                          </thead>
                                          <tbody id="vehical_status">
                                          

                                      <?php for ($i=0; $i < count($res1); $i++) { ?>
                                              <tr class="map_details">
                                                  <td> <?php echo $i+1; ?> </td>
                                                <?php if(isset($this->session->userdata['Institute'])) { ?>
                                                <th><?=$res1[$i]['school_name']?></th>
                                                <?php } ?> 
                                                <?php if ($res1[$i][0]['vehicle_movement_status'] == "B") { ?>
                                                      <td><img src="<?=base_url()?>assets/img/icon-bus-green.png" alt="running" style="height:25px;"></td>
                                                <?php  }else { ?>
                                                      <td><img src="<?=base_url()?>assets/img/icon-bus-red.png" alt="stop" style="height:25px;"></td>
                                                <?php  } ?>
                                               

                                                <?php if ($res1[$i][0]['gps_valid_data'] == "1") { ?>
                                                      <td><img src="<?=base_url()?>assets/img/yellow-circle.jpg" alt="" style="height:25px;"></td>
                                                <?php  }else{ ?>
                                                      <td><img src="<?=base_url()?>assets/img/orange-circle.png" alt="" style="height:25px;"></td>
                                                <?php } ?>

                                                  <td><?=$res1[$i][0]['stop_longitude']?></td>
                                                  <td><?=$res1[$i][0]['device_id']?></td> 
                                                  <td><?=$res1[$i][0]['xml_date_time']?></td>
                                                  <td><?=$res1[$i][0]['speed']?></td>
                                                  <td><?=$res1[$i][0]['stop_latitude']?></td>
                                                   <?php if ($res1[$i][0]['power_status'] == "1") { ?>
                                                      <!-- <td>Power</td> -->
                                                      <td><img src="<?=base_url()?>assets/img/BatteryOK.png" alt="Power" style="height:25px;"></td>
                                                    <?php  } ?>
                                                    <?php if ($res1[$i][0]['power_status'] == "0") { ?>
                                                          <!-- <td>Internal Battery</td> -->
                                                          <td><img src="<?=base_url()?>assets/img/BatteryDis.png" alt="Internal Battery" style="height:25px;"></td>
                                                    <?php  } ?>
                                                      <?php if ($res1[$i][0]['power_status'] == "2") { ?>
                                                      <!-- <td>Power</td> -->
                                                      <td><img src="<?=base_url()?>assets/img/BatteryOK.png" alt="Power" style="height:25px;"></td>
                                                    <?php  } ?>
                                                    <?php if ($res1[$i][0]['power_status'] == "3") { ?>
                                                          <!-- <td>Internal Battery</td> -->
                                                          <td><img src="<?=base_url()?>assets/img/BatteryDis.png" alt="Internal Battery" style="height:25px;"></td>
                                                    <?php  } ?>

                                                  <td><?=$res1[$i][0]['total_satellites']?></td>
                                                  <td><?=$res1[$i][0]['gsm_signal_strength']?></td>
                                                                                                 
                                              </tr>
                                      <?php } ?>   

                                                            
                                            
                                          </tbody>
                                         
                                      </table>
                               </div>    

                               <div class="col-lg-1" style="padding: 0;">

                                      <table class="table table-bordered table-hover" style="text-align: center;">
                                          <thead>
                                          <tr style="color:#0073ea;" class="view_map_head">
                                              <th style="text-align: center;">Option</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                          
                                      <?php for ($i=0; $i < count($res1); $i++) { ?>
                                              <tr class="view_map">
                                                  <td>
                                                      <a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><span class="btn btn-xs btn-success"><i class="fa fa-map-marker view" title="View"></i></a></span>
                                                      <a href="<?=site_url('Reports/tracking_report_details')?>"><span class="btn btn-xs btn-info"><i class="fa fa-history history" title="History"></i></a></span>
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
    </div>


