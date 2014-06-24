<h3> UPDATE DETAILS </h3>
<?php 
	if(!is_null($this->session->userdata('confirmation')))
	{echo $this->session->userdata('confirmation');}
	else{}
?>
<?php
	$restoID = $this->input->get('resto_id');
	if($myCustomer[0]->cellphone)
	{
		$defaultPhoneVal = $myCustomer[0]->cellphone;
	}
	else
	{
		$defaultPhoneVal = "0000000000";
	}
	
	$attributes = array('style' => 'float:left; text-align:left;');
	echo form_open('customer/editPhoneNow?restoID='.$restoID,$attributes);
	echo form_hidden("restoID",$restoID);
	echo "<table>";
	echo "<tr><td> PHONE: </td><td><input type='number' name='cellphone' value=".$myCustomer[0]->cellphone."> </td></tr>";
	echo "</table>";
	echo "<input type='submit' value='Update My Cellphone Number and Return to Reservations!' >";
	echo form_close();
	
?>

</br>
</br>