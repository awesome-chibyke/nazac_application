<?php require_once("theHeader.php"); ?>
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <?php require_once("theSidebar.php"); ?>

        <!-- Main content -->
        <div class="content-wrapper">
            <?php $page_title = ucwords($single_request_records->name).' needs a '.ucwords($single_request_records->request_type).' '.$single_request_records->request_category; ?>
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
                                                <?php echo ucwords($single_request_records->name).' is in need of a '.ucwords($single_request_records->request_type).' '.$single_request_records->request_category; ?>
                                            </h6>

                                            <span class="display-block text-uppercase"><strong>Preferred Town: </strong><?php echo $single_request_records->preferred_town ?></span>
                                            <span class="display-block text-uppercase"><strong>Posted: </strong> <?php echo $single_request_records->request_date ?></span>
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
                                        <!--unique_id user_unique_id request_comment request_category no_of_bedroom budget preferred_town preferred_state how_urgent request_type status requst_from request_date currency who name email phone-->
                                        <a href="javascript:;" onclick="showImage(this)" class="display-inline-block content-group-sm" style="position:relative;">
                                            <div class="hoverable_element">
                                                <i class="zmdi zmdi-eye" style="font-size: 30px; margin-top: 40%; text-shadow: 1px 1px 20px black; color:white;"></i>
                                            </div>
                                            <img src="<?php echo base_url("upload/".$single_user_record->passport) ?>" class="img-thumbnail img-responsive" alt="" style="width: 110px; height: 110px;">
                                        </a>

                                        <ul class="list-inline list-inline-condensed no-margin-bottom">
                                            <!--<li><a href="" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-google-drive"></i></a></li>-->
                                            <li><a target="_blank" href="<?php echo $single_user_record->twiter_link; ?>" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-twitter"></i></a></li>
                                            <li><a target="_blank" href="<?php echo $single_user_record->facebook_link; ?>" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-facebook"></i></a></li>

                                        </ul>
                                    </div>

                                    <div class="panel no-border-top no-border-radius-top">
                                        <ul class="navigation">

                                            <!--<li class="navigation-header">Property Details</li>

                                            <li class="active">
                                                <a href="javascript:;" data-toggle="tab">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                    <strong>Poster Status: </strong>
                                                    <span>

                                                            <div class="label label-primary" style="font-size: 10px !important;"><?php /*echo $single_request_records->whois; */?></div>

                                                    </span>
                                                </a>
                                            </li>-->

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
                                            <h6 class="panel-title"><?php echo $page_title ?></h6>
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
                                                            <?php if($single_request_records->status === "processing"){?>
                                                                <div style="display: inline-block;" class="label label-warning">Processing</div>
                                                            <?php }else{ ?>
                                                                <div style="display: inline-block;" class="label label-success">Processed</div>
                                                            <?php } ?>

                                                                                                               <?php if(strtolower($single_request_records->status) === strtolower('processing')){ ?>
                                                                <button style="display: inline-block;" onclick="requestsAction('mark_as_done','<?php echo $single_request_records->unique_id ?>')" type="button" class="btn btn-primary">Mark as Done</button>
                                                            <?php }else if(strtolower($single_request_records->status) === strtolower('done')){ ?>
                                                                <button style="display: inline-block;" onclick="requestsAction('mark_as_processing','<?php echo $single_request_records->unique_id ?>')" type="button" class="btn btn-warning">Reverse Done Status </button>
                                                            <?php } ?>

                                                        </div>

                                                        <div class="col-md-4">

                                                            <div class="input-group">
                                                                <span class="input-group-addon" id="basic-addon1">Request Unique ID</span>
                                                                <input value="<?php echo $single_request_records->unique_id; ?>" type="text" disabled style="color:black" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                                                            </div>

                                                        </div>

                                                        <div class="col-md-4">

                                                            <div class="input-group">
                                                                <span class="input-group-addon" id="basic-addon1">Date of Creation</span>
                                                                <input value="<?php echo $single_request_records->request_date; ?>" disabled style="color:black" type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <label>Full name</label>
                                                            <input type="text" value="<?php echo $single_request_records->name; ?>" class="form-control ed_poster_name">
                                                        </div>
                                                        <!--<div class="col-md-6">
                                                            <label>First name</label>
                                                            <input type="text" value="<?php /*echo $single_user_record->first_name */?>" class="form-control">
                                                        </div>-->

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <label>Email</label>
                                                            <input type="text" value="<?php echo $single_request_records->email ?>" class="form-control request_email">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Phone Number</label>
                                                            <input type="text" value="<?php echo $single_request_records->phone; ?>" class="form-control request_phone_no">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Request Category</label>

                                                            <select class="form-control ed_request_category" >
                                                                <?php foreach($property_category as $k => $value){ ?>

                                                                    <option <?php if(strtolower($single_request_records->request_category) === strtolower(ucwords($value['property_category']))){ echo "Selected"; } ?> value="<?php echo $value['property_category']; ?>"><?php echo ucwords($value['property_category']); ?></option>

                                                                <?php } ?>

                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Request Type</label>

                                                            <select class="form-control ed_request_type">
                                                                <?php foreach($property_type as $k => $value){ ?>

                                                                    <option <?php if(strtolower($single_request_records->request_type) === strtolower(ucwords($value['property_type']))){ echo "Selected"; } ?> value="<?php echo $value['property_type']; ?>"><?php echo ucwords($value['property_type']); ?>
                                                                    </option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Account Type (Account Type of Post Creator)</label>
                                                            <select class="form-control ed_account_type">
                                                                <?php foreach($account_type as $k => $value){ ?>

                                                                    <option <?php if(strtolower($single_request_records->who) === strtolower(ucwords($value['acount_type']))){ echo "Selected"; } ?> value="<?php echo $value['acount_type']; ?>"><?php echo ucwords($value['acount_type']); ?></option>

                                                                <?php } ?>

                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Preferred Town</label>
                                                            <input type="text" value="<?php echo $single_request_records->preferred_town; ?>" class="form-control ed_preferred_town">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Preferred State</label>
                                                            <input type="text" value="<?php echo $single_request_records->preferred_state; ?>" class="form-control ed_preferred_state">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Urgency</label>
                                                            <input type="text" value="<?php echo $single_request_records->how_urgent; ?>" class="form-control ed_how_urgent">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Budget (<?php echo $single_request_records->currency; ?>)</label>
                                                            <input type="text" value="<?php echo $single_request_records->budget ?>" class="form-control ed_budget" >
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <label>Number of Bedroom(s)</label>
                                                            <input type="text" value="<?php echo $single_request_records->no_of_bedroom; ?>" class="form-control ed_no_of_bedroom">
                                                        </div>
                                                        <!--user_unique_id -->

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <label>Request</label>
                                                            <textarea class="form-control ed_request_comment" rows="3"><?php echo $single_request_records->request_comment; ?></textarea>
                                                        </div>
                                                        <!--user_unique_id request_comment-->

                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="text-right">
                                                            <button onclick="initializeRequestEdit('<?php echo $single_request_records->unique_id; ?>')" type="button" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
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