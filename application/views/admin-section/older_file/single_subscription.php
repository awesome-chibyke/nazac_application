<?php require_once("theHeader.php"); ?>
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <?php require_once("theSidebar.php"); ?>

        <!-- Main content -->
        <div class="content-wrapper">

            <?php $user_detail = $this->Admin->getSelected('user_tb', array('unique_id'=>$single_subscription[0]['user_unique_id'])); ?>
            <?php $page_title = ucwords($single_subscription[0]['plan']." Plan Subscription by ".$user_detail[0]['last_name'].' '.$user_detail[0]['first_name']); ?>
            <?php require_once("thePageHeader.php"); ?>


            <!-- Content area -->
            <div class="content">

                <!--<div class="col-md-3">

                     Detached sidebar
                    <div class="sidebar-detached">
                        <div class="sidebar sidebar-default sidebar-separate">
                            <div class="sidebar-content">


                                <div class="content-group">
                                    <div class="panel-body bg-indigo-400 border-radius-top text-center" style="background-image: url(<?php /*echo base_url('admin_assets/assets/images/bg.png'); */?>); background-size: contain;">
                                        <div class="content-group-sm">
                                            <h6 class="text-semibold no-margin-bottom">
                                                <?php /*echo $single_subscription['']; */?>
                                            </h6>

                                            <span class="display-block text-uppercase"><?php /*echo $single_property_records->property_type */?></span>
                                            <span class="display-block text-uppercase">Posted: <?php /*echo $single_property_records->post_date */?></span>
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
                                            <img src="<?php /*echo base_url("property_upload/".$single_property_records->property_thumbnail) */?>" class="img-thumbnail img-responsive" alt="" style="width: 110px; height: 110px;">
                                        </a>

                                        <ul class="list-inline list-inline-condensed no-margin-bottom">

                                            <li><a target="_blank" href="<?php /*echo $single_user_record->twiter_link; */?>" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-twitter"></i></a></li>
                                            <li><a target="_blank" href="<?php /*echo $single_user_record->facebook_link; */?>" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-facebook"></i></a></li>

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

                                                            <div class="label label-primary" style="font-size: 10px !important;"><?php /*echo $single_property_records->whois; */?></div>

                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                    <strong>Published Status: </strong>
                                                    <span>
                                                        <?php /*if($single_property_records->publish_status === 'publish'){ */?>
                                                            <div class="label label-info"><?php /*echo  $single_property_records->publish_status; */?></div>
                                                        <?php /*} */?>

                                                        <?php /*if($single_property_records->publish_status === 'unpublished'){ */?>
                                                            <div class="label label-warning"><?php /*echo  $single_property_records->publish_status; */?></div>
                                                        <?php /*} */?>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="active">
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                    <strong>Category: </strong>
                                                    <span>

                                                            <div class="label label-info" style="font-size: 10px !important;"><?php /*echo $single_property_records->property_category; */?></div>

                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-box-phone"></i>
                                                    <strong>Type: </strong>
                                                    <span>
                                                            <div class="label label-info"><?php /*echo $single_property_records->property_type; */?></div>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                    <strong>Purpose: </strong>
                                                    <span>
                                                            <div class="label label-info"><?php /*echo  $single_property_records->property_purpose; */?></div>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                    <strong>Delete Status: </strong>
                                                    <span>
                                                        <?php /*if($single_property_records->delete_status === "inuse"){ */?>
                                                            <div class="label label-info">Available</div>
                                                        <?php /*} */?>

                                                        <?php /*if($single_property_records->delete_status === "yes"){ */?>
                                                            <div class="label label-danger">Deleted</div>
                                                        <?php /*}else if($single_property_records->delete_status === "no"){ */?>
                                                            <div class="label label-Success">Not Deleted</div>
                                                        <?php /*} */?>

                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                    <strong>Old Amount: </strong>
                                                    <span>
                                                            <div class="label label-info"><?php /*if(!empty($single_property_records->property_older_price)){ echo  $single_property_records->currency.' '.number_format($single_property_records->property_older_price,2,'.',','); }else{ echo "None"; } */?></div>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                    <strong>Amount (<?php /*echo $single_property_records->currency; */?>): </strong>
                                                    <span>
                                                            <div class="label label-info"><?php /*echo  $single_property_records->currency.' '.number_format($single_property_records->property_price,2,'.',','); */?></div>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                    <strong>Last Update: </strong>
                                                    <span>
                                                            <div class="label label-info"><?php /*echo  $single_property_records->last_update;  */?></div>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="navigation-divider"></li>
                                            <li>
                                                <?php /*if($single_property_records->delete_status === 'no'){ */?>
                                                    <a href="javascript:;" onclick="propertyAction('delete_property','<?php /*echo $single_property_records->unique_id */?>')"><i class="zmdi zmdi-delete"></i> Delete Property</a>
                                                <?php /*}else if($single_property_records->delete_status === 'yes'){ */?>
                                                    <a href="javascript:;" onclick="propertyAction('reverse_property_delete','<?php /*echo $single_property_records->unique_id */?>')"><i class="zmdi zmdi-delete"></i> Reverse Property Delete</a>
                                                <?php /*} */?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>


                </div>-->
                <div class="col-md-12 error_displayer alert alert-warning hidden">

                </div>
                
                <div class="col-md-12">

                    <!-- Detached content -->
                    <div class="container-detached">
                        <div class="content-detached">

                            <!-- Tab content -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="profile">

                                    <!-- Profile info -->
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                        <!--    <h6 class="panel-title"><?php /*//echo $single_subscription[0]['property_title'] */?></h6>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                    <li><a data-action="reload"></a></li>
                                                    <li><a data-action="close"></a></li>
                                                </ul>
                                            </div>
                                        </div>-->

                                        <div class="panel-body">
                                            <form action="#">

                                                <div class="form-group ">
                                                    <div class="row">

                                                        <div class="col-md-4">

                                                            <label>Transaction Status</label><br>
                                                            <?php if($single_subscription[0]['transaction_status'] === "confirmed"){?>
                                                                <div style="display: inline-block;" class="label label-success">Confirmed</div>
                                                            <?php }else if($single_subscription[0]['transaction_status'] === "pending"){ ?>
                                                                <div style="display: inline-block;" class="label label-warning">Pending</div>
                                                            <?php }else if($single_subscription[0]['transaction_status'] === "failed"){ ?>
                                                            <div style="display: inline-block;" class="label label-danger">Failed</div>
                                                            <?php } ?>


                                                            <?php if($single_subscription[0]['transaction_status'] === "confirmed"){ ?>
                                                                <button style="display: inline-block;" onclick="userSubscriptionAction('suspend_subscription','<?php echo $single_subscription[0]['transaction_id']; ?>')" type="button" class="btn btn-warning">Suspend Subscription</button>
                                                            <?php }else if($single_subscription[0]['transaction_status'] === "pending"){ ?>
                                                                <button style="display: inline-block;" onclick="userSubscriptionAction('confirm_subscription','<?php echo $single_subscription[0]['transaction_id']; ?>')" type="button" class="btn btn-success">Confirm Subscription</button>
                                                            <?php } ?>

                                                        </div>

                                                        <div class="col-md-4">

                                                            <label>Subscription Status</label>
                                                            <br>
                                                            <?php if($single_subscription[0]['subscription_status'] === "active"){?>
                                                                <div style="display: inline-block;" class="label label-success">Active</div>
                                                                <!--<button style="display: inline-block;" onclick="mainsubscriptionAction('deactivate_subscription','<?php /*echo $single_subscription[0]['transaction_id']; */?>')" type="button" class="btn btn-success">Deactivate Subscription</button>-->
                                                            <?php }else if($single_subscription[0]['subscription_status'] === "inactive"){ ?>
                                                                <div style="display: inline-block;" class="label label-warning">In-Active</div>
                                                                <button style="display: inline-block;" onclick="mainsubscriptionAction('activate_subscription','<?php echo $single_subscription[0]['transaction_id']; ?>')" type="button" class="btn btn-success">Activate Subscription</button>

                                                            <?php }else if($single_subscription[0]['subscription_status'] === "expired"){ ?>
                                                                <div style="display: inline-block;" class="label label-danger">Expired</div>
                                                            <?php } ?>

                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Transaction Date</label>
                                                            <input type="text" disabled style="color:black;" value="<?php echo $single_subscription[0]['transaction_id']; ?>" class="form-control transaction_date">
                                                        </div>

                                                    </div>



                                                    <div class="row" style="margin-top: 20px;">

                                                        <div class="col-md-4">

                                                            <label>Susbscrption Start Date</label>
                                                            <input type="text" style="color:black;" value="<?php echo $single_subscription[0]['start_date']; ?>" class="form-control subscription_start_date">

                                                        </div>

                                                        <div class="col-md-4">

                                                            <label>Subscription Expiration Date</label>
                                                            <input type="text" style="color:black;" value="<?php echo $single_subscription[0]['expire_date']; ?>" class="form-control subscription_end_date">

                                                        </div>

                                                        <div class="col-md-4">

                                                            <label>Subscription Duration (Months)</label>
                                                            <input type="text" style="color:black;" value="<?php echo $single_subscription[0]['duration']; ?> " class="form-control subscription_duration">

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label>Transaction/Subscription Unique ID</label>
                                                            <input readonly type="text" value="<?php echo $single_subscription[0]['transaction_id']; ?>" class="form-control">
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label>Plan Unique ID</label>
                                                            <input type="text" readonly value="<?php echo $single_subscription[0]['plan_unique_id']; ?>" class="form-control">
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label>Name of Plan</label>
                                                            <input type="text" readonly value="<?php echo $single_subscription[0]['plan']; ?>" class="form-control">
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label>Name of Subscriber</label>
                                                            <input type="text" readonly value="<?php echo $user_detail[0]['last_name'].' '.$user_detail[0]['first_name']; ?>" class="form-control">
                                                        </div>

                                                    </div>
                                                </div>

                                                <?php if($single_subscription[0]['payment_method'] === 'online'){?>

                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <label>Paystack Reference</label>
                                                            <input type="text" value="<?php echo $single_subscription[0]['paystack_reference']; ?>" class="form-control">
                                                        </div>

                                                    </div>
                                                </div>
                                                <?php } ?>

                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <label>Amount(NG <?php echo number_format($single_subscription[0]['amount'], 2,'.',','); ?>)</label>
                                                            <input type="text" value="<?php echo $single_subscription[0]['amount']; ?>" class="form-control amount_paid">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Discount</label>
                                                            <input type="text" value="<?php echo $single_subscription[0]['discount'] ?>" class="form-control discount_recieved">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Payment Method</label>
                                                            <input type="text" value="<?php echo $single_subscription[0]['payment_method']; ?>" class="form-control payment_method_used">
                                                        </div>

                                                    </div>
                                                </div>

                                                <?php if($single_subscription[0]['payment_method'] === 'bitcoin'){ ?>

                                                    <div class="form-group">
                                                        <div class="row">

                                                            <div class="col-md-4">
                                                                <label>Bitcoin Url</label>
                                                                <input type="text" value="<?php echo $single_subscription[0]['blockchain_url_verify']; ?>" class="form-control">
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label>Amount in BTC</label>
                                                                <input type="text" value="<?php echo $single_subscription[0]['amount_in_btc']; ?>" class="form-control">
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label>BTC Wallet Paid TO</label>
                                                                <input type="text" value="<?php echo $single_subscription[0]['btc_wallet_paid_to']; ?>" class="form-control">
                                                            </div>

                                                        </div>
                                                    </div>
                                                <?php } ?>


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

                                        </div>


                                        <div class="form-group">
                                            <div class="row">

                                                <div class="col-md-10 col-md-offset-1">
                                                    <button style="display: inline-block;" onclick="editSubscriptionDetails('<?php echo $single_subscription[0]['transaction_id']; ?>')" type="button" class="btn btn-success btn-block">Update</button>
                                                </div>

                                            </div>
                                        </div>

                                        <hr>
                                        <?php if(count($other_subscription) > 0){ $no = 0; ?>
                                        <div class="form-group">

                                            <div class="row">

                                                <div class="col-md-12">

                                                    <div class="row">

                                                        <h3 class="col-md-12 text-center">Other Subscription(s) purchased by <?php echo $user_detail[0]['last_name'].' '.$user_detail[0]['first_name']; ?></h3>

                                                        <div class="col-md-12 table-responsive">

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

                                                                    <?php foreach(array_reverse($other_subscription) as $key => $values){ $no++; ?>
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
                                                                                <span class="label <?php echo $this->Admin_extras->returnclassName($values['transaction_status']); ?>"><?php echo $values['transaction_status']; ?></span>
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
                                                                                            <?php if($values['subscription_status'] === "inactive"){ ?>
                                                                                                <li><a href="javascript:;" onclick="mainsubscriptionAction('activate_subscription','<?php echo $values['transaction_id']; ?>')" ><i class="zmdi zmdi-shield-check"></i> Activate Subscription</a></li>
                                                                                            <?php } ?>
                                                                                            <li><a target="_blank" href="<?php echo base_url('admin_control/profile/'.$values['transaction_id']); ?>"><i class="zmdi zmdi-account-circle"></i> User's Profile</a></li>


                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                            </td>

                                                                        </tr>

                                                                    <?php }  ?>

                                                                </tbody>
                                                            </table>


                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                            <?php }  ?>


                                    </div>


                                </div>
                                <!-- /tab content -->

                            </div>
                        </div>
                        <!-- /detached content -->

                    </div>


                    <!-- Footer -->
                    <!--<div class="footer text-muted">
                        &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
                    </div>-->
                    <!-- /footer -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->
        </div>
    </div>
</div>
</div>
</body>
<?php require_once("jslib.php") ?>
</html>
