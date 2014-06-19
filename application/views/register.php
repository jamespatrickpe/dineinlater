<!--content-->
<div id="content-container">
	<div id="registration">
		<div class="blurb-header"><h1>Register</h1></div>
			<h1>
			<?php echoMe($validationErrors); ?>
			</h1>
			<?php echo form_open('registration/createNewCustomer') ?>
				<input type="text" name="username" placeholder="Username"><br>
				<input type="text" name="firstname" placeholder="First Name"><br>
				<input type="text" name="lastname" placeholder="Last Name"><br>
				<input type="password" id="password" name="password" placeholder="Password"><br>
				<input type="password" id="password_check" name="password_check" placeholder="Retype Password"><br>
				<input type="text" name="email" placeholder="E-mail Address"><br>
				<input type="text" name="cellphone" placeholder="Cell Phone Number"><br>
				<br>
		<center>
			<input type="checkbox" name="termsandconditions" id="termsandconditions" class="check" required="required"> I have read the 
			<?php echo anchor('registration/termsandconditions', 'Terms and Conditions', 'id="termsandconditions"') ?>
			<br><br>
			<input type="submit" value="DINE IN LATER!" id="submit_registration">
			</form>
			<br><br>
				or<br><br>
				Sign up with Facebook
		</center>
	</div>
</div>