<div id="content-container">		
		<div id="body-container">
			<div class="blurb-rows">
				<blurb class="small">
					<div class="blurb-header"><h2>Profile</h2></div>				
						<center><div class="user-photo"><img></div></center>
						<div id="greeting"><span class="username">Username</span></div>
					<div class="blurb-stacks" id="commands">
						<a class="action" id="customer_reservation-trigger">Reservation</a>
						<a class="action" id="customer_review-trigger">Reviews</a> <!--view your written reviews? will return stubs-->
					</div>
				</blurb><blurb class="half" id="customer_reservation"><div class="blurb-header"><h2>Reservations</h2></div>
						<p>
							Reservations made by the user will be placed here
							<div id="cus_edit_reserve">
								<?php
									$attributes3 = array('id' => 'signin');
									echo form_open("test/reserveEditSubmit/",$attributes3);
								?>
									<input type="hidden" name="resto_id" name="note"  value="[resto_id]">
									<input type="hidden" name="customer_id" name="note"  value="[customer_id]">
									<table>
										<tr><td><label for="date">Date</label>&nbsp; <input type="date" value="[date]"></td></tr>
										<tr><td><label for="time">Time</label>&nbsp; <input type="time" name="time"  value="[time]"></td></tr>
										<tr><td><label for="no_of_people">Number of People</label>&nbsp;<input type="number" name="no_of_people" min="1" max="20" value="[customer_review]"></td></tr>
										<tr><td></br><label for="note">Additional Instructions</label>&nbsp;</td></tr>
										<tr><td><textarea name="note" value="[note]"></textarea></td></tr>
										<tr><td><button action="submit" id="submit_login cust_res_show_edit">Submit</button></td></tr>
									</table>
								</form>
							</div>
							<div id="cus_edit_reserve">
								<table>
									<tr>
										<th>Restaurant</th>
										<th>Date and Time</th>
										<th>Number of people</th>
										<th>Note</th>
										<th>Confirmed?</th>
										<th></th>
									</tr>
									<tr>
										<td>[resto_name]</td>
										<td>[date][time]</td>
										<td>[no_of_people]</td>
										<td>[note]</td>
										<td>[confirmed]</td>
										<td>
											<?php
												$attributes = array('id' => 'signin');
												echo form_open("test/reviewEdit/",$attributes);
											?>
												<input type="hidden" name="[customer_id]">
												<input type="hidden" name="[resto_id]">
												<input type="hidden" name="[review_title]">
												<input type="hidden" name="[datetime]">
												<input type="hidden" name="[rating]">
												<button action="submit" id="submit_login cust_res_show_edit">Edit Reservation</button>
											</form>
											<?php
												$attributes = array('id' => 'signin');
												echo form_open("test/reviewDelete/",$attributes);
											?>
												<input type="hidden" name="[customer_id]">
												<input type="hidden" name="[resto_id]">
												<input type="hidden" name="[review_title]">
												<input type="hidden" name="[datetime]">
												<input type="hidden" name="[rating]">
												<button action="submit" id="submit_login confirm_action">Delete Reservation</button>
											</form>
										</td>
									</tr>
								</table>
							</div>
						</p><br>						
					</blurb>
					<blurb class="half" id="customer_review"><div class="blurb-header"><h2>Reviews</h2></div>
						<p>Reviews Created By User will be displayed here
							<div id="cus_edit_review">
								<?php
									$attributes2 = array('id' => 'signin');
									echo form_open("test/reviewEditSubmit/",$attributes2);
								?>
									<input type="hidden" name="resto_id">
									<input type="hidden" name="customer_id">
									<table>
										<tr><td><label for="review_title">Review Title</label>&nbsp;<input type="text" name="review_title" value="[review_title]"></td></tr>
										<tr><td><label for="customer_review">Review</label>&nbsp;<textarea name="customer_review" value="[customer_review]"></textarea></td></tr>
										<tr>
											<td>
												<select name="rating">
													<option value="1">1 Star</option>
													<option value="2">2 Stars</option>
													<option value="3">3 Stars</option>
													<option value="4">4 Stars</option>
													<option value="5">5 Stars</option>
												</select>
											</td>
										</tr>
										<tr><td><button action="submit" id="submit_login cust_rev_show_edit">Submit</button>
										</td></tr>
									</table>
								</form>
							</div>
							<div id="cus_show_review">
								<table>
									<tr>
										<td>
											<h3>Review for [Resto_Name]</h3>
											<span class="review-rating"><h3 class="rate small">5.0</h3>
											<h4>[Review_Title]</h4>[Review_Date]
											<p>[Review][Review][Review][Review][Review][Review][Review][Review][Review]
												[Review]<br />[Review][Review][Review][Review][Review][Review][Review]
												[Review][Review][Review]<br />[Review][Review][Review][Review][Review]
												[Review][Review][Review]<br />[Review][Review][Review]</p>
										</td>
										<td>	
											<?php
												$attributes = array('id' => 'signin');
												echo form_open("test/reviewEdit/",$attributes);
											?>
												<input type="hidden" name="[customer_id]">
												<input type="hidden" name="[resto_id]">
												<input type="hidden" name="[review_title]">
												<input type="hidden" name="[datetime]">
												<input type="hidden" name="[rating]">
												<button action="submit" id="submit_login cust_rev_show_edit">Edit Review</button>
											</form>
											<?php
												$attributes = array('id' => 'signin');
												echo form_open("test/reviewDelete/",$attributes);
											?>
												<input type="hidden" name="[customer_id]">
												<input type="hidden" name="[resto_id]">
												<input type="hidden" name="[review_title]">
												<input type="hidden" name="[datetime]">
												<input type="hidden" name="[rating]">
												<button action="submit" id="submit_login confirm_action">Delete Review</button>
											</form>
										</td>
									</tr>
									<tr>
										<td>
											<h3>Review for [Resto_Name]</h3>
											<span class="review-rating"><h3 class="rate small">5.0</h3>
											<h4>[Review_Title]</h4>[Review_Date]
											<p>[Review][Review][Review][Review][Review][Review][Review][Review][Review]
												[Review]<br />[Review][Review][Review][Review][Review][Review][Review]
												[Review][Review][Review]<br />[Review][Review][Review][Review][Review]
												[Review][Review][Review]<br />[Review][Review][Review]</p>
										</td>
										<td>	
											<?php
												$attributes = array('id' => 'signin');
												echo form_open("test/reviewEdit/",$attributes);
											?>
												<input type="hidden" name="[customer_id]">
												<input type="hidden" name="[resto_id]">
												<input type="hidden" name="[review_title]">
												<input type="hidden" name="[datetime]">
												<input type="hidden" name="[rating]">
												<button action="submit" id="submit_login cust_rev_show_edit">Edit Review</button>
											</form>
											<?php
												$attributes = array('id' => 'signin');
												echo form_open("test/reviewDelete/",$attributes);
											?>
												<input type="hidden" name="[customer_id]">
												<input type="hidden" name="[resto_id]">
												<input type="hidden" name="[review_title]">
												<input type="hidden" name="[datetime]">
												<input type="hidden" name="[rating]">
												<button action="submit" id="submit_login confirm_action">Delete Review</button>
											</form>
										</td>
									</tr>
									<tr>
										<td>
											<h3>Review for [Resto_Name]</h3>
											<span class="review-rating"><h3 class="rate small">5.0</h3>
											<h4>[Review_Title]</h4>[Review_Date]
											<p>[Review][Review][Review][Review][Review][Review][Review][Review][Review]
												[Review]<br />[Review][Review][Review][Review][Review][Review][Review]
												[Review][Review][Review]<br />[Review][Review][Review][Review][Review]
												[Review][Review][Review]<br />[Review][Review][Review]</p>
										</td>
										<td>	
											<?php
												$attributes = array('id' => 'signin');
												echo form_open("test/reviewEdit/",$attributes);
											?>
												<input type="hidden" name="[customer_id]">
												<input type="hidden" name="[resto_id]">
												<input type="hidden" name="[review_title]">
												<input type="hidden" name="[datetime]">
												<input type="hidden" name="[rating]">
												<button action="submit" id="submit_login cust_rev_show_edit">Edit Review</button>
											</form>
											<?php
												$attributes = array('id' => 'signin');
												echo form_open("test/reviewDelete/",$attributes);
											?>
												<input type="hidden" name="[customer_id]">
												<input type="hidden" name="[resto_id]">
												<input type="hidden" name="[review_title]">
												<input type="hidden" name="[datetime]">
												<input type="hidden" name="[rating]">
												<button action="submit" id="submit_login confirm_action">Delete Review</button>
											</form>
										</td>
									</tr>
								</table>
							</div>
						</p><br>				
					</blurb>
				<!--end of stub-->
				</blurb>
				</div>
			</div>
	</div>