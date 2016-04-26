<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactus extends CI_Controller {

function __construct() {
		parent::__construct();
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("If-Modified-Since: Mon, 27 Sep 2013 00:00:00 GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Cache-Control: private");
		header("Pragma: no-cache");

		$this->load->model('mContactus');
        $this->load->model('mHome');
		$index	= $this->config->item('index_page');
		$this->corp_name	= $this->config->item('corp_name');
		$host	= $this->config->item('base_url');
		$browser= $this->agent->requirement();
		$this->url	= empty($index) ? $host : $host . $index . '/';
		$this->surl	= str_replace('http', 'https', $this->url);
		$this->auth	= unserialize(base64_decode($this->session->userdata('beta')));
		$this->ipx	= $this->input->ip_address();
		$this->wib	= time();
		$this->limit= 15;
		
		$this->smarty->assign('corp_name', $this->corp_name);
		$this->smarty->assign('host', $host);
		$this->smarty->assign('url',  $this->url);
		$this->smarty->assign('surl', $this->surl);
		$this->smarty->assign('wib', $this->wib);
		$this->smarty->assign('content_title', "Contact Us");
		
	}
	
	public function index($menu=0)
	{
        $this->smarty->assign('whatweoffer', $this->mHome->GetMenuWhatWeOffer());
		$this->smarty->assign('contactus', $this->mContactus->GetContactus());
		$this->smarty->display("contactus.tpl");
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */