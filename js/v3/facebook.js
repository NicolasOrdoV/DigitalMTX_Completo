window.fbAsyncInit = function() {
    // FB JavaScript SDK configuration and setup
    FB.init({
      appId      : '247010899894301', // FB App ID
      cookie     : true,  // enable cookies to allow the server to access the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v3.2' // use graph api version 2.8
    });
    
    // Check whether the user already logged in
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            //display user data
            getFbUserData();
        }
    });
};

// Load the JavaScript SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Facebook login with JavaScript SDK
function fbLogin() {
    FB.login(function (response) {
        if (response.authResponse) {
            // Get and display the user profile data
            getFbUserData();
        } else {
        	M.toast({html: 'Se canceló el inicio de sesión con Facebook o no se autorizo completamente'});
            //document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
        }
    }, {scope: 'email'});
}

// Fetch the user profile data from facebook
function getFbUserData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
    function (response) {
        //document.getElementById('fbLink').setAttribute("onclick","fbLogout()");
        //document.getElementById('fbLink').innerHTML = 'Logout from Facebook';
        //document.getElementById('status').innerHTML = '<p>Thanks for logging in, ' + response.first_name + '!</p>';
        //document.getElementById('userData').innerHTML = '<h2>Facebook Profile Details</h2><p><img src="'+response.picture.data.url+'"/></p><p><b>FB ID:</b> '+response.id+'</p><p><b>Name:</b> '+response.first_name+' '+response.last_name+'</p><p><b>Email:</b> '+response.email+'</p><p><b>Gender:</b> '+response.gender+'</p><p><b>FB Profile:</b> <a target="_blank" href="'+response.link+'">click to view profile</a></p>';
        var datos = {
			accion : 'facebook_login',
			nombres : response.first_name,
			apellidos : response.last_name,
			usuario : response.email,
			genero : response.gender,
		};
		$.ajax({
			url: "facebook.php",
			async: true,
			type: 'POST',
			data: datos,
			success: function(result) {
                console.log(result);
				if (result == 1) {
					M.toast({html: 'Redirigiendo'});
					setTimeout(function(){
						window.location.href = 'https://digitalmtx.com'
					}, 1000);
				} else {
					M.toast({html: 'Ha ocurrido un error al intentar iniciar sesión con Facebook'});
				}
			}
		});
    });
}

// Logout from facebook
function fbLogout() {
    FB.logout(function() {
        /*document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
        document.getElementById('fbLink').innerHTML = '<img src="images/fb-login-btn.png"/>';
        document.getElementById('userData').innerHTML = '';
        document.getElementById('status').innerHTML = '<p>You have successfully logout from Facebook.</p>';*/
        M.toast({html: 'Redirigiendo'});
        setTimeout(function(){
			window.location.href = 'https://digitalmtx.com'
		}, 1000);
    });
}