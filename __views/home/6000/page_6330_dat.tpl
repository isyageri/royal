
<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th class="hide">pengeluaran produksi id</th>
		<th class="hide">trx_cat id</th>
		<th class="hide">pasca_panen id</th>
		<th>Tanggal</th>
		<th>Perkiraan</th>
		<th>Jumlah</th>
		<th>Harga</th>
		<th>Total Harga</th>
		<th>Modal</th>
		<th>Uraian</th>
		<th class="crud"></th>
    </tr>
</thead>


{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		
		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td class="fp_pengeluaran_produksi_id hide pkey">{$td.fp_pengeluaran_produksi_id}</td>
			<td class="trx_cat_id hide">{$td.trx_cat_id}</td>
			<td class="pasca_panen_id hide">{$td.pasca_panen_id}</td>
			<td class="date_pengeluaran_produksi">{$td.date_pengeluaran_produksi}</td>
			<td class="trx_cat_desc">{$td.trx_cat_desc}</td>
			
			
			<td class="jml hide">{$td.jml }</td>
			<td class="right">{$td.jml } {$td.satuan} </td>
			
			<td class="harga hide">{$td.harga}</td>
			<td class="right">Rp {$td.harga|number_format}</td>
			
			<td class="total_harga hide">{$td.total_harga}</td>
			<td class="right">Rp {$td.total_harga|number_format}</td>
			
			<td class="date_pasca_panen">{$td.date_pasca_panen} {$td.modal_name}</td>
			<td class="note">{$td.note}</td>
			{include file="home/page_btn_updel.tpl"}
		</tr>
		{/foreach}
		
		<tr><td colspan="12" class="bold right red">TOTAL GROUP: {$datx.tot|numeric_format:0}</td></tr>
		
		</tbody>
	{/if}
{/if}
{include file="home/page_tfoot.tpl" col=12}













	
	

