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
    <script src="<?=base_url()?>assets/js/plugins/fullcalendar/moment.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery-ui.min.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?=base_url();?>assets/js/plugins/select2/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.3/build/jquery.datetimepicker.full.js"></script>

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

        <?php if($notification == 'notification'){?>
            $('#notification').addClass('active');
            $('#other').addClass('active');
            document.title = "TrackMee | Notification";
        <?php } ?>

        $('.start_time').datetimepicker({
           datepicker:false,
           formatTime:"h:i A",
           step:15,
           format:"h:i A"
        });

        var today = new Date();
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            minDate: 0,
            startDate: "today",
            autoclose:true
        }).on('changeDate', function (ev) {
            $(this).datepicker('hide');
        });

        $(document).on('change','.bus_details',function(){
            $('.user_details_accor').empty();
            var bus_id = $(this).val();
            // alert(class_id);
             if(bus_id == 0){
                $.post('<?=site_url('Notification/fetch_user_acor_client')?>',{},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.user_details_accor').append('<tr><td>'+v.user_profile_id+'</td><td >'+v.user_name+'</td><td>'+v.bus_no+'</td><td><input type="checkbox" class="checking" value="'+v.user_profile_id+'" name="notifi_student_profile_id[]"></td></tr>');
                    });
                },'json');
            }else{
                $.post('<?=site_url('Notification/fetch_user_acor_bus')?>',{bus_id:bus_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.user_details_accor').append('<tr><td>'+v.user_profile_id+'</td><td >'+v.user_name+'</td><td>'+v.bus_no+'</td><td><input type="checkbox" class="checking" value="'+v.user_profile_id+'" name="notifi_user_profile_id[]"></td></tr>');
                    });
                },'json');
            }
        });

        $(document).ready(function(){

            $('.CheckAll').click(function() {
                this.checked ? $('.checking').prop('checked', true) : $('.checking').prop('checked', false);
            });


            $('.new_notification_meet').hide();
            $(document).on('click','#new_notification_meet',function(){
                $('.new_notification_meet').show();
                $('#new_notification_meet').hide();
            });

            $(document).on('click','.close_new_entry',function(){
                $('#new_notification_meet').show();
                $('.new_notification_meet').hide();
            });



            <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
                swal({
                    title: "<?=$flash['title']?>",
                    text: "<?=$flash['text']?>",
                    type: "<?=$flash['type']?>"
                });
            <?php } ?>  
            $("#addPMNotification").validate({
            	rules: {
            		notifi_date: {
                        required: true        
                    },
                    notifi_time: {
                        required: true        
                    },
                    class_name: {
                        required: true,
                        min:0       
                    },
                    notifi_title: {
                        required: true,
                        pattern:/^[a-zA-Z\s]*$/        
                    },
                    notifi_msg: {
                        required: true        
                    },
                    division: {
                        min:0        
            		}
            	},
            	messages: {
                    class_name:{
                        min:"Please select the school class."
                    },
                    division:{
                        min:"Please select the school division."
                    }
            	}
            });

            $("#addENotification").validate({
                rules: {
                    notifi_date: {
                        required: true        
                    },
                    notifi_time: {
                        required: true        
                    },
                    class_name: {
                        required: true,
                        min:0       
                    },
                    notifi_title: {
                        required: true ,
                        pattern:/^[a-zA-Z\s]*$/       
                    },
                    notifi_msg: {
                        required: true        
                    },
                    division: {
                        required: true,
                        min:0        
                    }
                },
                messages: {
                    class_name:{
                        min:"Please select the school class."
                    },
                    division:{
                        min:"Please select the school division."
                    }
                }
            });

            $("#addSTNotification").validate({
                rules: {
                    notifi_date: {
                        required: true        
                    },
                    notifi_time: {
                        required: true        
                    },
                    class_name: {
                        required: true,
                        min:0       
                    },
                    notifi_title: {
                        required: true,
                        pattern:/^[a-zA-Z\s]*$/        
                    },
                    notifi_msg: {
                        required: true        
                    },
                    division: {
                        required: true,
                        min:0       
                    }
                },
                messages: {
                    class_name:{
                        min:"Please select the school class."
                    },
                    division:{
                        min:"Please select the school division."
                    }
                }
            });

            $("#addEVNotification").validate({
                rules: {
                    notifi_date: {
                        required: true        
                    },
                    notifi_time: {
                        required: true        
                    },
                    class_name: {
                        required: true,
                        min:0        
                    },
                    notifi_title: {
                        required: true,
                        pattern:/^[a-zA-Z\s]*$/        
                    },
                    notifi_msg: {
                        required: true        
                    },
                    division: {
                        required: true,
                        min:0        
                    }
                },
                messages: {
                    class_name:{
                        min:"Please select the school class."
                    },
                    division:{
                        min:"Please select the school division."
                    }
                }
            });

            $("#addONotification").validate({
                rules: {
                    notifi_date: {
                        required: true        
                    },
                    notifi_time: {
                        required: true        
                    },
                    class_name: {
                        required: true,
                        min:0        
                    },
                    notifi_title: {
                        required: true,
                        pattern:/^[a-zA-Z\s]*$/        
                    },
                    notifi_msg: {
                        required: true        
                    },
                    division: {
                        required: true,
                        min:0        
                    }
                },
                messages: {
                    class_name:{
                        min:"Please select the school class."
                    },
                    division:{
                        min:"Please select the school division."
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
</html>