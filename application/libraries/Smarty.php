<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(HPATH.'/'. APPPATH . 'libraries/smarty/libs/Smarty.class.php' );
class CI_Smarty extends Smarty {
	
	public function __construct() {
		parent::__construct();
		$this->setTemplateDir('__views/');
		$this->setCompileDir('__tmp/');
		//$this->setCacheDir('/web/www.example.com/smarty/cache');
		//$this->setConfigDir('/web/www.example.com/smarty/configs');
	}
}
/* End of file Smarty.php */