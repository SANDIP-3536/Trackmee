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
        
        $(document).ready(function(){

        <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
            swal({
                title: "<?=$flash['title']?>",
                text: "<?=$flash['text']?>",
                type: "<?=$flash['type']?>"
            });
        <?php } ?>

        $('.route_toggle').hide();
        $(document).on('click','.toggle_route',function(){
            $('.route_toggle').toggle();
        });
        var today = new Date();
        $('.datepicker').datepicker({
        	format: 'yyyy-mm-dd',
        	autoclose:true,
        	endDate: "today",
        	maxDate: today
        }).on('changeDate', function (ev) {
        	$(this).datepicker('hide');
        });


        $('.datepicker').keyup(function () {
            if (this.value.match(/[^0-9]/g)) {
                this.value = this.value.replace(/[^0-9^-]/g, '');
            }
        });

        $('.clockpicker').clockpicker(function(){
        	 twelvehour: true
        });
         

        $("#addRoute").validate({
        	rules: {
        		route_name: {
        			required: true                  
        		},
        		route_start_time_1: {
        			required: true                  
        		},
        		route_end_time_1: {
        			required: true                  
        		},
        		route_start_time_2: {
        			required: true                  
        		},
        		route_end_time_2: {
        			required: true                  
        		}
        	},
        	messages: {
        		route_name: {
        			required: "Please enter Route name."
        		},
        		route_start_time_1: {
        			required: "Please enter Route Start time."
        		},
        		route_end_time_1: {
        			required: "Please enter Route End time."
        		},
        		route_start_time_2: {
        			required: "Please enter Route Start time."
        		},
        		route_end_time_2: {
        			required: "Please enter Route End time."
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

        $(".select2_demo_2").select2({

        });
        });
    </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>