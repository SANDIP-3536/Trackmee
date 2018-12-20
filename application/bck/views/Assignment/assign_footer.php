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

    <script>

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

            $('.driver_bus_route').hide();
            $(document).on('click','.toggle_route',function(){
                $('.driver_bus_route').toggle();
            });

            $('.student_stop_assign').hide();
            $(document).on('click','#toggle_route',function(){
                $('.student_stop_assign').toggle();
            });

            $('.stop_details').hide();
            $(document).on('change','.route_details',function(){
                $('#route_type1').empty();
                $('.stop_details').show();
                var route = $(this).val();
                var route_type = 1;
                $.post('<?=site_url('Student_stop_assign/stop_details_route')?>',{route_id : route, route_type : route_type}, function(data){
                    $.each(data, function(k,v){
                        $('#route_type1').append('<tr><td>'+v.stop_id+'</td><td>'+v.stop_index+'</td><td >'+v.stop_name+'</td><td><input type="radio" value="'+v.stop_name+'" name="stop_name" required></td></tr>');
                    });
                },'json');
            });

//================================================= Student Class Division Assign =====================================================================================            

            $(document).on('click','.fetch_student_list_acc_class',function(){
                $('#class_div_roll_details').removeClass();
                $('#class_div_roll_details').addClass('');
                $('.student_class_division_wise_list_details').empty();
                $('html,body').animate({ scrollTop: $("#class_div_roll_details").offset().top},'slow');
                var class_id = $(this).find('.fetch_student_by_class').text();
                $.post('<?=site_url('student_class_division_assign/division_class_wise_list_details')?>',{class_id:class_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_class_division_wise_list_details').append('<tr class="division_class_rool_number_details"><td class="division_wise_student_class hidden">'+v.class_id+'</td><td class="division_wise_student_division hidden">'+v.division_id+'</td><td>'+v.class_name+'</td><td >'+v.division_name+'</span></td><td>'+v.total+'</td><td>'+v.assgn+'</td><td>'+v.nt_assgn+'</td></tr>');
                    });
                },'json');
            });

            $(document).on('click','.division_class_rool_number_details',function(){
                $('#student_class_div_list').removeClass();
                $('#student_class_div_list').addClass('');
                $('.student_class_wise_list_details').empty();
                $('html,body').animate({ scrollTop: $("#student_class_div_list").offset().top},'slow');
                var class_id = $(this).find('.division_wise_student_class').text();
                var division_id = $(this).find('.division_wise_student_division').text();
                $.post('<?=site_url('student_class_division_assign/student_class_wise_list_details')?>',{class_id:class_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.student_class_wise_list_details').append('<tr><td>'+v.class_name+'</td><td>'+v.division+'</td><td >'+v.student_name+'</span></td><td>'+v.Roll_No+'</td></tr>');
                    });
                },'json');
            });

            $(document).on('change','.new_assign_class_student_division',function(){
                $('#newassignHeader').removeClass();
                $('#newassignHeader').addClass('ibox-content');
                $('.new_assign_student_class_wise_list_details').empty();
                $('.pending_student_class_wise_list_details').empty();
                $('.pending_division_class_wise_list_details').empty();
                var class_id = $(this).val();
                $.post('<?=site_url('student_class_division_assign/total_new_assign_class_student_division')?>',{class_id:class_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.new_assign_student_class_wise_list_details').append('<tr><td>'+v.class_name+'</td><td >'+v.total_student+'</span></td><td>'+v.div_assgn+'</td><td>'+v.no_div_assgn+'</td></tr>');
                    });
                },'json');
                $.post('<?=site_url('student_class_division_assign/pending_assign_class_student_division')?>',{class_id:class_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.pending_student_class_wise_list_details').append('<tr><td class="hidden">'+v.student_profile_id+'</td><td >'+v.student_name+'</span></td><td><input type="checkbox" value="'+v.SCD_id+'" name="SCD_id[]"></td></tr>');
                    });
                },'json');
                $.post('<?=site_url('student_class_division_assign/pending_assign_class_division')?>',{class_id:class_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.pending_division_class_wise_list_details').append('<tr><td class="hidden">'+v.division_id+'</td><td >'+v.division_name+'</span></td><td><input type="radio" value="'+v.division_id+'" name="SCD_division_id" required></td></tr>');
                    });
                },'json');
            });

            $(document).on('change','.new_roll_assign_class_student_division',function(){
                $('#new_rollnumber_assignHeader').removeClass();
                $('#new_rollnumber_assignHeader').addClass('ibox-content');
                $('.new_roll_assign_student_class_wise_list_details').empty();
                $('html,body').animate({ scrollTop: $("#new_rollnumber_assignHeader").offset().top},'slow');
                var class_id = $(this).val();
                $.post('<?=site_url('student_class_division_assign/total_new_roll_assign_class_student_division')?>',{class_id:class_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.new_roll_assign_student_class_wise_list_details').append('<tr class="fetch_according_to_class_division"><td class="new_roll_class_id hidden">'+v.SCD_class_id+'</td><td>'+v.class_name+'</td><td class="new_roll_division_id hidden">'+v.SCD_division_id+'</td><td >'+v.division_name+'</span></td><td >'+v.total_student+'</span></td><td>'+v.roll_assgn+'</td><td>'+v.no_roll_assgn+'</td></tr>');
                    });
                },'json');
            });

            $(document).on('click','.fetch_according_to_class_division',function(){
                $('#ROll_NO_GENRATION').removeClass();
                $('#ROll_NO_GENRATION').addClass('ibox-content');
                $('.new_roll_assign_student_division_wise_list_details').empty();
                $('.privious_roll_number_backup_division_id').empty();
                $('.new_roll_assign_student_division_wise_list_details').empty();
                $('html,body').animate({ scrollTop: $("#ROll_NO_GENRATION").offset().top},'slow');
                var class_id = $(this).find('.new_roll_class_id').text();
                var division_id = $(this).find('.new_roll_division_id').text();
                $.post('<?=site_url('student_class_division_assign/fetch_class_student_wise_division')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.new_roll_assign_student_division_wise_list_details').append('<tr><td class="hidden"><input type="text" name="SCD_id[]" value="'+v.SCD_id+'"></td><td >'+v.student_name+'</span></td><td>'+v.Roll_no+'</td><td>N/A</td><td class="hidden"><input type="text" name="new_roll_no[]"></td></tr>');
                    });
                },'json');
                $('.roll_number_backup_class_id').val(class_id);
                $('.roll_number_backup_division_id').val(division_id);
                $.post('<?=site_url('student_class_division_assign/fetch_class_student_wise_division_max_roll_number')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.privious_roll_number_backup_division_id').val(v.highest_Roll_no)
                    });
                },'json');
            });

            $(document).on('change','.sort_by_first_roll_number',function(){
                var value = $(this).val();
                if(value == 1){
                    $('#roll_number_gender').removeClass();
                    $('#roll_number_gender').addClass('col-sm-3 fadeInRight');
                }else{
                    $('#roll_number_gender').removeClass();
                    $('#roll_number_gender').addClass('col-sm-3 fadeInRight hidden');
                }
            })

             $(document).on('change','.update_sort_by_first_roll_number',function(){
                var value = $(this).val();
                if(value == 1){
                    $('#update_roll_number_gender').removeClass();
                    $('#update_roll_number_gender').addClass('col-sm-3 fadeInRight');
                }else{
                    $('#update_roll_number_gender').removeClass();
                    $('#update_roll_number_gender').addClass('col-sm-3 fadeInRight hidden');
                }
            })

            var privious_roll_number = '';
            $(document).on('change','.student_gender_roll_number',function(){
                $('.new_roll_assign_student_division_wise_list_details').empty();
                var class_id = $('.roll_number_backup_class_id').val();
                var division_id = $('.roll_number_backup_division_id').val();
                privious_roll = $('.privious_roll_number_backup_division_id').val();
                $('html,body').animate({ scrollTop: $(".new_roll_assign_student_division_wise_list_details").offset().top},'slow');
                privious_roll_number = parseInt(privious_roll) + 1;
                var gender_type = $(this).val();
                if(gender_type == 1){
                    $.post('<?=site_url('student_class_division_assign/fetch_class_student_wise_division_male_gender')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.new_roll_assign_student_division_wise_list_details').append('<tr><td class="hidden"><input type="text" name="SCD_id[]" value="'+v.SCD_id+'"></td><td >'+v.student_name+'</span></td><td>'+v.Roll_no+'</td><td>'+privious_roll_number+'</td><td class="hidden"><input type="text" name="new_roll_no[]" value="'+privious_roll_number+'"></td></tr>');
                        privious_roll_number++;
                    });
                },'json');
                }else if(gender_type == 2){
                    $.post('<?=site_url('student_class_division_assign/fetch_class_student_wise_division_female_gender')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.new_roll_assign_student_division_wise_list_details').append('<tr><td class="hidden"><input type="text" name="SCD_id[]" value="'+v.SCD_id+'"></td><td >'+v.student_name+'</span></td><td>'+v.Roll_no+'</td><td>'+privious_roll_number+'</td><td class="hidden"><input type="text" name="new_roll_no[]" value="'+privious_roll_number+'"></td></tr>');
                        privious_roll_number++;
                    });
                },'json');
                }
            });

             $(document).on('change','.update_student_gender_roll_number',function(){
                $('.update_roll_assign_student_division_wise_list_details').empty();
                var class_id = $('.update_roll_number_backup_class_id').val();
                var division_id = $('.update_roll_number_backup_division_id').val();
                $('html,body').animate({ scrollTop: $(".update_roll_assign_student_division_wise_list_details").offset().top},'slow');
                var gender_type = $(this).val();
                var i = 1
                if(gender_type == 1){
                    $.post('<?=site_url('student_class_division_assign/update_fetch_class_student_wise_division_male_gender')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.update_roll_assign_student_division_wise_list_details').append('<tr><td class="hidden"><input type="text" name="SCD_id[]" value="'+v.SCD_id+'"></td><td >'+v.student_name+'</span></td><td>'+v.Roll_no+'</td><td>'+i+'</td><td class="hidden"><input type="text" name="new_roll_no[]" value="'+i+'"></td></tr>');
                        i++;
                    });
                },'json');
                }else if(gender_type == 2){
                    $.post('<?=site_url('student_class_division_assign/update_fetch_class_student_wise_division_female_gender')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.update_roll_assign_student_division_wise_list_details').append('<tr><td class="hidden"><input type="text" name="SCD_id[]" value="'+v.SCD_id+'"></td><td >'+v.student_name+'</span></td><td>'+v.Roll_no+'</td><td>'+i+'</td><td class="hidden"><input type="text" name="new_roll_no[]" value="'+i+'"></td></tr>');
                        i++;
                    });
                },'json');
                }
            });

            $(document).on('change','.sort_by_first_roll_number',function(){
                $('.new_roll_assign_student_division_wise_list_details').empty();
                var class_id = $('.roll_number_backup_class_id').val();
                var division_id = $('.roll_number_backup_division_id').val();
                privious_roll = $('.privious_roll_number_backup_division_id').val();
                $('html,body').animate({ scrollTop: $(".new_roll_assign_student_division_wise_list_details").offset().top},'slow');
                privious_roll_number = parseInt(privious_roll) + 1;
                var gender_type = $(this).val();
                if(gender_type == 2){
                    $.post('<?=site_url('student_class_division_assign/fetch_class_student_wise_division_first_name_sort')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.new_roll_assign_student_division_wise_list_details').append('<tr><td class="hidden"><input type="text" name="SCD_id[]" value="'+v.SCD_id+'"></td><td >'+v.student_name+'</span></td><td>'+v.Roll_no+'</td><td>'+privious_roll_number+'</td><td class="hidden"><input type="text" name="new_roll_no[]" value="'+privious_roll_number+'"></td></tr>');
                        privious_roll_number++;
                    });
                },'json');
                }else if(gender_type == 3){
                    $.post('<?=site_url('student_class_division_assign/fetch_class_student_wise_division_last_name_sort ')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.new_roll_assign_student_division_wise_list_details').append('<tr><td class="hidden"><input type="text" name="SCD_id[]" value="'+v.SCD_id+'"></td><td >'+v.student_name+'</span></td><td>'+v.Roll_no+'</td><td>'+privious_roll_number+'</td><td class="hidden"><input type="text" name="new_roll_no[]" value="'+privious_roll_number+'"></td></tr>');
                        privious_roll_number++;
                    });
                },'json');
                }
            });

            $(document).on('change','.update_sort_by_first_roll_number',function(){
                $('.update_roll_assign_student_division_wise_list_details').empty();
                var class_id = $('.update_roll_number_backup_class_id').val();
                var division_id = $('.update_roll_number_backup_division_id').val();
                $('html,body').animate({ scrollTop: $(".update_roll_assign_student_division_wise_list_details").offset().top},'slow');
                var gender_type = $(this).val();
                var i =1;
                if(gender_type == 2){
                    $.post('<?=site_url('student_class_division_assign/update_fetch_class_student_wise_division_first_name_sort')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.update_roll_assign_student_division_wise_list_details').append('<tr><td class="hidden"><input type="text" name="SCD_id[]" value="'+v.SCD_id+'"></td><td >'+v.student_name+'</span></td><td>'+v.Roll_no+'</td><td>'+i+'</td><td class="hidden"><input type="text" name="new_roll_no[]" value="'+i+'"></td></tr>');
                        i++;
                    });
                },'json');
                }else if(gender_type == 3){
                    $.post('<?=site_url('student_class_division_assign/update_fetch_class_student_wise_division_last_name_sort ')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.update_roll_assign_student_division_wise_list_details').append('<tr><td class="hidden"><input type="text" name="SCD_id[]" value="'+v.SCD_id+'"></td><td >'+v.student_name+'</span></td><td>'+v.Roll_no+'</td><td>'+i+'</td><td class="hidden"><input type="text" name="new_roll_no[]" value="'+i+'"></td></tr>');
                        i++;
                    });
                },'json');
                }
            })

            $(document).on('change','.update_assign_class_student',function(){
                $('#updateassignHeader').removeClass();
                $('#updateassignHeader').addClass('ibox-content');
                $('.update_assign_student_class_wise_list_details').empty();
                $('.update_assign_student_class_division_wise_list_details').empty();
                $('.update_class_student_detailsSS').empty();
                var class_id = $(this).val();
                $('html,body').animate({ scrollTop: $(".update_assign_student_class_wise_list_details").offset().top},'slow');
                $.post('<?=site_url('student_class_division_assign/total_new_roll_assign_class_student_division')?>',{class_id:class_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.update_assign_student_class_wise_list_details').append('<tr class="fetch_update_student_list"><td class="update_class_class_id hidden">'+v.SCD_class_id+'</td><td>'+v.class_name+'</td><td class="update_class_division_id hidden">'+v.SCD_division_id+'</td><td >'+v.division_name+'</span></td><td >'+v.total_student+'</span></td><td>'+v.roll_assgn+'</td><td>'+v.no_roll_assgn+'</td></tr>');
                    });
                },'json');  
            }); 

            $(document).on('click','.fetch_update_student_list',function(){
                $('#updateClassStudentList').removeClass();
                $('#updateClassStudentList').addClass('ibox-content');
                $('.update_assign_student_class_division_wise_list_details').empty();
                $('html,body').animate({ scrollTop: $("#updateClassStudentList").offset().top},'slow');
                var class_id = $(this).find('.update_class_class_id').text();
                var division_id = $(this).find('.update_class_division_id').text();
                $.post('<?=site_url('student_class_division_assign/student_class_wise_list_details')?>',{class_id:class_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.update_assign_student_class_division_wise_list_details').append('<tr class="update_class_student_details"><td class="update_class_scd_id hidden">'+v.SCD_id+'</td><td>'+v.class_name+'</td><td>'+v.division+'</td><td >'+v.student_name+'</span></td><td>'+v.Roll_No+'</td></tr>');
                    });
                },'json');
            });

            $(document).on('click','.update_class_student_details',function(){
                $('#update_class_student_details').removeClass();
                $('#update_class_student_details').addClass('ibox-content');
                $('.update_class_student_detailsSS').empty();
                $('.update_class_SCD_class_id').empty();
                $('html,body').animate({ scrollTop: $("#update_class_student_details").offset().top},'slow');
                var SCD_id = $(this).find('.update_class_scd_id').text();
                $.post('<?=site_url('student_class_division_assign/update_class_student_details')?>',{SCD_id:SCD_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.update_class_student_detailsSS').append('<tr><td class="update_class_class_scd_id hidden">'+v.SCD_id+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td >'+v.student_name+'</span></td><td>'+v.Roll_no+'</td><td><input type="radio" value="'+v.SCD_id+'" name="class_update_student_SCD_id" required checked></td><td class="hidden"><input type="text" value="'+v.SCD_student_profile_id+'" name="class_update_SCD_student_profile_id"></td></tr>');
                    });
                },'json');
                $.post('<?=site_url('student_class_division_assign/update_class_class_details')?>',{SCD_id:SCD_id},function(data){
                    console.log(data);
                    $('.update_class_SCD_class_id').append('<option>Select Class</option>')
                    $.each(data,function(k,v){
                        $('.update_class_SCD_class_id').append('<option value="'+v.class_id+'">'+v.class_name+'</option>');
                    });
                },'json');
            });         
             
            var i = 0;   
            $(document).on('change','.update_class_SCD_class_id',function(){
                $('.update_class_fee_details').empty();
                var class_id = $(this).val();
                $.post('<?=site_url('Student/fetch_class_fee_types')?>',{class_id : class_id}, function(data){
                    console.log(data);
                    $.each(data, function(k,v){
                        i = i+1;
                        $('.update_class_fee_details').append('<tr><td>'+i+'</td>'+
                            '<td>'+v.fees_type_name+'</td>'+    
                                '<td>'+((v.fees_type_amount).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"))+'</td>'+
                                '<td class="hidden"><input type="text" class="form-control hidden"  name="total_fee_amount[]" value="'+v.fees_type_amount+'"</td>'+
                                '<td><input type="text" class="form-control"  name="fee_waiver_name[]" ></td>'+
                                '<td><input type="text" class="form-control"  name="fee_waiver_amount[]" value="00"></td>'+
                                '<td><label class="checkbox-inline i-checks checked"><input type="checkbox" name="fee_type_id[]" value="'+v.fees_type_id+'" checked=""  style="margin-left:0px;"></label></td>'+ 
                        '</tr>');
                    });
                },'json');
            });

            $(document).on('change','.update_division_assign_class_student',function(){
                $('#updatedivisionassignHeader').removeClass();
                $('#updatedivisionassignHeader').addClass('ibox-content');
                $('.update_division_assign_student_class_wise_list_details').empty();
                $('.update_Division_assign_student_class_division_wise_list_details').empty();
                $('.update_division_student_detailsSS').empty();
                $('.update_division_division_details').empty();
                var class_id = $(this).val();
                $('html,body').animate({ scrollTop: $("#updatedivisionassignHeader").offset().top},'slow');
                $.post('<?=site_url('student_class_division_assign/total_new_roll_assign_class_student_division')?>',{class_id:class_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.update_division_assign_student_class_wise_list_details').append('<tr class="fetch_update_division_student_list"><td class="update_division_class_id hidden">'+v.SCD_class_id+'</td><td>'+v.class_name+'</td><td class="update_division_division_id hidden">'+v.SCD_division_id+'</td><td >'+v.division_name+'</span></td><td >'+v.total_student+'</span></td><td>'+v.roll_assgn+'</td><td>'+v.no_roll_assgn+'</td></tr>');
                    });
                },'json');  
            });

            $(document).on('click','.fetch_update_division_student_list',function(){
                $('#updateDivisionStudentList').removeClass();
                $('#updateDivisionStudentList').addClass('ibox-content');
                $('.update_Division_assign_student_class_division_wise_list_details').empty();
                $('html,body').animate({ scrollTop: $("#updateDivisionStudentList").offset().top},'slow');
                var class_id = $(this).find('.update_division_class_id').text();
                var division_id = $(this).find('.update_division_division_id').text();
                $.post('<?=site_url('student_class_division_assign/student_class_wise_list_details')?>',{class_id:class_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.update_Division_assign_student_class_division_wise_list_details').append('<tr class="update_division_student_details"><td class="update_division_scd_id hidden">'+v.SCD_id+'</td><td>'+v.class_name+'</td><td>'+v.division+'</td><td >'+v.student_name+'</span></td><td>'+v.Roll_No+'</td></tr>');
                    });
                },'json');
            });

            $(document).on('click','.update_division_student_details',function(){
                $('#update_Division_student_details').removeClass();
                $('#update_Division_student_details').addClass('ibox-content');
                $('.update_division_student_detailsSS').empty();
                $('.update_division_division_details').empty();
                $('html,body').animate({ scrollTop: $("#update_Division_student_details").offset().top},'slow');
                var SCD_id = $(this).find('.update_division_scd_id').text();
                $.post('<?=site_url('student_class_division_assign/update_class_student_details')?>',{SCD_id:SCD_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.update_division_student_detailsSS').append('<tr><td class="update_division_class_scd_id hidden">'+v.SCD_id+'</td><td>'+v.class_name+'</td><td>'+v.division_name+'</td><td >'+v.student_name+'</span></td><td>'+v.Roll_no+'</td><td><input type="radio" value="'+v.SCD_id+'" name="division_update_SCD_id" required checked></td><td class="hidden"><input type="text" value="'+v.SCD_student_profile_id+'" name="division_update_SCD_student_profile_id"></td></tr>');
                    });
                },'json');
                $.post('<?=site_url('student_class_division_assign/update_division_division_details')?>',{SCD_id:SCD_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.update_division_division_details').append('<tr><td>'+v.division_name+'</td><td><input type="radio" name="update_division_scd_division_id" value="'+v.division_id+'" required></td></tr>');
                    });
                },'json');
            }); 

            $(document).on('change','.update_roll_assign_class_student_division',function(){
                $('#update_rollnumber_assignHeader').removeClass();
                $('#update_rollnumber_assignHeader').addClass('ibox-content');
                $('.update_roll_assign_student_class_wise_list_details').empty();
                var class_id = $(this).val();
                $.post('<?=site_url('student_class_division_assign/total_new_roll_assign_class_student_division')?>',{class_id:class_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.update_roll_assign_student_class_wise_list_details').append('<tr class="update_all_fetch_according_to_class_division"><td class="update_roll_class_id hidden">'+v.SCD_class_id+'</td><td>'+v.class_name+'</td><td class="update_roll_division_id hidden">'+v.SCD_division_id+'</td><td >'+v.division_name+'</span></td><td >'+v.total_student+'</span></td><td>'+v.roll_assgn+'</td><td>'+v.no_roll_assgn+'</td></tr>');
                    });
                },'json');
            });

             $(document).on('click','.update_all_fetch_according_to_class_division',function(){
                $('#update_ROll_NO_GENRATION').removeClass();
                $('#update_ROll_NO_GENRATION').addClass('ibox-content');
                $('.new_roll_assign_student_division_wise_list_details').empty();
                $('.privious_roll_number_backup_division_id').empty();
                $('.new_roll_assign_student_division_wise_list_details').empty();
                var class_id = $(this).find('.update_roll_class_id').text();
                var division_id = $(this).find('.update_roll_division_id').text();
                $.post('<?=site_url('student_class_division_assign/total_update_roll_assign_class_student_division')?>',{class_id:class_id,division_id:division_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.update_roll_assign_student_division_wise_list_details').append('<tr><td class="hidden"><input type="text" name="SCD_id[]" value="'+v.SCD_id+'"></td><td >'+v.student_name+'</span></td><td>'+v.Roll_no+'</td><td>N/A</td><td class="hidden"><input type="text" name="new_roll_no[]"></td></tr>');
                    });
                },'json');
                $('.update_roll_number_backup_class_id').val(class_id);
                $('.update_roll_number_backup_division_id').val(division_id);
            });

//========================================================= Teacher Class Division Subject Assign =======================================================================================
            
            $(document).on('change','.new_TCDS_class_assign',function(){
                $('.subject_details').empty();
                var class_id = $(this).val();
                $.post('<?=site_url('Teacher_class_division_subject_assign/class_wise_division_details')?>',{class_id : class_id}, function(data){
                    console.log(data);
                    $.each(data, function(k,v){
                        $('.division_details').append('<th>'+v.division_name+'</th>');
                    });
                },'json');
                $.post('<?=site_url('Teacher_class_division_subject_assign/class_wise_subject_details')?>',{class_id : class_id}, function(data){
                    console.log(data);
                    $.each(data, function(k,v){
                        $('.subject_details').append('<tr><th>'+v.subject_name+' ('+v.subject_type+')</th><tr>');
                    });
                },'json');
            });

            $(document).on('change','.class_details',function(){
                $('.subject_details').empty();
                var class_id = $(this).val();
                $.post('<?=site_url('Teacher_subject_assign/subject_details_class')?>',{class_id : class_id}, function(data){
                    console.log(data);
                    $.each(data, function(k,v){
                        $('.subject_details').append('<tr><td>'+v.subject_id+'</td><td >'+v.subject_name+' <span>('+v.subject_type+')</span></td><td class="stop_ass"><input type="checkbox" value="'+v.subject_id+'" name="TS_subject_id[]" required></td></tr>');
                    });
                },'json');
            });

            $(document).on('change','.class_details_TCDS',function(){
                $('.subject_details').empty();
                $('.division_details').empty();
                var class_id = $(this).val();
                // alert(class_id);
                $.post('<?=site_url('Teacher_class_division_subject_assign/subject_details_class')?>',{class_id : class_id}, function(data){
                    console.log(data);
                    $.each(data, function(k,v){
                        $('.subject_details').append('<tr><td>'+v.subject_id+'</td><td >'+v.subject_name+' <span>('+v.subject_type+')</span></td><td class="stop_ass"><input type="checkbox" value="'+v.subject_id+'" name="TCDS_subject_id[]" required></td></tr>');
                    });
                },'json');

                $.post('<?=site_url('Teacher_class_division_subject_assign/division_details_class')?>',{class_id : class_id}, function(data){
                    console.log(data);
                    $.each(data, function(k,v){
                        $('.division_details').append('<tr><td>'+v.division_id+'</td><td >'+v.division_name+'</td><td class="stop_ass"><input type="radio" value="'+v.division_id+'" name="TCDS_division_id" required></td></tr>');
                    });
                },'json');
            });
            
            $(document).on('change','.driver', function(){
                var driver1 = $('.driver');
                var bus1 = $('.bus');
                if(bus1.val() == 'null' || bus1.val() == ''){
                }
                else if(driver1.val() == '0'){
                    $('.route').clear();
                }
                else{
                    var driver = $(this).val();
                    var bus = $('.bus').val();
                    $('.route').empty();
                    $.post('<?=site_url('Driver_bus_route_assgn/already_exits_driver_bus')?>',{bus:bus,driver:driver}, function(res){
                        console.log(res);
                        $('.route').append('<option>Select Route</option>');
                        $.each(res,function(k,v){
                            $('.route').append('<option value="'+v.route_no+'">'+v.route_name+'</option>');
                        })
                    },'json');
                }
            });
            $(document).on('change','.bus', function(){
                var bus = $(this).val();
                var driver = $('.driver').val();
                 $('.route').empty();
                $.post('<?=site_url('Driver_bus_route_assgn/already_exits_driver_bus')?>',{bus:bus,driver:driver}, function(res){
                    console.log(res);
                    $.each(res,function(k,v){
                        $('.route').append('<option value="'+v.route_no+'">'+v.route_name+'</option>');
                    })
                },'json');
            });

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
        			required: true         
        		},
        		DBR_bus_id: {
        			required: true                 
        		},
        		DBR_route_id: {
        			required: true                      
        		}
        	},
        	messages:{
        		DBR_driver_id: {
        			required: "Please Select Driver."
        		},
        		DBR_bus_id: {
        			required: "Please Select Bus."
        		},
        		DBR_route_id: {
        			required: "Please Select Route."
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
    });
    </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>