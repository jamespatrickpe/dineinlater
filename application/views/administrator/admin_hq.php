<h3> Current HQ </h3>

<table>
	<tr>
		<th>id</th>
   		<th>username</th>
   		<th>hqname</th>
   	</tr>
   		<?php
   			foreach($hqResults as $hq) 
   			{
   				echo "<tr>";
			    echo "<td>".$hq->hq_id."</td>";
			    echo "<td>".$hq->username."</td>";
				 echo "<td>".$hq->hqname."</td>";
				echo "</tr>";
			}
   		?>
</table>

<h3> Add HQ </h3>
	<?php
		echo form_open('administrator/attemptAddHQ',"style='text-align:left;'");	
		echo "HQ NAME: ".form_input("hqname","");
		echo "USERNAME: ".form_input("username","");
		echo "PASSWORD: ".form_password("password","");
		echo form_reset("reset","reset");
		echo form_submit("submit","add");
		echo form_close();
	?>
<h3> Delete HQ </h3>
	<?php
		echo form_open('administrator/attemptDeleteHQ', "style='text-align:left;'");
		
		echo "<select name='selectedHQToBeDeleted'>";
		foreach($hqResults as $hq) 
		{
			echo "<option value=".$hq->hq_id.">".$hq->username."</option>";
		}
		echo "</select>";
		
		echo form_submit("submit","delete");
		echo form_close();
	?>
