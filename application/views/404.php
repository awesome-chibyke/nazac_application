<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="html 5 template">
	<meta name="author" content="">
	<title>Error 404</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php print base_url();?>resource/icon/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
	<link rel="stylesheet" href="<?php print base_url();?>resource/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php print base_url();?>resource/css/animate.css">
	<link rel="stylesheet" href="<?php print base_url();?>resource/css/bootstrap.css">
	<link rel="stylesheet" href="<?php print base_url();?>resource/css/styles.css">
	<link rel="stylesheet" id="color" href="<?php print base_url();?>resource/css/default.css">
</head>

<body class="inner-pages">
	<div class="header">
		<div class="header-top">
			<div class="container">
				<div class="top-info hidden-sm-down">
					<div class="call-header">
						<p><i class="fa fa-phone" aria-hidden="true"></i> <?php print $siteDetail['phone1'];?></p>
					</div>
					<div class="address-header">
						<p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php print $siteDetail['address'];?></p>
					</div>
					<div class="mail-header">
						<p><i class="fa fa-envelope" aria-hidden="true"></i> <?php print $siteDetail['email1'];?></p>
					</div>
				</div>
				<div class="top-social hidden-sm-down">
					<div class="login-wrap">
						<ul class="d-flex">
							<?php if(isset($_SESSION['_nazlogger'])&&!empty($_SESSION['_nazlogger'])){?>
							<li><a href="<?php print base_url();?>users/endsession/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
							<?php }else{?>
							<li><a href="<?php print base_url();?>login"><i class="fa fa-user"></i> Login</a></li>
							<li><a href="<?php print base_url();?>register"><i class="fa fa-sign-in"></i> Register</a></li>
							<?php }?>
						</ul>
					</div>
					<div class="social-icons-header">
						<div class="social-icons">
							<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
     </div>
	<!-- START SECTION 404 -->
	<section class="notfound">
		<div class="container">
			<div class="top-headings">
				<h2 class="h3 text-center font-weight-bold">404</h2>
				<h3 class="text-center">Page Not Found!</h3>
				<p class="text-center">Oops! Looks Like Something Going Wrong We can’t seem to find the page you’re looking for make sure that you have typed the currect URL</p>
			</div>
			<div class="port-info">
				<a href="<?php print base_url();?>" class="btn btn-primary btn-lg">Go To Home</a>
			</div>
		</div>
	</section>
	<!-- END SECTION 404 -->
	<footer class="first-footer">
		<div class="second-footer">
			<div class="container">
				<p><?php $d=date('Y'); print $d;?> © Copyright <?php print $siteDetail['site_name'];?> - All Rights Reserved.</p>
				<p>Developed <i class="fa fa-label" aria-hidden="true"></i> By <a href="https://techocraft.com" target="_blank" style="color: yellow;">Techo Craft</a></p>
			</div>
		</div>
	</footer>
</body>
</html>