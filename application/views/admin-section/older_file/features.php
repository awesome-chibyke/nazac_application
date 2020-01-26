<?php require_once("theHeader.php"); ?>
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <?php require_once("theSidebar.php"); ?>

        <!-- Main content -->
        <div class="content-wrapper">
            <?php $page_title = ucwords($feature_type)?>
            <?php require_once("thePageHeader.php"); ?>


            <!-- Content area -->
            <div class="content">


                <!-- Main charts -->
                <div class="row">
                    <!--<div class="col-lg-7">

                         Traffic sources
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

                            <div class="content-group-sm" id="app_sales"></div>
                            <div id="monthly-sales-stats"></div>
                        </div>
                        <!-- /sales stats -->

                    </div>
                </div>
                <!-- /main charts -->

                <?php if($this->uri->segment(3) === 'types'){ ?>

                <!-- table for users -->
                <div class="row">
                    <div class="col-lg-5 ">

                        <!-- Page length options -->
                        <div class="panel panel-flat table-responsive">
                            <div class="panel-heading">
                                <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"><?php echo $feature_type; ?></h5>
                                <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-2">
                                    <select onchange="filterRequestSelect(this)" class="form-control">
                                        <option <?php /*if(strtolower($this->uri->segment(3)) === "all"){ echo "selected"; } */?> value="all">All Saved Properties</option>
                                        <?php /*foreach($property_type as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_type']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_type']); */?>"><?php /*echo ucwords($value['property_type']); */?></option>
                                        <?php /*} */?>
                                        <?php /*foreach($property_category as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_category']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_category']); */?>"><?php /*echo ucwords($value['property_category']); */?></option>
                                        <?php /*} */?>

                                    </select>
                                </div>-->
                                <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-1">
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
                                </div>-->
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>

                            <table class="table datatable-show-all">
                                <thead>
                                <tr >
                                    <th class="text-center">S/NO</th>
                                    <th class="text-center">Property Type</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php if(count($property_types) > 0){ $no = 0; ?>
                                    <?php foreach(array_reverse($property_types) as $values){ $no++; ?>

                                        <!--select from the property table using the property unque id-->
                                        <tr >
                                            <td class="text-center">
                                                <span><?php echo $no; ?></span>
                                            </td>
                                            <td class="text-center"><span class='label label-success'><?php echo $values['property_type']; ?></span></td>

                                            <!--<td class="text-center">
                                                <?php /*if($property_details[0]['delete_status'] == 'yes'){ echo "<span class='badge badge-danger'>Deleted</span>"; }else if(strtolower($property_details[0]['property_status']) !== "available"){ echo "<span class='badge badge-danger'>Not Available</span>"; }*/?>
                                                <br>
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a target="_blank" href="<?php /*echo base_url('admin_control/profile/'.$user_details[0]['unique_id']); */?>"><i class="zmdi zmdi-account-circle"></i> User's Profile</a></li>
                                                            <li><a target="_blank" href="<?php /*echo base_url('admin_control/profile/'.$agents_details[0]['unique_id']); */?>"><i class="zmdi zmdi-account-circle"></i> User's Profile</a></li>
                                                            <li>
                                                                <a target="_blank" href="<?php /*echo base_url('admin_control/property_details/'.$property_details[0]['unique_id']).'/'.$property_details[0]['whois_unique_id']; */?>"><i class="zmdi zmdi-account-circle"></i> Property Details</a>
                                                            </li>


                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>-->

                                        </tr>

                                    <?php } } ?>

                                </tbody>
                            </table>
                        </div>

                    </div>

                    <!--carries the input field-->

                    <div class="col-lg-7">

                        <!-- Page length options -->
                        <div class="panel panel-flat table-responsive">
                            <div class="panel-heading">
                                <h5 style="display: inline-block;" class="col-md-4 panel-title user_display">Add <?php echo ucfirst($feature_type); ?></h5>
                                <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-2">
                                    <select onchange="filterRequestSelect(this)" class="form-control">
                                        <option <?php /*if(strtolower($this->uri->segment(3)) === "all"){ echo "selected"; } */?> value="all">All Saved Properties</option>
                                        <?php /*foreach($property_type as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_type']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_type']); */?>"><?php /*echo ucwords($value['property_type']); */?></option>
                                        <?php /*} */?>
                                        <?php /*foreach($property_category as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_category']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_category']); */?>"><?php /*echo ucwords($value['property_category']); */?></option>
                                        <?php /*} */?>

                                    </select>
                                </div>-->
                                <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-1">
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
                                </div>-->
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="panel-body">

                                <div class="form-group property_type_holders" id="main_property_type_holders" style="margin-top: 30px;">
                                    <div class="row">

                                        <div class="col-md-8">

                                            <!--<label>New Property Type</label>-->
                                            <input type="text" onblur="removeSelectBorder(this)" placeholder="Property Type" class="form-control property_type_values">
                                        </div>


                                    </div>
                                </div>

                                <div class="form-group new_row" style="margin-top: 30px;">
                                    <div class="row">

                                        <div class="col-md-8 float-right">
                                            <button onclick="createNewFeatureField(this, 'Property Type')" type="button" class="btn btn-primary btn-small">New field</button>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group" style="margin-top: 30px;">
                                    <div class="row">

                                        <div class="col-md-8">
                                            <button onclick="submitCoreFeatures('Property Type')" type="button" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!--carries the input field-->

                </div>

                <?php } ?>


                <?php if($this->uri->segment(3) === 'category'){ ?>

                    <!-- table for users -->
                    <div class="row">
                        <div class="col-lg-5">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"><?php echo $feature_type; ?></h5>
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-2">
                                    <select onchange="filterRequestSelect(this)" class="form-control">
                                        <option <?php /*if(strtolower($this->uri->segment(3)) === "all"){ echo "selected"; } */?> value="all">All Saved Properties</option>
                                        <?php /*foreach($property_type as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_type']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_type']); */?>"><?php /*echo ucwords($value['property_type']); */?></option>
                                        <?php /*} */?>
                                        <?php /*foreach($property_category as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_category']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_category']); */?>"><?php /*echo ucwords($value['property_category']); */?></option>
                                        <?php /*} */?>

                                    </select>
                                </div>-->
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-1">
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
                                    </div>-->
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <table class="table datatable-show-all">
                                    <thead>
                                    <tr >
                                        <th class="text-center">S/NO</th>
                                        <th class="text-center">Property Category</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php if(count($property_category) > 0){ $no = 0; ?>
                                        <?php foreach(array_reverse($property_category) as $values){ $no++; ?>

                                            <!--select from the property table using the property unque id-->
                                            <tr >
                                                <td class="text-center">
                                                    <span><?php echo $no; ?></span>
                                                </td>
                                                <td class="text-center"><span class='label label-success'><?php echo $values['property_category']; ?></span></td>

                                                <!--<td class="text-center">
                                                <?php /*if($property_details[0]['delete_status'] == 'yes'){ echo "<span class='badge badge-danger'>Deleted</span>"; }else if(strtolower($property_details[0]['property_status']) !== "available"){ echo "<span class='badge badge-danger'>Not Available</span>"; }*/?>
                                                <br>
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a target="_blank" href="<?php /*echo base_url('admin_control/profile/'.$user_details[0]['unique_id']); */?>"><i class="zmdi zmdi-account-circle"></i> User's Profile</a></li>
                                                            <li><a target="_blank" href="<?php /*echo base_url('admin_control/profile/'.$agents_details[0]['unique_id']); */?>"><i class="zmdi zmdi-account-circle"></i> User's Profile</a></li>
                                                            <li>
                                                                <a target="_blank" href="<?php /*echo base_url('admin_control/property_details/'.$property_details[0]['unique_id']).'/'.$property_details[0]['whois_unique_id']; */?>"><i class="zmdi zmdi-account-circle"></i> Property Details</a>
                                                            </li>


                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>-->

                                            </tr>

                                        <?php } } ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="col-lg-7">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display">Add <?php echo ucfirst($feature_type); ?></h5>
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-2">
                                    <select onchange="filterRequestSelect(this)" class="form-control">
                                        <option <?php /*if(strtolower($this->uri->segment(3)) === "all"){ echo "selected"; } */?> value="all">All Saved Properties</option>
                                        <?php /*foreach($property_type as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_type']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_type']); */?>"><?php /*echo ucwords($value['property_type']); */?></option>
                                        <?php /*} */?>
                                        <?php /*foreach($property_category as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_category']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_category']); */?>"><?php /*echo ucwords($value['property_category']); */?></option>
                                        <?php /*} */?>

                                    </select>
                                </div>-->
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-1">
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
                                    </div>-->
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="form-group property_type_holders" id="main_property_type_holders" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8">

                                                <!--<label>New Property Type</label>-->
                                                <input type="text" onblur="removeSelectBorder(this)" placeholder="Property Category" class="form-control property_type_values">
                                            </div>


                                        </div>
                                    </div>

                                    <div class="form-group new_row" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8 float-right">
                                                <button onclick="createNewFeatureField(this, 'Property Category')" type="button" class="btn btn-primary btn-small">New field</button>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <button onclick="submitCoreFeatures('Property Type')" type="button" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>

                <?php } ?>

                <?php if($this->uri->segment(3) === 'purpose'){ ?>

                    <!-- table for users -->
                    <div class="row">
                        <div class="col-lg-5">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"><?php echo $feature_type; ?></h5>
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-2">
                                    <select onchange="filterRequestSelect(this)" class="form-control">
                                        <option <?php /*if(strtolower($this->uri->segment(3)) === "all"){ echo "selected"; } */?> value="all">All Saved Properties</option>
                                        <?php /*foreach($property_type as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_type']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_type']); */?>"><?php /*echo ucwords($value['property_type']); */?></option>
                                        <?php /*} */?>
                                        <?php /*foreach($property_category as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_category']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_category']); */?>"><?php /*echo ucwords($value['property_category']); */?></option>
                                        <?php /*} */?>

                                    </select>
                                </div>-->
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-1">
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
                                    </div>-->
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <table class="table datatable-show-all">
                                    <thead>
                                    <tr >
                                        <th class="text-center">S/NO</th>
                                        <th class="text-center">Property Category</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php if(count($property_purpose) > 0){ $no = 0; ?>
                                        <?php foreach(array_reverse($property_purpose) as $values){ $no++; ?>

                                            <!--select from the property table using the property unque id-->
                                            <tr >
                                                <td class="text-center">
                                                    <span><?php echo $no; ?></span>
                                                </td>
                                                <td class="text-center"><span class='label label-success'><?php echo $values['property_purpose']; ?></span></td>

                                                <!--<td class="text-center">
                                                <?php /*if($property_details[0]['delete_status'] == 'yes'){ echo "<span class='badge badge-danger'>Deleted</span>"; }else if(strtolower($property_details[0]['property_status']) !== "available"){ echo "<span class='badge badge-danger'>Not Available</span>"; }*/?>
                                                <br>
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a target="_blank" href="<?php /*echo base_url('admin_control/profile/'.$user_details[0]['unique_id']); */?>"><i class="zmdi zmdi-account-circle"></i> User's Profile</a></li>
                                                            <li><a target="_blank" href="<?php /*echo base_url('admin_control/profile/'.$agents_details[0]['unique_id']); */?>"><i class="zmdi zmdi-account-circle"></i> User's Profile</a></li>
                                                            <li>
                                                                <a target="_blank" href="<?php /*echo base_url('admin_control/property_details/'.$property_details[0]['unique_id']).'/'.$property_details[0]['whois_unique_id']; */?>"><i class="zmdi zmdi-account-circle"></i> Property Details</a>
                                                            </li>


                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>-->

                                            </tr>

                                        <?php } } ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="col-lg-7">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display">Add <?php echo ucfirst($feature_type); ?></h5>
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-2">
                                    <select onchange="filterRequestSelect(this)" class="form-control">
                                        <option <?php /*if(strtolower($this->uri->segment(3)) === "all"){ echo "selected"; } */?> value="all">All Saved Properties</option>
                                        <?php /*foreach($property_type as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_type']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_type']); */?>"><?php /*echo ucwords($value['property_type']); */?></option>
                                        <?php /*} */?>
                                        <?php /*foreach($property_category as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_category']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_category']); */?>"><?php /*echo ucwords($value['property_category']); */?></option>
                                        <?php /*} */?>

                                    </select>
                                </div>-->
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-1">
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
                                    </div>-->
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="form-group property_type_holders" id="main_property_type_holders" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8">

                                                <!--<label>New Property Type</label>-->
                                                <input type="text" onblur="removeSelectBorder(this)" placeholder="Property Purpose" class="form-control property_type_values">
                                            </div>


                                        </div>
                                    </div>

                                    <div class="form-group new_row" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8 float-right">
                                                <button onclick="createNewFeatureField(this, 'Property Purpose')" type="button" class="btn btn-primary btn-small">New field</button>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <button onclick="submitCoreFeatures('Property Type')" type="button" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>

                <?php } ?>

                <?php if($this->uri->segment(3) === 'rate'){ ?>

                    <!-- table for users -->
                    <div class="row">
                        <div class="col-lg-5">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"><?php echo $feature_type; ?></h5>
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-2">
                                    <select onchange="filterRequestSelect(this)" class="form-control">
                                        <option <?php /*if(strtolower($this->uri->segment(3)) === "all"){ echo "selected"; } */?> value="all">All Saved Properties</option>
                                        <?php /*foreach($property_type as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_type']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_type']); */?>"><?php /*echo ucwords($value['property_type']); */?></option>
                                        <?php /*} */?>
                                        <?php /*foreach($property_category as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_category']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_category']); */?>"><?php /*echo ucwords($value['property_category']); */?></option>
                                        <?php /*} */?>

                                    </select>
                                </div>-->
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-1">
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
                                    </div>-->
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <table class="table datatable-show-all">
                                    <thead>
                                    <tr >
                                        <th class="text-center">S/NO</th>
                                        <th class="text-center">Currency</th>
                                        <th class="text-center">Naira Equivalent</th>
                                        <th class="text-center">Options</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php if(count($currency_rate_details) > 0){ $no = 0; ?>
                                        <?php foreach(array_reverse($currency_rate_details) as $values){ $no++; ?>

                                            <!--select from the property table using the property unque id-->
                                            <tr >
                                                <td class="text-center">
                                                    <span><?php echo $no; ?></span>
                                                </td>
                                                <td class="text-center"><span class='label label-success'><?php echo $values['currency']; ?></span></td>
                                                <td class="text-center"><span class='label label-success'><?php echo $values['ng']; ?></span></td>

                                                <td class="text-center">

                                                <br>
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a onclick="coreFeatureAction(this,'edit_currency_rate','<?php echo $values['id'] ?>')" href="javascript:;"><i class="zmdi zmdi-account-circle"></i> Edit Rate</a></li>
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

                        <div class="col-lg-7">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display">Add <?php echo ucfirst($feature_type); ?></h5>
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-2">
                                    <select onchange="filterRequestSelect(this)" class="form-control">
                                        <option <?php /*if(strtolower($this->uri->segment(3)) === "all"){ echo "selected"; } */?> value="all">All Saved Properties</option>
                                        <?php /*foreach($property_type as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_type']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_type']); */?>"><?php /*echo ucwords($value['property_type']); */?></option>
                                        <?php /*} */?>
                                        <?php /*foreach($property_category as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_category']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_category']); */?>"><?php /*echo ucwords($value['property_category']); */?></option>
                                        <?php /*} */?>

                                    </select>
                                </div>-->
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-1">
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
                                    </div>-->
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="form-group property_type_holders" id="main_property_type_holders" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-4">

                                                <!--<label>New Property Type</label>-->
                                                <input type="text" onblur="removeSelectBorder(this)" placeholder="Enter Currency Name" class="form-control currency_values">
                                            </div>
                                            <div class="col-md-4">

                                                <!--<label>New Property Type</label>-->
                                                <input type="text" onblur="removeSelectBorder(this)" placeholder="Enter Rate of Currency in Naira" class="form-control currency_rate_values">
                                            </div>


                                        </div>
                                    </div>

                                    <div class="form-group new_row" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8 float-right">
                                                <button onclick="createNewFeatureField(this, 'Currency Rate', {'placeholder':'Enter Currency Name', 'classname':'currency_values'}, {'placeholder':'Enter Rate of Currency in Naira', 'classname':'currency_rate_values'})" type="button" class="btn btn-primary btn-small">New field</button>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <button onclick="submitCoreFeatures('Currency Rate')" type="button" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>

                <?php } ?>


                <?php if($this->uri->segment(3) === 'payment_gateway'){ ?>

                    <!-- table for users -->
                    <div class="row">
                        <div class="col-lg-5">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"><?php echo $feature_type; ?></h5>
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-2">
                                    <select onchange="filterRequestSelect(this)" class="form-control">
                                        <option <?php /*if(strtolower($this->uri->segment(3)) === "all"){ echo "selected"; } */?> value="all">All Saved Properties</option>
                                        <?php /*foreach($property_type as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_type']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_type']); */?>"><?php /*echo ucwords($value['property_type']); */?></option>
                                        <?php /*} */?>
                                        <?php /*foreach($property_category as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_category']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_category']); */?>"><?php /*echo ucwords($value['property_category']); */?></option>
                                        <?php /*} */?>

                                    </select>
                                </div>-->
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-1">
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
                                    </div>-->
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <table class="table datatable-show-all">
                                    <thead>
                                    <tr >
                                        <th class="text-center">S/NO</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Keyword</th>
                                        <th class="text-center">Options</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php if(count($payment_gateway_details) > 0){ $no = 0; ?>
                                        <?php foreach(array_reverse($payment_gateway_details) as $values){ $no++; ?>

                                            <!--select from the property table using the property unque id-->
                                            <tr >
                                                <td class="text-center">
                                                    <span><?php echo $no; ?></span>
                                                </td>
                                                <td class="text-center"><span class='label label-success'><?php echo $values['title']; ?></span></td>
                                                <td class="text-center"><span class='label label-success'><?php echo $values['key_word']; ?></span></td>

                                                <td class="text-center">

                                                    <br>
                                                    <ul class="icons-list">
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="icon-menu9"></i>
                                                            </a>

                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li><a onclick="coreFeatureAction(this,'edit_payment_gateway','<?php echo $values['id'] ?>')" href="javascript:;"><i class="zmdi zmdi-account-circle"></i> Edit Rate</a></li>
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

                        <div class="col-lg-7">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display">Add <?php echo ucfirst($feature_type); ?></h5>
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-2">
                                    <select onchange="filterRequestSelect(this)" class="form-control">
                                        <option <?php /*if(strtolower($this->uri->segment(3)) === "all"){ echo "selected"; } */?> value="all">All Saved Properties</option>
                                        <?php /*foreach($property_type as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_type']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_type']); */?>"><?php /*echo ucwords($value['property_type']); */?></option>
                                        <?php /*} */?>
                                        <?php /*foreach($property_category as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_category']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_category']); */?>"><?php /*echo ucwords($value['property_category']); */?></option>
                                        <?php /*} */?>

                                    </select>
                                </div>-->
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-1">
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
                                    </div>-->
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="form-group property_type_holders" id="main_property_type_holders" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-4">

                                                <!--<label>New Property Type</label>-->
                                                <input type="text" onblur="removeSelectBorder(this)" placeholder="Title" class="form-control gateway_title">
                                            </div>
                                            <div class="col-md-4">

                                                <!--<label>New Property Type</label>-->
                                                <input type="text" onblur="removeSelectBorder(this)" placeholder="Keyword" class="form-control gateway_keyword">
                                            </div>


                                        </div>
                                    </div>

                                    <div class="form-group new_row" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8 float-right">
                                                <button onclick="createNewFeatureField(this, 'Payment Gateway', {'placeholder':'Title', 'classname':'gateway_title'}, {'placeholder':'Keyword', 'classname':'gateway_keyword'})" type="button" class="btn btn-primary btn-small">New field</button>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <button onclick="submitCoreFeatures('Payment Gateway',{'placeholder':'Title', 'classname':'gateway_title'}, {'placeholder':'Keyword', 'classname':'gateway_keyword'})" type="button" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>

                <?php } ?>

                <?php if($this->uri->segment(3) === 'payment_mood'){ ?>

                    <!-- table for users -->
                    <div class="row">
                        <div class="col-lg-5">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"><?php echo $feature_type; ?></h5>
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-2">
                                    <select onchange="filterRequestSelect(this)" class="form-control">
                                        <option <?php /*if(strtolower($this->uri->segment(3)) === "all"){ echo "selected"; } */?> value="all">All Saved Properties</option>
                                        <?php /*foreach($property_type as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_type']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_type']); */?>"><?php /*echo ucwords($value['property_type']); */?></option>
                                        <?php /*} */?>
                                        <?php /*foreach($property_category as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_category']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_category']); */?>"><?php /*echo ucwords($value['property_category']); */?></option>
                                        <?php /*} */?>

                                    </select>
                                </div>-->
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-1">
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
                                    </div>-->
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <table class="table datatable-show-all">
                                    <thead>
                                    <tr >
                                        <th class="text-center">S/NO</th>
                                        <th class="text-center">Payment Mood</th>
                                        <th class="text-center">Options</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php if(count($payment_mood_details) > 0){ $no = 0; //payment_mood ?>

                                        <?php foreach(array_reverse($payment_mood_details) as $values){ $no++; ?>

                                            <!--select from the property table using the property unque id-->
                                            <tr >
                                                <td class="text-center">
                                                    <span><?php echo $no; ?></span>
                                                </td>
                                                <td class="text-center"><span class='label label-success'><?php echo $values['payment_mood']; ?></span></td>

                                                <td class="text-center">

                                                    <br>
                                                    <ul class="icons-list">
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="icon-menu9"></i>
                                                            </a>

                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li><a onclick="coreFeatureAction(this,'edit_payment_mood','<?php echo $values['id'] ?>')" href="javascript:;"><i class="zmdi zmdi-account-circle"></i> Edit Payment Mood</a></li>
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

                        <div class="col-lg-7">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display">Add <?php echo ucfirst($feature_type); ?></h5>
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-2">
                                    <select onchange="filterRequestSelect(this)" class="form-control">
                                        <option <?php /*if(strtolower($this->uri->segment(3)) === "all"){ echo "selected"; } */?> value="all">All Saved Properties</option>
                                        <?php /*foreach($property_type as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_type']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_type']); */?>"><?php /*echo ucwords($value['property_type']); */?></option>
                                        <?php /*} */?>
                                        <?php /*foreach($property_category as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_category']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_category']); */?>"><?php /*echo ucwords($value['property_category']); */?></option>
                                        <?php /*} */?>

                                    </select>
                                </div>-->
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-1">
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
                                    </div>-->
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="form-group property_type_holders" id="main_property_type_holders" style="margin-top: 10px;">
                                        <div class="row">

                                            <div class="col-md-8">

                                                <!--<label>New Property Type</label>-->
                                                <input type="text" onblur="removeSelectBorder(this)" placeholder="Payment Mood" class="form-control payment_mood">
                                            </div>


                                        </div>
                                    </div>

                                    <div class="form-group new_row" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8 float-right">
                                                <button onclick="createNewFeatureField(this, 'Payment Mood')" type="button" class="btn btn-primary btn-small">New field</button>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <button onclick="submitCoreFeatures('Payment Mood')" type="button" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>

                <?php } ?>

                <?php if($this->uri->segment(3) === 'bank_details'){ ?>

                    <!-- table for users -->
                    <div class="row">
                        <div class="col-lg-5">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"><?php echo $feature_type; ?></h5>
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-2">
                                    <select onchange="filterRequestSelect(this)" class="form-control">
                                        <option <?php /*if(strtolower($this->uri->segment(3)) === "all"){ echo "selected"; } */?> value="all">All Saved Properties</option>
                                        <?php /*foreach($property_type as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_type']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_type']); */?>"><?php /*echo ucwords($value['property_type']); */?></option>
                                        <?php /*} */?>
                                        <?php /*foreach($property_category as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_category']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_category']); */?>"><?php /*echo ucwords($value['property_category']); */?></option>
                                        <?php /*} */?>

                                    </select>
                                </div>-->
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-1">
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
                                    </div>-->
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <table class="table datatable-show-all">
                                    <thead>
                                    <tr >
                                        <th class="text-center">S/NO</th>
                                        <th class="text-center">Account Name</th>
                                        <th class="text-center">Account Number</th>
                                        <th class="text-center">Bank Name</th>
                                        <th class="text-center">Options</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php if(count($bank_details) > 0){ $no = 0; //payment_mood ?>

                                        <?php foreach(array_reverse($bank_details) as $values){ $no++; ?>

                                            <!--select from the property table using the property unque id-->
                                            <tr >
                                                <td class="text-center">
                                                    <span><?php echo $no; ?></span>
                                                </td>
                                                <td class="text-center"><span class='label label-success'><?php echo $values['account_name']; ?></span></td>
                                                <td class="text-center"><span class='label label-success'><?php echo $values['account_number']; ?></span></td>
                                                <td class="text-center"><span class='label label-success'><?php echo $values['bank_name']; ?></span></td>

                                                <td class="text-center">

                                                    <br>
                                                    <ul class="icons-list">
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="icon-menu9"></i>
                                                            </a>

                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li><a onclick="coreFeatureAction(this,'edit_bank_details','<?php echo $values['id'] ?>')" href="javascript:;"><i class="zmdi zmdi-account-circle"></i> Edit Bank details</a></li>
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

                        <div class="col-lg-7">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display">Add <?php echo ucfirst($feature_type); ?></h5>
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-2">
                                    <select onchange="filterRequestSelect(this)" class="form-control">
                                        <option <?php /*if(strtolower($this->uri->segment(3)) === "all"){ echo "selected"; } */?> value="all">All Saved Properties</option>
                                        <?php /*foreach($property_type as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_type']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_type']); */?>"><?php /*echo ucwords($value['property_type']); */?></option>
                                        <?php /*} */?>
                                        <?php /*foreach($property_category as $key => $value){ */?>
                                            <option <?php /*if(strtolower(str_replace(' ','_',$this->uri->segment(3))) === strtolower(str_replace(' ','_',$value['property_category']))){ echo "selected"; } */?> value="<?php /*echo str_replace(" ","_",$value['property_category']); */?>"><?php /*echo ucwords($value['property_category']); */?></option>
                                        <?php /*} */?>

                                    </select>
                                </div>-->
                                    <!--<div style="display: inline-block; margin-bottom: 20px;" class="col-md-1">
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
                                    </div>-->
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="form-group property_type_holders" id="main_property_type_holders" style="margin-top: 10px;">
                                        <div class="row">

                                            <div class="col-md-3">

                                                <!--<label>New Property Type</label>-->
                                                <input type="text" onblur="removeSelectBorder(this)" placeholder="Enter Account Name" class="form-control account_name">
                                            </div>

                                            <div class="col-md-3">

                                                <!--<label>New Property Type</label>-->
                                                <input type="text" onblur="removeSelectBorder(this)" placeholder="Enter Account Number" class="form-control account_number">
                                            </div>

                                            <div class="col-md-3">

                                                <!--<label>New Property Type</label>-->
                                                <input type="text" onblur="removeSelectBorder(this)" placeholder="Enter Bank Name" class="form-control bank_name">
                                            </div>


                                        </div>
                                    </div>

                                    <div class="form-group new_row" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8 float-right">
                                                <button onclick="createNewFeatureField(this, 'Bank Details', {'placeholder':'Enter Account Name', 'classname':'account_name'}, {'placeholder':'Enter Account Number', 'classname':'account_number'}, {'placeholder':'Enter Bank Name', 'classname':'bank_name'})" type="button" class="btn btn-primary btn-small">New field</button>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <button onclick="submitCoreFeatures('Bank Details',{'placeholder':'Title', 'classname':'account_name'}, {'placeholder':'Keyword', 'classname':'account_number'}, {'placeholder':'Keyword', 'classname':'bank_name'})" type="button" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                                            </div>

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
