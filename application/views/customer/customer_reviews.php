<h3> Reviews </h3>
<table>
<?php
	if(is_array($reviews) == TRUE)
	{
		echo "<tr>";
   		echo "<th>Review Title</th>";
   		echo "<th>Review Details</th>";
   		echo "<th></th>";
   		echo "</tr>";
			
		foreach($reviews as $rows) 
		{
			echo "<tr>";
			echo "<td>".$rows->title."</td>";
			echo "<td>".$rows->review."</td>";
			echo "<td><h3 class='rate'>".$rows->rating.".0</h3></td>";
			echo "</tr>";
		}
	}else
	{
		echo "No reviews made ";
	}
?>
</table>
