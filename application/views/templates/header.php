<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<base href="<?php echoMe( base_url() ); ?>">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="resources/jquery.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="resources/main.css" type="text/css">
	<link rel="stylesheet" href="<?php echoMe($css); ?>" type="text/css">
	<title>Dine-in Later</title>
</head>
<body>
	
	<!-- facebook -->
	
	<script>
	var fbLoginProcess = "NONE";
	
	// This is called with the results from from FB.getLoginStatus().
		function statusChangeCallback(response) 
		{
			console.log('statusChangeCallback');
			console.log(response);
			
			// The response object is returned with a status field that lets the app know the current login status of the person.
			// Full docs on the response object can be found in the documentation for FB.getLoginStatus().
			
			if (response.status === 'connected') 
			{
				// Logged into your app and Facebook.
				testAPI();
				//alert("logged");
			} 
			else if (response.status === 'not_authorized') 
			{
				
				// The person is logged into Facebook, but not your app.
				document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
			} 
			else
			{
				// The person is not logged into Facebook, so we're not sure if they are logged into this app or not.
				//alert("You are not logged in Facebook!")
				document.getElementById('status').innerHTML = 'Please log ' + 'into Facebook.'
			}
		}
		
		// This function is called when someone finishes with the Login Button.  See the onlogin handler attached to it in the sample code below.
		function checkLoginState() 
		{
			FB.getLoginStatus(function(response){statusChangeCallback(response);});
		}
		window.fbAsyncInit = function() 
		{
			FB.init
			({
			    appId      : '642366132526437',
			    cookie     : true,  // enable cookies to allow the server to access the session
			    xfbml      : true,  // parse social plugins on this page
			    version    : 'v2.0' // use version 2.0
			});
			
			// Now that we've initialized the JavaScript SDK, we call 
			// FB.getLoginStatus().  This function gets the state of the person visiting this page and can return one of three states to 
			// the callback you provide.  They can be:
			// 1. Logged into your app ('connected')
			// 2. Logged into Facebook, but not your app ('not_authorized')
			// 3. Not logged into Facebook and can't tell if they are logged into your app or not.
			// These three cases are handled in the callback function.
			
			//FB.getLoginStatus(function(response){statusChangeCallback(response);});
		};
			
			  // Load the SDK asynchronously
			  (function(d, s, id) {
			    var js, fjs = d.getElementsByTagName(s)[0];
			    if (d.getElementById(id)) return;
			    js = d.createElement(s); js.id = id;
			    js.src = "//connect.facebook.net/en_US/sdk.js";
			    fjs.parentNode.insertBefore(js, fjs);
			  }(document, 'script', 'facebook-jssdk'));
			
			  // Here we run a very simple test of the Graph API after login is
			  // successful.  See statusChangeCallback() for when this call is made.
			  function testAPI() 
			  {
			    console.log('Welcome!  Fetching your information.... ');
			    FB.api('/me', function(response) 
			    {
			      console.log('Successful login for: ' + response.name);
			      signin = document.getElementById('signin');
			      document.getElementById('fb_id').value = response.id;
			      document.getElementById('fb_username').value = response.first_name + response.last_name; 
			      document.getElementById('fb_firstname').value = response.first_name;
			      document.getElementById('fb_lastname').value = response.last_name;
			      document.getElementById('fb_email').value = response.email;
			      document.getElementById('fb_fields').submit();
			    });
			  }
	</script>
	<?php
		$attributes = array('name' => 'fb_fields', 'id' => 'fb_fields');
		echo form_open("login/attemptLoginFB",$attributes);
	?>
		<input type="hidden" value="" name="fb_id" id="fb_id">
		<input type="hidden" value="" name="fb_username" id="fb_username">
		<input type="hidden" value="" name="fb_firstname" id="fb_firstname">
		<input type="hidden" value="" name="fb_lastname" id="fb_lastname">
		<input type="hidden" value="" name="fb_email" id="fb_email">
	</form>
		
	<!--navigation-->
	<div id="navigation">
		<?php echo anchor('welcome/index', ' ', 'class="logo"') ?>
		<a href="allrestaurants.html"><div class="navigation-stub"><?php echo anchor("dashboard/","All Restaurants","") ?></div></a>
		<a href="blogger-reviews.html"><div class="navigation-stub"><?php echo anchor("footer/bloggers","Blogger Reviews","") ?></div></a>
		<div class="navigation-stub"><?php	$attributes = array(); echo form_open("restaurant/search",$attributes); ?>
			<input id="navigation-search" name="keyword" placeholder="Food/Restaurant/Place"><input type="submit" class="searchButton" value="Search"></form></div>
		<div id="account">
			<?php 
				if($this->session->userdata('id'))
				{
					$mySession = $this->session->all_userdata();
					if( isset( $mySession['firstname'] ) == TRUE && isset( $mySession['lastname'] ) == TRUE )
					{
						echo anchor('customer', "<span>".$mySession['firstname']." ".$mySession['lastname']."</span> |", 'class="link-class"');
					}
					else 
					{
						echo anchor('customer', "<span>".$mySession['username']."</span> |", 'class="link-class"');
					}
					echo anchor('login/logout', 'Log Out', 'class="link-class"');
				}
				else 
				{
					echo anchor('login', 'login |', 'id="login"');
					//echo "<span id='login'>log in</span><span id='login-clicked'>log in</span> |"; this is annoying
					echo anchor('registration', 'register', 'class="link-class"');
				}
				?>
		</div>
	</div>