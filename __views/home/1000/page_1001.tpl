{if !$tblo}
	<form id="fsearch" class="long hide">
		<fieldset class="expose">
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label>Site ID</label><input type="text" class="postit site_id long" value="" /> <br />
				<label>Lokasi</label><input type="text" class="postit lokasi long" value="" />
				{include file="home/page_btn_search.tpl"}
		</fieldset>
	</form>
{/if}

<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/1000/page_{$menu}_dat.tpl"}</table>

{if !$tblo}
	<form  class="long hide" id="upl{$menu}" method="post" enctype="multipart/form-data" action='{$url}import_sitac/uploadDocSitac/'>
		<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
		<fieldset id="f{$menu}" class="expose">
			<legend class="just_upd">Edit data Sitacsis</legend>
			<legend class="just_add">Add data Sitacsis</legend>
			<label class="mandatory hide">Site ID</label><input id="pkey" type="text" name="site_id" class="postit site_id  readonly wide hide" readonly value="" />
			<label >Site ID</label><input type="text"  class="postit no_order_tenos readonly wide" readonly  /><br />
			<label >Surat Pesanan</label><input type="text"  class="sp_name readonly wide" readonly  /><br />
			<label >Unit Bisnis</label><select type="text" class="postit unit_bisnis_id"  value=""> 
				<option value="">--Option--</option>
				{foreach from=$opt_unit_bisnis item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			</select><br />
			<label >Tanggal Nokes</label><input type="text" class="postit date_sitac date"  value="" /><br />
			<label >Tanggal Terima Nokes</label><input type="text" class="postit date_terima_nokes date"  value="" /><br />
			
			<label >Lokasi</label><input type="text" class="postit lokasi wide readonly" readonly  value="" /><br />
			<label >Alamat</label><textarea type="text" class="postit alamat wide readonly" readonly  value=""> </textarea><br />
			
			<label >Lokasi Real</label><input type="text" class="postit lokasi_real wide"  value="" /><br />
			<label >Alamat Real</label><textarea type="text" class="postit alamat_real wide"  value=""> </textarea><br />
			
			<label >RO</label><select type="text" class="postit ro_id"  value="" >
				<option value="">--Option--</option>
				{foreach from=$opt_ro item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			</select><br />
			<label >Segmentasi Site</label><select type="text" class="postit segment_id"  value="" >
				<option value="">--Option--</option>
				{foreach from=$opt_segment item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			</select><br />
			
			<label >Prioritas</label><select type="text" class="postit prioritas_id"  value="">
			<option value="">--Option--</option>
				{foreach from=$opt_prioritas item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			
			</select><br />
			<hr/>
			<label >Customer</label><br/>
			<label >Nama Customer</label><input type="text" class="lokasi_real readonly wide" readonly value="" /><br />
			<label >PIC Lokasi (BM)</label>
				<input type="text" class="postit pic_lokasi_name"  value="" />
				<input type="text" class="postit pic_lokasi_phone"  value="" />
				<input type="text" class="postit pic_lokasi_email"  value="" /><br />
		{*	<label >PIC Sitac</label>
				<input type="text" class="postit pic_sitac_name"  value="" />
				<input type="text" class="postit pic_sitac_phone"  value="" />
				<input type="text" class="postit pic_sitac_email"  value="" /><br />
		*}
			<hr/>
			<label>Kunjungan</label><br/>
			<label>Kunjungan 1</label><input type="text" class="postit date_survey1 date"  value="" /><br/>
			<label>PIC SITAC</label><input type="text" class="postit pic_survey1"  value="" /><br/>
			<label >Hasil Kunjungan</label><textarea type="text" class="postit hasil_survey1 wide"  value=""> </textarea><br />
			<label >Doc Sitac</label><input type="file" name="doc_survey1_sitac" id="doc_survey1_sitac" onchange="uploadFile('upl{$menu}','trg{$menu}k')" class="wide" /><br />
			<label >Doc Kunjungan 1</label><input type="file" name="doc_survey1" id="doc_survey1" onchange="uploadFile('upl{$menu}','trg{$menu}k')" class="wide" /><br />
			<br/>
			<label>Kunjungan 2</label><input type="text" class="postit date_survey2 date"  value="" /><br/>
			<label>PIC SITAC</label><input type="text" class="postit pic_survey2"  value="" /><br/>
			<label >Hasil Kunjungan</label><textarea type="text" class="postit hasil_survey2 wide"  value=""> </textarea><br />
			<label >Doc Kunjungan 2</label><input type="file" name="doc_survey2" id="doc_survey2" onchange="uploadFile('upl{$menu}','trg{$menu}k')" class="wide" /><br />
			<br/>
			<label>Kunjungan 3</label><input type="text" class="postit date_survey3 date"  value="" /><br/>
			<label>PIC SITAC</label><input type="text" class="postit pic_survey3"  value="" /><br/>
			<label >Hasil Kunjungan</label><textarea type="text" class="postit hasil_survey3 wide"  value=""> </textarea><br />
			<label >Doc Kunjungan 3</label><input type="file" name="doc_survey3" id="doc_survey3" onchange="uploadFile('upl{$menu}','trg{$menu}k')" class="wide" /><br />
			
	<label>&nbsp;</label><div id="trg{$menu}k"></div>
			<hr/>
			
			<label class="wide">PIC Telkom (DES/DWS/DBS)</label><br/>
			<label >Segmentasi AM</label><select type="text" class="postit segment_am_id"  value="">
				<option value="">--Option--</option>
				{foreach from=$opt_segment_am item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			
			</select><br />
			<label >PIC AM</label>
				<input type="text" class="postit pic_am_name"  value="" />
				<input type="text" class="postit pic_am_phone"  value="" />
				<input type="text" class="postit pic_am_email"  value="" /><br />
			
			<hr/>
			
			<label >DTF</label><br />
			<label >RO Network Service</label><select type="text" class="postit ro_network_id"  value=""> 
			<option value="">--Option--</option>
				{foreach from=$opt_ro_network item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			
			</select><br />
			<label >PIC DTF Commerce</label>
				<input type="text" class="postit pic_dtf_name"  value="" />
				<input type="text" class="postit pic_dtf_phone"  value="" />
				<input type="text" class="postit pic_dtf_email"  value="" /><br />
			<label >PIC Waspang</label>
				<input type="text" class="postit pic_waspang_name"  value="" />
				<input type="text" class="postit pic_waspang_phone"  value="" />
				<input type="text" class="postit pic_waspang_email"  value="" /><br />
			
			<hr/>
			<label >Diva</label><br />
			<label >Area Diva</label><select type="text" class="postit area_diva_id"  value="">
				<option value="">--Option--</option>
				{foreach from=$opt_area_diva item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			
			</select><br />
			<label >PIC Diva</label>
				<input type="text" class="postit pic_diva_name"  value="" />
				<input type="text" class="postit pic_diva_phone"  value="" />
				<input type="text" class="postit pic_diva_email"  value="" /><br />
			<label >Diva Akses</label>
			<select type="text" class="postit diva_akses_id"  value=""> 
			<option value="">--Option--</option>
				{foreach from=$opt_diva_akses item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			
			</select><br />
			<hr/>
			
			<label >STO</label><select type="text" class="postit sto_id"  value=""> 
				<option value="">--Option--</option>
				{foreach from=$opt_sto item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			
			</select><br />
			<label >No Telpon Customer Terdekat</label><input type="text" class="postit telpon_terdekat wide"  value="" /><br />
			<label >Existing Network</label><input type="text" class="postit existing_network wide"  value="" /><br />
			<label >Status Existing</label><input type="text" class="postit status_existing wide"  value="" /><br />
			<label >Keterangan Potensial Market</label><input type="text" class="postit potential_market wide"  value="" /><br />
			<label >Data RO (Existing /DTF)</label><input type="text" class="postit ro_existing wide"  value="" /><br />
			<label >Status Sitac</label><select type="text" class="postit status_sitac_id wide"  value=""> 
			<option value="">--Option--</option>
				{foreach from=$opt_status item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			
			</select><br />
			<label >Hasil Survey Mitra</label><input type="text" class="postit survey_mitra wide"  value="" /><br />
			<label >Hasil Survey Diva</label><input type="text" class="postit survey_diva wide"  value="" /><br />
			<label >Type Backhaul</label><input type="text" class="postit backhaul_type wide"  value="" /><br />
			<label >BW Maks Backhaul</label><input type="text" class="postit backhaul_bw_max wide"  value="" /><br />
			<label >BW On Demand</label><input type="text" class="postit backhaul_bw_on_demand wide"  value="" /><br />
			<label >Last Status</label><input type="text" class="postit last_status wide"  value="" /><br />
			<label >Remarks</label><textarea type="text" class="postit remarks wide"  value=""> </textarea><br />
			<label >Admin</label><input type="text" class="postit admin wide"  value="" /><br />
			<label >Doc NODIN</label><input type="file" name="doc_nodin" id="doc_nodin" onchange="uploadFile('upl{$menu}','trg{$menu}')" class="wide" /><br />
		   	<label >Doc NOKES</label><input type="file" name="doc_nokes" id="doc_nokes" onchange="uploadFile('upl{$menu}','trg{$menu}')" class="wide" /><br />
		   	<label >Doc PKS</label><input type="file" name="doc_pks" id="doc_pks" onchange="uploadFile('upl{$menu}','trg{$menu}')" class="wide" /><br />
		   	<label >Doc BA</label><input type="file" name="doc_ba" id="doc_ba" onchange="uploadFile('upl{$menu}','trg{$menu}')" class="wide" /><br />
		   	
	<br/><br/>
	<label>&nbsp;</label><div id="trg{$menu}"></div>
	
			{include file="home/page_btn_crud.tpl"}
		</fieldset>
	</form>
{/if}