<?php require_once("theHeader.php"); ?>
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <?php require_once("theSidebar.php"); ?>

        <!-- Main content -->
        <div class="content-wrapper">
            <?php $page_title = ucwords($record_type)?>
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

                <!-- table for users -->
                <div class="row">
                    <div class="col-lg-12 ">

                        <!-- Page length options -->
                        <div class="panel panel-flat table-responsive">
                            <div class="panel-heading">
                                <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"><?php echo $record_type; ?></h5>
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
                                    <th class="text-center">Unique ID</th>
                                    <th class="text-center">Full Name</th>
                                    <th class="text-center">Agents Full Name</th>
                                    <th class="text-center">Property Thumbnail</th>
                                    <th class="text-center">Property Status</th>
                                    <th class="text-center">Date Saved</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php if(count($saved_properties_records) > 0){ $no = 0; ?>
                                    <?php foreach(array_reverse($saved_properties_records) as $values){ $no++; ?>

                                        <!--select from the property table using the property unque id-->
                                        <?php $property_details = $this->Admin->getSelected('property_post', array('unique_id'=>$values['property_unique_id'])); ?>

                                        <tr style="<?php if($property_details[0]['delete_status'] == 'yes'){ echo "background-color:#CCCCCC;"; }else if(strtolower($property_details[0]['property_status']) !== "available"){ echo "background-color:#EEEEEE;"; }?>" >
                                            <td class="text-center">
                                                <span><?php echo $no; ?></span>
                                            </td>
                                            <td class="text-center"><span class='label label-success'><?php echo $values['unique_id']; ?></span></td>

                                            <?php $user_details = $this->Admin->getSelected('user_tb', array('unique_id'=>$values['user_unique_id'])); ?>

                                            <td class="text-center"><span class='label label-info'><?php if(isset($user_details[0]['first_name'])){ echo $user_details[0]['first_name'].' '.$user_details[0]['last_name']; }else { echo "Null"; }; ?></span></td>

                                            <?php $agents_details = $this->Admin->getSelected('user_tb', array('unique_id'=>$values['agent_unique_id'])); ?>
                                            <td class="text-center"><span class='label label-info'><?php if(isset($agents_details[0]['first_name'])){ echo $agents_details[0]['first_name'].' '.$agents_details[0]['last_name']; }else { echo "Null"; }; ?></span></td>

                                            <td class="text-center">
                                                <a href="javascript:;" onclick="showImage(this)" style="position:relative;">
                                                <img src="<?php echo base_url('property_upload/'.$property_details[0]['property_thumbnail'])?>" style="width: 100px;">
                                                </a>
                                            </td>

                                            <td class="text-center"><?php if(strtolower($property_details[0]['property_status']) === "available"){ echo "<span class='label label-success'>Available</span>"; }else{ echo "<span class='label label-danger'>Not Available</span>"; } ?></td>

                                            <td class="text-center"><?php echo $values['date_saved']; ?></td>

                                            <td class="text-center">
                                                <?php if($property_details[0]['delete_status'] == 'yes'){ echo "<span class='badge badge-danger'>Deleted</span>"; }else if(strtolower($property_details[0]['property_status']) !== "available"){ echo "<span class='badge badge-danger'>Not Available</span>"; }?>
                                                <br>
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a target="_blank" href="<?php echo base_url('admin_control/profile/'.$user_details[0]['unique_id']); ?>"><i class="zmdi zmdi-account-circle"></i> User's Profile</a></li>
                                                            <li><a target="_blank" href="<?php echo base_url('admin_control/profile/'.$agents_details[0]['unique_id']); ?>"><i class="zmdi zmdi-account-circle"></i> User's Profile</a></li>
                                                            <li>
                                                                <a target="_blank" href="<?php echo base_url('admin_control/property_details/'.$property_details[0]['unique_id']).'/'.$property_details[0]['whois_unique_id']; ?>"><i class="zmdi zmdi-account-circle"></i> Property Details</a>
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
