<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}
require_once("class.uuid.php");

class mAuth extends CI_Model {
	 
	function __construct() {
		parent::__construct();
		Date_default_timezone_set('Asia/Jakarta');
		$browser	= $this->agent->requirement();
		//$this->wib	= time();
		$this->wib = time();
		$this->ipx=$this->input->ip_address();
	}
	
	public function empty_param(&$param) {
		foreach($param as $k=>$v) {
			if($param[$k] == '' || empty($param[$k]))
			{unset($param[$k]);}
		}
	}
	
	public function get_user($user_id='', $status=1) {
		$user_id = $this->db->escape(trim($user_id));
		$status  = $status ? 'and status = 1' : '';
		
		$sql = "select currentz from t_security where security_id = 'allowed_ghost_logged'";
		$idle= rst2Array($sql, 'cel');
		
		$sql = "select 	a.*, b.AccountTypeName, IFNULL(c.ts,0),
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
	
	public function get_email($email='', $status=1) {
		$email 	= $this->db->escape(trim($email));
		$status = $status ? 'and status = 1' : '';
		
		$sql = "select email from c_user where lower(email) = lower($email) $status";
		return rst2Array($sql, 'cel');
	}
	
	public function get_logged($idx='') {
		$idx = $this->db->escape(trim($idx));
		$sql = "select 	a.UserID, a.username, b.AccountTypeName 
				from 	c_user a, accounttype b
				where 	a.AccountTypeID = b.AccountTypeID
				and		lower(a.UserID) = lower($idx)
				and 	a.status = 1";
		return rst2Array($sql, 'row');
	}
	
	public function set_logged($user_id, $data) {
		$idx  = $this->db->escape(trim($user_id));
		$data = array_merge($data, array('logged'=>1, 'banned'=>null, 'last_login'=>$this->wib));
		$this->db->where('UserID', $user_id);
		$this->db->update('c_user', $data);
	}
	
	public function get_banned($id, $ip) {
		$tsx = $this->wib;
		$ipb = explode('.', $ip);
		if($ipb[0]==10 || $ipb[0]==127 || $ipb[0]==172 || $ipb[0]==192) {
			$sql = "select 	UserID, banned 
					from 	c_user 
					where 	(UserID = '$id' or ip_address = '$ip') 
					and 	banned is not null 
					and 	banned > $tsx
					limit 	1";
			return rst2Array($sql, 'row');
		}
		else return 0;
	}
	
	public function set_banned($id, $ip, $time) {
		$id  = $this->db->escape(trim($id));
		$time= $time + $this->wib;
		$sql = "update c_user 
				set 	banned  = $time
				where	UserID = $id
				or		ip_address		= '$ip'";
		$this->db->query($sql);
	}
	
	public function set_reset($type, $usr, $arg='') {
		$usr = $this->db->escape(trim($usr));
		switch($type) {
			case 1:
				$sql = "update c_user set passwd = '$arg' where UserID= $usr";
				break;
			case 2:
				$sql = "update c_user set banned = null where UserID= $usr";
				break;
		}
		$this->db->simple_query($sql);
		return 1;
	}
	
	public function set_cpwd($idx, $pwd) {
		$dat = array('passwd'=>$pwd);
		return $this->db->update('c_user', $dat, "UserID = '$idx'");
	}
	
	public function set_out($id) {
		$id  = $this->db->escape(trim($id));
		$sql = "update c_user set logged = 0 where UserID = $id";
		$this->db->query($sql);
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
		$this->db->insert('c_useractivity', $datax);
	}
	
	/*public function get_idx() {
		$sql = "select usex_uid from usys.usex order by usex_uid desc limit 1";
		$rst = rst2Array($sql, 'row');
		return $rst;
	}
	*/
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
	
	function dateBritish($date) {
		$array_hari = array(1=>'Monday','Tuesday','Wednesday','Thursday','Friday', 'Saturday','Sunday');
		$array_bulan = array(1=>'January','February','March', 'April', 'May', 'June','July','August','September','October', 'November','December');
		
		$date  = strtotime($date);
		$hari  = $array_hari[date('N',$date)];
		$tanggal = date ('j', $date);
		$bulan = $array_bulan[date('n',$date)];
		$tahun = date('Y',$date);
		$formatTanggal = $hari.", ".$bulan." ".$tanggal.", ".$tahun;
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