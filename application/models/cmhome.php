<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}
require_once("class.uuid.php");

class cmHome extends CI_Model {
	 
	function __construct() {
		parent::__construct();
		Date_default_timezone_set('Asia/Jakarta');
		$this->load->library('pagination');
		$browser	= $this->agent->requirement();
		$this->wib	= time();
		$this->auth	= unserialize(base64_decode($this->session->userdata('beta')));
		$this->ipx	= $this->input->ip_address();
		$this->limit= 10;
		$this->browser	= $this->agent->requirement();
		$this->tba	= array(
			101 => 'account',102 => 'account',103 => 'account',
			104 => 'account',105 => 'account',106 => 'account',107 => 'account',108 => 'account',
			201 => 'deposit',202 => 'BalanceTransfer',203 => 'withdraw',
			301 => 'account',401 => 'account',801 => 'account',
			999 =>'c_user',998 =>'account',
			9001=>'accountType',9002=>'c_user',9003=>'c_privilege',
			9004=>'c_useractivity'
		);
	}
	
	public function GetMenu($menu=0) {
		if($menu) $this->set_activity(array('activity'=>'open page', 'remark'=>"success"));
		$pid = empty($menu) ? " = 0" : "= $menu";
		
		$uid = $this->auth["UserID"];//empty($uid)? 0 : $uid;
		$whr="";
		
		//$sql = "SELECT * FROM c_menu WHERE IsActive = 1 AND MenuPID $pid ORDER BY MenuID, MenuPID";
		
		
		
		$sql = "select 	a.*
				from 	c_menu a, c_privilege b, c_user c, accounttype at
				where	a.menuID		= b.menuID
				and 	b.AccountTypeID 	= c.AccountTypeID
				and     c.AccountTypeID = at.AccountTypeID
				and		b.p_menu		= 1
				and		c.UserID		= '$uid'
				and		a.MenuPID $pid 
				and   ((a.MenuID = 301 AND at.AllowReferal = 1) OR a.MenuID <> 301)
				order by a.MenuID";
				
		//return rst2Array($sql);
		
		//dump($sql);
		
		$dat = rst2Array($sql);
		
		if(sizeof($dat)>0)
		{
			foreach($dat as $k => $v)
			{
				if($v['IsParent']==1)
				{
					$dat[$k]['child'] = $this->GetMenu($v['MenuID']);
				}
			}
		}
		return $dat;
	}
	
	public function get_menu($uid, $menu=0) {
		if($menu) $this->set_activity(array('activity'=>'open page', 'remark'=>"success"));
		$con = empty($menu) ? " = 0" : " = $menu";
		$whr="";
		
		$sql = "select 	a.MenuID, Menu, CSSClass
				from 	c_menu a, c_privilege b, c_user c
				where	a.menuID		= b.menuID
				and 	b.AccountTypeID 	= c.AccountTypeID
				and		b.p_menu		= 1
				and		c.UserID		= '$uid'
				and		a.MenuPID $con 
				$whr
				order by a.MenuID";
				
		return rst2Array($sql);
		
	}
	
	public function get_privilege($gid, $menu) {
		$gid = empty($gid)? '' : $gid;
		$sql = "select p_menu, p_insert, p_select, p_update, p_delete
				from c_privilege
				where AccountTypeID = $gid
				and MenuID = $menu";
				
		return rst2Array($sql, 'row');
	}
	
	public function select($menu, $param=null) {
		$sql2 = '';
		$whr = '';
		$tot = 0; 
		$amo = array();
		$lim = isset($param['limit']) ? $param['limit'] : $this->limit;
		$awl = isset($param['page'])  ? ($param['page'] - 1)*$lim : 0;		
		$off = "limit $lim offset $awl";
		if(isset($param['xls'])) $off = '';
		unset($param['limit'], $param['page'], $param['xls']);
		$sql="";
		$tbx = $this->tba[$menu];
		if($menu) $this->set_activity(array('activity'=>'open page', 'remark'=>"success"));
		switch($menu) {
			case 101:
				$accountID = $this->auth["AccountID"];
				$sql = "SELECT ac.*,usr.UserID, usr.status AS UserStatus, at.AccountTypeName FROM c_user usr 
						JOIN account ac on  usr.AccountID = ac.AccountID 
						JOIN accounttype at ON ac.AccountTypeID = at.AccountTypeID where ac.ParentRefID = $accountID order by CreatedDate desc";
				$tot = rst2Array(" SELECT COUNT(*) FROM ($sql) A ","cel");
				$sql = "$sql $off";
				break;
			case 102:
			case 103:
			case 104:
			case 105:
			case 106:
			case 107:
			case 801:
				$sql = "SELECT ac.*,UserID, usr.status FROM c_user usr JOIN account ac on  usr.AccountID = ac.AccountID where usr.UserID = '".$this->auth["UserID"]."'";
				$datx = rst2Array($sql,'row');
				$datx["tot"] = 1;
				return $datx;
				break;
			case 102:
				$sql = "SELECT * FROM corpdetail WHERE CorpDetailID = 1 ";
				return rst2Array($sql,'row');
				break;
			case 106:
			case 201:
			
				$sql = "SELECT '".$this->auth["UserID"]."' AS UserID, a.*, CONCAT(cb.BankName,' (',cb.BankAccount,')') AS RibBank FROM deposit a JOIN corpbank cb ON a.BankDestinationID = cb.CorpBankID WHERE a.AccountID = '".$this->auth["AccountID"]."' ORDER BY DepositStatus, DepositDate DESC ";
				$tot = rst2Array(" SELECT COUNT(*) FROM ($sql) A ","cel");
				$sql = "$sql $off";
				
				break;
			case 202:
			
				$sql = "SELECT '".$this->auth["UserID"]."' AS UserID, b.UserID AS DestAcc, a.* FROM balancetransfer a  JOIN c_user b ON a.DestinationAccount = b.AccountID WHERE a.AccountID = '".$this->auth["AccountID"]."' ORDER BY TransferDate DESC ";
				$tot = rst2Array(" SELECT COUNT(*) FROM ($sql) A ","cel");
				$sql = "$sql $off";
				
				break;
			case 203:
			
				$sql = "SELECT '".$this->auth["UserID"]."' AS UserID, a.* FROM withdraw a  WHERE a.AccountID = '".$this->auth["AccountID"]."' ORDER BY WithdrawStatus, WithdrawDate DESC ";
				$tot = rst2Array(" SELECT COUNT(*) FROM ($sql) A ","cel");
				$sql = "$sql $off";
				
				break;
			case 301:
			
				$sql = "SELECT usr.UserID AS UserID,usr.status AS status, a.AccountID, a.CreatedDate, a.FirstName,a.MiddleName, a.LastName FROM account a JOIN c_user usr ON a.AccountID = usr.AccountID WHERE a.ParentRefID = ".$this->auth["AccountID"]." ORDER BY CreatedDate DESC ";
				$tot = rst2Array(" SELECT COUNT(*) FROM ($sql) A ","cel");
				$sql = "$sql $off";
				
				break;
			case 401:
				$dep = "SELECT DepositDate AS TrxDate, 'Deposit' AS Transaction,  '-' AS Debit,Deposit AS Credit, DepositStatus AS Status, CASE WHEN IsValid = 1 THEN 'Active' ELSE '-' END AS Remarks, CurrentBalance AS CurrentBalance, CurrentBonus AS CurrentBonus FROM deposit WHERE IsValid = 1 AND AccountID = ".$this->auth["AccountID"];
				$trf = "SELECT tr.TransferDate AS TrxDate, 'Transfer' AS Transaction, tr.Transfer AS Debit,'-' AS Credit, tr.Status AS Status, CONCAT('Transfer to ',usr.UserID) AS Remarks, CurrentBalance AS CurrentBalance, CurrentBonus AS CurrentBonus FROM balancetransfer tr JOIN c_user usr ON tr.DestinationAccount = usr.AccountID WHERE tr.AccountID = ".$this->auth["AccountID"];
				$trfRcp = "SELECT tr.TransferDate AS TrxDate, 'Transfer' AS Transaction, '-' AS Debit,tr.Transfer AS Credit, tr.Status AS Status, CONCAT('Transfer from ',usr.UserID) AS Remarks, DestBalance AS CurrentBalance, DestBonus AS CurrentBonus  FROM balancetransfer tr JOIN c_user usr ON tr.AccountID = usr.AccountID WHERE tr.DestinationAccount = ".$this->auth["AccountID"];
				$wd = "SELECT WithdrawDate AS TrxDate, 'Withdraw' AS Transaction, Withdraw AS Debit,'-' AS Credit, WithdrawStatus AS Status, CASE WHEN WithdrawType = 1 THEN CONCAT('Withdraw deposit with fee $',WithdrawFee) ELSE CONCAT('Withdraw bonus with fee $', WithdrawFee) END AS Remarks, CurrentBalance AS CurrentBalance, CurrentBonus AS CurrentBonus FROM withdraw  WHERE AccountID = ".$this->auth["AccountID"]." AND WithdrawStatus = 1 ";
				$depBonus = "SELECT date(DepB.DepositBonusDate) AS TrxDate, 'Deposit Bonus' AS Transaction, '-' AS Debit, DepB.Bonus AS Credit, 1 AS Status, CONCAT('Deposit bonus for period ',date(RunP.StartPeriod),' - ',date(RunP.EndPeriod))  AS Remarks, DepB.CurrentBalance AS CurrentBalance, DepB.CurrentBonus AS CurrentBonus FROM depositbonus DepB Join runningperiod RunP ON DepB.RunningPeriodID = RunP.RunningPeriodID  WHERE RunP.AccountID = ".$this->auth["AccountID"];
				$refBonus = "SELECT RefB.ReferalBonusDate AS TrxDate, 'Referal Bonus' AS Transaction, '-' AS Debit, RefB.Bonus AS Credit, 1 AS Status, CONCAT('Referal from account ',Chld.UserID, ' with He/Her balance = ', RefB.ReferalBalance) AS Remarks, RefB.CurrentBalance AS CurrentBalance, RefB.CurrentBonus AS CurrentBonus  FROM referalbonus RefB JOIN c_user Chld ON RefB.ChildID = Chld.AccountID WHERE RefB.AccountID = ".$this->auth["AccountID"];
				
				$sql = "$dep UNION $trf UNION $wd UNION $trfRcp UNION $depBonus UNION $refBonus";
				
				$tot = rst2Array(" SELECT COUNT(*) FROM ($sql) A ","cel");
				$sql = "SELECT A.* FROM ( $sql ) A ORDER BY A.TrxDate DESC $off";
				
				break;
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
			if($f->primary_key) $pkey = $f->name;//strtolower($f->name);
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
					
					
						
						
				}
				if($common) {
					
					$ack = $this->db->delete($tbl, array($pkey =>$post[$pkey])); 
					
					$ddt = $this->extractData($post);
					
					if($ack){ $this->set_activity(array('usex_uid'=>$this->auth['usex_uid'],
															'activity'=>'Delete Data',
															'url'=>$this->uri->uri_string(),
															'activity_desc'=>"User ".$this->auth['user_name']." menghapus data pada tabel: $tbl, pkey: $pkey=$post[$pkey] ; $ddt ",
															'remark'=>"Berhasil"));}
					else{
						$ack = "Data tidak bisa di hapus, karena kemungkinan data ini telah digunakan oleh data lain.";
					}
				
				}
				break;
			case 'add':
				switch($menu) {
					case 998:
						$common = 0;
						if(isset($post['Address']))
						{
							$post['Address'] = $post['Address']." ".(isset($post['Address2'])?$post['Address2']:"");
						}						
						unset($post['Address2']);
						unset($post['AgreeTerm']);
						
						$post["CreatedDate"] = date('Y-m-d H:i:s',$this->wib);
						$ack = array();
						$status = $this->db->insert($tbl, $post);
						$ack["status"] = $status;
						
						if($status)
						{
							
							$accountID = rst2Array(" SELECT LAST_INSERT_ID() FROM account ","cel");
							
							$countryCode = rst2Array(" SELECT CountryCode FROM country WHERE CountryID = $post[CountryID] ","cel");
							
							$user = array();
							$passwd = mt_rand();//'RInv3stment';
							$user["passwd"] = $this->encrypt->encode($passwd);
							
							$user['Username'] = $post['FirstName'];
							$user['AccountID'] = $accountID;
							$user['AccountTypeID'] = $post['AccountTypeID'];
							$user['UserID'] = $countryCode.$accountID;
							$user["email"] = $post['Email'];
							$user["status"] = 0;
							
							$status = $this->db->insert("c_user", $user);
							
							if($status) $this->set_activity(array('UserID'=>"System",
															'activity'=>'Add Data',
															'url'=>$this->uri->uri_string(),
															'activity_desc'=>"Create New User ",
															'remark'=>"success"));
															
							$ack["status"] = $status;
							$ack['AccountID'] = $accountID;
							
							
						}
						return $ack;
					break;
					case 201:
						
						$sql = "SELECT COUNT(*) FROM deposit WHERE AccountID = '".$this->auth["AccountID"]."' AND (DepositStatus < 1 OR DepositStatus IS NULL)  ";
						
						$tot = rst2Array($sql,"cel");
						if($tot>2)
						{
							return "Sorry, You could only have maximum 3 pending deposit request.";
						}
						
						if($post["Deposit"]<=0)
						{
							return "Invalid amount of deposit.";
						}
						
						$post["NoDeposit"] = mt_rand();
						$post["DepositDate"] = date('Y-m-d H:i:s',$this->wib);
					break;
					case 202:
						
						if($post["Transfer"]<=0)
						{
							return "Invalid amount of transfer.";
						}
						
						$user = rst2Array("SELECT * FROM account WHERE AccountID = $post[AccountID] ","row");
						
						if($user["TotalBonus"]<$post["Transfer"])
						{
							return "Sorry, You could only transfer your bonus and your bonus is not enough to process this transfer.";
						}
						
						$destID = rst2Array(" SELECT AccountID From c_user WHERE UserID = '$post[DestinationAccount]' ","cel");
						if( isset($destID) )
						{
							if($destID<1)
							{
								return "Account $post[DestinationAccount] doesn't exist. Please input an active account for destination account.";
							}
							
							$this->db->query("UPDATE account SET TotalBonus = TotalBonus - $post[Transfer]  WHERE AccountID = $user[AccountID] ");
							$this->db->query("UPDATE account SET TotalBonus = TotalBonus + $post[Transfer]  WHERE AccountID = $destID ");
							
							$user = rst2Array("SELECT * FROM account WHERE AccountID = $post[AccountID] ","row");
							$userDest = rst2Array("SELECT * FROM account WHERE AccountID = $destID ","row");
							
							$post["DestBalance"] = $userDest["Balance"];
							$post["DestBonus"] = $userDest["TotalBonus"];
							$post["CurrentBalance"] = $user["Balance"];
							$post["CurrentBonus"] = $user["TotalBonus"];
							$post["TransferDate"] = date('Y-m-d H:i:s',$this->wib);
							$post["DestinationAccount"] = $destID; 
							$post["Status"] = 1;
						}
						else
						{
							return "Undefine destination account. Please input an active account for destination account.";
						}
						
						
					break;
					case 203:
					
						//$corp = rst2Array("SELECT * FROM corpdetail WHERE CorpDetailID = 1 ","row");
						$accountType = $this->reff("AccountTypeByAccountID", array("AccountID"=>$this->auth["AccountID"]));
						$user = rst2Array("SELECT * FROM account WHERE AccountID = $post[AccountID] ","row");
						
						if($post["WithdrawType"]==2)
						{
							$post["Withdraw"] = isset($post["Withdraw"]) ? $post["Withdraw"] : 0;
							if($post["Withdraw"]<=0)
							{
								return "Invalid amount of withdraw.";
							}
							
							//$wd = ($post["Withdraw"] + $corp["WDBonusFee"]);
							$pendingWDBonus = rst2Array("SELECT SUM(Withdraw+WithdrawFee) FROM withdraw WHERE AccountID = $post[AccountID] AND WithdrawStatus = 0 AND WithdrawType = 1","cel");
							$wd = $post["Withdraw"];//($post["Withdraw"] - $corp["WDBonusFee"]);
							
							if($user["TotalBonus"]< ($post["Withdraw"]+$pendingWDBonus ))
							{
								return "Sorry, Your bonus is not enough to process this withdraw. Maybe you have submited another withdraw.";
							}
							
							//$this->db->query("UPDATE account SET TotalBonus = TotalBonus - $wd  WHERE AccountID = $user[AccountID] ");
							
							//$user = rst2Array("SELECT * FROM account WHERE AccountID = $post[AccountID] ","row");
							
							//$post["CurrentBalance"] = $user["Balance"];
							//$post["CurrentBonus"] = $user["TotalBonus"];
							
							$post["WithdrawDate"] = date('Y-m-d H:i:s',$this->wib);
							$post["Withdraw"] = $wd;
							$post["WithdrawFee"] = $accountType["WDBonusFee"]; 
							$post["WithdrawStatus"] = 0;
							
							
						}
						else
						{
							if($user["Balance"]<=0)
							{
								return "Sorry, You don't have enough balance for now.";
							}
							$pendingWDBalance = rst2Array("SELECT count(*) FROM withdraw WHERE AccountID = $post[AccountID] AND WithdrawStatus = 0 AND WithdrawType = 2","cel");
							
							if($pendingWDBalance>0)
							{
								return "Sorry, You have submited withdraw balance recently and the process is on progress. Please wait about 1-3 days.";
							}
							$wdFee = 0;
							$curdate = date("Y-m-d", $this->wib);
							$period = $this->getPeriod($curdate, $this->auth);
				
							if(isset($period["DepRunningWD"]) && !empty($period["DepRunningWD"]))
							{
								if($period["DepRunningWD"]==1)
								{
									$wdFee = ceil($user["Balance"] * $accountType["WDDepositFeeRate"] / 100);
								}
							}
							
							$wd = $user["Balance"]; //- $wdFee;
							//$this->db->query("UPDATE account SET Balance = 0  WHERE AccountID = $user[AccountID] ");
							
							//$user = rst2Array("SELECT * FROM account WHERE AccountID = $post[AccountID] ","row");
							
							//$post["CurrentBalance"] = $user["Balance"];
							//$post["CurrentBonus"] = $user["TotalBonus"];
							$post["WithdrawDate"] = date('Y-m-d H:i:s',$this->wib);
							$post["Withdraw"] = $wd; 
							$post["WithdrawFee"] = $wdFee; 
							$post["WithdrawStatus"] = 0;
						}
						
					break;
					
					case 9001:
						$common = 0;
						$dat = array('user_group'=>$post['user_group'],
								'user_group_desc'=>$post['user_group_desc'],
								'is_active'=>$post['is_active']);
						$ack = $this->db->insert($tbl, $dat);
						if($ack) $this->set_activity(array('usex_uid'=>$this->auth['usex_uid'],
															'activity'=>'Add Data',
															'url'=>$this->uri->uri_string(),
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
										'created_date'=>date("Y-m-d H:i:s",$this->wib),
										'created_by'=>$this->auth['usex_uid']);
						$ack = $this->db->insert($tbl, $data);
						if($ack) $this->set_activity(array('usex_uid'=>$this->auth['usex_uid'],
															'activity'=>'Add Data',
															'url'=>$this->uri->uri_string(),
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
					
				}
				if($common) {
					foreach($post as $k=>$v) if($v!='' || $v==0) $this->db->set($k, $v);
					$ack = $this->db->insert($tbl);
					$ddt = $this->extractData($post);
					if($ack) $this->set_activity(array('UserID'=>$this->auth['UserID'],
															'activity'=>'Add Data',
															'url'=>$this->uri->uri_string(),
															'activity_desc'=>"User ".$this->auth['Username']." add data to table: $tbl, ; $ddt ",
															'remark'=>"success"));
															
				}
				break;
			case 'upd':
				foreach($post as $k=>$v) if($v=='') unset($post[$k]);
				
				
				switch($menu) {
					case 101;
					
					$this->db->where('AccountID',$post['AccountID']);
					$this->db->update('account',array('IdentificationDoc' => $post['IdentificationDoc']));
					return 1;
					break;
					
					case 107:
						$userid = $this->auth['UserID'];
						$passwd = rst2Array("SELECT passwd FROM c_user WHERE UserID = '$userid'", 'cel');
		
						$passwd = $this->encrypt->decode($passwd);
						if(isset($post['PrevPassword']) && !empty($post['PrevPassword']))
						{
							if($passwd==$post['PrevPassword'])
							{
								if(isset($post['passwd']) && !empty($post['passwd']))
								{
									if(isset($post['passwdConfirm']) && !empty($post['passwdConfirm']))
									{
										if($post['passwd']==$post['passwdConfirm'])
										{
											$this->db->update("c_user", array("passwd"=>$this->encrypt->encode($post['passwd'])), array("UserID"=>$this->auth["UserID"]));
										}
										else
										{
											return "Please confirm your new password.";
										}
									}
									else
									{
										return "Please confirm your new password.";
									}
									
								}
								else
								{
									return "Your new password can't be empty.";
								}
							}
							else
							{
								return "Your password is incorrect.";
							}
						}
						
						
						unset($post['PrevPassword']);
						unset($post['passwd']);
						unset($post['passwdConfirm']);
					break;
					
					case 6320:
						if(!isset($post['total_harga']) || empty($post['total_harga']))
						{$post['total_harga']=0;}
						if(!isset($post['debet']) || empty($post['debet']))
						{$post['debet']=0;}
						
						$post['piutang'] = $post['total_harga'] - $post['debet'];
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
					
				}
				if($common) {
				    
					$ack = $this->db->update($tbl, $post, array($pkey=>$post[$pkey]));
					
					$ddt = $this->extractData($post);
					if($ack) $this->set_activity(array('UserID'=>$this->auth['UserID'],
															'activity'=>'Update Data',
															'url'=>$this->uri->uri_string(),
															'activity_desc'=>"User ".$this->auth['Username']." has updated table: $tbl, pkey: $pkey=$post[$pkey] ; $ddt ",
															'remark'=>"Berhasil"));
				
				}
				break;

		}
		return $ack;
	}
	
	public function reff($type, $param=null) {
		$whr = '';
		switch ($type) {
			case 'AccountType':
				$sql = "select AccountTypeID id, AccountTypeName nm from accounttype WHERE AccountTypeID <> 999 order by id asc";
				break;
			case 'AccountTypeByAccountID':
				$sql = "select at.* from accounttype at JOIN account ac ON at.AccountTypeID = ac.AccountTypeID WHERE ac.AccountID = $param[AccountID] ";
				
				return rst2Array($sql,"row");
				break;
			case 'Country':
				$whr .=  isset($param['CountryID']) ? " and CountryID = $param[CountryID] " : "";
				$sql = "select CountryID id, CountryName nm, CountryCode code from country where 1=1 $whr order by nm asc";
				break;
			case 'Currency':
				$sql = "select CurrencyID id, CurrencyName nm, CurrencyCode code, USDValue from currency order by nm asc";
				break;
			case 'EmployeeStatus':
				$sql = "select EmployeeStatusID id, EmployeeStatus nm from employeestatus order by nm asc";
				break;
			case 'NatureOfBusiness':
				$sql = "select NatureOfBusinessID id, NatureOfBusinessID nm from natureofbusiness order by nm asc";
				break;
			case 'PositionRef':
				$sql = "select PositionRefID id, position nm from positionref order by nm asc";
				break;
			case 'SourceOfIncome':
				$sql = "select SourceOfIncomeID id, SourceOfIncome nm from sourceofincome order by nm asc";
				break;
			case 'AnnualIncomeRef':
				$sql = "select AnnualIncomeRefID id, AnnualIncomeScale nm from annualincomeref order by nm asc";
				break;
			case 'LiabilitasRef':
				$sql = "select LiabilitasRefID id, LiabilitasScale nm from liabilitasref order by nm asc";
				break;
			case 'AssetMinLiabilitasRef':
				$sql = "select AssetMinLiabilitasRefID id, AssetMinLiabilitasScale nm from assetminliabilitasref order by nm asc";
				break;	
			case 'SecurityQuestion':
				$sql = "select SecurityQuestionID id, Question nm from securityquestion order by nm asc";
				break;
			case 'AccountTitleRef':
				$sql = "select TitleID id, Title nm from accounttitleref order by nm asc";
				break;
			case 'Citizenship':
				$sql = "select CitizenshipID id, Citizenship nm from citizenship order by nm asc";
				break;
			case 'IdentificationType':
				$sql = "select ID id, Type nm from identificationtype order by nm asc";
				break;
			case 'CorpBank':
				$whr .= isset($param["CorpBankID"]) && !empty($param["CorpBankID"]) ? " AND CorpBankID = $param[CorpBankID] " :"";
				$sql = "select *, CorpBankID id, CONCAT(BankName,' (',BankAccount,')') nm from corpbank where 1=1 $whr order by nm asc";
				
				break;
			case 'Account':
				$sql = "SELECT ac.*,UserID, usr.status AS UserStatus, at.AccountTypeName FROM c_user usr JOIN account ac on  usr.AccountID = ac.AccountID 
				        JOIN accounttype at ON ac.AccountTypeID = at.AccountTypeID where usr.UserID = '".$param["UserID"]."'";
				
				return rst2Array($sql,"row");
				break;
			case 'CorpDetail':
				$sql = "SELECT *";
				
				return rst2Array($sql,"row");
				break;
		} 
		return rst2Array($sql);
	}
	
	public function GetAccountByEmail($email)
	{
		$sql = "SELECT * FROM account WHERE Email = '".$email."'";
		return rst2Array($sql,"row");
	}
	
	public function GetAccountByAccountID($acID)
	{
		$sql = "SELECT ac.*, usr.UserID FROM account ac JOIN c_user usr ON ac.AccountID = usr.AccountID  WHERE ac.AccountID = '".$acID."'";
		return rst2Array($sql,"row");
	}
	
	public function UpdateForgotReqID($accountID, $reqID)
	{
		$this->db->query("UPDATE account SET ForgotReqID = '$reqID' WHERE AccountID = $accountID ");	
	}
	
	public function CheckReqID($accountID, $reqID)
	{
		$sql = "SELECT ForgotReqID FROM account WHERE AccountID = $accountID AND ForgotReqID = '$reqID' ";
		return rst2Array($sql,"row");	
	}
	
	public function ResetPasswd($accountID, $passwd)
	{
		$this->db->query("UPDATE c_user SET passwd = '$passwd' WHERE AccountID = $accountID ");	
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
						'UserID'=>$this->auth['UserID'], 
						'url'=>$this->uri->uri_string(), 						
						'ts'=>$this->wib);
		$datax = array_merge($dat, $edat);
		$this->db->insert('c_useractivity', $datax);
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
	public function set_out($id) {
		$id  = $this->db->escape(trim($id));
		$sql = "update c_user set logged = 0 where UserID = $id";
		$this->db->query($sql);
	}
	public function get_user($user_id='', $status=1) {
		$user_id = $this->db->escape(trim($user_id));
		$status  = $status ? 'and status = 1' : '';
		
		$sql = "select currentz from t_security where security_id = 'allowed_ghost_logged'";
		$idle= rst2Array($sql, 'cel');
		
		$sql = "select 	a.*, b.AccountTypeName,
						($this->wib - IFNULL(c.ts,0)) - ($idle*60) as idle
				from 	c_user a
				join	accounttype b on a.AccountTypeID = b.AccountTypeID
				left join (select	UserID, max(ts) ts 
							from 	c_useractivity 
							where 	lower(UserID) = lower($user_id)
							and		remark = 'success'
							group 	by UserID) c on a.UserID = c.UserID
				where 	lower(a.UserID) = lower($user_id)
				$status";
		
		return rst2Array($sql, 'row');
	}
	public function getAccount($userID)
	{
		$sql = "SELECT ac.*,UserID, usr.status AS UserStatus, at.AccountTypeName, ctry.CountryName FROM c_user usr JOIN account ac on  usr.AccountID = ac.AccountID 
				        JOIN accounttype at ON ac.AccountTypeID = at.AccountTypeID
						LEFT JOIN country ctry on ac.CountryID = ctry.CountryID where usr.UserID = '".$userID."'";
				
		return rst2Array($sql,"row");
	}
	public function getLastWD($post=null)
	{
		$sql = "";
		$account = $this->getAccount($this->auth["UserID"]);
		$accountID = $account["AccountID"];
		if(isset($post) && isset($post["WithdrawID"]) && !empty($post["WithdrawID"]))
		{
			$sql = "SELECT * FROM withdraw WHERE WithdrawID = $post[WithdrawID] AND AccountID = $accountID ";
		}
		else
		{
			$sql = "SELECT * FROM withdraw WHERE AccountID = $accountID  ORDER BY WithdrawDate DESC LIMIT 0 , 1 ";
		}
		return rst2Array($sql,"row");
	}
	
	public function getLastDeposit($post=null)
	{
		
		$account = $this->getAccount($this->auth["UserID"]);
		$accountID = $account["AccountID"];
		$sql = "";
		if(isset($post) && isset($post["DepositID"]) && !empty($post["DepositID"]))
		{
			$sql = "SELECT * FROM deposit WHERE DepositID = $post[DepositID] AND AccountID = $accountID ";
		}
		else
		{
			$sql = "SELECT * FROM deposit WHERE AccountID = $accountID  ORDER BY DepositDate DESC LIMIT 0 , 1 ";
		}
		return rst2Array($sql,"row");
	}
	
	public function getPeriod($curdate, $user)
	{
		return rst2Array("SELECT CASE WHEN StartPeriod < '$curdate' AND '$curdate' < DATE_SUB(EndPeriod,INTERVAL 1 MONTH) THEN 1 ELSE 0 END AS DepRunningWD,
							CASE WHEN DATE_SUB(EndPeriod,INTERVAL 5 DAY) <= '$curdate' THEN 1 ELSE 0 END AS DepEndWD, DATE_SUB(EndPeriod,INTERVAL 5 DAY) AS DepEndDateWD
						FROM runningperiod WHERE RunningPeriodStatus = 1 AND AccountID = $user[AccountID] ","row");
	}
}
// end of file mHome.php