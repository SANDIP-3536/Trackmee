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

        <?php if($notification == 'notification'){?>
            $('#notification').addClass('active');
            $('#other').addClass('active');
            document.title = "TrackMee | Notification";
        <?php } ?>

        $('.clockpicker').clockpicker(function(){
             twelvehour: true
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

        $(document).on('change','.class_details',function(){
            $('.student_details_accor').empty();
            var class_id = $(this).val();
            // alert(class_id);
             if(class_id == 0){
                $.post('<?=site_url('Notification/fetch_student_acor_school')?>',{},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }else{
                $.post('<?=site_url('Notification/fetch_student_acor_class')?>',{class_id:class_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }
        });

        $(document).on('change','.division_details',function(){
            $('.student_details_accor').empty();
            var division_id = $(this).val();
            var class_id = $('.class_details').val();
            if(division_id == 0 && class_id == 0){
               $.post('<?=site_url('Notification/fetch_student_acor_school')?>',{},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }else if(division_id != 0 && class_id == 0){
               $.post('<?=site_url('Notification/fetch_student_acor_division')?>',{division_id:division_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }else{
                $.post('<?=site_url('Notification/fetch_student_acor_class_division')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }
        });
        $(document).on('change','.class_details_event',function(){
            $('.student_details_accor_event').empty();
            var class_id = $(this).val();
            // alert(class_id);
             if(class_id == 0){
                $.post('<?=site_url('Notification/fetch_student_acor_school')?>',{},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor_event').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }else{
                $.post('<?=site_url('Notification/fetch_student_acor_class')?>',{class_id:class_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor_event').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }
        });

        $(document).on('change','.division_details_event',function(){
            $('.student_details_accor_event').empty();
            var division_id = $(this).val();
            var class_id = $('.class_details_event').val();
            if(division_id == 0 && class_id == 0){
               $.post('<?=site_url('Notification/fetch_student_acor_school')?>',{},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor_event').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }else if(division_id != 0 && class_id == 0){
               $.post('<?=site_url('Notification/fetch_student_acor_division')?>',{division_id:division_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor_event').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }else{
                $.post('<?=site_url('Notification/fetch_student_acor_class_division')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor_event').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }
        });
        $(document).on('change','.class_details_circular',function(){
            $('.student_details_accor_circular').empty();
            var class_id = $(this).val();
            // alert(class_id);
             if(class_id == 0){
                $.post('<?=site_url('Notification/fetch_student_acor_school')?>',{},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor_circular').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }else{
                $.post('<?=site_url('Notification/fetch_student_acor_class')?>',{class_id:class_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor_circular').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }
        });

        $(document).on('change','.division_details_circular',function(){
            $('.student_details_accor_circular').empty();
            var division_id = $(this).val();
            var class_id = $('.class_details_circular').val();
            if(division_id == 0 && class_id == 0){
               $.post('<?=site_url('Notification/fetch_student_acor_school')?>',{},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor_circular').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }else if(division_id != 0 && class_id == 0){
               $.post('<?=site_url('Notification/fetch_student_acor_division')?>',{division_id:division_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor_circular').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }else{
                $.post('<?=site_url('Notification/fetch_student_acor_class_division')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor_circular').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }
        });
        $(document).on('change','.class_details_news',function(){
            $('.student_details_accor_news').empty();
            var class_id = $(this).val();
            // alert(class_id);
             if(class_id == 0){
                $.post('<?=site_url('Notification/fetch_student_acor_school')?>',{},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor_news').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }else{
                $.post('<?=site_url('Notification/fetch_student_acor_class')?>',{class_id:class_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor_news').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }
        });

        $(document).on('change','.division_details_news',function(){
            $('.student_details_accor_news').empty();
            var division_id = $(this).val();
            var class_id = $('.class_details_news').val();
            if(division_id == 0 && class_id == 0){
               $.post('<?=site_url('Notification/fetch_student_acor_school')?>',{},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor_news').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }else if(division_id != 0 && class_id == 0){
               $.post('<?=site_url('Notification/fetch_student_acor_division')?>',{division_id:division_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor_news').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }else{
                $.post('<?=site_url('Notification/fetch_student_acor_class_division')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_details_accor_news').append('<tr><td>'+v.student_profile_id+'</td><td >'+v.student_first_name+' '+v.student_middle_name+' '+v.student_last_name+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td><input type="checkbox" class="checking" value="'+v.student_profile_id+'" name="notifi_student_profile_id[]" required></td></tr>');
                    });
                },'json');
            }
        });
            // $('.enableOnInput').prop('disabled', true);
            $(':checkbox').not('.checking').change(function()
            {
                $(".checking").attr("checked", $(":checkbox").not(":checked").not(".checking").length);
            }); 
            $(".checkall").change(function() 
            {
                $(':checkbox').attr('checked', this.checked);
            });
        // $(document).on('click','.checkall',function(){
        //     // $('.checking').
        //     $(":checkbox").attr("checked", this.checked);
        // })

        $(document).ready(function(){

            $('.new_parent_meet').hide();
            $('.new_event').hide();
            $('.new_circular').hide();
            $('.new_news').hide();
            $(document).on('click','#new_parent_meet',function(){
                $('.new_parent_meet').show();
                $('#new_parent_meet').hide();
            });
            $(document).on('click','#new_event',function(){
                $('.new_event').show();
                $('#new_event').hide();
            });
            $(document).on('click','#new_circular',function(){
                $('.new_circular').show();
                $('#new_circular').hide();
            });
            $(document).on('click','#new_news',function(){
                $('.new_news').show();
                $('#new_news').hide();
            });

            $(document).on('click','.close_new_entry',function(){
                $('.new_news').hide();
                $('.new_circular').hide();
                $('.new_event').hide();
                $('.new_parent_meet').hide(); 
                $('#new_news').show();
                $('#new_circular').show();
                $('#new_event').show();
                $('#new_parent_meet').show();
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


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>