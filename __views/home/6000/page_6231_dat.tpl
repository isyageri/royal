


<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		{if !$tblo}<th class="hide">fp_distribution_id</th>
		<th class="hide">milk_split_id</th>
		<th class="hide">product_id</th>
		<th class="product_sat hide">product_sat</th>
		{/if}
		<th >Jenis Susu</th>
		<th>Nama Produk</th>
		<th>Jumlah</th>
		{if !$tblo}<th class="hide">Jumlah</th>
		{/if}
		<th>Dari Jumlah Susu</th>
		{if !$tblo}<th class="hide">Dari Jumlah Susu</th>
		{/if}
		<th class="crud"></th>
    </tr>
</thead>



	{if $datx.dat}
		<tbody>
		
		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			{if !$tblo}<td class="fp_distribution_id pkey hide" >{$td.fp_distribution_id}</td>
			<td class="milk_split_id hide" >{$td.milk_split_id}</td>
			<td class="product_id hide" >{$td.product_id}</td>
			<td class="product_sat hide" >{$td.product_sat}</td>
			{/if}
			<td class="milk_type_name">{$td.milk_type_name}</td>
			
			<td class="product_name">{$td.product_name}</td>
			<td >{$td.jml_product} {$td.product_sat}</td>
			{if !$tblo}<td  class="jml_product hide">{$td.jml_product}</td>
			{/if}
			<td  >{$td.jml_susu} Liter</td>
			
			{if !$tblo}<td  class="jml_susu hide">{$td.jml_susu}</td>
			{/if}
			<td class="icons center">
				<a class="upd" rel="#f{$menu}" href="#f{$menu}" title="Edit Data"></a>
				<a class="del" rel="#f{$menu}" href="#f{$menu}" title="Hapus Data"></a>
			</td>
		</tr>
		{/foreach}
		{if !$tblo}
		<tr><td colspan="11" class="bold right red">TOTAL GROUP: {$datx.tot|numeric_format:0}</td></tr>
		{/if}
		</tbody>
	{/if}

{if $prop neq 'xls'}
<tfoot>
	
	<tr>
		<td colspan="11" class="icons right" style="background-color:#BBBBBB">
			
			<a class="add easyui-linkbutton bold"  rel="#f{$menu}" href="#f{$menu}" iconCls="icon-add">Create New</a>
			
		</td>
	</tr>
	<tr><td colspan="11" class="center">
		{if !$datx.dat}
			-- DATA YANG ANDA CARI TIDAK TERSEDIA --
		{else}
			{include file="home/page_btn_nav.tpl"}
		{/if}
		</td>
	</tr>
</tfoot>
{/if}




	
	

