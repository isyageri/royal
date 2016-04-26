
<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th class="hide">customer id</th>
		<th>Nama Customer</th>
		<th>Alamat</th>
		<th>No. Telepon</th>
		<th class="crud"></th>
		
    </tr>
</thead>


{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		
		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td class="customer_id pkey hide">{$td.customer_id}</td> 
			
			<td class="customer_name">{$td.customer_name}</td>
			<td class="customer_address">{$td.customer_address}</td>
			<td class="customer_phone">{$td.customer_phone}</td>
			
			{include file="home/page_btn_updel.tpl"}
		</tr>
		{/foreach}
		
		<tr><td colspan="6" class="bold right red">TOTAL GROUP: {$datx.tot|numeric_format:0}</td></tr>
		
		</tbody>
	{/if}
{/if}
{include file="home/page_tfoot.tpl" col=6}













	
	

