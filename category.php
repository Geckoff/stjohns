<?php get_header('single'); ?>

<body>



	<div class="content">

        <div class="news">
            <h1>News</h1>
            <div class="inner-content">
                <?php if (have_posts()): while (have_posts()): the_post();?>
                    <div class="news-block">
                        <?php  the_post_thumbnail();   ?>
                        <span class="date"><?php echo get_the_date(); ?></span>
                        <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                        <div class="short-cont">
                            <p><?php the_content(''); ?></p>
                        </div>
                        <a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url') ?>/img/read-more.jpg" alt="" /></a>
                    </div>


            <?php endwhile; ?>
            </div>
            <div class="pagination">
                <?php wp_corenavi(); ?>
            </div>
            <?php else: ?>

            <?php endif; ?>
        </div>
        <div class="findus">
            <h1>Find Us</h1>
            <div class="inner-content">
                <img src="<?php bloginfo('template_url') ?>/img/building.jpg" alt="" />
                <?php if (!dynamic_sidebar('findus_sp')): ?>
                      Find Find Us Single and Page widget in admin panel
                <?php endif ?>
            </div>
        </div>

	</div><!-- .content -->

</div><!-- .wrapper -->

 <?php get_footer(); ?>