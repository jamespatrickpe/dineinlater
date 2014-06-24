<h3>Restaurant Dashboard</h3>

<?php

foreach($allRestaurantsByHQ as $branch)
{
	$attributes = array('style' => 'text-align:left');
	echo "<div>";
	echo "<h4>".$branch->name."</h4>";
	echo form_open('hq/accessRestaurant', $attributes);
	echo "<form method='POST' action='hq/accessRestaurant' style='text-align:left'>";
	echo "<input type='hidden' name='restaurant_id' value='".$branch->restaurant_id."'>";
	echo "<input type='hidden' name='username' value='".$branch->username."'>";
	echo "<input type='submit' name='username' value=".$branch->name.">";
	echo "</form>";
	echo "</div>";
}
?>