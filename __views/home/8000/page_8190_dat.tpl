
<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th>Tanggal Produksi</th>
		<th>Nama Produk</th>
		<th>Jumlah Susu (Liter)</th>
		<th>Jumlah Produk</th>
    </tr>
</thead>


{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		
		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td class="date_distribution">{$td.date_distribution}</td>
			<td class="product_name">{$td.product_name}</td>
			<td class="jml_susu">{$td.jml_susu}</td>
			<td class="jml_product">{$td.jml_product} {$td.product_sat}</td>
		</tr>
		{/foreach}
		
		
		
		</tbody>
	{/if}
{/if}

{include file="home/page_tfoot_no_add.tpl" col=7}

