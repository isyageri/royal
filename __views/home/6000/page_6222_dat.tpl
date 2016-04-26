<tbody>
		
				<tr>
					<th class="center" ><strong>Jumlah Stock Supply Susu</strong></th>
				</tr>
				{foreach from=$opt_stock_supply item=i}
				<tr>
					<td class="center">{if $i.jml<0}0{else}{$i.jml}{/if} Liter</td>
				</tr>
				
				{/foreach}
			</tbody>