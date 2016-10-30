<!DOCTYPE html>
<html>
<head>
	<title><?php bloginfo('name'); wp_title(); ?></title>
    <link rel="icon" href="<?php bloginfo('template_url') ?>/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/favicon.ico" type="image/x-icon" />
    <?php wp_head(); ?>
    <?php $path = get_template_directory_uri();  ?>
    <script>
    $(document).ready(function(){
        if (window.screen.width < 700) exit;

        var hmenu = $('ul.menu').offset().top;
        var path = "<?php echo $path; ?>";
        $('.not-main').css('background', '#01899d url(' + path + '/img/not-main-bg.jpg)  repeat-x 0 ' + hmenu + 'px');
    });
    </script>
    <!--[if gte IE 9]> <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/style.css">  <![endif]-->
    <!--[if lt IE 9]> <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/iestyle.css">  <![endif]-->
</head>

<body>

<div class="wrapper">

	<header class="header not-main">

        <div class="header-content">
            <div class="upper-block">
                <a href="<?php echo get_home_url(); ?>"><img class="logo" src="<?php bloginfo('template_url') ?>/img/logo.png" alt="St. Matthew's Medical Clinic" /></a>
                <img class="logo-name" src="<?php bloginfo('template_url') ?>/img/name.jpg" alt="St. Matthew's Medical Clinic" />
                <?php wp_nav_menu(array(
                    'theme_location' => 'header_menu',
                    'container' => '',
                    'menu_class' => 'menu',
                )); ?>
            </div>
        </div>
	</header><!-- .header-->