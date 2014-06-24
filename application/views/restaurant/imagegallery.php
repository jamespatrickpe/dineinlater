<h3> Current Gallery </h3>
<br>
<table cellpadding:5px;>
	<tr>
		<th>file</th>
		<th>picture</th>
		<th>delete</th>
	</tr>
	<?php
	foreach($imageGalleryData as $image)
	{
		echo "<tr>";
		echo "<td>".$image->picURL."</td>";
		echo "<td><img src=".$image->picURL." height=100px; width=100px;></td>";
		echo "<td>".anchor("restaurant/deleteUploadedFile?id=".$image->restogallery_id ," [ DELETE ] ")."</td>";
		echo "</tr>";
	}
	
	?>
</table>
<br>
<h3> Add Picture </h3>
<?php
echo form_open_multipart('restaurant/attemptUploadFile',"style='text-align:left;'")."<br>";
echo "Photo : "."<input type='file' name='imagegallery' size='20' />";
echo form_reset("reset","RESET");
echo form_submit("submit","ADD")."<br>";
echo form_close();
?>
<br><br><br><br><br>