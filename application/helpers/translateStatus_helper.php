<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('translateStatus'))
{
    function translateStatus($var)
    {
    	if($var = "O")
		{
			echo "OPEN";
		}
		else if($var = "F")
		{
			echo "FULL";
		}
		else
		{
			echo "UNKNOWN";
		}
    }   
}