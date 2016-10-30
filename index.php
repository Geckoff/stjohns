<?php get_header(); ?>

	<div class="content">
	    <div class="main-blocks">
            <?php $args = array(
                'post_type' => array('page'),
                'meta_key' => 'mp_order',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
                'posts_per_page' => 6,

            ); ?>
            <?php $blocks = new WP_Query($args); ?>
            <?php if ($blocks->have_posts()): ?>
            <?php while ($blocks->have_posts()): $blocks->the_post(); ?>
                <div class="main-block">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>
            <?php endwhile; ?>
            <?php else: ?>
            <?php endif; ?>
        </div>
        <div class="mission">
            <h1>Our Mission</h1>
            <div class="inner-content">
                <?php if (!dynamic_sidebar('our_mission_mp')): ?>
                      Find Our Mission widget in admin panel
                <?php endif ?>
            </div>
        </div>
        <div class="main-news">
            <h1>Latest News</h1>
            <div class="inner-content">
                <?php
                    $id = 2; //category ID
                    $posts_mp = new WP_Query(array('cat' => $id, 'posts_per_page' => 3, 'order' => 'DESC'));
                ?>
                <?php if ($posts_mp->have_posts()): while ($posts_mp->have_posts()): $posts_mp->the_post();?>
                 <div class="main-news-block">
                    <?php the_post_thumbnail();?>
                    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url') ?>/img/read-more.jpg" alt="" /></a>
                </div>
                <?php endwhile; ?>
                <?php else: ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="sponsors">
            <h1>Our Sponsors</h1>
            <div class="inner-content">
                <div class="sponsor"><a href="#"><img src="<?php bloginfo('template_url') ?>/img/sponsor1.png" alt="" /></a></div>
                <div class="sponsor"><a href="#"><img src="<?php bloginfo('template_url') ?>/img/sponsor2.png" alt="" /></a></div>
                <div class="sponsor"><a href="#"><img src="<?php bloginfo('template_url') ?>/img/sponsor3.png" alt="" /></a></div>
                <div class="sponsor"><a href="#"><img src="<?php bloginfo('template_url') ?>/img/sponsor4.png" alt="" /></a></div>
                <div class="sponsor"><a href="#"><img src="<?php bloginfo('template_url') ?>/img/sponsor5.png" alt="" /></a></div>
            </div>
        </div>

	</div><!-- .content -->

</div><!-- .wrapper -->
<div class="sponsors-bg"></div>

<?php get_footer(); ?>