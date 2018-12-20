<div class="footer">
    <div class="row">
        <div class="col-sm-4">
            <div class="pull-left">
                <strong>Copyright </strong><a href="http://www.syntech.co.in" target="_blank"> <img src="<?=base_url()?>assets/img/syntech_logo.png" style="height:13px;"></a><strong> &copy; 2017-2018 </strong>  
            </div>
        </div>
        <?php if(!empty($school_logo)){  ?>
        <div class="col-sm-4">
            <center>
                <div>
                   <img src="<?php if(!empty($school_logo)){echo $school_logo;} ?>" style="height:20px;width:20px;"> <strong style="color:#ffffff;"><?php if(!empty($school_name)){echo $school_name;} ?> </strong> 
                </div>
            </center>
        </div>
        <?php } ?>
        <div class="pull-right">
            <i class="fa fa-phone-square" aria-hidden="true"></i><strong> 020-24269021 / 7030578612</strong> | <i class="fa fa-envelope" aria-hidden="true"></i> <strong>contactus@syntech.co.in </strong> 
        </div>
    </div>
</div>



    <!-- Mainly scripts -->
    <!--<script src="<?=base_url()?>assets/js/jquery-2.1.1.js"></script>-->
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery-ui.min.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?=base_url();?>assets/js/plugins/select2/select2.full.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?=base_url()?>assets/js/inspinia.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="<?=base_url();?>assets/js/plugins/fullcalendar/moment.min.js"></script>

     <!-- Date range picker -->
    <script src="<?=base_url();?>assets/js/plugins/daterangepicker/daterangepicker.js"></script>

    <script src="<?=base_url()?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- clockpicker -->
     <script src="<?=base_url()?>assets/js/plugins/clockpicker/clockpicker.js"></script>
    
    <script src="<?= base_url();?>assets/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/validate/additional-methods.min.js"></script>
    <script>
        
        $('.loading').hide();
        $.validator.setDefaults({
            submitHandler: function (form) {    
                form.submit();
            }
        });

        <?php if($report == 'exam'){?>
             $('#exam').addClass('active');
             document.title = "TrackMee | Exam Reports"
        <?php } ?>

        
        $('#class_details').hide();
        $('#due_class_details').hide();
        $('#paid_class_details').hide();
        $('#category_class_details').hide();
        $('#waiver_class_details').hide();
        $('#division_details').hide();
        $('#due_division_details').hide();
        $('#paid_division_details').hide();
        $('#category_division_details').hide();
        $('#waiver_division_details').hide();
        $('#category_fee_type_details').hide();
        $('#waiver_fee_type_details').hide();
        $(document).on('change','#school_batch',function(){
            var school_atch = $(this).val();
            if(school_atch == 2){
                $('#class_details').show(700);
                $('#division_details').show(700);
            }else if(school_atch == 3){
                $('#class_details').show(700);
                $('#division_details').hide(700);
            }else{
                $('#class_details').hide(700);
                $('#division_details').hide(700);
            }
        });
        $(document).on('change','#due_school_batch',function(){
            var due_school_atch = $(this).val();
            if(due_school_atch == 2){
                $('#due_class_details').show(700);
                $('#due_division_details').show(700);
            }else if(due_school_atch == 3){
                $('#due_class_details').show(700);
                $('#due_division_details').hide(700);
            }else{
                $('#due_class_details').hide(700);
                $('#due_division_details').hide(700);
            }
        });
        $(document).on('change','#paid_school_batch',function(){
            var paid_school_atch = $(this).val();
            if(paid_school_atch == 2){
                $('#paid_class_details').show(700);
                $('#paid_division_details').show(700);
            }else if(paid_school_atch == 3){
                $('#paid_class_details').show(700);
                $('#paid_division_details').hide(700);
            }else{
                $('#paid_class_details').hide(700);
                $('#paid_division_details').hide(700);
            }
        });
        $(document).on('change','#category_school_batch',function(){
            var category_school_atch = $(this).val();
            if(category_school_atch == 2){
                $('#category_class_details').show(700);
                $('#category_division_details').show(700);
                $('#category_fee_type_details').hide(700);
            }else if(category_school_atch == 3){
                $('#category_class_details').show(700);
                $('#category_division_details').hide(700);
                $('#category_fee_type_details').show(700);
            }else{
                $('#category_class_details').hide(700);
                $('#category_division_details').hide(700);
                $('#category_fee_type_details').hide(700);
            }
        });
        $(document).on('change','#waiver_school_batch',function(){
            var waiver_school_atch = $(this).val();
            if(waiver_school_atch == 2){
                $('#waiver_class_details').show(700);
                $('#waiver_division_details').show(700);
                $('#waiver_fee_type_details').hide(700);
            }else if(waiver_school_atch == 3){
                $('#waiver_class_details').show(700);
                $('#waiver_division_details').hide(700);
                $('#waiver_fee_type_details').show(700);
            }else{
                $('#waiver_class_details').hide(700);
                $('#waiver_division_details').hide(700);
                $('#waiver_fee_type_details').hide(700);
            }
        });

        
        $(document).on('change','#student_class_report,#due_student_class_report,#paid_student_class_report,#category_student_class_report,#waiver_student_class_report',function(){
            $('.student_division_report,.due_student_division_report,.paid_student_division_report,.category_student_division_report,.waiver_student_division_report').empty();
            var class_id = $(this).val();
            $.post('<?=site_url('Reports/fetch_class_division')?>',{class_id:class_id},function(data){
                // console.log(data);
                $('.student_division_report,.due_student_division_report,.paid_student_division_report,.category_student_division_report,.waiver_student_division_report').append("<option value='0'>Select Division</option>");
                $.each(data,function(k,v){
                    $('.student_division_report,.due_student_division_report,.paid_student_division_report,.category_student_division_report,.waiver_student_division_report').append("<option value="+v.division_id+">"+v.division_name+"</option>")
                });
            },'json');
        });

        $(document).on('change','#category_student_class_report,#waiver_student_class_report',function(){
            $('.category_fee_type,.waiver_fee_type').empty();
            var class_id = $(this).val();
            $.post('<?=site_url('Reports/fetch_fee_types')?>',{class_id:class_id},function(data){
                // console.log(data);
                $('.category_fee_type,.waiver_fee_type').append("<option value='0'>Select Fee Type</option>");
                $.each(data,function(k,v){
                    $('.category_fee_type,.waiver_fee_type').append("<option value="+v.fees_type_id+">"+v.fees_type_name +"</option>")
                });
            },'json');
        });

        $(document).on('click','.show_total_fee_report',function(){
            var school_batch = $('.school_batch').val();
            if(school_batch == 1){
            	$.post('<?=site_url('Reports/school_total_fee_report')?>',function(data){
                    console.log(data);
                    total_fee_report.clear();
                    $.each(data,function(k,v){
                        total_fee_report.row.add(v);
                    });
                    total_fee_report.draw();
                },'json');
            }else if(school_batch == 3){
            	var class_id = $('.student_class_report').val();
            	$.post('<?=site_url('Reports/class_total_fee_report')?>',{class_id:class_id},function(data){
                    console.log(data);
                    total_fee_report.clear();
                    $.each(data,function(k,v){
                        total_fee_report.row.add(v);
                    });
                    total_fee_report.draw();
                },'json');
            }else{
            	var class_id = $('.student_class_report').val();
            	var division_id = $('.student_division_report').val();
            	$.post('<?=site_url('Reports/division_total_fee_report')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    total_fee_report.clear();
                    $.each(data,function(k,v){
                        total_fee_report.row.add(v);
                    });
                    total_fee_report.draw();
                },'json');
            }
                
        });

		$(document).on('click','.show_due_fee_report',function(){
            var school_batch = $('.due_school_batch').val();
            if(school_batch == 1){
            	$.post('<?=site_url('Reports/school_due_fee_report')?>',function(data){
                    console.log(data);
                    due_fee_report.clear();
                    $.each(data,function(k,v){
                        due_fee_report.row.add(v);
                    });
                    due_fee_report.draw();
                },'json');
            }else if(school_batch == 3){
            	var class_id = $('.due_student_class_report').val();
            	$.post('<?=site_url('Reports/class_due_fee_report')?>',{class_id:class_id},function(data){
                    console.log(data);
                    due_fee_report.clear();
                    $.each(data,function(k,v){
                        due_fee_report.row.add(v);
                    });
                    due_fee_report.draw();
                },'json');
            }else{
            	var class_id = $('.due_student_class_report').val();
            	var division_id = $('.due_student_division_report').val();
            	$.post('<?=site_url('Reports/division_due_fee_report')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    due_fee_report.clear();
                    $.each(data,function(k,v){
                        due_fee_report.row.add(v);
                    });
                    due_fee_report.draw();
                },'json');
            }
        });

        $(document).on('click','.show_paid_fee_report',function(){
            var school_batch = $('.paid_school_batch').val();
            if(school_batch == 1){
                $.post('<?=site_url('Reports/school_paid_fee_report')?>',function(data){
                    console.log(data);
                    paid_fee_report.clear();
                    $.each(data,function(k,v){
                        paid_fee_report.row.add(v);
                    });
                    paid_fee_report.draw();
                },'json');
            }else if(school_batch == 3){
                var class_id = $('.paid_student_class_report').val();
                $.post('<?=site_url('Reports/class_paid_fee_report')?>',{class_id:class_id},function(data){
                    console.log(data);
                    paid_fee_report.clear();
                    $.each(data,function(k,v){
                        paid_fee_report.row.add(v);
                    });
                    paid_fee_report.draw();
                },'json');
            }else{
                var class_id = $('.paid_student_class_report').val();
                var division_id = $('.paid_student_division_report').val();
                $.post('<?=site_url('Reports/division_paid_fee_report')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    paid_fee_report.clear();
                    $.each(data,function(k,v){
                        paid_fee_report.row.add(v);
                    });
                    paid_fee_report.draw();
                },'json');
            }
                
        });
        
        $(document).on('click','.show_category_fee_report',function(){
            var school_batch = $('.category_school_batch').val();
            if(school_batch == 1){
                $.post('<?=site_url('Reports/school_fee_category_report')?>',function(data){
                    console.log(data);
                    fee_category_report.clear();
                    $.each(data,function(k,v){
                        fee_category_report.row.add(v);
                    });
                    fee_category_report.draw();
                },'json');
            }else if(school_batch == 3){
                var class_id = $('.category_student_class_report').val();
                var fee_type = $('.category_fee_type').val();
                $.post('<?=site_url('Reports/class_fee_category_report')?>',{class_id:class_id,fee_type:fee_type},function(data){
                    console.log(data);
                    fee_category_report.clear();
                    $.each(data,function(k,v){
                        fee_category_report.row.add(v);
                    });
                    fee_category_report.draw();
                },'json');
            }else{
                var class_id = $('.category_student_class_report').val();
                var division_id = $('.category_student_division_report').val();
                $.post('<?=site_url('Reports/division_fee_category_report')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    fee_category_report.clear();
                    $.each(data,function(k,v){
                        fee_category_report.row.add(v);
                    });
                    fee_category_report.draw();
                },'json');
            }
                
        });

        $(document).on('click','.show_waiver_fee_report',function(){
            var school_batch = $('.waiver_school_batch').val();
            if(school_batch == 1){
                $.post('<?=site_url('Reports/school_fee_waiver_report')?>',function(data){
                    console.log(data);
                    fee_waiver_report.clear();
                    $.each(data,function(k,v){
                        fee_waiver_report.row.add(v);
                    });
                    fee_waiver_report.draw();
                },'json');
            }else if(school_batch == 3){
                var class_id = $('.waiver_student_class_report').val();
                var fee_type = $('.waiver_fee_type').val();
                $.post('<?=site_url('Reports/class_fee_waiver_report')?>',{class_id:class_id,fee_type:fee_type},function(data){
                    console.log(data);
                    fee_waiver_report.clear();
                    $.each(data,function(k,v){
                        fee_waiver_report.row.add(v);
                    });
                    fee_waiver_report.draw();
                },'json');
            }else{
                var class_id = $('.waiver_student_class_report').val();
                var division_id = $('.waiver_student_division_report').val();
                $.post('<?=site_url('Reports/division_fee_waiver_report')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    fee_waiver_report.clear();
                    $.each(data,function(k,v){
                        fee_waiver_report.row.add(v);
                    });
                    fee_waiver_report.draw();
                },'json');
            }
                
        });

        
        $("#total_fee_report_val").validate({
            rules: {
                school_batch:{
                    required:true,
                    min:1
                },
                student_class_report:{
                    required:true,
                    min:1
                },
                student_division_report:{
                    required:true,
                    min:1
                }
            },
            messages: {
                school_batch:{
                    min:"Please select school/batch."
                },
                student_class_report:{
                    min:"Please select class."
                },
                student_division_report:{
                    min:"Please select division."
                }
            }
        });

		$("#due_fee_Report").validate({
            rules: {
                due_school_batch:{
                    required:true,
                    min:1
                },
                due_student_class_report:{
                    required:true,
                    min:1
                },
                due_student_division_report:{
                    required:true,
                    min:1
                }
            },
            messages: {
                due_school_batch:{
                    min:"Please select school/batch."
                },
                due_student_class_report:{
                    min:"Please select class."
                },
                due_student_division_report:{
                    min:"Please select division."
                }
            }
        });

        $("#paid_fee_Report").validate({
            rules: {
                paid_school_batch:{
                    required:true,
                    min:1
                },
                paid_student_class_report:{
                    required:true,
                    min:1
                },
                paid_student_division_report:{
                    required:true,
                    min:1
                }
            },
            messages: {
                paid_school_batch:{
                    min:"Please select school/batch."
                },
                paid_student_class_report:{
                    min:"Please select class."
                },
                paid_student_division_report:{
                    min:"Please select division."
                }
            }
        });

        $("#category_fee_Report").validate({
            rules: {
                category_school_batch:{
                    required:true,
                    min:1
                },
                category_student_class_report:{
                    required:true,
                    min:1
                },
                category_student_division_report:{
                    required:true,
                    min:1
                }
            },
            messages: {
                category_school_batch:{
                    min:"Please select school/batch."
                },
                category_student_class_report:{
                    min:"Please select class."
                },
                category_student_division_report:{
                    min:"Please select division."
                }
            }
        });

        $("#waiver_fee_Report").validate({
            rules: {
                waiver_school_batch:{
                    required:true,
                    min:1
                },
                waiver_student_class_report:{
                    required:true,
                    min:1
                },
                waiver_student_division_report:{
                    required:true,
                    min:1
                }
            },
            messages: {
                waiver_school_batch:{
                    min:"Please select school/batch."
                },
                waiver_student_class_report:{
                    min:"Please select class."
                },
                waiver_student_division_report:{
                    min:"Please select division."
                }
            }
        });

        var total_fee_report = $('.dataTables-example').DataTable({
            "paging": true,
            "pageLength": 20,
            "searching": true,
            "ordering": true,
            "info": true,
            "dom": "Bfrtip",
            "data": [],
            "buttons": [
                {
                    "extend" : "excelHtml5",
                    "text" : "<i class='fa fa-file-excel-o'></i>",
                    "titleAttr" : "Excel",
                },
                {
                    "extend" : "pdfHtml5",
                    "text" : "<i class='fa fa-file-pdf-o'></i>",
                    "titleAttr" : "PDF",
                }
            ],
            "columns": [
            // {
            // 	"title":"Sr No.",
            // },
            {
                "title": "GRN No.",
                "data": "student_GRN",
            },
            {
                "title": "Student Name",
                "data": "student_name",
            },
            {
                "title": "Father Name",
                "data": "parent_name",
            },
            {
                "title": "Gender",
                "data": "student_gender"
            },
            {
                "title": "Mobile No.",
                "data": "parent_mobile_number"
            },
            {
                "title": "Class",
                "data": "class_name"
            },
            {
                "title": "Division",
                "data": "division_name"
            },
            {
                "title": "Total Fee Amount",
                "data": "total_fee_amount"
            },
            {
                "title": "Total Fee Waiver Amount",
                "data": "fee_waiver_amount"
            },
            {
                "title": "Paid Amount",
                "data": "fee_amount"
            },{
                "title": "Balance",
                "data": "balance"
            }],
            "language": {
                "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
            },

            // "order": [[ 1, 'asc' ]]

        });
	//auto incremment code in datatable with ajax
		// total_fee_report.on( 'order.dt search.dt', function () {
	 //        total_fee_report.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
	 //            cell.innerHTML = i+1;
	 //        } );
	 //    } ).draw();

	    var due_fee_report = $('.dataTables-example1').DataTable({
            "paging": true,
            "pageLength": 20,
            "searching": true,
            "ordering": true,
            "info": true,
            "dom": "Bfrtip",
            "data": [],
            "buttons": [
                {
                    "extend" : "excelHtml5",
                    "text" : "<i class='fa fa-file-excel-o'></i>",
                    "titleAttr" : "Excel",
                },
                {
                    "extend" : "pdfHtml5",
                    "text" : "<i class='fa fa-file-pdf-o'></i>",
                    "titleAttr" : "PDF",
                }
            ],
            "columns": [
            {
                "title": "GRN No.",
                "data": "student_GRN",
            },
            {
                "title": "Student Name",
                "data": "student_name",
            },
            {
                "title": "Father Name",
                "data": "parent_name",
            },
            {
                "title": "Gender",
                "data": "student_gender"
            },
            {
                "title": "Mobile No.",
                "data": "parent_mobile_number"
            },
            {
                "title": "Class",
                "data": "class_name"
            },
            {
                "title": "Division",
                "data": "division_name"
            },
            {
                "title": "Total Fee Amount",
                "data": "total_fee_amount"
            },
            {
                "title": "Total Fee Waiver Amount",
                "data": "fee_waiver_amount"
            },
            {
                "title": "Paid Amount",
                "data": "fee_amount"
            },{
                "title": "Balance",
                "data": "balance"
            }],
            "language": {
                "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
            },

        });

        var paid_fee_report = $('.dataTables-example_paid').DataTable({
            "paging": true,
            "pageLength": 20,
            "searching": true,
            "ordering": true,
            "info": true,
            "dom": "Bfrtip",
            "data": [],
            "buttons": [
                {
                    "extend" : "excelHtml5",
                    "text" : "<i class='fa fa-file-excel-o'></i>",
                    "titleAttr" : "Excel",
                },
                {
                    "extend" : "pdfHtml5",
                    "text" : "<i class='fa fa-file-pdf-o'></i>",
                    "titleAttr" : "PDF",
                }
            ],
            "columns": [
            {
                "title": "GRN No.",
                "data": "student_GRN",
            },
            {
                "title": "Student Name",
                "data": "student_name",
            },
            {
                "title": "Father Name",
                "data": "parent_name",
            },
            {
                "title": "Gender",
                "data": "student_gender"
            },
            {
                "title": "Mobile No.",
                "data": "parent_mobile_number"
            },
            {
                "title": "Class",
                "data": "class_name"
            },
            {
                "title": "Division",
                "data": "division_name"
            },
            {
                "title": "Total Fee Amount",
                "data": "total_fee_amount"
            },
            {
                "title": "Total Fee Waiver Amount",
                "data": "fee_waiver_amount"
            },
            {
                "title": "Paid Amount",
                "data": "fee_amount"
            }],
            "language": {
                "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
            },

        });

        var fee_category_report = $('.dataTables-example_category').DataTable({
            "paging": true,
            "pageLength": 20,
            "searching": true,
            "ordering": true,
            "info": true,
            "dom": "Bfrtip",
            "data": [],
            "buttons": [
                {
                    "extend" : "excelHtml5",
                    "text" : "<i class='fa fa-file-excel-o'></i>",
                    "titleAttr" : "Excel",
                },
                {
                    "extend" : "pdfHtml5",
                    "text" : "<i class='fa fa-file-pdf-o'></i>",
                    "titleAttr" : "PDF",
                }
            ],
            "columns": [
            {
                "title": "GRN No.",
                "data": "student_GRN",
            },
            {
                "title": "Student Name",
                "data": "student_name",
            },
            {
                "title": "Father Name",
                "data": "parent_name",
            },
            {
                "title": "Gender",
                "data": "student_gender"
            },
            {
                "title": "Mobile No.",
                "data": "parent_mobile_number"
            },
            {
                "title": "Class",
                "data": "class_name"
            },
            {
                "title": "Division",
                "data": "division_name"
            },
            {
                "title": "Fee Type name",
                "data": "fees_type_name"
            },
            {
                "title": "Fee Type Amount",
                "data": "total_fee_amount"
            }],
            "language": {
                "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
            },

        });

        var fee_waiver_report = $('.dataTables-example_waiver').DataTable({
            "paging": true,
            "pageLength": 20,
            "searching": true,
            "ordering": true,
            "info": true,
            "dom": "Bfrtip",
            "data": [],
            "buttons": [
                {
                    "extend" : "excelHtml5",
                    "text" : "<i class='fa fa-file-excel-o'></i>",
                    "titleAttr" : "Excel",
                },
                {
                    "extend" : "pdfHtml5",
                    "text" : "<i class='fa fa-file-pdf-o'></i>",
                    "titleAttr" : "PDF",
                }
            ],
            "columns": [
            {
                "title": "GRN No.",
                "data": "student_GRN",
            },
            {
                "title": "Student Name",
                "data": "student_name",
            },
            {
                "title": "Father Name",
                "data": "parent_name",
            },
            {
                "title": "Gender",
                "data": "student_gender"
            },
            {
                "title": "Mobile No.",
                "data": "parent_mobile_number"
            },
            {
                "title": "Class",
                "data": "class_name"
            },
            {
                "title": "Division",
                "data": "division_name"
            },
            {
                "title": "Fee Type name",
                "data": "fees_type_name"
            },
            {
                "title": "Fee Type Amount",
                "data": "fees_type_amount"
            },
            {
                "title":"Fee Waiver",
                "data":"fee_waiver_name"
            },
            {
                "title": "Fee Waiver Amount",
                "data": "fee_waiver_amount"
            }],
            "language": {
                "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
            },

        });
    </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>