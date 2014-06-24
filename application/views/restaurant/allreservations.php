<table cellpadding="5px">
	<tr>
		<th>Customer Name</th>
		<th>Date</th>
		<th>Time</th>
		<th>Slots</th>
		<th>Note</th>
		<th>Status</th>
		<th>Time Stamp</th>
	</tr>
	<?php
		
		foreach($reservationData as $reservation)
		{
			$this->load->model('Customer_Model');
			$name = $this->Customer_Model->getFullNameByID( $reservation->customer_id );
			
			echo "<tr>";
			echo "<td>".$name."</td>";
			echo "<td>".$reservation->date."</td>";
			echo "<td>".$reservation->time."</td>";	
			echo "<td>".$reservation->slots."</td>";
			echo "<td>".$reservation->note."</td>";
			echo "<td>".$reservation->status."</td>";
			echo "<td>".$reservation->reservationmade."</td>";
			echo "<tr>";
		}
	?>
</table>