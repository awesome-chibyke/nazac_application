<body class="inner-pages">
<!-- START SECTION HEADINGS -->
	<div class="header">
				
		<div class="header-top">
			<div class="col-12">
			   <span style="font-size: 15px;" class="col-12  text-white"><!--<i class="fa fa-phone fa-2x text-primary"></i>--> <img src="<?php print base_url('resource/img/services.png');?>" /> <strong>Finding it difficult to access this site or if you are a new student please call:</strong> <?php print $siteDetail['phone1'].', '.$siteDetail['phone2'];?></span>
			   <hr>
			</div>
			<div class="container">
				<div class="top-info">
					<div class="call-header">
						<p><i class="fa fa-phone" aria-hidden="true"></i> <?php print $siteDetail['phone1'];?></p>
					</div>
					<div class="address-header hidden-sm-down">
						<p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php print $siteDetail['address'];?></p>
					</div>
					<div class="mail-header">
						<p><i class="fa fa-envelope" aria-hidden="true"></i> <?php print $siteDetail['email1'];?></p>
					</div>
				</div>
				<div class="top-social ">
					<div class="login-wrap">
						<ul class="d-flex">
							<?php if(!isset($_SESSION['_nazlogger'])){?>
                            <li><a style="margin-bottom: 10px;" style="color:white;" class="btn btn-primary btn-sm" href="javascript:;" onclick="startFindRoomy_2()"><i class="fa fa-search"></i> Find A Roomy</a></li>
                            <?php } ?>
                            
							<?php if(isset($_SESSION['_nazlogger'])&&!empty($_SESSION['_nazlogger'])){?>
							<li><a style="color:white; margin-bottom: 10px;" class="btn btn-primary btn-sm" href="javascript:;" onclick="startFindRoomy()"><i class="fa fa-search"></i> Find A Roomy</a></li>
							<li><a href="<?php print base_url();?>users/endsession/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
							<?php }else{?>
							<li><a href="<?php print base_url();?>login"><i class="fa fa-user"></i> Login</a></li>
							<li><a href="<?php print base_url();?>register"><i class="fa fa-sign-in"></i> Register</a></li>
							<?php }?>
						</ul>
					</div>
					<div class="social-icons-header hidden-xs">
						<div class="social-icons">
							<a href="<?php print $siteDetail['facebook'];?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="<?php print $siteDetail['twitter'];?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<a href="<?php print $siteDetail['instagram'];?>"><i class="fa fa-instagram text-white" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div><!--sticky-header-->
		<div class="header-bottom heading " id="heading">
			<div class="container">
				<a href="<?php print base_url();?>" class="logo">
					<img src="<?php print base_url();?>resource/img/logo.png" alt="realhome">
				</a>
				<button type="button" class="search-button" data-toggle="collapse" data-target="#bloq-search" aria-expanded="false">
					<i class="fa fa-search" aria-hidden="true"></i>
				</button>
				<!--<div class="get-quote hidden-lg-down">
					<a href="<?php print base_url();?>submit-property">
						<p>Add Property</p>
					</a>
				</div>-->
				<button type="button" class="button-menu hidden-lg-up" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</button>

				<form action="#" id="bloq-search" class="collapse">
					<div class="bloq-search">
						<input type="text" placeholder="search...">
						<input type="submit" value="Search">
					</div>
				</form>

				<nav id="main-menu" class="collapse">
					<ul>
						<li>
							<a href="<?php print base_url();?>" aria-expanded="false">Home</a>
						</li>
						<li>
							<a class="active" aria-haspopup="true" aria-expanded="false" href="<?php print base_url();?>about">About</a>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Property Listing</a>
							<?php if(@$cat==''){ @$cat='';}?>
							<div class="dropdown-menu">
								<?php for($i=0;$i<count($category);$i++){?>
									<a class="dropdown-item" href="<?php print base_url();?>users/user/property-listing/<?php echo trim(str_replace(" ", "-",$category[$i]['nazac_category_name']));?>"> <span><?php echo $category[$i]['nazac_category_name'];?></span></a>
                               <?php }?>
							</div>
						</li>
						<li>
							<a href="<?php print base_url();?>agents" aria-expanded="false">Agents</a>
						</li>
						<li>
							<a href="<?php print base_url();?>faq" aria-expanded="false">Faq</a>
						</li>
						<li>
							<a href="<?php print base_url();?>news" aria-expanded="false">News</a>
						</li>
						<?php if(isset($_SESSION['_nazlogger'])&&!empty($_SESSION['_nazlogger'])){?>
						<?php }else{?>
						<li><a href="<?php print base_url();?>contact">Contact</a></li>
						<?php }?>
						<?php if(isset($_SESSION['_nazlogger'])&&!empty($_SESSION['_nazlogger'])){?>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Account</a>
							<div class="dropdown-menu" style="z-index: 10000000;">
								<a class="dropdown-item" href="<?php print base_url();?>member/dashboard"><span><i class="fa fa-dashboard"></i> Dashboard</span></a>
								<a class="dropdown-item" href="<?php print base_url();?>member/my-profile"><span><i class="fa fa-user"></i> My Profile</span></a>
								<a class="dropdown-item" href="<?php print base_url();?>member/change-password"><span><i class="fa fa-unlock"></i> Update Password</span></a>
								
								<?php if($user_data['nazac_client_role']=='agent'){?>
								
								<a class="dropdown-item" href="<?php print base_url('agents/mains/load_add_property');?>"><span><i class="fa fa-plus"></i> Add Property</span></a>
                               
                                <a class="dropdown-item" href="<?php print base_url('agents/mains/register_property');?>"><span><i class="fa fa-file-text"></i> Register Property</span></a>
                                
                                <a class="dropdown-item" href="<?php print base_url('agents/mains/my_listed_property');?>"><span><i class="fa fa-list-ol"></i> My Listed Properties</span></a>
                                   
                                <a class="dropdown-item" href="<?php print base_url('agents/mains/registered_properties');?>"><span><i class="fa fa-file-text"></i> Registered Properties</span></a>
                                    
                                <a class="dropdown-item" href="<?php print base_url('agents/mains/view_booked_properties');?>"><span><i class="fa fa-bookmark"></i> Booked Properties</span></a>
                                
                                <?php }?>
                                
                                <?php if($user_data['nazac_client_role']!='agent'){?>
                                <a class="dropdown-item" href="<?php print base_url();?>member/report-vacant-property"><span><i class="fa fa-bullhorn"></i> Report Vacancy</span></a>
                                
                                <a class="dropdown-item" href="<?php print base_url();?>member/reported-vacant-property"><span><i class="fa fa-bullhorn"></i> Reported Vacancy</span></a>
                                
                                <a class="dropdown-item" href="<?php print base_url('member/my-booking');?>"><span><i class="fa fa-book"></i> My Booking</span></a>
                                
                                <a class="dropdown-item" href="<?php print base_url('member/my-renting');?>"><span><i class="fa fa-home"></i> My Renting</span></a>
                                
                                <a class="dropdown-item" href="<?php print base_url('member/my-payments');?>"><span><i class="fa fa-credit-card"></i> Payments</span></a>
                                <?php }?>
								
								<a class="dropdown-item" href="<?php print base_url();?>contact"><span><i class="fa fa-send"></i> Contact</span></a>
								<span class="divider"></span>
								<a class="dropdown-item" href="<?php print base_url();?>users/endsession/logout"><span><i class="fa fa-sign-out"></i> Logout</span></a>
							</div>
						</li>
					<?php }?>
					</ul>
				</nav>
			</div>
		</div>
	</div>