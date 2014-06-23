<table>
	<tr>
		<th>Name</th>
		<th>Available Slots</th>
		<th>Status</th>
		<th>Auto-Reserve</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Phone Number</th>
		<th>Slots Reserved</th>
		<th>Confirmed</th>
		<th>Note</th>
		<th>Reserve Date</th>
		<th>Reserve Time</th>
		<th>Reservation Creation</th>
		<th>Status</th>
		<th>Did Showup</th>
	</tr>
	<?php
		foreach($reservationsByHQ as $reservations)
		{
			echo "<tr>";
			echo "<td>".$reservations->name."</td>";
			echo "<td>".$reservations->reservation_slots."</td>";
			echo "<td>".$reservations->restostatus."</td>";
			echo "<td>".$reservations->autoaccept."</td>";
			echo "<td>".$reservations->firstname."</td>";
			echo "<td>".$reservations->lastname."</td>";
			echo "<td>".$reservations->cellphone."</td>";
			echo "<td>".$reservations->slots."</td>";
			echo "<td>".$reservations->confirmed."</td>";
			echo "<td>".$reservations->note."</td>";
			echo "<td>".$reservations->date."</td>";
			echo "<td>".$reservations->time."</td>";
			echo "<td>".$reservations->reservationmade."</td>";
			echo "<td>".$reservations->status."</td>";
			echo "<td>".$reservations->showup."</td>";
			echo "</tr>";
		}
	?>
</table>
<h3 align="center">
<?php
echo anchor("hq/printableVersion","[ PRINT DATA ]");
?>
	
</h3>