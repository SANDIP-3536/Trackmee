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
            <i class="fa fa-phone-square" aria-hidden="true"></i><strong> 020-24269021 / 7030578612</strong> | <i class="fa fa-envelope" aria-hidden="true"></i> <strong>contact@syntech.co.in </strong> 
        </div>
    </div>
</div>



    <!-- Mainly scripts -->
    <script src="<?=base_url()?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/fullcalendar/moment.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery-ui.min.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?=base_url();?>assets/js/plugins/select2/select2.full.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?=base_url()?>assets/js/inspinia.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/pace/pace.min.js"></script>

    <script src="<?=base_url()?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- clockpicker -->
    
    <script src="<?= base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/validate/additional-methods.min.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        });
    </script>
    <script>

        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            }
        });

        <?php if($fee == 'fee'){?>
            $('#fee').addClass('active');
            document.title = "TrackMee | Accounting"
        <?php }else if($fee == 'fee_type'){?>
            $('#config').addClass('active');
            document.title = "TrackMee | Accounting"
        <?php } ?>

         var today = new Date();
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            minDate: 0,
            autoclose:true
        }).on('changeDate', function (ev) {
            $(this).datepicker('hide');
        });

        $('.new_fee_waiver').hide();
        $(document).on('click','#new_fee_waiver',function(){
            $('.new_fee_waiver').show();
        });
        $(document).on('click','.close_data',function(){
            $('.new_fee_waiver').hide();
        });

        $('#pay_detail_cheque').hide();
        $('#pay_detail_card').hide();
        $('#pay_mode').change(function () {
            var mode = $(this).val();
            if (mode == '3') {
                $('#pay_detail_cheque').show();
                $('#pay_detail_card').hide();
                $('#bank1').rules("add", 
                        {
                    required: true,
                    pattern:/^[a-zA-Z\s]*$/
                });
                $('#chq').rules("add", 
                        {
                    required: true,
                    digits:true
                });
            } else if (mode == '2') {
                $('#pay_detail_cheque').hide();
                $('#pay_detail_card').show();
                $('#bank2').rules("add", 
                        {
                    required: true,
                    pattern:/^[a-zA-Z\s]*$/
                });
                $('#card').rules("add", 
                        {
                    required: true,
                    digits:true
                });
                
            } else {
                $('#pay_detail_cheque').hide();
                $('#pay_detail_card').hide();
            }
        });
            
        $(document).on('change','.class_details',function(){
            $('.division_details').empty();
            $('.student_details').empty().trigger('change');
            var class_id = $(this).val();
            $.post('<?=site_url('Fee/fetch_class_division')?>',{class_id:class_id},function(data){
                console.log(data);
                $('.division_details').html('<option value="0">Select Division</option>');
                $.each(data,function(k,v){
                    $('.division_details').append('<option value="'+v.division_id+'">'+v.division_name+'</option>');
                });
            },'json');
            $.post('<?=site_url('Fee/fetch_class_division_student')?>',{class_id:class_id},function(data){
                console.log(data);
                $('.student_details').html('<option value="0">Select Student</option>');
                $.each(data,function(k,v){
                    $('.student_details').append('<option value="'+v.student_profile_id+'">'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</option>');
                });
            },'json');
        });

         $(document).on('change','.class_details1',function(){
            $('.division_details1').empty();
            $('.student_details1').empty().trigger('change');
            $('.student_details_accor').empty();
            $('.total_payment_accoding_student').empty();
            $('.payment_history').empty();
            $('#fees_total_amount').val('');
            $('#student_profile_id').val('');
            $('#balance').val('');
            var class_id = $(this).val();
            $.post('<?=site_url('Fee/fetch_class_division')?>',{class_id:class_id},function(data){
                console.log(data);
                $('.division_details1').html('<option value="0">Select Division</option>');
                $.each(data,function(k,v){
                    $('.division_details1').append('<option value="'+v.division_id+'">'+v.division_name+'</option>');
                });
            },'json');

            $.post('<?=site_url('Fee/fetch_class_division_student')?>',{class_id:class_id},function(data){
                console.log(data);
                $('.student_details1').html('<option value="0">Select Student</option>');
                $.each(data,function(k,v){
                    $('.student_details1').append('<option value="'+v.student_profile_id+'">'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</option>');
                });
            },'json');
            
        });

        $(document).on('change','.division_details',function(){
            $('.student_details').empty().trigger('change');
            var division_id = $(this).val();
            var class_id = $('.class_details').val();
            $.post('<?=site_url('Fee/fetch_division_class_student')?>',{class_id:class_id,division_id:division_id},function(data){
                console.log(data);
                $('.student_details').html('<option value="0">Select Student</option>');
                $.each(data,function(k,v){
                    $('.student_details').append('<option value="'+v.student_profile_id+'">'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</option>');
                });
            },'json');
        });

        $(document).on('change','.division_details1',function(){
            $('.student_details1').empty().trigger('change');
            $('.student_details_accor').empty();
            $('.total_payment_accoding_student').empty();
            $('.payment_history').empty();
            $('#fees_total_amount').val('');
            $('#student_profile_id').val('');
            $('#balance').val('');
            var division_id = $(this).val();
            var class_id = $('.class_details1').val();
            $.post('<?=site_url('Fee/fetch_division_class_student')?>',{class_id:class_id,division_id:division_id},function(data){
                console.log(data);
                $('.student_details1').html('<option value="0">Select Student</option>');
                $.each(data,function(k,v){
                    $('.student_details1').append('<option value="'+v.student_profile_id+'">'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</option>');
                });
            },'json');
        }); 

        $(document).on('change','.student_details',function(){
            $('.student_details_accor').empty();
            var student_profile_id = $(this).val();
            var class_id = $('.class_details1').val();
            $.post('<?=site_url('Fee/fetch_student_payments')?>',{class_id:class_id,student_profile_id:student_profile_id},function(data){
                console.log(data);
                $.each(data,function(k,v){
                    $('.student_details_accor').append('<tr><td class="fee_type_id">'+v.total_fee_type_id+'</td><td class="fees_type_name">'+v.fees_type_name+'</td><td>INR. '+((v.total_fee_amount).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"))+'</td><td class="fee_waiver_name">'+v.fee_waiver_name+'</td><td class="fee_waiver_amount">INR. '+((v.fee_waiver_amount).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"))+'</td></tr>');
                });
            },'json');
        });

        $(document).on('change','.student_details1',function(){
            $('.student_details_accor').empty();
            $('.total_payment_accoding_student').empty();
            $('.payment_history').empty();
            $('#fee_status_detailssss').removeClass();
            $('#fee_status_detailssss').addClass('row');
            var emt = '';
            $('#fees_total_amount').val(emt);
            $('#student_profile_id').val(emt);
            $('#balance').val(emt);

            var student_profile_id = $(this).val();
            var class_id = $('.class_details1').val();
            $.post('<?=site_url('Fee/fetch_student_payments')?>',{class_id:class_id,student_profile_id:student_profile_id},function(data){
                console.log(data);
                $.each(data,function(k,v){
                    $('.student_details_accor').append('<tr><td class="fee_type_id">'+v.total_fee_type_id+'</td><td class="fees_type_name">'+v.fees_type_name+'</td><td class="fees_category_name">'+v.fee_category_name+'</td><td>INR. '+((v.total_fee_amount).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"))+'</td><td class="fee_waiver_name">'+v.fee_waiver_name+'</td><td class="fee_waiver_amount">INR. '+((v.fee_waiver_amount).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"))+'</td></tr>');
                });
            },'json');
            $.post('<?=site_url('Fee/fetch_student_total_payments')?>',{class_id:class_id,student_profile_id:student_profile_id},function(data){
                console.log(data);
                $.each(data,function(k,v){
                    $('.total_payment_accoding_student').append('<tr><th>Total Applicable Fee :</th><th></th><th>INR. '+((v.total_fee_amount).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"))+'</th><th id="total_fee_type_amount" hidden>'+v.total_fee_amount+'</th></tr><tr><th>Total Fee Waiver Amount:</th><th>(-)</th><th>INR. '+((v.fee_waiver_amount).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"))+'</th></tr>'+
                                                    '<tr><th>Total Fee Paid:</th><th>(-)</th><th>INR. '+((v.fee_amount).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"))+'</th></tr><tr style="background-color:#F5F5F6;"><th>Balance Payment</th><th></th><th>INR. '+((v.balance).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"))+'</th><th class="balance hidden">'+v.balance+'</th></tr>');
                });
            },'json');
        });

        $(document).on('click','.student_new_payment',function(){
            $('.payment_history').empty();
            var fee_type_amount = $('#total_fee_type_amount').text();
            var balance = $('.balance').text();
            var student_profile_id = $('.student_details1').val();
            $('#payment_history_details').removeClass();
            $('#payment_history_details').addClass('row');

            // alert(balance);
            
            $('html,body').animate({ scrollTop: $(".slider_down").offset().top},'slow');

            $('#fees_total_amount').val(fee_type_amount);
            $('#student_profile_id').val(student_profile_id);
            $('#balance').val(balance);

            $.post('<?=site_url('Fee/payment_history')?>',{student_profile_id:student_profile_id},function(data){
                console.log(data);
                 var i=0;
                $.each(data,function(k,v){
                    i = i+1;
                    $('.payment_history').append('<tr><td>'+i+'</td><td>'+v.fee_datetime+'</td><td>'+((v.fee_amount).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"))+'</td><td><a target="_blank"  href="<?=site_url("Fee/fee_payment_receipt/'+v.fee_id+'") ?>""><i class="fa fa-print"></i></a></td></tr>');
                });
            },'json');
        });

        $(document).on('change','.student_details',function(){
            $('.fees_types_details').empty();
            var student_id =  $(this).val();
            $.post('<?=site_url('Fee/fee_type_wise_student')?>',{student_id:student_id},function(data){
                console.log(data);
                $('.fees_types_details').append('<option value="0">Select Fee Type</option>')
                $.each(data,function(k,v){
                    $('.fees_types_details').append('<option value="'+v.total_fee_type_id+'">'+v.fees_type_name+'</option>');
                })
            },'json')
        });

        $(document).on('change','.fees_types_details',function(){
            $('.fee_type_waiver_amount').empty();
            $('.fee_type_waiver_amount1').empty();
            var type_id = $(this).val();
            var student_id = $('.student_details').val();
            $.post('<?=site_url('Fee/fee_type_amount_verification_for_fee_waiver')?>',{type_id:type_id,student_id:student_id},function(data){
                console.log(data);
                $.each(data,function(k,v){
                    $('.fee_type_waiver_amount').val(v.fee_amount);
                    $('.fee_type_waiver_amount1').val('INR. '+(v.fee_amount).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
                })
            },'json')
        });
        $(document).on('change','.class_fee_type_student_list',function(){
            $('.assign_fee_alredy_assign_student').empty();
            var class_id = $(this).val();
            var i = 1;
            if(class_id == '0'){
                $.post('<?=site_url('Fee/assign_fee_alredy_assign_all_student')?>',function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.assign_fee_alredy_assign_student').append('<tr><td>'+i+'</td><td>'+v.student_name+'</td><td><input type="checkbox" name="student_profile_id[]" value="'+v.student_profile_id+'"></td></tr>');
                        i = i+1;
                    })
                },'json')
            }else{
                $.post('<?=site_url('Fee/assign_fee_alredy_assign_student')?>',{class_id:class_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.assign_fee_alredy_assign_student').append('<tr><td>'+i+'</td><td>'+v.student_name+'</td><td><input type="checkbox" name="student_profile_id[]" value="'+v.student_profile_id+'"></td></tr>');
                        i = i+1;
                    })
                },'json')
            }
        });

        $(document).on('change','.fee_waiver_amount_details',function(){
            var remain = $('.fee_type_waiver_amount').val();
            var paid = $(this).val();
            var remain_amt=0;
            remain_amt = remain-paid;
            if(remain_amt<0){
                alert('Amount Exceeded...Please enter amount less than Fee Type Amount.');
                $(this).val('');
            }
        })

        $(document).on('change','#paidamt',function() {
            var remain = $('#balance').val();
            var paid = $(this).val();
            var remain_amt=0;
            remain_amt = remain-paid;
            if(remain_amt<0){
                alert('Amount Exceeded...Please enter amount less than remaining amount.');
                $(this).val('');
            }
        });

        $(document).on('change','.fees_type_period',function(){
            $('#fees_type_total_amount').val('');
            var period = $(this).val();
            if(period == 'Quaterly' || period == 'Monthly'){
                $('#total_period').removeClass();
                $('#total_period').addClass('form-group');
            }else if(period == 'Annual' || period == 'One Time'){
                $('#total_period').removeClass();
                $('#total_period').addClass('form-group hidden');
                var amount = $('#fees_type_amount').val();
                $('#fees_type_total_amount').val(amount);
            }else if(period == 'Half Yearly'){
                $('#total_period').removeClass();
                $('#total_period').addClass('form-group hidden');
                var amount = $('#fees_type_amount').val();
                var total = 2*amount;
                $('#fees_type_total_amount').val(total);
            }else{
                $('#total_period').removeClass();
                $('#total_period').addClass('form-group hidden');
            }
        })

        $(document).on('change','#fees_type_total_period',function(){
            $('#fees_type_total_amount').val('');
            var amount = $('#fees_type_amount').val();
            var period = $(this).val();
            var total = period*amount;
            $('#fees_type_total_amount').val(total);
        })

        $(document).ready(function(){
            <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
                swal({
                    title: "<?=$flash['title']?>",
                    text: "<?=$flash['text']?>",
                    type: "<?=$flash['type']?>"
                });
            <?php } ?> 

            $(".select2_demo").select2({
                placeholder: "Select a Student Name",
                allowClear: true,
            }); 

            $("#addNotification").validate({
                rules: {
                    fee_category_name:{
                        required:true,
                        pattern:/^[a-zA-Z\s]*$/
                    }
                },
                messages: {
                    fee_category_name:{
                        pattern:"Enter only characters."
                    }
                }
            });

            jQuery.validator.addMethod('selectcheck', function (value) {
                return (value != '0');
            }, "Select Fee Category");

            jQuery.validator.addMethod('selectcheckterm', function (value) {
                return (value != '0');
            }, "Select Fee Term/Name");

            jQuery.validator.addMethod('selectcheckperiod', function (value) {
                return (value != '0');
            }, "Select Fee Period");

            jQuery.validator.addMethod('selectchecktotalperiod', function (value) {
                return (value != '0');
            }, "Select Fee Structure");

            $("#addNotification1").validate({
                rules: {
                    fees_type_name: {
                       selectcheckterm:true      
                    },
                    fees_type_class_id: {
                        min: 0        
                    },
                    fees_type_fee_category_id: {
                        selectcheck:true        
                    },
                    fees_type_period: {
                        selectcheckperiod:true        
                    },
                    fees_type_total_period: {
                        selectchecktotalperiod:true        
                    },
                    fees_type_total_amount:{
                        required: true,
                        number:true
                    },
                    fees_type_amount: {
                        required: true,
                        number:true  
                    }
                },
                messages: {
                    fees_type_name:{
                        pattern:"Enter only characters."
                    }
                }
            });
            $("#addNotification2").validate({
                rules: {
                    fee_waiver_fee_type_class_id:{
                        min:1
                    },
                    fee_waiver_student_profile_id:{
                        min:1
                    },
                    fee_waiver_name:{
                        required:true,
                        pattern:/^[a-zA-Z\s]*$/
                    },
                    fee_waiver_amount:{
                        required:true,
                        number:true
                    },
                    fee_waiver_fee_type_id:{
                        min:1
                    }
                },
                messages: {
                    fee_waiver_fee_type_class_id:{
                        min:"Please Select Class."
                    },
                    fee_waiver_fee_type_division_id:{
                        min:"Please Select the Division."
                    },
                    fee_waiver_student_profile_id:{
                        min:"Please Select the Student."
                    },
                    fee_waiver_fee_type_id:{
                        min:"Please Select the Fee Type."
                    },
                    fee_waiver_name:{
                        pattern:"Enter only characters."
                    }
                }
            });

            $("#addNotification3").validate({
                rules: {
                    notifi_msg: {
                        required: true        
                    },
                    fee_amount: {
                        required: true        
                    },
                    fee_payment_mode:{
                        min:1
                    }
                },
                messages: {
                    fee_payment_mode:{
                        min:"Please Select Payment Mode."
                    }
                }
            });

            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                ordering:false,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [    ],
                "language": {
                    "emptyTable": "<img src='<?=base_url();?>assets/img/No-record-found.png'> "
                }

            });
        });
    </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>