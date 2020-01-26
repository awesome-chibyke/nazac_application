	<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url();?>resource/loader/loading_spinner.gif"></span>
	<input type="hidden" value="<?php print $user_data['nazac_id'];?>" name="userid" id="userid" />
	
	<section class="properties-right list featured portfolio blog" style="padding: 30px 0;">
		<div class="container">
			<div class="row">
			<div class="col-lg-12">
				<div></div>
			</div>
				
				<div class="col-lg-12 col-md-12 blog-pots">
					
					<?php if($user_data['nazac_client_account_verification']=='no'){?>
					<?php if($user_data['nazac_client_role']=='student'){?>
					<div class="alert alert-danger">
						<i class="fa fa-warning fa-2x"></i> Your account need to be verified to gain full access to this platform! <a href="<?php print base_url();?>member/verify-account">Verify Account Now!!</a>
					</div>
					<?php }?>
					<?php }?>
					
					<?php if($booked_property>0){
				for($i=0;$i<count($booked_property);$i++){
					if(count($booked_property[$i])==0){ }else{?>
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
							<span class="text-info">Booking will expire in <strong style="font-size: 16px;"><?php print $expireTime['nazac_book_counter'];?> hrs</strong> </span>
							</div><hr>
							<div><span><strong class="text-danger">Note:</strong> You are expected to have seen this property within the days specified and pay for it if interested. Remember we work on first come first serve bases. Thanks</span></div>
							<div style="text-align: right;"><span>
							
							<?php if($expireTime['cancel_booking']=='yes'){?>
								<h3 class="text-danger">Thank you for showing interest in this property. But this property is no longer available for renting.</h3>
							<?php }else{?>
								<?php if($expireTime['aprove_availability_for_payment']=='yes'){?>
									<a href="<?php print base_url();?>users/member/continue-to-payment/<?php print $booked_property[$i][0]['nazac_property_unique_id'];?>/<?php print $expireTime['nazac_book_id'];?>/<?php print str_replace(" ","-", $title);?>"><span data-toggle="tooltip" title="Be the first to pay" data-placement="top" class="btn btn-success">Pay Now</span></a>
								<?php }else{?>
									<span data-toggle="tooltip" title="Awaiting Verification" data-placement="top" class="btn btn-success disabled">Awaiting Verification</span>
								<?php }?>
							<?php }?>
							
							 | <a data-toggle="modal" href="#myModalTT<?php print $booked_property[$i][0]['nazac_property_unique_id'];?>"><span data-toggle="tooltip" title="Cancel Booking" data-placement="top" class="btn btn-danger">Cancle</span></a> </span></div>
						</div>
					</div>
					<!-- Modal -->
		    <div style="z-index: 100000000" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalTT<?php print $booked_property[$i][0]['nazac_property_unique_id'];?>" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header alert alert-info">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Cancel Booking?</h4>
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
				  <?php }}}else{?>
				  	<div class="well jumbotron boder_p text-center"><h1>No booking was found!</h1></div>
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