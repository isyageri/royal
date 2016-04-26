
<thead >
	<tr align="center" valign="middle">
            
			
			<th rowspan="3" class="hide">site_id</th>
			<th rowspan="3" class="hide">ro</th>
			<th rowspan="3" class="hide">detail_Lokasi</th>
			<th rowspan="3" class="hide">segment_id</th>
			<th rowspan="3" class="hide">prioritas_id</th>
			<th rowspan="3" class="hide">telpon_terdekat</th>
			<th rowspan="3" class="hide">STATUS_SITAC_ID</th>
			<th rowspan="3" class="hide">PERIJINAN</th>
			<th rowspan="3" class="hide">USULAN_BLN</th>
			<th rowspan="3" class="hide">BATCH_Project</th>
			<th rowspan="3" class="hide">diva_akses</th>
			<th rowspan="3" class="hide">Admin</th>
			<th rowspan="3" class="hide">Unit_Bisnis</th>
			<th rowspan="3" class="hide">sp_id</th>
			<th rowspan="3" class="hide">segment_am</th>
			
			<th rowspan="3" class="hide">area_diva</th>
			<th rowspan="3" class="hide">ro_network_services</th>
			<th rowspan="3" class="hide">sto</th>
			
	
	
	
	<!-- part 1 -->
	<th rowspan="3" class="center">No</th>
	<th rowspan="3" class="center">Site ID</th>
	<th rowspan="3" class="center">Surat Pesanan</th>
	
	<th rowspan="3" class="hide">Unit/Divisi Pengusul Site</th>
	
	<th rowspan="3">Nama Site</th>
	<th rowspan="3" class="center">Kota</th>
	<th rowspan="3" class="hide">Alamat</th>
	<th rowspan="3" class="hide">RO</th>
	<th rowspan="3" style="width:100px !important;" class="hide">Segmen Site</th>
	<th rowspan="3" class="hide">Prioritas</th>
	<th rowspan="3"class="hide">Plan AP</th>
	
	<!-- part 2 -->
	<th colspan="3" rowspan="2" class="hide">PIC Lokasi BM</th>
	<th colspan="3" rowspan="2" class="hide">PIC SITAC</th>
	<th colspan="4" class="hide">DES / DWS / DBS</th>
    
	<th colspan="7" class="hide">DTF</th>
    <th colspan="5" class="hide">DIVA</th>
    
	<th rowspan="3" class="hide">STO</th>
    <th rowspan="3" class="hide">No Telp Customer Terdekat</th>
    <th rowspan="3" class="hide">Longitude</th>
    <th rowspan="3"  class="hide">Latitude</th>
	<th rowspan="3" class="hide">Existing Network</th>
    <th rowspan="3" class="hide">Status Existing </th>
    <th rowspan="3" class="hide">Keterangan Potensi Market </th>
    <th rowspan="3" class="hide">Data RO (Existing/DTF)</th>
    <th rowspan="3" class="hide">Status Sitac</th>
    <th rowspan="3" class="hide">Hasil Survey Mitra</th>
    <th rowspan="3" class="hide">Hasil Survey DIVA </th>
    <th rowspan="3" class="hide">Type Backhaul </th>
    <th rowspan="3" class="hide">BW Maks Backhaul</th>
    <th rowspan="3" class="hide">BW On Demand </th>
    <th rowspan="3"  class="hide">No Order Tenos</th>
    <th rowspan="3" class="hide">Last Status</th>
    <th rowspan="3" class="hide">Remarks</th>
	<th rowspan="3">Tanggal Nokes</th>
	<th rowspan="3">Tanggal Terima Nokes</th>
	<th rowspan="3">Last Status</th>
	
	<!--
	<th rowspan="3">Tanggal Survey</th>
	
	<th rowspan="3">Tanggal Design Approved</th>
	<th rowspan="3">Tanggal Install</th>
	<th rowspan="3">Tanggal Tes Com</th>
	-->
	<th rowspan="3">Doc NODIN</th>
	<th rowspan="3">Doc NOKES</th>
	<th rowspan="3">Doc PKS</th>
	<th rowspan="3">Doc BA</th>
	
	<th rowspan="3" class="crud"></th>
  </tr>
  <tr>
    <th rowspan="2"class="hide">Segmen</th>
    <th colspan="3"class="hide">PIC AM</th>
    <th rowspan="2"class="hide">RO NET </th>
    <th colspan="3"class="hide">PIC DTF </th>
    <th colspan="3"class="hide">Waspang</th>
    <th rowspan="2"class="hide">Area Diva </th>
    <th colspan="3"class="hide">PIC Diva </th>
    <th rowspan="2"class="hide">Diva Akses </th>

  </tr>
  <tr>
 
    <th class="hide">Nama</th>
    <th class="hide">Telp</th>
    <th class="hide">Email</th>
    <th class="hide">Nama</th>
    <th class="hide">Telp</th>
    <th class="hide">Email</th>
    <th class="hide">Nama</th>
    <th class="hide">Telp</th>
    <th class="hide">Email</th>
    
	<th class="hide">Nama</th>
    <th class="hide">telp</th>
    <th class="hide">Email</th>
    
	<th class="hide">Nama</th>
    <th class="hide">Telp</th>
    <th class="hide">Email</th>
    <th class="hide">Nama</th>
    <th class="hide">Telp</th>
    <th class="hide">Email</th>
	
  </tr>
</thead>


{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		
		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			
			<!-- hide cell -->
			<td class="site_id hide">{$td.site_id}</td>
			<td class="ro_desc hide">{$td.ro_desc}</td>
			<td class="detail_Lokasi hide">{$td.detail_lokasi}</td>
			<td class="segment_id hide">{$td.segment_id}</td>
			<td class="prioritas hide">{$td.prioritas_id}</td>
			<td class="telpon_terdekat hide">{$td.telpon_terdekat}</td>
			<td class="status_sitac_id hide">{$td.status_sitac_id}</td>
			<td class="perijinan_id hide">{$td.perijinan_id}</td>
			<td class="usulan_bln hide">{$td.usulan_bln}</td>
			<td class="batch_project_id hide">{$td.batch_project_id}</td>
			<td class="diva_akses_id hide">{$td.diva_akses_id}</td>
			<td class="admin hide">{$td.admin}</td>
			<td class="unit_bisnis_id hide">{$td.unit_bisnis_id}</td>
			<td class="sp_id hide">{$td.sp_id}</td>
			<td class="segment_am_id hide">{$td.segment_am_id}</td>
			<td class="area_diva_id hide">{$td.area_diva_id}</td>
			<td class="ro_network_id hide">{$td.ro_network_id}</td>
			<td class="sto_id hide">{$td.sto_id}</td>
			
			
			<!-- part 1 -->
			<td class="no_order_tenos">{$td.no_order_tenos}</td>
			<td class="sp_name">{$td.sp_name}</td>
			
			<td class="unit_bisnis_desc hide">{$td.unit_bisnis_desc}</td>
			
			<td class="lokasi">{$td.lokasi}</td>
			<td class="kota_desc">{$td.kota_desc}</td>
			<td class="alamat hide">{$td.alamat}</td>
			<td class="ro_desc hide" >{$td.ro_desc}</td>
			<td class="segment_desc hide">{$td.segment_desc}</td>
			<td class="prioritas_desc hide">{$td.prioritas_desc}</td>
			<td class="ap_plan hide">{$td.ap_plan}</td>
			
			<!-- part 2 -->
			<td class="pic_lokasi_name hide">{$td.pic_lokasi_name}</td>
			<td class="pic_lokasi_phone hide">{$td.pic_lokasi_phone}</td>
			<td class="pic_lokasi_email hide">{$td.pic_lokasi_email}</td>
			<td class="pic_sitac_name hide">{$td.pic_sitac_name}</td>
			<td class="pic_sitac_phone hide">{$td.pic_sitac_phone}</td>
			<td class="pic_sitac_email hide">{$td.pic_sitac_email}</td>
			<td class="segment_am_desc hide" >{$td.segment_am_desc}</td>	<!-- segment am -->
			<td class="pic_am_name hide">{$td.pic_am_name}</td>
			<td class="pic_am_phone hide">{$td.pic_am_phone}</td>
			<td class="pic_am_email hide">{$td.pic_am_email}</td>
			
			<!-- part 3 -->
			<td class="ro_network_desc hide">{$td.ro_network_desc}</td>	
			<td class="pic_dtf_name hide">{$td.pic_dtf_name}</td>			
			<td class="pic_dtf_phone hide">{$td.pic_dtf_phone}</td>
			<td class="pic_dtf_email hide">{$td.pic_dtf_email}</td>		
			<td class="pic_waspang_name hide">{$td.pic_waspang_name}</td>			
			<td class="pic_waspang_phone hide">{$td.pic_waspang_phone}</td>
			<td class="pic_waspang_email hide">{$td.pic_waspang_email}</td>
			<td class="area_diva_desc hide">{$td.area_diva_desc}</td>
			<td class="pic_diva_name hide">{$td.pic_diva_name}</td>
			<td class="pic_diva_phone hide">{$td.pic_diva_phone}</td>
			<td class="pic_diva_email hide">{$td.pic_diva_email}</td>
			
			<!-- part 4 -->	
			<td class="diva_akses_desc hide">{$td.diva_akses_desc}</td>
			<td class="sto_desc hide">{$td.sto_desc}</td>
			<td class="telpon_terdekat hide">{$td.telpon_terdekat}</td>
			<td class="longitude hide hide">{$td.longitude}</td>
			<td class="latitude hide hide">{$td.latitude}</td>
			<td class="existing_network hide">{$td.existing_network}</td>
			<td class="status_existing hide">{$td.status_existing}</td>	
			<td class="potential_market hide">{$td.potential_market}</td>
			<td class="ro_existing hide">{$td.ro_existing}</td>
			
			<!-- part 5 -->
			<td class="status_sitac_desc hide">{$td.status_sitac_desc}</td>
			<td class="survey_mitra hide">{$td.survey_mitra}</td>
			<td class="survey_diva hide">{$td.survey_diva}</td>
			<td class="backhaul_type hide">{$td.backhaul_type}</td>
			<td class="backhaul_bw_max hide">{$td.backhaul_bw_max}</td>
			<td class="backhaul_bw_on_demand hide hide">{$td.backhaul_bw_on_demand}</td>
			<td class="no_order_tenos hide hide">{$td.no_order_tenos}</td>
			<td class="last_status hide">{$td.last_status}</td>
			<td class="remarks hide">{$td.remarks}</td>
			<td class="date_sitac">{$td.date_sitac}</td>
			<td class="date_terima_nokes">{$td.date_terima_nokes}</td>
			<td class="last_status">{$td.last_status}</td>
			<!--
			<td class="date_survey">{$td.date_survey}</td>
			<td class="date_design_approved">{$td.date_design_approved}</td>
			<td class="date_install">{$td.date_install}</td>
			<td class="date_tes_com">{$td.date_tes_com}</td>
			-->
			<!-- Tambahan -->
			<td class="lokasi_real hide">{$td.lokasi_real}</td>
			<td class="alamat_real hide">{$td.alamat_real}</td>
			<td class="date_survey1 hide">{$td.date_survey1}</td>
			<td class="pic_survey1 hide">{$td.pic_survey1}</td>
			<td class="hasil_survey1 hide">{$td.hasil_survey1}</td>
			<td class="date_survey2 hide">{$td.date_survey2}</td>
			<td class="pic_survey2 hide">{$td.pic_survey2}</td>
			<td class="hasil_survey2 hide">{$td.hasil_survey2}</td>
			<td class="date_survey3 hide">{$td.date_survey3}</td>
			<td class="pic_survey3 hide">{$td.pic_survey3}</td>
			<td class="hasil_survey3 hide">{$td.hasil_survey3}</td>
			
			<td class="doc_nodin center">
			{if isset($td.doc_nodin) && !empty($td.doc_nodin) && $td.doc_nodin != ''}
			<a rel="#f{$menu}" href="{$host}{$td.doc_nodin}" class="easyui-linkbutton bold" iconCls="icon-save">Download</a>
			{else}
			-
			{/if}
			
			</td>
			<td class="doc_nokes center">
			{if isset($td.doc_nokes) && !empty($td.doc_nokes) && $td.doc_nokes != ''}
			<a rel="#f{$menu}" href="{$host}{$td.doc_nokes}" class="easyui-linkbutton bold" iconCls="icon-save">Download</a>
			{else}
			-
			{/if}
			</td>
			<td class="doc_pks center">
			{if isset($td.doc_pks) && !empty($td.doc_pks) && $td.doc_pks != ''}
			<a rel="#f{$menu}" href="{$host}{$td.doc_pks}" class="easyui-linkbutton bold" iconCls="icon-save">Download</a>
			{else}
			-
			{/if}
			
			</td>
			<td class="doc_ba center">
			{if isset($td.doc_ba) && !empty($td.doc_ba) && $td.doc_ba != ''}
			<a rel="#f{$menu}" href="{$host}{$td.doc_ba}" class="easyui-linkbutton bold" iconCls="icon-save">Download</a>
			{else}
			-
			{/if}
			
			</td>
			<td class="icons center">
			{if $access.p_update==1}<a class="upd" rel="#f{$menu}" href="#f{$menu}" title="Edit Data"></a>{/if}
			</td>
		</tr>
		{/foreach}
		
		<tr><td colspan="52" class="bold right red">TOTAL SITE: {$datx.tot|numeric_format:0}</td></tr>
		</tbody>
	{/if}
{/if}

{if $prop neq 'xls'}
<tfoot>
	
	<tr>
		<td colspan="52" class="icons right" style="background-color:#BBBBBB">
			{if $access.p_create==1}
			
			{/if}
		</td>
	</tr>
	<tr><td colspan="52" class="center">
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













	
	

