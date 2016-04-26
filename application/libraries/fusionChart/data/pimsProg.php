<?php
	include('cdbase.php');
	$sql = "
		SELECT B.Pipelinezone, C.Comp_PipelineID, D.IMRActivity, E.IMRScope, F.IMR_Frequency, A.IMRPlanDate
		FROM dta_imrplan AS A 
		Inner Join idx_pipelinezone AS B ON A.BusinessArea = B.PipelinezoneID
		Inner Join dta_pipelineasset AS C ON A.PipelineName = C.PipelineID
		Inner Join idx_imractivity AS D ON A.IMRActivity = D.IMRActivity_ID
		Inner Join idx_imrscopemethod AS E ON A.IMRScope = E.IMRScope_ID
		Inner Join idx_imrfrequency AS F ON A.IMRFrequency = F.IMR_Frequency_ID";
		
	$tmp = "";
	$tmp2 = "";
	$x = 1;	
	$proses = "";
	$dataColumn = "";
	$runSQL = mysql_query($sql);
	while($getData = mysql_fetch_array($runSQL)){
		if($tmp != $getData['IMRActivity'])	{
			$tmp = $getData['IMRActivity'];
			$proses .= "<process Name='$tmp' id='$x' />";
		} else {
			$proses .= "<process Name='' id='$x' />";
		}	
		
		$tmp2 = $getData['IMRScope'];
		$dataColumn .= "<text label='$tmp2' />";
		
		$x++;
	}






echo "<chart 
	dateFormat='dd/mm/yyyy' 
	hoverCapBorderColor='2222ff' 
	hoverCapBgColor='e1f5ff' 
	ganttWidthPercent='55' 
	ganttLineAlpha='80' 
	canvasBorderColor='024455' 
	canvasBorderThickness='0' 
	gridBorderColor='4567aa' 
	gridBorderAlpha='20'>
	<categories  bgColor='ffffff' fontColor='1288dd' fontSize='8' >
	<category start='1/1/2010' end='31/3/2010' align='center' name='Q1'  isBold='1' />
	<category start='1/4/2010' end='30/6/2010' align='center' name='Q2'  isBold='1' />
	<category start='1/7/2010' end='31/9/2010' align='center' name='Q3' isBold='1' />
	<category start='1/10/2010' end='31/12/2010' align='center' name='Q4' isBold='1'/>
</categories>

<processes 
	headerText='IMR ACTIVITY' 
	fontSize='8' isBold='0' 
	headerbgColor='4567aa' 
	headerFontColor='ffffff' 
	headerFontSize='8' 
	width='200' 
	align='left'>

	$proses
</processes>

<dataTable 
	fontColor='000000' 
	fontSize='8' 
	align='left'>
	<dataColumn width='400' headerfontcolor='ffffff' headerBgColor='4567aa' headerText='SCOPE'>
		$dataColumn
	</dataColumn>
</dataTable>

<tasks>
	<task name='Planned' processId='1' start='1/4/2010' end='30/6/2010' id='1-1' color='4567aa' height='10' />
	<task name='Planned' processId='2' start='1/10/2010' end='31/12/2010' id='2-1' color='4567aa' height='10'/>
	<task name='Planned' processId='3' start='1/10/2010' end='31/12/2010' id='3-1' color='4567aa' height='10'/>
	<task name='Planned' processId='4' start='1/4/2010' end='30/6/2010' id='4-1' color='4567aa' height='10'/>
	<task name='Planned' processId='5' start='1/4/2010' end='30/6/2010' id='5-1' color='4567aa' height='10'/>
	<task name='Planned' processId='6' start='1/1/2010' end='31/3/2010' id='6-1' color='4567aa' height='10'/>
	<task name='Planned' processId='7' start='1/4/2010' end='30/6/2010' id='7-1' color='4567aa' height='10'/>
	<task name='Planned' processId='8' start='1/10/2010' end='31/12/2010' id='8-1' color='4567aa' height='10'/>
</tasks>
</chart>";

?>