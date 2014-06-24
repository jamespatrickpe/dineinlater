<h3> Reviews </h3>
<table align="left" cellpadding=5px;>
<?php
	if(is_array($reviews) == TRUE)
	{
		echo "<tr>";
   		echo "<th>Review Title</th>";
   		echo "<th>Review Details</th>";
   		echo "<th>Rating! </th>";
   		echo "</tr>";
			
		foreach($reviews as $rows) 
		{
			echo "<tr align='center'>";
			echo "<td>".$rows->title."</td>";
			echo "<td>".$rows->review."</td>";
			echo "<td>".$rows->rating."</td>";
			echo "</tr>";
		}
	}else
	{
		echo "No reviews made ";
	}
?>
</table>
