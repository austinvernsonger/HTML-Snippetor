<?php
/*
Plugin Name: HTML Snippetor
Plugin URI: http://austinvernsonger.github.io/
Description: Add HTML code to your pages and posts easily using shortcodes.
Author: PFLscripts.com
Author URI: http://austinvernsonger.github.io/
Text Domain: insert-html-snippet
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// if ( !function_exists( 'add_action' ) ) {
// 	echo "Hi there!  I'm just a plugin, not much I can do when called directly.";
// 	exit;
// }

ob_start();

// error_reporting(E_ALL);

define('PFL_INSERT_HTML_PLUGIN_FILE',__FILE__);

require( dirname( __FILE__ ) . '/PFL-functions.php' );

require( dirname( __FILE__ ) . '/add_shortcode_tynimce.php' );

require( dirname( __FILE__ ) . '/admin/install.php' );

require( dirname( __FILE__ ) . '/admin/menu.php' );

require( dirname( __FILE__ ) . '/shortcode-handler.php' );

require( dirname( __FILE__ ) . '/ajax-handler.php' );

require( dirname( __FILE__ ) . '/admin/uninstall.php' );

require( dirname( __FILE__ ) . '/widget.php' );

require( dirname( __FILE__ ) . '/direct_call.php' );



if(get_option('PFL_credit_link')=="HS"){

	add_action('wp_footer', 'PFL_HS_credit');

}
function PFL_HS_credit() {
	$content = '<div style="width:100%;text-align:center; font-size:11px; clear:both"></div>';
	echo $content;
}


?>
