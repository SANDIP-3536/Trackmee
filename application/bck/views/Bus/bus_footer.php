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

        <?php if($bus == 'bus'){?>
            $('#bus').addClass('active');
            document.title = "TrackMee | Bus"
        <?php }elseif($bus == 'transport'){?>
            $('#transport').addClass('active');
            document.title = "TrackMee | Transport";
        <?php } ?>


        $(document).ready(function(){

            $(".bus_device option").val(function(idx, val) {
                $(this).siblings("[value='"+ val +"']").remove();
            });

            <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
                swal({
                    title: "<?=$flash['title']?>",
                    text: "<?=$flash['text']?>",
                    type: "<?=$flash['type']?>"
                });
            <?php } ?>

            $('.other_assignment').hide();
            $(document).on('click','.other',function(){
                $('.other_assignment').show();
            });

            $('.new_bus').hide();
            $('#new_bus').show();
            $(document).on('click','#new_bus',function(){
                $('.new_bus').show();
                $('#new_bus').hide();
            });
            $(document).on('click','.close_data',function(){
                $('.new_bus').hide();
                $('#new_bus').show();
            });

            $('.enableOnInput').prop('disabled', true);
            $(document).on('change','.bus_no',function(){
                var num  = $(this).val();
                $.post('<?=site_url('Bus/already_exits_bus')?>',{num:num}, function(res){
                    // console.log(data);
                    if(res == 0){
                        $('.bus_verification').hide();
                        $('.bus_verification').text('');
                         $('.enableOnInput').prop('disabled', false);
                    }
                    else{
                        $('.bus_verification').show();
                        $('.bus_verification').text('Bus already Registered.');
                        $('.enableOnInput').prop('disabled', true);
                    }
                },'json');
            });
             $('.device').hide();
             $(document).on('change','.bus_device',function(){
                var bus_device  = $(this).val();
                // alert(bus_device);
                $.post('<?=site_url('Bus/already_exits_bus_device')?>',{bus_device:bus_device}, function(res){
                    // console.log(data);
                    if(res == 0){
                        $('.bus_device_verification').hide();
                        $('.bus_device_verification').text('');
                         $('.enableOnInput').prop('disabled', false);
                    }
                    else{
                        $('.bus_device_verification').show();
                        $('.device').show();
                        $('.bus_device_verification').text('Device already assigned to other Bus.');
                         $('.enableOnInput').prop('disabled', true);
                    }
                },'json');
            });

             $(document).on('change','.institute_details',function(){
                 $('.school').empty();
                var institute = $(this).val();
                 $.post('<?=site_url('Bus/fetch_school_institute')?>',{institute:institute}, function(res){
                    // console.log(res);
                     $.each(res, function(k,v){
                        $('.school').append('<option value="'+v.school_profile_id+'">'+v.school_name+'</option>');
                    });
                },'json');
            });

        $("#addBus").validate({
        	rules: {
        		bus_no: {
        			required: true,
        			pattern:/^([A-Z]{2})+([0-9]{2})+([\s]{1})+([A-Z]{1,2})+([\s]{1})+([0-9]{4})$/          
        		},
        		bus_device_id: {
        			required: true                  
        		},
        		bus_total_no_of_seat: {
        			digits:true,
                    pattern:/^([0-9]{1,2})$/                  
        		}
        	},
        	messages: {
        		route_name: {
        			required: "Please enter Route name.",
        			pattern: "Please Enter that format for eg. MH12 AB 2325"
        		},
        		bus_device_id: {
        			required: "Please enter Bus Device ID."
        		},
        		bus_total_no_of_seat: {
        			pattern: "Please enter only 2 digits Seat no.",
        			digits:"Please enter only digits."
        		}
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
        });
    </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>