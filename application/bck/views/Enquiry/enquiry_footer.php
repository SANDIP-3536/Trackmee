<div class="footer">
    <div class="row">
        <div class="col-sm-4">
            <div class="pull-left">
                <strong>Copyright </strong><a href="http://www.syntech.co.in" target="_blank"> <img src="<?=base_url()?>assets/img/syntech_logo.png" style="height:13px;"></a><strong> &copy; 2017-2018 </strong>  
            </div>
        </div>
        <div class="col-sm-4">
            <center>
                <div>
                   <img src="<?php echo $school_logo; ?>" style="height:20px;width:20px;"> <strong style="color:#ffffff;"><?php echo $school_name; ?> </strong> 
                </div>
            </center>
        </div>
        <div class="pull-right">
            <i class="fa fa-phone-square" aria-hidden="true"></i><strong> 020-24269021 / 7030578612</strong> | <i class="fa fa-envelope" aria-hidden="true"></i> <strong>contactus@syntech.co.in </strong> 
        </div>
    </div>
</div>

    <!-- Mainly scripts -->
    <script src="<?=base_url()?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery-ui.min.js"></script>
    <!--<script src="<?=base_url();?>assets/js/bootstrap-datepicker.js"></script>-->
    <script src="<?= base_url();?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?=base_url();?>assets/js/plugins/select2/select2.full.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?=base_url()?>assets/js/inspinia.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/pace/pace.min.js"></script>

    <script src="<?=base_url()?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>
    
    <!-- clockpicker -->
     <script src="<?=base_url()?>assets/js/plugins/clockpicker/clockpicker.js"></script>
    
    <script src="<?= base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/validate/additional-methods.min.js"></script>
    

    <script>

        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            }
        });

        <?php if($employee = 'employee') {?>
            $('#enquiry').addClass('active');
            $('#student').addClass('active');
            document.title = "TrackMee | Enquiry"
        <?php } ?>

        $(document).ready(function(){

             <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
                swal({
                    title: "<?=$flash['title']?>",
                    text: "<?=$flash['text']?>",
                    type: "<?=$flash['type']?>"
                });
            <?php } ?>  
            
            var today = new Date();
            $('.datedatedatedatedatedate').datepicker({
                format: 'yyyy-mm-dd',
                autoclose:true,
                endDate: "today",
                maxDate: 0
            });

            $('.date').datepicker({
            format:"yyyy-mm-dd",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            startDate: "today",
            minDate: '0'
        });

        $(document).on('change','.LBD_admission_class',function(){
            $class_id = $(this).val();
            $('.LBD_enquiry_year.').empty();
            // alert(class_id);
            $.post('<?=site_url('Enquiry/LBD_admission_class_year')?>',{class_id:class_id},function(data){
                console.log(data);
                $.each(data,function(k,v){
                    $(".LBD_enquiry_year").append('<option value="'+v.AY_id+'">'+v.AY_name+'</option>');
                });
            },'json');
        });

        $(document).on('change','.vidya_admission_class',function(){
            $class_id = $(this).val();
            $('.vidya_enquiry_year.').empty();
            $.post('<?=site_url('Enquiry/vidya_admission_class_year')?>',{class_id:class_id},function(data){
                console.log(data);
                $.each(data,function(k,v){
                    $(".vidya_enquiry_year").append('<option value="'+v.AY_id+'">'+v.AY_name+'</option>');
                });
            },'json');
        });

        $(document).on('click','.enquiry_student_details',function(){
             $('.slider_down').empty();
             $('.slider_down').show();
             $('#enquiry_details_view_for').removeClass();
             $('#enquiry_details_view_for').addClass('col-sm-6');
            var enquiry_id = $(this).find('.enquiry_id').text();
            $('html,body').animate({ scrollTop: $(".slider_down").offset().top},'slow');
            // (".slider_down").show();
            // alert(enquiry_id);
            $.post('<?=site_url('Enquiry/enquiry_details_by_id')?>',{enquiry_id:enquiry_id},function(data){
                console.log(data);
                $.each(data,function(k,v){
                    $('.slider_down').append('<div class="col-md-6"><div class="ibox float-e-margins"><div class="enquiry_status">'+
                                '<div class="ibox-title"><div class="row"><div class="col-md-11">'+
                                    '<h2  style="text-align: left;color: #2b2fa2;font-weight: bold;">Student Enquiry Details</h2>'+
                                '</div><div class="col-md-1" style="text-align: right;">'+
                                    '<span class="btn btn-xs btn-success" id="cancel_student_enquiry"><i class="fa fa-times-circle"></i></span>'+
                                '</div></div>'+
                                '<div class="table-responsive"><table class="table table-striped table-bordered table-hover">'+
                                    '<thead>'+
                                        '<tr><th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Student Details</b></th></tr>'+
                                        '<tr><td><b>Form No</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_form_no+'</b></td>'+
                                            '<td><b>Enquiry Status</td><td colspan="2" style="color:Red;background-color: #ffffff;"><b>'+v.enquiry_status_details+'</td>'+
                                        '</tr>'+
                                        '<tr><td><b>Name</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_student_first_name+' &nbsp '+v.enquiry_student_middle_name+' &nbsp '+v.enquiry_student_last_name+'</b></td>'+
                                            '<td><b>Admission Class</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_admission_class+'</td>'+
                                        '</tr>'+
                                        '<tr><td><b>Birth Date</td><td style="background-color: #ffffff;"><b>'+v.enquiry_student_DOB+'</td>'+
                                            '<td><b>Gender</td><td style="background-color: #ffffff;"><b>'+v.enquiry_student_gender+'</td>'+
                                           ' <td><b>Phone No.</td><td style="background-color: #ffffff;"><b>'+v.enquiry_phone_number+'</td>'+
                                        '</tr>'+
                                        '<tr><td><b>Notes</b></td>'+
                                            '<td colspan="5" style="background-color: #ffffff;"><b>'+v.enquiry_expectations+'</b></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color: #d0d2ce;color:#000000;"><b>Address Details</b></th>'+
                                        '</tr>'+
                                        '<tr><td><b>House No./ Landmark</b>'+
                                            '</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_house_no+'</b></td>'+
                                            '<td><b>Town</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_town+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>Taluka</b>'+
                                            '</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_tal+'</b></td>'+
                                            '<td><b>District</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_dist+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>State</b>'+
                                            '</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_state+'</b></td>'+
                                            '<td><b>Pin code</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_pincode+'</b></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color: #d0d2ce;color:#000000;"><b>Father Details</b></th>'+
                                        '</tr>'+
                                        '<tr><td><b>Name</b></td>'+
                                            '<td colspan="5" style="background-color: #ffffff;"><b>'+v.enquiry_parent_first_name+' &nbsp '+v.enquiry_parent_middle_name+' &nbsp '+v.enquiry_parent_last_name+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>Mobile No.</td><td style="background-color: #ffffff;"><b>'+v.enquiry_parent_mobile_number+'</td>'+
                                            '<td><b>Email ID</td><td style="background-color: #ffffff;"><b>'+v.enquiry_parent_email_id+'</td>'+
                                            '<td><b>Occupation</td><td style="background-color: #ffffff;"><b>'+v.enquiry_parent_occupation+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Mother Details</b></th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><b>Name</b></td><td colspan="5" style="background-color: #ffffff;"><b>'+v.enquiry_mother_first_name+' &nbsp '+v.enquiry_mother_middle_name+' &nbsp'+v.enquiry_mother_last_name+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>Mobile No.</td><td style="background-color: #ffffff;"><b>'+v.enquiry_mother_mobile_number+'</td>'+
                                            '<td><b>Email ID</td><td style="background-color: #ffffff;"><b>'+v.enquiry_mother_email_id+'</td>'+
                                            '<td><b>Occupation</td><td style="background-color: #ffffff;"><b>'+v.enquiry_mother_occupation+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Previous School Details</b></th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><b>Name</b></td><td colspan="5" style="background-color: #ffffff;"><b>'+v.student_privious_school_name+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>School Duration</td><td style="background-color: #ffffff;"><b>'+v.student_privious_school_duration+'</td>'+
                                            '<td><b>Last Attend Class</td><td style="background-color: #ffffff;"><b>'+v.student_last_attend_class+'</td>'+
                                            '<td><b>Leaving Reason</td><td style="background-color: #ffffff;"><b>'+v.student_privious_school_left_reason+'</td>'+
                                        '</tr>'+
                                    '</thead></table></div></div></div>'+
                                '</div>');
                            });
                        },'json')
                    })

        $(document).on('click','#cancel_student_enquiry',function(){
            $(".slider_down").hide();
            $('#enquiry_details_view_for').removeClass();
            $('#enquiry_details_view_for').addClass('col-sm-12');
        });
        
        $('.status_of_enquiry').hide();
        $(document).on('click','.enquiry_student_EF_details',function(){
            var enquiry_id = $(this).find('.enquiry_id_form').text();
            var form_no = $(this).find('.enquiry_no_form').text();
            $('#enquiry_demo_details').removeClass();
            $('#enquiry_demo_details').addClass('col-sm-6');
            $('.status_of_enquiry').show();
            $('.reject_form').hide();
            $('.slider_down1').empty();
            $('.slider_down1').show();
            $('html,body').animate({ scrollTop: $(".make_appoinment_form").offset().top},'slow');

            $('#appoinment_Id_enquiry').val(enquiry_id);
            $('#reject_Id_enquiry').val(enquiry_id);
            $('#appoinment_form_no_enquiry').val(form_no);
            $('#appoinment_form_no_reject_enquiry').val(form_no);

            $.post('<?=site_url('Enquiry/enquiry_details_by_id')?>',{enquiry_id:enquiry_id},function(data){
                console.log(data);
                $.each(data,function(k,v){
                    $('.slider_down1').append('<div class="col-md-6"><div class="ibox float-e-margins"><div class="enquiry_status">'+
                                '<div class="ibox-title"><div class="row"><div class="col-md-11">'+
                                    '<h2  style="text-align: left;color: #2b2fa2;font-weight: bold;">Student Enquiry Details</h2>'+
                                '</div><div class="col-md-1" style="text-align: right;">'+
                                    '<span class="btn btn-xs btn-success" id="cancel_student_enquiry1"><i class="fa fa-times-circle"></i></span>'+
                                '</div></div>'+
                                '<div class="table-responsive"><table class="table table-striped table-bordered table-hover">'+
                                    '<thead>'+
                                        '<tr><th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Student Details</b></th></tr>'+
                                        '<tr><td><b>Form No</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_form_no+'</b></td>'+
                                            '<td><b>Enquiry Status</td><td colspan="2" style="color:Red;background-color: #ffffff;"><b>'+v.enquiry_status_details+'</td>'+
                                        '</tr>'+
                                        '<tr><td><b>Name</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_student_first_name+' &nbsp '+v.enquiry_student_middle_name+' &nbsp '+v.enquiry_student_last_name+'</b></td>'+
                                            '<td><b>Admission Class</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_admission_class+'</td>'+
                                        '</tr>'+
                                        '<tr><td><b>Birth Date</td><td style="background-color: #ffffff;"><b>'+v.enquiry_student_DOB+'</td>'+
                                            '<td><b>Gender</td><td style="background-color: #ffffff;"><b>'+v.enquiry_student_gender+'</td>'+
                                           ' <td><b>Phone No.</td><td style="background-color: #ffffff;"><b>'+v.enquiry_phone_number+'</td>'+
                                        '</tr>'+
                                        '<tr><td><b>Notes</b></td>'+
                                            '<td colspan="5" style="background-color: #ffffff;"><b>'+v.enquiry_expectations+'</b></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color: #d0d2ce;color:#000000;"><b>Address Details</b></th>'+
                                        '</tr>'+
                                        '<tr><td><b>House No./ Landmark</b>'+
                                            '</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_house_no+'</b></td>'+
                                            '<td><b>Town</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_town+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>Taluka</b>'+
                                            '</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_tal+'</b></td>'+
                                            '<td><b>District</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_dist+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>State</b>'+
                                            '</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_state+'</b></td>'+
                                            '<td><b>Pin code</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_pincode+'</b></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color: #d0d2ce;color:#000000;"><b>Father Details</b></th>'+
                                        '</tr>'+
                                        '<tr><td><b>Name</b></td>'+
                                            '<td colspan="5" style="background-color: #ffffff;"><b>'+v.enquiry_parent_first_name+' &nbsp '+v.enquiry_parent_middle_name+' &nbsp '+v.enquiry_parent_last_name+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>Mobile No.</td><td style="background-color: #ffffff;"><b>'+v.enquiry_parent_mobile_number+'</td>'+
                                            '<td><b>Email ID</td><td style="background-color: #ffffff;"><b>'+v.enquiry_parent_email_id+'</td>'+
                                            '<td><b>Occupation</td><td style="background-color: #ffffff;"><b>'+v.enquiry_parent_occupation+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Mother Details</b></th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><b>Name</b></td><td colspan="5" style="background-color: #ffffff;"><b>'+v.enquiry_mother_first_name+' &nbsp '+v.enquiry_mother_middle_name+' &nbsp'+v.enquiry_mother_last_name+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>Mobile No.</td><td style="background-color: #ffffff;"><b>'+v.enquiry_mother_mobile_number+'</td>'+
                                            '<td><b>Email ID</td><td style="background-color: #ffffff;"><b>'+v.enquiry_mother_email_id+'</td>'+
                                            '<td><b>Occupation</td><td style="background-color: #ffffff;"><b>'+v.enquiry_mother_occupation+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Previous School Details</b></th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><b>Name</b></td><td colspan="5" style="background-color: #ffffff;"><b>'+v.student_privious_school_name+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>School Duration</td><td style="background-color: #ffffff;"><b>'+v.student_privious_school_duration+'</td>'+
                                            '<td><b>Last Attend Class</td><td style="background-color: #ffffff;"><b>'+v.student_last_attend_class+'</td>'+
                                            '<td><b>Leaving Reason</td><td style="background-color: #ffffff;"><b>'+v.student_privious_school_left_reason+'</td>'+
                                        '</tr>'+
                                    '</thead></table></div></div></div>'+
                                '</div>');
                            });
                        },'json')
            
        });

        $(document).on('click','#cancel_student_enquiry1',function(){
            $(".slider_down1").hide();
            $('.status_of_enquiry').hide();
            $('.reject_form').hide();
            $('#enquiry_demo_details').removeClass();
            $('#enquiry_demo_details').addClass('col-sm-12');
        });

        $('.status_of_enquiry1').hide();
        $(document).on('click','.enquiry_student_status2_details',function(){
            var enquiry_id = $(this).find('.enquiry_id_form1').text();
            var form_no = $(this).find('.enquiry_no_form1').text();
            $('.status_of_enquiry1').show();
            $('.reject_form1').hide();
            $('.slider_down2').empty();
            $('.slider_down2').show();
            $('#appoint_fixed_demmo').removeClass();
            $('#appoint_fixed_demmo').addClass('col-sm-6');
            $('html,body').animate({ scrollTop: $(".make_meeting_review").offset().top},'slow');

            $('#meeting_Id_enquiry').val(enquiry_id);
            $('#meeting_reject_Id_enquiry').val(enquiry_id);
            $('#meeting_form_no_enquiry').val(form_no);
            $('#meeting_form_no_reject_enquiry').val(form_no);

            $.post('<?=site_url('Enquiry/enquiry_details_by_id')?>',{enquiry_id:enquiry_id},function(data){
                console.log(data);
                $.each(data,function(k,v){
                    $('.slider_down2').append('<div class="col-md-6"><div class="ibox float-e-margins"><div class="enquiry_status">'+
                                '<div class="ibox-title"><div class="row"><div class="col-md-11">'+
                                    '<h2  style="text-align: left;color: #2b2fa2;font-weight: bold;">Student Enquiry Details</h2>'+
                                '</div><div class="col-md-1" style="text-align: right;">'+
                                    '<span class="btn btn-xs btn-success" id="cancel_student_enquiry2"><i class="fa fa-times-circle"></i></span>'+
                                '</div></div>'+
                                '<div class="table-responsive"><table class="table table-striped table-bordered table-hover">'+
                                    '<thead>'+
                                        '<tr><th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Student Details</b></th></tr>'+
                                        '<tr><td><b>Form No</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_form_no+'</b></td>'+
                                            '<td><b>Enquiry Status</td><td colspan="2" style="color:Red;background-color: #ffffff;"><b>'+v.enquiry_status_details+'</td>'+
                                        '</tr>'+
                                        '<tr><td><b>Name</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_student_first_name+' &nbsp '+v.enquiry_student_middle_name+' &nbsp '+v.enquiry_student_last_name+'</b></td>'+
                                            '<td><b>Admission Class</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_admission_class+'</td>'+
                                        '</tr>'+
                                        '<tr><td><b>Birth Date</td><td style="background-color: #ffffff;"><b>'+v.enquiry_student_DOB+'</td>'+
                                            '<td><b>Gender</td><td style="background-color: #ffffff;"><b>'+v.enquiry_student_gender+'</td>'+
                                           ' <td><b>Phone No.</td><td style="background-color: #ffffff;"><b>'+v.enquiry_phone_number+'</td>'+
                                        '</tr>'+
                                        '<tr><td><b>Notes</b></td>'+
                                            '<td colspan="5" style="background-color: #ffffff;"><b>'+v.enquiry_expectations+'</b></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color: #d0d2ce;color:#000000;"><b>Address Details</b></th>'+
                                        '</tr>'+
                                        '<tr><td><b>House No./ Landmark</b>'+
                                            '</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_house_no+'</b></td>'+
                                            '<td><b>Town</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_town+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>Taluka</b>'+
                                            '</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_tal+'</b></td>'+
                                            '<td><b>District</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_dist+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>State</b>'+
                                            '</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_state+'</b></td>'+
                                            '<td><b>Pin code</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_pincode+'</b></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color: #d0d2ce;color:#000000;"><b>Father Details</b></th>'+
                                        '</tr>'+
                                        '<tr><td><b>Name</b></td>'+
                                            '<td colspan="5" style="background-color: #ffffff;"><b>'+v.enquiry_parent_first_name+' &nbsp '+v.enquiry_parent_middle_name+' &nbsp '+v.enquiry_parent_last_name+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>Mobile No.</td><td style="background-color: #ffffff;"><b>'+v.enquiry_parent_mobile_number+'</td>'+
                                            '<td><b>Email ID</td><td style="background-color: #ffffff;"><b>'+v.enquiry_parent_email_id+'</td>'+
                                            '<td><b>Occupation</td><td style="background-color: #ffffff;"><b>'+v.enquiry_parent_occupation+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Mother Details</b></th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><b>Name</b></td><td colspan="5" style="background-color: #ffffff;"><b>'+v.enquiry_mother_first_name+' &nbsp '+v.enquiry_mother_middle_name+' &nbsp'+v.enquiry_mother_last_name+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>Mobile No.</td><td style="background-color: #ffffff;"><b>'+v.enquiry_mother_mobile_number+'</td>'+
                                            '<td><b>Email ID</td><td style="background-color: #ffffff;"><b>'+v.enquiry_mother_email_id+'</td>'+
                                            '<td><b>Occupation</td><td style="background-color: #ffffff;"><b>'+v.enquiry_mother_occupation+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Previous School Details</b></th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><b>Name</b></td><td colspan="5" style="background-color: #ffffff;"><b>'+v.student_privious_school_name+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>School Duration</td><td style="background-color: #ffffff;"><b>'+v.student_privious_school_duration+'</td>'+
                                            '<td><b>Last Attend Class</td><td style="background-color: #ffffff;"><b>'+v.student_last_attend_class+'</td>'+
                                            '<td><b>Leaving Reason</td><td style="background-color: #ffffff;"><b>'+v.student_privious_school_left_reason+'</td>'+
                                        '</tr>'+
                                    '</thead></table></div></div></div>'+
                                '</div>');
                            });
                        },'json')
            
        });

        $(document).on('click','#cancel_student_enquiry2',function(){
            $(".slider_down2").hide();
            $('.status_of_enquiry1').hide();
            $('.reject_form1').hide();
            $('#appoint_fixed_demmo').removeClass();
            $('#appoint_fixed_demmo').addClass('col-sm-12');
        });

        $('.status_of_enquiry2').hide();
        $(document).on('click','.enquiry_student_status3_details',function(){
            var enquiry_id = $(this).find('.enquiry_id_form2').text();
            var form_no = $(this).find('.enquiry_no_form2').text();
            $('.status_of_enquiry2').show();
            $('.reject_form2').hide();
            $('.slider_down3').empty();
            $('.slider_down3').show();
             $('#meeting_review_demooo').removeClass();
            $('#meeting_review_demooo').addClass('col-sm-6');
            $('html,body').animate({ scrollTop: $(".make_pending_confirmation").offset().top},'slow');

            $('#PC_Id_enquiry').val(enquiry_id);
            $('#PC_reject_Id_enquiry').val(enquiry_id);
            $('#PC_form_no_enquiry').val(form_no);
            $('#PC_form_no_reject_enquiry').val(form_no);

            $.post('<?=site_url('Enquiry/enquiry_details_by_id')?>',{enquiry_id:enquiry_id},function(data){
                console.log(data);
                $.each(data,function(k,v){
                    $('.slider_down3').append('<div class="col-md-6"><div class="ibox float-e-margins"><div class="enquiry_status">'+
                                '<div class="ibox-title"><div class="row"><div class="col-md-11">'+
                                    '<h2  style="text-align: left;color: #2b2fa2;font-weight: bold;">Student Enquiry Details</h2>'+
                                '</div><div class="col-md-1" style="text-align: right;">'+
                                    '<span class="btn btn-xs btn-success" id="cancel_student_enquiry3"><i class="fa fa-times-circle"></i></span>'+
                                '</div></div>'+
                                '<div class="table-responsive"><table class="table table-striped table-bordered table-hover">'+
                                    '<thead>'+
                                        '<tr><th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Student Details</b></th></tr>'+
                                        '<tr><td><b>Form No</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_form_no+'</b></td>'+
                                            '<td><b>Enquiry Status</td><td colspan="2" style="color:Red;background-color: #ffffff;"><b>'+v.enquiry_status_details+'</td>'+
                                        '</tr>'+
                                        '<tr><td><b>Name</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_student_first_name+' &nbsp '+v.enquiry_student_middle_name+' &nbsp '+v.enquiry_student_last_name+'</b></td>'+
                                            '<td><b>Admission Class</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_admission_class+'</td>'+
                                        '</tr>'+
                                        '<tr><td><b>Birth Date</td><td style="background-color: #ffffff;"><b>'+v.enquiry_student_DOB+'</td>'+
                                            '<td><b>Gender</td><td style="background-color: #ffffff;"><b>'+v.enquiry_student_gender+'</td>'+
                                           ' <td><b>Phone No.</td><td style="background-color: #ffffff;"><b>'+v.enquiry_phone_number+'</td>'+
                                        '</tr>'+
                                        '<tr><td><b>Notes</b></td>'+
                                            '<td colspan="5" style="background-color: #ffffff;"><b>'+v.enquiry_expectations+'</b></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color: #d0d2ce;color:#000000;"><b>Address Details</b></th>'+
                                        '</tr>'+
                                        '<tr><td><b>House No./ Landmark</b>'+
                                            '</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_house_no+'</b></td>'+
                                            '<td><b>Town</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_town+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>Taluka</b>'+
                                            '</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_tal+'</b></td>'+
                                            '<td><b>District</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_dist+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>State</b>'+
                                            '</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_state+'</b></td>'+
                                            '<td><b>Pin code</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_pincode+'</b></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color: #d0d2ce;color:#000000;"><b>Father Details</b></th>'+
                                        '</tr>'+
                                        '<tr><td><b>Name</b></td>'+
                                            '<td colspan="5" style="background-color: #ffffff;"><b>'+v.enquiry_parent_first_name+' &nbsp '+v.enquiry_parent_middle_name+' &nbsp '+v.enquiry_parent_last_name+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>Mobile No.</td><td style="background-color: #ffffff;"><b>'+v.enquiry_parent_mobile_number+'</td>'+
                                            '<td><b>Email ID</td><td style="background-color: #ffffff;"><b>'+v.enquiry_parent_email_id+'</td>'+
                                            '<td><b>Occupation</td><td style="background-color: #ffffff;"><b>'+v.enquiry_parent_occupation+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Mother Details</b></th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><b>Name</b></td><td colspan="5" style="background-color: #ffffff;"><b>'+v.enquiry_mother_first_name+' &nbsp '+v.enquiry_mother_middle_name+' &nbsp'+v.enquiry_mother_last_name+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>Mobile No.</td><td style="background-color: #ffffff;"><b>'+v.enquiry_mother_mobile_number+'</td>'+
                                            '<td><b>Email ID</td><td style="background-color: #ffffff;"><b>'+v.enquiry_mother_email_id+'</td>'+
                                            '<td><b>Occupation</td><td style="background-color: #ffffff;"><b>'+v.enquiry_mother_occupation+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Previous School Details</b></th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><b>Name</b></td><td colspan="5" style="background-color: #ffffff;"><b>'+v.student_privious_school_name+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>School Duration</td><td style="background-color: #ffffff;"><b>'+v.student_privious_school_duration+'</td>'+
                                            '<td><b>Last Attend Class</td><td style="background-color: #ffffff;"><b>'+v.student_last_attend_class+'</td>'+
                                            '<td><b>Leaving Reason</td><td style="background-color: #ffffff;"><b>'+v.student_privious_school_left_reason+'</td>'+
                                        '</tr>'+
                                    '</thead></table></div></div></div>'+
                                '</div>');
                            });
                        },'json')
        });

        $(document).on('click','#cancel_student_enquiry3',function(){
            $(".slider_down3").hide();
            $('.status_of_enquiry2').hide();
            $('.reject_form2').hide();
            $('#meeting_review_demooo').removeClass();
            $('#meeting_review_demooo').addClass('col-sm-12');
        });

        $(document).on('click','.enquiry_student_status5_details',function(){
            var enquiry_id = $(this).find('.enquiry_id_6').text();
            $('.slider_down6').empty();
            $(".slider_down6").show();
            // var form_no = $(this).find('.enquiry_no_form2').text();
            $('#admitted_demoo').removeClass();
            $('#admitted_demoo').addClass('col-sm-6');
            // $('html,body').animate({ scrollTop: $(".make_pending_confirmation").offset().top},'slow');


            $.post('<?=site_url('Enquiry/enquiry_details_by_id')?>',{enquiry_id:enquiry_id},function(data){
                console.log(data);
                $.each(data,function(k,v){
                    $('.slider_down6').append('<div class="col-md-6"><div class="ibox float-e-margins"><div class="enquiry_status">'+
                                '<div class="ibox-title"><div class="row"><div class="col-md-11">'+
                                    '<h2  style="text-align: left;color: #2b2fa2;font-weight: bold;">Student Enquiry Details</h2>'+
                                '</div><div class="col-md-1" style="text-align: right;">'+
                                    '<span class="btn btn-xs btn-success" id="cancel_student_enquiry6"><i class="fa fa-times-circle"></i></span>'+
                                '</div></div>'+
                                '<div class="table-responsive"><table class="table table-striped table-bordered table-hover">'+
                                    '<thead>'+
                                        '<tr><th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Student Details</b></th></tr>'+
                                        '<tr><td><b>Form No</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_form_no+'</b></td>'+
                                            '<td><b>Enquiry Status</td><td colspan="2" style="color:Red;background-color: #ffffff;"><b>'+v.enquiry_status_details+'</td>'+
                                        '</tr>'+
                                        '<tr><td><b>Name</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_student_first_name+' &nbsp '+v.enquiry_student_middle_name+' &nbsp '+v.enquiry_student_last_name+'</b></td>'+
                                            '<td><b>Admission Class</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_admission_class+'</td>'+
                                        '</tr>'+
                                        '<tr><td><b>Birth Date</td><td style="background-color: #ffffff;"><b>'+v.enquiry_student_DOB+'</td>'+
                                            '<td><b>Gender</td><td style="background-color: #ffffff;"><b>'+v.enquiry_student_gender+'</td>'+
                                           ' <td><b>Phone No.</td><td style="background-color: #ffffff;"><b>'+v.enquiry_phone_number+'</td>'+
                                        '</tr>'+
                                        '<tr><td><b>Notes</b></td>'+
                                            '<td colspan="5" style="background-color: #ffffff;"><b>'+v.enquiry_expectations+'</b></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color: #d0d2ce;color:#000000;"><b>Address Details</b></th>'+
                                        '</tr>'+
                                        '<tr><td><b>House No./ Landmark</b>'+
                                            '</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_house_no+'</b></td>'+
                                            '<td><b>Town</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_town+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>Taluka</b>'+
                                            '</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_tal+'</b></td>'+
                                            '<td><b>District</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_dist+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>State</b>'+
                                            '</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_state+'</b></td>'+
                                            '<td><b>Pin code</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_pincode+'</b></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color: #d0d2ce;color:#000000;"><b>Father Details</b></th>'+
                                        '</tr>'+
                                        '<tr><td><b>Name</b></td>'+
                                            '<td colspan="5" style="background-color: #ffffff;"><b>'+v.enquiry_parent_first_name+' &nbsp '+v.enquiry_parent_middle_name+' &nbsp '+v.enquiry_parent_last_name+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>Mobile No.</td><td style="background-color: #ffffff;"><b>'+v.enquiry_parent_mobile_number+'</td>'+
                                            '<td><b>Email ID</td><td style="background-color: #ffffff;"><b>'+v.enquiry_parent_email_id+'</td>'+
                                            '<td><b>Occupation</td><td style="background-color: #ffffff;"><b>'+v.enquiry_parent_occupation+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Mother Details</b></th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><b>Name</b></td><td colspan="5" style="background-color: #ffffff;"><b>'+v.enquiry_mother_first_name+' &nbsp '+v.enquiry_mother_middle_name+' &nbsp'+v.enquiry_mother_last_name+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>Mobile No.</td><td style="background-color: #ffffff;"><b>'+v.enquiry_mother_mobile_number+'</td>'+
                                            '<td><b>Email ID</td><td style="background-color: #ffffff;"><b>'+v.enquiry_mother_email_id+'</td>'+
                                            '<td><b>Occupation</td><td style="background-color: #ffffff;"><b>'+v.enquiry_mother_occupation+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Previous School Details</b></th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><b>Name</b></td><td colspan="5" style="background-color: #ffffff;"><b>'+v.student_privious_school_name+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>School Duration</td><td style="background-color: #ffffff;"><b>'+v.student_privious_school_duration+'</td>'+
                                            '<td><b>Last Attend Class</td><td style="background-color: #ffffff;"><b>'+v.student_last_attend_class+'</td>'+
                                            '<td><b>Leaving Reason</td><td style="background-color: #ffffff;"><b>'+v.student_privious_school_left_reason+'</td>'+
                                        '</tr>'+
                                    '</thead></table></div></div></div>'+
                                '</div>');
                            });
                        },'json')
        });

        $(document).on('click','#cancel_student_enquiry6',function(){
            $(".slider_down6").hide();
            $('#admitted_demoo').removeClass();
            $('#admitted_demoo').addClass('col-sm-12');
        });


        $(document).on('click','.enquiry_student_status7_details',function(){
            var enquiry_id = $(this).find('.enquiry_id_7').text();
             $(".slider_down7").show();
             $('.slider_down7').empty();
            // var form_no = $(this).find('.enquiry_no_form2').text();
            $('#rejected_demoo').removeClass();
            $('#rejected_demoo').addClass('col-sm-6');
            // $('html,body').animate({ scrollTop: $(".make_pending_confirmation").offset().top},'slow');


            $.post('<?=site_url('Enquiry/enquiry_details_by_id')?>',{enquiry_id:enquiry_id},function(data){
                console.log(data);
                $.each(data,function(k,v){
                    $('.slider_down7').append('<div class="col-md-6"><div class="ibox float-e-margins"><div class="enquiry_status">'+
                                '<div class="ibox-title"><div class="row"><div class="col-md-11">'+
                                    '<h2  style="text-align: left;color: #2b2fa2;font-weight: bold;">Student Enquiry Details</h2>'+
                                '</div><div class="col-md-1" style="text-align: right;">'+
                                    '<span class="btn btn-xs btn-success" id="cancel_student_enquiry7"><i class="fa fa-times-circle"></i></span>'+
                                '</div></div>'+
                                '<div class="table-responsive"><table class="table table-striped table-bordered table-hover">'+
                                    '<thead>'+
                                        '<tr><th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Student Details</b></th></tr>'+
                                        '<tr><td><b>Form No</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_form_no+'</b></td>'+
                                            '<td><b>Enquiry Status</td><td colspan="2" style="color:Red;background-color: #ffffff;"><b>'+v.enquiry_status_details+'</td>'+
                                        '</tr>'+
                                        '<tr><td><b>Name</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_student_first_name+' &nbsp '+v.enquiry_student_middle_name+' &nbsp '+v.enquiry_student_last_name+'</b></td>'+
                                            '<td><b>Admission Class</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_admission_class+'</td>'+
                                        '</tr>'+
                                        '<tr><td><b>Birth Date</td><td style="background-color: #ffffff;"><b>'+v.enquiry_student_DOB+'</td>'+
                                            '<td><b>Gender</td><td style="background-color: #ffffff;"><b>'+v.enquiry_student_gender+'</td>'+
                                           ' <td><b>Phone No.</td><td style="background-color: #ffffff;"><b>'+v.enquiry_phone_number+'</td>'+
                                        '</tr>'+
                                        '<tr><td><b>Notes</b></td>'+
                                            '<td colspan="5" style="background-color: #ffffff;"><b>'+v.enquiry_expectations+'</b></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color: #d0d2ce;color:#000000;"><b>Address Details</b></th>'+
                                        '</tr>'+
                                        '<tr><td><b>House No./ Landmark</b>'+
                                            '</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_house_no+'</b></td>'+
                                            '<td><b>Town</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_town+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>Taluka</b>'+
                                            '</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_tal+'</b></td>'+
                                            '<td><b>District</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_dist+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>State</b>'+
                                            '</td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_state+'</b></td>'+
                                            '<td><b>Pin code</b></td><td colspan="2" style="background-color: #ffffff;"><b>'+v.enquiry_pincode+'</b></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color: #d0d2ce;color:#000000;"><b>Father Details</b></th>'+
                                        '</tr>'+
                                        '<tr><td><b>Name</b></td>'+
                                            '<td colspan="5" style="background-color: #ffffff;"><b>'+v.enquiry_parent_first_name+' &nbsp '+v.enquiry_parent_middle_name+' &nbsp '+v.enquiry_parent_last_name+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>Mobile No.</td><td style="background-color: #ffffff;"><b>'+v.enquiry_parent_mobile_number+'</td>'+
                                            '<td><b>Email ID</td><td style="background-color: #ffffff;"><b>'+v.enquiry_parent_email_id+'</td>'+
                                            '<td><b>Occupation</td><td style="background-color: #ffffff;"><b>'+v.enquiry_parent_occupation+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Mother Details</b></th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><b>Name</b></td><td colspan="5" style="background-color: #ffffff;"><b>'+v.enquiry_mother_first_name+' &nbsp '+v.enquiry_mother_middle_name+' &nbsp'+v.enquiry_mother_last_name+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>Mobile No.</td><td style="background-color: #ffffff;"><b>'+v.enquiry_mother_mobile_number+'</td>'+
                                            '<td><b>Email ID</td><td style="background-color: #ffffff;"><b>'+v.enquiry_mother_email_id+'</td>'+
                                            '<td><b>Occupation</td><td style="background-color: #ffffff;"><b>'+v.enquiry_mother_occupation+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<th colspan = "6"  style="background-color:#d0d2ce;color:#000000;"><b>Previous School Details</b></th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><b>Name</b></td><td colspan="5" style="background-color: #ffffff;"><b>'+v.student_privious_school_name+'</b></td>'+
                                        '</tr>'+
                                        '<tr><td><b>School Duration</td><td style="background-color: #ffffff;"><b>'+v.student_privious_school_duration+'</td>'+
                                            '<td><b>Last Attend Class</td><td style="background-color: #ffffff;"><b>'+v.student_last_attend_class+'</td>'+
                                            '<td><b>Leaving Reason</td><td style="background-color: #ffffff;"><b>'+v.student_privious_school_left_reason+'</td>'+
                                        '</tr>'+
                                    '</thead></table></div></div></div>'+
                                '</div>');
                            });
                        },'json')
        });

        $(document).on('click','#cancel_student_enquiry7',function(){
            $(".slider_down7").hide();
            $('#rejected_demoo').removeClass();
            $('#rejected_demoo').addClass('col-sm-12');
        });

           
        $('.enquiry_form_demo').hide();
        $('.appoinment_fixed_demo').hide();
        $('.meeting_review_demo').hide();
        $('.pending_conformation_demo').hide();
        $('.admitted_demo').hide();
        $('.rejected_demo').hide();
        $(document).on('click','#all_click',function(){
            $('.all_demo').show();
            $('.enquiry_form_demo').hide();
            $('.appoinment_fixed_demo').hide();
            $('.meeting_review_demo').hide();
            $('.pending_conformation_demo').hide();
            $('.admitted_demo').hide();
            $('.rejected_demo').hide();
        });
        $(document).on('click','#enquiry_form_click',function(){
            $('.all_demo').hide();
            $('.enquiry_form_demo').show();
            $('.appoinment_fixed_demo').hide();
            $('.meeting_review_demo').hide();
            $('.pending_conformation_demo').hide();
            $('.admitted_demo').hide();
            $('.rejected_demo').hide();
        });
        $(document).on('click','#appoinment_fixed_click',function(){
            $('.all_demo').hide();
            $('.enquiry_form_demo').hide();
            $('.appoinment_fixed_demo').show();
            $('.meeting_review_demo').hide();
            $('.pending_conformation_demo').hide();
            $('.admitted_demo').hide();
            $('.rejected_demo').hide();
        });
        $(document).on('click','#meeting_review_click',function(){
            $('.all_demo').hide();
            $('.enquiry_form_demo').hide();
            $('.appoinment_fixed_demo').hide();
            $('.meeting_review_demo').show();
            $('.pending_conformation_demo').hide();
            $('.admitted_demo').hide();
            $('.rejected_demo').hide();
        });
        $(document).on('click','#pending_conformation_click',function(){
            $('.all_demo').hide();
            $('.enquiry_form_demo').hide();
            $('.appoinment_fixed_demo').hide();
            $('.meeting_review_demo').hide();
            $('.pending_conformation_demo').show();
            $('.admitted_demo').hide();
            $('.rejected_demo').hide();
        });
        $(document).on('click','#admitted_click',function(){
            $('.all_demo').hide();
            $('.enquiry_form_demo').hide();
            $('.appoinment_fixed_demo').hide();
            $('.meeting_review_demo').hide();
            $('.pending_conformation_demo').hide();
            $('.admitted_demo').show();
            $('.rejected_demo').hide();
        });
        $(document).on('click','#rejected_click',function(){
            $('.all_demo').hide();
            $('.enquiry_form_demo').hide();
            $('.appoinment_fixed_demo').hide();
            $('.meeting_review_demo').hide();
            $('.pending_conformation_demo').hide();
            $('.admitted_demo').hide();
            $('.rejected_demo').show();
        });

        $('.reject_form').hide();
        $(document).on('click','.reject_form_entry',function(){
            $('.reject_form').show();
            $('.status_of_enquiry').hide();
        })
        $(document).on('click','.reject_cancel',function(){
            $('.reject_form').hide();
            $('.status_of_enquiry').show();
        })

        $('.reject_form1').hide();
        $(document).on('click','.reject_form_entry1',function(){
            $('.reject_form1').show();
            $('.status_of_enquiry1').hide();
        })
        $(document).on('click','.reject_cancel1',function(){
            $('.reject_form1').hide();
            $('.status_of_enquiry1').show();
        })

        $('.reject_form2').hide();
        $(document).on('click','.reject_form_entry2',function(){
            $('.reject_form2').show();
            $('.status_of_enquiry2').hide();
        })
        $(document).on('click','.reject_cancel2',function(){
            $('.reject_form2').hide();
            $('.status_of_enquiry2').show();
        })

        $("#appoinment_update").validate({
            rules: {
                enquiry_appointment_date:{
                    required:true
                }
            },
            messages: {

            }
        });

        $("#addEnquiry_AY").validate({
            rules: {
                school_future_AY_id:{
                    required:true,
                    min:1
                }
            },
            messages: {
                school_future_AY_id:{
                    min:"Please select the enquiry year."
                }

            }
        });

        $("#meeting_review_update").validate({
            rules: {
                enquiry_meeting_review:{
                    required:true
                }
            },
            messages: {

            }
        });

        $("#pending_confirmation_update").validate({
            rules: {
                enquiry_followup_msg:{
                    required:true
                },
                enquiry_followup_date:{
                    required:true
                }
            },
            messages: {

            }
        });

        $("#reject_update").validate({
            rules: {
                enquiry_rejected_reason:{
                    required:true
                }
            },
            messages: {

            }
        });
               
                $('.dataTables-example').DataTable({
                    pageLength: 10,
                    responsive: true,
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [    ],
                    "language": {
                        "emptyTable": "<img src='<?=base_url();?>assets/img/No-record-found.png'> "
                    }

                });

                $(".select2_demo_2").select2({
                    
                });
            });
        </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>