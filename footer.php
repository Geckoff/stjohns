<footer class="footer">
    <?php if (is_home()): ?>
        <div class="footer-map">
            <div class="footer-content">
                <h1>Find Us</h1>
                <img src="<?php bloginfo('template_url') ?>/img/building.jpg" alt="" />
                <div class="inner-content">
                    <?php if (!dynamic_sidebar('find_us_mp')): ?>
                          Find Our Mission widget in admin panel
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="schedule">
            <div>
                <p>Call <span><?php echo get_option('my_phone'); ?></span> to schedule an appointment</p>
            </div>
        </div>
    <?php endif ?>
    <div class="footer-main">
        <div class="footer-content">
            <?php wp_nav_menu(array(
                    'theme_location' => 'footer_menu',
                    'container' => '',
                    'menu_class' => '',
            )); ?>
            <div class="footer-address">
                <p class="address"><?php echo get_option('my_address'); ?></p>
                <p class="phone"><?php echo get_option('my_phone'); ?></p>
            </div>
            <div class="facebook">
                <p>Like Us on</p>
                <a href="<?php echo get_option('my_facebook'); ?>"><img src="<?php bloginfo('template_url') ?>/img/facebook.jpg" alt="" /></a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-content">
            <img src="<?php bloginfo('template_url') ?>/img/logo.png" alt="" />
            <p><?php echo get_option('my_bottom'); ?></p>
        </div>
    </div>

</footer><!-- .footer -->
<?php wp_footer(); ?>
</body>
</html>