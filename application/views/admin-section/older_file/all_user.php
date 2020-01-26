<?php require_once("theHeader.php"); ?>
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <?php require_once("theSidebar.php"); ?>

        <!-- Main content -->
        <div class="content-wrapper">
            <?php $page_title = ucwords($user_record_type)?>
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

                            <div class="container-fluid">
                                <div class="row text-center">
                                    <div class="col-md-3">
                                        <div class="content-group">
                                            <h5 class="text-semibold no-margin"><i class="zmdi zmdi-account-circle position-left text-slate"></i> <?php //echo $individual_count; ?></h5>
                                            <span class="text-muted text-size-small">Individuals</span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="content-group">
                                            <h5 class="text-semibold no-margin"><i class="zmdi zmdi-assignment-account position-left text-slate"></i> <?php //echo $agent_count; ?></h5>
                                            <span class="text-muted text-size-small">Agents</span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="content-group">
                                            <h5 class="text-semibold no-margin"><i class="zmdi zmdi-home position-left text-slate"></i> <?php //echo $builder_count; ?></h5>
                                            <span class="text-muted text-size-small">Builders</span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="content-group">
                                            <h5 class="text-semibold no-margin"><i class="zmdi zmdi-shield-check position-left text-slate"></i> <?php //echo $owner_count; ?></h5>
                                            <span class="text-muted text-size-small">Owners</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                <h5 style="display: inline-block;" class="col-md-2 panel-title user_display"><?php echo $user_record_type; ?></h5>
                                <div style="display: inline-block; margin-bottom: 20px;" class="col-md-2">
                                    <select onchange="filterUserSelect(this)" class="form-control">

                                        <option <?php //if(strtolower($this->uri->segment(3)) === "all"){ echo "selected"; } ?> value="all">All</option>
                                        <?php /*foreach($account_type as $key => $value){ */?><!--
                                            <option <?php /*if(strtolower($this->uri->segment(3)) === strtolower($value['acount_type'])){ echo "selected"; } */?> value="<?php /*echo strtolower($value['acount_type']); */?>"><?php /*echo ucwords($value['acount_type']); */?></option>
                                        --><?php /*} */?>

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

                            <table class="table datatable-show-all">
                                <thead>
                                <tr >
                                    <th class="text-center">S/NO</th>
                                    <th class="text-center">Full Name</th>
                                    <th class="text-center">Gender</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone Number</th>
                                    <th class="text-center">Registration Date</th>
                                    <th class="text-center">Account Activation Status</th>
                                    <th class="text-center">Account Block Status</th>
                                    <th class="text-center">Type of User</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <?php if(count($user_details) > 0){ $no = 0; $user_details_array = $user_details; $user_table_columns = $user_table_columns ?>

                                    <?php foreach(array_reverse($user_details_array) as $key => $values){ $no++; ?>

                                    <tr style="<?php if($values['nazac_block_client_account'] == 'yes' && $values['nazac_block_client_account_reason'] < 2){ echo "background-color:#CCCCCC;"; }else if($values['nazac_block_client_account'] > 2){ echo "background-color:#EEEEEE;"; }?>" >
                                        <td class="text-center"><?php echo $no; ?></td>
                                        <td class="text-center"><?php echo $values['nazac_clients_lname'].' '.$values['nazac_clients_fname']; ?></td>
                                        <td class="text-center"><?php echo $values['nazac_client_gender']; ?></td>
                                        <td class="text-center"><?php echo $values['nazac_client_email']; ?></td>
                                        <td class="text-center"><?php echo $values['nazac_client_phone']; ?></td>
                                        <!--$this->Admin->getDatetimeAdder($values[$user_table_columns[18]], "+ 1 hour", "Africa/Lagos")-->
                                        <td class="text-center"><?php echo $values['nazac_date_account_created']; ?></td>

                                        <td class="text-center"><?php if($values['nazac_client_account_verification'] === "yes"){ echo "<span class='label label-success'>Verified</span>"; }else{ echo "<span class='label label-danger'>Pending-Activation</span>"; } ?></td>
                                        <td class="text-center"><?php if($values['nazac_block_client_account'] == 0){ echo "<span class='label label-success'>Active Account</span>"; }else if($values['nazac_block_client_account'] == 1){ echo "<span class='label label-danger'>Account Blocked</span>"; }else if($values['nazac_block_client_account'] == 2){ echo "<span class='label label-danger'>Account Blocked Permanently</span>"; } ?></td>

                                        <td class="text-center">
                                            <span class='label label-info'><?php echo $values['nazac_client_role'] ?></span>
                                        </td>

                                        <td class="text-center">

                                                <?php if($values['nazac_account_delete_status'] == 'yes'){ echo "<span class='badge badge-danger'>Deleted</span>"; }else if($values['nazac_block_client_account'] == 'yes' && $values['nazac_block_client_account_counter'] == 3){ echo "<span class='badge badge-danger'>Blocked<br>Permanenly</span>"; }else if($values['nazac_block_client_account'] == 'yes'){ echo "<span class='badge badge-danger'>Blocked</span>"; }?>
                                            <br>
                                            <ul class="icons-list">
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>

                                                    <?php $unique_id = $this->Admin->explodeImplodeValue($values['nazac_id'], '/', '_', 'explode_first'); ?>

                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a target="_blank" href="<?php echo base_url('admin_control/mains/users/'.$this->uri->segment(4).'/'.$unique_id); ?>"><i class="zmdi zmdi-account-circle"></i> User's full Profile</a></li>
                                                        <li>
                                                            <?php if($values['nazac_client_email_confirmation'] === "no"){ ?>
                                                                <a onclick="accountAction('activate_account','<?php echo $unique_id; ?>')" href="javascript:;"><i class="zmdi zmdi-lock-open"></i> Activate Account</a>
                                                            <?php }else if($values['nazac_client_email_confirmation'] === "yes"){?>
                                                                <a onclick="accountAction('deactivate_account','<?php echo $unique_id; ?>')" href="javascript:;"><i class="zmdi zmdi-block-alt"></i> De-Activate Account</a> <?php } ?>
                                                        </li>

                                                        <li>
                                                            <?php if($values['nazac_block_client_account'] == 0 && $values['nazac_block_client_account_counter'] < 3){ ?>
                                                                <a onclick="accountAction('block_account','<?php echo $unique_id; ?>')" href="javascript:;"><i class="zmdi zmdi-block-alt"></i> Block Account</a>
                                                            <?php } ?>

                                                            <?php if($values['nazac_block_client_account'] == 1 && $values['nazac_block_client_account_counter'] < 3){?>
                                                                      <a onclick="accountAction('unblock_account','<?php echo $unique_id; ?>')" href="javascript:;"><i class="zmdi zmdi-lock-open"></i> Un-Block Account</a> <?php } ?>

                                                            <?php if($values['nazac_block_client_account'] == 0 && $values['nazac_block_client_account_counter'] > 2){?>
                                                            <a onclick="accountAction('permanent_account_block','<?php echo $unique_id; ?>')" href="javascript:;"><i class="zmdi zmdi-block-alt"></i> Block Account Permanently</a> <?php } ?>
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
