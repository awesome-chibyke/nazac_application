<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0&appId=2286222675001622&autoLogAppEvents=1"></script>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '2286222675001622',
      cookie     : true,
      xfbml      : true,
      version    : 'v5.0'
    });
    //FB.AppEvents.logPageView(); 
	  FB.getLoginStatus(function(response) {
    	statusChangeCallback(response);
	  });
  };
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
	
	function statusChangeCallback(response){
		if(response.status == 'connected'){
			console.log('Is Loggedin');
		}else{
			console.log('Not Loggedin');
		}
	}
	
	
	function fblogin(){
		FB.login(function(response) {
			if(response.status == 'connected'){
				console.log('Is Loggedin');
			}else{
				console.log('Not Loggedin');
			}
		}, {scope: 'public_profile,email'});
	}
	
	function checkLoginState() {
	  FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	  });
	}
	
</script>