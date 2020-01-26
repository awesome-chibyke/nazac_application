<?php require_once("theHeader.php"); ?>
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <?php require_once("theSidebar.php"); ?>

        <!-- Main content -->
        <div class="content-wrapper">
            <?php $page_title = ucwords($single_property_records->property_title); ?>
            <?php require_once("thePageHeader.php"); ?>


            <!-- Content area -->
            <div class="content">

                <div class="col-md-3">

                    <!-- Detached sidebar -->

                    <div class="sidebar-detached">
                        <div class="sidebar sidebar-default sidebar-separate">
                            <div class="sidebar-content">

                                <!-- User details -->
                                <div class="content-group">
                                    <div class="panel-body bg-indigo-400 border-radius-top text-center" style="background-image: url(<?php echo base_url('admin_assets/assets/images/bg.png'); ?>); background-size: contain;">
                                        <div class="content-group-sm">
                                            <h6 class="text-semibold no-margin-bottom">
                                                <?php echo $single_property_records->property_title; ?>
                                            </h6>

                                            <span class="display-block text-uppercase"><?php echo $single_property_records->property_type ?></span>
                                            <span class="display-block text-uppercase">Posted: <?php echo $single_property_records->post_date ?></span>
                                        </div>
                                        <style type="text/css">
                                            .display-inline-block .hoverable_element{
                                                position: absolute;
                                                width: 100%;
                                                height: 100%;
                                                line-height: 100%;
                                                display: none !important;
                                                background: black;
                                            }

                                            .display-inline-block:hover .hoverable_element{
                                                display:block !important;
                                                opacity:0.3;
                                            }

                                        </style>
                                        <a href="javascript:;" onclick="showImage(this)" class="display-inline-block content-group-sm" style="position:relative;">
                                            <div class="hoverable_element">
                                                <i class="zmdi zmdi-eye" style="font-size: 30px; margin-top: 40%; text-shadow: 1px 1px 20px black; color:white;"></i>
                                            </div>
                                            <img src="<?php echo base_url("property_upload/".$single_property_records->property_thumbnail) ?>" class="img-thumbnail img-responsive" alt="" style="width: 110px; height: 110px;">
                                        </a>

                                        <ul class="list-inline list-inline-condensed no-margin-bottom">
                                            <!--<li><a href="" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-google-drive"></i></a></li>-->
                                            <li><a target="_blank" href="<?php echo $single_user_record->twiter_link; ?>" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-twitter"></i></a></li>
                                            <li><a target="_blank" href="<?php echo $single_user_record->facebook_link; ?>" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-facebook"></i></a></li>

                                        </ul>
                                    </div>

                                    <div class="panel no-border-top no-border-radius-top">
                                        <ul class="navigation">
                                            <li class="navigation-header">Property Details</li>
                                            <li class="active">
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                    <strong>Poster Status: </strong>
                                                    <span>

                                                            <div class="label label-primary" style="font-size: 10px !important;"><?php echo $single_property_records->whois; ?></div>

                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                    <strong>Published Status: </strong>
                                                    <span>
                                                        <?php if($single_property_records->publish_status === 'publish'){ ?>
                                                            <div class="label label-info"><?php echo  $single_property_records->publish_status; ?></div>
                                                        <?php } ?>

                                                        <?php if($single_property_records->publish_status === 'unpublished'){ ?>
                                                            <div class="label label-warning"><?php echo  $single_property_records->publish_status; ?></div>
                                                        <?php } ?>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="active">
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                    <strong>Category: </strong>
                                                    <span>

                                                            <div class="label label-info" style="font-size: 10px !important;"><?php echo $single_property_records->property_category; ?></div>

                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-box-phone"></i>
                                                    <strong>Type: </strong>
                                                    <span>
                                                            <div class="label label-info"><?php echo $single_property_records->property_type; ?></div>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                    <strong>Purpose: </strong>
                                                    <span>
                                                            <div class="label label-info"><?php echo  $single_property_records->property_purpose; ?></div>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                    <strong>Delete Status: </strong>
                                                    <span>
                                                        <?php if($single_property_records->delete_status === "inuse"){ ?>
                                                            <div class="label label-info">Available</div>
                                                        <?php } ?>

                                                        <?php if($single_property_records->delete_status === "yes"){ ?>
                                                            <div class="label label-danger">Deleted</div>
                                                        <?php }else if($single_property_records->delete_status === "no"){ ?>
                                                            <div class="label label-Success">Not Deleted</div>
                                                        <?php } ?>

                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                    <strong>Old Amount: </strong>
                                                    <span>
                                                            <div class="label label-info"><?php if(!empty($single_property_records->property_older_price)){ echo  $single_property_records->currency.' '.number_format($single_property_records->property_older_price,2,'.',','); }else{ echo "None"; } ?></div>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                    <strong>Amount (<?php echo $single_property_records->currency; ?>): </strong>
                                                    <span>
                                                            <div class="label label-info"><?php echo  $single_property_records->currency.' '.number_format($single_property_records->property_price,2,'.',','); ?></div>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                    <strong>Last Update: </strong>
                                                    <span>
                                                            <div class="label label-info"><?php echo  $single_property_records->last_update;  ?></div>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="navigation-divider"></li>
                                            <li>
                                                <?php if($single_property_records->delete_status === 'no'){ ?>
                                                <a href="javascript:;" onclick="propertyAction('delete_property','<?php echo $single_property_records->unique_id ?>')"><i class="zmdi zmdi-delete"></i> Delete Property</a>
                                                <?php }else if($single_property_records->delete_status === 'yes'){ ?>
                                                    <a href="javascript:;" onclick="propertyAction('reverse_property_delete','<?php echo $single_property_records->unique_id ?>')"><i class="zmdi zmdi-delete"></i> Reverse Property Delete</a>
                                                <?php } ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /user details -->


                            </div>
                        </div>
                    </div>
                    <!-- /detached sidebar -->

                </div>

                <div class="col-md-9">

                    <!-- Detached content -->
                    <div class="container-detached">
                        <div class="content-detached">

                            <!-- Tab content -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="profile">

                                    <!-- Profile info -->
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h6 class="panel-title"><?php echo $single_property_records->property_title ?></h6>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                    <li><a data-action="reload"></a></li>
                                                    <li><a data-action="close"></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <form action="#">

                                                <div class="form-group ">
                                                    <div class="row">

                                                        <div class="col-md-4 float-right">

                                                            <!--<label style="display: list-item;">Published Status</label>-->
                                                            <?php if($single_property_records->publish_status === "publish"){?>
                                                                <div style="display: inline-block;" class="label label-success">Published</div>
                                                            <?php }else{ ?>
                                                                <div style="display: inline-block;" class="label label-warning">Un-Published</div>
                                                            <?php } ?>

                                                            <?php if(strtolower($single_property_records->publish_status) === strtolower('unpublish')){ ?>
                                                                <button style="display: inline-block;" onclick="propertyAction('publish_property','<?php echo $single_property_records->unique_id ?>')" type="button" class="btn btn-primary">Publish</button>
                                                            <?php }else if(strtolower($single_property_records->publish_status) === strtolower('publish')){ ?>
                                                                                                                <button style="display: inline-block;" onclick="propertyAction('unpublish_property','<?php echo $single_property_records->unique_id ?>')" type="button" class="btn btn-warning">Un Publish</button>
                                                            <?php } ?>

                                                        </div>

                                                        <div class="col-md-4">
                                                            <!--<label style="display: list-item;">Published Status</label>-->
                                                            <?php if(strtolower($single_property_records->property_status) === "available"){?>
                                                                <div style="display: inline-block;" class="label label-success">Available</div>
                                                            <?php }else{ ?>
                                                                <div style="display: inline-block;" class="label label-warning">Un-Available</div>
                                                            <?php } ?>

                                                            <?php if(strtolower($single_property_records->property_status) === strtolower('unavailable')){ ?>
                                                                <button style="display: inline-block;" onclick="propertyAction('make_property_available','<?php echo $single_property_records->unique_id ?>')" type="button" class="btn btn-primary">Make Available</button>
                                                            <?php }else if(strtolower($single_property_records->property_status) === strtolower('Available')){ ?>
                                                                <button style="display: inline-block;" onclick="propertyAction('make_property_un_available','<?php echo $single_property_records->unique_id ?>')" type="button" class="btn btn-warning">Make Un-available</button>
                                                            <?php } ?>

                                                        </div>

                                                        <div class="col-md-4">

                                                                <!--<label>Property Unique ID</label>-->
                                                                <input type="text" disabled style="color:black;" value="<?php echo $single_property_records->unique_id; ?>" class="form-control property_unique_id">

                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <label>Property Title</label>
                                                            <input type="text" value="<?php echo $single_property_records->property_title; ?>" class="form-control ed_property_title">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <label>Last name</label>
                                                            <input type="text" value="<?php echo $single_user_record->last_name; ?>" class="form-control">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>First name</label>
                                                            <input type="text" value="<?php echo $single_user_record->first_name ?>" class="form-control">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Email</label>
                                                            <input type="text" value="<?php echo $single_user_record->email; ?>" class="form-control">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Property Category</label>

                                                            <select class="form-control ed_property_category">
                                                                <?php foreach($property_category as $k => $value){ ?>

                                                                    <option <?php if(strtolower($single_property_records->property_category) === strtolower(ucwords($value['property_category']))){ echo "Selected"; } ?> value="<?php echo $value['property_category']; ?>"><?php echo ucwords($value['property_category']); ?></option>

                                                                <?php } ?>

                                                            </select>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label>Property Purpose</label>
                                                            <select class="form-control ed_property_purpose">
                                                            <?php foreach($property_purpose as $k => $value){ ?>

                                                                <option <?php if(strtolower($single_property_records->property_purpose) === strtolower(ucwords($value['property_purpose']))){ echo "Selected"; } ?> value="<?php echo $value['property_purpose']; ?>"><?php echo ucwords($value['property_purpose']); ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label>Property Type</label>

                                                            <select class="form-control ed_property_type">
                                                                <?php foreach($property_type as $k => $value){ ?>

                                                                <option <?php if(strtolower($single_property_records->property_type) === strtolower(ucwords($value['property_type']))){ echo "Selected"; } ?> value="<?php echo $value['property_type']; ?>"><?php echo ucwords($value['property_type']); ?>
                                                                </option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label>Account Type</label>

                                                            <select class="form-control ed_account_type">
                                                                <?php foreach($account_type as $k => $value){ ?>

                                                                    <option <?php if(strtolower($single_property_records->whois) === strtolower(ucwords($value['acount_type']))){ echo "Selected"; } ?> value="<?php echo $value['acount_type']; ?>"><?php echo ucwords($value['acount_type']); ?></option>

                                                                <?php } ?>

                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Address</label>
                                                            <input type="text" value="<?php echo $single_property_records->property_location; ?>" class="form-control ed_property_location_address">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Town</label>
                                                            <input type="text" value="<?php echo $single_property_records->area; ?>" class="form-control ed_area_town">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>L.G.A</label>
                                                            <input type="text" value="<?php echo $single_property_records->local_gov_area; ?>" class="form-control ed_local_gov_area">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>City</label>
                                                            <input type="text" value="<?php echo $single_property_records->property_city; ?>" class="form-control ed_property_city" >
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Country</label>
                                                            <input type="text" value="<?php echo $single_property_records->property_country; ?>" class="form-control ed_property_country" >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        
                                                        <div class="col-md-4">
                                                            <label>Number of Bathroom(s)</label>
                                                            <input type="text" value="<?php echo $single_property_records->no_of_bathrooms; ?>" class="form-control ed_no_of_bathrooms">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Number of Toilet(s)</label>
                                                            <input type="text" value="<?php echo $single_property_records->no_of_toilets; ?>" class="form-control ed_no_of_toilets">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Number of Parking Space(s)</label>
                                                            <input type="text" value="<?php echo $single_property_records->no_of_parking_space; ?>" class="form-control ed_no_of_parking_space">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <label>Total Land Area</label>
                                                            <input type="text" value="<?php echo $single_property_records->total_land_area; ?>" class="form-control ed_total_land_area">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Property Area</label>
                                                            <input type="text" value="<?php echo $single_property_records->property_area; ?>" class="form-control ed_property_area">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Furnishing</label>
                                                            <input type="text" value="<?php echo $single_property_records->furnishing; ?>" class="form-control ed_furnishing">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <label>Number of Rooms</label>
                                                            <input type="text" value="<?php echo $single_property_records->no_of_rooms; ?>" class="form-control ed_no_of_rooms">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Property Status</label>
                                                            <input type="text" value="<?php echo $single_property_records->property_status; ?>" class="form-control ed_property_status">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Payment Type</label>
                                                            <input type="text" value="<?php echo $single_property_records->payment_type; ?>" class="form-control ed_payment_type">
                                                        </div>

                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <label>Amount (<?php echo $single_property_records->currency; ?>)</label>
                                                            <input type="text" value="<?php echo $single_property_records->property_price; ?>" class="form-control ed_property_price">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label>Old Price (<?php echo $single_property_records->currency; ?>)</label>
                                                            <input type="text" value="<?php echo $single_property_records->property_older_price; ?>" class="form-control ed_property_older_price">
                                                        </div>

                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="form-group">
                                                    <div>
                                                        <label for="exampleInputEmail1">
                                                            Property Description
                                                        </label>
                                                        &nbsp;&nbsp;<button style="display: inline-block;" onclick="previewAssessment(this)" type="button" class="btn btn-primary">View Preview</button>
                                                        <div style="margin-top: 20px;" class="summernote-theme-3">
                                                            <textarea class="summernote ed_property_description" placeholder="Enter News Here" name="ed_property_description"><?php echo $single_property_records->property_description; ?></textarea>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <label>Subscription</label>
                                                            <?php $plans = $this->Admin->subscriptionPlans($single_property_records->subscription - 1); ?>

                                                            <select class="form-control ed_property_suscription">
                                                                <?php foreach($plans[1] as $k => $value){ ?>

                                                                    <option <?php if(strtolower($value) === strtolower($plans[0])){ echo "Selected"; } ?> value="<?php echo $plans[2][$k]; ?>"><?php echo $value; ?></option>

                                                                <?php } ?>

                                                            </select>

                                                        </div>

                                                        <div class="col-md-6">
                                                            <label>Furnishing</label>
                                                            <input type="text" value="<?php echo $single_property_records->furnishing; ?>" class="form-control ed_furnishing">
                                                        </div>

                                                    </div>
                                                </div>

                                                <hr>
                                                <?php $property_features_counter = 1; $property_features_array = $this->Admin->exploder(",", rtrim($single_property_records->property_features,",")); ?>

                                                <?php $lenght_counter = 0; $lenght = count($property_features_array);
                                                foreach($property_features_array as $key => $value){ ?>
                                                <?php $modulus = $property_features_counter%4 ?>
                                                <?php if($modulus == 1){?>
                                                <div class="form-group">
                                                    <div class="row">
                                                <?php } ?>

                                                        <?php if($lenght_counter == $lenght-1 && $modulus != 0){ ?>

                                                            <div class="form-group">
                                                            <div class="row">

                                                        <?php } ?>

                                                        <div class="col-md-3">
                                                            <label>Property Features</label>
                                                            <input type="text" value="<?php echo $value; ?>" class="form-control ed_features">

                                                        </div>

                                                        <?php if($lenght_counter == $lenght-1 && $modulus != 0){ ?>

                                                                </div>
                                                            </div>

                                                        <?php } $lenght_counter++; ?>

                                                <?php if($modulus == 0){ ?>
                                                    </div>
                                                </div>
                                                <?php }$property_features_counter++ ?>
                                                <?php }  ?>

                                                <hr>

                                                <?php $image_counter = 1; $images = $this->Admin->exploder(",", rtrim($single_property_records->property_images,",")); ?>

                                                <?php $lenght_counter = 0; $lenght = count($images);
                                                foreach($images as $key => $value){  ?>
                                                <?php $modulus = $image_counter%4 ?>

                                                <?php if($modulus == 1){?>
                                                <div class="form-group">
                                                    <div class="row" style="margin-right: 0px; margin-left: 0px;">
                                                <?php } ?>

                                                <?php if($lenght_counter == $lenght-1 && $modulus != 0){ ?>

                                                    <div class="form-group">
                                                        <div class="row">

                                                <?php } ?>


                                                            <div class="col-md-3 hoverable_element_container" style="margin: 0px; position:relative; padding-right: 0px; padding-left: 0px;">
                                                                <a onclick="showImage(this)" class="pointer_cursor" href="javascript:;">
                                                                    <div class="hoverable_element text-center" style="width:100%; z-index:100; ">
                                                                        <i class="zmdi zmdi-eye" style="font-size: 30px; text-shadow: 1px 1px 20px black; color:white; width:100%; margin-top:25%; opacity: 1;"></i>

                                                                    </div>

                                                                    <img src="<?php echo base_url("property_upload/".$value) ?>" class="img-thumbnail" alt="" style="width:100%; margin-left:auto; margin-right: auto; display:block; position: relative; ">
                                                                </a>
                                                            </div>



                                                <?php if($lenght_counter == $lenght-1 && $modulus != 0){ ?>

                                                        </div>
                                                    </div>

                                                <?php } $lenght_counter++; ?>

                                                <?php if($modulus == 0){?>
                                                    </div>
                                                </div>
                                                <?php } $image_counter++; ?>
                                                <?php }  ?>

                                                <style type="text/css">
                                                    .hoverable_element_container .hoverable_element{
                                                        position: absolute;
                                                        width: 100% !important;
                                                        height: 100%;
                                                        display: none !important;
                                                        pointer-events: auto;
                                                        background: black;
                                                    }

                                                    .hoverable_element_container:hover .hoverable_element{

                                                        display:block !important;
                                                        opacity:0.3;

                                                    }
                                                </style>

                                                <hr>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <?php if(!empty($single_property_records->map)){?>

                                                            <?php $cords = explode(",",$single_property_records->map);?>
                                                            <label>First Coordinate</label>
                                                            <input class="form-control ed_coordinate_2" type="text" value="<?php print $cords[0];?>">



                                                        </div>

                                                        <div class="col-md-6">


                                                            <?php $cords = explode(",",$single_property_records->map);?>
                                                            <label>Second Coordinate</label>
                                                            <input  class="form-control ed_coordinate_1" type="text" value="<?php print trim($cords[1]);?>">

                                                            <?php } ?>

                                                        </div>

                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                            <?php if(!empty($single_property_records->map)){?>

                                                                <?php $cords = explode(",",$single_property_records->map);?>
                                                                <input id="cord1" type="hidden" value="<?php print $cords[0];?>">
                                                                <input id="cord2" type="hidden" value="<?php print trim($cords[1]);?>">
                                                                <div id="my_map_add" style="width:100%; height:300px;"></div>

                                                            <?php }?>

                                                        </div>

                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <label>Youtube Link</label>
                                                            <input class="form-control ed_youtube_link" type="text" value="<?php print $single_property_records->youtube_link; ?>">

                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-12">

                                                            <iframe width="100%" height="420" src="<?php echo $this->Admin->buildEmbededLink($single_property_records->youtube_link); ?>" frameborder="0" allow="autoplay; encrypted-media"  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                                                        </div>

                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="text-right">
                                                            <button onclick="initializePropertyEdit('<?php echo $single_property_records->unique_id; ?>')" type="button" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                                </div>



                                </div>


                            </div>
                            <!-- /tab content -->

                        </div>
                    </div>
                    <!-- /detached content -->

                </div>


                <!-- Footer -->
                <div class="footer text-muted">
                    &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->
    </div>
</div>
</div>
</body>
<?php require_once("jslib.php") ?>
</html>