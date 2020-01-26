<section class="headings">
    <div class="text-heading text-center">
        <div class="container">
            <h1> <?php print $singleAgent['nazac_clients_fname'];?></h1>
            <h2><a href="<?php print base_url();?>">Home </a> &nbsp;/&nbsp; Clients / Students Details</h2>
        </div>
    </div>
</section>
<!-- END SECTION HEADINGS -->

<!-- START SECTION AGENTS -->
<section class="agents team">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="agent agent-row shadow-hover">
                    <a href="#" class="agent-img">
                        <div class="img-fade"></div>
                        <div class="button alt agent-tag"> Properties</div>

                        <img src="<?php print base_url();?>resource/upload/<?php print $singleAgent['nazac_client_passport'];?>" alt="<?php print  $singleAgent['nazac_clients_fname'].' '.$singleAgent['nazac_clients_lname'];?>" />
                    </a>
                    <div class="agent-content">
                        <div class="agent-details">
                            <h4><a href="#"><?php print strtoupper(strtolower($singleAgent['nazac_clients_fname'].' '.$singleAgent['nazac_clients_lname']));?></a></h4>
                            <p><i class="fa fa-tag icon"></i>Real Estate Agent</p>
                            <p><i class="fa fa-envelope icon"></i><?php print $singleAgent['nazac_client_email'];?></p>
                            <p><i class="fa fa-phone icon"></i><?php print $singleAgent['nazac_client_phone'];?></p>
                        </div>
                        <div class="agent-text">
                            <p><?php print $singleAgent['nazac_agents_description'];?></p>
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
            </div>

            <!-- START SECTION FEATURED PROPERTIES -->

            <!-- END SECTION FEATURED PROPERTIES -->
        </div>
        <!-- end row -->

    </div>
</section>
<!-- END SECTION AGENTS -->