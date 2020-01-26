<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="<?php echo base_url('admin_assets/global_assets/images/placeholders/placeholder.jpg') ?>" class="img-circle img-sm" alt=""></a>
                    <div class="media-body">

                        <span class="media-heading text-semibold"><?php echo $admin_details['full_name']; ?></span>
                        <div class="text-size-mini text-muted">
                            <!--<i class="icon-pin text-size-small"></i><strong>Unique Number</strong>--> <span><?php echo $admin_details['unique_id']; ?></span>
                        </div>
                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <!--<a href="#"><i class="icon-cog3"></i></a>-->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="the_li"><a class="the_li_a" href="<?php echo base_url("admin_control/mains/index/".$this->uri->segment(4)) ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <li class="the_li">
                        <a href="javascript:;"><i class="icon-stack2"></i> <span>Users</span></a>
                        <ul>

                            <li><a class="the_li_a" href="<?php echo base_url("admin_control/mains/users/".$this->uri->segment(4)."/all") ?>">All Users</a></li>
                            <?php /*foreach($account_type as $key => $value){ */?><!--
                            <li><a href="<?php /*echo base_url("admin_control/all_user/".strtolower($value['acount_type'])) */?>"><?php /*echo ucwords($value['acount_type']); */?></a></li>
                            --><?php /*} */?>

                        </ul>
                    </li>

                    <li class="the_li">
                        <a href="javascript:;"><i class="icon-copy"></i> <span>Bet Details</span></a>
                        <ul>
                            <li>
                                <a class="the_li_a" href="<?php echo base_url('admin_control/mains/clubs_country/'.$this->uri->segment(4).'/add_new_bet_types'); ?>">Add New Bet Types</a>
                            </li>
                            <li>
                                <a class="the_li_a" href="<?php echo base_url('admin_control/mains/clubs_country/'.$this->uri->segment(4).'/bet_types_details'); ?>">Bet Type Details</a>
                            </li>
                            <li>
                                <a class="the_li_a" href="<?php echo base_url('admin_control/mains/clubs_country/'.$this->uri->segment(4).'/add_new_bet_tips'); ?>">Add New Bet Tips</a>
                            </li>
                            <li>
                                <a class="the_li_a" href="<?php echo base_url('admin_control/mains/clubs_country/'.$this->uri->segment(4).'/bet_predictions_details/'.$date_now.'_'.$date_now); ?>">View Todays Bet Tips</a>
                            </li>

                        </ul>
                    </li>

                    <li class="the_li">
                        <a href="javascript:;"><i class="zmdi zmdi-view-compact"></i> <span>Club/Country</span></a>
                        <ul><!---->
                            <li>
                                <a class="the_li_a" href="<?php echo base_url('admin_control/mains/clubs_country/'.$this->uri->segment(4)); ?>/add_clubs_country">Add New Club/Country</a>
                            </li>
                            <li>
                                <a class="the_li_a" href="<?php echo base_url('admin_control/mains/clubs_country/'.$this->uri->segment(4)); ?>/clubs_country_details">Club/Country Details</a>
                            </li>

                            <li>
                                <a class="the_li_a" href="<?php echo base_url('admin_control/mains/clubs_country/'.$this->uri->segment(4)); ?>/add_competition_name">Add New Competition/League Name</a>
                            </li>
                            <li>
                                <a class="the_li_a" href="<?php echo base_url('admin_control/mains/clubs_country/'.$this->uri->segment(4)); ?>/comp_league_name_details">View Competitions/League Name</a>
                            </li>
                        </ul>
                    </li>

                    <li class="the_li">
                        <a href="javascript:;"><i class="zmdi zmdi-view-compact"></i> <span>Bet Companies</span></a>
                        <ul>

                            <li>
                                <a class="the_li_a" href="<?php echo base_url('admin_control/mains/clubs_country/'.$this->uri->segment(4).'/add_new_bet_companies'); ?>">Add New Bet Companies</a>
                            </li>

                            <li>
                                <a class="the_li_a" href="<?php echo base_url('admin_control/mains/clubs_country/'.$this->uri->segment(4).'/view_bet_companies'); ?>">View Companies</a>
                            </li>

                        </ul>
                    </li>

                    <li class="the_li">
                        <a href="javascript:;"><i class="zmdi zmdi-view-compact"></i> <span>Core Features</span></a>
                        <ul>

                            <li>
                                <a class="the_li_a" href="<?php echo base_url('admin_control/mains/settings/'.$this->uri->segment(4)); ?>">Setting Area</a>
                            </li>

                        </ul>
                    </li>
                    <li class="the_li"><a class="the_li_a" href="<?php echo base_url("admin_control/mains/logout/".$this->uri->segment(4)) ?>"><i class="icon-switch2"></i> <span>Logout</span></a></li>

                        </ul>
                    </li>
                    <!-- /page kits -->



                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->