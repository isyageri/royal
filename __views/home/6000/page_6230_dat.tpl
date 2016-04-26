
<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th class="hide">supply susu id</th>
		<th class="hide">product id</th>
		<th class="hide">milk type id</th>
		<th>Nama Produk</th>
		<th>Jumlah Produk</th>
		<th>Jenis Susu</th>
		<th>Dari Jumlah Susu</th>
		<th>Tanggal Distribusi</th>
		<th class="crud"></th>
    </tr>
</thead>


{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		
		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td class="fp_distribution_id pkey hide" >{$td.fp_distribution_id}</td>
			<td class="product_id hide" >{$td.product_id}</td>
			<td class="milk_type_id hide" >{$td.milk_type_id}</td>
			<td class="product_name">{$td.product_name}</td>
			<td class="jml_product">{$td.jml_product}</td>
			<td class="milk_type_name">{$td.milk_type_name}</td>
			<td class="jml_susu">{$td.jml_susu} Liter</td>
			<td class="date_distribution">{$td.date_distribution}</td>
			{include file="home/page_btn_updel.tpl"}
			
		</tr>
		{/foreach}
		
		<tr><td colspan="10" class="bold right red">TOTAL GROUP: {$datx.tot|numeric_format:0}</td></tr>
		
		</tbody>
	{/if}
{/if}
{include file="home/page_tfoot.tpl" col=10}















	
	

