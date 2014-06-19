<div id="content-container">		
		<div id="body-container">
			<div class="blurb-rows">
				<blurb class="small">
					<div class="blurb-header"><h2>Profile</h2></div>				
						<center><div class="user-photo"><img></div></center>
						<div id="greeting"><span class="username">Resto Name</span></div>
					<div class="blurb-stacks" id="commands">
						<a class="action" id="resto_home-trigger">User Info</a>
						<a class="action" id="resto_profile-trigger">Edit Profile</a>
						<a class="action" id="resto_reservation-trigger">Reservations</a>
						<a class="action" id="resto_reviews-trigger">Reviews</a> <!--view your written reviews? will return stubs-->
					</div>
				</blurb>
					<blurb class="half" id="resto_home"><div class="blurb-header"><h2>Restaurant Wall</h2></div>
						<?php
								$attributes4 = array('id' => 'signin');
								echo form_open("changeRestoStatus",$attributes4);
						?>
						<input type="hidden" name="resto_id" value="[RESTO_ID]">
						<table>
									<tr><td><button class="pending_reserve_but" action="submit">Tag Restaurant as Fully booked</button></td></tr>
						</table>
						</form>					
					</blurb>
					<blurb class="half" id="resto_profile"><div class="blurb-header"><h2>Edit Profile</h2></div>
						<button class="edit_profile_but">Edit Profile</button>
						<button class="add_gallery_photo_but">Add Photo to Gallery</button>
						<button class="change_logo_but">Change Logo</button>
						<button class="change_menu_but">Upload Menu</button>
						
						<span class="edit_profile">
							<?php
								$attributes4 = array('id' => 'signin');
								echo form_open("editRestaurant",$attributes4);
							?>
								<input type="hidden" name="action" value="edit">
								<table>
									<tr>
										<td><label for="restoname">Restaurant Name</label>&nbsp;<input type="textarea" id="restoname" name="resto_name"></td>
									</tr>
									<tr>
										<td><label for="restoowner">Restaurant Owner</label>&nbsp;<input type="textarea" id="restoowner" name="resto_owner"></td>
									</tr>
									<tr>
										<td><label for="address">Address</label>&nbsp;<input type="textarea" id="addrs" name="address"></td>
									</tr>
									<tr>
										<td><label for="city">City</label>&nbsp;<input type="textarea" id="city" name="city"></td>
									</tr>
									<tr>
										<td><label for="mobile">Mobile Number</label>&nbsp;<input type="textarea" id="mobile" name="phone_mobile"></td>
									</tr>
									<tr>
										<td><label for="landline">Landline Number</label>&nbsp;<input type="textarea" id="landline" name="phone_landline"></td>
									</tr>
									<tr>
										<td><label for="lat">Google Maps Location Latitude</label>&nbsp;<input type="textarea" id="lat" name="google_lat"></td>
									</tr>
									<tr>
										<td><label for="long">Google Maps Location Longitude</label>&nbsp;<input type="textarea" id="long" name="google_long"></td>
									</tr>
									<tr>
										<td><label for="website">Website URL</label>&nbsp;<input type="textarea" id="website" name="website"></td>
									</tr>
									<tr>
										<td><label for="autoaccept">Auto-accept Reservation</label>&nbsp;
											<select id="autoaccept" name="auto_accept_reserve_flag">
												<option value="Y">Yes</option>
												<option value="N">No</option>
											</select>
										</td>
									</tr>
									<tr>
										<td><label for="desc">Description</label>&nbsp;<input type="textbox" id="desc" name="description"></td>
									</tr>
									<tr>
										<td><input type="submit" value="Edit Restaurant" id="submit_login"></td>
									</tr>
								</table>
							</form>
							</span>
							<span class="add_gallery_photo">
								<?php
								$attributes4 = array('id' => 'signin');
								echo form_open("addGalleryPhoto",$attributes4);
								?>
							</br></br>
								<input type="hidden" name="resto_id" value="[RESTO_ID]">
								<table>
									<tr><td>Upload photo to add in Gallery</td></tr>
									<tr>
										<td><label for="file">Choose File</label>&nbsp;<input type="file" name="picURL" id="file"></td>
									</tr>
									<tr>
										<td><input type="submit" value="Upload" id="submit_login"></td>
									</tr>
								</table>
								</form>
							</span>
							<span class="change_logo">
								<?php
								$attributes4 = array('id' => 'signin');
								echo form_open("changeLogo",$attributes4);
								?>
							</br></br>
								<input type="hidden" name="resto_id" value="[RESTO_ID]">
								<table>
									<tr><td>Upload photo to change Logo</td></tr>
									<tr>
										<td><label for="file">Choose File</label>&nbsp;<input type="file" name="logo_photo" id="file"></td>
									</tr>
									<tr>
										<td><input type="submit" value="Upload" id="submit_login"></td>
									</tr>
								</table>
								</form>
							</span>	
							<span class="change_menu">
								<?php
								$attributes4 = array('id' => 'signin');
								echo form_open("changeMenu",$attributes4);
								?>
							</br></br>
								<input type="hidden" name="resto_id" value="[RESTO_ID]">
								<table>
									<tr><td>Upload photo to change Menu</td></tr>
									<tr>
										<td><label for="file">Choose File</label>&nbsp;<input type="file" name="menu_photo" id="file"></td>
									</tr>
									<tr>
										<td><input type="submit" value="Upload" id="submit_login"></td>
									</tr>
								</table>
								</form>
							</span>					
					</blurb>								
					<blurb class="half" id="resto_reservation"><div class="blurb-header"><h2>Reservations</h2></div>
						<button class="pending_reserve_but">Confirm Reservations</button> <button class="approved_reserve_but">Approved Reservations</button>
						
						<div class="review-stub pending_reserve">
							<div class="blurb-stacks">
								<h3>For Approval</h3>
								<div class="review-header">
									<span class="review-details"><h3>[Customer Name]</h3>For [Review_Date] people</span> 
									<span class="review-rating">[Reservation_Date] [Reservation_Time]</span>
								</div>
								<div class="review-body">
									<p>Additional Notes: [Notes]</p>								
								</div>
							</div>
						</div>	
						
						<div class="review-stub approved_reserve">
							<div class="blurb-stacks">
								<h3>Approved Reservations</h3>
								<div class="review-header">
									<span class="review-details"><h3>[Customer Name]</h3>For [Review_Date] people</span> 
									<span class="review-rating">[Reservation_Date] [Reservation_Time]</span>
								</div>
								<div class="review-body">
									<p>Additional Notes: [Notes]</p>								
								</div>
							</div>
						</div>					
					</blurb>
					<blurb class="half" id="resto_reviews"><div class="blurb-header"><h2>Reviews</h2></div>
						<p>Review Section</p><br>
						
						<div class="review-stub">
							<div class="blurb-stacks">
								<div class="review-header">
									<span class="review-details"><h3>[Review_Title]</h3>[Review_Date]</span> 
									<span class="review-rating">[Review_Date]</span>
								</div>
								<div class="review-body">
									<p>[Review]</p>								
								</div>
							</div>
						</div>	
						
						<div class="review-stub">
							<div class="blurb-stacks">
								<div class="review-header">
									<span class="review-details"><h3>[Review_Title]</h3>[Review_Date]</span> 
									<span class="review-rating">[Review_Date]</span>
								</div>
								<div class="review-body">
									<p>[Review]</p>								
								</div>
							</div>
						</div>	
						
						<div class="review-stub">
							<div class="blurb-stacks">
								<div class="review-header">
									<span class="review-details"><h3>[Review_Title]</h3>[Review_Date]</span> 
									<span class="review-rating">[Review_Date]</span>
								</div>
								<div class="review-body">
									<p>[Review]</p>								
								</div>
							</div>
						</div>							
					</blurb>
				</div>
			</div>
	</div>