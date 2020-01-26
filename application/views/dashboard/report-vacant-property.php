	<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url();?>resource/loader/loading_spinner.gif"></span>
	<section class="properties-right list featured portfolio blog" style="padding: 30px 0;">
		<div class="container">
			<div class="row">
			<div class="col-lg-12">
				<div></div>
			</div>
				
			
				<div class="col-lg-12 col-md-12 blog-pots">
				 <div class="profile_set">
					<!-- Block heading Start-->
					
					<div class="block-heading">
						<div class="col-lg-12">
							<h4>
							<span style="background: none;" class="heading-icon2">
							<img src="<?php print base_url();?>resource/img/verify.png" />
							</span>
							<span class="set-fot2">Inform Us About A Vancant Appartment</span>
							</h4>
							
						</div>
					</div>
					<!-- Block heading end -->
					 <div style="margin-top: -20px;">
						<div class="alert alert-success col-lg-12">
						<span style="background: none;" class="heading-icon2"><img width="188" height="132" src="<?php print base_url();?>resource/img/bigstock-Royal-flag-winner-4847931.png" /></span> Stand a change to win fantastic prizes as you report vacant appatments!!</div><br>
					 </div>
			   <div id="row">
							
					<form autocomplete="off">
						<div class="form-group">
							<label>Property Type:<span class="text-danger"><strong>*</strong></span> </label>
							<select name="propertytype" id="propertytype" class="form-control">
								<option value="" selected="selected">--Select Type*--</option>
								<option value="apartment">Single Apartment</option>
								<option value="building">Building</option>
							</select>
						</div>
						<div class="form-group">
							<label>Property Location: </label>
							<select class="form-control" name="location" id="location">
								<option value="" selected="selected">--Select Location--</option>
								<?php for($i=0;$i<count($locations);$i++){?>
								<option value="<?php echo $locations[$i]['nazac_location_name'];?>"><?php echo ucfirst($locations[$i]['nazac_location_name']);?></option>
								<?php }?>
							</select>
							<span><a id="clicksug" href="javascript:;">Can't find location? Suggest one!</a></span>
						</div>
						<div id="sug" style="display: none;" class="form-group">
							<label>Enter New Location Suggestion:<span class="text-danger"><strong>*</strong></span> </label>
							<input placeholder="Enter New Location Suggestion" class="form-control" type="text" id="sugloca" name="sugloca" value="">
							<i class="ti-user"></i>
						</div>
						<div class="form-group">
							<label>Property/Lodge Name:<span class="text-danger"><strong>*</strong></span> </label>
							<input placeholder="Property/Lodge Name" class="form-control" type="text" id="lodgename" name="lodgename" value="">
							<i class="ti-user"></i>
						</div>
						
						<div class="form-group">
							<label>Property/Lodge Area (eg: address,town,state,city):<span class="text-danger"><strong>*</strong></span> </label>
							<input placeholder="Property Area (eg: address,town,state,city)" class="form-control" type="text" id="lodgearea" name="lodgearea" value="">
							<i class="ti-user"></i>
						</div>
						
						<div class="form-group">
							<label>Vacant Apartment Room Number:<span class="text-danger"><strong></strong></span> </label>
							<input placeholder="Vacant Apartment Room Number" class="form-control" type="text" id="roomnum" name="roomnum" value="">
							<i class="ti-user"></i>
						</div>
						
						<div class="form-group">
							<label>Description of the property:<span class="text-danger"><strong></strong></span> </label>
							<textarea placeholder="Description of the property" class="form-control" id="descript" name="descript" rows="5"></textarea>
							<i class="ti-user"></i>
						</div>
						
						<div id="pass-info" class="clearfix"></div>
						<a id="report_vacancy" href="javascript:void(0);" class="btn_1 rounded full-width add_top_30">Submit Information!</a>
						<input type="hidden" name="userid" id="userid" value="<?php print $user_data['nazac_id'];?>" />
				   </form>
				</div>
			 </div>	
			</div>
		</div>
	  </div>
	</section>
	
 <div style="z-index: 10000000" id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-12 text-center">
						  <div id="image_demo" style="width:100%; margin-top:30px"></div>
  					</div>
				</div>
      		</div>
      		<div class="modal-footer">
       		    <button class="btn btn-success crop_image">Crop & Upload Image</button>
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		</div>
    	</div>
    </div>
</div>