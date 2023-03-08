<?php
/**
 * @package easy-manage
 */
 /* 
 * Plugin Name:       Easy Manage System
 * Plugin URI:        https://github.com/Kennedy-karuri/Easy-manage.git
 * Description:       This custom plugin helps with managemnet at easy-manage
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Kennedy Karuri
 * Author URI:        https://github.com/Kennedy-karuri/Easy-manage.git
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/Kennedy-karuri/Easy-manage.git
 * Text Domain:       project
 * Domain Path:       /languages
 */

 //Security
 defined('ABSPATH') or die('gerara here!');

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__). '/vendor/autoload.php';
}

function activateExternally(){
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activateExternally');

function deactivateExternally(){
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivateExternally');

//class as service
if(class_exists('Inc\\Init')){
    Inc\Init::register_services();
}