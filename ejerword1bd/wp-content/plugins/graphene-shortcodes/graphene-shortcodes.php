<?php
/*
Plugin Name: Graphene Shortcodes
Plugin URI: http://www.graphene-theme.com
Description: Provides shortcodes for use with themes developed by Graphene Themes Solutions.
Version: 1.0
Author: Graphene Themes Solutions
Author URI: http://www.graphene-theme.com/
License: GPL3
Text Domain: grsc
*/

/*  Copyright 2014 Graphene Themes Solutions (email: syahir at graphene dash theme dot com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
define( 'GRSC_ROOTURI', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'GRSC_ROOTDIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

require_once( GRSC_ROOTDIR . '/inc/shortcodes.php' );
require_once( GRSC_ROOTDIR . '/inc/functions.php' );
require_once( GRSC_ROOTDIR . '/inc/update.php' );

function grsc_load_textdomain() {
	load_plugin_textdomain( 'grsc', false, basename( GRSC_ROOTDIR ) . '/languages/' );
}
add_action( 'plugins_loaded', 'grsc_load_textdomain' );