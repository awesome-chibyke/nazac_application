	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">
		<div class="navbar-brand">
			<a href="<?php print base_url('admin/dashboard');?>" class="d-inline-block">
				<img src="<?php print base_url();?>resource/img/logo.png" alt="<?php print $siteDetail['site_name'];?>" width="50" height="70">
			</a>
		</div>
		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>

			<span class="navbar-text ml-md-3">
				<span class="badge badge-mark border-orange-300 mr-2"></span>
				<a href="<?php print base_url();?>">
					<?php if(isset($_SESSION['_adminlogger'])&&!empty($_SESSION['_adminlogger'])){ print 'ADMIN '.strtoupper($admin_data['nazac_admin_name']); }else{ print $siteDetail['site_name'].' ADMIN';}?>
				</a>
			</span>

			<ul class="navbar-nav ml-md-auto">
				<li class="nav-item dropdown">
				
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-make-group mr-2"></i>
						Connect
					</a>
					
					<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
						<div class="dropdown-content-body p-2">
							<div class="row no-gutters">
								<div class="col-12 col-sm-4">
									<a href="#" class="d-block text-default text-center ripple-dark rounded p-3">
										<i class="icon-github4 icon-2x"></i>
										<div class="font-size-sm font-weight-semibold text-uppercase mt-2">Github</div>
									</a>
								</div>
							</div>
						</div>
					</div>
					
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-pulse2 mr-2"></i>
						Activity
					</a>
					
					<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
						<div class="dropdown-content-header">
							<span class="font-size-sm line-height-sm text-uppercase font-weight-semibold">Latest activity</span>
							<a href="#" class="text-default"><i class="icon-search4 font-size-base"></i></a>
						</div>

						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list">
								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-success-400 rounded-round btn-icon"><i class="icon-mention"></i></a>
									</div>

									<div class="media-body">
										<a href="#">Taylor Swift</a> mentioned you in a post "Angular JS. Tips and tricks"
										<div class="font-size-sm text-muted mt-1">4 minutes ago</div>
									</div>
								</li>
								
							</ul>
						</div>

						<div class="dropdown-content-footer bg-light">
							<a href="#" class="font-size-sm line-height-sm text-uppercase font-weight-semibold text-grey mr-auto">All activity</a>
							<div>
								<a href="#" class="text-grey" data-popup="tooltip" title="Clear list"><i class="icon-checkmark3"></i></a>
								<a href="#" class="text-grey ml-2" data-popup="tooltip" title="Settings"><i class="icon-gear"></i></a>
							</div>
						</div>
					</div>
				</li>
				<?php if(isset($_SESSION['_adminlogger'])&&!empty($_SESSION['_adminlogger'])){?>
				<li class="nav-item">
					<a href="<?php print base_url();?>admin/endsession/logout" class="navbar-nav-link">
						<i class="icon-switch2"></i>
						<span class="d-md-none ml-2">Logout</span>
					</a>
				</li>
				<?php }else{?>
				<li class="nav-item">
					<a class="navbar-nav-link" href="<?php print base_url();?>admin/dashboard/login">
						<i class="fa fa-user"></i> 
						Login
					</a>
				</li>
				<?php }?>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->