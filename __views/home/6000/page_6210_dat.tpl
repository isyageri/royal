
<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th class="hide">supply susu id</th>
		<th class="hide">pasca panen id</th>
		<th>Tanggal Supply</th>
		<th>Jumlah</th>
		<th class="hide">Jumlah</th>
		<th>Harga</th>
		<th>Total Harga</th>
		<th>Modal</th>
		<th>Keterangan</th>
		<th class="crud"></th>
    </tr>
</thead>


{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		
		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td class="fp_milk_supply_id pkey hide">{$td.fp_milk_supply_id}</td>
			<td class="pasca_panen_id hide">{$td.pasca_panen_id}</td>
			<td class="date_supply">{$td.date_supply}</td>
			<td >{$td.jml} Liter</td>
			<td class="jml hide">{$td.jml}</td>
			<td class="harga">{$td.harga}</td>
			<td class="total_harga">{$td.total_harga}</td>
			<td class="modal_name">{$td.modal_name}</td>
			<td class="note">{$td.note}</td>
			{include file="home/page_btn_updel.tpl"}
		</tr>
		{/foreach}
		
		<tr><td colspan="11" class="bold right red">TOTAL GROUP: {$datx.tot|numeric_format:0}</td></tr>
		
		</tbody>
	{/if}
{/if}
{include file="home/page_tfoot.tpl" col=11}













	
	

