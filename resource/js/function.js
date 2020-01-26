// JavaScript Document
/*Client Registration Validation*/
$('#nazac_loader').hide();
$('#oldstudent').css("cursor","pointer");
$('.homes-price').css("cursor","pointer");
$('#proveid').css("cursor","pointer");
$('.pointer').css("cursor","pointer");

function redirectPage(parame){
	window.location = parame;
}

function performClick(elemId){
   var elem = document.getElementById(elemId);
	if(elem && document.createEvent){
	  var evt = document.createEvent("MouseEvents");
	  evt.initEvent("click", true, false);
	  elem.dispatchEvent(evt);
   }
}

function refreshThisPage(){
	window.location.reload();
}

$('#doc_verify_type').on('change', function(){
	var baseUrl = document.getElementById('baseurl').value;
	window.location = baseUrl+'users/member/verify-account/'+$(this).val();
});

$('#categoryChoose').on('change', function(){
	var baseUrl = document.getElementById('baseurl').value;
	window.location = baseUrl+'users/user/property-listing/'+$(this).val();
});


function register(base_url){
			var obj, dbParam, xmlhttp, myObj;
	        var hr = new XMLHttpRequest();
            var fname = document.getElementById('fname').value;
			var lname = document.getElementById('lname').value;
			var email = document.getElementById('email').value;
			var phone = document.getElementById('phone').value;
			var sex = document.getElementById('sex').value;
			var pass = document.getElementById('pass').value;
	        var cpass = document.getElementById('cpass').value;
	        var ac_type = $("input[name='ac_type']:checked").val(); 
			var regbox = 'regbox';
			dbParam = "fname="+fname+"&lname="+lname+"&email="+email+"&phone="+phone+"&sex="+sex+"&pass="+pass+"&cpass="+cpass+"&ac_type="+ac_type+"&regbox="+regbox;
	if(fname=="" || lname=="" || email=="" || sex=="" || phone=="" || pass=="" || cpass=="" || ac_type=="" || regbox==""){
		returnFunctions.showSuccessToaster('Ensure you fill all necessary fileds with (*)!', 'warning');
	}else{
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if( !emailReg.test(email) ) {
			returnFunctions.showSuccessToaster('Please use a valid email address!', 'warning');
		}else{
		 if(pass!=cpass){
			 returnFunctions.showSuccessToaster('Password does not match!', 'warning');
		 }else{
			if(pass.length<8 || pass.length>36){
				returnFunctions.showSuccessToaster('Password length should be between 8 - 36 characters!', 'warning');
			}else{
				
	hr.open("POST", base_url+"Processor/register", true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
		if(hr.readyState == 4 && hr.status == 200) {
			var return_data = hr.responseText;
			var getObj = JSON.parse(return_data);
			  if(getObj.error){
				  
				setTimeout(function() {
				  	$('#nazac_loader').hide();
				 }, 2000);
				  
				setTimeout(function() {
					returnFunctions.showSuccessToaster(getObj.error, 'warning');
				}, 2500);
 		
			  }
			  if(getObj.success){//'Registration was successful you will be redirected shortly!'
				  
				$('#nazac_loader').hide();
 				returnFunctions.showSuccessToaster(getObj.success, 'success');
				setTimeout(function() {
				   redirectPage(base_url+'users/user/login');
				 }, 2000);
				  
			 }
		}
	}
	hr.send(dbParam); // Actually execute the request			
		//returnFunctions.showSuccessToaster('Processing..', 'success');
		$('#nazac_loader').show();
		}//pass
	   }//pass
	 }//email
	}
}

function verifyAccount(base_url){
			var obj, dbParam, xmlhttp, myObj;
	        var hr = new XMLHttpRequest();
            var doc_verify_type = document.getElementById('doc_verify_type').value;
			var acname = document.getElementById('acname').value;
			var acno = document.getElementById('acno').value;
			var bank = document.getElementById('bank').value;
			var hashPot = document.getElementById('hashPot').value;
			var verify = 'verify';
			dbParam = "doc_verify_type="+doc_verify_type+"&acname="+acname+"&acno="+acno+"&bank="+bank+"&hashPot="+hashPot+"&verify="+verify;
	if(doc_verify_type=="" || acname=="" || acno=="" || bank=="" || verify==""){
		returnFunctions.showSuccessToaster('Ensure you fill all necessary fileds with (*)!', 'warning');
	}else{
		
				
	hr.open("POST", base_url+"Processor/verifyAccount", true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
		if(hr.readyState == 4 && hr.status == 200) {
			var return_data = hr.responseText;
			var getObj = JSON.parse(return_data);
			  if(getObj.error){
				  
				setTimeout(function() {
				  	$('#nazac_loader').hide();
				 }, 2000);
				  
				setTimeout(function() {
					returnFunctions.showSuccessToaster(getObj.error, 'warning');
				}, 2500);
 		
			  }
			  if(getObj.success){
				  
				$('#nazac_loader').hide();
 				returnFunctions.showSuccessToaster(getObj.success, 'success');
				setTimeout(function() {
				   //redirectPage(base_url+'users/user/login');
				 }, 2000);
				  
			 }
		}
	};
	hr.send(dbParam); // Actually execute the request	
		$('#nazac_loader').show();
		
	}
}

$(document).ready(function(e) {
		  $('#clik').css("cursor","pointer");
		  var base_url = document.getElementById('baseurl').value;
          $('#theFile').on('change',(function(e) {
				var file_data = $('#theFile').prop('files')[0];   
				var form_data = new FormData();                  
				form_data.append('file', file_data);                          
				$.ajax({
					url: base_url+"Processor/VerifyDocUploadFront", // point to server-side PHP script 
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					success: function(return_data){
						$('#nazac_loader').hide();
						returnFunctions.showSuccessToaster(return_data, 'success');
						setTimeout(refreshThisPage,2500);
					}
				 });
			  $('#nazac_loader').show();
       }));
 });

$(document).ready(function(e) {
		  $('#clik').css("cursor","pointer");
		  var base_url = document.getElementById('baseurl').value;
          $('#theFile2').on('change',(function(e) {
				var file_data = $('#theFile2').prop('files')[0];   
				var form_data = new FormData();                  
				form_data.append('file2', file_data);                          
				$.ajax({
					url: base_url+"Processor/VerifyDocUploadBack", // point to server-side PHP script 
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					success: function(return_data){
						$('#nazac_loader').hide();
						returnFunctions.showSuccessToaster(return_data, 'success');
						setTimeout(refreshThisPage,2500);
					}
				 });
			  $('#nazac_loader').show();
       }));
 });

$(document).ready(function(e) {
		  $('#clik').css("cursor","pointer");
		  var base_url = document.getElementById('baseurl').value;
          $('#theFile3').on('change',(function(e) {
				var file_data = $('#theFile3').prop('files')[0];   
				var form_data = new FormData();                  
				form_data.append('file3', file_data);                          
				$.ajax({
					url: base_url+"Processor/VerifyDocUploadProve", // point to server-side PHP script 
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					success: function(return_data){
						$('#nazac_loader').hide();
						returnFunctions.showSuccessToaster(return_data, 'success');
						setTimeout(refreshThisPage,2500);
					}
				 });
			  $('#nazac_loader').show();
       }));
 });

function my_map_add() {
	var cordinates1 = document.getElementById('cord1').value;
	var cordinates2 = document.getElementById('cord2').value;
	var myMapCenter = new google.maps.LatLng(cordinates1, cordinates2);
	var myMapProp = {center:myMapCenter, zoom:12, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
	var map = new google.maps.Map(document.getElementById("my_map_add"),myMapProp);
	var marker = new google.maps.Marker({position:myMapCenter});
	marker.setMap(map);
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

function book(base_url,pid,uid){
	var obj, dbParam, xmlhttp, myObj;
	var hr = new XMLHttpRequest();
	var pid = pid;
	var uid = uid;
	var book = 'book';
	dbParam = "pid="+pid+"&uid="+uid+"&book="+book;
	if(pid=="" || uid=="" || book==""){
		returnFunctions.showSuccessToaster('Ensure you are logged in!', 'warning');
	}else{			
	hr.open("POST", base_url+"Processor/book", true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
		if(hr.readyState == 4 && hr.status == 200) {
			var return_data = hr.responseText;
			var getObj = JSON.parse(return_data);
			  if(getObj.error){
				  
				setTimeout(function() {
				  	$('#nazac_loader').hide();
				 }, 2000);
				  
				setTimeout(function() {
					returnFunctions.showSuccessToaster(getObj.error, 'warning');
				}, 2500);
 		
			  }
			  if(getObj.success){
				  
				$('#nazac_loader').hide();
 				returnFunctions.showSuccessToaster(getObj.success, 'success');
				setTimeout(function() {
				   redirectPage(base_url+'member/my-booking');
				 }, 2000);
				  
			 }
		}
	};
	hr.send(dbParam); // Actually execute the request	
		$('#nazac_loader').show();
		
	}
}

function cancelBooking(base_url,id){
	var obj, dbParam, xmlhttp, myObj;
	var hr = new XMLHttpRequest();
	var id = id;
	var userid = document.getElementById('userid').value;
	var cancelBook = 'cancelBook';
	dbParam = "id="+id+"&cancelBook="+cancelBook+"&userid="+userid;
	if(id=="" || cancelBook==""){
		returnFunctions.showSuccessToaster('Unexpected Error Occured! Try Again.', 'warning');
	}else{			
	hr.open("POST", base_url+"Processor/cancelBooking", true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
		if(hr.readyState == 4 && hr.status == 200) {
			var return_data = hr.responseText;
			var getObj = JSON.parse(return_data);
			  if(getObj.error){
				  
				setTimeout(function() {
				  	$('#nazac_loader').hide();
				 }, 2000);
				  
				setTimeout(function() {
					returnFunctions.showSuccessToaster(getObj.error, 'warning');
				}, 2500);
 		
			  }
			  if(getObj.success){
				$('#nazac_loader').hide();
 				returnFunctions.showSuccessToaster(getObj.success, 'success');
				setTimeout(refreshThisPage,2500);
			 }
		}
	};
	hr.send(dbParam); // Actually execute the request	
		$('#nazac_loader').show();
		
	}
}

$("#contact").on("click", function(){
	var obj, dbParam, xmlhttp, myObj;
	var hr = new XMLHttpRequest();
	var name = document.getElementById('name').value;
	var phone = document.getElementById('phone').value;
	var email = document.getElementById('email').value;
	var message = document.getElementById('message').value;
	var base_url = document.getElementById('baseurl').value;
	var contact = 'contact';
	dbParam = "name="+name+"&phone="+phone+"&email="+email+"&message="+message+"&contact="+contact;
	if(name=="" || phone=="" || email=="" || message==""){
		returnFunctions.showSuccessToaster('Please fill all fields!', 'warning');
	}else{
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if( !emailReg.test(email) ) {
			returnFunctions.showSuccessToaster('Please use a valid email address!', 'warning');
		}else{
			hr.open("POST", base_url+"Processor/contact", true);
			hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			hr.onreadystatechange = function() {
				if(hr.readyState == 4 && hr.status == 200) {
					var return_data = hr.responseText;
					var getObj = JSON.parse(return_data);
					  if(getObj.error){

						setTimeout(function() {
							$('#nazac_loader').hide();
						 }, 2000);

						setTimeout(function() {
							returnFunctions.showSuccessToaster(getObj.error, 'warning');
						}, 2500);

					  }
					  if(getObj.success){
						$('#nazac_loader').hide();
						returnFunctions.showSuccessToaster(getObj.success, 'success');
						setTimeout(refreshThisPage,2500);
					 }
				}
			};
			hr.send(dbParam); // Actually execute the request	
			$('#nazac_loader').show();
		
		}
	}
});

$("#serchbutton").on("click", function(){
	var base_url = document.getElementById('baseurl').value;
	var slocation = document.getElementById('slocation').value;
	var scategory = document.getElementById('scategory').value;
	var stype = document.getElementById('stype').value;
	//var sbedroom = document.getElementById('sbedroom').value;
	//var sbath = document.getElementById('sbath').value;
	var sbudget = document.getElementById('sbudget').value;
	//var sminarea = document.getElementById('sminarea').value;
	if(slocation=="" || scategory=="" || stype=="" || sbudget==""){
		returnFunctions.showSuccessToaster('Please fill/select all necessary fields!', 'warning');
	}else{
		var url = slocation+"-"+scategory+"-"+stype+"-"+sbudget;
	window.location = base_url+"users/user/property-listing-search/"+url;
	}
});

$("#clicksug").on("click", function(){
	$('#sug').slideToggle('slow').css("dispaly","block");
});

$("#report_vacancy").on("click", function(){
	var obj, dbParam, xmlhttp, myObj;
	var hr = new XMLHttpRequest();
	var base_url = document.getElementById('baseurl').value;
	var propertytype = document.getElementById('propertytype').value;
	var location = document.getElementById('location').value;
	var sugloca = document.getElementById('sugloca').value;
	var lodgename = document.getElementById('lodgename').value;
	var lodgearea = document.getElementById('lodgearea').value;
	var roomnum = document.getElementById('roomnum').value;
	var descript = document.getElementById('descript').value;
	var userid = document.getElementById('userid').value;
	dbParam = "propertytype="+propertytype+"&location="+location+"&sugloca="+sugloca+"&lodgename="+lodgename+"&lodgearea="+lodgearea+"&roomnum="+roomnum+"&descript="+descript+"&userid="+userid;
	if(propertytype=="" || lodgename=="" || lodgearea==""){
		returnFunctions.showSuccessToaster('Please fill/select all necessary fields!', 'warning');
	}else{
			hr.open("POST", base_url+"Processor/report_vacancy", true);
			hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			hr.onreadystatechange = function() {
				if(hr.readyState == 4 && hr.status == 200) {
					var return_data = hr.responseText;
					var getObj = JSON.parse(return_data);
					  if(getObj.error){

						setTimeout(function() {
							$('#nazac_loader').hide();
						 }, 2000);

						setTimeout(function() {
							returnFunctions.showSuccessToaster(getObj.error, 'warning');
						}, 2500);

					  }
					  if(getObj.success){
						$('#nazac_loader').hide();
						returnFunctions.showSuccessToaster(getObj.success, 'success');
						setTimeout(refreshThisPage,2500);
					 }
				}
			};
			hr.send(dbParam); // Actually execute the request	
			$('#nazac_loader').show();
	}
});

$("#change_password").on("click", function(){
			var obj, dbParam, xmlhttp, myObj, regbox;
	        var hr = new XMLHttpRequest();
	        var userid = document.getElementById('userid').value;
			var pass = document.getElementById('newpass').value;
	        var cpass = document.getElementById('cnewpass').value;
	        var oldpass = document.getElementById('oldpass').value;
			var base_url = document.getElementById('baseurl').value;
	        var regbox_passUpdate = 'user';
			dbParam = "pass="+pass+"&cpass="+cpass+"&regbox_passUpdate="+regbox_passUpdate+"&userid="+userid+"&oldpass="+oldpass;
	if( pass=="" || cpass=="" || oldpass==""){
		returnFunctions.showSuccessToaster('Error! Invalid Password! Fill all fields', 'warning');
	}else{
		 if(pass!=cpass){
			 returnFunctions.showSuccessToaster('Password does not match!', 'warning');
		 }else{
			if(pass.length<8 || pass.length>36){
				returnFunctions.showSuccessToaster('Password length should be between 8 - 36 characters!', 'warning');
			}else{		
			hr.open("POST", base_url+"Processor/update_password", true);
			hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			hr.onreadystatechange = function() {
				if(hr.readyState == 4 && hr.status == 200) {
					var return_data = hr.responseText;
					var getObj = JSON.parse(return_data);
					  if(getObj.error){

						setTimeout(function() {
							$('#nazac_loader').hide();
						 }, 2000);

						setTimeout(function() {
							returnFunctions.showSuccessToaster(getObj.error, 'warning');
						}, 2500);

					  }
					  if(getObj.success){
						$('#nazac_loader').hide();
						returnFunctions.showSuccessToaster(getObj.success, 'success');
						setTimeout(refreshThisPage,2500);
					 }
				}
			};
			hr.send(dbParam); // Actually execute the request	
			$('#nazac_loader').show();
		}//pass
	   }//pass
	}
});

$("#emailSubscribe").on("click", function(){
	var obj, dbParam, xmlhttp, myObj, regbox;
    var hr = new XMLHttpRequest();					
	var email = document.getElementById('subscribe_Email').value;
	var base_url = document.getElementById('baseurl').value;
	var subscribe_email = 'subscribe_email';
	dbParam = "email="+email+"&subscribe_email="+subscribe_email;
	if(email==""){
		returnFunctions.showSuccessToaster('Error! Enter Email Address!', 'warning');
	}else{
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if( !emailReg.test(email) ) {
			returnFunctions.showSuccessToaster('Please use a valid email address!', 'warning');
		}else{
			hr.open("POST", base_url+"Processor/subscribe_email", true);
			hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			hr.onreadystatechange = function() {
				if(hr.readyState == 4 && hr.status == 200) {
					var return_data = hr.responseText;
					var getObj = JSON.parse(return_data);
					  if(getObj.error){

						setTimeout(function() {
							$('#nazac_loader').hide();
						 }, 2000);

						setTimeout(function() {
							returnFunctions.showSuccessToaster(getObj.error, 'warning');
						}, 2500);

					  }
					  if(getObj.success){
						$('#nazac_loader').hide();
						returnFunctions.showSuccessToaster(getObj.success, 'success');
						  document.getElementById('subscribe_Email').value = "";
					 }
				}
			};
			hr.send(dbParam); // Actually execute the request	
			$('#nazac_loader').show();
		}
	}
	
});


$("#continue_to_pay").on("click", function(){
	var obj, dbParam, xmlhttp, myObj, regbox;
    var hr = new XMLHttpRequest();
	var url_hash = document.getElementById('url_hash').value;
	var b_hash = document.getElementById('b_hash').value;
	var p_hash = document.getElementById('p_hash').value;
	var u_hash = document.getElementById('u_hash').value;
	var paytype_hash = document.getElementById('paytype_hash').value;
	var pay_type = $("input[name='gateway']:checked").val();
	var base_url = document.getElementById('baseurl').value;
	var continue_to_pay = 'continue_to_pay';
	dbParam = "b_hash="+b_hash+"&p_hash="+p_hash+"&u_hash="+u_hash+"&pay_type="+pay_type+"&paytype_hash="+paytype_hash+"&continue_to_pay="+continue_to_pay;
	if(!pay_type){
		returnFunctions.showSuccessToaster('Error! Please select a payment method!', 'warning');
	}else{
		if(b_hash=="" || p_hash=="" || u_hash==""){
			returnFunctions.showSuccessToaster('Unexpected Error! Ensure you are logged in!', 'warning');
		}else{
			
		  if(pay_type=='online'){
			  returnFunctions.showSuccessToaster('Online Instant Payment not available now!', 'warning');
		  }
		  
		  if(pay_type=='transfer' || pay_type=='deposit'){
		
			hr.open("POST", base_url+"Processor/property_payment", true);
			hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			hr.onreadystatechange = function() {
				if(hr.readyState == 4 && hr.status == 200) {
					var return_data = hr.responseText;
					var getObj = JSON.parse(return_data);
					  if(getObj.error){

						setTimeout(function() {
							$('#nazac_loader').hide();
						 }, 2000);

						setTimeout(function() {
							returnFunctions.showSuccessToaster(getObj.error, 'warning');
						}, 2500);

					  }
					
					  if(getObj.success){
						$('#nazac_loader').hide();
						redirectPage(base_url+'users/member/payment-center/'+p_hash+'/'+b_hash+'/'+pay_type+'/'+getObj.return.nazac_renting_id+'/'+url_hash);
					 }
				}
			};
			hr.send(dbParam); 
			$('#nazac_loader').show();
			  
		  }
			
		}
	}
});

$(".isgateway").on("click", function(){
	var pay_type = $("input[name='gateway']:checked").val()
	if(!pay_type){
		returnFunctions.showSuccessToaster('Error! Try refreshing your page!', 'warning');
	}else{
		if(pay_type=='transfer' || pay_type=='deposit'){
			 $('#trnfpay').click();
		  }
		
		if(pay_type=='online'){
			  returnFunctions.showSuccessToaster('Online Instant Payment not available now!', 'warning');
		  }
	}
});


$(document).ready(function(e) {
		  var base_url = document.getElementById('baseurl').value;
          $('#payment_teller').on('change',(function(e) {
			  	var paymentid = document.getElementById('paymentid').value;
				var file_data = $('#payment_teller').prop('files')[0];   
				var form_data = new FormData();                  
				form_data.append('payment_teller', file_data);
			  	form_data.append('paymentid', paymentid);
				$.ajax({
					url: base_url+"Processor/upload_payment_prove", // point to server-side PHP script 
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					success: function(return_data){
						$('#nazac_loader').hide();
						returnFunctions.showSuccessToaster(return_data, 'success');
						setTimeout(refreshThisPage,2500);
					}
				 });
			  $('#nazac_loader').show();
       }));
 });


function cancelRenting(base_url,id){
	var obj, dbParam, xmlhttp, myObj;
	var hr = new XMLHttpRequest();
	var id = id;
	var userid = document.getElementById('userid').value;
	var cancelRenting = 'cancelRenting';
	dbParam = "id="+id+"&userid="+userid+"&cancelRenting="+cancelRenting;
	if(id=="" || cancelRenting==""){
		returnFunctions.showSuccessToaster('Unexpected Error Occured! Try Again.', 'warning');
	}else{			
	hr.open("POST", base_url+"Processor/cancelRenting", true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
		if(hr.readyState == 4 && hr.status == 200) {
			var return_data = hr.responseText;
			var getObj = JSON.parse(return_data);
			  if(getObj.error){
				  
				setTimeout(function() {
				  	$('#nazac_loader').hide();
				 }, 2000);
				  
				setTimeout(function() {
					returnFunctions.showSuccessToaster(getObj.error, 'warning');
				}, 2500);
 		
			  }
			  if(getObj.success){
				$('#nazac_loader').hide();
 				returnFunctions.showSuccessToaster(getObj.success, 'success');
				setTimeout(refreshThisPage,2500);
			 }
		}
	};
	hr.send(dbParam); // Actually execute the request	
		$('#nazac_loader').show();
		
	}
}

document.getElementById('shopeprint').style.display = 'none';
function printDiv() {    
    var printContents = document.getElementById('DivIdToPrint').innerHTML;
    var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = printContents;
	 document.getElementById('hideprint').style.display = 'none';
	 document.getElementById('imghide').style.display = 'none';
	 document.getElementById('shopeprint').style.display = '';
   }
printDiv();
function printo() {    
     window.print();
   }

function client_reviewing(){
	var obj, dbParam, xmlhttp, myObj, regbox;
    var hr = new XMLHttpRequest();
	var userid = document.getElementById('nazac_uid').value;
	var review = document.getElementById('review').value;
	var base_url = document.getElementById('baseurl').value;
	dbParam = "userid="+userid+"&review="+review;
		if(userid=="" || review==""){
			returnFunctions.showSuccessToaster('Unexpected Error! Ensure you have entered a review!', 'warning');
		}else{
		
			hr.open("POST", base_url+"Processor/client_review", true);
			hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			hr.onreadystatechange = function() {
				if(hr.readyState == 4 && hr.status == 200) {
					var return_data = hr.responseText;
					var getObj = JSON.parse(return_data);
					  if(getObj.error){

						setTimeout(function() {
							$('#nazac_loader').hide();
						 }, 2000);

						setTimeout(function() {
							returnFunctions.showSuccessToaster(getObj.error, 'warning');
						}, 2500);

					  }
					
					  if(getObj.success){
						$('#nazac_loader').hide();
						returnFunctions.showSuccessToaster(getObj.success, 'success');
					 }
				}
			};
			hr.send(dbParam); 
			$('#nazac_loader').show();
	}
};
