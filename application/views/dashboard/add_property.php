<body class="inner-pages">
<!-- START SECTION 404 -->
<span id="nazac_loader" class="nazac_loader-box"><img id="pp" class="" src="<?php print base_url('resource/loader/loading_spinner.gif');?>"></span>

<div class="container-fluid">

    <div class="row" style="background-color: #edeff1;">
        <div class="col-sm-10 col-sm-offset-1">

            <div style="width: 100%; background-color: white; padding-top: 50px;">
                <form method="post" autocomplete="off" action="<?php echo base_url('agents/mains/process_registration/'.$this->uri->segment(4)); ?>" style="width:94%; margin-left: 3%;">
                    <div class="row" style="">

                        <div class="col-sm-12 text-center">

                            <h2 style="font-size: 23px;" class="text-success text-center">Add a Property on <?php print $siteDetail['site_name'];?></h2>
                        </div>

                        <div class="col-sm-12" style="margin-top: 30px">
                            <h5 class="text-success" style="margin-bottom: 0px">Select A Location</h5>
                            <hr class="bg-warning" style="margin-top: 2px" size="10px">
                        </div>

                        <div class="col-sm-6 col-sm-offset-3 location_box" >
                            <div class="form-group field_error">
                                <select onchange="getPrpertyDetailsForLocation(this, '1')" name="nazac_property_location" class="form-control" id="nazac_property_location">
                                    <option value="" selected="selected">--Select Property Location*--</option>
                                    <?php foreach($property_location_details_array as $k => $value){ ?>
                                        <option value="<?php echo $value['nazac_location_id']; ?>"><?php echo $value['nazac_location_name']; ?></option>

                                    <?php } ?>
                                </select>
                                <i class="icon_mail_alt"></i>
                            </div>
                        </div>

                        <div class="col-sm-12" style="margin-top: 30px;">

                            <div class="row">
                                <div class="col-sm-12" style="margin-bottom: 30px;">
                                    <div class="row search_result">


                                    </div>
                                </div>
                            </div>

                            <div class="row property_details_area">


                            </div>

                        </div>

                        <div class="col-sm-6 col-sm-offset-3" style="margin-bottom: 30px; margin-top: 30px;">

                        </div>


                    </div>

                </form>

            </div>

        </div>
    </div>

</div>