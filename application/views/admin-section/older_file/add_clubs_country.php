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

                <?php if($this->uri->segment(5) === 'bet_vote_details'){ ?>

                    <!-- table for users -->
                    <div class="row">
                        <div class="col-lg-12 ">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-6 panel-title user_display"><?php echo $return_data['feature_type']; ?> </h5>
                                    <div style="display: inline-block;" class="col-md-4 panel-title user_display">

                                        <!--<a href="javascript:;" onclick="delete_action('delete_bet_tips')" style="color:white;" class="btn btn-success">Delete</a>

                                        <a href="javascript:;" onclick="delete_action('reverse_delete_bet_tips')" style="color:white;" class="btn btn-success">Reverse Delete</a>

                                        <a href="javascript:;" onclick="result_submiter()" style="color:white;" class="btn btn-success">Submit Results</a>-->

                                    </div>

                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <table class="table datatable-show-all">
                                    <thead>
                                    <tr >

                                        <th class="text-center">S/NO</th>
                                        <!--<th class="text-center"><input type="checkbox" class="form-control checkAll" onclick="toggleChecBox()"  /></th>-->
                                        <th class="text-center">Vote Type</th>
                                        <th class="text-center">User Full Name</th>
                                        <th class="text-center">User Point Details</th>
                                        <th class="text-center">Home Team</th>
                                        <th class="text-center">Away Team</th>
                                        <th class="text-center">Bet Result</th>
                                        <th class="text-center">Vote Conditions</th>
                                        <th class="text-center">Vote Date</th>
                                        <th class="text-center">Vote Time</th>
                                        <th class="text-center">Kick Time</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <?php if(count($return_data['vote_details']) > 0){ $no = 0; $vote_details = $return_data['vote_details']; $count = 0 ?>
                                        <?php foreach($vote_details as $values){ $no++; ?>
                                            <!--select from the property table using the property unque id-->
                                            <tr >
                                                <td class="text-center">
                                                    <span><?php echo $no; ?></span>
                                                </td>
                                                <!--<td class="text-center">
                                                    <input type="checkbox" class="form-control checkIt" value="<?php /*echo $values[$return_data['betting_table_column'][0]] */?>" />
                                                </td>-->
                                                <td class="text-center">
                                                    <?php if(strpos($values[$return_data['vote_table_column'][3]], 'not')){?>
                                                    <span class='zmdi zmdi-thumb-down'></span>
                                                <?php }else{ ?>
                                                    <span class='zmdi zmdi-thumb-up'></span>
                                                <?php } ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $return_data['user_details'][$count][$return_data['user_tb_column'][3]].' '.$return_data['user_details'][$count][$return_data['user_tb_column'][2]].' '.$return_data['user_details'][$count][$return_data['user_tb_column'][1]] ?>
                                                </td>
                                                <td class="text-center">
                                                    <span class=''><?php echo $return_data['user_details'][$count][$return_data['user_tb_column'][25]]; ?></span></td>
                                                <td class="text-center"><span class=''><?php echo $return_data['team_a_details'][$count]['club_country_abbreviation']; ?></span></td>
                                                <td class="text-center"><span class=''><?php echo $return_data['team_b_details'][$count]['club_country_abbreviation'] ?></span></td>

                                                <td class="text-center"><span class=''><?php echo $return_data['singel_bet_details'][$count][$return_data['betting_table_column'][7]]; ?></span></td>
                                                <td class="text-center"><span class=''><?php echo $values[$return_data['vote_table_column'][7]]; ?></span></td>
                                                <td class="text-center"><span class=''><?php echo $values[$return_data['vote_table_column'][5]]; ?></span></td>

                                                <td class="text-center"><span class=''><?php echo $values[$return_data['vote_table_column'][6]]; ?></span></td>
                                                <td class="text-center"><?php echo $return_data['singel_bet_details'][$count][$return_data['betting_table_column'][9]].' '.$return_data['singel_bet_details'][$count][$return_data['betting_table_column'][12]]; ?></td>


                                            </tr>

                                            <?php $count++; } } ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <!--carries the input field-->

                    </div>

                <?php } ?>

                <?php if($this->uri->segment(5) === 'bet_predictions_details'){ ?>

                    <!-- table for users -->
                    <div class="row">
                        <div class="col-lg-12 ">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-6 panel-title user_display"><?php echo $return_data['feature_type']; ?> (<?php $exploded_date = explode('_', $this->uri->segment(6)); echo $exploded_date[0] .' TO '. $exploded_date[1];?>)</h5>
                                    <div style="display: inline-block;" class="col-md-4 panel-title user_display">

                                        <a href="javascript:;" onclick="delete_action('delete_bet_tips')" style="color:white;" class="btn btn-success">Delete</a>

                                        <a href="javascript:;" onclick="delete_action('reverse_delete_bet_tips')" style="color:white;" class="btn btn-success">Reverse Delete</a>

                                        <a href="javascript:;" onclick="result_submiter()" style="color:white;" class="btn btn-success">Submit Results</a>

                                    </div>

                                    <div style="display: inline-block; margin-bottom: 20px;" class="col-md-12 panel-title user_display">

                                        <div class="row">
                                            <div class="col-md-10"><h5>Filter by Date</h5></div>
                                            <div class="col-md-3">
                                                <label>Start Date</label>
                                                <input id="datetimepicker10" type="text" onblur="removeSelectBorder(this)" class="form-control date_from" name="date_from">
                                            </div>
                                            <div class="col-md-3">
                                                <label>End Date</label>
                                                <input id="datetimepicker11" type="text" onblur="removeSelectBorder(this)" class="form-control date_to" name="date_to">
                                            </div>
                                            <div class="col-md-3">
                                                <button style="margin-top: 30px;" type="button" onclick="getBettipByDate()" >Go</button>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <table class="table datatable-show-all">
                                    <thead>
                                    <tr >

                                        <th class="text-center">S/NO</th>
                                        <th class="text-center"><input type="checkbox" class="form-control checkAll" onclick="toggleChecBox()"  /></th>
                                        <th class="text-center">Home Team</th>
                                        <th class="text-center">Away Team</th>
                                        <th class="text-center">Bet Odd</th>
                                        <th class="text-center">Bet Tip</th>
                                        <th class="text-center">Bet Point</th>
                                        <th class="text-center">Bet Tip Result</th>
                                        <th class="text-center">Bet Tip description</th>
                                        <th class="text-center">Kick Off Added</th>
                                        <th class="text-center">Kick Time</th>
                                        <th class="text-center">Name of League/Competition</th>
                                        <th class="text-center">Delete Status</th>
                                        <th class="text-center"></th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <?php if(count($return_data['feature_result']) > 0){ $no = 0; $feature_result = $return_data['feature_result']; $count = 0 ?>
                                        <?php foreach($feature_result as $values){ $no++; ?>
                                            <!--select from the property table using the property unque id-->
                                            <tr style="background: <?php if($values[$return_data['betting_table_column'][15]] == 'yes'){ echo '#ccc'; } ?>" >
                                                <td class="text-center">
                                                    <span><?php echo $no; ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" class="form-control checkIt" value="<?php echo $values[$return_data['betting_table_column'][0]] ?>" />
                                                </td>

                                                <td class="text-center"><span class=''><?php echo $return_data['team_a_details'][$count]['club_country_abbreviation']; ?></span></td>
                                                <td class="text-center"><span class=''><?php echo $return_data['team_b_details'][$count]['club_country_abbreviation'] ?></span></td>
                                                <td class="text-center"><span class=''><?php echo $values[$return_data['betting_table_column'][4]]; ?></span></td>
                                                <td class="text-center"><span class=''><?php echo $values[$return_data['betting_table_column'][5]]; ?></span></td>
                                                <td class="text-center"><span class=''><?php echo $values[$return_data['betting_table_column'][6]]; ?></span></td>
                                                <td class="text-center">

                                                        <?php if($values[$return_data['betting_table_column'][7]] == 'none'){ ?>
                                                            <span style="width: 130px; margin-bottom: 10px;" class='label label-info'><?php echo $values[$return_data['betting_table_column'][7]]; ?></span>
                                                            <input type="text" class="match_score form-control" style="border: 1px solid #0b2e13; margin-bottom: 2px;" placeholder="format: 0:0" onblur="checkFormat(this)" />
                                                            <select name="add_bet_result[]" class="form-control add_bet_result" data-bet-unique-id="<?php echo $values[$return_data['betting_table_column'][0]]; ?>">
                                                            <option selected value="">Select Result</option>
                                                            <option value="<?php echo $values[$return_data['betting_table_column'][5]] ?>">
                                                                <?php echo $values[$return_data['betting_table_column'][5]]; ?>
                                                            </option>
                                                            <option value="<?php echo 'not-'.$values[$return_data['betting_table_column'][5]] ?>">
                                                                <?php echo 'not-'.$values[$return_data['betting_table_column'][5]]; ?>
                                                            </option>
                                                        </select>

                                                        <?php }else{ ?>

                                                            <?php if($values[$return_data['betting_table_column'][7]] == $values[$return_data['betting_table_column'][5]]){?>
                                                    <span style="width: 130px; margin-bottom: 10px; font-size:15px;"  class="label label-info"><?php echo 'Positive'; ?></span>
                                                    <?php } ?>

                                                            <?php if($values[$return_data['betting_table_column'][7]] != $values[$return_data['betting_table_column'][5]]){?>
                                                                <span style="width: 130px; margin-bottom: 10px; font-size:15px;"  class="label label-warning"><?php echo 'Negative'; ?></span>
                                                            <?php } ?>


                                                        <?php } ?>


                                                </td>

                                                <td class="text-center"><span class=''><?php echo $values[$return_data['betting_table_column'][8]]; ?></span></td>
                                                <?php $date_conversion_to_local = $this->Admin->getDatetimeAdder($values[$return_data['betting_table_column'][9]].' '.$values[$return_data['betting_table_column'][12]], '+1 hour', 'Africa/Lagos'); ?>
                                                <?php $real_date = explode(' ',$date_conversion_to_local); ?>

                                                <td class="text-center"><span class='alert alert-info'><?php echo $real_date[0] ; ?></span></td>
                                                <td class="text-center"><span class=''><?php echo $real_date[1]; ?></span></td>
                                                <td class="text-center"><span class=''><?php echo $values[$return_data['betting_table_column'][11]]; ?></span></td>
                                                <td class="text-center"><?php if($values[$return_data['betting_table_column'][15]] === 'yes'){ echo '<span class="label label-warning">Deleted</span>'; }else{ echo '<span class="label label-success">Not Deleted</span>';} ?></span></td>

                                                <td class="text-center">

                                                    <ul class="icons-list">
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="icon-menu9"></i>
                                                            </a>

                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li>
                                                                    <a target="_blank" href="<?php echo base_url('admin_control/mains/clubs_country/'.$this->uri->segment(4).'/bet_prediction_details_edit/'.$values[$return_data['betting_table_column'][0]]); ?>"><i class="zmdi zmdi-account-circle"></i> More details</a>
                                                                </li>

                                                                <li>
                                                                    <a target="_blank" href="<?php echo base_url('admin_control/mains/clubs_country/'.$this->uri->segment(4).'/bet_vote_details/'.$values[$return_data['betting_table_column'][0]]); ?>"><i class="zmdi zmdi-account-circle"></i> Voting details</a>
                                                                </li>


                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </td>

                                            </tr>

                                        <?php $count++; } } ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <!--carries the input field-->

                    </div>

                <?php } ?>

                <?php if($this->uri->segment(5) === 'bet_prediction_details_edit'){ ?>

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

                                            <?php echo form_open(base_url('admin_control/mains/update_bet_prediction/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6))); ?>


                                            <?php if($this->session->flashdata('eidt_bet_prediction_error')){ ?>
                                                <div class="alert-warning alert col-sm-10 col-sm-offset-1 errors" style="color:black; padding:10px; font-size:12px;">
                                                    <?php echo $this->session->flashdata('eidt_bet_prediction_error'); ?>
                                                </div>

                                            <?php } ?>

                                            <?php if($this->session->flashdata('eidt_bet_prediction_success')){ ?>
                                                <div class="alert-success alert col-sm-10 col-sm-offset-1 errors" style="color:black; padding:10px; font-size:12px;">
                                                    <?php echo $this->session->flashdata('eidt_bet_prediction_success'); ?>
                                                </div>

                                            <?php } ?>

                                            <?php  $bet_details_result = $return_data['bet_details_result'][0]; ?>
                                            <div class="col-md-4">

                                                <label>Unique ID</label>
                                                <input name="ed_bet_unique_id" type="text" onblur="removeSelectBorder(this)" readonly value="<?php echo $bet_details_result[$return_data['betting_table_column'][0]]; ?>" class="form-control">
                                            </div>
                                            <div class="col-md-4">

                                                <label>Home Team</label>
                                                <?php $team_details = $return_data['team_details']; ?>

                                                <select class="form-control ed_home_team" name="ed_home_team">
                                                    <option value="">Select Home Team</option>

                                                    <?php foreach ($team_details as $k => $value){?>
                                                        <!--check if the team a is same as team b-->

                                                        <option <?php if( $bet_details_result[$return_data['betting_table_column'][1]] == $value[$return_data['club_country_table_column'][0]]){ echo "selected"; } ?> value="<?php echo $value[$return_data['club_country_table_column'][0]]; ?>">
                                                            <?php echo $value[$return_data['club_country_table_column'][2]]; ?>
                                                        </option>

                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Away Team</label>
                                                <select class="form-control ed_away_team" name="ed_away_team">
                                                    <option value="">Select Away Team</option>

                                                    <?php foreach ($team_details as $k => $value){?>
                                                        <!--check if the team a is same as team b-->

                                                        <option <?php if( $bet_details_result[$return_data['betting_table_column'][2]] == $value[$return_data['club_country_table_column'][0]]){ echo "selected"; } ?> value="<?php echo $value[$return_data['club_country_table_column'][0]]; ?>">
                                                            <?php echo $value[$return_data['club_country_table_column'][2]]; ?>
                                                        </option>

                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>Bet Odd</label>
                                                <input type="number" onblur="removeSelectBorder(this)" value="<?php echo $bet_details_result[$return_data['betting_table_column'][4]]?>" class="form-control ed_bet_odd" name="ed_bet_odd">

                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>Bet Tip/Prediction</label>
                                                <?php $bet_type_details = $return_data['bet_type_details']; ?>
                                                <select name="ed_bet_tip_pred" class="form-control ed_bet_tip_pred">
                                                    <option value="">Select Tip/Prediction</option>
                                                    <?php foreach ($bet_type_details as $k => $value){?>
                                                        <option <?php if($value == $bet_details_result[$return_data['betting_table_column'][5]] ){ echo "selected"; } ?> value="<?php echo $value; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>Bet Point</label>
                                                <input type="text" value="<?php echo $bet_details_result[$return_data['betting_table_column'][6]]; ?>" onblur="removeSelectBorder(this)" class="form-control ed_bet_point" name="ed_bet_point">
                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>Bet Prediction Result</label>
                                                <select name="ed_bet_result" class="form-control ed_bet_result">
                                                    <option selected value="">Select Result</option>
                                                        <option value="<?php echo $bet_details_result[$return_data['betting_table_column'][5]] ?>">
                                                            <?php echo $bet_details_result[$return_data['betting_table_column'][5]]; ?>
                                                        </option>
                                                        <option value="<?php echo 'not-'.$bet_details_result[$return_data['betting_table_column'][5]] ?>">
                                                            <?php echo 'not-'.$bet_details_result[$return_data['betting_table_column'][5]]; ?>
                                                        </option>
                                                </select>
                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>Bet Prediction/Tip Description (25 Character Max)</label>
                                                <input type="text" name="ed_bet_tip_desc" value="<?php echo $bet_details_result[$return_data['betting_table_column'][8]]; ?>" maxlength="25" onblur="removeSelectBorder(this)" class="form-control ed_bet_tip_desc">
                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>League Name/Competition Name</label>
                                                <select name="ed_league_name" class="form-control ed_league_name">
                                                    <option selected value="">Select League/Competition Name</option>
                                                    <?php foreach ($return_data['comp_league_name'] as $k => $value){?>
                                                        <option <?php if($value == $bet_details_result[$return_data['betting_table_column'][11]] ){ echo 'selected'; }?> value="<?php echo $value?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <?php $date_conversion_to_local = $this->Admin->getDatetimeAdder($bet_details_result[$return_data['betting_table_column'][9]].' '.$bet_details_result[$return_data['betting_table_column'][12]], '+1 hour', 'Africa/Lagos'); ?>

                                                <label>Kick Off Time</label>
                                                <input id="datetimepicker1" type="text" name="ed_kick_off_time" value="<?php echo $date_conversion_to_local; ?>" onblur="removeSelectBorder(this)" class="form-control kick_off_time">
                                            </div>

                                            <div class="col-md-12" style="margin-top: 20px;">

                                                <div class="row">

                                                                                             <?php $count = 0; foreach($return_data['bet_company_details'] as $key => $one_bet_company){ $count++; ?>
                                                        <div class="col-md-4" style="margin-top: <?php echo ($count > 3)? '20px':'0px'; ?>">

                                                            <div class="input-group">
                                                                <input type="hidden" name="bet_company_id_holder[]" value="<?php echo $one_bet_company[$return_data['bet_company_table_columns'][0]] ?>" />
                                                                <span class="input-group-addon bet_company_id0" ><?php echo $one_bet_company[$return_data['bet_company_table_columns'][1]]; ?></span>
                                                                <input type="text" class="form-control bet_company_code" name="bet_company_code[]" value="<?php echo $this->Admin->existenceChecker($one_bet_company[$return_data['bet_company_table_columns'][0]], $return_data['bet_details_result'][0][$return_data['betting_table_column'][16]], $return_data['bet_details_result'][0][$return_data['betting_table_column'][17]], 1, '/'); ?>" placeholder="Enter Bet Code" aria-describedby="basic-addon3">
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                </div>

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

                <?php if($this->uri->segment(5) === 'club_country_details_edit'){ ?>

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

                                            <?php echo form_open_multipart(base_url('admin_control/mains/update_club_country/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6))); ?>


                                            <?php if($this->session->flashdata('eidt_club_country_error')){ ?>
                                                <div class="alert-warning alert col-sm-10 col-sm-offset-1 errors" style="color:black; padding:10px; font-size:12px;">
                                                    <?php echo $this->session->flashdata('eidt_club_country_error'); ?>
                                                </div>

                                            <?php } ?>

                                            <?php if($this->session->flashdata('eidt_club_country_success')){ ?>
                                                <div class="alert-success alert col-sm-10 col-sm-offset-1 errors" style="color:black; padding:10px; font-size:12px;">
                                                    <?php echo $this->session->flashdata('eidt_club_country_success'); ?>
                                                </div>

                                            <?php } ?>

<?php  $feature_result = $return_data['feature_result'][0]; ?>
                                            <div class="col-md-4">

                                                <label>Unique ID</label>
                                                <input name="country_club_unique" type="text" onblur="removeSelectBorder(this)" readonly value="<?php echo $feature_result[$return_data['country_club_table_column'][0]]; ?>" class="form-control">
                                            </div>
                                            <div class="col-md-4">

                                                <label>Club/Country Name</label>
                                                <input type="text" onblur="removeSelectBorder(this)" value="<?php echo $feature_result[$return_data['country_club_table_column'][1]]; ?>" class="form-control ed_country_club_name" name="ed_country_club_name">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Club/Country Abbreviation</label>
                                                <input type="text" onblur="removeSelectBorder(this)" value="<?php echo $feature_result[$return_data['country_club_table_column'][2]]; ?>" class="form-control ed_country_club_abbreviation" name="ed_country_club_abbreviation">
                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>Club/Country Alias</label>
                                                <input type="text" onblur="removeSelectBorder(this)" value="<?php echo $feature_result[$return_data['country_club_table_column'][3]]; ?>" class="form-control ed_country_club_alias" name="ed_country_club_alias">
                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>Name of Stadium</label>
                                                <input type="text" onblur="removeSelectBorder(this)" value="<?php echo $feature_result[$return_data['country_club_table_column'][4]]; ?>" class="form-control ed_country_club_stadium" name="ed_country_club_stadium">
                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>Club/Country Description</label>
                                                <input type="text" value="<?php echo $feature_result[$return_data['country_club_table_column'][5]]; ?>" onblur="removeSelectBorder(this)" class="form-control ed_country_club_desc" name="ed_country_club_desc">
                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>League Name/Continent Football Association</label>
                                                <input type="text" name="ed_association_k" value="<?php echo $feature_result[$return_data['country_club_table_column'][6]]; ?>" onblur="removeSelectBorder(this)" class="form-control ed_association_k">
                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>Upload Club Logo</label>
                                                <input type="file" name="ed_logo_image" onblur="removeSelectBorder(this)" id="ed_logo_image" class="form-control ed_logo_image">
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

                <?php if($this->uri->segment(5) === 'edit_bet_companies'){ ?>

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

                                            <?php echo form_open(base_url('admin_control/mains/update_company_details/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6))); ?>


                                            <?php if($this->session->flashdata('eidt_company_name_error')){ ?>
                                                <div class="alert-warning alert col-sm-10 col-sm-offset-1 errors" style="color:black; padding:10px; font-size:12px;">
                                                    <?php echo $this->session->flashdata('eidt_company_name_error'); ?>
                                                </div>

                                            <?php } ?>

                                            <?php if($this->session->flashdata('eidt_company_name_success')){ ?>
                                                <div class="alert-success alert col-sm-10 col-sm-offset-1 errors" style="color:black; padding:10px; font-size:12px;">
                                                    <?php echo $this->session->flashdata('eidt_company_name_success'); ?>
                                                </div>

                                            <?php } ?>

                                            <?php  $bet_company_details = $return_data['bet_company_details'][0]; ?>
                                            <div class="col-md-4">

                                                <label>Unique ID</label>
                                                <input name="ed_company_unique_id" type="text" onblur="removeSelectBorder(this)" readonly value="<?php echo $bet_company_details[$return_data['betCompanyTableColumn'][0]]; ?>" class="form-control">
                                            </div>
                                            <div class="col-md-4">

                                                <label>Bet Company Name</label>
                                                <input type="text" onblur="removeSelectBorder(this)" value="<?php echo $bet_company_details[$return_data['betCompanyTableColumn'][1]]; ?>" class="form-control" name="ed_company_name">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Bet Company Alias</label>
                                                <input type="text" onblur="removeSelectBorder(this)" value="<?php echo $bet_company_details[$return_data['betCompanyTableColumn'][2]]; ?>" class="form-control" name="ed_cpmpany_alias">
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

                <?php if($this->uri->segment(5) === 'clubs_country_details'){ ?>

                    <!-- table for users -->
                    <div class="row">
                        <div class="col-lg-12 ">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"><?php echo $return_data['feature_type']; ?></h5>
                                    <div style="display: inline-block;" class="col-md-4 panel-title user_display">

                                        <a href="javascript:;" onclick="delete_action('delete_clubs_country')" style="color:white;" class="btn btn-success">Delete</a>

                                        <a href="javascript:;" onclick="delete_action('reverse_clubs_country_delete')" style="color:white;" class="btn btn-success">Reverse Delete</a>

                                    </div>

                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <table class="table datatable-show-all">
                                    <thead>
                                    <tr >

                                        <th class="text-center">S/NO</th>
                                        <th class="text-center"><input type="checkbox" class="form-control checkAll" onclick="toggleChecBox()"  /></th>
                                        <th class="text-center">Country/Club</th>
                                        <th class="text-center">Country/Club Alias</th>
                                        <th class="text-center">Logo</th>
                                        <th class="text-center">Stadium Name</th>
                                        <th class="text-center">Country/Club Description</th>
                                        <th class="text-center">League Name/Continent Association</th>
                                        <th class="text-center">Delete Status</th>
                                        <th class="text-center"></th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <?php if(count($return_data['feature_result']) > 0){ $no = 0; $feature_result = $return_data['feature_result'] ?>
                                        <?php foreach(array_reverse($feature_result) as $values){ $no++; ?>
                                            <!--select from the property table using the property unque id-->
                                            <tr >
                                                <td class="text-center">
                                                    <span><?php echo $no; ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" class="form-control checkIt" value="<?php echo $values[$return_data['country_club_table_column'][0]] ?>" />
                                                </td>
                                                <td class="text-center"><span class=''><?php echo $values[$return_data['country_club_table_column'][1]]; ?></span></td>
                                                <td class="text-center"><span class=''><?php echo $values[$return_data['country_club_table_column'][2]]; ?></span></td>
                                                <td class="text-center"><span class='' style="width: 100px;"><img src="<?php echo base_url('props/images/club_country_logo/'.$values[$return_data['country_club_table_column'][8]] )?>" style="width: 100%;" /></span></td>
                                                <td class="text-center"><span class=''><?php echo $values[$return_data['country_club_table_column'][3]]; ?></span></td>
                                                <td class="text-center"><span class=''><?php echo $values[$return_data['country_club_table_column'][4]]; ?></span></td>
                                                <td class="text-center"><span class=''><?php echo $values[$return_data['country_club_table_column'][5]]; ?></span></td>
                                                <td class="text-center">
                                                    <?php if($values[$return_data['country_club_table_column'][7]] == 'yes'){ echo "<span class='badge badge-danger'>Deleted</span>"; }else if($values[$return_data['country_club_table_column'][7]] === "no"){ echo "<span class='badge badge-success'>Active</span>"; }?>
                                                </td>

                                                <td class="text-center">

                                                    <ul class="icons-list">
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="icon-menu9"></i>
                                                            </a>

                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li><a target="_blank" href="<?php echo base_url('admin_control/mains/clubs_country/'.$this->uri->segment(4).'/club_country_details_edit/'.$values[$return_data['country_club_table_column'][0]]); ?>"><i class="zmdi zmdi-account-circle"></i> Edit details</a></li>


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

                    </div>

                <?php } ?>

                <?php if($this->uri->segment(5) === 'view_bet_companies'){ ?>

                    <!-- table for users -->
                    <div class="row">
                        <div class="col-lg-12 ">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"><?php echo $return_data['feature_type']; ?></h5>
                                    <!--<div style="display: inline-block;" class="col-md-4 panel-title user_display">

                                        <a href="javascript:;" onclick="delete_action('delete_clubs_country')" style="color:white;" class="btn btn-success">Delete</a>

                                        <a href="javascript:;" onclick="delete_action('reverse_clubs_country_delete')" style="color:white;" class="btn btn-success">Reverse Delete</a>

                                    </div>-->

                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <table class="table datatable-show-all">
                                    <thead>
                                    <tr >

                                        <th class="text-center">S/NO</th>
                                        <th class="text-center"><input type="checkbox" class="form-control checkAll" onclick="toggleChecBox()"  /></th>
                                        <th class="text-center">Bet Company Name</th>
                                        <th class="text-center">Bet Company Alias</th>
                                        <!--<th class="text-center">Delete Status</th>-->
                                        <th class="text-center"></th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <?php if(count($return_data['bet_company_details']) > 0){ $no = 0; $bet_company_details = $return_data['bet_company_details'] ?>
                                        <?php foreach($bet_company_details as $values){ $no++; ?>
                                            <!--select from the property table using the property unque id-->
                                            <tr >
                                                <td class="text-center">
                                                    <span><?php echo $no; ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" class="form-control checkIt" value="<?php echo $values[$return_data['betCompanyTableColumn'][0]] ?>" />
                                                </td>
                                                <td class="text-center"><span class=''><?php echo $values[$return_data['betCompanyTableColumn'][1]]; ?></span></td>
                                                <td class="text-center"><span class=''><?php echo $values[$return_data['betCompanyTableColumn'][2]]; ?></span></td>

                                                <td class="text-center">
                                                    <a href="<?php echo base_url('admin_control/mains/clubs_country/'.$this->uri->segment(4).'/edit_bet_companies/'.$values[$return_data['betCompanyTableColumn'][0]]); ?>">Edit</a>
                                                </td>


                                            </tr>

                                        <?php } } ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <!--carries the input field-->

                    </div>

                <?php } ?>

                <?php if($this->uri->segment(5) === 'add_clubs_country'){ ?>

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
                                        <div class="row main_club_country one_club_country">

                                            <div class="col-md-12 head_holder">
                                                <h3>Club/Country 1</h3>
                                            </div>

                                            <?php echo form_open(base_url('admin_control/mains/add_new_club_country/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6))); ?>

                                            <div class="col-md-4">
                                                <label>Club/Country Name</label>
                                                <input type="text" onblur="removeSelectBorder(this)" value="<?php echo set_value('country_club_name'); ?>" class="form-control country_club_name" name="country_club_name[]">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Club/Country Abbreviation</label>
                                                <input type="text" onblur="removeSelectBorder(this)" value="<?php echo set_value('country_club_abbreviation'); ?>" class="form-control country_club_abbreviation" name="country_club_abbreviation[]">
                                            </div>

                                            <div class="col-md-4">

                                                <label>Club/Country Alias</label>
                                                <input type="text" onblur="removeSelectBorder(this)" value="<?php echo set_value('country_club_alias'); ?>" class="form-control country_club_alias" name="country_club_alias[]">
                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>Name of Stadium</label>
                                                <input type="text" onblur="removeSelectBorder(this)" value="<?php echo set_value('country_club_stadium'); ?>" class="form-control country_club_stadium" name="country_club_desc[]">
                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>Club/Country Description</label>
                                                <input type="text" value="<?php echo set_value('country_club_desc'); ?>" onblur="removeSelectBorder(this)" class="form-control country_club_desc" name="country_club_desc[]">
                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>League Name/Continent Football Association</label>
                                                <input type="text" name="cc_association" value="<?php echo set_value('cc_association'); ?>" onblur="removeSelectBorder(this)" class="form-control cc_association">
                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>Upload Club Logo</label>
                                                <input type="file" name="cc_logo_image_0" onblur="removeSelectBorder(this)" id="cc_logo_image_0" class="form-control cc_logo_image">
                                            </div>


                                        </div>

                                        <div class="row new_row" style="margin-top: 30px;">

                                            <div class="col-md-8 float-right">
                                                <button onclick="createNewClubCountryField(this, 'Property Type')" type="button" class="btn btn-primary btn-small">New field for Country/Club</button>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <button onclick="submitCountryClub()" type="button" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
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

                <?php if($this->uri->segment(5) === 'add_new_bet_companies'){ ?>

                    <!-- table for users -->
                    <div class="row">
                        <!--carries the input field-->

                        <div class="col-lg-12">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"> <?php echo ucfirst($return_data['feature_type']); ?></h5>


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
                                        <div class="row main_club_country one_club_country">

                                            <div class="col-md-12 head_holder">
                                                <h3>Bet Company Details 1</h3>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Bet Company Name</label>
                                                <input type="text" onblur="removeSelectBorder(this)" class="form-control bet_company" name="bet_company[]">
                                            </div>

                                            <div class="col-md-4">
                                                <label>Alias</label>
                                                <input type="text" onblur="removeSelectBorder(this)" class="form-control bet_company_alias" name="bet_company_alias[]">
                                            </div>

                                        </div>

                                        <div class="row new_row" style="margin-top: 30px;">

                                            <div class="col-md-8 float-right">
                                                <button onclick="createBetCompanyFields(this)" type="button" class="btn btn-primary btn-small">New field for Country/Club</button>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <button onclick="submitBetCompanyDetails()" type="button" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
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

                <?php if($this->uri->segment(5) === 'add_new_bet_types'){ ?>

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
                                        <div class="row main_club_country one_club_country">

                                            <div class="col-md-12 head_holder">
                                                <h3>Bet Type 1</h3>
                                            </div>

                                            <?php echo form_open(base_url('admin_control/mains/add_new_bet_tips/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6))); ?>

                                            <div class="col-md-10">
                                                <label>Bet Types</label>
                                                <input type="text" onblur="removeSelectBorder(this)" class="form-control bet_types" name="bet_types[]">
                                            </div>

                                        </div>

                                        <div class="row new_row" style="margin-top: 30px;">

                                            <div class="col-md-8 float-right">
                                                <button onclick="createNewBetTypeField(this)" type="button" class="btn btn-primary btn-small">New field for Country/Club</button>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <button onclick="submitBetType()" type="button" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
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

                <?php if($this->uri->segment(5) === 'add_competition_name'){ ?>

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
                                        <div class="row main_club_country one_club_country">

                                            <div class="col-md-12 head_holder">
                                                <h3>Competition/League Name 1</h3>
                                            </div>

                                            <div class="col-md-10">
                                                <label>Competition/League Name</label>
                                                <input type="text" onblur="removeSelectBorder(this)" class="form-control competion_league_name" name="competion_league_name[]">
                                            </div>

                                        </div>

                                        <div class="row new_row" style="margin-top: 30px;">

                                            <div class="col-md-8 float-right">
                                                <button onclick="createNewCompLeagueField(this)" type="button" class="btn btn-primary btn-small">New field for Country/Club</button>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <button onclick="submitCompLeagueName()" type="button" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
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

                <?php if($this->uri->segment(5) === 'add_new_bet_tips'){ ?>

                    <div class="row">
                        <!--carries the input field-->

                        <div class="col-lg-12">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"><?php echo ucfirst($return_data['feature_type']); ?></h5>


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
                                        <div class="row main_club_country one_club_country">

                                            <div class="col-md-12 head_holder">
                                                <h3>Bet Prediction Details 1</h3>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Home Team</label>
                                                <?php $team_details = $return_data['team_details']; ?>
                                                <select class="form-control selectTeamsMain selectTeams home_team">
                                                    <option selected value="">Select Home Team</option>
                                                    <?php foreach ($team_details as $k => $value){?>
                                                        <option value="<?php echo $value[$return_data['country_club_table_column'][0]]?>"><?php echo $value[$return_data['country_club_table_column'][2]]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Away Team</label>
                                                <select class="form-control away_team">
                                                    <option selected value="">Select Away Team</option>
                                                    <?php foreach ($team_details as $k => $value){?>
                                                        <option value="<?php echo $value[$return_data['country_club_table_column'][0]]?>">
                                                            <?php echo $value[$return_data['country_club_table_column'][2]]; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-4">

                                                <label>Bet Odd</label>
                                                <input type="number" onblur="removeSelectBorder(this)" value="<?php echo set_value('bet_odd'); ?>" class="form-control bet_odd" name="bet_odd[]">

                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>Bet Tip/Prediction</label>
                                                <?php $bet_type_details = $return_data['bet_type_details']; ?>
                                                <select class="form-control bet_tip_pred">
                                                    <option selected value="">Select Tip</option>
                                                    <?php foreach ($bet_type_details as $k => $value){?>
                                                        <option value="<?php echo $value; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>Bet Point</label>
                                                <input type="text" value="<?php echo set_value('bet_point'); ?>" onblur="removeSelectBorder(this)" class="form-control bet_point" name="bet_point[]">
                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>Bet Prediction/Tip Description (25 Character Max)</label>
                                                <input type="text" name="bet_tip_desc" value="<?php echo set_value('bet_tip_desc'); ?>" maxlength="25" onblur="removeSelectBorder(this)" class="form-control bet_tip_desc">
                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>League Name/Competition Name</label>
                                                <select class="form-control league_name">
                                                    <option selected value="">Select League/Competition Name</option>
                                                    <?php foreach ($return_data['comp_league_name'] as $k => $value){?>
                                                        <option value="<?php echo $value?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-4" style="margin-top: 20px;">

                                                <label>Kick Off Time</label>
                                                <input id="datetimepicker1" type="text" name="kick_off_time" value="<?php echo set_value('kick_off_time'); ?>" onblur="removeSelectBorder(this)" class="form-control kick_off_time">
                                            </div>

                                            <div class="col-md-12" style="margin-top: 20px;">

                                                <div class="row">

                                                    <?php $count = 0; foreach($return_data['bet_company_details'] as $key => $one_bet_company){ $count++; ?>
                                                    <div class="col-md-4" style="margin-top: <?php echo ($count > 3)? '20px':'0px'; ?>">

                                                        <div class="input-group">
                                                            <span class="input-group-addon bet_company_id0" bet_company_id_holder="<?php echo $one_bet_company[$return_data['bet_company_table_columns'][0]] ?>" ><?php echo $one_bet_company[$return_data['bet_company_table_columns'][1]]; ?></span>
                                                            <input type="text" class="form-control bet_company_code0" placeholder="Enter Bet Code" aria-describedby="basic-addon3">
                                                        </div>
                                                    </div>
                                                    <?php } ?>

                                                </div>

                                            </div>


                                        </div>

                                        <div class="row new_row" style="margin-top: 30px;">

                                            <div class="col-md-8 float-right">
                                                <button onclick="createNewBetTipField(this)" type="button" class="btn btn-primary btn-small">New field for Country/Club</button>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group" style="margin-top: 30px;">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <button onclick="submitBetTips()" type="button" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <!--carries the input field-->

                    </div>

                <?php } ?>

                <?php if($this->uri->segment(5) === 'comp_league_name_details'){ ?>

                    <!-- table for users -->
                    <div class="row">
                        <div class="col-lg-12 ">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"><?php echo $return_data['feature_type']; ?></h5>
                                    <div style="display: inline-block;" class="col-md-4 panel-title user_display">

                                        <!--<a href="javascript:;" onclick="delete_action('delete_clubs_country')" style="color:white;" class="btn btn-success">Delete</a>

                                        <a href="javascript:;" onclick="delete_action('reverse_clubs_country_delete')" style="color:white;" class="btn btn-success">Reverse Delete</a>-->

                                    </div>

                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <table class="table datatable-show-all">
                                    <thead>
                                    <tr >

                                        <th class="text-center">S/NO</th>
                                        <th class="text-center">Competition/League Names</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <?php if($return_data['feature_result'] > 0){ $no = 0; $bet_type_details = $return_data['feature_result'] ?>
                                        <?php foreach($bet_type_details as $values){ $no++; ?>
                                            <!--select from the property table using the property unque id-->
                                            <tr >
                                                <td class="text-center">
                                                    <span><?php echo $no; ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <span class=''><?php echo $values; ?></span>
                                                </td>

                                            </tr>

                                        <?php } } ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <!--carries the input field-->

                    </div>

                <?php } ?>

                <?php if($this->uri->segment(5) === 'bet_types_details'){ ?>

                    <!-- table for users -->
                    <div class="row">
                        <div class="col-lg-12 ">

                            <!-- Page length options -->
                            <div class="panel panel-flat table-responsive">
                                <div class="panel-heading">
                                    <h5 style="display: inline-block;" class="col-md-4 panel-title user_display"><?php echo $return_data['feature_type']; ?></h5>
                                    <div style="display: inline-block;" class="col-md-4 panel-title user_display">

                                        <!--<a href="javascript:;" onclick="delete_action('delete_clubs_country')" style="color:white;" class="btn btn-success">Delete</a>

                                        <a href="javascript:;" onclick="delete_action('reverse_clubs_country_delete')" style="color:white;" class="btn btn-success">Reverse Delete</a>-->

                                    </div>

                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <table class="table datatable-show-all">
                                    <thead>
                                    <tr >

                                        <th class="text-center">S/NO</th>
                                        <th class="text-center">Bet Types</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <?php if($return_data['feature_result'] > 0){ $no = 0; $bet_type_details = $return_data['feature_result'] ?>
                                        <?php foreach($bet_type_details as $values){ $no++; ?>
                                            <!--select from the property table using the property unque id-->
                                            <tr >
                                                <td class="text-center">
                                                    <span><?php echo $no; ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <span class=''><?php echo $values; ?></span>
                                                </td>

                                            </tr>

                                        <?php } } ?>

                                    </tbody>
                                </table>
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
