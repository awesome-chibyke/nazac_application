<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bet Banker - Registrations</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("admin_assets/global_assets/css/icons/icomoon/styles.css"); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("admin_assets/assets/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("admin_assets/assets/css/core.min.css"); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("admin_assets/assets/css/components.min.css"); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("admin_assets/assets/css/colors.min.css"); ?>" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url("admin_assets/global_assets/js/plugins/loaders/pace.min.js"); ?>"></script>
    <script src="<?php echo base_url("admin_assets/global_assets/js/core/libraries/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("admin_assets/global_assets/js/core/libraries/bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("admin_assets/global_assets/js/plugins/loaders/blockui.min.js"); ?>"></script>
    <script src="<?php echo base_url("admin_assets/global_assets/js/plugins/forms/styling/uniform.min.js"); ?>"></script>
    <script src="<?php echo base_url("admin_assets/assets/js/app.js"); ?>"></script>
    <script src="<?php echo base_url("admin_assets/global_assets/js/demo_pages/login.js"); ?>"></script>
    <script src="<?php echo base_url("admin_assets/assests/js/mine.js"); ?>"></script>
    <input type="hidden" id="url_holder" value="<?php if(isset($my_url)){ echo $my_url; } ?>">
</head>
<body class="login-container">
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img src="<?php echo base_url('admin_assets/global_assets/images/logo_light.png') ?>" alt=""></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#">
                    <i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
                </a>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-cog3"></i>
                    <span class="visible-xs-inline-block position-right"> Options</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Advanced login -->
                <?php echo form_open('admin_control/mains/registeration_process'); ?>
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                            <h5 class="content-group">Admin Registration<small class="display-block">Fill in your detial to register</small></h5>
                        </div>

                        <?php echo validation_errors('<p class="alert-warning col-md-10 col-md-offset-1 errors" style="color:black; padding:10px; font-size:16px;">','</p>');?>

                        <?php if($this->session->flashdata('account_creation_error')){ ?>
                            <div class="alert-warning alert col-md-10 col-md-offset-1 errors" style="color:black; padding:10px; font-size:16px;">
                                <?php echo $this->session->flashdata('account_creation_error'); ?>
                            </div>
                        <?php } ?>

                        <?php if($this->session->flashdata('account_creation_success')){ ?>
                            <div class="alert-warning alert col-md-10 col-md-offset-1 errors" style="color:black; padding:10px; font-size:16px;">
                                <?php echo $this->session->flashdata('account_creation_success'); ?>
                            </div>
                        <?php } ?>

                        <div class="col-md-12">
                            <div class="form-group has-feedback has-feedback-left">
                                <input value="<?php echo set_value('admin_email'); ?>" type="email" name="admin_email" class="form-control" placeholder="email" autofocus>
                                <div class="form-control-feedback">
                                    <i class="icon-envelope text-muted"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                        <div class="form-group has-feedback has-feedback-left">
                                <input value="<?php echo set_value('admin_full_name'); ?>" type="text" name="admin_full_name" class="form-control" placeholder="Full Name">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>
                        </div>

                        <!--<div class="form-group has-feedback has-feedback-left">
                            <select class="form-control">
                                <option>Admin Type</option>
                                <option>Main admin</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>-->

                        <!--unique_id full_name pass status admin_type date secret_code check_on-->
                        <div class="col-md-12">
                            <div class="form-group has-feedback has-feedback-left">
                                <input value="<?php echo set_value('admin_password'); ?>" type="password" class="form-control" name="admin_password" placeholder="Password">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group has-feedback has-feedback-left">
                                <input value="<?php echo set_value('confirm_admin_password'); ?>" name="confirm_admin_password" type="password" class="form-control" placeholder="Confirm Password">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button name="admin_submit_registration" type="submit" class="btn bg-blue btn-block">Register <i class="icon-check position-right"></i></button>
                                </div>
                            </div>
                        <div class="col-md-12">
                            <div class="content-divider text-muted form-group"><span>or sign in Below</span></div>
                            <a href="<?php echo base_url("admin_section/login_area")?>" class="btn btn-default btn-block content-group">Sign In</a>
                        </div>
                    </div>
                </form>
                <div class="footer text-muted text-center">
                    &copy; 2015. <a href="#">Tech Craft ICT Solution</a> by <a href="admin_control/login_area" target="_blank">TECHOCRAFT</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php require_once("jslib.php") ?>
</html>