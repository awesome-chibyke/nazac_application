<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; <?php print $d = date('Y'); print $d;?>. Copyright  <a href="<?php print base_url();?>"><?php print $siteDetail['site_name'];?></a> by <a href="https://techocraft.com" target="_blank">Techo Craft</a>
					</span>

					<ul class="navbar-nav ml-lg-auto">
					
						<li class="nav-item"><a href="<?php print base_url();?>policy" class="navbar-nav-link" ><i class="icon-lifebuoy mr-2"></i> Policy</a></li>
						
						<li class="nav-item"><a href="<?php print base_url();?>contact" class="navbar-nav-link" ><i class="icon-file-text2 mr-2"></i> Support</a></li>
						
						<li class="nav-item"><a href="<?php print base_url();?>about" class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i class="icon-pulse2 mr-2"></i> About</span></a></li>
						
					</ul>
				</div>
			</div>
		</div>
	</div>