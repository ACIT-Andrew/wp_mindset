<?php
/**
 * Plugin Name:       React Plugin
 * Plugin URI:        https://github.com/jtleathers/react-plugin/
 * Description:       Add simple React apps to WordPress websites.
 * Version:           1.0.0
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * Author:            Jonathon Leathers
 * Author URI:        https://jonathonleathers.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        false
 * 
 * 
 */

 function react_plugin_scripts() {
    wp_register_script( 'quotes-app', plugins_url( '/quotes/static/js/main.9da4952a.js', __FILE__ ), array(), '1.0.0', true );
    wp_register_style( 'quotes-app-styles', plugins_url( '/quotes/static/css/main.073c9b0a.css', __FILE__ ), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'react_plugin_scripts' );

 function quotes_app( $atts ) {
    ob_start(); ?>
    <noscript>You need to enable JavaScript to view this page.</noscript>
    <div id="quotes"></div>
    <?php
    $html = ob_get_clean();
    wp_enqueue_script( 'quotes-app' );
    wp_enqueue_style( 'quotes-app-styles' );
    return $html;
}
add_shortcode( 'react-quotes', 'quotes_app' );