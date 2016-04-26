<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$gBulan = array(1=>'Januari', 'Februari', 'Maret',  'April',  'Mei',  'Juni',  'Juli',  'Agustus',  'September',  'Oktober',  'November',  'Desember'); 
$gBln 	= array(1=>'Jan', 'Feb', 'Mar',  'Apr',  'Mei',  'Jun',  'Jul',  'Agt',  'Sep',  'Okt',  'Nov',  'Des'); 
function tgl($arg='') {
	if (empty($arg)) $arg = time();
	mktime(
	
}

// end of file tanggal_helper.php
/* Location: ./application/helper/tanggal_helper.php */