<nav id="site-navigation" class="main-navigation order-2 order-lg-0">
    <input type="checkbox" id="hamburger1" />
    <label for="hamburger1" class="d-block d-lg-none" id="hamburger1"></label>
    <?php
    wp_nav_menu(array('theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'menu' => 'Menu 1','container' =>
        false));
    ?>
</nav><!-- #site-navigation -->