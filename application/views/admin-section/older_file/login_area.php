<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bet Banker Admin Area</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("admin_assets/global_assets/css/icons/icomoon/styles.css"); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("admin_assets/assets/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("admin_assets/assets/css/core.min.css"); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("admin_assets/assets/css/components.min.css"); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("admin_assets/assets/css/colors.min.css"); ?>" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="<?php echo base_url("admin_assets/global_assets/js/plugins/loaders/pace.min.js"); ?>"></script>
    <script src="<?php echo base_url("admin_assets/global_assets/js/core/libraries/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("admin_assets/global_assets/js/core/libraries/bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("admin_assets/global_assets/js/plugins/loaders/blockui.min.js"); ?>"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="<?php echo base_url("admin_assets/global_assets/js/plugins/forms/styling/uniform.min.js"); ?>"></script>

    <script src="<?php echo base_url("admin_assets/assets/js/app.js"); ?>"></script>
    <script src="<?php echo base_url("admin_assets/global_assets/js/demo_pages/login.js"); ?>"></script>
    <!-- /theme JS files -->

    <script src="<?php echo base_url("admin_assets/assests/js/mine.js"); ?>"></script>
    <input type="hidden" id="url_holder" value="<?php if(isset($my_url)){ echo $my_url; } ?>">

</head>

<body class="login-container">

<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo base_url('Admin_control/mains/login'); ?>"><img src="<?php echo base_url('admin_assets/global_assets/images/logo_light.png') ?>" alt=""></a>

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
                <?php echo form_open('admin_control/mains/login_proccess'); ?>
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                            <h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
                        </div>

                        <?php echo validation_errors('<p class="alert-warning col-md-10 col-md-offset-1 errors" style="color:black; padding:10px; font-size:16px;">','</p>');?>

                        <?php if($this->session->flashdata('login_error')){ ?>
                            <div class="alert-warning alert col-md-10 col-md-offset-1 errors" style="color:black; padding:10px; font-size:16px;">
                                <?php echo $this->session->flashdata('login_error'); ?>
                            </div>
                        <?php } ?>

                        <?php if($this->session->flashdata('login_success')){ ?>
                            <div class="alert-success alert col-md-10 col-md-offset-1 errors" style="color:black; padding:10px; font-size:16px;">
                                <?php echo $this->session->flashdata('login_success'); ?>
                            </div>
                        <?php } ?>

                        <div class="col-md-12">
                            <div class="form-group has-feedback has-feedback-left">
                                <input autofocus value="<?php echo set_value('admin_login_email'); ?>" type="email" name="admin_login_email" class="form-control" placeholder="Email">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group has-feedback has-feedback-left">
                                <input value="<?php echo set_value('admin_login_password'); ?>" type="password" name="admin_login_password" class="form-control" placeholder="Password">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group login-options">
                                <div class="row" style="margin-top: 20px;">
                                    <div class="col-sm-6">
                                        <label class="checkbox-inline">
                                            <input name="remember_me" value="remember_me" type="checkbox" class="styled" checked="checked">
                                            Remember
                                        </label>
                                    </div>

                                    <div class="col-sm-6 text-right">
                                        <a href="<?php echo base_url("admin_section/forgot"); ?>">Forgot password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                        <div class="col-md-12">
                        <div class="content-divider text-muted form-group"><span>Don't have an account?</span></div>
                        <a href="<?php echo base_url("admin_section/register")?>" class="btn btn-default btn-block content-group">Sign up</a>
                        </div>
                    </div>
                </form>
                <!-- /advanced login -->
                <!-- Footer -->
                <div class="footer text-muted text-center">
                    &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
<?php require_once("jslib.php") ?>
</html>