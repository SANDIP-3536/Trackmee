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
                   <!-- <img src="" style="height:20px;width:20px;"> <strong style="color:#ffffff;"><?php echo $school_name; ?> </strong>  -->
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

        // <?php if($device == 'device'){?>
             // $('#device').addClass('active');
        // <?php } ?>

        <?php if($transport == 'device'){?>
             $('#device').addClass('active');
        <?php } ?>

        $(document).ready(function(){

            <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
                swal({
                    title: "<?=$flash['title']?>",
                    text: "<?=$flash['text']?>",
                    type: "<?=$flash['type']?>"
                });
            <?php } ?>
             $('.enableOnInput').prop('disabled', true);
            $(document).on('change','.mobile',function(){
                var num  = $(this).val();
                $.post('<?=site_url('Device/already_exits_mobile')?>',{num:num}, function(res){
                    // console.log(data);
                    if(res == 0){
                        $('.mobile_verification').hide();
                        $('.mobile_verification').text('');
                        $('.enableOnInput').prop('disabled', false);
                    }
                    else{
                        $('.mobile_verification').show();
                        $('.mobile_verification').text('Mobile Number Already Configured With Other Device.');
                        $('.enableOnInput').prop('disabled', true);
                    }
                },'json');
            });

            $('.new_device').hide();
            $('#new_device').show();
            $(document).on('click','#new_device',function(){
                $('.new_device').show();
                $('#new_device').hide();
            });
            $(document).on('click','.close_data',function(){
                $('.new_device').hide();
                $('#new_device').show();
            });

            $(document).on('change','.device',function(){
                var device  = $(this).val();
                $.post('<?=site_url('Device/already_exits_device')?>',{device:device}, function(res){
                    // console.log(res);
                    if(res == 0){
                        $('.device_verification').hide();
                        $('.device_verification').text('');
                        $('.enableOnInput').prop('disabled', false);
                    }
                    else{
                        $('.device_verification').show();
                        $('.device_verification').text('Device No.already Registered.');
                        $('.enableOnInput').prop('disabled', true);
                    }
                },'json');
            });

            $(document).on('change','.institute_details',function(){
                $('.school').empty();
                var institute = $(this).val();
                 $.post('<?=site_url('Device/fetch_school_institute')?>',{institute:institute}, function(res){
                    // console.log(res);
                     $.each(res, function(k,v){
                        $('.school').append('<option value="'+v.school_profile_id+'">'+v.school_name+'</option>');
                    });
                },'json');
            });


        $("#addDevice").validate({
            rules: {
                device_id: {
                    required: true,
                    minlength:15,
                    maxlength:22        
                },
                device_port_number:{
                    required:true,
                    digits:true,
                    minlength:4,
                    maxlength:4
                },
                device_mobile_number:{
                    required:true,
                    digits:true,
                    minlength:10,
                    maxlength:10
                },
                device_non_moving_frequency: {
                    required: true,
                    digits: true,
                    minlength: 3,
                    maxlength: 3                  
                },
                device_mobile_IMSI_number: {
                    required: true,
                    digits: true,
                    minlength: 15,
                    maxlength: 15                       
                },
                device_mobile_sim_number: {
                    required: true,
                    digits: true,
                    minlength: 15,
                    maxlength: 20                       
                }
            },
            messages: {
                route_name: {
                    required: "Please enter Device No."
                },
                device_port_number:{
                    required:"Please Enter Port Number",
                    digits:"Please enter 4 digit Port no.",
                    minlength:"Please enter 4 digit Port no.",
                    maxlength:"Please enter 4 digit Port no."
                },
                device_non_moving_frequency:{
                    required:"Please Enter Non Moving Frequency.",
                    digits:"Please enter 3 digit Non Moving Frequency.",
                    minlength:"Please enter 3 digit Non Moving Frequency.",
                    maxlength:"Please enter 3 digit Non Moving Frequency."
                },
                device_mobile_number: {
                    required: "Please enter Device mobile no.",
                    digits: "Please enter 10 digit mobile no.",
                    minlength: "Please enter 10 digit mobile no.",
                    maxlength: "Please enter 10 digit mobile no."
                },
                device_mobile_IMSI_number: {
                    required: "Please enter Device mobile IMEI no.",
                    digits: "Please enter 15 digit Device mobile IMEI no.",
                    minlength: "Please enter 15 digit Device mobile IMEI no.",
                    maxlength: "Please enter 15 digit Device mobile IMEI no."
                },
                device_mobile_sim_number: {
                    required: "Please enter Device mobile SIM no.",
                    digits: "Please enter 15-20 digit Device mobile SIM no.",
                    minlength: "Please enter 15 digit Device mobile SIM no.",
                    maxlength: "Please enter 20 digit Device mobile SIM no."
                }
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

        $(".select2_demo_2").select2({

        });
        });
    </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>