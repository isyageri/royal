<?php
	include('cdbase.php');
	$sql = "SELECT ROUND(Sum(PFOilProduction)) AS Oil, ROUND(Sum(PFWaterProduction)) AS Water, ROUND(Sum(PFGasProduction)) AS Gas
		FROM dta_plattformproduction WHERE PFProductionMonth = (SELECT Max(PFProductionMonth) FROM dta_plattformproduction)";
	$runSQL = mysql_query($sql);
	while($getData = mysql_fetch_array($runSQL)){
		$oil = $getData['Oil'];
		$gas = $getData['Gas'];
		$water = $getData['Water'];
	};	
	
echo "
	<graph 
		decimalPrecision='0' 
		formatNumberScale='0'>
	<set name='3P / Oil' value='$oil' color='b4ac4b'/>
	<set name='Gas' value='$gas' color='ff9933'/>
	<set name='Water' value='$water' color='99d9ea'/>
	</graph>";

?>