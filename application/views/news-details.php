	<section class="headings">
		<div class="text-heading text-center">
			<div class="container">
				<h1>News Details</h1>
				<h2><a href="<?php print base_url();?>">Home </a> &nbsp;/&nbsp; News Details</h2>
			</div>
		</div>
	</section>
	<!-- END SECTION HEADINGS -->

	<!-- START SECTION BLOG -->
	<section class="blog">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-12 blog-pots">
					<div class="row">
						<div class="col-md-12 mb-5">
							<div class="single-blog-post">
								<div class="blog-list img-box">
									<img src="<?php print base_url();?>resource/upload/news_images/<?php print $newsfeed['nazac_news_thumbnail'];?>" alt="<?php print $newsfeed['nazac_news_title'];?>">
									<div class="social">
									<?php $date =  str_replace(" ","/", $newsfeed['nazac_news_last_update']);
										  $dats = str_replace(",","", $date);
										  $dat = explode("/", $dats);?>
										<span class="date"><?php print $dat[1];?><span><?php print ucfirst(strtolower($dat[0]));?></span></span>
										<a href="javascript:;"><i class="fa fa-user-o"></i><span>Admin</span></a>
										<a href="javascript:;"><i class="fa fa-eye"></i><span><?php print $newsfeed['nazac_news_views'];?></span></a>
									</div>
									<div class="overlay">
										<div class="box">
											<div class="content">
												<ul>
													<li><a href="<?php print base_url();?>resource/upload/news_images/<?php print $newsfeed['nazac_news_thumbnail'];?>"><i class="fa fa-link"></i></a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="blog-info">
									<a href="<?php print base_url();?>users/user/news-details/<?php print $id;?>"><h3 class="mb-2"><?php print ucwords(strtolower($newsfeed['nazac_news_title']));?></h3></a>
									<p><?php print $newsfeed['nazac_news_body'];?></p>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<aside class="col-lg-3 col-md-12">
					<div class="widget">
						<div class="recent-post pt-5">
							<h5 class="font-weight-bold mb-4">Recent Posts</h5>
							<?php if($newsfeedhome>0){
								for($i=0;$i<count($newsfeedhome);$i++){?>
								<div class="recent-main my-4">
									<div class="recent-img">
										<a href="<?php print base_url();?>users/user/news-details/<?php print $newsfeedhome[$i]['nazac_news_id'];?>">
										<img src="<?php print base_url();?>resource/upload/news_images/<?php print $newsfeedhome[$i]['nazac_news_thumbnail'];?>" alt="<?php print $newsfeedhome[$i]['nazac_news_title'];?>"></a>
									</div>
									<div class="info-img">
										<a href="<?php print base_url();?>users/user/news-details/<?php print $newsfeedhome[$i]['nazac_news_id'];?>"><h6><?php
										$title = $newsfeedhome[$i]['nazac_news_title'];
										if(strlen($title)<30){
											print ucwords(strtolower($title));
										}else{
											print ucwords(strtolower(substr($title, 0, 30).'...'));
										}?></h6></a>
										<p><?php print $newsfeedhome[$i]['nazac_news_post_date'];?></p>
									</div>
								</div>
							 <?php }?>	
						  <?php }else{ print '<h2>No News was found.</h2>';}?>
						</div>
					</div>
				</aside>
			</div>
		</div>
	</section>
	<!-- END SECTION BLOG -->