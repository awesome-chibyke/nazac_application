	<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url();?>resource/loader/loading_spinner.gif"></span>
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
									<h5>Update Password</h5>
									<div class="border"></div>
									<p></p>
								</div>
							</div><br>
						
							<div class="media">
								<div class="col-12">
									 <div class="avatar-upload">
										<div data-toggle="tooltip" title="Click to edit" class="avatar-edit">
											<label  id="pointer" for="imageUpload"><i onClick="performClick('theFile')" class="fa fa-pencil fa-2x"></i></label>
										</div>
										<div data-toggle="tooltip" title="<?php print @$user_data['nazac_clients_fname'].' '.$user_data['nazac_clients_lname'];?>" class="avatar-preview">
											<div id="imagePreview">
											<img id="pp" class="img-responsive" src="<?php print base_url();?>resource/upload/<?php print $user_data['nazac_client_passport']?>" alt="<?php print @$user_data['nazac_clients_fname'].' '.$user_data['nazac_clients_lname'];?>">
											</div>
										</div>
									</div>
									<p class="setNameShow2"><span class="text-success"><strong>NN:</strong> </span> <?php print $user_data['nazac_id'];?></p>
									
									<input style="visibility:hidden; width:0px; margin-right:2px;" value="" name="file" type="file" id="theFile" />
									<input value="<?php print base_url();?>" id="baseurl" type="hidden" name="baseurl" />
									<input id="id" value="<?php print $user_data['nazac_id'];?>" type="hidden" name="id" />
								  </div>
								
							</div>
							
							
						</div>
					</div>
				</aside>
			
				<div class="col-lg-8 col-md-12 blog-pots">
				 <div class="profile_set">
					<!-- Block heading Start-->
					
					<div class="block-heading">
						<div class="col-lg-12">
							<h4>
							<span style="background: none;" class="heading-icon2">
							<img src="<?php print base_url();?>resource/img/verify.png" />
							</span>
							<span class="set-fot">Update Password</span>
							</h4>
						</div>
					</div>
					<!-- Block heading end -->
				
			   <div id="row">
					<form autocomplete="off">
						<div class="form-group">
							<label>Old Password:<span class="text-danger"><strong>*</strong></span> </label>
							<input class="form-control" type="text" id="oldpass" name="oldpass" value="<?php ?>">
							<i class="ti-user"></i>
						</div>
						<div class="form-group">
							<label>New Password:<span class="text-danger"><strong>*</strong></span> </label>
							<input class="form-control" type="text" id="newpass" name="newpass" value="">
							<i class="ti-user"></i>
						</div>
						<div class="form-group">
							<label>Confirm New Password:<span class="text-danger"><strong>*</strong></span> </label>
							<input class="form-control" type="text" id="cnewpass" name="cnewpass" value="">
							<i class="ti-user"></i>
						</div>
						<input type="hidden" id="userid" value="<?php print $user_data['nazac_id'];?>">
						<div id="pass-info" class="clearfix"></div>
						<a id="change_password" href="javascript:void(0);"  class="btn_1 rounded full-width add_top_30">Update Account!</a>
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