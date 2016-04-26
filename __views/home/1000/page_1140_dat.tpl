
<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th class="hide">barang reff id</th>
		<th class="hide">trx_cat id</th>
		<th>Nama Barang</th>
		<th>Keterangan</th>
		<th>Satuan</th>
		<th>Harga</th>
		<th class="crud"></th>
		
    </tr>
</thead>


{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		
		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td class="barang_reff_id pkey hide">{$td.barang_reff_id}</td> 
			<td class="trx_cat_id hide">{$td.trx_cat_id}</td>
			<td class="barang_reff_name">{$td.barang_reff_name}</td>
			<td class="barang_reff_desc">{$td.barang_reff_desc}</td>
			<td class="barang_reff_sat">{$td.barang_reff_sat}</td>
			<td class="harga hide">{$td.harga}</td>
			<td class="right">Rp {$td.harga|number_format}</td>
			{include file="home/page_btn_updel.tpl"}
		</tr>
		{/foreach}
		
		<tr><td colspan="7" class="bold right red">TOTAL GROUP: {$datx.tot|numeric_format:0}</td></tr>
		
		</tbody>
	{/if}
{/if}
{include file="home/page_tfoot.tpl" col=7}













	
	

