	<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url();?>resource/loader/loading_spinner.gif"></span>
	<input type="hidden" value="<?php print $user_data['nazac_id'];?>" name="userid" id="userid" />
	
	<section class="properties-right list featured portfolio blog" style="padding: 30px 0;">
		<div class="container">
			<div class="row">
			
			<?php if($user_data['nazac_client_role']!='agent'){?>
				<aside class="col-lg-4 col-md-12 car">
					<div class="widget boder_p">
						<div class="section-heading  profile_set">
							<div class="media">
								<div class="media-left">
									<i class="fa fa-home"></i>
								</div>
								<div class="media-body">
									<h5>My Renting</h5>
									<div class="border"></div>
									<p></p>
								</div>
							</div>
							<div class="media">
								<div class="col-12">
									 <div class="avatar-upload">
										
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
	
	<?php if($user_data['nazac_client_role']!='agent'){?>
				
				<?php if($my_renting!=0){?>
					<div class="dashCard boder_p">
					<div><h3>CURRENT RENTING</h3><hr></div>
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
							<?php }?> </div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<a data-toggle="modal" href="#myModedreviews"><span data-toggle="tooltip" title="Drop a review" data-placement="top" class="">Leave a review</span></a>
							</div>
						</div>
					</div>
				<?php }?>				
							
				
				<div class="boder_p"><h3>MY RENTING</h3></div>
									
				<?php if($all_rented!=0){
				for($i=0;$i<count($all_rented);$i++){?>
					
					<div class="dashCard boder_p">
						<div class="lefDashCard">
							<img class="circleProfiDash"  src="<?php print base_url();?>resource/upload/registered_property/<?php print $this->dbmodel->returnSingleDataFromRentProperty($all_rented[$i]['nazac_renting_property_id'],'nazac_property_thumbnail');?>">
						</div>
						<div class="rigDashCard">
							<h3><?php print $rent_title = ucwords(strtolower($this->dbmodel->returnSingleDataFromRentProperty($all_rented[$i]['nazac_renting_property_id'],'nazac_property_title').' '.$this->dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$this->dbmodel->returnSingleDataFromRentProperty($all_rented[$i]['nazac_renting_property_id'],'nazac_property_category'),'nazac_category_name')));?></h3>
							<div>
								<i class="fa fa-map-marker"></i> <span><?php print ucwords(strtolower($this->dbmodel->returnSingleDataFromRentProperty($all_rented[$i]['nazac_renting_property_id'],'nazac_property_street_address').', '.$this->dbmodel->returnSingleData($this->lib->nazac_property_locations,'nazac_location_id',$this->dbmodel->returnSingleDataFromRentProperty($all_rented[$i]['nazac_renting_property_id'],'nazac_property_location'),'nazac_location_name').', '.$this->dbmodel->returnSingleDataFromRentProperty($all_rented[$i]['nazac_renting_property_id'],'nazac_property_town').', '.$this->dbmodel->returnSingleDataFromRentProperty($all_rented[$i]['nazac_renting_property_id'],'nazac_property_local_gov_area').', '.$this->dbmodel->returnSingleDataFromRentProperty($all_rented[$i]['nazac_renting_property_id'],'nazac_property_state').', '.$this->dbmodel->returnSingleDataFromRentProperty($all_rented[$i]['nazac_renting_property_id'],'nazac_property_country')));?></span>
							</div>
							<div>
								<span class="text-success"><strong>RIN:</strong> <?php print  $this->dbmodel->returnSingleData($this->lib->nazac_register_property,'nazac_property_id',$this->dbmodel->returnSingleDataFromRentProperty($all_rented[$i]['nazac_renting_property_id'],'nazaac_main_property_id'),'nazac_property_number').'/'.$this->dbmodel->returnSingleDataFromRentProperty($all_rented[$i]['nazac_renting_property_id'],'nazac_property_room_number');?></span>
							</div>
							<div>
								<span class="text-success"><strong>TYPE:</strong> Rented Property</span>
							</div>
							<div>
								<span class="text-success"><strong>Duration:</strong> <?php print $all_rented[$i]['nazac_renting_duration'];?> Months</span>
							</div>
							<div>
								<span class="text-success"><strong>Status:</strong> <?php print $all_rented[$i]['nazac_renting_payment_status'];?></span>
							</div>
							<div>
								<a href="<?php print base_url();?>users/user/property-details/<?php print $this->dbmodel->returnSingleDataFromRentProperty($all_rented[$i]['nazac_renting_property_id'],'nazac_property_unique_id');?>/<?php print str_replace(" ","-", $rent_title);?>"><span class="text-info"><strong><u>Details</u></strong></span></a>
							</div>
							<div style="text-align: right;"><span class="text-info"> Rent will expire in <strong style="font-size: 16px;"><?php print $all_rented[$i]['nazac_renting_countdown'];?> Months</strong> </span>
							</div><hr>
							<div style="text-align: right;">
							<?php if($all_rented[$i]['nazac_renting_payment_status']!='confirmed'){?>
							<span>
							<a href="<?php print base_url();?>users/member/payment-center/<?php print $all_rented[$i]['nazac_renting_property_id'];?>/<?php print $all_rented[$i]['nazac_renting_booking_id'];?>/<?php print $all_rented[$i]['nazac_renting_payment_type'];?>/<?php print $all_rented[$i]['nazac_renting_id'];?>/<?php print str_replace(" ","-", $rent_title);?>"><strong class="text-info"><u>Back To Payment</u></strong></a> </span> | <a data-toggle="modal" href="#myModalTT<?php print $all_rented[$i]['nazac_renting_id'];?>"><span data-toggle="tooltip" title="Cancel Renting" data-placement="top" class="btn btn-danger">Cancel</span></a>
							<?php }else{?>
							<span>
							<a href="<?php print base_url();?>users/member/generate-receipt/<?php print $all_rented[$i]['nazac_renting_id'];?>"><strong class="text-info"><u>View Payment</u> </strong></a> </span>
							
							<?php if($all_rented[$i]['nazac_renting_countdown']<4){?>
								<a href="<?php print base_url();?>users/member/renew-payment/<?php print $all_rented[$i]['nazac_renting_property_id'];?>/<?php print $all_rented[$i]['nazac_renting_booking_id'];?>/<?php print str_replace(" ","-", $rent_title);?>"><span class="btn btn-success">Renew Rent</span></a> </span>
							<?php }?>
							
							<?php }?>
							</div>
							
						</div>
					</div>
					
					
							<!-- Modal -->
		    <div style="z-index: 100000000" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalTT<?php print $all_rented[$i]['nazac_renting_id'];?>" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header alert alert-info">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Cancel Renting?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Are you sure you want to cancel this rent transaction?</p>
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          
								  <span onClick="cancelRenting('<?php print base_url();?>','<?php print $all_rented[$i]['nazac_renting_id'];?>');" class="btn btn-danger btn-theme">Terminate</span>
								  
		                      </div>
		                  </div>
		              </div>
		          </div>
					
				<?php }}else{ print '<h2>No Renting for your search category was found.</h2>';}?>									
																	
									
				<?php }?>
			
	
	</div>
				
	</div>
</div>
</section>