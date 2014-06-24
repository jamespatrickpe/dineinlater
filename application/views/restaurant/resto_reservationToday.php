<h3> Reservations Today </h3>
<table>
<?php
	if(is_array($reservations) == TRUE)
	{
		echo "<tr>";
		echo "<th>Customer Name</th>";
   		echo "<th>Reservation Time</th>";
   		echo "<th>No. of People</th>";
   		echo "<th>Note</th>";
   		echo "<th>Reservation Created on</th>";
   		echo "</tr>";
			
		foreach($reservations as $rows) 
		{
			
			$fullname = $this->Customer_Model->getFullNameByID( $rows->customer_id );
			
			echo "<tr>";
			echo "<td>".$fullname."</td>";
			echo "<td>".$rows->time."</td>";
			echo "<td>".$rows->slots."</td>";
			echo "<td>".$rows->note."</td>";
			echo "<td>".$rows->reservationmade."</td>";
			echo "</tr>";
		}
	}else
	{
		echo "No Reservations Today";
	}
?>
</table>
