
<!-- START SECTION 404 -->
<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url();?>resource/loader/loading_spinner.gif"></span>
	<div id="login">
		<div class="login">
		<center><h2 style="font-size: 23px;" class="text-success">Sign Up To <?php print $siteDetail['site_name'];?></h2>
		<p>Access our services with a free account.</p></center>
			<form autocomplete="off">
				<div class="divider"><span>Sign Up</span></div>
				<div class="form-group">
					<label>Your First Name<span class="text-danger"><strong>*</strong></span></label>
					<input class="form-control" type="text" id="fname" name="fname" value="">
					<i class="ti-user"></i>
				</div>
				<div class="form-group">
					<label>Your Last Name<span class="text-danger"><strong>*</strong></span></label>
					<input class="form-control" type="text" id="lname" name="lname" value="">
					<i class="ti-user"></i>
				</div>
				<div class="form-group">
					<label>Your Email<span class="text-danger"><strong>*</strong></span></label>
					<input class="form-control" type="email" id="email" name="email" value="">
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Gender:<span class="text-danger"><strong>*</strong></span> </label>
					<select name="sex" id="sex" class="form-control">
					<option value="" selected="selected">--Select Sex*--</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					</select>
				</div>
				<div class="form-group">
					<label>Your Phone Number<span class="text-danger"><strong>*</strong></span></label>
					<input class="form-control" type="test" id="phone" name="phone" value="">
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Your password<span class="text-danger"><strong>*</strong></span></label>
					<input class="form-control" type="password" name="pass" id="pass">
					<i class="icon_lock_alt"></i>
				</div>
				<div class="form-group">
					<label>Confirm password<span class="text-danger"><strong>*</strong></span></label>
					<input class="form-control" type="password" name="cpass" id="cpass">
					<i class="icon_lock_alt"></i>
				</div>
				<div class="form-group">
					<label>Account Type<span class="text-danger"><strong>*</strong></span></label><br>
					<?php for($i=0;$i<count($account_type);$i++){?>
					<label><input type="radio" name="ac_type" value="<?php echo $account_type[$i]['acount_type'];?>"> <?php echo ucfirst(strtolower($account_type[$i]['acount_type']));?></label><br>
					<?php }?>
				</div>
				<div id="pass-info" class="clearfix"></div>
				<a href="javascript:void(0);" onClick="register('<?php print base_url();?>')" class="btn_1 rounded full-width add_top_30">Register Now!</a>
				<div class="text-center add_top_10">Already have an acccount? <strong><a href="<?php print base_url();?>login">Sign In</a></strong></div>
			</form>
		</div>
	</div>
	<!-- END SECTION 404 -->