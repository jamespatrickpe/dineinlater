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
								echo "<a href='restaurant/?id=$row->restaurant_id'>
										<div class='review-header'>
										<input type='hidden' value='$row->restaurant_id' name='id'>
										<span class='review-details' onclick='document.getElementById('$row->restaurant_id').submit()'><h3>$row->name</h3>
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
									</div>
									</a>";
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