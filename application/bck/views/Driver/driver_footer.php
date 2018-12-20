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

        <?php if($transport == 'transport'){?>
             $('#transport').addClass('active');
        <?php } ?>

        $('.deactive').hide();
        $(document).on('click','.dri_deactive',function(){
        	$('.deactive').show();	
        	$('.aactive').hide();	
        });
        $(document).on('click','.dri_active',function(){
        	$('.deactive').hide();	
        	$('.aactive').show();	
        });

        $(document).on('change','.mobile',function(){
                var num  = $(this).val();
                $.post('<?=site_url('Driver/already_exits_mobile')?>',{num:num}, function(res){
                    // console.log(data);
                    if(res == 0){
                        $('.mobile_verification').hide();
                        $('.mobile_verification').text('');
                    }
                    else{
                        $('.mobile_verification').show();
                        $('.mobile_verification').text('Mobile No. already Registered.');
                    }
                },'json');
            });

            $(document).on('change','.email_id',function(){
                var email  = $(this).val();
                $.post('<?=site_url('Driver/already_exits_email')?>',{email:email}, function(res){
                    // console.log(data);
                    if(res == 0){
                        $('.email_verification').hide();
                        $('.email_verification').text('');
                    }
                    else{
                        $('.email_verification').show();
                        $('.email_verification').text('Email ID. already Registered.');
                    }
                },'json');
            });

            $(document).on('change','.license',function(){
                var license  = $(this).val();
                $.post('<?=site_url('Driver/already_exits_license')?>',{license:license}, function(res){
                    // console.log(data);
                    if(res == 0){
                        $('.license_verification').hide();
                        $('.license_verification').text('');
                    }
                    else{
                        $('.license_verification').show();
                        $('.license_verification').text('License No. already Registered.');
                    }
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

       		$('.document_toggle').hide();
	        $(document).on('click','#toggle_document',function(){
	            $('.document_toggle').toggle();
	        });
                        
	        var today = new Date();
	        $('.datepicker').datepicker({
	            format: 'yyyy-mm-dd',
	            autoclose:true,
	            endDate: "today",
	            maxDate: today
	        });

	            $("#addDriver").validate({
	            rules: {
	                employee_first_name: {
	                    required: true,
	                    pattern: /^[a-zA-Z\s]*$/
	                },
	                employee_last_name: {
	                    required: true,
	                    pattern: /^[a-zA-Z\s]*$/
	                },
	                employee_gender: {
	                    required: true
	                },
	                employee_DOB:{
	                	required:true
	                },
	                employee_address:{
	                	required:true
	                },
	                employee_pri_mobile_number: {
	                    required: true,
	                    digits: true,
	                    minlength: 10,
	                    maxlength: 10
	                },
	                employee_email_id: {
	                    required: true,
	                    pattern: /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
	                    email: true
	                },
	                employee_sec_mobile_number: {
	                    digits: true,
	                    minlength: 10,
	                    maxlength: 10
	                },
	                employee_sec_email_id: {
	                    pattern: /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
	                    email: true
	                },
	                employee_licence_number:{
	                	required:true,
	                	pattern: /^([A-Z]{2})+([0-9]{2})+(\s{1})+([0-9]{11})$/
	                }
	                // license_photo:{
	                // 	required :true                  
	                // }
	                // photo:{
	                // 	required :true                  
	                // }
	            },
	            messages: {
	                employee_first_name: {
	                    required: "Please enter driver First name.",
	                    pattern:"Please enter only alphabets"
	                },
	                employee_middle_name: {
	                    required: "Please enter driver Middle name.",
	                    pattern:"Please enter only alphabets"
	                },
	                employee_last_name: {
	                    required: "Please enter driver Last name.",
	                    pattern:"Please enter only alphabets"
	                },
	                employee_DOB:{
	                	required:"Please Select Driver Date Of Birth."
	                },
	                employee_address:{
	                	required:"Please enter Driver Address."
	                },
	                employee_pri_mobile_number: {
	                    required: "Please enter customer mobile no.",
	                    digits: "Please enter 10 digit mobile no.",
	                    minlength: "Please enter 10 digit mobile no.",
	                    maxlength: "Please enter 10 digit mobile no."
	                },
	                employee_email_id: {
	                    required: "Please enter Email.",
	                    pattern:"Please enter valid format of email.",
	                    email: "Please enter Correct Email"
	                },
	                employee_sec_mobile_number: {
	                    required: "Please enter customer mobile no.",
	                    digits: "Please enter 10 digit mobile no.",
	                    minlength: "Please enter 10 digit mobile no.",
	                    maxlength: "Please enter 10 digit mobile no."
	                },
	                employee_email_id: {
	                    required: "Please enter Email.",
	                    pattern:"Please enter valid format of email.",
	                    email: "Please enter Correct Email"
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

	            $(".select2_demo_2").select2({
	                
	            });
	        });
	    </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>