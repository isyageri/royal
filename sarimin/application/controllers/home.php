<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        checkAuth();
    }

    public function index()
    {
        $menu = "";
        $q = $this->mcrud->getMenu($this->session->userdata("prof_id"));
        foreach ($q as $datas) {
            $data[$datas->is_parent][] = $datas;

            $menu = $this->get_menu($data);

        }

        $this->menu = $menu;

        // $this->load->view('templates/header');
        $this->load->view('home/index');
        // $this->load->view('templates/footer');
    }

    function get_menu($data, $parent = 0)
    {
        if (isset($data[$parent])) {
            $html = "";
            //$i++;
            foreach ($data[$parent] as $v) {
                $child = $this->get_menu($data, $v->id);

                $html .= "<li>";

                if ($v->link == '#') {
                    $html .= "<a href='" . site_url($v->link) . "' class='dropdown-toggle'>";
                } else {

                    $html .= "<a href='" . site_url($v->link) . "' >";
                }


                if ($v->icon == "") {
                    $html .= '<i class="menu-icon fa fa-caret-right"></i>';
                } else {
                    $html .= '<i class="' . $v->icon . '"></i>';
                }

                $html .= '<span class="menu-text"> ' . ucfirst($v->name) . ' </span > ';


                if ($child) {
                    $html .= '<b class="arrow fa fa-angle-down" ></b > ';
                }
                $html .= '</a > ';
                $html .= '<b class="arrow" ></b > ';
                if ($child) {
                    //$i--;
                    $html .= '<ul class="submenu" > ';
                    $html .= $child;
                    //  $html .= '</ul > ';
                }
                $html .= '</li > ';

            }
            $html .= '</ul > ';
            return $html;
        } else {
            return false;
        }
    }
}
