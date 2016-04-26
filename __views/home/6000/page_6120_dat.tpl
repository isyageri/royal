
<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th class="hide">alur id</th>
		<th class="hide">trx_cat id</th>
		<th class="hide">barang_reff id</th>
		<th class="hide">pasca_panen id</th>
		<th>Tanggal</th>
		<th>Perkiraan</th>
		<th>Nama Barang</th>
		<th>Harga</th>
		<th>Jumlah</th>
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
			<td class="fp_alur_barang_id hide pkey">{$td.fp_alur_barang_id}</td>
			<td class="trx_cat_id hide">{$td.trx_cat_id}</td>
			<td class="barang_reff_id hide">{$td.barang_reff_id}</td>
			<td class="pasca_panen_id hide">{$td.pasca_panen_id}</td>
			
			<td class="date_alur_barang">{$td.date_alur_barang}</td>
			<td class="trx_cat_desc">{$td.trx_cat_desc}</td>
			<td class="barang_reff_name">{$td.barang_reff_name}</td>
			
			<td class="harga hide">{$td.harga}</td>
			<td class="right">Rp {$td.harga|number_format}</td>
			
			<td class="jml hide">{$td.jml }</td>
			<td class="right">{$td.jml } {$td.barang_reff_sat} </td>
			
			<td class="total_harga hide">{$td.total_harga}</td>
			<td class="right">Rp {$td.total_harga|number_format}</td>
			
			<td class="date_pasca_panen">{$td.date_pasca_panen} {$td.modal_name}</td>
			<td class="note">{$td.note}</td>
			
			
			<!--<td class="trx_cat_desc">{$td.trx_cat_desc}</td>
			<td class="barang_reff_name">{$td.barang_reff_name}</td>
			
			<td class="harga hide">{$td.harga}</td>
			<td class="right">Rp {$td.harga|number_format}</td>
			<td class="jml hide">{$td.jml }</td>
			<td class="right">{$td.jml } {$td.barang_reff_sat} </td>
			<td class="total_harga hide">{$td.total_harga}</td>
			<td class="right">Rp {$td.total_harga|number_format}</td>
            <td class="date_alur_barang">{$td.date_alur_barang}</td>
			<td class="kredit hide">{$td.kredit}</td>
			<td class="right">RP {$td.kredit|number_format}</td>
			<td class="note">{$td.note}</td>-->
			{include file="home/page_btn_updel.tpl"}
		</tr>
		{/foreach}
		
		<tr><td colspan="16" class="bold right red">TOTAL GROUP: {$datx.tot|numeric_format:0}</td></tr>
		
		</tbody>
	{/if}
{/if}
{include file="home/page_tfoot.tpl" col=16}













	
	

