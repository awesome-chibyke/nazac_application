	<section class="properties-right list featured portfolio blog" style="padding: 30px 0;">
		<div class="container">
			<div class="row">
			<div class="col-lg-12">
				<div></div>
			</div>
				<aside class="col-lg-4 col-md-12 car ">
					<div class="widget boder_p">
						<div class="section-heading  profile_set ">
							<div class="media">
								<div class="media-left">
									<i class="fa fa-home"></i>
								</div>
								<div class="media-body">
									<h5>My Profile</h5>
									<div class="border"></div>
									<p></p>
								</div>
							</div><br>
						
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
									
									<p class="_nazac_setName"><span class="text-success"><strong>Joined:</strong> </span> <?php print @$user_data['nazac_date_account_created'];?></p>
									
									<p class="_nazac_setName"><span class="text-success"><strong>Last Update:</strong> </span> <?php print @$user_data['nazac_account_last_update'];?> </p>
									<input style="visibility:hidden; width:0px; margin-right:2px;" value="" name="file" type="file" id="theFiles" />
									<input value="<?php print base_url();?>" id="baseurl" type="hidden" name="baseurl" />
									<input id="id" value="<?php print $user_data['nazac_id'];?>" type="hidden" name="id" />
									<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url();?>resource/loader/loading_spinner.gif"></span>
								  </div>
								<br />
							</div>
							
							
						</div>
					</div>
				</aside>
			
				<div class="col-lg-8 col-md-12 blog-pots ">
				 <div class="profile_set boder_p">
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
							<span class="set-fot">Update Account Data</span>
							</h4>
						</div>
					</div>
					<!-- Block heading end -->
				
			   <div id="row">
					<?php echo validation_errors("<div class='alert alert-danger'>","</div>"); ?>
					<form enctype="multipart/form-data" method="post">
						<?php if(isset($_SESSION['success'])){?><div class="alert alert-success"><span class="fa fa-check"></span>&nbsp; <?php print $_SESSION['success'];?></div><?php }?>
						<?php if(isset($_SESSION['error'])){?><div class="alert alert-danger"><span class="fa fa-warning"></span>&nbsp; <?php print $_SESSION['error'];?></div><?php }?>
					
						<h3 class="diver-hers">Personal Details</h3>
						<div class="form-group">
							<label>First Name:<span class="text-danger"><strong>*</strong></span> </label>
							<input class="form-control" type="text" id="fname" name="fname" value="<?php print $user_data['nazac_clients_fname'];?>">
							<i class="ti-user"></i>
						</div>
						<div class="form-group">
							<label>Last Name:<span class="text-danger"><strong>*</strong></span> </label>
							<input class="form-control" type="text" id="lname" name="lname" value="<?php print $user_data['nazac_clients_lname'];?>">
							<i class="ti-user"></i>
						</div>
						<div class="form-group">
						<?php $gender = $user_data['nazac_client_gender'];?>
							<label>Gender:<span class="text-danger"><strong>*</strong></span> </label>
							<select name="sex" id="sex" class="form-control">
								<option value="" selected="selected">--Select Sex*--</option>
								<option <?php if($gender=='Male') print 'selected="selected"';?> value="Male">Male</option>
								<option <?php if($gender=='Female') print 'selected="selected"';?> value="Female">Female</option>
							</select>
						</div>
						<h3 class="diver-hers">Contact Details</h3>
						<div class="form-group">
							<label>Email Address:<span class="text-danger"><strong>*</strong></span> </label>
							<input disabled class="form-control" type="email" id="email" name="email" value="<?php print $user_data['nazac_client_email'];?>">
							<i class="ti-user"></i>
						</div>
						<div class="form-group">
							<label>Phone Number: (eg: <?php print $siteDetail['phone1'];?>, 08034xxxxxx)<span class="text-danger"><strong>*</strong></span> </label>
							<input class="form-control" type="text" id="phone" name="phone" value="<?php print $user_data['nazac_client_phone'];?>">
							<i class="ti-user"></i>
						</div>
						<div class="form-group">
							<label>WhatsApp Number: (eg: <?php print $siteDetail['phone1'];?>)<span class="text-danger"><strong></strong></span> </label>
							<input class="form-control" type="text" id="wapp" name="wapp" value="<?php print $user_data['nazac_client_whatsapp_number'];?>">
							<i class="ti-user"></i>
						</div>
						
						<div class="form-group">
							<label>Facebook Handle: (eg: https://facebook.com/<?php print $siteDetail['site_name'];?>)<span class="text-danger"><strong></strong></span> </label>
							<input class="form-control" type="text" id="fb" name="fb" value="<?php print $user_data['nazac_client_facebook_handel'];?>">
							<i class="ti-user"></i>
						</div>
						
						<div class="form-group">
							<label>Twitter Handle: (eg: https://twitter.com/<?php print $siteDetail['site_name'];?>)<span class="text-danger"><strong></strong></span> </label>
							<input class="form-control" type="text" id="tw" name="tw" value="<?php print $user_data['nazac_client_twitter_handel'];?>">
							<i class="ti-user"></i>
						</div>
						
						<div class="form-group">
							<label>Instagram Handle: (eg: https://instagram.com/<?php print $siteDetail['site_name'];?>)<span class="text-danger"><strong></strong></span> </label>
							<input class="form-control" type="text" id="ig" name="ig" value="<?php print $user_data['nazac_client_instagram_handel'];?>">
							<i class="ti-user"></i>
						</div>
						
						<div class="form-group">
							<label>Residential Address:<span class="text-danger"><strong>*</strong></span> </label>
							<input class="form-control" type="text" id="address" name="address" value="<?php print $user_data['nazac_client_home_address'];?>">
							<i class="ti-user"></i>
						</div>
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group">
									<label>Nationality: <span class="text-danger"><strong>*</strong></span></label>
									<input class="form-control" type="text" id="nationality" name="nationality" value="<?php print $user_data['nazac_client_nationality'];?>">
									<i class="ti-user"></i>
							   </div>
						   </div>
						   <div class="col-lg-4">
							   <div class="form-group">
									<label>State Of Origin: <span class="text-danger"><strong>*</strong></span></label>
									<input class="form-control" type="text" id="state" name="state" value="<?php print $user_data['nazac_client_state_of_origin'];?>">
									<i class="ti-user"></i>
							   </div>
						   </div>
						   <div class="col-lg-4">
							   <div class="form-group">
									<label>Local Government: <span class="text-danger"><strong>*</strong></span></label>
									<input class="form-control" type="text" id="lg" name="lg" value="<?php print $user_data['nazac_client_lga'];?>">
									<i class="ti-user"></i>
							   </div>
						   </div>
						</div>
						
						<?php if($user_data['nazac_client_role']=='student'){?>
						<h3 class="diver-hers">School Details</h3>
						<div class="form-group">
							<label>Registration Number:<span class="text-danger"><strong></strong></span> </label>
							<input class="form-control" type="text" id="regno" name="regno" value="<?php print $user_data['nazac_clients_regno'];?>">
							<i class="ti-user"></i>
						</div>
						
						<div class="form-group">
							<label>Faculty:<span class="text-danger"><strong></strong></span> </label>
							<?php $facl = $user_data['nazac_client_faculty'];
								  $faclt	= $this->dbmodel->returnSingleData('faculty_table','unique_id',$facl,'faculty_name');?>
							<select class="form-control selctBg" name="faculty" id="faculty">
								<option value="" selected="selected">--Faculty--</option>
								<?php for($i=0;$i<count($faculty);$i++){?>
								<option <?php if($faclt==$faculty[$i]['faculty_name']) print 'selected="selected"';?> value="<?php echo $faculty[$i]['unique_id'];?>"><?php echo ucfirst($faculty[$i]['faculty_name']);?></option>
								<?php }?>
							</select>
							<i class="ti-user"></i>
						</div>
						
						<div class="form-group">
							<label>Department:<span class="text-danger"><strong></strong></span> </label>
							<?php $dptt = $user_data['nazac_client_department'];
								  $dpt	= $this->dbmodel->returnSingleData('department_table','unique_id',$dptt,'department_name');?>
							<select class="form-control selctBg" name="dept" id="dept">
								<option value="" selected="selected">--Department--</option>
								<?php for($i=0;$i<count($departments);$i++){?>
								<option <?php if($dpt==$departments[$i]['department_name']) print 'selected="selected"';?> value="<?php echo $departments[$i]['unique_id'];?>"><?php echo ucfirst($departments[$i]['department_name']);?></option>
								<?php }?>
							</select>
							<i class="ti-user"></i>
						</div>
						
						
						
						
						
						<h3 style="display: none;" class="diver-hers">Kins/Guardians Details</h3>
						<div style="display: none;" class="form-group">
						<?php $relationship = $user_data['nazac_client_kins_relationship'];?>
							<label>Relationship: </label>
							<select name="krelationship" id="krelationship" class="form-control">
								<option value="" selected="selected">--Select Sex*--</option>
								<option <?php if($relationship=='parent') print 'selected="selected"';?> value="parent">Parent</option>
								<option <?php if($relationship=='others') print 'selected="selected"';?> value="others">Others</option>
							</select>
						</div>
						
						<div style="display: none;" class="form-group">
							<label>Kins Full Name:<span class="text-danger"><strong>*</strong></span> </label>
							<input class="form-control" type="text" id="kname" name="kname" value="<?php print $user_data['nazac_client_kins_name'];?>">
							<i class="ti-user"></i>
						</div>
						
						<div style="display: none;" class="form-group">
							<label>Kins Email Address:<span class="text-danger"><strong>*</strong></span> </label>
							<input class="form-control" type="email" id="kemail" name="kemail" value="<?php print $user_data['nazac_client_kins_email'];?>">
							<i class="ti-user"></i>
						</div>
						<div style="display: none;" class="form-group">
							<label>Kins Phone Number:<span class="text-danger"><strong>*</strong></span> </label>
							<input class="form-control" type="text" id="kphone" name="kphone" value="<?php print $user_data['nazac_client_kins_phone'];?>">
							<i class="ti-user"></i>
						</div>
						<div style="display: none;" class="form-group">
							<label>Kins Residential Address:<span class="text-danger"><strong>*</strong></span> </label>
							<input class="form-control" type="text" id="kaddress" name="kaddress" value="<?php print $user_data['nazac_client_kins_address'];?>">
							<i class="ti-user"></i>
						</div>
						
						<?php }else{?>
						<input type="hidden" id="regno" name="regno" value="<?php print $user_data['nazac_clients_regno'];?>">
						<input type="hidden" id="dept" name="dept" value="<?php print $user_data['nazac_client_department'];?>">
						<input type="hidden" id="krelationship" name="krelationship" value="<?php print $user_data['nazac_client_kins_relationship'];?>">
						<input type="hidden" id="kname" name="kname" value="<?php print $user_data['nazac_client_kins_name'];?>">
						<input type="hidden" id="kemail" name="kemail" value="<?php print $user_data['nazac_client_kins_email'];?>">
						<input type="hidden" id="kphone" name="kphone" value="<?php print $user_data['nazac_client_kins_phone'];?>">
						<input type="hidden" id="kaddress" name="kaddress" value="<?php print $user_data['nazac_client_kins_address'];?>">
						<?php }?>
						
						<?php if($user_data['nazac_client_role']=='agent'){?>
						<div class="form-group">
							<label>Tell people about your work/self as an agent/:<span class="text-danger"><strong></strong></span> </label>
							<textarea class="form-control" type="text" id="agentdes" name="agentdes"><?php print $user_data['nazac_agents_description'];?></textarea>
							<i class="ti-user"></i>
						</div>
						
						<?php }else{?>
							<input type="hidden" id="agentdes" name="agentdes" value="<?php print $user_data['nazac_agents_description'];?>">
						<?php }?>
						<div class="form-group">
						<?php $role = $user_data['nazac_client_role'];?>
							<label>Account Type:<span class="text-danger"><strong>*</strong></span></label><br>
							<?php for($i=0;$i<count($account_type);$i++){?>
							<label><input disabled <?php if($role==$account_type[$i]['acount_type']){print 'checked';}?> type="radio" name="ac_type" value="<?php echo $account_type[$i]['acount_type'];?>"> <?php echo ucfirst(strtolower($account_type[$i]['acount_type']));?></label><br>
							<?php }?>
						</div>
						<div id="pass-info" class="clearfix"></div>
						<button type="submit" name="sub" class="btn_1 rounded btn_1_full-width btn btn-success">Update Account!</button>
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