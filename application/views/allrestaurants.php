
	<div id="content-container">		
		<div id="body-container">
			<div class="blurb-rows">
				<blurb class="small" id="filter">
					<?php	$attributes = array( "method" => "GET"); echo form_open("dashboard",$attributes); ?>
						<div class="blurb-header"><h2>Filter Results</h2></div>
							<h3>City</h3>
							<div class="options">
								<?php
									foreach($cityResults as $city)
									{
										echo "<input name='filterTag[]' type='checkbox' class='check' id='American' value=".$city->city."><label for='American'>".$city->city."</label><br>";
									}
								?> 
							</div>
							<hr>
							<h3>Cuisine</h3>
							<div class="options">																		
								<?php
									foreach($cuisineResults as $cuisine)
									{
										echo "<input name='filterTag[]' type='checkbox' class='check' id='American' value=".$cuisine->cuisine."><label for='American'>".$cuisine->cuisine."</label><br>";
									}
								?> 
							</div>
							<br>
							<div align='center'>
						<?php
							echo form_submit(
							"submit","LOOK FOR RESTOS!", 
							"style=' background: #d8462d; color: #fffeee; padding:5px; padding-left:10px; padding-right:10px;
							-webkit-border-radius: 10px;
						      -moz-border-radius: 10px;
						           border-radius: 10px; 
							-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);
							      -moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);
							           box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);
							   display: inline-block; -webkit-appearance: none;'"
							);
						?>
						</div>
					</form>
				</blurb>				
				<blurb id="restaurant-listing">
					<!--
					<a href="restaurant.html">
					<div class="restaurant">
						<div class="restaurant-info">
							<h2>Restaurant Name</h2>
							<ul>
								<li class="restaurant-info" id="cuisine">Asian, Japanese</li>
								<li class="restaurant-info" id="operating-hours">Tue - Sun: 9:00 AM - 10:30 PM <br> Closed on Mondays</li>
								<li class="restaurant-info" id="phone-number">(02) 468 1012, (02) 358 1321</li>  
								<li class="restaurant-info" id="address">123 Maginhawa Street, Teacher's Village, Diliman, Quezon City</li>
								<li class="restaurant-info" id="restaurant-highlights"><i>Al Fresco Dining, Buffet</i></li>
								<li class="restaurant-info" id="budget">P150 - 300 per person </li>
							</ul>
						</div>
						<div class="image-rate">						
							<img src="resources/images/splash.jpg" class="restaurant-image">
							<div class="rating">
								<span class="rate">5.0<span>
							</div>						
						</div>
					</div>
					</a>-->
					
					<?php
					if(isset($restaurantResults) && is_array($restaurantResults))
					{
						foreach($restaurantResults as $resto)
						{
							echo "<div class='restaurant'><div class='restaurant-info'>";
							echo "<h2 style='color: #ccd7cd;'>".anchor("dashboard/restaurant?id=".$resto->restaurant_id, $resto->name)."</h2>";
							echo "<ul>";
							echo "<li class='restaurant-info' id='cuisine'>".$resto->cuisine."</li>";
							echo "<li class='restaurant-info' id='operating-hours'>".$resto->open_time." to ".$resto->rest_start."</li>";
							echo "<li class='restaurant-info' id='operating-hours'>".$resto->rest_end." to ".$resto->close_time."</li>";
							echo "<li class='restaurant-info' id='phone-number'> ".$resto->landline." & ".$resto->mobile." </li>";
							echo "<li class='restaurant-info' id='address'>".$resto->address."</li>";
							echo "<li class='restaurant-info' id='restaurant-highlights'>".$resto->description."</li>";
							echo "<li class='restaurant-info' id='city'>".$resto->city."</li>";
							echo "</ul>";
							echo "</div>";
							echo "<div class='image-rate'>";
							echo "<img src='".$resto->logo_photo."' width='200' height='200' class='restaurant-image'>"."<div class='rating'>"."<span class='rate'>";
							$rating = $this->Rating_Model->getRatingByRestaurant($resto->restaurant_id);
							if(isset($rating) == TRUE)
							{
								//echo $rating[0]->rating;
							}
							echo "<span></div></div></div></a>";
	
						}
					}
					else
					{
							echo "<div class='restaurant' style='min-width: 800px;'><h1> NO RESTOS FOUND :( <br>TRY AGAIN! :) </h1></div>";
					}
					?>
				</blurb>
			</div>
		</div>
	</div>	