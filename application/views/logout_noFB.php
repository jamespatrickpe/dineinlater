<div id="content-container">
	<div id="searchbar">
		<div id="account-popup">
			<div id="popup-header">
				<h3>LOGIN</h3>
			</div>
			<?php
				$attributes = array('id' => 'signin');
				$this->session->sess_destroy();
				//echo form_open( $this->input->get('formDestination'),$attributes);
				echo form_open( $formDestination,$attributes );
				if(isset($validationErrors) == "TRUE")
				{
					 echo "<div class='popup-row' align='center'>".$validationErrors."</div>"; 
				}
			?>
				
				<?php $this->load->view("login_interface"); ?>	
				</form>			
		</div>		
		
	</div>
</div>