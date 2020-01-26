<?php require_once("theHeader.php"); ?>
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <?php require_once("theSidebar.php"); ?>

        <!-- Main content -->
        <div class="content-wrapper">
            <?php $page_title = ucwords($property_record_type)?>
            <?php require_once("thePageHeader.php"); ?>


            <!-- Content area -->
            <div class="content">


                <!-- Main charts -->
                <div class="row">
                    <!--<div class="col-lg-7">

                        <!-- Traffic sources
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h6 class="panel-title">Traffic sources</h6>
                                <div class="heading-elements">
                                    <form class="heading-form" action="#">
                                        <div class="form-group">
                                            <label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                                                <input type="checkbox" class="switch" checked="checked">
                                                Live update:
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-plus3"></i></a>
                                            </li>
                                            <li class="text-left">
                                                <div class="text-semibold">New visitors</div>
                                                <div class="text-muted">2,349 avg</div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-visitors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-watch2"></i></a>
                                            </li>
                                            <li class="text-left">
                                                <div class="text-semibold">New sessions</div>
                                                <div class="text-muted">08:20 avg</div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-sessions"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-people"></i></a>
                                            </li>
                                            <li class="text-left">
                                                <div class="text-semibold">Total online</div>
                                                <div class="text-muted"><span class="status-mark border-success position-left"></span> 5,378 avg</div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative" id="traffic-sources"></div>
                        </div>


                    </div>-->

                    <div class="col-lg-5">

                        <!-- Sales stats -->
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h6 class="panel-title">Users statistics</h6>
                                <!--<div class="heading-elements">
                                    <form class="heading-form" action="#">
                                        <div class="form-group">
                                            <select class="change-date select-sm" id="select_date">
                                                <optgroup label="<i class='icon-watch pull-right'></i> Time period">
                                                    <option value="val1">June, 29 - July, 5</option>
                                                    <option value="val2">June, 22 - June 28</option>
                                                    <option value="val3" selected="selected">June, 15 - June, 21</option>
                                                    <option value="val4">June, 8 - June, 14</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </form>
                                </div>-->
                            </div>

                            <!--<div class="container-fluid">
                                <div class="row text-center">
                                    <div class="col-md-3">
                                        <div class="content-group">
                                            <h5 class="text-semibold no-margin"><i class="zmdi zmdi-account-circle position-left text-slate"></i> <?php /*echo $individual_count; */?></h5>
                                            <span class="text-muted text-size-small">Individuals</span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="content-group">
                                            <h5 class="text-semibold no-margin"><i class="zmdi zmdi-assignment-account position-left text-slate"></i> <?php /*echo $agent_count; */?></h5>
                                            <span class="text-muted text-size-small">Agents</span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="content-group">
                                            <h5 class="text-semibold no-margin"><i class="zmdi zmdi-home position-left text-slate"></i> <?php /*echo $builder_count; */?></h5>
                                            <span class="text-muted text-size-small">Builders</span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="content-group">
                                            <h5 class="text-semibold no-margin"><i class="zmdi zmdi-shield-check position-left text-slate"></i> <?php /*echo $owner_count; */?></h5>
                                            <span class="text-muted text-size-small">Owners</span>
                                        </div>
                                    </div>
                                </div>
                            </div>-->

                            <div class="content-group-sm" id="app_sales"></div>
                            <div id="monthly-sales-stats"></div>
                        </div>
                        <!-- /sales stats -->

                    </div>
                </div>
                <!-- /main charts -->

                <?php if($this->uri->segment(3) !== 'create' && $this->uri->segment(3) !== 'upload' && $this->uri->segment(3) !== 'success'){ ?>
                <!-- table for users -->
                <div class="row">
                    <div class="col-lg-12 ">

                        <!-- Page length options -->
                        <div class="panel panel-flat table-responsive">
                            <div class="panel-heading">
                                <h5 style="display: inline-block;" class="col-md-2 panel-title user_display"><?php echo $property_record_type; ?></h5>
                                <div style="display: inline-block; margin-bottom: 20px;" class="col-md-2">
                                    <select onchange="filterPropertySelect(this)" class="form-control">
                                        <option <?php if(strtolower($this->uri->segment(3)) === "all"){ echo "selected"; } ?> value="all">All Properties</option>
                                        <?php foreach($property_type as $key => $value){ ?>
                                            <option <?php if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_type']))){ echo "selected"; } ?> value="<?php echo str_replace(" ","_",$value['property_type']); ?>"><?php echo ucwords($value['property_type']); ?></option>
                                        <?php } ?>
                                        <?php foreach($property_category as $key => $value){ ?>
                                            <option <?php if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_category']))){ echo "selected"; } ?> value="<?php echo str_replace(" ","_",$value['property_category']); ?>"><?php echo ucwords($value['property_category']); ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div style="display: inline-block; margin-bottom: 20px;" class="col-md-1">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="icon-file-pdf"></i> Full Profile</a></li>
                                                <li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
                                                <li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>

                            <!--<div class="panel-body">
                                It is possible to easily customise the options shown in the length menu using the <code>lengthMenu</code> initialisation option. This parameter can take one of two forms: 1) A <code>1D</code> array of options which will be used for both the displayed option and the value; 2) A <code>2D</code> array in which the first array is used to define the value options and the second array the displayed options. The example below shows a 2D array being used to include a <code>"Show all"</code> records option.
                            </div>-->

                            <table class="table datatable-show-all">
                                <thead>
                                <tr >
                                    <th class="text-center">S/NO</th>
                                    <th class="text-center">Unique ID</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Purpose</th>
                                    <th class="text-center">Thumbnail</th>
                                    <th class="text-center">Location</th>
                                    <th class="text-center">City, Country</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php if(count($property_records) > 0){ $no = 0; ?>
                                    <?php foreach(array_reverse($property_records) as $values){ $no++; ?>
                                        <tr style="<?php if($values['delete_status'] == 'yes'){ echo "background-color:#CCCCCC;"; }else if(strtolower($values['property_status']) === "unavailable"){ echo "background-color:#EEEEEE;"; }?>" >
                                            <td class="text-center"><?php echo $no; ?></td>
                                            <td class="text-center"><span class='label label-success'><?php echo $values['unique_id']; ?></span></td>
                                            <td class="text-center"><?php echo $values['property_category']; ?></td>
                                            <td class="text-center"><?php echo $values['property_purpose']; ?></td>
                                            <td class="text-center"><img src="<?php echo base_url('property_upload/'.$values['property_thumbnail'])?>" style="width: 100px;"></td>
                                            <td class="text-center"><?php echo $values['property_location']; ?></td>
                                            <td class="text-center"><?php echo $values['property_city'].", ".$values['property_country']; ?></td>
                                            <td class="text-center"><?php echo $values['currency'].' '.number_format($values['property_price'],2,'.',','); ?></td>
                                            <td class="text-center"><?php if(strtolower($values['property_status']) === "available"){ echo "<span class='label label-success'>Available</span>"; }else{ echo "<span class='label label-danger'>Not Available</span>"; } ?></td>

                                            <td class="text-center">

                                                <?php if($values['delete_status'] === 'yes'){ echo "<span class='badge badge-danger'>Deleted</span>"; }else if(strtolower($values['property_status']) === "unavailable"){ echo "<span class='badge badge-danger'>Not Available</span>"; }?>

                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a target="_blank" href="<?php echo base_url('admin_control/property_details/'.$values['unique_id']).'/'.$values['whois_unique_id']; ?>"><i class="zmdi zmdi-account-circle"></i> Detailed View</a></li>
                                                            <li>
                                                                <?php if(strtolower($values['property_status']) === "available"){ ?>
                                                                    <a onclick="propertyAction('make_property_un_available','<?php echo $values['unique_id'] ?>')" href="javascript:;"><i class="zmdi zmdi-block-alt"></i> Make Un-available</a>
                                                                <?php }else if(strtolower($values['property_status']) === "unavailable"){?>
                                                                    <a onclick="propertyAction('make_property_available','<?php echo $values['unique_id'] ?>')" href="javascript:;"><i class="zmdi zmdi-lock-open"></i> Make Available</a>

                                                                <?php } ?>
                                                            </li>

                                                            <li>
                                                                <?php if(strtolower($values['delete_status']) === "no"){ ?>
                                                                    <a onclick="propertyAction('delete_property','<?php echo $values['unique_id'] ?>')" href="javascript:;"><i class="zmdi zmdi-delete"></i> Delete Property</a>
                                                                <?php }else if(strtolower($values['delete_status']) === "yes"){?>
                                                                    <a onclick="propertyAction('reverse_property_delete','<?php echo $values['unique_id'] ?>')" href="javascript:;"><i class="zmdi zmdi-refresh"></i> Reverse Property Delete</a> <?php } ?>
                                                            </li>

                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>

                                        </tr>

                                    <?php } } ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <?php } ?>

                <?php if($this->uri->segment(3) === 'create'){ ?>

                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"><?php echo $property_record_type; ?></h5>
                                </div>

                                <div class="panel-body" style="margin-top: 40px;">

                                    <div class="row">


                                        <?php echo form_open('admin_control/processPlanListing/create'); ?>


                                        <?php if($this->session->flashdata('property_upload_error')){ ?>
                                            <p class="alert-warning col-md-10 col-md-offset-1 " style="color:black; padding:10px; font-size:16px;">
                                                <?php echo $this->session->flashdata('property_upload_error'); ?>
                                            </p>
                                        <?php } ?>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Title</label>
                                                <input type="text" placeholder="Eg: Two Bed Room Flat with Nice Facilities" value="<?php echo set_value('title_of_property'); ?>" name="title_of_property" class="form-control">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('title_of_property'); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Property Category</label>

                                            <select class="form-control" name="property_category">
                                                <?php $category_returned = set_value('property_category'); ?>
                                                <option value="">Choose Category</option>

                                                <?php foreach($property_category as $k => $value){ ?>

                                                    <option <?php if(strtolower($category_returned) === strtolower(ucwords($value['property_category']))){ echo "Selected"; } ?> value="<?php echo $value['property_category']; ?>"><?php echo ucwords($value['property_category']); ?></option>

                                                <?php } ?>

                                            </select>
                                            <span class="text-left label label-block label-danger"><?php echo form_error('property_category'); ?></span>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Property Purpose</label>
                                            <select class="form-control" name="property_purpose">

                                                <?php $property_purpose_returned = set_value('property_purpose'); ?>
                                                <option value="">Choose Property Purpose</option>
                                                <?php foreach($property_purpose as $k => $value){ ?>

                                                    <option <?php if(strtolower($property_purpose_returned) === strtolower(ucwords($value['property_purpose']))){ echo "Selected"; } ?> value="<?php echo $value['property_purpose']; ?>"><?php echo ucwords($value['property_purpose']); ?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="text-left label label-block label-danger"><?php echo form_error('property_purpose'); ?></span>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Property Type</label>
                                            <select class="form-control property_type" name="property_type">

                                                <?php $property_type_returned = set_value('property_type'); ?>
                                                <option value="">Choose Property Type</option>
                                                <?php foreach($property_type as $k => $value){ ?>

                                                    <option <?php if(strtolower($property_type_returned) === strtolower(ucwords($value['property_type']))){ echo "Selected"; } ?> value="<?php echo $value['property_type']; ?>"><?php echo ucwords($value['property_type']); ?>
                                                    </option>
                                                <?php } ?>

                                            </select>
                                            <span class="text-left label label-block label-danger"><?php echo form_error('property_type'); ?></span>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 20px;">
                                        <div class="col-lg-2 col-md-2">
                                            <div class="form-group">
                                                <label>Currency* </label>
                                                <?php $currency_returned = set_value('currency'); ?>
                                                <select class="form-control"  name="currency" id="property_currency">
                                                    <option value="">Choose Currency</option>
                                                    <option <?php if($currency_returned=='NG') echo 'selected="selected"';?> value="NG">₦</option>
                                                    <option <?php if($currency_returned=='US') echo 'selected="selected"';?> value="US">$</option>
                                                </select>
                                                <span class="text-left label label-block label-danger"><?php echo form_error('currency'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-2">
                                            <div class="form-group">
                                                <label>Price* </label>
                                                <input type="number" value="<?php echo set_value('property_price'); ?>" class="form-control" name="property_price" placeholder="">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('property_price'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label>Property Status* </label>
                                                <select class="form-control"  name="property_status" id="status">
                                                    <?php $property_status = set_value('property_status'); ?>
                                                    <option <?php if($property_status=='Available') echo 'selected="selected"';?> value="Available">Available</option>
                                                    <!--<option <?php /*if($property_status=='Taken') echo 'selected="selected"';*/?> value="unavailable">Un-Available</option>-->
                                                </select>
                                                <span class="text-left label label-block label-danger"><?php echo form_error('property_status'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div  class="form-group">
                                                <label>No. of Bedrooms </label>
                                                <input value="<?php echo set_value('num_rom'); ?>" type="number" class="form-control" name="num_rom" id="num_rom" placeholder="">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('num_rom'); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" >

                                        <div class="col-lg-4 col-md-4">
                                            <div  class="form-group">
                                                <label>No. of Toilets</label>
                                                <input value="<?php echo set_value('plan_toilet'); ?>" type="number" class="form-control" name="plan_toilet" id="toilet" placeholder="">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('plan_toilet'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label>No. of Bathrooms </label>
                                                <input value="<?php echo set_value('plan_bathroom'); ?>" type="number" class="form-control" name="plan_bathroom" id="bathroom" placeholder="">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('plan_bathroom'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label>Parking Space </label>
                                                <input type="number" class="form-control" value="<?php echo set_value('plan_parking'); ?>" name="plan_parking" id="parking" placeholder="">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('plan_parking'); ?></span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Total Land Area(sqm) </label>
                                                <input value="<?php echo set_value('land_area'); ?>" type="number" class="form-control" name="land_area" id="land_area" placeholder="">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('land_area'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Area Covered by Property(sqm) </label>
                                                <input value="<?php echo set_value('property_area'); ?>" type="number" class="form-control" name="property_area" id="property_area" placeholder="">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('property_area'); ?></span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-12">
                                            <h3 class="text-uppercase">Other Property Features*</h3>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Other Property Features* </label>
                                                <p class="help-block"><em><small>Type a word/sentence then hit enter</small></em></p>
                                                <input type="text" name="features" id="features" class="form-control" value="Eg: constant water supply, " data-role="tagsinput" placeholder=" " />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Country*</label>
                                                <div id="display">
                                                    <select class="form-control" name="selected_country" id="selected_country">
                                                        <option value="">Select Country</option>
                                                        <?php $country_returned = set_value('selected_country'); ?>
                                                        <option value="" selected="selected">--Select Country--</option>
                                                        <?php for($i=0;$i<count($country);$i++){?>
                                                            <option <?php if($country === $country_returned){ echo 'selected'; } ?> value="<?php echo $country[$i];?>"><?php echo $country[$i];?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="text-left label label-block label-danger"><?php echo form_error('selected_country'); ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>State*</label>
                                                <select class="form-control" onchange="getSelectedState(this)" name="state" >
                                                    <?php $state = set_value('state'); ?>
                                                    <option value="" selected="selected">--Select State--</option>
                                                    <?php for($i=0;$i<count($state_in_nigeria);$i++){?>
                                                        <option <?php if($state === $state_in_nigeria){ echo 'selected'; } ?> value="<?php echo $state_in_nigeria[$i];?>"><?php echo $state_in_nigeria[$i];?></option>
                                                    <?php }?>
                                                </select>
                                                <span class="text-left label label-block label-danger"><?php echo form_error('state'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Locality(L.G.A)*</label>
                                                <div id="display">
                                                    <select class="form-control" name="lg" id="lg">
                                                        <option value="">Select L.G.A</option>
                                                        <?php $lg_returned = set_value('lg'); ?>
                                                        <?php if($lg_returned !== ''){ ?>

                                                            <option selected value="<?php echo $lg_returned; ?>"><?php echo $lg_returned; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="text-left label label-block label-danger"><?php echo form_error('lg'); ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Area/Town(eg: Uwani)*</label>
                                                <input value="<?php echo set_value('area'); ?>" type="text" class="form-control" name="area" id="area" placeholder="eg. Uwani">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('area'); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mapper">
                                        <div class="col-md-12"><h4>Help people find this property easily <a target="_blank" href="https://www.youtube.com/watch?v=2yOX7soSPeQ">(help)</a></h4></div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Latitude</label>
                                                <input value="<?php echo set_value('lat'); ?>" type="text" class="form-control" name="lat" id="lat" placeholder="Latitude">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('lat'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Longitude</label>
                                                <input value="<?php echo set_value('long'); ?>" type="text" class="form-control" name="long" id="long" placeholder="Longitude">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('long'); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Street/Road* </label>
                                                <input type="text" value="<?php echo set_value('street'); ?>" class="form-control" name="street" id="town" placeholder="eg. No 3 Ogbonnayaka Street">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('street'); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div  class="form-group">
                                                <label>Payment Mood*</label>
                                                <select class="form-control"  name="paymood" id="paymood">
                                                    <?php $payment_mood = $this->Admin->getAllPaymentMood(); print_r($payment_mood) ?>
                                                    <option selected="selected" value="">Select Payment Mood</option>
                                                    <?php $payment_mood_returned = set_value('paymood')?>
                                                    <?php for($i=0;$i<count($payment_mood);$i++){?>
                                                        <option <?php if($payment_mood_returned === $payment_mood[$i]){ echo 'selected'; }?> value="<?php echo $payment_mood[$i]['payment_mood'];?>"><?php echo $payment_mood[$i]['payment_mood'];?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="text-left label label-block label-danger"><?php echo form_error('paymood'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div  class="form-group">
                                                <label>Apartment Standard</label>
                                                <select class="form-control" name="standard" id="standard">
                                                    <option <?php if($apartment_stnd=='Furnished') echo 'selected="selected"';?> value="Furnished">Furnished</option>
                                                    <option <?php if($apartment_stnd=='Renovated') echo 'selected="selected"';?> value="Renovated">Renovated</option>
                                                    <option <?php if($apartment_stnd=='Serviced') echo 'selected="selected"';?> value="Serviced">Serviced</option>
                                                    <option <?php if($apartment_stnd=='Not Furnished') echo 'selected="selected"';?> value="Not Furnished">Not Furnished</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>YouTube Link</label>
                                                <input type="text" class="form-control" name="youtube" id="youtube" placeholder="https://www.youtube.com/watch?v=xxxxxxxx" value="<?php echo set_value('youtube'); ?>" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="contact-form">
                                                <div class="form-group">
                                                    <label>Property Description* </label>

                                                    <button style="display: inline-block;" onclick="previewAssessment(this)" type="button" class="btn btn-primary">View Preview</button>
                                                    <div style="margin-top: 20px;" class="summernote-theme-3">
                                                        <textarea class="summernote ed_property_description" placeholder="Enter News Here" name="description"><?php echo set_value('description'); ?></textarea>
                                                        <span class="text-left label label-block label-danger"><?php echo form_error('description'); ?></span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="form-group">
                                                <button type="submit" name="submit_plan" class="btn btn-block btn-info">Submit Plan</button>
                                            </div>
                                        </div>

                                    </div>



                                        </form>



                                </div>

                            </div>
                        </div>
                    </div>

                <?php } ?>

                <?php if($this->uri->segment(3) === 'upload'){ ?>

                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"><?php echo $property_record_type; ?></h5>
                                </div>

                                <div class="panel-body" style="margin-top: 40px;">

                                    <?php echo form_open('admin_control/processPlanListing/all/create'); ?>

                                    <div class="row">
                                        <?php if($this->session->flashdata('property_upload_error')){ ?>
                                            <p class="alert-warning col-md-10 col-md-offset-1 " style="color:black; padding:10px; font-size:16px;">
                                                <?php echo $this->session->flashdata('property_upload_error'); ?>
                                            </p>
                                        <?php } ?>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-3">

                                            <div class="img-thumbnail-holder">
                                                <figure style="position: relative">

                                                        <img src="<?php echo base_url('property_upload/'.$post_details[0]['property_thumbnail'])?>" class="img-responsive thumbnail_image_holder">

                                                    <figcaption>Image Thumbnail</figcaption>
                                                    <div class="thumbnail_getter text-center" onClick="performClick('upload_image')">
                                                        <i class="fa fa-camera fa-3x text-center" style="color:white; margin-top: 20%; z-index:10;"></i>
                                                    </div>
                                                </figure>
                                            </div>

                                            <input style="display: none;" type="file" name="upload_image" id="upload_image" />
                                            <input id="post_id" value="<?php print $this->uri->segment(4);?>" type="hidden" name="id" />
                                            <input id="baseurl" value="<?php print base_url();?>" type="hidden" name="baseurl" />
                                            <!--<p>Note: you can select multiple image</p>-->
                                            <input style="display: none;" type="file" name="multiple_image" id="multiple_image" multiple />

                                        </div>

                                        <div class="col-md-9">

                                            <div class="image-box" style="padding: 10px 10px;">

                                                <script>
                                                    $(document).ready(function(){
                                                        createImageDisplay('<?php echo rtrim($post_details[0]['property_images'],','); ?>');
                                                    })
                                                </script>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6 col-md-offset-3" style="margin-top: 10px;">
                                            <div class="form-group">
                                                <button type="button" name="delete_images" class="btn btn-info btn-icon delete_images" onclick="deleteSelectedPropertyImage()" ><i class="fa fa-trash"></i></button>
                                                <button type="button" onclick="activateImageUpload('multiple_image')" name="upload_images" class="btn btn-info btn-icon upload_images"><i class="fa fa-camera"></i></button>
                                                <a href="<?php echo base_url('admin_control/all_properties/success/'.$this->uri->segment(4)) ?>" class="btn btn-info btn-icon">Save and Continue</a>
                                            </div>
                                        </div>

                                    </div>


                                    </form>



                                </div>

                            </div>
                        </div>
                    </div>

                    <style>

                        @media (max-width: 767px) {
                            .my_modal{
                                width: 80%;
                                left: 10%;
                                top:20px;
                                z-index: 1000;
                                position: absolute;
                                background: #fff;
                                display: none;
                            }
                        }
                        @media (min-width: 768px) {
                            .my_modal{
                                width: 80%;
                                left: 10%;
                                top:20px;
                                z-index: 1000;
                                position: absolute;
                                background: #fff;
                                display: none;
                            }
                        }
                        @media (min-width: 1200px) {
                            .my_modal{
                                width: 80%;
                                left: 10%;
                                top:20px;
                                z-index: 1000;
                                position: absolute;
                                background: #fff;
                                display: none;
                            }
                        }

                    </style>

                    <div class="my_modal">
                        <div style="width: 100%; margin: 20px;">
                            <div style="width: 100%;" class="text-center">
                                <div id="image_demo" style="width:100%;"></div>
                            </div>
                            <div style="width: 100%;" class=" text-center">
                                <button type="button" onclick="closeMyModal('my_modal')" class="btn btn-link">Close</button>
                                <button type="button" class="btn btn-primary crop_image">Upload</button>
                            </div>
                        </div>
                    </div>


                <?php } ?>


                <?php if($this->uri->segment(3) === 'success'){ ?>

                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"><?php echo $property_record_type; ?></h5>
                                </div>

                                <div class="panel-body" style="margin-top: 40px;">


                                    <div class="row">
                                        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0 text-center">

                                            <h2 class="text-center">
                                                Thank you. Your Property was listed successfully. For people to start seeing your listing you have to publish it.
                                            </h2>

                                            <div><a class="btn btn-success" onclick="publishNow('publish_property','<?php echo $this->uri->segment(4) ?>')" href="javascript:;">Publish Now</a>&nbsp;&nbsp;<a class="btn btn-info" onclick="publishNow('publish_property_later','<?php echo $this->uri->segment(4) ?>')" href="javascript:;">Publish Later</a></div>

                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>


                <?php } ?>

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
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
<?php require_once("jslib.php") ?>
</html>
