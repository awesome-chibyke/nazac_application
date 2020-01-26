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

                                <h2 style="font-size: 23px;" class="text-success text-center">List of Registered Properties By Me on <?php print $siteDetail['site_name'];?></h2>
                            </div>

                            <div class="col-sm-12" style="margin-top: 30px">
                                <!--<h5 class="text-success" style="margin-bottom: 0px">Select A Location</h5>-->
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>

                            <div class="col-sm-12" style="margin-top: 10px;">

                                <div class="row property_details_area">

                                    <?php if(count($registered_property_details_array) == 0){ ?>
                                        <div class="col-sm-12" style="position:relative; margin-top: 20px;" >

                                                <div class="wall-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 text-center">
                                                            <div style="width:100%;" class="_9b954_8rPAx">
                                                                <div class="row">
                                                                    <div class="col-sm-12" >
                                                                        <h3  style="padding: 40px 0px;" >You have not listed any property on <?php echo $siteDetail['site_name']; ?></h3>
                                                                    </div>
                                                                    <div class="col-sm-12" >
																		<h6 align="center"><img class="img-responsive" src="<?php print base_url();?>resource/img/propertymartGIF.gif"/></h6>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php } ?>

                                    <?php if(count($registered_property_details_array) > 0){ ?>

                                        <?php foreach($registered_property_details_array as $k => $value){ ?>
                                            <div class="col-sm-6" style="position:relative; margin-top: 20px;" >
                                                <div style="position: absolute; right: 30px; top: 10px; z-index: 100000;">

                                                </div>
                                                <div style="position: absolute; right: 30px; bottom: 10px; z-index: 100000;">
                                                    <a class="make_thumb" style="padding-right: 5px; padding-left: 5px;" href="<?php echo base_url('agents/mains/view_single_property_details/'.$value['nazac_property_id'])?>" title="More Details"><i class="fa fa-eye regg_prop_icons"></i></a>
                                                    <a class="make_thumb" style="padding-right: 5px; padding-left: 5px;" title="Edit Images" href="<?php echo base_url('agents/mains/upload_property_media/'.$value['nazac_property_id'])?>" ><i class="fa fa-camera regg_prop_icons"></i></a>
                                                    <a style="padding-right: 5px; padding-left: 5px;" class="make_thumb" title="Edit Registered Property" href="<?php echo base_url('agents/mains/register_property/'.$value['nazac_property_id'])?>"><i class="fa fa-edit regg_prop_icons"></i></a>
                                                </div>
                                                <div class="wall-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <img src="<?php echo base_url('resource/upload/registered_property/'.$value['nazac_property_thumbnail'])?>" style="width:100%; height: 100%;" />
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <h5 style="margin-top: 15px; margin-bottom: 2px; color:black;"><?php echo $value['nazac_property_lodge_name']; ?></h5>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <p style="margin-top: 3px; margin-bottom: 3px;">
                                                                        <strong class="fa fa-home text-font-14 text-success"></strong>
                                                                        <?php $location_details = $this->Admin->dbSelectWithOrWithoutParameter('nazac_property_locations', array('nazac_location_id'=>$value['nazac_property_location']), $order_column = FALSE, $order_by = FALSE, $rowsperpage = FALSE, $offset = FALSE) ?>
                                                                        <small> <?php echo $location_details['result'][0]['nazac_location_name'].'/'.$value['nazac_property_number']; ?></small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <p style="margin-top: 3px; margin-bottom: 3px;">
                                                                        <strong class="fa fa-map-marker text-font-14 text-success"></strong>
                                                                        <small>
                                                                            <?php echo $value['nazac_property_number'].','.$location_details['result'][0]['nazac_location_name'] ?>
                                                                        </small>
                                                                    </p> </div>
                                                                <div class="col-sm-12">
                                                                    <p style="margin-bottom: 3px; margin-top: 3px;">
                                                                        <strong class="fa fa-user text-font-14 text-success"></strong>
                                                                        <small><?php echo $value['nazac_property_caretaker_name']; ?></small>
                                                                    </p>
                                                                    <p style="margin-bottom: 3px; margin-top: 3px;">
                                                                        <strong class="fa fa-phone text-font-14 text-success"></strong>
                                                                        <small><?php echo $value['nazac_property_caretaker_phone']?></small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                            <div class="col-sm-12" style="margin-top: 30px;" >
                                                <nav aria-label="...">
                                                    <ul class="pagination">

                                                        <?php echo $previous_link; ?>
                                                        <?php echo $looped_links; ?>
                                                        <?php echo $next_links; ?>

                                                    </ul>

                                                </nav>
                                            </div>

                                    <?php } ?>

                                </div>

                            </div>

                            <div class="col-sm-6 col-sm-offset-3" style="margin-bottom: 30px; margin-top: 30px;">

                            </div>


                        </div>

                    </form>

                </div>

            </div>
    </div>

</div>