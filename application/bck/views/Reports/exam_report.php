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
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Exam Reports Detail</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="tabs-container">
                                <div class="tabs-left">
                                    <ul class="nav nav-tabs" style="width:15% !important;">
                                        <li class="active"><a data-toggle="tab" href="#total_fee_report"> Exam Report</a></li>
                                        <li class=""><a data-toggle="tab" href="#fee_due_report">Exam Report</a></li>
                                        <li class=""><a data-toggle="tab" href="#paid_fee_report">Exam Report</a></li>
                                        <!-- <li class=""><a data-toggle="tab" href="#fee_category_report">Fee Category Wise Report</a></li> -->
                                        <!-- <li class=""><a data-toggle="tab" href="#fee_waiver_report">Fee Waiver Report</a></li> -->
                                    </ul>
                                    <div class="tab-content ">
                                        <div id="total_fee_report" class="tab-pane active">
                                            <div class="panel-body" style="margin-left:15% !important; width:85%;">
                                                <div class="wrapper wrapper-content animated fadeInRight">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="ibox float-e-margins">
                                                                <div class="ibox-content">
                                                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="total_fee_report_val">
                                                                        <div class="form-group">
                                                                            <div class="col-sm-3">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp School / Batch</label> 
                                                                                        <select class="form-control school_batch" name="school_batch" style="border-radius:3px;" id="school_batch">
                                                                                            <option value="0">Please Select</option>
                                                                                            <option value="1">School Wise</option>
                                                                                            <option value="3">Class Wise</option>
                                                                                            <option value="2">Division Wise</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="col-sm-3" id="class_details">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Class</label> 
                                                                                        <select class="form-control student_class_report" name="student_class_report" style="border-radius:3px;" id="student_class_report">
                                                                                            <option value="0">Select Class Type</option>
                                                                                            <?php foreach ($class as $key) {?>
                                                                                                <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3" id="division_details">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Division</label> 
                                                                                        <select class="form-control student_division_report" name="student_division_report" style="border-radius:3px;" id="student_division_report">
                                                                                            <!-- <option value="0">Select Class Type</option>
                                                                                            <option value="1">A</option>
                                                                                            <option value="2">B</option> -->
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-sm-5 col-sm-offset-1">   
                                                                                <span class="btn btn-success show_total_fee_report">Show Report</span>
                                                                            </div>
                                                                            <!-- <div class="col-sm-5" style="text-align:right;">   
                                                                                <span class="btn btn-primary">Print Report</span>
                                                                            </div> -->
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
                                        <div id="fee_due_report" class="tab-pane">
                                            <div class="panel-body" style="margin-left:15% !important;width:85%;">
                                                <div class="wrapper wrapper-content animated fadeInRight">
                                                    <div class="row">
                                                        <!-- <div class="ibox-title">
                                                            <div class="col-sm-6">
                                                                <h3><b>Fee Due Report</b></h3>
                                                            </div>
                                                        </div> -->
                                                        <div class="col-lg-12">
                                                            <div class="ibox float-e-margins">
                                                                <div class="ibox-content">
                                                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="due_fee_Report">
                                                                        <div class="form-group">
                                                                            <div class="col-sm-3">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp School / Batch</label> 
                                                                                        <select class="form-control due_school_batch" name="due_school_batch" style="border-radius:3px;" id="due_school_batch">
                                                                                            <option value="0">Please Select</option>
                                                                                            <option value="1">School Wise</option>
                                                                                            <option value="3">Class Wise</option>
                                                                                            <option value="2">Division Wise</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="col-sm-3" id="due_class_details">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Class</label> 
                                                                                        <select class="form-control due_student_class_report" name="due_student_class_report" style="border-radius:3px;" id="due_student_class_report">
                                                                                            <option value="0">Select Class Type</option>
                                                                                            <?php foreach ($class as $key) {?>
                                                                                                <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3" id="due_division_details">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Division</label> 
                                                                                        <select class="form-control due_student_division_report" name="due_student_division_report" style="border-radius:3px;" id="due_student_division_report">
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-sm-5 col-sm-offset-1">   
                                                                                <span class="btn btn-success show_due_fee_report">Show Report</span>
                                                                            </div>
                                                                            <!-- <div class="col-sm-5" style="text-align:right;">   
                                                                                <span class="btn btn-primary">Print Report</span>
                                                                            </div> -->
                                                                        </div>  
                                                                    </form>
                                                                    <div class="hr-line-dashed"></div>
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped table-bordered table-hover dataTables-example1">
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="paid_fee_report" class="tab-pane">
                                            <div class="panel-body" style="margin-left:15% !important;width:85%;">
                                                <div class="wrapper wrapper-content animated fadeInRight">
                                                    <div class="row">
                                                        <!-- <div class="ibox-title">
                                                            <div class="col-sm-6">
                                                                <h3><b>Fee Due Report</b></h3>
                                                            </div>
                                                        </div> -->
                                                        <div class="col-lg-12">
                                                            <div class="ibox float-e-margins">
                                                                <div class="ibox-content">
                                                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="paid_fee_Report">
                                                                        <div class="form-group">
                                                                            <div class="col-sm-3">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp School / Batch</label> 
                                                                                        <select class="form-control paid_school_batch" name="paid_school_batch" style="border-radius:3px;" id="paid_school_batch">
                                                                                            <option value="0">Please Select</option>
                                                                                            <option value="1">School Wise</option>
                                                                                            <option value="3">Class Wise</option>
                                                                                            <option value="2">Division Wise</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="col-sm-3" id="paid_class_details">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Class</label> 
                                                                                        <select class="form-control paid_student_class_report" name="paid_student_class_report" style="border-radius:3px;" id="paid_student_class_report">
                                                                                            <option value="0">Select Class Type</option>
                                                                                            <?php foreach ($class as $key) {?>
                                                                                                <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3" id="paid_division_details">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Division</label> 
                                                                                        <select class="form-control paid_student_division_report" name="paid_student_division_report" style="border-radius:3px;" id="paid_student_division_report">
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-sm-5 col-sm-offset-1">   
                                                                                <span class="btn btn-success show_paid_fee_report">Show Report</span>
                                                                            </div>
                                                                            <!-- <div class="col-sm-5" style="text-align:right;">   
                                                                                <span class="btn btn-primary">Print Report</span>
                                                                            </div> -->
                                                                        </div>  
                                                                    </form>
                                                                    <div class="hr-line-dashed"></div>
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped table-bordered table-hover dataTables-example_paid">
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="fee_category_report" class="tab-pane">
                                            <div class="panel-body" style="margin-left:15% !important;width:85%;">
                                                <div class="wrapper wrapper-content animated fadeInRight">
                                                    <div class="row">
                                                        <!-- <div class="ibox-title">
                                                            <div class="col-sm-6">
                                                                <h3><b>Fee Due Report</b></h3>
                                                            </div>
                                                        </div> -->
                                                        <div class="col-lg-12">
                                                            <div class="ibox float-e-margins">
                                                                <div class="ibox-content">
                                                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="category_fee_Report">
                                                                        <div class="form-group">
                                                                            <div class="col-sm-3">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp School / Batch</label> 
                                                                                        <select class="form-control category_school_batch" name="category_school_batch" style="border-radius:3px;" id="category_school_batch">
                                                                                            <option value="0">Please Select</option>
                                                                                            <option value="1">School Wise</option>
                                                                                            <option value="3">Class Wise</option>
                                                                                            <option value="2">Division Wise</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="col-sm-3" id="category_class_details">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Class</label> 
                                                                                        <select class="form-control category_student_class_report" name="category_student_class_report" style="border-radius:3px;" id="category_student_class_report">
                                                                                            <option value="0">Select Class Type</option>
                                                                                            <?php foreach ($class as $key) {?>
                                                                                                <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3" id="category_fee_type_details">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Fee Types</label> 
                                                                                        <select class="form-control category_fee_type" name="category_fee_type" style="border-radius:3px;" id="category_fee_type">
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3" id="category_division_details">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Division</label> 
                                                                                        <select class="form-control category_student_division_report" name="category_student_division_report" style="border-radius:3px;" id="category_student_division_report">
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-sm-5 col-sm-offset-1">   
                                                                                <span class="btn btn-success show_category_fee_report">Show Report</span>
                                                                            </div>
                                                                            <!-- <div class="col-sm-5" style="text-align:right;">   
                                                                                <span class="btn btn-primary">Print Report</span>
                                                                            </div> -->
                                                                        </div>  
                                                                    </form>
                                                                    <div class="hr-line-dashed"></div>
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped table-bordered table-hover dataTables-example_category" style="width:100%;">
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="fee_waiver_report" class="tab-pane">
                                            <div class="panel-body" style="margin-left:15% !important;width:85%;">
                                                <div class="wrapper wrapper-content animated fadeInRight">
                                                    <div class="row">
                                                        <!-- <div class="ibox-title">
                                                            <div class="col-sm-6">
                                                                <h3><b>Fee Due Report</b></h3>
                                                            </div>
                                                        </div> -->
                                                        <div class="col-lg-12">
                                                            <div class="ibox float-e-margins">
                                                                <div class="ibox-content">
                                                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="waiver_fee_Report">
                                                                        <div class="form-group">
                                                                            <div class="col-sm-3">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp School / Batch</label> 
                                                                                        <select class="form-control waiver_school_batch" name="waiver_school_batch" style="border-radius:3px;" id="waiver_school_batch">
                                                                                            <option value="0">Please Select</option>
                                                                                            <option value="1">School Wise</option>
                                                                                            <option value="3">Class Wise</option>
                                                                                            <option value="2">Division Wise</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="col-sm-3" id="waiver_class_details">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Class</label> 
                                                                                        <select class="form-control waiver_student_class_report" name="waiver_student_class_report" style="border-radius:3px;" id="waiver_student_class_report">
                                                                                            <option value="0">Select Class Type</option>
                                                                                            <?php foreach ($class as $key) {?>
                                                                                                <option value="<?=$key['class_id']?>"><?=$key['class_name']?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3" id="waiver_fee_type_details">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Fee Types</label> 
                                                                                        <select class="form-control waiver_fee_type" name="waiver_fee_type" style="border-radius:3px;" id="waiver_fee_type">
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3" id="waiver_division_details">
                                                                                <div class="col-sm-10">   
                                                                                    <div class="form-group">
                                                                                        <label class="control-label" style="padding-bottom:2%">&nbsp Division</label> 
                                                                                        <select class="form-control waiver_student_division_report" name="waiver_student_division_report" style="border-radius:3px;" id="waiver_student_division_report">
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-sm-5 col-sm-offset-1">   
                                                                                <span class="btn btn-success show_waiver_fee_report">Show Report</span>
                                                                            </div>
                                                                            <!-- <div class="col-sm-5" style="text-align:right;">   
                                                                                <span class="btn btn-primary">Print Report</span>
                                                                            </div> -->
                                                                        </div>  
                                                                    </form>
                                                                    <div class="hr-line-dashed"></div>
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped table-bordered table-hover dataTables-example_waiver" style="width:100%;">
                                                                        </table>
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