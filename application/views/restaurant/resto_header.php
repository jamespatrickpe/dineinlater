<div id="content-container"><div id="body-container">
<h1>RESTAURANT MANAGEMENT</h1>
<h2>
	<?php
	echo anchor("restaurant/", " DASHBOARD |");
	echo anchor("restaurant/viewReviews", " REVIEWS |");
	echo anchor("restaurant/editRestaurant", " UPDATE PROFILE |");
	echo anchor("restaurant/respondToReservation", " RESERVATIONS |");
	echo anchor("restaurant/imageGallery", " IMAGE GALLERY");
	?>
</h2>

<?php
	$validationErrors = $this->session->flashdata('validationErrors');
	if(isset($validationErrors) == "TRUE"){echo $validationErrors;}
	if(isset($fileUploadError) == "TRUE"){print_r($fileUploadError);} 
?>
