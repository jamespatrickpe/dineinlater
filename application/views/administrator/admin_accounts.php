
<div id="content-container">
	<div id="body-container">
			<div class="blurb-rows">
				<blurb class="small">
					<div class="blurb-header"><h2>Administrator</h2></div>				
					<div class="blurb-stacks" id="commands">
						<a class="action" id="admin-create-trigger">Add New Restaurant</a>
						<a class="action" id="admin-edit-trigger">Update Restaurant</a>
						<a class="action" id="admin-remove-trigger">Remove Restaurant</a>
					</div>
				</blurb>
					<blurb class="half" id="admin-create"><div class="blurb-header"><h2>Create New Account</h2></div>
						<p>
							<?php echo $output;?>
							<?php
								$attributes = array('id' => 'signin');
								echo form_open("createRestaurant",$attributes);
							?>
								<table>
									<tr>
										<td><label for="username">Username</label>&nbsp;<input type="textarea" id="username" name="username"></td>
									</tr>
									<tr>
										<td><label for="password">Password</label>&nbsp;<input type="password" id="password" name="password"></td>
									</tr>
									<tr>
										<td><input type="submit" value="Add Restaurant" id="submit_login"></td>
									</tr>
								</table>
							</form>
						</p><br>						
					</blurb>
					<blurb class="half" id="admin-edit"><div class="blurb-header"><h2>Update Accounts</h2></div>
						<p>
							<span class="<?php echo $editSearch?>">
							Select Restaurant
							<?php
								$attributes3 = array('id' => 'signin');
								echo form_open("editAdmin",$attributes3);
							?>
							<table>
								<tr>
									<td>
										<select id="admin" name="adin">
												<?php 
													foreach($adminList->result() as $row)
													{
														echo "<option value='$row->admin_id'>$row->username</option>";
													}
												?>
										</select>
									</td>
								</tr>
								<tr><td><input type="submit" value="Edit Account" id="submit_login"></td></tr>
							</table>
							<input type="hidden" name="action" value="search">
							</form>
							</span>
							
							<span class="<?php echo $editResto?>">
							<?php
								$attributes4 = array('id' => 'signin');
								echo form_open("editAdmin",$attributes4);
							?>
								<input type="hidden" name="action" value="edit">
								<table>
									<tr>
										<td><label for="username">Username</label>&nbsp;<input type="textarea" id="username" name="username"></td>
									</tr>
									<tr>
										<td><label for="password">Password</label>&nbsp;<input type="password" id="password" name="password"></td>
									</tr>
									<tr>
										<td><input type="submit" value="Edit Restaurant" id="submit_login"></td>
									</tr>
								</table>
							</form>
							</span>
						</p><br>						
					</blurb>								
					<blurb class="half" id="admin-remove"><div class="blurb-header"><h2>Remove Admin Account</h2></div>
						<p>
							Select Restaurant
							<?php
								$attributes2 = array('id' => 'signin');
								echo form_open("deleteAccount",$attributes2);
							?>
							<table>
								<tr>
									<td>
										<select id="admin" name="adin">
												<?php 
													foreach($adminList->result() as $row)
													{
														echo "<option value='$row->admin_id'>$row->username</option>";
													}
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