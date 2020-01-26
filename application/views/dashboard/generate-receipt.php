	<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url();?>resource/loader/loading_spinner.gif"></span>
	
	<section class="properties-right list featured portfolio blog" style="padding: 60px 0;">
		<div class="container">
			<div class="row">
       
       <?php if($singleProperty>0){?>
      
		  <div id="DivIdToPrint" class="col-lg-10  offset-lg-1">
			  	
                <div style="background: #FFF;" class="col-12 boder_p">
                 <?php 
							$cat = ucwords(strtolower($this->dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$singleProperty['nazac_property_category'],'nazac_category_name')));

							$loca = ucwords(strtolower($this->dbmodel->returnSingleData($this->lib->nazac_property_locations,'nazac_location_id',$singleProperty['nazac_property_location'],'nazac_location_name')));

							$titils = ucwords(strtolower($singleProperty['nazac_property_title'].' '.$cat))?>
                 
                 <?php

							$locatio = ucwords(strtolower($this->dbmodel->returnSingleData($this->lib->nazac_property_locations,'nazac_location_id',$singleProperty['nazac_property_location'],'nazac_location_name')));

							$address = ucwords(strtolower($singleProperty['nazac_property_street_address'].' '.$locatio.', '.$singleProperty['nazac_property_local_gov_area'].', '.$singleProperty['nazac_property_state'].', '.$singleProperty['nazac_property_country']))?>
                  <div class="table-responsive">
                	<table class="table boder_p">
                		<tr>
                			<td colspan="2"><br><h2><?php print $siteDetail['site_name'];?> PAYMENT RECEIPT</h2></td>
                		</tr>
                		<tr>
                			<td><br>
                				<span><label>Invoice ID:</label> <span class="text-success"><?php print $payment_info['nazac_renting_id'];?></span></span><br>
                				
                				<span><label>Payment Date:</label> <span class="text-success"><?php print $payment_info['start_date'];?></span></span><br>
                				
                				<span><label>Renewal Date:</label> <span class="text-success"><?php print $payment_info['expiry_date'];?></span></span><br>
                				
                				<span><label>Payment Method:</label> <span class="text-success"><?php print ucfirst($payment_info['nazac_renting_payment_type']);?></span></span><br>
                				
                				<span><label>Payment Type:</label> <span class="text-success"><?php print ucfirst($payment_info['new_renewal_payment_type']);?> Payment</span></span><br>
                				
                				<span><label>Rent Duration:</label> <span class="text-success"><?php print ucfirst($payment_info['nazac_renting_duration']);?> Months</span></span><br>
                			</td>
                			<td align="right">
                			<img src="<?php print base_url('resource/img/logo.jpg');?>" /><br>
                			</td>
                		</tr>
                	</table>
                	<table class="table boder_p">
                		<tr>
                			<td>
                				<span><label>Client Name:</label> <span class="text-success"><?php print ucfirst($user_data['nazac_clients_fname'].' '.$user_data['nazac_clients_lname']);?> </span></span>
                			</td>
                			<td>
                				<span><label>Client Email:</label> <span class="text-success"><?php print ucfirst($user_data['nazac_client_email']);?></span></span>
                			</td>
                			<td>
                				<span><label>Client Email:</label> <span class="text-success"><?php print ucfirst($user_data['nazac_client_phone']);?></span></span>
                			</td>
                		</tr>
                	</table>
                	<table style="font-size: 15px;" class="table boder_p">
                	    <tr>
                	    	<td><label>ITEM:</label></td>
                	    	<td align="right"><?php print $titils;?> <?php print 'At '.$address;?></td>
                	    </tr>
                		<tr>
                			<td><label>Rent Price:</label></td>
                			<td align="right"><?php if($singleProperty['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?>
                			<span id="price"><?php print number_format($singleProperty['nazac_property_price']);?></span>
                			</td>
                		</tr>
                		<?php if($payment_info['new_renewal_payment_type']=='new'){?>
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
                		<?php }?>
                		<tr>
                			<td><label><h4>Total:</h4></label></td>
                			<td align="right"><h3 style="padding: 0px; margin: 0px;"><?php if($singleProperty['nazac_property_currency']=='NGN'){print '₦';}else{print '$';}?><span id="totalPrice"> <?php $total = number_format($singleProperty['nazac_property_price']+$singleProperty['nazac_property_legal_fee']+$singleProperty['nazac_property_agents_fee']);?>
                			
                			<?php if($payment_info['new_renewal_payment_type']=='new'){
								print $total;
							}else{
								print number_format($singleProperty['nazac_property_price']);
							}?>
                			</span></h3></td>
                		</tr>
                		
                		<tr>
                			<td colspan="2" align="right"><span id="hideprint" onClick="printDiv();" class="btn btn-primary btn-small">Print</span>
                			<span id="shopeprint" onClick="printo();" class="btn btn-primary btn-small">Print</span>
                			</td>
                		</tr>
                	</table>
                	<table class="table table-bordered">
                		<tr>
                			<td align="right">
								<img id="imghide" src="<?php print base_url();?>resource/img/pay-online-icon.png"/>	
                			</td>
                		</tr>
                	</table>
                  </div>
			    </div>
			 </div>
            
			<?php }else{ ?>
						<div class="col-12"><h6 align="center"><img class="img-responsive" src="<?php print base_url();?>resource/img/propertymartGIF.gif"/></h6></div>
					<?php				
						print '<h2>Oops something went wrong please contact support => '.$siteDetail['email3'].'.</h2>';
					}?>  
      
       

           
       
    </div>
   </div>
</section>