
<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th class="hide">pasca id</th>
		<th>Tanggal</th>
		<th>Nama Modal</th>
		<th>Modal</th>
		<th>Modal Terpakai</th>
		<th>Sisa Modal</th>
		<th>Uraian</th>
		<th class="crud"></th>
    </tr>
</thead>


{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		
		{foreach name=data from=$datx.dat item=td}
		{$sisa_modal = $td.modal - $td.modal_terpakai }
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td class="pasca_panen_id hide pkey">{$td.pasca_panen_id}</td>
			<td class="date_pasca_panen">{$td.date_pasca_panen}</td>
			
			<td class="modal_name">{$td.modal_name}</td>
			
			<td class="modal hide">{$td.modal}</td>
			<td class="right">Rp {$td.modal|number_format}</td>
			
			<td class="sisa_modal hide">{$td.modal_terpakai}</td>
			<td class="right">Rp {$td.modal_terpakai|number_format}</td>
			
			<td class="right">Rp {$sisa_modal|number_format}</td>
			
			<td class="modal_desc">{$td.modal_desc}</td>
		
			{include file="home/page_btn_updel.tpl"}
		</tr>
		{/foreach}
		
		<tr><td colspan="10" class="bold right red">TOTAL GROUP: {$datx.tot|numeric_format:0}</td></tr>
		
		</tbody>
	{/if}
{/if}
{include file="home/page_tfoot.tpl" col=10}













	
	

