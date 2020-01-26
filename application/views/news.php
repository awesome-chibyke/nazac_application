	<section class="headings">
		<div class="text-heading text-center">
			<div class="container">
				<h1>News</h1>
				<h2><a href="<?php print base_url();?>">Home </a> &nbsp;/&nbsp; News</h2>
			</div>
		</div>
	</section>
	<!-- END SECTION HEADINGS -->

	<!-- START SECTION BLOG -->
	<section class="blog-section">
		<div class="container">
		<div class="news-wrap">
			<div class="row">
			
				
				<?php if($newsfeed>0){
					for($i=0;$i<count($newsfeed);$i++){?>
                    <div class="col-xl-4 col-md-6 col-xs-12">
                        <div class="news-item">
                            <a href="blog-details.html" class="news-img-link">
                                <div class="news-item-img">
                                    <img class="img-responsive" src="<?php print base_url();?>resource/upload/news_images/<?php print $newsfeed[$i]['nazac_news_thumbnail'];?>" alt="<?php print $newsfeed[$i]['nazac_news_title'];?>">
                                </div>
                            </a>
                            <div class="news-item-text">
                                <a href="blog-details.html"><h3><?php $nestitle = $newsfeed[$i]['nazac_news_title']; if(strlen($nestitle)>20){print substr($nestitle, 0, 20).'...';}else{print $nestitle;}?></h3></a>
                                <div class="dates">
                                    <span class="date"><?php print $newsfeed[$i]['nazac_news_last_update'];?> &nbsp;/</span>
                                    <ul class="action-list pl-0">
                                        <li class="action-item pl-2"><i class="fa fa-heart"></i> <span></span></li>
                                        <li class="action-item"><i class="fa fa-comment"></i> <span></span></li>
                                        <li class="action-item"><i class="fa fa-share-alt"></i> <span></span></li>
                                    </ul>
                                </div>
                                <div class="news-item-descr big-news">
                                    <p><?php $body = $newsfeed[$i]['nazac_news_body'];
										if(strlen($body)>150){print substr($body, 0, 150).'...';}else{print $body;}?></p>
                                </div>
                                <div class="news-item-bottom">
                                    <a href="<?php print base_url();?>users/user/news-details/<?php print $newsfeed[$i]['nazac_news_id'];?>" class="news-link">Read more...</a>
                                    <div class="admin">
                                        <p>By, Admin</p>
                                        <img src="<?php print base_url();?>resource/upload/avatarm.png" alt="<?php print $newsfeed[$i]['nazac_news_title'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>	
				<?php }else{ print '
				<div class="col-12"><h6 align="center"><img class="img-responsive" src="'.base_url().'resource/img/propertymartGIF.gif"/></h6></div>
				<h2 style="width:100%; text-align: center;">No News was found.</h2>';}?> 
			
				
			</div>
		</div>
			
		<h6 style="padding-top: 30px; width: 100%;">
			<nav aria-label="...">
				<ul class="pagination">
					
					<li class="page-item <?php if($pages <= 1){ echo 'disabled'; } ?>">
						<a class="page-link" href="<?php if($pages <= 1){ echo '#'; } else { echo base_url();?>users/user/news/<?php print "/".($pages - 1); } ?>" tabindex="-1">Previous</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="<?php print base_url();?>users/user/news/1">First <span class="sr-only">(current)</span></a>
					</li>
					<li class="page-item"><a class="page-link" href="#">...</a></li>
					<li class="page-item active">
						<a class="page-link" href="<?php print base_url();?>users/user/news//<?php print $pages;?>"><?php print $pages;?> <span class="sr-only">(current)</span></a>
					</li>
					<li class="page-item hidden-xs"><a class="page-link" href="#">...</a></li>
					<li class="page-item"><a class="page-link" href="<?php print base_url();?>users/user/news/<?php print $num_links;?>">Last</a></li>
					<li class="page-item <?php if($pages >= $num_links){ echo 'disabled'; } ?>">
						<a class="page-link <?php if($pages >= $num_links){ echo 'disabled'; }?>" href="<?php if($pages >= $num_links){ echo '#'; } else { echo base_url();?>users/user/news/<?php print "/".($pages + 1); } ?>">Next</a>
					</li>
				</ul>
				
			</nav>
		  </h6> 	
		</div>
	</section>
	<!-- END SECTION BLOG -->