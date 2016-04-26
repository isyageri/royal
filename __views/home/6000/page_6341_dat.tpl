


<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th class="hide">bayar_nota_id</th>
		<!--<th class="hide">nota_id</th>-->
		<th >Tanggal Pembayaran</th>
		<th class="hide">Jumlah Pembayaran</th>
		<th>Jumlah Pembayaran</th>	
		<th>Keterangan</th>
		<th class="crud"></th>
    </tr>
</thead>



	{if $datx.dat}
		<tbody>
		
		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td class="bayar_nota_id pkey hide" >{$td.bayar_nota_id}</td>
			<!--<td class="bayar_nota_id pkey hide" >{$td.nota_id}</td>-->
			<td class="date_bayar_nota">{$td.date_bayar_nota}</td>
			<td class="debet hide">{$td.debet}</td>
			<td class="right">Rp {$td.debet|number_format}</td>
			<td  class="note">{$td.note}</td>
			<td class="icons center">
				<a class="upd" rel="#f{$menu}" href="#f{$menu}" title="Edit Data"></a>
				<a class="del" rel="#f{$menu}" href="#f{$menu}" title="Hapus Data"></a>
			</td>
		</tr>
		{/foreach}
		
		<tr><td colspan="7" class="bold right red">TOTAL GROUP: {$datx.tot|numeric_format:0}</td></tr>
		
		</tbody>
	{/if}

{if $prop neq 'xls'}
<tfoot>
	
	<tr>
		<td colspan="7" class="icons right" style="background-color:#BBBBBB">
			
			<a class="add easyui-linkbutton bold"  rel="#f{$menu}" href="#f{$menu}" iconCls="icon-add">Create New</a>
			
		</td>
	</tr>
	<tr><td colspan="7" class="center">
		{if !$datx.dat}
			-- DATA YANG ANDA CARI TIDAK TERSEDIA --
		{else}
			{include file="home/page_btn_nav.tpl"}
		{/if}
		</td>
	</tr>
</tfoot>
{/if}
