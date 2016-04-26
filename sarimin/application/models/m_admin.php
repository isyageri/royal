<?php
class M_admin extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->load->helper('sequence');
    }

	public function getListMenu($param) {
        $wh = "";
        if($param['search'] != null && $param['search'] === 'true'){
            $wh .= " AND UPPER(".$param['search_field'].")";
            switch ($param['search_operator']) {
                case "bw": // begin with
                    $wh .= " LIKE UPPER('".$param['search_str']."%')";
                    break;
                case "ew": // end with
                    $wh .= " LIKE UPPER('%".$param['search_str']."')";
                    break;
                case "cn": // contain %param%
                    $wh .= " LIKE UPPER('%".$param['search_str']."%')";
                    break;
                case "eq": // equal =
                    if(is_numeric($param['search_str'])) {
                        $wh .= " = ".$param['search_str'];
                    } else {
                        $wh .= " = UPPER('".$param['search_str']."')";
                    }
                    break;
                case "ne": // not equal
                    if(is_numeric($param['search_str'])) {
                        $wh .= " <> ".$param['search_str'];
                    } else {
                        $wh .= " <> UPPER('".$param['search_str']."')";
                    }
                    break;
                case "lt":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " < ".$param['search_str'];
                    } else {
                        $wh .= " < '".$param['search_str']."'";
                    }
                    break;
                case "le":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " <= ".$param['search_str'];
                    } else {
                        $wh .= " <= '".$param['search_str']."'";
                    }
                    break;
                case "gt":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " > ".$param['search_str'];
                    } else {
                        $wh .= " > '".$param['search_str']."'";
                    }
                    break;
                case "ge":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " >= ".$param['search_str'];
                    } else {
                        $wh .= " >= '".$param['search_str']."'";
                    }
                    break;
                default :
                    $wh = "";
            }

        }
		$result = array();


        ($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
        //($param['limit'] != null ? $this->db->limit(5, 1) : '');
       // ($param['sort_by'] != null) ? $this->db->order_by($param['sort_by'], $param['sord']) :'';
       // $this->db->where('MENU_PARENT', 0);
        $qs = $this->db->get('APP_MENU');
        //print_r($param['limit']);
        //exit();
        return $qs;
    }

    public function getListMenuChild($param) {
        $wh = "";
        if($param['search'] != null && $param['search'] === 'true'){
            $wh .= " AND UPPER(".$param['search_field'].")";
            switch ($param['search_operator']) {
                case "bw": // begin with
                    $wh .= " LIKE UPPER('".$param['search_str']."%')";
                    break;
                case "ew": // end with
                    $wh .= " LIKE UPPER('%".$param['search_str']."')";
                    break;
                case "cn": // contain %param%
                    $wh .= " LIKE UPPER('%".$param['search_str']."%')";
                    break;
                case "eq": // equal =
                    if(is_numeric($param['search_str'])) {
                        $wh .= " = ".$param['search_str'];
                    } else {
                        $wh .= " = UPPER('".$param['search_str']."')";
                    }
                    break;
                case "ne": // not equal
                    if(is_numeric($param['search_str'])) {
                        $wh .= " <> ".$param['search_str'];
                    } else {
                        $wh .= " <> UPPER('".$param['search_str']."')";
                    }
                    break;
                case "lt":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " < ".$param['search_str'];
                    } else {
                        $wh .= " < '".$param['search_str']."'";
                    }
                    break;
                case "le":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " <= ".$param['search_str'];
                    } else {
                        $wh .= " <= '".$param['search_str']."'";
                    }
                    break;
                case "gt":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " > ".$param['search_str'];
                    } else {
                        $wh .= " > '".$param['search_str']."'";
                    }
                    break;
                case "ge":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " >= ".$param['search_str'];
                    } else {
                        $wh .= " >= '".$param['search_str']."'";
                    }
                    break;
                default :
                    $wh = "";
            }

        }
        $result = array();

        $pagenum = intval($param['page']);
        $rowsnum = intval($param['rows']);
        if($pagenum == 1)
        {
            $rowstart = $pagenum;
            $rowend = $rowsnum;
        }
        else if ($pagenum > 1)
        {
            $rowstart = (($pagenum - 1) * $rowsnum) + 1;
            $rowend = $rowstart + ($rowsnum - 1);
        }
        $this->db->get('APP_MENU');

        $sql2 = "SELECT * FROM ( ";
        $sql3 = "SELECT ROWNUM RN, a.* FROM APP_MENU a WHERE a.MENU_PARENT = ".$param['id']." ORDER BY ".$param['sort_by']." ". $param['sord'];
        $sql_where = ") WHERE RN BETWEEN $rowstart AND $rowend";
        $sql = $sql2." ".$sql3." ".$sql_where;
        if($wh != "" or $wh != null){
            $sql .= $wh;
        }
//        print_r($sql);
        $qs = $this->db->query($sql);
        if($qs->num_rows() > 0) $result = $qs->result();
        return $result;
    }

    public function getCountListMenu() {
        $result = array();
        $sql = "SELECT COUNT(*) COUNT FROM APP_MENU WHERE MENU_PARENT = 0 ";
        $qs = $this->db->query($sql);

        if($qs->num_rows() > 0) $result = $qs->result();
        return $result;
    }
    public function getCountListMenuChild($id) {
        $result = array();
        $sql = "SELECT COUNT(*) COUNT FROM APP_MENU WHERE MENU_PARENT = ".$id;
        $qs = $this->db->query($sql);

        if($qs->num_rows() > 0) $result = $qs->result();
        return $result;
    }

    //fungsi ini digunakan melakukan create, update, dan delete yang nantinya akan dipanggil di controller
    function crud($table, $key, $id, $arr){
        $oper=$this->input->post('oper');
        $id_=$this->input->post('id');
        $count=count($arr);
      //  print_r($count);
        for($i=0;$i<$count;$i++){
            $data[$arr[$i]]=$this->input->post($arr[$i]);

        }
       // print_r($data);
        //exit();
        switch ($oper) {
            case 'add':
                $new_id = gen_id($key,$table);
                $this->db->set($key,$new_id);
                $this->db->insert($table,$data);
                break;
            case 'edit':
                 $this->db->where($key,$id_);
                 $this->db->update($table, $data);
                //$sql = "UPDATE ".$table." SET ";
                //$qs = $this->db->query($sql);
                break;
            case 'del':
                $this->db->where($key,$id_);
                $this->db->delete($table);
                break;
        }
    }

    public function getTreeMenu() {
        $result = array();
        $sql = "SELECT * FROM APP_MENU ORDER BY MENU_ID ";
        $qs = $this->db->query($sql);

        if($qs->num_rows() > 0) $result = $qs->result();
        return $result;
    }

    public function getTreeMenuByID($id) {
        $result = array();
        $sql = "SELECT MENU_ID,MENU_PARENT,MENU_NAME FROM APP_MENU WHERE MENU_PARENT =".$id."ORDER BY MENU_ID";
        $qs = $this->db->query($sql);

        if($qs->num_rows() > 0) $result = $qs->result();
        return $result;
    }

    public function cekMenuProfile($menu_id,$prof_id) {
        $qs =  $this->db->get_where('APP_MENU_PROFILE',array('MENU_ID'=>$menu_id, 'PROF_ID' => $prof_id));
        return $qs;
    }

    public function insMenuProf($menu_id,$prof_id){
        $qs = "INSERT INTO APP_MENU_PROFILE (SELECT MENU_ID,".$prof_id." FROM APP_MENU WHERE MENU_ID IN (".$menu_id."))" ;
        $this->db->query($qs);
    }

    public function delMenuProf($prof_id){
        $qs = "DELETE APP_MENU_PROFILE WHERE PROF_ID = ".$prof_id;
        $this->db->query($qs);
    }

    function crud_user(){
        $oper=$this->input->post('oper');
        $id_=$this->input->post('id');
        $key = 'USER_ID';
        $table = 'APP_USERS';

        $NIK = strtoupper($this->input->post('NIK'));
        $USER_NAME = strtoupper($this->input->post('USER_NAME'));
        $EMAIL = $this->input->post('EMAIL');
        $LOKER= $this->input->post('LOKER');
        $ADDR_STREET = $this->input->post('ADDR_STREET');
        $ADDR_CITY= $this->input->post('ADDR_CITY');
        $CONTACT_NO = $this->input->post('CONTACT_NO');
        $PASSWD = MD5($this->input->post('PASSWD'));


        switch ($oper) {
            case 'add':
                $new_id = gen_id($key,$table);
              //  $this->db->set($key,$new_id);
                $qs = "INSERT INTO APP_USERS(USER_ID,NIK,USER_NAME,EMAIL,LOKER,ADDR_STREET,ADDR_CITY,CONTACT_NO,PASSWD) VALUES(
                        '".$new_id."',
                        '".$NIK."',
                        '".$USER_NAME."',
                        '".$EMAIL."',
                        '".$LOKER."',
                        '".$ADDR_STREET."',
                        '".$ADDR_CITY."',
                        '".$CONTACT_NO."',
                        '".$PASSWD."'
                        )" ;
                $this->db->query($qs);
                break;
            case 'edit':
                $this->db->where($key,$id_);
                $qs = "UPDATE APP_USERS SET
                         USER_NAME = '".$USER_NAME."',
                         EMAIL = '".$EMAIL."',
                         LOKER = '".$LOKER."',
                         ADDR_STREET = '".$ADDR_STREET."',
                         ADDR_CITY = '".$ADDR_CITY."',
                         CONTACT_NO = '".$CONTACT_NO."'
                       WHERE USER_ID = ".$id_;
                $this->db->query($qs);
                break;
            case 'del':
                $this->db->where($key,$id_);
                $this->db->delete($table);
                break;
        }

    }
    public function resetPwd($uid,$nik){
        $qs = "UPDATE APP_USERS SET PASSWD = '".$nik."' WHERE USER_ID=".$uid;
        $this->db->query($qs);

    }
	
    
	
}