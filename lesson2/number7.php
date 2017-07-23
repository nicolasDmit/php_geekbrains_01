<?php

$hour = date("H");
$min = date("i");

switch($min)
{
	case 01:
	case 21:
	case 31:
	case 41:
	case 51:
		$min = " $min минута";
		break;
	
	case 02:
	case 03:
	case 04:
	case 22:
	case 23:
	case 24:
	case 32:
	case 33:
	case 42:
	case 43:
	case 44:
	case 53:
	case 54:
		$min = " $min минуты";
		break;
		
	default:
		$min = " $min минут";
		break;
}


switch($hour)
{
	case 01:
	case 21:
		$hour = "$hour час";
		break;
		
	case 02:
	case 03:
	case 04:
	case 22:
	case 23:
		$hour = "$hour часа";
		break;
		
	default:
		$hour = "$hour часов";\
		break;
}
echo $hour . $min;

?>