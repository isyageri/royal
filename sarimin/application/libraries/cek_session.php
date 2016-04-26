<?php
	
Class Cek_session {	
    public function __construct() {

    }
    public function cek_ses() {
		$CI =& get_instance();
		if($CI->session->userdata('user_id')=="" || $CI->session->userdata('prof_id')=="") {
				redirect("auth");
		}
    }
}