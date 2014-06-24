<div class="row">
  <div id="content-container">		
		<div id="body-container">
			<div class="blurb-rows">
				<blurb class="small">
					<div class="blurb-header"><h2><?php echo $restaurant[0]->name; ?></h2></div>
						<div id="greeting">
							<span class="username"><img src="<?php echo $restaurant[0]->logo_photo; ?>" width="200" height="200"></span>
							<span class="rate">
								<?php 
									if(isset( $restoRating[0]->rating) )
									{
										echo round($restoRating[0]->rating).".0"; 
									}
								?>
							</span></p><br>
						</div>
												<?php
							$stat = $this->input->get("stat");
							if($stat == "DONE")
							{
								echo "<div align='center'><h2>RESERVED!</h2></div>";
							}
						?>
					<div class="blurb-stacks" id="commands">
						<a class="action" id="resto_home-trigger">Description</a>
						<a class="action" id="resto_reviews-trigger">Reviews</a> 
						<a class="action" id="resto_reservation-trigger"> DINE-IN-LATER! ( Reserve ) </a><!--view your written reviews? will return stubs-->
						<?php
							$varCheckTime = $this->session->flashdata('validationErrors');
							if( !empty( $varCheckTime ))
							{
								echo "<h4 align='center'>".$varCheckTime."</h4>";	
							}
						?>
					</div>
					<div id="resto_reservation" class="rsvp_form">
							<p>
							<?php
								$this->load->library('session');
								$userid = $this->session->userdata('id');
								$usertype = $this->session->userdata('usertype');
								
								if(isset($userid) == TRUE && $usertype == "CUSTOMER")
								{
									echo form_open('customer/checkCreateReservation');
									echo form_hidden("restaurant_id",$restaurant[0]->restaurant_id);
									echo "For How Many? : <input type='number' name='slots'> <br>";
									echo "Reserve Time: "."<input type='time' name='reservetime' required='required'>"."<br>";
									echo "Reserve Date: "."<input type='date' name='reservedate' required='required'>"."<br>";
									echo "Note : <input type='text' name='note'> <br>";
									echo form_reset("reset","RESET");
									echo form_submit("submit","ADD")."<br>";
									echo form_close();
								}
								else 
								{
									echo "<h4>YOU MUST BE LOGGED IN TO RESERVE!</h4>";
								}
							?>
						</p><br>			
					</div>
				</blurb>
					<blurb class="half2" id="resto_home">
						<div class="blurb-header"><h2>Description</h2></div>
							<div class="info">
								<span style="width:350px;">
									<ul>
										<li class="restaurant-info" id="cuisine"><?php echo $restaurant[0]->cuisine; ?></li>
										<li class="restaurant-info" id="operating-hours"><?php echo $restaurant[0]->open_time." to ".$restaurant[0]->close_time; ?></li>
										<li class="restaurant-info" id="phone-number">Mobile <?php echo $restaurant[0]->mobile; ?></li> 
										<li class="restaurant-info" id="phone-number">Landline <?php echo $restaurant[0]->landline; ?></li>  
										<li class="restaurant-info" id="address"><?php echo $restaurant[0]->address.",".$restaurant[0]->city; ?></li>
									</ul>
									<p style="width:400px; padding:10px;"><?php echo $restaurant[0]->description; ?></p>
								</span>
								<span>
									<iframe style="padding:100px; float:right;" src="http://wikimapia.org/#lat=<?php echo $restaurant[0]->google_lat; ?>&lon=<?php echo $restaurant[0]->google_long; ?>&z=18&l=&ifr=1&m=b" width="300" height="300" frameborder="0"></iframe>
								</span>
							</br></br></br>
							</div>
					</br>
						<div class="blurb-header"><h2>Gallery</h2></div>
						<?php
									if(is_array($restoImage))
									{
										foreach($restoImage as $image)
										{
											echo "<a href=".$image->picURL."><img src=".$image->picURL.">"."</a><br>";
										}	
									}
									else
									{
										echo "No Photo Uploaded";
									}
							?>
					</blurb>
					<blurb class="half2" id="resto_reviews"><div class="blurb-header"><h2>Reviews</h2></div>
							<?php
								foreach($restoReview as $review)
								{
									$customerName = $this->Customer_Model->getUsernameByID($review->customer_id);
									echo "<h3>".$review->title."</h3>".$review->datetime." by ".$customerName[0]->username;
									echo "<p class='reviews'>".$review->review."</p>";
								}
								
								$this->load->library('session');
								$userid = $this->session->userdata('id');
								$usertype = $this->session->userdata('usertype');
								
								if(isset($userid) == TRUE && $usertype == "CUSTOMER")
									{
										
										echo form_open('customer/attemptCreateReview', array('style' => 'text-align:left') );
										echo form_hidden("restaurant_id",$restaurant[0]->restaurant_id);
										
										$options = array(
							                  1  => '1 STAR',
							                  2  => '2 STAR',
							                  3  => '3 STAR',
							                  4  => '4 STAR',
							                  5  => '5 STAR',
							                );
										echo "<table style='vertical-align: bottom;'>";
										echo "<tr>";
										echo "<tr><td>RATING :</td><td>".form_dropdown('rating',$options)."</td>";
										$title = array(
											"name"=>"title",
											"required"=>"required"
										);
										$review = array(
											"name"=>"review",
											"required"=>"required"
										);
										echo "<tr><td>TITLE :</td><td>".form_input($title)."</td>";
										echo "<tr><td>REVIEW :</td><td>".form_textarea($review)."</td>";
										
										echo "</table>";
										
										echo form_reset("reset","Reset", "class=searchButton");
										echo form_submit("submit","Review this!", "class=searchButton")."<br>";
										echo form_close();
										
									}
									else 
									{
										echo "<h4>YOU MUST BE LOGGED IN TO REVIEW!</h4>";
									}
							?>					
					</blurb>
			</div>
		</div>
	</div>
</div>