<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * Type:     modifier
 * Name:     format_price
 * Purpose:  format price with configurable thousands and decimal separators
 * -------------------------------------------------------------
 */
function smarty_modifier_currency($price, $thousand_delim = ",", $decimal_delim = ".", $precision = "2") {
	if(!$price) return null;
	$price 		= sprintf("%.$precision"."f", $price);
	$price 		= str_replace(".", $decimal_delim, $price);
	$pos 		= strpos($price, $decimal_delim);
	if (!$pos)
		$pos 	= strlen($price);
	for ($i = $pos -3; $i > 0; $i -= 3) {
		$price	= substr($price, 0, $i).$thousand_delim.substr($price, $i);
	}

	$price 	= str_replace("-", "(", $price);
	if(substr($price, 0, 1) == "(") {
		$price 	= $price.")";
		if (substr($price, 1, 1) == $thousand_delim)
			$price 	= substr_replace($price, '', 1, 1);
	}
	return $price;
}
?>