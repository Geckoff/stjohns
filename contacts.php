

<?php get_header('single'); ?>

	<div class="content">

        <div class="page">
            <h1>Contact Us</h1>
            <div class="inner-content">
                <?php if (have_posts()): while (have_posts()): the_post();?>
                    <h1><?php the_title(); ?></h1>
                    <div class="inner-content">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>

                <?php else: ?>

                <?php endif; ?>

                <h2 style="clear: both">Write a Message</h2>
                <form class="contact-form" action="">
                    <label for="name">Your Name</label><input id="name" type="text" />
                    <label for="tel">Your Phone Number</label><input id="tel" type="text" />
                    <label for="theme">Theme</label><input id="theme" type="text" />
                    <label for="mes">Message</label><textarea name="" id="mes" cols="30" rows="10"></textarea>
                    <input type="image" src="img/send-but.png" />

                </form>
            </div>

        </div>
        <div class="findus">
            <h1>Our Mission</h1>
            <div class="inner-content">
                <img src="img/mission.png" alt="" />
                <?php if (!dynamic_sidebar('our_mission_mp')): ?>
                      Find Our Mission widget in admin panel
                <?php endif ?>
            </div>
        </div>

	</div><!-- .content -->

</div><!-- .wrapper -->

 <?php get_footer(); ?>