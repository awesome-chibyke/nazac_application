<body class="inner-pages">
<!-- START SECTION 404 -->
<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url('resource/loader/loading_spinner.gif');?>"></span>

<div class="container-fluid">

    <div class="row" style="background-color: #edeff1;">
        <?php if($this->uri->segment(4)){?>
        <?php foreach($registered_property_details_array as $k => $registered_property_details){?>
            <div class="col-sm-10 col-sm-offset-1">

            <div style="width: 100%; background-color: white; padding-top: 50px;">
                <form method="post" autocomplete="off" action="<?php echo base_url('agents/mains/update_property_registration/'.$this->uri->segment(4)); ?>" style="width:94%; margin-left: 3%;">
                <div class="row" style="">

                    <div class="col-sm-12 text-center">

                        <h2 style="font-size: 23px;" class="text-success text-center">Register a Property on <?php print $siteDetail['site_name'];?></h2>
                        <p class="text-center">Property Registration</p>
                    </div>

                    <?php

                    if( $this->session->flashdata('registration_error') ){ ?>
                    <div class="col-sm-12 alert alert-warning text-center" style="margin-top: 30px">
                         <?php
                            echo $this->session->flashdata('registration_error');
                        ?>
                    </div>
                    <?php } ?>

                    <div class="col-sm-12" style="margin-top: 30px">
                        <h5 class="text-success" style="margin-bottom: 0px">Property Details</h5>
                        <hr class="bg-warning" style="margin-top: 2px" size="10px">
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group field_error">
                            <label>Name of Lodge<span class="text-danger"><strong>*</strong></span></label>
                            <input class="my_form form-control" type="text" id="name_of_lodge" name="name_of_lodge" value="<?php echo $registered_property_details['nazac_property_lodge_name']; ?>">
                            <i class="ti-user"></i>
                            <div class="error_display">
                                <?php echo form_error('name_of_lodge'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group field_error">
                            <label>Address of Property<span class="text-danger"><strong>*</strong></span></label>
                            <input class="my_form form-control" type="text" id="address_of_property" name="address_of_property" value="<?php echo $registered_property_details['nazac_property_lodge_address']; ?>">
                            <i class="ti-user"></i>
                            <div class="error_display">
                                <?php echo form_error('address_of_property'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group field_error">
                            <label>Property Location<span class="text-danger"><strong>*</strong></span></label>
                            <!--<input class="form-control" type="text" id="nazac_property_location" name="nazac_property_location" value="<?php /*echo set_value('nazac_property_location'); */?>">-->
                            <select name="nazac_property_location" class="form-control">
                                <option value="" selected="selected">--Select Property Location*--</option>
                                <?php foreach($property_location_details_array as $k => $value){ ?>
                                    <option <?php if($registered_property_details['nazac_property_location'] == $value['nazac_location_id']){ echo 'selected'; } ?> value="<?php echo $value['nazac_location_id']; ?>"><?php echo $value['nazac_location_name']; ?></option>

                                <?php } ?>
                            </select>
                            <i class="icon_mail_alt"></i>
                            <div class="error_display">
                                <?php echo form_error('nazac_property_location'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group field_error">
                            <label>Property Type:<span class="text-danger"><strong>*</strong></span> </label>
                            <select name="property_type" class="form-control">
                                <option value="" selected="selected">--Select Property Type*--</option>
                                <?php foreach($property_type_details_array as $k => $value){ ?>
                                    <option <?php if($registered_property_details['nazac_property_type'] == $value['property_type']){ echo 'selected'; } ?> value="<?php echo $value['property_type']; ?>"><?php echo $value['property_type']; ?></option>

                                <?php } ?>
                            </select>
                            <div class="error_display">
                                <?php echo form_error('property_type'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <?php $property_purpose = set_value('nazac_property_purpose'); ?>
                        <div class="form-group field_error">
                            <label>Property Purpose<span class="text-danger"><strong>*</strong></span></label>
                            <select onchange="removeErrorDisplayer(this)" name="nazac_property_purpose" class="form-control">
                                <option value="" selected="selected">--Select Property Purpose*--</option>
                                <?php foreach($property_purpose_details_array as $k => $value){ ?>

                                    <option <?php if($value['property_purpose'] === $registered_property_details['nazac_property_purpose']){ echo 'selected'; } ?> value="<?php echo $value['property_purpose']; ?>">
                                        <?php echo $value['property_purpose']; ?>
                                    </option>

                                <?php } ?>
                            </select>
                            <i class="ti-user"></i>
                            <div class="error_display">
                                <?php echo form_error('nazac_property_purpose'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group field_error">
                            <?php $value = set_value('currency'); ?>
                            <label>Currency<span class="text-danger"><strong>*</strong></span></label>
                            <select onchange="removeErrorDisplayer(this)" name="currency" class="currency form-control">
                                <option <?php if($registered_property_details['nazac_property_currency'] == "NGN"){ echo 'selected'; } ?> value="NGN" selected="selected">NGN</option>
                                <option <?php if($registered_property_details['nazac_property_currency'] == "USD"){ echo 'selected'; } ?>  value="USD">USD</option>
                            </select>
                            <i class="ti-user"></i>
                            <div class="error_display">
                                <?php echo form_error('currency'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group field_error">
                            <label>Price Attached<span class="text-danger"><strong>*</strong></span></label>
                            <input onblur="removeErrorDisplayer(this)" class="my_form form-control" type="number" id="price_attached" name="price_attached" value="<?php echo $registered_property_details['nazac_property_price']; ?>">
                            <i class="ti-user"></i>
                            <div class="error_display">
                                <?php echo form_error('price_attached'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group field_error">
                            <label>Older Price<span class="text-danger"><strong></strong></span></label>
                            <input onblur="removeErrorDisplayer(this)" class="my_form form-control" type="number" id="older_price" name="older_price" value="<?php echo $registered_property_details['nazac_property_older_price']; ?>">
                            <i class="ti-user"></i>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group field_error">
                            <label><small>Number of Apartment(s):</small><span class="text-danger"><strong>*</strong></span> </label>
                            <input class="my_form form-control" type="test" id="no_of_apartment" name="no_of_apartment" value="<?php echo $registered_property_details['no_of_apartment']; ?>">
                            <i class="icon_mail_alt"></i>
                            <div class="error_display">
                                <?php echo form_error('no_of_apartment'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group field_error">
                            <label>No of Parking Space<span class="text-danger"><strong></strong></span></label>
                            <input class="my_form form-control" type="text" id="no_of_parking_space" name="no_of_parking_space" value="<?php echo $registered_property_details['no_of_parking_space']; ?>">
                            <i class="ti-user"></i>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group field_error">
                            <label>Property Storey Type<span class="text-danger"><strong>*</strong></span></label>
                            <!--<input class="my_form form-control" type="test" id="nazac_property_storey_type" name="nazac_property_storey_type" value="<?php /*echo $registered_property_details['nazac_property_storey_type']; */?>">-->

                            <select name="nazac_property_storey_type" class="form-control">
                                <option value="" selected="selected">--Select Property Storey Type*--</option>

                                <option <?php if($registered_property_details['nazac_property_storey_type'] === 'Ground building'){ echo 'selected'; }?> value="Ground building">Ground building</option>
                                <option <?php if($registered_property_details['nazac_property_storey_type'] === '1 storey building'){ echo 'selected'; }?> value="1 storey building">1 storey building</option>
                                <option <?php if($registered_property_details['nazac_property_storey_type'] === '2 storey building'){ echo 'selected'; }?> value="2 storey building">2 storey building</option>
                                <option <?php if($registered_property_details['nazac_property_storey_type'] === '3 storey building'){ echo 'selected'; }?> value="2 storey building">3 storey building</option>
                                <option <?php if($registered_property_details['nazac_property_storey_type'] === '4 storey building'){ echo 'selected'; }?> value="4 storey building">3 storey building</option>

                            </select>

                            <i class="icon_mail_alt"></i>
                            <div class="error_display">
                                <?php echo form_error('nazac_property_storey_type'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group field_error">
                            <label>Standard of Apartment(s)<span class="text-danger"><strong></strong></span></label>
                            <select name="apartment_standard" class="form-control">
                                <option value="" selected="selected">--Select Property Type*--</option>
                                <option value="Furnished">Furnished</option>
                                <option value="Renovated">Renovated</option>
                                <option value="Serviced">Serviced</option>
                                <option value="Not Furnished">Not Furnished</option>
                            </select>
                            <i class="ti-user"></i>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <label>Property Rating<span class="text-danger"><strong>*</strong></span></label>
                        <?php $default_value = 0; ?>
                        <?php if(set_value('rating_of_property') !== ''){ $default_value = set_value('rating_of_property'); }?>
                        <br><strong >Current Rating in Percentage: &nbsp;&nbsp;<span id="rating_of_property_value"><?php echo $registered_property_details['rating_of_property']; ?>%</span></strong>
                        <input class="my_form form-control" type="range" id="rating_of_property" min="0" step="5" oninput="getCurrentSliderValue(this)" max="100" name="rating_of_property" value="<?php echo $registered_property_details['rating_of_property']; ?>">

                        <i class="icon_mail_alt"></i>
                        <div class="error_display">
                            <?php echo form_error('rating_of_property'); ?>
                        </div>
                    </div>

                    <div class="col-sm-12" style="margin-top: 30px">
                        <h5 class="text-success" style="margin-bottom: 0px">Property Location Details</h5>
                        <hr class="bg-warning" style="margin-top: 2px" size="10px">
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group field_error">
                            <label>Select Country<span class="text-danger"><strong>*</strong></span></label>
                            <select onchange="removeErrorDisplayer(this)" name="nazac_property_country" class="form-control">
                                <option value="" selected="selected">--Select Country*--</option>
                                <?php foreach($this->Admin->country() as $k => $value){ ?>

                                    <option <?php if( $registered_property_details['nazac_property_country'] === $value){echo 'selected';} ?> value="<?php echo $value; ?>">
                                        <?php echo $value; ?>
                                    </option>

                                <?php } ?>
                            </select>
                            <i class="icon_lock_alt"></i>
                            <div class="error_display">
                                <?php echo form_error('nazac_property_country'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 state_main">
                        <div class="form-group field_error">
                            <label>Select State<span class="text-danger"><strong>*</strong></span></label>
                            <select onchange="getLocalGovernment(this); removeErrorDisplayer(this)" name="nazac_property_state" class="form-control">
                                <option value="" selected="selected">--Select State*--</option>
                                <?php foreach($this->Admin->states() as $k => $value){ ?>

                                    <option <?php if($registered_property_details['nazac_property_state']=== $value){ echo 'selected'; } ?> value="<?php echo $value; ?>">
                                        <?php echo $value; ?>
                                    </option>

                                <?php } ?>
                            </select>
                            <i class="icon_lock_alt"></i>
                            <div class="error_display">
                                <?php echo form_error('nazac_property_state'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 lga_main">
                        <div class="form-group field_error">
                            <label>Select Local Government<span class="text-danger"><strong>*</strong></span></label>
                            <select onchange="removeErrorDisplayer(this)" name="nazac_property_local_gov_area" class="lga_located form-control">
                                <option value="<?php echo $registered_property_details['nazac_property_local_gov_area']; ?>"><?php echo $registered_property_details['nazac_property_local_gov_area']; ?></option>

                            </select>
                            <i class="icon_lock_alt"></i>
                            <div class="error_display">
                                <?php echo form_error('nazac_property_local_gov_area'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group field_error">
                            <label>Area/Town<span class="text-danger"><strong>*</strong></span></label>
                            <input onblur="removeErrorDisplayer(this)" class="form-control" type="text" name="nazac_property_town" value="<?php echo $registered_property_details['nazac_property_town']; ?>" placeholder="Eg: Uwani" id="town_located">
                            <i class="icon_lock_alt"></i>
                            <div class="error_display">
                                <?php echo form_error('nazac_property_town'); ?>
                            </div>
                        </div>
                    </div>
                    <!--agent_incahrge_id, no_of_apartment, rating_of_property, nazac_property_caretaker_phone_2, nazac_property_state, nazac_property_local_gov_area, nazac_property_town, nazac_property_street_address, nazac_property_street_location, nazac_property_country-->
                    <div class="col-sm-12">
                        <div class="form-group field_error">
                            <label>Street/Road<span class="text-danger"><strong>*</strong></span></label>
                            <input onblur="removeErrorDisplayer(this)" class="form-control" type="text" name="nazac_property_street_address" value="<?php echo $registered_property_details['nazac_property_street_address']; ?>" placeholder="Eg: No 3 Kenyeta Street" id="town_located">
                            <i class="icon_lock_alt"></i>
                            <div class="error_display">
                                <?php echo form_error('nazac_property_street_address'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12" style="margin-top: 30px">
                        <h5 class="text-success" style="margin-bottom: 0px">Property Amenities</h5>
                        <hr class="bg-warning" style="margin-top: 2px" size="10px">
                    </div>

                    <div class="col-sm-12">
                        <div class="row">

                            <?php  $amenities = $this->Admin->explodeImplodeValue($registered_property_details['nazac_property_amenities'], ',', ',', 'neat_explosion'); ?>
                            <?php if(count($amenities) > 0){ ?>
                            <?php for($i = 0; $i < count($amenities); $i++){; ?>
                                <div class="col-sm-3">
                                    <label>Property Amenities <?php echo $i + 1 ?><span class="text-danger"> <small class="text-danger"></small></span></label>
                                    <input class="my_form form-control nazac_property_amenities" type="test" name="nazac_property_amenities[<?php echo $i; ?>]" value="<?php echo $amenities[$i]; ?>">
                                </div>
                            <?php } ?>
                            <?php } ?>

                            <?php if(count($amenities) == 0){ ?>
                            <?php for($i = 0; $i < 4; $i++){; ?>
                                <div class="col-sm-3">
                                    <label>Property Amenities <?php echo $i + 1 ?><span class="text-danger"> <small class="text-danger"></small></span></label>
                                    <input class="my_form form-control nazac_property_amenities" type="test" name="nazac_property_amenities[<?php echo $i; ?>]" value="">
                                </div>
                            <?php } ?>
                            <?php } ?>

                            <div class="col-sm-12 marker">
                                <button onclick="addAmenitiesField()" type="button" class="btn btn-small btn-info">Add Fields</button>
                                <button onclick="removeAmenitiesField()" type="button" class="btn btn-small btn-danger">Remove Fields</button>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12" style="margin-top: 30px">
                        <h5 class="text-success" style="margin-bottom: 0px">Possible Bad Defects on Property</h5>
                        <hr class="bg-warning" style="margin-top: 2px" size="10px">
                    </div>

                    <div class="col-sm-12">

                        <div class="row">

                            <?php  $bad_defects = $this->Admin->explodeImplodeValue($registered_property_details['nazac_property_bad_defects'], ',', ',', 'neat_explosion'); ?>
                            <?php if(count($bad_defects) > 0){ ?>

                                <?php for($i = 0; $i < count($bad_defects); $i++){; ?>
                                    <div class="col-sm-3">
                                        <label>Defect <?php echo $i + 1 ?><span class="text-danger"> <small class="text-danger"></small></span></label>
                                        <input class="my_form form-control bad_defects" type="test" name="bad_defects[<?php echo $i; ?>]" value="<?php echo $bad_defects[$i]; ?>">
                                    </div>
                                <?php } ?>
                            <?php } ?>

                            <?php if(count($bad_defects) == 0){ ?>
                                <?php for($i = 0; $i < 4; $i++){; ?>
                                    <div class="col-sm-3">
                                        <label>Defect <?php echo $i + 1 ?><span class="text-danger"> <small class="text-danger"></small></span></label>
                                        <input class="my_form form-control bad_defects" type="test" name="bad_defects[<?php echo $i; ?>]" value="">
                                    </div>
                                <?php } ?>
                            <?php } ?>

                            <div class="col-sm-12 marker_bad">
                                <button onclick="addBadDefectsField()" type="button" class="btn btn-small btn-info">Add Fields</button>
                                <button onclick="removeBadDefectsField()" type="button" class="btn btn-small btn-danger">Remove Fields</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12" style="margin-top: 20px;">
                        <div class="form-group field_error">
                            <label>Add a Youtube Link<span class="text-danger"><strong></strong></span></label>
                            <input class="my_form form-control" type="text" name="nazac_property_youtube_link" value="<?php echo $registered_property_details['nazac_property_youtube_video']; ?>" placeholder="https://www.youtube.com/watch?v=xxxxxxxx" id="nazac_property_youtube_link">
                            <i class="icon_lock_alt"></i>
                        </div>
                    </div>

                    <div class="col-sm-12" style="margin-top: 30px">
                        <h5 class="text-success" style="margin-bottom: 0px">Closest Landmark Details</h5>
                        <hr class="bg-warning" style="margin-top: 2px" size="10px">
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group field_error">
                            <label>Closest Landmark<span class="text-danger"><strong>*</strong></span></label>
                            <input class="my_form form-control" type="text" name="nazac_property_closest_landmark" value="<?php echo $registered_property_details['nazac_property_closest_landmark']; ?>" id="nazac_property_closest_landmark">
                            <i class="icon_lock_alt"></i>
                            <div class="error_display">
                                <?php echo form_error('nazac_property_closest_landmark'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group field_error">
                            <label>Distance From Landmark<span class="text-danger"><strong>(KM)</strong></span></label>
                            <input value="<?php echo $registered_property_details['nazac_property_distance_from_landmark']; ?>" class="my_form form-control" type="text" name="nazac_property_distance_from_landmark" id="nazac_property_distance_from_landmark">
                            <i class="icon_lock_alt"></i>

                        </div>
                    </div>

                    <div class="col-sm-12" style="margin-top: 30px">
                        <h5 class="text-success" style="margin-bottom: 0px">Map Coordinates <small><a target="_blank" href="https://www.youtube.com/watch?v=2yOX7soSPeQ">(help)</a></small></h5>
                        <hr class="bg-warning" style="margin-top: 2px" size="10px">
                    </div>
                    <?php $map_coordinates = explode(',', $registered_property_details['nazac_property_map_cordinates'])?>
                    <div class="col-sm-6">
                        <div class="form-group field_error">
                            <label>Longitude<span class="text-danger"><strong></strong></span></label>
                            <input class="form-control" type="text" name="longitude" value="<?php echo $map_coordinates[0]; ?>" id="longitude">
                            <i class="icon_lock_alt"></i>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group field_error">
                            <label>Latitude<span class="text-danger"><strong></strong></span></label>
                            <input value="<?php echo $map_coordinates[1]; ?>" class="form-control" type="text" name="latitude" id="latitude">
                            <i class="icon_lock_alt"></i>
                        </div>
                    </div>

                    <div class="col-sm-12" style="margin-top: 30px">
                        <h5 class="text-success" style="margin-bottom: 0px">Details of The Property Manager</h5>
                        <hr class="bg-warning" style="margin-top: 2px" size="10px">
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group field_error">
                            <label>Property manager's Full Name<span class="text-danger"><strong>*</strong></span></label>
                            <input value="<?php echo $registered_property_details['nazac_property_caretaker_name']; ?>" class="my_form form-control" type="text" name="nazac_property_caretaker_name" id="nazac_property_caretaker_name">
                            <i class="icon_lock_alt"></i>
                            <div class="error_display">
                                <?php echo form_error('nazac_property_caretaker_name'); ?>
                            </div>
                        </div>
                    </div>

                    <!--<div class="col-sm-4">
                        <div class="form-group field_error">
                            <label>Caretaker's/Land Lord's Email Address<span class="text-danger"><strong></strong></span></label>
                            <input value="<?php /*echo $registered_property_details['nazac_property_caretaker_email']; */?>" class="my_form form-control" type="email" name="nazac_property_caretaker_email">
                            <i class="icon_lock_alt"></i>
                        </div>
                    </div>-->

                    <div class="col-sm-6">
                        <div class="form-group field_error">
                            <label>Property Manager`s Phone Number 1<span class="text-danger"><strong>*</strong></span></label>
                            <input class="my_form form-control" type="text" name="nazac_property_caretaker_phone" value="<?php echo $registered_property_details['nazac_property_caretaker_phone']; ?>">
                            <i class="icon_lock_alt"></i>
                            <div class="error_display">
                                <?php echo form_error('nazac_property_caretaker_phone'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group field_error">
                            <label>Property Manager`s Phone Number 2<span class="text-danger"><strong>*</strong></span></label>
                            <input class="my_form form-control" type="text" name="nazac_property_caretaker_phone_2" value="<?php echo $registered_property_details['nazac_property_caretaker_phone_2']; ?>">
                            <i class="icon_lock_alt"></i>
                            <div class="error_display">
                                <?php echo form_error('nazac_property_caretaker_phone_2'); ?>
                            </div>
                        </div>
                    </div>

                    <!--<div class="col-sm-4">
                        <div class="form-group field_error">
                            <label>Caretaker's/Land Lord's Address<span class="text-danger"><strong></strong></span></label>
                            <input class="my_form form-control" type="text" name="nazac_property_caretaker_address" value="<?php /*echo $registered_property_details['nazac_property_caretaker_address']; */?>">
                            <i class="icon_lock_alt"></i>
                        </div>
                    </div>-->

                    <div class="col-sm-4">
                        <div class="form-group field_error">
                            <label>Recipient's Account Name<span class="text-danger"><strong></strong></span></label>
                            <input class="my_form form-control" type="text" name="nazac_property_caretaker_ac_name" value="<?php echo $registered_property_details['nazac_property_caretaker_ac_name']; ?>">
                            <i class="icon_lock_alt"></i>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group field_error">
                            <label>Recipient's Account Number<span class="text-danger"><strong></strong></span></label>
                            <input class="my_form form-control" type="text" name="nazac_property_caretaker_ac_nom" value="<?php echo $registered_property_details['nazac_property_caretaker_ac_nom']; ?>" >
                            <i class="icon_lock_alt"></i>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group field_error">
                            <label>Recipient's Bank Name<span class="text-danger"><strong></strong></span></label>
                            <input value="<?php echo $registered_property_details['nazac_property_caretaker_bank_name']; ?>" class="my_form form-control" type="text" name="nazac_property_caretaker_bank_name">
                            <i class="icon_lock_alt"></i>
                        </div>
                    </div>

                    <div class="col-sm-12" style="margin-top: 30px">
                        <h5 class="text-success" style="margin-bottom: 0px">Additional Fees</h5>
                        <hr class="bg-warning" style="margin-top: 2px" size="10px">
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group field_error">
                            <label>Legal Fee<span class="text-danger"><strong>*</strong></span></label>
                            <input class="my_form form-control" type="text" id="nazac_property_legal_fee" name="nazac_property_legal_fee" value="<?php echo $registered_property_details['nazac_property_legal_fee']; ?>">
                            <i class="ti-user"></i>
                            <div class="error_display">
                                <?php echo form_error('nazac_property_legal_fee'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group field_error">
                            <label>Agent`s Fee<span class="text-danger"><strong>*</strong></span></label>
                            <input class="my_form form-control" type="text" id="no_of_parking_space" name="nazac_property_agents_fee" value="<?php echo $registered_property_details['nazac_property_agents_fee']; ?>">
                            <i class="ti-user"></i>
                            <div class="error_display">
                                <?php echo form_error('nazac_property_agents_fee'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12" style="margin-top: 30px">
                        <h5 class="text-success" style="margin-bottom: 0px">Property Description</h5>
                        <hr class="bg-warning" style="margin-top: 2px" size="10px">
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group field_error">
                            <label>Property Description<span class="text-danger"><strong>*</strong></span></label>
                            <button style="display: inline-block; margin-bottom: 10px;" onclick="previewAssessment(this)" type="button" class="btn btn-primary">View Preview</button>
                            <textarea onblur="removeErrorDisplayer(this)" class="summernote ed_property_description form-control" placeholder="Enter News Here" name="description"><?php echo $registered_property_details['nazac_property_description']; ?></textarea>
                            <i class="icon_lock_alt"></i>
                            <div class="error_display">
                                <?php echo form_error('description'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-sm-offset-3" style="margin-bottom: 30px;">
                        <div id="pass-info" class="clearfix"></div>
                        <button style="background: #121B22; border-color:#121B22;" typeof="submit" class="btn btn-block btn-info btn-lg">Continue</button>
                    </div>


                </div>

                </form>

            </div>

        </div>
        <?php } ?>
        <?php } ?>

        <?php if(!$this->uri->segment(4)){?>
            <div class="col-sm-10 col-sm-offset-1">

                <div style="width: 100%; background-color: white; padding-top: 50px;">
                    <form method="post" autocomplete="off" action="<?php echo base_url('agents/mains/process_registration'); ?>" style="width:94%; margin-left: 3%;">
                        <div class="row" style="">

                            <div class="col-sm-12 text-center">

                                <h2 style="font-size: 23px;" class="text-success text-center">Register a Property on <?php print $siteDetail['site_name'];?></h2>
                                <p class="text-center">Property Registration</p>
                            </div>
                            <?php //echo validation_errors(); ?>
                            <?php
                            if( $this->session->flashdata('registration_error') ){ ?>
                                <div class="col-sm-12 alert alert-warning text-center" style="margin-top: 30px">

                                    <?php
                                    echo $this->session->flashdata('registration_error');
                                    ?>
                                </div>
                            <?php } ?>

                            <div class="col-sm-12" style="margin-top: 30px">
                                <h5 class="text-success" style="margin-bottom: 0px">Property Details</h5>
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group field_error">
                                    <label>Name of Lodge<span class="text-danger"><strong>*</strong></span></label>
                                    <input class="my_form form-control" type="text" id="name_of_lodge" name="name_of_lodge" value="<?php echo set_value('name_of_lodge'); ?>">
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('name_of_lodge'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group field_error">
                                    <label>Address of Property<span class="text-danger"><strong>*</strong></span></label>
                                    <input class="my_form form-control" type="text" id="address_of_property" name="address_of_property" value="<?php echo set_value('address_of_property'); ?>">
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('address_of_property'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <?php $property_location = set_value('nazac_property_location'); ?>
                                <div class="form-group field_error">
                                    <label>Property Location<span class="text-danger"><strong>*</strong></span></label>
                                    <!--<input class="form-control" type="text" id="nazac_property_location" name="nazac_property_location" value="<?php /*echo set_value('nazac_property_location'); */?>">-->
                                    <select name="nazac_property_location" class="form-control">
                                        <option value="" selected="selected">--Select Property Location*--</option>
                                        <?php foreach($property_location_details_array as $k => $value){ ?>
                                            <option <?php if($property_location === $value['nazac_location_id']){ echo 'selected'; } ?> value="<?php echo $value['nazac_location_id']; ?>"><?php echo $value['nazac_location_name']; ?></option>

                                        <?php } ?>
                                    </select>
                                    <i class="icon_mail_alt"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_location'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <?php $property_type = set_value('property_type'); ?>
                                <div class="form-group field_error">
                                    <label>Property Type:<span class="text-danger"><strong>*</strong></span> </label>
                                    <select name="property_type" class="form-control">
                                        <option value="" selected="selected">--Select Property Type*--</option>
                                        <?php foreach($property_type_details_array as $k => $value){ ?>
                                            <option <?php if($property_type === $value['property_type']){ echo 'selected'; } ?> value="<?php echo $value['property_type']; ?>"><?php echo $value['property_type']; ?>
                                            </option>

                                        <?php } ?>
                                    </select>
                                    <div class="error_display">
                                        <?php echo form_error('property_type'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <?php $property_purpose = set_value('nazac_property_purpose'); ?>
                                <div class="form-group field_error">
                                    <label>Property Purpose<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="nazac_property_purpose" class="form-control">
                                        <option value="" selected="selected">--Select Property Purpose*--</option>
                                        <?php foreach($property_purpose_details_array as $k => $value){ ?>

                                            <option <?php if($property_purpose === $value['property_purpose']){ echo 'selected'; } ?> value="<?php echo $value['property_purpose']; ?>">
                                                <?php echo $value['property_purpose']; ?>
                                            </option>

                                        <?php } ?>
                                        <?php
                                        $value = set_value('nazac_property_purpose');
                                        if(!empty($value)){ ?>
                                            <option value="<?php echo $value; ?>" selected="selected"><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_purpose'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group field_error">
                                    <label>Currency<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="currency" class="currency form-control">
                                        <option value="">--Select Currency*--</option>
                                        <option value="NGN" selected="selected">NGN</option>
                                        <option value="USD">USD</option>
                                        <?php
                                        $value = set_value('currency');
                                        if(!empty($value)){ ?>
                                            <option value="<?php echo $value; ?>" selected="selected"><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('currency'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group field_error">
                                    <label>Price Attached<span class="text-danger"><strong>*</strong></span></label>
                                    <input onblur="removeErrorDisplayer(this)" class="my_form form-control" type="number" id="price_attached" name="price_attached" value="<?php echo set_value('price_attached'); ?>">
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('price_attached'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group field_error">
                                    <label>Older Price<span class="text-danger"><strong></strong></span></label>
                                    <input onblur="removeErrorDisplayer(this)" class="my_form form-control" type="number" id="older_price" name="older_price" value="<?php echo set_value('older_price'); ?>">
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group field_error">
                                    <label><small>Number of Apartment(s):</small><span class="text-danger"><strong>*</strong></span> </label>
                                    <input class="my_form form-control" type="test" id="no_of_apartment" name="no_of_apartment" value="<?php echo set_value('no_of_apartment'); ?>">
                                    <i class="icon_mail_alt"></i>
                                    <div class="error_display">
                                        <?php echo form_error('no_of_apartment'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group field_error">
                                    <label>No of Parking Space<span class="text-danger"><strong></strong></span></label>
                                    <input class="my_form form-control" type="text" id="no_of_parking_space" name="no_of_parking_space" value="<?php echo set_value('no_of_parking_space'); ?>">
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group field_error">
                                    <?php $property_storey = set_value('nazac_property_storey_type');?>
                                    <label>Property Storey Type<span class="text-danger"><strong>*</strong></span></label>
                                    <select name="nazac_property_storey_type" class="form-control">
                                        <option value="" selected="selected">--Select Property Storey Type*--</option>

                                        <option <?php if($property_storey === 'Ground building'){ echo 'selected'; }?> value="Ground building">Ground building</option>
                                        <option <?php if($property_storey === '1 storey building'){ echo 'selected'; }?> value="1 storey">1 storey</option>
                                        <option <?php if($property_storey === '2 storey building'){ echo 'selected'; }?> value="2 storey building">2 storey building</option>
                                        <option <?php if($property_storey === '3 storey building'){ echo 'selected'; }?> value="2 storey building">3 storey building</option>
                                        <option <?php if($property_storey === '4 storey building'){ echo 'selected'; }?> value="4 storey building">3 storey building</option>

                                    </select>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_storey_type'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group field_error">
                                    <label>Standard of Apartment(s)<span class="text-danger"><strong></strong></span></label>
                                    <select name="apartment_standard" class="form-control">
                                        <option value="" selected="selected">--Select Property Type*--</option>
                                        <option value="Furnished">Furnished</option>
                                        <option value="Renovated">Renovated</option>
                                        <option value="Serviced">Serviced</option>
                                        <option value="Not Furnished">Not Furnished</option>
                                    </select>
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label>Property Rating<span class="text-danger"><strong>*</strong></span></label>
                                <?php $default_value = 0; ?>
                                <?php if(set_value('rating_of_property') !== ''){ $default_value = set_value('rating_of_property'); }?>
                                <br><strong ><small>Current Rating in Percentage: </small> &nbsp;&nbsp;<span id="rating_of_property_value"><?php echo $default_value; ?>%</span></strong>
                                <input class="my_form form-control" type="range" id="rating_of_property" min="0" step="5" oninput="getCurrentSliderValue(this)" max="100" name="rating_of_property" value="<?php echo $default_value; ?>">

                                <i class="icon_mail_alt"></i>
                                <div class="error_display">
                                    <?php echo form_error('rating_of_property'); ?>
                                </div>
                            </div>

                            <div class="col-sm-12" style="margin-top: 30px">
                                <h5 class="text-success" style="margin-bottom: 0px">Property Location Details</h5>
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group field_error">
                                    <label>Select Country<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="nazac_property_country" class="form-control">
                                        <option value="" selected="selected">--Select Country*--</option>
                                        <?php foreach($this->Admin->country() as $k => $value){ ?>

                                            <option <?php if($value === 'Nigeria'){echo 'selected';} ?> value="<?php echo $value; ?>">
                                                <?php echo $value; ?>
                                            </option>

                                        <?php } ?>
                                        <?php
                                        $value = set_value('nazac_property_country');
                                        if(!empty($value)){ ?>
                                            <option value="<?php echo $value; ?>" selected="selected"><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                    <i class="icon_lock_alt"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_country'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3 state_main">
                                <div class="form-group field_error">
                                    <label>Select State<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="getLocalGovernment(this); removeErrorDisplayer(this)" name="nazac_property_state" class="form-control">
                                        <option value="" selected="selected">--Select State*--</option>
                                        <?php foreach($this->Admin->states() as $k => $value){ ?>

                                            <option value="<?php echo $value; ?>">
                                                <?php echo $value; ?>
                                            </option>

                                        <?php } ?>
                                        <?php
                                        $value = set_value('nazac_property_state');
                                        if(!empty($value)){ ?>
                                            <option value="<?php echo $value; ?>" selected="selected"><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                    <i class="icon_lock_alt"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_state'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3 lga_main">
                                <div class="form-group field_error">
                                    <label>Select Local Government<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="nazac_property_local_gov_area" class="lga_located form-control">
                                        <option value="<?php echo set_value('nazac_property_local_gov_area'); ?>"><?php echo set_value('nazac_property_local_gov_area'); ?></option>

                                    </select>
                                    <i class="icon_lock_alt"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_local_gov_area'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group field_error">
                                    <label>Area/Town<span class="text-danger"><strong>*</strong></span></label>
                                    <input onblur="removeErrorDisplayer(this)" class="form-control" type="text" name="nazac_property_town" value="<?php echo set_value('nazac_property_town'); ?>" placeholder="Eg: Uwani" id="town_located">
                                    <i class="icon_lock_alt"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_town'); ?>
                                    </div>
                                </div>
                            </div>
                            <!--agent_incahrge_id, no_of_apartment, rating_of_property, nazac_property_caretaker_phone_2, nazac_property_state, nazac_property_local_gov_area, nazac_property_town, nazac_property_street_address, nazac_property_street_location, nazac_property_country-->
                            <div class="col-sm-12">
                                <div class="form-group field_error">
                                    <label>Street/Road<span class="text-danger"><strong>*</strong></span></label>
                                    <input onblur="removeErrorDisplayer(this)" class="form-control" type="text" name="nazac_property_street_address" value="<?php echo set_value('nazac_property_street_address'); ?>" placeholder="Eg: No 3 Kenyeta Street" id="town_located">
                                    <i class="icon_lock_alt"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_street_address'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12" style="margin-top: 30px">
                                <h5 class="text-success" style="margin-bottom: 0px">Property Amenities</h5>
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>

                            <div class="col-sm-12">
                                <div class="row">

                                    <?php  $amenities = set_value('nazac_property_amenities'); ?>

                                    <?php if(empty($amenities)){$amenities = array();} ?>

                                    <?php if(count($amenities) > 0){ ?>
                                        <?php for($i = 0; $i < count($amenities); $i++){ ?>
                                            <div class="col-sm-3 amennity" style="position:relative;">
                                                <label>Property Amenities <?php echo $i + 1 ?><span class="text-danger"> <small class="text-danger"></small></span></label>
                                                <?php //echo $i; ?>
                                                <input class="my_form form-control nazac_property_features" type="test" name="nazac_property_amenities[]" value="<?php echo $amenities[$i]; ?>">
                                                <!--<span onclick="removethisAmenity(this)" class="fa fa-times-circle text-danger amennity_remover" title="Click to remove field" ></span>-->
                                            </div>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php if(count($amenities) == 0){ ?>
                                    <div class="col-sm-3">
                                        <label>Property Amenities 1<span class="text-danger"> <small class="text-danger"></small></span></label>
                                        <input class="my_form form-control nazac_property_amenities" type="test" name="nazac_property_amenities[]" value="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Property Amenities 2<span class="text-danger"> <small class="text-danger"></small></span></label>
                                        <input class="my_form form-control nazac_property_amenities" type="test" name="nazac_property_amenities[]" value="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Property Amenities 3<span class="text-danger"> <small class="text-danger"></small></span></label>
                                        <input class="my_form form-control nazac_property_amenities" type="test" name="nazac_property_amenities[]" value="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Property Amenities 4<span class="text-danger"> <small class="text-danger"></small></span></label>
                                        <input class="my_form form-control nazac_property_amenities" type="test" name="nazac_property_amenities[]" value="">
                                    </div>
                                    <?php } ?>

                                    <div class="col-sm-12 marker">
                                        <button onclick="addAmenitiesField()" type="button" class="btn btn-small btn-info">Add Fields</button>
                                        <button onclick="removeAmenitiesField()" type="button" class="btn btn-small btn-danger">Remove Fields</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12" style="margin-top: 30px">
                                <h5 class="text-success" style="margin-bottom: 0px">Possible Bad Defects on Property</h5>
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>

                            <div class="col-sm-12">

                                <div class="row">

                                    <?php  $bad_defects = set_value('bad_defects'); ?>

                                    <?php if(empty($bad_defects)){$bad_defects = array();} ?>

                                    <?php if(count($bad_defects) > 0){ ?>
                                        <?php for($i = 0; $i < count($bad_defects); $i++){ ?>
                                            <div class="col-sm-3" style="position:relative;">
                                                <label>Property Amenities <?php echo $i + 1 ?><span class="text-danger"> <small class="text-danger"></small></span></label>
                                                <?php //echo $i; ?>
                                                <input class="my_form form-control bad_defects" type="test" name="bad_defects[]" value="<?php echo $bad_defects[$i]; ?>">
                                                <!--<span onclick="removethisAmenity(this)" class="fa fa-times-circle text-danger amennity_remover" title="Click to remove field" ></span>-->
                                            </div>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php if(count($bad_defects) == 0){ ?>

                                    <div class="col-sm-3">
                                        <label>Defect 1<span class="text-danger"> <small class="text-danger"></small></span></label>
                                        <input class="form-control bad_defects" type="test" name="bad_defects[]" value="<?php echo set_value('bad_defects[0]')?>">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Defect 2<span class="text-danger"> <small class="text-danger"></small></span></label>
                                        <input class="form-control bad_defects" type="test" name="bad_defects[]" value="<?php echo set_value('bad_defects[1]')?>">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Defect 3<span class="text-danger"> <small class="text-danger"></small></span></label>
                                        <input class="form-control bad_defects" type="test" name="bad_defects[]" value="<?php echo set_value('bad_defects[2]')?>">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Defect 4<span class="text-danger"> <small class="text-danger"></small></span></label>
                                        <input class="form-control bad_defects" type="test" name="bad_defects[]" value="<?php echo set_value('bad_defects[3]')?>">
                                    </div>
                                    <?php } ?>

                                    <div class="col-sm-12 marker_bad">
                                        <button onclick="addBadDefectsField()" type="button" class="btn btn-small btn-info">Add Fields</button>
                                        <button onclick="removeBadDefectsField()" type="button" class="btn btn-small btn-danger">Remove Fields</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12" style="margin-top: 20px;">
                                <div class="form-group field_error">
                                    <label>Add a Youtube Link<span class="text-danger"><strong></strong></span></label>
                                    <input class="my_form form-control" type="text" name="nazac_property_youtube_link" value="<?php echo set_value('nazac_property_youtube_link'); ?>" placeholder="https://www.youtube.com/watch?v=xxxxxxxx" id="nazac_property_youtube_link">
                                    <i class="icon_lock_alt"></i>
                                </div>
                            </div>

                            <div class="col-sm-12" style="margin-top: 30px">
                                <h5 class="text-success" style="margin-bottom: 0px">Closest Landmark Details</h5>
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Closest Landmark<span class="text-danger"><strong>*</strong></span></label>
                                    <input class="my_form form-control" type="text" name="nazac_property_closest_landmark" value="<?php echo set_value('nazac_property_closest_landmark'); ?>" id="nazac_property_closest_landmark">
                                    <i class="icon_lock_alt"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_closest_landmark'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Distance From Landmark<span class="text-danger"><strong>(KM)</strong></span></label>
                                    <input value="<?php echo set_value('nazac_property_distance_from_landmark'); ?>" class="my_form form-control" type="text" name="nazac_property_distance_from_landmark" id="nazac_property_distance_from_landmark">
                                    <i class="icon_lock_alt"></i>
                                </div>
                            </div>

                            <div class="col-sm-12" style="margin-top: 30px">
                                <h5 class="text-success" style="margin-bottom: 0px">Map Coordinates <small><a target="_blank" href="https://www.youtube.com/watch?v=2yOX7soSPeQ">(help)</a></small></h5>
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Longitude<span class="text-danger"><strong></strong></span></label>
                                    <input class="form-control" type="text" name="longitude" value="<?php echo set_value('longitude'); ?>" id="longitude">
                                    <i class="icon_lock_alt"></i>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Latitude<span class="text-danger"><strong></strong></span></label>
                                    <input value="<?php echo set_value('latitude'); ?>" class="form-control" type="text" name="latitude" id="latitude">
                                    <i class="icon_lock_alt"></i>
                                </div>
                            </div>

                            <div class="col-sm-12" style="margin-top: 30px">
                                <h5 class="text-success" style="margin-bottom: 0px">Details of The Property Manager</h5>
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group field_error">
                                    <label>Property manager's  Full Name <span class="text-danger"><strong></strong></span></label>
                                    <input value="<?php echo set_value('nazac_property_caretaker_name'); ?>" class="my_form form-control" type="text" name="nazac_property_caretaker_name" id="nazac_property_caretaker_name">
                                    <i class="icon_lock_alt"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_caretaker_name'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Property Manager`s Phone Number 1<span class="text-danger"><strong></strong></span></label>
                                    <input class="my_form form-control" type="text" name="nazac_property_caretaker_phone" value="<?php echo set_value('nazac_property_caretaker_phone'); ?>">
                                    <i class="icon_lock_alt"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_caretaker_phone'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Property Manager`s Phone Number 2<span class="text-danger"><strong></strong></span></label>
                                    <input value="<?php echo set_value('nazac_property_caretaker_phone_2'); ?>" class="my_form form-control" type="text" name="nazac_property_caretaker_phone_2">
                                    <i class="icon_lock_alt"></i>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group field_error">
                                    <label>Recipient's Account Name<span class="text-danger"><strong></strong></span></label>
                                    <input class="my_form form-control" type="text" name="nazac_property_caretaker_ac_name" value="<?php echo set_value('nazac_property_caretaker_ac_name'); ?>">
                                    <i class="icon_lock_alt"></i>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group field_error">
                                    <label>Recipient's Account Number<span class="text-danger"><strong></strong></span></label>
                                    <input class="my_form form-control" type="text" name="nazac_property_caretaker_ac_nom" value="<?php echo set_value('nazac_property_caretaker_ac_nom'); ?>" >
                                    <i class="icon_lock_alt"></i>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group field_error">
                                    <label>Recipient's Bank Name<span class="text-danger"><strong></strong></span></label>
                                    <?php $entered_bank_name = set_value('nazac_property_caretaker_bank_name') ?>
                                    <select onchange="removeErrorDisplayer(this)" name="nazac_property_caretaker_bank_name" class="form-control">
                                        <option value="" selected="selected">--Select Bank Name*--</option>
                                        <?php foreach($this->Admin->returnBankNames() as $k => $bank_name){ ?>

                                            <option <?php if($bank_name === $entered_bank_name){ echo 'selected'; } ?> value="<?php echo $bank_name; ?>">
                                                <?php echo ucwords($bank_name); ?>
                                            </option>

                                        <?php } ?>
                                    </select>

                                    <!--<input value="<?php /*echo set_value('nazac_property_caretaker_bank_name'); */?>" class="my_form form-control" type="text" name="">-->
                                    <i class="icon_lock_alt"></i>
                                </div>
                            </div>

                            <div class="col-sm-12" style="margin-top: 30px">
                                <h5 class="text-success" style="margin-bottom: 0px">Additional Fees</h5>
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Legal Fee<span class="text-danger"><strong>*</strong></span></label>
                                    <input class="my_form form-control" type="text" id="nazac_property_legal_fee" name="nazac_property_legal_fee" value="<?php echo set_value('nazac_property_legal_fee'); ?>">
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_legal_fee'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Agent`s Fee<span class="text-danger"><strong>*</strong></span></label>
                                    <input class="my_form form-control" type="text" id="no_of_parking_space" name="nazac_property_agents_fee" value="<?php echo set_value('nazac_property_agents_fee'); ?>">
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_agents_fee'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group field_error">
                                    <label>Property Description<span class="text-danger"><strong>*</strong></span></label>
                                    <button style="display: inline-block; margin-bottom: 10px;" onclick="previewAssessment(this)" type="button" class="btn btn-primary">View Preview</button>
                                    <textarea onblur="removeErrorDisplayer(this)" class="summernote ed_property_description form-control" placeholder="Enter News Here" name="description"><?php echo set_value('description'); ?></textarea>
                                    <i class="icon_lock_alt"></i>
                                    <div class="error_display">
                                        <?php echo form_error('description'); ?>
                                    </div>
                                </div>
                            </div>

                            <!--<div class="col-sm-4">
                                <div class="form-group field_error">
                                    <label>Caretaker's/Land Lord's Email Address<span class="text-danger"><strong></strong></span></label>
                                    <input value="<?php /*echo set_value('nazac_property_caretaker_email'); */?>" class="my_form form-control" type="email" name="nazac_property_caretaker_email">
                                    <i class="icon_lock_alt"></i>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group field_error">
                                    <label>Caretaker's/Land Lord's Address<span class="text-danger"><strong></strong></span></label>
                                    <input class="my_form form-control" type="text" name="nazac_property_caretaker_address" value="<?php /*echo set_value('nazac_property_caretaker_address'); */?>">
                                    <i class="icon_lock_alt"></i>
                                </div>
                            </div>-->

                            <div class="col-sm-6 col-sm-offset-3" style="margin-bottom: 30px;">
                                <div id="pass-info" class="clearfix"></div>
                                <button style="background: #121B22; border-color:#121B22;" typeof="submit" class="btn btn-block btn-info btn-lg">Continue</button>
                            </div>


                        </div>

                    </form>

                </div>

            </div>
        <?php } ?>
    </div>

</div>

<!-- END SECTION 404 -->