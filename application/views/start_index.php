<!--content-->
<div id="content-container">
	<div id="searchbar">
		<?php	$attributes = array('class' => 'splash'); echo form_open("restaurant/search",$attributes); ?>
				<label for="search"><h1>I'm craving for</label>
				<input type="search" class="search" name="keyword"> 
				<button type="submit" class="submit"></h1>
		</form>
	</div>
</div>
<!--content-->
<input type="hidden" value="<?php echo status ?>" id="registration-status">
