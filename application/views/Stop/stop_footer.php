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
<script src="<?= base_url();?>assets/js/jquery-ui.min.js"></script>
<script src="<?=base_url();?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?=base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?=base_url()?>assets/js/inspinia.js"></script>
<script src="<?=base_url()?>assets/js/plugins/pace/pace.min.js"></script>

<script src="<?= base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>
<script src="<?= base_url();?>assets/js/plugins/validate/jquery.validate.min.js"></script>
<script src="<?= base_url();?>assets/js/plugins/validate/additional-methods.min.js"></script>
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

    $(document).ready(function(){
        <?php if($stop == 'stop'){?>
             $('#stop').addClass('active');
             document.title = "TrackMee | Stop Details"
        <?php } ?>

       $('.enableOnInput').prop('disabled', false);
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

        $('.stop_regis').hide();
        $(document).on('click','#toggle_route',function(){
            $('.stop_regis').toggle();
        });

        $(document).on('change','.route_type', function(){
            $('#route').empty();
            $('.stock').empty();
            var route_type = $(this).val();
            var stop_route_id = $('#stop_route_id').val();
            $.post('<?=site_url('Stop/stop_details')?>',{route_id : stop_route_id, route_type : route_type}, function(data){
                console.log(data);
                $.each(data, function(k,v){
                    $('.stock').append('<tr id="org"><th id="route_index"><input type="text" name="route_index[]" class="form-control route_index" readonly value="'+v.stop_index+'"style="border:none; readonly"></th><th id="route_name"><input type="text" name="route_name[]" class="form-control route_name" style="border:none;" value ="'+v.stop_name+'"></th><th id="latitude"><input type="text" name="route_latitude[]" class="form-control latitude" style="border:none;" value="'+v.stop_latitude+'"></th><th id="longitude"><input type="text" name="route_longitude[]"  class="form-control longitude" style="border:none;" value="'+v.stop_longitude+'"></th><th><span class="delete_stop"><i class="fa fa-minus-circle fa-2x" aria-hidden="true"></i></span></th></tr>');
                });
            },'json');
        })


        $(document).on('change','#stop_route_id', function(){
            $('#route_type1').empty();
            $('#route_type2').empty();
            $('.client_details').empty();
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

            $.post('<?=site_url('Stop/route_client_details')?>',{route_id : stop_route_id}, function(data){
                // console.log(data);
                    $('.client_details').append('<option value="0">Select Client</option>');
                $.each(data, function(k,v){
                    $('.client_details').append('<option value="'+v.client_profile_id+'">'+v.client_name+'</option>');
                })
            },'json');
        });

        $(document).on('change','.route_no',function(){
            $('.route_type1').empty();
            $('.route_type2').empty();
            $('.route_number').empty();
            $('.route_name').empty();
            $('.school_start_time').empty();
            $('.school_end_time').empty();
            $('.home_start_time').empty();
            $('.home_end_time').empty();
            var route_no = $(this).val();
            $.post('<?=site_url('Stop/stop_route_details')?>',{route_no:route_no},function(res){
                console.log(res);
                $.each(res, function(k,v){
                    $('.route_number').text(v.route_no);
                    $('.route_name').text(v.route_name);
                    $('.route_id').text(v.type1_route_id);
                    $('.school_start_time').text(v.type1_route_start_time);
                    $('.school_end_time').text(v.type1_route_end_time);
                    $('.route_id_1').text(v.type2_route_id);
                    $('.home_start_time').text(v.type2_route_start_time);
                    $('.home_end_time').text(v.type2_route_end_time);
                })

            },'json');

            $.post('<?=site_url('Stop/stop_details_with_route_type_1')?>',{route_id : route_no}, function(data){
                console.log(data);
                $.each(data, function(k,v){
                    $('.route_type1').append('<tr><td>'+v.stop_id+'</td><td>'+v.stop_index+'</td><td>'+v.stop_name+'</td><td>'+v.stop_latitude+'</td><td>'+v.stop_longitude+'</td></</tr>');
                })
            },'json');

            $.post('<?=site_url('Stop/stop_details_with_route_type_2')?>',{route_id : route_no}, function(data){
                console.log(data);
                $.each(data, function(k,v){
                    $('.route_type2').append('<tr><td>'+v.stop_id+'</td><td>'+v.stop_index+'</td><td>'+v.stop_name+'</td><td>'+v.stop_latitude+'</td><td>'+v.stop_longitude+'</td></tr>');
                })
            },'json');
        })

        $(document).on('click','.delete_stop',function(){
            if(confirm('You Really Want To Delete...!!')){
                var route_index = $(this).parents().siblings('#route_index').find('.route_index').val();
                var stop_route_id = $('#stop_route_id').val();
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

        $("#addStop").validate({
            rules: {
                route_no: {
                    min: 1                  
                },
                route_type: {
                    min: 1                  
                },
                stop_client_profile_id: {
                    min: 1                  
                }
            },
            messages: {
                route_no: {
                    min: "Please Select Route name."
                },
                route_type: {
                    min: "Please Select Route Type."
                },
                stop_client_profile_id: {
                    min: "Please Select Client."
                }
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
</html>