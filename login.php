<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>

<body style="background-color:orange;">
</body>

<head>
  <meta name="google-signin-client_id" content="1016760955587-c2dheguujpip3c0tka32ka9iqcf173fi.apps.googleusercontent.com">
</head>
<body>
  <div id="my-signin2"></div>
  <script>
    function onSuccess(googleUser) {
      console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
  </script>
<script>
  gapi.load('auth2', function() {
  auth2 = gapi.auth2.init({
    client_id: '1016760955587-c2dheguujpip3c0tka32ka9iqcf173fi.apps.googleusercontent.com',
    fetch_basic_profile: false,
    scope: 'profile'
  });

  // Sign the user in, and then retrieve their ID.
  auth2.signIn().then(function() {
    console.log(auth2.currentUser.get().getId());
  });
});

auth2 = gapi.auth2.init({
    client_id: 'CLIENT_ID.apps.googleusercontent.com',
    cookiepolicy: 'single_host_origin', /** Default value **/
    scope: 'profile' }); 

var options = new gapi.auth2.SigninOptionsBuilder(
        {'scope': 'email https://www.googleapis.com/auth/drive'});


googleUser = auth2.currentUser.get();
googleUser.grant(options).then(
    function(success){
      console.log(JSON.stringify({message: "success", value: success}));
    },
    function(fail){
      alert(JSON.stringify({message: "fail", value: fail}));
    });

if (auth2.isSignedIn.get()) {
  var profile = auth2.currentUser.get().getBasicProfile();
  console.log('ID: ' + profile.getId());
  console.log('Full Name: ' + profile.getName());
  console.log('Given Name: ' + profile.getGivenName());
  console.log('Family Name: ' + profile.getFamilyName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail());
}
</script>
  <script action="index.php" src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
</body>

</body>
</html>