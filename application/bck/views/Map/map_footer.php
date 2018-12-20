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

        <?php if($map = 'map') {?>
            $('#tracking').addClass('active');
        <?php } ?>

        $(document).ready(function(){

             <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
                swal({
                    title: "<?=$flash['title']?>",
                    text: "<?=$flash['text']?>",
                    type: "<?=$flash['type']?>"
                });
            <?php } ?>  
          
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

                height1 = $(".map_details").height();
                height2 = $(".map_details_head").height();
                $(".view_map").height(height1);
                $(".view_map_head").height(height2);
            // autoUpdate(); 
            setTimeout(autoUpdate, 3000);   
            function autoUpdate() 
            {
                // console.log("update function");
             $.post('<?=site_url('Tracking/view_map_table_update')?>',{}, function(data){
                  console.log(data);
                         $('#vehical_status').empty();
                         for (var i = 0; i < data.res1.length; i++) 
                          {
                            var j =0;
                             j = i+1;
                                $('#vehical_status').append('<tr class="map_details">'+
                                            '<td>'+j+'</td>'+
                                          (data.res1[i][0].vehicle_movement_status == "B" ? '<td><img src="<?=base_url()?>assets/img/icon-bus-green.png" alt="running" style="height:25px;"></td>' : ' <td><img src="<?=base_url()?>assets/img/icon-bus-red.png" alt="stop" style="height:25px;"></td>')+ 
                                          
                                          (data.res1[i][0].gps_valid_data == "1" ? '<td><img src="<?=base_url()?>assets/img/yellow-circle.jpg" alt="" style="height:25px;"></td>':'<td><img src="<?=base_url()?>assets/img/orange-circle.png" alt="" style="height:25px;"></td>')+ 
                                           
                                            '<td>'+data.res1[i][0].stop_longitude+'</td>'+
                                            '<td>'+data.res1[i][0].device_id+'</td>' +
                                            '<td>'+data.res1[i][0].xml_date_time+'</td>'+
                                            '<td>'+data.res1[i][0].speed+'</td>'+
                                            '<td>'+data.res1[i][0].stop_latitude+'</td>'+
                                           (data.res1[i][0].power_status == "1" || "2" ? '<td><img src="<?=base_url()?>assets/img/BatteryOK.png" alt="Power" style="height:25px;"></td>' : '<td><img src="<?=base_url()?>assets/img/BatteryDis.png" alt="Internal Battery" style="height:25px;"></td>')+ 
                                             
                                            '<td>'+data.res1[i][0].total_satellites+'</td>'+
                                            '<td>'+data.res1[i][0].gsm_signal_strength+'</td>'+
                                          
                                        '</tr>');

                          }

                },'json');

                height1 = $(".map_details").height();
                height2 = $(".map_details_head").height();
                $(".view_map").height(height1);
                $(".view_map_head").height(height2);

             setTimeout(autoUpdate, 3000);
            }  

	        });
	    </script>
	    
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>