	<section class="headings">
		<div class="text-heading text-center">
			<div class="container">
				<h1>About Us</h1>
				<h2><a href="<?php print base_url();?>">Home </a> &nbsp;/&nbsp; About Us</h2>
			</div>
		</div>
	</section>
	<!-- END SECTION HEADINGS -->

	<!-- START SECTION ABOUT -->
	<section class="welcome">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12 who-1">
					<div>
						<h2 class="text-left mb-4">About <span><?php print $siteDetail['site_name'];?></span></h2>
					</div>
					<div class="pftext">
					<p><h3>INTRODUCTION</h3>We are a management platform that offers services to properties registered under us and its occupants, such services as real estate services, products and services ordery, waste management and other necessary services to meet the needs of the occupants and the property managers (Landlord/ Caretakers).</p>
						<p>
						We can also be described as a property management platform that aims at providing investment and management needs of property managers (caretakers/landlords) while also solving the residential needs of the occupants of those properties.</p>
						
						<p>Basically we are property management company that aims at aiding and solving the real estate needs of people living in specific areas. We ease the stress attached with property acquisition in these areas, and also the selling, renting and buying of properties. We aim at solving the accommodation needs or our users with a very arranged and secured system which also provides them with other related features like finding a roommate to share an apartment with within the location of your choice.</p>

						
					</div>
					<div class="box bg-2">
						
					</div>
				</div>
				 <div class="col-lg-6 col-md-12 col-xs-12">
                    <div class="wprt-image-video w50">
                        <img alt="image" src="<?php print base_url();?>resource/bg-img/feature5.jpg">
                        <a class="icon-wrap popup-video popup-youtube" href="<?php print $siteDetail['youtube_video_about_nazac'];?>">
                            <i class="fa fa-play"></i>
                        </a>
                        <div class="iq-waves">
                            <div class="waves wave-1"></div>
                            <div class="waves wave-2"></div>
                            <div class="waves wave-3"></div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</section>
	<!-- END SECTION ABOUT -->

	<!-- START SECTION SERVICES -->
	<main class="services-2">
		<div class="container">
			<div class="section-title">
				<h3>Our</h3>
				<h2>Services</h2>
			</div>
			<div class="row service-1">
				<article class="col-md-4 serv">
					<div class="art-1 img-1">
						<img src="<?php print base_url();?>resource/images/1.png" width="52" alt="">
						<h3>Find A Property</h3>
						<p>We simply make the whole "house hunting" experience as easy as going through your phone, searching for the property you want through 'property search form' and getting every detail you could possibly ask for.</p>
						 <a class="text-base text-base-dark-hover text-size-13" href="<?php print base_url();?>services">Read More <i class="fa fa-long-arrow-right"></i></a>
					</div>
				</article>
				<article class="col-md-4 serv">
					<div class="art-1 img-2">
						<img src="<?php print base_url();?>resource/images/2.png" width="52" alt="">
						<h3>Property Management</h3>
						<p> We simply offer a better means of reaching out for clients by just having your property registered under us and enlist your vacancies for clients to view from the news feed, and make payment.</p>
						<a class="text-base text-base-dark-hover text-size-13" href="<?php print base_url();?>services">Read More <i class="fa fa-long-arrow-right"></i></a>
					</div>
				</article>
				<article class="col-md-4 serv">
					<div class="art-1 img-3">
						<img src="<?php print base_url();?>resource/images/3.png" width="52" alt="">
						<h3>Finding A Roommate</h3>
						<p>In this feature we offer our users a free medium to link up with the roommates of their choice. List your room so potential roommates can find you by the details of the apartment...</p>
						<?php if(!isset($_SESSION['_nazlogger'])){?>
                        <a class="text-base text-base-dark-hover text-size-13"  href="javascript:;" onclick="startFindRoomy_2()">Read More <i class="fa fa-long-arrow-right"></i></a>
                        <?php } ?>
                            
                        <?php if(isset($_SESSION['_nazlogger'])&&!empty($_SESSION['_nazlogger'])){?>
                        <a class="text-base text-base-dark-hover text-size-13"  href="javascript:;" onclick="startFindRoomy()">Read More <i class="fa fa-long-arrow-right"></i></a>
                        <?php } ?>
					</div>
				</article>
			</div>
		</div>
	</main>
	<!-- END SECTION SERVICES -->

	<!-- START SECTION COUNTER UP -->
	<section class="counterup">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="countr">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <div class="count-me">
                            <p class="counter text-left"><?php print $all_users;?></p>
                            <h3>Property Clients</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="countr">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        <div class="count-me">
                            <p class="counter text-left"><?php print $all_property;?></p>
                            <h3>Listings</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="countr mb-0">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <div class="count-me">
                            <p class="counter text-left"><?php print $all_agents;?></p>
                            <h3>Expert Agents</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="countr mb-0 last">
                        <i class="fa fa-trophy" aria-hidden="true"></i>
                        <div class="count-me">
                            <p class="counter text-left"><?php print $all_reviews;?></p>
                            <h3>Happy Reviews</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<!-- END SECTION COUNTER UP -->

	<!-- START SECTION AGENTS -->
	<section class="team">
		<div class="container">
		<div class="row">
			<div class="section-title col-md-5">
				<h3>Meet Our</h3>
				<h2>Agents</h2>
			</div>
		</div>
		
		<div class="row team-all">
				
				<?php if($agentshome>0){
					for($i=0;$i<count($agentshome);$i++){?>
                   <div class="col-lg-3 col-md-6 team-pro hover-effect">
                    <div class="team-wrap">
                        <div class="team-img">
                            <img src="<?php print base_url();?>resource/upload/<?php print $agentshome[$i]['nazac_client_passport'];?>" alt="<?php print $agentshome[$i]['nazac_clients_fname'].' '.$agentshome[$i]['nazac_clients_lname'];?>" />
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3><?php print $agentshome[$i]['nazac_clients_fname'].' '.$agentshome[$i]['nazac_clients_lname'];?></h3>
                                <p>Real Estate Agent</p>
                                <div class="team-socials">
                                    <ul>
                                        <li>
                                            <a target="_blank" href="<?php print $agentshome[$i]['nazac_client_facebook_handel'];?>" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a target="_blank" href="<?php print $agentshome[$i]['nazac_client_twitter_handel'];?>" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a target="_blank" href="<?php print $agentshome[$i]['nazac_client_instagram_handel'];?>" title="instagran"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            <a data-toggle="tooltip" title="Click to chat" data-placement="top" style="font-size:15px;" target="_blank" href="https://wa.me/<?php print $agentshome[$i]['nazac_client_whatsapp_number'];?>?text=Hi <?php print $agentshome[$i]['nazac_clients_fname'];?>, i am intrested in the property listed in <?php print $siteDetail['site_name'];?>"><i class="fab fa-whatsapp fa-2x text-success" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <span><a href="<?php print base_url();?>users/user/agent-details/<?php print str_replace("/","-",$agentshome[$i]['nazac_id']);?>">View Profile</a></span>
                            </div>
                        </div>
                    </div>
                </div>
               <?php }?>	
				<?php }else{ ?>
				<?php print '<h2>No Agents was found.</h2>';}?> 
				
			</div>
		</div>
	</section>
	<!-- END SECTION AGENTS -->