<?php require_once("theHeader.php"); ?>
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <?php require_once("theSidebar.php"); ?>

        <!-- Main content -->
        <div class="content-wrapper">
            <?php $page_title = ucwords($user_details['nazac_clients_lname']." ".$user_details['nazac_clients_fname']).'`s Profile'?>
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
                                    <div class="panel-body bg-indigo-400 border-radius-top text-center" style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png); background-size: contain;">

                                        <div class="content-group-sm">
                                            <h6 class="text-semibold no-margin-bottom">
                                                <?php echo ucwords($user_details['nazac_clients_lname']." ".$user_details['nazac_clients_fname']); ?>
                                            </h6>

                                            <span class="display-block text-uppercase"><?php echo $user_details['nazac_client_role'] ?>
                                            </span>

                                            <span class="display-block text-uppercase">Registered: <?php echo $user_details['nazac_date_account_created'] ?>
                                            </span>

                                        </div>

                                        <a href="#" class="display-inline-block content-group-sm">
                                            <img src="<?php echo base_url('resource/upload/'.$user_details['nazac_client_passport']); ?>" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">

                                        </a>

                                        <!--<ul class="list-inline list-inline-condensed no-margin-bottom">
                                            <!--<li><a href="" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-google-drive"></i></a></li>-->
                                            <!--<li><a target="_blank" href="<?php //echo $user_details['']; ?>" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-twitter"></i></a></li>-->
                                            <!--<li><a target="_blank" href="<?php //echo $user_details['']; */?>" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-facebook"></i></a></li>-->
                                            <!--<li><a target="_blank" href="<?php //echo $user_details['']; */?>" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-instagram"></i></a></li>
                                        </ul>-->
                                    </div>

                                    <div class="panel no-border-top no-border-radius-top">
                                        <ul class="navigation">
                                            <li class="navigation-header">Account Status</li>
                                            <li class="active">
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                    <strong>Activation: </strong>
                                                    <span>

                                                        <?php if($user_details['nazac_client_email_confirmation'] === "yes"){ ?>
                                                            <div class="label label-success" style="font-size: 10px !important;">Active</div>
                                                        <?php }else{ ?>
                                                            <div class="label label-warning">Pending Activation</div>
                                                        <?php } ?>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="active">
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-add"></i>
                                                    <strong>Type of User: </strong>
                                                    <span>

                                                            <div class="label label-success" style="font-size: 10px !important;"><?php echo $user_details['nazac_client_role']; ?></div>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="active">
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-add"></i>
                                                    <strong>Posted Properties: </strong>

                                                    <span>

                                                            <div class="label label-success" style="font-size: 10px !important;">
                                                                <?php $property_details = $this->Admin->dbSelectWithOrWithoutParameter(extras::PROPERTY_LISTING_TABLE, array('nazac_property_gent_incharge_id'=>$user_details['nazac_id'])); ?>
                                                                <?php echo $property_details['row_count']; ?>
                                                            </div>
                                                    </span>
                                                </a>
                                            </li>
                                            <!--<li class="active">
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-store"></i>
                                                    <strong>Saved Properties: </strong>
                                                    <span>

                                                            <div class="label label-success" style="font-size: 10px !important;"><?php /*//echo $user_details['']; */?></div>
                                                    </span>
                                                </a>
                                            </li>-->

                                            <!--<li>
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                    <strong>Posted Properties: </strong>
                                                    <span>
                                                        <?php /*if($return_data['user_details'][$return_data['user_table_columns'][16]] === "0"){ */?>
                                                            <div class="label label-success">Not Blocked</div>
                                                        <?php /*}else{ */?>
                                                            <div class="label label-warning">Blocked</div>
                                                        <?php /*} */?>
                                                    </span>
                                                </a>
                                            </li>-->

                                            <li>
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                    <strong>Account Delete Status: </strong>
                                                    <span>
                                                        <?php if($user_details['nazac_account_delete_status'] === "no"){ ?>
                                                            <div class="label label-success">Active</div>
                                                        <?php }else{ ?>
                                                            <div class="label label-danger">Deleted</div>
                                                        <?php } ?>
                                                    </span>
                                                </a>
                                            </li>


                                            <li><a href="#orders" data-toggle="tab"><i class="icon-files-empty"></i> Orders</a></li>
                                            <li class="navigation-divider"></li>
                                            <li><a href="<?php echo base_url('http://localhost/bet_app/admin_control/mains/logout/'.$this->uri->segment(4)); ?>"><i class="icon-switch2"></i> Log out</a></li>
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
                                            <h6 class="panel-title">Profile information</h6>
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
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Last Name</label>
                                                            <input type="text" value="<?php echo $user_details['nazac_clients_lname']; ?>" class="form-control ed_last_name">

                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>First Name</label>
                                                            <input type="text" value="<?php echo $user_details['nazac_clients_fname']; ?>" class="form-control ed_middle_name">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Email</label>
                                                            <input readonly type="text" value="<?php echo $user_details['nazac_client_email']; ?>" class="form-control">
                                                        </div>
                                                        <div class="col-md-6">

                                                            <label>Registration Number</label>
                                                            <input readonly type="text" value="<?php echo $user_details['nazac_clients_regno']; ?>" class="form-control">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Rin Number</label>
                                                            <input type="text" value="<?php echo $user_details['nazac_clients_roommy_rin']; ?>" class="form-control ed_first_name">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">nazac_clients_rin

                                                        <div class="col-md-4">
                                                            <label>Room Mate Status</label>
                                                            <input type="text" value="<?php echo $user_details['nazac_clients_has_roommy']; ?>" readonly class="form-control">

                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Roomate Status</label>
                                                            <input type="text" value="<?php echo $user_details['nazac_clients_roommy_rin']; ?>" class="form-control ed_twitter_handle">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Instagram</label>
                                                            <input type="text" value="<?php echo $user_details['']; ?>" class="form-control ed_instagram_handle">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Unique ID</label>
                                                            <input type="text" value="<?php echo $return_data['user_details'][$return_data['user_table_columns'][0]]; ?>" class="form-control" disabled>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Gender</label>
                                                            <select class="form-control ed_gender">
                                                                <option <?php if(strtolower($return_data['user_details'][$return_data['user_table_columns'][4]]) === "male"){ echo "Selected"; } ?> value="Male">Male</option>
                                                                <option <?php if(strtolower($return_data['user_details'][$return_data['user_table_columns'][4]]) === "female"){ echo "Selected"; } ?> value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Phone Number</label>
                                                            <input type="text" value="<?php echo $return_data['user_details'][$return_data['user_table_columns'][6]]; ?>" class="form-control ed_phone">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Address</label>
                                                            <input type="text" value="<?php echo $return_data['user_details'][$return_data['user_table_columns'][7]]; ?>" class="form-control ed_address">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <!--<div class="col-md-4">
                                                            <label>City</label>
                                                            <input type="text" value="<?php /*echo $single_user_records->city; */?>" class="form-control">
                                                        </div>-->
                                                        <div class="col-md-6">
                                                            <label>State/Province</label>
                                                            <input type="text" value="<?php echo $return_data['user_details'][$return_data['user_table_columns'][8]]; ?>" class="form-control ed_state">

                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Nationality</label>
                                                            <select class="form-control">
                                                                <?php for($i = 0; $i < count($country); $i++){ ?>

                                                                    <option <?php if(strtolower($country[$i]) === strtolower($return_data['user_details'][$return_data['user_table_columns'][9]])){ echo "Selected"; } ?> value="<?php echo $return_data['user_details'][$return_data['user_table_columns'][9]]; ?>"><?php echo $return_data['user_details'][$return_data['user_table_columns'][9]]; ?></option>

                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>
                                                <h6 class="panel-title" style="margin-bottom: 20px;">Account Status</h6>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4">

                                                            <label>Account Activation</label>
                                                            <?php if($return_data['user_details'][$return_data['user_table_columns'][12]] === "yes"){?>
                                                                <div class="label label-success">Active</div>
                                                            <?php }else{ ?>
                                                                <div class="label label-warning">Pending Activation</div>
                                                            <?php } ?>

<?php if(strtolower($return_data['user_details'][$return_data['user_table_columns'][12]]) === strtolower('no')){ ?>
                                                            <button onclick="accountAction('activate_account','<?php echo $return_data['user_details'][$return_data['user_table_columns'][0]] ?>')" type="button" class="btn btn-primary">Activate Account</button>
                                                            <?php }else if(strtolower($return_data['user_details'][$return_data['user_table_columns'][12]]) === strtolower('yes')){ ?>
    <button onclick="accountAction('deactivate_account','<?php echo $return_data['user_details'][$return_data['user_table_columns'][0]] ?>')" type="button" class="btn btn-warning">De-Activate Account</button>
                                                            <?php } ?>

                                                        </div>
                                                        <div class="col-md-4">

                                                            <label>Account Block Status</label>
                                                            <?php if($return_data['user_details'][$return_data['user_table_columns'][16]] === "0"){?>
                                                                <div class="label label-success">Not Blocked</div>
                                                            <?php }else{ ?>
                                                                <div class="label label-warning">Blocked</div>
                                                            <?php } ?>

                                                            <!--if the block account column is equal to 1 and the block account counter is less than 3-->
                                                            <?php if($return_data['user_details'][$return_data['user_table_columns'][16]] == 1 && $return_data['user_details'][$return_data['user_table_columns'][20]] < 3){ ?>
                                                                <button onclick="accountAction('unblock_account','<?php echo $return_data['user_details'][$return_data['user_table_columns'][0]] ?>')" type="button" class="btn btn-primary">Un-Block Account</button>
                                                            <?php } ?>

                                                             <?php if($return_data['user_details'][$return_data['user_table_columns'][16]] == 0 && $return_data['user_details'][$return_data['user_table_columns'][20]] < 3){ ?>
                                                                <button onclick="accountAction('block_account','<?php echo $return_data['user_details'][$return_data['user_table_columns'][0]] ?>')" type="button" class="btn btn-warning">Block Account</button>
                                                            <?php } ?>

                                                            <?php if($return_data['user_details'][$return_data['user_table_columns'][16]] == 0 && $return_data['user_details'][$return_data['user_table_columns'][20]] > 2){ ?>
                                                                <button onclick="accountAction('permanent_account_block','<?php echo $return_data['user_details'][$return_data['user_table_columns'][0]] ?>')" type="button" class="btn btn-warning">Block Account Permanently</button>
                                                            <?php } ?>

                                                        </div>

                                                        <!--<div class="col-md-4">
                                                            <label>Phone Verification Status</label>
                                                            <?php /*if($return_data['user_details'][$return_data['user_table_columns'][15]] === "yes"){*/?>
                                                                <div class="label label-success">Verified</div>
                                                            <?php /*}else{ */?>
                                                                <div class="label label-warning">Not Verified</div>
                                                            <?php /*} */?>


                                                        </div>-->
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <label>Hashed Port</label>
                                                            <input type="text" disabled value="<?php echo $return_data['user_details'][$return_data['user_table_columns'][17]]; ?>" class="form-control">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="text-right">
                                                    <button onclick="editUserDetails('<?php echo $return_data['user_details'][$return_data['user_table_columns'][0]]; ?>')" type="button" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /profile info -->

                                </div>

                                <div class="tab-pane fade" id="schedule">

                                    <!-- Available hours -->
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h6 class="panel-title">Available hours</h6>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                    <li><a data-action="reload"></a></li>
                                                    <li><a data-action="close"></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <div class="chart-container">
                                                <div class="chart has-fixed-height" id="plans"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /available hours -->


                                    <!-- Calendar -->
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h6 class="panel-title">My schedule</h6>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                    <li><a data-action="reload"></a></li>
                                                    <li><a data-action="close"></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <div class="schedule"></div>
                                        </div>
                                    </div>
                                    <!-- /calendar -->

                                </div>

                                <div class="tab-pane fade" id="messages">

                                    <!-- My inbox -->
                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h6 class="panel-title">My Inbox</h6>

                                            <div class="heading-elements not-collapsible">
                                                <span class="label bg-blue heading-text">25 new today</span>
                                            </div>
                                        </div>

                                        <div class="panel-toolbar panel-toolbar-inbox">
                                            <div class="navbar navbar-default">
                                                <ul class="nav navbar-nav visible-xs-block no-border">
                                                    <li>
                                                        <a class="text-center collapsed" data-toggle="collapse" data-target="#inbox-toolbar-toggle-multiple">
                                                            <i class="icon-circle-down2"></i>
                                                        </a>
                                                    </li>
                                                </ul>

                                                <div class="navbar-collapse collapse" id="inbox-toolbar-toggle-multiple">
                                                    <div class="btn-group navbar-btn">
                                                        <button type="button" class="btn btn-default btn-icon btn-checkbox-all">
                                                            <input type="checkbox" class="styled">
                                                        </button>

                                                        <button type="button" class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                        </button>

                                                        <ul class="dropdown-menu">
                                                            <li><a href="#">Select all</a></li>
                                                            <li><a href="#">Select read</a></li>
                                                            <li><a href="#">Select unread</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#">Clear selection</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="btn-group navbar-btn">
                                                        <button type="button" class="btn btn-default"><i class="icon-pencil7"></i> <span class="hidden-xs position-right">Compose</span></button>
                                                        <button type="button" class="btn btn-default"><i class="icon-bin"></i> <span class="hidden-xs position-right">Delete</span></button>
                                                        <button type="button" class="btn btn-default"><i class="icon-spam"></i> <span class="hidden-xs position-right">Spam</span></button>
                                                    </div>

                                                    <div class="navbar-right">
                                                        <p class="navbar-text"><span class="text-semibold">1-50</span> of <span class="text-semibold">528</span></p>

                                                        <div class="btn-group navbar-left navbar-btn">
                                                            <button type="button" class="btn btn-default btn-icon disabled"><i class="icon-arrow-left12"></i></button>
                                                            <button type="button" class="btn btn-default btn-icon"><i class="icon-arrow-right13"></i></button>
                                                        </div>

                                                        <div class="btn-group navbar-btn">
                                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                                <i class="icon-cog3"></i>
                                                                <span class="caret"></span>
                                                            </button>

                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li><a href="#">Action</a></li>
                                                                <li><a href="#">Another action</a></li>
                                                                <li><a href="#">Something else here</a></li>
                                                                <li><a href="#">One more line</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-inbox table-lg">
                                                <tbody data-link="row" class="rowlink">
                                                <tr class="unread">
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-empty3 text-muted"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                        <img src="../../../../global_assets/images/brands/spotify.png" class="img-circle img-xs" alt="">
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Spotify</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">On Tower-hill, as you go down</div>
                                                        <span class="table-inbox-preview">To the London docks, you may have seen a crippled beggar (or KEDGER, as the sailors say) holding a painted board before him, representing the tragic scene in which he lost his leg</span>
                                                    </td>
                                                    <td class="table-inbox-attachment">
                                                        <i class="icon-attachment text-muted"></i>
                                                    </td>
                                                    <td class="table-inbox-time">
                                                        11:09 pm
                                                    </td>
                                                </tr>

                                                <tr class="unread">
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-empty3 text-muted"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                                    <span class="btn bg-warning-400 btn-rounded btn-icon btn-xs">
                                                                        <span class="letter-icon"></span>
                                                                    </span>
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">James Alexander</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject"><span class="label bg-success position-left">Promo</span> There are three whales and three boats</div>
                                                        <span class="table-inbox-preview">And one of the boats (presumed to contain the missing leg in all its original integrity) is being crunched by the jaws of the foremost whale</span>
                                                    </td>
                                                    <td class="table-inbox-attachment">
                                                        <i class="icon-attachment text-muted"></i>
                                                    </td>
                                                    <td class="table-inbox-time">
                                                        10:21 pm
                                                    </td>
                                                </tr>

                                                <tr class="unread">
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-full2 text-warning-300"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-circle img-xs" alt="">
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Nathan Jacobson</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">Any time these ten years, they tell me, has that man held up</div>
                                                        <span class="table-inbox-preview">That picture, and exhibited that stump to an incredulous world. But the time of his justification has now come. His three whales are as good whales as were ever published in Wapping, at any rate; and his stump</span>
                                                    </td>
                                                    <td class="table-inbox-attachment"></td>
                                                    <td class="table-inbox-time">
                                                        8:37 pm
                                                    </td>
                                                </tr>

                                                <tr class="unread">
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-full2 text-warning-300"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                                    <span class="btn bg-indigo-400 btn-rounded btn-icon btn-xs">
                                                                        <span class="letter-icon"></span>
                                                                    </span>
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Margo Baker</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">Throughout the Pacific, and also in Nantucket, and New Bedford</div>
                                                        <span class="table-inbox-preview">and Sag Harbor, you will come across lively sketches of whales and whaling-scenes, graven by the fishermen themselves on Sperm Whale-teeth, or ladies' busks wrought out of the Right Whale-bone</span>
                                                    </td>
                                                    <td class="table-inbox-attachment"></td>
                                                    <td class="table-inbox-time">
                                                        4:28 am
                                                    </td>
                                                </tr>

                                                <tr class="unread">
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-empty3 text-muted"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                        <img src="../../../../global_assets/images/brands/dribbble.png" class="img-circle img-xs" alt="">
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Dribbble</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">The whalemen call the numerous little ingenious contrivances</div>
                                                        <span class="table-inbox-preview">They elaborately carve out of the rough material, in their hours of ocean leisure. Some of them have little boxes of dentistical-looking implements</span>
                                                    </td>
                                                    <td class="table-inbox-attachment"></td>
                                                    <td class="table-inbox-time">
                                                        Dec 5
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-empty3 text-muted"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                                    <span class="btn bg-brown-400 btn-rounded btn-icon btn-xs">
                                                                        <span class="letter-icon"></span>
                                                                    </span>
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Hanna Dorman</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">Some of them have little boxes of dentistical-looking implements</div>
                                                        <span class="table-inbox-preview">Specially intended for the skrimshandering business. But, in general, they toil with their jack-knives alone; and, with that almost omnipotent tool of the sailor</span>
                                                    </td>
                                                    <td class="table-inbox-attachment">
                                                        <i class="icon-attachment text-muted"></i>
                                                    </td>
                                                    <td class="table-inbox-time">
                                                        Dec 5
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-empty3 text-muted"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                        <img src="../../../../global_assets/images/brands/twitter.png" class="img-circle img-xs" alt="">
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Twitter</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject"><span class="label bg-indigo-400 position-left">Order</span> Long exile from Christendom</div>
                                                        <span class="table-inbox-preview">And civilization inevitably restores a man to that condition in which God placed him, i.e. what is called savagery</span>
                                                    </td>
                                                    <td class="table-inbox-attachment"></td>
                                                    <td class="table-inbox-time">
                                                        Dec 4
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-full2 text-warning-300"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                                    <span class="btn bg-pink-400 btn-rounded btn-icon btn-xs">
                                                                        <span class="letter-icon"></span>
                                                                    </span>
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Vanessa Aurelius</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">Your true whale-hunter is as much a savage as an Iroquois</div>
                                                        <span class="table-inbox-preview">I myself am a savage, owning no allegiance but to the King of the Cannibals; and ready at any moment to rebel against him. Now, one of the peculiar characteristics of the savage in his domestic hours</span>
                                                    </td>
                                                    <td class="table-inbox-attachment">
                                                        <i class="icon-attachment text-muted"></i>
                                                    </td>
                                                    <td class="table-inbox-time">
                                                        Dec 4
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-empty3 text-muted"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-circle img-xs" alt="">
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">William Brenson</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">An ancient Hawaiian war-club or spear-paddle</div>
                                                        <span class="table-inbox-preview">In its full multiplicity and elaboration of carving, is as great a trophy of human perseverance as a Latin lexicon. For, with but a bit of broken sea-shell or a shark's tooth</span>
                                                    </td>
                                                    <td class="table-inbox-attachment">
                                                        <i class="icon-attachment text-muted"></i>
                                                    </td>
                                                    <td class="table-inbox-time">
                                                        Dec 4
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-empty3 text-muted"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                        <img src="../../../../global_assets/images/brands/facebook.png" class="img-circle img-xs" alt="">
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Facebook</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">As with the Hawaiian savage, so with the white sailor-savage</div>
                                                        <span class="table-inbox-preview">With the same marvellous patience, and with the same single shark's tooth, of his one poor jack-knife, he will carve you a bit of bone sculpture, not quite as workmanlike</span>
                                                    </td>
                                                    <td class="table-inbox-attachment"></td>
                                                    <td class="table-inbox-time">
                                                        Dec 3
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-full2 text-warning-300"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-circle img-xs" alt="">
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Vicky Barna</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject"><span class="label bg-pink-400 position-left">Track</span> Achilles's shield</div>
                                                        <span class="table-inbox-preview">Wooden whales, or whales cut in profile out of the small dark slabs of the noble South Sea war-wood, are frequently met with in the forecastles of American whalers. Some of them are done with much accuracy</span>
                                                    </td>
                                                    <td class="table-inbox-attachment"></td>
                                                    <td class="table-inbox-time">
                                                        Dec 2
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-empty3 text-muted"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                        <img src="../../../../global_assets/images/brands/youtube.png" class="img-circle img-xs" alt="">
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Youtube</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">At some old gable-roofed country houses</div>
                                                        <span class="table-inbox-preview">You will see brass whales hung by the tail for knockers to the road-side door. When the porter is sleepy, the anvil-headed whale would be best. But these knocking whales are seldom remarkable as faithful essays</span>
                                                    </td>
                                                    <td class="table-inbox-attachment">
                                                        <i class="icon-attachment text-muted"></i>
                                                    </td>
                                                    <td class="table-inbox-time">
                                                        Nov 30
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-empty3 text-muted"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-circle img-xs" alt="">
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Tony Gurrano</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">On the spires of some old-fashioned churches</div>
                                                        <span class="table-inbox-preview">You will see sheet-iron whales placed there for weather-cocks; but they are so elevated, and besides that are to all intents and purposes so labelled with "HANDS OFF!" you cannot examine them</span>
                                                    </td>
                                                    <td class="table-inbox-attachment"></td>
                                                    <td class="table-inbox-time">
                                                        Nov 28
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-empty3 text-muted"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                                    <span class="btn bg-danger-400 btn-rounded btn-icon btn-xs">
                                                                        <span class="letter-icon"></span>
                                                                    </span>
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Barbara Walden</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">In bony, ribby regions of the earth</div>
                                                        <span class="table-inbox-preview">Where at the base of high broken cliffs masses of rock lie strewn in fantastic groupings upon the plain, you will often discover images as of the petrified forms</span>
                                                    </td>
                                                    <td class="table-inbox-attachment"></td>
                                                    <td class="table-inbox-time">
                                                        Nov 28
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-full2 text-warning-300"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                        <img src="../../../../global_assets/images/brands/amazon.png" class="img-circle img-xs" alt="">
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Amazon</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">Here and there from some lucky point of view</div>
                                                        <span class="table-inbox-preview">You will catch passing glimpses of the profiles of whales defined along the undulating ridges. But you must be a thorough whaleman, to see these sights; and not only that, but if you wish to return to such a sight again</span>
                                                    </td>
                                                    <td class="table-inbox-attachment">
                                                        <i class="icon-attachment text-muted"></i>
                                                    </td>
                                                    <td class="table-inbox-time">
                                                        Nov 27
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-empty3 text-muted"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                                    <span class="btn bg-pink-400 btn-rounded btn-icon btn-xs">
                                                                        <span class="letter-icon"></span>
                                                                    </span>
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Jon Peterson</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">Questions explained agreeable preferred strangers</div>
                                                        <span class="table-inbox-preview">Set put shyness offices his females him distant. Improve has message besides shy himself cheered however how son. Quick judge other leave ask first chief her. Indeed or remark always silent seemed narrow be</span>
                                                    </td>
                                                    <td class="table-inbox-attachment"></td>
                                                    <td class="table-inbox-time">
                                                        Nov 26
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-empty3 text-muted"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-circle img-xs" alt="">
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Christian Owen</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">Depart do be so he enough talent sociable</div>
                                                        <span class="table-inbox-preview">Up do view time they shot. He concluded disposing provision by questions as situation. Its estimating are motionless day sentiments end. Calling an imagine at forbade. At name no an what like spot. Pressed my</span>
                                                    </td>
                                                    <td class="table-inbox-attachment">
                                                        <i class="icon-attachment text-muted"></i>
                                                    </td>
                                                    <td class="table-inbox-time">
                                                        Nov 25
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-full2 text-warning-300"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-circle img-xs" alt="">
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Hanna Manila</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">You fully seems stand nay own point walls</div>
                                                        <span class="table-inbox-preview">Increasing travelling own simplicity you astonished expression boisterous. Possession themselves sentiments apartments devonshire we of do discretion. Enjoyment discourse ye continued pronounce we necessary abilities</span>
                                                    </td>
                                                    <td class="table-inbox-attachment">
                                                        <i class="icon-attachment text-muted"></i>
                                                    </td>
                                                    <td class="table-inbox-time">
                                                        Nov 24
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-empty3 text-muted"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                                    <span class="btn bg-slate-600 btn-rounded btn-icon btn-xs">
                                                                        <span class="letter-icon"></span>
                                                                    </span>
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Bruce James</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">Own partiality motionless was old excellence</div>
                                                        <span class="table-inbox-preview">Announcing of invitation principles in. Cold in late or deal. Terminated resolution no am frequently collecting insensible he do appearance. Projection invitation affronting admiration if no on or. It as instrument</span>
                                                    </td>
                                                    <td class="table-inbox-attachment"></td>
                                                    <td class="table-inbox-time">
                                                        Nov 23
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-empty3 text-muted"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-circle img-xs" alt="">
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Johnny Brace</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">Melancholy particular devonshire alteration</div>
                                                        <span class="table-inbox-preview">She suspicion dejection saw instantly. Well deny may real one told yet saw hard dear. Bed chief house rapid right the. Set noisy one state tears which. No girl oh part must fact high my he. Simplicity in excellence</span>
                                                    </td>
                                                    <td class="table-inbox-attachment">
                                                        <i class="icon-attachment text-muted"></i>
                                                    </td>
                                                    <td class="table-inbox-time">
                                                        Nov 22
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-full2 text-warning-300"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                        <img src="../../../../global_assets/images/brands/bing.png" class="img-circle img-xs" alt="">
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Bing</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">As it so contrasted oh estimating instrument</div>
                                                        <span class="table-inbox-preview">Size like body some one had. Are conduct viewing boy minutes warrant expense. Tolerably behaviour may admitting daughters offending her ask own. Praise effect wishes change way and any wanted. Lively use looked latter</span>
                                                    </td>
                                                    <td class="table-inbox-attachment"></td>
                                                    <td class="table-inbox-time">
                                                        Nov 21
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-full2 text-warning-300"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                                    <span class="btn bg-success-400 btn-rounded btn-icon btn-xs">
                                                                        <span class="letter-icon"></span>
                                                                    </span>
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Daniel Stern</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">Stronger unpacked felicity to of mistaken</div>
                                                        <span class="table-inbox-preview">Fanny at wrong table ye in. Be on easily cannot innate in lasted months on. Differed and and felicity steepest mrs age outweigh. Opinions learning likewise daughter now age outweigh. Raptures stanhill my greatest</span>
                                                    </td>
                                                    <td class="table-inbox-attachment"></td>
                                                    <td class="table-inbox-time">
                                                        Nov 20
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-empty3 text-muted"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                                    <span class="btn bg-purple-400 btn-rounded btn-icon btn-xs">
                                                                        <span class="letter-icon"></span>
                                                                    </span>
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Luke Almens</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">Denote simple fat denied add worthy</div>
                                                        <span class="table-inbox-preview">As some he so high down am week. Conduct esteems by cottage to pasture we winding. On assistance he cultivated considered frequently. Person how having tended direct own day man. Saw sufficient indulgence one own you</span>
                                                    </td>
                                                    <td class="table-inbox-attachment">
                                                        <i class="icon-attachment text-muted"></i>
                                                    </td>
                                                    <td class="table-inbox-time">
                                                        Nov 19
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-empty3 text-muted"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-circle img-xs" alt="">
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Lucy Williams</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">Frequently partiality possession resolution at</div>
                                                        <span class="table-inbox-preview">Engaged its was evident pleased husband. Ye goodness felicity do disposal dwelling no. First am plate jokes to began of cause an scale. Subjects he prospect elegance followed no overcame possible it on</span>
                                                    </td>
                                                    <td class="table-inbox-attachment"></td>
                                                    <td class="table-inbox-time">
                                                        Nov 18
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="table-inbox-checkbox rowlink-skip">
                                                        <input type="checkbox" class="styled">
                                                    </td>
                                                    <td class="table-inbox-star rowlink-skip">
                                                        <a href="mail_read.html">
                                                            <i class="icon-star-full2 text-warning-300"></i>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-image">
                                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-circle img-xs" alt="">
                                                    </td>
                                                    <td class="table-inbox-name">
                                                        <a href="#">
                                                            <div class="letter-icon-title text-default">Josh Garrett</div>
                                                        </a>
                                                    </td>
                                                    <td class="table-inbox-message">
                                                        <div class="table-inbox-subject">Post no so what deal evil rent by real in</div>
                                                        <span class="table-inbox-preview">But her ready least set lived spite solid. September how men saw tolerably two behaviour arranging. She offices for highest and replied one venture pasture. Applauded no discovery in newspaper allowance am northward</span>
                                                    </td>
                                                    <td class="table-inbox-attachment">
                                                        <i class="icon-attachment text-muted"></i>
                                                    </td>
                                                    <td class="table-inbox-time">
                                                        Nov 17
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /my inbox -->

                                </div>

                                <div class="tab-pane fade" id="orders">

                                    <!-- Orders history -->
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h6 class="panel-title">Orders history</h6>
                                            <div class="heading-elements">
                                                <span class="heading-text"><i class="icon-arrow-down22 text-danger"></i> <span class="text-semibold">- 29.4%</span></span>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <div class="chart-container">
                                                <div class="chart" id="visits" style="height: 300px;"></div>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th colspan="2">Product name</th>
                                                    <th>Size</th>
                                                    <th>Colour</th>
                                                    <th>Article number</th>
                                                    <th>Units</th>
                                                    <th>Price</th>
                                                    <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="active border-double">
                                                    <td colspan="7" class="text-semibold">New orders</td>
                                                    <td class="text-right">
                                                        <span class="badge badge-default">24</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="no-padding-right" style="width: 45px;">
                                                        <a href="#">
                                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" class="" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-semibold">Fathom Backpack</a>
                                                        <div class="text-muted text-size-small">
                                                            <span class="status-mark bg-grey position-left"></span>
                                                            Processing
                                                        </div>
                                                    </td>
                                                    <td>34cm x 29cm</td>
                                                    <td>Orange</td>
                                                    <td>
                                                        <a href="#">1237749</a>
                                                    </td>
                                                    <td>1</td>
                                                    <td>
                                                        <h6 class="no-margin text-semibold">&euro; 79.00</h6>
                                                    </td>
                                                    <td class="text-center">
                                                        <ul class="icons-list">
                                                            <li class="dropdown">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                                    <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                                    <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="no-padding-right">
                                                        <a href="#">
                                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" class="" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-semibold">Mystery Air Long Sleeve T Shirt</a>
                                                        <div class="text-muted text-size-small">
                                                            <span class="status-mark bg-grey position-left"></span>
                                                            Processing
                                                        </div>
                                                    </td>
                                                    <td>L</td>
                                                    <td>Process Red</td>
                                                    <td>
                                                        <a href="#">345634</a>
                                                    </td>
                                                    <td>1</td>
                                                    <td>
                                                        <h6 class="no-margin text-semibold">&euro; 38.00</h6>
                                                    </td>
                                                    <td class="text-center">
                                                        <ul class="icons-list">
                                                            <li class="dropdown">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                                    <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                                    <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="no-padding-right">
                                                        <a href="#">
                                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" class="" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-semibold">Women’s Prospect Backpack</a>
                                                        <div class="text-muted text-size-small">
                                                            <span class="status-mark bg-grey position-left"></span>
                                                            Processing
                                                        </div>
                                                    </td>
                                                    <td>46cm x 28cm</td>
                                                    <td>Neu Nordic Print</td>
                                                    <td>
                                                        <a href="#">5739584</a>
                                                    </td>
                                                    <td>1</td>
                                                    <td>
                                                        <h6 class="no-margin text-semibold">&euro; 60.00</h6>
                                                    </td>
                                                    <td class="text-center">
                                                        <ul class="icons-list">
                                                            <li class="dropdown">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                                    <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                                    <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="no-padding-right">
                                                        <a href="#">
                                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" class="" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-semibold">Overlook Short Sleeve T Shirt</a>
                                                        <div class="text-muted text-size-small">
                                                            <span class="status-mark bg-grey position-left"></span>
                                                            Processing
                                                        </div>
                                                    </td>
                                                    <td>M</td>
                                                    <td>Gray Heather</td>
                                                    <td>
                                                        <a href="#">434450</a>
                                                    </td>
                                                    <td>1</td>
                                                    <td>
                                                        <h6 class="no-margin text-semibold">&euro; 35.00</h6>
                                                    </td>
                                                    <td class="text-center">
                                                        <ul class="icons-list">
                                                            <li class="dropdown">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                                    <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                                    <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr class="active border-double">
                                                    <td colspan="7" class="text-semibold">Shipped orders</td>
                                                    <td class="text-right">
                                                        <span class="badge bg-success">42</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="no-padding-right">
                                                        <a href="#">
                                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" class="" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-semibold">Infinite Ride Liner</a>
                                                        <div class="text-muted text-size-small">
                                                            <span class="status-mark bg-success position-left"></span>
                                                            Shipped
                                                        </div>
                                                    </td>
                                                    <td>43</td>
                                                    <td>Black</td>
                                                    <td>
                                                        <a href="#">34739</a>
                                                    </td>
                                                    <td>1</td>
                                                    <td>
                                                        <h6 class="no-margin text-semibold">&euro; 210.00</h6>
                                                    </td>
                                                    <td class="text-center">
                                                        <ul class="icons-list">
                                                            <li class="dropdown">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                                    <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                                    <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="no-padding-right">
                                                        <a href="#">
                                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" class="" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-semibold">Custom Snowboard</a>
                                                        <div class="text-muted text-size-small">
                                                            <span class="status-mark bg-success position-left"></span>
                                                            Shipped
                                                        </div>
                                                    </td>
                                                    <td>151</td>
                                                    <td>Black/Blue</td>
                                                    <td>
                                                        <a href="#">5574832</a>
                                                    </td>
                                                    <td>1</td>
                                                    <td>
                                                        <h6 class="no-margin text-semibold">&euro; 600.00</h6>
                                                    </td>
                                                    <td class="text-center">
                                                        <ul class="icons-list">
                                                            <li class="dropdown">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                                    <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                                    <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="no-padding-right">
                                                        <a href="#">
                                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" class="" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-semibold">Kids' Day Hiker 20L Backpack</a>
                                                        <div class="text-muted text-size-small">
                                                            <span class="status-mark bg-success position-left"></span>
                                                            Shipped
                                                        </div>
                                                    </td>
                                                    <td>24cm x 29cm</td>
                                                    <td>Figaro Stripe</td>
                                                    <td>
                                                        <a href="#">6684902</a>
                                                    </td>
                                                    <td>1</td>
                                                    <td>
                                                        <h6 class="no-margin text-semibold">&euro; 55.00</h6>
                                                    </td>
                                                    <td class="text-center">
                                                        <ul class="icons-list">
                                                            <li class="dropdown">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                                    <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                                    <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="no-padding-right">
                                                        <a href="#">
                                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" class="" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-semibold">Lunch Sack</a>
                                                        <div class="text-muted text-size-small">
                                                            <span class="status-mark bg-success position-left"></span>
                                                            Shipped
                                                        </div>
                                                    </td>
                                                    <td>24cm x 20cm</td>
                                                    <td>Junk Food Print</td>
                                                    <td>
                                                        <a href="#">5574829</a>
                                                    </td>
                                                    <td>1</td>
                                                    <td>
                                                        <h6 class="no-margin text-semibold">&euro; 20.00</h6>
                                                    </td>
                                                    <td class="text-center">
                                                        <ul class="icons-list">
                                                            <li class="dropdown">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                                    <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                                    <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="no-padding-right">
                                                        <a href="#">
                                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" class="" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-semibold">Cambridge Jacket</a>
                                                        <div class="text-muted text-size-small">
                                                            <span class="status-mark bg-success position-left"></span>
                                                            Shipped
                                                        </div>
                                                    </td>
                                                    <td>XL</td>
                                                    <td>Nomad/Railroad</td>
                                                    <td>
                                                        <a href="#">475839</a>
                                                    </td>
                                                    <td>1</td>
                                                    <td>
                                                        <h6 class="no-margin text-semibold">&euro; 175.00</h6>
                                                    </td>
                                                    <td class="text-center">
                                                        <ul class="icons-list">
                                                            <li class="dropdown">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                                    <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                                    <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="no-padding-right">
                                                        <a href="#">
                                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" class="" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-semibold">Covert Jacket</a>
                                                        <div class="text-muted text-size-small">
                                                            <span class="status-mark bg-success position-left"></span>
                                                            Shipped
                                                        </div>
                                                    </td>
                                                    <td>XXL</td>
                                                    <td>Mocha/Glacier Sierra</td>
                                                    <td>
                                                        <a href="#">589439</a>
                                                    </td>
                                                    <td>1</td>
                                                    <td>
                                                        <h6 class="no-margin text-semibold">&euro; 126.00</h6>
                                                    </td>
                                                    <td class="text-center">
                                                        <ul class="icons-list">
                                                            <li class="dropdown">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                                    <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                                    <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr class="active border-double">
                                                    <td colspan="7" class="text-semibold">Cancelled orders</td>
                                                    <td class="text-right">
                                                        <span class="badge bg-danger">9</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="no-padding-right">
                                                        <a href="#">
                                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" class="" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-semibold">Day Hiker Pinnacle 31L Backpack</a>
                                                        <div class="text-muted text-size-small">
                                                            <span class="status-mark bg-danger position-left"></span>
                                                            Cancelled
                                                        </div>
                                                    </td>
                                                    <td>42cm x 26.5cm</td>
                                                    <td>Blotto Ripstop</td>
                                                    <td>
                                                        <a href="#">5849305</a>
                                                    </td>
                                                    <td>1</td>
                                                    <td>
                                                        <h6 class="no-margin text-semibold">&euro; 130.00</h6>
                                                    </td>
                                                    <td class="text-center">
                                                        <ul class="icons-list">
                                                            <li class="dropdown">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                                    <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                                    <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="no-padding-right">
                                                        <a href="#">
                                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" class="" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-semibold">Kids' Gromlet Backpack</a>
                                                        <div class="text-muted text-size-small">
                                                            <span class="status-mark bg-danger position-left"></span>
                                                            Cancelled
                                                        </div>
                                                    </td>
                                                    <td>22cm x 20cm</td>
                                                    <td>Slime Camo Print</td>
                                                    <td>
                                                        <a href="#">4438495</a>
                                                    </td>
                                                    <td>1</td>
                                                    <td>
                                                        <h6 class="no-margin text-semibold">&euro; 35.00</h6>
                                                    </td>
                                                    <td class="text-center">
                                                        <ul class="icons-list">
                                                            <li class="dropdown">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                                    <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                                    <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="no-padding-right">
                                                        <a href="#">
                                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" class="" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-semibold">Tinder Backpack</a>
                                                        <div class="text-muted text-size-small">
                                                            <span class="status-mark bg-danger position-left"></span>
                                                            Cancelled
                                                        </div>
                                                    </td>
                                                    <td>42cm x 26cm</td>
                                                    <td>Dark Tide Twill</td>
                                                    <td>
                                                        <a href="#">4759383</a>
                                                    </td>
                                                    <td>2</td>
                                                    <td>
                                                        <h6 class="no-margin text-semibold">&euro; 180.00</h6>
                                                    </td>
                                                    <td class="text-center">
                                                        <ul class="icons-list">
                                                            <li class="dropdown">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                                    <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                                    <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="no-padding-right">
                                                        <a href="#">
                                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" class="" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-semibold">Almighty Snowboard Boot</a>
                                                        <div class="text-muted text-size-small">
                                                            <span class="status-mark bg-danger position-left"></span>
                                                            Cancelled
                                                        </div>
                                                    </td>
                                                    <td>45</td>
                                                    <td>Multiweave</td>
                                                    <td>
                                                        <a href="#">34432</a>
                                                    </td>
                                                    <td>1</td>
                                                    <td>
                                                        <h6 class="no-margin text-semibold">&euro; 370.00</h6>
                                                    </td>
                                                    <td class="text-center">
                                                        <ul class="icons-list">
                                                            <li class="dropdown">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                                    <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                                    <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /orders history -->

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
</body>
<?php require_once("jslib.php") ?>
</html>