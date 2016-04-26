<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>RIB</title>

    <meta name="description" content="overview &amp; stats"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>

    <!-- Favicon -->
    <link type="image/x-icon" href="<?php echo base_url(); ?>favicon.ico" rel="shortcut icon"/>

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.css"/>

    <!--JqGrid-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ui.jqgrid.css"/>

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-fonts.css"/>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/preload/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/preload/main.css">
    <script src="<?php echo base_url(); ?>assets/js/modernizr-2.6.2.min.js"></script>

</head>

<body class="no-skin">
<!-- #section:basics/navbar.layout -->
<div id="navbar" class="navbar navbar-default">
    <script type="text/javascript">
        try {
            ace.settings.check('navbar', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="navbar-container" id="navbar-container">
        <!-- #section:basics/sidebar.mobile.toggle -->
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <!-- /section:basics/sidebar.mobile.toggle -->
        <div class="navbar-header pull-left">
            <!-- #section:basics/navbar.layout.brand -->
            <a href="#" class="navbar-brand">
                <small>
                    <i class="fa fa-home"></i>
                    RIB
                </small>
            </a>

            <!-- /section:basics/navbar.layout.brand -->

            <!-- #section:basics/navbar.toggle -->

            <!-- /section:basics/navbar.toggle -->
        </div>

        <!-- #section:basics/navbar.dropdown -->
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">

                <!-- #section:basics/navbar.user_menu -->
                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="<?php echo base_url(); ?>assets/avatars/nouser.png"
                             alt="Avatar"/>
								<span class="user-info">
									<small>Welcome,</small>
                                    <?php echo $this->session->userdata("username"); ?>
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo site_url("/auth/profile"); ?>">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="<?php echo site_url("auth"); ?>">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- /section:basics/navbar.user_menu -->
            </ul>
        </div>

        <!-- /section:basics/navbar.dropdown -->
    </div><!-- /.navbar-container -->
</div>

<!-- /section:basics/navbar.layout -->
<div class="main-container" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {
        }
    </script>

    <!-- #section:basics/sidebar -->
    <div id="sidebar" class="sidebar                  responsive">
        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'fixed')
            } catch (e) {
            }
        </script>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                <button class="btn btn-success">
                    <i class="ace-icon fa fa-signal"></i>
                </button>

                <button class="btn btn-info">
                    <i class="ace-icon fa fa-pencil"></i>
                </button>

                <!-- #section:basics/sidebar.layout.shortcuts -->
                <button class="btn btn-warning">
                    <i class="ace-icon fa fa-users"></i>
                </button>

                <button class="btn btn-danger">
                    <i class="ace-icon fa fa-cogs"></i>
                </button>

                <!-- /section:basics/sidebar.layout.shortcuts -->
            </div>

            <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                <span class="btn btn-success"></span>

                <span class="btn btn-info"></span>

                <span class="btn btn-warning"></span>

                <span class="btn btn-danger"></span>
            </div>
        </div><!-- /.sidebar-shortcuts -->

        <!-- List Menu -->
        <ul class="nav nav-list">
            <li class="" id="nav">
                <a href="<?php echo base_url(); ?>">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Dashboard </span>
                </a>

                <b class="arrow"></b>
            </li>
            <?php
            $menu = "";
            $q = $this->mcrud->getMenu();
            foreach ($q as $datas) {
                $data[$datas->is_parent][] = $datas;

                $menu = get_menu($data);

            }

            echo $menu;
            ?>
        </ul><!-- /.nav-list -->


        <!-- #section:basics/sidebar.layout.minimize -->
        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left"
               data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>

        <!-- /section:basics/sidebar.layout.minimize -->
        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'collapsed')
            } catch (e) {
            }
        </script>
    </div>
    <div class="main-content">
        <div class="main-content-inner">
            <div id="ajaxContent">


                <?php
                function get_menu($data, $parent = 0)
                {
                    if (isset($data[$parent])) {
                        $html = "";
                        //$i++;
                        foreach ($data[$parent] as $v) {
                            $child = get_menu($data, $v->id);
                            //print_r($child);
                            //exit;
                            $html .= "<li>";

                            if ($v->link == '#') {
                                $html .= "<a href='#' class='dropdown-toggle'>";
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
                            $html .= '<b class="arrow"></b > ';
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

                ?>

                <script type="text/javascript">
                    $(function() {
                       // $('.nav a[href~="#"]').parents('li').addClass('active open');
                        $('.nav a[href~="' + location.href + '"]').parents('li').addClass('active');
                    });
                </script>
