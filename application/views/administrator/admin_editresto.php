<h3> Edit Restaurant </h3>
	<?php
			$options = array(
		    'rows' => 10,
		    'cols' => 10
		);
		
		echo form_hidden("myUpdateID",$myUpdateID);
		echo form_open_multipart('administrator/attemptEditResto',"style='text-align:left;'")."<br>";	
		echo "NAME : ".form_input("name",$myresto[0]->name)."<br>";
		echo "OWNER : ".form_input("owner",$myresto[0]->owner)."<br>";
		echo "MOBILE : ".form_input("mobile",$myresto[0]->mobile)."<br>";
		echo "LANDLINE : ".form_input("landline",$myresto[0]->landline)."<br>";
		echo "LATITUDE (from Google): ".form_input("google_lat",$myresto[0]->google_lat)."<br>";
		echo "LONGTITUDE (from Google): ".form_input("google_long",$myresto[0]->google_long)."<br>";
		echo "NUMBER OF SLOTS FOR RESERVATION : ".form_input("slots",$myresto[0]->reservation_slots)."<br>";
		echo "Cuisine : ".form_input("cuisine",$myresto[0]->cuisine)."<br>";
		echo "Logo Photo : "."<input type='file' name='logo_photo' size='20' />"."<br>";
		echo "Menu Photo : "."<input type='file' name='menu_photo' size='20' />"."<br>";
		echo "Website URL : ".form_textarea("url",$myresto[0]->websiteurl)."<br>";
		echo "Description : ".form_textarea("description",$myresto[0]->description)."<br>";
		echo "ADDRESS : ".form_textarea("address",$myresto[0]->address)."<br>";
		echo "CITY : ".form_textarea("city",$myresto[0]->city)."<br>";
		echo "USERNAME : ".form_input("username",$myresto[0]->username)."<br>";
		echo "PASSWORD : ".form_password("password")."<br>";
		
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
		
		echo "Opening Time: "."<input type='time' name='open_time' value=".$myresto[0]->open_time.">"."<br>";
		echo "Closing Time: "."<input type='time' name='close_time' value=".$myresto[0]->close_time.">"."<br>";
		echo "Resting Time Start: "."<input type='time' name='rest_start' value=".$myresto[0]->rest_start.">"."<br>";
		echo "Resting Time End: "."<input type='time' name='rest_end' value=".$myresto[0]->password.">"."<br>";
		
		echo form_reset("reset","RESET");
		echo form_submit("submit","ADD")."<br>";
		echo form_close();
	?>
<br><br>