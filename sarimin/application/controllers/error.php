<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index() {
		$this->load->view('templates/header');
        $this->load->view('error_404');
		$this->load->view('templates/footer');
    }
    
}