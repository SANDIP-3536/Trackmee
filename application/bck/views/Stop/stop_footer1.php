<div class="footer">
            <div class="pull-right">
                <i class="fa fa-phone-square" aria-hidden="true"></i><strong> 020-24269021 / 7030578612</strong> | <i class="fa fa-envelope" aria-hidden="true"></i> <strong>contact@syntech.co.in</strong> 
            </div>
            <div>
                <strong>Copyright </strong><a href="http://www.syntech.co.in" target="_blank"> <img src="<?=base_url()?>assets/img/syntech_logo.png" style="height:15px;"></a><strong> &copy; 2017-2018 </strong> 
            </div>
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="<?=base_url()?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>assets/js/jquery-ui.min.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?=base_url()?>assets/js/inspinia.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/pace/pace.min.js"></script>

    <script src="<?= base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>

   
    <script>
        $(document).ready(function(){
            // alert(count);
<?php if($active == 'stop'){?>
     $('#stop').addClass('active');
<?php } ?>
     $('.enableOnInput').prop('disabled', true);
            var sa = 1;
            $('.add_stop').click(function(){
                
                var newUser = '<tr id="org">'+
                                '<th id="route_index">'+
                                    '<input type="text" name="route_index[]" class="form-control route_index" value="" style="border:none;" required>'+
                                '</th>'+
                                '<th id="route_name">'+
                                    '<input type="text" name="route_name[]" class="form-control route_name" style="border:none;" required>'+
                                '</th>'+
                                '<th id="latitude">'+
                                    '<input type="text" name="route_latitude[]" class="form-control latitude" style="border:none;" required>'+
                                '</th>'+
                                '<th id="longitude">'+
                                    '<input type="text" name="route_longitude[]" class="form-control longitude" style="border:none;" required>'+
                                '</th>'+
                                '<th><span class="remove_stop"><i class="fa fa-minus-circle fa-2x" aria-hidden="true"></i></span></th>'+
                                // '<th><span class="delete_stop"><i class="fa fa-minus-circle fa-2x" aria-hidden="true"></i></span><span class="up"><i class="fa fa-arrow-circle-up fa-2x" aria-hidden="true"></i></span><span class="down"><i class="fa fa-arrow-circle-down fa-2x" aria-hidden="true"></i></span></th>'+
                                '</tr>';
                
                $('.stock').append(newUser);
                $('.enableOnInput').prop('disabled', false);
            });

            $(document).on("click", ".remove_stop", function() {
               $(this).closest("tr").remove(); 
            });

            $(document).on('change','.route_type', function(){
                $('#route').empty();
                $('.stock').empty();
                var route_type = $(this).val();
                var stop_route_id = $('#stop_route_id').val();


                $.post('<?=site_url('Stop/stop_details')?>',{route_id : stop_route_id, route_type : route_type}, function(data){
                    // var count = length(data);
                    $.each(data, function(k,v){

                        $('.stock').append('<tr id="org"><th id="route_index"><input type="text" name="route_index[]" class="form-control route_index" readonly value="'+v.stop_index+'"style="border:none; readonly"></th><th id="route_name"><input type="text" name="route_name[]" class="form-control route_name" style="border:none;" value ="'+v.stop_name+'"></th><th id="latitude"><input type="text" name="route_latitude[]" class="form-control latitude" style="border:none;" value="'+v.stop_latitude+'"></th><th id="longitude"><input type="text" name="route_longitude[]"  class="form-control longitude" style="border:none;" value="'+v.stop_longitude+'"></th><th><span class="delete_stop"><i class="fa fa-minus-circle fa-2x" aria-hidden="true"></i></span></th></tr>');
                        // $('.stock').append('<tr id="org"><th id="route_index"><input type="text" name="route_index[]" class="form-control route_index" readonly value="'+v.stop_index+'"style="border:none; readonly"></th><th id="route_name"><input type="text" name="route_name[]" class="form-control route_name" style="border:none;" value ="'+v.stop_name+'"></th><th id="latitude"><input type="text" name="route_latitude[]" class="form-control latitude" readonly style="border:none;" value="'+v.stop_latitude+'"></th><th id="longitude"><input type="text" name="route_longitude[]"  readonly class="form-control longitude" style="border:none;" value="'+v.stop_longitude+'"></th><th><span class="delete_stop"><i class="fa fa-minus-circle fa-2x" aria-hidden="true"></i></span><span class="up"><i class="fa fa-arrow-circle-up fa-2x" aria-hidden="true"></i></span><span class="down"><i class="fa fa-arrow-circle-down fa-2x" aria-hidden="true"></i></span></th></tr>');
                    });

                },'json');

            })


            $(document).on('change','#stop_route_id', function(){
                $('#route_type1').empty();
                $('#route_type2').empty();
                $('.stock').empty();
                var stop_route_id = $('#stop_route_id').val();


                $.post('<?=site_url('Stop/stop_details_with_route_type_1')?>',{route_id : stop_route_id}, function(data){
                    // console.log(data);
                    $.each(data, function(k,v){
                        $('#route_type1').append('<tr><td>'+v.stop_index+'</td><td>'+v.stop_name+'</td><td>'+v.stop_latitude+'</td><td>'+v.stop_longitude+'</td></</tr>');
                    })
                },'json');

                $.post('<?=site_url('Stop/stop_details_with_route_type_2')?>',{route_id : stop_route_id}, function(data){
                    // console.log(data);
                    $.each(data, function(k,v){
                        $('#route_type2').append('<tr><td>'+v.stop_index+'</td><td>'+v.stop_name+'</td><td>'+v.stop_latitude+'</td><td>'+v.stop_longitude+'</td></tr>');
                    })
                },'json');
            })

            $(document).on('click','.delete_stop',function(){

                
                if(confirm('You Really Want To Delete...!!')){


                    var route_index = $(this).parents().siblings('#route_index').find('.route_index').val();
                    var stop_route_id = $('#stop_route_id').val();
                    // alert(route_index);
                    // alert(stop_route_id);
                    $.post('<?=site_url('Stop/stop_delete_jq')?>',{route_index  : route_index, stop_route_id: stop_route_id}, function(data){
                        console.log(data);
                    },'json');
                    var div = $(this).closest('#org');
                    div.remove();
                }
                else{
                    return false;
                }
           });

           
            $('.stock').on('click','.up,.down', function(){
                var row = $(this).parents("tr:first");
                if($(this).is('.up')){
                    row.insertBefore(row.prev());
                }else{
                    row.insertAfter(row.next());
                }
            });
              
        

            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [        ]

            });
                
       });
    </script>
    
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Sep 2016 12:30:16 GMT -->
</html>