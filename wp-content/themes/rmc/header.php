<!DOCTYPE html>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php
        if (is_home()) {
            echo bloginfo("name");
            echo " | ";
            echo bloginfo("description");
        } else {
            echo wp_title(" | ", false, right);
            echo bloginfo("name");
        }
        ?></title>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory') . '/stylesheet/bootstrap.min.css'; ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory') . '/stylesheet/layout.css'; ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory') . '/stylesheet/font-awesome-4.3.0/css/font-awesome.min.css'; ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory') . '/stylesheet/slidebars.min.css'; ?>"/>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo bloginfo('template_directory') . '/js/jquery-1.11.2.min.js'; ?>"></script>
    <?php wp_head(); ?>
</head>
<body>
    <div id="sb-site">
        <div class="container-fluid">
            <div class="container header">
                <div class="logo col-xs-6">
                    <?php $logo = get_field("logo", "option"); ?>
                    <a href="<?php echo site_url(); ?>"><img src="<?php echo $logo['url']; ?>"/></a>
                </div>
                <div class="header-details col-sm-6 hidden-xs">
                    <p><i class="fa fa-phone"></i> <?php echo the_field("header_number", "option"); ?></p>
                    <p class="header-details-text">RMC Global Headquarters</br>
                        Australia</p>
                </div>
                <div class="sb-toggle-right navbar-right hidden-lg hidden-md hidden-sm col-xs-6 mobile-nav">
                    <div class="navicon-line"></div>
                    <div class="navicon-line"></div>
                    <div class="navicon-line"></div>
                </div>
            </div>
        </div>
        <div class="container-fluid hidden-xs">
            <div class="container menu-wrap">
                <div class="container top-menu-wraper">
                    <div class="col-sm-9 top-menu">
                        <?php wp_nav_menu(array('menu' => 'Top Menu', 'theme_location' => 'primary')); ?>
                    </div>
                    <div class="header-search col-sm-3">
                        <?php echo get_search_form(); ?>
                    </div>
                </div>
            </div>
        </div>


