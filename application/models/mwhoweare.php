<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}
require_once("class.uuid.php");

class mWhoweare extends CI_Model {
	 
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
	
	public function GetWhoweare() {
		$sql = "SELECT * FROM whoweare ORDER BY WhoWeAreID";
		$dat = rst2Array($sql);
		return $dat;
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