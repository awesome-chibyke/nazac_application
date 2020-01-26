
<section class="headings">
    <div class="text-heading text-center">
        <div class="container">

            <h1 class="title_head">Details of Students/Individuals Who Indicated Interest in Your Roomy Request</h1>

            <p style="margin-top: 15px; padding-left: 10px; padding-right:10px; color:white;" >
                Please endeavour to get these informations when you contact your potential room mates. information on Cleanliness, Work/reading schedules, Sleeping schedules, Tobacco, Drug use, Interactions, Guests, Drinking, Age, Personality description, Likes and dislikes
            </p>

        </div>
    </div>
</section>
<!-- END SECTION HEADINGS -->

<!-- START SECTION AGENTS -->
<section class="agents team" style="padding-bottom: 0px;" >
    <div class="container">
        <div class="row">

            <div class="col-lg-12">

                <?php
                if( $this->session->flashdata('form_error') ){ ?>
                    <div class="col-sm-12 alert alert-warning text-center" style="margin-top: 30px">
                        <?php
                        echo $this->session->flashdata('form_error');
                        ?>
                    </div>
                <?php } ?>

                <?php
                if( $this->session->flashdata('form_success') ){ ?>
                    <div class="col-sm-12 alert alert-success text-center" style="margin-top: 30px">
                        <?php
                        echo $this->session->flashdata('form_success');
                        ?>
                    </div>
                <?php } ?>


                <?php if(count($interest_to_roomy_request_details) > 0){ $count = 0;?>
                    <?php foreach($user_details_array as $k => $singleAgent){?>

                        <div class="col-lg-12 is_card" style="position: relative;">

                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="text-center text-uppercase" style="color:white;">Interest Indication from <?php print strtoupper(strtolower($singleAgent['nazac_clients_fname'].' '.$singleAgent['nazac_clients_lname']));?></h4>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <?php if($interest_to_roomy_request_details[$count]['interest_status'] === 'pending'){?>
                                    <a href="javascript:;" onclick="acceptRoonMate('<?php echo $interest_to_roomy_request_details[$count]['roomy_request_id']?>', '<?php echo $interest_to_roomy_request_details[$count]['unique_id']?>')" class="btn btn-primary">Accept</a>
                                    <a href="javascript:;" onclick="declineRoonMate('<?php echo $interest_to_roomy_request_details[$count]['unique_id']?>')" class="btn btn-warning">Decline</a>
                                    <?php } ?>
                        <?php if($interest_to_roomy_request_details[$count]['interest_status'] === 'declined'){?>
                            <span  class="my_alert alert-danger">Declined</span>

                        <?php } ?>
                        <?php if($interest_to_roomy_request_details[$count]['interest_status'] === 'done'){?>
                            <span class="my_alert alert-success">Completed</span>

                        <?php } ?>
                                </div>
                            </div>

                        </div>

                <div class="agent agent-row shadow-hover">
                    <a href="#" class="agent-img">
                        <div class="img-fade"></div>
                        <div class="button alt agent-tag"> Properties</div>

                        <img src="<?php print base_url();?>resource/upload/<?php print $singleAgent['nazac_client_passport'];?>" alt="<?php print  $singleAgent['nazac_clients_fname'].' '.$singleAgent['nazac_clients_lname'];?>" />
                    </a>
                    <div class="agent-content">
                        <div class="agent-details">
                            <h4><a href="#"><?php print strtoupper(strtolower($singleAgent['nazac_clients_fname'].' '.$singleAgent['nazac_clients_lname']));?></a></h4>
                            <p><i class="fa fa-tag icon"></i><?php echo ucfirst($singleAgent['nazac_client_role']) ?></p>
                            <p><i class="fa fa-envelope icon"></i><?php print $singleAgent['nazac_client_email'];?></p>
                            <p><i class="fa fa-phone icon"></i><?php print $singleAgent['nazac_client_phone'];?></p>

                        </div>

                        <div class="agent-text" style="margin-bottom: 50px">
                            <?php $department_name = $this->Admin->dbSelectWithOrWithoutParameter('faculty_table', array('unique_id'=>$singleAgent['nazac_client_department']))?>
                            <div style="display: inline-block; margin-top: 5px; margin-bottom: 5px;"><strong>Department: </strong><span><?php if(empty($singleAgent['nazac_client_department'])){ echo 'None'; }else{ echo $department_name['result'][0]['department_name']; }; ?></span></div>

                            <?php $faculty_name = $this->Admin->dbSelectWithOrWithoutParameter('faculty_table', array('unique_id'=>$singleAgent['nazac_client_faculty']))?>
                            <div style="display: inline-block; margin-top: 5px; margin-bottom: 5px;"><strong>Faculty: </strong><span><?php if(empty($singleAgent['nazac_client_faculty'])){ echo 'None'; }else{ echo $faculty_name['result'][0]['faculty_name']; };?></span></div>
                            <div><?php print $interest_to_roomy_request_details[$count]['description_of_self'];?></div>
                        </div>
                        <div class="agent-footer center">
                            <ul class="netsocials">

                                <li>
                                    <a data-toggle="tooltip" title="Connect On Facebook" data-placement="top" target="_blank" href="<?php print $singleAgent['nazac_client_facebook_handel'];?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>

                                <li><a data-toggle="tooltip" title="Connect On Twitter" data-placement="top" target="_blank" href="<?php print $singleAgent['nazac_client_twitter_handel'];?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li>
                                    <a data-toggle="tooltip" title="Connect On Instagram" data-placement="top" target="_blank" href="<?php print $singleAgent['nazac_client_instagram_handel'];?>" title="instagran"><i class="fa fa-instagram" style="border: solid #ccc 1px; background: #ccc;" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a data-toggle="tooltip" title="Click to chat" data-placement="top" style="font-size:15px;" target="_blank" href="https://wa.me/<?php print $singleAgent['nazac_client_whatsapp_number'];?>?text=Hi <?php print $singleAgent['nazac_clients_fname'];?>, i am intrested in the property listed in <?php print $siteDetail['site_name'];?>"><i class="fab fa-whatsapp fa-2x text-success" aria-hidden="true"></i></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php $count++; } ?>
                <?php } ?>

                <?php if(count($interest_to_roomy_request_details) == 0){ ?>

                    <div class="col-sm-12" style="position:relative; margin-bottom: 20px;" >

                        <div class="wall-body">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <div style="width:100%;" class="_9b954_8rPAx">
                                        <div class="row">
                                            <div class="col-sm-12" >
                                                <h3 style="height: 200px; line-height: 200px;" >No Data was Returned</h3>
                                            </div>
                                            <div class="col-sm-12" >

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>

            <!-- START SECTION FEATURED PROPERTIES -->

            <!-- END SECTION FEATURED PROPERTIES -->
        </div>
        <!-- end row -->

    </div>
</section>
<!-- END SECTION AGENTS -->


