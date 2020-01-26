<?php require_once("theHeader.php"); ?>
<!-- Page container -->
<div class="page-container">
    <?php

    $CI =& get_instance();

    ?>
    <!-- Page content -->
    <div class="page-content">

        <?php require_once("theSidebar.php"); ?>

        <!-- Main content -->
        <div class="content-wrapper">
            <?php $page_title = ucwords($request_record_type)?>
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
                                <h5 style="display: inline-block;" class="col-md-2 panel-title user_display"><?php echo $request_record_type; ?></h5>
                                <div style="display: inline-block; margin-bottom: 20px;" class="col-md-2">
                                    <select onchange="filterRequestSelect(this)" class="form-control">
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
                                    <th class="text-center">Unique ID of Request Creator</th>
                                    <th class="text-center">Full Name</th>
                                    <th class="text-center">Request Category</th>
                                    <th class="text-center">Request Type</th>
                                    <th class="text-center">Urgency</th>
                                    <th class="text-center">Budget</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Date of Creation</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(count($request_records) > 0){ $no = 0; ?>
                                    <?php foreach(array_reverse($request_records) as $values){ $no++; ?>
                                        <tr style="<?php //if($values['delete_status'] == 'yes'){ echo "background-color:#CCCCCC;"; }else if(strtolower($values['property_status']) !== "available"){ echo "background-color:#EEEEEE;"; }?>" >
                                            <td class="text-center"><?php echo $no; ?></td>
                                            <td class="text-center"><span class='label label-success'><?php echo $values['unique_id']; ?></span></td>

                                            <?php $user_details = $this->Admin->getSelected('user_tb', array('unique_id'=>$values['user_unique_id'])); ?>

                                            <td class="text-center"><span class='label label-info'><?php if(isset($user_details[0]['unique_id'])){ echo $user_details[0]['unique_id']; }else { echo "Null"; }; ?></span></td>

                                            <td class="text-center"><?php if(isset($user_details[0]['first_name'])){ echo $user_details[0]['first_name'].' '.$user_details[0]['last_name']; }else { echo "Null"; }; ?></td>
                                            <td class="text-center"><?php echo $values['request_category']; ?></td>
                                            <td class="text-center"><?php echo $values['request_type']; ?></td>
                                            <td class="text-center"><?php echo $values['how_urgent']; ?></td>
                                            <td class="text-center"><?php echo $values['currency'].' '.number_format($values['budget'],2,'.',','); ?></td>
                                            <td class="text-center"><?php echo $values['status']; ?></td>
                                            <td class="text-center"><?php echo $values['request_date']; ?></td>
                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li>
                                                                <a target="_blank" href="<?php echo base_url('admin_control/request_details/'.$values['unique_id']).'/'.$values['user_unique_id']; ?>"><i class="zmdi zmdi-account-circle"></i> Detailed View</a>
                                                            </li>
                                                            <li>
                                                                <?php if(strtolower($values['status']) === "processing"){ ?>
                                                                    <a onclick="requestsAction('mark_as_done','<?php echo $values['unique_id'] ?>')" href="javascript:;"><i class="zmdi zmdi-lock-open"></i> Mark as Done</a>
                                                                <?php }else if(strtolower($values['status']) === "done"){?>
                                                                    <a onclick="requestsAction('mark_as_processing','<?php echo $values['unique_id'] ?>')" href="javascript:;"><i class="zmdi zmdi-block-alt"></i> Mark as Un-Availaible</a> <?php } ?>
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
