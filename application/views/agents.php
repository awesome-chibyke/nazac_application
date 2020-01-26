	<section class="headings">
		<div class="text-heading text-center">
			<div class="container">
				<h1>Agents</h1>
				<h2><a href="<?php print base_url();?>">Home </a> &nbsp;/&nbsp; Agents Listing Grid</h2>
			</div>
		</div>
	</section>
	<!-- END SECTION HEADINGS -->

	<!-- START SECTION AGENTS -->
	<section class="team">
		<div class="container">
		<div class="row">
			<div class="section-title col-md-5">
				<h3>Meet Our</h3>
				<h2>Agents</h2>
			</div>
		   </div>
		
			<div class="row team-all padding">
			
			<?php if($agents_data>0){
					for($i=0;$i<count($agents_data);$i++){?>
				<div class="col-lg-3 col-md-6 team-pro hover-effect">
					<div class="team-wrap">
						<div class="team-img">
							<img src="<?php print base_url();?>resource/upload/<?php print $agents_data[$i]['nazac_client_passport'];?>" alt="<?php print $agents_data[$i]['nazac_clients_fname'].' '.$agents_data[$i]['nazac_clients_lname'];?>" />
						</div>
						<div class="team-content">
							<div class="team-info">
								<h3><?php print $agents_data[$i]['nazac_clients_fname'].' '.$agents_data[$i]['nazac_clients_lname'];?></h3>
								<p>Real Estate Agent</p>
								<div class="team-socials">
									<ul>
										<li>
											<a data-toggle="tooltip" title="Connect On Facebook" data-placement="top" target="_blank" href="<?php print $agents_data[$i]['nazac_client_facebook_handel'];?>" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a data-toggle="tooltip" title="Connect On Twitter" data-placement="top" target="_blank" href="<?php print $agents_data[$i]['nazac_client_twitter_handel'];?>" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a data-toggle="tooltip" title="Connect On Instagram" data-placement="top" target="_blank" href="<?php print $agents_data[$i]['nazac_client_instagram_handel'];?>" title="instagran"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            <a data-toggle="tooltip" title="Click to chat" data-placement="top" style="font-size:15px;" target="_blank" href="https://wa.me/<?php print $agents_data[$i]['nazac_client_whatsapp_number'];?>?text=Hi <?php print $agents_data[$i]['nazac_clients_fname'];?>, i am intrested in the property listed in <?php print $siteDetail['site_name'];?>"><i class="fab fa-whatsapp fa-2x text-success" aria-hidden="true"></i></a>
										</li>
									</ul>
								</div>
								<span><a href="<?php print base_url();?>users/user/agent-details/<?php print str_replace("/","-",$agents_data[$i]['nazac_id']);?>">View Profile</a></span>
							</div>
						</div>
				
				</div>
			<?php }?>	
			<?php }else{ ?>
			<?php print '<h2>No Agents was found.</h2>';}?> 
				
			</div>
		</div>
		 	
			 <nav aria-label="...">
				<ul class="pagination">
					<li class="page-item <?php if($pages <= 1){ echo 'disabled'; } ?>">
						<a class="page-link" href="<?php if($pages <= 1){ echo '#'; } else { echo base_url();?>users/user/agents/<?php print ($pages - 1); } ?>" tabindex="-1">Previous</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="<?php print base_url();?>users/user/agents/1">First <span class="sr-only">(current)</span></a>
					</li>
					<li class="page-item"><a class="page-link" href="#">...</a></li>
					<li class="page-item active">
						<a class="page-link" href="<?php print base_url();?>users/user/agents/<?php print $pages;?>"><?php print $pages;?> <span class="sr-only">(current)</span></a>
					</li>
					<li class="page-item hidden-xs"><a class="page-link" href="#">...</a></li>
					<li class="page-item"><a class="page-link" href="<?php print base_url();?>users/user/agents/<?php print $num_links;?>">Last</a></li>
					<li class="page-item <?php if($pages >= $num_links){ echo 'disabled'; } ?>">
						<a class="page-link <?php if($pages >= $num_links){ echo 'disabled'; }?>" href="<?php if($pages >= $num_links){ echo '#'; } else { echo base_url();?>users/user/agents/<?php print ($pages + 1); } ?>">Next</a>
					</li>
				</ul>
				
			</nav>
			
		</div>
	</section>
	<!-- END SECTION AGENTS -->