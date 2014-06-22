<table>
	<tr>
		<th>name</th>
		<th>slots</th>
		<th>status</th>
		<th>accept?</th>
		<th>first name</th>
		<th>last name</th>
		<th>cell</th>
		<th>slots</th>
		<th>confirmed</th>
		<th>note</th>
		<th>reservetime</th>
		<th>reservemade</th>
		<th>status</th>
		<th>showup</th>
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
			echo "<td>".$reservations->reservetime."</td>";
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