<style type="text/css">
    .fa-file-pdf-o {
        color: black;
        font-size: 31px
    }
    .fa-file-excel-o {
        color: black;
        font-size: 31px
    }
    .btn-group>.btn:first-child:not(:last-child):not(.dropdown-toggle){
        background-color: white;
    }
    .btn-group>.btn:last-child:not(:first-child), .btn-group>.dropdown-toggle:not(:first-child){
        background-color: white;
    }
    .ibox-content{
        padding: 15px 20px 5px 20px;
    }
    .loading {
        width: 100%;
        height: 100%;
        top: 0px;
        left: 0px;
        position: fixed;
        display: block;
        opacity: 0.7;
        background-color: #fff;
        z-index: 99;
        text-align: center;
    }

    #loading-image {
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 100;
    }

  /* @media print{
    .page_foot{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        width: 100%;
        position: absolute;
        padding-right: 2cm !important;
        bottom:0px;
    }
   } 

    .page_foot{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        width: 100%;
        position: absolute;
        top: 27.7cm !important;
        padding-right: 2cm !important;
        bottom:0px;

    }*/
</style>
            <div class="loading">
                <img id="loading-image" src="http://cdn.nirmaltv.com/images/generatorphp-thumb.gif" alt="Loading..." />
            </div>
            <div class="wrapper wrapper-content animated fadeInRight distance_demo">
                <nav class="white-bg" role="navigation">
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav">
                            <li id="distance_click" class="active"><a><i class="fa fa-bar-chart" style="display:inline;font-size: initial;"></i> Distance Report</a></li>
                            <li id="stoppage_click"><a><i class="fa fa-stop" style="display: inline;font-size: initial;"></i> Stoppage Report </a></li>
                            <li id="overspeed_click"><a><i class="fa fa-stack-overflow" style="display:inline;font-size: initial;"></i> Overspeed Report</a></li>
                            <li id="history_click"><a><i class="fa fa-history" style="display:inline;font-size: initial;"></i> History Report</a></li>
                        </ul>
                    </div>
                </nav><br>
                <div class="row">
                     <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3><b>Distance Report</b></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content division_details_hide">
                                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Bus<span style="color:red;">*</span></label>
                                    <div class="col-lg-2">
                                       <select class="form-control bus" name="bus" >                            
                                            <option>Select Bus</option>
                                            <?php foreach ($bus as $key) { ?>
                                                <option value="<?=$key['bus_device_id']?>"><?=$key['bus_no'];?></option>
                                            <?php } ?>
                                       </select>
                                    </div>
                                    <label class="col-lg-1 control-label">Dates<span style="color:red;">*</span></label>
                                    <div class="col-lg-2">
                                       <input type="text" class="form-control from reportrange" name="from-date" placeholder="Date" readonly>
                                    </div>
                                    <label class="col-lg-1 control-label"></label>
                                    <div class="col-sm-2">
                                        <span class="btn btn-sm btn-primary enableOnInput fetch_distance_report" type="submit">Show Report</span>
                                        <input type='button' class="btn btn-sm btn-warning" value='Print Report' onclick='printDiv("example");'/>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Date</th>
                                            <th>Distance (km)</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight stoppage_demo">
                <nav class="white-bg" role="navigation">
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav">
                            <li id="distance_click"><a><i class="fa fa-bar-chart" style="display:inline;font-size: initial;"></i> Distance Report</a></li>
                            <li id="stoppage_click" class="active"><a><i class="fa fa-stop" style="display: inline;font-size: initial;"></i> Stoppage Report </a></li>
                            <li id="overspeed_click"><a><i class="fa fa-stack-overflow" style="display:inline;font-size: initial;"></i> Overspeed Report</a></li>
                            <li id="history_click"><a><i class="fa fa-history" style="display:inline;font-size: initial;"></i> History Report</a></li>
                        </ul>
                    </div>
                </nav><br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3><b>Stoppage Report</b></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content division_details_hide">
                                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-lg-1 control-label">Bus<span style="color:red;">*</span></label>
                                        <div class="col-lg-2">
                                           <select class="form-control bus1" name="bus" >                            
                                                <option>Select Bus</option>
                                                <?php foreach ($bus as $key) { ?>
                                                    <option value="<?=$key['bus_device_id']?>"><?=$key['bus_no'];?></option>
                                                <?php } ?>
                                           </select>
                                        </div>
                                        <label class="col-lg-1 control-label">Dates<span style="color:red;">*</span></label>
                                        <div class="col-lg-2">
                                           <input type="text" class="form-control from1 reportrange" name="from-date" placeholder="Date" readonly>
                                        </div>
                                        <label class="col-lg-1 control-label">Stoppage[Min]<span style="color:red;">*</span></label>
                                        <div class="col-lg-2">
                                            <select class="form-control min1" name="min">
                                                <option value="00:00:00"> 00 min</option>
                                                <option value="00:15:00"> 15 min</option>
                                                <option value="00:30:00"> 30 min</option>
                                                <option value="00:45:00"> 45 min</option>
                                            </select>
                                        </div>
                                        <label class="col-lg-1 control-label"></label>
                                        <div class="col-sm-2">
                                            <span class="btn btn-sm btn-primary enableOnInput stoppage_report" type="submit">Show Report</span>
                                            <input type='button' class="btn btn-sm btn-warning" value='Print Report' onclick='printDiv("example");'/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example1" style="width:100% !important;">
                                        <thead>
                                            <tr>
                                                <th>Address</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Total Time</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight overspeed_demo">
                <nav class="white-bg" role="navigation">
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav">
                            <li id="distance_click"><a><i class="fa fa-bar-chart" style="display:inline;font-size: initial;"></i> Distance Report</a></li>
                            <li id="stoppage_click"><a><i class="fa fa-stop" style="display: inline;font-size: initial;"></i> Stoppage Report </a></li>
                            <li id="overspeed_click" class="active"><a><i class="fa fa-stack-overflow" style="display:inline;font-size: initial;"></i> Overspeed Report</a></li>
                            <li id="history_click"><a><i class="fa fa-history" style="display:inline;font-size: initial;"></i> History Report</a></li>
                        </ul>
                    </div>
                </nav><br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3><b>Overspeeding Report</b></h3>
                                    </div>
                                     <div class="col-sm-6">
                                        <div class="ibox-tools">
                                            <i class="fa fa-chevron-down" id="toggle_route"></i>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content division_details_hide">
                                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-lg-1 control-label">Bus<span style="color:red;">*</span></label>
                                        <div class="col-lg-2">
                                           <select class="form-control bus2" name="bus" >                            
                                                <option>Select Bus</option>
                                                <?php foreach ($bus as $key) { ?>
                                                    <option value="<?=$key['bus_device_id']?>"><?=$key['bus_no'];?></option>
                                                <?php } ?>
                                           </select>
                                        </div>
                                        <label class="col-lg-1 control-label">Dates<span style="color:red;">*</span></label>
                                        <div class="col-lg-2">
                                           <input type="text" class="form-control from2 reportrange" name="from-date" placeholder="<?php  echo date('Y/m/d')?> <?php echo " - " ?><?php echo date('Y/m/d')?>" readonly>
                                        </div>
                                        <label class="col-lg-1 control-label">Speed[kmph]<span style="color:red;">*</span></label>
                                        <div class="col-lg-2">
                                           <select class="form-control speed2" name="speed">
                                                <option value="00"> 00 KM/ph</option>
                                                <option value="15"> 15 KM/ph</option>
                                                <option value="30"> 30 KM/ph</option>
                                                <option value="45"> 45 KM/ph</option>
                                                <option value="45"> 60 KM/ph</option>
                                           </select>
                                        </div>
                                        <label class="col-lg-1 control-label"></label>
                                        <div class="col-sm-2">
                                            <span class="btn btn-sm btn-primary enableOnInput overspeed_report" type="submit">Show Report</span>
                                            <input type='button' class="btn btn-sm btn-warning" value='Print Report' onclick='printDiv("example");'/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example2" style="width:100% !important;">
                                        <thead>
                                            <tr>
                                                <!-- <th>Sr No.</th> -->
                                                <th>Date</th>
                                                <th>Speed (kmph)</th>
                                                <th>Location</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight history_demo">
                <nav class="white-bg" role="navigation">
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav">
                            <li id="distance_click"><a><i class="fa fa-bar-chart" style="display:inline;font-size: initial;"></i> Distance Report</a></li>
                            <li id="stoppage_click"><a><i class="fa fa-stop" style="display: inline;font-size: initial;"></i> Stoppage Report </a></li>
                            <li id="overspeed_click"><a><i class="fa fa-stack-overflow" style="display:inline;font-size: initial;"></i> Overspeed Report</a></li>
                            <li id="history_click" class="active"><a><i class="fa fa-history" style="display:inline;font-size: initial;"></i> History Report</a></li>
                        </ul>
                    </div>
                </nav><br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3><b>History Report</b></h3>
                                    </div>
                                     <div class="col-sm-6">
                                        <div class="ibox-tools">
                                            <i class="fa fa-chevron-down" id="toggle_route"></i>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content division_details_hide">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-lg-2 col-lg-offset-3 control-label">Bus<span style="color:red;">*</span></label>
                                                <div class="col-lg-2">
                                                   <select class="form-control bus3" name="bus" >                            
                                                        <option>Select Bus</option>
                                                        <?php foreach ($bus as $key) { ?>
                                                            <option value="<?=$key['bus_device_id']?>"><?=$key['bus_no'];?></option>
                                                        <?php } ?>
                                                   </select>
                                                </div>
                                                <label class="col-lg-1 control-label">Dates<span style="color:red;">*</span></label>
                                                <div class="col-lg-2">
                                                   <input type="text" class="form-control from3 reportrange1" name="from-date" placeholder="Date" readonly>
                                                </div>
                                                <label class="col-lg-1 control-label"></label>
                                                <div class="col-sm-1">
                                                    <!-- <button class="btn btn-white" type="reset">Reset</button> -->
                                                    <span class="btn btn-sm btn-primary enableOnInput history_report" type="submit">Show Report</span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-2 history_map" hidden>
                                         <a href="<?=site_url('Reports/view_history_map')?>"><button class="btn btn-sm btn-info">History Map</button></a>
                                         <input type='button' class="btn btn-sm btn-warning" value='Print Report' onclick='printDiv("example");'/>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example3" style="width:100% !important;">
                                        <thead>
                                            <tr>
                                                <!-- <th>Sr No.</th> -->
                                                <th>Date</th>
                                                <th>GPS Quality</th>
                                                <th>GPS Valid Data</th>
                                                <th>GPS Signal Strength</th>
                                                <th>Location</th>
                                                <th>Power</th>
                                                <th>Speed</th>
                                                <th>Total Satellites</th>
                                                <th>Vehicle Movement</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>



                            <div class="ibox-content" id="example" hidden>
                                <div style="position: relative;">
                                    <table class="table" style="margin-bottom: 0px;">
                                        <thead>
                                            <tr><td style="padding: 0px;"><img src="<?php echo $school_report_header;?>" ></td></tr>
                                            <tr> 
                                                <td style="text-align: center;"><h3 id="title"> </h3></td> 
                                            </tr>
                                        </thead>
                                    </table><hr>
                                    <table class="table">
                                        <thead>
                                            <tr> 
                                                <td><h4>Vehicle Number : <span id="bus_number"></span></h4></td>
                                                <td><h4  style="float: right;">Report for Date :<span id="date_range"></span></h4></td> 
                                            </tr>
                                        </thead>
                                    </table>

                                    <table class="table table-striped table-bordered table-hover">
                                        <thead  id="example_data_head">
                                             
                                        </thead>
                                        <tbody id="example_data">
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr><td id="example_foot" style="padding: 0px;bottom:0px;"><img src="<?php echo $school_report_footer;?>" ></td></tr>
                                        </tfoot>
                                    </table>
                                   <!--  <table class="table page_foot" style="position: absolute;">
                                       <thead>
                                            <tr><td style="padding: 0px;bottom:0px;"><img src="<?php echo $school_report_footer;?>" ></td></tr>
                                        </thead>
                                    </table> -->
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
        </div> <script>
function printDiv(divName) {
       var printContents = document.getElementById(divName).innerHTML;     
       var originalContents = document.body.innerHTML;       
       document.body.innerHTML = printContents;      
       window.print();      
       document.body.innerHTML = originalContents;
   }
</script>

        