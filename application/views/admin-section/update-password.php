		<!-- Main content -->
		<div class="content-wrapper">
			<!-- Page header -->
			<div class="page-header page-header-light mb-0">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">My </span> - Profile</h4>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="<?php print base_url('admin/dashboard');?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">My Profile</span>
						</div>

					</div>
					
				</div>
			</div>
			<!-- /page header -->

		    <!-- Cover area -->
			<div class="profile-cover">
				<div class="profile-cover-img" style="background-image: url(<?php print base_url();?>resource/admin_assets/global_assets/images/demo/cover2.jpg)"></div>
					<div class="media align-items-center text-center text-md-left flex-column flex-md-row m-0">
						<div class="mr-md-3 mb-2 mb-md-0">
							<a href="#" class="profile-thumb">
								<img src="<?php print base_url();?>resource/admin_assets/passport-upload/<?php print $admin_data['nazac_admin_passport'];?>" class="border-white rounded-circle" width="48" height="48" alt="<?php print $admin_data['nazac_admin_name'];?>">
							</a>
						</div>

						<div class="media-body text-white">
				    		<h1 class="mb-0"><?php print ucfirst(strtolower($admin_data['nazac_admin_name']));?></h1>
				    		<span class="d-block">Joind: <?php print $admin_data['nazac_admin_date_created'];?></span>
						</div>
					</div>
				</div>
				<!-- /cover area -->

				<!-- Profile navigation -->
				<div class="navbar navbar-expand-lg navbar-light bg-light">
					<div class="text-center d-lg-none w-100">
						<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-second">
							<i class="icon-menu7 mr-2"></i>
							Profile navigation
						</button>
					</div>

					<div class="navbar-collapse collapse" id="navbar-second">
						<ul class="nav navbar-nav">
							<li class="nav-item">
								<a href="#activity" class="navbar-nav-link active" data-toggle="tab">
									<i class="icon-menu7 mr-2"></i>
									Activity
								</a>
							</li>
							<li class="nav-item">
								<a href="#schedule" class="navbar-nav-link" data-toggle="tab">
									<i class="icon-calendar3 mr-2"></i>
									Schedule
									<span class="badge badge-pill bg-success position-static ml-auto ml-lg-2">32</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#settings" class="navbar-nav-link" data-toggle="tab">
									<i class="icon-cog3 mr-2"></i>
									Settings
								</a>
							</li>
						</ul>

						<ul class="navbar-nav ml-lg-auto">
							<li class="nav-item">
								<a href="#" class="navbar-nav-link">
									<i class="icon-stack-text mr-2"></i>
									Notes
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="navbar-nav-link">
									<i class="icon-collaboration mr-2"></i>
									Friends
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="navbar-nav-link">
									<i class="icon-images3 mr-2"></i>
									Photos
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear"></i>
									<span class="d-lg-none ml-2">Settings</span>
								</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-image2"></i> Update cover</a>
									<a href="#" class="dropdown-item"><i class="icon-clippy"></i> Update info</a>
									<a href="#" class="dropdown-item"><i class="icon-make-group"></i> Manage sections</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-three-bars"></i> Activity log</a>
									<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Profile settings</a>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!-- /profile navigation -->


			<!-- Content area -->
			<div class="content">

				<!-- Inner container -->
				<div class="d-flex align-items-start flex-column flex-md-row">

					<!-- Left content -->
					<div class="tab-content w-100 order-2 order-md-1">
					
					    <div class="tab-pane active show" id="settings">

							<!-- Profile info -->
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title">Profile information</h5>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-body">
									<form action="#">
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Username</label>
													<input type="text" value="Eugene" class="form-control">
												</div>
												<div class="col-md-6">
													<label>Full name</label>
													<input type="text" value="Kopyov" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Address line 1</label>
													<input type="text" value="Ring street 12" class="form-control">
												</div>
												<div class="col-md-6">
													<label>Address line 2</label>
													<input type="text" value="building D, flat #67" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-4">
													<label>City</label>
													<input type="text" value="Munich" class="form-control">
												</div>
												<div class="col-md-4">
													<label>State/Province</label>
													<input type="text" value="Bayern" class="form-control">
												</div>
												<div class="col-md-4">
													<label>ZIP code</label>
													<input type="text" value="1031" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Email</label>
													<input type="text" readonly value="eugene@kopyov.com" class="form-control">
												</div>
												<div class="col-md-6">
						                            <label>Your country</label>
						                            <select class="form-control form-control-select2" data-fouc>
						                                <option value="germany" selected>Germany</option> 
						                                <option value="france">France</option> 
						                                <option value="spain">Spain</option> 
						                                <option value="netherlands">Netherlands</option> 
						                                <option value="other">...</option> 
						                                <option value="uk">United Kingdom</option> 
						                            </select>
												</div>
											</div>
										</div>

				                        <div class="form-group">
				                        	<div class="row">
				                        		<div class="col-md-6">
													<label>Phone #</label>
													<input type="text" value="+99-99-9999-9999" class="form-control">
													<span class="form-text text-muted">+99-99-9999-9999</span>
				                        		</div>

												<div class="col-md-6">
													<label>Upload profile image</label>
				                                    <input type="file" class="form-input-styled" data-fouc>
				                                    <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
												</div>
				                        	</div>
				                        </div>

				                        <div class="text-right">
				                        	<button type="submit" class="btn btn-primary">Save changes</button>
				                        </div>
									</form>
								</div>
							</div>
							<!-- /profile info -->


							<!-- Account settings -->
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title">Account settings</h5>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-body">
									<form action="#">
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Username</label>
													<input type="text" value="Kopyov" readonly class="form-control">
												</div>

												<div class="col-md-6">
													<label>Current password</label>
													<input type="password" value="password" readonly class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>New password</label>
													<input type="password" placeholder="Enter new password" class="form-control">
												</div>

												<div class="col-md-6">
													<label>Repeat password</label>
													<input type="password" placeholder="Repeat new password" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Profile visibility</label>

													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" name="visibility" class="form-input-styled" checked data-fouc>
															Visible to everyone
														</label>
													</div>

													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" name="visibility" class="form-input-styled" data-fouc>
															Visible to friends only
														</label>
													</div>

													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" name="visibility" class="form-input-styled" data-fouc>
															Visible to my connections only
														</label>
													</div>

													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" name="visibility" class="form-input-styled" data-fouc>
															Visible to my colleagues only
														</label>
													</div>
												</div>

												<div class="col-md-6">
													<label>Notifications</label>

													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-input-styled" checked data-fouc>
															Password expiration notification
														</label>
													</div>

													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-input-styled" checked data-fouc>
															New message notification
														</label>
													</div>

													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-input-styled" checked data-fouc>
															New task notification
														</label>
													</div>

													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-input-styled">
															New contact request notification
														</label>
													</div>
												</div>
											</div>
										</div>

				                        <div class="text-right">
				                        	<button type="submit" class="btn btn-primary">Save changes</button>
				                        </div>
			                        </form>
								</div>
							</div>
							<!-- /account settings -->

				    	</div>
					</div>
					<!-- /left content -->


					<!-- Right sidebar component -->
					<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right wmin-300 border-0 shadow-0 order-1 order-lg-2 sidebar-expand-md">

						<!-- Sidebar content -->
						<div class="sidebar-content">

							<!-- Navigation -->
							<div class="card">
								<div class="card-header bg-transparent header-elements-inline">
									<span class="card-title font-weight-semibold">Navigation</span>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
				                		</div>
			                		</div>
								</div>

								<div class="card-body p-0">
									<ul class="nav nav-sidebar my-2">
										<li class="nav-item">
											<a href="#" class="nav-link">
												<i class="icon-user"></i>
												 My profile
											</a>
										</li>
										<li class="nav-item">
											<a href="#" class="nav-link">
												<i class="icon-cash3"></i>
												Balance
												<span class="text-muted font-size-sm font-weight-normal ml-auto">$1,430</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="#" class="nav-link">
												<i class="icon-tree7"></i>
												Connections
												<span class="badge bg-danger badge-pill ml-auto">29</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="#" class="nav-link">
												<i class="icon-users"></i>
												Friends
											</a>
										</li>

										<li class="nav-item-divider"></li>

										<li class="nav-item">
											<a href="#" class="nav-link">
												<i class="icon-calendar3"></i>
												Events
												<span class="badge bg-teal-400 badge-pill ml-auto">48</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="#" class="nav-link">
												<i class="icon-cog3"></i>
												Account settings
											</a>
										</li>
									</ul>
								</div>
							</div>
							<!-- /navigation -->



							
						</div>
						<!-- /sidebar content -->

					</div>
					<!-- /right sidebar component -->

				</div>
				<!-- /inner container -->

			</div>
			<!-- /content area -->

