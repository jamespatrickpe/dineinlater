<div id="content-container"><div id="body-container">
<h1>HQ MANAGEMENT SYSTEM</h1>
<h2>
	<?php
	echo anchor("hq/", " DASHBOARD");
	echo anchor("hq/hq_restaurantdashboard", "| ACCESS OWNED RESTOS");
	?>
</h2>

<?php 
	if(isset($validationErrors) == "TRUE"){echo $validationErrors;} 
	if(isset($fileUploadError) == "TRUE"){print_r($fileUploadError);} 
?>


