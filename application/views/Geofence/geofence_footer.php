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
    <script src="<?=base_url();?>assets/js/plugins/select2/select2.full.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?=base_url()?>assets/js/inspinia.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/pace/pace.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>
    
    <!-- clockpicker -->
     <script src="<?=base_url()?>assets/js/plugins/clockpicker/clockpicker.js"></script>
      <!-- IonRangeSlider -->
    <script src="<?=base_url()?>assets/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>
    
    <script src="<?= base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/validate/additional-methods.min.js"></script>

    <!-- Google Lat-Long Picker-->
    <script src="<?=base_url();?>assets/js//plugins/lat_long_picker/jquery-gmaps-latlon-picker.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=<?=$key?>"></script>
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


        <?php if($geofence == 'geofence'){?>
             $('#geofence').addClass('active');
             document.title = "TrackMee | Geofence Details"
        <?php } ?>
        
        $(document).ready(function(){

        <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
            swal({
                title: "<?=$flash['title']?>",
                text: "<?=$flash['text']?>",
                type: "<?=$flash['type']?>"
            });
        <?php } ?>

         $("#ionrange_2").ionRangeSlider({
            min: 0,
            max: 200,
            type: 'single',
            step: 1,
            postfix: " radius",
            prettify: false,
            hasGrid: true,
            onFinish: function(data){
                var value = data.fromNumber;
                $("#geofence_radius").val(value);
            }
        });

        $(document).on('change', '.ranger', function() {
            // $('#geofence_radius').html( $(this).val() );
            var s = $(this).val();
            alert(s);
        });

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

        $(document).on('click','#update_lat_long',function(){
        	var lat = $('.gllpLatitude').val();
        	var long = $('.gllpLongitude').val();
        	$('#geofence_lat').val(lat);
        	$('#geofence_long').val(long);
        });

        $('.clockpicker').clockpicker(function(){
        	 twelvehour: true
        });
         

        $("#addgeofence").validate({
        	rules: {
        		geofence_bus_no: {
                    min:1                  
                },
                geofence_client_profile_id: {
        			min:1                  
        		},
        		geofence_lat: {
        			required: true                  
        		},
        		geofence_long: {
        			required: true                  
        		}
        	},
        	messages: {
        		geofence_bus_no: {
                    min: "Please Select Bus."
                },
                geofence_client_profile_id: {
        			min: "Please Select Client."
        		},
        		geofence_lat: {
        			required: "Please enter the Lattitude."
        		},
        		geofence_long: {
        			required: "Please enter the Longitude."
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