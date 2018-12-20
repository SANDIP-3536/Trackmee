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

        $('.new_term').hide();
        $('.new_exam').hide();
        $('.new_internal_exam').hide();
        $('.new_exam_marks').hide();
        $('.new_internal_exam_marks').hide();
        $('.new_grade').hide();
        $('.new_exam_schedule').hide();
        $(document).on('click','#new_term',function(){
            $('.new_term').show();
            $('#new_term').hide();
        });
        $(document).on('click','#new_exam',function(){
            $('.new_exam').show();
            $('#new_exam').hide();
        });
        $(document).on('click','#new_internal_exam',function(){
            $('.new_internal_exam').show();
            $('#new_internal_exam').hide();
        });
        $(document).on('click','#new_exam_marks',function(){
            $('.new_exam_marks').show();
            $('#new_exam_marks').hide();
        });
        $(document).on('click','#new_internal_exam_marks',function(){
            $('.new_internal_exam_marks').show();
            $('#new_internal_exam_marks').hide();
        });
        $(document).on('click','#new_grade',function(){
            $('.new_grade').show();
            $('#new_grade').hide();
        });
         $(document).on('click','#new_exam_schedule',function(){
            $('.new_exam_schedule').show();
            $('#new_exam_schedule').hide();
        });
        $(document).on('click','.close_data',function(){
            $('.new_term').hide();
            $('.new_exam').hide();
            $('.new_exam_marks').hide();
            $('.new_internal_exam').hide();
            $('.new_internal_exam_marks').hide();
            $('.new_exam_schedule').hide();
            $('.new_grade').hide();
            $('#new_term').show();
            $('#new_exam').show();
            $('#new_exam_marks').show();
            $('#new_internal_exam').show();
            $('#new_internal_exam_marks').show();
            $('#new_grade').show();
            $('#new_exam_schedule').show();
        });
        

        var today = new Date();
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            minDate:today,
            startDate:today,
            autoclose:true
        }).on('changeDate', function (ev) {
            $(this).datepicker('hide');
        });

        <?php if($exam == 'exam'){?>
             $('#exam').addClass('active');
             document.title = "TrackMee | Exam"
        <?php } ?>

         $('.clockpicker').clockpicker(function(){
             twelvehour: true
        });

        $(document).on('change','.class_details',function(){
            $('.subject_details').empty();
            var class_id = $(this).val();
            // alert(class_id);
            $.post('<?=site_url('Exam/subject_details_class')?>',{class_id:class_id}, function(data){
                console.log(data);
                $('.subject_details').append('<option value = "0">Select Subject</option>');
                $.each(data, function(k,v){
                    $('.subject_details').append('<option value = "'+v.subject_id+'">'+v.subject_name+' <span>('+v.subject_type+')</span></option>');
                });
            },'json');
        });

         $(document).on('change','.exam_name',function(){
            $('.ES_name').empty();
            var exam_id = $(this).val();
            // alert(class_id);
            $.post('<?=site_url('Exam/fetch_exam_schedule_wise_exam')?>',{exam_id : exam_id}, function(data){
                console.log(data);
                $('.ES_name').append('<option value = "0">Select Schedule</option>');
                $.each(data, function(k,v){
                    $('.ES_name').append('<option value = "'+v.exam_sched_id+'">'+v.exam_sched_name+'</option>');
                });
            },'json');
        });

        $(document).ready(function(){

            <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
                swal({
                    title: "<?=$flash['title']?>",
                    text: "<?=$flash['text']?>",
                    type: "<?=$flash['type']?>"
                });
            <?php } ?> 

            $("#addTerm").validate({
            	rules: {
            		term_name: {
            			required: true,
                        pattern:/^[a-zA-Z0-9\s]*$/        
            		},
                    term_start_date: {
                        required: true        
                    },
                    term_end_date: {
                        required: true     
                    }
            	},
            	messages: {
                    term_name:{
                        pattern:"Please Enter only charater or digits."
                    }
            	}
            });

            $("#addExam").validate({
                rules: {
                    exam_sched_exam_id: {
                        min: 1        
                    },
                    exam_name:{
                        required:true,
                        pattern:/^[a-zA-Z0-9\s]*$/
                    },
                    exam_total_weightage: {
                        required: true, 
                        digits:true       
                    },
                    exam_term_id: {
                        min:1    
                    }
                },
                messages: {
                    exam_term_id:{
                        min:"Please select the exam term."
                    },
                    exam_name:{
                        pattern:"Please Enter only charater or digits."
                    }
                }
            });

            $("#addExamScedule").validate({
                rules: {
                    exam_sched_exam_id: {
                        min: 1        
                    },
                    exam_sched_name: {
                        required: true      
                    },
                    exam_sched_class_id: {
                        min:1    
                    },
                    exam_sched_subject_id:{
                        min:1
                    },
                    exam_sched_date:{
                        required:true
                    },
                    exam_sched_start_time:{
                        required:true
                    },
                    exam_sched_end_time:{
                        required:true
                    },
                    exam_sched_total_marks:{
                        required:true
                    },
                    exam_sched_result_datetime:{
                        required:true
                    }
                },
                messages: {
                    exam_sched_exam_id:{
                        min:"Please select the exam."
                    },
                    exam_sched_class_id:{
                        min:"Please select the class."
                    },
                    exam_sched_subject_id:{
                        min:"Please select the subject."
                    }
                }
            });

            $("#addGrade").validate({
                rules: {
                    GC_grade: {
                        required:true        
                    },
                    GC_higher_mark_range: {
                        required: true,
                        digits:true       
                    },
                    GC_lower_mark_range: {
                        required: true, 
                        digits:true
                    }
                },
                messages: {
                }
            });

            $("#addIExam").validate({
                rules: {
                    IE_title: {
                        required:true        
                    },
                    IE_submission_date: {
                        required: true    
                    },
                    IE_description: {
                        required: true
                    },
                    IE_exam_sched_id: {
                        required: true,
                        min:1
                    },
                    IE_TCDS_id: {
                        required: true,
                        min:1
                    }
                },
                messages: {
                    IE_exam_sched_id:{
                        min:"Please select the exam."
                    },
                    IE_TCDS_id:{
                        min:"Please select class subject."
                    }
                }
            });

            $("#addEMark").validate({
                rules: {
                    exam_marks_exam_id: {
                        required: true,
                        min:1
                    },
                    exam_marks_exam_sched_id: {
                        required: true,
                        min:1
                    },
                    exam_marks_student_id: {
                        required: true,
                        min:1
                    },
                    exam_weightage: {
                        required:true,
                        digits:true        
                    },
                    exam_marks: {
                        required: true,
                        digits:true   
                    }
                },
                messages: {
                    exam_marks_exam_id:{
                        min:"Please select the exam."
                    },
                    exam_marks_student_id:{
                        min:"Please select the student."
                    },
                    exam_marks_exam_sched_id:{
                        min:"Please select Exam Schedule."
                    }
                }
            });

            $("#addIExam_marks").validate({
                rules: {
                    IEM_IE_id: {
                        required: true,
                        min:1
                    },
                    IEM_student_id: {
                        required: true,
                        min:1
                    },
                    IEM_marks: {
                        required:true,
                        digits:true     
                    }
                },
                messages: {
                    IEM_IE_id:{
                        min:"Please select the internal exam."
                    },
                    IEM_student_id:{
                        min:"Please select the student."
                    }
                }
            });



            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [    ],
                "language": {
                    "emptyTable": "<img src='<?=base_url()?>/assets/img/No-record-found.png'> "
                }

            });
        });
    </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>