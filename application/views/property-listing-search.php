<!-- START SECTION PROPERTIES LISTING -->
<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url();?>resource/loader/loading_spinner.gif"></span>
	<section style="padding-top: 40px !important;" class="properties-right list featured portfolio blog">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-12 blog-pots">
					<!-- Block heading Start-->
					<div class="block-heading">
						<div class="row">
							<div class="col-lg-6 col-md-5 col-2">
								<h4>
                                <span class="heading-icon">
                                <i class="fa fa-th-list"></i>
                                </span>
                                <span class="hidden-sm-down">Properties Search</span>
                            </h4>
							</div>
							<div class="col-lg-6 col-md-7 col-10 cod-pad">
								<div class="sorting-options">
								<?php $cats = $cat_set;?>
									<select class="sorting" name="categoryChoose" id="categoryChoose">
										<option <?php if($cats=="All") print 'selected="selected"';?> value="All">All</option>
										<?php for($i=0;$i<count($category);$i++){?>
										<option <?php if($cats==$category[$i]['nazac_category_name']) print 'selected="selected"';?> value="<?php echo str_replace(" ","-",$category[$i]['nazac_category_name']);?>"><?php echo ucfirst($category[$i]['nazac_category_name']);?></option>
										<?php }?>
									</select>
									<input type="hidden" id="baseurl" value="<?php print base_url();?>">
								</div>
							</div>
							<div class="col-lg-12"><?php print @number_format($total_row);?> results of your search query was returned.</div>
						</div>
					</div>
					<!-- Block heading end -->
					<div class="row featured portfolio-items">
						
				<?php if($property_data>0){
					for($i=0;$i<count($property_data);$i++){
						
						$string = ucwords($property_data[$i]['nazac_property_title'].' '.$this->dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$property_data[$i]['nazac_property_category'],'nazac_category_name'));
						
						?>
				
						<div style="margin-top: 10px !important;" class="item col-lg-5 col-md-12 col-xs-12 landscapes sale pr-0 pb-0 my-44 ft">
							<div class="project-single mb-0 bb-0">
								<div class="project-inner project-head">
									<div class="project-bottom">
										<h4><a href="<?php print base_url();?>users/user/property-details/<?php print $property_data[$i]['nazac_property_unique_id'].'/'.str_replace(" ","-", $string);?>">View Property</a><span class="category"><?php print  ucwords($this->dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$property_data[$i]['nazac_property_category'],'nazac_category_name'));?></span></h4>
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
											
											<div class="homes-tag button alt sale">
											<?php print @$this->dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$property_data[$i]['nazac_property_category'],'nazac_category_name');?>
											</div>
											
											<img src="<?php print base_url();?>resource/upload/registered_property/<?php print $property_data[$i]['nazac_property_thumbnail'];?>" alt="<?php print  ucwords($property_data[$i]['nazac_property_title']);?>" class="img-responsive">
										</a>
										
										<div onClick="book('<?php print base_url();?>','<?php print $property_data[$i]['nazac_property_unique_id'];?>','<?php print $user_data['nazac_id'];?>');" data-toggle="tooltip" data-placement="top" title="Book Appointment" class="homes-price">Book Now</div>
									</div>
								</div>
							</div>
						</div>
						<!-- homes content -->
						<div style="margin-top: 10px !important;" class="col-lg-7 col-md-12 homes-content pb-0 my-44 ft mb-44">
							<!-- homes address -->
							<h3><?php if(strlen($string)>40){ print substr($string, 0, 40).'...';}else{ print $string;}?></h3>
							<p class="homes-address mb-3">
								<a href="<?php print base_url();?>users/user/property-details/<?php print $property_data[$i]['nazac_property_unique_id'].'/'.str_replace(" ","-", $string);?>">
									<i class="fa fa-map-marker"></i><span><?php print $address = ucwords(strtolower($property_data[$i]['nazac_property_street_address'].', '.ucwords(strtolower($this->dbmodel->returnSingleData($this->lib->nazac_property_locations,'nazac_location_id',$property_data[$i]['nazac_property_location'],'nazac_location_name')))))?></span>
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
									<i class="fas fa-bathtub" aria-hidden="true"></i>
									<span><?php print $property_data[$i]['nazac_property_no_of_parking_space'];?> Toilet</span>
								</li>
							</ul>
							<!-- Price -->
							<div class="price-properties">
								<h3 class="title mt-3">
                                <a href="<?php print base_url();?>users/user/property-details/<?php print $property_data[$i]['nazac_property_unique_id'].'/'.str_replace(" ","-", $string);?>"><?php if($property_data[$i]['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?> <?php print number_format($property_data[$i]['nazac_property_price']);?></a>
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
					<?php }?>	
					<?php }else{ ?>
						<div class="col-12"><h6 align="center"><img class="img-responsive" src="<?php print base_url();?>resource/img/propertymartGIF.gif"/></h6></div>
					<?php				
						print '<h2>No property listing for your search category was found.</h2>';
					}?>	
					
			 <nav aria-label="...">
				<ul class="pagination">
					
					<li class="page-item <?php if($pages <= 1){ echo 'disabled'; } ?>">
						<a class="page-link" href="<?php if($pages <= 1){ echo '#'; } else { echo base_url();?>users/user/property-listing-search/<?php print str_replace(" ","-",$cat_set)."/".($pages - 1); } ?>" tabindex="-1">Previous</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="<?php print base_url();?>users/user/property-listing-search/<?php print str_replace(" ","-",$cat_set);?>/1">First <span class="sr-only">(current)</span></a>
					</li>
					<li class="page-item"><a class="page-link" href="#">...</a></li>
					<li class="page-item active">
						<a class="page-link" href="<?php print base_url();?>users/user/property-listing-search/<?php print str_replace(" ","-",$cat_set);?>/<?php print $pages;?>"><?php print $pages;?> <span class="sr-only">(current)</span></a>
					</li>
					<li class="page-item hidden-xs"><a class="page-link" href="#">...</a></li>
					<li class="page-item"><a class="page-link" href="<?php print base_url();?>users/user/property-listing-search/<?php print str_replace(" ","-",$cat_set);?>/<?php print $num_links;?>">Last</a></li>
					<li class="page-item <?php if($pages >= $num_links){ echo 'disabled'; } ?>">
						<a class="page-link <?php if($pages >= $num_links){ echo 'disabled'; }?>" href="<?php if($pages >= $num_links){ echo '#'; } else { echo base_url();?>users/user/property-listing-search/<?php print str_replace(" ","-",$cat_set)."/".($pages + 1); } ?>">Next</a>
					</li>
				</ul>
				
			</nav>
					
					</div>
				</div>
				
				<aside class="col-lg-3 col-md-12 car">
					<div class="widget">
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
							<h5 class="title">Filter</h5>
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
									<input class="at-input m-t-lg-30 m-t-xs-0 m-t-sm-10" type="text" name="sminarea" id="sminarea" placeholder="Square Fit (eg: 350 sq ft)">
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
						<!-- Price Fields -->
						
					
						<div class="recent-post"><br>
							<h5 class="font-weight-bold mb-4">Popolar Locations</h5>
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