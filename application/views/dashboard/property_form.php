<body class="inner-pages">
<!-- START SECTION 404 -->
<?php //print_r($listed_property_details_array); ?>
<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url('resource/loader/loading_spinner.gif');?>"></span>

<div class="container-fluid">

    <div class="row" style="background-color: #edeff1;">

        <?php if($this->uri->segment(6) && $this->uri->segment(7)){ ?>

            <div class="col-sm-10 col-sm-offset-1">

                <div style="width: 100%; background-color: white; padding-top: 50px;">
                    <form method="post" autocomplete="off" action="<?php echo base_url('agents/mains/process_property_form_update/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7)); ?>" style="width:94%; margin-left: 3%;">
                        <div class="row" style="">

                            <div class="col-sm-12 text-center">

                                <h2 style="font-size: 23px;" class="text-success text-center">Edit Apartments/Rooms For Rent on <?php print $siteDetail['site_name'];?></h2>
                                <!--<p class="text-center">Edit Property for Rent.</p>-->
                            </div>

                            <?php
                            if( $this->session->flashdata('property_addition_error') ){ ?>
                                <div class="col-sm-12 alert alert-warning text-center" style="margin-top: 30px">
                                    <?php
                                    echo validation_errors();
                                    echo $this->session->flashdata('property_addition_error');
                                    ?>
                                </div>
                            <?php } ?>

                            <div class="col-sm-12" style="margin-top: 30px">
                                <h5 class="text-success" style="margin-bottom: 0px">Property Details</h5>
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group field_error">
                                    <label>Title for Property/Apartment<span class="text-danger"><strong>*</strong></span></label>
                                    <input onblur="removeErrorDisplayer(this)" placeholder="Eg: Two Bed Room Flat" class="my_form form-control" type="text" id="title_of_lodge" name="title_of_lodge" value="<?php echo $listed_property_details_array[0]['nazac_property_title']; ?>">
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_category'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group field_error">
                                    <label>Room Number<span class="text-danger"><strong>*</strong></span></label>
                                    <input onblur="removeErrorDisplayer(this)" placeholder="Format : 001" class="my_form form-control" readonly type="text" id="title_of_lodge" name="room_no" value="<?php echo $listed_property_details_array[0]['nazac_property_room_number']; ?>">
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('room_no'); ?>
                                    </div>
                                </div>
                            </div>
                            
                          <div class="col-sm-4">
                            <div class="form-group field_error">
                                <label>Property Rent Duration<span class="text-danger"><strong>*</strong></span></label>
                                <input onblur="removeErrorDisplayer(this)" placeholder="Eg: 2 - 12" class="my_form form-control" type="number" id="duration" name="duration" value="<?php echo $listed_property_details_array[0]['nazac_property_duration']; ?>">
                                <i class="ti-user"></i>
                                <div class="error_display">
                                    <?php echo form_error('nazac_property_duration'); ?>
                                </div>
                            </div>
                        </div>

                            <div class="col-sm-4">
                                <div class="form-group field_error">
                                    <label>Property Categories<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="nazac_property_category" class="form-control">
                                        <option value="" selected="selected">--Select Property Category*--</option>
                                        <?php foreach($property_category_details as $k => $value){ ?>

                                            <option <?php if($listed_property_details_array[0]['nazac_property_category'] === $value['nazac_category_id']){ echo 'selected'; } ?> value="<?php echo $value['nazac_category_id']; ?>">
                                                <?php echo $value['nazac_category_name']; ?>
                                            </option>

                                        <?php } ?>
                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_category'); //die(); ?>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-4">
                                <div class="form-group field_error">
                                    <label>Property Type<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="nazac_property_type" class="form-control">
                                        <option value="" selected="selected">--Select Property Type*--</option>
                                        <?php foreach($property_type_details as $k => $value){ ?>

                                            <option <?php if($listed_property_details_array[0]['nazac_property_type'] === $value['property_type']){ echo 'selected'; } ?> value="<?php echo $value['property_type']; ?>">
                                                <?php echo $value['property_type']; ?>
                                            </option>

                                        <?php } ?>
                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_type'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group field_error">
                                    <label>Property Purpose<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="nazac_property_purpose" class="form-control">
                                        <option value="" selected="selected">--Select Property Purpose*--</option>
                                        <?php foreach($property_purpose_details as $k => $value){ ?>

                                            <option <?php if($listed_property_details_array[0]['nazac_property_purpose'] === $value['property_purpose']){ echo 'selected'; } ?> value="<?php echo $value['property_purpose']; ?>">
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
                                    <label>Currency<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="currency" class="currency form-control">
                                        <option value="">--Select Currency*--</option>
                                        <option value="NGN" selected="selected">NGN</option>
                                        <option value="USD">USD</option>
                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('currency'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group field_error">
                                    <label>Price Attached<span class="text-danger"><strong>*</strong></span></label>
                                    <input onblur="removeErrorDisplayer(this)" class="my_form form-control" type="number" id="price_attached" name="price_attached" value="<?php echo $listed_property_details_array[0]['nazac_property_price'] ?>">
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('price_attached'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group field_error">
                                    <label>Older Price<span class="text-danger"><strong></strong></span></label>
                                    <input onblur="removeErrorDisplayer(this)" class="my_form form-control" type="number" id="older_price" name="older_price" value="<?php echo $listed_property_details_array[0]['nazac_property_older_price'] ?>">
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group field_error">
                                    <label>Property Status<span class="text-danger"><strong>*</strong></span></label>
                                    <select  onchange="removeErrorDisplayer(this)" name="property_status" class="form-control">
                                        <option value="available" selected="selected">Available</option>
                                        <option value="not_avalaible" >Not Available</option>
                                        <?php
                                        $value = $listed_property_details_array[0]['nazac_property_status'];
                                        if(!empty($value)){ ?>
                                            <option value="<?php echo $value; ?>" selected="selected"><?php echo $value; ?></option>
                                        <?php } ?>

                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('property_status'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group field_error">
                                    <label>Apartment Standard<span class="text-danger"><strong></strong></span></label>
                                    <select name="apartment_standard" class="form-control">
                                        <option value="" selected="selected">--Select Property Type*--</option>
                                        <option <?php if($property_details_array[0]['nazac_apartment_standard'] === 'Furnished'){ echo 'selected'; } ?> value="Furnished">Furnished</option>
                                        <option <?php if($property_details_array[0]['nazac_apartment_standard'] === 'Renovated'){ echo 'selected'; } ?> value="Renovated">Renovated</option>
                                        <option <?php if($property_details_array[0]['nazac_apartment_standard'] === 'Serviced'){ echo 'selected'; } ?> value="Serviced">Serviced</option>
                                        <option <?php if($property_details_array[0]['nazac_apartment_standard'] === 'Not Furnished'){ echo 'selected'; } ?> value="Not Furnished">Not Furnished</option>
                                    </select>
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label><small>Approximate Size of Apartment/Property Size(eg: 720 sq ft)</small><span class="text-danger"><strong></strong></span></label>
                                    <input class="my_form form-control" type="text" id="property_size" name="property_size" value="<?php echo $listed_property_details_array[0]['nazac_property_approximate_size'] ?>">
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Payment Mood<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="payment_mood" class="form-control">
                                        <option value="" selected="selected">--Select Payment Mood*--</option>
                                        <?php foreach($payment_mood_details as $k => $value){ ?>

                                            <option value="<?php echo $value['payment_mood']; ?>">
                                                <?php echo $value['payment_mood']; ?>
                                            </option>

                                        <?php } ?>
                                        <?php
                                        $value = $listed_property_details_array[0]['nazac_payment_type'];
                                        if(!empty($value)){ ?>
                                            <option value="<?php echo $value; ?>" selected="selected"><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('payment_mood'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group field_error">
                                    <label>Floor Type<span class="text-danger"><strong></strong></span></label>
                                    <select name="floor_type" class="form-control">
                                        <option value="">--Select Floor Type*--</option>
                                        <option value="Ground Floor" selected="selected">Ground Floor</option>
                                        <option value="First Floor">First Floor</option>
                                        <option value="Second Floor">Second Floor</option>
                                        <option value="Third Floor">Third Floor</option>
                                        <option value="Fourth Floor">Fourth Floor</option>
                                        <option value="Fifth Floor">Fifth Floor</option>
                                        <option value="Fifth Floor(+)">Fifth Floor(+)</option>
                                        <?php
                                        $value = $listed_property_details_array[0]['nazac_property_floor_type'];
                                        if(!empty($value)){ ?>
                                            <option value="<?php echo $value; ?>" selected="selected"><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                    <i class="ti-user"></i>

                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group field_error">
                                    <label>No of Bed Rooms<span class="text-danger"><strong></strong></span></label>
                                    <input class="my_form form-control" type="text" id="bedroom_no" name="bedroom_no" value="<?php echo $listed_property_details_array[0]['nazac_property_no_of_rooms']; ?>">
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group field_error">
                                    <label>No of Toilets<span class="text-danger"><strong></strong></span></label>
                                    <input class="my_form form-control" type="text" id="no_of_toilets" name="no_of_toilets" value="<?php echo $listed_property_details_array[0]['nazac_property_no_of_toilets']; ?>">
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group field_error">
                                    <label>No of Bath Rooms<span class="text-danger"><strong></strong></span></label>
                                    <input class="my_form form-control" type="text" id="no_of_bathrooms" name="no_of_bathrooms" value="<?php echo $listed_property_details_array[0]['nazac_property_no_of_bathrooms']; ?>">
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group field_error">
                                    <label>No of Parking Space<span class="text-danger"><strong></strong></span></label>
                                    <input class="my_form form-control" type="text" id="no_of_parking_space" name="no_of_parking_space" value="<?php echo $listed_property_details_array[0]['nazac_property_no_of_parking_space']; ?>">
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="col-sm-9">
                                <div class="form-group field_error">
                                    <label>Add a Youtube Link<span class="text-danger"><strong> (<small>Upload a video about the property to youtube and its link below</small>)</strong></span></label>
                                    <input class="my_form form-control" type="text" name="nazac_property_youtube_link" value="<?php echo $listed_property_details_array[0]['nazac_property_youtube_link']; ?>" placeholder="https://www.youtube.com/watch?v=xxxxxxxx" id="nazac_property_youtube_link">
                                    <i class="icon_lock_alt"></i>
                                </div>
                            </div>

                            <div class="col-sm-12" style="margin-top: 30px">
                                <h5 class="text-success" style="margin-bottom: 0px">Additional Apartment/Property Features</h5>
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>

                            <div class="col-sm-12">
                                <div class="row">

                                    <?php  $features = $this->Admin->explodeImplodeValue($listed_property_details_array[0]['nazac_property_features'], ',', ',', 'neat_explosion'); ?>

                                    <?php if(count($features) > 0){ ?>
                                    <?php for($i = 0; $i < count($features); $i++){; ?>
                                        <div class="col-sm-3">
                                            <label>Feature <?php echo $i+1 ?><span class="text-danger"> <small class="text-danger"></small></span></label>
                                            <input class="my_form form-control nazac_property_features" type="test" name="nazac_property_features[]" value="<?php echo $features[$i]; ?>">
                                        </div>
                                    <?php } ?>
                                    <?php } ?>

                                    <?php if(count($features) == 0){ ?>
                                        <?php for($i = 0; $i < 4; $i++){; ?>
                                            <div class="col-sm-3">
                                                <label>Feature <?php echo $i+1 ?><span class="text-danger"> <small class="text-danger"></small></span></label>
                                                <input class="my_form form-control nazac_property_features" type="test" name="nazac_property_features[]" value="<?php echo $features[$i]; ?>">
                                            </div>
                                        <?php } ?>
                                    <?php } ?>


                                    <div class="col-sm-12 marker_good">
                                        <button onclick="addPropertyFeatureField()" type="button" class="btn btn-small btn-info">Add Fields</button>
                                        <button onclick="removePropertyFeatureField()" type="button" class="btn btn-small btn-danger">Remove Fields</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12" style="margin-top: 30px">
                                <h5 class="text-success" style="margin-bottom: 0px">Possible Bad Defects on Property</h5>
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>

                            <div class="col-sm-12">

                                <div class="row">

                                    <?php  $defect_features = $this->Admin->explodeImplodeValue($listed_property_details_array[0]['nazac_property_defect_features'], ',', ',', 'neat_explosion');?>

                                    <?php if(count($defect_features) > 0){ ?>
                                    <?php for($i = 0; $i < count($defect_features); $i++){; ?>
                                    <div class="col-sm-3">
                                        <label>Defect <?php echo $i+1 ?><span class="text-danger"> <small class="text-danger"></small></span></label>
                                        <input class="form-control bad_defects" type="test" name="bad_defects[]" value="<?php echo $defect_features[$i] ?>">
                                    </div>
                                    <?php } ?>
                                    <?php } ?>

                                    <?php if(count($defect_features) == 0){ ?>
                                        <?php for($i = 0; $i < 4; $i++){; ?>
                                            <div class="col-sm-3">
                                                <label>Defect <?php echo $i+1 ?><span class="text-danger"> <small class="text-danger"></small></span></label>
                                                <input class="form-control bad_defects" type="test" name="bad_defects[]" value="<?php echo set_value('bad_defects['.$i.']')?>">
                                            </div>
                                        <?php } ?>
                                    <?php } ?>

                                    <div class="col-sm-12 marker_bad">
                                        <button onclick="addBadDefectsField()" type="button" class="btn btn-small btn-info">Add Fields</button>
                                        <button onclick="removeBadDefectsField()" type="button" class="btn btn-small btn-danger">Remove Fields</button>
                                    </div>
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

                                            <option <?php if($value === $listed_property_details_array[0]['nazac_property_country']){echo 'selected';} ?> value="<?php echo $value; ?>">
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

                                            <option <?php if($value === $listed_property_details_array[0]['nazac_property_state']){echo 'selected';} ?> value="<?php echo $value; ?>">
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

                                        <option value="<?php echo $listed_property_details_array[0]['nazac_property_local_gov_area']; ?>">
                                            <?php echo $listed_property_details_array[0]['nazac_property_local_gov_area']; ?>
                                        </option>

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
                                    <input onblur="removeErrorDisplayer(this)" class="form-control" type="text" name="nazac_property_town" value="<?php echo $listed_property_details_array[0]['nazac_property_town']; ?>" placeholder="Eg: Uwani" id="town_located">
                                    <i class="icon_lock_alt"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_town'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group field_error">
                                    <label>Street/Road<span class="text-danger"><strong>*</strong></span></label>
                                    <input onblur="removeErrorDisplayer(this)" class="form-control" type="text"  name="nazac_property_street_address" value="<?php echo $listed_property_details_array[0]['nazac_property_street_address']; ?>" placeholder="Eg: No 3 Kenyeta Street" id="town_located">
                                    <i class="icon_lock_alt"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_street_address'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12" style="margin-top: 30px">
                                <h5 class="text-success" style="margin-bottom: 0px">Map Coordinates, Help people find this property easily <small><a target="_blank" href="https://www.youtube.com/watch?v=2yOX7soSPeQ">(help)</a></small></h5>
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>
                            <?php  $map_coordinates = $this->Admin->explodeImplodeValue($listed_property_details_array[0]['nazac_property_map_cordinates'], ',', ',', 'neat_explosion');?>
                            <?php if(count($map_coordinates) == 0){ $logitude = ''; $latitude = ''; }else{ $logitude = $map_coordinates[0]; $latitude = $map_coordinates[1]; }?>

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Longitude<span class="text-danger"><strong></strong></span></label>
                                    <input class="form-control" type="text" name="longitude" value="<?php echo $logitude; ?>" id="longitude">
                                    <i class="icon_lock_alt"></i>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Latitude<span class="text-danger"><strong></strong></span></label>
                                    <input value="<?php echo $latitude; ?>" class="form-control" type="text" name="latitude" id="latitude">
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
                                    <input class="my_form form-control" type="text" id="nazac_property_legal_fee" name="nazac_property_legal_fee" value="<?php echo $listed_property_details_array[0]['nazac_property_legal_fee']; ?>">
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_legal_fee'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Agent`s Fee<span class="text-danger"><strong>*</strong></span></label>
                                    <input class="my_form form-control" type="text" id="no_of_parking_space" name="nazac_property_agents_fee" value="<?php echo $listed_property_details_array[0]['nazac_property_agents_fee']; ?>">
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
                                    <textarea onblur="removeErrorDisplayer(this)" class="summernote ed_property_description form-control" placeholder="Enter News Here" name="description"><?php echo $listed_property_details_array[0]['nazac_property_description']; ?></textarea>
                                    <i class="icon_lock_alt"></i>
                                    <div class="error_display">
                                        <?php echo form_error('description'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8 col-sm-offset-2" style="margin-bottom: 30px;">
                                <div id="pass-info" class="clearfix"></div>
                                <button style="background: #121B22; border-color:#121B22;" typeof="submit" class="btn btn-block btn-info btn-lg">Save & Continue</button>
                            </div>


                        </div>

                    </form>

                </div>

            </div>

        <?php } ?>

        <?php if(!$this->uri->segment(6) && !$this->uri->segment(7)){ ?>

            <div class="col-sm-10 col-sm-offset-1">

                <div style="width: 100%; background-color: white; padding-top: 50px;">
                    <form method="post" autocomplete="off" action="<?php echo base_url('agents/mains/process_property_form/'.$this->uri->segment(4).'/'.$this->uri->segment(5)); ?>" style="width:94%; margin-left: 3%;">
                        <div class="row" style="">

                            <div class="col-sm-12 text-center">

                                <h2 style="font-size: 23px;" class="text-success text-center">Add Apartments/Rooms For Rent on <?php print $siteDetail['site_name'];?></h2>
                                <p class="text-center">List Property for Rent.</p>
                            </div>

                            <?php
                            if( $this->session->flashdata('property_addition_error') ){ ?>
                                <div class="col-sm-12 alert alert-warning text-center" style="margin-top: 30px">
                                    <?php
                                    echo $this->session->flashdata('property_addition_error');
                                    ?>
                                </div>
                            <?php } ?>

                            <div class="col-sm-12" style="margin-top: 30px">
                                <h5 class="text-success" style="margin-bottom: 0px">Property Details</h5>
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group field_error">
                                    <label>Title for Property/Apartment<span class="text-danger"><strong>*</strong></span></label>
                                    <input onblur="removeErrorDisplayer(this)" placeholder="Eg: Two Bed Room Flat" class="my_form form-control" type="text" id="title_of_lodge" name="title_of_lodge" value="<?php echo set_value('title_of_lodge'); ?>">
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('title_of_lodge'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">

                                <?php $current_room_num = $this->Admin->getActualRoomNumber($last_apartment_added_for_this_property) ?>

                                <div class="form-group field_error">
                                    <label>Room Number <?php if(count($last_apartment_added_for_this_property) > 0){  ?> (<small><strong>Last Room Number : <?php echo $last_apartment_added_for_this_property[0]['nazac_property_room_number']; ?> </strong></small>) <?php } ?> <span class="text-danger"><strong>*</strong></span></label>

                                    <input readonly onblur="removeErrorDisplayer(this)" placeholder="Format : 001" value="<?php echo  $current_room_num; ?>" class="my_form form-control" type="text" id="title_of_lodge" name="room_no" >
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('room_no'); ?>
                                    </div>
                                </div>
                            </div>
                            
                            
                             <div class="col-sm-4">
                                 <?php $rent_duration_value = set_value('duration') ?>
                                 <?php if(!empty($rent_duration_value)){ $rent_duration_value = $rent_duration_value; }else{ $rent_duration_value =  12; }?>

                            <div class="form-group field_error">
                                <label>Property Rent Duration in Month(s)<span class="text-danger"><strong>*</strong></span></label>
                                <input onblur="removeErrorDisplayer(this)" placeholder="Eg: 2 - 12" class="my_form form-control" type="number" id="duration" name="duration" value="<?php echo $rent_duration_value; ?>">
                                <i class="ti-user"></i>
                                <div class="error_display">
                                    <?php echo form_error('nazac_property_duration'); ?>
                                </div>
                            </div>
                        </div>

                            <div class="col-sm-4" >
                                <div class="form-group field_error">
                                    <label>Property Categories<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="nazac_property_category" class="form-control">
                                        <option value="" selected="selected">--Select Property Category*--</option>
                                        <?php foreach($property_category_details as $k => $value){ ?>

                                            <option <?php if($value['nazac_category_id'] === 'REB1574849886D5E'){ echo 'selected'; } ?> value="<?php echo $value['nazac_category_id']; ?>">
                                                <?php echo $value['nazac_category_name']; ?>
                                            </option>

                                        <?php } ?>
                                        <?php
                                        $value = set_value('nazac_property_category');
                                        if(!empty($value)){ ?>
                                            <option value="<?php echo $value; ?>" selected="selected"><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_category'); //die(); ?>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-4">
                                <div class="form-group field_error">
                                    <label>Property Type<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="nazac_property_type" class="form-control">
                                        <option value="" selected="selected">--Select Property Type*--</option>
                                        <?php foreach($property_type_details as $k => $value){ ?>

                                            <option <?php if($property_details_array[0]['nazac_property_type'] === $value['property_type']){ echo 'selected'; } ?> value="<?php echo $value['property_type']; ?>">
                                                <?php echo ucwords($value['property_type']); ?>
                                            </option>

                                        <?php } ?>
                                        <?php
                                        $value = set_value('nazac_property_type');
                                        if(!empty($value)){ ?>
                                            <option value="<?php echo $value; ?>" selected="selected"><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_type'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group field_error">
                                    <label>Property Purpose<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="nazac_property_purpose" class="form-control">
                                        <option value="" selected="selected">--Select Property Purpose*--</option>
                                        <?php foreach($property_purpose_details as $k => $value){ ?>

                                            <option <?php if($property_details_array[0]['nazac_property_purpose'] === $value['property_purpose']){ echo 'selected'; } ?> value="<?php echo $value['property_purpose']; ?>">
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
                                        <option <?php if($property_details_array[0]['nazac_property_currency'] === 'NGN'){ echo 'selected'; } ?> value="NGN" selected="selected">NGN</option>
                                        <option <?php if($property_details_array[0]['nazac_property_purpose'] === 'USD'){ echo 'selected'; } ?> value="USD">USD</option>
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

                            <div class="col-sm-2">
                                <div class="form-group field_error">
                                    <label>Price Attached<span class="text-danger"><strong>*</strong></span></label>
                                    <input onblur="removeErrorDisplayer(this)" class="my_form form-control" type="number" id="price_attached" name="price_attached" value="<?php echo $property_details_array[0]['nazac_property_price']; ?>">
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('price_attached'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group field_error">
                                    <label>Older Price<span class="text-danger"><strong></strong></span></label>
                                    <input onblur="removeErrorDisplayer(this)" class="my_form form-control" type="number" id="older_price" name="older_price" value="<?php echo $property_details_array[0]['nazac_property_older_price']; ?>">
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group field_error">
                                    <label>Property Status<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="property_status" class="form-control">
                                        <option value="available" selected="selected">Available</option>
                                        <option value="not_avalaible" >Not Available</option>

                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('property_status'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group field_error">
                                    <label>Apartment Standard<span class="text-danger"><strong></strong></span></label>
                                    <select name="apartment_standard" class="form-control">
                                        <option value="" selected="selected">--Select Property Type*--</option>
                                        <option <?php if($property_details_array[0]['nazac_apartment_standard'] === 'Furnished'){ echo 'selected'; } ?> value="Furnished">Furnished</option>
                                        <option <?php if($property_details_array[0]['nazac_apartment_standard'] === 'Renovated'){ echo 'selected'; } ?> value="Renovated">Renovated</option>
                                        <option <?php if($property_details_array[0]['nazac_apartment_standard'] === 'Serviced'){ echo 'selected'; } ?> value="Serviced">Serviced</option>
                                        <option <?php if($property_details_array[0]['nazac_apartment_standard'] === 'Not Furnished'){ echo 'selected'; } ?> value="Not Furnished">Not Furnished</option>
                                    </select>
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label><small>Approximate Size of Apartment/Property Size(eg: 720 sq ft)</small><span class="text-danger"><strong></strong></span></label>
                                    <input class="my_form form-control" type="text" id="property_size" name="property_size" value="<?php echo set_value('property_size'); ?>">
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden">
                                <div class="form-group field_error">
                                    <label>Apartment Standard<span class="text-danger"><strong></strong></span></label>
                                    <select name="apartment_standard" class="form-control">
                                        <option value="" selected="selected">--Select Property Type*--</option>
                                        <option value="Furnished">Furnished</option>
                                        <option value="Renovated">Renovated</option>
                                        <option value="Serviced">Serviced</option>
                                        <option value="Not Furnished">Not Furnished</option>
                                        <?php
                                        $value = set_value('apartment_standard');
                                        if(!empty($value)){ ?>
                                            <option value="<?php echo $value; ?>" selected="selected"><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Payment Mood<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="payment_mood" class="form-control">
                                        <option value="" selected="selected">--Select Payment Mood*--</option>
                                        <?php foreach($payment_mood_details as $k => $value){ ?>

                                            <option <?php if($value['payment_mood'] === 'Annually'){ echo 'selected'; } ?> value="<?php echo $value['payment_mood']; ?>">
                                                <?php echo $value['payment_mood']; ?>
                                            </option>

                                        <?php } ?>
                                        <?php
                                        $value = set_value('payment_mood');
                                        if(!empty($value)){ ?>
                                            <option value="<?php echo $value; ?>" selected="selected"><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('payment_mood'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group field_error">
                                    <label>Floor Type<span class="text-danger"><strong></strong></span></label>
                                    <select name="floor_type" class="form-control">
                                        <option value="">--Select Floor Type*--</option>
                                        <option value="Ground Floor" selected="selected">Ground Floor</option>
                                        <option value="First Floor">First Floor</option>
                                        <option value="Second Floor">Second Floor</option>
                                        <option value="Third Floor">Third Floor</option>
                                        <option value="Fourth Floor">Fourth Floor</option>
                                        <option value="Fifth Floor">Fifth Floor</option>
                                        <option value="Fifth Floor(+)">Fifth Floor(+)</option>
                                        <?php
                                        $value = set_value('floor_type');
                                        if(!empty($value)){ ?>
                                            <option value="<?php echo $value; ?>" selected="selected"><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                    <i class="ti-user"></i>

                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group field_error">
                                    <label>No of Bed Rooms<span class="text-danger"><strong></strong></span></label>
                                    <input class="my_form form-control" type="text" id="bedroom_no" name="bedroom_no" value="<?php echo set_value('bedroom_no'); ?>">
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group field_error">
                                    <label>No of Toilets<span class="text-danger"><strong></strong></span></label>
                                    <input class="my_form form-control" type="text" id="no_of_toilets" name="no_of_toilets" value="<?php echo set_value('no_of_toilets'); ?>">
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group field_error">
                                    <label>No of Bath Rooms<span class="text-danger"><strong></strong></span></label>
                                    <input class="my_form form-control" type="text" id="no_of_bathrooms" name="no_of_bathrooms" value="<?php echo set_value('no_of_bathrooms'); ?>">
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group field_error">
                                    <label>No of Parking Space<span class="text-danger"><strong></strong></span></label>
                                    <input class="my_form form-control" type="text" id="no_of_parking_space" name="no_of_parking_space" value="<?php echo $property_details_array[0]['no_of_parking_space']; ?>">
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group field_error">
                                    <label>Add a Youtube Link<span class="text-danger"><strong> (<small>Upload a video about the property to youtube and its link below</small>)</strong></span></label>
                                    <input class="my_form form-control" type="text" name="nazac_property_youtube_link" value="<?php echo $property_details_array[0]['nazac_property_youtube_video']; ?>" placeholder="https://www.youtube.com/watch?v=xxxxxxxx" id="nazac_property_youtube_link">
                                    <i class="icon_lock_alt"></i>
                                </div>
                            </div>

                            <div class="col-sm-12" style="margin-top: 30px">
                                <h5 class="text-success" style="margin-bottom: 0px">Additional Apartment/Property Features</h5>
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>

                            <div class="col-sm-12">
                                <div class="row">

                                    <?php  $amenities = $this->Admin->explodeImplodeValue($property_details_array[0]['nazac_property_amenities'], ',', ',', 'neat_explosion'); ?>
                                    <?php if(count($amenities) > 0){ ?>
                                        <?php for($i = 0; $i < count($amenities); $i++){ ?>
                                            <div class="col-sm-3 amennity" style="position:relative;">
                                                <label>Feature <?php echo $i + 1 ?><span class="text-danger"> <small class="text-danger"></small></span></label>
                                                <?php //echo $i; ?>
                                                <input class="my_form form-control nazac_property_features" type="test" name="nazac_property_features[]" value="<?php echo $amenities[$i]; ?>">
                                                <span onclick="removethisAmenity(this)" class="fa fa-times-circle text-danger amennity_remover" title="Click to remove field" ></span>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php if(count($amenities) == 0){ ?>
                                        <?php for($i = 0; $i < 4; $i++){; ?>
                                            <div class="col-sm-3">
                                                <label>Feature <?php echo $i + 1 ?><span class="text-danger"> <small class="text-danger"></small></span></label>
                                                <input class="my_form form-control nazac_property_features" type="test" name="nazac_property_features[<?php echo $i; ?>]" value="">
                                            </div>
                                        <?php } ?>
                                    <?php } ?>

                                    <div class="col-sm-12 marker_good">
                                        <button onclick="addPropertyFeatureField()" type="button" class="btn btn-small btn-info">Add Fields</button>
                                        <button onclick="removePropertyFeatureField()" type="button" class="btn btn-small btn-danger">Remove Fields</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12" style="margin-top: 30px">
                                <h5 class="text-success" style="margin-bottom: 0px">Possible Bad Defects on Property</h5>
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>

                            <div class="col-sm-12">

                                <div class="row">

                                    <?php  $bad_features = $this->Admin->explodeImplodeValue($property_details_array[0]['nazac_property_bad_defects'], ',', ',', 'neat_explosion'); ?>
                                    <?php if(count($bad_features) > 0){ ?>
                                        <?php for($i = 0; $i < count($bad_features); $i++){ ?>
                                            <div class="col-sm-3 amennity" style="position:relative;">
                                                <label>Defect <?php echo $i + 1 ?><span class="text-danger"> <small class="text-danger"></small></span></label>
                                                <?php //echo $i; ?>
                                                <input class="my_form form-control bad_defects" type="test" name="bad_defects[]" value="<?php echo $bad_features[$i]; ?>">
                                                <span onclick="removethisAmenity(this)" class="fa fa-times-circle text-danger amennity_remover" title="Click to remove field" ></span>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php if(count($bad_features) == 0){ ?>
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

                                            <option <?php if($property_details_array[0]['nazac_property_country'] === $value){echo 'selected';} ?> value="<?php echo $value; ?>">
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

                                            <option <?php if($property_details_array[0]['nazac_property_state'] === $value ){ echo 'selected'; } ?> value="<?php echo $value; ?>">
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

                                        <option value="<?php echo $property_details_array[0]['nazac_property_local_gov_area']; ?>">
                                            <?php echo ucfirst($property_details_array[0]['nazac_property_local_gov_area']); ?>
                                        </option>

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
                                    <input onblur="removeErrorDisplayer(this)" class="form-control" type="text" name="nazac_property_town" value="<?php echo $property_details_array[0]['nazac_property_town']; ?>" placeholder="Eg: Uwani" id="town_located">
                                    <i class="icon_lock_alt"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_town'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group field_error">
                                    <label>Street/Road<span class="text-danger"><strong>*</strong></span></label>
                                    <input onblur="removeErrorDisplayer(this)" class="form-control" type="text" name="nazac_property_street_address" value="<?php echo $property_details_array[0]['nazac_property_street_address']; ?>" placeholder="Eg: No 3 Kenyeta Street" id="town_located">
                                    <i class="icon_lock_alt"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_street_address'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12" style="margin-top: 30px">
                                <h5 class="text-success" style="margin-bottom: 0px">Map Coordinates, Help people find this property easily <small><a target="_blank" href="https://www.youtube.com/watch?v=2yOX7soSPeQ">(help)</a></small></h5>
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>

                            <?php $nazac_property_map_cordinates =  explode(',', $property_details_array[0]['nazac_property_map_cordinates']); ?>
                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Longitude<span class="text-danger"><strong></strong></span></label>
                                    <input class="form-control" type="text" name="longitude" value="<?php echo $nazac_property_map_cordinates[0] ?>" id="longitude">
                                    <i class="icon_lock_alt"></i>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Latitude<span class="text-danger"><strong></strong></span></label>
                                    <input value="<?php echo $nazac_property_map_cordinates[1] ?>" class="form-control" type="text" name="latitude" id="latitude">
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
                                    <input class="my_form form-control" type="text" id="nazac_property_legal_fee" name="nazac_property_legal_fee" value="<?php echo $property_details_array[0]['nazac_property_legal_fee']; ?>">
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_legal_fee'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Agent`s Fee<span class="text-danger"><strong>*</strong></span></label>
                                    <input class="my_form form-control" type="text" id="no_of_parking_space" name="nazac_property_agents_fee" value="<?php echo $property_details_array[0]['nazac_property_agents_fee'];; ?>">
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_agents_fee'); ?>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12" style="margin-top: 30px">
                                <h5 class="text-success" style="margin-bottom: 0px">Description of Property</h5>
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group field_error">
                                    <label>Property Description<span class="text-danger"><strong>*</strong></span></label>
                                    <button style="display: inline-block; margin-bottom: 10px;" onclick="previewAssessment(this)" type="button" class="btn btn-primary">View Preview</button>
                                    <textarea onblur="removeErrorDisplayer(this)" class="summernote ed_property_description form-control" placeholder="Enter News Here" name="description"><?php echo $property_details_array[0]['nazac_property_description'] ?></textarea>
                                    <i class="icon_lock_alt"></i>
                                    <div class="error_display">
                                        <?php echo form_error('description'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8 col-sm-offset-2" style="margin-bottom: 30px;">
                                <div id="pass-info" class="clearfix"></div>
                                <button style="background: #121B22; border-color:#121B22;" typeof="submit" class="btn btn-block btn-info btn-lg">Save & Continue</button>
                            </div>


                        </div>

                    </form>

                </div>

            </div>

        <?php } ?>

    </div>

</div>

<!-- END SECTION 404 -->
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