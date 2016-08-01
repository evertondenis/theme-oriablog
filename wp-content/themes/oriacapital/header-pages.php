<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>

        <!-- CSS -->
        <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php
        $postType = get_queried_object();
        if ($postType->name == "blog" || $postType->post_type == "blog" || $postType->taxonomy == "category" || $postType->taxonomy == "post_tag" || $postType->name == "post") { ?>
            <link rel="stylesheet" id="style-oria-css" href="<?php bloginfo('template_url');?>/assets/css/oria.css?ver=1.0" type="text/css" media="all">
        <?php
        }
        ?>
        <?php wp_head(); ?>
    </head>

    <body>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.7&appId=110610719032038";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        <header class="header" style="height: 190px;">
            <div class="container">
                <h1 class="logo"><a href="<?php bloginfo('url');?>/blog" title="<?php bloginfo('description');?>"><?php bloginfo('name');?></a></h1>
                <nav class="menu-menu-principal-container">
                    <?php wp_nav_menu( array( 'menu' => 'topo', 'depth' => 2, 'container' => false, 'menu_class' => 'menu', 'walker' => new wp_bootstrap_navwalker()));?>
                    <button class="c-hamburger c-hamburger--htx">
                      <span>toggle menu</span>
                    </button>
                </nav>
            </div>
        </header>
        <div class="page-newsletter-page">
            <div class="row">
                <div class="col-md-6 bg-yellow"></div>
            </div>
        </div>