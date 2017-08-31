<?php
/**
 * Plugin Name: UnifiedPS.com Documentation Sticky Sidebar
 * Plugin URI: https://github.com/Pressed-Solutions/UnifiedPS-Documentation-sticky-sidebar
 * Description: Makes the documentation sidebar stay within the viewport when user scrolls the page
 * Version: 1.0.0
 * Author: Pressed Solutions
 * Author URI: https://pressedsolutions.com
 * Copyright: 2017 Pressed Solutions

 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

defined( 'ABSPATH' ) or die( 'No access allowed' );

/**
 * Register sticky-kit scripts
 *
 * @link http://leafo.net/sticky-kit/ Source code from leafo.net
 */
function unifiedps_documentation_assets() {
    wp_register_script( 'sticky-kit', plugin_dir_url( __FILE__ ) . '/jquery.sticky-kit.min.js', array( 'jquery' ), '1.1.2' );
    wp_add_inline_script( 'sticky-kit', '
        (function($){
            $(document).ready(function(){
                $(".doc-menu").stick_in_parent({
                  offset_top: 180
                });
            });
        })(jQuery);
        ' );
}
add_action( 'wp_enqueue_scripts', 'unifiedps_documentation_assets' );

/**
 * Enqueue the script on demand
 */
function unifiedps_documentation_sticky_sidebar_shortcode() {
    wp_enqueue_script( 'sticky-kit' );
}
add_shortcode( 'unifiedps_documentation_sticky_sidebar', 'unifiedps_documentation_sticky_sidebar_shortcode' );
