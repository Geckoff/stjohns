<?php get_header('single'); ?>

	<div class="content">

        <div class="page">
            <?php if (have_posts()): while (have_posts()): the_post();?>
                <h1><?php the_title(); ?></h1>
                <div class="inner-content">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>

            <?php else: ?>

            <?php endif; ?>


        </div>
        <div class="findus">
            <?php if(!is_page('22')): ?>
            <h1>Find Us</h1>
            <?php else: ?>
            <h1>Our Mission</h1>
            <?php endif ?>
            <div class="inner-content">
                <?php if(!is_page('22')): ?>
                    <img src="<?php bloginfo('template_url') ?>/img/building.jpg" alt="" />
                    <?php if (!dynamic_sidebar('findus_sp')): ?>
                          Find Find Us Single and Page widget in admin panel
                    <?php endif ?>
                <?php else: ?>
                    <img src="<?php bloginfo('template_url') ?>/img/mission.png" alt="" />
                    <?php if (!dynamic_sidebar('our_mission_mp')): ?>
                      Find Our Mission widget in admin panel
                    <?php endif ?>
                <?php endif ?>
            </div>
        </div>

	</div><!-- .content -->

</div><!-- .wrapper -->

 <?php get_footer(); ?>