<div id="nota_container">
	<table>
		<tr>
			<td width="100px">Tanggal</td>
			<td width="5">:</td>
			<td width="200px">{$cur_date}</td>
			<td width="110" style="text-align:center;">Relasi</td>
			<td width="300px" rowspan="2" style="border:1px solid #000; -moz-border-radius:10px; border-radius:10px; padding:10px 10px 10px 10px;">
			{$data_customer.0.customer_name}
			<br/>
			{$data_customer.0.customer_address}
			</td>
		</tr>
		<tr>
			<td>No Faktur</td>
			<td>:</td>
			<td>{$no_faktur}</td>
			<td></td>
		</tr>
	</table>
	
	<h3> Invoice -  Faktur Penjualan </h2>
	<h3> CITRA MADANI LIVESTOCK </h2>
	
	<table border="0" style="font-size:12px">
		<tr>
			<th width="25px"  style="border:1px solid #000;">No</th>
			<th width="100px" style="border:1px solid #000;">nosj</th>
			<th width="100px" style="border:1px solid #000;">Tgl Kirim</th>
			<th width="200px" style="border:1px solid #000">Nama Barang</th>
			<th width="100px" style="border:1px solid #000;">Qty</th>
			<th width="100px" style="border:1px solid #000;">Harga</th>
			<th width="100px" style="border:1px solid #000;">Harga Jual</th>
		</tr>
			{if $datx.dat}
		<tbody>
		{$total_nota = 0}
		{foreach name=data from=$datx.dat item=td}
		{$total_nota = $total_nota + $td.total_harga}
		<tr>
			<td style="border-bottom:1px solid #000; text-align:center;">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td style="border-bottom:1px solid #000; text-align:center;">{$td.nota_id }</td>
			<td style="border-bottom:1px solid #000; text-align:center;">{$td.date_nota}</td>
			<td style="border-bottom:1px solid #000">{$td.product_desc}</td>
			<td style="border-bottom:1px solid #000; text-align:center;">{$td.jml|number_format}</td>
			<td style="border-bottom:1px solid #000; text-align:right;">{$td.harga|number_format}</td>
			<td style="border-bottom:1px solid #000; text-align:right;">{$td.total_harga|number_format}</td>
		<tr>
		{/foreach}
		{/if}
		<tr>
			<td colspan="6"  style="border-top:2px solid #000"><b>Grand Total</b></td>
			<td style="border-top:2px solid #000; text-align:right;"> {$total_nota|number_format}</td>
		</tr>
		<tr>
			<td colspan="6"  style="border-top:2px solid #000"><b>Debet</b></td>
			<td style="border-top:2px solid #000; text-align:right;"> {$daty.debet|number_format}</td>
		</tr>
		<tr>
			<td colspan="6"  style="border-top:2px solid #000"><b>Piutang</b></td>
			<td style="border-top:2px solid #000; text-align:right;"> {$daty.piutang|number_format}</td>
		</tr>
	</table>
	<br/>
	<br/>
		<table>
			<tr>
				<td width="450px">
					<div style="width:230px; height:auto; padding:20px; border:1px solid #000; -moz-border-radius:10px; border-radius:10px;">
					<b>Pembayaran</b><br/>
					Cash/ Transfer to:<br/>
					{$data_rekening.0.bank_name}<br/>
					Cab. {$data_rekening.0.cabang}<br/>
					Acc #. {$data_rekening.0.no_rek}<br/>
					A/n. {$data_rekening.0.rekening_name}<br/>
					</div>
				</td>
				<td width="240px" style="vertical-align:top; text-align:left; border-bottom:2px solid #000">
					Hormat Kami, <br/>
					Divisi Pemasaran dan Pengolahan
				</td>
			</tr>
		</table>
	
	<br/>
</div>
<div style="margin-left:50px;">
	<table>
	<tr>
		<td><a style="float:left" class="easyui-linkbutton bold"  rel="#f{$menu}" href="#" onclick="cetak_nota()" iconCls="icon-print">Print</a></td>
		<td><label>&nbsp;</label><a rel="#f{$menu}" href="#" class="easyui-linkbutton bold bck" plain="true"  onclick="nota_batal()" iconCls="icon-cancel">Batal</a></td>
	</tr>	
	</table>
</div>
