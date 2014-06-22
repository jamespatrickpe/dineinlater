<div id="content-container">		
		<div id="body-container">
			<div class="blurb-rows">				
				<div class="blurb-stacks">	
					<blurb>
					<div class="blurb-header"><h2>Search Results</h2></div>
				<!--review stub layout-->
					<div class="review-stub">
						<div class="blurb-stacks">
						<?php 
							//?id=1
							
							foreach ($result as $row) {
								echo "<div class='review-header'>
										<span class='review-details'><h3>".anchor('dashboard/restaurant?id='.$row->restaurant_id.'',$row->name)."</h3>
											<div class='user-photo'><img href='$row->logo_photo'></div>
										</span> 
										</form>
										
										<span class='review-rating'><h3 class='rate'>$row->rating</h3>
											<ul>
											<li class='restaurant-info' id='address'>$row->address</li>			
											</ul>	
										</span>
									</div>
									<div class='review-body'>
										<span class='float'>
										</br>$row->description</br>
										</span>
									</div>";
							}
						?>
							<p class="hide">
								DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription
							</p>
						</div>
					</div>
				<!--end of stub-->
				</blurb>
				</div>	
			</div>		
		</div>
</div>