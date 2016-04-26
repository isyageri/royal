<tbody>
		
				<tr>
					<th class="center" width="200"><strong>Jenis Susu</strong></th>
					<th class="center" width="100"> <strong>Jumlah </strong></th>
					<th class="center" width="200">
					<strong>Jumlah Siap Produksi</strong>
					</th>
					<th class="center" width="200">
					<strong>Sisa</strong>
					</th>
				</tr>
				{foreach from=$opt_milk_type_prod item=i}
				<tr>
					<td class="center">{$i.nm}</td>
					<td class="center">{$i.jml} Liter</td>
					<td class="center">{$i.jml_after} Liter</td>
					<td class="center">{$i.jml_after - $i.jml_terpakai} Liter</td>
				</tr>
				
				{/foreach}
			</tbody>