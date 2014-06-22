
	<div id="content-container">		
		<div id="body-container">
			<div class="blurb-rows">
				<blurb class="small" id="filter">
					<?php form_open('dashboard') ?>
						<div class="blurb-header"><h2>Filter Results</h2></div>
							<h3>City</h3>
							<div class="options">
								<?php
									foreach($cityResults as $city)
									{
										echo "<input name='city' type='checkbox' class='check' id='American' value=".$city->city."><label for='American'>".$city->city."</label><br>";
									}
								?> 
							</div>
							<hr>
							<h3>Cuisine</h3>
							<div class="options">																		
								<?php
									foreach($cuisineResults as $cuisine)
									{
										echo "<input name='cuisine' type='checkbox' class='check' id='American' value=".$cuisine->cuisine."><label for='American'>".$cuisine->cuisine."</label><br>";
									}
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
					
					foreach($restaurantResults as $resto)
					{
						echo "<div class='restaurant'><div class='restaurant-info'>";
						echo "<h2 style='background: #ccd7cd;'>".anchor("dashboard/restaurant?id=".$resto->restaurant_id, $resto->name)."</h2>";
						echo "<ul>";
						echo "<li class='restaurant-info' id='cuisine'>".$resto->cuisine."</li>";
						echo "<li class='restaurant-info' id='operating-hours'>".$resto->open_time." to ".$resto->rest_start."</li>";
						echo "<li class='restaurant-info' id='operating-hours'>".$resto->rest_start." to ".$resto->close_time."</li>";
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

					?>
				</blurb>
			</div>
		</div>
	</div>	