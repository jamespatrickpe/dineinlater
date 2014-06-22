<div id="content-container"><div id="body-container">
<h1>HQ MANAGEMENT SYSTEM</h1>
<h2>
	<?php
	echo anchor("hq/", " DASHBOARD");
	?>
</h2>

<?php 
	if(isset($validationErrors) == "TRUE"){echo $validationErrors;} 
	if(isset($fileUploadError) == "TRUE"){print_r($fileUploadError);} 
?>


