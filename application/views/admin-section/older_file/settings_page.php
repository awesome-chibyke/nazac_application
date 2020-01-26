<?php require_once("theHeader.php"); ?>
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <?php require_once("theSidebar.php"); ?>

        <!-- Main content -->
        <div class="content-wrapper">
            <?php $page_title = ucwords($return_data['feature_type'])?>
            <?php require_once("thePageHeader.php"); ?>


            <!-- Content area -->
            <div class="content">


                <!-- Main charts -->
                <div class="row">
                    <!--<div class="col-lg-7">

                         Traffic sources
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
                        <!-- /sales stats -->

                    </div>
                </div>
                <!-- /main charts -->

                <?php if($this->uri->segment(3) === 'settings'){ ?>

                    <!-- table for users -->
                    <div class="row">
                        <!--carries the input field-->

                        <div class="col-lg-12">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display">Edit <?php echo ucfirst($return_data['feature_type']); ?></h5>


                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="form-group property_type_holders" id="main_property_type_holders" style="margin-top: 30px;">
                                        <div class="row">

                                            <?php echo form_open(base_url('admin_control/mains/update_general_settings/'.$this->uri->segment(4))); ?>


                                            <?php if($this->session->flashdata('settings_error')){ ?>
                                                <div class="alert-warning alert col-sm-10 col-sm-offset-1 errors" style="color:black; padding:10px; font-size:12px;">
                                                    <?php echo $this->session->flashdata('settings_error'); ?>
                                                </div>

                                            <?php } ?>

                                            <?php if($this->session->flashdata('settings_success')){ ?>
                                                <div class="alert-success alert col-sm-10 col-sm-offset-1 errors" style="color:black; padding:10px; font-size:12px;">
                                                    <?php echo $this->session->flashdata('settings_success'); ?>
                                                </div>

                                            <?php } ?>
                                            <div class="col-md-12">

                                                <label>Leader Board Limit (<small class="text-warning">NB: This states the number of that will be available on a leader board at a time</small>)</label>
                                                <input name="board_limit" type="text" onblur="removeSelectBorder(this)" value="<?php echo $return_data['settings_details'][$return_data['settings_table_column'][1]]; ?>" class="form-control">
                                            </div>
                                            <div class="col-md-12" style="margin-top: 20px;">

                                                <label>Type of Bet (<small class="text-warning">Please make sure to seperate each value with "|" sign while editing</small>)</label>
                                                <textarea class="form-control ed_bet_type" name="ed_bet_type" rows="5"><?php echo $return_data['settings_details'][$return_data['settings_table_column'][2]]; ?></textarea>
                                            </div>
                                            <div class="col-md-12" style="margin-top: 20px;">
                                                <label>Competition/League Name (<small class="text-warning">Please make sure to seperate each value with "|" sign while editing</small>)</label>
                                                <textarea class="form-control ed_league_name" name="ed_league_name" rows="5"><?php echo $return_data['settings_details'][$return_data['settings_table_column'][3]]; ?></textarea>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                                            </div>

                                        </div>
                                    </div>
                                    </form>

                                </div>
                            </div>

                        </div>

                        <!--carries the input field-->

                    </div>

                <?php } ?>



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
