<h3> Reservation Confirmation </h3>
<table>
<?php
	if(is_array($reservations) == TRUE)
	{
		echo "<tr>";
		echo "<th>Customer Name</th>";
   		echo "<th>Reservation Date</th>";
   		echo "<th>Reservation Time</th>";
   		echo "<th>No. of People</th>";
   		echo "<th>Note</th>";
   		echo "<th>Reservation Created on</th>";
   		echo "</tr>";
			
		foreach($reservations as $rows) 
		{
			echo "<tr>";
			echo "<td>".$rows->fullname."</td>";
			echo "<td>".$rows->date."</td>";
			echo "<td>".$rows->time."</td>";
			echo "<td>".$rows->slots."</td>";
			echo "<td>".$rows->note."</td>";
			echo "<td>".$rows->reservationmade."</td>";
			echo "<td>".form_open('Restaurant/approveReservation'," ",array('reservation_id'=>$rows->reservation_id)).form_submit("submit","Approve").form_close()."</td>";
			echo "<td>".form_open('Restaurant/rejectReservation'," ",array('reservation_id'=>$rows->reservation_id)).form_submit("submit","Reject").form_close()."</td>";
			echo "</tr>";
		}
	}else
	{
		echo "No Pending Reservations ";
	}
?>
</table>

</br>
</br>
<strong><?php echo anchor("restaurant/reservationToday", " RESERVATIONS TODAY "); ?></strong>
</br>
<strong><?php echo anchor("restaurant/allReservations", " PRINT ALL RESERVATIONS "); ?></strong>