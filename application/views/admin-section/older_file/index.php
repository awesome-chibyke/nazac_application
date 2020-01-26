<?php require_once("theHeader.php"); ?>
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <?php require_once("theSidebar.php"); ?>

        <!-- Main content -->
        <div class="content-wrapper">
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">


                <!-- Dashboard content -->
                <div class="row">
                    <div class="col-sm-12 col-lg-12">

                        <!-- Quick stats boxes -->
                        <div class="row">
                            <div class="col-lg-3">

                                <!-- Members online -->
                                <div class="panel bg-teal-400">
                                    <div class="panel-body">
                                        <div class="heading-elements">
                                            <span class="heading-text badge bg-teal-800"></span>
                                        </div>

                                        <h3 class="no-margin"><?php //echo $return_data['total_users']; ?></h3>
                                        Total Number of Users
                                        <div class="text-muted text-size-small"></div>
                                    </div>

                                    <div class="container-fluid">
                                        <div id="members-online"></div>
                                    </div>
                                </div>
                                <!-- /members online -->

                            </div>

                            <div class="col-lg-3">

                                <!-- Current server load -->
                                <div class="panel bg-pink-400">
                                    <div class="panel-body">
                                        <div class="heading-elements">
                                            <ul class="icons-list">

                                            </ul>
                                        </div>

                                        <h3 class="no-margin"><?php //echo $return_data['total_predictions']; ?></h3>
                                        Total Predictions Made
                                        <div class="text-muted text-size-small"></div>
                                    </div>

                                    <div id="server-load"></div>
                                </div>
                                <!-- /current server load -->

                            </div>

                            <div class="col-lg-3">

                                <!-- Today's revenue -->
                                <div class="panel bg-blue-400">
                                    <div class="panel-body">
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <!--<li><a data-action="reload"></a></li>-->
                                            </ul>
                                        </div>

                                        <h3 class="no-margin"><?php //echo $return_data['total_predictions_won_no']; ?></h3>
                                        Total Predictions Won
                                        <div class="text-muted text-size-small"></div>
                                    </div>

                                    <div id="today-revenue"></div>
                                </div>
                                <!-- /today's revenue -->

                            </div>

                            <div class="col-lg-3">

                                <!-- Today's revenue -->
                                <div class="panel bg-blue-400">
                                    <div class="panel-body">
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <!--<li><a data-action="reload"></a></li>-->
                                            </ul>
                                        </div>

                                        <h3 class="no-margin"><?php //echo $return_data['total_predictions_lost_no']; ?></h3>
                                        Total Predictions Lost
                                        <div class="text-muted text-size-small"></div>
                                    </div>

                                    <div id="today-revenue"></div>
                                </div>
                                <!-- /today's revenue -->

                            </div>

                        </div>
                        <!-- /quick stats boxes -->

                        <div class="row">
                            <div class="col-lg-4">

                                <!-- Members online -->
                                <div class="panel bg-teal-400">
                                    <div class="panel-body">
                                        <div class="heading-elements">
                                            <span class="heading-text badge bg-teal-800"></span>
                                        </div>

                                        <h3 class="no-margin"><?php //echo $return_data['total_vote_by_users']?></h3>
                                        Total Number of Votes By Users
                                        <div class="text-muted text-size-small"></div>
                                    </div>

                                    <div class="container-fluid">
                                        <div id="members-online"></div>
                                    </div>
                                </div>
                                <!-- /members online -->

                            </div>

                            <div class="col-lg-4">

                                <!-- Current server load -->
                                <div class="panel bg-pink-400">
                                    <div class="panel-body">
                                        <div class="heading-elements">
                                            <ul class="icons-list">

                                            </ul>
                                        </div>
                                        <h3 class="no-margin"><?php //echo $return_data['total_votes_won_no']; ?></h3>
                                        Total Votes Lost
                                        <div class="text-muted text-size-small"></div>
                                    </div>

                                    <div id="server-load"></div>
                                </div>
                                <!-- /current server load -->

                            </div>

                            <div class="col-lg-4">

                                <!-- Today's revenue -->
                                <div class="panel bg-blue-400">
                                    <div class="panel-body">
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <!--<li><a data-action="reload"></a></li>-->
                                            </ul>
                                        </div>

                                        <h3 class="no-margin"><?php //echo $return_data['total_votes_lost_no']; ?></h3>
                                        Total Votes Won
                                        <div class="text-muted text-size-small"></div>
                                    </div>

                                    <div id="today-revenue"></div>
                                </div>
                                <!-- /today's revenue -->

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12 col-lg-12">

                        <!-- Quick stats boxes -->
                        <div class="row">

                            <div class="col-lg-6">

                                <a href="<?php //echo base_url('admin_control/mains/clubs_country/'.$this->uri->segment(4).'/add_new_bet_tips'); ?>">

                                    <!-- Current server load -->
                                    <div class="panel bg-pink-400">
                                        <div class="panel-body">
                                            <div class="heading-elements">
                                                <ul class="icons-list">

                                                </ul>
                                            </div>

                                            <h1 class="no-margin text-center">Create Predictions</h1>

                                            <div class="text-muted text-size-small"></div>
                                        </div>

                                        <div id="server-load"></div>
                                    </div>
                                    <!-- /current server load -->

                                </a>

                            </div>

                            <div class="col-lg-6">

                                <a href="<?php //echo base_url('admin_control/mains/clubs_country/'.$this->uri->segment(4).'/bet_predictions_details/'.$date_now.'_'.$date_now); ?>">

                                    <!-- Members online -->
                                    <div class="panel bg-teal-400">
                                        <div class="panel-body">
                                            <div class="heading-elements">
                                                <span class="heading-text badge bg-teal-800"></span>
                                            </div>

                                            <h1 class="no-margin text-center">View Predictions</h1>
                                            <div class="text-muted text-size-small"></div>
                                        </div>

                                        <div class="container-fluid">
                                            <div id="members-online"></div>
                                        </div>
                                    </div>
                                    <!-- /members online -->

                                </a>

                            </div>

                        </div>
                        <!-- /quick stats boxes -->

                        <div class="row" style="margin-top: 20px">

                            <div class="col-lg-6">

                                    <!-- Members online -->
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="heading-elements">
                                                <span class="heading-text badge bg-teal-800"></span>
                                            </div>

                                            <h1 class="no-margin text-center">Prediction Statistics</h1>
                                            <div class="text-muted text-size-small"></div>
                                        </div>

                                        <div class="container-fluid">
                                            <div class="col-md-12">

                                                <canvas id="myChart" width="1600" height="900"></canvas>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /members online -->

                            </div>

                            <div class="col-lg-6">

                                    <!-- Members online -->
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="heading-elements">
                                                <span class="heading-text badge bg-teal-800"></span>
                                            </div>

                                            <h1 class="no-margin text-center">Votes Statistics</h1>
                                            <div class="text-muted text-size-small"></div>
                                        </div>

                                        <div class="container-fluid">
                                            <div class="col-md-12">

                                                <canvas id="myChart2" width="1600" height="900"></canvas>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /members online -->

                            </div>

                        </div>

                    </div>

                </div>
                <!-- /dashboard content -->


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
