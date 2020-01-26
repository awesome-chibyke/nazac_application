<input type="hidden" id="url_holder" value="<?php if(isset($my_url)){ echo $my_url; } ?>">
<input type="hidden" id="base_url" value="<?php echo base_url() ?>">

<input type="hidden" id="login_id_holder" value="<?php if($this->uri->segment(4)){ echo $this->uri->segment(4); } ?>">

<!--date links-->
<link rel="stylesheet" href="<?php print base_url('admin_assets/datetimepicker-master/build/jquery.datetimepicker.min.css');?>">
<script src="<?php print base_url('admin_assets/datetimepicker-master/js/jquery.datetimepicker.full.js');?>"></script>

<script type="text/javascript">

    //datetimepicker1
    $('#datetimepicker1').datetimepicker({
        format:'Y-m-d G:i:s',
        step:05,
        theme:'dark'
    });

    $('#datetimepicker10').datetimepicker({
        format:'Y-m-d',
        step:05,
        theme:'dark',
        timepicker:false
    });
    $('#datetimepicker11').datetimepicker({
        format:'Y-m-d',
        step:05,
        theme:'dark',
        timepicker:false
    });
/*
    $('#datetimepicker3').datetimepicker({
        format:'Y-m-d G:i:s',
        step:05,
        theme:'dark'
    });
    $('#datetimepicker4').datetimepicker({
        format:'Y-m-d G:i:s',
        step:05,
        theme:'dark'
    });
    $('#datetimepicker5').datetimepicker({
        format:'Y-m-d G:i:s',
        step:05,
        theme:'dark'
    });*/


    //var $btn = $('#bt1');
    /*$('#open').click(function(){
        $('#datetimepicker2').datetimepicker('show');
    });

    $('#datetimepicker2').datetimepicker({
        format:'Y-m-d',
        step:05
        //widgetParent: $btn,
        //yearOffset:0,
        //lang:'ch',
        //timepicker:false,
        //format:'Y-m-d',
        //formatDate:'Y/m/d',
        //minDate:'-1970/01/02', // yesterday is minimum date
        //maxDate:'+9070/01/02' // and tommorow is maximum date calendar
    });
    $('#datetimepicker6').datetimepicker({
        //widgetParent: $btn,
        //yearOffset:0,
        //lang:'ch',
        timepicker:false,
        format:'Y-m-d',
        //formatDate:'Y/m/d',
        //minDate:'-1970/01/02', // yesterday is minimum date
        //maxDate:'+9070/01/02' // and tommorow is maximum date calendar
    });
    $('#datetimepicker5').datetimepicker({
        //widgetParent: $btn,
        //yearOffset:0,
        //lang:'ch',
        timepicker:false,
        format:'Y-m-d',
        //formatDate:'Y/m/d',
        //minDate:'-1970/01/01', // yesterday is minimum date
        //maxDate:'+9070/01/02' // and tommorow is maximum date calendar
    });

    $('#datetimepicker3').datetimepicker({
        datepicker:false,
        format:'H:i:s',
        step:5
    });
    $('#datetimepicker4').datetimepicker({
        //yearOffset:0,
        //lang:'ch',
        timepicker:false,
        format:'Y-m-d',
        //formatDate:'Y/m/d',
        //minDate:'-1970/01/02', // yesterday is minimum date
        //maxDate:'+9070/01/02' // and tommorow is maximum date calendar
    });*/
    $('#datetimepicker_dark').datetimepicker({theme:'dark'})
</script>

<!--the footer -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRx-5dI53OVWhy_yb9n8N0Txlz4JWva6k&callback=my_map_add"></script>
<!-- the footer-->

<!--modals-->

<!-- Primary modal -->
<div id="notification_modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title notification_modal_title">Primary header</h6>
            </div>

            <div class="modal-body">

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary notification_modal_button">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- /primary modal -->

<!--modal -->

<script type="text/javascript">

    var admin_login_id = $("#login_id_holder").val();

    $(".modal-dialog").removeClass('modal-lg');
    $(".notification_modal_button").removeClass('hidden')

    //change the url
    setTimeout(function(){

        changeUrl();

    }, 1000)

    function changeUrl(){

        //var newurl = window.location.protocol + '//' + window.location.host + window.location.pathname + 'url';
        var newurl = $("#url_holder").val().trim(); //alert(newurl);
        window.history.pushState({path:newurl},'',newurl);

    }

</script>

<script type="text/javascript">

    var base_url = $("#base_url").val().trim();

    //set count down timer for setimeout function
    var setTimeOutTime = 4000;

    $(document).ready(function () {

        $(".has-ul").click(function () {
            alert('djfhjdg');
            if($(this).hasClass("now_open")){
                $(this).removeClass('now_open')
                $(this).next(".hidden-ul").css({"display":"none"})
            }else{
                $(this).addClass('now_open')
                $(this).next(".hidden-ul").css({"display":"block"});


                var a = $(this).next(".hidden-ul")
                $(".hidden-ul").not(a).css({"display":"none"});

                var b = $(this)
                $(".has-ul").not(b).removeClass("now_open")
            }


        })
    });

    let loader = $('<img>').addClass('img-responsive').attr({'src':base_url+'admin_assets/loader-3.gif'})

    function filterRequestSelect(a){

        var selectedFilter = $(a).val().trim();

        window.location.href = base_url+"admin_control/requests/"+selectedFilter

    }

    function filterUserSelect(a){

        var selectedFilter = $(a).val().trim();

        window.location.href = base_url+"admin_control/all_user/"+selectedFilter

        /*$.get(base_url+'admin_control/all_user/'+selectedFilter, function(data, status){

        });*/

    }

    function filterPropertySelect(a){

        var selectedFilter = $(a).val().trim();

        window.location.href = base_url+"admin_control/all_properties/"+selectedFilter


    }

    function requestsAction(action_type,unique_id){

        callSmallModal();

        if(action_type === "" || unique_id === ""){

            returnFunctions.showSuccessToaster("Please refresh the page and try again!", "warning");
            return;

        }

        //notification_modal notification_modal_title modal-body
        if(action_type.trim() === "mark_as_done"){

            //enter the title
            $(".notification_modal_title").text("Request Confirmation");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to confirm this request? <br> Please click the Confirm button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Activate').attr({"onclick":"concludeRequestAction('"+action_type+"','"+unique_id+"')"})



        }else if(action_type.trim() === "mark_as_processing"){

            //enter the title
            $(".notification_modal_title").text("Request Confirmation");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to Un-Confirm this Request?<br> Please click the Un-Confirm button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('De Activate').attr({"onclick":"concludeRequestAction('"+action_type+"','"+unique_id+"')"})

        }

        //call the modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }

    function accountAction(action_type,unique_id){

        callSmallModal();

        if(action_type === "" || unique_id === ""){

            returnFunctions.showSuccessToaster("Please refresh the page and try again!", "warning");
            return;

        }

        //notification_modal notification_modal_title modal-body
        if(action_type.trim() === "activate_account"){

            //enter the title
            $(".notification_modal_title").text("Account Activation Notification");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to Activate this user`s account?<br> Please click the activate button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Activate').attr({"onclick":"concludeAccountAction('"+action_type+"','"+unique_id+"')"})



        }else if(action_type.trim() === "deactivate_account"){

            //enter the title
            $(".notification_modal_title").text("Account De-Activation Notification");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to De-Activate this user`s account?<br> Please click the activate button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('De Activate').attr({"onclick":"concludeAccountAction('"+action_type+"','"+unique_id+"')"})

        }else if(action_type.trim() === "block_account" || action_type.trim() === 'permanent_account_block'){

            var obj = {
                "table_name":["user_tb"],
                "columns":["unique_id"],
                "signs":["="],
                "clause":[unique_id],
                "return_keys":["singel_user_detail"]
            };

            $.get(base_url+'admin_control/mains/getJsonNewObj/'+admin_login_id,obj,function (data,status) {

                var theReturned = JSON.parse(data);

                if(theReturned.success.singel_user_detail.length > 0){

                    if(theReturned.success.singel_user_detail[0].account_block_counter == 0){
                        var display_message = "<div class='col-md-8 col-md-offset-2 alert alert-warning'>User account has not been blocked in the past.</div>";
                    }

                    if(theReturned.success.singel_user_detail[0].account_block_counter == 1){
                        var display_message = "<div class='col-md-8 col-md-offset-2 alert alert-warning'>User account has been blocked once in the past.</div>";
                    }

                    if(theReturned.success.singel_user_detail[0].account_block_counter == 2){
                        var display_message = "<div class='col-md-8 col-md-offset-2 alert alert-warning'>User account has been blocked twice in the past.</div>";
                    }

                    if(theReturned.success.singel_user_detail[0].account_block_counter == 3){
                        var display_message = "<div class='col-md-8 col-md-offset-2 alert alert-warning'>User account has been blocked 3, User will be permanently blocked if you continue</div>";
                    }

                }else{
                    var display_message = "";
                }

                //get the acknowledgement message for block account
                if(action_type.trim() === "block_account"){
                    var inquiry = "Do you really want to Block this user`s account?";
                }

                //get the acknowledgement message for permanent account block
                if(action_type.trim() === "permanent_account_block"){
                    var inquiry = "Do you really want to Block this user`s account permanently?";
                }

                //enter the title
                $(".notification_modal_title").text("Account Block Notification");

                //ask the question to seeek the knowledge of the user before completing the action
                $(".modal-body").html("<div class='row'> "+display_message+"<div class='col-md-8 col-md-offset-2' style=''><p class='text-center'>"+inquiry+"<br> Please click the Block Account button to proceed!</p></div><div class='col-md-8 col-md-offset-2' style='margin-top:20px;'><textarea class='form-control block_reason' placeholder='State Reason for Blocking this user' rows='3'></textarea></div></div>");

                //assign a new text to the modal button
                $(".notification_modal_button").removeAttr('onclick').text('Block Account').attr({"onclick":"concludeAccountAction('"+action_type+"','"+unique_id+"')"})


            })//



        }else if(action_type.trim() === "unblock_account"){

            //enter the title
            $(".notification_modal_title").text("Account Un-Block Notification");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'> <div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to Un-Block Account this user`s account?<br> Please click the Un-Block Account to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Un-Block Account').attr({"onclick":"concludeAccountAction('"+action_type+"','"+unique_id+"')"})

        }else if(action_type.trim() === "confirm_agents_account"){

            //enter the title
            $(".notification_modal_title").text("Agent`s Account Confirmation Notification");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'> <div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to mark this agent`s Account as confirmed?<br> Please click the Confirm button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Un-Block Account').attr({"onclick":"concludeAccountAction('"+action_type+"','"+unique_id+"')"})

        }else if(action_type.trim() === "un_confirm_agents_account"){

            //enter the title
            $(".notification_modal_title").text("Agent Account Un-confirmation Notification");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'> <div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to Un-Confirm Account this user`s account?<br> Please click the activate button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Un-Confirm Account').attr({"onclick":"concludeAccountAction('"+action_type+"','"+unique_id+"')"})

        }

        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }

    //process the request action
    function concludeRequestAction(action_type,unique_id){
console.log('sgfhgsfh')
        //build an object from the collected values
        var obj = {action_type:action_type,unique_id:unique_id};

        $.post(base_url+'admin_control/requestAction', obj, function (data, status) {

            var theReturn = JSON.parse(data);

            if(theReturn.error_code === 0){

                $("#notification_modal").modal("hide");
                returnFunctions.showSuccessToaster(theReturn.success.message, 'success');
                setTimeout(function () {

                    location.reload();

                }, setTimeOutTime)

            }else if(theReturn.error_code === 1){

                returnFunctions.showSuccessToaster(theReturn.error, 'warning')

            }

        })

    }

    //completion of the account actions
    function concludeAccountAction(action_type,unique_id){

        if(action_type.trim() === "block_account" || action_type.trim() === "permanent_account_block"){
            //get the reson for blocking account when account account action is block_account
            var reason_for_block = $(".block_reason").val().trim()
            if(reason_for_block === ""){
                returnFunctions.showSuccessToaster("Reason for account block is required",'warning');
                return;
            }
        }else{
            var reason_for_block = "";
        }

        //build an object from the collected values
        var obj = {action_type:action_type,unique_id:unique_id,reason_for_block:reason_for_block};

        $.post(base_url+'admin_control/mains/accountAction/'+admin_login_id, obj, function (data, status) {

            var theReturn = JSON.parse(data);

            if(theReturn.error_code === 0){

                $("#notification_modal").modal("hide");
                returnFunctions.showSuccessToaster(theReturn.success.message, 'success')
                setTimeout(function () {

                    location.reload();

                }, setTimeOutTime)

            }else if(theReturn.error_code === 1){

                returnFunctions.showSuccessToaster(theReturn.error, 'warning')

            }

        })

    }

    function editUserDetails(unique_id) {

        callSmallModal();

        //enter the title
        $(".notification_modal_title").text("Account Update Notification");

        //ask the question to seeek the knowledge of the user before completing the action
        $(".modal-body").html("<div class='row'> <div class='col-md-8 col-md-offset-2'><p class='text-center'>You are about to update this user`s accounts?<br> Please click the Update button to proceed!</p></div></div>");

        //assign a new text to the modal button
        $(".notification_modal_button").removeAttr('onclick').text('Update Account').attr({"onclick":"concludeEditUserDetails('"+unique_id+"')"})

        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }

    function concludeEditUserDetails(unique_id) {

        if(unique_id === ""){
            location.reload()
            return;
        }

        //get the values of the user
        var ed_last_name = $(".ed_last_name").val().trim();
        var ed_first_name = $(".ed_first_name").val().trim();
        var ed_middle_name = $(".ed_middle_name").val().trim();
        var ed_gender = $(".ed_gender").val().trim();
        var ed_phone = $(".ed_phone").val().trim();
        var ed_address = $(".ed_address").val().trim();
        var ed_state = $(".ed_state").val().trim();
        var ed_fb_name = $(".ed_fb_name").val().trim();
        var ed_twitter_handle = $(".ed_twitter_handle").val().trim();
        var ed_instagram_handle = $(".ed_instagram_handle").val().trim();


        //check for empty values
        var user_arrays = [ed_last_name,ed_first_name,ed_phone,ed_address,ed_state];

        var fields = ["Last Name", "First Name","Phone Number","Address","State"];

        //loop through the values and check for empty values
        for(var i = 0; i < user_arrays.length; i++){

            if(user_arrays[i] === ""){

                returnFunctions.showSuccessToaster(fields[i]+' is required!',"warning");
                return;

            }

        }

        //check for select fields to know if the user selected a value
        var value_array = ['Male','Female'];

        if(returnFunctions.checkIfInArray(ed_gender,value_array) == -1){
            returnFunctions.showSuccessToaster('Please Select a gender','warning');
            return;
        }

        var obj = {ed_last_name:ed_last_name,ed_first_name:ed_first_name, ed_middle_name:ed_middle_name,ed_phone:ed_phone,ed_address:ed_address,ed_state:ed_state,ed_gender:ed_gender, ed_fb_name:ed_fb_name, ed_twitter_handle:ed_twitter_handle, ed_instagram_handle:ed_instagram_handle,unique_id:unique_id};

        $.post(base_url+'admin_control/mains/editUserDetails/'+admin_login_id,obj,function (data,status) {

            var theReturn = JSON.parse(data);

            if(theReturn.error_code == 0){

                returnFunctions.showSuccessToaster(theReturn.success.message, 'success');
                setTimeout(function () {

                    location.reload();

                }, setTimeOutTime)

            }else if(theReturn.error_code == 1){

                returnFunctions.showSuccessToaster(theReturn.error, 'warning');

            }

        })



    }

    function closeMyModal(class_name){

        $('.'+class_name).css({'display':'none'})

    }

    $(document).ready(function () {

        var thePage = window.location.href.split('/')

        if(thePage[5]=== 'property_details'){
            my_map_add()
        }

        $(".pointer_cursor").css('cursor', 'pointer');

    })

    function my_map_add() {

        var cordinates1 = document.getElementById('cord1').value;
        var cordinates2 = document.getElementById('cord2').value;
        var myMapCenter = new google.maps.LatLng(cordinates1, cordinates2);
        var myMapProp = {center:myMapCenter, zoom:12, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
        var map = new google.maps.Map(document.getElementById("my_map_add"),myMapProp);
        var marker = new google.maps.Marker({position:myMapCenter});
        marker.setMap(map);
    }

    function showImage(a){

        var image_url = $(a).find('img').attr('src');
        //notification_modal notification_modal_title modal-body modal-dialog

        $(".notification_modal_title").text("Image Display");
        $(".modal-body").html('<img src="'+image_url+'" style="width:100%">');
        $(".notification_modal_button").removeAttr('onclick').addClass('hidden');
        $(".modal-dialog").addClass('modal-lg');
        $("#notification_modal").modal('show');

    }

    //unpublish_property publish_property
    function propertyAction(action_type,unique_id){

        callSmallModal()

        if(action_type === "" || unique_id === ""){

            returnFunctions.showSuccessToaster("Please refresh the page and try again!", "warning");
            return;

        }

        //notification_modal notification_modal_title modal-body
        if(action_type.trim() === "publish_property"){

            //enter the title
            $(".notification_modal_title").text("Notification for Publish of Property");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to Publish this property?<br> Please click the Publish button to proceed!</p></div></div>");

            //assign a new text to the modal button
                $(".notification_modal_button").removeAttr('onclick').text('Publish').attr({"onclick":"concludePropertyAction('"+action_type+"','"+unique_id+"')"});

        }else if(action_type.trim() === "unpublish_property"){

            //enter the title
            $(".notification_modal_title").text("Notifcation of Un-Publish of property");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to Un-Publish this Property?<br> Please click the Un-Publish button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Un-Publish').attr({"onclick":"concludePropertyAction('"+action_type+"','"+unique_id+"')"})


        }else if(action_type.trim() === "make_property_un_available"){

            //enter the title
            $(".notification_modal_title").text("Make property Un-Available");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to make this property un-available?<br> Please click the Make Un-Available button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Make Un-Available').attr({"onclick":"concludePropertyAction('"+action_type+"','"+unique_id+"')"});

        }else if(action_type.trim() === "make_property_available"){

            //enter the title
            $(".notification_modal_title").text("Account Activation Notification");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to make this Property Available?<br> Please click the Make available button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Make Available').attr({"onclick":"concludePropertyAction('"+action_type+"','"+unique_id+"')"})

        }else if(action_type.trim() === "delete_property"){

            //enter the title
            $(".notification_modal_title").text("Deletion of Property");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to Delete this property?<br> Please click the Delete button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Delete Property').attr({"onclick":"concludePropertyAction('"+action_type+"','"+unique_id+"')"})

        }else if(action_type.trim() === "reverse_property_delete"){

            //enter the title
            $(".notification_modal_title").text("Re-instate Deleted Property");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to reverse the deleted property?<br> Please click the Reverse Delete button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Reverse Delete').attr({"onclick":"concludePropertyAction('"+action_type+"','"+unique_id+"')"})

        }

        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }

    function callSmallModal(){
        $(".modal-dialog").removeClass('modal-lg');
        $(".notification_modal_button").removeClass('hidden')
    }

    function concludePropertyAction(action_type,unique_id){

        callSmallModal();

        //build an object from the collected values
        var obj = {action_type:action_type,unique_id:unique_id};

        $.post(base_url+'admin_control/propertyAction', obj, function (data, status) {

            var theReturn = JSON.parse(data);

            if(theReturn.error_code === 0){

                $("#notification_modal").modal("hide");
                returnFunctions.showSuccessToaster(theReturn.success.message, 'success');
                setTimeout(function () {

                    location.reload();

                }, setTimeOutTime)

            }else if(theReturn.error_code === 1){

                returnFunctions.showSuccessToaster(theReturn.error, 'success')

            }
        })

    }

    //f/functioonn controls the preview of assessment
    function previewAssessment(a){

        if($("#assessment_body").val() == ""){
            showSuccessToast("Description is required!", "warning");
            return false;
        }


        $(".notification_modal_title").text("Property Description Preview");

        var description_val = $(".ed_property_description").val(); console.log(description_val)

        //ask the question to seeek the knowledge of the user before completing the action
        $(".modal-body").html("<div class='row'><div class='col-md-12'>"+description_val+"</div></div>");

        //create a large modal
        $(".modal-dialog").addClass('modal-lg');

        //assign a new text to the modal button
        $(".notification_modal_button").removeAttr('onclick').addClass('hidden');

        //call the notification modal
        $("#notification_modal").modal({backdrop:'static', keyboard: false});

    }

    function initializePropertyEdit(unique_id){

        callSmallModal();

        if(unique_id === ""){
            returnFunctions.showSuccessToaster('Please refresh page and try again!', 'success');
            return;
        }

        //change modal title
        $(".notification_modal_title").text("Property Update");

        //ask the question to seeek the knowledge of the user before completing the action
        $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2 text-center'>Do you really want to update this property?<br>Click the update property button to continue</div></div>");

        //assign a new text to the modal button
        $(".notification_modal_button").removeAttr('onclick').text('Update Property').attr({"onclick":"concludePropertyUpdate('"+unique_id+"')"});

        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }

    function concludePropertyUpdate(unique_id){

        callSmallModal();

        var features_array = new Array();

        var no_of_parking_space = $(".ed_no_of_parking_space").val().trim();
        var no_of_toilets = $(".ed_no_of_toilets").val().trim();
        var no_of_bathrooms = $(".ed_no_of_bathrooms").val().trim();
        var property_country = $(".ed_property_country").val().trim();
        var property_city = $(".ed_property_city").val().trim();
        var local_gov_area = $(".ed_local_gov_area").val().trim();
        var area_town = $(".ed_area_town").val().trim();
        var property_location_address = $(".ed_property_location_address").val().trim();
        var account_type = $(".ed_account_type").val().trim();
        var property_type = $(".ed_property_type").val().trim();
        var property_purpose = $(".ed_property_purpose").val().trim();
        var property_category = $(".ed_property_category").val().trim();
        var youtube_link = $(".ed_youtube_link").val().trim();
        var coordinate_1 = $(".ed_coordinate_1").val().trim();
        var coordinate_2 = $(".ed_coordinate_2").val().trim();
        var property_features = $(".ed_features");
        var property_type = $(".ed_property_type").val().trim();
        var property_description = $(".ed_property_description").val().trim();
        var property_price = $(".ed_property_price").val().trim();
        var property_older_price = $(".ed_property_older_price").val().trim();
        var payment_type = $(".ed_payment_type").val().trim();
        var no_of_rooms = $(".ed_no_of_rooms").val().trim();
        var furnishing = $(".ed_furnishing").val().trim();
        var property_area = $(".ed_property_area").val().trim();
        var payment_type = $(".ed_payment_type").val().trim();
        var total_land_area = $(".ed_total_land_area").val().trim();
        var property_unique_id = $(".property_unique_id").val().trim();
        var property_title = $(".ed_property_title").val().trim();
        var property_suscription = $(".ed_property_suscription").val().trim();

        //get the features array
        for(var i = 0; i < property_features.length; i++){

            if($(property_features[i]).val().trim() !== ""){
                features_array.push($(property_features[i]).val().trim());
            }

        }

        var obj = {no_of_parking_space:no_of_parking_space,no_of_toilets:no_of_toilets,no_of_bathrooms:no_of_bathrooms, property_country:property_country, property_city:property_city,local_gov_area:local_gov_area,area_town:area_town,property_location_address:property_location_address, account_type:account_type, property_type:property_type, property_purpose:property_purpose, property_category:property_category, youtube_link:youtube_link, coordinate_1:coordinate_1, coordinate_2:coordinate_2, property_features:features_array, property_type:property_type,property_description:property_description, property_price:property_price, property_older_price:property_older_price, payment_type:payment_type, no_of_rooms:no_of_rooms, furnishing:furnishing, property_area:property_area, payment_type:payment_type, total_land_area:total_land_area,property_unique_id:property_unique_id,property_title:property_title,property_suscription:property_suscription}
        
        $.post(base_url+'admin_control/editPropertyDetail', obj, function (data, status) {

            var theReturned = JSON.parse(data);
            if(theReturned.error_code === 0){

                $("#notification_modal").modal("hide");
                returnFunctions.showSuccessToaster(theReturned.success.message, 'success');
                setTimeout(function () {

                    location.reload();

                }, setTimeOutTime)

            }else if(theReturned.error_code === 1){

                returnFunctions.showSuccessToaster(theReturned.error, 'success')

            }

        })

    }

    function result_submiter(){

        //change modal title
        $(".notification_modal_title").text("Bet Result Submition");

        //ask the question to seeek the knowledge of the user before completing the action
        $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2 text-center'>Do you really want to submit these results, please make sure to select a result or more as only selected result will be updated?. <br>Click the update Continue button to proceed</div></div>");

        //assign a new text to the modal button
        $(".notification_modal_button").removeAttr('onclick').text('Continue').attr({"onclick":"concludeResultSubmition()"});

        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }

    function initializeRequestEdit(unique_id){

        callSmallModal();

        if(unique_id === ""){
            returnFunctions.showSuccessToaster('Please refresh page and try again!', 'success');
            return;
        }

        //change modal title
        $(".notification_modal_title").text("Request Update");

        //ask the question to seeek the knowledge of the user before completing the action
        $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2 text-center'>Do you really want to update this Request?<br>Click the update Request button to continue</div></div>");

        //assign a new text to the modal button
        $(".notification_modal_button").removeAttr('onclick').text('Update Request').attr({"onclick":"concludeRequestUpdate('"+unique_id+"')"});

        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }

    //greetings, food, peeps, stay alone, message, cinema

    function concludeRequestUpdate(unique_id){

        var poster_name = $(".ed_poster_name").val();
        var request_phone_no = $(".request_phone_no").val();
        var request_email = $(".request_email").val();
        var request_type = $(".ed_request_type").val();
        var request_category = $(".ed_request_category").val();
        var account_type = $(".ed_account_type").val();
        var preferred_town = $(".ed_preferred_town").val();
        var preferred_state = $(".ed_preferred_state").val();
        var how_urgent = $(".ed_how_urgent").val();
        var budget = $(".ed_budget").val();
        var request_comment = $(".ed_request_comment").val();
        var no_of_bedroom = $(".ed_no_of_bedroom").val();

        var obj = {request_phone_no:request_phone_no, request_email:request_email, request_category:request_category, request_type:request_type, account_type:account_type, preferred_state:preferred_state, how_urgent:how_urgent, budget:budget, request_comment:request_comment, no_of_bedroom:no_of_bedroom,unique_id:unique_id, preferred_town:preferred_town, poster_name:poster_name};

        $.post(base_url+'admin_control/RequestUpdate', obj, function(data, status){

            var theReturned = JSON.parse(data);

            if(theReturned.error_code === 0){

                $("#notification_modal").modal("hide");
                returnFunctions.showSuccessToaster(theReturned.success.message, 'success');
                setTimeout(function () {

                    location.reload();

                }, setTimeOutTime)

            }else if(theReturned.error_code === 1){

                returnFunctions.showSuccessToaster(theReturned.error, 'success')

            }

        })

    }

    function submitCoreFeatures(feature_type, field_1_properties = null,field_2_properties = null, field_3_properties = null){

        //remove the main error holder
        $('.main_error_holder').remove();

        //select the element
        let theFeatures = $(".property_type_holders");

        //initialize the error checker
        let error_checker = 0;

        //loop through the element and check for empty values
        for(let i = 0; i < theFeatures.length; i++){

            //validation for just the currency rate
            if(feature_type === 'Currency Rate' || feature_type === 'Payment Gateway' || feature_type === 'Bank Details'){

                //check for a value that is empty and mark the border red
                if($(theFeatures[i]).find('.'+field_1_properties.classname).val() === ""){

                    //set the border to red
                    $(theFeatures[i]).find('.'+field_1_properties.classname).css({'border-color':'red'});

                    //set the value of the error checker to 1
                    error_checker = 1;

                }

                if($(theFeatures[i]).find('.'+field_2_properties.classname).val() === ""){

                    //set the border to red
                    $(theFeatures[i]).find('.'+field_2_properties.classname).css({'border-color':'red'});

                    //set the value of the error checker to 1
                    error_checker = 1;

                }

                if(field_3_properties !== null){
                    if($(theFeatures[i]).find('.'+field_3_properties.classname).val() === ""){

                        //set the border to red
                        $(theFeatures[i]).find('.'+field_3_properties.classname).css({'border-color':'red'});

                        //set the value of the error checker to 1
                        error_checker = 1;

                    }
                }

            }

            //validate for other stuffs other than currency rate
            if(feature_type !== 'Currency Rate' && feature_type !== 'Payment Gateway' && feature_type !== 'Bank Details'){
                //check for a value that is empty and mark the border red
                if($(theFeatures[i]).find('input').val() === ""){

                    //set the border to red
                    $(theFeatures[i]).find('input').css({'border-color':'red'});

                    //set the value of the error checker to 1
                    error_checker = 1;

                }
            }


        }

        //check if the error checker evaluated to 1
        if(error_checker == 1){
            returnFunctions.showSuccessToaster('fields with red border(s) are required!', 'warning');
            return;
        }

        //declare an array that will collect the vaues
        let features_array = new Array(), currency_array = new Array(), currency_rate_array = new Array(), gateway_title_array = new Array(), gateway_keyword_array = new Array(), account_name_array = new Array(), account_number_array = new Array(), bank_name_array = new Array();

        //if non of the fields is empty, create an array of the values entered
        for(let i = 0; i < theFeatures.length; i++){

            //this catches the currency rate details and push them into an array
            if(feature_type === 'Currency Rate') {
                //collect the values for the currency in an array
                currency_array.push($(theFeatures[i]).find('.'+field_1_properties.classname).val());

                //collect the value for the currency rate in an array
                currency_rate_array.push($(theFeatures[i]).find('.'+field_2_properties.classname).val());
            }

            //this catches the gateway details and push them into an array
            if(feature_type === 'Payment Gateway') {
                //collect the values for the currency in an array
                gateway_title_array.push($(theFeatures[i]).find('.'+field_1_properties.classname).val());

                //collect the value for the currency rate in an array
                gateway_keyword_array.push($(theFeatures[i]).find('.'+field_2_properties.classname).val());
            }

            if(field_3_properties !== null){
                if(feature_type === 'Bank Details') {
                    //collect the values for the currency in an array
                    account_name_array.push($(theFeatures[i]).find('.'+field_1_properties.classname).val());

                    //collect the value for the currency rate in an array
                    account_number_array.push($(theFeatures[i]).find('.'+field_2_properties.classname).val());

                    bank_name_array.push($(theFeatures[i]).find('.'+field_3_properties.classname).val());
                }
            }

            if(feature_type !== 'Currency Rate' && feature_type !== 'Payment Gateway' && feature_type !== 'Bank Details') {
                //collect the values in array
                features_array.push($(theFeatures[i]).find('input').val());
            }


        }

        $.post(base_url+'admin_control/submitCoreFeatures', {feature_type:feature_type, feature_values:features_array,currency_array:currency_array, currency_rate_array:currency_rate_array, gateway_title_array:gateway_title_array, gateway_keyword_array:gateway_keyword_array,account_name_array:account_name_array,account_number_array:account_number_array,bank_name_array:bank_name_array}, (data, status)=>{

            let theReturned = JSON.parse(data);
            if(theReturned.error_checker == 0){

                returnFunctions.showSuccessToaster(theReturned.success.message, 'success');

                if(theReturned.error.length > 0){

                    //create the row that will hold this particular element
                    var error_row = $('<div>').addClass('row main_error_holder').css({'margin-top':'20px'});
                    var errorCol_main = $('<div>').addClass('col-md-12 alert alert-warning');
                    var errorCol = '';

                    //loop through the return error and display the error
                    for(let i  = 0; i < theReturned.error.length; i++){

                        errorCol += '<div>'+theReturned.error[i]+'</div>';

                    }

                    //append the error elements created to the row
                    errorCol_main.append(errorCol)
                    error_row.append(errorCol_main);

                    //append the value the user interface
                    $(error_row).insertBefore("#main_property_type_holders");


                }

                if(theReturned.error.length == 0){
                    setTimeout(function () {
                        location.reload();
                    },setTimeOutTime)
                }

            }else if(theReturned.error_checker == 1){

                returnFunctions.showSuccessToaster(theReturned.error, 'warning');

            }else if(theReturned.error_checker == 2){

                for(let i = 0; i < theFeatures.length; i++){

                    //check for a value that is empty and mark the border red
                    if(i == theReturned.error[i]){

                        //set the border to red
                        $(theFeatures[i]).find('input').css({'border-color':'red'});

                    }

                }

                //show an error message empty values
                returnFunctions.showSuccessToaster('fields marked with red borders are required!', 'warning')

            }else if(theReturned.error_checker == 3){

                for(let i = 0; i < theFeatures.length; i++){

                    //check for a value that is empty and mark the border red
                    if(i === theReturned.error[theReturned.error.key_names[0]+i]){

                        //set the border to red
                        $(theFeatures[i]).find('.'+field_1_properties.classname).css({'border-color':'red'});

                    }
                    if(i == theReturned.error[theReturned.error.key_names[1]+i]){

                        //set the border to red
                        $(theFeatures[i]).find('.'+field_2_properties.classname).css({'border-color':'red'});

                    }


                }

                //show an error message empty values
                returnFunctions.showSuccessToaster('fields marked with red borders are required!', 'warning')

            }else if(theReturned.error_checker == 4){

                if(theReturned.error.length > 0){

                    //create the row that will hold this particular element
                    var error_row = $('<div>').addClass('row main_error_holder').css({'margin-top':'20px'});
                    var errorCol_main = $('<div>').addClass('col-md-12 alert alert-warning');
                    var errorCol = '';

                    //loop through the return error and display the error
                    for(let i  = 0; i < theReturned.error.length; i++){

                        errorCol += '<div>'+theReturned.error[i]+'</div>';

                    }

                    //append the error elements created to the row
                    errorCol_main.append(errorCol)
                    error_row.append(errorCol_main);

                    //append the value the user interface
                    $(error_row).insertBefore("#main_property_type_holders");


                }

            }

        })
    }

    //function for creating new elements on the dom
    function createNewFeatureField(a, feature_type, field_1_properties = null, field_2_properties = null, field_3_properties = null){

        if($(".property_type_holders").length > 4){
            returnFunctions.showSuccessToaster("You can only create five property "+feature_type+" at a time!","warning");
            return;
        }

        //check if the field is for currency rate
        if(feature_type === 'Currency Rate' || feature_type === 'Payment Gateway' || feature_type === 'Bank Details'){

            //initialize the the  div that will hold this element
            var feature_holder = $('<div>').addClass('form-group property_type_holders').css({'margin-top':'20px'});

            //create the row that will hold this particular element
            var feature_row = $('<div>').addClass('row');

            //check if the field_3_properties is not equal to null col-md-4
            if(field_3_properties !== null){
                var col = 'col-md-3'
            }else{
                var col = 'col-md-4'
            }

            var theCol = $('<div>').addClass(col);

            var theCol2 = $('<div>').addClass(col);

            //check if the field_3_properties is not equal to null
            if(field_3_properties !== null){
                var theCol3 = $('<div>').addClass(col);
            }

            //create the second column to hold the delete column
            var theCol_delete = $('<div>').addClass('col-sm-2 col-sm-2 col-md-2');

            var delete_button = $('<button>').addClass('btn btn-primary raised icon waves-effect').attr({'onclick':'removeThisRow(this)','type':'button'}).append($('<i>').addClass('zmdi zmdi-minus'))

            //attach the delete button to the delete column
            theCol_delete.append(delete_button);

            //append the column to the row
            feature_row.append(theCol);
            feature_row.append(theCol2);
            //check if the field_3_properties is not equal to null
            if(field_3_properties !== null){
                feature_row.append(theCol3);
            }
            feature_row.append(theCol_delete);

            //create the label and the input field
            //var feature_label = $('<label>').text('New Property Type');
            var feature_input = $('<input>').addClass('form-control property_type_values '+field_1_properties.classname).attr({'type':'text','placeholder':'New Property Type'});
            var feature_input2 = $('<input>').addClass('form-control property_type_values '+field_1_properties.classname).attr({'type':'text','placeholder':'New Property Type'});

            //check if the field_3_properties is not equal to null
            if(field_3_properties !== null){
                var feature_input3 = $('<input>').addClass('form-control property_type_values '+field_3_properties.classname).attr({'type':'text','placeholder':'New Property Type'});
            }
            //assign text value to the label
            //feature_label.text(feature_type.toUpperCase());

            //add a generic placeholder
            feature_input.attr({'placeholder':field_1_properties.placeholder,'onblur':'removeSelectBorder(this)'})
            feature_input2.attr({'placeholder':field_2_properties.placeholder,'onblur':'removeSelectBorder(this)'});
            //check if the field_3_properties is not equal to null
            if(field_3_properties !== null){
                feature_input3.attr({'placeholder':field_3_properties.placeholder,'onblur':'removeSelectBorder(this)'});
            }

            //append the input and the label into the column field
            //theCol.append(feature_label);
            theCol.append(feature_input);
            theCol2.append(feature_input2);

            //check if the field_3_properties is not equal to null
            if(field_3_properties !== null){
                theCol3.append(feature_input3);
            }

            //apend the row to the feature holder element
            feature_holder.append(feature_row);

            //insert the created element into the do,m
            $(feature_holder).insertBefore(".new_row");
            return;

        }

        //initialize the the  div that will hold this element
        var feature_holder = $('<div>').addClass('form-group property_type_holders').css({'margin-top':'20px'});

        //create the row that will hold this particular element
        var feature_row = $('<div>').addClass('row');

        var theCol = $('<div>').addClass('col-md-8');

        //create the second column to hold the delete column
        var theCol_delete = $('<div>').addClass('col-sm-2 col-sm-2 col-md-2');

        var delete_button = $('<button>').addClass('btn btn-primary raised icon waves-effect').attr({'onclick':'removeThisRow(this)','type':'button'}).append($('<i>').addClass('zmdi zmdi-minus'))

        //attach the delete button to the delete column
        theCol_delete.append(delete_button);

        //append the column to the row
        feature_row.append(theCol);
        feature_row.append(theCol_delete);

        //create the label and the input field
        //var feature_label = $('<label>').text('New Property Type');
        var feature_input = $('<input>').addClass('form-control property_type_values').attr({'type':'text','placeholder':'New Property Type'});

        //assign text value to the label
        //feature_label.text(feature_type.toUpperCase());

        //add a generic placeholder
        feature_input.attr({'placeholder':returnFunctions.capitalizeFirstLetter(feature_type),'onblur':'removeSelectBorder(this)'})

        //append the input and the label into the column field
        //theCol.append(feature_label);
        theCol.append(feature_input);

        //apend the row to the feature holder element
        feature_holder.append(feature_row);

        //insert the created element into the do,m
        $(feature_holder).insertBefore(".new_row");


    }

    function createNewCompLeagueField(){

        if($(".one_club_country").length > 4){
            returnFunctions.showSuccessToaster("You can only create five Competition/League Name at a time.","warning");
            return;
        }

        let new_field = '<div class="row one_club_country"><div class="col-md-12 head_holder"><h3>Competition/League Name 1</h3></div><div class="col-md-10"><label>Competition/League Name</label><input type="text" onblur="removeSelectBorder(this)" class="form-control competion_league_name" name="competion_league_name[]"></div> <div class="col-md-2" style="margin-top: 20px;"><button class="btn btn-primary raised icon waves-effect" onclick="removeThisClubCountryRow(this)" type="button"><i class="zmdi zmdi-minus"></i></button></div> </div>';

        $(new_field).insertBefore(".new_row");

        //loop through the fields and re-add the headers
        var selected_head = $(".head_holder");
        for(var i = 0; i < selected_head.length; i++){
            var no = parseFloat(i) + parseFloat(1)
            $(selected_head[i]).find('h3').text('Competition/League Name '+no);

        }

    }

    //create new bet type field
    function createNewBetTypeField(a){

        if($(".one_club_country").length > 4){
            returnFunctions.showSuccessToaster("You can only create five Bet Type at a time.","warning");
            return;
        }

        let new_field = '<div class="row one_club_country"><div class="col-md-12 head_holder"><h3>Bet Type 1</h3></div><div class="col-md-10"><label>Bet Types</label><input type="text" onblur="removeSelectBorder(this)" class="form-control bet_types" name="bet_types[]"></div> <div class="col-md-2" style="margin-top: 20px;"><button class="btn btn-primary raised icon waves-effect" onclick="removeThisClubCountryRow(this)" type="button"><i class="zmdi zmdi-minus"></i></button></div> </div>';

        $(new_field).insertBefore(".new_row");

        //loop through the fields and re-add the headers
        var selected_head = $(".head_holder");
        for(var i = 0; i < selected_head.length; i++){
            var no = parseFloat(i) + parseFloat(1)
            $(selected_head[i]).find('h3').text('Bet Type '+no);

        }

    }

    //kick_off_time bet_tip_desc bet_point bet_tip_pred bet_odd away_team home_team

    function createNewClubCountryField(a) {

        if($(".one_club_country").length > 4){
            returnFunctions.showSuccessToaster("You can only create five Club/Country at a time.","warning");
            return;
        }

        let new_field = '<div class="row one_club_country" style="margin-top: 30px"><div class="col-md-12 head_holder"><h3>Club/Country 3</h3></div><div class="col-md-4"><label>Club/Country Name</label><input type="text" onblur="removeSelectBorder(this)"  class="form-control country_club_name" name="country_club_name[]"></div><div class="col-md-4"><label>Club/Country Abbreviation</label><input type="text" onblur="removeSelectBorder(this)" class="form-control country_club_abbreviation" name="country_club_abbreviation[]"></div><div class="col-md-4"><label>Club/Country Alias</label><input type="text" onblur="removeSelectBorder(this)" class="form-control country_club_alias" name="country_club_alias[]"></div><div class="col-md-4" style="margin-top: 20px;"><label>Name of Stadium</label><input type="text" onblur="removeSelectBorder(this)" class="form-control country_club_stadium" name="country_club_desc[]"></div><div class="col-md-4" style="margin-top: 20px;"><label>Club/Country Description</label><input type="text" onblur="removeSelectBorder(this)" class="form-control country_club_desc" name="country_club_desc[]"></div><div class="col-md-4" style="margin-top: 20px;"><label>League Name/Continent Football Association</label><input type="text" name="cc_association[]" onblur="removeSelectBorder(this)" class="form-control cc_association"></div> <div class="col-md-4" style="margin-top: 20px;"><label>Upload Club Logo</label><input type="file" name="cc_logo_image" onblur="removeSelectBorder(this)" class="form-control cc_logo_image"></div>  <div class="col-md-4" ><button style="margin-top: 30px;" class="btn btn-primary raised icon waves-effect" onclick="removeThisClubCountryRow(this)" type="button"><i class="zmdi zmdi-minus"></i></button></div>  </div>';

        $(new_field).insertBefore(".new_row");

        //loop through the fields and re-add the headers
        var cc_logo_image = $(".cc_logo_image")
        var selected_head = $(".head_holder");
        for(var i = 0; i < selected_head.length; i++){
            var no = parseFloat(i) + parseFloat(1)
            $(selected_head[i]).find('h3').text('Club/Country '+no);

            if(i > 0){
                $(cc_logo_image[i]).attr({'id':'cc_logo_image_'+i})
            }

        }

    }

    function validator(value_array, fields_array, class_names){

        var error_checker = 0;
        for(let l = 0; l < value_array.length; l++){

            //check for empty values
            if($(value_array[l]).val() === ""){
                //console.log(value_array[l])
                $(value_array[l]).css({'border-color':'red'});
                error_checker = 1;
            }

        }

        return error_checker;


    }

    //conclude the result submittion
    function concludeResultSubmition(){

        var add_bet_result = $(".add_bet_result");
        var  match_score = $(".match_score");
        var error_code = 0;

        //initialize an error checker variable and bet_result_array
        let bet_result_array = new Array();
        let bet_result_unique_id_array = new Array();
        let match_score_array = new Array();

        for(let i = 0; i < add_bet_result.length; i++){

            if($(add_bet_result[i]).val().trim() !== ''){

                //get the unique id and the bet value
                bet_result_array.push($(add_bet_result[i]).val().trim());
                bet_result_unique_id_array.push($(add_bet_result[i]).attr('data-bet-unique-id'));

                //check if the value is empty
                if($(match_score[i]).val().trim() !== ""){

                    //for the match scores
                    match_score_array.push($(match_score[i]).val().trim());

                    var splited_result = $(match_score[i]).val().trim().split(':');

                    if(splited_result.length != 2){
                        $(match_score[i]).css({'border-color':'red'});
                        error_code = 1;
                    }

                    if(isNaN(splited_result[0]) || isNaN(splited_result[1])){
                        $(match_score[i]).css({'border-color':'red'});
                        error_code = 2;
                    }

                }


            }

        }

        if(error_code == 1){
            returnFunctions.showSuccessToaster('Please show prvide the score in this format => 0:0 ', 'warning');
            return;
        }

        if(error_code == 2){
            returnFunctions.showSuccessToaster('Scores must be numbers and in this format => 0:0 ', 'warning');
            return;
        }

        //check if there is a lenght in the arrays created
        if(bet_result_array.length == 0){
            returnFunctions.showSuccessToaster('Please Select atteast one result to proceed', 'warning');
            return;
        }

        if(match_score_array.length == 0){
            returnFunctions.showSuccessToaster('Please provide the match Score to proceed, score must be in format => 0:0 ', 'warning');
            return;
        }


        //build an object from the values collected
        let result_update_details = {bet_result_array:bet_result_array,bet_result_unique_id_array:bet_result_unique_id_array, match_score_array:match_score_array};

        $.post(base_url+'admin_control/mains/update_bet_tip_results/'+admin_login_id, result_update_details, (data, status)=>{

            let theReturned = JSON.parse(data);

            if(theReturned.error_code == 0){

                returnFunctions.showSuccessToaster(theReturned.success.message, 'success');
                setTimeout(function () {
                    window.location.href = base_url+'admin_control/mains/clubs_country/'+admin_login_id+'/bet_predictions_details/'+'<?php echo $this->uri->segment(6); ?>'
                }, setTimeOutTime);

            }else if(theReturned.error_code == 1){

                returnFunctions.showSuccessToaster(theReturned.error, 'warning');

            }else if(theReturned.error_code == 2){

                $(".error_handler").html(theReturned.error).addClass('alert alert-warning');

            }

        })

    }

    function submitBetTips() {

        let kick_off_time = $(".kick_off_time");
        let away_team = $(".away_team");
        let home_team = $(".home_team");
        let bet_odd = $(".bet_odd");
        let bet_tip_pred = $(".bet_tip_pred");
        let bet_point = $(".bet_point");
        let bet_tip_desc = $(".bet_tip_desc");
        let league_name = $(".league_name");
        //

        let value_array = [kick_off_time, home_team, away_team, bet_odd, bet_tip_pred, bet_point, bet_tip_desc, league_name];

        let fields_array = ['Kick of Time', 'Home Team', 'Away Team', 'Bet Odd', 'Bet Prediction/Tips', 'Competition/League Name'];

        let class_names = ['kick_off_time', 'home_team', 'away_team', 'bet_odd', 'bet_tip_pred', 'bet_point', 'bet_tip_desc', 'league_name'];

        //create an array that will hold the different values
        let kick_off_time_details_array = new Array();
        let home_team_details_array = new Array();
        let away_team_details_array = new Array();
        let bet_odd_details_array = new Array();
        let bet_tip_pred_details_array = new Array();
        let bet_point_details_array = new Array();
        let bet_tip_desc_details_array = new Array();
        let league_name_details_array = new Array();
        let bet_company_code_array = new Array();
        let bet_company_id_array = new Array();

        //loop through values and check if there is one with an empty value
        for(let i = 0; i < kick_off_time.length; i++){
console.log(value_array)
            var error_checker = validator(value_array, fields_array, class_names);

            //collect the values and add to an array
            kick_off_time_details_array.push($(kick_off_time[i]).val());
            home_team_details_array.push($(home_team[i]).val());
            away_team_details_array.push($(away_team[i]).val());
            bet_odd_details_array.push($(bet_odd[i]).val());
            bet_tip_pred_details_array.push($(bet_tip_pred[i]).val());
            bet_point_details_array.push($(bet_point[i]).val());
            bet_tip_desc_details_array.push($(bet_tip_desc[i]).val());
            league_name_details_array.push($(league_name[i]).val());

            let bet_company_code = $(".bet_company_code"+i);
            let bet_company_id = $(".bet_company_id"+i);

            //loop through the code and extract
            let bet_company_code_mini_array = new Array();
            let bet_company_id_mini_array = new Array();
            let bet_company_code_length = bet_company_code.length;
            for(let l = 0; l < bet_company_code.length; l++){

                if($(bet_company_code[l]).val().trim() !== ''){
                    bet_company_code_mini_array.push($(bet_company_code[l]).val().trim());
                    bet_company_id_mini_array.push($(bet_company_id[l]).attr('bet_company_id_holder'));
                }

                if(parseFloat(l) == parseFloat(bet_company_code_length) - parseFloat(1)){
                    if(bet_company_code_mini_array.length == 0){
                        bet_company_code_mini_array.push('');
                        bet_company_id_mini_array.push('');
                    }
                }

            }

            bet_company_code_array.push(bet_company_code_mini_array);
            bet_company_id_array.push(bet_company_id_mini_array);

        }

        if(error_checker == 1){
            returnFunctions.showSuccessToaster('Fields with red borders are required','warning');
            return;
        }

        //create the value that will be sent to the backend
        let bet_prediction_details = {
            kick_off_time_details:kick_off_time_details_array,
            home_team_details:home_team_details_array,
            away_team_details:away_team_details_array,
            bet_odd_details:bet_odd_details_array,
            bet_tip_pred_details:bet_tip_pred_details_array,
            bet_point_details:bet_point_details_array,
            bet_tip_desc_details:bet_tip_desc_details_array,
            league_name_details:league_name_details_array,
            bet_company_code_array:bet_company_code_array,
            bet_company_id_array:bet_company_id_array
        }

        $.post(base_url+'admin_control/mains/add_new_bet_tips/'+admin_login_id, bet_prediction_details, (data, status)=>{

            let theReturned = JSON.parse(data);
            if(theReturned.error_code == 0){

                returnFunctions.showSuccessToaster(theReturned.success.message, 'success');
                setTimeout(function () {
                    window.location.href = base_url+'admin_control/mains/clubs_country/'+admin_login_id+'/add_new_bet_tips'
                }, setTimeOutTime);

            }else if(theReturned.error_code == 1){

                returnFunctions.showSuccessToaster(theReturned.error, 'warning');

            }else if(theReturned.error_code == 2){

                //$(".error_handler").html(theReturned.error).addClass('alert alert-warning');
                var txt = '';
                for(var i in theReturned.error){
                    txt += '<p>'+theReturned.error[i]+'</p>'
                }
                returnFunctions.showSuccessToaster(txt, 'warning');


            }

        })

    }

    function submitCountryClub() {

        let country_club_stadium = $(".country_club_stadium");
        let country_club_desc = $(".country_club_desc");
        let cc_association = $(".cc_association");
        let country_club_abbreviation = $(".country_club_abbreviation");
        let country_club_alias = $(".country_club_alias");
        let country_club_name = $(".country_club_name");

        let value_array = [country_club_stadium, country_club_desc, cc_association, country_club_abbreviation, country_club_alias, country_club_name];

        let fields_array = ['Name of Stadium', 'Country/Club Description', 'League Name/Continent Association', 'Club/Country Association', 'Country/Club Alias', 'Country/Club Name'];
        let class_names = ['country_club_stadium', 'country_club_desc', 'ed_association', 'country_club_abbreviation', 'country_club_alias', 'country_club_name'];

        //create an array that will hold the different values
        let country_clu_stadium_details_array = new Array();
        let country_club_desc_array = new Array();
        let cc_association_array = new Array();
        let country_club_abbreviation_array = new Array();
        let country_club_alias_array = new Array();
        let country_club_name_array = new Array();
        let file_data_array = new Array();

        //inusatiate the form data
        var form_data = new FormData();

        //loop through values and check if there is one with an empty value
        for(let i = 0; i < country_club_stadium.length; i++){

            var error_checker = validator(value_array, fields_array, class_names);

            //check for empty file field
            if( document.getElementById('cc_logo_image_'+i).files.length == 0 ){
                document.getElementById('cc_logo_image_'+i).style.borderColor = 'red';
                error_checker = 1;
            }

            //add up the files
            var up_files = $('#cc_logo_image_'+i).prop('files')[0];
            form_data.append('cc_logo_image_'+i, up_files);

            //collect the values and add to an array
            country_clu_stadium_details_array.push($(country_club_stadium[i]).val());
            country_club_desc_array.push($(country_club_desc[i]).val());
            cc_association_array.push($(cc_association[i]).val());
            country_club_abbreviation_array.push($(country_club_abbreviation[i]).val());
            country_club_alias_array.push($(country_club_alias[i]).val());
            country_club_name_array.push($(country_club_name[i]).val());

        }
        
        if(error_checker == 1){
            returnFunctions.showSuccessToaster('Fields with red borders are required','warning');
            return;
        }


        form_data.append('country_club_stadium', country_clu_stadium_details_array);
        form_data.append('country_club_desc', country_club_desc_array);
        form_data.append('cc_association', cc_association_array);
        form_data.append('country_club_abbreviation', country_club_abbreviation_array);
        form_data.append('country_club_alias', country_club_alias_array);
        form_data.append('country_club_name', country_club_name_array);

        $.ajax({
            url: base_url+'admin_control/mains/add_new_club_country/'+admin_login_id,
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(php_script_response){
                //alert(php_script_response)
                var theReturn = JSON.parse(php_script_response);
                var theReturned = JSON.parse(php_script_response);
                if(theReturned.error_code == 0){

                    returnFunctions.showSuccessToaster(theReturned.success.message, 'success');
                    setTimeout(function () {
                        window.location.href = base_url+'admin_control/mains/clubs_country/'+admin_login_id+'/add_clubs_country'
                    }, setTimeOutTime);

                }else if(theReturned.error_code == 1){

                    returnFunctions.showSuccessToaster(theReturned.error, 'warning');

                }
            }
        });


        //create the value that will be sent to the backend
        //let country_club_details = {country_club_stadium:country_clu_stadium_details_array, country_club_desc:country_club_desc_array, cc_association:cc_association_array, country_club_abbreviation:country_club_abbreviation_array, country_club_alias:country_club_alias_array, country_club_name:country_club_name_array}

        /*$.post(, form_data, (data, status)=>{

            let theReturned = JSON.parse(data);
            if(theReturned.error_code == 0){



            }else if(theReturned.error_code == 1){



            }

        })*/

    }

    function submitBetCompanyDetails(){

        let bet_company = $('.bet_company');
        let bet_company_alias = $('.bet_company_alias');

        let value_array = [bet_company, bet_company_alias];

        let fields_array = ['Bet Company', 'Bet Company Alias'];

        let class_names = ['bet_company', 'bet_company_alias'];

        //create an array that will hold the different values
        let bet_company_name_array = new Array();
        let bet_company_alias_array = new Array();

        //loop through values and check if there is one with an empty value
        for(let i = 0; i < bet_company.length; i++){

            var error_checker = validator(value_array, fields_array, class_names);

            //collect the values and add to an array
            bet_company_name_array.push($(bet_company[i]).val());
            bet_company_alias_array.push($(bet_company_alias[i]).val());

        }

        if(error_checker == 1){
            returnFunctions.showSuccessToaster('Fields with red borders are required','warning');
            return;
        }

        //create the value that will be sent to the backend
        let bet_company_details = {bet_company_name_array:bet_company_name_array, bet_company_alias_array:bet_company_alias_array}

        $.post(base_url+'admin_control/mains/add_new_bet_company_name/'+admin_login_id, bet_company_details, (data, status)=>{

            let theReturned = JSON.parse(data);
            if(theReturned.error_code == 0){

                returnFunctions.showSuccessToaster(theReturned.success.message, 'success');
                setTimeout(function () {
                    window.location.href = base_url+'admin_control/mains/clubs_country/'+admin_login_id+'/add_new_bet_companies'
                }, setTimeOutTime);

            }else if(theReturned.error_code == 1){

                returnFunctions.showSuccessToaster(theReturned.error, 'warning');

            }else if(theReturned.error_code == 2){

                $(".error_handler").html(theReturned.error).addClass('alert alert-warning');

            }

        })

    }

    function submitCompLeagueName(){

        let competion_league_name = $('.competion_league_name');

        let value_array = [competion_league_name];

        let fields_array = ['League/Competition Name'];

        let class_names = ['competion_league_name'];

        //create an array that will hold the different values
        let competion_league_name_details_array = new Array();

        //loop through values and check if there is one with an empty value
        for(let i = 0; i < competion_league_name.length; i++){

            var error_checker = validator(value_array, fields_array, class_names);

            //collect the values and add to an array
            competion_league_name_details_array.push($(competion_league_name[i]).val());

        }

        if(error_checker == 1){
            returnFunctions.showSuccessToaster('Fields with red borders are required','warning');
            return;
        }

        //create the value that will be sent to the backend
        let country_club_details = {competion_league_name_details:competion_league_name_details_array}

        $.post(base_url+'admin_control/mains/add_new_competion_league_name/'+admin_login_id, country_club_details, (data, status)=>{

            let theReturned = JSON.parse(data);
            if(theReturned.error_code == 0){

                returnFunctions.showSuccessToaster(theReturned.success.message, 'success');
                setTimeout(function () {
                    window.location.href = base_url+'admin_control/mains/clubs_country/'+admin_login_id+'/add_competition_name'
                }, setTimeOutTime);

            }else if(theReturned.error_code == 1){

                returnFunctions.showSuccessToaster(theReturned.error, 'warning');

            }else if(theReturned.error_code == 2){

                $(".error_handler").html(theReturned.error).addClass('alert alert-warning');

            }

        })

    }
    
    function submitBetType(){

        let bet_types = $('.bet_types');

        let value_array = [bet_types];

        let fields_array = ['bet_types'];

        let class_names = ['Type of Bet'];

        //create an array that will hold the different values
        let bet_types_details_array = new Array();

        //loop through values and check if there is one with an empty value
        for(let i = 0; i < bet_types.length; i++){

            var error_checker = validator(value_array, fields_array, class_names);

            //collect the values and add to an array
            bet_types_details_array.push($(bet_types[i]).val());

        }

        if(error_checker == 1){
            returnFunctions.showSuccessToaster('Fields with red borders are required','warning');
            return;
        }

        //create the value that will be sent to the backend
        let country_club_details = {bet_types_details:bet_types_details_array}

        $.post(base_url+'admin_control/mains/add_new_bet_type/'+admin_login_id, country_club_details, (data, status)=>{

            let theReturned = JSON.parse(data);
            if(theReturned.error_code == 0){

                returnFunctions.showSuccessToaster(theReturned.success.message, 'success');
                setTimeout(function () {
                    window.location.href = base_url+'admin_control/mains/clubs_country/'+admin_login_id+'/add_new_bet_types'
                }, setTimeOutTime);

            }else if(theReturned.error_code == 1){

                returnFunctions.showSuccessToaster(theReturned.error, 'warning');

            }else if(theReturned.error_code == 2){

                $(".error_handler").html(theReturned.error).addClass('alert alert-warning');

            }

        })

    }

    function removeThisClubCountryRow(a){

        var header = $(".main_club_country").find('.head_holder').find('h3').text().split(' ');

        if($(".one_club_country").length === 1){
            return;
        }

        $(a).closest(".row").remove();

        //loop through the fields and re-add the headers
        var selected_head = $(".head_holder");
        for(var i = 0; i < selected_head.length; i++){
            var no = parseFloat(i) + parseFloat(1)
            $(selected_head[i]).find('h3').text(header[0]+' '+header[1]+' '+ no)

        }

    }

    function getBettipByDate(){

        var date_from = $(".date_from").val();
        var date_to = $('.date_to').val();

        let value_array = [date_from, date_to];

        let fields_array = ['Initial Date', 'Final Date'];

        let class_names = ['date_from', 'date_to'];

        //check for errors
        var error_checker = validator(value_array, fields_array, class_names);

        if(error_checker == 1){
            returnFunctions.showSuccessToaster('Fields with red borders are required','warning');
            return;
        }

        //create the url and move the particular url
        window.location.href = base_url+"admin_control/mains/clubs_country/"+admin_login_id+"/bet_predictions_details/"+date_from+"_"+date_to;

    }

    //call the formatchecker on blur
    function checkFormat(a){

        //check if the value is empty
        if($(a).val().trim() !== ""){

            var splited_result = $(a).val().trim().split(':');

            if(splited_result.length != 2){
                $(a).css({'border-color':'red'});
                returnFunctions.showSuccessToaster('Please show prvide the score in this format => 0:0 ', 'warning');
                return;
            }

            if(isNaN(splited_result[0]) || isNaN(splited_result[1])){
                $(a).css({'border-color':'red'});
                returnFunctions.showSuccessToaster('Scores must be numbers and in this format => 0:0 ', 'warning');
            }

        }

    }

    <?php //if( $this->uri->segment(3) && $this->uri->segment(3) == 'index'){ ?>

    /*var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [ 'Lost', 'Success'],
            datasets: [
                {
                    label: '# of Predictions lost/Successful',
                    data: ['  //echo $return_data['total_predictions_lost_no'] ', //echo $return_data['total_predictions_won_no']; '],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById("myChart2");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Incorrect Votes','correct Votes'],
            datasets: [
                {
                    label: '# of Votes lost/Successful',
                    data: ['<?php echo $return_data['total_votes_lost_no'] ?>', '<?php echo $return_data['total_votes_won_no']; ?>'],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });*/

    <?php //} ?>

    $(document).ready(function () {
        callActive();
    })

    function callActive(){

        var page_name = '<?php //echo $this->uri->segment(3) ?>'
        var page_option = '<?php //echo //$this->uri->segment(5) ?>'

        //remove the active class
        $('.the_li').removeClass('active');

        //active
        var the_li = $('.the_li');
        var theA = $('.the_li_a');
        for(var i = 0; i < theA.length; i++){

            var exploded_url = $(theA[i]).attr('href').split('/');

            <?php if($this->uri->segment(5)){?>

                if(returnFunctions.checkIfInArray(page_name, exploded_url) != -1 && returnFunctions.checkIfInArray(page_option, exploded_url) != -1){

                    $(theA[i]).closest('.the_li').addClass('active');

                }
            <?php }else{ ?>

                if(returnFunctions.checkIfInArray(page_name, exploded_url) != -1){

                    $(theA[i]).closest('.the_li').addClass('active');

                }

            <?php } ?>

        }

    }

    <?php if( $this->uri->segment(5) && $this->uri->segment(5) == 'add_new_bet_tips'){ ?>
    function createNewBetTipField(){

        if($(".one_club_country").length > 9){
            returnFunctions.showSuccessToaster("You can only create Ten Competition/League Name at a time.","warning");
            return;
        }

        let new_field = '<div class="row one_club_country"><div class="col-md-12 head_holder"><h3>Club/Country 1</h3></div><div class="col-md-4"><label>Home Team</label><?php $team_details = $return_data['team_details']; ?><select class="form-control selectTeamsMain home_team"><option selected value="">Select Home Team</option><?php foreach ($team_details as $k => $value){?><option value="<?php echo $value[$return_data['country_club_table_column'][0]]?>"><?php echo $value[$return_data['country_club_table_column'][2]]; ?></option><?php } ?></select></div><div class="col-md-4"><label>Away Team</label><select class="form-control away_team"><option selected value="">Select Away Team</option><?php foreach ($team_details as $k => $value){?><option value="<?php echo $value[$return_data['country_club_table_column'][0]]?>"><?php echo $value[$return_data['country_club_table_column'][2]]; ?></option><?php } ?></select></div><div class="col-md-4"><label>Bet Odd</label><input type="number" onblur="removeSelectBorder(this)" value="<?php echo set_value('bet_odd'); ?>" class="form-control bet_odd" name="bet_odd[]"></div><div class="col-md-4" style="margin-top: 20px;"><label>Bet Tip/Prediction</label><?php $bet_type_details = $return_data['bet_type_details']; ?><select class="form-control bet_tip_pred"><option selected value="">Select Tip</option><?php foreach ($bet_type_details as $k => $value){?><option value="<?php echo $value; ?>"><?php echo $value; ?></option><?php } ?></select></div><div class="col-md-4" style="margin-top: 20px;"><label>Bet Point</label><input type="text" value="<?php echo set_value('bet_point'); ?>" onblur="removeSelectBorder(this)" class="form-control bet_point" name="bet_point[]"></div><div class="col-md-4" style="margin-top: 20px;"><label>Bet Prediction/Tip Description (25 Character Max)</label><input type="text" name="bet_tip_desc" value="<?php echo set_value('bet_tip_desc'); ?>" maxlength="25" onblur="removeSelectBorder(this)" class="form-control bet_tip_desc"></div><div class="col-md-4" style="margin-top: 20px;"><label>League Name/Competition Name</label><select class="form-control league_name"><option selected value="">Select League/Competition Name</option><?php foreach ($return_data['comp_league_name'] as $k => $value){?><option value="<?php echo $value?>"><?php echo $value; ?></option><?php } ?></select></div><div class="col-md-4" style="margin-top: 20px;"><label>Kick Off Time</label><input type="text" name="kick_off_time" value="<?php echo set_value('kick_off_time'); ?>" onblur="removeSelectBorder(this)" class="form-control kick_off_time"></div> <div class="col-md-12" style="margin-top: 20px;"><div class="row"><?php $count = 0; foreach($return_data['bet_company_details'] as $key => $one_bet_company){ $count++; ?><div class="col-md-4" style="margin-top: <?php echo ($count > 3)? "20px":"0px"; ?>"><div class="input-group"><span class="input-group-addon bet_company_id" bet_company_id_holder="<?php echo $one_bet_company[$return_data['bet_company_table_columns'][0]] ?>" ><?php echo $one_bet_company[$return_data['bet_company_table_columns'][1]]; ?></span><input type="text" class="form-control bet_company_code" placeholder="Enter Bet Code" aria-describedby="basic-addon3"></div></div><?php } ?></div></div> <div class="col-md-4" style="margin-top: 20px;"><button style="margin-top: 30px;" class="btn btn-primary raised icon waves-effect" onclick="removeThisClubCountryRow(this)" type="button"><i class="zmdi zmdi-minus"></i></button></div></div>';

                $(new_field).insertBefore(".new_row");

                //get the field where the id will be inserted
                var kick_off_time = $(".kick_off_time")

                //loop through the fields and re-add the headers
                var selected_head = $(".head_holder");
                var one_club_country = $(".one_club_country");
                for(var i = 0; i < selected_head.length; i++){
                    var no = parseFloat(i) + parseFloat(1);
                    $(selected_head[i]).find('h3').text('Bet Prediction Details '+no);
                    $(one_club_country[i]).find('.bet_company_code').addClass('bet_company_code'+i);
                    $(one_club_country[i]).find('.bet_company_id').addClass('bet_company_id'+i);
                }

                setTimeout(function () {
                    //alert(kick_off_time.length); return;
                    for(var i = 0; i < kick_off_time.length; i++){
                        if(i > 0){
                            var no = parseFloat(i) + parseFloat(1);
                            $(kick_off_time[i]).attr({'id':'datetimepicker'+ no});

                            $('#datetimepicker'+no).datetimepicker({
                                format:'Y-m-d G:i:s',
                                step:05,
                                theme:'dark'
                            });
                        }

                    }
                }, 1000)

            }
            <?php } ?>

    function createBetCompanyFields(a){

        if($(".one_club_country").length > 4){
            returnFunctions.showSuccessToaster("You can only create five Competition/League Name at a time.","warning");
            return;
        }

        let new_field = '<div class="row one_club_country"><div class="col-md-12 head_holder"><h3>Bet Company Details 1</h3></div><div class="col-md-4"><label>Bet Company Name</label><input type="text" onblur="removeSelectBorder(this)" class="form-control bet_company" name="bet_company[]"></div><div class="col-md-4"><label>Alias</label><input type="text" onblur="removeSelectBorder(this)" class="form-control bet_company_alias" name="bet_company_alias[]"> </div><div class="col-md-2" style="margin-top: 30px;"><button class="btn btn-primary raised icon waves-effect" onclick="removeThisClubCountryRow(this)" type="button"><i class="zmdi zmdi-minus"></i></button></div></div>';

        $(new_field).insertBefore(".new_row");

        //get the field where the id will be inserted
        var kick_off_time = $(".kick_off_time")

        //loop through the fields and re-add the headers
        var selected_head = $(".head_holder");
        for(var i = 0; i < selected_head.length; i++){
            var no = parseFloat(i) + parseFloat(1);
            $(selected_head[i]).find('h3').text('Bet Company Details '+no);
        }

    }


    function removeThisRow(a){

        if($(".property_type_holders").length === 1){
            return;
        }

        $(a).closest(".property_type_holders").remove();

    }

    function removeSelectBorder(a){

        if($(a).val() !== ""){
            $(a).css({'border-color':''});
        }

    }

    function getAgent(client_message){

        callSmallModal();
        //build a html content and place the message inside it
        //change modal title
        $(".notification_modal_title").text("Message");

        //ask the question to seeek the knowledge of the user before completing the action
        $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2 text-center'>"+client_message+"</div></div>");

        //assign a new text to the modal button
        $(".notification_modal_button").removeAttr('onclick').addClass('hidden');

        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});


    }

    function getSubscriptionDetails(unique_id){

        //check if the unique id was supplied
        if(unique_id === ''){
            returnFunctions.showSuccessToaster('Please refresh page and try again', 'warning');
            return;
        }

        //send the unique to the back end
        $.post(base_url+'admin_control/getSubscriptionDetails', {subscriptionUniqueId:unique_id}, (data, status)=>{

            let theReturned = JSON.parse(data);
            if(theReturned.error_code == 0){


                let thedetails = document.createElement('table');
                thedetails.classList.add('table','table-condensed','table-striped');
                let theBody = document.createElement('tbody');
                thedetails.appendChild(theBody);

                //create the title holder tr
                let theTr = document.createElement('tr');
                //append to the tbody
                theBody.appendChild(theTr);


                //create the the first td and th
                let tH = document.createElement('th');
                tH.setAttribute('colspan', '2');
                tH.classList.add('text-center','text-uppercase');
                tH.innerHTML = theReturned.success.data[0].plan_type;
                //append the td and th to the tr
                theTr.appendChild(tH);

                let theTre = document.createElement('tr');
                //append to the tbody
                theBody.appendChild(theTre);

                //create the td that will hol the
                let tHe = document.createElement('th');
                tHe.setAttribute('colspan', '2');
                tHe.classList.add('text-center','text-uppercase');
                let theDiv = document.createElement('div')
                theDiv.classList.add('error_handler')
                tHe.appendChild(theDiv);
                //append the td and th to the tr
                theTre.appendChild(tHe);

                //create the first tr
                let theTr1 = document.createElement('tr');
                //append to the tbody
                theBody.appendChild(theTr1);

                //create the second th
                let tH1 = document.createElement('th');
                tH1.classList.add('text-left');
                tH1.innerHTML = 'Unique ID:';

                let td1 = document.createElement('td');
                td1.classList.add('text-left');

                //the input that holds the value
                let theInput1 = document.createElement('input');
                theInput1.classList.add('form-control');
                theInput1.setAttribute('disable','disabled');
                td1.appendChild(theInput1)
                theInput1.value = theReturned.success.data[0].unique_id;

                //append the td and th to the tr
                theTr1.appendChild(tH1)
                theTr1.appendChild(td1)

                /*//second tr
                //create the second tr
                let theTr2 = document.createElement('tr');
                //append to the tbody
                theBody.appendChild(theTr2);

                //create the second th
                let tH2 = document.createElement('th');
                tH2.classList.add('text-left');
                tH2.innerHTML = 'Name of Plan:';

                let td2 = document.createElement('td');
                td2.classList.add('text-left');
                let theInput2 = document.createElement('input');
                theInput2.classList.add('form-control');
                td2.appendChild(theInput2);
                theInput2.value = theReturned.success.data[0].plan_type;

                //append the td and th to the tr
                theTr2.appendChild(tH2)
                theTr2.appendChild(td2)*/


                //second tr
                //create the second tr
                let theTr3 = document.createElement('tr');
                //append to the tbody
                theBody.appendChild(theTr3);

                //create the second th
                let tH3 = document.createElement('th');
                tH3.classList.add('text-left');
                tH3.innerHTML = 'Price:';

                let td3 = document.createElement('td');
                td3.classList.add('text-left');
                let theInput3 = document.createElement('input');
                theInput3.classList.add('form-control','plan_price');
                td3.appendChild(theInput3);
                theInput3.value = theReturned.success.data[0].plan_price;

                //append the td and th to the tr
                theTr3.appendChild(tH3)
                theTr3.appendChild(td3)


                let theTr4 = document.createElement('tr');
                //append to the tbody
                theBody.appendChild(theTr4);

                //create the second th
                let tH4 = document.createElement('th');
                tH4.classList.add('text-left');
                tH4.innerHTML = 'Duration Type:';

                let td4 = document.createElement('td');
                td4.classList.add('text-left');
                let theInput4 = document.createElement('input');
                theInput4.classList.add('form-control','plan_duration_type');
                td4.appendChild(theInput4);
                theInput4.value = theReturned.success.data[0].plan_duration_type;

                //append the td and th to the tr
                theTr4.appendChild(tH4)
                theTr4.appendChild(td4)

                //create the 5th tr
                let theTr5 = document.createElement('tr');
                //append to the tbody
                theBody.appendChild(theTr5);

                //create the second th
                let tH5 = document.createElement('th');
                tH5.classList.add('text-left');
                tH5.innerHTML = 'Duration:';

                let td5 = document.createElement('td');
                td5.classList.add('text-left');
                let theInput5 = document.createElement('input');
                theInput5.classList.add('form-control','plan_duration');
                td5.appendChild(theInput5);
                theInput5.value = theReturned.success.data[0].plan_duration;

                //append the td and th to the tr
                theTr5.appendChild(tH5)
                theTr5.appendChild(td5)

                //create the 7th tr
                let theTr7 = document.createElement('tr');
                //append to the tbody
                theBody.appendChild(theTr7);

                //create the second th
                let tH7 = document.createElement('th');
                tH7.classList.add('text-left');
                tH7.innerHTML = 'Viewing Request:';

                let td7 = document.createElement('td');
                td7.classList.add('text-left');
                let theInput7 = document.createElement('input');
                theInput7.classList.add('form-control','plan_requests_viewing');
                td7.appendChild(theInput7);
                theInput7.value = theReturned.success.data[0].plan_requests_viewing;

                //append the td and th to the tr
                theTr7.appendChild(tH7)
                theTr7.appendChild(td7)


                //create the 8th tr
                let theTr8 = document.createElement('tr');
                //append to the tbody
                theBody.appendChild(theTr8);

                //create the second th
                let tH8 = document.createElement('th');
                tH8.classList.add('text-left');
                tH8.innerHTML = 'Standard Listing:';

                let td8 = document.createElement('td');
                td8.classList.add('text-left');
                let theInput8 = document.createElement('input');
                theInput8.classList.add('form-control','plan_standard_listing');
                td8.appendChild(theInput8)
                theInput8.value = theReturned.success.data[0].plan_standard_listing;

                //append the td and th to the tr
                theTr8.appendChild(tH8)
                theTr8.appendChild(td8)


                //create the 9th tr
                let theTr9 = document.createElement('tr');
                //append to the tbody
                theBody.appendChild(theTr9);

                //create the second th
                let tH9 = document.createElement('th');
                tH9.classList.add('text-left');
                tH9.innerHTML = 'Premium Listing:';

                let td9 = document.createElement('td');
                td9.classList.add('text-left');
                let theInput9 = document.createElement('input');
                theInput9.classList.add('form-control','plan_premium_listings');
                td9.appendChild(theInput9);
                theInput9.value = theReturned.success.data[0].plan_premium_listings;

                //append the td and th to the tr
                theTr9.appendChild(tH9)
                theTr9.appendChild(td9)


                //create the 10th tr
                let theTr10 = document.createElement('tr');
                //append to the tbody
                theBody.appendChild(theTr10);

                //create the second th
                let tH10 = document.createElement('th');
                tH10.classList.add('text-left');
                tH10.innerHTML = 'Premium Listing Boost:';

                let td10 = document.createElement('td');
                td10.classList.add('text-left');
                let theInput10 = document.createElement('input');
                theInput10.classList.add('form-control','plan_premium_listing_boosts');
                td10.appendChild(theInput10)
                theInput10.value = theReturned.success.data[0].plan_premium_listing_boosts;

                //append the td and th to the tr
                theTr10.appendChild(tH10);
                theTr10.appendChild(td10);

                //create the 11th tr
                let theTr11 = document.createElement('tr');
                //append to the tbody
                theBody.appendChild(theTr11);

                //create the second th
                let tH11 = document.createElement('th');
                tH11.classList.add('text-left');
                tH11.innerHTML = 'Premium Listing Boost:';

                let td11 = document.createElement('td');
                td11.classList.add('text-left');
                let theInput11 = document.createElement('input');
                theInput11.classList.add('form-control','plan_student_listing_view');
                td11.appendChild(theInput11)
                theInput11.value = theReturned.success.data[0].plan_student_listing_view;

                //append the td and th to the tr
                theTr11.appendChild(tH11);
                theTr11.appendChild(td11);


                //create the 12th tr
                let theTr12 = document.createElement('tr');
                //append to the tbody
                theBody.appendChild(theTr12);

                //create the second th
                let tH12 = document.createElement('th');
                tH12.classList.add('text-left');
                tH12.innerHTML = 'Students Listing View:';

                let td12 = document.createElement('td');
                td12.classList.add('text-left');
                let theInput12 = document.createElement('input');
                theInput12.classList.add('form-control','plan_student_listing_view');
                td12.appendChild(theInput12)
                theInput12.value = theReturned.success.data[0].plan_student_listing_view;

                //append the td and th to the tr
                theTr12.appendChild(tH12);
                theTr12.appendChild(td12);

                //create the 13th tr
                let theTr13 = document.createElement('tr');
                //append to the tbody
                theBody.appendChild(theTr13);

                //create the second th
                let tH13 = document.createElement('th');
                tH13.classList.add('text-left');
                tH13.innerHTML = 'Discount for Plans Below 6 Months:';

                let td13 = document.createElement('td');
                td13.classList.add('text-left');
                let theInput13 = document.createElement('input');
                theInput13.classList.add('form-control','plan_discount_below_6month');
                td13.appendChild(theInput13);
                theInput13.value = theReturned.success.data[0].plan_discount_below_6month;

                //append the td and th to the tr
                theTr13.appendChild(tH13);
                theTr13.appendChild(td13);


                //create the 13th tr
                let theTr14 = document.createElement('tr');
                //append to the tbody
                theBody.appendChild(theTr14);

                let tH14 = document.createElement('th');
                tH14.classList.add('text-left');
                tH14.innerHTML = 'Discount for Plans Above 6 Months:';

                let td14 = document.createElement('td');
                td14.classList.add('text-left');
                let theInput14 = document.createElement('input');
                theInput14.classList.add('form-control','plan_discount_above_6month');
                td14.appendChild(theInput14);
                theInput14.value = theReturned.success.data[0].plan_discount_above_6month;

                //append the td and th to the tr
                theTr14.appendChild(tH14);
                theTr14.appendChild(td14);

                //create the row
                let theRow = document.createElement('div');
                theRow.classList.add('row');

                //create the column that will hold the elemnets
                let theColumn = document.createElement('div');
                theColumn.classList.add('col-md-10','col-md-offset-1');

                //apend the column to the row
                theRow.appendChild(theColumn);

                callSmallModal();
                //build a html content and place the message inside it
                //change modal title
                $(".notification_modal_title").text(theReturned.success.data[0].plan_type+' details');

                //append the details to the row
                theColumn.appendChild(thedetails)

                //ask the question to seeek the knowledge of the user before completing the action
                $(".modal-body").html(theRow);

                //assign a new text to the modal button
                $(".notification_modal_button").removeAttr('onclick').attr({"onclick":"completeSubscriptionEdit('"+theReturned.success.data[0].unique_id+"')"});

                //call the notificcation modal
                $("#notification_modal").modal({backdrop: 'static', keyboard: false});



            }else if(theReturned.error_code == 1){

                returnFunctions.showSuccessToaster(theReturned.error, 'warning');

            }

        })
    }

    function completeSubscriptionEdit(unique_id){

        //select the values from the different fields and submit
        var plan_price = $(".plan_price").val().trim();
        var plan_duration_type = $(".plan_duration_type").val().trim();
        var plan_duration = $(".plan_duration").val().trim();
        var plan_requests_viewing = $(".plan_requests_viewing").val().trim();
        var plan_standard_listing = $(".plan_standard_listing").val().trim();
        var plan_premium_listings = $(".plan_premium_listings").val().trim();
        var plan_premium_listing_boosts = $(".plan_premium_listing_boosts").val().trim();

        var plan_student_listing_view = $(".plan_student_listing_view").val().trim();
        var plan_discount_below_6month = $(".plan_discount_below_6month").val().trim();
        var plan_discount_above_6month = $(".plan_discount_above_6month").val().trim();

        let theFieldName = ['Price','Duration Type','Plan Duration', 'Plan Request Viewing', 'Standard Listing', 'Premium Listing', 'Premium List Boost', 'Student Listing View', 'Discount for subscriptions Below 6 Months', 'Discount for subscriptions above 6 Months'];

        let theValue_array = [plan_price, plan_duration_type, plan_duration, plan_requests_viewing, plan_standard_listing, plan_premium_listings, plan_premium_listing_boosts, plan_student_listing_view, plan_discount_below_6month, plan_discount_above_6month];

        //check for empty values
        for(let i = 0; i < theValue_array.length; i++){

            if(theValue_array[i] === ''){
                returnFunctions.showSuccessToaster(theFieldName[i]+' is required!', 'warning');
                return;
            }

        }

        //build an obj and move the value to php
        var obj = {
            unique_id:unique_id,
            plan_price:plan_price,
            plan_duration_type:plan_duration_type,
            plan_duration:plan_duration,
            plan_requests_viewing:plan_requests_viewing,
            plan_standard_listing:plan_standard_listing,
            plan_premium_listings:plan_premium_listings,
            plan_premium_listing_boosts:plan_premium_listing_boosts,
            plan_student_listing_view:plan_student_listing_view,
            plan_discount_below_6month:plan_discount_below_6month,
            plan_discount_above_6month:plan_discount_above_6month
        }


        $.post(base_url+'admin_control/completeSubscriptionEdit', obj, (data, status)=>{

            let theReturned = JSON.parse(data);
            if(theReturned.error_code === 0){

                returnFunctions.showSuccessToaster('Update of Plan was successful!', 'success');

            }else if(theReturned.error_code === 1){

                returnFunctions.showSuccessToaster(theReturned.error, 'warning');

            }else if(theReturned.error_code === 2){

                $(".error_handler").html(theReturned.error).addClass('alert alert-warning');

            }

        })


    }

    function displayState(local_g, index){
        var lg = "<option value='"+local_g+"'>"+local_g+"</option>";
        return lg;
    }

    function getSelectedState(a){
        var value = $(a).val().trim();

        $.get(base_url+'admin_control/getLocalGovernment/'+value, function (response, status) {
            var theReturn = JSON.parse(response);

            if(theReturn.error_code == 0){
                //console.log(theReturn.success.data)
                let result = theReturn.success.data;

                $("#lg").html("<option value='Select Local Government'>Select Local Government</option>"+result.map(displayState));

                //$(".local_government_holder").css({"display":"block"})

                //$("#local_government").formSelect()

            }else if(theReturn.error_code == 1){

                getSelectedState(a);

            }

        })

    }

    function performClick(elemId) {
        var elem = document.getElementById(elemId);
        if(elem && document.createEvent) {
            var evt = document.createEvent("MouseEvents");
            evt.initEvent("click", true, false);
            elem.dispatchEvent(evt);
        }
    }


    //image crop

    $(document).ready(function(){

        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width:800,
                height:500,
                type:'square' //circle
            },
            boundary:{
                width:'100%',
                height:600
            }
        });

        $('#upload_image').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);

            //$('#my_modal').addClass("make_visible")
            //$("#uploadimageModal").modal('show')
            $(".my_modal").css({'display':'block'})

        });

        $('.crop_image').click(function(event){

            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response){

                $('#my_modal').removeClass("make_visible");
                //$("#text_image_holders").val(response)

                //get the value for the current post being worked on
                let thePostId = $('#post_id').val();

                //const image_data = "image_data="+response;

                $.post(base_url+'admin_control/imageUpload', {image_data:response,thePostId:thePostId}, function (theresponse, status) {
//image_data

                    let theReturn = JSON.parse(theresponse)

                    if(theReturn.error_code == 0){
//
                        //show the success message
                        returnFunctions.showSuccessToaster(theReturn.success.message, 'success');

                        //input the new image on the image source that is carrying the thumbnail
                        $(".thumbnail_image_holder").attr({'src':base_url+'property_upload/'+theReturn.success.data});

                        //close the modal
                        $(".my_modal").css({'display':'none'})

                    }else if(theReturn.error_code == 1){

                        returnFunctions.showSuccessToaster(theReturn.error, 'warning')

                    }

                })

            })
        });

    });



    //function that create image display for the properties
    function createImageDisplay(image_datas){

        if(image_datas === ''){

            //create the row that holds every thing
            let theMainRow = $('<div>').addClass('row').css({'position':'relative'});

            //create themain column
            let theMainCol = $('<div>').addClass('col-md-12 text-center').css({'padding-top':'100px','cursor':'pointer','height':'100%','position':'absolute'}).attr({"onclick":"activateImageUpload('multiple_image')"});

            //append themaincol to themainrow
            theMainRow.append(theMainCol);

            //create the h2 that holds the main text
            let theWarningTextHolder = $('<h2>').css({'margin-bottom':'0px'}).text('No Image yet, please upload by clicking the camera icon');

            //create the small text
            let theDirective = $('<div>').append($('<small>').addClass('').text('Maximum of 12 images allowed'));

            //create the icon tag with the camera icon
            let theCameraIcon = $('<div>').append($('<i>').addClass('fa fa-camera fa-3x'))

            //append the created elements to the column
            theMainCol.append(theWarningTextHolder);
            theMainCol.append(theDirective);
            theMainCol.append(theCameraIcon);

            //append the warning message to the image box
            $('.image-box').html(theMainRow);
        }

        if(image_datas !== ''){

            //split the returned image name
            let image_array = image_datas.split(',');

            //create a counter
            let theCounter = 1;

            //initialize the variable that will hold the element values
            let theElement = '';

            //get the lenght of the array
            let $lenght = image_array.length;

            //loop through the new created array and form create elements to hold the images
            for(let i = 0; i < image_array.length; i++){

                //create the row div
                if(theCounter%4 == 1 ){
                    //create the row that holds every thing
                    if(theCounter > 1){
                        theElement += "<div class='row' style='margin-top: 20px'>";
                    }
                    if(theCounter == 1){
                        theElement +=  "<div class='row'>";
                    }
                }


                //crete the elements that will hold each image
                theElement += '<div class="col-md-3" style="cursor: pointer;" onclick="selectClicked(this)"><div style="border: 0px solid black; -webkit-box-shadow:2px 2px 20px;-moz-box-shadow:2px 2px 20px;box-shadow:2px 2px 20px;"><input type="checkbox" value="'+image_array[i]+'" style="display: none;" ><img src="'+base_url+'property_upload/'+image_array[i]+'" class="img-responsive additional_property_images"></div></div>';

                //close the row div
                if(theCounter%4 == 0){
                    //create the row that holds every thing
                    theElement += "</div>";
                }

                //when you have less than four items
                if(i == $lenght-1 && theCounter%4 != 0){

                    theElement += "</div>";

                }

                //increament the counter
                theCounter++;
            }

            //shoot the create element into the image box
            //append the warning message to the image box
            $('.image-box').html(theElement);

        }

    }

    function selectClicked(clicked_element) {

        if($(clicked_element).find('input').prop("checked") != true){
            $(clicked_element).find('div').css({'border':'4px solid black'});
            $(clicked_element).find('input').prop("checked", true);
        }else{
            $(clicked_element).find('div').css({'border':'0px solid black'});
            $(clicked_element).find('input').prop("checked", false);
        }


    }

    function activateImageUpload(id_name){

        $('#'+id_name).click();

    }

    ////Upload Multiple Images
    $('#multiple_image').on('change',(function(e) {

        var obj, dbParam, xmlhttp, myObj;
        var postid = document.getElementById('post_id').value;
        var baseurl = base_url;
        var error_images = '';
        var form_data = new FormData();
        var files = $('#multiple_image')[0].files;
        if(files.length > 12){
            error_images += 'You can not select more than 12 image files (Max: 12)!. ';
            returnFunctions.showSuccessToaster('You can not select more than 12 image files (Max: 12)! ', 'warning');
            return;
        }
        for(var i=0; i<files.length; i++){

            var name = document.getElementById("multiple_image").files[i].name;
            var ext = name.split('.').pop().toLowerCase();

            if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
                error_images += 'Invalid '+i+'  file type use eg: png, jpg, jpeg, gif. ';
                returnFunctions.showSuccessToaster('Invalid '+i+'  file type use eg: png, jpg, jpeg, gif', 'warning')
            }

            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("multiple_image").files[i]);
            var f = document.getElementById("multiple_image").files[i];
            var fsize = f.size||f.fileSize;
            if(fsize > 2000000){
                error_images +=  i + ' File Size is too big (Max 2MB). ';
                returnFunctions.showSuccessToaster('File Size is too big (Max 2MB)', 'warning')
            }else{
                form_data.append("multFile[]", document.getElementById('multiple_image').files[i]);
            }//check file size

        }//for loop

        if(error_images !== ''){
            returnFunctions.showSuccessToaster('Image upload failed, Captured Errors: '+error_images, 'warning');
            return;
        }


        form_data.append('postid', postid);
        $.ajax({
            url: baseurl+'admin_control/multipleImageUpload',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            beforeSend:function(){
                //returnFunctions.showSuccessToaster('Loading.....', 'warning');
                $('.image-box').html(loader).find('img').css({'margin-left':'auto', 'margin-right':'auto'})
            },
            success: function(php_script_response){
                var theReturned = JSON.parse(php_script_response);

                if(theReturned.error_code == 0){

                    returnFunctions.showSuccessToaster(theReturned.success.message, 'success');
                    createImageDisplay(theReturned.success.data);

                }else if(theReturned.error_code == 1){

                    returnFunctions.showSuccessToaster(theReturned.error, 'warning');

                }

            }
        });
    }));
    ////Upload Multiple image End

    //this function deletes the seleted images
    function deleteSelectedPropertyImage(){

        //select the whole images for the property in the brown bordered box.
        let theSeletedImage = $('.additional_property_images').prev('input');

        //initialize an array that will collect the images to be deleted
        let image_array = new Array();

        //loop through the selected images and collect the images in an array
        for(let i = 0; i < theSeletedImage.length; i++){

            if($(theSeletedImage[i]).prop('checked') === true){
                image_array.push($(theSeletedImage[i]).val())
            }

        }

        //check array lenght
        if(image_array.length == 0){
            returnFunctions.showSuccessToaster('Please select atleast one image to proceed', 'warning');
            return;
        }

        //change modal title
        $(".notification_modal_title").text("Delete Property Image(s)");

        //ask the question to seeek the knowledge of the user before completing the action
        $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2 text-center'>Do you really want to Delete the selected image(s)?<br>Click the Delete Image(s) button to continue</div></div>");

        //assign a new text to the modal button
        $(".notification_modal_button").removeAttr('onclick').text('Delete Image(s)').attr({"onclick":"finaliseDeleteOfSelectedPropertyImage()"});

        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }

    function finaliseDeleteOfSelectedPropertyImage(){

        //hide the notification modal
        $("#notification_modal").modal('hide');

        //select the whole images for the property in the brown bordered box.
        let theSeletedImage = $('.additional_property_images').prev('input');

        let thePostId = $('#post_id').val().trim();

        //initialize an array that will collect the images to be deleted
        let image_array = new Array();

        //loop through the selected images and collect the images in an array
        for(let i = 0; i < theSeletedImage.length; i++){

            if($(theSeletedImage[i]).prop('checked') === true){
                image_array.push($(theSeletedImage[i]).val())
            }

        }

        //check if the user seleted an image
        if(image_array.length == 0){
            returnFunctions.showSuccessToaster('You must select atleast one image before you ca delete!', 'warning');
            return;
        }

        //create an obj for the values
        let obj = {theSeletedImage:image_array, post_id:thePostId};

        //insert an animation
        $('.image-box').html(loader).find('img').css({'margin-left':'auto', 'margin-right':'auto'});

        $.post(base_url+'admin_control/deleteSelectedPropertyImage', obj, (response, status)=>{

            //catch the response
            let theResponse = JSON.parse(response);

            if(theResponse.error_code == 0){

                returnFunctions.showSuccessToaster(theResponse.success.message, 'success');
                createImageDisplay(theResponse.success.data);

            }else if(theResponse.error_code == 1){

                returnFunctions.showSuccessToaster(theResponse.error, 'warning');

            }

        })

    }

    function publishNow(action_type,unique_id){
//
        callSmallModal();
        
        //notification_modal notification_modal_title modal-body
        if(action_type.trim() === "publish_property"){

            //enter the title
            $(".notification_modal_title").text("Publish Property");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really Publish this property?<br> Please click the Publish button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Publish').attr({"onclick":"concludepublishNow('"+action_type+"','"+unique_id+"')"})



        }else if(action_type.trim() === "publish_property_later"){

            //enter the title
            $(".notification_modal_title").text("Publish Property");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Please click the Continue button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Continue').attr({"onclick":"concludepublishNow('"+action_type+"','"+unique_id+"')"})

        }

        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }

    function concludepublishNow(action_type,unique_id) {

        callSmallModal();

        if(action_type === 'publish_property_later'){
            window.location.href = base_url+'admin_control/all_properties/all'
            return;
        }

        //build an object from the collected values
        var obj = {action_type:action_type,unique_id:unique_id};

        $.post(base_url+'admin_control/concludepublishNow', obj, function (data, status) {

            var theReturn = JSON.parse(data);

            if(theReturn.error_code === 0){

                $("#notification_modal").modal("hide");
                returnFunctions.showSuccessToaster(theReturn.success.message, 'success');

                setTimeout(function () {

                    //location.reload();
                    window.location.href = base_url+'admin_control/all_properties/all'

                }, setTimeOutTime)

            }else if(theReturn.error_code === 1){

                returnFunctions.showSuccessToaster(theReturn.error, 'success')

            }
        })

    }

    function coreFeatureAction(a, action_type,unique_id){

        //check if the actiondisplay_message type was supplied
        if(action_type === "" || unique_id === ''){
            returnFunctions.showSuccessToaster('Please Refresh Page and try again!', 'warning');

        }

        //editing of current rate for different currency
        if(action_type === 'edit_currency_rate'){

            var display_message = 'Do your really want to edit the current Rate';

            var old_rate = $(a).closest('td').prev('td').find('span').text();

            //enter the title
            $(".notification_modal_title").text("Edit Currency Rate");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2' style=''><p class='text-center'>"+display_message+"<br> Please click the Edit Rate button to proceed!</p></div><div class='col-md-8 col-md-offset-2' style='margin-top:20px;'><input type='text' class='form-control new_rate' value='"+old_rate+"' placeholder='Enter New rate'></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Edit Rate').attr({"onclick":"concludeCoreFeatureAction('"+action_type+"','"+unique_id+"')"})

        }

        if(action_type === 'edit_bank_details'){

            var display_message = 'Do your really want to edit the Selected Bank Details';

            var account_name = $(a).closest('td').prev('td').prev('td').prev('td').find('span').text();

            var account_no = $(a).closest('td').prev('td').prev('td').find('span').text();

            var bank_name = $(a).closest('td').prev('td').find('span').text();

            //enter the title
            $(".notification_modal_title").text("Edit Bank Details");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2' style=''><p class='text-center'>"+display_message+"<br> Please click the Edit Bank Details button to proceed!</p></div><div class='col-md-8 col-md-offset-2' style='margin-top:20px;'><input type='text' class='form-control account_name_edit' value='"+account_name+"' placeholder='Account Name'></div> <div class='col-md-8 col-md-offset-2' style='margin-top:20px;'><input type='text' class='form-control account_no' value='"+account_no+"' placeholder='Account Number'></div>  <div class='col-md-8 col-md-offset-2' style='margin-top:20px;'><input type='text' class='form-control bank_name_edit' value='"+bank_name+"' placeholder='Bank Name'></div> </div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Edit Bank Details').attr({"onclick":"concludeCoreFeatureAction('"+action_type+"','"+unique_id+"')"})

        }

        if(action_type === 'edit_payment_gateway'){

            var display_message = 'Do your really want to edit the Selected Payment Gateway';

            var old_title = $(a).closest('td').prev('td').prev('td').find('span').text();

            var old_keyword = $(a).closest('td').prev('td').find('span').text();

            //enter the title
            $(".notification_modal_title").text("Edit Payment Gateway");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2' style=''><p class='text-center'>"+display_message+"<br> Please click the Edit Payment Gateway button to proceed!</p></div><div class='col-md-8 col-md-offset-2' style='margin-top:20px;'><input type='text' class='form-control new_title' value='"+old_title+"' placeholder='Title'></div> <div class='col-md-8 col-md-offset-2' style='margin-top:20px;'><input type='text' class='form-control new_keyword' value='"+old_keyword+"' placeholder='Keyword'></div> </div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Edit Payment Gateway').attr({"onclick":"concludeCoreFeatureAction('"+action_type+"','"+unique_id+"')"})

        }

        if(action_type === 'edit_payment_mood'){

            var display_message = 'Do your really want to edit the Selected Payment Mood';

            var payment_mood = $(a).closest('td').prev('td').find('span').text();

            //enter the title
            $(".notification_modal_title").text("Edit Payment Mood");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2' style=''><p class='text-center'>"+display_message+"<br> Please click the Edit Payment Mood button to proceed!</p></div><div class='col-md-8 col-md-offset-2' style='margin-top:20px;'><input type='text' class='form-control new_payment_mood' value='"+payment_mood+"' placeholder='Payment Mood'></div> </div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Edit Payment Mood').attr({"onclick":"concludeCoreFeatureAction('"+action_type+"','"+unique_id+"')"})

        }

        //call the modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }

    //new_title new_keyword
    function concludeCoreFeatureAction(action_type, unique_id){

        var new_rate = '', new_title = '', new_keyword = '', new_payment_mood = '', new_account_name = '', new_account_no = '', new_bank_name = '';

        if(action_type === 'edit_currency_rate'){
            new_rate = $('.new_rate').val().trim();
        }

        if(action_type === 'edit_payment_gateway'){
            new_title = $('.new_title').val().trim();
            new_keyword = $('.new_keyword').val().trim();
            //build an object from the collected values
        }

        //payment mood
        if(action_type === 'edit_payment_mood'){
            new_payment_mood = $('.new_payment_mood').val().trim();
        }

        //bank details edut
        if(action_type === 'edit_bank_details'){

            //get the new vales
            new_account_name = $('.account_name_edit').val();
            new_account_no = $('.account_no').val();
            new_bank_name = $('.bank_name_edit').val();

        }

        //build an object from the collected values
        var obj = {action_type:action_type,unique_id:unique_id, new_rate:new_rate, new_title:new_title, new_keyword:new_keyword, action_type:action_type, new_payment_mood:new_payment_mood, new_account_name:new_account_name, new_account_no:new_account_no,new_bank_name:new_bank_name};

        $.post(base_url+'admin_control/concludeCoreFeatureAction', obj, function (data, status) {

            var theReturn = JSON.parse(data);

            if(theReturn.error_code === 0){

                $("#notification_modal").modal("hide");

                returnFunctions.showSuccessToaster(theReturn.success.message, 'success');

                setTimeout(function () {

                    location.reload();

                }, setTimeOutTime)

            }else if(theReturn.error_code === 1){

                returnFunctions.showSuccessToaster(theReturn.error, 'warning')

            }
        })

    }

    function toggleChecBox(){

        if($(".checkAll").is(':checked')){

            var checkIt = $(".checkIt");
            for(i=0; i < checkIt.length; i++){

                $(checkIt[i]).prop("checked", true);

            }

        }else{

            var checkIt = $(".checkIt");
            for(i=0; i < checkIt.length; i++){

                $(checkIt[i]).prop("checked", false);

            }

        }

    }

    function delete_action(action_type){

        callSmallModal();

        if(action_type === ""){

            returnFunctions.showSuccessToaster("Please refresh the page and try again!", "warning");
            return;

        }

        //check if any check box was checked
        if($(".checkIt").is(':checked') === false){
            returnFunctions.showSuccessToaster('Please atleast one country details by thicking the checkbox', 'warning');
            return;
        }

        var unique_id_of_rows_to_be_deleted = new Array();
        var checkIt = $(".checkIt:checked");
        for(i=0; i < checkIt.length; i++){

            var theVals = $(checkIt[i]).val();
            unique_id_of_rows_to_be_deleted.push(theVals);
        }

        //notification_modal notification_modal_title modal-body
        if(action_type.trim() === "delete_clubs_country"){

            //enter the title
            $(".notification_modal_title").text("Delete Club Country");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to Delete selected Club/Country?<br> Please click the delete button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Delete').attr({"onclick":"concludeDeleteAction('"+action_type+"','"+unique_id_of_rows_to_be_deleted+"','country_club_tb')"})



        }else if(action_type.trim() === "reverse_clubs_country_delete"){

            //enter the title
            $(".notification_modal_title").text("Remove Item out of Trash Notification");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to remove selected item(s) out of trash?<br> Please click the Continue button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Continue').attr({"onclick":"concludeDeleteAction('"+action_type+"','"+unique_id_of_rows_to_be_deleted+"','country_club_tb')"})//

        }else if(action_type.trim() === "delete_bet_tips"){

            //enter the title
            $(".notification_modal_title").text("Delete Bet Tips");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to Delete selected Bet Tip(s)?<br> Please click the delete button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Delete').attr({"onclick":"concludeDeleteAction('"+action_type+"','"+unique_id_of_rows_to_be_deleted+"','bet_tips_tb')"});

        }else if(action_type.trim() === "reverse_delete_bet_tips"){

            //enter the title
            $(".notification_modal_title").text("Reverse Delete");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to reverse the Delete of the selected Bet Tip(s)?<br> Please click the Continue button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Continue').attr({"onclick":"concludeDeleteAction('"+action_type+"','"+unique_id_of_rows_to_be_deleted+"','bet_tips_tb')"});

        }else if(action_type.trim() === "block_account" || action_type.trim() === 'permanent_account_block'){

            var obj = {
                "table_name":["user_tb"],
                "columns":["unique_id"],
                "signs":["="],
                "clause":[unique_id],
                "return_keys":["singel_user_detail"]
            };

            $.get(base_url+'admin_control/mains/getJsonNewObj/'+admin_login_id,obj,function (data,status) {

                var theReturned = JSON.parse(data);

                if(theReturned.success.singel_user_detail.length > 0){

                    if(theReturned.success.singel_user_detail[0].account_block_counter == 0){
                        var display_message = "<div class='col-md-8 col-md-offset-2 alert alert-warning'>User account has not been blocked in the past.</div>";
                    }

                    if(theReturned.success.singel_user_detail[0].account_block_counter == 1){
                        var display_message = "<div class='col-md-8 col-md-offset-2 alert alert-warning'>User account has been blocked once in the past.</div>";
                    }

                    if(theReturned.success.singel_user_detail[0].account_block_counter == 2){
                        var display_message = "<div class='col-md-8 col-md-offset-2 alert alert-warning'>User account has been blocked twice in the past.</div>";
                    }

                    if(theReturned.success.singel_user_detail[0].account_block_counter == 3){
                        var display_message = "<div class='col-md-8 col-md-offset-2 alert alert-warning'>User account has been blocked 3, User will be permanently blocked if you continue</div>";
                    }

                }else{
                    var display_message = "";
                }

                //get the acknowledgement message for block account
                if(action_type.trim() === "block_account"){
                    var inquiry = "Do you really want to Block this user`s account?";
                }

                //get the acknowledgement message for permanent account block
                if(action_type.trim() === "permanent_account_block"){
                    var inquiry = "Do you really want to Block this user`s account permanently?";
                }

                //enter the title
                $(".notification_modal_title").text("Account Block Notification");

                //ask the question to seeek the knowledge of the user before completing the action
                $(".modal-body").html("<div class='row'> "+display_message+"<div class='col-md-8 col-md-offset-2' style=''><p class='text-center'>"+inquiry+"<br> Please click the Block Account button to proceed!</p></div><div class='col-md-8 col-md-offset-2' style='margin-top:20px;'><textarea class='form-control block_reason' placeholder='State Reason for Blocking this user' rows='3'></textarea></div></div>");

                //assign a new text to the modal button
                $(".notification_modal_button").removeAttr('onclick').text('Block Account').attr({"onclick":"concludeAccountAction('"+action_type+"','"+unique_id+"')"})


            })//



        }else if(action_type.trim() === "unblock_account"){

            //enter the title
            $(".notification_modal_title").text("Account Un-Block Notification");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'> <div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to Un-Block Account this user`s account?<br> Please click the Un-Block Account to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Un-Block Account').attr({"onclick":"concludeAccountAction('"+action_type+"','"+unique_id+"')"})

        }else if(action_type.trim() === "confirm_agents_account"){

            //enter the title
            $(".notification_modal_title").text("Agent`s Account Confirmation Notification");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'> <div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to mark this agent`s Account as confirmed?<br> Please click the Confirm button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Un-Block Account').attr({"onclick":"concludeAccountAction('"+action_type+"','"+unique_id+"')"})

        }else if(action_type.trim() === "un_confirm_agents_account"){

            //enter the title
            $(".notification_modal_title").text("Agent Account Un-confirmation Notification");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'> <div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to Un-Confirm Account this user`s account?<br> Please click the activate button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Un-Confirm Account').attr({"onclick":"concludeAccountAction('"+action_type+"','"+unique_id+"')"})

        }

        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }

    //delete accountes selected
    function concludeDeleteAction(action_type,unique_id,country_club_tb) {

        callSmallModal();

        //build an object from the collected values
        var obj = {action_type:action_type,unique_id:unique_id.split(','),table_name_del:country_club_tb};

        $.post(base_url+'admin_control/mains/concludeDeleteAction/'+admin_login_id, obj, function (data, status) {

            var theReturn = JSON.parse(data);

            if(theReturn.error_code === 0){

                $("#notification_modal").modal("hide");

                returnFunctions.showSuccessToaster(theReturn.success.message, 'success');

                setTimeout(function () {

                    location.reload();

                }, setTimeOutTime)

            }else if(theReturn.error_code === 1){

                returnFunctions.showSuccessToaster(theReturn.error, 'warning')

            }
        })

    }



</script>

