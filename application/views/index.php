<!-- START SLIDER -->
    <!-- START REVOLUTION SLIDER 5.0.7 fullwidth mode -->
    <section class="main-slider">
        <div class="rev_slider_wrapper fullwidthbanner-container" id="rev_slider_one_wrapper" data-source="gallery">
            <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
                <ul>
                    <!-- Slide 1 -->
                    <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1689" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="<?php print base_url();?>resource/bg-img/feature2.jpg" data-title="Slide Title" data-transition="parallaxvertical">

                        <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" src="<?php print base_url();?>resource/bg-img/feature4.jpg">

                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-type="text" data-height="none" data-whitespace="nowrap" data-width="auto" data-text-align="center" data-hoffset="['10','50','0','0']" data-voffset="['-20','-20','-20','-20']" data-x="['right','right','center','center']" data-y="['middle','middle','middle','middle']" data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'>
                            <div class="section section-bg-1 pt-17 pb-17">
                                <div class="container">
                                    <div class="row">
                                       <?php if(($recentProperty)){?>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="property-box-meta">
                                                <div class="property-box-meta-content">
                                                    <span class="property-status"><?php print @$categori;?></span>
                                                    <div class="item-head">
                                                <h4 class="item-title">
												<a style="font-size: 15px !important;" href="<?php print base_url();?>users/user/property-details/<?php print $recentProperty[0]['nazac_property_unique_id'];?>" title="Store Space Greenville">
													<?php $string = ucwords($recentProperty[0]['nazac_property_title'].' '.$categori);  if(strlen($string)>30){ print substr($string, 0, 30).'...';}else{ print $string;}?> 
												</a>
											     </h4>
                                                    <span class="location"><?php $address = ucwords(strtolower($recentProperty[0]['nazac_property_street_address'].', '.$locatio.', '.$recentProperty[0]['nazac_property_town'].', '.$recentProperty[0]['nazac_property_local_gov_area'].', '.$recentProperty[0]['nazac_property_state'].', '.$recentProperty[0]['nazac_property_country']));
														if(strlen($address)>40){ print substr($address, 0, 40).'...';}else{ print $address;}
														?> </span>
                                                    </div>
                                                    <div class="info">
                                                        <span class="primary-file-1">
                                                        <i class="fas fa-warehouse" aria-hidden="true"></i>
									            <span><?php print $recentProperty[0]['nazac_property_no_of_parking_space'];?> Garages</span>											
                                                        </span>
                                                        <span class="primary-file-2">
												<i class="fa fa-bath" aria-hidden="true"></i>
									            <span><?php print $recentProperty[0]['nazac_property_no_of_bathrooms'];?> Bathrooms</span>
                                                        </span>
                                                        <span class="primary-file-3">
												<i class="fa fa-object-group" aria-hidden="true"></i>
									            <span><?php print $recentProperty[0]['nazac_property_approximate_size'];?> </span>
                                                        </span>
                                                        <span class="primary-file-4">
												<i class="fa fa-bed" aria-hidden="true"></i>
									            <span><?php print $recentProperty[0]['nazac_property_no_of_rooms'];?> Bedrooms</span>
                                                        </span>
                                                    </div>
                                                    <div class="price">
                                                        <span class="before-price"></span>
                                                        <span class="amount"><?php if($recentProperty[0]['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?>  &nbsp;<?php print number_format($recentProperty[0]['nazac_property_price']);?></span>
                                                    </div>
                                                    <a data-toggle="tooltip" data-placement="top" style="font-size: 15px !important;" href="<?php print base_url();?>users/user/property-details/<?php print $recentProperty[0]['nazac_property_unique_id'].'/'.str_replace(" ","-", $string);?>" title="lick To View Details"><u>Details</u></a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                        <div class="col-lg-4 col-md-12">
                                        <div class="col-lg-4 col-md-12">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li>
                    <!-- Slide 2 -->
                    <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1690" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="<?php print base_url();?>resource/bg-img/feature4.jpg" data-title="Slide Title" data-transition="parallaxvertical">

                        <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" src="<?php print base_url();?>resource/bg-img/feature2.jpg">

                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-type="text" data-height="none" data-whitespace="nowrap" data-width="auto" data-text-align="center" data-hoffset="['10','50','0','0']" data-voffset="['-20','-20','-20','-20']" data-x="['right','right','center','center']" data-y="['middle','middle','middle','middle']" data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'>
                            <div class="section section-bg-1 pt-17 pb-17">
                                <div class="container">
                                    <div class="row">
                                       
                                        <?php if(($recentProperty)!=0){?>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="property-box-meta">
                                                <div class="property-box-meta-content">
                                                    <span class="property-status"><?php print @$categori;?></span>
                                                    <div class="item-head">
                                                <h4 class="item-title">
												<a style="font-size: 15px !important;" href="<?php print base_url();?>users/user/property-details/<?php print $recentProperty[1]['nazac_property_unique_id'];?>" title="Store Space Greenville">
													<?php $string = ucwords($recentProperty[1]['nazac_property_title'].' '.$categori);  if(strlen($string)>30){ print substr($string, 0, 30).'...';}else{ print $string;}?> 
												</a>
											     </h4>
                                                    <span class="location"><?php $address = ucwords(strtolower($recentProperty[1]['nazac_property_street_address'].', '.$locatio.', '.$recentProperty[1]['nazac_property_town'].', '.$recentProperty[1]['nazac_property_local_gov_area'].', '.$recentProperty[1]['nazac_property_state'].', '.$recentProperty[1]['nazac_property_country']));
														
														if(strlen($address)>40){ print substr($address, 0, 40).'...';}else{ print $address;}
														?> </span>
                                                    </div>
                                                    <div class="info">
                                                        <span class="primary-file-1">
                                                        <i class="fas fa-warehouse" aria-hidden="true"></i>
									            <span><?php print $recentProperty[1]['nazac_property_no_of_parking_space'];?> Garages</span>											
                                                        </span>
                                                        <span class="primary-file-2">
												<i class="fa fa-bath" aria-hidden="true"></i>
									            <span><?php print $recentProperty[1]['nazac_property_no_of_bathrooms'];?> Bathrooms</span>
                                                        </span>
                                                        <span class="primary-file-3">
												<i class="fa fa-object-group" aria-hidden="true"></i>
									            <span><?php print $recentProperty[1]['nazac_property_approximate_size'];?> </span>
                                                        </span>
                                                        <span class="primary-file-4">
												<i class="fa fa-bed" aria-hidden="true"></i>
									            <span><?php print $recentProperty[1]['nazac_property_no_of_rooms'];?> Bedrooms</span>
                                                        </span>
                                                    </div>
													
                                                    <div class="price">
                                                        <span class="before-price"></span>
                                                        <span class="amount"><?php if($recentProperty[1]['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?>  &nbsp;<?php print number_format($recentProperty[1]['nazac_property_price']);?></span>
                                                    </div>
													
                                                    <a data-toggle="tooltip" data-placement="top" style="font-size: 15px !important;" href="<?php print base_url();?>users/user/property-details/<?php print $recentProperty[1]['nazac_property_unique_id'].'/'.str_replace(" ","-", $string);?>" title="Click To View Details"><u>Details</u></a>
													
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                        <div class="col-lg-4 col-md-12">
                                        <div class="col-lg-4 col-md-12">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- END REVOLUTION SLIDER -->
    <!-- END SECTION HEADINGS -->
    
    <!-- START SECTION SEARCH AREA -->
    <span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url();?>resource/loader/loading_spinner.gif"></span>
    
    
	<section class="main-search-field">
		<div class="container">
			<h3>Find Your Dream Appartment</h3>
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="at-col-default-mar">
						<select class="form-control" name="slocation" id="slocation">
							<option value="" selected="selected">--Property Location--</option>
							<?php for($i=0;$i<count($locations);$i++){?>
							<option value="<?php echo $locations[$i]['nazac_location_id'];?>"><?php echo ucfirst($locations[$i]['nazac_location_name']);?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="at-col-default-mar">
						<select class="form-control" name="scategory" id="scategory">
							<option value="" selected="selected">--Property Category--</option>
							<?php for($i=0;$i<count($category);$i++){?>
							<option value="<?php echo $category[$i]['nazac_category_id'];?>"><?php echo ucfirst($category[$i]['nazac_category_name']);?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="at-col-default-mar">
						<select class="form-control" name="stype" id="stype">
							<option value="" selected="selected">--Property Type--</option>
							<?php for($i=0;$i<count($propertyType);$i++){?>
							<option value="<?php echo str_replace(" ","_",$propertyType[$i]['property_type']);?>"><?php echo ucfirst($propertyType[$i]['property_type']);?></option>
							<?php }?>
						</select>
					</div>
				</div>
			
			
			
				<div class="col-lg-3 no-pds">
					<div class="at-col-default-mar no-mb">
						<input class="at-input" type="text" name="sminarea" id="sminarea" placeholder="Square Fit">
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<input  name="sbudget" id="sbudget" type="number" class="at-input m-t-lg-30 m-t-xs-0 m-t-sm-10" placeholder="Budget">
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="at-col-default-mar no-mb">
						<button id="serchbutton" class="btn btn-default hvr-bounce-to-right" type="submit">Search</button>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END SECTION SEARCH AREA -->
    
    <!-- START SECTION SERVICES -->
    <section class="services-home bg-white">
        <div class="container">
            <div class="section-title">
                <h3>Property</h3>
                <h2>Services</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12 m-top-0 m-bottom-40">
                    <div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
                        <div class="media">
                            <i class="fa fa-home bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
                        </div>
                        <div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
                            <h4 class="m-bottom-15 text-bold-700">Find A Property</h4>
                            <p>We simply make the whole "house hunting" experience as easy as going through your phone, searching for the property you want through 'property search form' and getting every detail you could possibly ask for.</p>
                            <a class="text-base text-base-dark-hover text-size-13" href="<?php print base_url();?>services">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 m-top-40 m-bottom-40">
                    <div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
                        <div class="media">
                            <i class="fas fa-building bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
                        </div>
                        <div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
                            <h4 class="m-bottom-15 text-bold-700"> Property Management </h4>
                            <p>We simply offer a better means of reaching out for clients by just having your property registered under us and enlist your vacancies for clients to view from the news feed, and make payment.</p>
                            <a class="text-base text-base-dark-hover text-size-13" href="<?php print base_url();?>services">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 m-top-40 m-bottom-40 commercial">
                    <div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
                        <div class="media">
                            <i class="fas fa-warehouse bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
                        </div>
                        <div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
                            <h4 class="m-bottom-15 text-bold-700">Finding A Roommate</h4>
                            <p>In this feature we offer our users a free medium to link up with the roommates of their choice. List your room so potential roommates can find you by the details of the apartment...</p>
                            <a class="text-base text-base-dark-hover text-size-13" href="<?php print base_url();?>services">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION SERVICES -->

    <!-- START SECTION RECENTLY PROPERTIES -->
    <section class="recently portfolio">
        <div class="container">
            <div class="section-title">
                <h3>Recently</h3>
                <h2>Properties</h2>
            </div>
            <div class="row portfolio-items">
               
               <?php if($propertythree>0){
					for($i=0;$i<count($propertythree);$i++){?>
                <div class="item col-lg-4 col-md-6 col-xs-12 landscapes">
                    <div class="project-single">
                        <div class="project-inner project-head">
                            <div class="project-bottom">
                                <h4><a href="<?php print base_url();?>users/user/property-details/<?php print $propertythree[$i]['nazac_property_unique_id'];?>">View Property</a><span class="category">Real Estate(<?php print $siteDetail['site_name'];?>)</span></h4>
                            </div>
                            <div class="button-effect">
                                <a href="<?php print base_url();?>users/user/property-details/<?php print $propertythree[$i]['nazac_property_unique_id'];?>" class="btn"><i class="fa fa-link"></i></a>
                                <a href="<?php print $propertythree[$i]['nazac_property_youtube_link'];?>" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                <a class="img-poppu btn" href="<?php print base_url();?>resource/upload/registered_property/<?php print $propertythree[$i]['nazac_property_thumbnail'];?>" data-rel="lightcase:myCollection:slideshow"><i class="fa fa-photo"></i></a>
                            </div>
                            <div class="homes">
                                <!-- homes img -->
								
									<div onClick="book('<?php print base_url();?>','<?php print $propertythree[$i]['nazac_property_unique_id'];?>','<?php print $user_data['nazac_id'];?>');" data-toggle="tooltip" data-placement="top" title="Book Appointment" class="homes-price">Book</div>
									
									<a href="<?php print base_url();?>users/user/property-details/<?php print $propertythree[$i]['nazac_property_unique_id'];?>" class="homes-img">
									
									<div class="homes-tag button alt featured"><?php print  ucwords($propertythree[$i]['nazac_property_rent_status']);?></div>
									
									<div class="homes-tag button alt sale"><?php print @$this->dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$propertythree[$i]['nazac_property_category'],'nazac_category_name');?></div>
									
									<img src="<?php print base_url();?>resource/upload/registered_property/<?php print $propertythree[$i]['nazac_property_thumbnail'];?>" alt="home-1" class="img-responsive">
                          			</a>
                           
                            </div>
                        </div>
                        <!-- homes content -->
                        
                        <div class="homes-content">
                            <!-- homes address -->
                            <h3 style="font-size: 16px !important;"><?php $string = ucwords($propertythree[$i]['nazac_property_title'].' '.$this->dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$propertythree[$i]['nazac_property_category'],'nazac_category_name'));  if(strlen($string)>30){ print substr($string, 0, 30).'...';}else{ print $string;}?></h3>
                            <p class="homes-address mb-3">
                                <a href="<?php print base_url();?>users/user/property-details/for-rent">
                                    <i class="fa fa-map-marker"></i><span>
                                    <?php $address = ucwords(strtolower($propertythree[$i]['nazac_property_street_address'].', '.$this->dbmodel->returnSingleData($this->lib->nazac_property_locations,'nazac_location_id',$propertythree[$i]['nazac_property_location'],'nazac_location_name').', '.$propertythree[$i]['nazac_property_town'].', '.$propertythree[$i]['nazac_property_local_gov_area'].', '.$propertythree[$i]['nazac_property_state'].', '.$propertythree[$i]['nazac_property_country']));
									if(strlen($address)>40){ print substr($address, 0, 40).'...';}else{ print $address;}?></span>
                                </a>
                            </p>
                            <!-- homes List -->
                            <ul class="homes-list clearfix">
                                <li>
                                    <i class="fa fa-bed" aria-hidden="true"></i>
                                    <span><?php print $propertythree[$i]['nazac_property_no_of_rooms'];?> Bedrooms</span>
                                </li>
                                <li>
                                    <i class="fa fa-bath" aria-hidden="true"></i>
                                    <span><?php print $propertythree[$i]['nazac_property_no_of_bathrooms'];?> Bathrooms</span>
                                </li>
                                <li>
                                    <i class="fa fa-object-group" aria-hidden="true"></i>
                                    <span><?php print $propertythree[$i]['nazac_property_approximate_size'];?></span>
                                </li>
                                <li>
                                    <i class="fas fa-warehouse" aria-hidden="true"></i>
                                    <span><?php print $propertythree[$i]['nazac_property_no_of_parking_space'];?> Garages</span>
                                </li>
                            </ul>
                            <!-- Price -->
                            <div class="price-properties">
                                <h3 class="title mt-3">
									<?php if($propertythree[$i]['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?>  &nbsp;<?php print number_format($propertythree[$i]['nazac_property_price']);?>
                                </h3>
                                <div class="compare">
                                    <a data-toggle="tooltip" data-placement="top" href="<?php print base_url();?>users/user/property-details/<?php print $propertythree[$i]['nazac_property_unique_id'].'/'.str_replace(" ","-", $string);?>" title="Click To View Details">
										Details
									</a>
                                    <a target="_blank" data-toggle="tooltip" data-placement="top" href="https://web.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=<?php print base_url();?>users/user/property-details/<?php print $propertythreelast[$i]['nazac_property_unique_id'].'/'.str_replace(" ","-", $string);?>&display=popup&ref=plugin&src=share_button" title="Share on Facebook">
                                        <i class="fas fa-share-alt"></i>
                                    </a>
                                    <a href="#" title="Favorites">
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="footer">
                                <a href="<?php print base_url();?>users/user/agent-details/<?php print str_replace("/","-",$propertythree[$i]['nazac_property_gent_incharge_id']);?>">
									<i class="fa fa-user"></i> <?php print $this->dbmodel->getUserSingleData($propertythree[$i]['nazac_property_gent_incharge_id'],'nazac_clients_fname');?>
								</a>
                                <span>
                                <i class="fa fa-calendar"></i> <?php print $propertythree[$i]['nazac_property_last_update'];?>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>	
				<?php }else{ ?>
					<div class="col-12"><h6 align="center"><img class="img-responsive" src="<?php print base_url();?>resource/img/propertymartGIF.gif"/></h6></div>
				<?php				
					print '<h2 align="center" style="width:100%; align: center;">No property listing was found.</h2>';
				}?>
               
            </div>
            <div class="bg-all mt-5">
                <a href="<?php print base_url();?>users/user/property-listing" class="btn btn-outline-light">View All</a>
            </div>
        </div>
    </section>
    <!-- END SECTION RECENTLY PROPERTIES -->

    <!-- STAR SECTION WELCOME -->
    <section class="welcome">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <div class="welcome-title">
                        <h2>WELCOME TO <span><?php print $siteDetail['site_name'];?></span></h2>
                        <h4> THE BEST PLATFORM TO FIND THE APARTMENT OF YOUR CHOICE BASED ON YOUR DESCRIPTION</h4>
                    </div>
                    <div class="welcome-content">
                        <p> <span><?php print $siteDetail['site_name'];?></span> is basically a property management company that aims at aiding and solving the real estate needs of people living in specific areas. We ease the stress attached with property acquisition in these areas, and also the selling, renting and buying of properties. </p>
                    </div>
                    <div class="welcome-services">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12 ">
                                <div class="w-single-services">
                                    <div class="services-img img-1">
                                        <img src="<?php print base_url();?>resource/css/colors/icons/orange/1.png" width="32" alt="">
                                    </div>
                                    <div class="services-desc">
                                        <h6>Rent Property</h6>
                                        <p>we make it easy to <br>rent away your properties<br> and also easier for those<br> seeking to find properties<br> up for rent.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12 ">
                                <div class="w-single-services no-mb">
                                    <div class="services-img img-4">
                                        <img src="<?php print base_url();?>resource/css/colors/icons/orange/4.png" width="32" alt="">
                                    </div>
                                    <div class="services-desc">
                                        <h6>Sell Property</h6>
                                        <p> We make it easy to <br>sell your properties with<br> our wide range of coverage<br> on potential buyers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <div class="wprt-image-video w50">
                        <img alt="image" src="<?php print base_url();?>resource/bg-img/feature5.jpg">
                        <a class="icon-wrap popup-video popup-youtube" href="<?php print $siteDetail['youtube_video_about_nazac'];?>">
                            <i class="fa fa-play"></i>
                        </a>
                        <div class="iq-waves">
                            <div class="waves wave-1"></div>
                            <div class="waves wave-2"></div>
                            <div class="waves wave-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION WELCOME -->    

    <!-- START SECTION FEATURED PROPERTIES -->
    <section class="featured portfolio">
        <div class="container">
            <div class="row">
                <div class="section-title col-md-5">
                    <h3>Featured</h3>
                    <h2>Properties</h2>
                </div>
            </div>
            <div class="row portfolio-items">
               
               <?php if($propertythreelast>0){
					for($i=0;$i<count($propertythreelast);$i++){
					 if($i==1 || $i==2 || $i==3){}else{
				?>
                <div class="item col-lg-4 col-md-6 col-xs-12 landscapes">
                    <div class="project-single">
                        <div class="project-inner project-head">
                            <div class="project-bottom">
                                <h4><a href="<?php print base_url();?>users/user/property-details/<?php print $propertythreelast[$i]['nazac_property_unique_id'];?>">View Property</a><span class="category">Real Estate(<?php print $siteDetail['site_name'];?>)</span></h4>
                            </div>
                            <div class="button-effect">
                                <a href="<?php print base_url();?>users/user/property-details/<?php print $propertythreelast[$i]['nazac_property_unique_id'];?>" class="btn"><i class="fa fa-link"></i></a>
                                <a href="<?php print $propertythreelast[$i]['nazac_property_youtube_link'];?>" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                <a class="img-poppu btn" href="<?php print base_url();?>resource/upload/registered_property/<?php print $propertythreelast[$i]['nazac_property_thumbnail'];?>" data-rel="lightcase:myCollection:slideshow"><i class="fa fa-photo"></i></a>
                            </div>
                            <div class="homes">
                                <!-- homes img -->
                                <div onClick="book('<?php print base_url();?>','<?php print $propertythreelast[$i]['nazac_property_unique_id'];?>','<?php print $user_data['nazac_id'];?>');" data-toggle="tooltip" data-placement="top" title="Book Appointment" class="homes-price">Book</div>
                                
								<a href="<?php print base_url();?>users/user/property-details/<?php print $propertythreelast[$i]['nazac_property_unique_id'];?>" class="homes-img">
									<div class="homes-tag button alt featured"><?php print  ucwords($propertythreelast[$i]['nazac_property_rent_status']);?></div>
									
									<div class="homes-tag button alt sale"><?php print @$this->dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$propertythreelast[$i]['nazac_property_category'],'nazac_category_name');?></div>
									
									<img src="<?php print base_url();?>resource/upload/registered_property/<?php print $propertythreelast[$i]['nazac_property_thumbnail'];?>" alt="home-1" class="img-responsive">
                           		</a>
                            </div>
                        </div>
                        <!-- homes content -->
                        
                        <div class="homes-content">
                            <!-- homes address -->
                            <h3 style="font-size: 16px !important;"><?php $string = ucwords($propertythreelast[$i]['nazac_property_title'].' '.$this->dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$propertythreelast[$i]['nazac_property_category'],'nazac_category_name'));  if(strlen($string)>30){ print substr($string, 0, 30).'...';}else{ print $string;}?></h3>
                            <p class="homes-address mb-3">
                                <a href="<?php print base_url();?>users/user/property-details/<?php print $propertythreelast[$i]['nazac_property_unique_id'];?>">
                                    <i class="fa fa-map-marker"></i><span>
                                    <?php $address = ucwords(strtolower($propertythreelast[$i]['nazac_property_street_address'].', '.$this->dbmodel->returnSingleData($this->lib->nazac_property_locations,'nazac_location_id',$propertythreelast[$i]['nazac_property_location'],'nazac_location_name').', '.$propertythreelast[$i]['nazac_property_town'].', '.$propertythreelast[$i]['nazac_property_local_gov_area'].', '.$propertythreelast[$i]['nazac_property_state'].', '.$propertythreelast[$i]['nazac_property_country']));
									if(strlen($address)>40){ print substr($address, 0, 40).'...';}else{ print $address;}?></span>
                                </a>
                            </p>
                            <!-- homes List -->
                            <ul class="homes-list clearfix">
                                <li>
                                    <i class="fa fa-bed" aria-hidden="true"></i>
                                    <span><?php print $propertythreelast[$i]['nazac_property_no_of_rooms'];?> Bedrooms</span>
                                </li>
                                <li>
                                    <i class="fa fa-bath" aria-hidden="true"></i>
                                    <span><?php print $propertythreelast[$i]['nazac_property_no_of_bathrooms'];?> Bathrooms</span>
                                </li>
                                <li>
                                    <i class="fa fa-object-group" aria-hidden="true"></i>
                                    <span><?php print $propertythreelast[$i]['nazac_property_approximate_size'];?></span>
                                </li>
                                <li>
                                    <i class="fas fa-warehouse" aria-hidden="true"></i>
                                    <span><?php print $propertythreelast[$i]['nazac_property_no_of_parking_space'];?> Garages</span>
                                </li>
                            </ul>
                            <!-- Price -->
                            <div class="price-properties">
                                <h3 class="title mt-3">
                                <?php if($propertythreelast[$i]['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?>  &nbsp;<?php print number_format($propertythreelast[$i]['nazac_property_price']);?>
                                </h3>
                                <div class="compare">
                                    <a data-toggle="tooltip" data-placement="top" href="<?php print base_url();?>users/user/property-details/<?php print $propertythreelast[$i]['nazac_property_unique_id'].'/'.str_replace(" ","-", $string);?>" title="Click To View Details">
										Details
									</a>
                                    <a target="_blank" data-toggle="tooltip" data-placement="top" href="https://web.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=<?php print base_url();?>users/user/property-details/<?php print $propertythreelast[$i]['nazac_property_unique_id'].'/'.str_replace(" ","-", $string);?>&display=popup&ref=plugin&src=share_button" title="Share on Facebook">
                                        <i class="fas fa-share-alt"></i>
                                    </a>
                                    <a href="#" title="Favorites">
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="footer">
                                <a href="<?php print base_url();?>users/user/agent-details/<?php print str_replace("/","-",$propertythreelast[$i]['nazac_property_gent_incharge_id']);?>">
									<i class="fa fa-user"></i> <?php print $this->dbmodel->getUserSingleData($propertythreelast[$i]['nazac_property_gent_incharge_id'],'nazac_clients_fname');?>
								</a>
                                <span>
                                <i class="fa fa-calendar"></i> <?php print $propertythreelast[$i]['nazac_property_last_update'];?>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }}?>	
				<?php }else{ ?>
					<div class="col-12"><h6 align="center"><img class="img-responsive" src="<?php print base_url();?>resource/img/propertymartGIF.gif"/></h6></div>
				<?php				
					print '<h2 align="center" style="width:100%; align: center;">No property listing was found.</h2>';
				}?>
            </div>
        </div>
    </section>
    <!-- END SECTION FEATURED PROPERTIES -->

    <!-- START SECTION AGENTS -->
    <section class="team">
        <div class="container">
          <div class="row">
            <div class="section-title col-md-5">
                <h3>Meet Our</h3>
                <h2>Agents</h2>
            </div>
          </div>
            <div class="row team-all">
                
                <?php if($agentshome>0){
					for($i=0;$i<count($agentshome);$i++){?>
                   <div class="col-lg-3 col-md-6 team-pro hover-effect">
                    <div class="team-wrap">
                        <div class="team-img">
                            <img src="<?php print base_url();?>resource/upload/<?php print $agentshome[$i]['nazac_client_passport'];?>" alt="<?php print $agentshome[$i]['nazac_clients_fname'].' '.$agentshome[$i]['nazac_clients_lname'];?>" />
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3><?php print $agentshome[$i]['nazac_clients_fname'].' '.$agentshome[$i]['nazac_clients_lname'];?></h3>
                                <p>Real Estate Agent</p>
                                <div class="team-socials">
                                    <ul>
                                        <li>
                                            <a data-toggle="tooltip" title="Connect On Facebook" data-placement="top" target="_blank" href="<?php print $agentshome[$i]['nazac_client_facebook_handel'];?>" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a data-toggle="tooltip" title="Connect On Twitter" data-placement="top" target="_blank" href="<?php print $agentshome[$i]['nazac_client_twitter_handel'];?>" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a data-toggle="tooltip" title="Connect On Instagram" data-placement="top" target="_blank" href="<?php print $agentshome[$i]['nazac_client_instagram_handel'];?>" title="instagran"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            <a data-toggle="tooltip" title="Click to chat" data-placement="top" style="font-size:15px;" target="_blank" href="https://wa.me/<?php print $agentshome[$i]['nazac_client_whatsapp_number'];?>?text=Hi <?php print $agentshome[$i]['nazac_clients_fname'];?>, i am intrested in the property listed in <?php print $siteDetail['site_name'];?>"><i class="fab fa-whatsapp fa-2x text-success" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <span><a href="<?php print base_url();?>users/user/agent-details/<?php print str_replace("/","-",$agentshome[$i]['nazac_id']);?>">View Profile</a></span>
                            </div>
                        </div>
                    </div>
                </div>
               <?php }?>	
				<?php }else{ ?>
				<div class="col-12"><h6 align="center"><img class="img-responsive" src="<?php print base_url();?>resource/img/propertymartGIF.gif"/></h6></div>
				<?php print '<h2 align="center" style="width:100%; align: center;">No Agents was found.</h2>';}?> 
               
              
            </div>
        </div>
    </section>
    <!-- END SECTION AGENTS -->

    <!-- START SECTION PRICING -->

    <!-- START SECTION BLOG -->
    <section class="blog-section">
        <div class="container">
          <div class="row">
            <div class="section-title">
                <h3>Latest</h3>
                <h2>News</h2>
            </div>
          </div>
            <div class="news-wrap">
                <div class="row">
                   
                   <?php if($newsfeedhome>0){
					for($i=0;$i<count($newsfeedhome);$i++){?>
                    <div class="col-xl-4 col-md-6 col-xs-12">
                        <div class="news-item">
                            <a href="blog-details.html" class="news-img-link">
                                <div class="news-item-img">
                                    <img class="img-responsive" src="<?php print base_url();?>resource/upload/news_images/<?php print $newsfeedhome[$i]['nazac_news_thumbnail'];?>" alt="<?php print $newsfeedhome[$i]['nazac_news_title'];?>">
                                </div>
                            </a>
                            <div class="news-item-text">
                                <a href="blog-details.html"><h3><?php $nestitle = $newsfeedhome[$i]['nazac_news_title']; if(strlen($nestitle)>20){print substr($nestitle, 0, 20).'...';}else{print $nestitle;}?></h3></a>
                                <div class="dates">
                                    <span class="date"><?php print $newsfeedhome[$i]['nazac_news_last_update'];?> &nbsp;/</span>
                                    <ul class="action-list pl-0">
                                        <li class="action-item pl-2"><i class="fa fa-heart"></i> <span></span></li>
                                        <li class="action-item"><i class="fa fa-comment"></i> <span></span></li>
                                        <li class="action-item"><i class="fa fa-share-alt"></i> <span></span></li>
                                    </ul>
                                </div>
                                <div class="news-item-descr big-news">
                                    <p><?php $body = $newsfeedhome[$i]['nazac_news_body'];
										if(strlen($body)>150){print substr($body, 0, 150).'...';}else{print $body;}?></p>
                                </div>
                                <div class="news-item-bottom">
                                    <a href="<?php print base_url();?>users/user/news-details/<?php print $newsfeedhome[$i]['nazac_news_id'];?>" class="news-link">Read more...</a>
                                    <div class="admin">
                                        <p>By, Admin</p>
                                        <img src="<?php print base_url();?>resource/upload/avatarm.png" alt="<?php print $newsfeedhome[$i]['nazac_news_title'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>	
				<?php }else{ print '
				<div class="col-12"><h6 align="center"><img class="img-responsive" src="'.base_url().'resource/img/propertymartGIF.gif"/></h6></div>
				<h2 align="center" style="width:100%; align: center;">No News was found.</h2>';}?>  
               
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION BLOG -->

    <!-- START SECTION TESTIMONIALS -->
    <section class="testimonials">
        <div class="container">
          <div class="row">
            <div class="section-title col-md-5">
                <h3>Happy</h3>
                <h2>Customers</h2>
            </div>
          </div>
            <div class="owl-carousel style1">
               
           <?php if($client_reviews>0){
			for($i=0;$i<count($client_reviews);$i++){?>
                <div class="test-1">
                    <h3><?php print $this->dbmodel->getUserSingleData($client_reviews[$i]['nazac_reviewer_id'],'nazac_clients_fname').' '.$this->dbmodel->getUserSingleData($client_reviews[$i]['nazac_reviewer_id'],'nazac_clients_lname');?></h3>
                    <img src="<?php print base_url();?>resource/upload/<?php print $this->dbmodel->getUserSingleData($client_reviews[$i]['nazac_reviewer_id'],'nazac_client_passport');?>" alt="">
                    <h6 class="mt-2"><?php print $this->dbmodel->getUserSingleData($client_reviews[$i]['nazac_reviewer_id'],'nazac_client_nationality');?></h6>
                    <ul class="starts text-center mb-2">
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                    </ul>
                    <p><?php print $client_reviews[$i]['nazac_review_post'];?></p>
                </div>
               <?php }?>	
			<?php }else{ print '<h3 align="center" style="width:100%; align: center;">No Reviews was found.</h3>';}?> 
           
           
             
            </div>
             <div class="col-lg-12"><p align="center"><a data-toggle="modal" href="#myModedreviews"><span data-toggle="tooltip" title="Drop a review" data-placement="top" class="">***Leave a review***</span></a></p></div>
        </div>
    </section>
    <!-- END SECTION TESTIMONIALS -->

    <!-- STAR SECTION PARTNERS -->
    <div class="partners">
        <div class="container">
            <div class="section-title">
                <h3>Our</h3>
                <h2>Partners</h2>
            </div>
            <div class="owl-carousel style2">
               
              <?php if($nazac_partners>0){
			for($i=0;$i<count($nazac_partners);$i++){?>
                <div class="owl-item"><img src="<?php print base_url();?>resource/partnerlogoupload/<?php print $nazac_partners[$i]['nazac_partner_logo']?>" alt="<?php print $siteDetail['site_name'].' Partners';?>"></div>
                <?php }?>	
			<?php }else{ print '<h3 align="center" style="width:100%; align: center;">..Loading Partners</h3>';}?> 
                
            </div>
        </div>
    </div>
    <!-- END SECTION PARTNERS -->

    <!-- START SECTION COUNTER UP -->
    <section class="counterup">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="countr">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <div class="count-me">
                            <p class="counter text-left"><?php print $all_users;?></p>
                            <h3>Property Clients</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="countr">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        <div class="count-me">
                            <p class="counter text-left"><?php print $all_property;?></p>
                            <h3>Listings</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="countr mb-0">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <div class="count-me">
                            <p class="counter text-left"><?php print $all_agents;?></p>
                            <h3>Expert Agents</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="countr mb-0 last">
                        <i class="fa fa-trophy" aria-hidden="true"></i>
                        <div class="count-me">
                            <p class="counter text-left"><?php print $all_reviews;?></p>
                            <h3>Happy Reviews</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION COUNTER UP -->

    <!-- START SECTION NEWSLETTER -->
    <section class="subscribe">
        <div class="realhome_subscribe">
            <div class="realhome container">
                <h2>Subscribe for Our Newsletter</h2>
                <div class="row align-center">
                    <div class="col-lg-6 col-md-6">
                        <span class="realhome_form_subscribe form-inline" method="post">
                            <input type="email" id="subscribe_Email" name="subscribe_Email" class="form_email" placeholder="Enter Your Email">
                            <button id="emailSubscribe" type="submit">Submit</button>
                            <label for="subscribeEmail" class="error"></label>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION NEWSLETTER -->

