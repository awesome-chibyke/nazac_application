<?php require_once("theHeader.php"); ?>
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <?php require_once("theSidebar.php"); ?>

        <!-- Main content -->
        <div class="content-wrapper">
            <?php $page_title = ucwords($main_title)?>
            <?php require_once("thePageHeader.php"); ?>


            <!-- Content area -->
            <div class="content">

                <?php if($this->uri->segment(3) === 'manage'){ ?>

                <!-- table for users -->
                <div class="row">
                    <div class="col-lg-12">

                        <!-- Page length options -->
                        <div class="panel panel-flat table-responsive">
                            <div class="panel-heading">
                                <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"><?php echo $main_title; ?></h5>
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

                            <?php if($this->session->flashdata('plan_creation_success')){ ?>
                                <p class="alert-success col-md-10 col-md-offset-1 " style="color:black; padding:10px; font-size:16px;">
                                    <?php echo $this->session->flashdata('plan_creation_success'); ?>
                                </p>
                            <?php } ?>
                           <!-- transaction_id plan_unique_id user_unique_id paystack_reference plan duration payment_method discount amount transaction_status start_date expire_date transaction_date blockchain_url_verify btc_wallet_paid_to amount_in_btc-->
                            <table class="table datatable-show-all">
                                <thead>
                                <tr >
                                    <th class="text-center">S/NO</th>
                                    <th class="text-center">Unique ID</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Duration Type</th>
                                    <th class="text-center">Duration</th>
                                    <th class="text-center">Viewing Request</th>
                                    <th class="text-center">More Details</th>
                                </tr>
                                </thead>
                                <!--unique_id plan_type plan_price plan_currency plan_duration_type plan_duration plan_requests_viewing plan_standard_listing plan_premium_listings plan_premium_listing_boosts plan_student_listing_view plan_discount_below_6month plan_discount_above_6month-->
                                <tbody>
                                <?php if(count($all_subscription) > 0){ $no = 0; ?>
                                    <?php foreach(array_reverse($all_subscription) as $values){ $no++; ?>

                                        <!--select from the property table using the property unque id-->
                                        <tr >
                                            <td class="text-center">
                                                <span><?php echo $no; ?></span>
                                            </td>
                                            <td class="text-center"><span class='label label-success'><?php echo $values['unique_id']; ?></span></td>
                                            <td class="text-center"><span class='label label-info'><?php echo $values['plan_type']; ?></span></td>
                                            <td class="text-center">
                                                <span><?php echo $values['plan_currency'].number_format($values['plan_price'],2,'.',','); ?></span>
                                            </td>
                                            <td class="text-center">
                                                <span><?php echo $values['plan_duration_type']; ?></span>
                                            </td>
                                            <td class="text-center">
                                                <span><?php echo $values['plan_duration']; ?></span>
                                            </td>
                                            <td class="text-center">
                                                <span><?php echo $values['plan_requests_viewing']; ?></span>
                                            </td>
                                            <td class="text-center">
                                                    <span>
                                                        <a href="javascript:;" onclick="getSubscriptionDetails('<?php echo $values['unique_id']; ?>')" >View/Manage Sub</a>
                                                    </span>
                                            </td>
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



                    <!--carries the input field-->

                </div>

                <?php } ?>

                <?php if($this->uri->segment(3) === 'add_sub'){ ?>

                <div class="row">
                    <div class="col-lg-12">

                        <!-- Page length options -->
                        <div class="panel panel-flat table-responsive">
                            <div class="panel-heading">
                                <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"><?php echo $main_title; ?></h5>
                            </div>

                            <div class="panel-body" style="margin-top: 40px;">

                                <div class="row">


                                    <?php echo form_open('admin_control/processPlanForm/add_sub'); ?>


                                    <?php if($this->session->flashdata('plan_creation_error')){ ?>
                                        <p class="alert-warning col-md-10 col-md-offset-1 " style="color:black; padding:10px; font-size:16px;">
                                            <?php echo $this->session->flashdata('plan_creation_error'); ?>
                                        </p>
                                    <?php } ?>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Name of Plan</label>
                                                <input type="text" value="<?php echo set_value('plan_type'); ?>" name="plan_type" class="form-control">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('plan_price'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Price</label>
                                                <input type="text" value="<?php echo set_value('plan_price'); ?>" name="plan_price" class="form-control">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('plan_price'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Currency</label>
                                                <select name="plan_currency" class="form-control">

                                                    <?php $currency_value = set_value('plan_currency'); ?>
                                                    <option value="">Choose Currency</option>
                                                    <?php if($currency_value !== ''){ ?>

                                                    <option selected value="<?php echo set_value('plan_currency'); ?>"><?php echo set_value('plan_currency'); ?></option>
                                                    <?php } ?>
                                                    <option value="NG">Naira</option>
                                                    <option value="USD">US Dollars</option>

                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Duration Type</label>
                                                <input value="<?php echo set_value('plan_duration_type'); ?>" type="text" name="plan_duration_type" class="form-control">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('plan_duration_type'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Duration</label>
                                                <input type="text" value="<?php echo set_value('plan_duration'); ?>" name="plan_duration" class="form-control">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('plan_duration'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Viewing Request</label>
                                                <input type="text" value="<?php echo set_value('plan_requests_viewing'); ?>" name="plan_requests_viewing" class="form-control">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('plan_requests_viewing'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Standard Listing of properties</label>
                                                <input type="text" value="<?php echo set_value('plan_standard_listing'); ?>" name="plan_standard_listing" class="form-control">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('plan_standard_listing'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Premium Listing of properties</label>
                                                <input type="text" value="<?php echo set_value('plan_premium_listings'); ?>" name="plan_premium_listings" class="form-control">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('plan_premium_listings'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Premium List Boost</label>
                                                <input type="text" value="<?php echo set_value('plan_premium_listing_boosts'); ?>" name="plan_premium_listing_boosts" class="form-control">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('plan_premium_listing_boosts'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Students Listing View</label>
                                                <input type="text" value="<?php echo set_value('plan_student_listing_view'); ?>" name="plan_student_listing_view" class="form-control">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('plan_student_listing_view'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Discount for Plans Below 6 Months</label>
                                                <input type="text" value="<?php echo set_value('plan_discount_below_6month'); ?>" name="plan_discount_below_6month" class="form-control">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('plan_discount_below_6month'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Discount for Plans Above 6 Months</label>
                                                <input value="<?php echo set_value('plan_discount_above_6month'); ?>" type="text" name="plan_discount_above_6month" class="form-control">
                                                <span class="text-left label label-block label-danger"><?php echo form_error('plan_discount_above_6month'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="form-group">
                                                <button type="submit" name="submit_plan" class="btn btn-block btn-info">Submit Plan</button>
                                            </div>
                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <?php } ?>

                <?php if($this->uri->segment(3) === 'user_subscriptions'){ ?>

                    <!-- table for users -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"><?php echo $main_title; ?></h5>
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

                                <?php if($this->session->flashdata('plan_creation_success')){ ?>
                                    <p class="alert-success col-md-10 col-md-offset-1 " style="color:black; padding:10px; font-size:16px;">
                                        <?php echo $this->session->flashdata('plan_creation_success'); ?>
                                    </p>
                                <?php } ?>

                                <table class="table datatable-show-all">
                                    <thead>
                                        <tr >
                                            <th class="text-center">S/NO</th>
                                            <th class="text-center">Transaction ID</th>
                                            <th class="text-center">Plan</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Duration</th>
                                            <th class="text-center">Payment Method</th>
                                            <th class="text-center">Transaction Status</th>
                                            <th class="text-center">Subscription Status</th>
                                            <th class="text-center">Start Date</th>
                                            <th class="text-center">Expiration Date</th>
                                            <th class="text-center">More Details</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php if(count($all_subscription) > 0){ $no = 0; ?>
                                        <?php foreach(array_reverse($all_subscription) as $key => $values){ $no++; ?>
                                            <!-- transaction_id plan_unique_id user_unique_id paystack_reference plan duration payment_method discount amount transaction_status start_date expire_date transaction_date blockchain_url_verify btc_wallet_paid_to amount_in_btc-->
                                            <!--select from the property table using the property unque id-->
                                            <tr >
                                                <td class="text-center">
                                                    <span><?php echo $no; ?></span>
                                                </td>
                                                <td class="text-center"><span class='label label-success'><?php echo $values['transaction_id']; ?></span></td>
                                                <?php $subscription_details = $this->Admin->getSelected('plan_pricing', array('unique_id'=>$values['plan_unique_id'])); ?>
                                                <td class="text-center"><span class='label label-info'><?php echo $subscription_details[0]['plan_type']?></span></td>
                                                <td class="text-center">
                                                    <span><?php echo $this->Admin->getCurrencySymbols('NGN'); ?><?php echo number_format($values['amount'], 2, ".", ","); ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <span><?php echo $values['duration']; ?> Month(s)</span>
                                                </td>
                                                <td class="text-center">
                                                    <span><?php echo $values['payment_method']; ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <span><?php echo $values['transaction_status']; ?></span>
                                                </td>
                                                <td class="text-center">

                                                    <span class="label <?php echo $this->Admin_extras->returnclassName($values['subscription_status']); ?>"><?php echo $values['subscription_status']; ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <span><?php echo $values['start_date']; ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <span><?php echo $values['expire_date']; ?></span>
                                                </td>

                                                <td class="text-center">

                                                <br>
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li>
                                                                <a target="_blank" href="<?php echo base_url('admin_control/single_subscription/'.$values['transaction_id'].'/'.$values['user_unique_id']); ?>"><i class="zmdi zmdi-collection-bookmark"></i> Details</a>
                                                            </li>

                                                            <li><a target="_blank" href="<?php echo base_url('admin_control/profile/'.$values['transaction_id']); ?>"><i class="zmdi zmdi-account-circle"></i> User's Profile</a></li>


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

                        <!--carries the input field-->



                        <!--carries the input field-->

                    </div>

                <?php } ?>

                <!--single_subscription-->
                <!-- Footer -->
                <div class="footer text-muted"><!--user_subscriptions-->
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
