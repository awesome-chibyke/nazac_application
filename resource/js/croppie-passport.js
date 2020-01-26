// JavaScript Document
//CROP IMAGE START PASSPORT
$(document).ready(function(){
	$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:"100%",
      height:250
    }
  });

  $('#theFiles').on('change', function(){
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
	var nazac_id = document.getElementById('id').value;
	var baseurl = document.getElementById('baseurl').value;
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
		$('#nazac_loader').show();
      $.ajax({
        url:baseurl+'processor/passport_update',
        type: "POST",
        data:{"crop_image": response, "nazac_id": nazac_id},
        success:function(data)
        {
			var getObj = JSON.parse(data);
			  if(getObj.error){
				  returnFunctions.showSuccessToaster(getObj.error, 'warning');
			  }
			  if(getObj.success){
				  returnFunctions.showSuccessToaster(getObj.success, 'success');
				  $('#pp').attr("src",getObj.src);
			  }
		  $('#nazac_loader').hide();
          $('#uploadimageModal').modal('hide');
        }
      });
    });
  });

}); 
//CROP IMAGE END PASSPORT