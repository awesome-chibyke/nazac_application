<section class="properties-right list featured portfolio blog" style="padding: 30px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div></div>
            </div>

            <?php if(count($registered_property_details_array) == 0){ ?>
                <div class="col-sm-12" style="position:relative; margin-top: 20px;" >

                    <div class="wall-body">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div style="width:100%;" class="_9b954_8rPAx">
                                    <div class="row">
                                        <div class="col-sm-12" >
                                            <h3 style="height: 200px; line-height: 200px;">There are no Booked properties at this time</h3>
                                        </div>
                                        <div class="col-sm-12" >
											<h6 align="center"><img class="img-responsive" src="<?php print base_url();?>resource/img/propertymartGIF.gif"/></h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if(count($booked_property_details_array) > 0){ $count = 0; ?>
            <?php foreach($booked_property_details_array as $k => $details_for_booking){ ?>
                <div class="col-lg-6 col-md-6 col-sm-6 blog-pots">

                <div class="dashCard boder_p">
                    <div class="lefDashCard">
                        <img class="circleProfiDash"  src="<?php print base_url('resource/property-images/'.$property_details_array[$count]['nazac_property_thumbnail']);?>" />
                    </div>
                    <div class="rigDashCard">
                        <h3><?php echo $property_details_array[$count]['nazac_property_title']; ?></h3>
                        <div>
                            <i class="fa fa-map-marker"></i>
                            <span>
                                <?php echo $property_details_array[$count]['nazac_property_street_address'].' '.$property_details_array[$count]['nazac_property_town'].', '.$property_details_array[$count]['nazac_property_state']; ?>
                            </span>
                        </div>
                        <div>
                            <span class="text-success"><strong>RIN:</strong>  <?php echo $registered_property_details_array[$count]['nazac_property_number'].'/'.$property_details_array[$count]['nazac_property_room_number']; ?>
                            </span>
                        </div>
                        <div>
                            <span class="text-success"><strong>TYPE:</strong> Property Booking</span>
                        </div>
                        <div>
                            <span class="text-success"><strong>Rent Fee:</strong> <?php echo $this->Admin->getCurrencySymbols($property_details_array[$count]['nazac_property_currency']).' '.$property_details_array[$count]['nazac_property_price'].' ('.$property_details_array[$count]['nazac_payment_type'].')'; ?></span>
                        </div>
                        <div>
                            <span class="text-success"><strong>Agent Fee: </strong><?php echo $this->Admin->getCurrencySymbols($property_details_array[$count]['nazac_property_currency']).' '.$property_details_array[$count]['nazac_property_agents_fee']; ?></span>
                        </div>
                        <div>
                            <span class="text-success"><strong>Legal Fee:</strong>
                                <?php echo $this->Admin->getCurrencySymbols($property_details_array[$count]['nazac_property_currency']).' '.$property_details_array[$count]['nazac_property_legal_fee']; ?></span>
                        </div>
                        <div style="margin-top: 5px;">
                            <a class="btn btn-primary btn-sm" target="_blank" href="<?php echo base_url('agents/mains/view_clients_details/'.str_replace('/','-', $details_for_booking['nazac_bookers_id']))?>">Contact Client</a> | <a target="_blank" class="btn btn-info  btn-sm" href="<?php echo base_url('users/user/property-details/'.$property_details_array[$count]['nazac_property_unique_id']).'/'.str_replace(' ','-',ucwords($property_details_array[$count]['nazac_property_title'].' '.$this->Dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$property_details_array[$count]['nazac_property_category'],'nazac_category_name'))); ?>">Property Details</a>
                        </div>
                        <div style="text-align: right;">
                            <span class="text-info">Booking will expire in <strong style="font-size: 16px;"><?php echo $booked_property_details_array[$count]['nazac_book_counter'].' hour(s)'; ?></strong> </span>
                        </div>

                    </div>
                    <div style="width: 100%; border-top:2px solid #999999; float: left;">
                        <div style="margin-top: 10px;">
                <?php if($details_for_booking['aprove_availability_for_payment'] == 'no'){ ?>
                            <small><strong class="text-danger">Note:</strong> Please check the availablity (free for rent) of this booked property and make it available for payment in a case where its free. This will enable user to be able to make payment from his side.</small>
                <?php } ?>
                        </div>


                        <div style="text-align: right; margin-top: 10px;">
                            <?php if($details_for_booking['aprove_availability_for_payment'] == 'no'){ ?>
                            <span class="alert alert-warning" style="font-size: 0.9em;">Not Available for Payment</span>
                            <span><a href="<?php echo base_url('agents/mains/make_available_unavailable_for_payment/'.$details_for_booking['nazac_book_id'].'/yes')?>" onclick="confirm('Click OK to continue')" class="btn btn-success btn-sm" >Make Available for Payment</a></span>
                            <?php } ?>

                            <?php if($details_for_booking['aprove_availability_for_payment'] == 'yes'){ ?>
                                <span class="alert alert-info" style="font-size: 0.9em;">Property is Available for Payment</span>
                                <span><a href="<?php echo base_url('agents/mains/make_available_unavailable_for_payment/'.$details_for_booking['nazac_book_id'].'/no')?>" onclick="confirm('Click OK to continue')" class="btn btn-danger btn-sm" >Cancel Availablity for Payment</a></span>
                            <?php } ?>

                        </div>
                    </div>
                </div>

            </div>
            <?php $count++; } ?>

                <div class="col-lg-12 col-md-12 col-sm-12 blog-pots">

                    <nav aria-label="...">
                        <ul class="pagination">
                            <?php echo $previous_link; ?>
                            <?php echo $looped_links; ?>
                            <?php echo $next_links; ?>
                        </ul>
                    </nav>

                </div>

            <?php } ?>



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