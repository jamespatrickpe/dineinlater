<?php
class MY_Model extends CI_Model 
{
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