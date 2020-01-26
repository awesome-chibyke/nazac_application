	<section class="properties-right list featured portfolio blog" style="padding: 30px 0;">
		<div class="container">
			<div class="row">
			
			         <div class="col-lg-12">
			         
			         <?php if($user_data['nazac_client_account_verification']=='no'){?>
					<?php if($user_data['nazac_client_role']=='student'){?>
					<div class="alert alert-danger">
						<i class="fa fa-warning fa-2x"></i> Your account need to be verified to gain full access to this platform! <a href="<?php print base_url();?>member/verify-account">Verify Account Now!!</a>
					</div>
					<?php }?>
					<?php }?>
			         
					    <div class="dashCard borderTop">
								<span class="lefDashCard2">
								<?php if($user_data['nazac_client_role']=='agent'){?>
									<img src="<?php print base_url();?>resource/img/real-estate-agents-icon.png" width="100px" height="100px" alt="<?php print $user_data['nazac_clients_fname'].' | '.$siteDetail['site_name'];?>">
								<?php }else{?>	
									<img src="<?php print base_url();?>resource/img/users-icon.png" width="100px" height="100px" alt="<?php print $user_data['nazac_clients_fname'].' | '.$siteDetail['site_name'];?>">
								<?php }?><br>
								</span>
								<span class="dashWrite">Welcome <?php if($user_data['nazac_client_role']=='agent'){?>Agent<?php }?> <span class="text-success"><?php print $user_data['nazac_clients_fname'];?></span> to <?php print $siteDetail['site_name'];?></span>
					     </div>
					  </div>
					  
					  <div class="col-lg-4">
							<div class="dashCard">
								<div class="lefDashCard22">
									<img src="<?php print base_url();?>resource/img/acount.png" alt="<?php print $user_data['nazac_clients_fname'].' | '.$siteDetail['site_name'];?>">
								</div>
								<div class="rigDashCard22">
									<span class="font-16px">Account Type</span><br>
									<span class="setCounts">(<?php print ucfirst($user_data['nazac_client_role']);?>)</span><br>
									<span><u><a href="<?php print base_url();?>member/my-profile">Update Account Data</a></u></span>
								</div>
							</div>
					  </div>
					 
					  <?php if($user_data['nazac_client_role']!='agent'){?>  
					  <div class="col-lg-4">
							<div class="dashCard">
								<div class="lefDashCard22">
									<img class="circleProfiDash" src="<?php print base_url();?>resource/upload/<?php print $user_data['nazac_client_passport'];?>" alt="<?php print $user_data['nazac_clients_fname'].' '.$user_data['nazac_clients_lname'];?>">
								</div>
								<div class="rigDashCard22">
									<span class="font-16px">My Profile</span><br>
									<span class="setCounts">(Active)</span><br>
									<span><u><a href="<?php print base_url();?>member/my-profile">View Profile</a></u></span>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="dashCard">
								<div class="lefDashCard22">
									<img src="<?php print base_url();?>resource/img/saved.png" alt="<?php print $user_data['nazac_clients_fname'].' | '.$siteDetail['site_name'];?>">
								</div>
								<div class="rigDashCard22">
									<span class="font-16px">Booked Properties</span><br>
									<span class="setCounts">(<?php print $totla_booked_user_property;?>)</span><br>
									<span><u><a href="<?php print base_url();?>member/my-booking">See properties saved by you</a></u></span>
								</div>
							</div>
						</div>
					  <?php }?>
					  
					 <?php if($user_data['nazac_client_role']=='agent'){?> 
					  <div class="col-lg-4">
							<div class="dashCard">
								<div class="lefDashCard22">
									<img class="circleProfiDash" src="<?php print base_url();?>resource/upload/<?php print $user_data['nazac_client_passport'];?>" alt="<?php print $user_data['nazac_clients_fname'].' '.$user_data['nazac_clients_lname'];?>">
								</div>
								<div class="rigDashCard22">
									<span class="font-16px">Public Profile</span><br>
									<span class="setCounts">(Active)</span><br>
									<span><u><a href="<?php print base_url();?>users/user/agent-details/<?php print str_replace("/","-",$user_data['nazac_id']);?>">Learn how people see you</a></u></span>
								</div>
							</div>
						</div>
					  
					  
					  <div class="col-lg-4">
							<div class="dashCard">
								<div class="lefDashCard22">
									<img src="<?php print base_url();?>resource/img/listing.png" alt="<?php print $user_data['nazac_clients_fname'].' | '.$siteDetail['site_name'];?>">
								</div>
								<div class="rigDashCard22">
									<span class="font-16px">My Property Listing</span><br>
									<span class="setCounts">(<?php print $totla_listed_property;?>)</span><br><span><a href="<?php print base_url();?>agents/mains/my_listed_property"><u>Published <?php print $totla_listed_property_published;?></u> | <u>Unpublished <?php print $totla_listed_property_unpublished;?></u></a></span>
								</div>
							</div>
						</div>
						
						
						<div class="col-lg-4">
							<div class="dashCard">
								<div class="lefDashCard22">
									<img src="<?php print base_url();?>resource/img/card.png" alt="<?php print $user_data['nazac_clients_fname'].' | '.$siteDetail['site_name'];?>">
								</div>
								<div class="rigDashCard22">
									<span class="font-16px">Registered Property</span><br>
									<span class="setCounts">(<?php print $totla_registered_property;?>)</span><br>
									<span><a href="<?php print base_url();?>agents/mains/register_property"><span><u>Register New Properties</u></span></a></span>
								</div>
							</div>
						</div>
						
						
						
						<div class="col-lg-4">
							<div class="dashCard">
								<div class="lefDashCard22">
									<img src="<?php print base_url();?>resource/img/stats.png" alt="<?php print $user_data['nazac_clients_fname'].' | '.$siteDetail['site_name'];?>">
								</div>
								<div class="rigDashCard22">
									<span class="font-16px">Statistical Analysis</span><br>
									<span class="setCounts">Listing/Views</span><br>
									<span><a href="<?php print base_url();?>member/statistics"><u>Your listing activities</u></a></span>
								</div>
							</div>
						</div>
                     
                     
                      
                       <div class="col-lg-4">
							<div class="dashCard">
								<div class="lefDashCard22">
									<img src="<?php print base_url();?>resource/img/saved.png" alt="<?php print $user_data['nazac_clients_fname'].' | '.$siteDetail['site_name'];?>">
								</div>
								<div class="rigDashCard22">
									<span class="font-16px">Booked Properties</span><br>
									<span class="setCounts">(<?php print $totla_booked_agent_property;?>)</span><br>
									<span><u><a href="<?php print base_url();?>agents/mains/view_booked_properties">See properties saved by you</a></u></span>
								</div>
							</div>
						</div>
			<?php }?>
			
			<div class="col-lg-12">
				<div></div>
			</div>
			<?php if($user_data['nazac_client_role']!='agent'){?>
				<aside class="col-lg-4 col-md-12 car">
					<div class="widget boder_p">
						<div class="section-heading  profile_set">
							<div class="media">
								<div class="media-left">
									<i class="fa fa-home"></i>
								</div>
								<div class="media-body">
									<h5>My Page</h5>
									<div class="border"></div>
									<p></p>
								</div>
							</div>
							<div class="media">
								<div class="col-12">
									 <div class="avatar-upload">
										<div data-toggle="tooltip" title="Click to edit" class="avatar-edit">
											<label  id="pointer" for="imageUpload"><i onClick="performClick('theFiles')" class="fa fa-pencil fa-2x"></i></label>
										</div>
										<div data-toggle="tooltip" title="<?php print @$user_data['nazac_clients_fname'].' '.$user_data['nazac_clients_lname'];?>" class="avatar-preview">
											<div id="imagePreview">
											<img id="pp" class="img-responsive" src="<?php print base_url();?>resource/upload/<?php print $user_data['nazac_client_passport']?>" alt="<?php print @$user_data['nazac_clients_fname'].' '.$user_data['nazac_clients_lname'];?>">
											</div>
										</div>
									</div>
									<p class="setNameShow2"><span class="text-success"><strong>NN:</strong> </span> <?php print $user_data['nazac_id'];?></p>
									
									<p class="_nazac_setName"><span class="text-success"><strong>Name:</strong> </span> <?php print @$user_data['nazac_clients_fname'].' '.$user_data['nazac_clients_lname'];?></p>
									<?php if($user_data['nazac_client_role']=='agent'){}else{?>
									
										<?php if($my_renting!=0){?>
										<p class="_nazac_setName"><span class="text-success"><strong>RIN:</strong> </span> <?php print  $this->dbmodel->returnSingleData($this->lib->nazac_register_property,'nazac_property_id',$property_rented['nazaac_main_property_id'],'nazac_property_number').'/'.$property_rented['nazac_property_room_number'];?></p>

										<p class="_nazac_setName"><span class="text-success"><strong>Address:</strong> </span> <i class="fa fa-map-marker"></i> <span><?php print ucwords(strtolower($property_rented['nazac_property_street_address'].', '.$this->dbmodel->returnSingleData($this->lib->nazac_property_locations,'nazac_location_id',$property_rented['nazac_property_location'],'nazac_location_name').', '.$property_rented['nazac_property_town'].', '.$property_rented['nazac_property_local_gov_area'].', '.$property_rented['nazac_property_state'].', '.$property_rented['nazac_property_country']));?></span> </p>
										<?php }else{?>
										<p class="_nazac_setName"><span class="text-success"><strong>RIN:</strong> </span> Pending...</p>

										<p class="_nazac_setName"><span class="text-success"><strong>Address:</strong> </span> Pending... </p>
										<?php }?>
									
									<?php }?>
								  </div>
								<input style="visibility:hidden; width:0px; margin-right:2px;" value="" name="file" type="file" id="theFiles" />
								<input value="<?php print base_url();?>" id="baseurl" type="hidden" name="baseurl" />
								<input id="id" value="<?php print $user_data['nazac_id'];?>" type="hidden" name="id" />
								<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url();?>resource/loader/loading_spinner.gif"></span>
								<br />
								<!--<div class="profile_pixBox">
									<center>
										<img src="<?php print base_url();?>resource/upload/avatarf.png" class="img-responsive">
									</center>
								</div>-->
							</div>
						</div>
						
						<div class="recent-post py-5">
						</div>
						
						<div class="recent-post">
						</div>
					</div>
				</aside>
			<?php }?>
			
			<div class="col-lg-8 col-md-12 blog-pots">
			
			
			<!--Rented Property-->
			<?php if($user_data['nazac_client_role']!='agent'){?>
				
				<?php if($my_renting!=0){?>
					<div class="dashCard boder_p">
						<div class="lefDashCard">
							<img class="circleProfiDash"  src="<?php print base_url();?>resource/upload/registered_property/<?php print $property_rented['nazac_property_thumbnail'];?>">
						</div>
						<div class="rigDashCard">
							<h3><?php print $rent_title = ucwords(strtolower($property_rented['nazac_property_title'].' '.$this->dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$property_rented['nazac_property_category'],'nazac_category_name')));?></h3>
							<div>
								<i class="fa fa-map-marker"></i> <span><?php print ucwords(strtolower($property_rented['nazac_property_street_address'].', '.$this->dbmodel->returnSingleData($this->lib->nazac_property_locations,'nazac_location_id',$property_rented['nazac_property_location'],'nazac_location_name').', '.$property_rented['nazac_property_town'].', '.$property_rented['nazac_property_local_gov_area'].', '.$property_rented['nazac_property_state'].', '.$property_rented['nazac_property_country']));?></span>
							</div>
							<div>
								<span class="text-success"><strong>RIN:</strong> <?php print  $this->dbmodel->returnSingleData($this->lib->nazac_register_property,'nazac_property_id',$property_rented['nazaac_main_property_id'],'nazac_property_number').'/'.$property_rented['nazac_property_room_number'];?></span>
							</div>
							<div>
								<span class="text-success"><strong>TYPE:</strong> Rented Property</span>
							</div>
							<div>
								<span class="text-success"><strong>Duration:</strong> <?php print $my_renting['nazac_renting_duration'];?> Months</span>
							</div>
							<div>
								<span class="text-success"><strong>Status:</strong> <?php print $my_renting['nazac_renting_payment_status'];?></span>
							</div>
							<div>
								<a href="<?php print base_url();?>users/user/property-details/<?php print $property_rented['nazac_property_unique_id'];?>/<?php print str_replace(" ","-", $rent_title);?>"><span class="text-info"><strong><u>Details</u></strong></span></a>
							</div>
							<div style="text-align: right;"><span class="text-info"> Rent will expire in <strong style="font-size: 16px;"><?php print $my_renting['nazac_renting_countdown'];?> Months</strong> </span>
							</div><hr>
							<div style="text-align: right;"><span>
							<a href="<?php print base_url();?>users/member/generate-receipt/<?php print $my_renting['nazac_renting_id'];?>"><strong class="text-info"><u>View Payment</u> </strong></a> </span>
							
							<?php if($my_renting['nazac_renting_countdown']<4){?>
								<a href="<?php print base_url();?>users/member/renew-payment/<?php print $my_renting['nazac_renting_property_id'];?>/<?php print $my_renting['nazac_renting_booking_id'];?>/<?php print str_replace(" ","-", $rent_title);?>"><span class="btn btn-success">Renew Rent</span></a> </span>
							<?php }?>
							</div>
						</div>
					</div>
				<?php }?>				
									
									
				<?php }?>
			
			
			<!--Booked Property-->
			<?php if($user_data['nazac_client_role']!='agent'){?>	
					
					
					<?php if($booked_property>0){
				for($i=0;$i<count($booked_property);$i++){
				if(count($booked_property[$i])==0){ }else{
				?>
					<div class="dashCard boder_p">
						<div class="lefDashCard">
							<img class="circleProfiDash"  src="<?php print base_url();?>resource/upload/registered_property/<?php print $booked_property[$i][0]['nazac_property_thumbnail'];?>">
						</div>
						<div class="rigDashCard">
						<?php $title = ucwords(strtolower($booked_property[$i][0]['nazac_property_title'].' '.$this->dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$booked_property[$i][0]['nazac_property_category'],'nazac_category_name')));?>
							<h3><?php print $title;?></h3>
							<div>
							<?php $address = ucwords(strtolower($booked_property[$i][0]['nazac_property_street_address'].', '.$this->dbmodel->returnSingleData($this->lib->nazac_property_locations,'nazac_location_id',$booked_property[$i][0]['nazac_property_location'],'nazac_location_name').', '.$booked_property[$i][0]['nazac_property_town'].', '.$booked_property[$i][0]['nazac_property_local_gov_area'].', '.$booked_property[$i][0]['nazac_property_state'].', '.$booked_property[$i][0]['nazac_property_country']));?>
								<i class="fa fa-map-marker"></i> <span><?php print $address;?></span>
							</div>
							<div>
								<span class="text-success"><strong>RIN:</strong> <?php print  $this->dbmodel->returnSingleData($this->lib->nazac_register_property,'nazac_property_id',$booked_property[$i][0]['nazaac_main_property_id'],'nazac_property_number').'/'.$booked_property[$i][0]['nazac_property_room_number'];?></span>
							</div>
							<div>
								<span class="text-success"><strong>TYPE:</strong> <?php print $booked_property[$i][0]['nazac_property_type'];?></span>
							</div>
							<div>
								<span class="text-success"><strong>Rent Fee:</strong> <?php if($booked_property[$i][0]['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?> <?php print number_format($booked_property[$i][0]['nazac_property_price']);?> </span><br>
								<span class="text-success"><strong>Payment Type:</strong> <?php print $booked_property[$i][0]['nazac_payment_type'];?></span>
							</div>
							<div>
								<span class="text-success"><strong>Agent Fee:</strong> <?php if($booked_property[$i][0]['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?> <?php print number_format($booked_property[$i][0]['nazac_property_agents_fee']);?></span>
							</div>
							<!--<div>
								<span class="text-success"><strong>Legal Fee:</strong> <?php if($booked_property[$i][0]['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?> <?php print number_format($booked_property[$i][0]['nazac_property_legal_fee']);?></span>
							</div>-->
							<div>
								<a class="btn btn-primary" data-toggle="tooltip" title="Click to view property details" data-placement="top" href="<?php print base_url();?>users/user/property-details/<?php print $booked_property[$i][0]['nazac_property_unique_id'];?>/<?php print str_replace(" ","-", $title);?>">Details</a> |
								
							    <a class="btn btn-success" data-toggle="tooltip" title="Click to view agents details" data-placement="top" href="<?php print base_url();?>users/user/agent-details/<?php print str_replace("/","-",$booked_property[$i][0]['nazac_property_gent_incharge_id']);?>">Contact Agent</a>
							</div>
							<div style="text-align: right;">
							<?php $expireTime = $this->dbmodel->getBookingExpireTime($user_data['nazac_id'], $booked_property[$i][0]['nazac_property_unique_id']);?>
							<span class="text-danger">Booking will expire in <strong style="font-size: 16px;"><?php print $expireTime['nazac_book_counter'];?> hrs</strong> </span>
							
							</div><hr>
							<div><span><strong class="text-danger">Note:</strong> You are expected to have seen this property within the days specified and pay for it if interested. Remember we work on first come first serve bases. Thanks</span></div>
							
							<div style="text-align: right;"><span>
							
							<?php if($expireTime['cancel_booking']=='yes'){?>
								<h3>Thank you for showing interest in this property. But this property is no longer available for renting.</h3>
							<?php }else{?>
								<?php if($expireTime['aprove_availability_for_payment']=='yes'){?>
									<a href="<?php print base_url();?>users/member/continue-to-payment/<?php print $booked_property[$i][0]['nazac_property_unique_id'];?>/<?php print $expireTime['nazac_book_id'];?>/<?php print str_replace(" ","-", $title);?>"><span data-toggle="tooltip" title="Be the first to pay" data-placement="top" class="btn btn-success">Pay Now</span></a>
								<?php }else{?>
									<span data-toggle="tooltip" title="Awaiting Verification" data-placement="top" class="btn btn-success disabled">Awaiting Verification</span>
								<?php }?>
							<?php }?>
							
							 | <a data-toggle="modal" href="#myModalTT<?php print $booked_property[$i][0]['nazac_property_unique_id'];?>"><span data-toggle="tooltip" title="Click Booking" data-placement="top" class="btn btn-danger">Cancle</span></a> </span></div>
						</div>
					</div>
					
					<!-- Modal -->
		    <div style="z-index: 100000000" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalTT<?php print $booked_property[$i][0]['nazac_property_unique_id'];?>" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header alert alert-info">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Cancle Booking?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Are you sure you want to cancel this booking?</p>
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          
								  <span onClick="cancelBooking('<?php print base_url();?>','<?php print $expireTime['nazac_book_id'];?>');" class="btn btn-danger btn-theme">Terminate</span>
								  
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
				  <?php }}}?>
		 <?php }?>	
				
						
					
					
					
					
					<!-- Block heading end -->
				<?php if($user_data['nazac_client_role']!='agent'){?>	
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
						
					</div>
				<?php }?>	
					
				</div>
			</div>
		</div>
	</section>
	
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