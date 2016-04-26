<?php
	include('cdbase.php');
	$sql = "
		SELECT W.TAHUN, X.CBU, Y.NBU, Z.SBU FROM (
			SELECT DISTINCT YEAR(LeakDate) AS TAHUN FROM dta_leakhistory
			WHERE (YEAR(LeakDate) >  2004 AND YEAR(LeakDate) <  2010) 
			ORDER BY YEAR(LeakDate) ASC) W 
			
		LEFT OUTER JOIN (
			SELECT Count(YEAR(A.LeakDate)) AS CBU, YEAR(A.LeakDate) AS TAHUN FROM dta_leakhistory A
			Inner Join dta_pipelineasset B ON A.PipelineName = B.PipelineID
			Inner Join idx_pipelinezone C ON B.PipelineZone = C.PipelinezoneID
			WHERE B.PipelineZone = '1' GROUP BY YEAR(A.LeakDate)) X 
		ON W.TAHUN = X.TAHUN

		LEFT OUTER JOIN (
			SELECT Count(YEAR(A.LeakDate)) AS NBU, YEAR(A.LeakDate) AS TAHUN FROM dta_leakhistory A
			Inner Join dta_pipelineasset B ON A.PipelineName = B.PipelineID
			Inner Join idx_pipelinezone C ON B.PipelineZone = C.PipelinezoneID
			WHERE B.PipelineZone = '2' GROUP BY YEAR(A.LeakDate)) Y
		ON W.TAHUN = Y.TAHUN

		LEFT OUTER JOIN (
			SELECT Count(YEAR(A.LeakDate)) AS SBU, YEAR(A.LeakDate) AS TAHUN FROM dta_leakhistory A
			Inner Join dta_pipelineasset B ON A.PipelineName = B.PipelineID
			Inner Join idx_pipelinezone C ON B.PipelineZone = C.PipelinezoneID
			WHERE B.PipelineZone = '3' GROUP BY YEAR(A.LeakDate)) Z
		ON W.TAHUN = Z.TAHUN";
	$tmp = "<graph decimalPrecision='0' showvalues='0' yaxisminvalue='0' yaxismaxvalue='10' rotateNames='0'>";	
	$tmpCatg = "<categories>";
	$tmpNBU = "<dataset seriesName='NBU' color='1D8BD1' anchorBorderColor='1D8BD1' anchorBgColor='1D8BD1'>";
	$tmpCBU = "<dataset seriesName='CBU' color='F1683C' anchorBorderColor='F1683C' anchorBgColor='F1683C'>";
	$tmpSBU = "<dataset seriesName='SBU' color='2AD62A' anchorBorderColor='2AD62A' anchorBgColor='2AD62A'>";
	$runSQL = mysql_query($sql);
	while($getData = mysql_fetch_array($runSQL)){
		$thn = $getData['TAHUN'];
		$nbu = $getData['NBU'];
		$cbu = $getData['CBU'];
		$sbu = $getData['SBU'];
		if($nbu == '') $nbu = 0;
		if($cbu == '') $cbu = 0;
		if($sbu == '') $sbu = 0;
		
		$tmpCatg .= "<category name='$thn'/>";
		$tmpNBU .= "<set value='$nbu'/>";
		$tmpCBU .= "<set value='$cbu'/>";
		$tmpSBU .= "<set value='$sbu'/>";
	};	
	$tmpCatg .= "</categories>"; 
	$tmpNBU .= "</dataset>";
	$tmpCBU .= "</dataset>";
	$tmpSBU .= "</dataset>";
	$tmp .= "$tmpCatg $tmpNBU $tmpCBU $tmpSBU </graph>";
	
	echo $tmp;
?>