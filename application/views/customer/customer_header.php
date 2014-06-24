<div id="content-container"><div id="body-container">
<h1>CUSTOMER MANAGEMENT</h1>
<h2>
	<?php
	echo anchor("customer/", " DASHBOARD |");
	echo anchor("customer/editPhone", " UPDATE PHONE NUMBER |");
	echo anchor("customer/customerReviews", " REVIEWS |");
	echo anchor("customer/customerReservations", " RESERVATIONS");
	?>
</h2>

<?php
	$validationErrors = $this->session->flashdata('validationErrors');
	if(isset($validationErrors) == "TRUE"){echo $validationErrors;}
?>