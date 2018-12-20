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
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery-ui.min.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?=base_url();?>assets/js/plugins/select2/select2.full.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?=base_url()?>assets/js/inspinia.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/pace/pace.min.js"></script>
        <!-- Data picker -->
   <script src="<?= base_url();?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>


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

        <?php if($education == 'lesson'){?>
             $('#education').addClass('active');
        <?php } ?>

        $(".select2_demo_2").select2();

        $('.clockpicker').clockpicker(function(){
             twelvehour: true
        });
            
        $(document).on('change','.class_details',function(){
            $('.division_details').empty();
            $('.subject_details').empty();
            $('.teacher_details').empty();

            var class_id = $(this).val();
            $.post('<?=site_url('Lesson/fetch_class_division')?>',{class_id:class_id},function(data){
                // console.log(data);
                $('.division_details').html('<option value="0">Select Division</option>');
                $.each(data,function(k,v){
                    $('.division_details').append('<option value="'+v.division_id+'">'+v.division_name+'</option>');
                });
            },'json');

            
        });

         $(document).on('change','.division_details',function(){
           var class_name = $(".class_name").val();
           var division = $(".division").val();
 
           $('.subject_details').empty();
           $('.teacher_details').empty();

            $.post('<?=site_url('Timetable/fetch_class_division_subject')?>',{class_id:class_name,division:division},function(data){
                // console.log(data);
                $('.subject_details').html('<option value="0">Select Subject</option>');
                $.each(data, function(k,v){
                    $('.subject_details').append('<option value="'+v.subject_id+'">'+v.subject_name+' <span>('+v.subject_type+')</span></option>');
                });
            },'json');

         });

        $(document).on('change','.subject_details',function(){
            $('.teacher_details').empty();
            var subject_id = $(this).val();
            var class_name = $(".class_name").val();
            var division = $(".division").val();
            $.post('<?=site_url('Timetable/fetch_teacher')?>',{subject_id:subject_id,class_name:class_name,division:division},function(data){
                // console.log(data);
                $('.teacher_details').html('<option value="0">Select Teacher</option>');
                $.each(data,function(k,v){
                    $('.teacher_details').append('<option value="'+v.TCDS_employee_profile_id+'">'+v.employee_first_name+' '+v.employee_middle_name+' '+v.employee_last_name+'</option>');
                });
            },'json');
        });

       

        // $(document).on('click','.add_lesson',function(){
        //      var class_name = $(".class_name").val();
        //      var division = $(".division").val();
        //      var subject_name = $(".subject_name").val();
        //      var teacher_name = $(".teacher_name").val();

        //      var topic = $(".topic").val();
        //      var description = $(".description").val();
        //      var date = $(".date_assign").val();
        //      var status = $(".status").val();
        //             console.log(class_name,division,subject_name,teacher_name,topic,description,date,status);

        //         $.post('<?=site_url('Lesson/add_lesson')?>',{class_name:class_name,division:division,subject_name:subject_name,teacher_name:teacher_name,topic:topic,description:description,date:date,status:status},function(data){
        //             // console.log(data);
        //         },'json');
        // });

        

        $(document).ready(function(){

             $('.date').datepicker({
                format:"yyyy-mm-dd",
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            // $('.notification_hide').hide();
            $(document).on('click','#toggle_route',function(){
                $('.notification_hide').toggle();
            });

            <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
                swal({
                    title: "<?=$flash['title']?>",
                    text: "<?=$flash['text']?>",
                    type: "<?=$flash['type']?>"
                });
            <?php } ?>  
            $("#add_lesson").validate({
            	rules: {
            		class_name: {
                        required: true        
                    },
                    division: {
                        required: true        
                    },
                    subject_name: {
                        required: true        
                    },
                    teacher_name: {
                        required: true        
                    },
                    date: {
                        required: true        
                    },
                     topic: {
                        required: true,
                        maxlength: 250           
                    },
                     description: {
            			required: true,
                        maxlength: 250         
            		},

            	},
            	messages: {
                    
            	}
            });

            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [    ]

            });
        });
    </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>0