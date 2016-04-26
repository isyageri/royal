
<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th class="hide">perkiraan id</th>
		<th>Nama Perkiraan</th>
		<th class="crud"></th>
		
    </tr>
</thead>


{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		
		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td class="trx_cat_id pkey hide">{$td.trx_cat_id}</td> 
			
			<td class="trx_cat_desc">{$td.trx_cat_desc}</td>
			
			{include file="home/page_btn_updel.tpl"}
		</tr>
		{/foreach}
		
		<tr><td colspan="4" class="bold right red">TOTAL GROUP: {$datx.tot|numeric_format:0}</td></tr>
		
		</tbody>
	{/if}
{/if}
{include file="home/page_tfoot.tpl" col=4}













	
	

