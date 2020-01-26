<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url();?>resource/loader/loading_spinner.gif"></span>
<section style="padding-top: 40px !important;" class="properties-right list featured portfolio blog">
  <div class="container">
	<div class="row">
	
	<div class="col-lg-12">	
		<div class="dashCard boder_p">
			<div class="">
			<h4>
			<span style="background: none;" class="heading-icon2">
			<img src="<?php print base_url();?>resource/img/verify.png" />
			</span>
			<span class="set-fot2">My Reported Vancant Appartment</span>
			</h4>
			</div>
		</div>
	  </div>

	<?php if($report_property_data>0){
		for($i=0;$i<count($report_property_data);$i++){?>
	 <div class="col-lg-12">	
		<div class="dashCard boder_p">
			<div class="">
				<h3><?php print ucwords($report_property_data[$i]['nazac_report_property_lodgename']);?></h3>
				<div>
					<i class="fa fa-map-marker"></i> <span><?php print $report_property_data[$i]['nazac_report_property_address'].', '.$report_property_data[$i]['nazac_report_property_location'];?></span>
				</div>
				<div>
					<span><strong>RN:</strong> <?php print $report_property_data[$i]['nazac_report_property_room_number'];?></span>
				</div>
				<div>
					<span><strong>TYPE:</strong> <?php print ucwords($report_property_data[$i]['nazac_report_property_type']);?></span>
				</div>
				<div>
					<span><?php print $report_property_data[$i]['nazac_report_property_description'];?></span>
				</div><hr>
				<div><span class="text-success pull-right"><?php print $report_property_data[$i]['nazac_report_date'];?></span></div>
			</div>
		</div>
	  </div>
	<?php }?>	
	<?php }else{ ?>
		<div class="col-12"><h6 align="center"><img class="img-responsive" src="<?php print base_url();?>resource/img/propertymartGIF.gif"/></h6></div>
	<?php				
		print '<h2>No property vacancy report for your search category was found.</h2>';
	}?>  
	  
	 </div>
	</div>
</section>