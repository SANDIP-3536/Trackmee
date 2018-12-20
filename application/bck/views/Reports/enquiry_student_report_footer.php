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

        <?php if($report == 'student'){?>
             $('#student').addClass('active');
        <?php } ?>

        $('#caste_wise').hide();
        $('#gender_wise').hide();
        $(document).on('change','#student_report_for',function(){
            var report_for = $(this).val();
            if(report_for == 1){
                $('#gender_wise').show(700);
                $('#caste_wise').hide(700);
            }
            else if(report_for == 2){
                $('#caste_wise').show(700);
                $('#gender_wise').hide(700);
            }
            else{
                $('#caste_wise').hide(700);
                $('#gender_wise').hide(700);
            }
        });

        $('#class_details').hide();
        $('#division_details').hide();
        $(document).on('change','#school_batch',function(){
            var school_atch = $(this).val();
            if(school_atch == 2){
                $('#class_details').show(700);
                $('#division_details').show(700);
            }
            else{
                $('#class_details').hide(700);
                $('#division_details').hide(700);
            }
        });

        $('#school_wise').hide();
        $('#admission_class_wise').hide();
        $(document).on('change','#enquiry_report_for',function(){
            var report_for = $(this).val();
            if(report_for == 1){
                $('#school_wise').show(700);
                $('#admission_class_wise').hide(700);
            }
            else if(report_for == 2){
                $('#admission_class_wise').show(700);
                $('#school_wise').hide(700);
            }
            else{
                $('#school_wise').hide(700);
                $('#admission_class_wise').hide(700);
            }
        });

        $('#division_wise').hide();
        $('#class_wise').hide();
        $(document).on('change','#class_division_report_for',function(){
            var report_for = $(this).val();
            if(report_for == 1){
                $('#class_wise').show(700);
                $('#division_wise').hide(700);
            }
            else if(report_for == 2){
                $('#division_wise').show(700);
                $('#class_wise').show(700);
            }
            else{
                $('#division_wise').hide(700);
                $('#class_wise').hide(700);
            }
        });

        $(document).on('change','#student_class_report,#class_report',function(){
            $('.student_division_report,.division_report').empty();
            var class_id = $(this).val();
            $.post('<?=site_url('Reports/fetch_class_division')?>',{class_id:class_id},function(data){
                // console.log(data);
                $('.student_division_report,.division_report').append("<option value='0'>Select Division</option>");
                $.each(data,function(k,v){
                    $('.student_division_report,.division_report').append("<option value="+v.division_id+">"+v.division_name+"</option>")
                });
            },'json');
        });

        $(document).on('click','.show_student_report',function(){
            var report_for = $('.student_report_for').val();
            var school_batch = $('.school_batch').val();
            var class_id = $('.student_class_report').val();
            var division_id = $('.student_division_report').val();
            if( report_for == 1){
                var gender_report = $('.student_gender_report').val();
                if(school_batch == 1){
                    $.post('<?=site_url('Reports/gender_school_report')?>',{gender:gender_report},function(data){
                        console.log(data);
                        myTable.clear();
                        $.each(data,function(k,v){
                            myTable.row.add(v);
                        });
                        myTable.draw();
                    },'json');
                }else{
                    $.post('<?=site_url('Reports/gender_batch_report')?>',{gender:gender_report,class_id:class_id,division_id:division_id},function(data){
                        console.log(data);
                        myTable.clear();
                        $.each(data,function(k,v){
                            myTable.row.add(v);
                        });
                        myTable.draw();
                    },'json');
                }
            }else{
                var caste_report = $('.student_cast_report').val();
                if(school_batch == 1){
                    $.post('<?=site_url('Reports/caste_school_report')?>',{caste:caste_report},function(data){
                        console.log(data);
                        myTable.clear();
                        $.each(data,function(k,v){
                            myTable.row.add(v);
                        });
                     myTable.draw();
                    },'json');
                }else{
                    $.post('<?=site_url('Reports/caste_batch_report')?>',{caste:caste_report,class_id:class_id,division_id:division_id},function(data){
                        console.log(data);
                        myTable.clear();
                        $.each(data,function(k,v){
                            myTable.row.add(v);
                        });
                        myTable.draw();
                    },'json');
                }
            }
        });

        $(document).on('click','.show_enquiry_report',function(){
            var report_for = $('.enquiry_report_for').val();
            if (report_for == 1) {
                var school_id = $('.enquiry_school_report').val();
                $.post('<?=site_url('Reports/school_enquiry_report')?>',{school_id:school_id},function(data){
                    console.log(data);
                    enquiry_report.clear();
                    $.each(data,function(k,v){
                        enquiry_report.row.add(v);
                    });
                    enquiry_report.draw();
                },'json');
            } else{
                var admission_class = $('.enquiry_admission_class_report').val();
                $.post('<?=site_url('Reports/enquiry_admission_class_report')?>',{admission_class:admission_class},function(data){
                    console.log(data);
                    enquiry_report.clear();
                    $.each(data,function(k,v){
                        enquiry_report.row.add(v);
                    });
                    enquiry_report.draw();
                },'json');
            };
        }) 

        $(document).on('click','.show_class_division_report',function(){
            var report_for = $('.class_division_report_for').val();
            if (report_for == 1) {
                var class_id = $('.class_report').val();
                $.post('<?=site_url('Reports/class_wise_report')?>',{class_id:class_id},function(data){
                    console.log(data);
                    class_division_report.clear();
                    $.each(data,function(k,v){
                        class_division_report.row.add(v);
                    });
                    class_division_report.draw();
                },'json');
            } else{
                var class_id = $('.class_report').val();
                var division_id = $('.division_report').val();
                $.post('<?=site_url('Reports/division_class_report')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    class_division_report.clear();
                    $.each(data,function(k,v){
                        class_division_report.row.add(v);
                    });
                    class_division_report.draw();
                },'json');
            };
        })

        
        $("#StudentReport").validate({
            rules: {
                student_report_for: {
                    required: true,
                    min:1
                },
                student_gender_report: {
                    required: true                 
                },
                student_cast_report: {
                    required:true                  
                },
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
                student_report_for: {
                    min:"Please select for report."
                },
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

        var myTable = $('.dataTables-example').DataTable({
            "paging": true,
            "pageLength": 10,
            "searching": false,
            "ordering": true,
            "info": true,
            "data": [],
            "columns": [
            {
                "title":"GRN Number",
                "data":"student_GRN"
            },
            {
                "title":"Adhar Card Number",
                "data":"student_adhar_card_number"
            },
            {
                "title": "First Name",
                "data": "student_first_name",
            },
            {
                "title": "Last Name",
                "data": "student_last_name",
            }, 
            {
                "title": "Date Of Birth",
                "data": "student_DOB"
            },
            {
                "title": "Gender",
                "data": "student_gender"
            },
            {
                "title": "Nationality",
                "data": "student_nationality"
            },
            {
                "title": "Category",
                "data": "student_category"
            },
            {
                "title": "Religion",
                "data": "student_religion"
            },
            {
                "title": "Cast",
                "data": "student_cast"
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
                "title": "Present Address",
                "data": "student_present_address"
            }],
            "language": {
                "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
            }

        });

        var enquiry_report = $('.dataTables-example1').DataTable({
            "paging": true,
            "pageLength": 10,
            "searching": false,
            "ordering": true,
            "info": true,
            "data": [],
            "columns": [
            {
                "title":"Form Number",
                "data":"enquiry_form_no"
            },
            {
                "title": "First Name",
                "data": "enquiry_student_first_name",
            },
            {
                "title": "Mother Name",
                "data": "enquiry_mother_first_name",
            },
            {
                "title": "Father Name",
                "data": "enquiry_parent_first_name",
            },
            {
                "title": "Last Name",
                "data": "enquiry_student_last_name",
            }, 
            {
                "title": "Date Of Birth",
                "data": "enquiry_student_DOB"
            },
            {
                "title": "Gender",
                "data": "enquiry_student_gender"
            },
            {
                "title": "Mobile No.",
                "data": "enquiry_parent_mobile_number"
            },
            {
                "title": "Admission Class",
                "data": "enquiry_admission_class"
            },
            {
                "title": "Appoinment Date",
                "data": "enquiry_appointment_date"
            },
            {
                "title": "Meeting Review",
                "data": "enquiry_meeting_review"
            },
            {
                "title": "Present Address",
                "data": "enquiry_residential_address"
            }],
            "language": {
                "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
            }

        });

        var class_division_report = $('.dataTables-example2').DataTable({
            "paging": true,
            "pageLength": 10,
            "searching": false,
            "ordering": true,
            "info": true,
            "data": [],
            "columns": [
            {
                "title":"GRN Number",
                "data":"student_GRN"
            },
            {
                "title":"Adhar Card Number",
                "data":"student_adhar_card_number"
            },
            {
                "title": "First Name",
                "data": "student_first_name",
            },
            {
                "title": "Last Name",
                "data": "student_last_name",
            }, 
            {
                "title": "Date Of Birth",
                "data": "student_DOB"
            },
            {
                "title": "Gender",
                "data": "student_gender"
            },
            {
                "title": "Class",
                "data": "class_name"
            },
            {
                "title": "Division",
                "data": "division_name",
                "defaultContent": "<i>N/A</i>"
            }],
            "language": {
                "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
            }

        });
    </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>