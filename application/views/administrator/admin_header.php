<div id="content-container"><div id="body-container">
<h1>ADMINISTRATOR MANAGEMENT SYSTEM</h1>
<h2>
	<?php
	echo anchor("administrator/", " DASHBOARD |");
	echo anchor("administrator/admin_administrators", " ADMINISTRATORS |");
	echo anchor("administrator/admin_restos", " VIEW RESTAURANTS |");
	echo anchor("administrator/admin_addrestos", " ADD RESTAURANT |");
	echo anchor("administrator/admin_bloggers", " BLOGGERS |");
	echo anchor("administrator/admin_hq", " HQ |");
	?>
</h2>

<?php 
	if(isset($validationErrors) == "TRUE"){echo $validationErrors;} 
	if(isset($fileUploadError) == "TRUE"){print_r($fileUploadError);} 
?>


