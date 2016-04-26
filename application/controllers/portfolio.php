<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portfolio extends CI_Controller {

function __construct() {
		parent::__construct();
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("If-Modified-Since: Mon, 27 Sep 2013 00:00:00 GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Cache-Control: private");
		header("Pragma: no-cache");

		$this->load->model('mPortfolio');
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
		$this->smarty->assign('content_title', "Portfolio");
		
	}
	
	public function index($menu=0)
	{
        $this->smarty->assign('whatweoffer', $this->mHome->GetMenuWhatWeOffer());
		$this->smarty->assign('sector', $this->mPortfolio->SectorAllocation());
		$this->smarty->assign('portfolio', $this->mPortfolio->GetPortfolio());
		$this->smarty->display("portfolio.tpl");
	}
	
	public function GetSectorIndustryData()
	{
		header('Content-Type: application/json');
		
		
		
		
		$chartData = array();
		// $chartData["type"] = "pie2d";
		// $chartData["renderAt"] = "chartContainer";
		// $chartData["width"] = "450";
		// $chartData["height"] = "450";
		// $chartData["dataFormat"] = "json";
		// $chartData["type"] = "pie2d";
		// $chartData["type"] = "pie2d";
		// $chartData["type"] = "pie2d";
		
		// $dataSource = array();
		// $dataSource["chart"] = array( 
								// "caption"     => "Our Investment Sector",
								// "subCaption"  => $this->corp_name,
								// "xAxisName"   => "Sector",
								// "yAxisName"   => "Percentage",
								// "theme"       => "zune");
								
		 $dataSource["data"] = $this->mPortfolio->SectorAllocation();
		
		// $chartData["dataSource"] = $dataSource;
		
		$chartData["chart"] = array("plotBackgroundColor"=> null,"plotBorderWidth" => 0,"plotBackgroundColor"=> null);
		$chartData["title"] = array( "text"     => "Our Investment Sector");
		$chartData["tooltip"] = array( "pointFormat"     => "{series.name}: <b>{point.percentage:.1f}%</b>");
		$chartData["plotOptions"] = array( "pie"     => array("allowPointSelect"=> true,
                "cursor"=> "pointer",
                "dataLabels"=>array("enabled"=> false,
                    "format"=> "<b>{point.name}</b>: {point.percentage:.1f} %",
                    "style"=>array("color"=> "black"))));
		
		$value = array();
		
		foreach($dataSource["data"] as $k=>$v) {
			array_push($value, array("$v[label]",(float)$v["value"]));
		}
        $chartData["series"] = array(array("type"=>"pie","name"=>"Investation","data"=>$value));
		
		echo json_encode($chartData);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */