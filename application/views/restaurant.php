<div id="content-container">		
		<div id="body-container">
			<div class="blurb-rows">				
				<div class="blurb-stacks">	
					<blurb>
						<div class="blurb-header"><h2>Restaurant</h2></div>
							<div class="small block">
							<table>
								<tr>
									<td>
										
										<ul><div class="user-photo"><img></div>
											<li class="restaurant-info" id="cuisine">[restaurant_cuisine]</li>
											<li class="restaurant-info" id="operating-hours">[restaurant_hours]</li>
											<li class="restaurant-info" id="phone-number">[restaurant_phone]</li>  
											<li class="restaurant-info" id="address">[restaurant_address]</li>
											<li class="restaurant-info" id="budget">[restaurant_budget]</li>
										</ul>
									</td>
									<td>
										<iframe class="map" src="http://wikimapia.org/#lang=en&lat=14.592264&lon=121.061847&z=17&m=b" frameborder="0"></iframe>
									</td>
								</tr>
							</table>
							</div>
							<div class="small">
								<p>
									[Description]
								</p>
								Tags: <a href="#">Tag1</a>, <a href="#">Tag2</a>, <a href="#">Tag3</a>,
							</div>
					</blurb>
					<blurb>
						<div class="blurb-header"><h2>Image Gallery</h2></div>
						<gallery>
							<img src="resources/images/splash.jpg">
							<img src="resources/images/splash.jpg">
							<img src="resources/images/splash.jpg">
							<img src="resources/images/splash.jpg">
							<img src="resources/images/splash.jpg">			
						</gallery>
					</blurb>
					</div>
				<blurb id="commands">
					<div class="blurb-stacks">
						<div class="rate">4.0</div>
						<div id="rating">
							<span>12345 Review/s</span>
						</div>
						<a class="action" href="menu.html">View Menu</a>
						<a class="action" id="review-trigger">Read Reviews</a>
						<a class="action" id="new-review-trigger">Write a Review</a>
						<a class="action" id="reservation-trigger">Reserve</a>
						<div id="reservation-form">
							<form action="reserve">
								Date of Reservation:<br>
								<input type="date" value="[date]"><br>
								Time: 
								<input type="time" name="time"  value="[time]">
								<br>
								No of People:
								<input type="number" name="no_of_people" min="1" max="20" value="[customer_review]"><br>
								Additional Instructions
								<br>
								<input type="text" class="textArea" name="note" value="[note]" >
								<button>Submit</button>
							</form>
						</div>
					</div>
				</blurb> 

			</div>				
				<!--new review-->
				<blurb id="new-review">
					<div class="blurb-header"><h2>Write a Review</h2></div>
					<form action="review">
						<div class="blurb-stacks">
							<div class="review-header">
								<span><label for="review_title">Review Title:</label></br><input type="text" name="review_title" placeholder="Write your review here"></span>
								<span>Rating: <br>
									<select name="rating">
										<option value="1">1 Star</option>
										<option value="2">2 Stars</option>
										<option value="3">3 Stars</option>
										<option value="4">4 Stars</option>
										<option value="5">5 Stars</option>
									</select>
								</span>
							</div>
							Review:<br>
							<textarea name="customer_review" class="review-body" placeholder="Write your review here"></textarea><br>
						</div><br>
						<button action="submit">Submit</button>
					</form>
				</blurb>
				<!--review area-->
				<blurb id="reviews">
					<div class="blurb-header"><h2>[12345] Reviews</h2></div>
				<!--review stub layout-->
					<div class="review-stub">
						<div class="blurb-stacks">
							<div class="review-header">
								<span class="review-details"><h3>[Review_Title]</h3>[Review_Date]</span> 
								<span class="review-rating"><h3 class="rate">4.0</h3></span>
							</div>
							<div class="review-body">
								<p>[Review]</p>								
							</div>
						</div>
					</div>
				<!--end of stub-->
				</blurb>
			</div>
	</div>