<footer class="container">
    <?php 
        $locations = get_nav_menu_locations();
        $menu_footer_1 = wp_get_nav_menu_object( $locations['footer_menu_1']);
        $menu_footer_2 = wp_get_nav_menu_object( $locations['footer_menu_2']);
    ?>
    <div class="top">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus feugiat non nisi posuere convallis. Sed semper sem non dolor congue bibendum. Nullam eu accumsan ante.</p>
        <div>
            <span class="bold"><?php echo $menu_footer_1->name; ?></span>
            <?php wp_nav_menu( array(
                'theme_location' => 'footer_menu_1',
                'menu' => 'footer-navigation',
                'menu_class' => 'menu',
                'container' => 'nav',
                'container_class' => 'footer-menu',
                'menu_id' => 'navigation',
            )); ?>
        </div>
        <div>
            <span class="bold"><?php echo $menu_footer_2->name; ?></span>
                <?php wp_nav_menu( array(
                    'theme_location' => 'footer_menu_2',
                    'menu' => 'footer-navigation',
                    'menu_class' => 'menu',
                    'container' => 'nav',
                    'container_class' => 'footer-menu',
                    'menu_id' => 'navigation',
            )); ?>
        </div>
    </div>
    <span>Copyright © <?php echo date('Y'); ?> <?php bloginfo(); ?>.</span>
</footer>
<?php wp_footer(); ?>
</body>
</html>