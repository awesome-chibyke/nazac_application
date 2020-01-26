	<section class="headings">
		<div class="text-heading text-center">
			<div class="container">
				<h1>Services</h1>
				<h2><a href="<?php print base_url();?>">Home </a> &nbsp;/&nbsp; Services</h2>
			</div>
		</div>
	</section>
	<!-- END SECTION HEADINGS -->

	<!-- START SECTION SERVICES -->
	<main class="services-2">
		<div class="container">
			<div class="section-title">
				<h3>Our</h3>
				<h2>Services</h2>
			</div>
			<div class="row service-1">
				<article class="col-md-12 serv">
					<div class="art-1 img-1" style="text-align: left !important;">
						<img src="<?php print base_url();?>resource/images/1.png" width="52" alt="">
						<h3> REAL ESTATE</h3>
						<p>The real estate service is mostly on our website, where registered properties can put up their vacancies whenever they turn up in them with every needed detail for potential occupants to view, inspect and make payment from any where. Also has a feature that aids in finding of roommate in any location for those with or without an already apartment seeking to pair up with another and share rent/lease and buying of properties.</p>
						
					</div>
				</article>
				<article class="col-md-12 serv" style="margin-top: 20px;">
					<div class="art-1 img-2" style="text-align: left !important;">
						<img src="<?php print base_url();?>resource/images/2.png" width="52" alt="">
						<h3> PRODUCTS AND SERVICE ORDERY</h3>
						<p>This is a mobile application that connect users to local businesses, make orders for deliveries ranging food delivery, gas delivery, and any other necessary deliveries. Simply a medium to everything that would make their lives easy. To gain access to this features, your account much be assigned an RIN with which the users will sign up with.</p>
					</div>
				</article>
				<article class="col-md-12 serv" style="margin-top: 20px;">
					<div class="art-1 img-2" style="text-align: left !important;">
						<img src="<?php print base_url();?>resource/images/4.png" width="52" alt="">
						<h3>WASTE MANAGEMENT</h3>
						<p> In the waste management services we offer the registered properties (strictly registered properties) a service of supplying them our waste nylon sheets, the size of eswama size, and coming with our company vehicle every once in a week to pick them at your doorstep, tied, and take them to the nearest eswama dumpsite to dispose them. But there is a catch, they will have to buy the our trash nylon at the cost of #50 per bag. The purchase and ordering of the waste nylons would be at some point integrated into the website and app.</p>
						<p>We have a system that we use to conduct our services to a door to door service, it assigns a combinaion of numbers (RIN) to every apartment in every property registered under us and those numbers to every user account that pays rent for the apartment.</p>
					</div>
				</article>
				<article class="col-md-12 serv" style="margin-top: 20px;">
					<div class="art-1 img-3" style="text-align: left !important;">
						<img src="<?php print base_url();?>resource/images/3.png" width="52" alt="">
						<h3>Finding A Roommate</h3>
						<p>In this feature we offer our users a free medium to link up with the roommates of their choice. There are three options; you can either </p>
						<ul>
							<li style="list-style: none;"><i style="font-size: 29px;" class="fa fa-check fa-2x text-success"></i> List your room so potential roommates can find you by the details of the apartment and their preferred roommate description and contact you.</li>
							<li style="list-style: none;"> <i style="font-size: 29px;" class="fa fa-check fa-2x text-success"></i> Find roommates with existing apartments looking for roommates to join them</li>
							<li style="list-style: none;"> <i style="font-size: 29px;" class="fa fa-check fa-2x text-success"></i> Pair with a roommate to find an apartment together.</li>
						</ul>
						 <?php if(!isset($_SESSION['_nazlogger'])){?>
                            <a class="text-base text-base-dark-hover text-size-13"  href="javascript:;" onclick="startFindRoomy_2()">Try Out <i class="fa fa-long-arrow-right"></i></a>
                            <?php } ?>
                            
                            <?php if(isset($_SESSION['_nazlogger'])&&!empty($_SESSION['_nazlogger'])){?>
                            <a class="text-base text-base-dark-hover text-size-13"  href="javascript:;" onclick="startFindRoomy()">Try Out <i class="fa fa-long-arrow-right"></i></a>
                            <?php } ?>
					</div>
				</article>
			</div>
		</div>
	</main>
	<!-- END SECTION SERVICES -->