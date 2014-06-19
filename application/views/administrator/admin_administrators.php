<?php

?>

<h3> 
<?php if(isset($validationErrors) == "TRUE"){echo $validationErrors;} ?>	
</h3>

<h3> Current Administrators </h3>

<table>
	<tr>
		<th>id</th>
   		<th>username</th>
   	</tr>
   		<?php
   			foreach($adminResults as $admin) 
   			{
   				echo "<tr>";
			    echo "<td>".$admin->admin_id."</td>";
			    echo "<td>".$admin->username."</td>";
				echo "</tr>";
			}
   		?>
</table>

<h3> Add Administrator </h3>
	<?php
		echo form_open('administrator/admin_add');	
		echo "USERNAME: ".form_input();
		echo "PASSWORD: ".form_password();
		echo form_reset("reset","reset");
		echo form_submit("submit","submit");
		echo form_close();
	?>
<h3> Delete Administrator </h3>
