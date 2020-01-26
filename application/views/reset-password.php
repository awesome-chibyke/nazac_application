<body class="inner-pages">
	<div id="login">
		<div class="login">
		<center><h2 class="text-success"><?php print $siteDetail['site_name'];?> Reset Password </h2></center><br>
		<?php if(isset($diepage)){?>
			<div class="alert alert-danger"><?php print $diepage;?></div>
		<?php }else{?>
		<?php echo validation_errors("<div class='alert alert-danger'>","</div>"); ?>
			<form enctype="multipart/form-data" method="post">
				
				<?php if(isset($_SESSION['success'])){?><div class="alert alert-success"><span class="fa fa-check"></span>&nbsp; <?php print $_SESSION['success'];?></div><?php }?>
				<?php if(isset($_SESSION['error'])){?><div class="alert alert-danger"><span class="fa fa-warning"></span>&nbsp; <?php print $_SESSION['error'];?></div><?php }?>
				
				<div class="divider"><span>Reset Password</span></div>
				<div class="form-group">
					<label>New Password</label>
					<input type="password" class="form-control" value="" name="pass" id="pass">
					<i class="icon_mail_alt"></i>
				</div>
				
				<div class="form-group">
					<label>Confrim New Password</label>
					<input type="password" class="form-control" name="cpass" id="cpass" value="">
					<i class="icon_lock_alt"></i>
				</div>
				
				<div class="clearfix add_bottom_30">
				</div>
				
				<button type="submit" name="sub" class="btn_1 rounded full-width">Reset Password</button>
				<div class="text-center add_top_10"> <strong><a href="<?php print base_url();?>">Home</a></strong></div>
			</form>
			<?php }?>
		</div>
	</div>