	<section class="headings">
		<div class="text-heading text-center">
			<div class="container">
				<h1>Agent <?php print $singleAgent['nazac_clients_fname'];?></h1>
				<h2><a href="<?php print base_url();?>">Home </a> &nbsp;/&nbsp; Agents Details</h2>
			</div>
		</div>
	</section>
	<!-- END SECTION HEADINGS -->

	<!-- START SECTION AGENTS -->
	<section class="agents team">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="boder_p"><h3 class="text-success"><i class="fa fa-map-marker icon"></i> LOCATION BASED: <?php print $singleAgent['nazac_agent_based_location'];?></h3></div>
				</div>
				<div class="col-lg-12">
					<div class="agent agent-row shadow-hover">
						<a href="#" class="agent-img">
							<div class="img-fade"></div>
							<div class="button alt agent-tag"><?php print $totla_listed_property;?> Properties</div>
							
							<img src="<?php print base_url();?>resource/upload/<?php print $singleAgent['nazac_client_passport'];?>" alt="<?php print  $singleAgent['nazac_clients_fname'].' '.$singleAgent['nazac_clients_lname'];?>" />
						</a>
						<div class="agent-content">
							<div class="agent-details">
								<h4><a href="#"><?php print strtoupper(strtolower($singleAgent['nazac_clients_fname'].' '.$singleAgent['nazac_clients_lname']));?></a></h4>
								<p><i class="fa fa-tag icon"></i>Real Estate Agent</p>
								<p><i class="fa fa-envelope icon"></i><?php print $singleAgent['nazac_client_email'];?></p>
								<p><i class="fa fa-phone icon"></i><?php print $singleAgent['nazac_client_phone'];?></p>
							</div>
							<div class="agent-text" style="margin-bottom: 50px;">
								<p><?php print $singleAgent['nazac_agents_description'];?></p>
							</div>
							<div class="agent-footer center">
								<ul class="netsocials">
								
									<li>
										<a data-toggle="tooltip" title="Connect On Facebook" data-placement="top" target="_blank" href="<?php print $singleAgent['nazac_client_facebook_handel'];?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li>
										<a data-toggle="tooltip" title="Connect On Twitter" data-placement="top" target="_blank" href="<?php print $singleAgent['nazac_client_twitter_handel'];?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
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
				<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url();?>resource/loader/loading_spinner.gif"></span>
				<section class="featured portfolio agent-details mb-60 no-mb">
					<div class="container">
						<div class="section-title">
							<h3>Assigned</h3>
							<h2>Properties</h2>
						</div>
						<div class="row portfolio-items">
						
				<?php if($property_data>0){
					for($i=0;$i<count($property_data);$i++){
						$string = ucwords($property_data[$i]['nazac_property_title'].' '.$this->dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$property_data[$i]['nazac_property_category'],'nazac_category_name'));
				?>
                <div class="item col-lg-4 col-md-6 col-xs-12 landscapes">
                    <div class="project-single">
                        <div class="project-inner project-head">
                            <div class="project-bottom">
                                <h4><a href="<?php print base_url();?>users/user/property-details/<?php print $property_data[$i]['nazac_property_unique_id'].'/'.str_replace(" ","-", $string);?>">View Property</a><span class="category">Real Estate(<?php print $siteDetail['site_name'];?>)</span></h4>
                            </div>
                            <div class="button-effect">
                                <a href="<?php print base_url();?>users/user/property-details/<?php print $property_data[$i]['nazac_property_unique_id'].'/'.str_replace(" ","-", $string);?>" class="btn"><i class="fa fa-link"></i></a>
                                <a href="<?php print $property_data[$i]['nazac_property_youtube_link'];?>" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                <a class="img-poppu btn" href="<?php print base_url();?>resource/upload/registered_property/<?php print $property_data[$i]['nazac_property_thumbnail'];?>" data-rel="lightcase:myCollection:slideshow"><i class="fa fa-photo"></i></a>
                            </div>
                            <div class="homes">
                                <!-- homes img -->
								<a href="<?php print base_url();?>users/user/property-details/<?php print $property_data[$i]['nazac_property_unique_id'].'/'.str_replace(" ","-", $string);?>" class="homes-img">
								
									<div class="homes-tag button alt featured"><?php print  ucwords($property_data[$i]['nazac_property_rent_status']);?></div>
									
									<div class="homes-tag button alt sale"><?php print @$this->dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$property_data[$i]['nazac_property_category'],'nazac_category_name');?></div>
									
									<img src="<?php print base_url();?>resource/upload/registered_property/<?php print $property_data[$i]['nazac_property_thumbnail'];?>" alt="home-1" class="img-responsive">
                                </a>
                                <div onClick="book('<?php print base_url();?>','<?php print $property_data[$i]['nazac_property_unique_id'];?>','<?php print $user_data['nazac_id'];?>');" data-toggle="tooltip" data-placement="top" title="Book Appointment" class="homes-price">Book</div>
                            </div>
                        </div>
                        <!-- homes content -->
                        
                        <div class="homes-content">
                            <!-- homes address -->
                            <h3 style="font-size: 16px !important;"><?php  if(strlen($string)>30){ print substr($string, 0, 30).'...';}else{ print $string;}?></h3>
                            <p class="homes-address mb-3">
                                <a href="<?php print base_url();?>users/user/property-details/<?php print $property_data[$i]['nazac_property_unique_id'].'/'.str_replace(" ","-", $string);?>">
                                    <i class="fa fa-map-marker"></i><span>
                                    <?php $address = ucwords(strtolower($property_data[$i]['nazac_property_street_address'].', '.$this->dbmodel->returnSingleData($this->lib->nazac_property_locations,'nazac_location_id',$property_data[$i]['nazac_property_location'],'nazac_location_name').', '.$property_data[$i]['nazac_property_town'].', '.$property_data[$i]['nazac_property_local_gov_area'].', '.$property_data[$i]['nazac_property_state'].', '.$property_data[$i]['nazac_property_country']));
									if(strlen($address)>40){ print substr($address, 0, 40).'...';}else{ print $address;}?></span>
                                </a>
                            </p>
                            <!-- homes List -->
                            <ul class="homes-list clearfix">
                                <li>
                                    <i class="fa fa-bed" aria-hidden="true"></i>
                                    <span><?php print $property_data[$i]['nazac_property_no_of_rooms'];?> Bedrooms</span>
                                </li>
                                <li>
                                    <i class="fa fa-bath" aria-hidden="true"></i>
                                    <span><?php print $property_data[$i]['nazac_property_no_of_bathrooms'];?> Bathrooms</span>
                                </li>
                                <li>
                                    <i class="fa fa-object-group" aria-hidden="true"></i>
                                    <span><?php print $property_data[$i]['nazac_property_approximate_size'];?></span>
                                </li>
                                <li>
                                    <i class="fas fa-warehouse" aria-hidden="true"></i>
                                    <span><?php print $property_data[$i]['nazac_property_no_of_parking_space'];?> Garages</span>
                                </li>
                            </ul>
                            <!-- Price -->
                            <div class="price-properties">
                                <h3 class="title mt-3">
                                <a href="<?php print base_url();?>users/user/property-details/<?php print $property_data[$i]['nazac_property_unique_id'].'/'.str_replace(" ","-", $string);?>"><?php if($property_data[$i]['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?>  &nbsp;<?php print number_format($property_data[$i]['nazac_property_price']);?></a>
                                </h3>
                                <div class="compare">
                                    <a data-toggle="tooltip" data-placement="top" href="<?php print base_url();?>users/user/property-details/<?php print $property_data[$i]['nazac_property_unique_id'].'/'.str_replace(" ","-", $string);?>" title="Click TO View Details">
										Details
									</a>
                                    <a target="_blank" data-toggle="tooltip" data-placement="top" href="https://web.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=<?php print base_url();?>users/user/property-details/<?php print $property_data[$i]['nazac_property_unique_id'].'/'.str_replace(" ","-", $string);?>&display=popup&ref=plugin&src=share_button" title="Share on Facebook">
                                        <i class="fas fa-share-alt"></i>
                                    </a>
                                    <a href="#" title="Favorites">
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="footer">
                                <a href="<?php print base_url();?>users/user/agent-details/<?php print str_replace("/","-",$property_data[$i]['nazac_property_gent_incharge_id']);?>">
									<i class="fa fa-user"></i> <?php print $this->dbmodel->getUserSingleData($property_data[$i]['nazac_property_gent_incharge_id'],'nazac_clients_fname');?>
								</a>
                                <span>
                                <i class="fa fa-calendar"></i> <?php print $property_data[$i]['nazac_property_last_update'];?>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>	
				<?php }else{ ?>
					<div class="col-12"><h6 align="center"><img class="img-responsive" src="<?php print base_url();?>resource/img/propertymartGIF.gif"/></h6></div>
				<?php				
					print '<h2 style="width:100%; text-align: center;">No property listing was found.</h2>';
				}?>	
							
						</div>
					</div>
				</section>
				<!-- END SECTION FEATURED PROPERTIES -->
			</div>
			<!-- end row -->
			
			 <nav aria-label="...">
				<ul class="pagination">
					<li class="page-item <?php if($pages <= 1){ echo 'disabled'; } ?>">
						<a class="page-link" href="<?php if($pages <= 1){ echo '#'; } else { echo base_url();?>users/user/agent-details/<?php print $cat_set."/".($pages - 1); } ?>" tabindex="-1">Previous</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="<?php print base_url();?>users/user/agent-details/<?php print $cat_set;?>/1">First <span class="sr-only">(current)</span></a>
					</li>
					<li class="page-item"><a class="page-link" href="#">...</a></li>
					<li class="page-item active">
						<a class="page-link" href="<?php print base_url();?>users/user/agent-details/<?php print $cat_set;?>/<?php print $pages;?>"><?php print $pages;?> <span class="sr-only">(current)</span></a>
					</li>
					<li class="page-item hidden-xs"><a class="page-link" href="#">...</a></li>
					<li class="page-item"><a class="page-link" href="<?php print base_url();?>users/user/agent-details/<?php print $cat_set;?>/<?php print $num_links;?>">Last</a></li>
					<li class="page-item <?php if($pages >= $num_links){ echo 'disabled'; } ?>">
						<a class="page-link <?php if($pages >= $num_links){ echo 'disabled'; }?>" href="<?php if($pages >= $num_links){ echo '#'; } else { echo base_url();?>users/user/agent-details/<?php print $cat_set."/".($pages + 1); } ?>">Next</a>
					</li>
				</ul>
			</nav>
			
		</div>
	</section>
	<!-- END SECTION AGENTS -->