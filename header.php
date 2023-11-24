<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Digital Print Nepal - The best and top printing in Nepal.</title>
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/icon.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/icon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/icon.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/icon.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/icon.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/icon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/icon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/icon.png">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/add_on.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/responsive_add_on.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <?php wp_head();  ?>
</head>

<body class="active-preloader-ovh">

    <div class="preloader">
        <div class="spinner"></div>
    </div><!-- /.preloader -->
    <!-- hello eps -->
    <div class="preloader">
        <div class="spinner"></div>
    </div><!-- /.preloader -->



    <header class="header home-page-one">
        <nav class="nav_bar_main">
            <div class="nav_div_left">
                <div>
                    <a class="" href="<?php echo site_url(''); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/digital-print-nepal.png" alt="Awesome Image" height="80px" />
                    </a>


                    <ul class="nav navbar-nav navigation-box">
                        <li class="<?php if (is_page('about')) echo 'current' ?>">
                            <a href="<?php echo site_url('/about'); ?>">About</a>
                        </li>
                        <!-- <li class="<?php // if (is_page('services')) echo 'current' 
                                        ?>">
                               <a href="<?php //echo site_url('/services'); 
                                        ?>">Services</a>
                                  </li> -->
                        <li class="<?php if (is_page('contact')) echo 'current' ?>">
                            <a href="<?php echo site_url('/contact'); ?>">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="menu_icon_div">
                    <i class="bx bx-menu" class="active" id="menu_icon"></i>
                </div>
                <!-- <i class="fa-solid fa-xmark"></i> -->
            </div>

            <div class="nav_container">


                <div class="search">
                    <input class="searchFilter" id="searchQuery" placeholder="Search Product..." type="text"><i style=" font-size: 1.3rem;" class="fas fa-search"></i>
                </div>

                <div class="nav_div_right">
                    <a href="tel:9851000755" class="thm-btn yellow-bg custom_padding"><i class="fa-solid fa-phone-volume"></i> 9851000755</a>
                </div><!-- /.right-side-box -->
            </div><!-- /.container -->
            </div>
        </nav>
        <div class="banner_categories m_banner_categories" id="menu_icon_show_hidden">
            <ul class="list">
                <?php
                $menu_args = array(
                    'theme_location' => 'primary-menu',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'walker'         => new Custom_Walker(),
                );

                wp_nav_menu($menu_args);
                ?>
            </ul>
        </div>
    </header><!-- /.header -->