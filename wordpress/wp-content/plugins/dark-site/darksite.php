<?php
/*
Plugin Name: Dark Site
Plugin URI: http://wordpress.org/extend/plugins/dark-site/
Description: This plugin is designed to keep a WordPress site dark. If a user comes to the site, it checks to see if they are logged in, if not the user is directed to the wp-admin login page. When you want to go live, just deactivate the Dark Site plugin.
Author: Bernard Clark
Version: 1.0
Author URI: http://makoweb.com/
License: GPL2
*/


/*  Copyright 2011  Bernard Clark-Makoweb.com  (email : bernie@makoweb.com)

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

function do_dark_site() {
	get_currentuserinfo();
	global $user_ID;
	if ($user_ID == '')
	{
        header('Location: wp-login.php');
	}

	// And then return the coode
	return '';
}
// Now we set that function up to execute when the admin_notices action is called
add_action( 'get_header', 'do_dark_site' );

?>