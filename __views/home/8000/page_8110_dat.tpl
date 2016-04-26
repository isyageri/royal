
<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th>Tanggal</th>
		<th>Pembeli</th>
		<th>Produk</th>
		<th>Harga</th>
		<th>Jumlah</th>
		<th>Total Harga Produk</th>
		<th>Total Harga Nota</th>
		<th>Debet</th>
		<th>Piutang</th>
    </tr>
</thead>


{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		{$tot_harganota = 0}
		{$tot_debet = 0}
		{$tot_piutang = 0}
		{foreach name=data from=$datx.dat item=td}
			{$flag = 0}
			{foreach name=datax from=$td.dat item=tds}
			<tr class="{cycle values='even,odds'} hover">
			
				{if $flag==0}
					<td rowspan="{$td.size}" class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
					<td rowspan="{$td.size}" class="date_nota">{$td.date_nota}</td>
					<td rowspan="{$td.size}" class="customer_name">{$td.customer_name}</td>
				{/if}
				
				<td class="product_name">{$tds.product_name}</td>
				{if !$tblo}
					<td class="harga right">Rp {$tds.harga|number_format}</td>
				{else}
					<td class="harga right">Rp {$tds.harga}</td>
				{/if}
				<td class="jml right">{$tds.jml}</td>
				{if !$tblo}
					<td class="total_harga right">Rp {$tds.total_harga|number_format}</td>
				{else}
					<td class="total_harga right">Rp {$tds.total_harga}</td>
				{/if}
				{if $flag==0}
					{if !$tblo}
						<td rowspan="{$td.size}" class="ttl_hrg_nota right">Rp {$td.ttl_hrg_nota|number_format}</td>
						<td rowspan="{$td.size}" class="debet right">Rp {$td.debet|number_format}</td>
						<td rowspan="{$td.size}" class="piutang right">Rp {$td.piutang|number_format}</td>
					{else}
						<td rowspan="{$td.size}" class="ttl_hrg_nota right">Rp {$td.ttl_hrg_nota}</td>
						<td rowspan="{$td.size}" class="debet right">Rp {$td.debet}</td>
						<td rowspan="{$td.size}" class="piutang right">Rp {$td.piutang}</td>
					{/if}
					{$tot_harganota = $tot_harganota+$td.ttl_hrg_nota}
					{$tot_debet = $tot_debet+$td.debet}
					{$tot_piutang = $tot_piutang+$td.piutang}
				{/if}
			{$flag = 1}
	
			</tr>
			
			{/foreach}
		{/foreach}
		
		<!--<tr><td colspan="10" class="bold right red">TOTAL GROUP: {$datx.tot|numeric_format:0}</td></tr>-->
		<tr class="{cycle values='even,odds'} hover">
			<td class="right" colspan="7">Total</td>
			{if !$tblo}
				<td class="right">Rp {$tot_harganota|number_format}</td>
				<td class="right">Rp {$tot_debet|number_format}</td>
				<td class="right">Rp {$tot_piutang|number_format}</td>
			{else}
				<td class="right">Rp {$tot_harganota}</td>
				<td class="right">Rp {$tot_debet}</td>
				<td class="right">Rp {$tot_piutang}</td>
			{/if}
		</tr>
		</tbody>
	{/if}
{/if}















	
	

