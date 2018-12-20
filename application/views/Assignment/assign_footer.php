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
                   <img src="<?php echo $client_logo; ?>" style="height:20px;width:20px;"> <strong style="color:#ffffff;"><?php echo $client_name; ?> </strong> 
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
    <script src="<?=base_url()?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?=base_url()?>assets/js/plugins/select2/select2.full.min.js"></script>
    <script src="<?=base_url()?>assets/js/inspinia.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/pace/pace.min.js"></script>

    
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
//===================================================== Assignment common script ================================        
        $(document).ready(function(){

            <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
                swal({
                    title: "<?=$flash['title']?>",
                    text: "<?=$flash['text']?>",
                    type: "<?=$flash['type']?>"
                });
            <?php } ?>

            <?php if($transport == 'transport'){?>
                $('#route_de').addClass('active');
                document.title = "TrackMee | Assignment Details"
            <?php }elseif($transport == 'stop'){?>
                $('#stop').addClass('active');
                document.title = "TrackMee | Assignment Details";
            <?php } ?>

            $('#deleteDBR').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.id;
                $('.DBR_id_delete').val(id);
            });

            $('.driver_bus_route').hide();
            $(document).on('click','.toggle_route',function(){
                $('.driver_bus_route').toggle();
            });

            $('.student_stop_assign').hide();
            $(document).on('click','#toggle_route',function(){
                $('.student_stop_assign').toggle();
            });

            $(document).on('change','.bus_details',function(){
                $('#route_type1').empty();
                $('.route_details').empty();
                var bus = $(this).val();
                $.post('<?=site_url('User_stop_assign/bus_details_route')?>',{bus_id : bus}, function(data){
                    // console.log(data);
                    $('.route_details').append('<option value="0">Select Route</option>');
                    $.each(data, function(k,v){
                        $('.route_details').append('<option value="'+v.route_no+'">'+v.route_name+'</option>');
                    });
                },'json');

                $.post('<?=site_url('User_stop_assign/client_details_bus_wise')?>',{bus_id : bus}, function(data){
                    // console.log(data);
                    $.each(data, function(k,v){
                        $('.client_details').append('<option value="'+v.client_profile_id+'">'+v.client_name+'</option>');
                    });
                },'json');
            }); 

            $('.stop_details').hide();
            $(document).on('change','.route_details',function(){
                $('#route_type1').empty();
                $('.stop_details').show();
                var route = $(this).val();
                var route_type = 1;
                $.post('<?=site_url('User_stop_assign/stop_details_route')?>',{route_id : route, route_type : route_type}, function(data){
                    $.each(data, function(k,v){
                        $('#route_type1').append('<tr><td>'+v.stop_id+'</td><td>'+v.stop_index+'</td><td >'+v.stop_name+'</td><td><input type="radio" value="'+v.stop_name+'" name="stop_name"></td></tr>');
                    });
                },'json');
            });

            $(document).on('change','.driver',function(){
                $('.bus').empty();
                $('#profile_id').empty();
                var driver = $(this).val();
                $.post('<?=site_url('Driver_bus_route_assgn/bus_details_driver_wise')?>',{driver : driver}, function(data){
                    // console.log(data);
                        $('.bus').append('<option value="0">Select Bus</option>');
                    $.each(data, function(k,v){
                        $('.bus').append('<option value="'+v.bus_id+'">'+v.bus_no+'</option>');
                    });
                },'json');

                $.post('<?=site_url('Driver_bus_route_assgn/client_details_driver_wise')?>',{driver : driver}, function(data){
                    // console.log(data);
                    $.each(data, function(k,v){
                        $('#profile_id').append('<option value="'+v.client_profile_id+'">'+v.client_name+'</option>');
                    });
                },'json');
            });
       
            $(document).on('change','.bus', function(){
                var driver1 = $('.driver');
                var bus1 = $('.bus');
                if(bus1.val() == 'null' || bus1.val() == ''){
                }
                else if(driver1.val() == '0'){
                    $('.route').empty();
                }
                else{
                    var driver = $('.driver').val();
                    var bus = $('.bus').val();
                    var profile_id = $('#profile_id').val();
                    $('.route').empty();
                    $.post('<?=site_url('Driver_bus_route_assgn/already_exits_driver_bus')?>',{bus:bus,driver:driver,profile_id:profile_id}, function(res){
                        console.log(res);
                        $('.route').append('<option>Select Route</option>');
                        $.each(res,function(k,v){
                            $('.route').append('<option value="'+v.route_no+'">'+v.route_name+'</option>');
                        })
                    },'json');
                }
            });

            $(document).on('change','.bus', function(){
                $('.route').empty();
                var bus = $(this).val();
                var driver = $('.driver').val();
                $.post('<?=site_url('Driver_bus_route_assgn/already_exits_driver_bus')?>',{bus:bus,driver:driver}, function(res){
                    console.log(res);
                    $.each(res,function(k,v){
                        $('.route').append('<option value="'+v.route_no+'">'+v.route_name+'</option>');
                    })
                },'json');
            });

            $(document).on('change','.bus_verification_details',function(){
                var bus = $(this).val();
                var route = $(".route").val();
                $.post('<?=site_url('Driver_bus_route_assgn/already_exits_route_bus')?>',{bus:bus,route:route}, function(res){
                    console.log(res);
                    if(res == 0){
                        $('.bus_route_verification').hide();
                        $('.bus_route_verification').text('');
                    }
                    else{
                        $('.bus_route_verification').show();
                        $('.bus_route_verification').text('Bus Route time Complicate with other.');
                    }
                },'json');
            })

            $('.ass_details').hide();
            $('.ass_details1').hide();
            $(document).on('click','.ass_details_edit',function(){
                 $('.ass_details').show();
                 $('.ass_details1').show();
                 $('.ass_details_edit').hide();
            });
            $(document).on('click','.ass_details1',function(){

                 $('.ass_details').hide();
                 $('.ass_details1').hide();
                 $('.ass_details_edit').show();
            });

            $('.stop_ass').hide();
            $('.stop_ass1').hide();
            $(document).on('click','.stop_ass_edit',function(){
                 $('.stop_ass').show();
                 $('.stop_ass1').show();
                 $('.stop_ass_edit').hide();
            });
            $(document).on('click','.stop_ass1',function(){
                $('#route_type1').empty();
                 $('.stop_ass').hide();
                 $('.stop_ass1').hide();
                 $('.stop_ass_edit').show();
            });


        $("#Assign").validate({
        	rules: {
        		DBR_driver_id: {
        			min: 1         
        		},
        		DBR_bus_id: {
        			min: 1                 
        		},
        		DBR_route_id: {
                    required:true,
        			min: 1                      
        		},
                bus_id: {
                    min:1         
                },
                route_id: {
                    min:1         
                },
                SS_client_profile_id: {
                    min:1         
                },
                DBR_client_profile_id: {
                    min:1         
                }
        	},
        	messages:{
        		DBR_driver_id: {
        			min: "Please Select Driver."
        		},
        		DBR_bus_id: {
        			min: "Please Select Bus."
        		},
        		DBR_route_id: {
        			min: "Please Select Route."
        		},
                bus_id: {
                    min:"Please Select Bus"         
                },
                route_id: {
                    min:"Please Select Route"         
                },
                SS_client_profile_id: {
                    min:"Please Select Client"         
                },
                DBR_client_profile_id: {
                    min:"Please Select Client"         
                },
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
    });
    </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>