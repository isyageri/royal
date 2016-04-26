<?php
class M_auth extends CI_Model {
	public $default_pass;
	public $c2bi_prof;

    function __construct() {
        parent::__construct();

    }
    
    public function getUserLogin($username,$password) {
	    $q = $this->db->get_where('p_user_admin', array('username' => $username,'password' => md5($password)));
		return $q ;
    }

    public function getUserDetail($userid){
        $query = "select
                    a.*,
                    b.p_profile_id,
                    c.profile_name,
                    d.p_user_status_id, d.code status_code
                    from
                    p_user_admin a
                    inner join p_user_profile b on a.p_user_id = b.p_user_id
                    inner join p_profile c on b.p_profile_id = c.p_profile_id
                    inner join p_user_status d on d.p_user_status_id = a.p_user_status_id
                    where a.p_user_id = ".$userid;

        return $this->db->query($query)->row_array();
    }

    public function updateUserInformation($userid){
        $this->db->set('last_login','now()',false);
        $this->db->set('ip_address',$this->input->ip_address());
        $this->db->where("p_user_id",$userid);
        $this->db->update('p_user_admin');
    }

} 