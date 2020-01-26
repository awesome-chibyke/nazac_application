
<section class="headings">
    <div class="text-heading text-center">
        <div class="container">

            <?php if($roomy_request_details_array[0]['purpose']==='existing_apartment') { ?>

                <?php $prefered_location = $this->Admin->dbSelectWithOrWithoutParameter('nazac_property_locations', array('nazac_location_id'=>$singleProperty['nazac_property_location']))?>

                <h1 class="title_head"><?php echo 'Am '.$singleAgent['nazac_clients_lname'].' '.$singleAgent['nazac_clients_fname'].', I HAVE A '.$singleProperty['nazac_property_title'].' LOCATED AT '.strtoupper($prefered_location['result'][0]['nazac_location_name']).', AM IN SEARCH OF A ROOMATE TO JOIN ME'; ?></h1>

            <?php } ?>
            <?php if($roomy_request_details_array[0]['purpose']==='no_apartment') { ?>

                <?php $prefered_location = $this->Admin->dbSelectWithOrWithoutParameter('nazac_property_locations', array('nazac_location_id'=>$roomy_request_details_array[0]['prefered_location']))?>

                <h1 class="title_head"><?php echo 'Am '.$singleAgent['nazac_clients_lname'].' '.$singleAgent['nazac_clients_fname'].', '.strtoupper('Am in search of a room mate with a '.$roomy_request_details_array[0]['prefered_property_type'].' apartment at '.strtoupper($prefered_location['result'][0]['nazac_location_name'])); ?></h1>
            <?php } ?>

            <h2>
                <?php echo $this->thedateguy->returnDateTimeFromCarbon($roomy_request_details_array[0]['date_created'], '-', ':'); ?></h2>

            <?php  if( $interest_for_roomy_row_count == 1 &&  $interest_for_roomy_request_array['id_of_the_user_that_indicated_interest'] === $user_data['nazac_id']){ ?>
                <p style="margin-top: 15px; padding-left: 10px; padding-right:10px;" >
                    <span class="my_alert alert-success">You Indicated Interest for this Request</span>
                </p>
            <?php } ?>

        </div>
    </div>
</section>
<!-- END SECTION HEADINGS -->

<!-- START SECTION AGENTS -->
<section class="agents team" style="padding-bottom: 0px;" >
    <div class="container">
        <div class="row">

            <div class="col-lg-12">

                <?php
                if( $this->session->flashdata('form_error') ){ ?>
                    <div class="col-sm-12 alert alert-warning text-center" style="margin-top: 30px">
                        <?php
                        echo $this->session->flashdata('form_error');
                        ?>
                    </div>
                <?php } ?>

                <?php
                if( $this->session->flashdata('form_success') ){ ?>
                    <div class="col-sm-12 alert alert-success text-center" style="margin-top: 30px">
                        <?php
                        echo $this->session->flashdata('form_success');
                        ?>
                    </div>
                <?php } ?>

                <div class="col-lg-12 is_card" style="position: relative;">

                    <div class="row">
                        <div class="col-sm-8">
                            <h3 class="text-left" style="color:white;">Details Of Room Mate Seeker</h3>
                        </div>

                        <div class="col-xs-4 text-right">


                            <ul style="list-style-type: none; padding: 0px; margin: 0px;" class="action-list pl-0 pull-right">
                                <?php if($roomy_request_details_array[0]['roomate_seeker_id'] === $user_data['nazac_id']){ ?>
                                    <li style="float: left;" class="action-item pl-2"><a style="color:#f7a13e; " href="<?php echo base_url('roomy/mains/find_roomate/edit/'.$roomy_request_details_array[0]['unique_id']); ?>" title="Edit Room Mate Request"><i class="fa fa-edit fa-2x"></i></a></li>
                                    <li style="float: left;" class="action-item pl-2"><a href="<?php echo base_url('roomy/mains/view_interest/'.$roomy_request_details_array[0]['unique_id'])?>" title="You have <?php echo $all_interest_for_roomy_request_count ?> pending interest indication from propective room mates"><i class="fa fa-bell fa-2x" style="color:#f7a13e;"></i><span class="badge badge-info"><?php echo $all_interest_for_roomy_request_count; ?></span></a></li>
                                <?php } ?>

                                <?php if($roomy_request_details_array[0]['roomate_seeker_id'] !== $user_data['nazac_id']){ ?>
                                    <li style="float: left; margin-left: 10px;" class="action-item"><a style="color:#f7a13e;" href="javascript:;" onclick="indicateInterestToBeARoomMate('<?php echo $roomy_request_details_array[0]['unique_id']; ?>')" title="I am interested in being your room mate"><i class="fa fa-check-square-o fa-2x"></i></a></li>
                                <?php } ?>
                                <!--<li class="action-item"><i class="fa fa-share-alt"></i> <span></span></li>-->
                            </ul>

                            <?php $interest_for_roomy_request_by_this_user = $this->Admin->dbSelectWithOrWithoutParameter('response_for_roomy_request_tb', array('roomy_request_id' => $roomy_request_details_array[0]['unique_id'], 'id_of_the_user_that_indicated_interest'=>$user_data['nazac_id'])); ?>

                            <?php if($interest_for_roomy_request_by_this_user['row_count'] == 1){ ?>
                                <span  class="my_alert alert-danger"><?php echo ucfirst($interest_for_roomy_request_by_this_user['result'][0]['interest_status']); ?></span>
                            <?php } ?>

                        </div>

                    </div>

                </div>

                <div class="agent agent-row shadow-hover">
                    <a href="#" class="agent-img">
                        <div class="img-fade"></div>
                        <div class="button alt agent-tag"> Properties</div>

                        <img src="<?php print base_url();?>resource/upload/<?php print $singleAgent['nazac_client_passport'];?>" alt="<?php print  $singleAgent['nazac_clients_fname'].' '.$singleAgent['nazac_clients_lname'];?>" />
                    </a>
                    <div class="agent-content">
                        <div class="agent-details">
                            <h4><a href="#"><?php print strtoupper(strtolower($singleAgent['nazac_clients_fname'].' '.$singleAgent['nazac_clients_lname']));?></a></h4>
                            <p><i class="fa fa-tag icon"></i><?php echo ucfirst($singleAgent['nazac_client_role']) ?></p>
                            <p><i class="fa fa-envelope icon"></i><?php print $singleAgent['nazac_client_email'];?></p>
                            <p><i class="fa fa-phone icon"></i><?php print $singleAgent['nazac_client_phone'];?></p>

                        </div>

                        <div class="agent-text" style="margin-bottom: 50px;">
                            <?php $department_name = $this->Admin->dbSelectWithOrWithoutParameter('faculty_table', array('unique_id'=>$singleAgent['nazac_client_department']))?>
                            <div style="display: inline-block; margin-top: 5px; margin-bottom: 5px;"><strong>Department: </strong><span><?php if(empty($singleAgent['nazac_client_department'])){ echo 'None'; }else{ echo $department_name['result'][0]['department_name']; }; ?> </span> </div>

                            <?php $faculty_name = $this->Admin->dbSelectWithOrWithoutParameter('faculty_table', array('unique_id'=>$singleAgent['nazac_client_faculty']))?>
                            <div style="display: inline-block; margin-top: 5px; margin-bottom: 5px;"><strong>Faculty: </strong><span><?php if(empty($singleAgent['nazac_client_faculty'])){ echo 'None'; }else{ echo $faculty_name['result'][0]['faculty_name']; };?> </span> </div>

                            <div><?php print $roomy_request_details_array[0]['description_of_personality'];?></div>
                        </div>
                        <div class="agent-footer center">
                            <ul class="netsocials">

                                <li>
                                    <a data-toggle="tooltip" title="Connect On Facebook" data-placement="top" target="_blank" href="<?php print $singleAgent['nazac_client_facebook_handel'];?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>

                                <li><a data-toggle="tooltip" title="Connect On Twitter" data-placement="top" target="_blank" href="<?php print $singleAgent['nazac_client_twitter_handel'];?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li>
                                    <a data-toggle="tooltip" title="Connect On Instagram" data-placement="top" target="_blank" href="<?php print $singleAgent['nazac_client_instagram_handel'];?>" title="instagran"><i class="fa fa-instagram" style="border: solid #ccc 1px; background: #ccc;" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a data-toggle="tooltip" title="Click to chat" data-placement="top" style="font-size:15px;" target="_blank" href="https://wa.me/<?php print $singleAgent['nazac_client_whatsapp_number'];?>?text=Hi <?php print $singleAgent['nazac_clients_fname'];?>, i am intrested in the property listed in <?php print $siteDetail['site_name'];?>"><i class="fab fa-whatsapp fa-2x text-success" aria-hidden="true"></i></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

            <!-- START SECTION FEATURED PROPERTIES -->

            <!-- END SECTION FEATURED PROPERTIES -->
        </div>
        <!-- end row -->

    </div>
</section>
<!-- END SECTION AGENTS -->


<section style="margin-top: -50px !important;" class="blog details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 blog-pots boder_p">

                    <div class="col-lg-12 is_card">

                        <div class="row">
                            <?php if($roomy_request_details_array[0]['purpose']==='existing_apartment'){ ?>
                            <div class="col-sm-6">


                                    <?php if($roomy_request_details_array[0]['nazac_property_location'] == ""){?>
                                        <?php $prefered_location = $this->Admin->dbSelectWithOrWithoutParameter('nazac_property_locations', array('nazac_location_id'=>$singleProperty['nazac_property_location']))?>
                                    <?php }else{ ?>
                                        <?php $prefered_location = $this->Admin->dbSelectWithOrWithoutParameter('nazac_property_locations', array('nazac_location_id'=>$roomy_request_details_array[0]['nazac_property_location']))?>
                                    <?php } ?>

                                    <h5 style="font-size: 17px; color: #fff;" class="type"><span>Lodge Name: </span> <?php print $reg_property_data['nazac_property_lodge_name'];?> LOCATED AT <?php echo $prefered_location['result'][0]['nazac_location_name']; ?></h5>


                            </div>
                            <div class="col-sm-6">
                                <h5 style="font-size: 13px; color: #fff;" class="type"><strong>RIN:</strong> <?php print $singleProperty['nazac_property_room_number'].'/'.$reg_property_data['nazac_property_number'];?></h5>
                            </div>
                            <?php } ?>

                            <?php if($roomy_request_details_array[0]['purpose']==='no_apartment') { ?>
                                <?php $prefered_location = $this->Admin->dbSelectWithOrWithoutParameter('nazac_property_locations', array('nazac_location_id'=>$roomy_request_details_array[0]['prefered_location'])) ?>
                            <div class="col-sm-6">
                                <h5 style="font-size: 17px; color: #fff;" class="type"> <span>Preferred Location of Property: </span><?php print $prefered_location['result'][0]['nazac_location_name'];?> </h5>
                            </div>
                            <div class="col-sm-6">
                                <h5 style="font-size: 13px; color: #fff;" class="type"><span>Preferred Apartment/Property Type: </span> <?php print $roomy_request_details_array[0]['prefered_property_type'];?></h5>
                            </div>
                            <?php } ?>

                        </div>

                    </div>
                    <?php if($roomy_request_details_array[0]['purpose']==='existing_apartment') { ?>
                    <div class="col-lg-12 is_card">

                        <div class="row">
                            <div class="col-lg-6">
                                <strong>Type of Apartment/Property: </strong>
                                <?php
                                $cat = ucwords(strtolower($this->Dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$singleProperty['nazac_property_category'],'nazac_category_name')));

                                $loca = ucwords(strtolower($this->Dbmodel->returnSingleData($this->lib->nazac_property_locations,'nazac_location_id',$singleProperty['nazac_property_location'],'nazac_location_name')));

                                print $titil = ucwords(strtolower($singleProperty['nazac_property_title'].' ( '.$singleProperty['nazac_property_floor_type'].' ) '))?>
                            </div>
                            <div class="col-lg-6">
                                <strong>Preferred Room Mate Pair Option: </strong>
                                <?php echo ucfirst($roomy_request_details_array[0]['room_mate_pair']); ?>
                            </div>
                        </div>

                    </div>
                    <?php } ?>
                    <!--<div class="col-lg-12 is_card">


                    </div>-->
                    <div class="col-lg-12 is_card">

                        <div class="row">
                            <div class="col-sm-6">
                                <strong>Name of Preferred Faculty/Department: </strong>
                                <?php echo ucfirst($roomy_request_details_array[0]['faculty_department_name']); ?>
                            </div>
                            <div class="col-sm-6">
                                <strong>Preferred Gender: </strong>
                                <?php echo ucfirst($roomy_request_details_array[0]['gender']); ?>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12 is_card">

                        <div class="row">
                            <div class="col-sm-6">
                                <strong>Preferred Level: </strong>
                                <?php echo ucfirst($roomy_request_details_array[0]['prefered_level']); ?> Level
                            </div>
                            <?php if($roomy_request_details_array[0]['nazac_price_of_rent'] !== ""){ ?>
                            <div class="col-sm-6">

                                    <strong>Rent (<?php if($singleProperty['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?>): </strong>
                                    <?php echo number_format($roomy_request_details_array[0]['nazac_price_of_rent'], 2, '.', ','); ?>
                            </div>
                            <?php } ?>
                        </div>

                    </div>

                    <div class="col-lg-12 is_card">

                        <div class="row">

                            <?php if(!empty($roomy_request_details_array[0]['nazac_property_storey_type'])){ ?>
                            <div class="col-sm-6">
                                <strong>Property Storey Type: </strong>
                                <?php echo $roomy_request_details_array[0]['nazac_property_storey_type']; ?>
                            </div>
                            <?php } ?>

                            <?php if(!empty($roomy_request_details_array[0]['amount_budgeted'])){ ?>
                            <div class="col-sm-6">

                                <strong>Amount Budgeted (₦): </strong>
                                <?php echo $roomy_request_details_array[0]['amount_budgeted']; ?>
                            </div>
                            <?php } ?>
                        </div>


                    </div>


                    <?php if(!empty($roomy_request_details_array[0]['nazac_property_location'])){ ?>

                        <?php if($roomy_request_details_array[0]['nazac_property_location'] == ""){?>
                            <?php $prefered_location = $this->Admin->dbSelectWithOrWithoutParameter('nazac_property_locations', array('nazac_location_id'=>$singleProperty['nazac_property_location']))?>
                        <?php }else{ ?>
                            <?php $prefered_location = $this->Admin->dbSelectWithOrWithoutParameter('nazac_property_locations', array('nazac_location_id'=>$roomy_request_details_array[0]['nazac_property_location']))?>
                        <?php } ?>

                        <div class="col-lg-12 is_card">

                            <strong>Location of Property: </strong>
                            <?php echo ucwords($prefered_location['result'][0]['nazac_location_name']); ?>
                        </div>

                    <?php } ?>

                    <div class="col-lg-12">
                    <?php if($roomy_request_details_array[0]['purpose']==='existing_apartment') { ?>

                    <div class="block-heading details" style="background: #fff !important;">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-2">
                                <h4>
                            <span class="heading-icon">
                                <i class="fa fa-home"></i>
                                </span>
                                    <span class="hidden-xs">Property <?php print ucwords(strtolower($cat));?></span>
                                </h4>
                            </div>
                            <div class="col-lg-6 col-md-6 col-10 cod-pad">
                                <div class="sorting-options">
                                    <h5><span>Price:</span> <?php if($singleProperty['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?> <?php print number_format($singleProperty['nazac_property_price']);?></h5>
                                    <h5 style="font-size: 13px;" class="type"><span>Type:</span> <?php print ucwords(strtolower($singleProperty['nazac_property_type']));?></h5>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Block heading end -->
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <?php if($roomy_request_details_array[0]['nazac_apartment_images'] === ""){ ?>
                                <?php $extImg = explode(",", $reg_property_data['nazac_property_exterior']);
                                $images = explode(",", $singleProperty['nazac_property_images']);
                                $sumImg = (count($extImg)+count($images))-2;
                                ?>
                                <?php } ?>

                                <?php if($roomy_request_details_array[0]['nazac_apartment_images'] !== ""){ ?>
                                    <?php $images = explode(",", $roomy_request_details_array[0]['nazac_apartment_images']);
                                    $sumImg = count($images);
                                    ?>
                                <?php } ?>

                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <?php for($i=1;$i<=$sumImg;$i++){?>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php print $i;?>"></li>
                                    <?php }?>

                                    <!--<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>-->
                                </ol>
                                <div class="carousel-inner" role="listbox">

                                    <?php if($roomy_request_details_array[0]['nazac_apartment_images'] === ""){ ?>
                                    <div class="carousel-item active">
                                        <img class="d-block img-fluid" src="<?php print base_url();?>resource/upload/registered_property/<?php  print $singleProperty['nazac_property_thumbnail'];?>" alt="<?php print $titil;?>">
                                    </div>
                                    <?php } ?>


                                        <?php
                                        for($i=0;$i<count($images)-1;$i++){?>
                                            <div class="carousel-item <?php if($i == 0 && $roomy_request_details_array[0]['nazac_apartment_images'] !== ""){ echo 'active'; }?>">
                                                <img class="d-block img-fluid" src="<?php print base_url();?>resource/upload/registered_property/<?php print $images[$i];?>" alt="<?php print $titil;?>">
                                            </div>
                                        <?php } ?>

                                    <?php if($roomy_request_details_array[0]['nazac_apartment_images'] === ""){ ?>

                                    <?php
                                    for($i=0;$i<count($extImg)-1;$i++){?>
                                        <div class="carousel-item">
                                            <img class="d-block img-fluid" src="<?php print base_url();?>resource/upload/registered_property/<?php print $extImg[$i];?>" alt="<?php print $titil;?>">
                                        </div>
                                    <?php } ?>
                                    <?php } ?>

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
                            <div class="blog-info details" style="background: #fff !important;">
                                <!-- cars content -->
                                <div class="homes-content details-2 mb-5">
                                    <!-- cars List -->
                                    <div class="homes-list clearfix">
										<span class="padd-20">
											<i class="fa fa-bed" aria-hidden="true"></i>
											<span>Beds <?php print $singleProperty['nazac_property_no_of_rooms'];?></span>
										</span>
                                        <span class="padd-20">
											<i class="fa fa-bath" aria-hidden="true"></i>
											<span>Baths <?php print $singleProperty['nazac_property_no_of_bathrooms'];?></span>
										</span>
                                        <span class="padd-20">
											<i class="fa fa-object-group" aria-hidden="true"></i>
											<span><?php print $singleProperty['nazac_property_approximate_size'];?></span>
										</span>
                                        <span class="padd-20">
											<i class="fa fa-car" aria-hidden="true"></i>
											<span>Garages <?php print $singleProperty['nazac_property_no_of_parking_space'];?></span>
										</span>
                                        <span class="padd-20">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Room Number <?php print $singleProperty['nazac_property_room_number'];?></span>
										</span>
                                    </div>
                                </div>
                                <div class="boder_p text-success is_card" style="margin-top: -30px; font-size: 16px; background-color: #121B22 !important; text-align: center;">
                                    <span><strong style="color: #fff;"><i style="color: #000;" class="fa fa-map"></i> Closest Landmark:</strong> <?php print ucwords(strtolower($singleProperty['nazac_property_closest_landmark']));?></span>  |
                                    <span><strong style="color: #fff;"><i style="color: #000;" class="fa fa-object-group"></i> Distance From Landmark:</strong> <?php print $singleProperty['nazac_property_distance_from_landmark'];?></span>
                                </div>


                                <?php if($singleProperty['nazac_property_youtube_link']=="" && $reg_property_data['nazac_property_youtube_video']==""){
                                    $youtub = 'youtub100';
                                }else if($singleProperty['nazac_property_youtube_link']=="" && $reg_property_data['nazac_property_youtube_video']!=""){
                                    $youtub = 'youtub100';
                                }else if($singleProperty['nazac_property_youtube_link']!="" && $reg_property_data['nazac_property_youtube_video']==""){
                                    $youtub = 'youtub100';
                                }else if($singleProperty['nazac_property_youtube_link']!="" && $reg_property_data['nazac_property_youtube_video']!=""){
                                    $youtub = 'youtub50';
                                }else{
                                    $youtub = '';
                                }?>

                                <!--<div  style="margin-top: -30px;" class="property-location ">
                                    <?php /*if($singleProperty['nazac_property_youtube_link']==""){}else{*/?>
                                        <div class="<?php /*print $youtub;*/?> pull-left">
                                            <?php /*$by = explode("=",$singleProperty['nazac_property_youtube_link']); $vid = end($by);*/?>
                                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php /*print $vid;*/?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    <?php /*}*/?>

                                    <?php /*if($reg_property_data['nazac_property_youtube_video']==""){}else{*/?>
                                        <div class="<?php /*print $youtub;*/?> pull-left">
                                            <?php /*$by2 = explode("=",$reg_property_data['nazac_property_youtube_video']); $vid2 = end($by2);*/?>
                                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php /*print $vid2;*/?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    <?php /*}*/?>
                                </div>-->

                                <h5 class="mb-4">GENERAL INFORMATION</h5>
                                <p class="mb-3">
                                <div class="alert alert-success"><?php print $singleProperty['nazac_property_description'];?></div>
                                </p>

                            </div>
                        </div>
                    </div>
                    <!-- cars content -->
                    <div class="homes-content details mb-5">
                        <!-- title -->
                        <h5 class="mb-4">Amenities</h5>
                        <!-- cars List -->
                        <ul class="homes-list clearfix">
                            <?php $futur = explode(",", $singleProperty['nazac_property_features']);
                            for($i=0;$i<count($futur);$i++){?>
                                <li>
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                    <span><?php print $futur[$i];?></span>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="homes-content details mb-5" style="background: #fff !important;">
                        <!-- title -->
                        <h5 class="mb-4">Defect</h5>
                        <!-- cars List -->
                        <ul class="homes-list clearfix">
                            <?php $defet = explode(",", $singleProperty['nazac_property_defect_features']);
                            for($i=0;$i<count($defet);$i++){?>
                                <li>
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                    <span><?php print $defet[$i];?></span>
                                </li>
                            <?php }?>
                        </ul>
                    </div>

                    <div class="property-location mb-5">
                        <h5>Location</h5>
                        <div class="col-lg-12 alert alert-default" style="overflow-x: scroll">
                            <span><i class="fa fa-map-marker"></i> <?php print $titil;?></span>
                            <?php if($singleProperty['nazac_property_map_cordinates']==""){}else{?>
                                | <?php print @$singleProperty['nazac_property_map_cordinates'];?>
                                <a target="_blank" href="http://maps.google.com/?q=<?php print $singleProperty['nazac_property_map_cordinates'];?>">See Map on Google</a>
                                <?php $cords = explode(",",$singleProperty['nazac_property_map_cordinates']);?>
                                <input id="cord1" type="hidden" value="<?php print @$cords[0];?>">
                                <input id="cord2" type="hidden" value="<?php print trim(@$cords[1]);?>">
                                <div id="my_map_add" style="width:100%;height:300px;"></div>
                            <?php }?>
                        </div>
                    </div>
<?php } ?>
                </div></div>
            </div>
        </div>
    </section>


