<div id="content-container">		
		<div id="body-container">
			<div class="blurb-rows">
				<blurb class="small">
					<div class="blurb-header"><h2><?php echo $restaurant[0]->name; ?></h2></div>
						<div id="greeting"><span class="username"><img src="<?php echo $restaurant[0]->logo_photo; ?>" width="200" height="200"></span></div>
												<?php
							$stat = $this->input->get("stat");
							if($stat == "DONE")
							{
								echo "<div align='center'><h2>RESERVED!</h2></div>";
							}
						?>
					<div class="blurb-stacks" id="commands">
						<a class="action" id="resto_home-trigger">Description</a>
						<a class="action" id="resto_profile-trigger">Gallery</a>
						<a class="action" id="resto_reservation-trigger"> DINE-IN-LATER! ( Reserve ) </a>
						<a class="action" id="resto_reviews-trigger">Reviews</a> <!--view your written reviews? will return stubs-->
					</div>
				</blurb>
					<blurb class="half" id="resto_home"><div class="blurb-header"><h2>Description</h2></div>
						<p><?php echo $restaurant[0]->description; ?></p><br>
						<p><img src=<?php echo $restaurant[0]->menu_photo; ?>></p><br>						
					</blurb>
					<blurb class="half" id="resto_profile"><div class="blurb-header"><h2>Gallery</h2></div>
						<p>
							<?php
							
								foreach($restoImage as $image)
								{
									echo "<img src=".$image->picURL.">"."<br>";
								}
							
							?></p><br>						
					</blurb>								
					<blurb class="half" id="resto_reservation" align"left"><div class="blurb-header"><h2>DINE - IN- LATER!</h2></div>
						<p>
							<?php
								$this->load->library('session');
								$userid = $this->session->userdata('id');
								$usertype = $this->session->userdata('usertype');
								if(isset($userid) == TRUE && $usertype == "CUSTOMER")
								{
									echo form_open('customer/attemptCreateReservation');
									echo form_hidden("restaurant_id",$restaurant[0]->restaurant_id);
									echo "For How Many? : ".form_input("slots","")."<br>";
									echo "Opening Time: "."<input type='datetime-local' name='reservetime'>"."<br>";
									echo "Note : ".form_input("note","")."<br>";
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
					</blurb>
					<blurb class="half" id="resto_reviews"><div class="blurb-header"><h2>Reviews</h2></div>
						<p>
							<?php
								foreach($restoReview as $review)
								{
									echo "<h3>".$review->title."</h3>".$review->datetime."<br>";
									echo "<p>".$review->review."</p>";
									
									$this->load->library('session');
									$userid = $this->session->userdata('id');
									$usertype = $this->session->userdata('usertype');
								}
								
								if(isset($userid) == TRUE && $usertype == "CUSTOMER")
									{
										echo form_open('customer/attemptCreateReview');
										echo form_hidden("restaurant_id",$restaurant[0]->restaurant_id);
										
										$options = array(
							                  1  => '1 STAR',
							                  2  => '2 STAR',
							                  3  => '3 STAR',
							                  4  => '4 STAR',
							                  5  => '5 STAR',
							                );
										echo form_dropdown('rating', $options)."<br>";
										
										echo "title : ".form_input("title","")."<br>";
										echo "Review : ".form_textarea("review","")."<br>";
										echo form_reset("reset","RESET")."<br>";
										echo form_submit("submit","ADD")."<br>";
										echo form_close();
									}
									else 
									{
										echo "<h4>YOU MUST BE LOGGED IN TO REVIEW!</h4>";
									}
							?>
						</p><br>						
					</blurb>
				</div>
			</div>
	</div>