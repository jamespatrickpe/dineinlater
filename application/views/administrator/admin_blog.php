<h3> Current Blogs </h3>

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
		echo form_open('administrator/attemptAddAdmin',"style='text-align:left;'");	
		echo "USERNAME: ".form_input("username","");
		echo "PASSWORD: ".form_password("password","");
		echo form_reset("reset","reset");
		echo form_submit("submit","add");
		echo form_close();
	?>
<h3> Delete Administrator </h3>
	<?php
		echo form_open('administrator/attemptDeleteAdmin', "style='text-align:left;'");
		
		echo "<select name='selectedAdminToBeDeleted'>";
		foreach($adminResults as $admin) 
		{
			echo "<option value=".$admin->admin_id.">".$admin->username."</option>";
		}
		echo "</select>";
		
		echo form_submit("submit","delete");
		echo form_close();
	?>
