
<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th class="hide">nota_id</th>
		<th class="hide">customer_id</th>
		<th>Tanggal</th>
		<th>Pembeli</th>
		<th>Total Harga</th>
		<th>Debet</th>
		<th>Piutang</th>
		<th>Uraian</th>
		<th class="crud"></th>
		<th class="crud"></th>
    </tr>
</thead>


{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		
		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td class="nota_id pkey hide add_data">{$td.nota_id}</td> 
			<td class="customer_id hide">{$td.customer_id}</td> 
			
			<td class="date_nota">{$td.date_nota}</td>
			<td >{$td.customer_name}</td>
			<td class="total_harga hide">{$td.total_harga}</td>
			<td class="right">Rp {$td.total_harga|number_format}</td>
			
			<td class="debet hide">{$td.debet}</td>
			<td class="right">Rp {$td.debet|number_format}</td>
			
			<td class="piutang hide">{$td.piutang}</td>
			<td class="right">Rp {$td.piutang|number_format}</td>
			<td class="note">{$td.note}</td>
			<td class="icons center">
				{if $access.p_update==1}<a class="easyui-linkbutton" plain="true" icon="icon-edit_doc" rel="#f{$menu}" href="#f{$menu}" onclick="additional_data(this,'#6321/additional_data')" title="Edit Detail Penjualan"></a>{/if}
			</td>
			{include file="home/page_btn_updel.tpl"}
		</tr>
		{/foreach}
		
		<tr><td colspan="10" class="bold right red">TOTAL GROUP: {$datx.tot|numeric_format:0}</td></tr>
		
		</tbody>
	{/if}
{/if}
{include file="home/page_tfoot.tpl" col=10}