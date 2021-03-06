


<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th class="hide">ph_id</th>
		<th class="hide">product_id</th>
		<th >Produk</th>
		<th>Jumlah</th>
		<th class="hide">Jumlah</th>
		<th class="hide">Harga</th>
		<th>Harga</th>
		<th class="hide">Total Harga</th>
		<th>Total Harga</th>
		<th>Keterangan</th>
		<th class="crud"></th>
    </tr>
</thead>



	{if $datx.dat}
		<tbody>
		
		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td class="ph_id pkey hide" >{$td.ph_id}</td>
			<td class="product_id hide" >{$td.product_id}</td>
			
			<td class="product_name">{$td.product_name}</td>
			<td class="jml right">{$td.jml} {$td.product_sat}</td>
			<td class="jml hide">{$td.jml}</td>
			<td class="harga hide">{$td.harga}</td>
			<td class="right">Rp {$td.harga|number_format}</td>
			<td class="total_harga hide">{$td.total_harga}</td>
			<td class="right">Rp {$td.total_harga|number_format}</td>
            <td  class="note">{$td.note}</td>
			<td class="icons center">
				<a class="upd" rel="#f{$menu}" href="#f{$menu}" title="Edit Data"></a>
				<a class="del" rel="#f{$menu}" href="#f{$menu}" title="Hapus Data"></a>
			</td>
		</tr>
		{/foreach}
		
		<tr><td colspan="9" class="bold right red">TOTAL GROUP: {$datx.tot|numeric_format:0}</td></tr>
		
		</tbody>
	{/if}

{if $prop neq 'xls'}
<tfoot>
	
	<tr>
		<td colspan="9" class="icons right" style="background-color:#BBBBBB">
			
			<a class="add easyui-linkbutton bold"  rel="#f{$menu}" href="#f{$menu}" iconCls="icon-add">Create New</a>
			
		</td>
	</tr>
	<tr><td colspan="9" class="center">
		{if !$datx.dat}
			-- DATA YANG ANDA CARI TIDAK TERSEDIA --
		{else}
			{include file="home/page_btn_nav.tpl"}
		{/if}
		</td>
	</tr>
</tfoot>
{/if}
