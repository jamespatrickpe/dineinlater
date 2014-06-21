<h3>Update Restaurant </h3>
	<?php
		echo form_open_multipart('administrator/attemptAddRestaurant',"style='text-align:left;'")."<br>";	
		echo "NAME: ".form_input("name","")."<br>";
		echo "OWNER: ".form_input("owner","")."<br>";
		echo "MOBILE: ".form_input("mobile","")."<br>";
		echo "LANDLINE: ".form_input("landline","")."<br>";
		echo "LATITUDE (from Google): ".form_input("google_lat","")."<br>";
		echo "LONGTITUDE (from Google): ".form_input("google_long","")."<br>";
		echo "NUMBER OF SLOTS FOR RESERVATION: ".form_input("slots","")."<br>";
		echo "Logo Photo"."<input type='file' name='logo_photo' size='20' />"."<br>";
		echo "Menu Photo"."<input type='file' name='menu_photo' size='20' />"."<br>";
		echo "Website URL".form_textarea()."<br>";
		echo "Description".form_textarea()."<br>";
		echo "USERNAME: ".form_input("username","")."<br>";
		echo "PASSWORD: ".form_password("password","")."<br>";
		
		echo form_reset("reset","RESET");
		echo form_submit("submit","ADD")."<br>";
		echo form_close();
	?>
<br><br>