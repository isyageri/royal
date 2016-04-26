
<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th class="hide">customer id</th>
		<th>Nama Customer</th>
		<th>Debet</th>
		<th>Piutang</th>
		<th class="crud"></th>
		
    </tr>
</thead>


{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>

		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td class="customer_id hide">{$td.customer_id}</td>			
			<td class="customer_name">{$td.customer_name}</td>
			<td class="debet">Rp. {$td.debet|number_format}</td>
			<td class="piutang">Rp. {$td.piutang|number_format}</td>
			
			<td class="icons center">
				<a class="nota" rel="" href="#" onclick="additional_data(this,'#8192/additional_data','hide')" title="Cetak Nota"></a>
			</td>
		</tr>
		{/foreach}
		<tr><td colspan="6" class="bold right red">TOTAL GROUP: {$datx.tot|numeric_format:0}</td></tr>
		</tbody>
	{/if}
{/if}

{if $prop neq 'xls'}
<tfoot>
	<tr><td colspan="6" class="center">
		{if $access.p_retrieve==0}
			-- ANDA TIDAK BERHAK MEMBACA DATA INI --
		{elseif !$datx.dat}
			-- DATA YANG ANDA CARI TIDAK TERSEDIA --
		{else}
			{include file="home/page_btn_nav.tpl"}
		{/if}
		</td>
	</tr>
</tfoot>
{/if}















	
	

