<body class="inner-pages">
<!-- START SECTION 404 -->
<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url('resource/loader/loading_spinner.gif');?>"></span>

<div class="container-fluid">

    <div class="row" style="background-color: #edeff1;">
        <div class="col-sm-10 col-sm-offset-1">

            <div style="width: 100%; background-color: white; padding-top: 50px;">
                <form method="post" autocomplete="off" action="<?php echo base_url('agents/mains/process_registration/'.$this->uri->segment(4)); ?>" style="width:94%; margin-left: 3%;">
                    <div class="row" style="">

                        <div class="col-sm-12 text-center">

                            <h2 style="font-size: 23px;" class="text-success text-center">Upload Images for Recently Added Property on <?php print $siteDetail['site_name'];?></h2>
                            <p class="text-center"><strong>Property Title: </strong><span><?php echo $details_of_last_property_listed_array[0]['nazac_property_title']; ?></span></p>
                        </div>

                        <?php

                        if( $this->session->flashdata('error_statement') ){ ?>
                            <div class="col-sm-12 alert alert-warning text-center" style="margin-top: 30px">
                                <?php
                                echo $this->session->flashdata('error_statement');
                                ?>
                            </div>
                        <?php } ?>

                        <div class="col-sm-12" style="margin-top: 30px">
                            <h5 class="text-success" style="margin-bottom: 0px">Image Upload</h5>
                            <hr class="bg-warning" style="margin-top: 2px" size="10px">
                        </div>

                        <div class="col-sm-3 ">
                            <figure class="image_figure">
                                <img class="main_image_img" src="<?php echo base_url('resource/upload/registered_property/'.$details_of_last_property_listed_array[0]['nazac_property_thumbnail'])?>" alt="Trulli" style="width:100%">
                                <figcaption class="image_figcaption">Thumbnail</figcaption>
                                <a class="image_upload" href="javascript:;" onclick="activateThumbnailUpload()"><i  class="image_icon fa fa-upload fa-2x"></i></a>
                            </figure>
                            <form method="post" id="myAwesomeForm_2" enctype="multipart/form-data">
                                <input id="user_id_holder" type="hidden" value="<?php echo $this->uri->segment(4); ?>">
                                <input id="page_name_value" type="hidden" value="<?php echo $this->uri->segment(3); ?>">
                                <img src="" id="shot_holder" style="display: none" />
                                <!--onchange="uploadListedPropertyThumbnailUpload()"-->
                                <input style="display:none;"  type="file" id="theFiles"  />
                                <input style="display:none;" multiple type="file" id="multiple_image_for_listed_property"  />
                            </form>
                        </div>
                        <?php

                        $property_details_array = array();
                        if(!empty($details_of_last_property_listed_array[0]['nazac_property_images'])){
                            $property_details = rtrim($details_of_last_property_listed_array[0]['nazac_property_images'], ',');
                            $property_details_array = explode(',', $property_details);
                        }
                        //print_r($property_details_array); die();
                        ?>

                        <div class="col-sm-8 col-sm-offset-1">
                            <div class="row">
                                <div class="image_set">

                                    <div class="row image-box">
                                        <?php if(count($property_details_array) > 0){ ?>
                                            <?php for($i = 0; $i < count($property_details_array); $i++){ ?>

                                                <div class="col-sm-4 main_img_holder">
                                                    <figure class="image_figure_2">
                                                        <img src="<?php echo base_url('resource/upload/registered_property/'.$property_details_array[$i])?>" alt="Trulli" style="width:100%">
                                                        <div class="checkbox_holder" href="javascript:;"><input class="property_details_image_check_box" type="checkbox" value="<?php echo $property_details_array[$i]; ?>" /></div>

                                                    </figure>
                                                </div>
                                            <?php } } ?>
                                        <?php if(count($property_details_array) == 0){ ?>
                                            <div class="col-sm-12 main_img_holder" >
                                                <div class="text-center" style="margin-top: 80px; " >
                                                    <h4>No Image Has Been Uploaded</h4>
                                                    <p>Click Upload Button Below to Add Images</p>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>

                                    <div class="btn-holder"><a href="javascript:;"><i  class=" fa fa-upload fa-2x" onclick="activateMultiUploadForListedProperty()" ></i></a> <a href="javascript:;" style="margin-left: 20px"><i  class="fa fa-trash fa-2x" onclick="deleteSelectedPropertyImage('nazac_property_listing')"></i></a></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-sm-offset-3" style="margin-bottom: 30px; margin-top: 30px;">
                            <div id="pass-info" class="clearfix"></div>
                            <button type="button" style="background: #121B22; border-color:#121B22;" onclick="saveProperty('nazac_property_listing')" class="btn btn-block btn-info btn-lg property_save_button"><?php if($this->uri->segment(5)){ echo 'Update'; }else{ echo 'Save'; }?></button>
                        </div>


                    </div>

                </form>

            </div>

        </div>
    </div>

</div>

<div style="z-index: 10000000" id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div id="image_demo" style="width:100%; margin-top:30px"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success crop_image">Crop & Upload Image</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>