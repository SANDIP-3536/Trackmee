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
                   <img src="<?php echo $institute_logo; ?>" style="height:20px;width:20px;"> <strong style="color:#ffffff;"><?php echo $institute_name; ?> </strong> 
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

    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });

    function capitalize(textboxid, str) {
        if (str && str.length >= 1)
        {       
            var firstChar = str.charAt(0);
            var remainingStr = str.slice(1);
            str = firstChar.toUpperCase() + remainingStr.toLowerCase();
        }
        document.getElementById(textboxid).value = str;
    }


    <?php if($insti_admin == 'dashboard') {?>
        $('#school_header').addClass('active');
        document.title = "TrackMee | Institude Admin"
    <?php } elseif($insti_admin == 'school') {?>
        $('#school').addClass('active');
         document.title = "TrackMee | School Details"
    <?php } ?>

            $(document).ready(function(){
                <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
                    swal({
                        title: "<?=$flash['title']?>",
                        text: "<?=$flash['text']?>",
                        type: "<?=$flash['type']?>"
                    });
                    <?php } ?>

                    // $('#page-wrapper').css('background', 'black');

                    var today = new Date();
                    $('.datepicker').datepicker({
                        format: 'yyyy-mm-dd',
                        autoclose:true,
                        endDate: "today",
                        maxDate: today
                    }).on('changeDate', function (ev) {
                        $(this).datepicker('hide');
                    });


                    $('.datepicker').keyup(function () {
                        if (this.value.match(/[^0-9]/g)) {
                            this.value = this.value.replace(/[^0-9^-]/g, '');
                        }
                    });

                    $(document).on('click','.list_view_details',function(){
                        $('#grid_view').removeClass();
                        $('#list_view').removeClass();
                        $('#employee_details').removeClass();
                        $('#grid_view').addClass('wrapper wrapper-content animated fadeInRight');
                        $('#list_view').addClass('wrapper wrapper-content animated fadeInRight hidden');
                        $('#employee_details').addClass('wrapper wrapper-content animated fadeInRight hidden');
                    });

                    $(document).on('click','.grid_view_details',function(){
                        $('#grid_view').removeClass();
                        $('#list_view').removeClass();
                        $('#employee_details').removeClass();
                        $('#grid_view').addClass('wrapper wrapper-content animated fadeInRight hidden');
                        $('#list_view').addClass('wrapper wrapper-content animated fadeInRight');
                        $('#employee_details').addClass('wrapper wrapper-content animated fadeInRight hidden');
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
                         var profile = $('.school_profile').val();
                        $.post('<?=site_url('School/already_exits_mobile')?>',{num:num,profile:profile}, function(res){
                    // console.log(data);
                    if(res == 0){
                        $('.mobile_verification').hide();
                        $('.mobile_verification').text('');
                    }
                    else{
                        $('.mobile_verification').show();
                        $('.mobile_verification').text('Mobile No. already Registered.');
                    }
                },'json');
                    });

                    $(document).on('change','.email_id',function(){
                        var email  = $(this).val();
                        var profile = $('.school_profile').val();
                        $.post('<?=site_url('School/already_exits_email')?>',{email:email,profile:profile}, function(res){
                    // console.log(data);
                    if(res == 0){
                        $('.email_verification').hide();
                        $('.email_verification').text('');
                    }
                    else{
                        $('.email_verification').show();
                        $('.email_verification').text('Email ID. already Registered.');
                        
                    }
                },'json');
                    });

                    $('.update_functionality').hide();
                    $(document).on('click','.edit_functionality',function(){
                        $('.update_functionality').show();
                        $('.functionality').hide();
                        $('.edit_functionality').hide();
                    });

                    $('.clockpicker').clockpicker();

                    $(document).on('click','#add_user',function(){

                        $('.delete_user').toggle();
                    });

                    $(document).on('click','.hide_user',function(){

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


                height1 = $(".map_details").height();
                height2 = $(".map_details_head").height();
                $(".view_map").height(height1);
                $(".view_map_head").height(height2);
            // autoUpdate(); 
            setTimeout(autoUpdate, 3000);   
            function autoUpdate() 
            {
                // console.log("update");
             $.post('<?=site_url('Tracking/view_map_table_update_institute')?>',{}, function(data){
                  console.log(data);
                         $('#vehical_status').empty();
                         for (var i = 0; i < data.res1.length; i++) 
                          {
                            var j =0;
                             j = i+1;
                                $('#vehical_status').append('<tr class="map_details">'+
                                            '<td>'+j+'</td>'+
                                            '<th>'+data.res1[i].school_name+'</th>'+
                                          (data.res1[i][0].vehicle_movement_status == "B" ? '<td><img src="<?=base_url()?>assets/img/icon-bus-green.png" alt="running" style="height:25px;"></td>' : ' <td><img src="<?=base_url()?>assets/img/icon-bus-red.png" alt="stop" style="height:25px;"></td>')+ 
                                          
                                          (data.res1[i][0].gps_valid_data == "1" ? '<td><img src="<?=base_url()?>assets/img/yellow-circle.jpg" alt="" style="height:25px;"></td>':'<td><img src="<?=base_url()?>assets/img/orange-circle.png" alt="" style="height:25px;"></td>')+ 
                                           
                                            '<td>'+data.res1[i][0].stop_longitude+'</td>'+
                                            '<td>'+data.res1[i][0].device_id+'</td>' +
                                            '<td>'+data.res1[i][0].xml_date_time+'</td>'+
                                            '<td>'+data.res1[i][0].speed+'</td>'+
                                            '<td>'+data.res1[i][0].stop_latitude+'</td>'+
                                           (data.res1[i][0].power_status == "1" || "2" ? '<td><img src="<?=base_url()?>assets/img/BatteryOK.png" alt="Power" style="height:25px;"></td>' : '<td><img src="<?=base_url()?>assets/img/BatteryDis.png" alt="Internal Battery" style="height:25px;"></td>')+ 
                                             
                                            '<td>'+data.res1[i][0].total_satellites+'</td>'+
                                            '<td>'+data.res1[i][0].gsm_signal_strength+'</td>'+
                                          
                                        '</tr>');

                          }

                },'json');

                height1 = $(".map_details").height();
                height2 = $(".map_details_head").height();
                $(".view_map").height(height1);
                $(".view_map_head").height(height2);

             setTimeout(autoUpdate, 3000);
            }


                    $("#addSchool").validate({
                        rules: {
                            school_name: {
                                required: true
                            },
                            school_address: {
                                required: true
                            },
                            school_logo:{
                               required:true
                            },
                            school_latitude:{
                               pattern:/^[0-9\.]*$/
                            },
                            school_longitude:{
                               pattern:/^[0-9\.]*$/
                            },
                            school_email_id: {
                                pattern: /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
                                email: true
                            },
                            school_AY_id:{
                                required:true,
                                min:1
                            },
                            school_mobile_number: {
                                digits: true,
                                minlength: 10,
                                maxlength: 10
                            },
                            school_phone_number:{
                               required:true,
                               digits: true,
                               minlength: 11,
                               maxlength: 11                   
                           },
                           photo:{
                               required:true
                           },
                            AY_school_profile_id:{
                               min:1
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
                            employee_email_id: {
                                required:true,
                                pattern: /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
                                email: true
                            },
                            employee_pri_mobile_number: {
                                required: true,
                                digits: true,
                                minlength: 10,
                                maxlength: 10
                            },
                            employee_DOB:{
                                required:true
                            },
                            employee_gender:{
                                required:true
                            },
                            photo:{
                                required:true
                            }
                        },
                    messages: {
                        school_name: {
                            required: "Please enter School name."
                        },
                        school_address: {
                            required: "Please enter School Address."
                        },
                        school_latitude:{
                               pattern:"Please enter School lattitude for eg.102.230.56.23"
                        },
                        school_longitude:{
                               pattern:"Please enter School longitude for eg.102.230.56.23"
                            },
                        school_email_id: {
                            required: "Please enter School Email.",
                            pattern:"Please enter valid format of email.",
                            email: "Please enter Correct Email"
                        },
                        school_AY_id:{
                            min:"Please Select Acadmic Year."
                        },
                        school_mobile_number: {
                            required: "Please enter school mobile no.",
                            digits: "Please enter 10 digit mobile no.",
                            minlength: "Please enter 10 digit mobile no.",
                            maxlength: "Please enter 10 digit mobile no."
                        },
                        school_phone_number: {
                            required: "Please enter school mobile no.",
                            digits: "Please enter 10/11 digit mobile/phone no.",
                            minlength: "Please enter 10/11 digit mobile/phone no.",
                            maxlength: "Please enter 10/11 digit mobile/phone no."
                        },
                         employee_photo:{
                            required:"Please Select Employee photo."
                        },
                        employee_first_name: {
                            required: "Please enter employee First name.",
                            pattern:"Please enter only alphabets"
                        },
                        employee_middle_name: {
                            required: "Please enter employee Middle name.",
                            pattern:"Please enter only alphabets"
                        },
                        employee_last_name: {
                            required: "Please enter employee Last name.",
                            pattern:"Please enter only alphabets"
                        },
                        employee_DOB:{
                            required:"Please Select Student Date Of Birth."
                        },
                         employee_pri_mobile_number: {
                            required: "Please enter  mobile number.",
                            digits: "Please enter 10 digit mobile number.",
                            minlength: "Please enter 10 digit mobile number.",
                            maxlength: "Please enter 10 digit mobile number."
                        },
                        employee_email_id: {
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
                        photo:{
                            required:"Please Select Teacher Photo."
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

            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [ ],
                "language": {
                    "emptyTable": "<img src='<?=base_url();?>assets/img/No-record-found.png'> "
                }

            });

            $(document).on('click','.details', function(){
                $('.info').toggle();
            })
        });
    </script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>