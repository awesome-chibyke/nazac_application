<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url();?>resource/loader/loading_spinner.gif"></span>	
<section class="headings">
		<div class="text-heading text-center">
			<div class="container">
				<h1>Contact Us</h1>
				<h2><a href="<?php print base_url();?>">Home </a> &nbsp;/&nbsp; Contact Us</h2>
			</div>
		</div>
	</section>
	<!-- END SECTION HEADINGS -->

	<!-- START SECTION CONTACT US -->
	<section class="contact-us" style="margin-top: -30px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<h3 class="mb-4">Contact Us</h3>
				<!--<form id="contactform" class="contact-form" name="contactform" method="post" novalidate>-->
						<div id="success" class="successform">
							<p class="alert alert-success font-weight-bold" role="alert">Your message was sent successfully!</p>
						</div>
						<div id="error" class="errorform">
							<p>Something went wrong, try refreshing and submitting the form again.</p>
						</div>
						<div class="form-group">
							<input id="name" type="text" required class="form-control input-custom input-full" name="name" placeholder="Ful Name">
						</div>
						<div class="form-group">
							<input id="phone" type="text" required class="form-control input-custom input-full" name="phone" placeholder="Phone Number">
						</div>
						<div class="form-group">
							<input id="email" type="text" class="form-control input-custom input-full" name="email" placeholder="Email">
						</div>
						<div class="form-group">
							<textarea class="form-control textarea-custom input-full" id="message" name="message" required rows="8" placeholder="Message"></textarea>
						</div>
						<button type="submit" id="contact" class="btn btn-primary btn-lg">Submit</button>
					<!--</form>-->
				</div>
				<div class="col-lg-4 col-md-12 bgc">
					<div class="call-info">
						<h3>Contact Details</h3>
						<p class="mb-5">Please find below contact details and contact us today!</p>
						<ul>
							<li>
								<div class="info">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
									<p class="in-p"><?php print $siteDetail['address'];?></p>
								</div>
							</li>
							<li>
								<div class="info">
									<i class="fa fa-phone" aria-hidden="true"></i>
									<p class="in-p"><?php print $siteDetail['phone1'].', '.$siteDetail['phone2'];?></p>
								</div>
							</li>
							<li>
								<div class="info">
									<i class="fa fa-envelope" aria-hidden="true"></i>
									<p class="in-p ti"><?php print $siteDetail['email3']?></p>
								</div>
							</li>
							<li>
								<div class="info cll">
									<i class="fa fa-clock-o" aria-hidden="true"></i>
									<p class="in-p ti">8:00 a.m - 9:00 p.m</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END SECTION CONTACT US -->
