<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CHome extends CI_Controller {

function __construct() {
		parent::__construct();
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("If-Modified-Since: Mon, 27 Sep 2013 00:00:00 GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Cache-Control: private");
		header("Pragma: no-cache");
		Date_default_timezone_set('Asia/Jakarta');
		
		$this->load->model('cmHome');
		$index	= $this->config->item('index_page');
		$corp_name	= $this->config->item('corp_name');
		$host	= $this->config->item('base_url');
		$this->host = $host;
		$browser= $this->agent->requirement();
		$browser['ignore'] = $this->session->userdata('ignore_browser', true);
		$this->url	= empty($index) ? $host : $host . $index . '/';
		$this->surl	= str_replace('http', 'https', $this->url);
		$this->auth	= unserialize(base64_decode($this->session->userdata('beta')));
		
		$this->ipx	= $this->input->ip_address();
		$this->wib	= time();
		$this->limit= 15;
		//$d = new DateTime('', new DateTimeZone('Europe/Riga')); 
		//echo date('Y-m-d H:i:s',$this->wib);
		$this->cur_date = $this->cmHome->dateIndonesian(date('d-m-Y',$this->wib));
		
		$this->smarty->assign('corp_name', $corp_name);
		$this->smarty->assign('browser', $browser);
		$this->smarty->assign('auth', $this->auth);
		$this->smarty->assign('host', $host);
		$this->smarty->assign('url',  $this->url);
		$this->smarty->assign('surl', $this->surl);
		$this->smarty->assign('csrf', $this->security->get_csrf_hash());
		$this->smarty->assign('wib', $this->wib);
		$this->smarty->assign('cur_date', $this->cur_date);
		
		$this->smarty->assign('msg_login',  $this->session->flashdata('msg_login'));
		$this->smarty->assign('msg_forget', $this->session->flashdata('msg_forget'));
		$this->smarty->assign('mmenu', $this->cmHome->GetMenu());
		
		
	}
	
	
	public function index($menu=0)
	{
		
		//$this->smarty->assign("menuHTML",$this->TagMenu());
		$this->smarty->display("index.tpl");
	}
	
	public function TagMenu()
	{
		$menu = array();
		$menu = $this->cmHome->GetMenu();
		$this->smarty->assign("menu",$menu);
		$menuHTML = "";
		$menuHTML = $this->RenderHTMLForMenu($menu, 0, 0, 0);
		return $menuHTML;
	}
	public function o($idx=null, $ivx=null) {
		if($idx) {
			$idx = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->config->item('encryption_key'), pack("H*", $idx), MCRYPT_MODE_CBC, pack("H*", $ivx));
		}
		else {
			$sss = unserialize(base64_decode($this->session->userdata('beta')));
			$idx = $sss['UserID'];
		}
		$this->session->unset_userdata('beta');
		$this->session->sess_destroy();
		$this->cmHome->set_out($idx);
	}
	public function page($menu=100, $prop='', $arg3='') {
	    
		if(!$this->auth) {
			$this->session->set_flashdata('msg_login', $this->session->flashdata('msg_login'));
			if($this->input->is_ajax_request()){ $this->o(); echo "expired";}
			else{ header("Location: $this->url"."index.php/chome/Login");}
		}
		else {
		    //$this->smarty->assign("menuHTML",$this->TagMenu());
			$post = array();
			
			$datx = array();
			$ext  = '';
			$xls  = 0;
			$page = 'index';
			if($prop=='search' || $prop=='reload' || $prop=='nav'|| $prop=='extra') $ext = '_dat';
		    
			if($prop=='xls') {
				$post['xls'] = true;
				$xls = 1;
			}
			if($this->input->post()) {
				$post = array_merge($post, $this->input->post());
			}
			$this->smarty->assign('xls', $xls);
			$this->smarty->assign('menu', $menu);
			$this->smarty->assign('post', $post);
			
			$this->smarty->assign('access', $this->cmHome->get_privilege($this->auth['AccountTypeID'], $menu));
           
			
			switch($menu) {
				case 100:
				case 101:
					$this->smarty->assign("Account", $this->cmHome->reff("Account",array("UserID"=>$this->auth["UserID"])));
					break;
			    case 104:
				case 105:
					$this->smarty->assign("Country", $this->cmHome->reff("Country"));
				break;
				case 103:
				case 106:
				//$this->smarty->assign("EmployeeStatus", $this->cmHome->reff("EmployeeStatus"));
				//$this->smarty->assign("NatureOfBusiness", $this->cmHome->reff("NatureOfBusiness"));
				//$this->smarty->assign("PositionRef", $this->cmHome->reff("PositionRef"));
				//$this->smarty->assign("SourceOfIncome", $this->cmHome->reff("SourceOfIncome"));
				//$this->smarty->assign("AnnualIncomeRef", $this->cmHome->reff("AnnualIncomeRef"));
				//$this->smarty->assign("LiabilitasRef", $this->cmHome->reff("LiabilitasRef"));
				//$this->smarty->assign("AssetMinLiabilitasRef", $this->cmHome->reff("AssetMinLiabilitasRef"));
					$this->smarty->assign("IdentificationType", $this->cmHome->reff("IdentificationType"));
				
				break;
				case 107:
					$this->smarty->assign("SecurityQuestion", $this->cmHome->reff("SecurityQuestion"));
				break;
				case 201:
					$this->smarty->assign("CorpBank", $this->cmHome->reff("CorpBank"));
				break;
				
				case 301:
					$this->smarty->assign("AccountType", $this->cmHome->reff("AccountType"));
					$this->smarty->assign("IdentificationType", $this->cmHome->reff("IdentificationType"));
					$this->smarty->assign("Country", $this->cmHome->reff("Country"));
					$this->smarty->assign("Currency", $this->cmHome->reff("Currency"));
		
				break;
			}
			switch($menu) {
				case 100:
					$datx = $this->cmHome->select(101, $post);
					$this->smarty->assign('menu', 101);
					$this->smarty->assign('datx', $datx);
					$this->nav($datx['tot']);
					$this->smarty->assign('page',  'index');
					$this->smarty->assign('cmenu', $menu);
					break;
				case 200:
				case 300:
				case 400:
				    $this->smarty->assign('page',  'index');
					$this->smarty->assign('cmenu', $menu);
					break;
				case 101:
				case 102:
				case 103:
				case 104:    
				case 105:
				case 106:
				case 107:
					$page = 100;
					$datx = $this->cmHome->select($menu, $post);
					break;
				case 201:
				case 202:
				case 203:
					$page = 200;
					$datx = $this->cmHome->select($menu, $post);
					break;
				case 301:
					$page = 300;
					$datx = $this->cmHome->select($menu, $post);
					break;
				case 401:
					$page = 400;
					$datx = $this->cmHome->select($menu, $post);
					break;
				case 801:
					$page = 800;
					$datx = $this->cmHome->select($menu, $post);
					break;
			}
			if(isset($post['iDisplayLength']) || isset($post['iDisplayStart'])) {
				$qtot = $datx['tot'];
				$ttot = count($datx['dat']);
				$out = '{';
				$out .= '"sEcho": '.intval($post['sEcho']).', ';
				$out .= '"iTotalRecords": '.$ttot.', ';
				$out .= '"iTotalDisplayRecords": '.$qtot.', ';
				$out .= '"aaData": [ ';
				if(isset($datx['dat']) && $datx['dat']) {
					foreach($datx['dat'] as $k=>$row) {
						$out .= "[";
						foreach($row as $i=>$v) {
							$out .= '"' . str_replace('"', '\"', $v) .'",';
						}
						$out = substr_replace( $out, "", -1 );
						$out .= "],";
					}
				}
				$out = substr_replace( $out, "", -1 );
				$out .= '] }';
				echo $out;
			}
			else {
				if($prop=='xls') {
					header("Content-type: application/vnd.ms-excel");
					header("Content-type: application/x-msexcel");
					header("Content-type: application/x-msdownload");
					header("Content-disposition: attachment; filename=rpt-$menu.xls");
				}
				
				if($page=='index') 
				{
					$this->smarty->display("client/index.tpl");
				}
				else 
				{
					$this->smarty->assign('datx', $datx);
					$this->nav($datx['tot']);
					$this->smarty->display("client/$page/page_$menu$ext.tpl");
				}
			}
		}
	}
	
	private function nav($tot)
	{
		$nav = array();
		$nav["TotalRows"] = $tot;
		$nav["CurrentPage"] = $this->input->post('page') ? $this->input->post('page') : 1;
		$nav["MaxPagingNumber"] = 10;
		$nav["TotalRowsOnPage"] = 10;
		$nav["TotalPage"] = ceil($nav["TotalRows"] / $nav["TotalRowsOnPage"]);
		
		$nav["StartPageNumber"] = $nav["CurrentPage"] <= 3 ? 1 : ($nav["CurrentPage"] - 3);
		
        $nav["EndPageNumber"] = $nav["StartPageNumber"] + $nav["MaxPagingNumber"];
        $nav["EndPageNumber"] = $nav["EndPageNumber"] > $nav["TotalPage"] ? $nav["TotalPage"] : $nav["EndPageNumber"];

        $nav["IsPrev"] = $nav["StartPageNumber"] == 1 ? false : true;
        $nav["IsNext"] = $nav["EndPageNumber"] == $nav["TotalPage"] ? false : true;
		$nav['pages'][$nav["StartPageNumber"]] = $nav["StartPageNumber"];
		
		for ($i = $nav["StartPageNumber"]; $i <= $nav["EndPageNumber"]; $i++) {
			$nav['pages'][$i] = $i;
		}
		
		$this->smarty->assign('nav', $nav);
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
	
	public function RegisterAccountType()
	{
		$this->smarty->assign("Country", $this->cmHome->reff("Country"));
		$this->smarty->assign("AccountType", $this->cmHome->reff("AccountType"));
		$this->smarty->assign("Currency", $this->cmHome->reff("Currency"));
		
		$this->smarty->display("auth/registerAccountType.tpl");
	}
	
	public function forgot()
	{
		if(!$this->auth) {
			$this->smarty->display("auth/forgot.tpl");
		}
		else
		{
			header("Location: $this->url"."index.php/chome/page");
		}
	}
	
	public function processForgot()
	{
		$email = $this->input->post('email');
		$evid = UUID::generate(UUID::UUID_TIME, UUID::FMT_STRING, "abcdef");
		$ac = $this->cmHome->GetAccountByEmail($email);
		if(isset($ac) && !empty($ac)) 
		{
			$this->cmHome->UpdateForgotReqID($ac["AccountID"], $evid);
			$acID = $ac["AccountID"];
			$to = $email;
			$subject = 'Changes Password';
			$sender = 'Admin RIB';
			$sender_name = 'Royal Investment Business';
			$msg = 
			"<br><br>	
				Thank you for using the 'RoyalInvestment' account maintenance portal.<br>
				Folow the link to process your request to reset your password.<br><br>

				Link:<br>
				$this->url"."index.php/chome/ResetPasswd/$acID/$evid/
				
				<br>
				<br>
				Kindest regards,<br>
				The Royal Investment And Bussines<br>
			";
			$this->send_email($to, $msg, $subject, $sender, $sender_name);
			$this->smarty->assign("message", "Please check your email for next step to reset your password.");
			$this->smarty->display("auth/forgot_message.tpl");
			
		}
		else
		{
			$this->smarty->assign("message", "Sorry, email is not valid. No account use $email .");
			$this->smarty->display("auth/forgot_message.tpl");
		}
	}
	
	public function ResetPasswd($accountID, $reqID)
	{
		$accountReqID = $this->cmHome->CheckReqID($accountID, $reqID);
		if(isset($accountReqID) && !empty($accountReqID)) 
		{
			$ac = $this->cmHome->GetAccountByAccountID($accountID);
			$this->cmHome->UpdateForgotReqID($ac["AccountID"], "~");
			$pass = mt_rand();//'RInv3stment';
			$passwd = $this->encrypt->encode($pass);
			$this->cmHome->ResetPasswd($accountID, $passwd);
			
			$to = $ac["Email"];
			$subject = 'Changes Password';
			$sender = 'Admin RIB';
			$sender_name = 'Royal Investment Business';
			$msg = 
			"<br><br>	
				Thank you for using the 'RoyalInvestment' account maintenance portal.<br>
				Your new username and password are :

				Username : $ac[UserID]<br>
				Password : $pass
				
				<br>
				<br>
				Kindest regards,<br>
				The Royal Investment And Bussines<br>
			";
			$this->send_email($to, $msg, $subject, $sender, $sender_name);
			$this->smarty->assign("message", "Successful. Your new password has been sent to your email.");
			$this->smarty->display("auth/forgot_message.tpl");
		}
		else
		{
			$this->smarty->assign("message", "Sorry, your link is not valid.");
			$this->smarty->display("auth/forgot_message.tpl");
		}
	}
	
	public function Login()
	{
		if(!$this->auth) {
			$this->smarty->display("auth/login.tpl");
		}
		else
		{
			header("Location: $this->url"."index.php/chome/page");
		}
	}
	
	public function RegisterForm()
	{
		$post = array();
		$this->post($post);
		$user_reg = $post;
		
		$message = array();
		if(isset($user_reg["CountryID"]) && isset($user_reg["CurrencyID"]) && isset($user_reg["AccountTypeID"]))
		{
			$message["status"] = "success";
			$message["action"] = "redirect";
			$message["url"] = "#chome/RegForm";
			$this->session->set_flashdata('user_reg', $user_reg);
		}
		else
		{
			$message["status"] = "failed";
			$message["message"] = "All data is required.";
		}
		echo json_encode($message);
		
	}
	
	public function RegForm()
	{
		$user_reg	= $this->session->flashdata('user_reg');
		if(isset($user_reg["CountryID"]) && isset($user_reg["CurrencyID"]) && isset($user_reg["AccountTypeID"]))
		{
			$this->smarty->assign("user", $user_reg);
			$this->smarty->assign("Country", $this->cmHome->reff("Country"));
			$this->smarty->assign("AccountTitleRef", $this->cmHome->reff("AccountTitleRef"));
			$this->smarty->assign("Citizenship", $this->cmHome->reff("Citizenship"));
			$this->smarty->assign("IdentificationType", $this->cmHome->reff("IdentificationType"));
			$this->smarty->assign("SecurityQuestion", $this->cmHome->reff("SecurityQuestion"));
			
			$this->smarty->display("auth/register.tpl");
		}
		else
		{
			$this->RegisterAccountType();
		}
		
	}
	
	public function reg($menu=998)
	{
		$post = array();
		$this->post($post);
		$post["lastupdated"] = $this->wib;
		$post["operator"] = "registration system";
		$message = array();
		//dump($post);
		if($menu == 998)
		{
			$captcha = $post['ct_captcha'];
			//dump(dirname(BASEPATH) . '/__assets/lib/securimage/securimage.php');
			require_once dirname(BASEPATH) . '/__assets/lib/securimage/securimage.php';
			
            $securimage = new Securimage();

            if ($securimage->check($captcha) == false) {
                $message["action"] = "notify";
				$message["status"] = "failed";
				$message["message"] =  "Incorrect security code entered";
				die(json_encode($message));
            }
			unset($post['ct_captcha']);
		}
		
		$ack = $this->cmHome->crud(998, "add", $post);
		if($ack["status"]==1)
		{
			switch($menu)
			{
				case 998:
					$message["message"] = "Thank you, Your registration is successful. We will verify your data and send your UserID and Password via email in 1-3days. ";
					$message["url"] = "#chome/Login";
					$message["AccountID"] = $ack["AccountID"];
					
				break;
				case 301:
					$message["message"] = "Congratulation, You have successfully refer new account. He/She will be your downline after He/She complete the registration. 
											We will verify your downline data and send the UserID and Password via email in 1-3days.";
					$message["url"] = "#chome/page/$menu";
					$message["target"] = '#wf-container';
				break;
			}
			
			$message["status"] = "success";
			$message["action"] = "notify";
					
			
		}
		else
		{
			$message["action"] = "notify";
			$message["status"] = "failed";
			$message["message"] = "We are sorry, something wrong with our system. Please try again.";
		}
		
        echo json_encode($message);
		
	}
	
	public function UploadDoc()
	{
			$post = array();
			$this->post($post);
			//dump($post);
			$message = array();
			$path = "uploads/IDDoc/";
			if (!file_exists($path)) {
				mkdir($path, 0777, true);
			}
			$valid_formats = array("png","jpg","jpeg","PNG","JPG","JPEG");
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
			{
				$name = $_FILES['IdentificationDoc']['name'];
				
				if(strlen($name))
					{
						list($txt, $ext) = explode(".", $name);
						if(in_array($ext,$valid_formats))
						{
							 
							$actual_file_name = $post["AccountID"] . time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['IdentificationDoc']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_file_name))
							{
									
								$inputFileName = $path.$actual_file_name;
								$post["lastupdated"] = $this->wib;
								$post["operator"] = "registration system";
								$post["IdentificationDoc"] = $inputFileName;
								
								$ack = $this->cmHome->crud(101, "upd", $post);
							
								
								//$ack = $this->mImport_sitac->import($datx);
								
								if($ack==1)
								{
									$message["status"] = "success";
									$message["action"] = "notify";
									$message["message"] = "Thank you, Your registration is successful. We will verify your data and send your UserID and Password via email in 1-3days. ";
									$message["url"] = "#chome/Login";											
								}
								else
								{
									$message["action"] = "notify";
									$message["status"] = "failed";
									$message["message"] = "We are sorry, something wrong with our system. Please try again.";
								}								
									
								//unlink($inputFileName);
							}
							else
							{
								$message["action"] = "notify";
								$message["status"] = "failed";
								$message["message"] = "Failed to upload identification document!";
							}
						}	
						else
						{
							$message["action"] = "notify";
							$message["status"] = "failed";
							$message["message"] = "Invalid file format.. Identification document file must be in (jpg/png) format.";
						}	
					
					}
			
				else
				{
					$message["action"] = "notify";
					$message["status"] = "failed";
					$message["message"] = "No file selected for identification document..!";
				}
		
			}
		
		echo json_encode($message);
		
		// $files = array();
		// $this->files($files);
		// dump($_FILES);
	}
	
	private function post(&$post) {
		unset($_POST['ts'], $_POST['csrf_token']);
		foreach($_POST as $k=>$v) {
			if(!empty($v)){
				$post[$k] = $v;
			}
			//$post[strtolower($k)] = $this->input->post($k);
		}
	}
	
	private function files(&$file) {
		foreach($_FILES as $k=>$v) {
			if(!empty($v)){
				$file[$k] = $v;
			}
			//$post[strtolower($k)] = $this->input->post($k);
		}
	}
	
	public function confirm($menu,$arg=null)
	{
		$post = array();
		$param = array();
		$message = array();
		$this->post($post);
		
		switch($menu)
		{
			case 202:
				$param["UserID"] = $post["DestinationAccount"];
				$destUser = $this->cmHome->reff("Account",$param);
				$message["form"] = "#f$menu";
				
				if(!isset($destUser) || empty($destUser))
				{
					$message["status"] = "failed";
					$message["message"] = "Fail to submit data. "."Account $post[DestinationAccount] doesn't exist. Please input an active account for destination account.";
				}
				else
				{
					$message["status"] = "success";
					$message["action"] = "confirm";
					$message["message"] = "You want to tranfer to account
											AccountID : $post[DestinationAccount]
											Name      : $destUser[FirstName] $destUser[MiddleName] $destUser[LastName] ";
					$message["url"] = "#chome/crud/f$menu";
					
				}
				
				
			break;
			case 201:
				if(isset($arg))
				{
					if($arg="bankinfo")
					{
						if(isset($post["BankDestinationID"]) && !empty($post["BankDestinationID"]))
						{
							$corpBank = $this->cmHome->reff("CorpBank",Array("CorpBankID"=> $post["BankDestinationID"]));
							$message["status"] = "success";
							$message["action"] = "info";
							$message["title"] = "Royal Investment's Bank";
							
							if(isset($corpBank)&& !empty($corpBank))
							{
								$bank = $corpBank[0];
								$message["message"] = "Please verify your destination bank 
														Bank Account : $bank[BankAccount]
														Name         : $bank[BankAccountName] 
														Bank Name    : $bank[BankName]
														Swift        : $bank[BankSwift]
														Country      : $bank[BankCountry]
														City         : $bank[BankCity]
														Address		 : $bank[BankAddress]
														Zipcode		 : $bank[Bankzipcode]
														Telephone	 : $bank[BankPhone]";
							
							}
						}
						else
						{
							$message["status"] = "warning";
							$message["message"] = "Please select bank.";
						}
						
					}
				}
				
					
			break;
			case 203:
				$wdType = $post["WithdrawType"] == "1" ? "Deposit" : "Bonus";
				$wd = isset($post["Withdraw"]) ? "$".$post["Withdraw"] : "";
				$message["message"] = "Are you sure? You want to withdraw $wdType $wd?";
				$message["status"] = "success";
				$message["action"] = "confirm";
				$message["url"] = "#chome/crud/f$menu";
				
				$curdate = date("Y-m-d", $this->wib);
				
				$period = $this->cmHome->getPeriod($curdate, $this->auth);
				$accountType = $this->cmHome->reff("AccountTypeByAccountID", array("AccountID"=>$this->auth["AccountID"]));
				
				if($post["WithdrawType"] == 1 && isset($period["DepRunningWD"]) && !empty($period["DepRunningWD"]))
				{
					if($period["DepRunningWD"]==1)
					{
						$message["message"] = "Are you sure? You want to withdraw your deposit in running period. We will charge you a fee of $accountType[WDDepositFeeRate]% of your balance. We will send you a confirmation email and you should confirm it by reply our email.";
					}
				}

				if($post["WithdrawType"] == 1 && isset($period["DepEndWD"]) && !empty($period["DepEndWD"]))
				{
					if($period["DepEndWD"]==1)
					{
						$message["status"] = "failed";
						$message["message"] = "Sorry, End of period withdraw time is over. You should request your withdraw before $period[DepEndDateWD].";
					}
				}
				
				
			break;
		}
		
		echo json_encode($message);
	}
	
	public function crud($tbl, $act='add', $idx=0) {
		$post	= array('lastupdated' => $this->wib, 'operator' => $this->auth['UserID']);
		$tbl	= (int)str_replace('f', '', $tbl);
		$this->post($post);
		if($act=='add' && $tbl==999) {
			$passwd = 'RInv3stment';
			$post['passwd'] = $this->encrypt->encode($passwd);	
		}
		
		$ack = $this->cmHome->crud($tbl, $act, $post);
		$message = array();
		if($ack==1)
		{
			switch($tbl)
			{
				case 104:
					$message["status"] = "success";
					$message["action"] = "notify";
					$message["message"] = "Thank you, Your data has been submitted. ";
					$message["url"] = "#chome/page/$tbl";
					$message["target"] = '#wf-container';
					if($act=="upd")
					{
						$message["message"] = "Thank you, Your data has been updated. ";
					}
					$account  = $this->cmHome->getAccount($this->auth["UserID"]);
					$to = $account["Email"];
					$subject = 'Contact Informatin Changes';
					$sender = 'Admin RIB';
					$sender_name = 'Royal Investment Business';
					$msg = 
					"<br><br>	
						Thank you for using the 'RoyalInvestment' account maintenance portal.<br>
						Your request has been processed.<br><br>

						New Contact Details:<br>
						-------------------------------<br>
						Address : $account[Address]<br>
						City: $account[City]<br>
						Province: $account[Province]<br>
						Zip/Postal Code: $account[Zipcode]<br>
						Country: $account[CountryName]<br>
						Telephone: $account[Phone]<br>
						Mobile Phone: $account[MobilePhone]<br>
						Email Address: $account[Email]<br><br>

						If you did not update your contact information (as listed above), please contact our Operations department immediately via email at admin@rib.company<br>
						<br>
						Kindest regards,<br>
						The Royal Investment And Bussines<br>
					";
					$this->send_email($to, $msg, $subject, $sender, $sender_name);
				break;
				case 105:
					$message["status"] = "success";
					$message["action"] = "notify";
					$message["message"] = "Thank you, Your data has been submitted. ";
					$message["url"] = "#chome/page/$tbl";
					$message["target"] = '#wf-container';
					if($act=="upd")
					{
						$message["message"] = "Thank you, Your data has been updated. ";
					}
					
					$account  = $this->cmHome->getAccount($this->auth["UserID"]);
					$to = $account["Email"];
					$subject = 'Banking Data Changes';
					$sender = 'Admin RIB';
					$sender_name = 'Royal Investment Business';
					$msg = "<br><br>
					Thank you for using the account maintenance portal.<br>
					You are receiving this e-mail because you have completed one of the following steps in your 'Royal Investment' account maintenance portal:<br>
					<br>
						· Updated your banking information under the Account Information section<br>
						· Updated your banking information in order to withdraw funds<br>
					<br>
					If you did not update your banking information (as listed above), please contact our Operations department immediately via email at admin@rib.company<br>
					<br>
					Kindest regards,<br>
					The Royal Investment And Bussines<br>
					";
					$this->send_email($to, $msg, $subject, $sender, $sender_name);
				break;
				
				case 201:
					if($act=="upd")
					{
						$message["status"] = "success";
						$message["action"] = "upload";
						$message["url"] = "#chome/uploadDepEvidence";
					}
					else
					{
						$message["status"] = "success";
						$message["action"] = "upload";
						$message["url"] = "#chome/uploadDepEvidence";
						/*$message["action"] = "notify";
						$message["message"] = "Thank you, Your data has been submitted. ";
						$message["url"] = "#chome/page/$tbl";
						$message["target"] = '#wf-container';
						*/
						
						
						$userID = $this->auth["UserID"];
						$account  = $this->cmHome->getAccount($this->auth["UserID"]);
						$dep = $this->cmHome->getLastDeposit($post);
						$to = $account["Email"];
						$subject = 'Deposit';
						$sender = 'Admin RIB';
						$sender_name = 'Royal Investment Business';
						$msg = "<br><br>
						Dear $account[FirstName] $account[MiddleName] $account[LastName],<br><br>

						Processing of deposit requests will generally be initiated within 2 business days of receipt.<br>
						The details of the request appear below. We recommend that you keep a copy of this email for your records.<br><br>

						Transaction<br>
						Status: On Processing<br>
						Date/Time: $dep[DepositDate]<br><br>

						deposit to:<br><br>

						Account ID: $userID<br>
						account name: $account[FirstName] $account[MiddleName] $account[LastName]<br>
						Amount: $dep[Deposit]<br>
						<br>
						Kindest regards,<br>
						The Royal Investment And Bussines<br>
						";
						
						$this->send_email($to, $msg, $subject, $sender, $sender_name);
					}
					
				break;
				case 203:
					$message["status"] = "success";
					$message["action"] = "notify";
					$message["message"] = "Thank you, Your data has been submitted. ";
					$message["url"] = "#chome/page/$tbl";
					$message["target"] = '#wf-container';
					if($act=="upd")
					{
						$message["message"] = "Thank you, Your data has been updated. ";
					}
					
					if($act!="upd"){
						
						$account  = $this->cmHome->getAccount($this->auth["UserID"]);
						$userID = $this->auth["UserID"];
						$wd = $this->cmHome->getLastWD($post);
							$to = $account["Email"];
							$subject = 'Withdraw Balance';
							$sender = 'Admin RIB';
							$sender_name = 'Royal Investment Business';
							$msg = "<br><br>
							Dear $account[FirstName] $account[MiddleName] $account[LastName],<br><br>

						Your withdrawal request has been received and will be withdrawn from Royal Investment Account pending final approval.<br>
						Processing of withdrawal requests will generally be initiated within 2 business days of receipt.<br>
						The details of the request appear below. We recommend that you keep a copy of this email for your records.<br><br>

						Status: On Processing
						Date/Time: $wd[WithdrawDate]
						Account ID: $userID
						Pay to: $account[FirstName] $account[MiddleName] $account[LastName]
						Amount: $wd[Withdraw]
							<br>
						Kindest regards,<br>
						The Royal Investment And Bussines<br>";
						$this->send_email($to, $msg, $subject, $sender, $sender_name);
					}
					
				break;
				default:
					if($ack)
					{
						$message["status"] = "success";
						$message["action"] = "notify";
						$message["message"] = "Thank you, Your data has been submitted. ";
						$message["url"] = "#chome/page/$tbl";
						$message["target"] = '#wf-container';
						if($act=="upd")
						{
							$message["message"] = "Thank you, Your data has been updated. ";
						}
					}
					else
					{
						$message["status"] = "failed";
						$message["message"] = $ack;
						
					}
				break;
			}
		}
		else
		{
			$message["status"] = "failed";
			$message["message"] = "Fail to submit data. ".$ack;
			
		}
		
		
		echo json_encode($message);
	}
	public function uploadDepEvidence()
	{
		$post = array();
			$this->post($post);
			//dump($post);
			$message = array();
			$path = "uploads/DepositDoc/".$this->auth['UserID']."/";
			if (!file_exists($path)) {
				mkdir($path, 0777, true);
			}
			$valid_formats = array("png","jpg","jpeg","PNG","JPG","JPEG");
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
			{
				$name = $_FILES['TransferEvidence']['name'];
				
				if(strlen($name))
					{
						list($txt, $ext) = explode(".", $name);
						if(in_array($ext,$valid_formats))
						{
							 
							$actual_file_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['TransferEvidence']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_file_name))
							{
									
								$inputFileName = $path.$actual_file_name;
								$post["lastupdated"] = $this->wib;
								$post["operator"] = "upload deposit evidence";
								$post["TransferEvidence"] = $inputFileName;
								$post["DepositStatus"] = 1;
								$dep = $this->cmHome->getLastDeposit($post);
								$post["DepositID"] = $dep["DepositID"];
								$ack = $this->cmHome->crud(201, "upd", $post);
								//$ack = $this->mImport_sitac->import($datx);
								if($ack==1)
								{
									$message["status"] = "success";
									$message["action"] = "notify";
									//$message["message"] = "Thank you, We have received your confirmation. We will verify your data max in 3days.";
									$message["message"] = "Thank you, Your data has been submitted. We will verify your data max in 3days.";
									$message["url"] = "#chome/page/201";
									$message["target"] = '#wf-container';											
								}
								else
								{
									$message["action"] = "notify";
									$message["status"] = "failed";
									$message["message"] = "We are sorry, something wrong with our system. Please try again.";
								}								
									
								//unlink($inputFileName);
							}
							else
							{
								$message["action"] = "notify";
								$message["status"] = "failed";
								$message["message"] = "Failed to upload your transfer evidence document!";
							}
						}	
						else
						{
							$message["action"] = "notify";
							$message["status"] = "failed";
							$message["message"] = "Invalid file format.. transfer evidence document file must be in (jpg/png) format.";
						}	
					
					}
			
				else
				{
					$message["action"] = "notify";
					$message["status"] = "failed";
					$message["message"] = "No file selected for transfer evidence document..!";
				}
		
			}
		
		echo json_encode($message);
	}
	
	public function send_email($to, $message, $subject, $sender, $sender_name){
        //Sent to Email Username & Password
        $email_config = Array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => '465',
            'smtp_user' => 'admin@rib.company',
            'smtp_pass' => 'gACGf643',
            'mailtype'  => 'html',
            'starttls'  => true,
            'newline'   => "\r\n"
        );

        # load email library
        $this->load->library("email",$email_config);

        $this->email->from($sender,$sender_name);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        //echo $this->email->print_debugger();
        $this->email->send();
    }
	
	public function logintes()
	{
		$ack = $this->cmHome->get_user("rib1901");
		$this->session->set_userdata('beta', base64_encode(serialize($ack)));
		header("Location: $this->url"."index.php/chome/page/");
	}
	
	public function tes()
	{
		echo date('Y-m-d',$this->wib);
		echo date("Y-m-d", strtotime("-1 month", $this->wib));
		//echo mt_rand();
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */