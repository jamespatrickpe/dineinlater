<!DOCTYPE HTML>
<html>
<head>
	<base href="<?php echoMe( base_url() ); ?>">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="resources/jquery.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="resources/main.css" type="text/css">
	<link rel="stylesheet" href="<?php echoMe($css); ?>" type="text/css">
	<title>Dine-in Later</title>
</head>
<body>	
	<!--navigation-->
	<div id="navigation">
		<?php echo anchor('welcome/index', ' ', 'class="logo"') ?>
		<a href="allrestaurants.html"><div class="navigation-stub">All Restaurants</div></a>
		<a href="blogger-reviews.html"><div class="navigation-stub">Blogger Reviews</div></a>
		<div class="navigation-stub"><?php	$attributes = array(); echo form_open("restaurant/search",$attributes); ?>
			<input id="navigation-search" name="keyword" placeholder="Food/Restaurant/Place"><input type="submit" class="searchButton" value="Search"></form></div>
		<div id="account">
			<?php 
				if($this->session->userdata('id'))
				{
					$mySession = $this->session->all_userdata();
					if( isset( $mySession['firstname'] ) == TRUE && isset( $mySession['lastname'] ) == TRUE )
					{
						echo "<span>".$mySession['firstname']." ".$mySession['lastname']."</span> |";
					}
					else 
					{
						echo "<span>".$mySession['username']."</span> |";
					}
					echo anchor('login/logout', 'Log Out', 'class="link-class"');
				}
				else 
				{
					echo "<span id='login'>log in</span><span id='login-clicked'>log in</span> |";
					echo anchor('registration', 'register', 'class="link-class"');
				}
				?>
		</div>
	</div>
	<!--login popup-->
	<div id="background-blur">
		<div id="account-popup">
			<div id="popup-header">
				<h2>Log in</h2>
				<div class="close"></div>	
			</div>
			<?php
				$attributes = array('id' => 'signin');
				echo form_open("Login/attemptLoginFB",$attributes);
			?>
			<?php $this->load->view("login_interface"); ?>			
			</form>			
		</div>		
	</div>