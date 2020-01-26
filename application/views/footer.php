<!-- START FOOTER -->
	<footer class="first-footer">
		<div class="top-footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="netabout">
							<a href="<?php print base_url();?>" class="logo">
								<img src="<?php print base_url();?>resource/img/forsale.png" alt="<?php print $siteDetail['site_name'];?>">
							</a>
							<p>We are basically a property management company that aims at aiding and solving the real estate needs of people living in specific areas.</p>
							<a href="<?php print base_url();?>about" class="btn btn-secondary">Read More...</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="navigation">
							<h3>Navigation</h3>
							<div class="nav-footer">
								<ul>
									<li><a href="<?php print base_url();?>">Home </a></li>
									<li><a href="<?php print base_url();?>users/user/property-listing">Properties Listing</a></li>
									<li><a href="<?php print base_url();?>users/user/property-listing">Properties List</a></li>
									<li><a href="<?php print base_url();?>agents">Agents Listing</a></li>
									<li class="no-mgb"><a href="<?php print base_url();?>policy">Terms & Policy</a></li>
								</ul>
								<ul class="nav-right">
									<li><a href="<?php print base_url();?>agents">Agents</a></li>
									<li><a href="<?php print base_url();?>about">About Us</a></li>
									<li><a href="<?php print base_url();?>news">News</a></li>
									<li><a href="<?php print base_url();?>faq">Faqs</a></li>
									<li class="no-mgb"><a href="<?php print base_url();?>contact">Contact Us</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="widget">
							<h3>Twitter Feeds</h3>
							<div class="twitter-widget contuct">
								<div class="twitter-area">
								<a class="twitter-timeline" data-height="250" data-theme="dark" href="https://twitter.com/Nazacmanagement?ref_src=twsrc%5Etfw">Tweets by <?php print $siteDetail['site_name'];?></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
								</div> 
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="contactus">
							<h3>Contact Us</h3>
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
										<p class="in-p"><?php print $siteDetail['phone1'];?></p>
									</div>
								</li>
								<li>
									<div class="info">
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<p class="in-p ti"><?php print $siteDetail['email1'];?></p>
									</div>
								</li>
							</ul>
						</div>
						<ul class="netsocials">
							<li><a href="<?php print $siteDetail['facebook'];?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="<?php print $siteDetail['twitter'];?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="<?php print $siteDetail['instagram'];?>"><i class="fa fa-instagram text-success" aria-hidden="true"></i></a></li>
							<li><a href="<?php print $siteDetail['youtube'];?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="second-footer">
			<div class="container">
				<p><?php $d=date('Y'); print $d;?> © Copyright <?php print $siteDetail['site_name'];?> - All Rights Reserved.</p>
				<p><a href="<?php print base_url();?>policy">Terms & Policy</a> | Developed <i class="fa fa-label" aria-hidden="true"></i>  By <a href="https://techocraft.com" target="_blank" style="color: yellow;">Techo Craft</a></p>
			</div>
		</div>
		
		
		
		<!-- Modal -->
          <div style="z-index: 100000;" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModedreviews" class="modal fade">
		              <div class="modal-dialog modal-lg">
		                  <div class="modal-content">
		                      <div class="modal-header south-color">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 id="tst" class="modal-title"><img src="<?php print base_url('resource/img/review.png');?>" />Tell us your general view about <?php print $siteDetail['site_name'];?> and our services.</h4>
		                      </div>
							  <div class="modal-body col-lg-12">
								   <div class="row">
									 <div class="col-lg-12 margin-30">
										<div class="row">
										 <div class="col-lg-12">
											<div class="form-group">
												<textarea class="form-control" type="text" id="review" name="review"></textarea>
											</div>
										</div>
									   </div>
										
									 </div>
		          				</div> 
		                     </div>
		                     <div class="modal-footer">
							  <button  data-dismiss="modal" class="btn btn-success fa fa-eject" type="submit" value=""> Cancel</button>
	                          <button onClick="client_reviewing();" id="client_reviewing" name="client_review" class="btn btn-primary fa fa-send">Post</button>
		                     </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		
		
	</footer>
	<a data-scroll href="#heading" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
	<input type="hidden" id="baseurl" value="<?php print base_url();?>">
	<input id="nazac_uid" value="<?php print $user_data['nazac_id'];?>" type="hidden" name="nazac_uid" />
	<!-- END FOOTER -->