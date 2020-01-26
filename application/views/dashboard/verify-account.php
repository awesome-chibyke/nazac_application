	<?php if($user_data['nazac_client_account_verification']=='yes'){
			$disable = 'disabled';
			$id_type = $user_data['nazac_client_verification_document'];
			$text = 'Account Verified';
		  }else{
			$disable = '';
			$text = 'Verify Account';
		  }
?>
	<section class="properties-right list featured portfolio blog" style="padding: 30px 0;">
		<div class="container">
			<div class="row">
			<div class="col-lg-12">
				<div></div>
			</div>
				<aside class="col-lg-4 col-md-12 car">
					<div class="widget">
						<div class="section-heading  profile_set">
							<div class="media">
								<div class="media-left">
									<i class="fa fa-home"></i>
								</div>
								<div class="media-body">
									<h5>Account Verification</h5>
									<div class="border"></div>
									<p></p>
								</div>
							</div><br>
							<?php if(isset($id_type)&&!empty($id_type)){}else{?>
							<?php if($user_data['nazac_client_account_verification']=='no'){?>
							<div class="alert alert-success">
								Document uploaded will appear here!
							</div>
							<?php }}?>
							
							<?php if(isset($id_type)&&!empty($id_type)&&$id_type=='student_id'){?>
							<div  id="oldstudent" class="oldstudent">
							 
								<div class="col-12">
								<?php if($user_data['nazac_client_account_verification']=='no'){?>
								<div class="button-shower">Upload Student ID</div>
								<?php }?>
								<?php if($user_data['nazac_client_account_verification']=='no'){?>
									<a onClick="performClick('theFile');" id="point">
								<?php }?>
									<div class="front-id-card">
										<img class="img-responsive" src="<?php print base_url();?>resource/docupload/<?php print $user_data['nazac_client_verification_front_id'];?>" />
										<span class="top-place-id">Front ID</span>
										<?php if($user_data['nazac_client_account_verification']=='no'){?>
										<span>Click to Upload</span>
										<?php }?>
									</div>
								<?php if($user_data['nazac_client_account_verification']=='no'){?>
									</a>
									<?php }?>
									<input class="hiddens cropper-source" id="theFile" type="file" data-handler="" data-width="320" data-height="320" data-attribute="photo" data-preview=""/>
									
								<?php if($user_data['nazac_client_account_verification']=='no'){?>
									<a onClick="performClick('theFile2');" id="point">
								<?php }?>
									<div class="back-id-card">
										<img class="img-responsive" src="<?php print base_url();?>resource/docupload/<?php print $user_data['nazac_client_verification_back_id'];?>" />
										<span class="top-place-id">Back ID</span>
										<?php if($user_data['nazac_client_account_verification']=='no'){?>
										<span>Click to Upload</span>
										<?php }?>
									</div>
								<?php if($user_data['nazac_client_account_verification']=='no'){?>
									</a>
								<?php }?>
								  </div>
								<input class="hiddens cropper-source" id="theFile2" type="file" data-handler="" data-width="320" data-height="320" data-attribute="photo" data-preview=""/>
							</div>
							<?php }?>
							
							<?php if(isset($id_type)&&!empty($id_type)&&$id_type=='admission_proof'){?>
							<div id="newstudent" class="newstudent">
								<div  class="col-12">
									<div class="button-shower">Upload Admission Proof</div>
									
									<?php if($user_data['nazac_client_account_verification']=='no'){?>
									<a onClick="performClick('theFile3');" id="point">
									<?php }?>
									<div id="proveid" class="back-id-card">
										<img class="img-responsive" src="<?php print base_url();?>resource/docupload/<?php print $user_data['nazac_client_admission_proof'];?>" />
										<span class="top-place-id">Admission Prooof</span><br>
										<?php if($user_data['nazac_client_account_verification']=='no'){?>
										<span>Click to Upload</span>
										<?php }?>
									</div>
									<?php if($user_data['nazac_client_account_verification']=='no'){?>
									</a>
									<?php }?>
									
									<input class="hiddens cropper-source" id="theFile3" type="file" data-handler="" data-width="320" data-height="320" data-attribute="photo" data-preview=""/>
								  </div>
							</div>
							<?php }?>
							
							
							
							
							
						</div>
					</div>
				</aside>
			
				<div class="col-lg-8 col-md-12 blog-pots">
				 <div class="profile_set">
					<!-- Block heading Start-->
					<?php if($user_data['nazac_client_account_verification']=='no'){?>
					<?php if($user_data['nazac_client_role']=='student'){?>
					<div class="alert alert-danger">
						<i class="fa fa-warning fa-2x"></i> Your account need to be verified to gain full access to this platform! <a href="<?php print base_url();?>member/verify-account">Verify Account Now!!</a>
					</div>
					<?php }?>
					<?php }?>
					
					<div class="block-heading">
						<div class="col-lg-12">
								<h4>
                                <span style="background: none;" class="heading-icon2">
                                <img src="<?php print base_url();?>resource/img/verify.png" />
                                </span>
                                <span><?php print $text;?></span>
                            </h4>
							</div>
					</div>
					<!-- Block heading end -->
				
			   <div id="row">
			   		<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url();?>resource/loader/loading_spinner.gif"></span>
					<form autocomplete="off">
						<div class="form-group">
							<label>Select Verification Type:* </label>
							<?php $doc_typ = $user_data['nazac_client_verification_document'];
								if(isset($id_type)&&!empty($id_type)){
									$doc_typ = $id_type;
								}
							?>
							<select <?php print @$disable;?> name="doc_verify_type" id="doc_verify_type" class="form-control">
							<option value="" selected="selected">--Select Verification Type*--</option>
							<?php if($user_data['nazac_client_role']=='student'){?>
							<option <?php if($doc_typ=='student_id'){ print 'selected="selected"';}?> value="student_id">Student ID Card</option>
							<option <?php if($doc_typ=='admission_proof'){ print 'selected="selected"';}?> value="admission_proof">Proof Of Admission</option>
							<?php }?>
							
							</select>
							<input id="hashPot" type="hidden" value="<?php print $user_data['nazac_clients_hashpost'];?>">
							<input id="baseurl" type="hidden" value="<?php print base_url();?>">
						</div>
						<div class="form-group">
							<label>Account Name<span class="text-danger"><strong>*</strong></span> .eg(Resident Address/Lodge Address)</label>
							<input class="form-control" type="text" id="acname" name="acname" value="<?php print $user_data['nazac_client_verification_ac_name'];?>">
							<i class="ti-user"></i>
						</div>
						<div class="form-group">
							<label>Account Number<span class="text-danger"><strong>*</strong></span></label>
							<input class="form-control" type="number" id="acno" name="acno" value="<?php print $user_data['nazac_client_verification_ac_nom'];?>">
							<i class="ti-user"></i>
						</div>
						<div class="form-group">
							<label>Bank Name<span class="text-danger"><strong>*</strong></span></label>
							<input class="form-control" type="text" id="bank" name="bank" value="<?php print $user_data['nazac_client_verification_bank_name'];?>">
							<i class="icon_mail_alt"></i>
						</div>
						<div id="pass-info" class="clearfix"></div>
							<a href="javascript:void(0);" onClick="verifyAccount('<?php print base_url();?>')" class="btn_1 rounded full-width add_top_30">Verify Now!</a>
						
				   </form>
				</div>
			 </div>	
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