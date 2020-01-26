<script>

    function userSubscriptionAction(action_type,unique_id){

        //check for empty string
        if(action_type === '' || unique_id === '') {

            returnFunctions.showSuccessToaster('Please Refresh Page and Try again', 'warning');
            return;

        }

        //create a if statement to check the actions the user choose

        if(action_type === 'suspend_subscription'){

            //enter the title
            $(".notification_modal_title").text("Suspend Subscription");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to suspend this user`s subscription?<br> Please click the Continue button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Continue').attr({"onclick":"concludeSubscriptionSuspendAction('"+action_type+"','"+unique_id+"')"});


        }

        if(action_type === 'confirm_subscription'){

            //enter the title
            $(".notification_modal_title").text("Confirm Subscription");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to Confirm this user`s subscription ?<br> Please click the Continue button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Continue').attr({"onclick":"concludeSubscriptionSuspendAction('"+action_type+"','"+unique_id+"')"});


        }


        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }


    function concludeSubscriptionSuspendAction(action_type, unique_id){

        //check for empty string
        if(action_type === '' || unique_id === '') {

            returnFunctions.showSuccessToaster('Please Refresh Page and Try again', 'warning');
            return;

        }

        //build an obj for that will sent to server side
        let obj = {action_type:action_type, unique_id:unique_id};
        
        $.post(base_url+'admin_control/concludeSubscriptionSuspendAction', obj, function (response, status) {

            var theResponse = JSON.parse(response);

            if(theResponse.error_code == 0){//

                returnFunctions.showSuccessToaster(theResponse.success.message, 'success');
                setTimeout(()=>{
                    location.reload();
                }, 5000)

            }else if(theResponse.error_code == 1){

                returnFunctions.showSuccessToaster(theResponse.error, 'warning');

            }

        })

    }

    function concludeMainSubscriptionAction(action_type, unique_id){

        //check for empty string
        if(action_type === '' || unique_id === '') {

            returnFunctions.showSuccessToaster('Please Refresh Page and Try again', 'warning');
            return;

        }

        //build an obj for that will sent to server side
        let obj = {action_type:action_type, unique_id:unique_id};

        $.post(base_url+'admin_control/concludeMainSubscriptionAction', obj, function (response, status) {

            var theResponse = JSON.parse(response);

            if(theResponse.error_code == 0){//

                returnFunctions.showSuccessToaster(theResponse.success.message, 'success');
                setTimeout(()=>{
                    location.reload();
                }, 5000)

            }else if(theResponse.error_code == 1){

                returnFunctions.showSuccessToaster(theResponse.error, 'warning');

            }

        })

    }

    function mainsubscriptionAction(action_type,unique_id){

        //check for empty string
        if(action_type === '' || unique_id === '') {

            returnFunctions.showSuccessToaster('Please Refresh Page and Try again', 'warning');
            return;

        }

        //create a if statement to check the actions the user choose

        if(action_type === 'activate_subscription'){

            //enter the title
            $(".notification_modal_title").text("Subscription Activation");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to ACTIVATE this user`s subscription?<br> Please click the Continue button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Continue').attr({"onclick":"concludeMainSubscriptionAction('"+action_type+"','"+unique_id+"')"});


        }

        //when the type is deactivation
        if(action_type === 'deactivate_subscription'){

            //enter the title
            $(".notification_modal_title").text("Subscription De-Activation");

            //ask the question to seeek the knowledge of the user before completing the action
            $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2'><p class='text-center'>Do you really want to DE-ACTIVATE this user`s subscription?<br> Please click the Continue button to proceed!</p></div></div>");

            //assign a new text to the modal button
            $(".notification_modal_button").removeAttr('onclick').text('Continue').attr({"onclick":"concludeMainSubscriptionAction('"+action_type+"','"+unique_id+"')"});


        }

        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }//

    function editSubscriptionDetails(unique_id) {

        //enter the title
        $(".notification_modal_title").text("Edit Subscription Details");

        //ask the question to seeek the knowledge of the user before completing the action
        $(".modal-body").html("<div class='row'><div class='col-md-8 col-md-offset-2 guider'><p class='text-center'>Do you really want to EDIT this user`s subscription?<br> Please click the Continue button to proceed!</p></div></div>");

        //assign a new text to the modal button
        $(".notification_modal_button").removeAttr('onclick').text('Continue').attr({"onclick":"concludeEditSubscriptionDetails('"+unique_id+"')"});

        //call the notificcation modal
        $("#notification_modal").modal({backdrop: 'static', keyboard: false});

    }

    function concludeEditSubscriptionDetails(unique_id){

        //check if the error displayer is visible, then remove it
        //if($(".error_dispalyer")){
            $('.error_dispalyer').remove();
        //}

        $(".error_displayer").addClass('hidden')

        let subscription_start_date = $(".subscription_start_date").val();
        let subscription_end_date = $(".subscription_end_date").val();
        let subscription_duration = $(".subscription_duration").val();
        let amount_paid = $(".amount_paid").val();
        let discount_recieved = $(".discount_recieved").val();
        let payment_method_used = $(".payment_method_used").val();
        let transaction_unique_id = unique_id;

        let value_array = [subscription_start_date, subscription_end_date, subscription_duration, amount_paid, discount_recieved, payment_method_used];

        let class_name_array = ['subscription_start_date', 'subscription_end_date', 'subscription_duration', 'amount_paid', 'discount_recieved', 'payment_method_used'];

        let field_array = ["Subscription Start Date", "Subscription End Date", "Subscription Duration", "Amount Paid", "Discount Recieved", "Payment Method Used"];

        //create the error array variable
        let error_array = new Array(); error_code = 0;

        //create an array of the values that was collected and validate
        for(let i = 0; i < field_array.length; i++){

            if(value_array[i] === ""){

                error_array.push("<p>"+field_array[i]+" is required!!!</p>");
                error_code = 1;

            }

        }

        //check if the value for amount is a number
        if(isNaN(amount_paid)){
            error_array.push("<p>Amount must be a number!!!</p>");
            error_code = 1;
        }

        //display the error message, creta a variable that will carry the error arrays
        let error_display = '';

        if(error_code == 1){

            for(let i = 0; i < error_array.length; i++){
                error_display += "<p>"+error_array[i]+"</p>";
            }

            $("<div class='col-md-6 col-md-offset-3 text-center alert alert-warning error_dispalyer'> "+error_display+"</div>").insertBefore(".guider");
            //.html(error_display).removeClass('hidden');
        }

        $.post(base_url+'admin_control/editSubscriptionDetails', {subscription_start_date:subscription_start_date, subscription_end_date:subscription_end_date, subscription_duration:subscription_duration, amount_paid:amount_paid, discount_recieved:discount_recieved, payment_method_used:payment_method_used, transaction_unique_id:transaction_unique_id}, (response, status)=>{

            //get the json being returned from the backend
            let theResponse = JSON.parse(response);

            //check if the returned value is a n error or a success
            if(theResponse.error_code == 0){

                returnFunctions.showSuccessToaster(theResponse.success.message, 'success');
                setTimeout(()=>{
                   location.reload(); 
                }, 4000);

            }else if(theResponse.error_code == 1){

                returnFunctions.showSuccessToaster(theResponse.error, 'success');
                $("<div class='col-md-6 col-md-offset-3 text-center alert alert-warning error_dispalyer'> "+theResponse.error+"</div>").insertBefore(".guider");

            }

        });

    }

    function validateValues(field, value, class_name, validate_type) {

        //create a value that will hold the error array
        let error_array = {};

        if(validate_type === "empty"){

            if(value_array[i] === ""){

                error_array[class_name] = field[i]+" is required!!!";
                error_code = 1;

            }

        }

    }


</script>
