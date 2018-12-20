        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-2">
                    <div class="ibox float-e-margins">
                        <!-- <div class="ibox-content"> -->
                            <div class="file-manager">
                   <!--              <h5>Show:</h5>
                                <a href="#" class="file-control">Images</a>
                                <div class="hr-line-dashed"></div>
 -->
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">
                                Upload Images
                            </button>
                     

<!-- modal -->

                            <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">Upload Images</h4>
                                            <small class="font-bold">Please select the images to upload.</small>
                                        </div>
                                        <div class="modal-body">
                                            
                                                <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Gallery/upload')?>">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Gallery Name</label>
                                    <div class="col-lg-7">
                                        <input type="text" placeholder="Please enter the gallery name here" name="gallery_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Upload Photos</label>
                                    <div class="col-lg-7">
                                        <input name="filename[]" class="form-control uname" value="" id="" placeholder="Select the images" accept="image/png,image/jpeg,image/gif" type="file" multiple="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                       
                                       <input class="btn btn-primary btn-block" type="submit" value="Upload"/>
                                    </div>
                                </div>
                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>


<!-- modal end -->

<!--                                 <div class="hr-line-dashed"></div>
                                <h5>Folders</h5>
 -->                            <?php 
                            for ($j=0; $j < count($image); $j++) { 
                            ?>
                                <ul class="folder-list" style="padding: 0">
                                    <li><i class="fa fa-folder"></i> <?=$image[$j]['gallery_album_name']; ?></li>
                                </ul>
                            <?php } ?>
                               <!--  <h5 class="tag-title">Tags</h5>
                                <ul class="tag-list" style="padding: 0">
                                    <li>add</li>
                                </ul> -->
                                <div class="clearfix"></div>
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
                <div class="col-lg-10 animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                        <!--                      <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br/>
                                            <small>Added: Jan 11, 2014</small>
                                        </div>
                                    </a>
                                </div>

                            </div> -->
                            <?php 
                            for ($i=0; $i < count($image); $i++) { 
                            ?>
                            <div class="file-box">
                                <div class="file xyz" data-href="<?=site_url('gallery/img_link/'.$image[$i]['gallery_album_name'])?>">
                                    <a href="">
                                        <span class="corner" style="background-color:red;"></span>
    
                                        <div class="image">
                                            <img alt="image" class="img-responsive" src="<?=$image[$i]['gallery_big'];?>">
                                        </div>
                                        <div class="file-name">
                                            <?=$image[$i]['gallery_album_name']; ?>
                                            <br/>
                                            <small>Total: <?=$image[$i]['total']; ?> </small><br>
                                            <small>Created on : <?=$image[$i]['gallery_datetime']; ?> </small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
     

                        </div>
                    </div>
                    </div>
                </div>
                </div>









<!--         <div class="wrapper wrapper-content animated fadeInRight">



            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Gallery</b></h3>
                                </div>
                               
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=site_url('Gallery/upload')?>">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Gallery</label>
                                    <div class="col-lg-7">
                                        <input type="text" placeholder="Gallery Name" name="gallery_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Upload Photos</label>
                                    <div class="col-lg-7">
                                        <input name="filename[]" class="form-control uname" value="" id="" placeholder="Profile picture" accept="image/png,image/jpeg,image/gif" type="file" multiple="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="reset">Cancel</button>
                                       <input class="btn btn-primary" type="submit" value="Upload"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="ibox-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><b>Image Gallery</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div class="lightBoxGallery">
                                <?php foreach ($image as $key) { ?>
                                <a href="<?=$key['gallery_big']?>" title="Image from Unsplash" data-gallery=""><img src="<?=$key['gallery_big']?>" style="padding: 15px;height: 150px;width: 150px;"></a>

                                <?php } ?>
             
                             
                                <div id="blueimp-gallery" class="blueimp-gallery">
                                    <div class="slides"></div>
                                    <h3 class="title"></h3>
                                    <a class="prev">‹</a>
                                    <a class="next">›</a>
                                    <a class="close">×</a>
                                    <a class="play-pause"></a>
                                    <ol class="indicator"></ol>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                </div>
            </div>
 -->