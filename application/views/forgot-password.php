<body class="inner-pages">
	<div id="login">
		<div class="login">
		<center><h2 class="text-success">Forgot your Password?</h2>
		<p>Please enter your email address and we'll send you a link to reset your password.</p></center><br>
		<?php echo validation_errors("<div class='alert alert-danger'>","</div>"); ?>
		
			<form enctype="multipart/form-data" method="post">
			<?php if(isset($_SESSION['success'])){?><div class="alert alert-success"><span class="fa fa-check"></span>&nbsp; <?php print $_SESSION['success'];?></div><?php }?>
				<?php if(isset($_SESSION['error'])){?><div class="alert alert-danger"><span class="fa fa-warning"></span>&nbsp; <?php print $_SESSION['error'];?></div><?php }?>
				
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" id="email">
					<i class="icon_mail_alt"></i>
				</div>
				
				<button class="btn_1 rounded full-width" type="submit">Reset Password</button>
				<div class="text-center add_top_10">Remember your password? <strong><a href="<?php print base_url();?>login">Back to Login</a></strong></div>
			</form>
		</div>
	</div>