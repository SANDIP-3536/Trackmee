      <style type="text/css">
      .legendLabel{
        padding: 5px;
      }
      a {
          color: #000;
      }
      </style>
        <div class="wrapper wrapper-content animated fadeInRight" id="load_content" style="padding: 0;">
            <div class="row">
                <div class="col-lg-12" style="padding: 0;">
                    <div class="ibox float-e-margins aactive">
                        <div class="ibox-title" style="background: none repeat scroll 0 0 #f3f3f3;color: #000;padding: 0px 15px 0px;border-top: 3px solid #38b7ec;border-bottom: 3px solid #38b7ec;">
                            <div class="row">
                                <div class="col-sm-2" style="padding: 8px;" id="title_div" >
                                    <h3><b>Map Dashboard</b></h3>
                                </div>
                                
                                  <div class="col-sm-2">
                                    <div class="table-responsive" style="">
                                        <table class="table table-striped table-hover"  style="font-weight: bold;margin-bottom: 0;">
                                            <thead id="total_status">
                                              <tr>
                                                  <td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/car_green.png" alt="running" style="padding-right: 15px;"> Running : <?php print_r($running); ?></td>
                                              </tr>
                                              <tr>
                                                  <td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/car_red.png" alt="stop" style="padding-right: 15px;"> Idle : <?php print_r($stop); ?></td>
                                              </tr>
                                              <tr>
                                                  <td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/car_yellow.png" alt="Parking" style="padding-right: 15px;"> Parking : <?php print_r($parking); ?></td>
                                              </tr>
                                              <tr>
                                                  <td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/car_blue.png" alt="Idling" style="padding-right: 15px;"> Idling : <?php print_r($idling); ?></td>
                                              </tr>
                                              <tr>
                                                  <td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/car_gray.png" alt="Toweing" style="padding-right: 15px;"> Toweing : <?php print_r($toweing); ?></td>
                                              </tr>
                                            </thead>
                                           </table>
                                     </div> 
                                  </div>
                                  <div class="col-sm-2" style="padding: 8px;">
                                    <div class="text-center h-200" style="min-height: 155px;padding: 2px 20px 2px 20px;float: left;">
                                        <span id="sparkline7"></span>

                                        <center>
                                            <table style="top:5px;right:5px;;font-size:smaller;color:#000;">
                                              <tbody>
                                                <tr>
                                                  <td class="legendColorBox">
                                                    <div style="border:1px solid #ccc;padding:1px">
                                                      <div style="width:4px;height:0;border:5px solid #33cc33;overflow:hidden"></div>
                                                    </div>
                                                  </td>
                                                  <td class="legendLabel">Running</td>
                                                
                                                  <td class="legendColorBox">
                                                    <div style="border:1px solid #ccc;padding:1px">
                                                      <div style="width:4px;height:0;border:5px solid #cc0000;overflow:hidden"> </div>
                                                    </div>
                                                  </td>
                                                  <td class="legendLabel">Idle</td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </center>
                                    </div>
                                  </div>
                                  <div class="col-sm-2" style="padding: 8px;">
                                    <div class="text-center h-200" style="min-height: 155px;padding: 2px 20px 2px 20px;float: right;">
                                        <span id="sparkline8"></span>

                                        <center>
                                            <table style="top:5px;right:5px;;font-size:smaller;color:#000;">
                                              <tbody>
                                                <tr>
                                                  <td class="legendColorBox">
                                                    <div style="border:1px solid #ccc;padding:1px">
                                                      <div style="width:4px;height:0;border:5px solid #2F7A4C;overflow:hidden"></div>
                                                    </div>
                                                  </td>
                                                  <td class="legendLabel">GPS Location</td>
                                                
                                                  <td class="legendColorBox">
                                                    <div style="border:1px solid #ccc;padding:1px">
                                                      <div style="width:4px;height:0;border:5px solid #933EC5;overflow:hidden"> </div>
                                                    </div>
                                                  </td>
                                                  <td class="legendLabel">CellId Location</td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </center>
                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                    <div class="table-responsive" style="">
                                        <table class="table table-striped table-hover"  style="font-weight: bold;margin-bottom: 0;">
                                            <thead id="total_status2">
                                              <tr>
                                                  <td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/car_darkgreen.png" alt="gpsfixed" style="padding-right: 15px;"> GPS Location : <?php print_r($gpsfixed); ?></td>
                                              </tr>
                                              <tr>
                                                  <td style="border:none;padding:2px;"><img src="<?=base_url()?>assets/img/purpal.png" alt="gpsnotfixed" style="padding-right: 15px;"> CellId Location : <?php print_r($gpsnotfixed); ?></td>
                                              </tr>
                                            </thead>
                                        </table>
                                     </div> 
                                  </div>                               
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                               <div class="col-lg-12" style="padding: 0;">
                                  <table class="table table-bordered table-hover" style="text-align: center;">
                                      <thead>
                                      <tr style="color:#0073ea;" class="map_details_head">
                                          <th style="text-align: center;">Id</th>
                                          <?php if(isset($this->session->userdata['Institute'])) { ?>
                                          <th style="text-align: center;">Client</th>
                                          <?php } ?>
                                          <th style="text-align: center;">Status</th>
                                          <th style="text-align: center;">Vehicle</th>
                                          <th style="text-align: center;">Device Id</th>
                                          <th style="text-align: center;">Timestamp</th>
                                          <th style="text-align: center;">Speed(kmph)</th>
                                          <th style="text-align: center;">Location</th>
                                          <th style="text-align: center;">Battery</th>
                                          <th style="text-align: center;">IGN</th>
                                          <th style="text-align: center;">GPS Status</th>
                                          <th style="text-align: center;">Total Satellites</th>
                                          <th style="text-align: center;">GSM Signal Strength</th>
                                          <th style="text-align: center;">GPS Quality</th>
                                      </tr>
                                      </thead>
                                      <tbody id="vehical_status">
                                      
                                      <?php for ($i=0; $i < count($res1); $i++) { ?>
                                          <tr class="map_details">
                                              <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"> <?php echo $i+1; ?> </a></td>
                                            <?php if(isset($this->session->userdata['Institute'])) { ?>
                                            <th><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><?=$res1[$i]['school_name']?></a></th>
                                            <?php } ?> 
                                            <?php if ($res1[$i][0]['vehicle_movement_status'] == "B") { ?>
                                                  <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><img src="<?=base_url()?>assets/img/car_green.png" alt="running"></a></td>
                                            <?php  }else if ($res1[$i][0]['vehicle_movement_status'] == "c") { ?>
                                                  <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><img src="<?=base_url()?>assets/img/car_yellow.png" alt="parking"></a></td>
                                            <?php  }else if ($res1[$i][0]['vehicle_movement_status'] == "d") { ?>
                                                  <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><img src="<?=base_url()?>assets/img/car_blue.png" alt="idling"></a></td>
                                            <?php  }else if ($res1[$i][0]['vehicle_movement_status'] == "e") { ?>
                                                  <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><img src="<?=base_url()?>assets/img/car_gray.png" alt="toweing"></a></td>
                                            <?php  }else { ?>
                                                  <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><img src="<?=base_url()?>assets/img/car_red.png" alt="stop"></a></td>
                                            <?php  } ?>
                                           

                                              <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><?=$res1[$i][0]['stop_longitude']?></a></td>
                                              <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><?=$res1[$i][0]['device_id']?></a></td> 
                                              <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><?=$res1[$i][0]['xml_date_time']?></a></td>
                                              <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><?=$res1[$i][0]['speed']?></a></td>
                                              <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><?=$res1[$i][0]['stop_latitude']?></a></td>
                                               <?php if ($res1[$i][0]['power_status'] == "1") { ?>
                                                  <!-- <td>Power</td> -->
                                                  <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><img src="<?=base_url()?>assets/img/BatteryOK.png" alt="Power" style="height:25px;"></a></td>
                                                <?php  }else if ($res1[$i][0]['power_status'] == "0") { ?>
                                                      <!-- <td>Internal Battery</td> -->
                                                      <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><img src="<?=base_url()?>assets/img/BatteryDis.png" alt="Internal Battery" style="height:25px;"></a></td>
                                                <?php  }else if ($res1[$i][0]['power_status'] == "2") { ?>
                                                  <!-- <td>Power</td> -->
                                                  <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><img src="<?=base_url()?>assets/img/BatteryOK.png" alt="Power" style="height:25px;"></a></td>
                                                <?php  }else if ($res1[$i][0]['power_status'] == "3") { ?>
                                                      <!-- <td>Internal Battery</td> -->
                                                      <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><img src="<?=base_url()?>assets/img/BatteryDis.png" alt="Internal Battery" style="height:25px;"></a></td>
                                                <?php  } ?>

                                                <?php if ($res1[$i][0]['ignition'] == "1") { ?>
                                                  <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><img src="<?=base_url()?>assets/img/ign_on.png" alt="ign_on"></a></td>
                                                <?php  }else { ?>
                                                      <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><img src="<?=base_url()?>assets/img/ign_off.png" alt="ign_off"></a></td>
                                                <?php  } ?>

                                                <?php if ($res1[$i][0]['gps_valid_data'] == "1") { ?>
                                                      <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><img src="<?=base_url()?>assets/img/signal_green.png" alt=""></a></td>
                                                <?php  }else{ ?>
                                                      <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><img src="<?=base_url()?>assets/img/signal_red.png" alt=""></a></td>
                                                <?php } ?>

                                              <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><?=$res1[$i][0]['total_satellites']?></a></td>
                                              <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>"><?=$res1[$i][0]['gsm_signal_strength']?></a></td>
                                              <td><a href="<?=site_url('Tracking/index/' .$res1[$i][0]['device_id'])?>">
                                                <!-- <?=$res1[$i][0]['gps_quality']?> -->
                                                <?php if ($res1[$i][0]['gps_quality'] == "F") { ?> Good <?php } ?>
                                                <?php if ($res1[$i][0]['gps_quality'] == "E") { ?> Average <?php } ?>
                                                <?php if ($res1[$i][0]['gps_quality'] == "D") { ?> Poor <?php } ?>
                                                <?php if ($res1[$i][0]['gps_quality'] == "C") { ?> Very Poor <?php } ?>

                                              </a></td>
                                                                                             
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


