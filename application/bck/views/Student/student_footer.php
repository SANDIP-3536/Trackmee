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
    <!-- form wizards steps -->
    <script src="<?= base_url();?>assets/js/plugins/staps/jquery.steps.js"></script>
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
     var settings = {
	    labels: {
	        finish: "Submit"
	    }
	};
        $("#wizard").steps(settings);

            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    // form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();

                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.after(error);
                        },
                        rules: {
                            student_admission_date: {
			                    required: true
			                },
			                student_reg_date: {
			                    required: true
			                },
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
			                student_GRN_regular:{
			                	required:true,
			                	pattern:/^[a-zA-Z0-9\s]*$/ 
			                },
			                student_GRN_auto:{
			                	required:true,
			                	pattern:/^[a-zA-Z0-9\s]*$/ 
			                },
			                student_nationality:{
			                	required:true,
			                	pattern: /^[a-zA-Z\s]*$/
			                },
			                student_birth_place:{
			                	pattern: /^[a-zA-Z\s]*$/
			                },
			                student_mother_tongue:{
			                	pattern: /^[a-zA-Z\s]*$/
			                },
			                student_religion:{
			                	pattern: /^[a-zA-Z\s]*$/
			                },
			                student_cast:{
			                	pattern: /^[a-zA-Z\s]*$/
			                },
			                SCD_class_id:{
			                	required:true,
			                	min:1
			                },
			                student_adhar_card_number:{
			                	// required:true,
			                	minlength:12,
			                	maxlength:12,
			                	digits:true
			                },
			                student_present_house_no:{
			                	pattern:/^[a-zA-Z0-9\s\/]*$/
			                },
			                student_present_town:{
			                	required:true,
			                	pattern:/^[a-zA-Z0-9\s]*$/
			                },
			                student_present_tal:{
			                	required:true,
			                	pattern:/^[a-zA-Z\s]*$/
			                },
			                student_present_dist:{
			                	required:true,
			                	pattern:/^[a-zA-Z\s]*$/
			                },
			                student_present_state:{
			                	required:true
			                },
			                student_present_pincode:{
			                	required:true,
			                	minlength:6,
			                	maxlength:6,
			                	digits:true
			                },
			                student_permament_house_no:{
			                	pattern:/^[a-zA-Z0-9\s\/]*$/
			                },
			                student_permament_town:{
			                	pattern:/^[a-zA-Z0-9\s]*$/
			                },
			                student_permament_tal:{
			                	pattern:/^[a-zA-Z\s]*$/
			                },
			                student_permament_dist:{
			                	pattern:/^[a-zA-Z\s]*$/
			                },
			                student_permament_pincode:{
			                	minlength:6,
			                	maxlength:6,
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
			                    pattern: /^[a-zA-Z\s]*$/,
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
			                parent_email_id: {
			                    pattern: /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
			                },
			              	doc_name:{
			              		required:true,
			              	},
			              	doc_file:{
			              		required:true
			              	},
			              	doc_number:{
			              		required:true
			              	}
                        },
                        message:{
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
			                student_nationality: {
			                    pattern:"Please enter only alphabets"
			                },
			                student_mother_tongue: {
			                    pattern:"Please enter only alphabets"
			                },
			                student_religion: {
			                    pattern:"Please enter only alphabets"
			                },
			                student_cast: {
			                    pattern:"Please enter only alphabets"
			                },
			                student_birth_place: {
			                    pattern:"Please enter only alphabets"
			                },
			                student_present_house_no:{
			                	required:"Please enter this Details",
			                	pattern:"Please enter only character and digits."
			                },
			                student_present_town:{
			                	required:"Please enter this Details",
			                	pattern:"Please enter only character."
			                },
			                student_present_tal:{
			                	required:"Please enter this Details",
			                	pattern:"Please enter only character."
			                },
			                student_present_dist:{
			                	required:"Please enter this Details",
			                	pattern:"Please enter only character."
			                },
			                student_present_state:{
			                	required:"Please enter this Details"
			                },
			                student_present_pincode:{
			                	required:"Please enter this Details",
			                	digits: "Please enter 06 digit pincode.",
			                    minlength: "Please enter 06 digit pincode.",
			                    maxlength: "Please enter 06 digit pincode."
			                },
			                student_permament_house_no:{
			                	required:"Please enter this Details",
			                	pattern:"Please enter only character and digits."
			                },
			                student_permament_town:{
			                	required:"Please enter this Details",
			                	pattern:"Please enter only character."
			                },
			                student_permament_tal:{
			                	required:"Please enter this Details",
			                	pattern:"Please enter only character."
			                },
			                student_permament_dist:{
			                	required:"Please enter this Details",
			                	pattern:"Please enter only character."
			                },
			                student_permament_state:{
			                	required:"Please enter this Details"
			                },
			                student_permament_pincode:{
			                	required:"Please enter this Details",
			                	digits: "Please enter 06 digit pincode.",
			                    minlength: "Please enter 06 digit pincode.",
			                    maxlength: "Please enter 06 digit pincode."
			                },
			                student_adhar_card_number:{
			                	// required: "Please enter student Adhar Card Number.",
			                    digits: "Please enter 12 digit Adhar Card Number.",
			                    minlength: "Please enter 12 digit Adhar Card Number.",
			                    maxlength: "Please enter 12 digit Adhar Card Number."
			                },
			                student_category:{
			                	min:"Please select student category"
			                },
			                student_GRN_regular:{
			                	pattern:"Please Enter only charater or digits." 
			                },
			                student_GRN_auto:{
			                	pattern:"Please Enter only charater or digits." 
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
			                SCD_class_id:{
		                        min: "Please Select Class."
		                    },
		                    SCD_division_id:{
		                        min: "Please Select Division."
		                    },
			                student_sec_email_id: {
			                    required: "Please enter Email.",
			                    pattern:"Please enter valid format of email.",
			                    email: "Please enter Correct Email"
			                }
                        }
                    });
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

        function capitalize(textboxid, str) {
      		// string with alteast one character
	      	if (str && str.length >= 1)
	      	{       
	        	var firstChar = str.charAt(0);
	          	var remainingStr = str.slice(1);
	          	str = firstChar.toUpperCase() + remainingStr.toLowerCase();
	      	}
	      	document.getElementById(textboxid).value = str;
	  	}

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

	         $('.datepicker1').datepicker({
	            format: 'yyyy-mm-dd',
	            autoclose:true,
	        });

	        $(".blood_group option").val(function(idx, val) {
			  	$(this).siblings("[value='"+ val +"']").remove();
			});

	        $(document).on('click','.father_detaills_view',function(){
	        	$('#mother_details_view,#gardien_details_view,#student_details_view,#father_details_view').removeClass();
	        	$('#father_details_view').addClass('row animated fadeInRight');
	        	$('#mother_details_view,#gardien_details_view,#student_details_view').addClass('row animated fadeInRight hidden');
	        });
	        $(document).on('click','.mother_detaills_view',function(){
	        	$('#mother_details_view,#gardien_details_view,#student_details_view,#father_details_view').removeClass();
	        	$('#mother_details_view').addClass('row animated fadeInRight');
	        	$('#father_details_view,#gardien_details_view,#student_details_view').addClass('row animated fadeInRight hidden');
	        });
	        $(document).on('click','.gardien_detaills_view',function(){
	        	$('#mother_details_view,#gardien_details_view,#student_details_view,#father_details_view').removeClass();
	        	$('#gardien_details_view').addClass('row animated fadeInRight');
	        	$('#mother_details_view,#father_details_view,#student_details_view').addClass('row animated fadeInRight hidden');
	        });
	        $(document).on('click','.student_detaills_view',function(){
	        	$('#mother_details_view,#gardien_details_view,#student_details_view,#father_details_view').removeClass();
	        	$('#student_details_view').addClass('row animated fadeInRight');
	        	$('#mother_details_view,#father_details_view,#gardien_details_view').addClass('row animated fadeInRight hidden');
	        });

	        $(document).on('change','.regular_generate',function(){
	        	var GRN = $(this).val();
	        	// alert(GRN);
	        	$.post('<?=site_url('Student/GRN_verification')?>',{GRN:GRN},function(data){
	        		// console.log(data);
	        		if(data == 0){
                        $('.GRN_verification').hide();
                        $('.GRN_verification').text('');
                        $('.enableOnInput').prop('disabled', false);
                    }
                    else{
                        $('.GRN_verification').show();
                        $('.GRN_verification').text('GRN Number Alredy Exits.');
                        $('.enableOnInput').prop('disabled', true);
                    }
	        	},'json');
	        });

	        $(document).on('change','.auto_generate',function(){
	        	var GRN = $(this).val();
	        	// alert(GRN);
	        	$.post('<?=site_url('Student/GRN_verification')?>',{GRN:GRN},function(data){
	        		// console.log(data);
	        		if(data == 0){
                        $('.GRN_verification_auto').hide();
                        $('.GRN_verification_auto').text('');
                        $('.enableOnInput').prop('disabled', false);
                    }
                    else{
                        $('.GRN_verification_auto').show();
                        $('.GRN_verification_auto').text('GRN Number Alredy Exits.');
                        $('.enableOnInput').prop('disabled', true);
                    }
	        	},'json');
	        })

	         $('.copy_student_permament_address').click(function() {
	        	if($('.copy_student_permament_address:checked').length > 0 ){
		        	var house= $('.student_present_pre_house').val();
		        	var town= $('.student_present_pre_town').val();
		        	var taluka= $('.student_present_pre_tal').val();
		        	var district= $('.student_present_pre_dist').val();
		        	var state= $('.student_present_pre_state').val();
		        	var pincode= $('.student_present_pre_pincode').val();
		        	$('.student_permament_pre_house').val(house);
		        	$('.student_permament_pre_town').val(town);
		        	$('.student_permament_pre_tal').val(taluka);
		        	$('.student_permament_pre_dist').val(district);
		        	$('.student_permament_pre_state').val(state);
		        	$('.student_permament_pre_pincode').val(pincode);
		        }else{
		        	$('.student_permament_pre_house').val("Enter the House No./Street Name/Landmark.");
		        	$('.student_permament_pre_town').val("Enter the Home Town.");
		        	$('.student_permament_pre_tal').val("Enter the taluka.");
		        	$('.student_permament_pre_dist').val("Enter the District.");
		        	$('.student_permament_pre_pincode').val("Enter the Pin Code.");
		        }
	        });

 			$('.student_father_address').click(function() {
	        	if($('.student_father_address:checked').length > 0 ){
		        	var house= $('.student_present_pre_house').val();
		        	var town= $('.student_present_pre_town').val();
		        	var taluka= $('.student_present_pre_tal').val();
		        	var district= $('.student_present_pre_dist').val();
		        	var state= $('.student_present_pre_state').val();
		        	var pincode= $('.student_present_pre_pincode').val();
		        	$('.parent_permament_father_house').val(house);
		        	$('.parent_permament_father_town').val(town);
		        	$('.parent_permament_father_tal').val(taluka);
		        	$('.parent_permament_father_dist').val(district);
		        	$('.parent_permament_father_state').val(state);
		        	$('.parent_permament_father_pincode').val(pincode);
		        }else{
		        	$('.parent_permament_father_house').val("Enter the House No./Street Name/Landmark.");
		        	$('.parent_permament_father_town').val("Enter the Home Town.");
		        	$('.parent_permament_father_tal').val("Enter the taluka.");
		        	$('.parent_permament_father_dist').val("Enter the District.");
		        	$('.parent_permament_father_pincode').val("Enter the Pin Code.");
		        }
	        });

	       	$('.student_mother_address').click(function() {
	        	if($('.student_mother_address:checked').length > 0 ){
		        	var house= $('.student_present_pre_house').val();
		        	var town= $('.student_present_pre_town').val();
		        	var taluka= $('.student_present_pre_tal').val();
		        	var district= $('.student_present_pre_dist').val();
		        	var state= $('.student_present_pre_state').val();
		        	var pincode= $('.student_present_pre_pincode').val();
		        	// alert(house);
		        	$('.parent_permament_mother_house').val(house);
		        	$('.parent_permament_mother_town').val(town);
		        	$('.parent_permament_mother_tal').val(taluka);
		        	$('.parent_permament_mother_dist').val(district);
		        	$('.parent_permament_mother_state').val(state);
		        	$('.parent_permament_mother_pincode').val(pincode);
		        }else{
		        	$('.parent_permament_mother_house').val("Enter the House No./Street Name/Landmark.");
		        	$('.parent_permament_mother_town').val("Enter the Home Town.");
		        	$('.parent_permament_mother_tal').val("Enter the taluka.");
		        	$('.parent_permament_mother_dist').val("Enter the District.");
		        	$('.parent_permament_mother_pincode').val("Enter the Pin Code.");
		        }
	        });

 				$('.student_gardien_address').click(function() {
	        	if($('.student_gardien_address:checked').length > 0 ){
		        	var house= $('.student_present_pre_house').val();
		        	var town= $('.student_present_pre_town').val();
		        	var taluka= $('.student_present_pre_tal').val();
		        	var district= $('.student_present_pre_dist').val();
		        	var state= $('.student_present_pre_state').val();
		        	var pincode= $('.student_present_pre_pincode').val();
		        	// alert(house);
		        	$('.parent_permament_gardien_house').val(house);
		        	$('.parent_permament_gardien_town').val(town);
		        	$('.parent_permament_gardien_tal').val(taluka);
		        	$('.parent_permament_gardien_dist').val(district);
		        	$('.parent_permament_gardien_state').val(state);
		        	$('.parent_permament_gardien_pincode').val(pincode);
		        }else{
		        	$('.parent_permament_gardien_house').val("Enter the House No./Street Name/Landmark.");
		        	$('.parent_permament_gardien_town').val("Enter the Home Town.");
		        	$('.parent_permament_gardien_tal').val("Enter the taluka.");
		        	$('.parent_permament_gardien_dist').val("Enter the District.");
		        	$('.parent_permament_gardien_pincode').val("Enter the Pin Code.");
		        }
	        })

	        $(document).on('click','.student_details',function(){
	        	var student_id = $(this).find('.student_details_profile').text();
	        	window.location.href = "<?php  echo site_url('Student/update_student/"+student_id+"'); ?>";
	        });

	        $('#GRN_number_change').click(function() {
		        $('#auto_generate').removeClass();
		        $('#auto_generate').addClass('form-control');
		        $('#GRN_number_change').removeClass();
		        $('#GRN_number_change').addClass('btn btn-xs btn-primary hidden');
		        $('#regular_generate').removeClass();
		        $('#regular_generate').addClass('form-control hidden');
		        $('#auto_generate_change').removeClass();
		        $('#auto_generate_change').addClass('btn btn-xs btn-primary');
	        })
	        $('#auto_generate_change').click(function() {
		        $('#auto_generate').removeClass();
		        $('#auto_generate').addClass('form-control hidden');
		        $('#GRN_number_change').removeClass();
		        $('#GRN_number_change').addClass('btn btn-xs btn-primary');
		        $('#regular_generate').removeClass();
		        $('#regular_generate').addClass('form-control');
		        $('#auto_generate_change').removeClass();
		        $('#auto_generate_change').addClass('btn btn-xs btn-primary hidden');
	        })

	        $('.copy_address2').click(function() {
	        	if($('.copy_address2:checked').length > 0 ){
		        	var address= $('.student_pre_address1').val();
		        	$('.gardien_student_address').val(address);
	        	}else{
		        	var address= $('').val();
		        	$('.gardien_student_address').val(address);
		        }
	        })

	        $(document).on('change','.class_details',function(){
	            // $('.division_details').empty();
	            $('.fee_details').empty();
	            var class_id = $(this).val();
	        //     $.post('<?=site_url('Student/fetch_class_division')?>',{class_id:class_id},function(data){
	        //         console.log(data);
	        //         $('.division_details').html('<option value="0">Select Division</option>');
	        //         $.each(data,function(k,v){
	        //             $('.division_details').append('<option value="'+v.division_id+'">'+v.division_name+'</option>');
	        //         });
	        //     },'json');

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

 			$('#deleteDoc').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.id;
                $('.doc_id_delete').val(id);
            });

            $('#resetPassword').on('show.bs.modal', function(e) {
                $('.parent_reset_password').empty();
                var id = e.relatedTarget.id;	
                $('.parent_reset_password').val(id);
            });

	        $('.profile_hide').hide();
	        $('.father_profile_hide').hide();
	        $('.mother_profile_hide').hide();
	        $('.gardien_profile_hide').hide();
	        $(document).on('click','.edit_profile',function(){
	        	$('.profile_hide').show();
	        	$('.edit_profile').hide();
	        	$('#close_edit_profile').removeClass();
	        	$('#close_edit_profile').addClass('btn btn-xs btn-white');
	        });
	        $(document).on('click','#close_edit_profile',function(){
	        	$('.profile_hide').hide();
	        	$('.edit_profile').show();
	        	$('#close_edit_profile').removeClass();
	        	$('#close_edit_profile').addClass('btn btn-xs btn-white hidden');
	        });
	        $(document).on('click','.father_edit_profile',function(){
	        	$('.father_profile_hide').show();
	        	$('.father_edit_profile').hide();
	        	$('#close_father_edit_profile').removeClass();
	        	$('#close_father_edit_profile').addClass('btn btn-xs btn-white');
	        });
	        $(document).on('click','#close_father_edit_profile',function(){
	        	$('.father_profile_hide').hide();
	        	$('.father_edit_profile').show();
	        	$('#close_father_edit_profile').removeClass();
	        	$('#close_father_edit_profile').addClass('btn btn-xs btn-white hidden');
	        });
	        $(document).on('click','.mother_edit_profile',function(){
	        	$('.mother_profile_hide').show();
	        	$('.mother_edit_profile').hide();
	        	$('#close_mother_edit_profile').removeClass();
	        	$('#close_mother_edit_profile').addClass('btn btn-xs btn-white');
	        });
	        $(document).on('click','#close_mother_edit_profile',function(){
	        	$('.mother_profile_hide').hide();
	        	$('.mother_edit_profile').show();
	        	$('#close_mother_edit_profile').removeClass();
	        	$('#close_mother_edit_profile').addClass('btn btn-xs btn-white hidden');
	        });
	        $(document).on('click','.gardien_edit_profile',function(){
	        	$('.gardien_profile_hide').show();
	        	$('.gardien_edit_profile').hide();
	        	$('#close_gardien_edit_profile').removeClass();
	        	$('#close_gardien_edit_profile').addClass('btn btn-xs btn-white');
	        });
	        $(document).on('click','#close_gardien_edit_profile',function(){
	        	$('.gardien_profile_hide').hide();
	        	$('.gardien_edit_profile').show();
	        	$('#close_gardien_edit_profile').removeClass();
	        	$('#close_gardien_edit_profile').addClass('btn btn-xs btn-white hidden');
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


	        $('.AC_details').click(function() {
			    if( $('.AC_details:checked').length > 0 ) {
			        $("#AC_details").show();
			    } else {
			        $("#AC_details").hide();
			    }
			});

			$("#LC_details").hide();
	        $('.LC_details').click(function() {
			    if( $('.LC_details:checked').length > 0 ) {
			        $("#LC_details").show();
			    } else {
			        $("#LC_details").hide();
			    }
			});

			$("#BC_details").hide();
	        $('.BC_details').click(function() {
			    if( $('.BC_details:checked').length > 0 ) {
			        $("#BC_details").show();
			    } else {
			        $("#BC_details").hide();
			    }
			});

			$("#TC_details").hide();
	        $('.TC_details').click(function() {
			    if( $('.TC_details:checked').length > 0 ) {
			        $("#TC_details").show();
			    } else {
			        $("#TC_details").hide();
			    }
			});

			$("#MC_details").hide();
	        $('.MC_details').click(function() {
			    if( $('.MC_details:checked').length > 0 ) {
			        $("#MC_details").show();
			    } else {
			        $("#MC_details").hide();
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
	                student_admission_date: {
	                    required: true
	                },
	                student_reg_date: {
	                    required: true
	                },
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
	                student_GRN_regular:{
	                	required:true,
	                	pattern:/^[a-zA-Z0-9\s]*$/ 
	                },
	                student_GRN_auto:{
	                	required:true,
	                	pattern:/^[a-zA-Z0-9\s]*$/ 
	                },
	                student_nationality:{
	                	required:true,
	                	pattern: /^[a-zA-Z\s]*$/
	                },
	                student_birth_place:{
	                	pattern: /^[a-zA-Z\s]*$/
	                },
	                student_mother_tongue:{
	                	pattern: /^[a-zA-Z\s]*$/
	                },
	                student_religion:{
	                	pattern: /^[a-zA-Z\s]*$/
	                },
	                student_cast:{
	                	pattern: /^[a-zA-Z\s]*$/
	                },
	                SCD_class_id:{
	                	required:true,
	                	min:1
	                },
	                SCD_division_id:{
	                	required:true,
	                	min:1
	                },
	                student_adhar_card_number:{
	                	// required:true,
	                	minlength:12,
	                	maxlength:12,
	                	digits:true
	                },
	                student_present_house_no:{
	                	// required:true,
	                	pattern:/^[a-zA-Z0-9\s\/]*$/
	                },
	                student_present_town:{
	                	required:true,
	                	pattern:/^[a-zA-Z0-9\s]*$/
	                },
	                student_present_tal:{
	                	required:true,
	                	pattern:/^[a-zA-Z\s]*$/
	                },
	                student_present_dist:{
	                	required:true,
	                	pattern:/^[a-zA-Z\s]*$/
	                },
	                student_present_state:{
	                	required:true
	                },
	                student_present_pincode:{
	                	required:true,
	                	minlength:6,
	                	maxlength:6,
	                	digits:true
	                },
	                student_permament_house_no:{
	                	// required:true,
	                	pattern:/^[a-zA-Z0-9\s\/]*$/
	                },
	                student_permament_town:{
	                	// required:true,
	                	pattern:/^[a-zA-Z0-9\s]*$/
	                },
	                student_permament_tal:{
	                	// required:true,
	                	pattern:/^[a-zA-Z\s]*$/
	                },
	                student_permament_dist:{
	                	// required:true,
	                	pattern:/^[a-zA-Z\s]*$/
	                },
	                student_permament_state:{
	                	// required:true
	                },
	                student_permament_pincode:{
	                	// required:true,
	                	minlength:6,
	                	maxlength:6,
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
	                student_permament_town:{
	                	required:true
	                },
	                student_permament_tal:{
	                	required:true,
	                	pattern: /^[a-zA-Z\s]*$/
	                },
	                student_permament_dist:{
	                	required:true,
	                	pattern: /^[a-zA-Z\s]*$/
	                },
	                student_permament_pincode:{
	                	required:true,
	                	minlength:6,
	                	maxlength:6,
	                	digits:true
	                },
	                parent_mobile_number: {
	                    required: true,
	                    digits: true,
	                    minlength: 10,
	                    maxlength: 10
	                },
	                parent_email_id: {
	                    pattern: /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
	                },
	              	doc_name:{
	              		required:true,
	              	},
	              	doc_file:{
	              		required:true
	              	},
	              	doc_number:{
	              		required:true
	              	},
	              	doc_type:{
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
	                student_nationality: {
	                    pattern:"Please enter only alphabets"
	                },
	                student_mother_tongue: {
	                    pattern:"Please enter only alphabets"
	                },
	                student_religion: {
	                    pattern:"Please enter only alphabets"
	                },
	                student_cast: {
	                    pattern:"Please enter only alphabets"
	                },
	                student_birth_place: {
	                    pattern:"Please enter only alphabets"
	                },
	                student_present_house_no:{
	                	required:"Please enter this Details",
	                	pattern:"Please enter only character and digits."
	                },
	                student_present_town:{
	                	required:"Please enter this Details",
	                	pattern:"Please enter only character."
	                },
	                student_present_tal:{
	                	required:"Please enter this Details",
	                	pattern:"Please enter only character."
	                },
	                student_present_dist:{
	                	required:"Please enter this Details",
	                	pattern:"Please enter only character."
	                },
	                student_present_state:{
	                	required:"Please enter this Details"
	                },
	                student_present_pincode:{
	                	required:"Please enter this Details",
	                	digits: "Please enter 06 digit pincode.",
	                    minlength: "Please enter 06 digit pincode.",
	                    maxlength: "Please enter 06 digit pincode."
	                },
	                student_permament_house_no:{
	                	required:"Please enter this Details",
	                	pattern:"Please enter only character and digits."
	                },
	                student_permament_town:{
	                	required:"Please enter this Details",
	                	pattern:"Please enter only character."
	                },
	                student_permament_tal:{
	                	required:"Please enter this Details",
	                	pattern:"Please enter only character."
	                },
	                student_permament_dist:{
	                	required:"Please enter this Details",
	                	pattern:"Please enter only character."
	                },
	                student_permament_state:{
	                	required:"Please enter this Details"
	                },
	                student_permament_pincode:{
	                	required:"Please enter this Details",
	                	digits: "Please enter 06 digit pincode.",
	                    minlength: "Please enter 06 digit pincode.",
	                    maxlength: "Please enter 06 digit pincode."
	                },
	                parent_permament_town:{
	                	required:"Please enter this Details",
	                	pattern:"Please enter only character."
	                },
	                parent_permament_tal:{
	                	required:"Please enter this Details",
	                	pattern:"Please enter only character."
	                },
	                parent_permament_dist:{
	                	required:"Please enter this Details",
	                	pattern:"Please enter only character."
	                },
	                parent_permament_state:{
	                	required:"Please enter this Details"
	                },
	                parent_permament_pincode:{
	                	required:"Please enter this Details",
	                	digits: "Please enter 06 digit pincode.",
	                    minlength: "Please enter 06 digit pincode.",
	                    maxlength: "Please enter 06 digit pincode."
	                },
	                student_adhar_card_number:{
	                	// required: "Please enter student Adhar Card Number.",
	                    digits: "Please enter 12 digit Adhar Card Number.",
	                    minlength: "Please enter 12 digit Adhar Card Number.",
	                    maxlength: "Please enter 12 digit Adhar Card Number."
	                },
	                student_category:{
	                	min:"Please select student category"
	                },
	                student_GRN_regular:{
	                	pattern:"Please Enter only charater or digits." 
	                },
	                student_GRN_auto:{
	                	pattern:"Please Enter only charater or digits." 
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
	                SCD_class_id:{
                        min: "Please Select Class."
                    },
                    SCD_division_id:{
                        min: "Please Select Division."
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

		    // $("[name^=parent_DOB]").each(function () {
		    //     $(this).rules("add", {
		    //         required: true
		    //     });
		    // });

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

		    $("[name^=doc_number]").each(function () {
		        $(this).rules("add", {
		            required: true
		        });
		    });

		    $("[name^=doc_file]").each(function () {
		        $(this).rules("add", {
		            required: true
		        });
		    });


	            $('.dataTables-example').DataTable({
	                pageLength: 25,
	                responsive: true,
	                dom: '<"html5buttons"B>lTfgitp',
	                buttons: [    ],
	                "language": {
                    	"emptyTable": "<img src='<?=base_url();?>assets/img/No-record-found.png'> "
                	}

	            });

	            $(".select2_demo_2").select2({
	                
	            });

	            $(".addStudent1").validate({
		            rules: {
		               	password:{
		              		required:true,
		              		minlength:8
		              	},
		              	confirm_pass:{
		              		required:true,
		              		equalTo:"#password"
			            }
			        },
		            messages:{

		            }
		        });
	        });
	    </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>