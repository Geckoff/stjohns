<!DOCTYPE html>
<html>
<head>

	<title><?php bloginfo('name'); wp_title(); ?></title>
    <link rel="icon" href="<?php bloginfo('template_url') ?>/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/favicon.ico" type="image/x-icon" />
    <?php wp_head(); ?>
    <!--[if gte IE 9]> <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/style.css">  <![endif]-->
    <!--[if lt IE 9]> <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/iestyle.css">  <![endif]-->
</head>

<body>

<div class="wrapper">

	<header class="header">
        <?php $slider = new WP_Query(array('post_type' => 'slider', 'order' => 'ASC')); ?>
        <?php if ($slider->have_posts()) : ?>
		<ul id="slide_2" class="slidik">
            <?php $i = 0 ?>
            <?php while ($slider->have_posts()) : $slider->the_post();?>
                <?php if ($i == 0) : ?>
                <li class="show"><?php the_post_thumbnail(); ?> </li>
                <?php else: ?>
                <li><?php the_post_thumbnail(); ?> </li>
                <?php endif; ?>
                <?php $i++; ?>
            <?php endwhile; ?>
            <a data-slidik="slide_2" class="next" href="#">Next</a>
            <a data-slidik="slide_2" class="prev" href="#">Prev</a>
            <div data-slidik="slide_2" class="dotted"></div>
        </ul>
        <?php else: ?>
        <?php endif; ?>
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

            <div class="quot-block">
                <span>"Whoever comes to Me I will never cast out."</span><br>
                <span>John 6:37</span>
            </div>

        </div>
       <div class="schedule">
            <div>
                <p>Call <span><?php echo get_option('my_phone'); ?></span> to schedule an appointment</p>
            </div>
        </div>
	</header><!-- .header-->