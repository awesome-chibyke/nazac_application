	<section class="headings">
		<div class="text-heading text-center">
			<div class="container">
				<h1>FAQ’S</h1>
				<h2><a href="<?php print base_url();?>">Home </a> &nbsp;/&nbsp; FAQ’S</h2>
			</div>
		</div>
	</section>
	<!-- END SECTION HEADINGS -->

	<!-- START SECTION FAQ -->
	<section class="faq service-details">
		<div class="container">
			<h2 class="mb-5">FREQUENTLY ASKED QUESTIONS</h2>
			<div class="row">
				<div class="col-lg-12 col-md-12 service-info">
					<article class="faq">
						<div id="accordion" role="tablist" aria-multiselectable="true">
						<?php if($faq>0){
					for($i=1;$i<count($faq);$i++){
						 if($i==1){	?>
					
							<div class="panel panel-default">
								<h4 class="panel-heading">
                          <a data-toggle="collapse" data-parent="#accordion" href="#tab-<?php print $i;?>"><?php print $faq[$i]['nazac_faq_title'];?></a>
                            </h4>
								<div id="tab-<?php print $i;?>" class="panel-collapse collapse-in">
									<p>
										<?php print $faq[$i]['nazac_faq_body'];?>
									</p>
								</div>
							</div>
					
							<?php }else{?>
							
							<div class="panel panel-default">
								<h4 class="panel-heading">
 							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#tab-<?php print $i;?>"><?php print $faq[$i]['nazac_faq_title'];?></a>
                            </h4>
								<div id="tab-<?php print $i;?>" class="panel-collapse collapse">
									<p>
										<?php print $faq[$i]['nazac_faq_body'];?>
									</p>
								</div>
							</div>
							
							<?php }?>
							<?php }?>	
							<?php }else{ print '
							<div class="col-12"><h6 align="center"><img class="img-responsive" src="'.base_url().'resource/img/propertymartGIF.gif"/></h6></div>
							<h2 style="width:100%; text-align: center;">No FAQ was found.</h2>';}?> 
						</div>
					</article>
				</div>
			</div>
		</div>
	</section>
	<!-- END SECTION FAQ -->