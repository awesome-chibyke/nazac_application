	<div id="login">
		<div class="login">
		<center><h2 class="text-success">Login to <br><?php print $siteDetail['site_name'];?></h2></center><br>
		<?php echo validation_errors("<div class='alert alert-danger'>","</div>"); ?>
			<form enctype="multipart/form-data" method="post">
				
				<?php if(isset($_SESSION['success'])){?><div class="alert alert-success"><span class="fa fa-check"></span>&nbsp; <?php print $_SESSION['success'];?></div><?php }?>
				<?php if(isset($_SESSION['error'])){?><div class="alert alert-danger"><span class="fa fa-warning"></span>&nbsp; <?php print $_SESSION['error'];?></div><?php }?>
				
				<div class="divider"><span>Login</span></div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" value="<?php print set_value('email'); ?>" name="email" id="email">
					<i class="icon_mail_alt"></i>
				</div>
				
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="pass" id="pass" value="">
					<i class="icon_lock_alt"></i>
				</div>
				
				<div class="clearfix add_bottom_30">
					<div class="checkboxes float-left">
						<label class=""><input type="checkbox" name="rem" value="1" <?php echo set_checkbox('rem', '1'); ?>> Remember me</label>
					</div>
					<div class="float-right mt-1"><a id="forgot" href="<?php print base_url();?>forgot-password">Forgot Password?</a></div>
				</div>
				
				<button type="submit" name="sub" class="btn_1 rounded full-width">Login to <?php print $siteDetail['site_name'];?></button>
				<div class="text-center add_top_10">New to <?php print $siteDetail['site_name'];?>? <strong><a href="<?php print base_url();?>register">Sign up!</a></strong></div>
			</form>
		</div>
	</div>