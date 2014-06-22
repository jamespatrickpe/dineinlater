<h3> Change Phone Number </h3>
<?php 
	if(!is_null($this->session->userdata('confirmation')))
	{echo $this->session->userdata('confirmation');}
	else{}
?>
<table>
<?php
	echo form_open('customer/editPhoneNow',"style='width: 20%;'");
	echo "PHONE: ".form_input("mobile","45353")."<br>";
	echo form_submit("submit","Update");
	echo form_close();
?>
</table>

</br>
</br>