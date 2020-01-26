<body class="inner-pages">
<!-- START SECTION 404 -->
<?php //print_r($listed_property_details_array); ?>
<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url('resource/loader/loading_spinner.gif');?>"></span>

<div class="container-fluid">

    <div class="row" style="background-color: #edeff1;">

        <?php if($this->uri->segment(4) != 'edit'){ ?>

            <div class="col-sm-10 col-sm-offset-1">

                <div style="width: 100%; background-color: white; padding-top: 50px;">
                    <form enctype="multipart/form-data" method="post" autocomplete="off" action="<?php echo base_url('roomy/mains/process_find_roomy_form/'.$this->uri->segment(4)); ?>" style="width:94%; margin-left: 3%;">
                        <div class="row" style="">

                            <div class="col-sm-12 text-center">

                                <h2 style="font-size: 23px;" class="text-success text-center">Find a Roomate on <?php print $siteDetail['site_name'];?></h2>
                                <p class="text-center">Complete form below To place request for a roomy.</p>
                            </div>

                            <?php

                            if( $this->session->flashdata('form_error') ){ ?>
                                <div class="col-sm-12 alert alert-warning text-center" style="margin-top: 30px">
                                    <?php
                                    echo $this->session->flashdata('form_error');
                                    ?>
                                </div>
                            <?php } ?>

                            <?php

                            if( $this->session->flashdata('form_success') ){ ?>
                                <div class="col-sm-12 alert alert-success text-center" style="margin-top: 30px">
                                    <?php
                                    echo $this->session->flashdata('form_success');
                                    ?>
                                </div>
                            <?php } ?>

                            <div class="col-sm-12" style="margin-top: 30px">
                                <h5 class="text-success" style="margin-bottom: 0px">
                                    <?php if($this->uri->segment(4) == 'existing_apartment'){ echo 'I have an Apartment, am in need of a room mate to join me'; } ?>
                                    <?php if($this->uri->segment(4) == 'no_apartment'){ echo 'Am in need of a roomate who already have a rented apartment.'; } ?>
                                </h5>
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>

                           <!-- <?php /*$apartment_rent_question_value = set_value('apartment_rent_question'); */?>
                            <div class=" <?php /*if($apartment_rent_question_value !== 'yes'){ echo 'col-sm-12'; }else{ echo 'col-sm-6'; } */?>  question">
                                <label>Was Apartment  Rented on <?php /*echo $siteDetail['site_name']; */?> <span class="text-danger"><strong>*</strong></span></label>
                                <select onblur="removeErrorDisplayer(this)" onchange="chooseWhereApartmentWasRented(this)" name="apartment_rent_question" class="form-control">
                                    <option value="" selected="selected">--Select an Answer--</option>
                                    <option value="yes">
                                        Yes
                                    </option>
                                    <option value="no">
                                        No
                                    </option>
                                    <?php
/*
                                    if(!empty($apartment_rent_question_value)){ */?>
                                        <option value="<?php /*echo $apartment_rent_question_value; */?>" selected="selected"><?php /*echo ucfirst($apartment_rent_question_value); */?></option>
                                    <?php /*} */?>

                                </select>
                                <div class="error_display">
                                    <?php /*echo form_error('apartment_rent_question'); */?>
                                </div>
                            </div>-->

                            <?php if($this->uri->segment(4) === 'existing_apartment'){?>

                            <div class="col-sm-12 rin_holder <?php if(empty($nazac_clients_rin)){ echo 'hidden'; } ?>">
                                <div class="form-group field_error">
                                    <label>Rin Number<span class="text-danger"><strong>*</strong></span></label>
                                    <input onblur="removeErrorDisplayer(this); getProperty(this)" placeholder="" class="my_form form-control" type="text" id="rin_number" name="rin_number" value="<?php echo $nazac_clients_rin; ?>">
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('rin_number'); ?>
                                    </div>
                                    <div class="mpa" style="position: absolute; top: 0px; right: 0px; font-size: 01.5em;"><i class="property_existence_status fa fa-times-circle text-danger"></i></div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group field_error">
                                    <label>Name of Lodge<span class="text-danger"><strong>*</strong></span></label>

                                    <input name="name_of_lodge" onblur="removeErrorDisplayer(this);" placeholder="" class="my_form form-control" type="text" value="<?php if(count($registered_property_details_array) != 0){ echo $registered_property_details_array[0]['nazac_property_lodge_name']; } ?>">
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('name_of_lodge'); ?>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-4">

                                <?php $location_of_lodge = array(); if(count($registered_property_details_array) != 0){ $location_of_lodge = $this->Admin->dbSelectWithOrWithoutParameter( 'nazac_property_locations', array('nazac_location_id'=>$registered_property_details_array[0]['nazac_property_location']) ); }?>

                                <div class="form-group field_error">
                                    <label>Location<span class="text-danger"><strong>*</strong></span></label>

                                    <select onchange="getPrpertyDetailsForLocation(this, '1')" name="nazac_property_location" class="form-control" id="nazac_property_location">
                                        <option value="" selected="selected">--Select Property Location*--</option>
                                        <?php foreach($locations as $k => $value){ ?>
                                            <option <?php  if(count($location_of_lodge) > 0){ if($location_of_lodge['result'][0]['nazac_location_name'] === $value['nazac_location_name']){ echo 'selected';} }?> value="<?php echo $value['nazac_location_id']; ?>"><?php echo $value['nazac_location_name']; ?></option>

                                        <?php } ?>
                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('nazac_property_location'); ?>
                                    </div>
                                </div>
                            </div>

                                <div class="col-sm-4">
                                    <div class="form-group field_error">
                                        <?php $property_storey = set_value('nazac_property_storey_type');?>
                                        <label>Property Storey Type<span class="text-danger"><strong>*</strong></span></label>
                                        <select name="nazac_property_storey_type" class="form-control">
                                            <option value="" selected="selected">--Select Property Storey Type*--</option>

                                            <option <?php if($property_storey === 'Ground building'){ echo 'selected'; }?> value="Ground building">Ground building</option>
                                            <option <?php if($property_storey === '1 storey building'){ echo 'selected'; }?> value="1 storey building">1 storey building</option>
                                            <option <?php if($property_storey === '2 storey building'){ echo 'selected'; }?> value="2 storey building">2 storey building</option>
                                            <option <?php if($property_storey === '3 storey building'){ echo 'selected'; }?> value="2 storey building">3 storey building</option>
                                            <option <?php if($property_storey === '4 storey building'){ echo 'selected'; }?> value="4 storey building">3 storey building</option>

                                        </select>
                                        <div class="error_display">
                                            <?php echo form_error('nazac_property_storey_type'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-8">
                                    <div class="form-group field_error">
                                        <label>Rent Price (<?php if(count($listed_property_details_array) != 0){ echo $listed_property_details_array[0]['nazac_property_currency']; }else{ echo 'NGN'; }?>)<span class="text-danger"><strong>*</strong></span></label>
                                        <input onblur="removeErrorDisplayer(this);" placeholder="" class="my_form form-control" type="text" value="<?php if(count($listed_property_details_array) != 0){ echo $listed_property_details_array[0]['nazac_property_price']; } ?>" name="price_of_rent">
                                        <i class="ti-user"></i>
                                        <div class="error_display">
                                            <?php echo form_error('price_of_rent'); ?>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group field_error">
                                        <label>Upload Images of Your Apartment<span class="text-danger"><strong>*</strong></span></label><br>
                                        <input onblur="removeErrorDisplayer(this);" placeholder="" class="my_form form-control" type="file" multiple name="apartment_images[]">
                                        <i class="ti-user"></i>
                                        <span class="help-block">Please Hold down "ctrl" button to select more than one image </span>
                                        <div class="error_display">
                                            <?php echo form_error('apartment_images'); ?>
                                        </div>

                                    </div>
                                </div>

                            <?php } ?>

                            <div class="col-sm-12">
                                <div class="form-group field_error">
                                    <label>Please Describe your Personality in not more 300 Words<span class="text-danger"><strong>*</strong></span></label>
                                    <textarea onblur="removeErrorDisplayer(this)" name="description_of_self" maxlength="300" class="form-control"><?php echo set_value('description_of_self'); ?></textarea>
                                    <i class="ti-user"></i>
                                    <div class="error_display error_display_2">
                                        <?php echo form_error('description_of_self'); ?>
                                    </div>
                                </div>
                            </div>

                            <?php $possible_pair_option_value = set_value('pair_option'); ?>
                            <div class="<?php if($possible_pair_option_value === 'faculty' || $possible_pair_option_value === 'department'){ echo 'col-sm-6'; }else{ echo 'col-sm-12'; } ?> pair_option">
                                <div class="form-group field_error">
                                    <label>Posible Pair Option<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this); disclosePairOption(this)" name="pair_option" class="form-control">
                                        <option value="" selected="selected">--Select Option for Pairing*--</option>
                                        <option value="faculty">
                                            From a particular Faculty
                                        </option>
                                        <option value="department">
                                            From a particular Department
                                        </option>
                                        <option value="random">
                                            Randomly
                                        </option>
                                        <?php
                                        if(!empty($possible_pair_option_value)){
                                            $array2 = array('faculty'=>'From a particular Faculty', 'department'=>'From a particular Department', 'random'=>'Randomly');
                                            ?>
                                            <option value="<?php echo $possible_pair_option_value; ?>" selected="selected"><?php echo $array2[$possible_pair_option_value]; ?></option>
                                        <?php } ?>
                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('pair_option'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 <?php if($possible_pair_option_value !== 'faculty'){ echo 'hidden'; } ?>  faculty_list pair_option_1">
                                <div class="form-group field_error">
                                    <label>List of Faculty<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="faculty_name" class="form-control">
                                        <option value="" selected="selected">--Select Faculty--</option>
                                        <?php $returned_value = set_value('faculty_name');  $faculty_details = $this->Admin->getFaculty()?>
                                        <?php foreach($faculty_details as $k => $value){ ?>
                                        <option <?php if($returned_value === $value['unique_id']){ echo 'selected'; } ?> value="<?php echo $value['unique_id']; ?>"><?php echo ucwords($value['faculty_name']); ?></option>
                                        <?php } ?>

                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('faculty_name'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 <?php if($possible_pair_option_value !== 'department'){ echo 'hidden'; } ?> department_list pair_option_2">
                                <div class="form-group field_error">
                                    <label>List of Department<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="department_name" class="form-control">
                                        <option value="" selected="selected">--Select Faculty--</option>
                                        <?php $returned_value = set_value('department_name'); $department_details = $this->Admin->getDepartments()?>
                                        <?php foreach($department_details as $k => $value){ ?>
                                            <option <?php if($returned_value === $value['unique_id']){ echo 'selected'; } ?> value="<?php echo $value['unique_id']; ?>"><?php echo ucwords($value['department_name']); ?></option>
                                        <?php } ?>

                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('department_name'); ?>
                                    </div>
                                </div>
                            </div>

                            <!--property details-->

                            <div class="col-sm-6 <?php if($this->uri->segment(4) !== 'no_apartment'){ echo 'hidden'; } ?>">
                                <div class="form-group field_error">
                                    <label>Prefered Location of Apartment/Property<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="prefered_location" class="form-control">
                                        <option value="" selected="selected">--Select Preferred Location--</option>
                                        <?php $returned_value = set_value('prefered_location');  foreach($locations as $k => $value){?>
                                        <option <?php if($returned_value === $value['nazac_location_id']){ echo 'selected'; } ?> value="<?php echo $value['nazac_location_id'] ?>"><?php echo ucfirst($value['nazac_location_name']) ?></option>
                                        <?php } ?>

                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('prefered_location'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 <?php if($this->uri->segment(4) !== 'no_apartment'){ echo 'hidden'; } ?>">
                                <div class="form-group field_error">
                                    <label>Prefered Apartment/Property Type<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="prefered_property_type" class="form-control">
                                        <option value="" selected="selected">--Select Type of Apartment--</option>
                                        <?php $returned_value = set_value('prefered_property_type'); foreach($property_type_for_find_a_roomy as $k => $value){?>
                                            <option <?php if($returned_value === $value){ echo 'selected'; }; ?> value="<?php echo $value ?>"><?php echo ucfirst($value) ?> </option>
                                        <?php } ?>

                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('prefered_property_type'); ?>
                                    </div>
                                </div>
                            </div>

                            <!--property details-->

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Prefered Gender<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="prefered_gender" class="form-control">
                                        <option value="" selected="selected">--Select Gender--</option>
                                        <option <?php if(set_value('prefered_gender') == 'male'){ echo 'selected';}?> value="male">Male</option>
                                        <option <?php if(set_value('prefered_gender') == 'female'){ echo 'selected';}?> value="female">Female</option>

                                        <?php
                                        $value = set_value('prefered_gender');
                                        if(!empty($value)){ ?>
                                            <option value="<?php echo $value; ?>" selected="selected"><?php echo ucfirst($value); ?></option>
                                        <?php } ?>

                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('prefered_gender'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Prefered Level<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="prefered_level" class="form-control">
                                        <option value="" selected="selected">--Select Level--</option>
                                        <option <?php if(set_value('prefered_level') === '100'){ echo 'selected'; } ?> value="100" >100 Level</option>
                                        <option <?php if(set_value('prefered_level') === '200'){ echo 'selected'; } ?> value="200">200 Level</option>
                                        <option <?php if(set_value('prefered_level') === '300'){ echo 'selected'; } ?> value="300" >300 Level</option>
                                        <option <?php if(set_value('prefered_level') === '400'){ echo 'selected'; } ?> value="400" >400 Level</option>
                                        <option <?php if(set_value('prefered_level') === '500'){ echo 'selected'; } ?> value="500" >500 Level</option>
                                        <option <?php if(set_value('prefered_level') === 'Post graduates'){ echo 'selected'; } ?> value="Post graduates" >Post Graduates</option>

                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('prefered_level'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 <?php if($this->uri->segment(4) !== 'no_apartment'){ echo 'hidden'; } ?>">
                                <div class="form-group field_error">
                                    <label>Budget (NGN)<span class="text-danger"><strong>*</strong></span></label>

                                    <input name="amount_budgeted" onblur="removeErrorDisplayer(this);" placeholder="" class="my_form form-control" type="text" value="<?php set_value('amount_budgeted')?>">
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('amount_budgeted'); ?>
                                    </div>

                                </div>
                            </div>


                            <div class="col-sm-8 col-sm-offset-2" style="margin-bottom: 40px;">
                                <div id="pass-info" class="clearfix"></div>
                                <button style="background: #121B22; border-color:#121B22;" typeof="submit" class="btn btn-block btn-info btn-lg">Save & Continue</button>
                            </div>


                        </div>

                    </form>

                </div>

            </div>

        <?php } ?>


        <?php if($this->uri->segment(4) === 'edit'){ ?>

            <div class="col-sm-10 col-sm-offset-1">

                <div style="width: 100%; background-color: white; padding-top: 50px;">

                    <form enctype="multipart/form-data" method="post" autocomplete="off" action="<?php echo base_url('roomy/mains/process_find_roomy_details_update/edit/'.$roomy_request_details_array[0]['unique_id']); ?>" style="width:94%; margin-left: 3%;">
                        <div class="row" style="">

                            <div class="col-sm-12 text-center">

                                <h2 style="font-size: 23px;" class="text-success text-center">Edit Roomate Request you made on <?php print $siteDetail['site_name'];?></h2>
                                <!--<p class="text-center">Complete form below To place request for a roomy.</p>-->
                            </div>

                            <?php
                            if( $this->session->flashdata('form_error') ){ ?>
                                <div class="col-sm-12 alert alert-warning text-center" style="margin-top: 30px">
                                    <?php
                                    echo $this->session->flashdata('form_error');
                                    ?>
                                </div>
                            <?php } ?>

                            <?php
                            if( $this->session->flashdata('form_success') ){ ?>
                                <div class="col-sm-12 alert alert-success text-center" style="margin-top: 30px">
                                    <?php
                                    echo $this->session->flashdata('form_success');
                                    ?>
                                </div>
                            <?php } ?>

                            <div class="col-sm-12" style="margin-top: 30px">
                                <h5 class="text-success" style="margin-bottom: 0px">
                                    <?php if($roomy_request_details_array[0]['purpose'] == 'existing_apartment'){ echo 'I have an Apartment, am in need of a room mate to join me'; } ?>
                                    <?php if($roomy_request_details_array[0]['purpose'] == 'no_apartment'){ echo 'Am in need of a room mate who already have a rented apartment.'; } ?>
                                </h5>
                                <hr class="bg-warning" style="margin-top: 2px" size="10px">
                            </div>

                            <!-- <?php /*$apartment_rent_question_value = set_value('apartment_rent_question'); */?>
                            <div class=" <?php /*if($apartment_rent_question_value !== 'yes'){ echo 'col-sm-12'; }else{ echo 'col-sm-6'; } */?>  question">
                                <label>Was Apartment  Rented on <?php /*echo $siteDetail['site_name']; */?> <span class="text-danger"><strong>*</strong></span></label>
                                <select onblur="removeErrorDisplayer(this)" onchange="chooseWhereApartmentWasRented(this)" name="apartment_rent_question" class="form-control">
                                    <option value="" selected="selected">--Select an Answer--</option>
                                    <option value="yes">
                                        Yes
                                    </option>
                                    <option value="no">
                                        No
                                    </option>
                                    <?php
                            /*
                                                                if(!empty($apartment_rent_question_value)){ */?>
                                        <option value="<?php /*echo $apartment_rent_question_value; */?>" selected="selected"><?php /*echo ucfirst($apartment_rent_question_value); */?></option>
                                    <?php /*} */?>

                                </select>
                                <div class="error_display">
                                    <?php /*echo form_error('apartment_rent_question'); */?>
                                </div>
                            </div>-->

                            <?php if($roomy_request_details_array[0]['purpose'] === 'existing_apartment'){?>
                                <div class="col-sm-12 rin_holder">
                                    <div class="form-group field_error">
                                        <label>Rin Number<span class="text-danger"><strong>*</strong></span></label>
                                        <input onblur="removeErrorDisplayer(this); getProperty(this)" placeholder="" class="my_form form-control" type="text" id="rin_number" name="rin_number" value="<?php echo $roomy_request_details_array[0]['listed_property_id']; ?>">
                                        <i class="ti-user"></i>
                                        <div class="error_display">
                                            <?php echo form_error('rin_number'); ?>
                                        </div>
                                        <div class="mpa" style="position: absolute; top: 0px; right: 0px; font-size: 01.5em;"><i class="property_existence_status fa fa-times-circle text-danger"></i></div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group field_error">
                                        <label>Name of Lodge<span class="text-danger"><strong>*</strong></span></label>

                                        <input name="name_of_lodge" onblur="removeErrorDisplayer(this);" placeholder="" class="my_form form-control" type="text" value="<?php echo $roomy_request_details_array[0]['name_of_lodge']; ?>">
                                        <i class="ti-user"></i>
                                        <div class="error_display">
                                            <?php echo form_error('name_of_lodge'); ?>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-4">

                                    <?php $location_of_lodge = $this->Admin->dbSelectWithOrWithoutParameter( 'nazac_property_locations', array('nazac_location_id'=>$registered_property_details_array[0]['nazac_property_location']) ); ?>

                                    <div class="form-group field_error">
                                        <label>Location<span class="text-danger"><strong>*</strong></span></label>

                                        <select onchange="getPrpertyDetailsForLocation(this, '1')" name="nazac_property_location" class="form-control" id="nazac_property_location">
                                            <option value="" selected="selected">--Select Property Location*--</option>
                                            <?php foreach($locations as $k => $value){ ?>
                                                <option <?php if($roomy_request_details_array[0]['nazac_property_location'] === $value['nazac_location_id']){ echo 'selected';} ?> value="<?php echo $value['nazac_location_id']; ?>"><?php echo $value['nazac_location_name']; ?></option>

                                            <?php } ?>
                                        </select>
                                        <i class="ti-user"></i>
                                        <div class="error_display">
                                            <?php echo form_error('nazac_property_location'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group field_error">
                                        <?php $property_storey = $roomy_request_details_array[0]['nazac_property_storey_type'];?>
                                        <label>Property Storey Type<span class="text-danger"><strong>*</strong></span></label>
                                        <select name="nazac_property_storey_type" class="form-control">
                                            <option value="" selected="selected">--Select Property Storey Type*--</option>

                                            <option <?php if($property_storey === 'Ground building'){ echo 'selected'; }?> value="Ground building">Ground building</option>
                                            <option <?php if($property_storey === '1 storey building'){ echo 'selected'; }?> value="1 storey building">1 storey building</option>
                                            <option <?php if($property_storey === '2 storey building'){ echo 'selected'; }?> value="2 storey building">2 storey building</option>
                                            <option <?php if($property_storey === '3 storey building'){ echo 'selected'; }?> value="2 storey building">3 storey building</option>
                                            <option <?php if($property_storey === '4 storey building'){ echo 'selected'; }?> value="4 storey building">3 storey building</option>

                                        </select>
                                        <div class="error_display">
                                            <?php echo form_error('nazac_property_storey_type'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-8">
                                    <div class="form-group field_error">
                                        <label>Rent Price (<?php echo $listed_property_details_array[0]['nazac_property_currency'] ?>)<span class="text-danger"><strong>*</strong></span></label>
                                        <input onblur="removeErrorDisplayer(this);" placeholder="" class="my_form form-control" type="text" value="<?php if(count($listed_property_details_array) != 0){ echo $listed_property_details_array[0]['nazac_property_price']; } ?>" name="price_of_rent">
                                        <i class="ti-user"></i>
                                        <div class="error_display">
                                            <?php echo form_error('price_of_rent'); ?>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group field_error">
                                        <label>Upload Images of Your Apartment<span class="text-danger"><strong>*</strong></span></label><br>
                                        <input onblur="removeErrorDisplayer(this);" placeholder="" class="my_form form-control" type="file" multiple name="apartment_images[]">
                                        <i class="ti-user"></i>
                                        <span class="help-block">Please Hold down "ctrl" button to select more than one image </span>
                                        <div class="error_display">
                                            <?php echo form_error('apartment_images'); ?>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="" style="width: 100%; min-height: 150px; border:5px solid #121B22; padding: 5px; position: relative;">

                                        <?php $exploded_image_name = $this->extras->createArrayFromAnotherArrayWhileOmittingEmptyValues(explode(',', $roomy_request_details_array[0]['nazac_apartment_images'])); ?>
                                        <div class="row image-box">
                                            <?php if(count($exploded_image_name) > 0){?>
                                            <?php for($i = 0; $i < count($exploded_image_name); $i++){?>
                                            <div class="col-sm-2 col-xs-6" style="position: relative; margin-bottom:10px;">
                                                <img src="<?php echo base_url('resource/upload/registered_property/'.$exploded_image_name[$i]);?>" class="" alt="" style="100%">
                                                <input value="<?php echo $exploded_image_name[$i]; ?>" style="position:absolute; top: 10px; right: 20px;" type="checkbox" class="form-control property_details_image_check_box">

                                            </div>
                                            <?php } ?>
                                            <?php } ?>
                                            <input value="<?php echo $roomy_request_details_array[0]['unique_id']; ?>" type="hidden" id="user_id_holder" class="form-control">
                                            <span onclick="deleteSelectedPropertyImageForRoomySelection('find_a_roomy')" style="position: absolute; top: -40px; left: 0px; cursor: pointer;" class="fa fa-trash fa-2x"></span>
                                        </div>

                                    </div>
                                </div>

                            <?php } ?>

                            <div class="col-sm-12" style="margin-top: 20px">
                                <div class="form-group field_error">
                                    <label>Please Describe your Personality in not more 300 Words<span class="text-danger"><strong>*</strong></span></label>
                                    <textarea onblur="removeErrorDisplayer(this)" name="description_of_self" maxlength="300" class="form-control"><?php echo $roomy_request_details_array[0]['description_of_personality']; ?></textarea>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('description_of_self'); ?>
                                    </div>
                                </div>
                            </div>

                            <?php $possible_pair_option_value = $roomy_request_details_array[0]['room_mate_pair']; ?>
                            <div class="<?php if($possible_pair_option_value === 'faculty' || $possible_pair_option_value === 'department'){ echo 'col-sm-6'; }else{ echo 'col-sm-12'; } ?> pair_option">
                                <div class="form-group field_error">
                                    <label>Posible Pair Option<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this); disclosePairOption(this)" name="pair_option" class="form-control">
                                        <option value="" selected="selected">--Select Option for Pairing*--</option>
                                        <option value="faculty">
                                            From a particular Faculty
                                        </option>
                                        <option value="department">
                                            From a particular Department
                                        </option>
                                        <option value="random">
                                            Randomly
                                        </option>
                                        <?php
                                        if(!empty($possible_pair_option_value)){
                                            $array2 = array('faculty'=>'From a particular Faculty', 'department'=>'From a particular Department', 'random'=>'Randomly');
                                            ?>
                                            <option value="<?php echo $possible_pair_option_value; ?>" selected="selected"><?php echo $array2[$possible_pair_option_value]; ?></option>
                                        <?php } ?>
                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('pair_option'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 <?php if($possible_pair_option_value !== 'faculty'){ echo 'hidden'; } ?>  faculty_list pair_option_1">
                                <div class="form-group field_error">
                                    <label>List of Faculty<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="faculty_name" class="form-control">
                                        <option value="" selected="selected">--Select Faculty--</option>
                                        <?php $returned_value = $roomy_request_details_array[0]['faculty_department_name'];  $faculty_details = $this->Admin->getFaculty()?>
                                        <?php foreach($faculty_details as $k => $value){ ?>
                                            <option <?php if($returned_value === $value['unique_id']){ echo 'selected'; } ?> value="<?php echo $value['unique_id']; ?>"><?php echo ucwords($value['faculty_name']); ?></option>
                                        <?php } ?>

                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('faculty_name'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 <?php if($possible_pair_option_value !== 'department'){ echo 'hidden'; } ?> department_list pair_option_2">
                                <div class="form-group field_error">
                                    <label>List of Department<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="department_name" class="form-control">
                                        <option value="" selected="selected">--Select Faculty--</option>
                                        <?php $returned_value = $roomy_request_details_array[0]['faculty_department_name']; $department_details = $this->Admin->getDepartments()?>
                                        <?php foreach($department_details as $k => $value){ ?>
                                            <option <?php if($returned_value === $value['unique_id']){ echo 'selected'; } ?> value="<?php echo $value['unique_id']; ?>"><?php echo ucwords($value['department_name']); ?></option>
                                        <?php } ?>

                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('department_name'); ?>
                                    </div>
                                </div>
                            </div>

                            <!--property details-->

                            <div class="col-sm-6 <?php if($roomy_request_details_array[0]['purpose'] !== 'no_apartment'){ echo 'hidden'; } ?>">
                                <div class="form-group field_error">
                                    <label>Prefered Location of Apartment/Property<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="prefered_location" class="form-control">
                                        <option value="" selected="selected">--Select Preferred Location--</option>
                                        <?php $returned_value = $roomy_request_details_array[0]['prefered_location'];  foreach($locations as $k => $value){?>
                                            <option <?php if($returned_value === $value['nazac_location_id']){ echo 'selected'; } ?> value="<?php echo $value['nazac_location_id'] ?>"><?php echo ucfirst($value['nazac_location_name']) ?></option>
                                        <?php } ?>

                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('prefered_location'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 <?php if($roomy_request_details_array[0]['purpose'] !== 'no_apartment'){ echo 'hidden'; } ?>">
                                <div class="form-group field_error">
                                    <label>Prefered Apartment/Property Type<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="prefered_property_type" class="form-control">
                                        <option value="" selected="selected">--Select Type of Apartment--</option>
                                        <?php $returned_value = $returned_value = $roomy_request_details_array[0]['prefered_property_type']; foreach($property_type_for_find_a_roomy as $k => $value){?>
                                            <option <?php if($returned_value === $value){ echo 'selected'; }; ?> value="<?php echo $value ?>"><?php echo ucfirst($value) ?> </option>
                                        <?php } ?>

                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('prefered_property_type'); ?>
                                    </div>
                                </div>
                            </div>

                            <!--property details-->

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Prefered Gender<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="prefered_gender" class="form-control">
                                        <option value="" selected="selected">--Select Gender--</option>
                                        <option <?php if($roomy_request_details_array[0]['gender'] == 'male'){ echo 'selected';}?> value="male">Male</option>
                                        <option <?php if($roomy_request_details_array[0]['gender'] == 'female'){ echo 'selected';}?> value="female">Female</option>

                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('prefered_gender'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group field_error">
                                    <label>Prefered Level<span class="text-danger"><strong>*</strong></span></label>
                                    <select onchange="removeErrorDisplayer(this)" name="prefered_level" class="form-control">
                                        <option value="" selected="selected">--Select Level--</option>
                                        <option <?php if($roomy_request_details_array[0]['prefered_level'] === '100'){ echo 'selected'; } ?> value="100" >100 Level</option>
                                        <option <?php if($roomy_request_details_array[0]['prefered_level'] === '200'){ echo 'selected'; } ?> value="200">200 Level</option>
                                        <option <?php if($roomy_request_details_array[0]['prefered_level'] === '300'){ echo 'selected'; } ?> value="300" >300 Level</option>
                                        <option <?php if($roomy_request_details_array[0]['prefered_level'] === '400'){ echo 'selected'; } ?> value="400" >400 Level</option>
                                        <option <?php if($roomy_request_details_array[0]['prefered_level'] === '500'){ echo 'selected'; } ?> value="500" >500 Level</option>
                                        <option <?php if($roomy_request_details_array[0]['prefered_level'] === 'Post graduates'){ echo 'selected'; } ?> value="Post graduates" >Post Graduates</option>

                                    </select>
                                    <i class="ti-user"></i>
                                    <div class="error_display">
                                        <?php echo form_error('prefered_level'); ?>
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
