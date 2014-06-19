<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('echoMe'))
{
    function echoMe($var)
    {
    	if(isset($var) == true)
		{
			echo $var;
		}
		else 
		{
			
		}
    }   
}