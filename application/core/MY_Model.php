<?php
class MY_Model extends CI_Model 
{
	// returns value if results are singular 
	public function singularResults($query)
	{
		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	// returns value if results are multiple 
	public function multipleResults($query)
	{
		if($query -> num_rows() >= 1)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
}