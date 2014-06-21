<h3> Add Restaurant </h3>
	<?php
			$options = array(
		    'rows' => 10,
		    'cols' => 10
		);
		echo form_open_multipart('administrator/attemptAddRestaurant',"style='text-align:left;'")."<br>";	
		echo "NAME : ".form_input("name","")."<br>";
		echo "OWNER : ".form_input("owner","")."<br>";
		echo "MOBILE : ".form_input("mobile","")."<br>";
		echo "LANDLINE : ".form_input("landline","")."<br>";
		echo "LATITUDE (from Google): ".form_input("google_lat","")."<br>";
		echo "LONGTITUDE (from Google): ".form_input("google_long","")."<br>";
		echo "NUMBER OF SLOTS FOR RESERVATION : ".form_input("slots","")."<br>";
		echo "Cuisine : ".form_input("cuisine","")."<br>";
		echo "Logo Photo : "."<input type='file' name='logo_photo' size='20' />"."<br>";
		echo "Menu Photo : "."<input type='file' name='menu_photo' size='20' />"."<br>";
		echo "Website URL : ".form_textarea("url")."<br>";
		echo "Description : ".form_textarea("description","")."<br>";
		echo "ADDRESS : ".form_textarea("address","")."<br>";
		echo "CITY : ".form_textarea("city","")."<br>";
		echo "USERNAME : ".form_input("username","")."<br>";
		echo "PASSWORD : ".form_password("password","")."<br>";
		
		
		//AUTOACCEPT
		$optionsThree = array(
			 0  => 'DO MANUAL CONFIRMATION OF RESERVATIONS',
			 1  => 'ACCEPT RESERVATIONS AUTOMATICALLY'
		);
		echo "AUTO ACCEPT: : ".form_dropdown("autoaccept",$optionsThree)."<br>";
		
		//STATUS
		$optionsTwo = array(
			 'O'  => 'OPEN',
			 'F'  => 'FULL',
		);
		echo "RESTAURANT STATUS: ".form_dropdown("status",$optionsTwo)."<br>";
		
		//SELECT FOR HQ OPTION
		$hqOptionsOne = array();
		foreach ($hqOptions as $key => $value) {
			$hqOptionsOne[ $value->hq_id ] = $value->hqname;
		}
		echo "HQ: ".form_dropdown("hq",$hqOptionsOne)."<br>";
		
		echo "Opening Time: "."<input type='time' name='open_time'>"."<br>";
		echo "Closing Time: "."<input type='time' name='close_time'>"."<br>";
		echo "Resting Time Start: "."<input type='time' name='rest_start'>"."<br>";
		echo "Resting Time End: "."<input type='time' name='rest_end'>"."<br>";
		
		echo form_reset("reset","RESET");
		echo form_submit("submit","ADD")."<br>";
		echo form_close();
	?>
<br><br>