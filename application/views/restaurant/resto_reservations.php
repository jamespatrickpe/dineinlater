<h3> Current Administrators </h3>

<table>
	<tr>
		<th>Customer Name</th>
   		<th>Reservation Date</th>
   		<th>Reservation Time</th>
   		<th>No. of People</th>
   		<th>Note</th>
   		<th>Reservation Created on</th>
   	</tr>
<?php
	if(!is_null($reservations))
	{
		foreach($reservations as $rows) 
		{
			echo "<tr>";
			echo "<td>".$rows->fullname."</td>";
			echo "<td>".$rows->date."</td>";
			echo "<td>".$rows->time."</td>";
			echo "<td>".$rows->slots."</td>";
			echo "<td>".$rows->note."</td>";
			echo "<td>".$rows->reservationmade."</td>";
			echo "<td>".$rows->reservation_id."</td>";
			echo "</tr>";
		}
	}else
	{
		echo "No Pending Reservations ";
	}
?>
</table>