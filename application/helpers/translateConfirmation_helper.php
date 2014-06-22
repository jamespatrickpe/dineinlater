<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('translateConfirmation'))
{
    function translateConfirmation($var)
    {
    	if($var = 1)
		{
			echo "CONFIRMED";
		}
		else
		{
			echo "NOT CONFIRMED";
		}
    }   
}

