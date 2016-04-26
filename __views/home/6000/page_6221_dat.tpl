<tbody>
		
				<tr>
					<th class="center" width="200"><strong>Jenis Susu</strong></th>
					<th class="center" width="100"> <strong>Jumlah </strong></th>
				</tr>
				{foreach from=$opt_stock_milk_type_prod item=i}
				<tr>
					<td class="center">{$i.nm}</td>
					<td class="center">{if $i.jml<0}0{else}{$i.jml}{/if} Liter</td>
				</tr>
				
				{/foreach}
			</tbody>