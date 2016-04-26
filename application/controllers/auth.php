<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

function __construct() {
		parent::__construct();
		Date_default_timezone_set('Asia/Jakarta');
		$this->load->model('mAuth');
		$index			= $this->config->item('index_page');
		$host			= $this->config->item('base_url');
		$session_id 	= unserialize($this->encrypt->decode(get_cookie('ci_session')));
		$this->browser	= $this->agent->requirement();
		$this->url		= empty($index) ? $host : $host . $index . '/';
		$this->wib 		= time();
		$this->tamu		= array('ip_address'=>$this->input->ip_address(), 'browser'=>$this->browser['name'], 'session_id'=>$session_id['session_id']);
		$corp_name	= $this->config->item('corp_name');
		
		$this->smarty->assign('host', $host);
		$this->smarty->assign('corp_name', $corp_name);
	}
	
	public function index($menu=0)
	{	
		
	}
	
	public function l() {
	
		//if($this->uri->total_segments()>2) {
		//	show_404($this->uri->uri_string());
		//}
		//else {
			//die($this->encrypt->encode('12345'));
			//die($this->encrypt->decode('99BCycNbe75cuhAR2rTwQOIMgV0pYDtxfINxcHwnDflYI2GhOnJuezLHqH4awoclPsrqZnhBKCtazBiSUS7eiQ=='));
			
		
			$usr = $this->input->post('userid');
			$pwd = $this->input->post('passwd').'=';
			$ipx = $this->tamu['ip_address'];
			$msg = "Your login/password combination doesn't match!";
			$this->session->unset_userdata('beta');
			
			
			if($usr && $pwd) {
				$ipx = $this->tamu['ip_address'];
				$ack = $this->mAuth->get_user($usr);
				$bdt = $this->mAuth->get_banned($usr, $ipx);
				if(empty($ack)||!isset($ack))
				{
					$msg = "Your account doesn't exist or has not been activated.";
				}
				else
				{
					if($bdt) {
					$usx = $usr==$bdt['UserID'] ? "User $usr dan/atau " : '';
					$msg = "$usx IP $ipx was banned until ".date('d-m-Y H:i:s', $bdt['banned']);
					}
					else {
						$pwx = base64_encode(hash_hmac('sha256', $this->encrypt->decode($ack['passwd']), $this->security->get_csrf_hash(), true));

						if($ack && $pwd==$pwx) {
							unset($ack['passwd']);
							$buf = array('ip_address'=>$ack['ip_address'], 'browser'=>$ack['browser'], 'session_id'=>$ack['session_id']);
							if (!$ack['logged'] || ($ack['logged'] && $ack['idle']>0)) {
								$msg = null;
								$this->mAuth->set_logged($ack['UserID'], $this->tamu);
								
								$this->mAuth->set_activity(array('UserID'=>$usr,
																'activity'=>'Login',
																'url'=>$this->uri->uri_string(),
																'ip_address'=>$ipx,
																'activity_desc'=>"User $usr login",
																'remark'=>'success'));
								$this->session->set_userdata('beta', base64_encode(serialize($ack)));
							 }
							 elseif ($ack['logged'] && $ack['idle']<0) {
								 $ack['idle'] *= -1;
								 $msg = "Sorry, your login session is still valid.<br />
									 Your login session will be over in ". floor($ack['idle']/60) .' minutes ' . $ack['idle']%60 . ' seconds';
								
								 $this->mAuth->set_activity(array('UserID'=>$usr, 'activity'=>'login', 'url'=>$this->uri->uri_string(), 'ip_address'=>$ipx, 'remark'=>"failed: session login still live @IP=$ipx"));
								  
							 }
							 elseif ($ack['logged'] && $buf!=$this->tamu) {
								$msg = "Sorry, your login session is still valid.<br />
									 Your login session was used on IP $ipx";
								$this->mAuth->set_activity(array('UserID'=>$usr, 'activity'=>'login', 'url'=>$this->uri->uri_string(), 'ip_address'=>$ipx, 'remark'=>"failed: session login still live @IP=$ipx"));
							 }
							 else {
								 $msg = "Sorry, your login is locked.<br />
									 Please contact our administrator.";
								 $this->mAuth->set_activity(array('UserID'=>$usr, 'activity'=>'login', 'url'=>$this->uri->uri_string(), 'ip_address'=>$ipx, 'remark'=>"failed: locked"));
							 }
							
							}
							else {
								$failed = $this->session->userdata('failed');
								$failed = $failed ? $failed : 0;
								//dump($failed);
								$this->session->set_userdata('failed', ++$failed);
								$this->mAuth->set_activity(array('UserID'=>$usr, 'activity'=>'login', 'url'=>$this->uri->uri_string(), 'ip_address'=>$ipx, 'remark'=>'failed: attempt #'.$failed));
								if($failed>=3) {
									//$this->config->load('auth');
									
									$bdt = $this->wib + (60*60);//time() + $this->config->item('banned');
									
									$msg = "We be force to make User <strong>$usr</strong> and IP <strong>$ipx be banned</strong><br />
											because has failed to login more than 3x<br />
											until <strong>".date('d-m-Y H:i:s', $bdt)."</strong>";
									$this->mAuth->set_banned($usr, $ipx, $bdt);
									$this->mAuth->set_activity(array('UserID'=>$usr, 'activity'=>'login', 'url'=>$this->uri->uri_string(), 'ip_address'=>$ipx, 'remark'=>'banned, attempt > 3x'));
									$this->session->unset_userdata('failed');
									
								}
							}
						}
					}
				}
				
			$this->session->set_flashdata('msg_login', $msg);
			header("Location: $this->url"."index.php/chome/page/");
		//}
	}
	
	public function f() {
		if($this->uri->total_segments()>2) {
			show_404($this->uri->uri_string());
		}
		else {
			$eml	= $this->input->post('email');
			$ack	= $this->mAuth->get_email($eml);
			$msg 	= $ack ? 'ok' : "We don't recognize $eml<br />";
			$this->session->set_flashdata('msg', $msg);
			$this->session->set_flashdata('tab', 'f');
			header("Location: $this->url");
		}
	}
	
	public function c($act='f') {
		if($this->uri->total_segments()>3) {
			show_404();
		}
		else {
			$id = 0;
			switch ($act){
				 case "f" :
					$this->smarty->assign('panel', array("west"=>false));
					$this->smarty->assign('menu', "mn5");
					$this->smarty->assign('page', "51");
					$this->smarty->assign('id', $id);
					$rst = $this->mMain->menu51($id, 0, 1);
					$username = $rst['username'];	
					$passwd = $rst['passwd'];
					//$rst = $this->mMain->menu51($id, 0, 0);
					$this->smarty->assign('username', $username);
					$this->smarty->display("main/index.tpl");
				break;
				
				case "u" :
					$npasswd = $this->input->post('npasswd');
					$username = $this->input->post('username');
					$opasswd = $this->input->post('opasswd');
					$rnpasswd = $this->input->post('rnpasswd');
					
					
					if ($npasswd != $rnpasswd){
						$this->smarty->assign('msg', "You have different New Password and Retype New Password");
					}
					
					else{
						$this->load->library('encrypt');
						$rst = $this->mMain->menu51($id, $npasswd, 1);
						
						//print_r ($rst);
						//echo "form: ". $opasswd."<br>";
						//echo "db: ". $rst['passwd'] ."<br>";
						//echo "decode db: ". $this->encrypt->decode($rst[passwd]) ."<br>";
						if($rst && $opasswd==$this->encrypt->decode($rst['passwd'])) {
						
							$newpasswd = $this->encrypt->encode($npasswd);
							$upd = $this->mMain->menu51($id, $newpasswd, 2);
								if($upd){
									$this->smarty->assign('msg', "Your password is Changed");
								}
								else{
									$this->smarty->assign('msg', "Password Change is Failed");
								}
						}
						
						else{
							$this->smarty->assign('msg', "Your old password is invalid, please try again");
						}	
					}
					$users = $this->auth;
				$user_id = $users['user_id'];;
				$role = $this->mMain->getrole($user_id);
				$this->smarty->assign('rule', $role['usergroup_id']);
					$this->smarty->assign('menu', "mn5");
					$this->smarty->assign('page', "51");
					$this->smarty->assign('id', $id);
					$this->smarty->assign('username', $username);
					$this->smarty->display("main/index.tpl");
				break;
			}
		}
	}
	
	public function r($type) {
		$this->load->library('email');
		$this->email->clear();
		$user	= $this->mAuth->get_user($this->input->post('UserID'));
		$auth	= unserialize(base64_decode($this->session->userdata('beta')));
		$ipx	= $this->input->ip_address();
		
		switch($type) {
			case 1:
				$npwd	= random_string();
				$npwd	= 'royalinvestment';
				$emsg	=
"Dear $user[username],<br />
As your request, We has changed your password to be $npwd<br />
Please login with this new password, and don't forget to change your password so you could remember it easily.<br /><br />
Regards,<br />Royal Investment";
				$this->email->subject('Reset Password');
				$this->mAuth->set_reset($type, $user['UserID'], $this->encrypt->encode($npwd));
				$this->mAuth->set_activity(array('UserID'=>$auth['UserID'], 'activity'=>'reset password', 'url'=>$this->uri->uri_string(), 'ip_address'=>$ipx, 'remark'=>"success: reset password for user $user[UserID]"));
				break;
			case 2:
				$emsg	=
"Dear $user[username],<br />
As your request, We have released your banned login<br />
Please login and don't forget to always logout before you exit/close the website.<br /><br />
Regards,<br />Royal Investment";
				$this->email->subject('Reset Banned');
				$this->mAuth->set_activity(array('UserID'=>$auth['UserID'], 'activity'=>'reset banned', 'url'=>$this->uri->uri_string(), 'ip_address'=>$ipx, 'remark'=>"success: reset banned for user $user[UserID]"));
				break;
		}
		$this->email->from($auth['email'], 'Administrator');
		$this->email->to($user['email']);
		$this->email->reply_to('noreply@royalinvestment.com', 'Auto Mail');
		$this->email->message($emsg);
		if(!$this->email->send()) {
			echo "Error Sending Email";
		}
		else {
			
		}
		echo 1;
	}

	function t() {
		$this->load->library('encrypt');
		$enc = $this->encrypt->encode('demo');
		$hex = BIN2HEX($enc);
		$bin = pack("H*" , $hex);
		$dec = $this->encrypt->decode($bin);
		echo $enc."<br />";
		echo $bin."<br />";
		echo $dec."<br />";
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
		$this->mAuth->set_out($idx);
		header ("Location: $this->url");
	}

	public function x() {
		$this->session->set_userdata('ignore_browser', true);
		header("Location: $this->url");
	}
	
	public function csrf() {
		$this->security->csrf_set_cookie();
	}
	
	private function xe() {
		$str = 'admin';
		$key = $this->config->item('encryption_key');
		$alg = MCRYPT_RIJNDAEL_256;
		$ivx = mcrypt_create_iv(mcrypt_get_iv_size($alg, MCRYPT_MODE_ECB), MCRYPT_RAND);
		$enc = mcrypt_encrypt($alg, $key, $str, MCRYPT_MODE_CBC, $ivx);
		return array(BIN2HEX($enc), BIN2HEX($ivx));
	}
	
	private function xd($arg) {
		$key = $this->config->item('encryption_key');
		$alg = MCRYPT_RIJNDAEL_256;
		$bin = pack("H*" , $arg[0]);
		$ivx = pack("H*" , $arg[1]);
		echo mcrypt_decrypt($alg, $key, $bin, MCRYPT_MODE_CBC, $ivx);
	}
	
	public function xz() {
		$bin = $this->xe();
		$this->xd($bin);
	}
	
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */