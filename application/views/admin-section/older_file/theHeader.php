<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title; ?></title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('admin_assets/global_assets/css/icons/icomoon/styles.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('admin_assets/assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('admin_assets/assets/css/core.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('admin_assets/assets/css/components.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('admin_assets/assets/css/colors.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('admin_assets/zmdi-fonts/css/material-design-iconic-font.css') ?>" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="<?php echo base_url('admin_assets/global_assets/js/plugins/loaders/pace.min.js') ?>"></script>
    <script src="<?php echo base_url('admin_assets/global_assets/js/core/libraries/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('admin_assets/global_assets/js/core/libraries/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('admin_assets/global_assets/js/plugins/loaders/blockui.min.js') ?>"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="<?php echo base_url('admin_assets/global_assets/js/plugins/visualization/d3/d3.min.js') ?>"></script>
    <script src="<?php echo base_url('admin_assets/global_assets/js/plugins/visualization/d3/d3_tooltip.js') ?>"></script>
    <script src="<?php echo base_url('admin_assets/global_assets/js/plugins/forms/styling/switchery.min.js') ?>"></script>
    <script src="<?php echo base_url('admin_assets/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') ?>"></script>
    <script src="<?php echo base_url('admin_assets/global_assets/js/plugins/ui/moment/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('admin_assets/global_assets/js/plugins/pickers/daterangepicker.js') ?>"></script>

    <script src="<?php echo base_url('admin_assets/assets/js/app.js') ?>"></script>
    <script src="<?php echo base_url('admin_assets/global_assets/js/demo_pages/dashboard.js') ?>"></script>
    <!-- /theme JS files -->

    <!-- Theme JS files -->
    <script src="<?php echo base_url('admin_assets/global_assets/js/plugins/tables/datatables/datatables.min.js') ?>"></script>
    <script src="<?php echo base_url('admin_assets/global_assets/js/plugins/forms/selects/select2.min.js') ?>"></script>

    <!--form helpers css-->
    <link rel="stylesheet" href="<?php print base_url();?>css/bootstrap-formhelpers.min.css">
    <!--form helper css-->

    <!--user main css stylesheet-->
    <!--<link rel="stylesheet" href="<?php /*print base_url();*/?>.css">-->
    <!--user main css stylesheet-->

    <!--font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!--font awesome-->

    <script src="<?php echo base_url('admin_assets/assets/js/app.js') ?>"></script>
    <script src="<?php echo base_url('admin_assets/global_assets/js/demo_pages/datatables_advanced.js') ?>"></script>
    <!-- /theme JS files -->

    <!--toaster -->
    <link href="<?php echo base_url('admin_assets/toast/css/jquery.toast.css') ?>" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url('admin_assets/toast/js/jquery.toast.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('admin_assets/toast/functions.js') ?>"></script>
    <!--toaster -->

    <!--form helper js-->
    <script src="<?php print base_url();?>js/bootstrap-formhelpers.min.js"></script>
    <!-- form helper js-->

    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/summernote/summernote.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/summernote/editor.min.css">
    <script src="<?php echo base_url(); ?>admin_assets/summernote/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300
            });
        });

    </script>

    <!--chart js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

    <!--cropper js-->
    <script src="<?php print base_url('admin_assets/croppie/croppie.js');?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('admin_assets/croppie/croppie.css') ?>" />

    <!--<link rel="stylesheet" href="<?php //print base_url('css/croppie.css');?>">
    <script src="<?php /*echo base_url('js/croppie.js');*/?>"></script>
    <script src="<?php /*echo base_url('js/croppie-thumbnail.js');*/?>"></script>
    <i id="cord1"></i>
    <i id="cord2"></i>
    <i id="statenow"></i>
    <i id="c_lg"></i>-->

    <script>


    </script>
    <!--cropper js-->

    <!--tags input-->
    <script src="<?php print base_url('js/bootstrap-tagsinput/bootstrap-tagsinput.min.js');?>"></script>
    <!--tags input-->

    <style>
        .image-box{
            width: 100%;
            min-height: 400px;
            border: 20px solid gray;
        }
        .thumbnail_getter{
            position: absolute; width: 100%; height: 100%; background: red; opacity: 0.3; top: 0; display: none; cursor: pointer;
        }
        figure:hover .thumbnail_getter{
            display:block
        }
        .img-thumbnail-holder{
            width: 100%;
            min-height: 100px;
            border: 10px solid #A32326;
        }
    </style>

</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img src="<?php echo base_url('admin_assets/global_assets/images/logo_light.png') ?>" alt="Agents Naija"></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">

        <p class="navbar-text"><span class="label bg-success">Online</span></p>

        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php  echo base_url('admin_assets/global_assets/images/placeholders/placeholder.jpg') ?>" alt="">
                    <span><?php echo $admin_details['full_name']; ?></span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <!--<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                    <li><a href="#"><i class="icon-coins"></i> My balance</a></li>
                    <li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>-->
                    <li><a href="<?php echo base_url("admin_control/mains/logout/".$this->uri->segment(4)) ?>"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->