
<!--

	
		<div class="blurb-rows">
			<blurb class="small">
				<div class="blurb-header"><h2>Administrator</h2></div>
				<div class="blurb-stacks" id="commands">
						<a class="action" id="create-trigger">View All Restaurants</a>
						<a class="action" id="create-trigger">Add New Restaurant</a>
						<a class="action" id="edit-trigger">Update Restaurant</a>
						<a class="action" id="remove-trigger">Remove Restaurant</a>
						<a class="action" href="adminAccounts">Manage Administrator Accounts</a>
				</div>
				</blurb>
				<blurb class="half" id="create"><div class="blurb-header"><h2>Add New Restaurant</h2></div>
				<p><?php	$attributes = array('id' => 'signin'); echo form_open("createRestaurant",$attributes); ?>
				<table>
									<tr>
										<td><label for="restoname">Restaurant Name</label>&nbsp;<input type="textarea" id="restoname" name="restoname"></td>
									</tr>
									<tr>
										<td><label for="restoowner">Restaurant Owner</label>&nbsp;<input type="textarea" id="restoowner" name="restoowner"></td>
									</tr>
									<tr>
										<td><label for="username">Username</label>&nbsp;<input type="textarea" id="username" name="username"></td>
									</tr>
									<tr>
										<td><label for="password">Password</label>&nbsp;<input type="password" id="password" name="password"></td>
									</tr>
									<tr>
										<td><label for="address">Address</label>&nbsp;<input type="textarea" id="addrs" name="address"></td>
									</tr>
									<tr>
										<td><label for="city">City</label>&nbsp;<input type="textarea" id="city" name="city"></td>
									</tr>
									<tr>
										<td><label for="mobile">Mobile Number</label>&nbsp;<input type="textarea" id="mobile" name="mobile"></td>
									</tr>
									<tr>
										<td><label for="landline">Landline Number</label>&nbsp;<input type="textarea" id="landline" name="landline"></td>
									</tr>
									<tr>
										<td><label for="lat">Google Maps Location Latitude</label>&nbsp;<input type="textarea" id="lat" name="lat"></td>
									</tr>
									<tr>
										<td><label for="long">Google Maps Location Longitude</label>&nbsp;<input type="textarea" id="long" name="long"></td>
									</tr>
									<tr>
										<td><label for="website">Website URL</label>&nbsp;<input type="textarea" id="website" name="website"></td>
									</tr>
									<tr>
										<td><label for="logo">Logo Photo</label>&nbsp;<input type="file" id="logo" name="logo" enctype="multipart/form-data"></td>
									</tr>
									<tr>
										<td><label for="autoaccept">Auto-accept Reservation</label>&nbsp;
											<select id="autoaccept" name="autoaccept">
												<option value="Y">Yes</option>
												<option value="N">No</option>
											</select>
										</td>
									</tr>
									<tr>
										<td><label for="desc">Description</label>&nbsp;<input type="textbox" id="desc" name="desc"></td>
									</tr>
									<tr>
										<td><input type="submit" value="Add Restaurant" id="submit_login"></td>
									</tr>
								</table>
							</form>
						</p><br>						
					</blurb>
					<blurb class="half" id="edit"><div class="blurb-header"><h2>Update Restaurant</h2></div>
						<p>
							<span class="<?php echo $editSearch?>">
							Select Restaurant
							<?php
								$attributes3 = array('id' => 'signin');
								echo form_open("editRestaurant",$attributes3);
							?>
							<table>
								<tr>
									<td>
										<select id="restaurant" name="restaurant">
												<?php 
												/*
													foreach($restoList->result() as $row)
													{
														echo "<option value='$row->resto_id'>$row->resto_name</option>";
													}*/
												?>
										</select>
									</td>
								</tr>
								<tr><td><input type="submit" value="Edit Restaurant" id="submit_login"></td></tr>
							</table>
							<input type="hidden" name="action" value="search">
							</form>
							</span>
							
							<span class="<?php echo $editResto?>">
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
						</p><br>						
					</blurb>								
					<blurb class="half" id="remove"><div class="blurb-header"><h2>Remove Restaurant</h2></div>
						<p>
							Select Restaurant
							/*
							<?php
								$attributes2 = array('id' => 'signin');
								echo form_open("deleteRestaurant",$attributes2);
							?>
							<table>
								<tr>
									<td>
										<select id="restaurant" name="restaurant">
												<?php /*
													foreach($restoList->result() as $row)
													{
														echo "<option value='$row->resto_id'>$row->resto_name</option>";
													}*/
												?>
										</select>
									</td>
								</tr>
								<tr><td><input type="submit" value="Remove Restaurant" id="submit_login"></td></tr>
							</table>
							</form>
						</p><br>						
					</blurb>
				</div>
	</div>
</div>
-->