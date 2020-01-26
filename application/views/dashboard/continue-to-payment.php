	<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url();?>resource/loader/loading_spinner.gif"></span>
	
	<section class="properties-right list featured portfolio blog" style="padding: 60px 0;">
		<div class="container">
			<div class="row">
       
       <?php if($singleProperty>0){?>
      
		  <div class="col-lg-6" style="margin-top: -10px;">
			  	<div class="col-12 text-left  boder_p">
			  	<?php 
							$cat = ucwords(strtolower($this->dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$singleProperty['nazac_property_category'],'nazac_category_name')));

							$loca = ucwords(strtolower($this->dbmodel->returnSingleData($this->lib->nazac_property_locations,'nazac_location_id',$singleProperty['nazac_property_location'],'nazac_location_name')));

							$titils = ucwords(strtolower($singleProperty['nazac_property_title'].' '.$cat))?>
					 <div class="set-tophead">
						<img src="<?php print base_url();?>resource/img/subscribe-now.png"/>
					 </div>
					 <div class="setPlanShow top-cover"><small class="vyt"><?php print $titils;?></small></div>
				</div>
                <div style="margin-top: -23px; background: #FFF;" class="col-12 boder_notp">
                <h3 align="right"><sup><?php if($singleProperty['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?></sup> <?php print number_format($singleProperty['nazac_property_price']);?><sub class="font-10"><?php print $singleProperty['nazac_payment_type'];?></sub></h3>
                <div class="col-12">
                	<i class="fa fa-map-marker text-sucess"></i>
							<?php

							$locatio = ucwords(strtolower($this->dbmodel->returnSingleData($this->lib->nazac_property_locations,'nazac_location_id',$singleProperty['nazac_property_location'],'nazac_location_name')));

							print $titil = ucwords(strtolower($singleProperty['nazac_property_street_address'].' '.$locatio.', '.$singleProperty['nazac_property_local_gov_area'].', '.$singleProperty['nazac_property_state'].', '.$singleProperty['nazac_property_country']))?>
                </div>
                	<table class="table table-bordered">
                	    <tr>
                			<td><div class="form-group">
                               <label>TYPE:</label> <?php print ucwords(strtolower($singleProperty['nazac_property_type']));?>
                              </div></td>
                		</tr>
                		<tr>
                			<td><div class="form-group">
                              <label>AMENITIES:</label>
                               <div class="input-group">
                              	<?php $futur = explode(",", $singleProperty['nazac_property_features']);
								for($i=0;$i<count($futur);$i++){?>
								<li style="list-style: none; padding: 0px 10px;">
									<i class="fa fa-check-square" aria-hidden="true"></i>
									<span><?php print $futur[$i];?></span>
								</li>
								<?php }?>
                                
                              </div>
                              </div></td>
                		</tr>
                		<tr>
                			<td>
								<div class="form-group">
							    <label>RENT RENEWAL: </label>
								  <?php print $singleProperty['nazac_payment_type'];?>
							   </div>	
                			</td>
                		</tr>
                		<tr>
                			<td>
								<img src="<?php print base_url();?>resource/img/pay-online-icon.png"/>	
                			</td>
                		</tr>
                	</table>
			    </div>
			 </div>
            
            
            <aside class="col-lg-6 car" style="margin-top: -30px;">
             <div class="widget shadow">
             <div class="col-12 top-backgrnd text-left boder_p">
					 <div class="set-tophead">
						<img src="<?php print base_url();?>resource/img/pay.png"/>
					 </div>
					 <span class="setPlanShow" style="color: #000;">Continue To Pay <i id="spiner" class=""></i></span>
				</div>
				<div style="margin-top: -23px;" class="col-12  text-left boder_notp">
						<div class="col-12">
                	<table style="font-size: 15px;" class="table ">
                	    
                		<tr>
                			<td><label>Price:</label></td>
                			<td align="right"><?php if($singleProperty['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?>
                			<span id="price"><?php print number_format($singleProperty['nazac_property_price']);?></span>
                			</td>
                		</tr>
                		<tr>
                			<td><label>Legal Fee:</label></td>
                			<td align="right"><?php if($singleProperty['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?>
                			<span id="price"><?php print number_format($singleProperty['nazac_property_legal_fee']);?></span>
                			</td>
                		</tr>
                		<tr>
                			<td><label>Agents Fee:</label></td>
                			<td align="right"><?php if($singleProperty['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?>
                			<span id="price"><?php print number_format($singleProperty['nazac_property_agents_fee']);?></span>
                			</td>
                		</tr>
                		<!--<tr>
                			<td>Discount:</td>
                			<td align="right"><span id="discount">0</span>%</td>
                		</tr>-->
                		<tr>
                			<td><label>Transaction Charge:</label></td>
                			<td align="right"><i data-toggle="tooltip" title="Transaction charges may be applicable!" data-placement="top" class="smallCircle">?</i></td>
                		</tr>
                		<tr>
                			<td colspan="2">
								<div class="form-group">
							    <label>SELECT PAYMENT METHOD* </label>
							     
								  <?php for($i=0; $i<count($payment_gateways); $i++){?>
									<label class="containerX"><?php print $payment_gateways[$i]['title'];?>&nbsp;
									  <input class="isgateway" type="radio" name="gateway" id="gateway" value="<?php print $payment_gateways[$i]['key_word'];?>">
									  <span class="checkmark"></span>
									</label>
								  <?php }?>
									
							   </div>	
                			</td>
                		</tr>
                		<tr>
                			<td><label><h4>Total:</h4></label></td>
                			<td align="right"><h3 style="padding: 0px; margin: 0px;"><?php if($singleProperty['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?><span id="totalPrice"> <?php print $total = number_format($singleProperty['nazac_property_price']+$singleProperty['nazac_property_legal_fee']+$singleProperty['nazac_property_agents_fee']);?></span></h3></td>
                		</tr>
                	
                	</table>
							<!--<span id="continue_to_pay" style="margin-top: -30px; display: none;" class="btn btn-success col-12 continue_to_pay">Continue to pay</span>-->
							<input type="hidden" value="<?php print $bookedId;?>" id="b_hash"/>
							<input type="hidden" value="<?php print $propertyId;?>" id="p_hash"/>
							<input type="hidden" value="<?php print $user_data['nazac_id'];?>" id="u_hash"/>
							<input type="hidden" value="new" id="paytype_hash"/>
							<input type="hidden" value="<?php print str_replace(" ","-", $titils);?>" id="url_hash"/>
							<a href="<?php print base_url();?>users/member/payment-center/<?php print $propertyId;?>/<?php print $bookedId;?>/<?php print str_replace(" ","-", $titils);?>"></a>
						</div>
					 </div>
					</div>
			   </aside>
			<?php }else{ ?>
						<div class="col-12"><h6 align="center"><img class="img-responsive" src="<?php print base_url();?>resource/img/propertymartGIF.gif"/></h6></div>
					<?php				
						print '<h2>Oops look like this property is no longer available or has been rented!.</h2>';
					}?>  
      
       
        
         	<a id="trnfpay" style="display: none;" data-toggle="modal" href="#myModedTransfer"> <i  class="btn btn-danger zmdi zmdi-upload"> </i></a>
		<!-- Modal -->
          <div style="z-index: 100000;" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModedTransfer" class="modal fade">
		              <div class="modal-dialog modal-lg">
		                  <div class="modal-content">
		                      <div class="modal-header south-color">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 id="tst" class="modal-title text-white"></h4>
		                      </div>
                             
							  <div class="modal-body col-lg-12">
								   <div class="row">
									 <div class="col-lg-12 text-success margin-30">
									
										<div class="row">
										 
										 <div class="col-lg-12">
										 	<table class="table">
              	    	<tr>
                			<td colspan="2">
                			<div class="set-tophead">
						<img src="<?php print base_url();?>resource/img/subscribe-now.png"/>
					 </div>
								<h3><div class="setPlanShow  top-cover"><?php print $siteDetail['site_name'];?> Account Details</div></h3>	
                			</td>
                		</tr>
               	    	<tr>
               	    		<td><label>Amount:</label></td>
                			<td>
								<h3 align="right"><sup><?php if($singleProperty['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?></sup> <span class="text-success"><?php print number_format($singleProperty['nazac_property_price']);?></span><sub class="font-10"><small>(<?php print $singleProperty['nazac_payment_type'];?>)</small></sub></h3>	
                			</td>
                		</tr>
                		<tr>
                			<td><label>Account Name:</label></td>
                			<td class="text-success text-right"><?php print $siteDetail['nazac_account_name'];?></td>
                		</tr>
                		<tr>
                			<td><label>Account Number:</label></td>
                			<td class="text-success text-right"><?php print $siteDetail['nazac_account_number'];?></td>
                		</tr>
                		<tr>
                			<td><label>Bank Name:</label></td>
                			<td class="text-success text-right"><?php print $siteDetail['nazac_bank_name'];?></td>
                		</tr>
                		<tr>
                			<td colspan="2"><div class="alert alert-danger"><i class="fa fa-warning"></i> <small>Note: All payments should be made through <?php print $siteDetail['site_name'];?> account details as listed above. In no occassion should you make payment to anybody by cash be it an agent or any other individual. <?php print $siteDetail['site_name'];?> will not be responsible for any lost of fund through this form. Be warned!</small></div></td>
                		</tr>
					  </table>
										</div>
								        <!--<div class="col-12"><hr></div>-->
									   </div>
										
									 </div>
		          				</div> 
		                     </div>
		                     <div class="modal-footer">
							  <button  data-dismiss="modal" class="btn btn-success fa fa-eject" type="submit" value=""> Cancel</button>
	                          <button id="continue_to_pay" class="continue_to_pay btn btn-primary fa fa-send"> I have made payment</button>
		                     </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
           
       
    </div>
   </div>
</section>