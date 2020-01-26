	<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url();?>resource/loader/loading_spinner.gif"></span>
	
	<section class="properties-right list featured portfolio blog" style="padding: 45px 0;">
		<div class="container">
			<div class="row">
       
       <?php if($singleProperty>0){?>
      
		  <div class="col-lg-12" style="margin-top: -10px;">
		  	    
			  	<div class="col-12 text-left  boder_p">
			  	<?php 
					$cat = ucwords(strtolower($this->dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$singleProperty['nazac_property_category'],'nazac_category_name')));

					$loca = ucwords(strtolower($this->dbmodel->returnSingleData($this->lib->nazac_property_locations,'nazac_location_id',$singleProperty['nazac_property_location'],'nazac_location_name')));

					$titils = ucwords(strtolower($singleProperty['nazac_property_title'].' '.$cat))?>
					 <div class="set-tophead">
						<img src="<?php print base_url();?>resource/img/subscribe.png"/>
					 </div>
					 <div class="setPlanShow top-cover"><small class="vyt"><?php print $titils;?></small></div>
				</div>
               
                <div style="margin-top: -23px; background: #FFF;" class="col-12 boder_notp">
               
                <div class="row">
               
                 <div class="col-lg-8">
                 
                  <table class="table">
              	    	<tr>
                			<td colspan="2">	
               					<h3 class="text-success">COMPLETE PAYMENT(<?php print strtoupper($payment_info['new_renewal_payment_type']);?>) <span class="pull-right">
               					 <?php if($payment_info['nazac_renting_payment_type']=='transfer'){?>
               					<img width="100" src="<?php print base_url();?>resource/img/bank-transfer-icon.png"/>
               					<?php }else{?>
               					<img width="100" src="<?php print base_url();?>resource/img/bank-deposit-icon.png"/>
               					<?php }?>
               					</span></h3>
                			</td>
                		</tr>
               	    	<tr>
               	    		<td><label>Amount Paid:</label></td>
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
                			<td colspan="2"><div class="alert alert-danger"><i class="fa fa-warning"></i> Note: All payments should be made through <?php print $siteDetail['site_name'];?> account details as listed above. In no occassion should you make payment to anybody by cash be it an agent or any other individual. <?php print $siteDetail['site_name'];?> will not be responsible for any lost of fund through this form. Be warned!</div></td>
                		</tr>
					  </table>
                  	<!--<table class="table">
               	    	<tr>
                			<td>
								<img src="<?php print base_url();?>resource/img/bank-transfer-icon.png"/>	
                			</td>
                		</tr>
					  </table>-->
                  </div>
                
				<div class="col-lg-4">
				<?php echo validation_errors("<div class='alert alert-danger'>","</div>"); ?>
				<form enctype="multipart/form-data" method="post">
                	
                	<table class="table table-bordered">
                	    <tr>
                			<td><h3 class="text-success">Upload Payment Prove</h3></td>
                		</tr>
                		<tr>
                			<td>
                				<a onClick="performClick('payment_teller');" id="point">
               					<div class="form-group pointer">
               					<?php  $img_bas = explode(".",$payment_info['nazac_renting_payment_prove']);
									   $img_end = end($img_bas);
									if($img_end=='pdf'){?>
             						<!--<a href="<?php base_url();?>resource/payment_upload/<?php print $payment_info['nazac_renting_payment_prove'];?>">-->
             							<img width="100" src="<?php print base_url();?>resource/img/adobe-pdf-icon.svg"/>
             						<!--</a>-->
              						<?php }else{?>
               						<img class="img-responsive" src="<?php print base_url();?>resource/payment_upload/<?php print $payment_info['nazac_renting_payment_prove'];?>" />
               						<?php }?>
               						<span>Click TO Upload</span>
               						<br>
               			            <span class="text-primary">Format: .jpg, .png, .pdf</span>
                			    </div>
								</a>
              			 		
               			 		<input class="hiddens cropper-source" id="payment_teller" name="payment_teller" type="file" data-handler="" data-width="320" data-height="320" data-attribute="photo" data-preview=""/>
               			 		
               			 		
               			 		<input type="hidden" name="paymentid" id="paymentid" value="<?php print $paymentId;?>" />
               			 		
                			 </td>
                		</tr>
                		<tr>
                			<td>
                				<?php if($payment_info['nazac_renting_payment_prove']=='avarta.png'){?>
									<a onClick="performClick('payment_teller');" id="point">
									<span type="submit" id="continue_to_pay" style="padding: 10px 0px;" class="btn btn-success col-12">Upload Payment Prove</span></a>
               					<?php }else{?>
               			 			<span style="font-size: 18px;" class="text-success"><i class="fa fa-spinner fa-spin fa-3x"></i> ...waiting approval</span>
               			 		<?php }?>	
                			</td>
                		</tr>
                		<tr>
                			<td>
								<div class="alert alert-danger"><i class="fa fa-warning"></i> Ensure you are uploading the currect prove of payment to enable us serve you better!</div>	
                			</td>
                		</tr>
                	</table>
                </form>	
                  </div>
                  
                 
                  
                </div>	
                	
			    </div>
			 </div>
            
			<?php }else{ ?>
				<div class="col-12"><h6 align="center"><img class="img-responsive" src="<?php print base_url();?>resource/img/propertymartGIF.gif"/></h6></div>
			<?php				
				print '<h2>Oops look like this property is no longer available or has been rented!.</h2>';
			}?>   
       
    </div>
   </div>
</section>