<?php
/**
 *  @package ContactRegistration
 */


   /*

Plugin Name: Contact-registration
Plugin URI:https://github.com/Kennedy-karuri/Easy-manage.git
Author: Kennedy Karuri
Author URI: https://github.com/Kennedy-karuri/Easy-manage.git
Description: This is a custom plugin that collect contact information for easy-manage theme.
Version: 1.0
Requires at least: 5.0
Tested up to: 5.4
Requires PHP: 7.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


*/

/**
 * Securing A plugin
 */

defined('ABSPATH') or die('gerara here!');



class ContactReg{
    function __construct(){
       

        $this->pass_data_to_db();   
    }

    function activate(){ 
        $this->create_table_to_db();
        flush_rewrite_rules();
    }

    function deactivate(){
   
        flush_rewrite_rules();
    }

    function create_table_to_db(){
        global $wpdb;

        $table_name = 'wp_contacts';
       

        $contact_details = "CREATE TABLE $table_name(
            firstname text NOT NULL,
            secondname text NOT NULL,
            email varchar(35) NOT NULL,
            telephone integer NOT NULL,
            message text NOT NULL
        );";

      

        require_once(ABSPATH.'wp-admin/includes/upgrade.php');
        dbDelta($contact_details);
    }

    function pass_data_to_db(){
        if (isset($_POST['submitbtn'])){
            $data = array(
                'firstname'=>$_POST['firstname'],
                'secondname'=>$_POST['secondname'],
                'email'=>$_POST['email'],
                'telephone'=>$_POST['telephone'],
                'message'=>$_POST['message']
            );
            global $wpdb;
            $tableName= 'wp_contacts';
            $result = $wpdb->insert($tableName, $data, $format=NULL);
        
            if($result == true){
                echo "<script>alert('Contact Details Captured Succesfully');</script>";
            }else{
                echo "<script>alert('Unable to Register');</script>";
            }
        }
    }
}

if (class_exists('ContactReg')){
    $contactRegInstance = new ContactReg();
}

//activation
register_activation_hook(__FILE__, array($contactRegInstance, 'activate'));

//deactivate
register_deactivation_hook(__FILE__, array($contactRegInstance, 'deactivate'));
