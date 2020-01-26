// JavaScript Document
//CROP IMAGE START PASSPORT
$(document).ready(function(){
    $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
            width:700,
            height:500,
            type:'square' //circle
        },
        boundary:{
            width:"100%",
            height:450
        }
    });

    $('#theFiles').on('change', function(){

        //remove the large modal class
        //$("#uploadimageModal").find('.modal-dialog').removeClass('modal-lg');

        var reader = new FileReader();
        reader.onload = function (event) {
            $image_crop.croppie('bind', {
                url: event.target.result
            }).then(function(){
                returnFunctions.showSuccessToaster('Query bind complete', 'warning');
                //console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadimageModal').modal('show');
    });

    $('.crop_image').click(function(event){

        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response){
            $('#nazac_loader').show();

            var page_name_value = $("#page_name_value").val().trim();
            if(page_name_value === 'upload_listed_property_media'){
                submitShot(response, baseurl+'agents/mains/upload_listed_property_main_image');
            }else{
                submitShot(response, baseurl+'agents/mains/upload_main_image');
            }
        });
    });

});

function submitShot(ImageURL, url){

    // Get the form element withot jQuery
    var form = document.getElementById("myAwesomeForm_2");
    var postid = $("#user_id_holder").val();

    //var ImageURL = $("#shot_holder").attr('src');

    // Split the base64 string in data and contentType
    var block = ImageURL.split(";");
    // Get the content type of the image
    var contentType = block[0].split(":")[1];// In this case "image/gif"

    // get the real base64 content of the file
    var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."

    // Convert it to a blob to upload
    var blob = b64toBlob(realData, contentType);
//console.log(form)
    // Create a FormData and append the file with "image" as parameter name
    var formDataToUpload = new FormData();
    //console.log(formDataToUpload);

    formDataToUpload.append("thumbnail", blob);
    formDataToUpload.append('property_unique_id', postid);
    $.ajax({
        url: url,
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: formDataToUpload,
        type: 'post',
        beforeSend:function(){
            //returnFunctions.showSuccessToaster('Loading.....', 'warning');
            $('#nazac_loader').css({'display':'block'})
        },
        success: function(php_script_response){

            var theReturned = JSON.parse(php_script_response);

            $('#nazac_loader').css({'display':'none'});

            if(theReturned.error_code == 0){

                $('#uploadimageModal').modal('hide');

                $(".main_image_img").attr({'src':baseurl+theReturned.success.image_name});

                returnFunctions.showSuccessToaster(theReturned.success.message, 'success');


            }else if(theReturned.error_code == 1){

                returnFunctions.showSuccessToaster(theReturned.error, 'warning');

            }

        }
    });

}

//function that creates a blob image from a base64 data
function b64toBlob(b64Data, contentType, sliceSize) {
    contentType = contentType || '';
    sliceSize = sliceSize || 512;

    var byteCharacters = atob(b64Data);
    var byteArrays = [];

    for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
        var slice = byteCharacters.slice(offset, offset + sliceSize);

        var byteNumbers = new Array(slice.length);
        for (var i = 0; i < slice.length; i++) {
            byteNumbers[i] = slice.charCodeAt(i);
        }

        var byteArray = new Uint8Array(byteNumbers);

        byteArrays.push(byteArray);
    }

    var blob = new Blob(byteArrays, {type: contentType});
    return blob;
}
//CROP IMAGE END PASSPORT