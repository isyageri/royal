<?php
class M_menu extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->load->helper('sequence');
    }



    function crud_menu(){
        $oper = $this->input->post('oper');
        $id = (int)$this->input->post('id');
        $name = ucfirst($this->input->post('name'));
        $link = $this->input->post('link');
        $is_parent = (int)$this->input->post('is_parent');
        $is_active = (int)$this->input->post('is_active');
        $icon = $this->input->post('icon');

        $table = "admin_menu";
        $pk = "id";
        switch ($oper) {
            case 'add':
                $data = array('name' => $name,
                    "link" => $link,
                    "icon" => $icon,
                    "is_active" => $is_active,
                    "is_parent" => $is_parent
                );
                $this->db->insert($table,$data);
                break;
            case 'edit':
                $data = array('name' => $name,
                    "link" => $link,
                    "icon" => $icon,
                    "is_active" => $is_active,
                    "is_parent" => $is_parent
                );
                 $this->db->where($pk,$id);
                 $this->db->update($table, $data);

                break;
            case 'del':
                $this->db->where($pk,$id);
                $this->db->delete($table);
                break;
        }
        return $oper;
    }

    public function resetPwd($uid,$nik){
        $qs = "UPDATE APP_USERS SET PASSWD = '".$nik."' WHERE USER_ID=".$uid;
        $this->db->query($qs);

    }
	
    
	
}