<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th class="hide">milk_split_id</th>
		<th class="hide">milk_type_id</th>
		<th >Tanggal</th>
		
		<th >Jenis Susu</th>
		<th>dari Jumlah Susu Supply</th>
		<th class="hide">Jumlah</th>
		<th>Jumlah Siap Produksi</th>
		<th class="hide">Jumlah Siap Produksi</th>
		<th class="crud"></th>
    </tr>
</thead>


{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		
		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td class="milk_split_id pkey hide" >{$td.milk_split_id}</td>
			<td class="milk_type_id hide" >{$td.milk_type_id}</td>
			<td class="date_milk_split">{$td.date_milk_split}</td>
			<td class="milk_type_name">{$td.milk_type_name}</td>
			<td >{$td.jml} Liter</td>
			<td  class="jml hide">{$td.jml}</td>
			<td >{$td.jml_after} Liter</td>
			<td  class="jml_after hide">{$td.jml_after}</td>
			<td class="icons center">
				<a class="upd" rel="#f{$menu}" href="#f{$menu}" title="Edit Data"></a>
				<a class="del" rel="#f{$menu}" href="#f{$menu}" title="Hapus Data"></a>
			</td>
		</tr>
		{/foreach}
		
		<tr><td colspan="10" class="bold right red">TOTAL GROUP: {$datx.tot|numeric_format:0}</td></tr>
		
		</tbody>
	{/if}
{/if}
{include file="home/page_tfoot.tpl" col=10}
