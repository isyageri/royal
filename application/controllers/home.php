<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

function __construct() {
		parent::__construct();
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("If-Modified-Since: Mon, 27 Sep 2013 00:00:00 GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Cache-Control: private");
		header("Pragma: no-cache");

		$this->load->model('mHome');
		$index	= $this->config->item('index_page');
		$corp_name	= $this->config->item('corp_name');
		$host	= $this->config->item('base_url');
		$browser= $this->agent->requirement();
		$browser['ignore'] = $this->session->userdata('ignore_browser', true);
		$this->url	= empty($index) ? $host : $host . $index . '/';
		$this->surl	= str_replace('http', 'https', $this->url);
		$this->auth	= unserialize(base64_decode($this->session->userdata('beta')));
		$this->ipx	= $this->input->ip_address();
		$this->wib	= time();
		$this->limit= 15;
		$this->cur_date = $this->mHome->dateIndonesian(date('d-m-Y'));
		
		$this->smarty->assign('corp_name', $corp_name);
		$this->smarty->assign('browser', $browser);
		$this->smarty->assign('auth', $this->auth);
		$this->smarty->assign('host', $host);
		$this->smarty->assign('url',  $this->url);
		$this->smarty->assign('surl', $this->surl);
		$this->smarty->assign('csrf', $this->security->get_csrf_hash());
		$this->smarty->assign('wib', $this->wib);
		$this->smarty->assign('cur_date', $this->cur_date);
		
	}
	public function index($menu=0)
	{
		
//		$this->smarty->assign("menuHTML",$this->TagMenu());
        $this->smarty->assign('whatweoffer', $this->mHome->GetMenuWhatWeOffer());
		$this->smarty->display("index.tpl");
	}
	
	public function TagMenu()
	{
		$menu = array();
		$menu = $this->mHome->GetMenu();
		$this->smarty->assign("menu",$menu);
		$menuHTML = "";
		$menuHTML = $this->RenderHTMLForMenu($menu, 0, 0, 0);
		return $menuHTML;
	}
	public function tes()
	{
		dump("tes");
	}
	private function RenderHTMLForMenu($menu, $level, $mpid, $pid)
	{
		$html = "<ul id='lv_$level"."_$pid'>";
		foreach($menu as $menu_attr) {
			$isParent = "";
			$child = "";
			if($level==0)
			{
				$mpid = $menu_attr['MenuID'];
			}
			
			if($menu_attr['IsParent']){
				$isParent = "IsParent";
			    $child = $this->RenderHTMLForMenu($menu_attr['child'], $level+1, $mpid, $menu_attr['MenuID']);
			}
			
			$html.= "<li id='mmenu_$menu_attr[MenuID]' class='menu_$mpid menu_$pid $menu_attr[CSSClass] $isParent'>";
			$html.= "<a href='#$menu_attr[Controller]'><div>$menu_attr[Menu]</div></a>";
			$html.= "<div id='desc-mmenu_$menu_attr[MenuID]'>$menu_attr[Description]</div>";
			$html.= $child;
			$html.="</li>";
		}
		$html .= "</ul>";
		return $html;
	}
	
	public function lebok(){
		$this->load->view('jail');
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */