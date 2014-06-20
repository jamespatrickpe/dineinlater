<?php

?>

<h3> 
<?php 
	if(isset($validationErrors) == "TRUE"){echo $validationErrors;} 
	
?>	
</h3>

<h3> Add Restaurant </h3>
	<?php
	/*
		echo form_open('administrator/attemptAddAdmin',"style='text-align:left;'");	
		echo "USERNAME: ".form_input("username","");
		echo "PASSWORD: ".form_password("password","");
		echo form_reset("reset","reset");
		echo form_submit("submit","add");
		echo form_close();
	 * 
	 */
	?>

<h3> Registered Restaurants </h3>

<table style="align: center; text-align: center; padding: 25px;">
	<tr>
		<th>id</th>
   		<th>restaurant <br> branches</th>
   		<th>manager</th>
   		<th>mobile</th>
   		<th>landline</th>
   		<th>status</th>
   		<th>auto<br>accept</th>
   		<th>address</th>
   		<th>city</th>
   		<th>cuisine</th>
   		<th>hq</th>
   		<th>edit</th>
   		<th>delete</th>
   	</tr>
   		<?php
   			foreach($restaurantResults as $restaurant) 
   			{
   				echo "<tr>";
			    echo "<td>".$restaurant->restaurant_id."</td>";
				echo "<td>".$restaurant->name."</td>";
				echo "<td>".$restaurant->owner."</td>";
				echo "<td>".$restaurant->mobile."</td>";
				echo "<td>".$restaurant->landline."</td>";
				echo "<td>".$restaurant->restostatus."</td>";
				echo "<td>".$restaurant->autoaccept."</td>";
				echo "<td>".$restaurant->address."</td>";
				echo "<td>".$restaurant->city."</td>";
				echo "<td>".$restaurant->cuisine."</td>";
				$rowData = $this->HQ_Model->getById($restaurant->hq_id);
				echo "<td>". $rowData[0]->hqname ."</td>";
				echo "<td>". anchor('administrator/edit_resto?id='.$restaurant->restaurant_id, 'edit') ."</td>";
				echo "<td>". anchor('administrator/delete_resto?id='.$restaurant->restaurant_id, 'delete') ."</td>";
				echo "</tr>";
			}
   		?>
</table>


