
	<div id="content-container">		
		<div id="body-container">
			<div class="blurb-rows">
				<blurb class="small" id="filter">
					<form>
						<div class="blurb-header"><h2>Filter Results</h2></div>
							<h3>Cuisine</h3>
							<div class="options">
									<input type="checkbox" class="check" id="American"><label for="American">American</label><br>
									<input type="checkbox" class="check" id="Chinese"><label for="Chinese">Chinese</label><br>
									<input type="checkbox" class="check" id="Filipino"><label for="Filipino">Filipino</label><br>
									<input type="checkbox" class="check" id="French"><label for="French">French</label><br>
									<input type="checkbox" class="check" id="Indian"><label for="Indian">Indian</label><br>
									<input type="checkbox" class="check" id="Italian"><label for="Italian">Italian</label><br>
									<input type="checkbox" class="check" id="Japanese"><label for="Japanese">Japanese</label><br>
									<input type="checkbox" class="check" id="Korean"><label for="Korean">Korean</label><br>
									<input type="checkbox" class="check" id="Mediterranean"><label for="Mediterranean">Mediterranean</label><br>
									<input type="checkbox" class="check" id="Vietnamese"><label for="Vietnamese">Vietnamese</label>
								</div>
							<hr>
							<h3>City</h3>
							<div class="options">																		
									<input type="checkbox" class="check" id="makati"><label for="makati">Makati</label><br>
									<input type="checkbox" class="check" id="makati"><label for="makati">Mandaluyong</label><br>
									<input type="checkbox" class="check" id="manila"><label for="manila">Manila</label><br>
									<input type="checkbox" class="check" id="marikina"><label for="marikina">Marikina</label><br>
									<input type="checkbox" class="check" id="paranaque"><label for="paranaque">Paranaque</label><br>
									<input type="checkbox" class="check" id="pasay"><label for="pasay">Pasay</label><br>
									<input type="checkbox" class="check" id="pasig"><label for="pasig">Pasig</label><br>
									<input type="checkbox" class="check" id="san-juan"><label for="san-juan">San Juan</label><br>
									<input type="checkbox" class="check" id="taguig"><label for="taguig">Taguig</label><br>
									<input type="checkbox" class="check" id="quezon-city"><label for="quezon-city">Quezon City</label><br>
									<input type="checkbox" class="check" id="outside"><label for="outside">Outside Metro Manila</label><br><br>
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
						echo "<a href=dashboard/restaurant?id=".$resto->restaurant_id.">";
						echo "<div class='restaurant'><div class='restaurant-info'>";
						echo "<h2>".$resto->name."</h2>";
						echo "<ul>";
						echo "<li class='restaurant-info' id='cuisine'>".$resto->cuisine."</li>";
						echo "<li class='restaurant-info' id='operating-hours'>".$resto->cuisine." to ".$resto->cuisine."</li>";
						echo "<li class='restaurant-info' id='phone-number'> ".$resto->landline." & ".$resto->mobile." </li>";
						echo "<li class='restaurant-info' id='address'>".$resto->address."</li>";
						echo "<li class='restaurant-info' id='restaurant-highlights'>".$resto->description."</li>";
						echo "<li class='restaurant-info' id='city'>".$resto->city."</li>";
						echo "</ul>";
						echo "</div>";
						echo "<div class='image-rate'>";
						echo "<img src='".$resto->logo_photo."' width='200' height='200' class='restaurant-image'>"."<div class='rating'>"."<span class='rate'>";
						$rating = $this->Rating_Model->getRatingByRestaurant($resto->restaurant_id);
						echo $rating[0]->average;
						echo "<span></div></div></div></a>";

					}

					?>
				</blurb>
			</div>
		</div>
	</div>	