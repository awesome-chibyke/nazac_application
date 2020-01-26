<!-- START SECTION PROPERTIES LISTING -->
<section style="margin-top: -50px !important;" class="blog details">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 blog-pots boder_p">
                <div class="col-lg-12 is_card">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5 style="font-size: 17px; color: #fff;" class="type"> <?php print $single_registered_property_details_array[0]['nazac_property_lodge_name'];?> (Lodge)</h5>
                        </div>
                        <div class="col-sm-3">
                            <h5 style="font-size: 13px; color: #fff;" class="type"><span>RIN:</span>
                                <?php $location_details = $this->Admin->dbSelectWithOrWithoutParameter('nazac_property_locations', array('nazac_location_id'=>$single_registered_property_details_array[0]['nazac_property_location'])); ?>
                                <?php print $location_details['result'][0]['nazac_location_name']; ?></h5>
                        </div>
                        <div class="col-sm-3">
                            <h5 style="font-size: 13px; color: #fff;" class="type"><span>Property Number:</span>
                                <?php print $single_registered_property_details_array[0]['nazac_property_number'];?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 is_card">

                    <span><i class="fa fa-map-marker text-sucess"></i></span>
                    <?php echo $single_registered_property_details_array[0]['nazac_property_lodge_address'].', '.$location_details['result'][0]['nazac_location_name']; ?>
                </div>

                <div class="col-lg-12">
                <div class="block-heading details" style="background: #fff !important;">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-2">
                            <h4>
                            <span class="heading-icon">
                                <i class="fa fa-home"></i>
                                </span>
                                <span class="hidden-xs"><?php print ucwords(strtolower($single_registered_property_details_array[0]['nazac_property_storey_type']));?></span>
                            </h4>
                        </div>
                        <div class="col-lg-6 col-md-6 col-10 cod-pad">
                            <div class="sorting-options">
                                <h5><span>Type:</span> <?php echo $single_registered_property_details_array[0]['nazac_property_type']; ?></h5>
                                <!--<h5 style="font-size: 13px;" class="type"><span>Type:</span> <?php /*print ucwords(strtolower($singleProperty['nazac_property_type']));*/?></h5>-->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Block heading end -->
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <?php

                            $extImg = explode(",", $single_registered_property_details_array[0]['nazac_property_exterior']);
                            /*$images = explode(",", $singleProperty['nazac_property_images']);*/
                            $sumImg = (count($extImg));
                            ?>
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <?php for($i=1;$i<=$sumImg;$i++){?>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php print $i;?>"></li>
                                <?php }?>

                            </ol>
                            <div class="carousel-inner" role="listbox">

                                <?php
                                for($i=0;$i<count($extImg)-1;$i++){?>
                                    <div class="carousel-item <?php if($i==0){ echo 'active'; } ?>">
                                        <img class="d-block img-fluid" src="<?php print base_url();?>resource/upload/registered_property/<?php print $extImg[$i];?>" alt="<?php print $extImg[$i];?>">
                                    </div>
                                <?php }?>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="blog-info details mt-10" style="background: #fff !important;">

                            <div class="homes-content details-2 mb-5 ">

                                <div class="homes-list clearfix">
										<span class="padd-20">
											<i class="fa fa-circle-o" aria-hidden="true"></i>
                                            <span><strong>Property Manager`s Name: </strong><?php print $single_registered_property_details_array[0]['nazac_property_caretaker_name'];?></span>
										</span>

                                </div>
                            </div>

                            <div class="homes-content details-2 mb-5 ">

                                <div class="homes-list clearfix">

                                    <span class="padd-20">
											<i class="fa fa-circle-o" aria-hidden="true"></i>
                                        <span><strong>Property Manager`s Phone Number: </strong><?php print $single_registered_property_details_array[0]['nazac_property_caretaker_phone'];?></span>
										</span>
                                    <span class="padd-20">
											<i class="fa fa-circle-o" aria-hidden="true"></i>
                                        <span><strong>Property Manager`s Phone Number: </strong><?php print $single_registered_property_details_array[0]['nazac_property_caretaker_phone_2'];?></span>
										</span>

                                </div>
                            </div>

                            <!--<div class="homes-content details-2 mb-5">

                                <div class="homes-list clearfix">
                                    <span class="padd-20">
											<i class="fa fa-circle-o" aria-hidden="true"></i>
                                        <span><strong>Caretaker Email Address: </strong><?php /*print $single_registered_property_details_array[0]['nazac_property_caretaker_email'];*/?></span>
                                    </span>
                                    <span class="padd-20">
											<i class="fa fa-circle-o" aria-hidden="true"></i>
                                        <span><strong>Caretaker Address: </strong><?php /*print $single_registered_property_details_array[0]['nazac_property_caretaker_address'];*/?></span>
                                    </span>
                                </div>
                            </div>-->

                            <div class="homes-content details-2 mb-5">

                                <div class="homes-list clearfix">
                                    <span class="padd-20">
											<i class="fa fa-circle-o" aria-hidden="true"></i>
                                        <span><strong>Property Manager`s Account Name: </strong><?php print $single_registered_property_details_array[0]['nazac_property_caretaker_ac_name'];?></span>
                                    </span>

                                    <span class="padd-20">
											<i class="fa fa-circle-o" aria-hidden="true"></i>
                                        <span><strong>Property Manager`s Account Number: </strong><?php print $single_registered_property_details_array[0]['nazac_property_caretaker_ac_nom'];?></span>
                                    </span>
                                </div>
                            </div>

                            <div class="homes-content details-2 mb-5">

                                <div class="homes-list clearfix">
                                    <span class="padd-20">
											<i class="fa fa-circle-o" aria-hidden="true"></i>
                                        <span><strong>Property Manager`s Bank Name: </strong><?php print $single_registered_property_details_array[0]['nazac_property_caretaker_bank_name'];?></span>
                                    </span>
                                </div>
                            </div>

                            <div class="homes-content details-2 mb-5">
                                <div class="homes-list clearfix">
                                    <span class="padd-20">
											<i class="fa fa-circle-o" aria-hidden="true"></i>
                                        <span><strong>Closest Landmark: </strong> <?php print $single_registered_property_details_array[0]['nazac_property_closest_landmark'];?></span>
                                    </span>
                                    <span class="padd-20">
											<i class="fa fa-circle-o" aria-hidden="true"></i>
                                        <span><strong>Distance From Landmark: </strong><?php print $single_registered_property_details_array[0]['nazac_property_distance_from_landmark'];?></span>
                                    </span>
                                </div>
                            </div>
                            <!--<div class="boder_p text-success" style="margin-top: -30px; font-size: 16px;">
                                <span>
                                    <strong style="color: #000;"><i style="color: #000;" class="fa fa-map"></i> </strong> <?php /*print ucwords(strtolower($single_registered_property_details_array[0]['nazac_property_closest_landmark']));*/?></span>  |
                                <span><strong style="color: #000;"><i style="color: #000;" class="fa fa-object-group"></i> Distance From Landmark:</strong> <?php /*print $single_registered_property_details_array[0]['nazac_property_distance_from_landmark'];*/?></span>
                            </div>-->

                            <?php if($single_registered_property_details_array[0]['nazac_property_youtube_video']==""){
                                $youtub = 'youtub100';
                            }else if($single_registered_property_details_array[0]['nazac_property_youtube_video']==""){
                                $youtub = 'youtub100';
                            }else if($single_registered_property_details_array[0]['nazac_property_youtube_video']!=""){
                                $youtub = 'youtub100';
                            }else if($single_registered_property_details_array[0]['nazac_property_youtube_video']!=""){
                                $youtub = 'youtub50';
                            }else{
                                $youtub = '';
                            }?>

                            <div  style="margin-top: -30px;" class="property-location ">
                                <?php if($single_registered_property_details_array[0]['nazac_property_youtube_video']==""){}else{?>
                                    <div class="<?php print $youtub;?> pull-left">
                                        <?php $by = explode("=",$single_registered_property_details_array[0]['nazac_property_youtube_video']); $vid = end($by);?>
                                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php print $vid;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                <?php }?>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12 mb-4" style="background-color: #eee">
                        <div class="row" style="min-height: 50px; border-top:5px solid #121B22; margin-bottom: 10px">
                            <?php if(!empty($single_registered_property_details_array[0]['nazac_property_bad_defects'])){ ?>
                                <div class="col-sm-12">
                                    <h3>Features</h3>
                                </div>
                                <?php  $features = $this->extras->createArrayFromAnotherArrayWhileOmittingEmptyValues(explode(',',$single_registered_property_details_array[0]['nazac_property_amenities']))?>
                                <?php for($i = 0; $i < count($features); $i++){ ?>
                                    <div class="col-sm-3">
                                        <span class="label label-info" style="font-size: 1em"><?php echo $features[$i]; ?></span>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-sm-6">

                            </div>
                            <hr>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-4" style="background-color: #eee">
                        <div class="row" style="min-height: 50px; border-top:5px solid #121B22; margin-bottom: 10px">
                            <?php if(!empty($single_registered_property_details_array[0]['nazac_property_bad_defects'])){ ?>
                            <div class="col-sm-12">
                                <h3>Bad Defects</h3>
                            </div>
                            <?php  $splitte_bad_defects = $this->extras->createArrayFromAnotherArrayWhileOmittingEmptyValues(explode(',',$single_registered_property_details_array[0]['nazac_property_bad_defects']))?>
                            <?php for($i = 0; $i < count($splitte_bad_defects); $i++){ ?>
                            <div class="col-sm-3">
                                <span class="label label-danger" style="font-size: 1em"><?php echo $splitte_bad_defects[$i]; ?></span>
                            </div>
                            <?php } ?>
                            <?php } ?>
                            <div class="col-sm-6">

                            </div>
                            <hr>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-4" style="background-color: #eee">
                        <div class="row" style="min-height: 50px; border-top:5px solid #121B22; margin-bottom: 10px">
                            <div class="col-sm-12">
                                <h3>Additional Features/Attributes</h3>
                            </div>

                            <div class="col-sm-6">
                                <strong>Purpose </strong><span class="label label-primary" style="font-size: 1em"><?php echo $this->extras->returnNone($single_registered_property_details_array[0]['nazac_property_purpose']); ?></span>
                            </div>
                            <div class="col-sm-6">
                                <strong>Apartment Standard: </strong><span class="label label-primary" style="font-size: 1em"><?php echo $this->extras->returnNone($single_registered_property_details_array[0]['nazac_apartment_standard']); ?></span>
                            </div>
                            <hr width="100%" size="10px" color="black" >
                            <div class="col-sm-4">
                                <strong>Currency for Payment: </strong><span class="label label-primary" style="font-size: 1em"><?php echo $this->extras->returnNone($single_registered_property_details_array[0]['nazac_property_currency']); ?></span>
                            </div>
                            <div class="col-sm-4">
                                <strong>Legal Fee: </strong><span class="label label-primary" style="font-size: 1em"><?php echo $single_registered_property_details_array[0]['nazac_property_currency'].' '.$this->extras->returnNone($single_registered_property_details_array[0]['nazac_property_legal_fee']); ?></span>
                            </div>
                            <div class="col-sm-4">
                                <strong>Agent`s Fee: </strong><span class="label label-primary" style="font-size: 1em"><?php echo $single_registered_property_details_array[0]['nazac_property_currency'].' '.$this->extras->returnNone($single_registered_property_details_array[0]['nazac_property_agents_fee']); ?></span>
                            </div>
                            <hr width="100%" size="10px" color="black" >
                            <div class="col-sm-4">
                                <strong>Price per Apartment: </strong><span class="label label-primary" style="font-size: 1em"><?php echo $single_registered_property_details_array[0]['nazac_property_currency'].' '.$this->extras->returnNone($single_registered_property_details_array[0]['nazac_property_price']); ?></span>
                            </div>
                            <div class="col-sm-4">
                                <strong>Older Price per Apartment: </strong><span class="label label-primary" style="font-size: 1em"><?php echo $single_registered_property_details_array[0]['nazac_property_currency'].' '.$this->extras->returnNone($single_registered_property_details_array[0]['nazac_property_older_price']); ?></span>
                            </div>
                            <div class="col-sm-4">
                                <strong>Number of Parking Space: </strong><span class="label label-primary" style="font-size: 1em"><?php echo $this->extras->returnNone($single_registered_property_details_array[0]['no_of_parking_space']); ?></span>
                            </div>
                            <hr width="100%" size="10px" color="black" >
                            <div class="col-sm-12">
                                <strong>Description of Property: </strong><br><span class="alert alert-primary" style="font-size: 1em"><?php echo $this->extras->returnNone($single_registered_property_details_array[0]['nazac_property_description']); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-4">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="property-location mb-5">
                                    <h5>Location</h5>
                                    <div class="col-lg-12 alert alert-default" style="overflow-x: scroll">
                                        <span><i class="fa fa-map-marker"></i> <?php //print $titil;?></span>
                                        <?php if($single_registered_property_details_array[0]['nazac_property_map_cordinates']==""){}else{?>
                                            | <?php print @$single_registered_property_details_array[0]['nazac_property_map_cordinates'];?>
                                            <a target="_blank" href="http://maps.google.com/?q=<?php print $single_registered_property_details_array[0]['nazac_property_map_cordinates'];?>">See Map on Google</a>
                                            <?php $cords = explode(",",$single_registered_property_details_array[0]['nazac_property_map_cordinates']);?>
                                            <input id="cord1" type="hidden" value="<?php print @$cords[0];?>">
                                            <input id="cord2" type="hidden" value="<?php print trim(@$cords[1]);?>">
                                            <div id="my_map_add" style="width:100%;height:300px;"></div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- cars content -->
                </div>

                <!--<div class="property-location mb-5">
                    <h5>Location</h5>
                    <div class="col-lg-12 alert alert-default" style="overflow-x: scroll">
                        <span><i class="fa fa-map-marker"></i> <?php /*print $titil;*/?></span>
                        <?php /*if($singleProperty['nazac_property_map_cordinates']==""){}else{*/?>
                            | <?php /*print @$singleProperty['nazac_property_map_cordinates'];*/?>
                            <a target="_blank" href="http://maps.google.com/?q=<?php /*print $singleProperty['nazac_property_map_cordinates'];*/?>">See Map on Google</a>
                            <?php /*$cords = explode(",",$singleProperty['nazac_property_map_cordinates']);*/?>
                            <input id="cord1" type="hidden" value="<?php /*print @$cords[0];*/?>">
                            <input id="cord2" type="hidden" value="<?php /*print trim(@$cords[1]);*/?>">
                            <div id="my_map_add" style="width:100%;height:300px;"></div>
                        <?php /*}*/?>
                    </div>
                </div>-->

            </div>
            <aside class="col-lg-3 col-md-12 car ">
                <div class="widget boder_p">
                    <div class="section-heading">
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="media-body">
                                <h5>Search Properties</h5>
                                <div class="border"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Search Fields -->
                    <div class="main-search-field padit">
                        <!--<h5 class="title">Filter</h5>-->
                        <div class="">
                            <div style="font-size: 18px;" class="col-12 boder_p text-left">
                                <i class="fa fa-bullhorn red-text"></i>&nbsp;
                                <a onClick="alert('!Ooops channel not opened');" class="red-text" href="javascript:;">Report listing</a>
                            </div>
                        </div>
                        <form method="GET">
                            <div class="at-col-default-mar">
                                <select class="form-control selctBg" name="location" id="location">
                                    <option value="" selected="selected">--Property Location--</option>
                                    <?php for($i=0;$i<count($locations);$i++){?>
                                        <option value="<?php echo $locations[$i]['nazac_location_id'];?>"><?php echo ucfirst($locations[$i]['nazac_location_name']);?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="at-col-default-mar">
                                <select class="form-control selctBg" name="category" id="category">
                                    <option value="" selected="selected">--Property Category--</option>
                                    <?php for($i=0;$i<count($category);$i++){?>
                                        <option value="<?php echo $category[$i]['nazac_category_id'];?>"><?php echo ucfirst($category[$i]['nazac_category_name']);?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="at-col-default-mar">
                                <div class="at-col-default-mar">
                                    <select class="form-control selctBg" name="category" id="category">
                                        <option value="" selected="selected">--Property Type--</option>
                                        <?php for($i=0;$i<count($propertyType);$i++){?>
                                            <option value="<?php echo $propertyType[$i]['property_type'];?>"><?php echo ucfirst($propertyType[$i]['property_type']);?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="at-col-default-mar">
                                <select class="form-control selctBg" name="bedroom" id="bedroom">
                                    <option value="0" selected>Beds</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            <div class="at-col-default-mar">
                                <select class="form-control selctBg" name="bath" id="bath">
                                    <option value="0" selected>Baths</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            <div class="main-search-field-2">
                                <div class="at-col-default-mar">
                                    <input type="number" name="budget" id="budget" class="at-input m-t-lg-30 m-t-xs-0 m-t-sm-10" placeholder="Budget">
                                </div>
                            </div>
                            <div class="col-lg-12 no-pds">
                                <div class="at-col-default-mar">
                                    <button class="btn btn-default hvr-bounce-to-right" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="recent-post py-5">
                        <h5 class="font-weight-bold mb-4">Recent Properties</h5>
                        <?php if($property_data>0){
                            for($i=0;$i<count($property_data);$i++){?>
                                <div class="recent-main mb-4 boder_p">
                                    <div class="recent-img">
                                        <a href="<?php print base_url();?>users/user/property-details/<?php print $property_data[$i]['nazac_property_unique_id'];?>"><img class="boder_p" src="<?php print base_url();?>resource/upload/registered_property/<?php print $property_data[$i]['nazac_property_thumbnail'];?>" alt="<?php print  ucwords($property_data[$i]['nazac_property_title']);?>"></a>
                                    </div>
                                    <div class="info-img">
                                        <a href="<?php print base_url();?>users/user/property-details/<?php print $property_data[$i]['nazac_property_unique_id'];?>"><h6><?php print ucwords(strtolower($this->Dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$property_data[$i]['nazac_property_category'],'nazac_category_name')));?></h6></a>
                                        <p><?php if($property_data[$i]['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?> <?php print number_format($property_data[$i]['nazac_property_price']);?></p>
                                    </div>
                                </div>
                            <?php }?>
                        <?php }else{
                            print '<h4>No property listing was found.</h4>';
                        }?>
                    </div>
                    <div class="recent-post">
                        <h5 class="font-weight-bold mb-4">Popolar Tags</h5>

                        <div class="tags">
                            <?php for($i=0;$i<count($locations);$i++){?>
                                <span><a href="#" class="btn btn-outline-primary"><?php echo ucfirst($locations[$i]['nazac_location_name']);?></a></span>
                            <?php }?>
                        </div>

                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
<!-- END SECTION PROPERTIES LISTING -->