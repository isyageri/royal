<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller
{

    private $head = "Client";

    function __construct()
    {
        parent::__construct();

        $this->load->library('cek_session');
        $this->cek_session->cek_ses();
        $this->load->library('encrypt');

        $this->load->helper('breadcrumb');
        $this->load->model('M_jqGrid', 'jqGrid');
        $this->load->model('M_client');


    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('client');
        $this->load->view('templates/footer');

    }

    public function user_request()
    {
        $this->load->view('templates/header');
        $this->load->view('user_request');
        $this->load->view('templates/footer');

    }

    public function gridClient()
    {
        $page = intval($_REQUEST['page']); // Page
        $limit = intval($_REQUEST['rows']); // Number of record/page
        $sidx = $_REQUEST['sidx']; // Field name
        $sord = $_REQUEST['sord']; // Asc / Desc

        $table = "v_user_account";

        //JqGrid Parameters
        $req_param = array(
            "table" => $table,
            "sort_by" => $sidx,
            "sord" => $sord,
            "limit" => null,
            "field" => null,
            "where" => null,
            "where_in" => null,
            "where_not_in" => null,
            "or_where" => null,
            "or_where_in" => null,
            "or_where_not_in" => null,
            "search" => $this->input->post('_search'),
            "search_field" => ($this->input->post('searchField')) ? $this->input->post('searchField') : null,
            "search_operator" => ($this->input->post('searchOper')) ? $this->input->post('searchOper') : null,
            "search_str" => ($this->input->post('searchString')) ? ($this->input->post('searchString')) : null
        );

        // Filter Table *
        $req_param['where'] = array('status !=' => 0);

        $count = $this->jqGrid->countAll($req_param);

        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages)
            $page = $total_pages;
        $start = $limit * $page - $limit;

        $req_param['limit'] = array(
            'start' => $start,
            'end' => $limit
        );

        if ($page == 0) {
            $result['page'] = 1;
        } else {
            $result['page'] = $page;
        }
        $result['total'] = $total_pages;
        $result['records'] = $count;

        $result['Data'] = $this->jqGrid->get_data($req_param)->result_array();
        echo json_encode($result);

    }

    public function gridUserRequest()
    {
        $page = intval($_REQUEST['page']); // Page
        $limit = intval($_REQUEST['rows']); // Number of record/page
        $sidx = $_REQUEST['sidx']; // Field name
        $sord = $_REQUEST['sord']; // Asc / Desc

        $table = "v_user_account";

        //JqGrid Parameters
        $req_param = array(
            "table" => $table,
            "sort_by" => $sidx,
            "sord" => $sord,
            "limit" => null,
            "field" => null,
            "where" => null,
            "where_in" => null,
            "where_not_in" => null,
            "or_where" => null,
            "or_where_in" => null,
            "or_where_not_in" => null,
            "search" => $this->input->post('_search'),
            "search_field" => ($this->input->post('searchField')) ? $this->input->post('searchField') : null,
            "search_operator" => ($this->input->post('searchOper')) ? $this->input->post('searchOper') : null,
            "search_str" => ($this->input->post('searchString')) ? ($this->input->post('searchString')) : null
        );

        // Filter Table *

        $req_param['where'] = array('status' => 0);


        $count = $this->jqGrid->countAll($req_param);

        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages)
            $page = $total_pages;
        $start = $limit * $page - $limit;

        $req_param['limit'] = array(
            'start' => $start,
            'end' => $limit
        );

        if ($page == 0) {
            $result['page'] = 1;
        } else {
            $result['page'] = $page;
        }
        $result['total'] = $total_pages;
        $result['records'] = $count;

        $result['Data'] = $this->jqGrid->get_data($req_param)->result_array();
        echo json_encode($result);

    }

    public function listMenu()
    {
        $result = $this->db->get('admin_menu')->result_array();
        echo "<select>";
        echo "<option value='0'> Ya </option>";
        foreach ($result as $value) {
            echo "<option value=" . $value['id'] . ">" . ucfirst($value['name']) . "</option>";
        }
        echo "</select>";
    }

    public function crudMenu()
    {
        $ret = $this->M_menu->crud_menu();
        /* if($ret == "edit"){
             redirect('/menu');
         }*/
    }

    public function getListAccountType()
    {
        $result = $this->db->get_where('accounttype',array('AccountTypeID !=' => 999))->result_array();
        echo "<select>";
        foreach($result  as $value ){
            echo "<option value=".$value['AccountTypeID'].">".$value['AccountTypeName']."</option>";
        }
        echo "</select>";
    }

    public function getListID()
    {
        $result = $this->db->get('identificationtype')->result_array();
        echo "<select>";
        foreach($result  as $value ){
            echo "<option value=".$value['ID'].">".$value['Type']."</option>";
        }

        echo "</select>";
    }

    public function getListSequrityQuestion()
    {
        $result = $this->db->get('securityquestion')->result_array();
        echo "<select>";
        foreach($result  as $value ){
            echo "<option value=".$value['SecurityQuestionID'].">".$value['Question']."</option>";
        }
        echo "</select>";
    }

    public function approve(){
        $this->M_client->approve();
    }

    public function reject(){
        $this->M_client->reject();
    }



}
