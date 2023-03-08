<?php

/**
 * Trigger this file on Plugin uninstallation
 * 
 * @package CustomPlugin
 */

 //security check

 if (! defined('WP_UNINSTALL_PLUGIN')){
    die;
 }

 //delete from DB
 $contacts = get_posts(array('post_type'=>'contact', 'numberposts'=> -1));
//loop
foreach ($contacts as $contact){
    wp_delete_posts($contact->ID, false);
}

//method 2
global $wpdb;
$wpdb->query("DELETE FROM ct_posts WHERE post_type='contact'");
$wpdb->query("DELETE FROM ct_postmeta WHERE post_id NOT IN (SELECT id from ct_posts)");
$wpdb->query("DELETE FROM ct_term_relationships WHERE object_id NOT IN (SELECT id FROM ct_posts)");