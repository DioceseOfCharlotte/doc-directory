<?php
/**
 * Plugin Name: SMCS Logged In
 * Plugin URI: https://github.com/m-e-h/smcs-logged-in
 * Version: 1.0.0
 * Author: Marty Helmick
 * Author URI: http://martyhelmick.com
 * Text Domain: smcs-logged-in
 */



add_action( 'after_setup_theme', 'meh_register_nav' );

add_action( 'wp_enqueue_scripts', 'logged_in_scripts' );

add_action( 'tha_header_top', 'doc_login_drop' );

function doc_login_drop() {
    $current_user = wp_get_current_user();
    $user_ID = get_current_user_id();

    if ( is_user_logged_in() ) {
    $username = 'keyboard_arrow_down';
} else {
    $username = '&#xE853;';
}

ob_start();
?>


    <div class="panel-drop p2 black">
    <?php
        if ( is_user_logged_in() ) {

            wp_nav_menu(array(
                'theme_location' => 'logged-in',
                'container'      => 'nav',
                'depth'          => 1,
                'menu_id'        => 'menu-logged-in__list',
                'menu_class'     => 'menu__list menu-logged-in__list inline-block',
                'fallback_cb'    => '',
                'items_wrap'     => '<ul id="%s" class="%s">%s</ul>'
            ));
            ?>

        <div class="user-account absolute" title="Logged in as <?php echo $current_user->display_name; ?>">
            <?php
    		echo get_avatar( $current_user, 30 ). '<p class="grid__item"><a class="btn small" href="'. wp_logout_url( home_url() ) .'">Sign Out</a></p>';
            ?>
        </div>
            <?php
        } else {
    	echo wp_login_form( array( 'echo' => false ) ). '<p class="small mt2 inline-block"><a href="' . wp_lostpassword_url() . '" title="Lost Password">Forgot password?</a></p>';
        } ?>
    </div>
    <button class="material-icons js-drop-panel panel-drop-btn"><?php echo $username ?></button>


<?php
    $output = ob_get_clean();

    echo $output;
}




function logged_in_scripts() {
    wp_enqueue_script(
        'meh_component-handler',
        plugins_url( '/js/mdlComponentHandler.js' , __FILE__ ),
        false, null, true
    );

    wp_enqueue_script(
        'meh_dropPanel',
        plugins_url( '/js/dropPanel.js' , __FILE__ ),
        false, null, true
    );

    wp_enqueue_style(
        'meh_dropStyle',
        plugins_url( '/css/smcs-style.css' , __FILE__ )
    );
}


function meh_register_nav() {
    register_nav_menus( array(
        'logged-in' => esc_html__( 'Logged In', 'meh' ),
    ) );
}