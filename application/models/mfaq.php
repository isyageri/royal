<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}
require_once("class.uuid.php");

class mFaq extends CI_Model {
	 
	function __construct() {
		parent::__construct();
		$browser	= $this->agent->requirement();
		$this->wib	= time();
		$this->tba	= array(
			999 =>'t_user',
			9001=>'t_usergroup',9002=>'t_user',9003=>'t_privilege',
			9004=>'t_user_activity'
		);
	}
	
	public function GetFaq() {
		$sql = "SELECT * FROM faq ORDER BY FAQID";
		$dat = rst2Array($sql);
		return $dat;
	}
	
	public function select($menu, $param=null) {
		$sql2 = '';
		$whr = '';
		$tot = 0; 
		$amo = array();
		$lim = isset($param['limit']) ? $param['limit'] : $this->limit= 15;
		$awl = isset($param['page'])  ? ($param['page'] - 1)*$lim : 0;		
		$off = "limit $lim offset $awl";
		if(isset($param['xls'])) $off = '';
		unset($param['limit'], $param['page'], $param['xls']);
		
		$tbx = $this->tba[$menu];
		switch($menu) {
			case 9001:
				if (isset($param['user_group'])) $whr .= " and lower(user_group) like lower('%$param[user_group]%')";
				$sql = "select *,
						case
							when is_active = 't' then 'Aktif'
							when is_active = 'f' then 'Tidak Aktif'
						end status
						from t_usergroup
						where 1=1 $whr
						order by usergroup_id";
				$tot = count(rst2Array($sql));
				$sql = "$sql $off";
				break;
			case 9002:
				if (isset($param['user_uid'])) $whr .= " and lower(a.user_uid) like lower('%$param[user_uid]%')";
				if (isset($param['usergroup_id'])) $whr .= " and a.usergroup_id = $param[usergroup_id]";
				$sql  = "select a.*, b.user_group, c.user_uid as createdby,
						case
							when a.is_active = 't' then 'Aktif'
							when a.is_active = 'f' then 'Tidak Aktif'
						end status
						from (t_user a left join t_usergroup b on a.usergroup_id = b.usergroup_id)
						left join t_user c on a.created_by = c.usex_uid
						where 1=1 $whr
						order by a.usex_uid asc";
						
				$tot = count(rst2Array($sql));
				$sql = "$sql $off";
				break;
			case 9003:
				$arg = isset($param['usergroup_id']) ? $param['usergroup_id'] : '0';
				$sql = "select 	a.menu_uid, a.menu_pid, a.menu, a.menu_flag,a.is_parent, b.p_menu, b.p_create, b.p_retrieve, b.p_update, b.p_delete
						from t_menu a left join t_privilege b on a.menu_uid = b.menu_uid and b.usergroup_id = $arg
						where a.menu_flag in (1,8,9) and a.is_active = 't'
						order by a.menu_uid";
						
				break;

			case 9004:
				//dump($ts1);//1353998309 1351375200
				//dump($ts2);
				if (isset($param['ts1'])) {
					//$sql = "SELECT EXTRACT(EPOCH FROM TIMESTAMP WITH TIME ZONE '$param[ts1] 00:00:00')";
					//$ts1 = rst2Array($sql, 'cel');
					$ts1 = strtotime($param['ts1']);
				
				}
				if (isset($param['ts2'])) {
					//$sql = "SELECT EXTRACT(EPOCH FROM TIMESTAMP WITH TIME ZONE '$param[ts2] 23:59:59')";
					//$ts2 = rst2Array($sql, 'cel');
					$ts2 = strtotime($param['ts2']);
				
				}
				
				if (isset($param['user_uid'])) $whr .= " and lower(b.user_uid) like lower('%$param[user_uid]%')";
				if (isset($param['activity'])) $whr .= " and lower(a.activity) = lower('$param[activity]')";
				if (isset($param['ts1'])) 	 $whr .= " and a.ts >= $ts1 ";
				if (isset($param['ts2'])) 	 $whr .= " and a.ts <= $ts2 ";
				$sql = "select a.*, b.user_uid
						from t_user_activity a left join t_user b on a.usex_uid = b.usex_uid
						where 1 = 1 $whr
						order by a.ts desc";
				$tot = count(rst2Array($sql));
				$sql = "$sql $off";
				break;
			
		}
		
		return array('tot'=>$tot, 'dat'=>rst2Array($sql), 'dat2'=>$sql2, 'amo'=>$amo);
	}
	
	public function empty_param(&$param) {
		foreach($param as $k=>$v) {
			if($param[$k] == '' || empty($param[$k]))
			{unset($param[$k]);}
		}
	}
	
	public function get_all_nota($menu, $param=null) {
		$whr = '';
		$whr .= isset($param['date_nota_awal']) ? " and a.date_nota >= '".$param['date_nota_awal']."' " : "";
		$whr .= isset($param['date_nota_akhir']) ? " and a.date_nota <= '".$param['date_nota_akhir']."' " : "";
		$whr .= isset($param['customer_name']) ? " and lower(b.customer_name) like lower('%$param[customer_name]%') " : "";

		$sql = "select a.nota_id, a.date_nota, a.total_harga ttl_hrg_nota, a.debet, a.piutang, b.customer_name from nota a, customer b where a.customer_id = b.customer_id $whr order by a.date_nota asc" ;
		return rst2Array($sql);
	}
	
	public function get_list_penjualan($nota_id) {
		$f_nota_id = $nota_id;
		$sql = "select a.nota_id, a.jml, a.harga, a.total_harga, b.product_name from penjualan_harian a, product b where a.nota_id = $f_nota_id and a.product_id = b.product_id order by b.product_name asc" ;
		return rst2Array($sql);
	}
	
	public function get_all_supply_susu($menu, $param=null) {
		$whr = '';
		$whr .= isset($param['date_supply_awal']) ? " where date_supply >= '".$param['date_supply_awal']."' " : "";
		$whr .= isset($param['date_supply_akhir']) ? " and date_supply <= '".$param['date_supply_akhir']."' " : "";
		
		$sql = "select date_supply, sum(jml) as jml_supply from fp_milk_supply $whr group by date_supply";
		return rst2Array($sql);
	}
	
	public function get_list_pembagian_susu($date_supply) {
		$f_date_supply = $date_supply;
		$sql = "select sum(a.jml) as jml_jenis, b.milk_type_name from milk_split a, milk_type b where a.date_milk_split = '$f_date_supply' and a.milk_type_id = b.milk_type_id group by a.milk_type_id" ;
		return rst2Array($sql);
	}
	
	public function crud($menu, $act, $post) {
		$pkey	= '';
		$ack	= false;
		$ts		= false;
		$opr	= false;
		$tbl	= $this->tba[$menu];
		$common = 1;
		$fields = $this->db->field_data($tbl);
		foreach ($fields as $f) {
			if(strtolower($f->name)=='lastupdated') $ts  = true;
			if(strtolower($f->name)=='operator') 	$opr = true;
			if($f->primary_key) $pkey = strtolower($f->name);
		}
		
		if(!$pkey) {
			if(isset($post['pkey'])) {
				$pkey = $post['pkey'];
				unset($post['pkey']);
			}
			else {
				// hack postgresql
				$sql = "select 	column_name
						from	information_schema.table_constraints a,
								information_schema.key_column_usage b
						where 	a.table_name = b.table_name
						and		a.constraint_name = b.constraint_name
						and		a.table_name = 'usys.usex'
						and		a.constraint_type = 'PRIMARY KEY'";
				$pkey = rst2Array($sql, 'cel');
			}
		}
		//dump($post);dump($ack);
		if(!$ts)  unset($post['lastupdated']);
		if(!$opr) unset($post['operator']);
		
		switch($act) {
			case 'del':
				switch($menu) {
					case 6321:
						$nota_s = rst2Array("select total_harga,nota_id,jml,product_id from penjualan_harian where ph_id = ".$post['ph_id'],"row");
						
						$sql = "select count(product_id) as count from fp_stock_product where product_id = ".$nota_s['product_id']." ";
						$result = rst2Array($sql, 'cel');
							
						if ($result == 0)
						{
							$temp['product_id'] = $nota_s['product_id'];
							$temp['jml'] = $nota_s['jml'];
							foreach($temp as $k=>$v) if($v!='') $this->db->set($k, $v);
							$this->db->insert('fp_stock_product');
						}
						else
						{
							$this->db->query("update fp_stock_product set jml = jml + ".$nota_s['jml']." where product_id = ".$nota_s['product_id'] );
						}
						
						$this->db->query("update nota set total_harga = total_harga - ".$nota_s['total_harga']." where nota_id = ".$nota_s['nota_id'] );
						$this->db->query("update nota set debet = total_harga where nota_id = ".$nota_s['nota_id']." and debet > total_harga ");
						$this->db->query("update nota set piutang = total_harga - debet where nota_id = ".$nota_s['nota_id']);
						
						
					break;
					
					
						
						case 6230:
						$data = rst2Array("select * from fp_distribution where fp_distribution_id = ".$post['fp_distribution_id'],"row");
						$jml_stock_product = rst2Array("select jml from fp_stock_product where product_id = ".$data['product_id'],"cel");
				
						if ($jml_stock_product < $data['jml_product'])
						{
								$common = 0;
								$ack = "Maaf, hasil produksi telah terpakai. Jadi data pembagian produk ini tidak bisa di hapus untuk pembukuan laporan.";
						}
						else
						{
							$this->db->query("update fp_stock_milk_split set jml = jml + ".$data['jml_susu']." where milk_type_id = ".$data['milk_type_id']);
							$this->db->query("update fp_stock_product set jml = jml - ".$data['jml_product']." where product_id = ".$data['product_id']);
						}
						break;
						case 6110:
						//dump($post);
						$sql = "select jml, barang_reff_id from fp_pengeluaran_barang where fp_pengeluaran_barang_id =".$post['fp_pengeluaran_barang_id']."";
						$data = rst2Array($sql, 'row');
						$sql = "select count(fp_stock_barang_id) from fp_stock_barang where barang_reff_id = ".$data['barang_reff_id']."";
						$datax = rst2Array($sql, 'cel');
						
						if ($datax == 0)
						{
							
						}
						else
						{
							$this->db->query('update fp_stock_barang set jml = jml + '.$data['jml'].' where barang_reff_id = '.$data['barang_reff_id'].'');
						}
												
						//$this->db->query('delete from fp_stock_barang where jml = 0');
						
						break;
						
						/*case 6231:
						$sql = "select fp_stock_product_id from fp_stock_product where product_id = (select product_id from fp_distribution where fp_distribution_id = ".$post['fp_distribution_id']." )";
						$stock_id = rst2Array($sql, 'cel');
					
						$sql = "select jml_product from fp_distribution where fp_distribution_id = ".$post['fp_distribution_id']." ";
						$jml_prod = rst2Array($sql, 'cel');
						$this->db->query('update fp_stock_product set jml = jml - $jml_prod where fp_stock_product_id = $stock_id ');
						$this->db->query('delete from fp_stock_product where jml = 0 ');
						
						break;
						*/
						case 6120:
						$sql = "select *  from fp_alur_barang where fp_alur_barang_id =".$post['fp_alur_barang_id']."";
						$data = rst2Array($sql, 'row');
						$sql = "select jml from fp_stock_barang where barang_reff_id = ".$data['barang_reff_id']."";
						$jml_stok = rst2Array($sql, 'cel');
						if ($jml_stok >= $data['jml'])
						{
							$this->db->query('update pasca_panen set modal_terpakai = modal_terpakai - '.$data['total_harga'].' where pasca_panen_id = '.$data['pasca_panen_id'].'');
							$this->db->query('update fp_stock_barang set jml = jml - '.$data['jml'].' where barang_reff_id = '.$data['barang_reff_id'].'');
						}
						else
						{
							$common = 0;
							$ack = "Maaf pembelian tidak bisa dihapus. Barang sudah digunakan";
						}
						break;
					case 6220:
						$data = rst2Array("select * from milk_split where milk_split_id = ".$post['milk_split_id'],"row");
						$jml_milk_split = rst2Array("select jml from fp_stock_milk_split where milk_type_id = ".$data['milk_type_id'],"cel");
						
						if ($jml_milk_split < $data['jml_after'])
						{
							$common = 0;
							$ack = "Maaf data pembagian susu tidak bisa dihapus. Susu sudah digunakan untuk pembuatan produk";			
						}
						else
						{
							$this->db->query("update fp_stock_supply set jml = jml + ".$data['jml']." where fp_stock_supply_id = 1 ");
							$this->db->query("update fp_stock_milk_split set jml = jml - ".$data['jml_after']." where milk_type_id = ".$data['milk_type_id']);
						}
						
						
					break;
					case 6310:
						$sql = "select modal_terpakai from pasca_panen where pasca_panen_id = ".$post['pasca_panen_id']."";
						$terpakai = rst2Array($sql, 'cel');
						if ($terpakai > 0)
						{
							$common = 0;
							$ack = "Modal tidak bisa dihapus. Modal sudah digunakan";
						}
					break;
					case 6330:
						$sql = "select *  from fp_pengeluaran_produksi where fp_pengeluaran_produksi_id =".$post['fp_pengeluaran_produksi_id']."";
						$data = rst2Array($sql, 'row');
						$this->db->query("update pasca_panen set modal_terpakai = modal_terpakai - ".$data['total_harga']." where pasca_panen_id = ".$data['pasca_panen_id']);
					break;
					case 6210:
						$sql = "select jml  from fp_milk_supply where fp_milk_supply_id = ".$post['fp_milk_supply_id']."";
						$jml = rst2Array($sql, 'cel');
						$sql = "select jml  from fp_stock_supply";
						$jml_stok = rst2Array($sql, 'cel');
						//dump($jml);
						if($jml_stok >= $jml)
						{
							$this->db->query('update fp_stock_supply set jml = jml - '.$jml.'');
							$sql1 = "select *  from fp_milk_supply where fp_milk_supply_id =".$post['fp_milk_supply_id']."";
							$data = rst2Array($sql1, 'row');
							if($data['pasca_panen_id'] != 0){
								$this->db->query("update pasca_panen set modal_terpakai = modal_terpakai - ".$data['total_harga']." where pasca_panen_id = ".$data['pasca_panen_id']);
							}
						}
						else
						{
							$common = 0;
							$ack = "Data tidak bisa dihapus supply susu sudah digunakan";
						}

					break;
					case 6341:
						$sql = "select *  from bayar_nota where bayar_nota_id = ".$post['bayar_nota_id']."";
						$data = rst2Array($sql, 'row');
						$this->db->query("update nota set debet = debet  - ".$data['debet'].", piutang = piutang + ".$data['debet']." where nota_id=".$data['nota_id']);
					break;
					
						
						
				}
				if($common) {
					
					$ack = $this->db->delete($tbl, array($pkey =>$post[$pkey])); 
					
					$ddt = $this->extractData($post);
					
					if($ack){ $this->set_activity(array('usex_uid'=>$this->auth['usex_uid'],
															'activity'=>'Delete Data',
															'activity_url'=>$this->uri->uri_string(),
															'activity_desc'=>"User ".$this->auth['user_name']." menghapus data pada tabel: $tbl, pkey: $pkey=$post[$pkey] ; $ddt ",
															'remark'=>"Berhasil"));}
					else{
						$ack = "Data tidak bisa di hapus, karena kemungkinan data ini telah digunakan oleh data lain.";
					}
				
				}
				break;
			case 'add':
				switch($menu) {
					case 6110:
						//dump($post);
						$sql = "select jml from fp_stock_barang where barang_reff_id = ".$post['barang_reff_id']."";
						$jml = rst2Array($sql, 'cel');
						if ($post['jml'] > $jml)
						{
							$common =  0;
							$ack = "Maaf, jumlah stock barang tidak mencukupi.";
						}
						else
						{
							$this->db->query('update fp_stock_barang set jml = jml - '.$post['jml'].' where barang_reff_id = '.$post['barang_reff_id'].'');
						}
						//$this->db->query('delete from fp_stock_barang where jml = 0');
					break;
					case 6220:
						$jml_supply = rst2Array("select jml from fp_stock_supply where fp_stock_supply_id = 1 ","cel");
						
						if ($jml_supply < $post['jml'])
						{
							$common =  0;
							$ack = "Maaf, jumlah stock susu yang telah di supply tidak mencukupi.";
						}
						else
						{
							$sql = "select count(milk_type_id) as count from fp_stock_milk_split where milk_type_id = ".$post['milk_type_id'];
							$result = rst2Array($sql, 'cel');
							
							if ($result == 0)
							{
								$temp['milk_type_id'] = $post['milk_type_id'];
								$temp['jml'] = $post['jml_after'];
								foreach($temp as $k=>$v) if($v!='') $this->db->set($k, $v);
								$this->db->insert('fp_stock_milk_split');
								$this->db->query("update fp_stock_supply set jml = jml - ".$post['jml']." where fp_stock_supply_id = 1 ");
							
							}
							else
							{
								$this->db->query("update fp_stock_supply set jml = jml - ".$post['jml']." where fp_stock_supply_id = 1 ");
								$this->db->query("update fp_stock_milk_split set jml = jml + ".$post['jml_after']." where milk_type_id = ".$post['milk_type_id']);
							}
							
						}
						
					break;
					
					case 6321:
						$sql = "select jml from fp_stock_product where product_id =".$post['product_id']."";
						$jml = rst2Array($sql, 'cel');
						if($post['jml']>$jml)
						{
							$common = 0;
							$ack = "Maaf, jumlah stock barang tidak mencukupi.";
						}
						else
						{
							$this->db->query("update fp_stock_product set jml = jml - ".$post['jml'].' where product_id = '.$post['product_id'].'');
							$this->db->query("update nota set total_harga = total_harga + ".$post['total_harga'].' where nota_id = '.$post['nota_id'].'');
							$this->db->query("update nota set piutang = total_harga - debet where nota_id = ".$post['nota_id']);
						}
						
					break;
					
					case 6210:
						//dump($post);
						if($post['is_utang'] == 1)
						{
							$post['pasca_panen_id'] = 0;
							//dump($post);
							$sql = "select count(fp_stock_supply_id) as count from fp_stock_supply";
							$result = rst2Array($sql, 'cel');
							if ($result == 0)
								{
									$temp['jml'] = $post['jml'];
									foreach($temp as $k=>$v) if($v!='') $this->db->set($k, $v);
									$this->db->insert('fp_stock_supply');
								}
							else
							{
								$this->db->query('update fp_stock_supply set jml = jml + '.$post['jml'].'');
							}
						}
						else
						{
							$sql = "select * from pasca_panen a where a.pasca_panen_id = ".$post['pasca_panen_id'];
							$data = rst2Array($sql, 'row');
							$harga = $post['total_harga'];
							$terpakai = $data['modal_terpakai']+$post['total_harga'];
							if($data['modal'] < $terpakai){
								$common =  0;
								$ack = "Maaf, anda tidak bisa melakukan pengeluaran melebihi modal";
							}
							else{
								if ($this->cekModal($data['date_pasca_panen'],$post['date_supply']))
								{
										$this->db->query("update pasca_panen set modal_terpakai = modal_terpakai + ".$post['total_harga']." where pasca_panen_id=".$data['pasca_panen_id']);
										$sql = "select count(fp_stock_supply_id) as count from fp_stock_supply";
										$result = rst2Array($sql, 'cel');
										//dump($result);
										if ($result == 0)
										{
											$temp['jml'] = $post['jml'];
											foreach($temp as $k=>$v) if($v!='') $this->db->set($k, $v);
											$this->db->insert('fp_stock_supply');
										}
										else
										{
											$this->db->query('update fp_stock_supply set jml = jml + '.$post['jml'].'');
										}
								}
								else
								{
									$common =  0;
									$ack = "Maaf, tanggal beli susu tidak sesuai dengan periode tanggal modal";
								}
							}
						}
						unset($post['is_utang']);
						break;
					case 6350:
					$post['piutang'] = $post['total_harga'];
					break;
					case 9001:
						$common = 0;
						$dat = array('user_group'=>$post['user_group'],
								'user_group_desc'=>$post['user_group_desc'],
								'is_active'=>$post['is_active']);
						$ack = $this->db->insert($tbl, $dat);
						if($ack) $this->set_activity(array('usex_uid'=>$this->auth['usex_uid'],
															'activity'=>'Add Data',
															'activity_url'=>$this->uri->uri_string(),
															'activity_desc'=>"User ".$this->auth['user_name']." menambah data group dengan nama: ".$post['user_group']."",
															'remark'=>"Berhasil"));
						break;
					case 9002:
						$common = 0;
						$data = array('user_uid'=>$post['user_uid'],
										'passwd'=>$post['passwd'],
										'user_name'=>$post['user_name'],
										'is_active'=>$post['is_active'],
										'usergroup_id'=>$post['usergroup_id'],
										'created_date'=>date("Y-m-d H:i:s"),
										'created_by'=>$this->auth['usex_uid']);
						$ack = $this->db->insert($tbl, $data);
						if($ack) $this->set_activity(array('usex_uid'=>$this->auth['usex_uid'],
															'activity'=>'Add Data',
															'activity_url'=>$this->uri->uri_string(),
															'activity_desc'=>"User ".$this->auth['user_name']." menambah user dengan user id: ".$post['user_uid']."",
															'remark'=>"Berhasil"));
						break;
					case 9003:
						$common = 0;
						
						$this->db->delete($tbl, array($pkey => $post[$pkey]));
						$mmn = array(1000,6000,8000,9000);
						foreach($mmn as $k) {
							$dat = array('usergroup_id'=>$post[$pkey], 'menu_uid'=>$k, 'p_menu'=>$post['mmn'][$k]);
							$this->db->insert($tbl, $dat);
						}
						
						foreach($post['sel'] as $k=>$v) {
							if(!isset($post['ins'][$k])) $post['ins'][$k] = 0;
							if(!isset($post['upd'][$k])) $post['upd'][$k] = 0;
							if(!isset($post['del'][$k])) $post['del'][$k] = 0;
							
							$dat = array('usergroup_id'=>$post[$pkey], 'menu_uid'=>$k, 
										'p_menu'  =>$post['mmn'][$k], 'p_create'=>$post['ins'][$k],
										'p_retrieve'=>$post['sel'][$k], 'p_update'=>$post['upd'][$k],
										'p_delete'=>$post['del'][$k]);
							$this->db->insert($tbl, $dat);
						}
						$ack = 1;
						break;
					case 6120:
				
					$sql = "select * from pasca_panen where pasca_panen_id = ".$post['pasca_panen_id']."";
					$data = rst2Array($sql, 'row');
					$sisa = $data['modal'] - $data['modal_terpakai'];
					if ($this->cekModal($data['date_pasca_panen'],$post['date_alur_barang']))
					{	
						if ($sisa >= $post['total_harga'])
						{
							$this->db->query('update pasca_panen set modal_terpakai = modal_terpakai + '.$post['total_harga'].' where pasca_panen_id = '.$post['pasca_panen_id'].'');
							$sql = "select count(barang_reff_id) as count from fp_stock_barang where barang_reff_id =".$post['barang_reff_id']."";
							$result = rst2Array($sql, 'cel');
							if ($result == 0)
							{
								//dump("asup");
								$temp['barang_reff_id'] = $post['barang_reff_id'];
								$temp['jml'] = $post['jml'];
								foreach($temp as $k=>$v) if($v!='') $this->db->set($k, $v);
								$this->db->insert('fp_stock_barang');
							}
							else
							{
								$sql = "select jml, fp_stock_barang_id  from fp_stock_barang where barang_reff_id =".$post['barang_reff_id']."";
								$data = rst2Array($sql, 'row');
								$jml_new = $data['jml'] + $post['jml'];
								//dump($data);
								$this->db->query('update fp_stock_barang set jml = '.$jml_new.' where fp_stock_barang_id = '.$data['fp_stock_barang_id'].'');
							}
						}
						else
						{
							$common = 0;
							$ack = "Maaf Modal tidak mencukupi";
						}
					}
					else
					{
						$common =  0;
						$ack = "Maaf, tanggal Pembelian Barang tidak sesuai dengan periode tanggal modal";
					}
					break;
					
					case 6230:
						$sql = "select * from fp_stock_milk_split a where a.milk_type_id = ".$post['milk_type_id']."";
						$data = rst2Array($sql, 'row');
						if($post['jml_susu'] > $data['jml'])
						{
							$common =  0;
							$ack = "Maaf, anda tidak bisa membagi susu melebihi stock jumlah susu";
						}
						else
						{
							$this->db->query("update fp_stock_milk_split set jml =  jml - ".$post['jml_susu']." where milk_type_id = ".$post['milk_type_id']);
							$sql3 = "select count(product_id) as count from fp_stock_product where product_id = ".$post['product_id']." ";
							$result = rst2Array($sql3, 'cel');
							if ($result == 0)
							{
								$temp['product_id'] = $post['product_id'];
								$temp['jml'] = $post['jml_product'];
								foreach($temp as $k=>$v) if($v!='') $this->db->set($k, $v);
								$this->db->insert('fp_stock_product');
								
							}
							else
							{
								$sql = "select fp_stock_product_id  from fp_stock_product where product_id = ".$post['product_id'];
								$stock_id = rst2Array($sql, 'cel');
								$this->db->query("update fp_stock_product set jml = jml + $post[jml_product] where fp_stock_product_id = $stock_id");
							}
						}
						break;
						
					case 6330:
						$sql = "select * from pasca_panen a where a.pasca_panen_id = ".$post['pasca_panen_id'];
						$data = rst2Array($sql, 'row');
						$date_modal = explode("-", $data['date_pasca_panen']);
						$date = explode("-", $post['date_pengeluaran_produksi']);
						$harga = $post['total_harga'];
						$terpakai = $data['modal_terpakai']+$post['total_harga'];
						if($data['modal'] < $terpakai){
							$common =  0;
							$ack = "Maaf, anda tidak bisa melakukan pengeluaran melebihi modal";
						}
						else{
						
							if($date[2] <= 7){
								if($date_modal[2] <=7 && $date_modal[0]==$date[0] && $date_modal[1]==$date[1]){
									$this->db->query("update pasca_panen set modal_terpakai = modal_terpakai + ".$post['total_harga']." where pasca_panen_id=".$data['pasca_panen_id']);
								}
								else{
									$common =  0;
									$ack = "Maaf, tanggal pengeluaran produksi tidak sesuai dengan periode tanggal modal";
								}
							}
							if($date[2] > 7 && $date[2] <=15){
								if($date_modal[2] >7 && $date_modal[2] <=15 && $date_modal[0]==$date[0] && $date_modal[1]==$date[1]){
									$this->db->query("update pasca_panen set modal_terpakai = modal_terpakai + ".$post['total_harga']." where pasca_panen_id=".$data['pasca_panen_id']);
								}
								else{
									$common =  0;
									$ack = "Maaf, tanggal pengeluaran produksi tidak sesuai dengan periode tanggal modal";
								}
							}
							if($date[2] > 15 && $date[2] <=22){
								if($date_modal[2] >15 && $date_modal[2] <=22 && $date_modal[0]==$date[0] && $date_modal[1]==$date[1]){
									$this->db->query("update pasca_panen set modal_terpakai = modal_terpakai + ".$post['total_harga']." where pasca_panen_id=".$data['pasca_panen_id']);
								}
								else{
									$common =  0;
									$ack = "Maaf, tanggal pengeluaran produksi tidak sesuai dengan periode tanggal modal";
								}
							}
							if($date[2] > 22){
								if($date_modal[2] >22 && $date_modal[0]==$date[0] && $date_modal[1]==$date[1]){
									$this->db->query("update pasca_panen set modal_terpakai = modal_terpakai + ".$post['total_harga']." where pasca_panen_id=".$data['pasca_panen_id']);
								}
								else{
									$common =  0;
									$ack = "Maaf, tanggal pengeluaran produksi tidak sesuai dengan periode tanggal modal";
								}
							}
						}
						//$urutan = $this->getUrutan($date[2]);
						
					break;
					case 6341:
						$sql = "select * from nota where nota_id = ".$post['nota_id'];
						$data = rst2Array($sql, 'row');
						
						$temp = $data['piutang'] - $post['debet'];
			
						if ($temp >= 0)
						{
							//dump("sukses");
							$this->db->query("update nota set debet = debet  + ".$post['debet'].", piutang = piutang - ".$post['debet']." where nota_id=".$post['nota_id']);	
						}
						else
						{
							$common =  0;
							$ack = "Jumlah pembayaran tidak boleh lebih dari sisa piutang. Sisa piutang ".$data['piutang']."";
						}
					break;
					
				}
				if($common) {
					//dump($post);
					foreach($post as $k=>$v) if($v!='') $this->db->set($k, $v);
					$ack = $this->db->insert($tbl);
					$ddt = $this->extractData($post);
					if($ack) $this->set_activity(array('usex_uid'=>$this->auth['usex_uid'],
															'activity'=>'Add Data',
															'activity_url'=>$this->uri->uri_string(),
															'activity_desc'=>"User ".$this->auth['user_name']." menambah data pada tabel: $tbl, ; $ddt ",
															'remark'=>"Berhasil"));
															
				}
				break;
			case 'upd':
				foreach($post as $k=>$v) if($v=='') unset($post[$k]);
				switch($menu) {
					case 6320:
						if(!isset($post['total_harga']) || empty($post['total_harga']))
						{$post['total_harga']=0;}
						if(!isset($post['debet']) || empty($post['debet']))
						{$post['debet']=0;}
						
						$post['piutang'] = $post['total_harga'] - $post['debet'];
					break;
					case 6321:
						$harga = rst2Array("select total_harga,jml,product_id from penjualan_harian where ph_id = ".$post['ph_id'],"row");
						$pp = $post['total_harga'] - $harga['total_harga'];
						$jml_prod = $post['jml'] - $harga['jml']; 
						
													
						
						$sql = "select jml,product_id from fp_stock_product where product_id = ".$post['product_id'];
						$jml = rst2Array($sql, 'row');
						
						if($post['jml']>$jml['jml'])
						{
							if($post['product_id']==$harga['product_id'] && $jml_prod<=$jml['jml'])
							{
								$this->db->query("update fp_stock_product set jml = jml + ".$harga['jml'].' where product_id = '.$harga['product_id'].'');
							
								$this->db->query("update fp_stock_product set jml = jml - ".$post['jml'].' where product_id = '.$post['product_id'].'');
								$this->db->query("update nota set total_harga = total_harga + ".$pp.' where nota_id = '.$post['nota_id'].'');
								$this->db->query("update nota set debet = total_harga where nota_id = ".$post['nota_id']." and debet > total_harga ");
								$this->db->query("update nota set piutang = total_harga - debet where nota_id = ".$post['nota_id']);
							}
							else
							{
								$common = 0;
								$ack = "Maaf, jumlah stock produk tidak mencukupi.";
							}
							
						}
						else
						{
							$this->db->query("update fp_stock_product set jml = jml + ".$harga['jml'].' where product_id = '.$harga['product_id'].'');
						
							$this->db->query("update fp_stock_product set jml = jml - ".$post['jml'].' where product_id = '.$post['product_id'].'');
							$this->db->query("update nota set total_harga = total_harga + ".$pp.' where nota_id = '.$post['nota_id'].'');
							$this->db->query("update nota set debet = total_harga where nota_id = ".$post['nota_id']." and debet > total_harga ");
							$this->db->query("update nota set piutang = total_harga - debet where nota_id = ".$post['nota_id']);
						}
						
					break;
					case 1066:
					$common = 0;
					
					$source = pathinfo($post['source']);
					//dump($source);
					$post['source'] = $source['basename'];
					$data=array('file_name'=>$post['file_name'],
								'file_desc'=>$post['file_desc'],
								'source'=>$post['source']);
					$this->db->where('file_download_id',$post[$pkey]);
					$ack=$this->db->update($tbl,$data);
					
					//dump($data);
					break;
					case 6220:
						
						$data = rst2Array("select * from milk_split where milk_split_id = ".$post['milk_split_id'],"row");
						
						$jml_after = $post['jml_after'] - $data['jml_after'];
						$jml = $post['jml'] - $data['jml']; 
						
													
						$jml_supply = rst2Array("select jml from fp_stock_supply where fp_stock_supply_id = 1 ","cel");
						$jml_milk_split = rst2Array("select jml from fp_stock_milk_split where milk_type_id = ".$data['milk_type_id'],"cel");
								
						$sql = "select sum(jml) from fp_stock_milk_split where milk_type_id = ".$post['milk_type_id'];
						$jml_stock = rst2Array($sql, 'cel');
						
						if($data['milk_type_id']==$post['milk_type_id'])
						{
							//dump("current : ".$post['jml']." , db : ".$data['jml']." , selisih : ".$jml." , stock : ".$jml_supply);
							if($jml_supply < $jml)
							{
								$common =  0;
								$ack = "Maaf, jumlah stock susu yang telah di supply tidak mencukupi.";
							}
							
							if ( $jml_after < 0 )
							{
								if ( $jml_after*(-1) > $jml_milk_split)
								{
									$common = 0;
									$ack = "Maaf jumlah susu siap pakai tidak boleh membuat jumlah stock kurang dari 0";			
								}
							}
							
							if($common) {
								$this->db->query("update fp_stock_supply set jml = jml - ".$jml." where fp_stock_supply_id = 1 ");
								$this->db->query("update fp_stock_milk_split set jml = jml + ".$jml_after." where milk_type_id = ".$post['milk_type_id']);
							}
						}
						else
						{
							$sql = "select count(milk_type_id) from fp_stock_milk_split where milk_type_id = ".$post['milk_type_id'];
							$rst = rst2Array($sql, 'cel');
						
							if($jml_milk_split < $data['jml_after'])
							{
								$common =  0;
								$ack = "Maaf, stock untuk jenis susu data sebelumnya telah di pakai.";
							}
							if($jml_supply < $jml)
							{
								$common =  0;
								$ack = "Maaf, jumlah stock susu yang telah di supply tidak mencukupi.";
							}
							if($common) {
								$sql = "select count(milk_type_id) as count from fp_stock_milk_split where milk_type_id = ".$post['milk_type_id'];
								$result = rst2Array($sql, 'cel');
								$this->db->query("update fp_stock_supply set jml = jml - ".$jml." where fp_stock_supply_id = 1 ");
								$this->db->query("update fp_stock_milk_split set jml = jml - ".$data['jml_after']." where milk_type_id = ".$data['milk_type_id']);	
								if ($result == 0)
								{
									$temp['milk_type_id'] = $post['milk_type_id'];
									$temp['jml'] = $post['jml_after'];
									foreach($temp as $k=>$v) if($v!='') $this->db->set($k, $v);
									$this->db->insert('fp_stock_milk_split');
									
								}
								else
								{
									$this->db->query("update fp_stock_milk_split set jml = jml + ".$post['jml_after']." where milk_type_id = ".$post['milk_type_id']);
								}
								
								
							}
						}
						
						
						
					break;
					case 9001:
						$common = 0;
						$data = array('user_group'=>$post['user_group'],
									'user_group_desc'=>$post['user_group_desc'],
									'is_active'=>$post['is_active']);
						$this->db->where('usergroup_id', $post[$pkey]);
						$ack = $this->db->update($tbl, $data);
						if($ack) $this->set_activity(array('usex_uid'=>$this->auth['usex_uid'],
															'activity'=>'Update Data',
															'activity_url'=>$this->uri->uri_string(),
															'activity_desc'=>"User ".$this->auth['user_name']." memperbarui data pada tabel: $tbl, pkey: $pkey=$post[$pkey]",
															'remark'=>"Berhasil"));
						break;
					case 9002:
						$common = 0;
						$data = array('user_name'=>$post['user_name'],
										'usergroup_id'=>$post['usergroup_id'],
										'is_active'=>$post['is_active']);
						$this->db->where('usex_uid', $post[$pkey]);
						$ack = $this->db->update($tbl, $data);
						if($ack) $this->set_activity(array('usex_uid'=>$this->auth['usex_uid'],
															'activity'=>'Update Data',
															'activity_url'=>$this->uri->uri_string(),
															'activity_desc'=>"User ".$this->auth['user_name']." memperbarui data user: ".$post['user_name'],
															'remark'=>"Berhasil"));
					break;

					
					case 6110: 
					//dump($post);
						
						$sql = "select jml, barang_reff_id from fp_pengeluaran_barang where fp_pengeluaran_barang_id = ".$post['fp_pengeluaran_barang_id']."";
						$data = rst2Array($sql, 'row');
						$sql = "select jml from fp_stock_barang where barang_reff_id = ".$post['barang_reff_id']."";
						$jml = rst2Array($sql, 'cel'); 
						
						if ($post['barang_reff_id'] == $data['barang_reff_id'] || $jml >= $post['jml'])
						{
							$this->db->query('update fp_stock_barang set jml = jml + '.$data['jml'].' where barang_reff_id = '.$data['barang_reff_id'].'');
							$sql= "select jml from fp_stock_barang where barang_reff_id = ".$post['barang_reff_id']."";
							$jml = rst2Array($sql, 'cel');
							if ($jml >= $post['jml'])
							{
								$this->db->query('update fp_stock_barang set jml = jml - '.$post['jml'].' where barang_reff_id = '.$post['barang_reff_id'].'');
							}
							else
							{
								$this->db->query('update fp_stock_barang set jml = jml - '.$data['jml'].' where barang_reff_id = '.$data['barang_reff_id'].'');
								$common = 0;
								$ack = "Maaf, jumlah stock barang tidak mencukupi.";
							}	
						}
						else
						{
								//dump("tes");
								$common = 0;
								$ack = "Maaf, jumlah stock barang tidak mencukupi.";
						}
					break;
					
					case 6120: /*upd 6120*/
					$sql = "select * from fp_alur_barang where fp_alur_barang_id = ".$post['fp_alur_barang_id']."";
					$data = rst2Array($sql, 'row');
					
					$sql = "select jml from fp_stock_barang where barang_reff_id = ".$data['barang_reff_id']."";
					$jml_stok = rst2Array($sql, 'cel');
					//dump($data['jml']);				
					$jml_stok2 = rst2Array($sql, 'cel') - $data['jml'];
					
					$sql = "select * from pasca_panen where pasca_panen_id = ".$post['pasca_panen_id']."";
					$datax = rst2Array($sql, 'row');
					$cek = $jml_stok2 + $post['jml'];
					$cek_stok = $jml_stok - $post['jml'];
					//dump($cek_stok);
					if ($cek >= 0 && ((($cek_stok >= 0 && $post['barang_reff_id']==$data['barang_reff_id'] )|| $jml_stok >= $data['jml']) || ($post['jml']>=$jml_stok && $post['barang_reff_id']==$data['barang_reff_id'] ))  )
					{
						//Sdump("berhasil");
					if ($this->cekModal($datax['date_pasca_panen'],$post['date_alur_barang']))
					{
						$this->db->query('update pasca_panen set modal_terpakai = modal_terpakai - '.$data['total_harga'].' where pasca_panen_id = '.$data['pasca_panen_id'].'');
						
						$sql = "select * from pasca_panen where pasca_panen_id = ".$post['pasca_panen_id']."";
						$datay = rst2Array($sql, 'row');
						$sisa = $datay['modal'] - $datay['modal_terpakai'];
						
						if ($sisa >= $post['total_harga'])
						{
							$this->db->query('update fp_stock_barang set jml = jml - '.$data['jml'].' where barang_reff_id = '.$data['barang_reff_id'].'');
							$sql = "select count(barang_reff_id) as count from fp_stock_barang where barang_reff_id =".$post['barang_reff_id']."";
							$result = rst2Array($sql, 'cel');
							if ($result == 0)
							{
								$temp['barang_reff_id'] = $post['barang_reff_id'];
								$temp['jml'] = $post['jml'];
								foreach($temp as $k=>$v) if($v!='') $this->db->set($k, $v);
								$this->db->insert('fp_stock_barang');
							}
							else
							{
								$this->db->query('update fp_stock_barang set jml = jml + '.$post['jml'].' where barang_reff_id = '.$post['barang_reff_id'].'');
							}
							$this->db->query('update pasca_panen set modal_terpakai = modal_terpakai + '.$post['total_harga'].' where pasca_panen_id = '.$post['pasca_panen_id'].'');
						}
						else
						{
							$this->db->query('update pasca_panen set modal_terpakai = modal_terpakai + '.$data['total_harga'].' where pasca_panen_id = '.$data['pasca_panen_id'].'');
							$common = 0;
							$ack = "Maaf Modal tidak mencukupi";
						}
					}
					else
					{
						$common =  0;
						$ack = "Maaf, tanggal Pembelian Barang tidak sesuai dengan periode tanggal modal";
					}
					}
					else
					{
						$common =  0;
						$ack = "Edit tidak dapat dilakukan. Barang sudah digunakan";
					}
					
					break;
					
					case 6210:
						//dump($post);
						if($post['is_utang'] == 1)
						{
							$post['pasca_panen_id'] = 0;
						}
						$sql = "select * from fp_milk_supply where fp_milk_supply_id = ".$post['fp_milk_supply_id']."";
						$data = rst2Array($sql, 'row');
						//dump($data);
						$sql2 = "select * from pasca_panen a where a.pasca_panen_id = ".$post['pasca_panen_id'];
						$datamodal = rst2Array($sql2, 'row');
						//dump($datamodal);
						if($data['pasca_panen_id'] == $datamodal['pasca_panen_id']){
							$terpakai = $datamodal['modal_terpakai']+$post['total_harga']-$data['total_harga'];
						}
						else{
							$terpakai = $datamodal['modal_terpakai']+$post['total_harga'];
						}
						if($datamodal['modal'] < $terpakai && $post['pasca_panen_id'] != 0){
							$common =  0;
							$ack = "Maaf, anda tidak bisa melakukan pengeluaran melebihi modal";
						}
						else{
							if($post['pasca_panen_id'] == 0)
							{
								$sql = "select * from fp_milk_supply where fp_milk_supply_id = ".$post['fp_milk_supply_id']." ";
								$data_milk_supply = rst2Array($sql, 'row');
								$jml_new = $post['jml'] - $data_milk_supply['jml'];
								$sql = "select jml from fp_stock_supply";
								$stok = rst2Array($sql, 'cel');
								$cek = $stok + ($post['jml'] - $data_milk_supply['jml']);
								//dump($cek);
								if ($cek >= 0)
								{
									if($data['pasca_panen_id'] != 0){
										$this->db->query("update pasca_panen set modal_terpakai = modal_terpakai - ".$data['total_harga']." where pasca_panen_id=".$data['pasca_panen_id']);
									}
									$this->db->query('update fp_stock_supply set jml = jml + '.$jml_new.'');
								}
								else
								{
									$common = 0;
									$ack = "Edit tidak dapat dilakukan. Susu sudah digunakan.";
								}
							}
							else
							{
								if ($this->cekModal($datamodal['date_pasca_panen'],$post['date_supply']))
								{
									$sql = "select * from fp_milk_supply where fp_milk_supply_id = ".$post['fp_milk_supply_id']." ";
									$data_milk_supply = rst2Array($sql, 'row');
									$jml_new = $post['jml'] - $data_milk_supply['jml'];
									$sql = "select jml from fp_stock_supply";
									$stok = rst2Array($sql, 'cel');
									$cek = $stok + ($post['jml'] - $data_milk_supply['jml']);
									//dump($cek);
									if ($cek >= 0)
									{
										if($data['pasca_panen_id'] != 0){
											$this->db->query("update pasca_panen set modal_terpakai = modal_terpakai - ".$data['total_harga']." where pasca_panen_id=".$data['pasca_panen_id']);
										}
										$this->db->query("update pasca_panen set modal_terpakai = modal_terpakai + ".$post['total_harga']." where pasca_panen_id=".$datamodal['pasca_panen_id']);
										$this->db->query('update fp_stock_supply set jml = jml + '.$jml_new.'');
									}
									else
									{
										$common = 0;
										$ack = "Edit tidak dapat dilakukan. Susu sudah digunakan.";
									}
								}
								else
								{
									$common =  0;
									$ack = "Maaf, tanggal beli susu tidak sesuai dengan periode tanggal modal";
								}
							}		
						}
						//dump($post);
						unset($post['is_utang']);
					break;
					 
					case 6230:
					
					$sql = "select * from fp_distribution where fp_distribution_id = ".$post['fp_distribution_id'];
					$data = rst2Array($sql, 'row');
					$susu_terpakai = $post['jml_susu'] - $data['jml_susu']; 
					$sql = "select * from fp_stock_milk_split a where a.milk_type_id = ".$data['milk_type_id'];
					$data_stok_milk_lama = rst2Array($sql, 'row');
					$sql = "select * from fp_stock_milk_split a where a.milk_type_id = ".$post['milk_type_id'];
					$data_stok_milk_baru = rst2Array($sql, 'row');
					
					if($data['milk_type_id'] == $post['milk_type_id'])
					{
							$sql4 = "select * from fp_stock_product where product_id = ".$data['product_id'];
							$data4 = rst2Array($sql4, 'row');
							//$tot_product = rst2Array("select sum(jml_product) as tot_product from fp_distribution where product_id = ".$data['product_id'],'cel');
							//$terpakai = $tot_product - $data4['jml'];
							$selisih = $post['jml_product'] - $data['jml_product'];
								
								if ($data['product_id'] == $post['product_id'])
								{
									if($selisih*(-1)>$data4['jml']){
										$common = 0;
										$ack = "Maaf, anda tidak bisa mengganti stock product susu dibawah dari stock product yang telah dipakai.";
									}
									else
									{
										if($susu_terpakai>$data_stok_milk_lama['jml']){
											$common = 0;
											$ack = "Maaf, anda tidak bisa membuat product melebihi stock jenis susu.";
										}
										else
										{	
											
											$this->db->query("update fp_stock_milk_split set jml =  jml - ".$susu_terpakai." where milk_type_id = ".$data['milk_type_id']);
											$jmlproduk = $post['jml_product'] - $data['jml_product'];
											$this->db->query('update fp_stock_product set jml = jml + '.$jmlproduk.' where product_id = '.$post['product_id'].'');
										}
									}
								}
								else
								{
									$sql5 = "select count(product_id) as jumlah from fp_stock_product where product_id = ".$post['product_id'];
									$jumlah = rst2Array($sql5, 'cel');
									
									/*$sqlpakai = "select count(product_id) as jumlah from fp_stock_product where product_id = ".$data['product_id'];
									$rst = rst2Array($sqlpakai, 'cel');*/
									
									$plus = $post['jml_susu'] - $data['jml_susu'];
									//$stockplus = $post['jml_product'] - $data['jml_product'];
									$jml_stock_product = rst2Array("select jml from fp_stock_product where product_id = ".$data['product_id'],"cel");
							
									if ($jml_stock_product < $data['jml_product'])
									{
											$common = 0;
											$ack = "Maaf, hasil produksi telah terpakai. Jadi data pembagian produk ini tidak bisa di edit untuk pembukuan laporan.";
									}
									else
									{
										if($plus>$data_stok_milk_lama['jml']){
											$common = 0;
											$ack = "Maaf, anda tidak bisa membuat product melebihi stock jenis susu.";
										}
										else
										{
											
											if($jumlah == 0)
											{	
												$temp['product_id'] = $post['product_id'];
												$temp['jml'] = $post['jml_product'];
												foreach($temp as $k=>$v) if($v!='') $this->db->set($k, $v);
												$this->db->insert('fp_stock_product');
												$this->db->query('update fp_stock_product set jml = jml - '.$data['jml_product'].' where product_id = '.$data4['product_id'].'');
												$this->db->query("update fp_stock_milk_split set jml =  jml - ".$plus." where milk_type_id = ".$data['milk_type_id']);
											}
											else
											{
												$sql5 = "select * from fp_stock_product where product_id = ".$post['product_id'];
												$data5 = rst2Array($sql5, 'row');
												if($selisih*(-1)>$data5['jml']){
													$common = 0;
													$ack = "Maaf, anda tidak bisa mengganti stock product susu dibawah dari stock product yang telah dipakai.";
												}
												else
												{
													$this->db->query('update fp_stock_product set jml = jml - '.$data['jml_product'].' where product_id = '.$data4['product_id'].'');
													$this->db->query('update fp_stock_product set jml = jml + '.$post['jml_product'].' where product_id = '.$post['product_id'].'');
													$this->db->query("update fp_stock_milk_split set jml =  jml - ".$plus." where milk_type_id = ".$data['milk_type_id']);
												}
												
											}
											
											
										}
									}
								}

							
					}
					else
					{
						$sql4 = "select * from fp_stock_product where product_id = ".$data['product_id'];
						$data4 = rst2Array($sql4, 'row');
						$selisih = $post['jml_product'] - $data['jml_product'];
							if ($data['product_id'] == $post['product_id'])
							{
									if($selisih*(-1)>$data4['jml']){
										$common = 0;
										$ack = "Maaf, anda tidak bisa mengganti stock product susu dibawah dari stock product yang telah dipakai.";
									}
									else
									{
										if($post['jml_susu']>$data_stok_milk_baru['jml']){
											$common = 0;
											$ack = "Maaf, anda tidak bisa membuat product melebihi stock jenis susu.";
										}
										else
										{
											$this->db->query("update fp_stock_milk_split set jml =  jml + ".$data['jml_susu']." where milk_type_id = ".$data['milk_type_id']);
											$this->db->query("update fp_stock_milk_split set jml =  jml - ".$post['jml_susu']." where milk_type_id = ".$post['milk_type_id']);
											$jmlproduk = $post['jml_product'] - $data['jml_product'];
											$this->db->query('update fp_stock_product set jml = jml + '.$jmlproduk.' where product_id = '.$data4['product_id'].'');
										}
									}
							}
							else
							{
									$sql5 = "select count(product_id) as jumlah from fp_stock_product where product_id = ".$post['product_id'];
									$jumlah = rst2Array($sql5, 'cel');
									
									/*$sqlpakai = "select count(product_id) as jumlah from fp_stock_product where product_id = ".$data['product_id'];
									$rst = rst2Array($sqlpakai, 'cel');*/
									
									//$stockplus = $post['jml_product'] - $data['jml_product'];
									//$plus = $post['jml_susu'] - $data['jml_susu'];
									
									$plus = $post['jml_susu'];
									
									$jml_stock_product = rst2Array("select jml from fp_stock_product where product_id = ".$data['product_id'],"cel");
							
									if ($jml_stock_product < $data['jml_product'])
									{
											$common = 0;
											$ack = "Maaf, hasil produksi telah terpakai. Jadi data pembagian produk ini tidak bisa di edit untuk pembukuan laporan.";
									}
									else
									{
										if($plus>$data_stok_milk_baru['jml']){
											$common = 0;
											$ack = "Maaf, anda tidak bisa membuat product melebihi stock jenis susu.";
										}
										else
										{
											if($jumlah == 0)
											{	
												$temp['product_id'] = $post['product_id'];
												$temp['jml'] = $post['jml_product'];
												foreach($temp as $k=>$v) if($v!='') $this->db->set($k, $v);
												$this->db->insert('fp_stock_product');
												$this->db->query('update fp_stock_product set jml = jml - '.$data['jml_product'].' where product_id = '.$data4['product_id'].'');
												$this->db->query("update fp_stock_milk_split set jml =  jml + ".$data['jml_susu']." where milk_type_id = ".$data_stok_milk_lama['milk_type_id']);
												$this->db->query("update fp_stock_milk_split set jml =  jml - ".$post['jml_susu']." where milk_type_id = ".$post['milk_type_id']);
								
											}
											else
											{
												$sql6 = "select * from fp_stock_product where product_id = ".$post['product_id'];
												$data6 = rst2Array($sql6, 'row');
												if($selisih*(-1)>$data6['jml']){
													$common = 0;
													$ack = "Maaf, anda tidak bisa mengganti stock product susu dibawah dari stock product yang telah dipakai.";
												}
												else
												{
													$this->db->query('update fp_stock_product set jml = jml - '.$data['jml_product'].' where product_id = '.$data4['product_id'].'');
													$this->db->query('update fp_stock_product set jml = jml + '.$post['jml_product'].' where product_id = '.$post['product_id'].'');
													$this->db->query("update fp_stock_milk_split set jml =  jml + ".$data['jml_susu']." where milk_type_id = ".$data_stok_milk_lama['milk_type_id']);
													$this->db->query("update fp_stock_milk_split set jml =  jml - ".$post['jml_susu']." where milk_type_id = ".$post['milk_type_id']);
												}
											}
										}
									}
							}
						
					}
						
							
					
					
					
					
					break;
					case 6310:
					//dump($post);
					$sql = "select modal_terpakai,date_pasca_panen from pasca_panen where pasca_panen_id = ".$post['pasca_panen_id']."";
					$data = rst2Array($sql, 'row');
					
					
					if ($data['modal_terpakai'] > $post['modal'])
					{
						$common = 0;
						$ack = "Maaf, Edit tidak bisa dilakukan. Modal baru kurang dari Modal yang sudah terpakai.";
					}
					
					if (!($this->cekModal($data['date_pasca_panen'],$post['date_pasca_panen'])))
					{
						if($data['modal_terpakai']>0)
						{
							$common = 0;
							$ack = "Maaf, Data modal ini sudah terpakai oleh penggunaan modal dengan period modal sesuai data modal. ";
						}
						
					}
					//date_pasca_panen
						/*$post['sisa_modal'] = $post['modal'];
						$this->toModal($post);
						unset($post['cat']);*/
						
					break;
					case 6310:
						$post['sisa_modal'] = $post['modal'];
						$this->toModal($post);
						unset($post['cat']);
					break;
					case 6330:
						$sql = "select * from fp_pengeluaran_produksi where fp_pengeluaran_produksi_id = ".$post['fp_pengeluaran_produksi_id']."";
						$data = rst2Array($sql, 'row');
						$sql2 = "select * from pasca_panen a where a.pasca_panen_id = ".$post['pasca_panen_id'];
						$datamodal = rst2Array($sql2, 'row');
						$date_modal = explode("-", $datamodal['date_pasca_panen']);
						$newdate = explode("-", $post['date_pengeluaran_produksi']);
						if($data['pasca_panen_id'] == $datamodal['pasca_panen_id']){
							$terpakai = $datamodal['modal_terpakai']+$post['total_harga']-$data['total_harga'];
						}
						else{
							$terpakai = $datamodal['modal_terpakai']+$post['total_harga'];
						}
						if($datamodal['modal'] < $terpakai){
							$common =  0;
							$ack = "Maaf, anda tidak bisa melakukan pengeluaran melebihi modal";
						}
						else{
							if($newdate[2] <= 7){
									if($date_modal[2] <=7 && $date_modal[0]==$newdate[0] && $date_modal[1]==$newdate[1]){
										$this->db->query("update pasca_panen set modal_terpakai = modal_terpakai - ".$data['total_harga']." where pasca_panen_id=".$data['pasca_panen_id']);
										$this->db->query("update pasca_panen set modal_terpakai = modal_terpakai + ".$post['total_harga']." where pasca_panen_id=".$datamodal['pasca_panen_id']);
									}
									else{
										$common =  0;
										$ack = "Maaf, tanggal pengeluaran produksi tidak sesuai dengan periode tanggal modal";
									}
							}
							if($newdate[2] > 7 && $newdate[2] <=15){
									if($date_modal[2] >7 && $date_modal[2] <=15 && $date_modal[0]==$newdate[0] && $date_modal[1]==$newdate[1]){
										$this->db->query("update pasca_panen set modal_terpakai = modal_terpakai - ".$data['total_harga']." where pasca_panen_id=".$data['pasca_panen_id']);
										$this->db->query("update pasca_panen set modal_terpakai = modal_terpakai + ".$post['total_harga']." where pasca_panen_id=".$datamodal['pasca_panen_id']);
									}
									else{
										$common =  0;
										$ack = "Maaf, tanggal pengeluaran produksi tidak sesuai dengan periode tanggal modal";
									}
								}
							if($newdate[2] > 15 && $newdate[2] <=22){
								if($date_modal[2] >15 && $date_modal[2] <=22 && $date_modal[0]==$newdate[0] && $date_modal[1]==$newdate[1]){
									$this->db->query("update pasca_panen set modal_terpakai = modal_terpakai - ".$data['total_harga']." where pasca_panen_id=".$data['pasca_panen_id']);
									$this->db->query("update pasca_panen set modal_terpakai = modal_terpakai + ".$post['total_harga']." where pasca_panen_id=".$datamodal['pasca_panen_id']);
								}
								else{
									$common =  0;
									$ack = "Maaf, tanggal pengeluaran produksi tidak sesuai dengan periode tanggal modal";
								}
							}
							if($newdate[2] > 22){
								if($date_modal[2] >22 && $date_modal[0]==$newdate[0] && $date_modal[1]==$newdate[1]){
									$this->db->query("update pasca_panen set modal_terpakai = modal_terpakai - ".$data['total_harga']." where pasca_panen_id=".$data['pasca_panen_id']);
									$this->db->query("update pasca_panen set modal_terpakai = modal_terpakai + ".$post['total_harga']." where pasca_panen_id=".$datamodal['pasca_panen_id']);
								}
								else{
									$common =  0;
									$ack = "Maaf, tanggal pengeluaran produksi tidak sesuai dengan periode tanggal modal";
								}
							}
						}
					break;
					case 6341: /*abah*/
						$sql = "select * from nota where nota_id = ".$post['nota_id'];
						$data = rst2Array($sql, 'row');
						$sql = "select * from bayar_nota where bayar_nota_id = ".$post['bayar_nota_id'];
						$datax = rst2Array($sql, 'row');
						$temp = $data['piutang'] + $datax['debet'];
						$temp = $temp - $post['debet'];
						$alpha = $post['debet'] - $datax['debet'];
						//dump($alpha);
						if ($temp >= 0)
						{
							//dump("sukses");
							$this->db->query("update nota set debet = debet  + ".$alpha.", piutang = piutang - ".$alpha." where nota_id=".$post['nota_id']);	
						}
						else
						{
							$common =  0;
							$ack = "Jumlah pembayaran tidak boleh lebih dari sisa piutang. Sisa piutang ".$data['piutang']."";
						}
					break;
					case 6350:
					$sql = "select * from nota where nota_id = ".$post['nota_id'];
					$data = rst2array($sql, 'row');
					//dump($data);
					if ($post['total_harga'] < $data['debet'])
					{
						$common =  0;
						$ack = "Maaf pembayaran telah dilakukan dengan dana lebih dari total harga";
					}
					else
					{
						if(!isset($post['total_harga']) || empty($post['total_harga']))
						{$post['total_harga']=0;}
						
						$post['piutang'] = $post['total_harga'] - $data['debet'];
					}
					
					
				break;
				}
				if($common) {
				  // dump($post);
					$ack = $this->db->update($tbl, $post, array($pkey=>$post[$pkey]));
					
					$ddt = $this->extractData($post);
					if($ack) $this->set_activity(array('usex_uid'=>$this->auth['usex_uid'],
															'activity'=>'Update Data',
															'activity_url'=>$this->uri->uri_string(),
															'activity_desc'=>"User ".$this->auth['user_name']." memperbarui data pada tabel: $tbl, pkey: $pkey=$post[$pkey] ; $ddt ",
															'remark'=>"Berhasil"));
				
				}
				break;

		}
		return $ack;
	}
	
	public function reff($type, $param=null) {
		$whr = '';
		switch ($type) {
			case 'user_group':
				$sql = "select usergroup_id id, user_group nm from t_usergroup where is_active = 't' order by usergroup_id asc";
				break;
		} 
		return rst2Array($sql);
	}
	
	public function unique($m, $f, $v) {
		$t = $this->tba[$m];
		if(trim($v)) {
			$v = $this->db->escape(trim($v));
			$s = "select '1' rst from $t where lower($f) = lower($v)";
			return rst2Array($s, 'cel');
		}
		else return 1;
	}
	
	public function set_activity($dat) {
	    $evid = UUID::generate(UUID::UUID_TIME, UUID::FMT_STRING, "abcdef");
		if($this->agent->is_browser()){$type = "Browser";}else{$type = "Mobile";}
		$edat = array('act_uid'=>$evid,
						'user_agent'=>$this->browser['name'],
						'user_agent_ver'=>$this->browser['version'],
						'user_agent_os'=>$this->browser['os'],
						'user_agent_type'=>$type,
						'ip_address'=>$this->ipx,
						'ts'=>$this->wib);
		$datax = array_merge($dat, $edat);
		$this->db->insert('t_user_activity', $datax);
	}
	
	public function get_idx() {
		$sql = "select usex_uid from usys.usex order by usex_uid desc limit 1";
		$rst = rst2Array($sql, 'row');
		return $rst;
	}
	
	function dateIndonesian($date) {
		$array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
		$array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober', 'November','Desember');
		
		$date  = strtotime($date);
		$hari  = $array_hari[date('N',$date)];
		$tanggal = date ('j', $date);
		$bulan = $array_bulan[date('n',$date)];
		$tahun = date('Y',$date);
		$formatTanggal = $hari.", ".$tanggal." ".$bulan." ".$tahun;
		return $formatTanggal;
	}
	
	private function extractData($dat)
	{
		$rst="";
		if(sizeof($dat)>0)
		{
			$rst="Data : ";
			$idx = 0;
			foreach($dat as $k=>$v)
			{
				$rst.=" $k = $v ,";
				$idx++;
				if($idx>10)
				{break;}
			}
			$rst.="..";
		}
		return $rst;
	}
}
// end of file mHome.php