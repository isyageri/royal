<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function my_ip($encrypt=0) {
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
		$ip = getenv("HTTP_CLIENT_IP");
	else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
		$ip = getenv("REMOTE_ADDR");
	else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
		$ip = $_SERVER['REMOTE_ADDR'];
	else {
		$ip = "unknown";
		return $ip;
	}
	return $encrypt ? md5($ip) : $ip;
}

function my_mac() {
	$osx = $this->browser['os'];
	echo $osx;
	$mac = null;
	if(substr($osx, 0, 3)=='win') {
		ob_start();
		system('ipconfig /all');
		$mycom	= ob_get_contents();
		ob_clean();

		$findme = "Physical";
		$pmac	= strpos($mycom, $findme);
		$mac	= substr($mycom,($pmac+36),17);
	}
	else {
		$mac = @system('arp -an');
		if(count(explode('-', $mac))!=6) $mac = null;
	}
	return $mac;
}
?>