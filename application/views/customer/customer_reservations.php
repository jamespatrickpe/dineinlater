<h3> Reservations </h3>
<table>
<?php
	if(is_array($reservations) == TRUE)
	{
		echo "<tr>";
		echo "<th>Restaurant Name</th>";
   		echo "<th>Reservation Date</th>";
   		echo "<th>Reservation Time</th>";
   		echo "<th>No. of People</th>";
   		echo "<th>Note</th>";
		echo "<th>Confirmed</th>";
   		echo "<th>Reservation Created on</th>";
   		echo "</tr>";
			
		foreach($reservations as $rows) 
		{
			echo "<tr>";
			echo "<td>".$rows->name."</td>";
			echo "<td>".$rows->date."</td>";
			echo "<td>".$rows->time."</td>";
			echo "<td>".$rows->slots."</td>";
			echo "<td>".$rows->note."</td>";
			echo "<td>".$rows->confirmed."</td>";
			echo "<td>".$rows->reservationmade."</td>";
			echo "</tr>";
		}
	}else
	{
		echo "No Reservations ";
	}
?>
</table>
