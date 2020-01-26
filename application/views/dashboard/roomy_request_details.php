<section class="headings">
    <div class="text-heading text-center">
        <div class="container">
            <h1 style="margin-top: 3rem;">List Room Mate Request <br> <small style="font-size: 0.5em;"><?php if($this->uri->segment(4) === 'existing_apartment'){ echo 'Section For People looking for Roomate with Rented Apartments'; }else{ echo 'Section for People with Rented Apartments Looking for a Room Mate'; }?></small></h1>
            <h2><a href="<?php print base_url();?>">Home </a> &nbsp;/<a href="<?php print base_url('agents/mains/dashboard');?>"> Dashboard </a> &nbsp;/ Room Mate Request</h2>
        </div>
    </div>
</section>
<!-- END SECTION HEADINGS -->
<!-- START SECTION BLOG -->
<section class="blog-section">
    <div class="container">
        <div class="news-wrap">

            <?php if($existing_apartment_count == 0){ ?>
            <div class="row">
                <div class="col-xl-8 col-xl-offset-2 col-sm-10 col-sm-offset-1 col-md-8  col-md-offset-2 col-xs-12 alert alert-warning text-center">
                    You don`t have an existing apartment, Roomy request creation is un-available
                </div>
            </div>
            <?php } ?>

            <div class="row">
                <div class="col-xl-12 col-sm-12 col-md-12 col-xs-12 is_card">
                    <a  class="pull-right btn btn-primary btn-sm" style="border-color:#f7a13e; background-color:#f7a13e;" href="<?php if($this->uri->segment(4)==='existing_apartment'){ echo base_url('roomy/mains/find_roomate/no_apartment'); }else{ echo base_url('roomy/mains/find_roomate/existing_apartment'); }?>" title="Create A Room Mate Request"><i class="fa fa-file-o fa-2x" style="color:white; font-size: 1em;"></i></a>
                </div>
            </div>

            <div class="row" style="margin-top: 20px;">

                <?php if(count($roomy_request_details_array) > 0){ ?>
                    <?php $count = 0; foreach($roomy_request_details_array aS $k => $value){?>
                    <div class="col-xl-4 col-md-6 col-xs-12">
                        <div class="news-item" style="border-bottom: 2px solid #f7a13e;">
                            <a href="<?php echo base_url('roomy/mains/single_roomy_request/'.$value['unique_id'])?>" class="news-img-link">
                                <div class="news-item-img">
                                    <?php if($this->uri->segment(4)==='existing_apartment') {//$listed_property_details_array[$count]['nazac_property_thumbnail']
                                        $exploded_image_name = explode(',', $value['nazac_apartment_images']);
                                        ?>
                                    <img class="img-responsive" src="<?php echo base_url('resource/upload/registered_property/'.$exploded_image_name[0]);?>" alt="Apartment Display">
                                    <?php } ?>
                                </div>
                            </a>
                            <div class="news-item-text">
                                <?php if($this->uri->segment(4)==='existing_apartment') { ?>

                                    <?php $prefered_location = $this->Admin->dbSelectWithOrWithoutParameter('nazac_property_locations', array('nazac_location_id'=>$listed_property_details_array[$count]['nazac_property_location']))?>

                                <a href="<?php echo base_url('roomy/mains/single_roomy_request/'.$value['unique_id']); ?>"><h5 style="font-size:1em; font-weight: bold;"><?php echo 'I HAVE A '.$listed_property_details_array[$count]['nazac_property_title'].' LOCATED AT '.strtoupper($prefered_location['result'][0]['nazac_location_name']).', AM IN SEARCH OF A ROOMATE TO JOIN ME'; ?></h5></a><h6><strong>Name of Lodge: </strong><span class="text-uppercase"><?php echo $value['name_of_lodge'] .' Lodge'?></span></h6>


                                <?php } ?>
                                <?php if($this->uri->segment(4)==='no_apartment') { ?>

                                    <?php $prefered_location = $this->Admin->dbSelectWithOrWithoutParameter('nazac_property_locations', array('nazac_location_id'=>$value['prefered_location']))?>

                                    <a href="<?php echo base_url('roomy/mains/single_roomy_request/'.$value['unique_id']); ?>"><h5 style="font-size:1em; font-weight: bold;"><?php echo strtoupper('Am in search of a room mate with a '.$value['prefered_property_type'].' apartment at '.strtoupper($prefered_location['result'][0]['nazac_location_name'])); ?></h5></a>
                                <?php } ?>

                                <?php if( $particular_row_count_of_a_request_array[$count] == 1){ ?>
                                    <?php if($interest_for_roomy_request_array[$count]['id_of_the_user_that_indicated_interest'] === $user_data['nazac_id']){?>
                                    <p style="margin-top: 15px; padding-left: 10px; padding-right:10px;">
                                        <span class="my_alert alert-success">You Indicated Interest for this Request</span>
                                    </p>
                                    <?php } ?>
                                <?php } ?>

                                <div class="dates">
                                    <span class="date"><?php echo $this->thedateguy->returnDateTimeFromCarbon($value['date_created'], '-', ':'); ?></span>

                                    <?php if(isset($_SESSION['_nazlogger'])){?>
                                    <ul class="action-list pl-0">

                                        <?php if($value['roomate_seeker_id'] === $user_data['nazac_id']){ ?>
                                        <li class="action-item pl-2"><a style="color:#f7a13e;" href="<?php echo base_url('roomy/mains/find_roomate/edit/'.$value['unique_id']); ?>" title="Edit Room Mate Request"><i class="fa fa-edit fa-2x"></i></a></li>
                                            <!--base_url('roomy/mains/find_roomate/delete/'.$value['unique_id']) -->
                                            <li class="action-item pl-2"><a style="color:#f7a13e;" href="javascript:;" onclick="deleteRoomateRequest('<?php echo $value['unique_id']; ?>')" title="Delete Request"><i class="fa fa-trash fa-2x"></i></a></li>

                                        <?php } ?>

                        <?php if($value['roomate_seeker_id'] !== $user_data['nazac_id']){ ?>
                                        <li class="action-item"><a style="color:#f7a13e;" href="javascript:;" onclick="indicateInterestToBeARoomMate('<?php echo $value['unique_id']; ?>')" title="I am interested in being your room mate"><i class="fa fa-check-square-o fa-2x"></i></a></li>
                                        <?php } ?>
                        <?php if($value['roomate_seeker_id'] === $user_data['nazac_id']){ ?>
                                        <li class="action-item"><a href="<?php echo base_url('roomy/mains/view_interest/'.$value['unique_id'])?>" title="You have <?php echo $reply_to_roomy_request_row_count_array[$count] ?> pending interest indication from propective room mates"><i class="fa fa-bell"></i><span class="badge badge-info"><?php echo $reply_to_roomy_request_row_count_array[$count]; ?></span></a></li>
                            <?php } ?>
                                    </ul>
                                    <?php } ?>

                                </div>
                                <div class="news-item-descr big-news">
                                    <p>
                                        <?php
                            $body = $value['description_of_personality'];
                            if (strlen($body) > 150) {
                                print substr($body, 0, 150) . '...';
                            } else {
                                print $body;
                            }
                                        ?>
                                    </p>
                                </div>

                                <div class="news-item-bottom">
                                    <a href="<?php echo base_url('roomy/mains/single_roomy_request/'.$value['unique_id']); ?>" class="news-link">View more...</a>
                                    <div class="admin">
                                        <p>By, <?php echo $details_of_user_that_made_request_array[$count]['nazac_clients_lname'].' '.$details_of_user_that_made_request_array[$count]['nazac_clients_fname'] ?></p>
                                        <img src="<?php print base_url('resource/upload/'.$details_of_user_that_made_request_array[$count]['nazac_client_passport']);?>" alt="<?php echo $details_of_user_that_made_request_array[$count]['nazac_clients_lname'].' '.$details_of_user_that_made_request_array[$count]['nazac_clients_fname'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6 class="col-sm-12" style="padding-top: 30px; width: 100%;">
                        <nav aria-label="...">
                            <ul class="pagination">

                                <?php echo $previous_link; ?>
                                <?php echo $looped_links; ?>
                                <?php echo $next_links; ?>

                            </ul>

                        </nav>
                    </h6>

                    <?php $count++; } ?>
                <?php } ?>

                <?php if(count($roomy_request_details_array) == 0){ ?>

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
        </div>



        <div class="row">
            <div class="col-xl-12 col-md-12 col-xs-12"></div>
            <div class="col-xl-8 col-xl-offset-2 col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1" style="margin-top: 30px">
                Didn`t See What You  Want? <br> <a class="btn btn-primary btn-lg" href="<?php if($this->uri->segment(4)==='existing_apartment'){ echo base_url('roomy/mains/find_roomate/no_apartment'); }else{ echo base_url('roomy/mains/find_roomate/existing_apartment'); }?>" title="Create A Room Mate Request" >Create A Room Mate Request</a>
            </div>
        </div>


    </div>
</section>
<!-- END SECTION BLOG -->