    <div class="footer">
    <div class="pull-right">
        <i class="fa fa-phone-square" aria-hidden="true"></i><strong> 020-24269021 / 7030578612</strong> | <i class="fa fa-envelope" aria-hidden="true"></i> <strong>contactus@syntech.co.in</strong> 
    </div>
    <div>
        <strong>Copyright </strong><a href="http://www.syntech.co.in" target="_blank"> <img src="<?=base_url()?>assets/img/syntech_logo.png" style="height:13px;"></a><strong> &copy; 2017-2018 </strong> 
    </div>
</div>



    <!-- Mainly scripts -->
    <script src="<?=base_url()?>assets/js/jquery-2.1.1.js"></script>
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
     <script src="<?=base_url()?>assets/js/plugins/clockpicker/clockpicker.js"></script>
    
    <script src="<?= base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/validate/additional-methods.min.js"></script>

    <script>


        <?php if($super_admin == 'dashboard') {?>
            $('#institute_header').addClass('active');
            document.title = "TrackMee | Dashboard"
        <?php } elseif($super_admin == 'institute') { ?>
            $('#institute').addClass('active');
            document.title = "TrackMee | Institute"
        <?php } elseif($super_admin == 'year') { ?>
            $('#AY').addClass('active');
            document.title = "TrackMee | Acadmic Year"
        <?php }elseif($super_admin == 'SMS') { ?>
            $('#SMS').addClass('active');
            document.title = "TrackMee | SMS Credits"
        <?php } ?> 

        function caps(element){
            element.value = element.value.toUpperCase();
        }

        function capitalize(textboxid, str) {
            if (str && str.length >= 1)
            {       
                var firstChar = str.charAt(0);
                var remainingStr = str.slice(1);
                str = firstChar.toUpperCase() + remainingStr.toLowerCase();
            }
            document.getElementById(textboxid).value = str;
        }
        
        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            }
        });

        $(document).ready(function(){

            <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
                swal({
                    title: "<?=$flash['title']?>",
                    text: "<?=$flash['text']?>",
                    type: "<?=$flash['type']?>"
                });
            <?php } ?>

            var today = new Date();
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose:true,
                yearRange:1970,
                endDate: "today",
                maxDate: today
            });

            // var d = new Date();
            // var year = d.getFullYear() - 18;
            // d.setFullYear(year);
            // $('#BirthDate').datepicker({ changeYear: true, changeMonth: true, yearRange: '1920:' + year + '', defaultDate: d});

            $(document).on('click','.list_view_details',function(){
                $('#grid_view').removeClass();
                $('#list_view').removeClass();
                // $('#employee_details').removeClass();
                $('#grid_view').addClass('wrapper wrapper-content animated fadeInRight');
                $('#list_view').addClass('wrapper wrapper-content animated fadeInRight hidden');
                // $('#employee_details').addClass('wrapper wrapper-content animated fadeInRight hidden');
            });

            $(document).on('click','.grid_view_details',function(){
                $('#grid_view').removeClass();
                $('#list_view').removeClass();
                // $('#employee_details').removeClass();
                $('#grid_view').addClass('wrapper wrapper-content animated fadeInRight hidden');
                $('#list_view').addClass('wrapper wrapper-content animated fadeInRight');
                // $('#employee_details').addClass('wrapper wrapper-content animated fadeInRight hidden');
            });

            $(document).on('click','.user_details',function(){
                $('#grid_view').removeClass();
                $('#list_view').removeClass();
                $('#employee_details').removeClass();
                $('#grid_view').addClass('wrapper wrapper-content animated fadeInRight hidden');
                $('#list_view').addClass('wrapper wrapper-content animated fadeInRight hidden');
                $('#employee_details').addClass('wrapper wrapper-content animated fadeInRight');
            }); 

            $(document).on('change','.mobile',function(){
                var num  = $(this).val();
                var profile = $('.institute_profile').val();
                $.post('<?=site_url('Institute/already_exits_mobile')?>',{num:num,profile:profile}, function(res){
                    // console.log(res);
                    if(res == 0){
                        $('.mobile_verification').hide();
                        $('.mobile_verification').text('');
                        $('.enableOnInput').prop('disabled', false);
                    }
                    else{
                        $('.mobile_verification').show();
                        $('.mobile_verification').text('Mobile No. already Registered.');
                        $('.enableOnInput').prop('disabled', true);
                    }
                },'json');
            });

            $('.year_verification').hide();
            $(document).on('change','.year',function(){
                var year  = $(this).val();
                var verify = year.split("-");
                var start_year_no = verify[0].slice(0,2);
                var verify_year = parseInt(verify[0]) + 1;
                var verify_end_year = start_year_no+verify[1];
                if(parseInt(verify_year) == parseInt(verify_end_year)){
                    $('.year_verification').hide();
                    $('.year_verification').text('');
                }else{
                    $('.year_verification').show();
                    $('.year_verification').text('Please Enter Correct Acadmic Duration. for eg.2017-18');
                }
                
            });

            $(document).on('change','.email_id',function(){
                var email  = $(this).val();
                var profile = $('.institute_profile').val();
                $.post('<?=site_url('Institute/already_exits_email')?>',{email:email,profile:profile}, function(res){
                    // console.log(data);
                    if(res == 0){
                        $('.email_verification').hide();
                        $('.email_verification').text('');
                        $('.enableOnInput').prop('disabled', false);
                    }
                    else{
                        $('.email_verification').show();
                        $('.email_verification').text('Email ID. already Registered.');
                        $('.enableOnInput').prop('disabled', true);
                    }
                },'json');
            });
            $('.update_functionality').hide();
            $(document).on('click','.edit_functionality',function(){
                $('.update_functionality').show();
                $('.functionality').hide();
                $('.edit_functionality').hide();
            });

            $(document).on('change','.logo',function(){
                var path = $(this).val();
                // <?php  ?>
                // var result = path.split("\");
                // alert(path);
            })
            
            $(document).on('click','#add_user',function(){
                $('.delete_user').toggle();
                $('#add_user').hide();
            });

            $(document).on('click','#delete_user',function(){
              
               $('.delete_user').toggle();
           });

            $('.profile_hide').hide();
            $('.close_edit_profile').hide();
            $(document).on('click','.edit_profile',function(){
                $('.profile_hide').show();
                $('.close_edit_profile').show();
                $('.edit_profile').hide();
            });
            $(document).on('click','.close_edit_profile',function(){
                $('.profile_hide').hide();
                $('.close_edit_profile').hide();
                $('.edit_profile').show();
            });
            
            $('.update').hide();
            $(document).on('click','.edit',function(){
              
               $('.update').show();
               $('.view').hide();
           });

            $("#addInstitute").validate({
                rules: {
                    institute_name:{
                        required:true
                    },
                    employee_first_name: {
                        required: true,
                        pattern: /^[a-zA-Z\s]*$/
                    },
                    employee_middle_name: {
                        pattern: /^[a-zA-Z\s]*$/
                    },
                    employee_last_name: {
                        required: true,
                        pattern: /^[a-zA-Z\s]*$/
                    },
                    employee_address:{
                        required:true
                    },
                    employee_DOB:{
                        required:true
                    },
                    AY_school_profile_id:{
                        required:true,
                        min:0
                    },
                   AY_name:{
                       required:true,
                       pattern:/^[0-9]{4}\-[0-9]{2}$/
                   },
                   AY_start_month:{
                        min:01
                   },
                   AY_end_month:{
                        min:01
                   },
                    employee_gender:{
                        required:true
                    },
                    institute_address:{
                        required:true
                    },
                    institute_mobile_number: {
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    employee_pri_mobile_number: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    employee_experiance:{
                        pattern:/^[a-zA-Z0-9\s\.]*$/
                    },
                    employee_higher_education:{
                        pattern:/^[a-zA-Z0-9\s\.]*$/
                    },
                    institute_email_id: {
                        pattern: /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
                        email: true
                    },
                    institute_phone_number: {
                        required: true,
                        digits: true,
                        minlength: 11,
                        maxlength: 11
                    },
                    employee_email_id: {
                        required:true,
                        pattern: /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
                        email: true
                    },
                    institute_sender_id:{
                        minlength:6,
                        maxlength:6
                    },
                    institute_signature:{
                        maxlength:13
                    },
                    institute_logo:{
                        required :true                  
                    },
                    sms_credit:{
                        required:true,
                        digits:true
                    },
                    password:{
                        required:true,
                    },
                    confirm_password:{
                        required:true,
                        equalTo:"#password"
                    }
                },
                messages: {
                    institute_name:{
                        required:"Please Enter Institute Or Corporate Name."
                    },
                    institute_logo:{
                        required:"Please Select Logo."
                    },
                    institute_email_id: {
                        required: "Please enter Email.",
                        pattern:"Please enter valid format of email.",
                        email: "Please enter Correct Email"
                    },
                    AY_name:{
                       pattern:"Please Follow pattern e.g 2017-18"
                    },
                    AY_start_month:{
                        min:"Please Select Start Month"
                    },
                    AY_end_month:{
                        min:"Please Select End Month"
                    },
                    AY_school_profile_id:{
                        min:"Please Select School.."
                    },
                    institute_phone_number: {
                        required: "Please enter phone number.",
                        digits: "Please enter 11 digit phone number.",
                        minlength: "Please enter 11 digit phone number.",
                        maxlength: "Please enter 11 digit phone number."
                    },
                    employee_photo:{
                        required:"Please Select Employee photo."
                    },
                    employee_first_name: {
                        required: "Please enter First name.",
                        pattern:"Please enter only alphabets"
                    },
                    employee_middle_name: {
                        required: "Please enter Middle name.",
                        pattern:"Please enter only alphabets"
                    },
                    employee_last_name: {
                        required: "Please enter Last name.",
                        pattern:"Please enter only alphabets"
                    },
                    employee_DOB:{
                        required:"Please Select Date Of Birth."
                    },
                    institute_address:{
                        required:"Please enter Institute Address."
                    },
                    institute_mobile_number: {
                        digits: "Please enter 10 digit mobile number.",
                        minlength: "Please enter 10 digit mobile number.",
                        maxlength: "Please enter 10 digit mobile number."
                    },
                    employee_pri_mobile_number: {
                        required: "Please enter  mobile number.",
                        digits: "Please enter 10 digit mobile number.",
                        minlength: "Please enter 10 digit mobile number.",
                        maxlength: "Please enter 10 digit mobile number."
                    },
                    employee_experiance:{
                        pattern:"Please enter valid Experience."
                    },
                    employee_higher_education:{
                        pattern:"Please enter valid Education."
                    },
                    employee_email_id: {
                        required: "Please enter Email.",
                        pattern:"Please enter valid format of email.",
                        email: "Please enter Correct Email"
                    },
                    sms_credit:{
                        digits:"Enter only digits."
                    }
                }
            });

            $("#forgotPassword").validate({
                rules: {
                    password:{
                        required:true,
                    },
                    confirm_password:{
                        required:true,
                        equalTo:"#password"
                    }
                },
                messages: {
            }
            });

            $("#addInstitute_logo").validate({
                rules: {
                    institute_logo:{
                        required:true,
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

            $(document).on('click','.details', function(){
                $('.info').toggle();
            })

            $(".select2_demo_2").select2({
                
            });
        });
    </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>