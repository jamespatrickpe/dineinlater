<div id="content-container">		
		<div id="body-container">
			<div class="blurb-rows">
				<blurb class="small">
					<div class="blurb-header"><h2><?php echo $restaurant[0]->name; ?></h2></div>
						<div id="greeting"><span class="username"><img src="<?php echo $restaurant[0]->logo_photo; ?>" width="200" height="200"></span></div>
					<div class="blurb-stacks" id="commands">
						<a class="action" id="resto_home-trigger">Description</a>
						<a class="action" id="resto_profile-trigger">Gallery</a>
						<a class="action" id="resto_reservation-trigger"> DINE-IN-LATER! ( Reserve ) </a>
						<a class="action" id="resto_reviews-trigger">Reviews</a> <!--view your written reviews? will return stubs-->
					</div>
				</blurb>
					<blurb class="half" id="resto_home"><div class="blurb-header"><h2>Description</h2></div>
						<p><?php echo $restaurant[0]->description; ?></p><br>
						<p><?php echo $restaurant[0]->menu_photo; ?></p><br>						
					</blurb>
					<blurb class="half" id="resto_profile"><div class="blurb-header"><h2>Gallery</h2></div>
						<p><?php echo $restaurant[0]->name; ?></p><br>						
					</blurb>								
					<blurb class="half" id="resto_reservation"><div class="blurb-header"><h2>DINE - IN- LATER!</h2></div>
						<p><?php echo $restaurant[0]->name; ?></p><br>						
					</blurb>
					<blurb class="half" id="resto_reviews"><div class="blurb-header"><h2>Reviews</h2></div>
						<p><?php echo $restaurant[0]->name; ?></p><br>						
					</blurb>
				</div>
			</div>
	</div>