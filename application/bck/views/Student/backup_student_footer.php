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

    <script src="<?=base_url()?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>
    
    <!-- clockpicker -->
     <script src="<?=base_url()?>assets/js/plugins/clockpicker/clockpicker.js"></script>
    
    <script src="<?= base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/validate/additional-methods.min.js"></script>
     <script type="text/javascript">
        // setInterval(function(){auto_refresh_function();}, 5000);
        // function auto_refresh_function() {
        //     // alert("hii");
        //     $('#load_content').load('<?=site_url('Tracking/view_map_table_update')?>');
        // }
     </script>

    <script>


        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            }
        });

        <?php if($student = 'student') {?>
            $('#student').addClass('active');
            $('#user').addClass('active');
            document.title = "TrackMee | Student"
        <?php } ?>

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
	            endDate: "today",
	            maxDate: today
	        });

	        $(document).on('change','.class_details',function(){
	            $('.division_details').empty();
	            $('.fee_details').empty();
	            var class_id = $(this).val();
	            $.post('<?=site_url('Student/fetch_class_division')?>',{class_id:class_id},function(data){
	                console.log(data);
	                $('.division_details').html('<option value="0">Select Division</option>');
	                $.each(data,function(k,v){
	                    $('.division_details').append('<option value="'+v.division_id+'">'+v.division_name+'</option>');
	                });
	            },'json');

	             $.post('<?=site_url('Student/fetch_class_fee_types')?>',{class_id:class_id},function(data){
	                console.log(data);
	                var i=0;
	                $.each(data, function(k,v){
	                	i = i+1;
	                    $('.fee_details').append('<div class="form-group">'+
                            '<label class="col-sm-1 control-label">'+i+'</label>'+
                            '<label class="col-sm-2 control-label" style="text-align:center;">'+v.fees_type_name+'</label>'+
                            '<div class="col-sm-2" style="text-align:left;">'+    
                                '<input type="text" class="form-control"  value="'+((v.fees_type_amount).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"))+'" readonly>'+
                                '<input type="text" class="form-control hidden"  name="total_fee_amount[]" value="'+v.fees_type_amount+'" readonly>'+
                            '</div>'+
                            '<div class="col-sm-2" style="text-align:left;">'+
                                '<input type="text" class="form-control"  name="fee_waiver_name[]" >'+
                            '</div>'+
                            '<div class="col-sm-2" style="text-align:left;">'+
                                '<input type="text" class="form-control"  name="fee_waiver_amount[]" value="00">'+
                            '</div>'+
                            '<div class="col-sm-1" style="text-align:center;">'+
                                '<label class="checkbox-inline i-checks checked">'+'<input type="checkbox" name="fee_type_id[]" value="'+v.fees_type_id+'" checked=""></label>'+ 
                            '</div>'+
                    '</div>');
	                });
	            },'json');
	        });

	        $('.profile_hide').hide();
	        $(document).on('click','.edit_profile',function(){
	        	$('.profile_hide').toggle();
	        });
	        $('.update_functionality').hide();
            $(document).on('click','.edit_functionality',function(){
                $('.update_functionality').show();
                $('.functionality').hide();
            });

	        $('.document_toggle').hide();
	        $(document).on('click','#toggle_document',function(){
	            $('.document_toggle').toggle();
	        });

	        $('.deactive').hide();
	        $('.grid').hide();
	        $(document).on('click','.stu_deactive',function(){
	        	$('.deactive').show();	
	        	$('.aactive').hide();	
	        });
	        $(document).on('click','.stu_active',function(){
	        	$('.deactive').hide();	
	        	$('.aactive').show();	
	        });
	        $(document).on('click','.list_view',function(){
	        	$('.deactive').hide();	
	        	$('.grid').show();	
	        	$('.list').hide();	
	        });
	        $(document).on('click','.grid_view',function(){
	        	$('.deactive').hide();	
	        	$('.grid').hide();	
	        	$('.list').show();	
	        });

	        $('.father_details').click(function() {
			    if( $('.father_details:checked').length > 0 ) {
			        $("#father_details").show();
			    } else {
			        $("#father_details").hide();
			    }
			});  

	        $("#mother_details").hide();
	        $('.mother_details').click(function() {
			    if( $('.mother_details:checked').length > 0 ) {
			        $("#mother_details").show();
			    } else {
			        $("#mother_details").hide();
			    }
			});

			$("#gardien_details").hide();
	        $('.gardien_details').click(function() {
			    if( $('.gardien_details:checked').length > 0 ) {
			        $("#gardien_details").show();
			    } else {
			        $("#gardien_details").hide();
			    }
			});  

	        $(document).on('change','.mobile',function(){
                var num  = $(this).val();
                var name = $('.student_first_name').val();
                var parent = $('.parent_first_name').val();
                // alert(name);
                $.post('<?=site_url('Student/already_exits_mobile')?>',{num:num, name:name,parent:parent}, function(res){
                    console.log(res);
                    if(res == 0){
                        $('.mobile_verification').hide();
                        $('.mobile_verification').text('');
                    }
                    else{
                        $('.mobile_verification').show();
                        $('.mobile_verification').text('Mobile Number and First Name Alredy Exits.');
                    }
                },'json');
            });

            $("#submit").click(function(){
		    $("parent_first_name").each(function(){
		      $(this).rules("add", {
		        required: true,
		        messages: {
		          required: "Specify a valid email"
		        }
		      });   
		    })
		  });
	            $("#addStudent").validate({
	            rules: {
	                student_first_name: {
	                    required: true,
	                    pattern: /^[a-zA-Z\s]*$/
	                },
	                student_last_name: {
	                    required: true,
	                    pattern: /^[a-zA-Z\s]*$/
	                },
	                student_gender: {
	                    required: true
	                },
	                student_DOB:{
	                	required:true
	                },
	                student_PRN:{
	                	required:true
	                },
	                student_nationality:{
	                	required:true
	                },
	                student_adhar_card_number:{
	                	required:true,
	                	minlength:12,
	                	maxlength:12,
	                	digits:true
	                },
	                student_category:{
	                	required:true
	                },
	                student_permament_address:{
	                	required:true
	                },
	                student_present_address:{
	                	required:true
	                },
	                parent_type: {
	                	required: true
	                },
	                parent_first_name: {
	                    required: true,
	                    pattern: /^[a-zA-Z\s]*$/
	                },
	                parent_last_name: {
	                    required: true,
	                    pattern: /^[a-zA-Z\s]*$/
	                },
	                parent_gender: {
	                    required: true
	                },
	                parent_DOB:{
	                	required:true
	                },
	                parent_address:{
	                	required:true
	                },
	                parent_mobile_number: {
	                    required: true,
	                    digits: true,
	                    minlength: 10,
	                    maxlength: 10
	                },
	                // parent_email_id: {
	                //     required: true,
	                //     pattern: /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
	                //     email: true
	                // },
	              	doc_name:{
	              		required:true,
	              		min:1
	              	},
	              	doc_file:{
	              		required:true
	              	},
	              	doc_number:{
	              		required:true
	              	}
	            },
	            messages: {
	                student_first_name: {
	                    required: "Please enter student First name.",
	                    pattern:"Please enter only alphabets"
	                },
	                student_last_name: {
	                    required: "Please enter student Last name.",
	                    pattern:"Please enter only alphabets"
	                },
	                student_DOB:{
	                	required:"Please Select Student Date Of Birth."
	                },
	                student_address:{
	                	required:"Please enter Student Address."
	                },
	                student_pri_mobile_number: {
	                    required: "Please enter customer mobile no.",
	                    digits: "Please enter 10 digit mobile no.",
	                    minlength: "Please enter 10 digit mobile no.",
	                    maxlength: "Please enter 10 digit mobile no."
	                },
	                student_adhar_card_number:{
	                	required: "Please enter student Adhar Card Number.",
	                    digits: "Please enter 12 digit Adhar Card Number.",
	                    minlength: "Please enter 12 digit Adhar Card Number.",
	                    maxlength: "Please enter 12 digit Adhar Card Number."
	                },
	                student_category:{
	                	min:"Please select student category"
	                },
	                student_pri_email_id: {
	                    required: "Please enter Email.",
	                    pattern:"Please enter valid format of email.",
	                    email: "Please enter Correct Email"
	                },
	                student_sec_mobile_number: {
	                    required: "Please enter customer mobile no.",
	                    digits: "Please enter 10 digit mobile no.",
	                    minlength: "Please enter 10 digit mobile no.",
	                    maxlength: "Please enter 10 digit mobile no."
	                },
	                doc_name:{
	                	min:"Please Select Document Name."
	              	},
	                student_sec_email_id: {
	                    required: "Please enter Email.",
	                    pattern:"Please enter valid format of email.",
	                    email: "Please enter Correct Email"
	                }
	            }
	        });

 			$("[name^=parent_first_name]").each(function () {
		        $(this).rules("add", {
		            required: true,
		            pattern: /^[a-zA-Z\s]*$/
		        });
		    });

		    $("[name^=parent_last_name]").each(function () {
		        $(this).rules("add", {
		            required: true,
		            pattern: /^[a-zA-Z\s]*$/
		        });
		    });

		    $("[name^=parent_DOB]").each(function () {
		        $(this).rules("add", {
		            required: true
		        });
		    });

		    $("[name^=parent_gender]").each(function () {
		        $(this).rules("add", {
		            required: true,
		        });
		    });

		    $("[name^=parent_mobile_number]").each(function () {
		        $(this).rules("add", {
		            required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
		        });
		    });

		    $("[name^=parent_address]").each(function () {
		        $(this).rules("add", {
		            required: true
		        });
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

	            $(".select2_demo_2").select2({
	                
	            });
	        });
	    </script>



	    
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>