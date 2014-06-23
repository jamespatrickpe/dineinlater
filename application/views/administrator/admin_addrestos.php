<h3> Add Restaurant </h3>
	<?php
			$options = array(
		    'rows' => 10,
		    'cols' => 10
		);
		echo "<table style='vertical-align: bottom;'>";
		echo "<tr>";
		echo form_open_multipart('administrator/attemptAddRestaurant',"style='text-align:left;'")."<br>";	
		echo "<tr><td>NAME :</td><td>".form_input("name","")."</td>";
		echo "<tr><td>OWNER :</td><td>".form_input("owner","")."</td>";
		echo "<tr><td>MOBILE : </td><td>".form_input("mobile","")."</td>";
		echo "<tr><td>LANDLINE : </td><td>".form_input("landline","")."</td>";
		echo "<tr><td>LATITUDE (from Google): </td><td>".form_input("google_lat","")."</td>";
		echo "<tr><td>LONGTITUDE (from Google): </td><td>".form_input("google_long","")."</td>";
		echo "<tr><td>NUMBER OF SLOTS FOR RESERVATION : </td><td>".form_input("slots","")."</td>";
		echo "<tr><td>Cuisine : </td><td>".form_input("cuisine","")."<br>";
		echo "<tr><td>Logo Photo : </td><td>"."<input type='file' name='logo_photo' size='20' />"."</td>";
		echo "<tr><td>Menu Photo : </td><td>"."<input type='file' name='menu_photo' size='20' />"."</td>";
		echo "<tr><td>Website URL : </td><td>".form_textarea("url")."</td>";
		echo "<tr><td>Description : </td><td>".form_textarea("description","")."</td>";
		echo "<tr><td>ADDRESS : </td><td>".form_textarea("address","")."</td>";
		echo "<tr><td>CITY : </td><td>".form_textarea("city","")."</td>";
		echo "<tr><td>USERNAME : </td><td>".form_input("username","")."</td>";
		echo "<tr><td>PASSWORD : </td><td>".form_password("password","")."</td>";
		
		
		//AUTOACCEPT
		$optionsThree = array(
			 0  => 'DO MANUAL CONFIRMATION OF RESERVATIONS',
			 1  => 'ACCEPT RESERVATIONS AUTOMATICALLY'
		);
		echo "<tr><td>AUTO ACCEPT: </td><td>".form_dropdown("autoaccept",$optionsThree)."</td>";
		
		//STATUS
		$optionsTwo = array(
			 'O'  => 'OPEN',
			 'F'  => 'FULL',
		);
		echo "<tr><td>RESTAURANT STATUS: </td><td>".form_dropdown("status",$optionsTwo)."</td>";
		
		//SELECT FOR HQ OPTION
		$hqOptionsOne = array();
		foreach ($hqOptions as $key => $value) {
			$hqOptionsOne[ $value->hq_id ] = $value->hqname;
		}
		echo "<tr><td>HQ: </td><td>".form_dropdown("hq",$hqOptionsOne)."<br>";
		
		echo "<tr><td>Opening Time: </td><td>"."<input type='time' name='open_time'>"."</td>";
		echo "<tr><td>Closing Time: </td><td>"."<input type='time' name='close_time'>"."</td>";
		echo "<tr><td>Resting Time Start: </td><td>"."<input type='time' name='rest_start'>"."</td>";
		echo "<tr><td>Resting Time End: </td><td>"."<input type='time' name='rest_end'>"."</td>";
		
		echo "</table>";
		
		echo form_reset("reset","RESET");
		echo form_submit("submit","ADD")."<br>";
		echo form_close();
	?>
<br><br>