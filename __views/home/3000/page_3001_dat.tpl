
<thead frozen="true">
	<tr align="center" valign="middle">
		<th rowspan="2" width="32">NO</th>
		<th rowspan="2" class="hide">KOTA/AREA ID</th>
		<th rowspan="2" class="hide">Start Period</th>
		<th rowspan="2" class="hide">End Period</th>
		<th rowspan="2" >KOTA/AREA</th>
		<th colspan="2">Plan</th>
		<th colspan="3">Progress Real AP WIFI</th>
	</tr>
	<tr align="center" valign="middle">
		<th>Site Per Kota</th>
		<th>AP Per Kota</th>
		<th>Install Per Kota</th>
		<th>On Air Per Kota</th>
		<th>Total UT/ATP Per Kota</th>
    </tr>
</thead>
{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		
		{foreach name=data from=$datx.dat item=td}
			<tr class="{cycle values='even,odds'} hover">
				<td class="center" >{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
				<td class="kota_id detail hide">
					{$td.kota_id}
				</td>
				<td class="start_period detail hide">
					{$start_period}
				</td>
				<td class="end_period detail hide">
					{$end_period}
				</td>
				<td>
					{$td.kota_desc}
				</td>
				<td  class="center">
					{if $td.jml_site_plan==0 || !isset($td.jml_site_plan) || empty($td.jml_site_plan)}
					-
					{else}
					{$td.jml_site_plan|numeric_format:0}
					{/if}
					
				</td>
				<td  class="center">
					{if $td.jml_ap_plan==0 || !isset($td.jml_ap_plan) || empty($td.jml_ap_plan)}
					-
					{else}
					{$td.jml_ap_plan|numeric_format:0}
					{/if}
					
				</td>
				<td  class="center">
					{if $td.jml_ap_installed==0 || !isset($td.jml_ap_installed) || empty($td.jml_ap_installed)}
					-
					{else}
					<a rel="#f{$menu}" href="#index.php/home/detail_/3001" title="Detail" param="opt#2 ap#installed" onclick="detail_(this)">{$td.jml_ap_installed}</a>
					{/if}
				</td>
				<td  class="center">
					{if $td.jml_ap_tes_com==0 || !isset($td.jml_ap_tes_com) || empty($td.jml_ap_tes_com)}
					-
					{else}
					<a rel="#f{$menu}" href="#index.php/home/detail_/3001" title="Detail" param="opt#3 ap#tes_com" onclick="detail_(this)">{$td.jml_ap_tes_com}</a>
					
					{/if}
				</td>
				<td  class="center">
					{if $td.jml_ap_ut==0 || !isset($td.jml_ap_ut) || empty($td.jml_ap_ut)}
					-
					{else}
					<a rel="#f{$menu}" href="#index.php/home/detail_/3001" title="Detail" param="opt#7 ap#tes_com" onclick="detail_(this)">{$td.jml_ap_ut}</a>
					
					{/if}
				</td>
			</tr>
		{/foreach}
		
		<tr class="{cycle values='even,odds'} hover">
				<td colspan="2">
					Total
				</td>
				<td  class="center">
				{if $datx.jml_site_plan_per_kota==0 || !isset($datx.jml_site_plan_per_kota) || empty($datx.jml_site_plan_per_kota)}
				-
				{else}
					{$datx.jml_site_plan_per_kota}
				{/if}
				</td>
				<td  class="center">
				{if $datx.jml_ap_plan_per_kota==0 || !isset($datx.jml_ap_plan_per_kota) || empty($datx.jml_ap_plan_per_kota)}
				-
				{else}
					{$datx.jml_ap_plan_per_kota}
				{/if}
				</td>
				<td  class="center">
				{if $datx.jml_ap_install==0 || !isset($datx.jml_ap_install) || empty($datx.jml_ap_install)}
				-
				{else}
				{$datx.jml_ap_install}
				{/if}
				</td>
				<td  class="center">
				{if $datx.jml_ap_tes_com==0 || !isset($datx.jml_ap_tes_com) || empty($datx.jml_ap_tes_com)}
				-
				{else}
					{$datx.jml_ap_tes_com}
				{/if}
				</td>
				<td  class="center">
				{if $datx.jml_ap_ut==0 || !isset($datx.jml_ap_ut) || empty($datx.jml_ap_ut)}
				-
				{else}
					{$datx.jml_ap_ut}
				{/if}
				</td>
		</tr>
		<tr class="{cycle values='even,odds'} hover">
				<td colspan="4">
					Persentase Progress
				</td>
				<td  class="center">
					{$datx.prs_ap_install|numeric_format:2}%
				</td>
				<td  class="center">
					{$datx.prs_ap_tes_com|numeric_format:2}%
				</td>
				<td  class="center">
					{$datx.prs_ap_ut|numeric_format:2}%
				</td>
		</tr>
		
		</tbody>
	{/if}
{/if}
{*
{include file="home/page_tfoot_report.tpl" col=7}
*}