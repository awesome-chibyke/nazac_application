<!-- START SECTION PROPERTIES LISTING -->
<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url();?>resource/loader/loading_spinner.gif"></span>
	<section style="margin-top: -50px !important;" class="blog details">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12 blog-pots boder_p">
				<?php
					$cat = ucwords(strtolower($this->dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$singleProperty['nazac_property_category'],'nazac_category_name')));

					$loca = ucwords(strtolower($this->dbmodel->returnSingleData($this->lib->nazac_property_locations,'nazac_location_id',$singleProperty['nazac_property_location'],'nazac_location_name')));
					?>
					
				<div class="block-heading details" style="background: #fff !important;">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-12">
								<h4>
                            <span class="heading-icon">
                                <i class="fa fa-home"></i>
                                </span>
                                <span><span class="hidden-xs">Property</span> <?php print ucwords(strtolower($cat));?><span class="text-success" style="font-size: 12px;"> (<?php print ucwords(strtolower($singleProperty['nazac_property_rent_status']));?>)</span></span>
                            </h4>
							</div>
						</div>
					</div>
				
					<div style="margin-top: -25px;" class="col-lg-12 is_card top-backgrnd">
						<h5 style="font-size: 17px;" class="type"> <?php print $reg_property_data['nazac_property_lodge_name'];?> (Lodge)</h5>
						<h5 style="font-size: 13px;" class="type"><span><strong>RIN:</strong></span> <?php print  $reg_property_data['nazac_property_number'].'/'.$singleProperty['nazac_property_room_number'];?></h5>
						<h5 style="font-size: 13px;" class="type">
						<span><strong>Type:</strong></span> <?php print ucwords(strtolower($singleProperty['nazac_property_type']));?> |
						
						<span><strong>Storey Type:</strong></span> <?php print ucwords(strtolower($reg_property_data['nazac_property_storey_type']));?> |
						
						<span><strong>FLoor Type:</strong></span> <?php print ucwords(strtolower($singleProperty['nazac_property_floor_type']));?> |
						
						<span><strong>Rent Duration:</strong></span> <?php print ucwords(strtolower($singleProperty['nazac_property_duration']));?> |
						
						<span><strong>Payment Type:</strong></span> <?php print ucwords(strtolower($singleProperty['nazac_payment_type']));?>
						
						</h5>
					</div>
					
					<div class="col-lg-12 is_card">
					
						<span><i class="fa fa-map-marker text-sucess"></i></span>
							<?php 
							
							print $titil = ucwords(strtolower($singleProperty['nazac_property_title'].' ( '.$singleProperty['nazac_property_floor_type'].' ) '.$cat.' at '.$singleProperty['nazac_property_street_address'].' '.$loca.', '.$singleProperty['nazac_property_local_gov_area'].', '.$singleProperty['nazac_property_state'].', '.$singleProperty['nazac_property_country']))?>
						</div>
					<div class="col-lg-12">
					<div class="block-heading details" style="background: #fff !important;">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
							<h4>
                               <span>Price:</span> 
                               
                               <?php if($singleProperty['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?> <?php print number_format($singleProperty['nazac_property_price']);?>
                               
                               <sup><small style="font-size: 12px;"><?php if($singleProperty['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?><del><?php print number_format($singleProperty['nazac_property_older_price']);?></del></small></sup>
                               
                               <sub><small>(<?php print ucwords(strtolower($singleProperty['nazac_payment_type']));?>)</small></sub>
                               
                            </h4>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 cod-pad">
								<div class="sorting-options">
									
									<h5 style="font-size: 13px;" class="type"><span>Agents Fee:</span> <?php if($singleProperty['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?> <?php print number_format($singleProperty['nazac_property_agents_fee']);?> 
									<div class="col-12 hidden-lg"></div>
									  <!--| <span>Legal Fee:</span> <?php if($singleProperty['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?> <?php print number_format($singleProperty['nazac_property_legal_fee']);?>--></h5>
									
								</div>
							</div>
						</div>
					</div>

					<!-- Block heading end -->
					<div class="row">
						<div class="col-md-12 mb-4">
							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							<?php $extImg = explode(",", $reg_property_data['nazac_property_exterior']);
								$images = explode(",", $singleProperty['nazac_property_images']);
								$sumImg = (count($extImg)+count($images))-2;
								?>
								<ol class="carousel-indicators">
									<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
									<?php for($i=1;$i<=$sumImg;$i++){?>
									<li data-target="#carouselExampleIndicators" data-slide-to="<?php print $i;?>"></li>
									<?php }?>
									
									<!--<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>-->
								</ol>
								<div class="carousel-inner" role="listbox">
									<div class="carousel-item active">
										<img class="d-block img-fluid" src="<?php print base_url();?>resource/upload/registered_property/<?php print $singleProperty['nazac_property_thumbnail'];?>" alt="<?php print $titil;?>">
									</div>
								    <?php 
									for($i=0;$i<count($images)-1;$i++){?>
									 	<div class="carousel-item">
											<img class="d-block img-fluid" src="<?php print base_url();?>resource/upload/registered_property/<?php print $images[$i];?>" alt="<?php print $titil;?>">
										</div>
									<?php }?>
									
									<?php 
									for($i=0;$i<count($extImg)-1;$i++){?>
									 	<div class="carousel-item">
											<img class="d-block img-fluid" src="<?php print base_url();?>resource/upload/registered_property/<?php print $extImg[$i];?>" alt="<?php print $titil;?>">
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
								
								<div class="boder_p text-success" style="margin-top: -30px; font-size: 16px;">
									<span><strong style="color: #000;"><i style="color: #000;" class="fa fa-map"></i> Closest Landmark:</strong> <?php print ucwords(strtolower($singleProperty['nazac_property_closest_landmark']));?></span>  |
									<span><strong style="color: #000;"><i style="color: #000;" class="fa fa-object-group"></i> Distance From Landmark:</strong> <?php print $singleProperty['nazac_property_distance_from_landmark'];?></span>
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
								
								<div  style="margin-top: -10px;" class="property-location">
									  <?php if($singleProperty['nazac_property_youtube_link']==""){}else{?>
									   <div class="<?php print $youtub;?> pull-left">
									   <?php $by = explode("=",$singleProperty['nazac_property_youtube_link']); $vid = end($by);?>
										<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php print $vid;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									   </div>
									<?php }?>
									
									<?php if($reg_property_data['nazac_property_youtube_video']==""){}else{?>
									   <div class="<?php print $youtub;?> pull-left">
									   <?php $by2 = explode("=",$reg_property_data['nazac_property_youtube_video']); $vid2 = end($by2);?>
										<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php print $vid2;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									   </div>
									<?php }?>
								</div>
								
								<h5 class="mb-4">GENERAL INFORMATION</h5>
								<p class="mb-3">
									<div class="alert alert-success"><?php print $singleProperty['nazac_property_description'];?></div>
								</p>
								
							</div>
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
					<!-- START SECTION ASSIGNED AGENTS -->
					<section class="team assigned" style="background: #fff !important;">
						<div class="container">
						<?php $agentid = $singleProperty['nazac_property_gent_incharge_id'];
							$agnt = $this->dbmodel->getVerifiedSingleAgentsData($agentid);
							if($agnt==0){}else{?>
							<h5>Assigned Agent</h5>
							<div class="row team-all">
								<div class="col-lg-4 col-md-6 team-pro hover-effect">
									<div class="team-wrap">
										<div class="team-img">
											<img src="<?php print base_url();?>resource/upload/<?php print $agnt['nazac_client_passport'];?>" alt="<?php print $agnt['nazac_clients_fname'].' '.$agnt['nazac_clients_lname'];?>" />
										</div>
										<div class="team-content">
											<div class="team-info">
												<h3><?php print $agnt['nazac_clients_fname'].' '.$agnt['nazac_clients_lname'];?></h3>
												<p>Real Estate Agents</p>
												<div class="team-socials">
													<ul>
														<li>
															<a data-toggle="tooltip" title="Connect On Facebook" data-placement="top" target="_blank" href="<?php print $agnt['nazac_client_facebook_handel'];?>" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
															<a data-toggle="tooltip" title="Connect On Twitter" data-placement="top" target="_blank" href="<?php print $agnt['nazac_client_twitter_handel'];?>" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
															<a data-toggle="tooltip" title="Connect On Instagram" data-placement="top" target="_blank" href="<?php print $agnt['nazac_client_instagram_handel'];?>" title="instagran"><i class="fa fa-instagram" aria-hidden="true"></i></a>
															<a data-toggle="tooltip" title="Click to chat" data-placement="top" style="font-size:15px;" target="_blank" href="https://wa.me/<?php print $agnt['nazac_client_whatsapp_number'];?>?text=Hi <?php print $agnt['nazac_clients_fname'];?>, i am intrested in the property listed in <?php print $siteDetail['site_name'];?>; <?php print $titil;?> (RIN: <?php print $singleProperty['nazac_property_room_number'].'/'.$reg_property_data['nazac_property_number'];?>)"><i class="fab fa-whatsapp fa-2x text-success" aria-hidden="true"></i></a>
														</li>
													</ul>
												</div>
												<span><a href="<?php print base_url();?>users/user/agent-details/<?php print str_replace("/","-",$agnt['nazac_id']);?>">View Details</a></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php }?>
							<div style="margin-top: 20px;" class="col-lg-12 alert alert-success">
								<h4>Disclaimer</h4>
								<p style="text-align: justify; font-size: 12px;" class="text-black">The information displayed about this property comprises a property advertisement.<p>
							</div>
						</div>
					</section>
					<!-- END SECTION ASSIGNED AGENTS -->
				</div>
				<aside class="col-lg-4 col-md-12 car ">
					<div class="widget ">
					<div class="boder_p">
					
						<div class="col-12 boder_p caller-backgrnd">
						   <span style="font-size: 15px;" class="col-12  text-black"><i class="fa fa-phone fa-2x text-success"></i> <strong>Call Agent:</strong> <?php print $agnt['nazac_client_phone'];?></span>
						</div>
						
						<div onClick="book('<?php print base_url();?>','<?php print $singleProperty['nazac_property_unique_id'];?>','<?php print $user_data['nazac_id'];?>');" data-toggle="tooltip" data-placement="top" title="Book Appointment" class="homes-price boder_p text-center text-dark">Book Now</div>

					   <div style="font-size: 18px;" class="col-12 boder_p text-left"> 
						   <i class="fa fa-bullhorn red-text"></i>&nbsp; 
						   <a onClick="alert('!Ooops channel not opened');" class="red-text" href="javascript:;">Report listing</a>
					   </div>
					   
				    </div>
					<div class="boder_p">
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
						<div class="main-search-field padit mt-4">
							<!--<h5 class="title">Filter</h5>-->
							<!--<form method="GET">-->
								<div class="at-col-default-mar">
									<select class="form-control selctBg" name="slocation" id="slocation">
										<option value="" selected="selected">--Property Location--</option>
										<?php for($i=0;$i<count($locations);$i++){?>
										<option value="<?php echo $locations[$i]['nazac_location_id'];?>"><?php echo ucfirst($locations[$i]['nazac_location_name']);?></option>
										<?php }?>
									</select>
								</div>
								<div class="at-col-default-mar">
									<select class="form-control selctBg" name="scategory" id="scategory">
										<option value="" selected="selected">--Property Category--</option>
										<?php for($i=0;$i<count($category);$i++){?>
										<option value="<?php echo $category[$i]['nazac_category_id'];?>"><?php echo ucfirst($category[$i]['nazac_category_name']);?></option>
										<?php }?>
									</select>
								</div>
								<div class="at-col-default-mar">
									<div class="at-col-default-mar">
										<select class="form-control selctBg" name="stype" id="stype">
											<option value="" selected="selected">--Property Type--</option>
											<?php for($i=0;$i<count($propertyType);$i++){?>
											<option value="<?php echo str_replace(" ","_",$propertyType[$i]['property_type']);?>"><?php echo ucfirst($propertyType[$i]['property_type']);?></option>
											<?php }?>
										</select>
									</div>
								</div>
								
								<div class="at-col-default-mar mb-3">
									<input class="at-input" type="text" name="sminarea" id="sminarea" placeholder="Square Fit (eg: 350 sq ft)">
								</div>
								<div class="main-search-field-2">
									<div class="at-col-default-mar">
										<input type="number" name="sbudget" id="sbudget" class="at-input m-t-lg-30 m-t-xs-0 m-t-sm-10" placeholder="Budget">
									</div>
								</div>
								<div class="col-lg-12 no-pds">
									<div class="at-col-default-mar">
										<button id="serchbutton" class="btn btn-default hvr-bounce-to-right" type="submit">Search</button>
									</div>
								</div>
							<!--</form>-->
						</div>
					</div>
					
					<div class="boder_p">
						<div class="recent-post py-5">
							<h5 class="font-weight-bold mb-4">Recent Properties</h5>
							<?php if($property_data>0){
								for($i=0;$i<count($property_data);$i++){?>
							<div class="recent-main mb-4 boder_p">
								<div class="recent-img">
									<a href="<?php print base_url();?>users/user/property-details/<?php print $property_data[$i]['nazac_property_unique_id'];?>"><img class="boder_p" src="<?php print base_url();?>resource/upload/registered_property/<?php print $property_data[$i]['nazac_property_thumbnail'];?>" alt="<?php print  ucwords($property_data[$i]['nazac_property_title']);?>"></a>
								</div>
								<div class="info-img">
									<a href="<?php print base_url();?>users/user/property-details/<?php print $property_data[$i]['nazac_property_unique_id'];?>"><h6><?php print ucwords(strtolower($this->dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$property_data[$i]['nazac_property_category'],'nazac_category_name')));?></h6></a>
									<p><?php if($property_data[$i]['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?> <?php print number_format($property_data[$i]['nazac_property_price']);?></p>
								</div>
							</div>
							<?php }?>	
							<?php }else{				
								print '<h4>No property listing was found.</h4>';
							}?>
						</div>
						<div class="recent-post">
							<h5 class="font-weight-bold mb-4">Popolar Locations</h5>
							
							<div class="tags">
								<?php for($i=0;$i<count($locations);$i++){?>
									<span><a href="#" class="btn btn-outline-primary"><?php echo ucfirst($locations[$i]['nazac_location_name']);?></a></span>
								<?php }?>
							</div>
							
						</div>
					</div>
				  </div>
				</aside>
			</div>
		</div>
	</section>
	<!-- END SECTION PROPERTIES LISTING -->