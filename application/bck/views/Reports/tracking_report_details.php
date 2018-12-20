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

   @media print{
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

    }
</style>
        <div class="loading">
            <img id="loading-image" src="http://cdn.nirmaltv.com/images/generatorphp-thumb.gif" alt="Loading..." />
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Tracking Reports Detail</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="tabs-container">
                                <div class="tabs-left">
                                    <ul class="nav nav-tabs" style="width:15% !important;">
                                        <li class="active"><a data-toggle="tab" href="#distance_report"> Distance Report</a></li>
                                        <li class=""><a data-toggle="tab" href="#stoppage_report">Stoppage Report</a></li>
                                        <li class=""><a data-toggle="tab" href="#overspeed_report">Overspped Report</a></li>
                                        <li class=""><a data-toggle="tab" href="#history_report">History Report</a></li>
                                    </ul>
                                    <div class="tab-content ">
                                        <div id="distance_report" class="tab-pane active">
                                            <div class="panel-body" style="margin-left:15% !important; width:85%;">
                                                <div class="wrapper wrapper-content animated fadeInRight">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="ibox float-e-margins">
                                                                <div class="ibox-content">
                                                                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                                                        <div class="form-group">
                                                                            <div class="col-sm-3">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Bus</label> 
                                                                                        <select class="form-control bus" name="bus" >                            
                                                                                            <option>Select Bus</option>
                                                                                            <?php foreach ($bus as $key) { ?>
                                                                                                <option value="<?=$key['bus_device_id']?>"><?=$key['bus_no'];?></option>
                                                                                            <?php } ?>
                                                                                       </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="col-sm-3" id="class_details">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Dates</label> 
                                                                                        <input type="text" class="form-control from reportrange" name="from-date" placeholder="Date" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-sm-5 col-sm-offset-1">   
                                                                                <span class="btn btn-success fetch_distance_report">Show Report</span> 
                                                                                <input type='button' class="btn btn-warning" value='Print Report' onclick='printDiv("example");'/>
                                                                            </div>
                                                                        </div>  
                                                                    </form>
                                                                    <div class="hr-line-dashed"></div>
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped table-bordered table-hover dataTables-example">
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="stoppage_report" class="tab-pane">
                                            <div class="panel-body" style="margin-left:15% !important;width:85%;">
                                                <div class="wrapper wrapper-content animated fadeInRight">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="ibox float-e-margins">
                                                                <div class="ibox-content">
                                                                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                                                        <div class="form-group">
                                                                            <div class="col-sm-3">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Bus</label> 
                                                                                        <select class="form-control bus1" name="bus" >                            
                                                                                            <option>Select Bus</option>
                                                                                            <?php foreach ($bus as $key) { ?>
                                                                                                <option value="<?=$key['bus_device_id']?>"><?=$key['bus_no'];?></option>
                                                                                            <?php } ?>
                                                                                       </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="col-sm-3">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Dates</label> 
                                                                                        <input type="text" class="form-control from1 reportrange" name="from-date" placeholder="Date" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Stoppage[Min]</label> 
                                                                                        <select class="form-control min1" name="min">
                                                                                            <option value="00:00:00"> 00 min</option>
                                                                                            <option value="00:15:00"> 15 min</option>
                                                                                            <option value="00:30:00"> 30 min</option>
                                                                                            <option value="00:45:00"> 45 min</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-sm-5 col-sm-offset-1">   
                                                                                <span class="btn btn-primary enableOnInput stoppage_report" type="submit">Show Report</span>
                                                                                <input type='button' class="btn btn-warning" value='Print Report' onclick='printDiv("example");'/>
                                                                            </div>
                                                                        </div>  
                                                                    </form>
                                                                    <div class="hr-line-dashed"></div>
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped table-bordered table-hover dataTables-example1" style="width:100% !important">
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="overspeed_report" class="tab-pane">
                                            <div class="panel-body" style="margin-left:15% !important;width:85%;">
                                                <div class="wrapper wrapper-content animated fadeInRight">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="ibox float-e-margins">
                                                                <div class="ibox-content">
                                                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="paid_fee_Report">
                                                                        <div class="form-group">
                                                                            <div class="col-sm-3">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Bus</label> 
                                                                                        <select class="form-control bus2" name="bus" >                            
                                                                                            <option>Select Bus</option>
                                                                                            <?php foreach ($bus as $key) { ?>
                                                                                                <option value="<?=$key['bus_device_id']?>"><?=$key['bus_no'];?></option>
                                                                                            <?php } ?>
                                                                                       </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="col-sm-3" id="paid_class_details">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Date</label> 
                                                                                        <input type="text" class="form-control from2 reportrange" name="from-date" placeholder="<?php  echo date('Y/m/d')?> <?php echo " - " ?><?php echo date('Y/m/d')?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3" id="paid_division_details">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Speed[kmph]</label> 
                                                                                        <select class="form-control speed2" name="speed">
                                                                                            <option value="00"> 00 KM/ph</option>
                                                                                            <option value="15"> 15 KM/ph</option>
                                                                                            <option value="30"> 30 KM/ph</option>
                                                                                            <option value="45"> 45 KM/ph</option>
                                                                                            <option value="45"> 60 KM/ph</option>
                                                                                       </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-sm-5 col-sm-offset-1">   
                                                                                <span class="btn btn-primary enableOnInput overspeed_report" type="submit">Show Report</span>
                                                                                <input type='button' class="btn btn-warning" value='Print Report' onclick='printDiv("example");'/>
                                                                            </div>
                                                                        </div>  
                                                                    </form>
                                                                    <div class="hr-line-dashed"></div>
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped table-bordered table-hover dataTables-example2" style="width:100% !important;">
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="history_report" class="tab-pane">
                                            <div class="panel-body" style="margin-left:15% !important;width:85%;">
                                                <div class="wrapper wrapper-content animated fadeInRight">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="ibox float-e-margins">
                                                                <div class="ibox-content">
                                                                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                                                        <div class="form-group">
                                                                             <div class="col-sm-3">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Bush</label> 
                                                                                        <select class="form-control bus3" name="bus" >                            
                                                                                            <option>Select Bus</option>
                                                                                            <?php foreach ($bus as $key) { ?>
                                                                                                <option value="<?=$key['bus_device_id']?>"><?=$key['bus_no'];?></option>
                                                                                            <?php } ?>
                                                                                       </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="col-sm-3">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Date</label> 
                                                                                        <input type="text" class="form-control from3 reportrange" name="from-date" placeholder="Date" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-sm-5 col-sm-offset-1">   
                                                                                <span class="btn btn-sm btn-primary enableOnInput history_report" type="submit">Show Report</span>
                                                                            </div> 
                                                                            <div class="col-sm-5 col-sm-offset-1 history_map" hidden>   
                                                                                <a href="<?=site_url('Reports/view_history_map')?>"><button class="btn btn-info">History Map</button></a>
                                                                                <input type='button' class="btn btn-warning" value='Print Report' onclick='printDiv("example");'/>
                                                                            </div>
                                                                        </div>  
                                                                    </form>
                                                                    <div class="hr-line-dashed"></div>
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped table-bordered table-hover dataTables-example3" style="width:100% !important;">
                                                                        </table>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printDiv(divName) {
               var printContents = document.getElementById(divName).innerHTML;     
               var originalContents = document.body.innerHTML;       
               document.body.innerHTML = printContents;      
               window.print();      
               document.body.innerHTML = originalContents;
       }
    </script>