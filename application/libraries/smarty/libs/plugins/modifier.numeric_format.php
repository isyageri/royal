<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * Type:     modifier
 * Name:     format_price
 * Purpose:  format price with configurable thousands and decimal separators
 * -------------------------------------------------------------
 */
function smarty_modifier_numeric_format($valx, $precision = "2", $thousand_delim = ",", $decimal_delim = ".") {
	if(!is_numeric($valx)) $valx = 0;
	$valx 		= sprintf("%.$precision"."f", $valx);
	$valx 		= str_replace(".", $decimal_delim, $valx);
	$pos 		= strpos($valx, $decimal_delim);
	if (!$pos)
		$pos 	= strlen($valx);
	for ($i = $pos -3; $i > 0; $i -= 3) {
		$valx	= substr($valx, 0, $i).$thousand_delim.substr($valx, $i);
	}

	$valx 	= str_replace("-", "(", $valx);
	if(substr($valx, 0, 1) == "(") {
		$valx 	= $valx.")";
		if (substr($valx, 1, 1) == $thousand_delim)
			$valx 	= substr_replace($valx, '', 1, 1);
	}
	return $valx;
}
?>