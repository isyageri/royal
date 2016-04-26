<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_User_agent extends CI_User_agent {
    function __construct() {
        parent::__construct();
		$this->ci =& get_instance();
		$this->ignore = $this->ci->session->userdata('browser_ignore') ? 1 : 0;
    }

    function requirement() {
        $name       = $this->browser();
        $version    = floatval(substr($this->version(), 0, 3));
        $compliance = 0;
		$code		= str_replace('internet explorer', 'ie', strtolower($name));
        switch($name) {
            case 'Firefox':
                $compliance = ($version > 3.0) ? 1 : 0;
                break;
            case 'Mozilla':
                $compliance = ($version > 5.0) ? 1 : 0;
                break;
            case 'Gekco':
                $compliance = ($version > 1.8) ? 1 : 0;
                break;
            case 'Internet Explorer':
                $compliance = ($version > 6.0) ? 1 : 0;
                break;
            case 'Opera':
                $compliance = ($version > 9.5) ? 1 : 0;
                break;
            case 'Safari':
                $compliance = ($version > 3.0) ? 1 : 0;
                break;
			case 'Chrome':
                $compliance = ($version > 2.0) ? 1 : 0;
                break;
			default:
				$code = 'others';
				break;
        }
        return array("name"=>$name, "code"=>$code, "version"=>$version, "compliance"=>$compliance, "ignore"=>$this->ignore, 'os'=>strtolower($this->platform()));
    }
 }
// end of file MY_User_agent.php